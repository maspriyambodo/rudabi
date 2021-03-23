<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'total' => $this->Total(),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Applications/Dashboard/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Dashboard/index/'),
            'siteTitle' => 'Dashboard Application | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Dashboard',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Dashboard',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('v_dashboard', $data, true);
        return $this->parser->parse('Template/layout', $data);
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
