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
 * Description of Registrasi
 *
 * @author centos
 */
class Registrasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Emonev/M_emonev');
        $this->Authentication = $this->M_emonev->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Rekapitulasi Registrasi KANKEMENAG | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/regmenag?KEY=boba'),
            'regkua' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/regkua?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Regis_index', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Status() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param =Array ( [0] => 0 [1] => akun tidak aktif )
        $data = [
            'title' => 'Registrasi Kankemenag ' . $param[1] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/regmenag?KEY=boba&status=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Regis_Status', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

    public function Statuskua() {
        $param = $this->bodo->Url($this->input->post_get('key')); // output $param = Array ( [0] => 1 [1] => akun butuh approval )
        $data = [
            'title' => 'Registrasi KUA ' . $param[1] . ' | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'param' => $param,
            'data' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/regkua?KEY=boba&status=' . $param[0])
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Regis_Statuskua', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

}
