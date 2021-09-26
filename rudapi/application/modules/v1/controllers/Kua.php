<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/Format.php';

class Kua extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('kua_m', 'km');
		$this->db_database2 = $this->load->database('database2', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
	}

	function index_get()
	{
		$id = $this->get('province_id');

		if($id === null){
			$kua = $this->km->getKua();
		}else{
			$kua = $this->km->getKua($id);
		}

		if($kua){
			$this->response(
				 $kua
			, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditemukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function propinsi_get()
	{
		$id = $this->get('province_id');
		if($id === null){
			$prop = $this->km->getProp();
		}else{
			$prop = $this->km->getProp($id);
		}

		if($prop){
			$this->response([
				'status' => true,
				'data' => $prop
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditemukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function propinsi_post()
	{
		$id = $this->get('province_id');
		if($id === null){
			$prop = $this->km->getProp();
		}else{
			$prop = $this->km->getProp($id);
		}

		if($prop){
			$this->response([
				'status' => true,
				'data' => $prop
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditemukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function kabupaten_get()
	{
		$id = $this->get('city_id');
		if($id === null){
			$kab = $this->km->getKab();
		}else{
			$kab = $this->km->getKab($id);
		}

		if($kab){
			$this->response([
				'status' => true,
				'data' => $kab
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditemukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function kabupaten_post()
	{
		$id = $this->get('city_id');
		if($id === null){
			$kab = $this->km->getKab();
		}else{
			$kab = $this->km->getKab($id);
		}

		if($kab){
			$this->response([
				'status' => true,
				'data' => $kab
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditemukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function nikahprov_get()
	{
		$np = $this->km->getNP();
		if(!empty($np)){
			$this->response($np, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function nikahkab_get()
	{
		$nk = $this->km->getNK();
		if(!empty($nk)){
			$this->response($nk, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function nikahkua_get()
	{
		$nkk = $this->km->getNKK();
		if(!empty($nkk)){
			$this->response($nkk, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}
}