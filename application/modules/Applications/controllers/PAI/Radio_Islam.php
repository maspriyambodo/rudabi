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
 * Description of Radio_Islam
 *
 * @author centos
 */
class Radio_Islam extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel('simpenaiss/radio?KEY=BOBA'),
            'item_active' => 'Applications/PAI/Radio_Islam/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Radio_Islam/index/'),
            'siteTitle' => 'Data Radio Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Radio Islam',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_radio', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as province_id [1] => Nanggroe Aceh Darussalam as province_title)
        $data = [
            'data' => $this->bodo->Curel('simpenaiss/radio?KEY=BOBA&province_id=' . $param[0]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Radio_Islam/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Radio_Islam/index/'),
            'siteTitle' => 'Data Radio Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Radio Islam - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Radio_Islam/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_radioprov', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 16 as province_id [1] => Jawa Timur as province_title [2] => 215 as city_id [3] => Bojonegoro as city_title)
        $data = [
            'data' => $this->bodo->Curel('simpenaiss/radio?KEY=BOBA&city_id=' . $param[2]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Radio_Islam/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Radio_Islam/index/'),
            'siteTitle' => 'Data Radio Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Radio Islam - ' . $param[3],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Radio_Islam/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/PAI/Radio_Islam/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_radiokab', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
