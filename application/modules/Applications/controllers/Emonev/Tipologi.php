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
 * Description of Tipologi
 *
 * @author centos
 */
class Tipologi extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/tipologi?KEY=boba'),
            'item_active' => 'Applications/Emonev/Tipologi/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Tipologi/index/'),
            'siteTitle' => 'Data Tipologi KUA | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Tipologi KUA',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/Tipologi_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Tipokua() {
        $param = $this->bodo->Url(Post_get("key"));
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Tipokua?KEY=boba&tipokua=' . $param[0]),
            'item_active' => 'Applications/Emonev/Tipologi/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Tipologi/index/'),
            'siteTitle' => 'Jenis Tipologi KUA | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Tipologi KUA - '  . $param[0],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => base_url('Applications/Emonev/Tipologi/index/'),
                    'status' => false
                ],
                1 => [
                    'nama' => 'Tipologi',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/Tipologi_Tipokua', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
