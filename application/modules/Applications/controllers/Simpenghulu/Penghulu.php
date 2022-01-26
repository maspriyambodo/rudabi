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
 * Description of Penghulu
 *
 * @author centos
 */
class Penghulu extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel('simpenghulu/penghulu?KEY=boba'),
            'item_active' => 'Applications/Simpenghulu/Penghulu/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Simpenghulu/Penghulu/index/'),
            'siteTitle' => 'Rekapitulasi Data Penghulu | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Rekapitulasi Data Penghulu',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('simpenghulu/Penghulu_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 13 as city_province [1] => Jawa Barat as province_title)
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel('simpenghulu/penghulu?KEY=boba&city_province=' . $param[0]),
            'item_active' => 'Applications/Simpenghulu/Penghulu/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Simpenghulu/Penghulu/index/'),
            'siteTitle' => 'Rekapitulasi Data Penghulu | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Rekapitulasi Data Penghulu - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Simpenghulu/Penghulu/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('simpenghulu/Penghulu_Kabupaten', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Detail() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 129 as city_id [1] => Kab. Bogor as city_title [2] => 13 as city_province [3] => Jawa Barat as province_title) 
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel('simpenghulu/penghulu?KEY=boba&city_id=' . $param[0]),
            'item_active' => 'Applications/Simpenghulu/Penghulu/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Simpenghulu/Penghulu/index/'),
            'siteTitle' => 'Rekapitulasi Data Penghulu | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Rekapitulasi Data Penghulu - ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Simpenghulu/Penghulu/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/Simpenghulu/Penghulu/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[2] . '&b=' . $param[3]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Detail',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('simpenghulu/Penghulu_Detail', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
