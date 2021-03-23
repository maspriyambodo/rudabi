<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_country', 'model');
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
    }

    private function _Save($bendera) {
        if (!$bendera['file_name']) {
            $result = redirect(base_url('Master/Country/index/'), $this->session->set_flashdata('err_msg', 'error while upload image flag'));
        } else {
            $data = [
                'param' => 'insert',
                'country_id' => 0,
                'kode_negara' => strtoupper(Post_input('code_country')),
                'nama_negara' => Post_input('name_country'),
                'bendera' => $bendera['file_name'],
                'user_login' => $this->user
            ];
            $exec = $this->model->index($data);
            if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
                $result = redirect(base_url('Master/Country/index/'), $this->session->set_flashdata('err_msg', 'error while saving data country'));
            } else {
                $result = redirect(base_url('Master/Country/index/'), $this->session->set_flashdata('succ_msg', 'success adding new country!'));
            }
        }
        return $result;
    }

    public function index() {
        $param = ['param' => 'select', 'country_id' => 0, 'kode_negara' => 'NULL', 'nama_negara' => 'NULL', 'bendera' => 'NULL', 'user_login' => 'NULL'];
        $data = [
            'data' => $this->model->index($param)->result(),
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Master/Country/index/',
            'privilege' => $this->bodo->Check_previlege('Master/Country/index/'),
            'siteTitle' => 'Master Country | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Country',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Country',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('country/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Check() {
        $data = [
            'param' => 'get_code',
            'country_id' => 0,
            'kode_negara' => Post_get("name"),
            'nama_negara' => "NULL",
            'bendera' => "NULL",
            'user_login' => "NULL"
        ];
        $exec = $this->model->index($data)->row();
        if ($exec->total == 0) {
            $result = ['status' => false, 'msg' => 'Country code available to use'];
        } else {
            $result = ['status' => true, 'msg' => 'Country code already exist!'];
        }
        return ToJson($result);
    }

    public function Save() {
        if ($_FILES['flag_country']['name']) {
            $param = [
                'upload_path' => 'assets/images/systems/flags/',
                'file_name' => Post_input('code_country'),
                'input_name' => "flag_country"
            ];
            $bendera = _Upload($param);
        } else {
            $bendera['file_name'] = 'Untitled.png';
        }
        return $this->_Save($bendera);
    }

    public function Edit() {
        $country_id = $this->bodo->Dec(Post_get("id"));
        $data = [
            'param' => 'get_detail',
            'country_id' => $country_id,
            'kode_negara' => "NULL",
            'nama_negara' => "NULL",
            'bendera' => "NULL",
            'user_login' => "NULL"
        ];
        $exec = $this->model->index($data)->row();
        if ($exec) {
            $response = ['status' => true, 'exec' => $exec];
        } else {
            $response = ['status' => false, 'msg' => 'error while get data country'];
        }
        ToJson($response);
    }

    public function Update() {
        if ($_FILES['e_flag_country']['name']) {
            $param = [
                'upload_path' => 'assets/images/systems/flags/',
                'file_name' => Post_input('e_code_country'),
                'input_name' => "e_flag_country"
            ];
            $bendera = _Upload($param);
        } else {
            $bendera['file_name'] = 'Untitled.png';
        }
        return $this->_Update($bendera);
    }

    private function _Update($bendera) {
        if (!$bendera['file_name']) {
            $result = redirect(base_url('Master/Country/index/'), $this->session->set_flashdata('err_msg', 'error while upload image flag'));
        } else {
            $country_id = $this->bodo->Dec(Post_input("e_id"));
            $data = [
                'param' => 'update',
                'country_id' => $country_id,
                'kode_negara' => Post_input("e_code_country"),
                'nama_negara' => Post_input("e_name_country"),
                'bendera' => $bendera['file_name'],
                'user_login' => $this->user
            ];
            $exec = $this->model->index($data);
            if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
                $result = redirect(base_url('Master/Country/index/'), $this->session->set_flashdata('err_msg', 'error while updating data <b>' . $data['nama_negara'] . '</b>'));
            } else {
                $result = redirect(base_url('Master/Country/index/'), $this->session->set_flashdata('succ_msg', 'success updating data <b>' . $data['nama_negara'] . '</b>'));
            }
        }
        return $result;
    }

    public function Delete() {
        $country_id = $this->bodo->Dec(Post_input("d_id"));
        $data = [
            'param' => 'delete',
            'country_id' => $country_id,
            'kode_negara' => null,
            'nama_negara' => null,
            'bendera' => null,
            'user_login' => $this->user
        ];
        $exec = $this->model->index($data);
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            $result = redirect(base_url('Master/Country/index/'), $this->session->set_flashdata('err_msg', 'error while deleting data country'));
        } else {
            $result = redirect(base_url('Master/Country/index/'), $this->session->set_flashdata('succ_msg', 'success deleting data country'));
        }
    }

}
