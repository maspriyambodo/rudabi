<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Simpenghulu extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('simpenghulu_m');
		$this->db_database2 = $this->load->database('database2', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
		$this->responseAktif = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data dinonaktifkan.'], REST_Controller::HTTP_FORBIDDEN);
	}

	public function index_get()
	{
		$provinsi 	= $this->get('city_province');
		$kabupaten 	= $this->get('city_id');

		// if(!empty($provinsi)){
		// 	$data = $this->simpenghulu_m->get_penghulu_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->simpenghulu_m->get_penghulu_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->simpenghulu_m->get_penghulu();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->simpenghulu_m->get_penghulu_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->simpenghulu_m->get_penghulu_kecamatan($kabupaten);
			}else{
				$data = $this->simpenghulu_m->get_penghulu();
			}

			if(!empty($data)){
				$this->response($data, REST_Controller::HTTP_OK);
			}else{
				$this->responseBad;
			}
        }else{
            $this->responseAktif;
        }
	}

	public function kua_get()
	{
		$provinsi 	= $this->get('kua_province_id');
		$kabupaten 	= $this->get('kua_city_id');

		// if(!empty($provinsi)){
		// 	$data = $this->simpenghulu_m->get_kua_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->simpenghulu_m->get_kua_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->simpenghulu_m->get_kua();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->simpenghulu_m->get_kua_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->simpenghulu_m->get_kua_kecamatan($kabupaten);
			}else{
				$data = $this->simpenghulu_m->get_kua();
			}

			if(!empty($data)){
				$this->response($data, REST_Controller::HTTP_OK);
			}else{
				$this->responseBad;
			}
        }else{
            $this->responseAktif;
        }
	}

	public function peristiwanikah_get()
	{
		$provinsi 	= $this->get('city_province');
		$kabupaten 	= $this->get('nikah_city_id');

		// if(!empty($provinsi)){
		// 	$data = $this->simpenghulu_m->get_nikah_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->simpenghulu_m->get_nikah_detail($kabupaten);
		// }else{
		// 	$data = $this->simpenghulu_m->get_nikah();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->simpenghulu_m->get_nikah_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->simpenghulu_m->get_nikah_detail($kabupaten);
			}else{
				$data = $this->simpenghulu_m->get_nikah();
			}

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
