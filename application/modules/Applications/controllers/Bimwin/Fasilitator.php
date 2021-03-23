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
 * Description of Fasilitator
 *
 * @author centos
 */
class Fasilitator extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'embimwin/fasilitator?KEY=boba'),
            'item_active' => 'Applications/Bimwin/Fasilitator/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Bimwin/Fasilitator/index/'),
            'siteTitle' => 'Data Fasilitator | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Fasilitator',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('bimwin/fasilitator_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as id_j_kegiatan [1] => Bimbingan Pra Nikah as jenis_kegiatan)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'embimwin/fasilitator?KEY=boba&id_j_kegiatan=' . $param[0]),
            'param' => $param,
            'item_active' => 'Applications/Bimwin/Fasilitator/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Bimwin/Fasilitator/index/'),
            'siteTitle' => 'Data Fasilitator | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Fasilitator',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Bimwin/Fasilitator/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('bimwin/fasilitator_prov', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
