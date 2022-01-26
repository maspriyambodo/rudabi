<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sipaham extends CI_Controller {

	public function index() {
        $data = [
            'data' => $this->bodo->Curel('sipaham?KEY=boba'),
            'item_active' => 'Applications/Sipaham/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sipaham/index/'),
            'siteTitle' => 'Data Konflik | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Konflik',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];

        $data['content'] = $this->parser->parse('sipaham/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}

/* End of file Sipaham.php */
/* Location: ./application/modules/Applications/controllers/Sipaham/Sipaham.php */