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
 * Description of Bangunan
 *
 * @author centos
 */
class Bangunan extends CI_Controller {

    public function index() {
        $data = [
            'bangunan' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Statbangunan?KEY=boba'),
            'item_active' => 'Applications/Emonev/Bangunan/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Bangunan/index/'),
            'siteTitle' => 'Status Bangunan KUA | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Status Bangunan KUA',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/Bangunan_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Statusbangunan() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 0 [1] => Tidak Mengisi Inputan )
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Stat_bangunan?KEY=boba&status=' . $param[0]),
            'item_active' => 'Applications/Emonev/Bangunan/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Bangunan/index/'),
            'siteTitle' => 'Status Bangunan KUA | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Status Bangunan KUA - ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Emonev/Bangunan/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Status',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/Bangunan_Status', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
