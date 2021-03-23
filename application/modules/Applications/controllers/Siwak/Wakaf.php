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
 * Description of Siwak
 *
 * @author centos
 */
class Wakaf extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siwaks/tanahwakaf?KEY=boba'),
            'item_active' => 'Applications/Siwak/Wakaf/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Siwak/Wakaf/index/'),
            'siteTitle' => 'Data Wakaf Tanah | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Wakaf Tanah',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('siwak/wakaf_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 11 as Lokasi_Prop [1] => ACEH as lokasi_nama)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siwaks/tanahwakaf?KEY=boba&Lokasi_Prop=' . $param[0]),
            'param' => $param,
            'item_active' => 'Applications/Siwak/Wakaf/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Siwak/Wakaf/index/'),
            'siteTitle' => 'Data Wakaf Tanah | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Wakaf Tanah - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Siwak/Wakaf/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('siwak/wakaf_prov', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 11 as Lokasi_Prop [1] => ACEH as lokasi_nama [2] => 11.06 as lokasi_kode [3] => KABUPATEN ACEH BARAT as lokasi_nama)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siwaks/tanahwakaf?KEY=boba&lokasi_kode=' . $param[2]),
            'param' => $param,
            'item_active' => 'Applications/Siwak/Wakaf/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Siwak/Wakaf/index/'),
            'siteTitle' => 'Data Wakaf Tanah | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Wakaf Tanah - ' . $param[3],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Siwak/Wakaf/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/Siwak/Wakaf/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('siwak/wakaf_kab', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kecamatan() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 11 [1] => ACEH as lokasi_nama [2] => 11.05 as lokasi_kode [3] => KABUPATEN ACEH TENGAH as lokasi_nama [4] => 68679 as lokasi_ID [5] => KOTA TAKENGON as lokasi_nama)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'siwaks/tanahwakaf?KEY=boba&lokasi_ID=' . $param[4]),
            'param' => $param,
            'item_active' => 'Applications/Siwak/Wakaf/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Siwak/Wakaf/index/'),
            'siteTitle' => 'Data Wakaf Tanah | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Wakaf Tanah Detail - ' . $param[5],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Siwak/Wakaf/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/Siwak/Wakaf/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => base_url('Applications/Siwak/Wakaf/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $param[2] . '&d=' . $param[3]))),
                    'status' => false
                ],
                3 => [
                    'nama' => 'Detail',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('siwak/wakaf_detail', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
