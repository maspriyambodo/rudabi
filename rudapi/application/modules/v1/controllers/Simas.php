<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Simas extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('simas_m');
		$this->db_database10 = $this->load->database('database10', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia.'], REST_Controller::HTTP_NOT_FOUND);
		$this->responseAktif = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data dinonaktifkan.'], REST_Controller::HTTP_FORBIDDEN);
	}

	public function masjid_get()
	{
		$param_prov = $this->get('provinsi');
		$param_kab	= $this->get('kabupaten');
		$param_kec	= $this->get('kecamatan_id');

		// if(!empty($param_prov))
		// {
		// 	$data = $this->simas_m->dt_masjidprovinsi($param_prov);
		// }elseif($param_kab){
		// 	$data = $this->simas_m->dt_masjidkabupaten($param_kab);
		// }elseif($param_kec){
		// 	$data = $this->simas_m->dt_masjiddetail($param_kec);
		// }else{
		// 	$data = $this->simas_m->dt_masjid();
		// }

		// if(!empty($data))
		// {
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
		if($status == 1){
			if(!empty($param_prov))
			{
				$data = $this->simas_m->dt_masjidprovinsi($param_prov);
			}elseif(!empty($param_kab)){
				$data = $this->simas_m->dt_masjidkabupaten($param_kab);
			}elseif(!empty($param_kec)){
				$data = $this->simas_m->dt_masjiddetail($param_kec);
			}else{
				$data = $this->simas_m->dt_masjid();
			}

			if(!empty($data))
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else{
				$this->responseBad;
			}
		}else{
			$this->responseAktif;
		}
	}

	public function mushalla_get()
	{
		$param_prov = $this->get('provinsi_id');
		$param_kab	= $this->get('kabupaten_id');
		$param_kec	= $this->get('kecamatan_id');

		// if(!empty($param_prov))
		// {
		// 	$data = $this->simas_m->dt_mushallaprovinsi($param_prov);
		// }elseif($param_kab){
		// 	$data = $this->simas_m->dt_mushallakabupaten($param_kab);
		// }elseif($param_kec){
		// 	$data = $this->simas_m->dt_mushalladetail($param_kec);
		// }else{
		// 	$data = $this->simas_m->dt_mushalla();
		// }

		// if(!empty($data))
		// {
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
		if($status == 1){
			if(!empty($param_prov))
			{
				$data = $this->simas_m->dt_mushallaprovinsi($param_prov);
			}elseif($param_kab){
				$data = $this->simas_m->dt_mushallakabupaten($param_kab);
			}elseif($param_kec){
				$data = $this->simas_m->dt_mushalladetail($param_kec);
			}else{
				$data = $this->simas_m->dt_mushalla();
			}

			if(!empty($data))
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else{
				$this->responseBad;
			}
		}else{
			$this->responseAktif;
		}
	}

	public function masjidtipologi_get()
	{
		$id = $this->get('tipologi_id');

		// if(!empty($id))
		// {
		// 	$data = $this->simas_m->get_masjidtipologi_detail($id);
		// }else{
		// 	$data = $this->simas_m->get_masjidtipologi();
		// }

		// if(!empty($data))
		// {
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
		if($status == 1){
			if(!empty($id))
			{
				$data = $this->simas_m->get_masjidtipologi_detail($id);
			}else{
				$data = $this->simas_m->get_masjidtipologi();
			}

			if(!empty($data))
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else{
				$this->responseBad;
			}
		}else{
			$this->responseAktif;
		}
	}

	public function mushallatipologi_get()
	{
		$id = $this->get('tipologi_id');

		// if(!empty($id))
		// {
		// 	$data = $this->simas_m->get_mushallatipologi_detail($id);
		// }else{
		// 	$data = $this->simas_m->get_mushallatipologi();
		// }

		// if(!empty($data))
		// {
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }


		$status = $this->permissions->is_actived();
		if($status == 1){
			if(!empty($id))
			{
				$data = $this->simas_m->get_mushallatipologi_detail($id);
			}else{
				$data = $this->simas_m->get_mushallatipologi();
			}

			if(!empty($data))
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else{
				$this->responseBad;
			}
		}else{
			$this->responseAktif;
		}
	}

}