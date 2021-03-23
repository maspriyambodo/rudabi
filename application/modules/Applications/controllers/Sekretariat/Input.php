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
 * Description of Input
 *
 * @author centos
 */
class Input extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $param = $this->bodo->Url($this->input->post_get('key')); // Array ( [0] => 2021 )
        if (!$param[0]) {
            $param[0] = date("Y");
        }
        $data = [
            'item_active' => 'Applications/Sekretariat/Input/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sekretariat/Input/index/'),
            'siteTitle' => 'Data Input Triwulan | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Input Triwulan Tahun ' . $param[0],
            'param' => $param,
            'pertahun' => $this->bodo->Curel($this->bodo->Url_API() . 'esbsnn/pertahun?KEY=BOBA'),
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'esbsnn/inputusulan?KEY=BOBA&usul_tahun=' . $param[0] . ''),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Input',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        if ($data['data'] == false) {
            $data['msg'] = "Data Input Triwulan Tahun " . $param[0] . " Tidak tersedia!";
        } else {
            $data['msg'] = "";
        }
        $data['content'] = $this->parser->parse('Input/Input_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // Array ( [0] => as year [1] => 17 as usul_propinsi [2] => Banten as propinsi_nama)
        $data = [
            'item_active' => 'Applications/Sekretariat/Input/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sekretariat/Input/index/'),
            'siteTitle' => 'Data Input Triwulan | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Input provinsi ' . $param[2] . ' Tahun ' . $param[0],
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'esbsnn/inputusulan?KEY=BOBA&usul_tahun=' . $param[0] . '&usul_propinsi=' . $param[1] . ''),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Input',
                    'link' => base_url('Applications/Sekretariat/Input/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Data Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        if ($data['data'] == false) {
            $data['msg'] = "Data Input Triwulan Tahun " . $data['tahun'] . " Tidak tersedia!";
            $data['hide'] = "hidden";
        } else {
            $data['msg'] = null;
            $data['hide'] = null;
        }
        $data['content'] = $this->parser->parse('Input/Input_Provinsi', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // Array ( [0] => Kab. Pandeglang [1] => 2021 as year [2] => 17 as usul_propinsi [3] => 232 as usul_kabupaten [4] => Banten as propinsi_nama)
        $data = [
            'item_active' => 'Applications/Sekretariat/Input/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sekretariat/Input/index/'),
            'siteTitle' => 'Data Input Triwulan | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Input Triwulan ' . $param[0] . ' Tahun ' . $param[1],
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'esbsnn/inputusulan?KEY=BOBA&usul_tahun=' . $param[1] . '&usul_propinsi=' . $param[2] . '&usul_kabupaten=' . $param[3]),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Input',
                    'link' => base_url('Applications/Sekretariat/Input/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Data Provinsi',
                    'link' => base_url('Applications/Sekretariat/Input/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[1] . '&b=' . $param[2] . '&c=' . $param[4]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Data Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('Input/Input_Kabupaten', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
