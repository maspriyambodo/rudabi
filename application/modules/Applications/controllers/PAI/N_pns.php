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
 * Description of N_pns
 *
 * @author centos
 */
class N_pns extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/datanonpns?KEY=boba'),
            'item_active' => 'Applications/PAI/Pns/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Pns/index/'),
            'siteTitle' => 'Penyuluh Agama Islam Non-PNS | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Penyuluh Agama Islam Non-PNS',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/Nonpns_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 17 as penyuluh_nonpns_provinsi [1] => Banten as province_title)
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'simpenaiss/datanonpns?KEY=boba&penyuluh_nonpns_provinsi=' . $param[0]),
            'param' => $param,
            'item_active' => 'Applications/PAI/Pns/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/PAI/Pns/index/'),
            'siteTitle' => 'Penyuluh Agama Islam Non-PNS | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'PAI Non-PNS - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/PAI/Pns/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('PAI/Nonpns_provinsi', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
