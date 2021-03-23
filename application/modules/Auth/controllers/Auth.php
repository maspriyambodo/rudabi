<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_auth');
    }

    private function Check_session() {
        if ($this->session->userdata('id_user') and $this->session->userdata('uname') and $this->session->userdata('stat_aktif') and $this->session->userdata('role_id')) {
            $result = redirect(base_url('Dashboard'), 'refresh');
        } else {
            $result = true;
        }
        return $result;
    }

    public function index() {
        $this->Check_session();
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'siteTitle' => 'Signin System | ' . $this->bodo->Sys('app_name'),
        ];
        $this->parser->parse('v_auth', $data);
    }

    public function Signin() {
        $data = [
            'uname' => Post_input("username"),
            'pwd' => Post_input("password")
        ];
        $exec = $this->M_auth->Signin($data);
        if ($exec) {
            $hashed = $exec->pwd;
            if (password_verify($data['pwd'], $hashed)) {
                $this->bodo->Set_session($exec);
                redirect(base_url('Dashboard'), 'refresh');
            } else {
                redirect(base_url('Signin'), $this->session->set_flashdata('err_msg', 'Sorry, your password was incorrect. Please double-check your password.'));
            }
        } else {
            redirect(base_url('Signin'), $this->session->set_flashdata('err_msg', 'username not registered!'));
        }
    }

    public function Logout() {
        $this->session->sess_destroy();
        return redirect(base_url('Signin'), 'refresh');
    }

}
