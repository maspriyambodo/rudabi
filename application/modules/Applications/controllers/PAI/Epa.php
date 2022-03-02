<?php

defined('BASEPATH')OR exit('trying to signin backdoor?');

class Epa extends CI_Controller {

    public function index() {
        $data = [
            'item_active' => 'epa',
            'privilege' => $this->bodo->Check_previlege('epa'),
            'siteTitle' => 'Data Penyuluh Agama | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Penyuluh Agama',
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/epa_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $data = [
            'item_active' => 'epa',
            'privilege' => $this->bodo->Check_previlege('epa'),
            'siteTitle' => 'Penyuluh Agama | ' . Post_get('prov'),
            'pagetitle' => 'Penyuluh Agama | ' . Post_get('prov'),
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => base_url('epa/'),
                    'status' => false
                ],
                1 => [
                    'nama' => Post_get('prov'),
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/epa_prov', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
