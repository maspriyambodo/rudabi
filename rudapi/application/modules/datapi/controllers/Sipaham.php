<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Sipaham extends REST_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('sipaham_m', 'sm');
		$this->db_database14 = $this->load->database('database14', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
		$this->responseNon = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data tidak ditemukan'], REST_Controller::HTTP_BAD_REQUEST);
	}

	public function index_get()
	{
		$data = $this->sm->dataKonflik();

		if(!empty($data)){
			$this->response($data, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

}

/* End of file Sipaham.php */
/* Location: ./application/modules/datapi/controllers/Sipaham.php */