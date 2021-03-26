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
 * Description of Tanah
 *
 * @author centos
 */
class Tanah extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Emonev/M_emonev');
        $this->Authentication = $this->M_emonev->Auth();
    }

    public function index() {
        $data = [
            'title' => 'E-Monev Status Tanah KUA | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/statustanah?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Tanah_index', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Statustanah() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 0 [1] => Tidak Mengisi Inputan )
        $data = [
            'title' => 'Status Tanah KUA ' . $param[1] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Stattanah?KEY=boba&statustanah=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Tanah_Status', $data, true);
        return $this->parser->parse('Users/u_binakua//Template', $data);
    }

}
