<?php

defined('BASEPATH') OR exit('trying to signin backdoor?');

/**
 * @apiName GetDataPenyuluh
 * @apiMethod {GET}
 * @apiEndpoint api/e-pa/penyuluh/lists
 * @apiQueryParam {string} [token]
 * @apiQueryParam {int} [prov_id] Optional
 */
class Penyuluh extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_e-pa/M_penyuluh', 'model');
        $this->user = Dekrip($this->session->userdata('id_user'));
    }

    private function auth() {
        $token = explode(':', base64_decode(Post_get('token')));
        if (!empty($token)) {
            $data = [
                'uname' => $token[0],
                'pwd' => $token[1]
            ];
            $exec = $this->model->Signin($data);
            if (!empty($exec) and ($exec->limit_login == 0 or $exec->limit_login != 3)) {
                $hashed = $exec->pwd;
                if (password_verify($data['pwd'], $hashed)) {
                    $this->bodo->Set_session($exec);
                    $result = true;
                } else {
                    $result = die('your password was incorrect');
                }
            }
        } else {
            $result = die('you are not recognized');
        }
        return $result;
    }

    public function lists() {
        $this->auth();

        $prov_id = $this->input->get('prov_id');
        $list = $this->model->lists($prov_id);
        $data = [];
        $no = Post_get("start");
        $privilege = $this->bodo->Check_previlege('Systems/Users/index/');
        foreach ($list as $penyuluh) {
            if ($prov_id == null) {
                $nama_wilayah = $penyuluh->provinsi;
                $id_wilayah = $penyuluh->id_prov;
            } else {
                $nama_wilayah = $penyuluh->kabupaten;
                $id_wilayah = $penyuluh->id_kab;
            }
            $jumlah = $penyuluh->jumlah_pns+$penyuluh->jumlah_nonpns;
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $id_wilayah;
            $row[] = $nama_wilayah;
            $row[] = $penyuluh->jumlah_kua;
            $row[] = $penyuluh->jumlah_pns;
            $row[] = $penyuluh->jumlah_nonpns;
            $row[] = str_replace("'", '"', $jumlah);
            $data[] = $row;
        }

        return $this->_list($data, $privilege);
    }

    private function _list($data, $privilege) {
        $prov_id = $this->input->get('prov_id');
        if ($privilege['read']) {
            $output = [
                "draw" => Post_get('draw'),
                "recordsTotal" => $this->model->count_all($prov_id),
                "recordsFiltered" => $this->model->count_filtered($prov_id),
                "data" => $data
            ];
        } else {
            $output = [
                "draw" => Post_get('draw'),
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            ];
        }
        return ToJson($output);
    }

}
