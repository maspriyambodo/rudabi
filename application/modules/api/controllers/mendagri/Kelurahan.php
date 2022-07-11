<?php

defined('BASEPATH') || exit('trying to signin backdoor?');

class Kelurahan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_mendagri/M_kelurahan', 'model');
        $this->user = Dekrip($this->session->userdata('id_user'));
    }

    public function index() {
//        $this->session->set_userdata('resultOffset', 1000);die;
        $resultOffset = $this->session->userdata('resultOffset');
        $resultRecordCount = 1000;
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://gis.dukcapil.kemendagri.go.id/arcgis/rest/services/Data_Baru_26092017/MapServer/3/query?f=json&where=1%3D1&returnGeometry=false&spatialRel=esriSpatialRelIntersects&outFields=*&orderByFields=giskemendagri.gisadmin.Desa_Spasial_22092017.kode201701%20ASC&resultOffset=" . $resultOffset . "&resultRecordCount=" . $resultRecordCount,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie: AGS_ROLES="419jqfa+uOZgYod4xPOQ8Q=="'
            )
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        $jso = json_decode($response, true);
        $data = [];
        $tot_data = count($jso['features']);
//        print_array($jso['features'][99]['attributes']['giskemendagri.gisadmin.Desa_Spasial_22092017.kode201701']);
//        print_r(count($jso['features']));
        for ($index = 0; $index < $tot_data; $index++) {
            if (!$jso['features'][$index]['attributes']['giskemendagri.gisadmin.Desa_Spasial_22092017.kode201701']) {
                unset($jso['features'][$index]);
            }
            $newarr = $jso['features'];
        }
        $newarr = array_values($newarr);
        for ($index1 = 0; $index1 < count($newarr); $index1++) {
            $kd_kel = $newarr[$index1]['attributes']['giskemendagri.gisadmin.Desa_Tabel_26092017_2.kode_desa_'];
            $kd_kec = substr($kd_kel, 0, -4);
            $kd_kab = substr($kd_kec, 0, 4);
            $kd_prov = substr($kd_kab, 0, 2);
            $data[] = [
                'kode_kel' => $kd_kel,
                'kode_kec' => $kd_kec,
                'kode_kab' => $kd_kab,
                'kode_prov' => $kd_prov,
                'nama_prop_' => $newarr[$index1]['attributes']['giskemendagri.gisadmin.Desa_Tabel_26092017_2.nama_prop_'],
                'nama_kab_s' => $newarr[$index1]['attributes']['giskemendagri.gisadmin.Desa_Tabel_26092017_2.nama_kab_s'],
                'nama_kec_s' => $newarr[$index1]['attributes']['giskemendagri.gisadmin.Desa_Tabel_26092017_2.nama_kec_s'],
                'nama_kel_s' => $newarr[$index1]['attributes']['giskemendagri.gisadmin.Desa_Tabel_26092017_2.nama_kel_s'],
                'jumlah_pen' => $newarr[$index1]['attributes']['giskemendagri.gisadmin.Desa_Tabel_26092017_2.jumlah_pen'],
                'islam' => $newarr[$index1]['attributes']['giskemendagri.gisadmin.Desa_Tabel_26092017_2.islam']
            ];
        }
        $exec = $this->model->insert_kel($data);
        $succ_msg = 'sukses tambah data ' . $exec . ' dari ' . count($newarr) . ' total data! ID ' . $resultOffset . ' s/d ' . ($resultOffset + 1000);
        $sess_resultOffset = $this->session->userdata('resultOffset');
        $this->session->unset_userdata('resultOffset');
        if ($sess_resultOffset == 90000 || $sess_resultOffset > 84000) {
            $this->session->unset_userdata('resultOffset');
            die('all data has been insert!');
        } else {
            $this->session->set_userdata('resultOffset', $sess_resultOffset + $resultRecordCount);
            echo $succ_msg . '<br>';
            header("refresh: 3");
            exit;
        }
    }

}
