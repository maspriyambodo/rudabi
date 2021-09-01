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
 * Description of Simkah
 *
 * @author centos
 */
class Simkah extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
        $this->load->model('M_simkah', 'model');
    }

    public function index() {
        $year = Post_get('year');
        $data = [
            'year' => $year,
            'item_active' => 'Applications/Simkah/index/?year=0',
            'privilege' => $this->bodo->Check_previlege('Applications/Simkah/index/?year=0'),
            'siteTitle' => 'Data SIMKAH | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Data SIMKAH Tahun ' . ($year == 0 ? date('Y') : $year),
            'breadcrumb' => [
                0 => [
                    'nama' => 'simkah',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('simkah/v_index', $data, true);
        $this->Update_simkah();
        return $this->parser->parse('Template/layout', $data);
    }

    public function Get_simkah() {
        $exec = $this->model->index();
        ToJson($exec);
    }

    public function Update_simkah() {
        $old_data = $this->model->index();
        $new_data = $this->Get_nikah();
        foreach ($new_data as $key => $value) {
            if ($value['value'] != $old_data[$key]->jumlah) {
                $update[] = (object) [
                            'provinsi' => $value['name'],
                            'jumlah' => $value['value']
                ];
            }
        }
//        print_r($update[0]->provinsi);die;
        $exec = $this->model->Update_simkah($update);
        return $exec;
    }

    private function Get_nikah() {
        $year = Post_get('year');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://simkah.kemenag.go.id/api/grafik/daftarnikah?tahun=' . ($year == 0 ? date('Y') : $year) . '&level=pusat',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic c2lta2FoX3NpbTpzaW1rYWhzaW1AIQ==',
                'Cookie: cookiesession1=678B28A6WYZABCDEFHIJKLMNOPQR08DC',
                'Accept: */*',
                'Connection: keep-alive',
                'Accept-Encoding: gzip, deflate, br',
                'Content-Type: application/json'
            )
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $json = json_decode($response, true);
        return $json['data'];
    }

}
