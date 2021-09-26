<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_m', 'dm');
	}

	public function index()
	{
		$a = str_replace(base_url(), '', current_url());
		// var_dump($a);die();
		$roles = $this->session->userdata('role');

		if($roles != 1){
			redirect(site_url('error404'));
		}else{
			$this->load->view('dashboard_v', $this->datainclude->_menuBackend());
		}
	}

	// cek id table menentukan posisi chat rata kiri / kanan
	function ambil_id()
	{
		$datas = $this->dm->cekid();
		if(isset($datas)){
			if(($datas->id_pesan) % 2 == 0){
				echo "genap"; //right
			}else{
				echo "ganjil"; //left
			}
		}else{
			echo 'salah';
		}
	}

	// keluar dari sistem
	public function keluar(){
		$this->session->sess_destroy();
		redirect('auth','refresh');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/dashboard/controllers/Dashboard.php */