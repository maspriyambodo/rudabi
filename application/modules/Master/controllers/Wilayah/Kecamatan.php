<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Master/Wilayah/Kecamatan/index/',
            'privilege' => $this->bodo->Check_previlege('Master/Wilayah/Kecamatan/index/'),
            'siteTitle' => 'Master Wilayah Kecamatan | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Kecamatan',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Kecamatan',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('wilayah/kecamatan', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
