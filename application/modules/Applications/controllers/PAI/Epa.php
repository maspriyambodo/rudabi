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

}
