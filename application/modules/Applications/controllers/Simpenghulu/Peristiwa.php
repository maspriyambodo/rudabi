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
 * Description of Peristiwa
 *
 * @author centos
 */
class Peristiwa extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel('simpenghulu/nikah?KEY=boba'),
            'item_active' => 'Applications/Simpenghulu/Peristiwa/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Simpenghulu/Peristiwa/index/'),
            'siteTitle' => 'Rekapitulasi Data Peristiwa Nikah | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Rekapitulasi Peristiwa Nikah',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('simpenghulu/Peristiwa_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as city_province [1] => Aceh as province_title )
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel('simpenghulu/nikah?KEY=boba&city_province=' . $param[0]),
            'item_active' => 'Applications/Simpenghulu/Peristiwa/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Simpenghulu/Peristiwa/index/'),
            'siteTitle' => 'Rekapitulasi Data Peristiwa Nikah | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Peristiwa Nikah - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Simpenghulu/Peristiwa/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('simpenghulu/Peristiwa_Provinsi', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Detail() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 3 as nikah_city_id [1] => Kab. Aceh Selatan as city_title [2] => 1 as city_province [3] => Aceh as province_title ) 
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel('simpenghulu/nikah?KEY=boba&nikah_city_id=' . $param[0]),
            'item_active' => 'Applications/Simpenghulu/Peristiwa/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Simpenghulu/Peristiwa/index/'),
            'siteTitle' => 'Rekapitulasi Data Peristiwa Nikah | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Peristiwa Nikah - ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Simpenghulu/Peristiwa/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/Simpenghulu/Peristiwa/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[2] . '&b=' . $param[3]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Detail',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('simpenghulu/Peristiwa_Detail', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
