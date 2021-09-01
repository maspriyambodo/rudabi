<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Product:        System of kementerian agama Republik Indonesia
 * License Type:   Government
 * Access Type:    Multi-User
 * License:        https://maspriyambodo.com
 * maspriyambodo@gmail.com
 * 
 * Thank you,
 * maspriyambodo
 */

/**
 * Description of M_simkah
 *
 * @author centos
 */
class M_simkah extends CI_Model {

    public function index() {
        $exec = $this->db->select()
                ->from('dt_simkah')
                ->get()
                ->result();
        return $exec;
    }

}
