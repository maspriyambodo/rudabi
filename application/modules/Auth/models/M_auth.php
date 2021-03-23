<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    public function Signin($data) {
        $exec = $this->db->query('CALL sys_auth("' . $data['uname'] . '");')->row();
        mysqli_next_result($this->db->conn_id);
        return $exec;
    }

}
