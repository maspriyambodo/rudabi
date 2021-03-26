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
 * Description of Catin
 *
 * @author centos
 */
class Catin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BKKS/M_Bimwin');
        $this->Authentication = $this->M_Bimwin->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Data Catin | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'embimwin/datacatin?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Catin_index', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Tahun() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2020 as tahun_target_wilayah)
        $data = [
            'title' => 'Data Catin Tahun ' . $param[0] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'embimwin/datacatin?KEY=boba&tahun_target_wilayah=' . $param[0]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Catin_Provinsi', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Kabupaten() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2020 as tahun_target_wilayah [1] => 11 as id_prop [2] => DKI JAKARTA as nama_lokasi)
        $data = [
            'title' => 'Data Catin Tahun ' . $param[0] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'embimwin/datacatin?KEY=boba&tahun_target_wilayah=' . $param[0] . '&id_prop=' . $param[1]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Catin_Kabupaten', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Detail() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 2020 as tahun_target_wilayah [1] => 16 as id_prop [2] => JAWA TIMUR as nama_lokasi [3] => 162600 as kabkot [4] => KAB. BANGKALAN as nama_lokasi)
        $data = [
            'title' => 'Data Catin Provinsi ' . $param[2] . '| RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'embimwin/datacatin?KEY=boba&tahun_target_kua=' . $param[0] . '&kabkot=' . $param[3]),
            'param' => $param
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Catin_Detail', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

}
