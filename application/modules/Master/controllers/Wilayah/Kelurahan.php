<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kelurahan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Master/Wilayah/Kelurahan/index/',
            'privilege' => $this->bodo->Check_previlege('Master/Wilayah/Kelurahan/index/'),
            'siteTitle' => 'Master Wilayah Kelurahan | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Kelurahan',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Kelurahan',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('wilayah/kelurahan', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
