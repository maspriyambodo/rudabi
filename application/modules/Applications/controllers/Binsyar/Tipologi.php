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

    public function __construct() {
        parent::__construct();
    }

    public function Masjid() {
        $data = [
            'data' => $this->bodo->Curel('eimas/tipologimasjid?KEY=boba'),
            'item_active' => 'Applications/Binsyar/Tipologi/Masjid/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Tipologi/Masjid/'),
            'siteTitle' => 'Data Masjid Tipologi | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Masjid Tipologi',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('tipologi/masjid', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Mushalla() {
        $data = [
            'data' => $this->bodo->Curel('eimas/tipologimushalla?KEY=boba'),
            'item_active' => 'Applications/Binsyar/Tipologi/Mushalla/',
            'privilege' => $this->bodo->Check_previlege('Applications/Binsyar/Tipologi/Mushalla/'),
            'siteTitle' => 'Data Mushalla Tipologi | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Mushalla Tipologi',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('tipologi/mushalla', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
