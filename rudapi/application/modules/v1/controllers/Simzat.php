<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Simzat extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('simzat_m');
		$this->db_database11 = $this->load->database('database11', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
		$this->responseAktif = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data dinonaktifkan.'], REST_Controller::HTTP_FORBIDDEN);
	}

	public function baznas_get()
	{
		$data = $this->simzat_m->get_baznas();
		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($data)){
			$this->response($data, REST_Controller::HTTP_OK);
			}else{
				$this->responseBad;
			}
        }else{
            $this->responseAktif;
        }
	}

	public function laznas_get()
	{
		$data = $this->simzat_m->get_laznas();
		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($data)){
			$this->response($data, REST_Controller::HTTP_OK);
			}else{
				$this->responseBad;
			}
        }else{
            $this->responseAktif;
        }
	}

}