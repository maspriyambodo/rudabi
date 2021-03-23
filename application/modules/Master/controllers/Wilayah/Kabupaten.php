<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupaten extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Master/Wilayah/Kabupaten/index/',
            'privilege' => $this->bodo->Check_previlege('Master/Wilayah/Kabupaten/index/'),
            'siteTitle' => 'Master Wilayah Kabupaten | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Kabupaten',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('wilayah/kabupaten', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
