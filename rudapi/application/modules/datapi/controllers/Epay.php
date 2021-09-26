<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/Cuy_Controller.php';
//require APPPATH . '/libraries/Format.php';


class Epay extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('epay_m', 'em');
		$this->db_database5 = $this->load->database('database5', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
		//$this->load->library('gett');
	}

	// Menghitung total query rudabi ------------------------------------------------------------

	function total_get()
	{
		$datas = array(
			$this->em->get_total_penyuluh()
		);

		if(!empty($datas)){
			$this->response($datas, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function totalnew_get()
	{
		$datas = array(
			$this->em->get_total_penyuluhnew()
		);

		if(!empty($datas)){
			$this->response($datas, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	// Menghitung total query rudabi ------------------------------------------------------------

	function index_get()
	{
		$id = $this->get('provinsi_kode');

		if($id === null){
			$prov = $this->em->get_provinsi();
		}else{
			$prov = $this->em->get_provinsi($id);
		}

		if($prov){
			$this->response($prov, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditemukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function penyuluh_get()
	{
		$id = $this->get('penyuluh_KabKota_Kode');

		if($id === null){
			$this->response(['message' => 'Masukkan ID penyuluh_KabKota_Kode'], REST_Controller::HTTP_NOT_FOUND);
		}else{
			$non = $this->em->get_penyuluh($id);
		}

		if($non){
			$this->response($non, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditemukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function penyuluhonline_get()
	{
		$id = $this->get('penyuluh_KabKota_Kode');

		if($id === null){
			$this->response(['message' => 'Masukkan ID penyuluh_KabKota_Kode'], REST_Controller::HTTP_NOT_FOUND);
		}else{
			$online = $this->em->get_penyuluhonline($id);
		}

		if($online){
			$this->response($online, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditemukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
}