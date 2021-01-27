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
        $this->load->model('PAI/M_Simpenais');
        $this->Authentication = $this->M_Simpenais->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Dashboard Bina KUA & Keluarga Sakinah | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'total' => $this->Total(),
            'inpo' => date('d-m-Y')
        ];
        $data['content'] = $this->parser->parse('Users/u_pai/V_Dashboard', $data, true);
        return $this->parser->parse('Users/u_pai/Template', $data);
    }

    private function Total() {
        $data = [
            'simpenais' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/total?KEY=BOBA'))
        ];
        return $data;
    }

}
