<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Esbsn extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Esbsn_m');
		$this->db_database8 = $this->load->database('database8', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
		$this->responseAktif = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data dinonaktifkan.'], REST_Controller::HTTP_FORBIDDEN);
	}

	public function satker_get()
	{
		$provinsi = $this->get('kab_propinsi_id');

		// if(!empty($provinsi)){
		// 	$data = $this->Esbsn_m->get_satker_detail($provinsi);
		// }else{
		// 	$data = $this->Esbsn_m->get_satker();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
		if($status == 1){
			if(!empty($provinsi)){
			$data = $this->Esbsn_m->get_satker_detail($provinsi);
			}else{
				$data = $this->Esbsn_m->get_satker();
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

	public function usulantriwulan_get()
	{
		$tahun = $this->get('usul_tahun');
		$provinsi = $this->get('usul_propinsi');
		$kabupaten = $this->get('usul_kabupaten');

		// if(!empty($tahun) && !empty($provinsi) && !empty($kabupaten)){
		// 	$data = $this->Esbsn_m->get_usulantriwulan_kecamatan($tahun, $provinsi, $kabupaten);
		// }else if(!empty($tahun) && !empty($provinsi)){
		// 	$data = $this->Esbsn_m->get_usulantriwulan_kabupaten($tahun, $provinsi);
		// }else if(!empty($tahun)){
		// 	$data = $this->Esbsn_m->get_usulantriwulan_tahun($tahun);
		// }else{
		// 	$data = $this->Esbsn_m->get_usulantriwulan();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
		if($status == 1){
			if(!empty($tahun) && !empty($provinsi) && !empty($kabupaten)){
			$data = $this->Esbsn_m->get_usulantriwulan_kecamatan($tahun, $provinsi, $kabupaten);
			}else if(!empty($tahun) && !empty($provinsi)){
				$data = $this->Esbsn_m->get_usulantriwulan_kabupaten($tahun, $provinsi);
			}else if(!empty($tahun)){
				$data = $this->Esbsn_m->get_usulantriwulan_tahun($tahun);
			}else{
				$data = $this->Esbsn_m->get_usulantriwulan();
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

	public function inputtriwulan_get()
	{
		$tahun = $this->get('usul_tahun');
		$provinsi = $this->get('usul_propinsi');
		$kabupaten = $this->get('usul_kabupaten');

		// if(!empty($tahun) && !empty($provinsi) && !empty($kabupaten)){
		// 	$data = $this->Esbsn_m->get_inputtriwulan_kecamatan($tahun, $provinsi, $kabupaten);
		// }else if(!empty($tahun) && !empty($provinsi)){
		// 	$data = $this->Esbsn_m->get_inputtriwulan_kabupaten($tahun, $provinsi);
		// }else if(!empty($tahun)){
		// 	$data = $this->Esbsn_m->get_inputtriwulan_tahun($tahun);
		// }else{
		// 	$data = $this->Esbsn_m->get_inputtriwulan();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
		if($status == 1){
			if(!empty($tahun) && !empty($provinsi) && !empty($kabupaten)){
			$data = $this->Esbsn_m->get_inputtriwulan_kecamatan($tahun, $provinsi, $kabupaten);
			}else if(!empty($tahun) && !empty($provinsi)){
				$data = $this->Esbsn_m->get_inputtriwulan_kabupaten($tahun, $provinsi);
			}else if(!empty($tahun)){
				$data = $this->Esbsn_m->get_inputtriwulan_tahun($tahun);
			}else{
				$data = $this->Esbsn_m->get_inputtriwulan();
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

	public function approved_get()
	{
		$tahun = $this->get('usul_tahun');
		$provinsi = $this->get('usul_propinsi');
		$kabupaten = $this->get('usul_kabupaten');

		// if(!empty($tahun) && !empty($provinsi) && !empty($kabupaten)){
		// 	$data = $this->Esbsn_m->get_approved_kecamatan($tahun, $provinsi, $kabupaten);
		// }else if(!empty($tahun) && !empty($provinsi)){
		// 	$data = $this->Esbsn_m->get_approved_kabupaten($tahun, $provinsi);
		// }else if(!empty($tahun)){
		// 	$data = $this->Esbsn_m->get_approved_tahun($tahun);
		// }else{
		// 	$data = $this->Esbsn_m->get_approved();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
		if($status == 1){
			if(!empty($tahun) && !empty($provinsi) && !empty($kabupaten)){
			$data = $this->Esbsn_m->get_approved_kecamatan($tahun, $provinsi, $kabupaten);
			}else if(!empty($tahun) && !empty($provinsi)){
				$data = $this->Esbsn_m->get_approved_kabupaten($tahun, $provinsi);
			}else if(!empty($tahun)){
				$data = $this->Esbsn_m->get_approved_tahun($tahun);
			}else{
				$data = $this->Esbsn_m->get_approved();
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