<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Sicakep extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Sicakep_m');
		$this->db_database9 = $this->load->database('database9', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
		$this->responseAktif = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data dinonaktifkan.'], REST_Controller::HTTP_FORBIDDEN);
	}

	public function pegawai_get()
	{
		$provinsi = $this->get('peg_provinsi');
		$kabupaten = $this->get('peg_kabupaten');

		// if(!empty($provinsi)){
		// 	$data = $this->Sicakep_m->get_pegawai_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->Sicakep_m->get_pegawai_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->Sicakep_m->get_pegawai();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->Sicakep_m->get_pegawai_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->Sicakep_m->get_pegawai_kecamatan($kabupaten);
			}else{
				$data = $this->Sicakep_m->get_pegawai();
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

	public function pensiun_get()
	{
		$provinsi = $this->get('peg_provinsi');
		$kabupaten = $this->get('peg_kabupaten');

		// if(!empty($provinsi)){
		// 	$data = $this->Sicakep_m->get_pensiun_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->Sicakep_m->get_pensiun_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->Sicakep_m->get_pensiun();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->Sicakep_m->get_pensiun_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->Sicakep_m->get_pensiun_kecamatan($kabupaten);
			}else{
				$data = $this->Sicakep_m->get_pensiun();
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