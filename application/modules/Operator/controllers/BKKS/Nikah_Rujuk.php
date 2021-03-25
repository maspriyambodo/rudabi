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
 * Description of Nikah_Rujuk
 *
 * @author centos
 */
class Nikah_Rujuk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Simpenghulu/M_simpenghulu');
        $this->Authentication = $this->M_simpenghulu->Auth();
    }

    public function index() {
        $param = $this->bodo->Url($this->input->post_get('key'));
        $a[0] = (object) ['rekap_tahun' => 'Semua Tahun'];
        $b = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/kategoritahun?KEY=boba'));
        if (!isset($param)) {
            $url = $this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/nikahrujuk?KEY=boba');
        } elseif ($param[0] == "Semua Tahun") {
            $url = $this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/nikahrujuk?KEY=boba');
        } else {
            $url = $this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/nikahrujuk?KEY=boba&rekap_tahun=' . $param[0]);
        }
        $data = [
            'title' => 'Sistem Informasi Kepenghuluan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $param,
            'data' => $url,
            'rekap_tahun' => array_merge($a, $b)
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Rujuk_index', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2020 as rekap_tahun [1] => 1 as rekap_province [2] => ACEH province_title)
        $data = [
            'title' => 'Sistem Informasi Kepenghuluan | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/nikahrujuk?KEY=boba&rekap_province=' . $param[1] . '&rekap_tahun=' . $param[0])
        ];
        if ($data['data'] == null) {
            $data['content'] = $this->parser->parse('Users/u_binakua/Rujuk_undifined', $data, true);
        } else {
            $data['content'] = $this->parser->parse('Users/u_binakua/Rujuk_Provinsi', $data, true);
        }
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2020 as rekap_tahun [1] => 1 as rekap_province [2] => Aceh as province_title [3] => 13 as city_id [4] => Kab. Aceh Gayo Lues as city_title ) 
        $data = [
            'title' => 'Rekap Data Nikah & Rujuk ' . $param[4] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/nikahrujuk?KEY=boba&city_id=' . $param[3] . '&rekap_tahun=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Rujuk_Kabupaten', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

}
