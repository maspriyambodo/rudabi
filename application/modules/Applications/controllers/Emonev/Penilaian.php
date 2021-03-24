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
 * Description of Penilaian
 *
 * @author centos
 */
class Penilaian extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Penilaian?KEY=boba'),
            'item_active' => 'Applications/Emonev/Penilaian/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Penilaian/index/'),
            'siteTitle' => 'Rekapitulasi Penilaian KUA | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Rekapitulasi Penilaian KUA',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/Penilaian_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Tahun() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2016 )
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Penilaian?KEY=boba&tahun=' . $param[0]),
            'item_active' => 'Applications/Emonev/Penilaian/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Penilaian/index/'),
            'siteTitle' => 'Rekapitulasi Penilaian KUA | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Penilaian KUA Tahun - ' . $param[0],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Emonev/Penilaian/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Tahun',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/Penilaian_Tahun', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2017 as tahun [1] => 01 as kodekua [2] => ACEH as propinsi ) 
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Penilaian?KEY=boba&tahun=2017&kodekua=01'),
            'item_active' => 'Applications/Emonev/Penilaian/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Penilaian/index/'),
            'siteTitle' => 'Rekapitulasi Penilaian KUA | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Penilaian KUA - Provinsi ' . $param[2],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Emonev/Penilaian/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Tahun',
                    'link' => base_url('Applications/Emonev/Penilaian/Tahun?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/Penilaian_Kabupaten', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Detail() {
        $param = $this->bodo->Url(Post_get("key")); // output $param = Array ( [0] => 2017 as tahun [1] => 01 as kodekua [2] => ACEH as propinsi [3] => 0101 as kodekab [4] => KABUPATEN ACEH SELATAN as kabupaten ) 
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Penilaian?KEY=boba&tahun=' . $param[0] . '&kodekab=' . $param[3] . ''),
            'item_active' => 'Applications/Emonev/Penilaian/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Penilaian/index/'),
            'siteTitle' => 'Rekapitulasi Penilaian KUA | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Penilaian KUA - ' . $param[4],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Emonev/Penilaian/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Tahun',
                    'link' => base_url('Applications/Emonev/Penilaian/Tahun?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/Emonev/Penilaian/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $param[2]))),
                    'status' => false
                ],
                3 => [
                    'nama' => 'Detail',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        if($data['data']){
            $data['content'] = $this->parser->parse('emonev/Penilaian_Detail', $data, true);
        } else {
            $data['content'] = $this->parser->parse('emonev/Penilaian_error', $data, true);
        }
        return $this->parser->parse('Template/layout', $data);
    }

}
