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
 * Description of Penulis
 *
 * @author centos
 */
class Penulis extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel('simpenaiss/penulis?KEY=BOBA'),
            'item_active' => 'Applications/PAI/Penulis/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Penulis/index/'),
            'siteTitle' => 'Data Penulis Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Penulis Islam',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_penulis', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as province_id [1] => Nanggroe Aceh Darussalam as province_title)
        $data = [
            'data' => $this->bodo->Curel('simpenaiss/penulis?KEY=BOBA&province_id=' . $param[0]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Penulis/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Penulis/index/'),
            'siteTitle' => 'Data Penulis Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Penulis Islam - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Penulis/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_penulisprov', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 16 as province_id [1] => Jawa Timur as province_title [2] => 202 as city_id [3] => Jember as city_title)
        $data = [
            'data' => $this->bodo->Curel('simpenaiss/penulis?KEY=BOBA&city_id=' . $param[2]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Penulis/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Penulis/index/'),
            'siteTitle' => 'Data Penulis Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Penulis Islam - ' . $param[3],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Penulis/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/PAI/Penulis/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_penuliskab', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
