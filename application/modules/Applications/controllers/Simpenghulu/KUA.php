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
 * Description of KUA
 *
 * @author centos
 */
class KUA extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel('simpenghulu/kua?KEY=boba'),
            'item_active' => 'Applications/Simpenghulu/KUA/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Simpenghulu/KUA/index/'),
            'siteTitle' => 'Data Penghulu | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Penghulu',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('simpenghulu/V_kua', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 16 as kua_province_id [1] => Jawa Timur as province_title )
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel('simpenghulu/kua?KEY=boba&kua_province_id=' . $param[0]),
            'item_active' => 'Applications/Simpenghulu/KUA/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Simpenghulu/KUA/index/'),
            'siteTitle' => 'Data Penghulu | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Penghulu - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Simpenghulu/KUA/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('simpenghulu/V_kuaprov', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Detail() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 225 as kua_city_id [1] => Kab. Malang as city_title [2] => 16 as kua_province_id [3] => Jawa Timur as province_title)
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel('simpenghulu/kua?KEY=boba&kua_city_id=' . $param[0]),
            'item_active' => 'Applications/Simpenghulu/KUA/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Simpenghulu/KUA/index/'),
            'siteTitle' => 'Data Penghulu | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Penghulu - ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Simpenghulu/KUA/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/Simpenghulu/KUA/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[2] . '&b=' . $param[3]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Detail',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('simpenghulu/V_kuadetail', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
