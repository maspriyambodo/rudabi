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
 * Description of Seniman
 *
 * @author centos
 */
class Seniman extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel('simpenaiss/seniman?KEY=BOBA'),
            'item_active' => 'Applications/PAI/Seniman/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Seniman/index/'),
            'siteTitle' => 'Data Seniman Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Seniman Islam',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_Seniman', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 8 as province_id [1] => Bengkulu as province_title)
        $data = [
            'data' => $this->bodo->Curel('simpenaiss/seniman?KEY=BOBA&province_id=' . $param[0]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Seniman/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Seniman/index/'),
            'siteTitle' => 'Data Seniman Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Seniman Islam - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Seniman/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_Senimanprov', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 17 as province_id [1] => Banten as province_title [2] => 233 as city_id [3] => Lebak city_title)
        $data = [
            'data' => $this->bodo->Curel('simpenaiss/seniman?KEY=BOBA&city_id=' . $param[2]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Seniman/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Seniman/index/'),
            'siteTitle' => 'Data Seniman Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Seniman Islam - ' . $param[3],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Seniman/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/PAI/Seniman/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_Senimankab', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
