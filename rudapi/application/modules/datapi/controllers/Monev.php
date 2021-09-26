<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

//require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/Format.php';

class Monev extends REST_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('emonev_m', 'em');
		$this->db_database3 = $this->load->database('database3', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
	}

	// Menghitung total query rudabi ------------------------------------------------------------

	function total_get()
	{
		$datas = array(
			$this->em->total_rekap_data_kua(),
			$this->em->tipologi_kua(),
			$this->em->status_tanah_kua(),
			$this->em->rekapitulasi_nilai_kua(),
			$this->em->rekapitulasi_data_kua(),
			$this->em->rekap_isian_kua(),
			$this->em->status_bangunan_kua(),
			$this->em->penggunaan_simkah(),
			$this->em->rekapitulasi_registrasi()
		);

		if(!empty($datas)){
			$this->response($datas, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	// Menghitung total query rudabi ------------------------------------------------------------

	function index_get() {
		$id = $this->get('kodekua');

		if ($id === null) {
			$kua = $this->em->getKua();
		} else {
			$kua = $this->em->getKua($id);
		}

		if ($kua) {
			$this->response($kua, REST_Controller::HTTP_OK);
		} else {
			$this->responseBad;
		}
	}

	function propinsi_get() {
		$id = $this->get('kodekab');

		if ($id === null) {
			$kab = $this->em->getKab();
		} else {
			$kab = $this->em->getKab($id);
		}

		if ($kab) {
			$this->response($kab, REST_Controller::HTTP_OK);
		} else {
			$this->responseBad;
		}
	}

	function rekapitulasi_get() {
		$rek = $this->em->getRek();
		if (!empty($rek)) {
			$this->response($rek, REST_Controller::HTTP_OK);
		} else {
			$this->responseBad;
		}
	}

	function tipologi_get() {
		$tip = $this->em->getTip();
		if (!empty($tip)) {
			$this->response($tip, REST_Controller::HTTP_OK);
		} else {
			$this->responseBad;
		}
	}

	function statustanah_get() {
		$st = $this->em->getsT();
		if (!empty($st)) {
			$this->response($st, REST_Controller::HTTP_OK);
		} else {
			$this->responseBad;
		}
	}

	function bangunankua_get()
	{
		$id = $this->get('kondisi');

		if(!empty($id))
		{
			$bg = $this->em->get_bangunan_id($id);
		}else{
			$bg = $this->em->get_bangunan();
		}

		if(!empty($bg))
		{
			$this->response($bg, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function simkah_get()
	{
		$id = $this->get('simkah');

		if($id === null){
			$smkh = $this->em->tampil_simkah();
		}else{
			$smkh = $this->em->tampil_simkah_kat($id);
		}

		if(!empty($smkh)){
			$this->response($smkh, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function regmenag_get()
	{
		$id = $this->get('status');

		if($id === null)
		{
			$rmg = $this->em->tampil_kankemenag();
		}else{
			$rmg = $this->em->tampil_kankemenag_status($id);
		}

		if(!empty($rmg))
		{
			$this->response($rmg, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function regkua_get()
	{
		$id = $this->get('status');

		if($id === null)
		{
			$rgk = $this->em->tampil_regkua();
		}else{
			$rgk = $this->em->tampil_regkua_status($id);
		}

		if(!empty($rgk))
		{
			$this->response($rgk, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function validasi_get()
	{
		$thn = $this->get('tahun');
		$kd = $this->get('kodekua');
		$kab = $this->get('kodekab');
		$id = $this->get('id');

		if($thn === null)
		{
			$vlds = $this->em->tampil_validasi();
		}else if(!empty($thn) && !empty($kd)){
			$vlds = $this->em->tampil_validasi_thnkd($thn,$kd);
		}else if(!empty($thn) && !empty($kab)){
			$vlds = $this->em->tampil_validasi_kab($thn,$kab);
		}else if(!empty($thn) && !empty($id)){
			$vlds = $this->em->tampil_validasi_detail($thn,$id);
		}else{
			$vlds = $this->em->tampil_validasi_thn($thn);
		}

		if(!empty($vlds))
		{
			$this->response($vlds, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function penilaian_get()
	{
		$thnnilai = $this->get('tahun');
		$kuakode = $this->get('kodekua');
		$kabkode = $this->get('kodekab');

		if(!empty($thnnilai) && !empty($kabkode))
		{
			$nilai = $this->em->tampil_kuadetail($thnnilai,$kabkode);
		}elseif(!empty($thnnilai) && !empty($kuakode)){
			$nilai = $this->em->tampil_kabkua($thnnilai,$kuakode);
		}elseif(!empty($thnnilai)){
			$nilai = $this->em->tampil_pertahun($thnnilai);
		}else{
			$nilai = $this->em->tampil_tahun();
		}

		if(!empty($nilai)){
			$this->response($nilai, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	// function Penilaian_get() {
 //        //===============================bodo===================================
	// 	$st = $this->em->Getnilai();
	// 	if (!empty($st)) {
	// 		$this->response($st, REST_Controller::HTTP_OK);
	// 	} else {
	// 		$this->responseBad;
	// 	}
 //        //===============================bodo===================================
	// }

	function Rekap_get() {
        //===============================bodo===================================
		$st = $this->em->Getrekap();
		if (!empty($st)) {
			$this->response($st, REST_Controller::HTTP_OK);
		} else {
			$this->responseBad;
		}
        //===============================bodo===================================
	}

	function Isian_get() {
        //===============================bodo===================================
		$st = $this->em->Getisian();
		if (!empty($st)) {
			$this->response($st, REST_Controller::HTTP_OK);
		} else {
			$this->responseBad;
		}
        //===============================bodo===================================
	}

	function Tipokua_get() {
        //===============================bodo===================================
		$st = $this->em->Tipokua($this->get('tipokua'));
		if (!empty($st)) {
			$this->response($st, REST_Controller::HTTP_OK);
		} else {
			$this->responseBad;
		}
        //===============================bodo===================================
	}

	function Statbangunan_get() {
        //===============================bodo===================================
		$st = $this->em->Stat_bangunan();
		if (!empty($st)) {
			$this->response($st, REST_Controller::HTTP_OK);
		} else {
			$this->responseBad;
		}
        //===============================bodo===================================
	}

	function Stat_bangunan_get() {
        //===============================bodo===================================
		$st = $this->em->Statbangunan($this->get('status'));
		if (!empty($st)) {
			$this->response($st, REST_Controller::HTTP_OK);
		} else {
			$this->responseBad;
		}
        //===============================bodo===================================
	}

	function Stattanah_get() {
        //===============================bodo===================================
		$st = $this->em->Stat_tanah($this->get('statustanah'));
		if (!empty($st)) {
			$this->response($st, REST_Controller::HTTP_OK);
		} else {
			$this->responseBad;
		}
        //===============================bodo===================================
	}

}
