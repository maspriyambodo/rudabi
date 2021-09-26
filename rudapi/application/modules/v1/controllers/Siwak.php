<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Siwak extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('siwak_m');
		$this->db_database7 = $this->load->database('database7', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
		$this->responseAktif = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data dinonaktifkan.'], REST_Controller::HTTP_FORBIDDEN);
	}

	public function index_get()
	{
		$provinsi = $this->get('Lokasi_Prop');
		$kabupaten = $this->get('lokasi_kode');
		$kecamatan = $this->get('lokasi_ID');

		// if(!empty($provinsi)){
		// 	$data = $this->siwak_m->get_tanah_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->siwak_m->get_tanah_kecamatan($kabupaten);
		// }else if(!empty($kecamatan)){
		// 	$data = $this->siwak_m->get_tanah_detail($kecamatan);
		// }else{
		// 	$data = $this->siwak_m->get_tanah();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->siwak_m->get_tanah_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->siwak_m->get_tanah_kecamatan($kabupaten);
			}else if(!empty($kecamatan)){
				$data = $this->siwak_m->get_tanah_detail($kecamatan);
			}else{
				$data = $this->siwak_m->get_tanah();
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