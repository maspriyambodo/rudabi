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
 * Description of Tanah
 *
 * @author centos
 */
class Tanah extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/statustanah?KEY=boba'),
            'item_active' => 'Applications/Emonev/Tanah/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Tanah/index/'),
            'siteTitle' => 'Status Tanah KUA | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Status Tanah KUA',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null, // base_url('Applications/Emonev/Tanah/index/')
                    'status' => false
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/Tanah_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Statustanah() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 0 [1] => Tidak Mengisi Inputan )
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Stattanah?KEY=boba&statustanah=' . $param[0]),
            'item_active' => 'Applications/Emonev/Tanah/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Tanah/index/'),
            'siteTitle' => 'Status Tanah KUA | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Status Tanah KUA - ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Emonev/Tanah/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Status',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/Tanah_Status', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
