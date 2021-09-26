<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';


class Simpenaiss extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('simpenais_m', 'sm');
		$this->db_database5 = $this->load->database('database5', TRUE);
		$this->db_simpenais_new = $this->load->database('db_simpenais', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
		//$this->load->library('gett');
	}

	// Menghitung total query rudabi ------------------------------------------------------------

	function total_get()
	{
		$datas = array(
			$this->sm->get_total_penyuluhpns(),
			$this->sm->get_total_penyuluhnonpns(),
			$this->sm->get_data_majelistaklim(),
			$this->sm->get_total_seniislam(),
			$this->sm->get_total_lembagadakwah(),
			$this->sm->get_total_ormasislam(),
			$this->sm->get_total_dewanhakim(),
			$this->sm->get_total_gurungaji(),
			$this->sm->get_total_lptq(),
			$this->sm->get_total_hafidz(),
			$this->sm->get_total_qari(),
			$this->sm->get_total_mufassir(),
			$this->sm->get_total_kaligrafer(),
			$this->sm->get_total_seniman(),
			$this->sm->get_total_budayawan(),
			$this->sm->get_total_radioislam(),
			$this->sm->get_total_penulisislam()
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
		$id = $this->get('province_id');
		$nonpns = $this->get('penyuluh_nonpns_provinsi');

		if($id){
			$prov = $this->sm->get_provinsi_pns($id);
		}elseif($nonpns){
			$prov = $this->sm->get_provinsi_nonpns($nonpns);
		}else{
			$prov = $this->sm->get_provinsi();
		}

		if($prov){
			$this->response($prov, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function datapns_get()
	{
		$idprop = $this->get('penyuluh_pns_provinsi');

		if(!empty($idprop))
		{
			$dpns = $this->sm->tampil_datapns_prop($idprop);
		}else{
			$dpns = $this->sm->tampil_datapns();
		}

		if(!empty($dpns))
		{
			$this->response($dpns, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function datanonpns_get()
	{
		$idprop = $this->get('penyuluh_nonpns_provinsi');

		if(!empty($idprop))
		{
			$dpnss = $this->sm->tampil_datanonpnspns_prop($idprop);
		}else{
			$dpnss = $this->sm->tampil_datanonpnspns();
		}

		if(!empty($dpnss))
		{
			$this->response($dpnss, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function penyuluhpns_get()
	{
		$id = $this->get('province_id');

		if($id === null){
			$this->response(['message' => 'Masukkan province_id'], REST_Controller::HTTP_NOT_FOUND);
		}else{
			$pns = $this->sm->get_pns($id);
		}

		if($pns){
			$this->response($pns, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditemukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function statuskawin_get()
	{
		$id = $this->get('province_id');

		if($id === null){
			$stk = $this->sm->get_status();
		}else{
			$stk = $this->sm->get_status($id);
		}

		if($stk){
			$this->response($stk, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
	

	function majelistaklim_get()
	{
		$id = $this->get('province_id');
		$city_id = $this->get('city_id');

		if($id){
			$mjls = $this->sm->get_majelis_province($id);
		}elseif($city_id){
			$mjls = $this->sm->get_majelis_city($city_id);
		}else{
			$mjls = $this->sm->get_majelis();
		}

		if($mjls){
			$this->response($mjls, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function lembagaseni_get()
	{
		$lembaga_seni_provinsi = $this->get('lembaga_seni_provinsi');
		$city_id = $this->get('city_id');

		if($lembaga_seni_provinsi){
			$lbs = $this->sm->get_lembagaseni_province($lembaga_seni_provinsi);
		}elseif($city_id){
			$lbs = $this->sm->get_lembagaseni_city($city_id);
		}else{
			$lbs = $this->sm->get_lembagaseni_all();
		}

		if($lbs){
			$this->response($lbs, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function lsm_get()
	{
		$province_id = $this->get('province_id');
		$city_id = $this->get('lsm_city');

		if($province_id){
			$lsm = $this->sm->get_lsm_province($province_id);
		}elseif($city_id){
			$lsm = $this->sm->get_lsm_city($city_id);
		}else{
			$lsm = $this->sm->get_lsm();
		}

		if($lsm){
			$this->response($lsm, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function dakwah_get()
	{
		$province_id = $this->get('province_id');
		$city_id = $this->get('city_id');

		if($province_id){
			$dkw = $this->sm->get_dakwah_province($province_id);
		}elseif($city_id){
			$dkw = $this->sm->get_dakwah_city($city_id);
		}else{
			$dkw = $this->sm->get_dakwah();
		}

		if($dkw){
			$this->response($dkw, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function ormas_get()
	{
		$province_id = $this->get('province_id');
		$city_id = $this->get('city_id');

		if($province_id){
			$orms = $this->sm->get_ormas_province($province_id);
		}elseif($city_id){
			$orms = $this->sm->get_ormas_city($city_id);
		}else{
			$orms = $this->sm->get_ormas();
		}

		if($orms){
			$this->response($orms, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function lsmislam_get()
	{
		$province_id = $this->get('province_id');
		$city_id = $this->get('city_id');

		if($province_id){
			$islam = $this->sm->get_islam_province($province_id);
		}elseif($city_id){
			$islam = $this->sm->get_islam_city($city_id);
		}else{
			$islam = $this->sm->get_islam();
		}

		if($islam){
			$this->response($islam, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function dewan_get()
	{
		$province_id = $this->get('province_id');
		$city_id = $this->get('city_id');

		if($province_id){
			$dwn = $this->sm->get_dewan_province($province_id);
		}elseif($city_id){
			$dwn = $this->sm->get_dewan_city($city_id);
		}else{
			$dwn = $this->sm->get_dewan();
		}

		if($dwn){
			$this->response($dwn, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function tokoh_get()
	{
		$province_id = $this->get('province_id');
		$city_id = $this->get('city_id');

		if($province_id){
			$tkh = $this->sm->get_tokoh_province($province_id);
		}elseif($city_id){
			$tkh = $this->sm->get_tokoh_city($city_id);
		}else{
			$tkh = $this->sm->get_tokoh();
		}

		if($tkh){
			$this->response($tkh, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function hafiz_get()
	{
		$province_id = $this->get('province_id');
		$city_id = $this->get('city_id');

		if($province_id){
			$hfz = $this->sm->get_hafiz_province($province_id);
		}elseif($city_id){
			$hfz = $this->sm->get_hafiz_city($city_id);
		}else{
			$hfz = $this->sm->get_hafiz();
		}

		if($hfz){
			$this->response($hfz, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function qari_get()
	{
		$province_id = $this->get('province_id');
		$city_id = $this->get('city_id');

		if($province_id){
			$qari = $this->sm->get_qari_province($province_id);
		}elseif($city_id){
			$qari = $this->sm->get_qari_city($city_id);
		}else{
			$qari = $this->sm->get_qari();
		}

		if($qari){
			$this->response($qari, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function mufassir_get()
	{
		$province_id = $this->get('province_id');
		$city_id = $this->get('city_id');

		if($province_id){
			$mfsr = $this->sm->get_mufassir_province($province_id);
		}elseif($city_id){
			$mfsr = $this->sm->get_mufassir_city($city_id);
		}else{
			$mfsr = $this->sm->get_mufassir();
		}

		if($mfsr){
			$this->response($mfsr, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function kaligrafer_get()
	{
		$province_id = $this->get('province_id');
		$city_id = $this->get('city_id');

		if($province_id){
			$klgf = $this->sm->get_kaligrafer_province($province_id);
		}elseif($city_id){
			$klgf = $this->sm->get_kaligrafer_city($city_id);
		}else{
			$klgf = $this->sm->get_kaligrafer();
		}

		if($klgf){
			$this->response($klgf, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function seniman_get()
	{
		$province_id = $this->get('province_id');
		$city_id = $this->get('city_id');

		if($province_id){
			$snmn = $this->sm->get_seniman_province($province_id);
		}elseif($city_id){
			$snmn = $this->sm->get_seniman_city($city_id);
		}else{
			$snmn = $this->sm->get_seniman();
		}

		if($snmn){
			$this->response($snmn, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function budayawan_get()
	{
		$province_id = $this->get('province_id');
		$city_id = $this->get('city_id');

		if($province_id){
			$bdywn = $this->sm->get_budayawan_province($province_id);
		}elseif($city_id){
			$bdywn = $this->sm->get_budayawan_city($city_id);
		}else{
			$bdywn = $this->sm->get_budayawan();
		}

		if($bdywn){
			$this->response($bdywn, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function radio_get()
	{
		$province_id = $this->get('province_id');
		$city_id = $this->get('city_id');

		if($province_id){
			$rdo = $this->sm->get_radio_province($province_id);
		}elseif($city_id){
			$rdo = $this->sm->get_radio_city($city_id);
		}else{
			$rdo = $this->sm->get_radio();
		}

		if($rdo){
			$this->response($rdo, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function penulis_get()
	{
		$province_id = $this->get('province_id');
		$city_id = $this->get('city_id');

		if($province_id){
			$pnls = $this->sm->get_penulis_province($province_id);
		}elseif($city_id){
			$pnls = $this->sm->get_penulis_city($city_id);
		}else{
			$pnls = $this->sm->get_penulis();
		}

		if($pnls){
			$this->response($pnls, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function pnsinvalid_get()
	{
		$id = $this->get('province_id');

		if($id === null){
			$invl = $this->sm->get_invalid();
		}else{
			$invl = $this->sm->get_invalid($id);
		}

		if($invl){
			$this->response($invl, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}	
	}

	function nonpnsinvalid_get()
	{
		$id = $this->get('province_id');

		if($id === null){
			$noninvl = $this->sm->get_noninvalid();
		}else{
			$noninvl = $this->sm->get_noninvalid($id);
		}

		if($noninvl){
			$this->response($noninvl, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditsmukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}	
	}	
}