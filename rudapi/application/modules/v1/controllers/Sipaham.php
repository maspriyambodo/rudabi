<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Sipaham extends REST_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('sipaham_m');
		$this->db_database14 = $this->load->database('database14', TRUE);
		$this->responseNon = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data tidak ditemukan'], REST_Controller::HTTP_BAD_REQUEST);
		$this->responseAktif = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data dinonaktifkan.'], REST_Controller::HTTP_FORBIDDEN);
	}

	public function index_get()
	{
		$data = $this->sipaham_m->dataKonflik();

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseNon;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($data)){
			$this->response($data, REST_Controller::HTTP_OK);
			}else{
				$this->responseNon;
			}
        }else{
            $this->responseAktif;
        }
	}

}

/* End of file Sipaham.php */
/* Location: ./application/modules/datapi/controllers/Sipaham.php */