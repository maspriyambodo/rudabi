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
class Kaligrafer extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/kaligrafer?KEY=BOBA'),
            'item_active' => 'Applications/PAI/Kaligrafer/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Kaligrafer/index/'),
            'siteTitle' => 'Data Kaligrafer | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Kaligrafer',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_Kaligrafer', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 18 as province_id [1] => Bali as province_title)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/kaligrafer?KEY=BOBA&province_id=' . $param[0]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Kaligrafer/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Kaligrafer/index/'),
            'siteTitle' => 'Data Kaligrafer | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Kaligrafer - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Kaligrafer/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_Kaligraferprov', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 18 as province_id [1] => Bali as province_title [2] => 245 as city_id [3] => Buleleng ascity_title)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/kaligrafer?KEY=BOBA&city_id=' . $param[2]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Kaligrafer/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Kaligrafer/index/'),
            'siteTitle' => 'Data Kaligrafer | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Kaligrafer - ' . $param[3],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Kaligrafer/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/PAI/Kaligrafer/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_Kaligraferkab', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
