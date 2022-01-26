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
 * Description of Lintang
 *
 * @author centos
 */
class Lintang extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            'data' => $this->bodo->Curel('siihat/datalintang?KEY=BOBA'),
            'item_active' => 'Applications/Binsyar/Lintang/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Lintang/index/'),
            'siteTitle' => 'Data Lintang Kota | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Lintang Kota',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('hisab_lintang/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as nama_propinsi [1] => Aceh as province_title)
        $data = [
            'data' => $this->bodo->Curel('siihat/datalintang?KEY=BOBA&nama_propinsi=1'),
            'param' => $param,
            'item_active' => 'Applications/Binsyar/Lintang/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Lintang/index/'),
            'siteTitle' => 'Data Lintang Kota | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Lintang Kota - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Binsyar/Lintang/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('hisab_lintang/provinsi', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
