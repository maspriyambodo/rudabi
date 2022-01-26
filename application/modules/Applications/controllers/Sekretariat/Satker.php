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
 * Description of Satker
 *
 * @author centos
 */
class Satker extends CI_Controller {

    var $username;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            'item_active' => 'Applications/Sekretariat/Satker/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sekretariat/Satker/index/'),
            'siteTitle' => 'Data SATKER | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Satker Tahun ' . date('Y'),
            'data' => file_get_contents('esbsnn?KEY=boba'),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Satker',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('Satker/V_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // Array ( [0] => 18 [1] => Bali )
        $data = [
            'item_active' => 'Applications/Sekretariat/Satker/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Sekretariat/Satker/index/'),
            'siteTitle' => 'Data SATKER | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'SATKER PROVINSI ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Satker',
                    'link' => base_url('Applications/Sekretariat/Satker/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ],
            'data' => $this->bodo->Curel('esbsnn?KEY=BOBA&kab_propinsi_id=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Satker/V_Provinsi', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
