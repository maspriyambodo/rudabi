<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Simzat extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('simzat_m', 'sm');
		$this->db_database11 = $this->load->database('database11', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
		$this->responseNon = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data tidak ditemukan'], REST_Controller::HTTP_BAD_REQUEST);
	}

	public function index_get()
	{
		$id = $this->get('id');

		if($id){
			$data = $this->sm->dataAll($id);
		}else{
			$data = $this->sm->dataProvinsi();
		}

		if(!empty($data)){
			$this->response($data, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	public function tipologi_get()
	{
		$id = $this->get('user_type');

		if($id){
			$data = $this->sm->dataAlls($id);
		}else{
			$data = $this->sm->dataTipologi();
		}

		if(!empty($data)){
			$this->response($data, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	public function baznas_get()
	{
		$data = $this->sm->dataBaznas();

		if(!empty($data)){
			$this->response($data, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	public function laznas_get()
	{
		$data = $this->sm->dataLaznas();

		if(!empty($data)){
			$this->response($data, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

}