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
 * Description of Bimwin
 *
 * @author centos
 */
class Target extends CI_Controller {

    public function index() {
        $data = [
            'data' => json_decode(file_get_contents($this->bodo->Url_API() . 'embimwin/targetcatin2020?KEY=BOBA')),
            'item_active' => 'Applications/Bimwin/Target/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Bimwin/Target/index/'),
            'siteTitle' => 'Data Target Catin | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Target Catin',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('bimwin/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Provinsi($id, $prov) {
        $data = [
            'id' => $id,
            'provinsi' => str_replace(['_', '%20'], ' ', $prov),
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'embimwin/targetcatin2020?KEY=BOBA&id_prop=' . $id),
            'item_active' => 'Applications/Bimwin/Target/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Bimwin/Target/index/'),
            'siteTitle' => 'Data Target Catin - Provinsi | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data Target Catin - Provinsi ' . $prov,
            'breadcrumb' => [
                0 => [
                    'nama' => 'Home',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('bimwin/provinsi', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Targetcatin($id) {
        $dec = $this->bodo->Dec($id);
        if (strlen($id) <= 99) {
            $data = '[{"kabkot":0,"nama_lokasi":"","target_kabkot":"","anggaran":0,"total_anggaran":0,"realisasi_kabupaten":0,"total_realisasi":0,"persentase_realisasi":0}]';
        } else {
            $data = $this->bodo->Curel($this->bodo->Url_API() . 'embimwin/targetcatin2020?KEY=BOBA&id_prop=' . $dec);
        }
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output($data)
                ->_display();
        exit;
    }

}
