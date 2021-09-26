<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('auth_m', 'am');
	}

	public function index()
	{
		$roles = $this->session->userdata('role');
		if($roles == 1){
			redirect('dashboard', 'refresh');
		}else if($roles == 2){
			redirect('pengguna', 'refresh');
		}else{
			$this->load->view('auth_v');
		}
	}

	// memeriksa keberadaan akun username
	public function login()
	{
		$username = $this->input->post('username', 'true');
		$password = md5($this->input->post('password', 'true'));
		$temp_account = $this->am->check_user_account($username, $password)->row();

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			if ($temp_account != 0){
				$array_items = array(
					'id_user' => $temp_account->id_user,
					'username' => $temp_account->username,
					'role' => $temp_account->level,
					'logged_in' => true
				);
				if($temp_account->level == 1){
					$this->session->set_userdata($array_items);
					redirect(site_url('dashboard'));
				}else if($temp_account->level == 2){
					$this->session->set_userdata($array_items);
					redirect(site_url('pengguna'));
				}else{
					redirect('auth', 'refresh');
				}
			}
			else {
				$this->session->set_flashdata('notification', 'Peringatan : Username dan Password tidak cocok');
				redirect('auth', 'refresh');
			}
		}

	}

}

/* End of file Auth.php */
/* Location: ./application/modules/auth/controllers/Auth.php */