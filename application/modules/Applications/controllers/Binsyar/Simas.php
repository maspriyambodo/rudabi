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
 * Description of Simas
 *
 * @author centos
 */
class Simas extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'eimas/datamasjid?KEY=boba'),
            'item_active' => 'Applications/Binsyar/Simas/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Simas/index/'),
            'siteTitle' => 'Data Masjid | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Masjid',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('masjid/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 13 provinsi_id [1] => JAWA BARAT as provinsi_name)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'eimas/datamasjid?KEY=boba&provinsi_id=' . $param[0]),
            'param' => $param,
            'item_active' => 'Applications/Binsyar/Simas/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Simas/index/'),
            'siteTitle' => 'Data Masjid | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Masjid - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Binsyar/Simas/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('masjid/provinsi', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 13 as provinsi_id [1] => JAWA BARAT as provinsi_name [2] => 165 as kabupaten_id [3] => KAB. SUKABUMI as kabupaten_name)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'eimas/datamasjid?KEY=boba&kabupaten_id=' . $param[2]),
            'param' => $param,
            'item_active' => 'Applications/Binsyar/Simas/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Simas/index/'),
            'siteTitle' => 'Data Masjid - Provinsi | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Masjid - ' . $param[3],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Binsyar/Simas/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/Binsyar/Simas/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('masjid/kabupaten', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kecamatan() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 13 as provinsi_id [1] => JAWA BARAT as provinsi_name [2] => 165 as kabupaten_id [3] => KAB. SUKABUMI as kabupaten_name [4] => 2075 as kecamatan_id [5] => Surade as kecamatan_name ) 
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'eimas/datamasjid?KEY=boba&kecamatan_id=' . $param[4]),
            'param' => $param,
            'item_active' => 'Applications/Binsyar/Simas/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Simas/index/'),
            'siteTitle' => 'Data Masjid - Kabupaten | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Masjid - Kecamatan ' . $param[5],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Binsyar/Simas/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/Binsyar/Simas/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => base_url('Applications/Binsyar/Simas/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $param[2] . '&d=' . $param[3]))),
                    'status' => false
                ],
                3 => [
                    'nama' => 'Kecamatan',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('masjid/kecamatan', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
