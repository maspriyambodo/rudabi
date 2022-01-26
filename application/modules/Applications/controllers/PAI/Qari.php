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
class Qari extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel('simpenaiss/qari?KEY=BOBA'),
            'item_active' => 'Applications/PAI/Qari/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Qari/index/'),
            'siteTitle' => 'Data Qari &amp; Qariah | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Qari &amp; Qariah',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_qari', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as province_id [1] => Nanggroe Aceh Darussalam as province_title)
        $data = [
            'data' => $this->bodo->Curel('simpenaiss/qari?KEY=BOBA&province_id=' . $param[0]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Qari/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Qari/index/'),
            'siteTitle' => 'Data Qari &amp; Qariah | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Qari &amp; Qariah - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Qari/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_qariprov', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 16 as province_id [1] => Jawa Timur as province_title [2] => 223 as city_id [3] => Kabupaten Kediri as city_title)
        $data = [
            'data' => $this->bodo->Curel('simpenaiss/qari?KEY=BOBA&city_id=' . $param[2]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Qari/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Qari/index/'),
            'siteTitle' => 'Data Qari &amp; Qariah | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Qari &amp; Qariah - ' . $param[3],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Qari/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/PAI/Qari/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_qarikab', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
