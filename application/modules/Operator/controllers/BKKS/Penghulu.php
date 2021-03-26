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
 * Description of Penghulu
 *
 * @author centos
 */
class Penghulu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Simpenghulu/M_simpenghulu');
        $this->Authentication = $this->M_simpenghulu->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Sistem Informasi Kepenghuluan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/penghulu?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Penghulu_index', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 13 as city_province [1] => Jawa Barat as province_title)
        $data = [
            'title' => 'Sistem Informasi Kepenghuluan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/penghulu?KEY=boba&city_province=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Penghulu_Kabupaten', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Detail() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 129 as city_id [1] => Kab. Bogor as city_title [2] => 13 as city_province [3] => Jawa Barat as province_title) 
        $data = [
            'title' => 'Sistem Informasi Kepenghuluan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/penghulu?KEY=boba&city_id=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Penghulu_Detail', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

}
