<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/Format.php';

class Tester extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('tester_m', 'tm');
		$this->db_database2 = $this->load->database('database2', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
	}

	function index_get()
	{
		$id = $this->get('province_id');
		$id2 = $this->get('city_id');
		// $id = 'province_id';
		// $id2 = 'city_id';

		if($id == 'province_id'){
			$kua = $this->tm->getKua($id);
		}else if($id2 == 'city_id'){
			$kua = $this->tm->getKua($id2);
		}else{
			$kua = $this->tm->getKua();
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

}