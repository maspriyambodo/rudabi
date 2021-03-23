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
 * Description of Catin
 *
 * @author centos
 */
class Catin extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'embimwin/datacatin?KEY=boba'),
            'item_active' => 'Applications/Bimwin/Catin/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Bimwin/Catin/index/'),
            'siteTitle' => 'Data Catin | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Catin',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('bimwin/catin_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Tahun() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2020 as tahun_target_wilayah)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'embimwin/datacatin?KEY=boba&tahun_target_wilayah=' . $param[0]),
            'param' => $param,
            'item_active' => 'Applications/Bimwin/Catin/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Bimwin/Catin/index/'),
            'siteTitle' => 'Data Catin | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Catin Tahun ' . $param[0],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Bimwin/Catin/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Tahun',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('bimwin/catin_tahun', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2020 as tahun_target_wilayah [1] => 11 as id_prop [2] => DKI JAKARTA as nama_lokasi)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'embimwin/datacatin?KEY=boba&tahun_target_wilayah=' . $param[0] . '&id_prop=' . $param[1]),
            'param' => $param,
            'item_active' => 'Applications/Bimwin/Catin/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Bimwin/Catin/index/'),
            'siteTitle' => 'Data Catin | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Catin Provinsi ' . $param[2],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Bimwin/Catin/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Tahun',
                    'link' => base_url('Applications/Bimwin/Catin/Tahun?key=' . $param[0]),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('bimwin/catin_kabupaten', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Detail() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2020 as tahun_target_wilayah [1] => 16 as id_prop [2] => JAWA TIMUR as nama_lokasi [3] => 162600 as kabkot [4] => KAB. BANGKALAN as nama_lokasi)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'embimwin/datacatin?KEY=boba&tahun_target_kua=' . $param[0] . '&kabkot=' . $param[3]),
            'param' => $param,
            'item_active' => 'Applications/Bimwin/Catin/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Bimwin/Catin/index/'),
            'siteTitle' => 'Data Catin | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Catin ' . $param[4],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Bimwin/Catin/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Tahun',
                    'link' => base_url('Applications/Bimwin/Catin/Tahun?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => base_url('Applications/Bimwin/Catin/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $param[2]))),
                    'status' => false
                ],
                3 => [
                    'nama' => 'Detail',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        if ($data['data']) {
            $data['content'] = $this->parser->parse('bimwin/catin_detail', $data, true);
        } else {
            $data['content'] = $this->parser->parse('bimwin/catin_error', $data, true);
        }
        return $this->parser->parse('Template/layout', $data);
    }

}
