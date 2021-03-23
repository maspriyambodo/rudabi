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
 * Description of Guru_ngaji
 *
 * @author centos
 */
class Hafiz extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/hafiz?KEY=BOBA'),
            'item_active' => 'Applications/PAI/Hafiz/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Hafiz/index/'),
            'siteTitle' => 'Hafidz & Hafidzah | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Hafidz &amp; Hafidzah',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_hafiz', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 14 as province_id [1] => Jawa Tengah as province_title)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/hafiz?KEY=BOBA&province_id=' . $param[0]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Hafiz/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Hafiz/index/'),
            'siteTitle' => 'Hafidz & Hafidzah | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Hafidz &amp; Hafidzah - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Hafiz/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_hafizprov', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 14 as province_id [1] => Jawa Tengah as province_title [2] => 160 as city_id [3] => Wonosobo as city_title )
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/hafiz?KEY=BOBA&city_id=' . $param[2]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Hafiz/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Hafiz/index/'),
            'siteTitle' => 'Hafidz & Hafidzah | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Hafidz &amp; Hafidzah - ' . $param[3],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Hafiz/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/PAI/Hafiz/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_hafizkab', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
