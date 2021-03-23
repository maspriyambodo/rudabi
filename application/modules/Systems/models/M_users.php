<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {

    public function index($param) {
        $exec = $this->db->query('CALL sys_users_select("' . $param['param'] . '",' . $param['id_user'] . ',' . $param['panjang'] . ',' . $param['mulai'] . ');');
        mysqli_next_result($this->db->conn_id);
        return $exec->result();
    }

    public function Role($param) {
        $exec = $this->db->query('CALL sys_roles_select(' . $param . ');');
        mysqli_next_result($this->db->conn_id);
        return $exec->result();
    }

    public function Save($data) {
        $exec = $this->db->query('CALL sys_users_insert("' . $data['uname'] . '","' . $data['pwd'] . '",' . $data['role_id'] . ',"' . $data['pict']['file_name'] . '",' . $data['stat'] . ',' . $data['user_login'] . ');');
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Systems/models/M_users -> function Save ' . 'error ketika sys_users_insert');
            $result = [
                'status' => false,
                'pesan' => 'error while saving new user!'
            ];
        } else {
            mysqli_next_result($this->db->conn_id);
            $result['status'] = true;
        }
        return $result;
    }

    public function Check($uname) {
        $exec = $this->db->select('sys_users.uname')
                ->from('sys_users')
                ->where('sys_users.uname', $uname)
                ->get()
                ->result();
        return $exec;
    }

    public function Stat($data) {
        $exec = $this->db->query('CALL sys_users_stat(' . $data['id_user'] . ',' . $data['user_login'] . ',' . $data['stat_active'] . ');');
        mysqli_next_result($this->db->conn_id);
        return $exec;
    }

}
