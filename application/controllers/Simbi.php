<?php

defined('BASEPATH') OR exit('trying to signin backdoor??');

class Simbi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Simbi', 'model');
    }

    private function Check_session() {
        if ($this->session->userdata('id_user') and $this->session->userdata('uname') and $this->session->userdata('stat_aktif') and $this->session->userdata('role_id')) {
            $result = redirect(base_url('Dashboard'), 'refresh');
        } elseif ($this->session->tempdata('auth_sekuriti')) {
            $result = auth_sekuriti();
        } elseif ($this->session->tempdata('blocked_account')) {
            $result = blocked_account();
        } else {
            $result = true;
        }
        return $result;
    }

    public function index() {
        $this->Check_session();
        $param = $this->bodo->Url(Post_get('token')); // output $param = Array ( [0] => admin AS username [1] => 1 AS id_user [2] => 1 AS role_user)
        $exec = $this->model->index($param);
        if (empty($exec)) {
            $result = redirect('https://simbi.kemenag.dev/');
        } else {
            foreach ($exec as $value) {
                $data = (object) [
                            'id_user' => $value->id,
                            'uname' => $value->username,
                            'fullname' => $value->fullname,
                            'stat_aktif' => 1,
                            'role_id' => $value->role_id,
                            'role_name' => $value->role_name,
                            'pict' => $value->img_photo
                ];
            }
            $this->bodo->Set_session($data);
            $result = redirect(base_url('Dashboard'), 'refresh');
        }
        return $result;
    }

}
