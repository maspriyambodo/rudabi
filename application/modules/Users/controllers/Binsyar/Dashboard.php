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
        $this->load->model('Binsyar/M_Binsyar');
        $this->Authentication = $this->M_Binsyar->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Dashboard Urusan Agama Islam & Binsyar | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'total' => $this->Total(),
            'inpo' => date('d-m-Y')
        ];
        $data['content'] = $this->parser->parse('Users/u_urais/V_Dashboard', $data, true);
        return $this->parser->parse('Users/u_urais/Template', $data);
    }

    private function Total() {
        $data = [
            'sihat' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'siihat/total?KEY=BOBA')),
            'simas' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'eimas/total?KEY=BOBA')),
            'tipo_masjid' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'eimas/tipomas?KEY=BOBA')),
            'tipo_mushalla' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'eimas/tipomus?KEY=BOBA')),
            'alat' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'siihat/alat?KEY=BOBA')),
            'pustaka' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'esbsnn/pustaka?KEY=BOBA'))
        ];
        return $data;
    }

}
