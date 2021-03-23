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
 * Description of Lokasi
 *
 * @author testinghumas
 */
class Lokasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            'item_active' => 'Applications/Binsyar/Lokasi/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Lokasi/index/'),
            'siteTitle' => 'Data Hisab Lokasi | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Hisab Lokasi',
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siihat/hisablokasi?KEY=boba'),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('lokasi_hisab/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2 as lokasi_provinsi [1] => Sumatera Utara as province_title)
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siihat/hisablokasi?KEY=boba&lokasi_provinsi=' . $param[0]),
            'item_active' => 'Applications/Binsyar/Lokasi/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Lokasi/index/'),
            'siteTitle' => 'Data Hisab Lokasi | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Hisab Lokasi - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Binsyar/Lokasi/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('lokasi_hisab/provinsi', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
