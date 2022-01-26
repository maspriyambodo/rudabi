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
 * Description of Majelis
 *
 * @author centos
 */
class Majelis extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel('simpenaiss/majelistaklim?KEY=BOBA'),
            'item_active' => 'Applications/PAI/Majelis/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Majelis/index/'),
            'siteTitle' => 'Data Majelis Taklim | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Majelis Taklim',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/majelis_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 30 as province_id [1] => Gorontalo as province_title) 
        $data = [
            'data' => $this->bodo->Curel('simpenaiss/majelistaklim?KEY=BOBA&province_id=' . $param[0]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Majelis/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Majelis/index/'),
            'siteTitle' => 'Data Majelis Taklim | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Majelis Taklim - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Majelis/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/majelis_prov', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 13 as province_id [1] => Jawa Barat as province_title [2] => 7 as city_id [3] => Aceh Barat as city_title )
        $data = [
            'data' => $this->bodo->Curel('simpenaiss/majelistaklim?KEY=BOBA&city_id=' . $param[2]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Majelis/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Majelis/index/'),
            'siteTitle' => 'Data Majelis Taklim | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Majelis Taklim - ' . $param[3],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Majelis/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/PAI/Majelis/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/majelis_kab', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
