<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Epay extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('epay_m');
		$this->db_database5 = $this->load->database('database5', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
		$this->responseAktif = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data dinonaktifkan.'], REST_Controller::HTTP_FORBIDDEN);
	}

	public function index_get()
	{
		$provinsi = $this->get('penyuluh_Provinsi_Kode');
		$kabupaten = $this->get('penyuluh_KabKota_Kode');

		// if(!empty($provinsi)){
		// 	$data = $this->epay_m->get_epay_kabupaten($provinsi);
		// }else if($kabupaten){
		// 	$data = $this->epay_m->get_epay_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->epay_m->get_epay();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
		if($status == 1){
			if(!empty($provinsi)){
			$data = $this->epay_m->get_epay_kabupaten($provinsi);
			}else if($kabupaten){
				$data = $this->epay_m->get_epay_kecamatan($kabupaten);
			}else{
				$data = $this->epay_m->get_epay();
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