<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laznas extends CI_Controller {

	public function index() {
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simzat/laznas?KEY=boba'),
            'item_active' => 'Applications/Simzat/Laznas/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Simzat/Laznas/index/'),
            'siteTitle' => 'Data Laznas | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Laznas',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];

        $data['content'] = $this->parser->parse('simzat/laznas/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}

/* End of file Baznas.php */
/* Location: ./application/modules/Applications/controllers/Simzat/Laznas.php */