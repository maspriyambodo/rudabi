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
 * Description of Mushalla
 *
 * @author centos
 */
class Mushalla extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            'data' => $this->bodo->Curel('eimas/datamushalla?KEY=boba'),
            'item_active' => 'Applications/Binsyar/Mushalla/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Mushalla/index/'),
            'siteTitle' => 'Data Mushalla | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Mushalla',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('mushalla/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 as provinsi_id [1] => ACEH as provinsi_name )
        $data = [
            'data' => $this->bodo->Curel('eimas/datamushalla?KEY=boba&provinsi_id=' . $param[0]),
            'param' => $param,
            'item_active' => 'Applications/Binsyar/Mushalla/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Mushalla/index/'),
            'siteTitle' => 'Data Mushalla Provinsi | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Mushalla - Provinsi ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Binsyar/Mushalla/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('mushalla/provinsi', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 16 as provinsi_id [1] => JAWA TIMUR as provinsi_name [2] => 236 as kabupaten_id [3] => KAB. MALANG as kabupaten_name)
        $data = [
            'data' => $this->bodo->Curel('eimas/datamushalla?KEY=boba&kabupaten_id=' . $param[2]),
            'param' => $param,
            'item_active' => 'Applications/Binsyar/Mushalla/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Mushalla/index/'),
            'siteTitle' => 'Data Mushalla Provinsi | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Mushalla - ' . $param[3],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Binsyar/Mushalla/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/Binsyar/Mushalla/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('mushalla/kabupaten', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Detail() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 16 as provinsi_id [1] => JAWA TIMUR as provinsi_name [2] => 236 as kabupaten_id [3] => KAB. MALANG as kabupaten_name [4] => 239 as kecamatan_id [5] => Rantau as kecamatan_name)
        $data = [
            'data' => $this->bodo->Curel('eimas/datamushalla?KEY=boba&kecamatan_id=' . $param[4]),
            'param' => $param,
            'item_active' => 'Applications/Binsyar/Mushalla/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Mushalla/index/'),
            'siteTitle' => 'Data Mushalla Kabupaten | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Mushalla - Kecamatan ' . $param[5],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Binsyar/Mushalla/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Provinsi',
                    'link' => base_url('Applications/Binsyar/Mushalla/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))),
                    'status' => false
                ],
                2 => [
                    'nama' => 'Kabupaten',
                    'link' => base_url('Applications/Binsyar/Mushalla/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $param[2] . '&d=' . $param[3]))),
                    'status' => false
                ],
                3 => [
                    'nama' => 'Kecamatan',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('mushalla/kecamatan', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
