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
 * Description of Peristiwa
 *
 * @author centos
 */
class Peristiwa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Simpenghulu/M_simpenghulu');
        $this->Authentication = $this->M_simpenghulu->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Sistem Informasi Kepenghuluan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/nikah?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Peristiwa_index', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as city_province [1] => Aceh as province_title )
        $data = [
            'title' => 'Sistem Informasi Kepenghuluan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/nikah?KEY=boba&city_province=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Peristiwa_Provinsi', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Detail() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 3 as nikah_city_id [1] => Kab. Aceh Selatan as city_title [2] => 1 as city_province [3] => Aceh as province_title ) 
        $data = [
            'title' => 'Sistem Informasi Kepenghuluan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/nikah?KEY=boba&nikah_city_id=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Peristiwa_Detail', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

}
