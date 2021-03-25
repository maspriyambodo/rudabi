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
class Bimwin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('KUA/M_Bimwin');
        $this->Authentication = $this->M_Bimwin->Auth();
    }

    private function Dec($enc) {
        $encrypt = str_replace(['-', '_', '~'], ['+', '/', '='], $enc);
        $dec = $this->encryption->decrypt($encrypt);
        return $dec;
    }

    public function index() {
        $data = [
            'title' => 'Target Catin | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => json_decode(file_get_contents($this->bodo->Url_API() . 'embimwin/targetcatin2020?KEY=BOBA'))
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/V_Tcatinpusat', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Provinsi($id, $prov) {
        $data = [
            'title' => 'Target CATIN | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'id' => $id,
            'provinsi' => str_replace(['_', '%20'], ' ', $prov),
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'embimwin/targetcatin2020?KEY=BOBA&id_prop=' . $id)
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/V_bimwinprov', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Targetcatin($id) {
        $dec = $this->Dec($id);
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
