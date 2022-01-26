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
 * Description of Registrasi
 *
 * @author centos
 */
class Registrasi extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel('monev/regmenag?KEY=boba'),
            'regkua' => $this->bodo->Curel('monev/regkua?KEY=boba'),
            'item_active' => 'Applications/Emonev/Registrasi/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Registrasi/index/'),
            'siteTitle' => 'Rekapitulasi Registrasi KANKEMENAG | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Rekapitulasi Registrasi Akun',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/Regis_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Status() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param =Array ( [0] => 0 [1] => akun tidak aktif )
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel('monev/regmenag?KEY=boba&status=' . $param[0]),
            'item_active' => 'Applications/Emonev/Registrasi/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Registrasi/index/'),
            'siteTitle' => 'Rekapitulasi Registrasi KANKEMENAG | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Registrasi Kankemenag',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Emonev/Registrasi/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Status',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/Regis_Status', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Statuskua() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 [1] => akun butuh approval )
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel('monev/regkua?KEY=boba&status=' . $param[0]),
            'item_active' => 'Applications/Emonev/Registrasi/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Registrasi/index/'),
            'siteTitle' => 'Rekapitulasi Registrasi KANKEMENAG | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Registrasi Kankemenag',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Emonev/Registrasi/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Status',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/Regis_Statuskua', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
