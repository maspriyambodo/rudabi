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
 * Description of Epai
 *
 * @author centos
 */
class Epai extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'epay?KEY=BOBA'),
            'item_active' => 'Applications/PAI/Epai/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Epai/index/'),
            'siteTitle' => 'Data Penyuluh Agama Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Penyuluh Agama Islam',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_Epai', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => AC as provinsi_kode [1] => Aceh as provinsi_nama)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'epay?KEY=BOBA&provinsi_kode=%27' . $param[0] . '%27'),
            'param' => $param,
            'item_active' => 'Applications/PAI/Epai/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Epai/index/'),
            'siteTitle' => 'Data Penyuluh Agama Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'PAI - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Epai/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_Epaiprov', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Detail() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => JK as provinsi_kode [1] => Jakarta as provinsi_nama [2] => JK01 as penyuluh_KabKota_Kode [3] => Kepulauan Seribu as kabkota_nama)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'epay/penyuluh?KEY=BOBA&penyuluh_KabKota_Kode=%27' . $param[2] . '%27'),
            'param' => $param,
            'item_active' => 'Applications/PAI/Epai/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Epai/index/'),
            'siteTitle' => 'Data Penyuluh Agama Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'PAI - ' . $param[3],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Epai/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/PAI/Epai/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] .'&b=' . $param[1]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Detail',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/V_Epaidetail', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
