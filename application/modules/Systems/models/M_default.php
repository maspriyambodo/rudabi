<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_default extends CI_Model {

    public function Sys() {
        $exec = $this->db->query('CALL sys_app_select();')->row();
        mysqli_next_result($this->db->conn_id);
//        print_r($exec->favico);die;
        return $exec;
    }

    public function Menu() {
        $exec = $this->db->query('CALL sys_menu_select(' . $this->bodo->Dec($this->session->userdata('role_id')) . ');');
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

    public function Roles($param) {
        $exec = $this->db->query('CALL sys_roles_select("' . $param . '");');
        mysqli_next_result($this->db->conn_id);
        return $exec;
    }

    public function Permission($id) {
        $exec = $this->db->query('CALL sys_permission_select("' . $id . '");');
        mysqli_next_result($this->db->conn_id);
        return $exec;
    }

}
