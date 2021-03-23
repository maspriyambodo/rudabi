<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Systems extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_system');
        $this->role = $this->bodo->Dec($this->session->userdata('role_id'));
    }

    public function index() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Systems/index/',
            'privilege' => $this->bodo->Check_previlege('Systems/index/'),
            'siteTitle' => 'Users Management | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Systems Settings',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Systems',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('systems/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Change() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Systems/index/',
            'privilege' => $this->bodo->Check_previlege('Systems/index/'),
            'siteTitle' => 'Change Password | ' . $this->bodo->Sys('app_name'),
            'pagetitle' => 'Change Password',
            'breadcrumb' => [
                0 => [
                    'nama' => 'Systems',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse('pwd/index', $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    private function _Favico($fav) {
        if (!$fav) {
            $result = [
                'status' => false,
                'msg' => 'error while upload favicon'
            ];
        } else {
            $exec = $this->M_system->Favico(['field' => 'favico', 'file_name' => $fav['file_name']]);
            if ($exec) {
                $result = [
                    'status' => true,
                    'msg' => 'favicon has been changed'
                ];
            } else {
                $result = [
                    'status' => false,
                    'msg' => 'error while change favicon'
                ];
            }
        }
        return $result;
    }

    public function Favico() {
        if ($this->role == 1) {
            $param = [
                'upload_path' => 'assets/images/systems/',
                'file_name' => "favicon",
                'input_name' => "favico"
            ];
            $fav = _Upload($param);
            $result = $this->_Favico($fav);
        } else {
            $result = [
                'status' => false,
                'msg' => 'sorry, you don`t have permissions!'
            ];
        }
        ToJson($result);
    }

    private function _Logo($fav) {
        if (!$fav) {
            $result = [
                'status' => false,
                'msg' => 'error while upload logo company'
            ];
        } else {
            $exec = $this->M_system->Favico(['field' => 'logo', 'file_name' => $fav['file_name']]);
            if ($exec) {
                $result = [
                    'status' => true,
                    'msg' => 'logo company has been changed'
                ];
            } else {
                $result = [
                    'status' => false,
                    'msg' => 'error while change logo company'
                ];
            }
        }
    }

    public function Logo() {
        if ($this->role == 1) {
            $param = [
                'upload_path' => 'assets/images/systems/',
                'file_name' => "logo",
                'input_name' => "logo_comp"
            ];
            $fav = _Upload($param);
            $result = $this->_Logo($fav);
        } else {
            $result = [
                'status' => false,
                'msg' => 'sorry, you don`t have permissions!'
            ];
        }
        ToJson($result);
    }

    public function Old_pwd($param) {
        $id_user = $this->bodo->Dec($this->session->userdata('id_user'));
        $exec = $this->M_system->Old_pwd($id_user);
        if (password_verify($param, $exec->pwd)) {
            $result = [
                'status' => true,
                'msg' => 'password accepted'
            ];
        } else {
            $result = [
                'status' => false,
                'msg' => 'Sorry, your password was incorrect'
            ];
        }
        ToJson($result);
    }

    public function Update_pwd() {
        $data = [
            'id_user' => $this->bodo->Dec($this->session->userdata('id_user')),
            'pwd' => password_hash(Post_input("cnf_pwd"), PASSWORD_DEFAULT)
        ];
        $this->M_system->Update_pwd($data);
    }

    public function Update() {
        if ($this->role == 1) {
            $data = [
                'company_name' => Post_input("comp_name"),
                'app_year' => Post_input("app_year"),
                'app_name' => Post_input("app_name"),
            ];
            $this->M_system->Update($data);
        } else {
            redirect(base_url('Systems/index/'), $this->session->set_flashdata('err_msg', 'sorry, you don`t have permissions!'));
        }
    }

}
