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
 * Description of Ahli
 *
 * @author centos
 */
class Ahli extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            'item_active' => 'Applications/Binsyar/Ahli/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Ahli/index/'),
            'siteTitle' => 'Data Tenaga Ahli | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Tenaga Ahli',
            'data' => $this->bodo->Curel('siihat/tenagaahli?KEY=boba'),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('tenaga_ahli/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as tenaga_provinsi [1] => Aceh as province_title)
        $data = [
            'item_active' => 'Applications/Binsyar/Ahli/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Ahli/index/'),
            'siteTitle' => 'Data Tenaga Ahli | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Tenaga Ahli - Provinsi ' . $param[1],
            'data' => $this->bodo->Curel('siihat/tenagaahli?KEY=boba&tenaga_provinsi=' . $param[0]),
            'param' => $param,
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Binsyar/Ahli/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('tenaga_ahli/provinsi', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
