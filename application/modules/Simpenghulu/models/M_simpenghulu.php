<?php

defined('BASEPATH')OR exit('No direct script access allowed');
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
 * Description of M_simpenghulu
 *
 * @author centos
 */
class M_simpenghulu extends CI_Model {

    public function Auth() {
        $exec = $this->db->select('auth.uname, auth.hak_akses, auth.stat')
                ->from('auth')
                ->where(['auth.uname' => $this->session->userdata('username'), 'auth.hak_akses' => 1, 'auth.stat' => 1])
                ->or_where(['auth.uname' => $this->session->userdata('username')])
                ->where(['auth.hak_akses' => 12, 'auth.stat' => 1])
                ->get()
                ->result();
        if (sizeof($exec) >= 1) {
            return $exec;
        } else {
            return redirect(base_url('Auth/index/'), 'refresh');
        }
    }

}
