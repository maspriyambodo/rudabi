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
 * Description of Seni_Islam
 *
 * @author centos
 */
class Seni_Islam extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel('simpenaiss/lembagaseni?KEY=BOBA'),
            'item_active' => 'Applications/PAI/Seni_Islam/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Seni_Islam/index/'),
            'siteTitle' => 'Lembaga Seni Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Lembaga Seni Islam',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_seni', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 16 as lembaga_seni_provinsi [1] => Jawa Timur as province_title)
        $data = [
            'data' => $this->bodo->Curel('simpenaiss/lembagaseni?KEY=BOBA&lembaga_seni_provinsi=' . $param[0]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Seni_Islam/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Seni_Islam/index/'),
            'siteTitle' => 'Lembaga Seni Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Lembaga Seni Islam - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Seni_Islam/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_seniprov', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 16 as lembaga_seni_provinsi [1] => Jawa Timur as province_title [2] => 215 as city_id [3] => Bojonegoro as city_title)
        $data = [
            'data' => $this->bodo->Curel('simpenaiss/lembagaseni?KEY=BOBA&city_id=' . $param[2]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Seni_Islam/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Seni_Islam/index/'),
            'siteTitle' => 'Lembaga Seni Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Lembaga Seni Islam - ' . $param[3],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Seni_Islam/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/PAI/Seni_Islam/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))),
                    'status' => true
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_senikab', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
