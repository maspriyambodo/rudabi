<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Bimwin extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('bimwin_m');
		$this->db_database4 = $this->load->database('database4', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
		$this->responseAktif = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data dinonaktifkan.'], REST_Controller::HTTP_FORBIDDEN);
	}

	public function targetcatin_get()
	{
		$tahun 		= $this->get('tahun_target_wilayah');
		$provinsi 	= $this->get('id_prop');

		// if(!empty($provinsi) && (!empty($tahun))){
		// 	$data = $this->bimwin_m->get_targetcatin_provinsi($provinsi, $tahun);
		// }else if(!empty($tahun)){
		// 	$data = $this->bimwin_m->get_targetcatin_tahun($tahun);
		// }else{
		// 	$data = $this->bimwin_m->get_targetcatin();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
		if($status == 1){
			if(!empty($provinsi) && (!empty($tahun))){
			$data = $this->bimwin_m->get_targetcatin_provinsi($provinsi, $tahun);
			}else if(!empty($tahun)){
				$data = $this->bimwin_m->get_targetcatin_tahun($tahun);
			}else{
				$data = $this->bimwin_m->get_targetcatin();
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

	public function datacatin_get()
	{
		$tahun 		= $this->get('tahun_target_wilayah');
		$kua 		= $this->get('tahun_target_kua');
		$provinsi 	= $this->get('id_prop');
		$kabupaten 	= $this->get('kabkot');

		// if(!empty($provinsi) && (!empty($tahun))){
		// 	$data = $this->bimwin_m->get_datacatin_provinsi($provinsi, $tahun);
		// }else if(!empty($kua) && (!empty($kabupaten))){
		// 	$data = $this->bimwin_m->get_datacatin_kua($kua, $kabupaten);
		// }else if(!empty($tahun)){
		// 	$data = $this->bimwin_m->get_datacatin_tahun($tahun);
		// }else{
		// 	$data = $this->bimwin_m->get_datacatin();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
		if($status == 1){
			if(!empty($provinsi) && (!empty($tahun))){
			$data = $this->bimwin_m->get_datacatin_provinsi($provinsi, $tahun);
			}else if(!empty($kua) && (!empty($kabupaten))){
				$data = $this->bimwin_m->get_datacatin_kua($kua, $kabupaten);
			}else if(!empty($tahun)){
				$data = $this->bimwin_m->get_datacatin_tahun($tahun);
			}else{
				$data = $this->bimwin_m->get_datacatin();
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

	public function fasilitator_get()
	{
		$id = $this->get('id_j_kegiatan');

		// if(!empty($id)){
		// 	$data = $this->bimwin_m->get_fasilitator_detail($id);
		// }else{
		// 	$data = $this->bimwin_m->get_fasilitator();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
		if($status == 1){
			if(!empty($id)){
			$data = $this->bimwin_m->get_fasilitator_detail($id);
			}else{
				$data = $this->bimwin_m->get_fasilitator();
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