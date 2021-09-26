<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/Format.php';

class Esbsnn extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Esbsnn_m', 'em');
		$this->db_database8 = $this->load->database('database8', TRUE);
		// $this->db_database11 = $this->load->database('database11', TRUE);
		$this->db_database8->close();
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
	}

	// Menghitung totalan data ----------------------------------------------------------------

	function pustaka_get()
    {
        $datas = array(
            $this->em->total_buku(),
            $this->em->total_author(),
            $this->em->total_publisher(),
            $this->em->total_all(),
            $this->em->total_topic()
        );

        if(!empty($datas)){
            $this->response($datas, REST_Controller::HTTP_OK);
        }else{
            $this->responseBad;
        }
    }

	function sekretariat_get(){

		$datas = array(
			$this->em->get_totalan_dtsatkers(),
			$this->em->get_totalan(),
			$this->em->get_totalan_it(),
			$this->em->get_totalan_au()
		);

		if(!empty($datas)){
			$this->response($datas, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}

	}

	function satkers_get(){
		$datatotal = $this->em->get_totalan_dtsatkers();

		if(!empty($datatotal)){
			$this->response($datatotal, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function usulantriwulans_get(){
		$datatotal = $this->get("usul_tahun");

		if(!empty($datatotal)){
			$datot = $this->em->get_totalan_dttahun($datatotal);
		}else{
			$datot = $this->em->get_totalan();
		}

		if(!empty($datot)){
			$this->response($datot, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function inputtriwulans_get(){
		$datatotal = $this->get("usul_tahun");

		if(!empty($datatotal)){
			$datot = $this->em->get_totalan_dtinputtahun($datatotal);
		}else{
			$datot = $this->em->get_totalan_it();
		}

		if(!empty($datot)){
			$this->response($datot, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function approvedusulans_get(){
		$datatotal = $this->get("usul_tahun");

		if(!empty($datatotal)){
			$datot = $this->em->get_totalan_dtautahun($datatotal);
		}else{
			$datot = $this->em->get_totalan_au();
		}

		if(!empty($datot)){
			$this->response($datot, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	// Menghitung totalan data ----------------------------------------------------------------

	function index_get()
	{
		$propinsi = $this->get('kab_propinsi_id');

		if($propinsi){
			$esbsn = $this->em->get_esbsn_prop($propinsi);
		}else{
			$esbsn = $this->em->get_esbsn();
		}

		if($esbsn){
			$this->response($esbsn, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function pustakadetail_get()
	{
		$datas = $this->em->get_detailperpus();

		if(!empty($datas)){
			$this->response($esbsn, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	//////////////////////////////////////////// USULAN TRIWULAN ////////////////////////////////////////////
	function usulantriwulan_get()
	{
		$tahun = $this->get('usul_tahun');
		$propinsi = $this->get('usul_propinsi');
		$kabupaten = $this->get('usul_kabupaten');

		if(!empty($tahun) && !empty($propinsi) && !empty($kabupaten))
		{
			$data = $this->em->esbsn_kabupaten_triwulan($tahun,$propinsi,$kabupaten);
		}else if(!empty($tahun) && !empty($propinsi)){
			$data = $this->em->esbsn_propinsi_triwulan($tahun,$propinsi);
		}else if(!empty($tahun)){
			$data = $this->em->esbsn_tahun_triwulan($tahun);
		}else{
			$this->responseBad;
		}

		if(!empty($data)){
			$this->response($data, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	//////////////////////////////////////////// INPUT USULAN ////////////////////////////////////////////
	function inputusulan_get()
	{
		$tahun = $this->get('usul_tahun');
		$propinsi = $this->get('usul_propinsi');
		$kabupaten = $this->get('usul_kabupaten');

		if(!empty($tahun) && !empty($propinsi) && !empty($kabupaten))
		{
			$data = $this->em->esbsn_kabupaten_inputusulan($tahun,$propinsi,$kabupaten);
		}else if(!empty($tahun) && !empty($propinsi)){
			$data = $this->em->esbsn_propinsi_inputusulan($tahun,$propinsi);
		}else if(!empty($tahun)){
			$data = $this->em->esbsn_tahun_inputusulan($tahun);
		}else{
			$this->responseBad;
		}

		if(!empty($data)){
			$this->response($data, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function pertahun_get()
	{
		$id = $this->get('provinsi_id');

		if($id === null){
			$thn = $this->em->get_tahun();
		}else{
			$thn = $this->em->get_tahun($id);
		}

		if($thn){
			$this->response($thn, REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => false,
				'message' => 'data tidak ditemukan!'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	//////////////////////////////////////////// APPROVE USULAN ////////////////////////////////////////////
	function approveusulan_get()
	{
		$tahun = $this->get('usul_tahun');
		$propinsi = $this->get('usul_propinsi');
		$kabupaten = $this->get('usul_kabupaten');

		if(!empty($tahun) && !empty($propinsi) && !empty($kabupaten))
		{
			$data = $this->em->esbsn_kabupaten_approveusulan($tahun,$propinsi,$kabupaten);
		}else if(!empty($tahun) && !empty($propinsi)){
			$data = $this->em->esbsn_propinsi_approveusulan($tahun,$propinsi);
		}else if(!empty($tahun)){
			$data = $this->em->esbsn_tahun_approveusulan($tahun);
		}else{
			$this->responseBad;
		}

		if(!empty($data)){
			$this->response($data, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	//////////////////////////////////////////// CEKLIS USULAN ////////////////////////////////////////////
	function ceklisusulan_get()
	{
		$tahun = $this->get('usul_tahun');
		$propinsi = $this->get('usul_propinsi');
		$usul = $this->get('usul_id');

		if(!empty($tahun) && !empty($usul))
		{
			$data = $this->em->esbsn_id_ceklisusulan($usul,$tahun);
		}else if(!empty($tahun) && !empty($propinsi)){
			$data = $this->em->esbsn_propinsi_ceklisusulan($tahun,$propinsi);
		}else if(!empty($tahun)){
			$data = $this->em->esbsn_tahun_ceklisusulan($tahun);
		}else{
			$this->responseBad;
		}

		if(!empty($data)){
			$this->response($data, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

}