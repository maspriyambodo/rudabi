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
 * Description of Emonev
 *
 * @author centos
 */
class Emonev extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Emonev/M_emonev');
        $this->Authentication = $this->M_emonev->Auth();
    }

    public function index() {
        $data = [
            'title' => 'E-Monev | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev?KEY=boba'),
            'kankemenag' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/propinsi?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Emonev_index', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Kankemenag() {
        $param = $this->bodo->Url($this->input->post_get('key')); //Output Array ( [0] => 23 [1] => ACEH )
        $data = [
            'title' => 'Kantor Kemenag Provinsi ' . $param[1] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/propinsi?KEY=boba&kodekab=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Emonev_Kankemenag', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); //Output Array ( [0] => 02 [1] => SUMATERA UTARA ) 
        $data = [
            'title' => 'E-Monev | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev?KEY=boba&kodekua=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Emonev_Provinsi', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

}
