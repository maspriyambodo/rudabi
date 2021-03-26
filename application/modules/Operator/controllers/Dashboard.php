<?php

defined('BASEPATH')OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            'title' => 'Dashboard Rudabi',
            'username' => $this->session->userdata('username'),
            'inpo' => date('d-m-Y')
        ];
        $data['content'] = $this->parser->parse('V_Dashboard', $data, true);
        return $this->parser->parse('Template', $data);
    }

}
