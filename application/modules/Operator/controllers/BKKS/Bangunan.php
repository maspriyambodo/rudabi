<?php

defined('BASEPATH')OR exit('No direct script access allowed');
/*
 * Product:        System of kementerian agama Republik Indonesia
 * License Type:   Government
 * Access Type:    Multi-User
 * License:        https://maspriyambodo.com
 * maspriyambodo@gmail.com
 * 
 * Thank you,
 * maspriyambodo
 */

/**
 * Description of Bangunan
 *
 * @author centos
 */
class Bangunan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Emonev/M_emonev');
        $this->Authentication = $this->M_emonev->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Status Bangunan KUA | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'bangunan' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Statbangunan?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Bangunan_index', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Statusbangunan() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 0 [1] => Tidak Mengisi Inputan )
        $data = [
            'title' => 'Status Bangunan KUA ' . $param[1] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Stat_bangunan?KEY=boba&status=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Bangunan_Status', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

}
