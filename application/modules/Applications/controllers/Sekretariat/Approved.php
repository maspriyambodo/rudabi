<?php

defined('BASEPATH')OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Approved
 *
 * @author testinghumas
 */
class Approved extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $param = $this->bodo->Url($this->input->post_get('key')); // Array ( [0] => 2021 as year)
        if (!$param[0]) {
            $param[0] = date("Y");
        }
        $data = [
            'item_active' => 'Applications/Sekretariat/Approved/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sekretariat/Approved/index/'),
            'siteTitle' => 'Data Approved Usulan Tahun | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Approved Usulan Tahun ' . $param[0],
            'param' => $param,
            'pertahun' => $this->bodo->Curel($this->bodo->Url_API() . 'esbsnn/pertahun?KEY=BOBA'),
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'esbsnn/approveusulan?KEY=BOBA&usul_tahun=' . $param[0]),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Approved',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        if ($data['data'] == false) {
            $data['msg'] = "Data Approved Usulan Tahun " . $param[0] . " Tidak tersedia!";
        } else {
            $data['msg'] = false;
        }
        $data['content'] = $this->parser->parse('Approved/Approved_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // Array ( [0] => Sulawesi Selatan as propinsi_nama [1] => 2021 as year [2] => 28 as usul_propinsi )
        $data = [
            'item_active' => 'Applications/Sekretariat/Approved/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sekretariat/Approved/index/'),
            'siteTitle' => 'Data Approved Usulan Tahun | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Approved Usulan Tahun ' . $param[1],
            'param' => $param,
            'pertahun' => $this->bodo->Curel($this->bodo->Url_API() . 'esbsnn/pertahun?KEY=BOBA'),
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'esbsnn/approveusulan?KEY=BOBA&usul_tahun=' . $param[1] . '&usul_propinsi=' . $param[2] . ''),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Approved',
                    'link' => base_url('Applications/Sekretariat/Approved/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('Approved/Approved_Provinsi', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // Array ( [0] => Sulawesi Selatan as propinsi_nama [1] => 2021 as usul_tahun [2] => 28 as usul_propinsi [3] => 348 as usul_kabupaten [4] => Kab. Bone as kab_nama) 
        $data = [
            'item_active' => 'Applications/Sekretariat/Approved/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sekretariat/Approved/index/'),
            'siteTitle' => 'Data Approved Usulan Tahun | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Approved Provinsi ' . $param[0] . ' Tahun ' . $param[1],
            'param' => $param,
            'pertahun' => $this->bodo->Curel($this->bodo->Url_API() . 'esbsnn/pertahun?KEY=BOBA'),
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'esbsnn/approveusulan?KEY=BOBA&usul_tahun=' . $param[1] . '&usul_propinsi=' . $param[2] . '&usul_kabupaten=' . $param[3] . ''),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Approved',
                    'link' => base_url('Applications/Sekretariat/Approved/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/Sekretariat/Approved/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $param[2]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('Approved/Approved_Kabupaten', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
