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
 * Description of Laporan
 *
 * @author centos
 */
class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            'data' => $this->bodo->Curel('siihat/hisablaporan?KEY=BOBA'),
            'item_active' => 'Applications/Binsyar/Laporan/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Laporan/index/'),
            'siteTitle' => 'Data Laporan Hisab | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Laporan Hisab',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('laporan_hisab/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 12 as ukur_provinsi [1] => Jawa Barat as province_title)
        $data = [
            'data' => $this->bodo->Curel('siihat/hisablaporan?KEY=BOBA&ukur_provinsi=' . $param[0]),
            'param' => $param,
            'item_active' => 'Applications/Binsyar/Laporan/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Laporan/index/'),
            'siteTitle' => 'Data Laporan Hisab | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Laporan Hisab - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Binsyar/Laporan/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('laporan_hisab/provinsi', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
