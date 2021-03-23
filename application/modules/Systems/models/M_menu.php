<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model {

    public function index() {
        $exec = $this->db->query('CALL sys_menu_dir();');
        mysqli_next_result($this->db->conn_id);
        return $exec;
    }

    public function name_group() {
        $exec = $this->db->query('CALL sys_menu_group_select();')->result();
        mysqli_next_result($this->db->conn_id);
        return $exec;
    }

    public function Group_menu() {
        $exec = $this->db->query('CALL group_menu();')->result();
        foreach ($exec as $key => $value) {
            $item[$key] = $value->link;
        }
        mysqli_next_result($this->db->conn_id);
        return $item;
    }

    public function Save($data) {
        $exec = $this->db->query('CALL sys_menu_insert(' . $data['parent'] . ',"' . $data['nama_menu'] . '","' . $data['link_menu'] . '",' . $data['order_no'] . ',' . $data['gr_menu'] . ',"' . $data['ico_menu'] . '",' . $data['user_login'] . ');');
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Systems/models/M_menu -> function Save ' . 'error ketika insert_menu');
            $result = [
                'status' => false,
                'pesan' => 'error while saving new menu!'
            ];
        } else {
            mysqli_next_result($this->db->conn_id);
            $result['status'] = true;
        }
        return $result;
    }

    public function Delete($data) {
        $exec = $this->db->query('CALL sys_menu_delete(' . $data['id'] . ',' . $data['user_login'] . ');');
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Systems/models/M_menu -> function Save ' . 'error ketika insert_menu');
            $result = [
                'status' => false,
                'pesan' => 'error while delete menu!'
            ];
        } else {
            mysqli_next_result($this->db->conn_id);
            $result['status'] = true;
            $result['menu_nama'] = $exec->row()->menu_nama;
        }
        return $result;
    }

    public function Edit($id) {
        $exec = $this->db->select()
                ->from('sys_menu_select')
                ->where([
                    '`sys_menu_select`.`id_menu`' => $id + false,
                ])
                ->get()
                ->result();
        return $exec;
    }

    public function Update($data) {
        $exec = $this->db->query('CALL sys_menu_update(' . $data['parent'] . ',"' . $data['menu'] . '","' . $data['location'] . '",' . $data['nomor_order'] . ',' . $data['grup'] . ',"' . $data['icon_menu'] . '",' . $data['user_login'] . ',' . $data['id_menu'] . ',@menu_nama);');
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Systems/models/M_menu -> function Save ' . 'error ketika insert_menu');
            $result = [
                'status' => false,
                'pesan' => 'error while update menu!'
            ];
        } else {
            mysqli_next_result($this->db->conn_id);
            $result['status'] = true;
            $result['menu_nama'] = $exec->row()->menu_nama;
        }
        return $result;
    }

    public function Set_active($data) {
        $exec = $this->db->query('CALL sys_menu_active(' . $data['id'] . ',' . $data['user_login'] . ');');
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Systems/models/M_menu -> function Save ' . 'error ketika insert_menu');
            $result = [
                'status' => false,
                'pesan' => 'error while activating menu!'
            ];
        } else {
            mysqli_next_result($this->db->conn_id);
            $result['status'] = true;
            $result['menu_nama'] = $exec->row()->menu_nama;
        }
        return $result;
    }

    public function Get_order($param) {
        $role_id = $this->bodo->Dec($this->session->userdata('role_id'));
        $exec = $this->db->query('CALL sys_menu_getorder(' . $role_id . ',' . $param . ');');
        mysqli_next_result($this->db->conn_id);
        return $exec;
    }

}
