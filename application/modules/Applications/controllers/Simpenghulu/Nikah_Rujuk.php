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
 * Description of Nikah_Rujuk
 *
 * @author centos
 */
class Nikah_Rujuk extends CI_Controller {

    public function index() {
        $param = $this->bodo->Url($this->input->post_get('key'));
        $a[0] = (object) ['rekap_tahun' => 'Semua Tahun'];
        $b = json_decode($this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/kategoritahun?KEY=boba'));
        if (!isset($param)) {
            $url = $this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/nikahrujuk?KEY=boba');
        } elseif ($param[0] == "Semua Tahun") {
            $url = $this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/nikahrujuk?KEY=boba');
        } else {
            $url = $this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/nikahrujuk?KEY=boba&rekap_tahun=' . $param[0]);
        }
        $data = [
            'param' => $param,
            'data' => $url,
            'rekap_tahun' => array_merge($a, $b),
            'item_active' => 'Applications/Simpenghulu/Nikah_Rujuk/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Simpenghulu/Nikah_Rujuk/index/'),
            'siteTitle' => 'Rekapitulasi Nikah & Rujuk | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Rekapitulasi Nikah & Rujuk',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('simpenghulu/Rujuk_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2020 as rekap_tahun [1] => 1 as rekap_province [2] => ACEH province_title)
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/nikahrujuk?KEY=boba&rekap_province=' . $param[1] . '&rekap_tahun=' . $param[0]),
            'item_active' => 'Applications/Simpenghulu/Nikah_Rujuk/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Simpenghulu/Nikah_Rujuk/index/'),
            'siteTitle' => 'Rekapitulasi Nikah & Rujuk | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Rekapitulasi - Provinsi ' . $param[2] . ' Tahun ' . $param[0],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Simpenghulu/Nikah_Rujuk/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        if ($data['data'] == null) {
            $data['content'] = $this->parser->parse('simpenghulu/Rujuk_undifined', $data, true);
        } else {
            $data['content'] = $this->parser->parse('simpenghulu/Rujuk_Provinsi', $data, true);
        }
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2020 as rekap_tahun [1] => 1 as rekap_province [2] => Aceh as province_title [3] => 13 as city_id [4] => Kab. Aceh Gayo Lues as city_title ) 
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenghulu/nikahrujuk?KEY=boba&city_id=' . $param[3] . '&rekap_tahun=' . $param[0]),
            'item_active' => 'Applications/Simpenghulu/Nikah_Rujuk/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Simpenghulu/Nikah_Rujuk/index/'),
            'siteTitle' => 'Rekapitulasi Nikah & Rujuk | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Rekapitulasi - ' . $param[4] . ' Tahun ' . $param[0],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Simpenghulu/Nikah_Rujuk/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/Simpenghulu/Nikah_Rujuk/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $param[2]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('simpenghulu/Rujuk_Kabupaten', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
