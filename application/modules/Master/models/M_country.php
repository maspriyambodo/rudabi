<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_country extends CI_Model {

    public function index($data) {
        $exec = $this->db->query('CALL mt_country("' . $data['param'] . '",' . $data['country_id'] . ',"' . $data['kode_negara'] . '","' . $data['nama_negara'] . '","' . $data['bendera'] . '",' . $data['user_login'] . ');');
        mysqli_next_result($this->db->conn_id);
        return $exec;
    }

}
