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
 * Description of Rekap_kua
 *
 * @author centos
 */
class Rekap_kua extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel('monev?KEY=boba'),
            'kankemenag' => $this->bodo->Curel('monev/propinsi?KEY=boba'),
            'item_active' => 'Applications/Emonev/Rekap_kua/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Rekap_kua/index/'),
            'siteTitle' => 'Rekap Data KUA | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Rekap Data KUA',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/rekapkua_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kankemenag() {
        $param = $this->bodo->Url($this->input->post_get('key')); //Output Array ( [0] => 23 [1] => ACEH )
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel('monev/propinsi?KEY=boba&kodekab=' . $param[0]),
            'item_active' => 'Applications/Emonev/Rekap_kua/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Rekap_kua/index/'),
            'siteTitle' => 'Data Kantor Kemenag | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Kantor Kemenag - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Emonev/Rekap_kua/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Kankemenag',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/rekapkua_kankemenag', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); //Output Array ( [0] => 02 [1] => SUMATERA UTARA ) 
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel('monev?KEY=boba&kodekua=' . $param[0]),
            'item_active' => 'Applications/Emonev/Rekap_kua/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Rekap_kua/index/'),
            'siteTitle' => 'Data KUA | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data KUA - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Emonev/Rekap_kua/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/rekapkua_prov', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
