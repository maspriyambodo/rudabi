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
 * Description of Penilaian
 *
 * @author centos
 */
class Penilaian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Emonev/M_emonev');
        $this->Authentication = $this->M_emonev->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Rekapitulasi Penilaian KUA | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Penilaian?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Penilaian_index', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Tahun() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2016 )
        $data = [
            'title' => 'Detail Penilaian KUA Tahun ' . $param[0] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Penilaian?KEY=boba&tahun=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Penilaian_Tahun', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2017 as tahun [1] => 01 as kodekua [2] => ACEH as propinsi ) 
        $data = [
            'title' => 'Detail Penilaian KUA Provinsi ' . $param[0] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Penilaian?KEY=boba&tahun=2017&kodekua=01')
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Penilaian_Kabupaten', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Detail() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2017 as tahun [1] => 01 as kodekua [2] => ACEH as propinsi [3] => 0101 as kodekab [4] => KABUPATEN ACEH SELATAN as kabupaten ) 
        $data = [
            'title' => 'Detail Penilaian KUA Kabupaten ' . $param[4] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Penilaian?KEY=boba&tahun=' . $param[0] . '&kodekab=' . $param[3] . '')
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Penilaian_Detail', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

}
