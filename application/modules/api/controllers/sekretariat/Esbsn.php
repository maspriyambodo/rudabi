<?php

defined('BASEPATH') OR exit('trying to signin backdoor?');

class Esbsn extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_sekretariat/m_sbsn', 'model');
        $this->user = Dekrip($this->session->userdata('id_user'));
    }

    private function auth() {
        //http://rudabi.io/api/sekretariat/esbsn/lists?token=YWRtaW46YQ==
        $token = explode(':', base64_decode(Post_get('token')));
        if (!empty($token) and Post_get('token')) {
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
        $list = $this->model->lists();
        $data = [];
        $no = Post_get("start");
        $privilege = $this->bodo->Check_previlege('Systems/Users/index/');
        foreach ($list as $users) {
            $id_user = Enkrip($users->id);
            if ($users->stat) {
                $stat = '<span class="label label-success label-inline font-weight-lighter mr-2">active</span>';
            } else {
                $stat = '<span class="label label-danger label-inline font-weight-lighter mr-2">nonactive</span>';
            }
            if ($privilege['update']) {
                $editbtn = '<button id="edit_user" type="button" class="btn btn-icon btn-default btn-xs" title="Edit ' . $users->uname . '" value="' . $id_user . '" onclick="Edit(this.value)"><i class="far fa-edit"></i></button>';
            } else {
                $editbtn = null;
            }
            if ($privilege['delete'] and $users->stat) {
                $activebtn = null;
                $delbtn = '<button id="del_user" type="button" class="btn btn-icon btn-danger btn-xs" title="Delete ' . $users->uname . '" value="' . $id_user . '" onclick="Delete(this.value)"><i class="far fa-trash-alt"></i></button>';
                $reset_pwd = '<button id="reset_password" type="button" class="btn btn-icon btn-default btn-xs" title="Reset Password ' . $users->uname . '" value="' . $id_user . '" onclick="Reset_pwd(this.value)"><i class="fas fa-key"></i></button>';
            } elseif ($privilege['delete'] and!$users->stat) {
                $delbtn = null;
                $reset_pwd = '<button id="reset_password" type="button" class="btn btn-icon btn-default btn-xs" title="Reset Password ' . $users->uname . '" value="' . $id_user . '" onclick="Reset_pwd(this.value)"><i class="fas fa-key"></i></button>';
                $activebtn = '<button id="act_user" type="button" class="btn btn-icon btn-success btn-xs" title="Activate ' . $users->uname . '" value="' . $id_user . '" onclick="Active(this.value)"><i class="fas fa-unlock"></i></button>';
            } else {
                $delbtn = null;
                $activebtn = null;
                $reset_pwd = null;
            }
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $users->uname;
            $row[] = $users->name;
            $row[] = $stat;
            $row[] = '<div class="btn-group">' . $editbtn . $reset_pwd . $delbtn . $activebtn . '</div>';
            $data[] = $row;
        }
        return $this->_list($data, $privilege);
    }

    private function _list($data, $privilege) {
        if ($privilege['read']) {
            $output = [
                "draw" => Post_get('draw'),
                "recordsTotal" => $this->model->count_all(),
                "recordsFiltered" => $this->model->count_filtered(),
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
