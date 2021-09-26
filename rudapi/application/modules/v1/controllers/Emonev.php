<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Emonev extends REST_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('emonev_m');
		$this->db_database3 = $this->load->database('database3', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
		$this->responseAktif = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data dinonaktifkan.'], REST_Controller::HTTP_FORBIDDEN);
	}

	public function tipologi_get() {
		$id = $this->get('tipokua');

		// if(!empty($id)){
		// 	$data = $this->emonev_m->get_tipologi_detail($id);
		// }else{
		// 	$data = $this->emonev_m->get_tipologi();
		// }

		// if (!empty($data)) {
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// } else {
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
		if($status == 1){
			if(!empty($id)){
			$data = $this->emonev_m->get_tipologi_detail($id);
			}else{
				$data = $this->emonev_m->get_tipologi();
			}

			if (!empty($data)) {
				$this->response($data, REST_Controller::HTTP_OK);
			} else {
				$this->responseBad;
			}
		}else{
			$this->responseAktif;
		}
	}

	public function rekapkua_get(){
		$id = $this->get('kodeprop');

		// if(!empty($id)){
		// 	$data = $this->emonev_m->get_rekapkua_detail($id);
		// }else{
		// 	$data = $this->emonev_m->get_rekapkua();
		// }

		// if (!empty($data)) {
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// } else {
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
		if($status == 1){
			if(!empty($id)){
			$data = $this->emonev_m->get_rekapkua_detail($id);
			}else{
				$data = $this->emonev_m->get_rekapkua();
			}

			if (!empty($data)) {
				$this->response($data, REST_Controller::HTTP_OK);
			} else {
				$this->responseBad;
			}
		}else{
			$this->responseAktif;
		}
	}

	public function statustanah_get()
	{
		$id = $this->get('statustanah');

		// if(!empty($id)){
		// 	$data = $this->emonev_m->get_statustanah_detail($id);
		// }else{
		// 	$data = $this->emonev_m->get_statustanah();
		// }

		// if (!empty($data)) {
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// } else {
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
		if($status == 1){
			if(!empty($id)){
			$data = $this->emonev_m->get_statustanah_detail($id);
			}else{
				$data = $this->emonev_m->get_statustanah();
			}

			if (!empty($data)) {
				$this->response($data, REST_Controller::HTTP_OK);
			} else {
				$this->responseBad;
			}
		}else{
			$this->responseAktif;
		}
	}

	public function rekapitulasipenilaian_get()
	{
		$id 		= $this->get('kodekab');
		$tahun 		= $this->get('tahun');
		$kabupaten 	= $this->get('kodekua');

		// if(!empty($tahun) && !empty($id)){
		// 	$data = $this->emonev_m->get_penilaian_detail($tahun, $id);
		// }else if(!empty($tahun) && !empty($kabupaten)){
		// 	$data = $this->emonev_m->get_penilaian_kabupaten($tahun, $kabupaten);
		// }else if(!empty($tahun)){
		// 	$data = $this->emonev_m->get_penilaian_provinsi($tahun);
		// }else{
		// 	$data = $this->emonev_m->get_penilaian();
		// }

		// if (!empty($data)) {
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// } else {
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
		if($status == 1){
			if(!empty($tahun) && !empty($id)){
			$data = $this->emonev_m->get_penilaian_detail($tahun, $id);
			}else if(!empty($tahun) && !empty($kabupaten)){
				$data = $this->emonev_m->get_penilaian_kabupaten($tahun, $kabupaten);
			}else if(!empty($tahun)){
				$data = $this->emonev_m->get_penilaian_provinsi($tahun);
			}else{
				$data = $this->emonev_m->get_penilaian();
			}

			if (!empty($data)) {
				$this->response($data, REST_Controller::HTTP_OK);
			} else {
				$this->responseBad;
			}
		}else{
			$this->responseAktif;
		}
	}

	public function rekapitulasidata_get()
	{
		$data = $this->emonev_m->get_rekapitulasidata();

		// if (!empty($data)) {
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// } else {
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
		if($status == 1){
			if (!empty($data)) {
			$this->response($data, REST_Controller::HTTP_OK);
			} else {
				$this->responseBad;
			}
		}else{
			$this->responseAktif;
		}
	}

	public function rekapitulasiisian_get()
	{
		$data = $this->emonev_m->get_rekapitulasiisian();

		// if (!empty($data)) {
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// } else {
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
		if($status == 1){
			if (!empty($data)) {
			$this->response($data, REST_Controller::HTTP_OK);
			} else {
				$this->responseBad;
			}
		}else{
			$this->responseAktif;
		}
	}

	public function bangunan_get()
	{
		$id = $this->get('status');

		// if(!empty($id)){
		// 	$data = $this->emonev_m->get_bangunankua_detail($id);
		// }else{
		// 	$data = $this->emonev_m->get_bangunankua();
		// }

		// if (!empty($data)) {
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// } else {
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
		if($status == 1){
			if(!empty($id)){
			$data = $this->emonev_m->get_bangunankua_detail($id);
			}else{
				$data = $this->emonev_m->get_bangunankua();
			}

			if (!empty($data)) {
				$this->response($data, REST_Controller::HTTP_OK);
			} else {
				$this->responseBad;
			}
		}else{
			$this->responseAktif;
		}
	}

	public function rekapitulasiregistrasi_get()
	{
		$id = $this->get('status');

		if(!empty($id)){
			$data = $this->emonev_m->get_rekapregistrasi_detail($id);
		}else{
			$data = $this->emonev_m->get_rekapregistrasi();
		}

		if (!empty($data)) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->responseBad;
		}

		$status = $this->permissions->is_actived();
		if($status == 1){
			if(!empty($id)){
			$data = $this->emonev_m->get_rekapregistrasi_detail($id);
			}else{
				$data = $this->emonev_m->get_rekapregistrasi();
			}

			if (!empty($data)) {
				$this->response($data, REST_Controller::HTTP_OK);
			} else {
				$this->responseBad;
			}
		}else{
			$this->responseAktif;
		}
	}

}