<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Simpenais extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('simpenais_m');
		$this->db_database5 = $this->load->database('database5', TRUE);
		$this->db_simpenais_new = $this->load->database('db_simpenais', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
		$this->responseAktif = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data dinonaktifkan.'], REST_Controller::HTTP_FORBIDDEN);
	}

	public function majelistaklim_get()
	{
		$provinsi 	= $this->get('province_id');
		$kabupaten 	= $this->get('majelis_city');

		// if(!empty($provinsi)){
		// 	$data = $this->simpenais_m->get_majelis_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->simpenais_m->get_majelis_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->simpenais_m->get_majelis();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->simpenais_m->get_majelis_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->simpenais_m->get_majelis_kecamatan($kabupaten);
			}else{
				$data = $this->simpenais_m->get_majelis();
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

	public function seniislam_get()
	{
		$provinsi 	= $this->get('lembaga_seni_provinsi');
		$kabupaten 	= $this->get('lembaga_seni_city');

		// if(!empty($provinsi)){
		// 	$data = $this->simpenais_m->get_seniislam_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->simpenais_m->get_seniislam_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->simpenais_m->get_seniislam();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->simpenais_m->get_seniislam_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->simpenais_m->get_seniislam_kecamatan($kabupaten);
			}else{
				$data = $this->simpenais_m->get_seniislam();
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

	public function dakwah_get()
	{
		$provinsi 	= $this->get('province_id');
		$kabupaten 	= $this->get('city_id');

		// if(!empty($provinsi)){
		// 	$data = $this->simpenais_m->get_dakwah_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->simpenais_m->get_dakwah_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->simpenais_m->get_dakwah();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->simpenais_m->get_dakwah_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->simpenais_m->get_dakwah_kecamatan($kabupaten);
			}else{
				$data = $this->simpenais_m->get_dakwah();
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

	public function ormas_get()
	{
		$provinsi 	= $this->get('province_id');
		$kabupaten 	= $this->get('city_id');

		// if(!empty($provinsi)){
		// 	$data = $this->simpenais_m->get_ormas_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->simpenais_m->get_ormas_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->simpenais_m->get_ormas();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->simpenais_m->get_ormas_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->simpenais_m->get_ormas_kecamatan($kabupaten);
			}else{
				$data = $this->simpenais_m->get_ormas();
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

	public function dewanhakim_get()
	{
		$provinsi 	= $this->get('province_id');
		$kabupaten 	= $this->get('city_id');

		// if(!empty($provinsi)){
		// 	$data = $this->simpenais_m->get_dewanhakim_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->simpenais_m->get_dewanhakim_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->simpenais_m->get_dewanhakim();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->simpenais_m->get_dewanhakim_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->simpenais_m->get_dewanhakim_kecamatan($kabupaten);
			}else{
				$data = $this->simpenais_m->get_dewanhakim();
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

	public function gurungaji_get()
	{
		$provinsi 	= $this->get('province_id');
		$kabupaten 	= $this->get('city_id');

		// if(!empty($provinsi)){
		// 	$data = $this->simpenais_m->get_gurungaji_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->simpenais_m->get_gurungaji_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->simpenais_m->get_gurungaji();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->simpenais_m->get_gurungaji_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->simpenais_m->get_gurungaji_kecamatan($kabupaten);
			}else{
				$data = $this->simpenais_m->get_gurungaji();
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

	public function lptq_get()
	{
		$provinsi 	= $this->get('province_id');
		$kabupaten 	= $this->get('lsm_city');

		// if(!empty($provinsi)){
		// 	$data = $this->simpenais_m->get_lptq_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->simpenais_m->get_lptq_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->simpenais_m->get_lptq();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->simpenais_m->get_lptq_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->simpenais_m->get_lptq_kecamatan($kabupaten);
			}else{
				$data = $this->simpenais_m->get_lptq();
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

	public function hafidz_get()
	{
		$provinsi 	= $this->get('province_id');
		$kabupaten 	= $this->get('city_id');

		// if(!empty($provinsi)){
		// 	$data = $this->simpenais_m->get_hafidz_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->simpenais_m->get_hafidz_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->simpenais_m->get_hafidz();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->simpenais_m->get_hafidz_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->simpenais_m->get_hafidz_kecamatan($kabupaten);
			}else{
				$data = $this->simpenais_m->get_hafidz();
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

	public function qari_get()
	{
		$provinsi 	= $this->get('province_id');
		$kabupaten 	= $this->get('city_id');

		// if(!empty($provinsi)){
		// 	$data = $this->simpenais_m->get_qari_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->simpenais_m->get_qari_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->simpenais_m->get_qari();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->simpenais_m->get_qari_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->simpenais_m->get_qari_kecamatan($kabupaten);
			}else{
				$data = $this->simpenais_m->get_qari();
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

	public function mufassir_get()
	{
		$provinsi 	= $this->get('province_id');
		$kabupaten 	= $this->get('city_id');

		// if(!empty($provinsi)){
		// 	$data = $this->simpenais_m->get_mufassir_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->simpenais_m->get_mufassir_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->simpenais_m->get_mufassir();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->simpenais_m->get_mufassir_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->simpenais_m->get_mufassir_kecamatan($kabupaten);
			}else{
				$data = $this->simpenais_m->get_mufassir();
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

	public function kaligrafer_get()
	{
		$provinsi 	= $this->get('province_id');
		$kabupaten 	= $this->get('city_id');

		// if(!empty($provinsi)){
		// 	$data = $this->simpenais_m->get_kaligrafer_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->simpenais_m->get_kaligrafer_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->simpenais_m->get_kaligrafer();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->simpenais_m->get_kaligrafer_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->simpenais_m->get_kaligrafer_kecamatan($kabupaten);
			}else{
				$data = $this->simpenais_m->get_kaligrafer();
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

	public function seniman_get()
	{
		$provinsi 	= $this->get('province_id');
		$kabupaten 	= $this->get('city_id');

		// if(!empty($provinsi)){
		// 	$data = $this->simpenais_m->get_seniman_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->simpenais_m->get_seniman_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->simpenais_m->get_seniman();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->simpenais_m->get_seniman_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->simpenais_m->get_seniman_kecamatan($kabupaten);
			}else{
				$data = $this->simpenais_m->get_seniman();
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

	public function budayawan_get()
	{
		$provinsi 	= $this->get('province_id');
		$kabupaten 	= $this->get('city_id');

		// if(!empty($provinsi)){
		// 	$data = $this->simpenais_m->get_budayawan_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->simpenais_m->get_budayawan_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->simpenais_m->get_budayawan();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->simpenais_m->get_budayawan_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->simpenais_m->get_budayawan_kecamatan($kabupaten);
			}else{
				$data = $this->simpenais_m->get_budayawan();
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

	public function radioislam_get()
	{
		$provinsi 	= $this->get('province_id');
		$kabupaten 	= $this->get('city_id');

		// if(!empty($provinsi)){
		// 	$data = $this->simpenais_m->get_radioislam_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->simpenais_m->get_radioislam_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->simpenais_m->get_radioislam();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->simpenais_m->get_radioislam_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->simpenais_m->get_radioislam_kecamatan($kabupaten);
			}else{
				$data = $this->simpenais_m->get_radioislam();
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

	public function penulisislam_get()
	{
		$provinsi 	= $this->get('province_id');
		$kabupaten 	= $this->get('city_id');

		// if(!empty($provinsi)){
		// 	$data = $this->simpenais_m->get_penulisislam_kabupaten($provinsi);
		// }else if(!empty($kabupaten)){
		// 	$data = $this->simpenais_m->get_penulisislam_kecamatan($kabupaten);
		// }else{
		// 	$data = $this->simpenais_m->get_penulisislam();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseBad;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi)){
			$data = $this->simpenais_m->get_penulisislam_kabupaten($provinsi);
			}else if(!empty($kabupaten)){
				$data = $this->simpenais_m->get_penulisislam_kecamatan($kabupaten);
			}else{
				$data = $this->simpenais_m->get_penulisislam();
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