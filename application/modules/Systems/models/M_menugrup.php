<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_menugrup extends CI_Model {

    public function sys_menu_group($data) {
        $exec = $this->db->query('CALL sys_menu_group("' . $data['param'] . '",' . $data['id_grup'] . ',"' . $data['nama_group'] . '","' . $data['deskripsi'] . '",' . $data['user_login'] . ');');
        mysqli_next_result($this->db->conn_id);
        return $exec;
    }

}
