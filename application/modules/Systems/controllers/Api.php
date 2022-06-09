<?php

defined('BASEPATH') OR exit('trying to signin backdoor?');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_api');
        $this->user = Dekrip($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Systems/Api/index/',
            'privilege' => $this->bodo->Check_previlege('Systems/Api/index/'),
            'siteTitle' => 'API Management',
            'pagetitle' => 'API Management',
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('api_system/api_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
