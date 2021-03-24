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
 * Description of Isian
 *
 * @author centos
 */
class Isian extends CI_Controller {

    public function index() {
        $data = [
            'urung_input' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Rekap?KEY=boba'),
            'rekap' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Isian?KEY=boba'),
            'item_active' => 'Applications/Emonev/Isian/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Isian/index/'),
            'siteTitle' => 'Rekapitulasi Isian KUA | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Rekapitulasi Isian KUA',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/Isian_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
