<?php

defined('BASEPATH')OR exit('No direct script access allowed');
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
 * Description of Manage
 *
 * @author centos
 */
class Manage extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Manage');
        $this->Authentication = $this->M_Manage->Auth(); // Array ( [0] => stdClass Object ( [id] => 2 [uname] => sekretariat [hak_akses] => 2 [stat] => 1 ) )
    }

    private function Csrf() {
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        return $csrf;
    }

    public function index() {
        $data = [
            'title' => 'Users Management | RUDABI SYSTEM OF KEMENAG RI',
            'username' => $this->Authentication[0]->uname,
            'param' => $this->Authentication,
            'csrf' => $this->Csrf()
        ];
        $data['content'] = $this->parser->parse('Users/Manage_index', $data, true);
        if ($this->Authentication[0]->hak_akses == 10) {// hak_akses 2 = Sekretariat
            $template = $this->parser->parse('Users/u_sekretariat/Template', $data);
        } elseif ($this->Authentication[0]->hak_akses == 11) {// hak_akses 3 = urusan agama & binsyar 
            $template = $this->parser->parse('Users/u_urais/Template', $data);
        } elseif ($this->Authentication[0]->hak_akses == 12) {// hak_akses 4 = BINA KUA DAN KELUARGA SAKINAH 
            $template = $this->parser->parse('Users/u_binakua/Template', $data);
        } elseif ($this->Authentication[0]->hak_akses == 13) {// hak_akses 5 = Penerangan Agama Islam 
            $template = $this->parser->parse('Users/u_binakua/Template', $data);
        } else {// hak_akses 6 = Siwak 
            $template = $this->parser->parse('Users/u_siwak/Template', $data);
        }
        return $template;
    }

    public function Save() {
        $data = [
            'id' => $this->input->post('userid', true),
            'uname' => $this->input->post('uname', true),
            'pwd' => sha1($this->input->post('pwdtxt', true)),
        ];
        $exec = $this->M_Manage->Save($data);
        if ($exec == false) {
            return redirect(base_url('Users/Manage/index/'), $this->session->set_flashdata('gagal', 'Data gagal disimpan !'));
        } else {
            $this->session->sess_destroy();
            redirect(base_url());
        }
    }

}
