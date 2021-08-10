<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baznas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Baznas_m', 'bm');
	}

	public function index() {
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simzat/baznas?KEY=boba'),
            'item_active' => 'Applications/Simzat/Baznas/',
            'privilege' => $this->bodo->Check_previlege('Applications/Simzat/Baznas/'),
            'siteTitle' => 'Data Baznas | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Baznas',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];

        $data['content'] = $this->parser->parse('simzat/baznas/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}

/* End of file Baznas.php */
/* Location: ./application/modules/Applications/controllers/Simzat/Baznas.php */