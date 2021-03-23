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
 * Description of Pegawai
 *
 * @author centos
 */
class Pegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            'item_active' => 'Applications/Sekretariat/Pegawai/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sekretariat/Pegawai/index/'),
            'siteTitle' => 'SICAKEP - Data Pegawai | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Pegawai',
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'sicakepp?KEY=BOBA'),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Pegawai',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('Pegawai/Pegawai_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); //output param Array ( [0] => DKI Jakarta as propinsi_nama [1] => 12 as peg_provinsi)
        $data = [
            'item_active' => 'Applications/Sekretariat/Pegawai/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sekretariat/Pegawai/index/'),
            'siteTitle' => 'Data Pegawai - Provinsi | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Pegawai - Provinsi ' . $param[0],
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'sicakepp?KEY=BOBA&peg_provinsi=' . $param[1]),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Pegawai',
                    'link' => base_url('Applications/Sekretariat/Pegawai/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('Pegawai/Pegawai_provinsi', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); //output param Array ( [0] => Jakarta Pusat as kab_nama [1] => 126 as peg_kabupaten [2] => DKI Jakarta as propinsi_nama [3] => 12 as peg_provinsi)
        $data = [
            'item_active' => 'Applications/Sekretariat/Pegawai/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sekretariat/Pegawai/index/'),
            'siteTitle' => 'Data Pegawai - Kabupaten | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Pegawai - ' . $param[0],
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'sicakepp?KEY=BOBA&peg_kabupaten=' . $param[1]),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Pegawai',
                    'link' => base_url('Applications/Sekretariat/Pegawai/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/Sekretariat/Pegawai/Provinsi?key=' .str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[2] . '&b=' . $param[3]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('Pegawai/Pegawai_Kabupaten', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Detail() {
        $param = $this->bodo->Url($this->input->post_get('key')); //output param Array ( [0] => 182 [1] => Ade Suryana [2] => Jakarta Pusat [3] => 126 [4] => DKI Jakarta [5] => 12 )
        $data = [
            'item_active' => 'Applications/Sekretariat/Pegawai/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sekretariat/Pegawai/index/'),
            'siteTitle' => 'Data Pegawai - Kabupaten | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Pegawai - ' . $param[1],
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'sicakepp?KEY=BOBA&peg_id=' . $param[0]),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Pegawai',
                    'link' => base_url('Applications/Sekretariat/Pegawai/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/Sekretariat/Pegawai/Provinsi?key=' .str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[2] . '&b=' . $param[3]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => base_url('Applications/Sekretariat/Pegawai/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[2] . '&b=' . $param[3] . '&c=' . $param[4] . '&d=' . $param[5]))),
                    'status' => false
                ],
                3 => [
                    'nama' => 'Detail',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('Pegawai/Pegawai_Detail', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
