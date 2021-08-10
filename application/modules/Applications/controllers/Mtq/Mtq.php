<?php

defined('BASEPATH') OR exit('No direct script access allowed');
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
 * Description of Mtq
 *
 * @author centos
 */
class Mtq extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
    }

    public function index() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Applications/Mtq/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Mtq/index/'),
            'pagetitle' => 'Data M T Q',
            'siteTitle' => 'Dashboard MTQ | ' . $this->bodo->Sys('app_name'),
            'breadcrumb' => [
                0 => [
                    'nama' => 'mtq',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse("mtq/index", $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Get_mtq1() {
        $curl = new Curl\Curl();
        $curl->get('http://10.1.99.90/rudabi_api/datapi/Mtq/detailpesertapropinsi?KEY=boba');
        if ($curl->error) {
            echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
        } else {
            ToJson($curl->response);
        }
    }

}
