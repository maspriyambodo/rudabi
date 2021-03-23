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
 * Description of Pengukuran
 *
 * @author centos
 */
class Pengukuran extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            'item_active' => 'Applications/Binsyar/Pengukuran/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Pengukuran/index/'),
            'siteTitle' => 'Data Hisab Pengukuran | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Hisab Pengukuran',
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siihat/hisabpengukuran?KEY=boba'),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('hisab_pengukuran/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as ukur_provinsi [1] => Aceh as province_title) 
        $data = [
            'item_active' => 'Applications/Binsyar/Pengukuran/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Pengukuran/index/'),
            'siteTitle' => 'Data Hisab Pengukuran | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Hisab Pengukuran - Provinsi ' . $param[1],
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siihat/hisabpengukuran?KEY=boba&ukur_provinsi=' . $param[0]),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Binsyar/Pengukuran/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('hisab_pengukuran/provinsi', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
