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
 * Description of Simkah
 *
 * @author centos
 */
class Simkah extends CI_Controller {

    public function index() {
        $data = [
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/simkah?KEY=boba'),
            'item_active' => 'Applications/Emonev/Simkah/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Simkah/index/'),
            'siteTitle' => 'Rekap Penggunaan SIMKAH | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Penggunaan SIMKAH',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/Simkah_index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Detail() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 0 [1] => belum mengisi simkah )
        $data = [
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/simkah?KEY=boba&simkah=' . $param[0]),
            'item_active' => 'Applications/Emonev/Simkah/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Emonev/Simkah/index/'),
            'siteTitle' => 'Rekap Penggunaan SIMKAH | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Kategori - ' . $param[1],
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('emonev/Simkah_Detail', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

}
