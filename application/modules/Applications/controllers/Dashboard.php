<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
        $this->load->model('M_dashboard', 'model');
//        $this->curl = new Curl\Curl();
    }

    public function index() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Applications/Dashboard/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Dashboard/index/'),
            'pagetitle' => 'Dashboard',
            'siteTitle' => 'Dashboard Application | ' . $this->bodo->Sys('app_name'),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Dashboard',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse("v_dashboard", $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Search() {
        $data = [
            'result' => $this->model->Search(Post_input('searchtxt')),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Applications/Dashboard/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Dashboard/index/'),
            'siteTitle' => 'Search Result | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Search Result',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Search',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('v_search', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Try_leaflet() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Applications/Dashboard/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Dashboard/index/'),
            'siteTitle' => 'Try_leaflet | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Try_leaflet',
            'breadcrumb' => [
                0 => [
                    'nama' => 'index',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('v_leaflet', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function loc_kec_set() {
        //https://maps.googleapis.com/maps/api/geocode/json?address=Kec.+Blora,Kabupaten+Blora&key=AIzaSyB4-lf1Di7j6hQU9-7ycvYLjqoGsXCqE-c
        $dt_kec = [];
        $kec = $this->model->m_kecamatan();
        foreach ($kec as $key => $new_kec) {
            $dt_kec[$key]['id_kecamatan'] = $new_kec->id_kecamatan;
            $dt_kec[$key]['id_kabupaten'] = $new_kec->id_kabupaten;
            $dt_kec[$key]['nama_kecamatan'] = str_replace([' '], ['+'], $new_kec->nama_kecamatan);
            $dt_kec[$key]['nama_kabupaten'] = str_replace([' ', 'KAB.'], ['+', 'Kabupaten'], $new_kec->nama_kabupaten);
        }
        for ($index = 0; $index < count($dt_kec); $index++) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://maps.googleapis.com/maps/api/geocode/json?address=Kec.+' . $dt_kec[$index]['nama_kecamatan'] . ',Kabupaten+' . $dt_kec[$index]['nama_kabupaten'] . '&key=AIzaSyB4-lf1Di7j6hQU9-7ycvYLjqoGsXCqE-c',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Cookie: cookiesession1=678B28A6WYZABCDEFHIJKLMNOPQR08DC',
                    'Accept: */*',
                    'Connection: keep-alive',
                    'Accept-Encoding: gzip, deflate, br',
                    'Content-Type: application/json'
                )
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $jso = json_decode($response, true);
            $dt_kec[$index]['latitude'] = $jso['results'][0]['geometry']['location']['lat'];
            $dt_kec[$index]['longitude'] = $jso['results'][0]['geometry']['location']['lng'];
        }
        $update_geoloc = $this->model->m_updateGeoloct($dt_kec);
        echo 'success updating ' . $update_geoloc . ' from ' . count($dt_kec) . ' data!';
    }

    public function loc_kab_set() {
        //https://maps.googleapis.com/maps/api/geocode/json?address=Kabupaten+Blora,+Blora&key=AIzaSyB4-lf1Di7j6hQU9-7ycvYLjqoGsXCqE-c
        $dt_kec = [];
        $kec = $this->model->m_kabupaten();
        foreach ($kec as $key => $new_kec) {
            $dt_kec[$key]['id_kabupaten'] = $new_kec->id_kabupaten;
            $dt_kec[$key]['id_provinsi'] = $new_kec->id_provinsi;
            $dt_kec[$key]['nama_kabupaten'] = str_replace([' ', 'KAB.'], ['+', ''], $new_kec->nama_kabupaten);
            $dt_kec[$key]['nama_provinsi'] = str_replace([' '], ['+'], $new_kec->nama_provinsi);
        }
        for ($index = 0; $index < count($dt_kec); $index++) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://maps.googleapis.com/maps/api/geocode/json?address=Kabupaten+' . $dt_kec[$index]['nama_kabupaten'] . ',+' . $dt_kec[$index]['nama_provinsi'] . '&key=AIzaSyB4-lf1Di7j6hQU9-7ycvYLjqoGsXCqE-c',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Cookie: cookiesession1=678B28A6WYZABCDEFHIJKLMNOPQR08DC',
                    'Accept: */*',
                    'Connection: keep-alive',
                    'Accept-Encoding: gzip, deflate, br',
                    'Content-Type: application/json'
                )
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $jso = json_decode($response, true);
            $dt_kec[$index]['latitude'] = $jso['results'][0]['geometry']['location']['lat'];
            $dt_kec[$index]['longitude'] = $jso['results'][0]['geometry']['location']['lng'];
        }
        $update_geoloc = $this->model->m_updateKab($dt_kec);
        echo 'success updating ' . $update_geoloc . ' from ' . count($dt_kec) . ' data!';
    }
    
    public function loc_kel_set() {
        //https://maps.googleapis.com/maps/api/geocode/json?address=nama_kelurahan,+Kec.+nama_kecamatan,+nama_kabupaten&key=AIzaSyB4-lf1Di7j6hQU9-7ycvYLjqoGsXCqE-c
        $dt_kec = [];
        $kec = $this->model->m_kelurahan();
        foreach ($kec as $key => $new_kec) {
            $dt_kec[$key]['id_kelurahan'] = $new_kec->id_kelurahan;
            $dt_kec[$key]['id_kecamatan'] = $new_kec->id_kecamatan;
            $dt_kec[$key]['nama_kelurahan'] = str_replace([' '], ['+'], $new_kec->nama_kelurahan);
            $dt_kec[$key]['nama_kecamatan'] = str_replace([' '], ['+'], $new_kec->nama_kecamatan);
        }
        for ($index = 0; $index < count($dt_kec); $index++) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $dt_kec[$index]['nama_kelurahan'] . ',+Kec.+' . $dt_kec[$index]['nama_kecamatan'] . '&key=AIzaSyB4-lf1Di7j6hQU9-7ycvYLjqoGsXCqE-c',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Cookie: cookiesession1=678B28A6WYZABCDEFHIJKLMNOPQR08DC',
                    'Accept: */*',
                    'Connection: keep-alive',
                    'Accept-Encoding: gzip, deflate, br',
                    'Content-Type: application/json'
                )
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $jso = json_decode($response, true);
            $dt_kec[$index]['latitude'] = $jso['results'][0]['geometry']['location']['lat'];
            $dt_kec[$index]['longitude'] = $jso['results'][0]['geometry']['location']['lng'];
        }
        $update_geoloc = $this->model->m_updateKel($dt_kec);
        echo 'success updating ' . $update_geoloc . ' from ' . count($dt_kec) . ' data!';
    }

}
