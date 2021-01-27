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
        $this->load->model('Emonev/M_emonev');
        $this->Authentication = $this->M_emonev->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Dashboard Bina KUA & Keluarga Sakinah | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'total' => $this->Total(),
            'inpo' => date('d-m-Y')
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/V_Dashboard', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    private function Total() {
        $data = [
            'monev' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'monev/total?KEY=boba')),
            'simpenghulu' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/total?KEY=boba')),
            'bimwin' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'embimwin/total?KEY=boba')),
        ];
        return $data;
    }

}
