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
        $this->load->model('M_Dashboard');
        $this->Authentication = $this->M_Dashboard->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Dashboard Rudabi',
            'username' => $this->session->userdata('username'),
            'total' => $this->Total(),
            'inpo' => date('d-m-Y')
        ];
        $data['content'] = $this->parser->parse('V_Dashboard', $data, true);
        return $this->parser->parse('Template', $data);
    }

    private function Total() {
        $data = [
            'sihat' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'siihat/total?KEY=BOBA')),
            'simas' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'eimas/total?KEY=BOBA')),
            'alat' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'siihat/alat?KEY=BOBA')),
            'pustaka' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'esbsnn/pustaka?KEY=BOBA')),
            'satker' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'esbsnn/sekretariat?KEY=BOBA')),
            'sicakep' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'sicakepp/total?KEY=BOBA')),
            'bimwin' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'embimwin/total?KEY=boba')),
            'monev' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'monev/total?KEY=boba')),
            'simpenghulu' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/total?KEY=boba')),
            'simpenais' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/total?KEY=BOBA')),
            'penyuluh' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'epay/totalnew?KEY=BOBA')),
            'siwak' => json_decode($this->bodo->Curel($this->bodo->Url_API() . 'siwaks/wakaf?KEY=boba'))
        ];
        return $data;
    }

}
