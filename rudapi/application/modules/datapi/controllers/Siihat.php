<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';


class Siihat extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('sihat_m', 'sm');
		$this->db_database6 = $this->load->database('database6', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
		$this->responseNon = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data tidak ditemukan'], REST_Controller::HTTP_BAD_REQUEST);
		//$this->load->library('gett');
	}

	function total_get()
	{
		$datas = array(
			$this->sm->get_totalan(),
			$this->sm->get_totalan_tenaga(),
			$this->sm->get_totalan_pengukuran(),
			$this->sm->get_totalan_lokasi(),
			$this->sm->get_totalan_laporan(),
			$this->sm->get_totalan_lintang()
		);

		if(!empty($datas)){
			$this->response($datas, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function alat_get()
	{
		$datas = $this->sm->get_filteralat();

		if(!empty($datas)){
			$this->response($datas, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function alathisabrukyat_get()
	{
		$datatotal = $this->get("alat_tahun");

		if(!empty($datatotal)){
			$datot = $this->sm->get_totalan_tahun($datatotal);
		}else{
			$datot = $this->sm->get_totalan();
		}

		if(!empty($datot)){
			$this->response($datot, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function tenagaahlis_get()
	{
		$datatotal = $this->sm->get_totalan_tenaga();

		if(!empty($datatotal)){
			$this->response($datatotal, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function hisabpengukurans_get()
	{
		$datatotal = $this->sm->get_totalan_pengukuran();

		if(!empty($datatotal)){
			$this->response($datatotal, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function hisablokasis_get()
	{
		$datatotal = $this->sm->get_totalan_lokasi();

		if(!empty($datatotal)){
			$this->response($datatotal, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function hisablaporans_get()
	{
		$datatotal = $this->sm->get_totalan_laporan();

		if(!empty($datatotal)){
			$this->response($datatotal, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function lintangkota_get()
	{
		$datatotal = $this->sm->get_totalan_lintang();

		if(!empty($datatotal)){
			$this->response($datatotal, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function tahunalat_get()
	{
		$datun = $this->sm->get_tahun_alat();

		if(!empty($datun)){
			$this->response($datun, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function alat2020_get()
	{
		$provinsi = $this->get('alat_provinsi');

		if($provinsi){
			$first = $this->sm->alat_provinsi2020($provinsi);
		}else{
			$first = $this->sm->alat_tahun2020();
		}

		if($first){
			$this->response($first, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function alat2019_get()
	{
		$provinsi = $this->get('alat_provinsi');

		if($provinsi){
			$two = $this->sm->alat_provinsi2019($provinsi);
		}else{
			$two = $this->sm->alat_tahun2019();
		}

		if($two){
			$this->response($two, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function alat2018_get()
	{
		$provinsi = $this->get('alat_provinsi');

		if($provinsi){
			$three = $this->sm->alat_provinsi2018($provinsi);
		}else{
			$three = $this->sm->alat_tahun2018();
		}

		if($three){
			$this->response($three, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function alat2017_get()
	{
		$provinsi = $this->get('alat_provinsi');

		if($provinsi){
			$four = $this->sm->alat_provinsi2017($provinsi);
		}else{
			$four = $this->sm->alat_tahun2017();
		}

		if($four){
			$this->response($four, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function alat2016_get()
	{
		$provinsi = $this->get('alat_provinsi');

		if($provinsi){
			$five = $this->sm->alat_provinsi2016($provinsi);
		}else{
			$five = $this->sm->alat_tahun2016();
		}

		if($five){
			$this->response($five, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function alat2015_get()
	{
		$provinsi = $this->get('alat_provinsi');

		if($provinsi){
			$six = $this->sm->alat_provinsi2015($provinsi);
		}else{
			$six = $this->sm->alat_tahun2015();
		}

		if($six){
			$this->response($six, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function tenagaahli_get()
	{
		$provinsi = $this->get('tenaga_provinsi');

		if($provinsi){
			$ta = $this->sm->get_tenagaprovinsi($provinsi);
		}else{
			$ta = $this->sm->get_tenaga();
		}

		if($ta){
			$this->response($ta, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function hisabpengukuran_get()
	{
		$provinsi = $this->get('ukur_provinsi');

		if($provinsi){
			$hsb = $this->sm->get_hisabprovinsi($provinsi);
		}else{
			$hsb = $this->sm->get_hisab();
		}

		if($hsb){
			$this->response($hsb, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function hisablokasi_get()
	{
		$provinsi = $this->get('lokasi_provinsi');

		if($provinsi){
			$hsl = $this->sm->get_hisablokasiprovinsi($provinsi);
		}else{
			$hsl = $this->sm->get_hisablokasi();
		}

		if($hsl){
			$this->response($hsl, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function hisablaporan_get()
	{
		$provinsi = $this->get('ukur_provinsi');

		if($provinsi){
			$hsbl = $this->sm->get_hisablaporanprovinsi($provinsi);
		}else{
			$hsbl = $this->sm->get_hisablaporan();
		}

		if($hsbl){
			$this->response($hsbl, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function datalintang_get()
	{
		$provinsi = $this->get('nama_propinsi');

		if($provinsi){
			$dtl = $this->sm->get_lintangprovinsi($provinsi);
		}else{
			$dtl = $this->sm->get_lintang();
		}

		if($dtl){
			$this->response($dtl, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function hisabpuasa_get()
	{
		$puasa = $this->sm->get_ramadhan();

		if(!empty($puasa))
		{
			$this->response($puasa, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

}