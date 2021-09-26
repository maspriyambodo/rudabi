<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';


class Sihat extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('sihat_m');
		$this->sihat = $this->load->database('database6', TRUE);
		$this->responseNon = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data tidak ditemukan'], REST_Controller::HTTP_BAD_REQUEST);
		$this->responseAktif = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data dinonaktifkan.'], REST_Controller::HTTP_FORBIDDEN);
	}

	// ini kepake
	public function alathisabrukyat_get()
	{
		$provinsi 	= $this->get("alat_provinsi");
		$tahun 		= $this->get("alat_tahun");

		// if(!empty($provinsi) && (!empty($tahun))){
		// 	$data = $this->sihat_m->get_alathisab_provinsi_tahun($provinsi, $tahun);
		// }else if(!empty($tahun)){
		// 	$data = $this->sihat_m->get_alathisab_tahun($tahun);
		// }else{
		// 	$data = $this->sihat_m->get_alathisab();
		// }

		// if(!empty($data)){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseNon;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($provinsi) && (!empty($tahun))){
			$data = $this->sihat_m->get_alathisab_provinsi_tahun($provinsi, $tahun);
			}else if(!empty($tahun)){
				$data = $this->sihat_m->get_alathisab_tahun($tahun);
			}else{
				$data = $this->sihat_m->get_alathisab();
			}

			if(!empty($data)){
				$this->response($data, REST_Controller::HTTP_OK);
			}else{
				$this->responseNon;
			}
        }else{
            $this->responseAktif;
        }
	}

	// ini kepake
	public function tenagaahli_get()
	{
		$provinsi = $this->get('tenaga_provinsi');

		// if($provinsi){
		// 	$data = $this->sihat_m->get_tenaga_provinsi($provinsi);
		// }else{
		// 	$data = $this->sihat_m->get_tenaga();
		// }

		// if($data){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseNon;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if($provinsi){
			$data = $this->sihat_m->get_tenaga_provinsi($provinsi);
			}else{
				$data = $this->sihat_m->get_tenaga();
			}

			if($data){
				$this->response($data, REST_Controller::HTTP_OK);
			}else{
				$this->responseNon;
			}
        }else{
            $this->responseAktif;
        }
	}

	// ini kepake
	public function hisabpengukuran_get()
	{
		$provinsi = $this->get('ukur_provinsi');

		// if($provinsi){
		// 	$data = $this->sihat_m->get_hisab_provinsi($provinsi);
		// }else{
		// 	$data = $this->sihat_m->get_hisab();
		// }

		// if($data){
		// 	$this->response($data, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseNon;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if($provinsi){
			$data = $this->sihat_m->get_hisab_provinsi($provinsi);
			}else{
				$data = $this->sihat_m->get_hisab();
			}

			if($data){
				$this->response($data, REST_Controller::HTTP_OK);
			}else{
				$this->responseNon;
			}
        }else{
            $this->responseAktif;
        }
	}

	// ini kepake
	function hisablokasi_get()
	{
		$provinsi = $this->get('lokasi_provinsi');

		// if($provinsi){
		// 	$hsl = $this->sihat_m->get_hisablokasi_provinsi($provinsi);
		// }else{
		// 	$hsl = $this->sihat_m->get_hisablokasi();
		// }

		// if($hsl){
		// 	$this->response($hsl, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseNon;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if($provinsi){
			$hsl = $this->sihat_m->get_hisablokasi_provinsi($provinsi);
			}else{
				$hsl = $this->sihat_m->get_hisablokasi();
			}

			if($hsl){
				$this->response($hsl, REST_Controller::HTTP_OK);
			}else{
				$this->responseNon;
			}
        }else{
            $this->responseAktif;
        }
	}

	// ini kepake
	function hisablaporan_get()
	{
		$provinsi = $this->get('ukur_provinsi');

		// if($provinsi){
		// 	$hsbl = $this->sihat_m->get_hisablaporan_provinsi($provinsi);
		// }else{
		// 	$hsbl = $this->sihat_m->get_hisablaporan();
		// }

		// if($hsbl){
		// 	$this->response($hsbl, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseNon;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if($provinsi){
			$hsbl = $this->sihat_m->get_hisablaporan_provinsi($provinsi);
			}else{
				$hsbl = $this->sihat_m->get_hisablaporan();
			}

			if($hsbl){
				$this->response($hsbl, REST_Controller::HTTP_OK);
			}else{
				$this->responseNon;
			}
        }else{
            $this->responseAktif;
        }
	}

	// ini kepake
	function datalintang_get()
	{
		$provinsi = $this->get('nama_propinsi');

		// if($provinsi){
		// 	$dtl = $this->sihat_m->get_lintang_provinsi($provinsi);
		// }else{
		// 	$dtl = $this->sihat_m->get_lintang();
		// }

		// if($dtl){
		// 	$this->response($dtl, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->responseNon;
		// }

		$status = $this->permissions->is_actived();
        if($status == 1){
            if($provinsi){
			$dtl = $this->sihat_m->get_lintang_provinsi($provinsi);
			}else{
				$dtl = $this->sihat_m->get_lintang();
			}

			if($dtl){
				$this->response($dtl, REST_Controller::HTTP_OK);
			}else{
				$this->responseNon;
			}
        }else{
            $this->responseAktif;
        }
	}

}