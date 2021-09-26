<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/Cuy_Controller.php';
//require APPPATH . '/libraries/Format.php';


class Eimas extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('eimas_m', 'em');
		$this->db_database10 = $this->load->database('database10', TRUE);
		// $this->data_notfound = $this->response(['status' => false, 'message' => 'Mohon maaf, permintaan data tidak ditemukan, mohon menghubungi administrator.'], 404);
		// $this->data_nonaktif = $this->response(['status' => false, 'message' => 'Mohon maaf, permintaan data sedang dinonaktifkan, mohon menghubungi administrator.'], 406);
		// $this->responseBad = $this->response(['status' => false, 'message' => 'Mohon maaf, permintaan data sedang dinonaktifkan, mohon menghubungi administrator.'], 404);
	}

	// Menghitung totalan data ----------------------------------------------------------------
	function dtmasjid_get()
	{
		$data = array($this->em->get_totalan_dtmasjid());
		$aktifapi = $this->permissions->is_actived();
		if($aktifapi == 1){
			$this->response($data, REST_Controller::HTTP_OK);
		}else{
			$this->response(['status' => false, 'message' => 'Mohon maaf, permintaan data sedang dinonaktifkan, mohon menghubungi administrator.'], 406);
		}
	}

	function dtmushalla_get()
	{
		$datas = array($this->em->get_totalan_dtmushalla());
		if(!empty($datas)){
			$this->response($datas, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}
	
	function total_get()
	{
		$datas = array(
			$this->em->get_totalan_dtmasjid(),
			$this->em->get_totalan_dtmushalla(),
			$this->em->get_totalan_dtmasjidtipologi(),
			$this->em->get_totalan_dtmushallatipologi()
		);

		if(!empty($datas)){
			$this->response($datas, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function tipomas_get()
	{
		$datas = $this->em->get_totalan_tipoid();

		if(!empty($datas)){
			$this->response($datas, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function tipomus_get()
	{
		$datas = $this->em->get_totalan_tipoidmus();

		if(!empty($datas)){
			$this->response($datas, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	// Menghitung totalan data ----------------------------------------------------------------

	function provinsi_get()
	{
		$id = $this->get('provinsi_id');

		if($id === null){
			$prov = $this->em->get_provinsi();
		}else{
			$prov = $this->em->get_provinsi($id);
		}

		if($prov){
			$this->response($prov, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditemukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function provtipol_get()
	{
		$id = $this->get('provinsi_id');

		if($id === null){
			$prom = $this->em->get_provmas();
		}else{
			$prom = $this->em->get_provmas($id);
		}

		if($prom){
			$this->response($prom, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function kabtipol_get()
	{
		$id = $this->get('kabupaten_id');

		$prom = $this->em->get_kabmas($id);
		if(!empty($prom)){
			$this->response($prom, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function musprov_get()
	{
		$id = $this->get('provinsi_id');

		if($id === null){
			$musp = $this->em->get_musprov();
		}else{
			$musp = $this->em->get_musprov($id);
		}

		if($musp){
			$this->response($musp, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function muskab_get()
	{
		$id = $this->get('kabupaten_id');

		$mskb = $this->em->get_muskec($id);
		if(!empty($mskb)){
			$this->response($mskb, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function fasilitasmasjid_get()
	{
		$prop = $this->get('provinsi_id');
		$kab = 	$this->get('kabupaten_id');
		$kecm = $this->get('kecamatan_id');

		if(!empty($prop))
		{
			$fg = $this->em->tampil_kabupaten($prop);
		}elseif($kab){
			$fg = $this->em->tampil_kecamatan($kab);
		}else{
			$fg = $this->em->tampil_propinsi();
		}

		if(!empty($fg))
		{
			$this->response($fg, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function fasilitasmushalla_get()
	{
		$propfm = $this->get('provinsi_id');
		$kabfm = 	$this->get('kabupaten_id');
		$kecmfm = $this->get('kecamatan_id');

		if(!empty($propfm))
		{
			$fm = $this->em->tampil_kabupaten_mushalla($propfm);
		}elseif($kabfm){
			$fm = $this->em->tampil_kecamatan_mushalla($kabfm);
		}else{
			$fm = $this->em->tampil_propinsi_mushalla();
		}

		if(!empty($fm))
		{
			$this->response($fm, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function datamasjid_get()
	{
		$prop1 	= $this->get('provinsi_id');
		$kab1	= $this->get('kabupaten_id');
		$kec1	= $this->get('kecamatan_id');

		if(!empty($prop1))
		{
			$dm = $this->em->tampil_prop($prop1);
		}elseif($kab1){
			$dm = $this->em->tampil_kabmas($kab1);
		}elseif($kec1){
			$dm = $this->em->tampil_detail($kec1);
		}else{
			$dm = $this->em->tampil_propmas();
		}

		if(!empty($dm))
		{
			$this->response($dm, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function tipologimasjid_get()
	{
		$tpm = $this->em->tampil_tipologi_masjid();

		if(!empty($tpm)){
			$this->response($tpm, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function tipologimushalla_get()
	{
		$tpmsh = $this->em->tampil_tipologi_mushalla();

		if(!empty($tpmsh)){
			$this->response($tpmsh, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function datamushalla_get()
	{
		$prop2 	= $this->get('provinsi_id');
		$kab2	= $this->get('kabupaten_id');
		$kec2	= $this->get('kecamatan_id');

		if(!empty($prop2))
		{
			$dms = $this->em->tampil_prop_mushalla($prop2);
		}elseif($kab2){
			$dms = $this->em->tampil_kabmas_mushalla($kab2);
		}elseif($kec2){
			$dms = $this->em->tampil_detail_mushalla($kec2);
		}else{
			$dms = $this->em->tampil_propmas_mushalla();
		}

		if(!empty($dms))
		{
			$this->response($dms, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function kegiatanmasjid_get()
	{
		$propkeg	= $this->get('provinsi_id');
		$kabkeg 	= $this->get('kabupaten_id');

		if(!empty($propkeg))
		{
			$kgm = $this->em->tampil_kegiatan_masprop($propkeg);
		}elseif($kabkeg){
			$kgm = $this->em->tampil_kegiatan_maskab($kabkeg);
		}else{
			$kgm = $this->em->tampil_kegiatan_mas();
		}

		if(!empty($kgm))
		{
			$this->response($kgm, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function kegiatanmushalla_get()
	{
		$propkeg2 = $this->get('provinsi_id');
		$kabkeg2 = $this->get('kabupaten_id');

		if(!empty($propkeg2)){
			$kgmm = $this->em->tampil_kegiatan_musprop($propkeg2);
		}elseif($kabkeg2){
			$kgmm = $this->em->tampil_kegiatan_muskab($kabkeg2);
		}else{
			$kgmm = $this->em->tampil_kegiatan_mus();
		}

		if(!empty($kgmm)){
			$this->response($kgmm, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function sdmmasjid_get()
	{
		$propsdm = $this->get('provinsi_id');
		$kabsdm = $this->get('kabupaten_id');

		if(!empty($propsdm)){
			$sdmmas = $this->em->tampil_sdm_masprop($propsdm);
		}elseif($kabsdm){
			$sdmmas = $this->em->tampil_sdm_maskab($kabsdm);
		}else{
			$sdmmas = $this->em->tampil_sdm_mas();
		}

		if(!empty($sdmmas)){
			$this->response($sdmmas, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function sdmmushalla_get()
	{
		$propsdm2 = $this->get('provinsi_id');
		$kabsdm2 = $this->get('kabupaten_id');

		if(!empty($propsdm2)){
			$sdmmus = $this->em->tampil_sdm_musprop($propsdm2);
		}elseif($kabsdm2){
			$sdmmus = $this->em->tampil_sdm_muskab($kabsdm2);
		}else{
			$sdmmus = $this->em->tampil_sdm_mus();
		}

		if(!empty($sdmmus)){
			$this->response($sdmmus, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function legalitasmasjid_get()
	{
		$lglsprop = $this->get('provinsi_id');
		$lglskab = $this->get('kabupaten_id');

		if(!empty($lglsprop)){
			$llm = $this->em->tampil_legal_masprop($lglsprop);
		}elseif($lglskab){
			$llm = $this->em->tampil_legal_maskab($lglskab);
		}else{
			$llm = $this->em->tampil_legal_mas();
		}

		if(!empty($llm)){
			$this->response($llm, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function legalitasmushalla_get()
	{
		$lglsmprop = $this->get('provinsi_id');
		$lglsmkab = $this->get('kabupaten_id');

		if(!empty($lglsmprop)){
			$llms = $this->em->tampil_legal_musprop($lglsmprop);
		}elseif($lglsmkab){
			$llms = $this->em->tampil_legal_muskab($lglsmkab);
		}else{
			$llms = $this->em->tampil_legal_mus();
		}

		if(!empty($llms)){
			$this->response($llms, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function kondisimasjid_get()
	{
		$kndsmprop = $this->get('provinsi_id');
		$kndsmkab = $this->get('kabupaten_id');

		if(!empty($kndsmprop))
		{
			$kdsm = $this->em->tampil_kondisimasjid_prop($kndsmprop);
		}elseif($kndsmkab){
			$kdsm = $this->em->tampil_kondisimasjid_kab($kndsmkab);
		}else{
			$kdsm = $this->em->tampil_kondisimasjid();
		}

		if(!empty($kdsm))
		{
			$this->response($kdsm, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function kondisimushalla_get()
	{
		$musprop = $this->get('provinsi_id');
		$muskab = $this->get('kabupaten_id');

		if(!empty($musprop))
		{
			$kdm = $this->em->tampil_kondisimushalla_prop($musprop);
		}elseif($muskab){
			$kdm = $this->em->tampil_kondisimushalla_kab($muskab);
		}else{
			$kdm = $this->em->tampil_kondisimushalla();
		}

		if(!empty($kdm))
		{
			$this->response($kdsm, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function fahammasjid_get()
	{
		$fahprop = $this->get('provinsi_id');
		$fahkab = $this->get('kabupaten_id');

		if(!empty($fahprop))
		{
			$fhm = $this->em->tampil_fahammasjid_prop($fahprop);
		}elseif($fahkab){
			$fhm = $this->em->tampil_fahammasjid_kab($fahkab);
		}else{
			$fhm = $this->em->tampil_fahammasjid();
		}

		if(!empty($fhm))
		{
			$this->response($fhm, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function fahammushalla_get()
	{
		$fmprop = $this->get('provinsi_id');
		$fmkab = $this->get('kabupaten_id');

		if(!empty($fmprop))
		{
			$fms = $this->em->tampil_fahammushalla_prop($fmprop);
		}elseif($fmkab){
			$fms = $this->em->tampil_fahammushalla_kab($fmkab);
		}else{
			$fms = $this->em->tampil_fahammushalla();
		}

		if(!empty($fms)){
			$this->response($fms, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function organisasimasjid_get()
	{
		$omprop = $this->get('provinsi_id');
		$omkab = $this->get('kabupaten_id');

		if(!empty($omprop))
		{
			$oms = $this->em->tampil_orgasmasjid_prop($omprop);
		}elseif($omkab){
			$oms = $this->em->tampil_orgasmasjid_kab($omkab);
		}else{
			$oms = $this->em->tampil_orgasmasjid();
		}

		if(!empty($oms))
		{
			$this->response($oms, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function organisasimushalla_get()
	{
		$omsprop = $this->get('provinsi_id');
		$omskab = $this->get('kabupaten_id');

		if(!empty($omsprop))
		{
			$omss = $this->em->tampil_orgasmushalla_prop($omsprop);
		}elseif($omskab){
			$omss = $this->em->tampil_orgasmushalla_kab($omskab);
		}else{
			$omss = $this->em->tampil_orgasmushalla();
		}

		if(!empty($omss))
		{
			$this->response($omss, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	// function kectipol_get()
	// {
	// 	//
	// 	$id = $this->get('kabupaten_id');

	// 	if($id === null){
	// 		$kec = $this->em->get_kecmas();
	// 	}else{
	// 		$kec = $this->em->get_kecmas($id);
	// 	}

	// 	if($kec){
	// 		$this->response($kec, REST_Controller::HTTP_OK);
	// 	}else{
	// 		$this->response([
	// 			'status' => false,
	// 			'message' => 'data tidak ditemukan!'
	// 		], REST_Controller::HTTP_NOT_FOUND);
	// 	}
	// }

	// function kecamatan_get()
	// {
	// 	$id = $this->get('kecamatan_id');
	// 	if($id === null){
	// 		$kec = $this->sm->get_kecamatan();
	// 	}else{
	// 		$kec = $this->sm->get_kecamatan($id);
	// 	}

	// 	if($kec){
	// 		$this->response([
	// 			'status' => true,
	// 			'data' => $kec
	// 		], REST_Controller::HTTP_OK);
	// 	}else{
	// 		$this->response([
	// 			'status' => false,
	// 			'message' => 'data tidak ditemukan!'
	// 		], REST_Controller::HTTP_NOT_FOUND);
	// 	}
	// }

	// function detaildaerah_get()
	// {
	// 	$det = $this->sm->get_detaildaerah();

	// 	if($det){
	// 		$this->response([
	// 			'status' => true,
	// 			'data' => $det
	// 		], REST_Controller::HTTP_OK);
	// 	}else{
	// 		$this->response([
	// 			'status' => false,
	// 			'message' => 'data tidak ditemukan!'
	// 		], REST_Controller::HTTP_NOT_FOUND);
	// 	}
	// }

	// function detailmasjid_get()
	// {
	// 	$dem = $this->sm->get_masjid();

	// 	if($dem){
	// 		$this->response([
	// 			'status' => true,
	// 			'data' => $dem
	// 		], REST_Controller::HTTP_OK);
	// 	}else{
	// 		$this->response([
	// 			'status' => false,
	// 			'message' => 'data tidak ditemukan!'
	// 		], REST_Controller::HTTP_NOT_FOUND);
	// 	}
	// }

	// function detailmushalla_get()
	// {
	// 	$demu = $this->sm->get_mushola();

	// 	if($demu){
	// 		$this->response([
	// 			'status' => true,
	// 			'data' => $demu
	// 		], REST_Controller::HTTP_OK);
	// 	}else{
	// 		$this->response([
	// 			'status' => false,
	// 			'message' => 'data tidak ditemukan!'
	// 		], REST_Controller::HTTP_NOT_FOUND);
	// 	}
	// }

	// function tipologimasjid_get()
	// {
	// 	$timas = $this->sm->get_tipologimasjid();
	// 	if($timas)
	// 	{
	// 		$this->response(
	// 			//'status' => true,
	// 			//'data' => 
	// 			$timas
	// 		, REST_Controller::HTTP_OK);
	// 	}else{
	// 		$this->response([
	// 			'status' => false,
	// 			'message' => 'data tidak ditemukan!'
	// 		], REST_Controller::HTTP_NOT_FOUND);
	// 	}
	// }

	// function tipologimushalla_get()
	// {
	// 	$timus = $this->sm->get_tipologimushalla();
	// 	if($timus){
	// 		$this->response(
	// 			//'status' => true,
	// 			//'data' => 
	// 			$timus
	// 		, REST_Controller::HTTP_OK);
	// 	}else{
	// 		$this->response([
	// 			'status' => false,
	// 			'message' => 'data tidak ditemukan!'
	// 		], REST_Controller::HTTP_NOT_FOUND);
	// 	}
	// }

	// function masjidprovinsi_get()
	// {
	// 	$masprov = $this->sm->get_masprov();
	// 	if($masprov){
	// 		$this->response(
	// 			//'status' => true,
	// 			//'data' => 
	// 			$masprov
	// 		, REST_Controller::HTTP_OK);
	// 	}else{
	// 		$this->response([
	// 			'status' => false,
	// 			'message' => 'data tidak ditemukan!'
	// 		], REST_Controller::HTTP_NOT_FOUND);
	// 	}
	// }

	// function mushallaprovinsi_get()
	// {
	// 	$musprov = $this->sm->get_musprov();
	// 	if($musprov){
	// 		$this->response(
	// 			//'status' => true,
	// 			//'data' => 
	// 			$musprov
	// 		, REST_Controller::HTTP_OK);
	// 	}else{
	// 		$this->response([
	// 			'status' => false,
	// 			'message' => 'data tidak ditemukan!'
	// 		], REST_Controller::HTTP_NOT_FOUND);
	// 	}
	// }

	// function mushallasum_get()
	// {
	// 	$musum = $this->sm->get_musum();
	// 	if($musum){
	// 		$this->response(
	// 			//'status' => true,
	// 			//'data' => 
	// 			$musum
	// 		, REST_Controller::HTTP_OK);
	// 	}else{
	// 		$this->response([
	// 			'status' => false,
	// 			'message' => 'data tidak ditemukan!'
	// 		], REST_Controller::HTTP_NOT_FOUND);
	// 	}
	// }

	// function masjidsum_get()
	// {
	// 	$masum = $this->sm->get_masum();
	// 	if($masum){
	// 		$this->response(
	// 			//'status' => true,
	// 			//'data' => 
	// 			$masum
	// 		, REST_Controller::HTTP_OK);
	// 	}else{
	// 		$this->response([
	// 			'status' => false,
	// 			'message' => 'data tidak ditemukan!'
	// 		], REST_Controller::HTTP_NOT_FOUND);
	// 	}
	// }

	// function sholat_get()
	// {	
	// 	$id = $this->get('bulan');
	// 	if($id === null){
	// 		$ibdh = $this->sm->get_sholat();
	// 	}else{
	// 		$ibdh = $this->sm->get_sholat($id);
	// 	}

	// 	if($ibdh){
	// 		$this->response([
	// 			'status' => true,
	// 			'data' => $ibdh
	// 		], REST_Controller::HTTP_OK);
	// 	}else{
	// 		$this->response([
	// 			'status' => false,
	// 			'message' => 'data tidak ditemukan!'
	// 		], REST_Controller::HTTP_NOT_FOUND);
	// 	}
	// }
}