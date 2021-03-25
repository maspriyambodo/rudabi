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

    public function __construct() {
        parent::__construct();
        $this->load->model('Emonev/M_emonev');
        $this->Authentication = $this->M_emonev->Auth();
    }

    public function index() {
        $data = [
            'title' => 'Rekapitulasi Isian KUA | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->session->userdata('username'),
            'urung_input' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Rekap?KEY=boba'),
            'rekap' => $this->bodo->Curel($this->bodo->Url_API() . 'monev/Isian?KEY=boba')
        ];
        $data['content'] = $this->parser->parse('Users/u_binakua/Isian_index', $data, true);
        return $this->parser->parse('Users/u_binakua/Template', $data);
    }

}
