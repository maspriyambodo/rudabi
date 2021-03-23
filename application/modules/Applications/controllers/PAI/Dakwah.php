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
 * Description of Lptq
 *
 * @author centos
 */
class Dakwah extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/dakwah?KEY=BOBA'),
            'item_active' => 'Applications/PAI/Dakwah/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Dakwah/index/'),
            'siteTitle' => 'Lembaga Dakwah | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Lembaga Dakwah',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_dakwah', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 5 as province_id [1] => Jambi as province_title)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/dakwah?KEY=BOBA&province_id=' . $param[0]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Dakwah/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Dakwah/index/'),
            'siteTitle' => 'Lembaga Dakwah Provinsi | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Lembaga Dakwah - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Dakwah/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_dakwahprov', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 5 as province_id [1] => Jambi as province_title [2] => 190 as city_id [3] => Bantul as city_title)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/dakwah?KEY=BOBA&city_id=' . $param[2]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Dakwah/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Dakwah/index/'),
            'siteTitle' => 'Lembaga Dakwah Provinsi | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Lembaga Dakwah - ' . $param[3],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/PAI/Dakwah/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_dakwahkab', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
