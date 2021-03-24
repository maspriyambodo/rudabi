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
 * Description of Rekap
 *
 * @author centos
 */
class Rekap extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Rekap?KEY=boba'),
            'item_active' => 'Applications/Emonev/Rekap/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Rekap/index/'),
            'siteTitle' => 'Rekapitulasi Data KUA | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Rekapitulasi Data KUA',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/Rekap_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
