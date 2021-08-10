<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Applications/Dashboard/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Dashboard/index/'),
            'pagetitle' => 'Dashboard',
            'siteTitle' => 'Dashboard Application | ' . $this->bodo->Sys('app_name'),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Dashboard',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse("v_dashboard", $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Get_sihat() {
        $response = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'siihat/total?KEY=BOBA'));
        ToJson($response);
    }

    public function Get_masjid() {
        $response = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'eimas/dtmasjid?KEY=BOBA'));
        ToJson($response);
    }

    public function Get_musholla() {
        $response = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'eimas/dtmushalla?KEY=BOBA'));
        ToJson($response);
    }

    public function Get_targetcatin() {
        $response = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'embimwin/total_targetcatin?KEY=boba'));
        ToJson($response);
    }

    public function Get_datacatin() {
        $response = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'embimwin/total_datacatin?KEY=boba'));
        ToJson($response);
    }

    public function Get_alat() {
        $response = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'siihat/alat?KEY=BOBA'));
        ToJson($response);
    }

    public function Get_pustakadigital() {
        $response = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'esbsnn/pustakadigital?KEY=BOBA'));
        ToJson($response);
    }

    public function Get_satker() {
        $response = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'esbsnn/sekretariat?KEY=BOBA'));
        ToJson($response);
    }

    public function Get_sicakep() {
        $response = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'sicakepp/total?KEY=BOBA'));
        ToJson($response);
    }

    public function Get_monev() {
        $response = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'monev/total?KEY=boba'));
        ToJson($response);
    }

    public function Get_simpenghulu() {
        $response = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/total?KEY=boba'));
        ToJson($response);
    }

    public function Get_lptq() {
        $response = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/lptq?KEY=BOBA'));
        ToJson($response);
    }

    public function Get_ormasislam() {
        $response = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/ormasislam?KEY=BOBA'));
        ToJson($response);
    }

    public function Get_penyuluh() {
        $response = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'epay/totalnew?KEY=BOBA'));
        ToJson($response);
    }

    public function Get_siwak() {
        $response = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'siwaks/wakaf?KEY=boba'));
        ToJson($response);
    }

    public function Get_baznas() {
        $response = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'simzat/totaldatabaznas?KEY=boba'));
        ToJson($response);
    }

    public function Get_laznas() {
        $response = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'simzat/totaldatalaznas?KEY=boba'));
        ToJson($response);
    }

    public function Get_pustakaslim() {
        $response = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'pustaka/totalbuku?KEY=boba'));
        ToJson($response);
    }

    

}
