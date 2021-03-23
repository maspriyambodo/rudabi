<?php

defined('BASEPATH')OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pensiun
 *
 * @author testinghumas
 */
class Pensiun extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            'item_active' => 'Applications/Sekretariat/Pensiun/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sekretariat/Pensiun/index/'),
            'siteTitle' => 'SICAKEP - Data Pensiun | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Mutasi Pegawai Pensiun',
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'sicakepp/pensiun?KEY=BOBA'),
            'gol' => $this->bodo->Curel($this->bodo->Url_API() . 'sicakepp/golongan?KEY=BOBA'),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Pensiun',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('Pensiun/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 17 [1] => Banten )
        $data = [
            'item_active' => 'Applications/Sekretariat/Pensiun/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sekretariat/Pensiun/index/'),
            'siteTitle' => 'SICAKEP - Data Pensiun | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Pensiun - Provinsi ' . $param[1],
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'sicakepp/pensiun?KEY=BOBA&peg_provinsi=' . $param[0]),
            'gol' => $this->bodo->Curel($this->bodo->Url_API() . 'sicakepp/golongan?KEY=BOBA'),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Pensiun',
                    'link' => base_url('Applications/Sekretariat/Pensiun/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('Pensiun/Provinsi', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 126 as kab_id [1] => Jakarta Pusat as kab_nama [2] => 12 as peg_provinsi [3] => DKI Jakarta as propinsi_nama ) 
        $data = [
            'item_active' => 'Applications/Sekretariat/Pensiun/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sekretariat/Pensiun/index/'),
            'siteTitle' => 'SICAKEP - Provinsi | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Pensiun - ' . $param[1],
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'sicakepp/pensiun?KEY=boba&kab_id=' . $param[0]),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Pensiun',
                    'link' => base_url('Applications/Sekretariat/Pensiun/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/Sekretariat/Pensiun/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[2] . '&b=' . $param[3]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('Pensiun/V_Kabupaten', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Golongan() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 126 as kab_id [1] => Jakarta Pusat as kab_nama [2] => 217 as item_id [3] => I/a - Juru Muda as item_name [4] => 12 as peg_provinsi [5] => DKI Jakarta as propinsi_nama )
        $data = [
            'item_active' => 'Applications/Sekretariat/Pensiun/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sekretariat/Pensiun/index/'),
            'siteTitle' => 'SICAKEP - Provinsi | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Pensiun - Golongan ' . $param[3],
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'sicakepp/pensiun?KEY=boba&kab_id=' . $param[0] . '&item_id=' . $param[2] . ''),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Pensiun',
                    'link' => base_url('Applications/Sekretariat/Pensiun/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/Sekretariat/Pensiun/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[2] . '&b=' . $param[3]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Golongan',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('Pensiun/Golongan', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
