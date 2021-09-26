<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/Format.php';

class Sicakepp extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Sicakepp_m', 'em');
		$this->db_database8 = $this->load->database('database8', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
	}

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

	function pensiun_get()
	{
		$prop = $this->get('peg_provinsi');
		$kab = $this->get('kab_id');

		if($prop === null)
		{
			$pnsn = $this->em->get_pensiun();
		}else if(!empty($prop)){
			$pnsn = $this->em->get_pensiun_prop($pro);
		}else{
			$pnsn = $this->em->get_pensiun_kabkot($kab);
		}

		if(!empty($pnsn))
		{
			$this->response($pnsn, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function jenisgol_get()
	{
		$prop = $this->get('peg_provinsi');
		$kab = $this->get('kab_id');

		if($prop === null)
		{
			$pnsn = $this->em->get_pensiun();
		}else if(!empty($prop)){
			$pnsn = $this->em->get_pensiun_prop($pro);
		}else{
			$pnsn = $this->em->get_pensiun_kabkot($kab);
		}

		if(!empty($pnsn))
		{
			$this->response($pnsn, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

}