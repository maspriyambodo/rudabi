<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/Format.php';

class Siwaks extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('siwaks_m', 'em');
		$this->db_database7 = $this->load->database('database7', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
	}

	// Menghitung total query rudabi ------------------------------------------------------------

	function total_get()
	{
		$datas = array(
			$this->em->get_total_wakaf()
		);

		if(!empty($datas)){
			$this->response($datas, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function wakaf_get()
	{
		$datas = array(
			$this->em->get_total_filterwakaf()
		);

		if(!empty($datas)){
			$this->response($datas, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function pengguna_get()
	{
		$datas = array(
			$this->em->get_total_filterpengguna(),
			$this->em->get_total_totalpengguna()
		);

		if(!empty($datas)){
			$this->response($datas, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	// Menghitung total query rudabi ------------------------------------------------------------

	function tanahwakaf_get()
	{
		$prop 	= $this->get('Lokasi_Prop');
		$kab 	= $this->get('lokasi_kode');
		$kec 	= $this->get('lokasi_ID');
		$stat 	= $this->get('Status');
		$statnon 	= $this->get('Status');

		if(!empty($stat) && !empty($kec))
		{
			$tw = $this->em->get_twakaf_statussert($stat,$kec);
		}elseif(!empty($statnon) && !empty($kec)){
			$tw = $this->em->get_twakaf_statusnonsert($statnon,$kec);
		}elseif(!empty($prop)){
			$tw = $this->em->get_twakaf_prop($prop);
		}elseif(!empty($kab)){
			$tw = $this->em->get_twakaf_kab($kab);
		}elseif(!empty($kec)){
			$tw = $this->em->get_twakaf_kec($kec);
		}else{
			$tw = $this->em->get_twakaf();
		}

		if(!empty($tw))
		{
			$this->response($tw, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function kategoritanah_get()
	{
		$kgt = $this->em->get_kategoritanah();

		if(!empty($kgt))
		{
			$this->response($kgt, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function kategoripendidikan_get()
	{
		$kgp = $this->em->get_kategoripendidikan();

		if(!empty($kgp))
		{
			$this->response($kgp, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	// function datakua_get()
	// {
	// 	//
	// }

}