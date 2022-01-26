<?php

defined('BASEPATH')OR exit('No direct script access allowed');

/**
 * Description of Pustaka
 *
 * @author centos
 */
class Pustaka extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            'data' => $this->bodo->Curel('pustaka/penerbit?KEY=boba'),
            'item_active' => 'Applications/Binsyar/Pustaka/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Pustaka/index/'),
            'siteTitle' => 'Data Pustaka Bimas Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Pustaka Bimas Islam',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('pustaka/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Penerbit() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 13 provinsi_id [1] => JAWA BARAT as provinsi_name)
        $data = [
            'data' => $this->bodo->Curel('pustaka/per_penerbit?KEY=boba&id=' . $param[0]),
            'param' => $param,
            'item_active' => 'Applications/Binsyar/Pustaka/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Pustaka/index/'),
            'siteTitle' => 'Data Pustaka Bimas Islam | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Pustaka Bimas Islam - Penerbit ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Binsyar/Pustaka/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Penerbit',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('pustaka/penerbit', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }


}
