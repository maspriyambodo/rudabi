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
 * Description of Sihat
 *
 * @author centos
 */
class Sihat extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            'item_active' => 'Applications/Binsyar/Sihat/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Sihat/index/'),
            'siteTitle' => 'Data Alat Hisab Rukyat | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Alat Hisab Rukyat',
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siihat/alat2020?KEY=BOBA'),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('alat_hisab/Sihat_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 12 as alat_provinsi[1] => Jawa Barat as province_title )
        $data = [
            'item_active' => 'Applications/Binsyar/Sihat/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Sihat/index/'),
            'siteTitle' => 'Data Alat Hisab Rukyat | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Alat Hisab Rukyat - Provinsi ' . $param[1],
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siihat/alat2020?KEY=BOBA&alat_provinsi=' . $param[0]),
            'param' => $param,
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Binsyar/Sihat/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('alat_hisab/Sihat_provinsi', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
