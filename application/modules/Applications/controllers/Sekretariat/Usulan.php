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
 * Description of Usulan
 *
 * @author centos
 */
class Usulan extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $param = $this->bodo->Url($this->input->post_get('key')); // Array ( [0] => 2021 )
        $data = [
            'item_active' => 'Applications/Sekretariat/Usulan/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sekretariat/Usulan/index/'),
            'siteTitle' => 'Data Usulan Triwulan | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Usulan Triwulan Tahun ' . $param[0],
            'param' => $param,
            'pertahun' => $this->bodo->Curel('esbsnn/pertahun?KEY=BOBA'),
            'data' => $this->bodo->Curel('esbsnn/usulantriwulan?KEY=BOBA&usul_tahun=' . $param[0] . ''),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Usulan',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        if ($data['data'] == false) {
            $data['msg'] = "Data Usulan Triwulan Tahun " . $param[0] . " Tidak tersedia!";
        } else {
            $data['msg'] = "";
        }
        $data['content'] = $this->parser->parse('Usulan/V_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // Array ( [0] => 2021 as usul_tahun [1] => 18 as usul_propinsi[2] => Bali as propinsi_nama)
        $data = [
            'item_active' => 'Applications/Sekretariat/Usulan/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sekretariat/Usulan/index/'),
            'siteTitle' => 'Data Usulan Triwulan | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Usulan Triwulan Tahun ' . $param[0],
            'param' => $param,
            'data' => $this->bodo->Curel('esbsnn/usulantriwulan?KEY=BOBA&usul_tahun=' . $param[0] . '&usul_propinsi=' . $param[1] . ''),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Usulan',
                    'link' => base_url('Applications/Sekretariat/Usulan/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        if ($data['data'] == false) {
            $data['msg'] = "Data Usulan Triwulan Tahun " . $data['tahun'] . " Tidak tersedia!";
            $data['hide'] = "hidden";
        } else {
            $data['msg'] = null;
            $data['hide'] = null;
        }
        $data['content'] = $this->parser->parse('Usulan/V_Provinsi', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
