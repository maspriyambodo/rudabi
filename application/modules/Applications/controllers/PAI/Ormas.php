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
 * Description of Ormas
 *
 * @author centos
 */
class Ormas extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/ormas?KEY=BOBA'),
            'item_active' => 'Applications/PAI/Ormas/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Ormas/index/'),
            'siteTitle' => 'Ormas Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Ormas Islam',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_ormas', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 12 as province_id [1] => DKI Jakarta as province_title)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/ormas?KEY=BOBA&province_id=' . $param[0]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Ormas/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Ormas/index/'),
            'siteTitle' => 'Ormas Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Ormas Islam - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Ormas/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_ormasprov', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 16 as province_id [1] => Jawa Timur as province_title [2] => 215 as city_id [3] => Bojonegoro as city_title)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/ormas?KEY=BOBA&city_id=' . $param[2]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Ormas/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Ormas/index/'),
            'siteTitle' => 'Ormas Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Ormas Islam - ' . $param[3],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Ormas/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/PAI/Ormas/Provinsi?key' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_ormaskab', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
