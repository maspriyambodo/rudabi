<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/Format.php';

class Simpenghulu extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('simpenghulu_m', 'sm');
		$this->db_database2 = $this->load->database('database2', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
	}

	// Menghitung total query rudabi ------------------------------------------------------------

	function total_get()
	{
		$datas = array(
			$this->sm->get_total_datakua(),
			$this->sm->get_total_datapenghulu(),
			$this->sm->get_data_peristiwanikah(),
			$this->sm->get_datanikahrujuk()
		);

		if(!empty($datas)){
			$this->response($datas, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	// Menghitung total query rudabi ------------------------------------------------------------

	function index_get()
	{
		$props = $this->get('pegawai_province');
		$kabs  = $this->get('pegawai_city');

		if(!empty($props))
		{
			$kua = $this->sm->get_penghulu_props($props);
		}elseif($kabs){
			$kua = $this->sm->get_penghulu_kabs($kabs);
		}else{
			$kua = $this->sm->get_penghulu();
		}

		if(!empty($kua))
		{
			$this->response($kua, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}

		// if($id === null){
		// 	$kua = $this->sm->getKua();
		// }else{
		// 	$kua = $this->sm->getKua($id);
		// }

		// if($kua){
		// 	$this->response(	
		// 		$kua
		// 		, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->response([
		// 		'status' => false,
		// 		'message' => 'data tidak ditemukan!'
		// 	], REST_Controller::HTTP_NOT_FOUND);
		// }
	}

	// function index_post()
	// {
	// 	$id = $this->get('province_id');

	// 	if($id === null){
	// 		$kua = $this->sm->getKua();
	// 	}else{
	// 		$kua = $this->sm->getKua($id);
	// 	}

	// 	if($kua){
	// 		$this->response(
	// 			$kua
	// 			, REST_Controller::HTTP_OK);
	// 	}else{
	// 		$this->response([
	// 			'status' => false,
	// 			'message' => 'data tidak ditemukan!'
	// 		], REST_Controller::HTTP_NOT_FOUND);
	// 	}
	// }

	function penghulu_get()
	{
		$id = $this->get('city_id');
		$city = $this->get('city_id');
		$prov = $this->get('city_province');

		if(!empty($prov))
		{
			$pg = $this->sm->tampil_kab($prov);
		}elseif($city){
			$pg = $this->sm->tampil_detail($city);
		}else{
			$pg = $this->sm->tampil_prov();
		}

		if(!empty($pg)){
			$this->response($pg, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditemukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}

		// if($id === null){
		// 	$p = $this->sm->getPeng();
		// }else{
		// 	$p = $this->sm->getPeng($id);
		// }

		// if($p){
		// 	$this->response(
		// 		$p
		// 		, REST_Controller::HTTP_OK);
		// }else{
		// 	$this->response([
		// 		'status' => false,
		// 		'message' => 'data tidak ditemukan!'
		// 	], REST_Controller::HTTP_NOT_FOUND);
		// }
	}

	function penghulu_post()
	{
		$id = $this->get('city_id');

		if($id === null){
			$p = $this->sm->getPeng();
		}else{
			$p = $this->sm->getPeng($id);
		}

		if($p){
			$this->response(
				$p
				, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditemukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function nikah_get()
	{
		$city = $this->get('city_province');
		$detail = $this->get('nikah_city_id');

		if(!empty($city))
		{
			$nik = $this->sm->get_city($city);
		}elseif($detail){
			$nik = $this->sm->get_city_detail($detail);
		}else{
			$nik = $this->sm->get_provinsi();
		}

		if($nik){
			$this->response(
				$nik
				, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditemukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function kua_get()
	{
		$provs = $this->get('kua_province_id');
		$kabp = $this->get('kua_city_id');

		if(!empty($provs))
		{
			$dtkua = $this->sm->get_kua_provs($provs);
		}elseif($kabp){
			$dtkua = $this->sm->get_kua_kabp($kabp);
		}else{
			$dtkua = $this->sm->get_kua();
		}

		if(!empty($dtkua))
		{
			$this->response($dtkua, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function kategoripenghulu_get()
	{
		$kat = $this->get('pegawai_kategory_penghulu');

		if(!empty($kat))
		{
			$katpeng = $this->sm->get_kategori_penghulu($kat);
		}else{
			$katpeng = $this->sm->get_kategori();
		}

		if(!empty($katpeng))
		{
			$this->response($katpeng, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function kategoripangkat_get()
	{
		$pangkat = $this->get('pegawai_pangkat');

		if(!empty($pangkat))
		{
			$katpang = $this->sm->get_kategori_pangkat($pangkat);
		}else{
			$katpang = $this->sm->get_kategori_pgkt();
		}

		if(!empty($katpang))
		{
			$this->response($katpang, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function kategoritahun_get()
	{
		$katun = $this->sm->get_kategori_tahun();

		if(!empty($katun))
		{
			$this->response($katun, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function nikahrujuk_get()
	{
		$tahun 	= $this->get('rekap_tahun');
		$provi 	= $this->get('rekap_province');
		$city 	= $this->get('city_id');

		if(!empty($tahun) && !empty($provi))
		{
			$nikah = $this->sm->get_nikah_provi($tahun,$provi);
		}elseif(!empty($tahun) && !empty($city)){
			$nikah = $this->sm->get_nikah_city($tahun,$city);
		}elseif($tahun){
			$nikah = $this->sm->get_nikah_tahun($tahun);
		}else{
			$nikah = $this->sm->get_nikah();
		}

		if(!empty($nikah))
		{
			$this->response($nikah, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function penghulupensiun_get()
	{
		$proppn = $this->get('pegawai_province');
		$kabpn = $this->get('pegawai_city');

		if(!empty($proppn))
		{
			$pens = $this->sm->tampil_pensiun_prop($proppn);
		}elseif($kabpn){
			$pens = $this->sm->tampil_pensiun_kab($kabpn);
		}else{
			$pens = $this->sm->tampil_pensiun();
		}

		if(!empty($pens))
		{
			$this->response($pens, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function penghulubebas_get()
	{
		$pegprov = $this->get('pegawai_province');
		$pegcity = $this->get('city_id');

		if(!empty($pegprov))
		{
			$pprov = $this->sm->get_penghulu_bebasprov($pegprov);
		}elseif($pegcity){
			$pprov = $this->sm->get_penghulu_bebascity($pegcity);
		}else{
			$pprov = $this->sm->get_penghulu_bebas();
		}

		if(!empty($pprov))
		{
			$this->response($pprov, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	// function penghulupensiun_get()
	// {
	// 	$peprov = $this->get('pegawai_province');
	// 	$pecity = $this->get('pegawai_city');

	// 	if(!empty($peprov))
	// 	{
	// 		$ppen = $this->sm->get_pensiun_prop($peprov);
	// 	}elseif($pecity){
	// 		$ppen = $this->sm->get_pensiun_city($pecity);
	// 	}else{
	// 		$ppen = $this->sm->get_pensiun();
	// 	}

	// 	if(!empty($ppen))
	// 	{
	// 		$this->response($ppen, REST_Controller::HTTP_OK);
	// 	}else{
	// 		$this->responseBad;
	// 	}
	// }

	function propinsi_get()
	{
		$id = $this->get('province_id');
		if($id === null){
			$prop = $this->sm->getProp();
		}else{
			$prop = $this->sm->getProp($id);
		}

		if($prop){
			$this->response([
				'status' => true,
				'data' => $prop
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditemukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function propinsi_post()
	{
		$id = $this->get('province_id');
		if($id === null){
			$prop = $this->sm->getProp();
		}else{
			$prop = $this->sm->getProp($id);
		}

		if($prop){
			$this->response([
				'status' => true,
				'data' => $prop
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditemukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function kabupaten_get()
	{
		$id = $this->get('city_id');
		if($id === null){
			$kab = $this->sm->getKab();
		}else{
			$kab = $this->sm->getKab($id);
		}

		if($kab){
			$this->response([
				'status' => true,
				'data' => $kab
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditemukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function kabupaten_post()
	{
		$id = $this->get('city_id');
		if($id === null){
			$kab = $this->sm->getKab();
		}else{
			$kab = $this->sm->getKab($id);
		}

		if($kab){
			$this->response([
				'status' => true,
				'data' => $kab
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditemukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function nikahprov_get()
	{
		$np = $this->sm->getNP();
		if(!empty($np)){
			$this->response($np, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function nikahkab_get()
	{
		$nk = $this->sm->getNK();
		if(!empty($nk)){
			$this->response($nk, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function nikahkua_get()
	{
		$nkk = $this->sm->getNKK();
		if(!empty($nkk)){
			$this->response($nkk, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}
}
