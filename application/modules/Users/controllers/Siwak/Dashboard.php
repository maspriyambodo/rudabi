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
 * Description of Dashboard
 *
 * @author centos
 */
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Siwak/M_Siwak');
        $this->Authentication = $this->M_Siwak->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Direktorat Pemberdayaan Zakat & Wakaf | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'total' => $this->Total(),
            'inpo' => date('d-m-Y')
        ];
        $data['content'] = $this->parser->parse('Users/u_siwak/V_Dashboard', $data, true);
        return $this->parser->parse('Users/u_siwak/Template', $data);
    }

    private function Total() {
        $data = [
            'siwak' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'siwaks/wakaf?KEY=boba')),
            'pengguna' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'siwaks/pengguna?KEY=boba'))
        ];
        return $data;
    }

}
