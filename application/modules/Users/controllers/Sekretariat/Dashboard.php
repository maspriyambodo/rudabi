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
        $this->load->model('Sekertariat/M_Sekertariat');
        $this->Authentication = $this->M_Sekertariat->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Dashboard Sekretariat | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'data' => $this->Total(),
            'inpo' => date('d-m-Y')
        ];
        $data['content'] = $this->parser->parse('Users/u_sekretariat/V_Dashboard', $data, true);
        return $this->parser->parse('Users/u_sekretariat/Template', $data);
    }

    private function Total() {
        $data = [
            'satker' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'esbsnn/sekretariat?KEY=BOBA')),
            'sicakep' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'sicakepp/total?KEY=BOBA'))
        ];
        return $data;
    }

}
