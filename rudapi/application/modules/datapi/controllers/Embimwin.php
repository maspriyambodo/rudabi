<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/Format.php';

class Embimwin extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('embimwin_m', 'em');
		$this->db_database4 = $this->load->database('database4', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
	}

	// Menghitung totalan data ----------------------------------------------------------------

	function total_get()
    {
        $datas = array(
        	$this->em->total_targetcatin(),
        	$this->em->total_datacatin(),
        	$this->em->total_fasilitator()
        );

        if(!empty($datas)){
			$this->response($datas, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
    }

    // Menghitung totalan data ----------------------------------------------------------------

	function targetcatins_get()
	{
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

	function datacatins_get()
	{
		$datatotal = $this->em->get_totalan_dtcatins();

		if(!empty($datatotal)){
			$this->response($datatotal, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}
	}

	function fasilitatorbimwins_get()
	{
		//
	}

	// Menghitung totalan data ----------------------------------------------------------------

	/*---------------------------------------------- data target catin pusat ----------------------------------------------*/

	function targetcatin_get()
	{
		// $id = $this->get('tahun_target_wilayah');
		$tahun = $this->get('tahun_target_pusat');
		$prop = $this->get('id_prop');
		$kabk = $this->get('kabkot');

		if(!empty($prop) && (!empty($tahun))){
			$tct = $this->em->get_all_prop($prop,$tahun);
		}elseif(!empty($kabk) && (!empty($tahun))){
			$tct = $this->em->get_all_kabkot($kabk,$tahun);
		}elseif($tahun){
			$tct = $this->em->get_all_tahun($tahun);
		}else{
			$tct = $this->em->get_all();
		}

		if(!empty($tct)){
			$this->response($tct, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function targetcatin2020_get()
	{
		$prop = $this->get('id_prop');
		$kabkot = $this->get('kabkot');

		if($prop){
			$tc20 = $this->em->get_targetcatin_prop2020($prop);
		}elseif($kabkot){
			$tc20 = $this->em->get_targetcatin_kabkot2020($kabkot);
		}else{
			$tc20 = $this->em->get_targetcatin_2020();
		}

		if($tc20){
			$this->response($tc20, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function targetcatin2019_get()
	{
		$prop = $this->get('id_prop');
		$kabkot = $this->get('kabkot');

		if($prop){
			$tc19 = $this->em->get_targetcatin_prop2019($prop);
		}elseif($kabkot){
			$tc19 = $this->em->get_targetcatin_kabkot2019($kabkot);
		}else{
			$tc19 = $this->em->get_targetcatin_2019();
		}

		if($tc19){
			$this->response($tc19, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function targetcatin2018_get()
	{
		$prop = $this->get('id_prop');
		$kabkot = $this->get('kabkot');

		if($prop){
			$tc18 = $this->em->get_targetcatin_prop2018($prop);
		}elseif($kabkot){
			$tc18 = $this->em->get_targetcatin_kabkot2018($kabkot);
		}else{
			$tc18 = $this->em->get_targetcatin_2018();
		}

		if($tc18){
			$this->response($tc18, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	/*---------------------------------------------- data catin ikut bimwin ----------------------------------------------*/

	function datacatin_get()
	{
		$tahun = $this->get('tahun_target_wilayah');
		$kua = $this->get('tahun_target_kua');
		$idwil = $this->get('id_prop');
		$kabkot = $this->get('kabkot');

		if(!empty($tahun) && !empty($idwil)){
			$dc = $this->em->get_dacin_wilayah($tahun,$idwil);
		}elseif(!empty($kua) && !empty($kabkot)){
			$dc = $this->em->get_dacin_kabupaten($kua,$kabkot);
		}elseif($tahun){
			$dc = $this->em->get_dacin_tahun($tahun);
		}else{
			$dc = $this->em->get_dacin();
		}

		if($dc){
			$this->response($dc, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function instruktur_get()
	{
		$id = $this->get('no_sk');

		if(!empty($id)){
			$ins = $this->em->get_instruk_detail($id);
		}else{
			$ins = $this->em->get_instruk();
		}

		if(!empty($ins)){
			$this->response($ins, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function fasilitator_get()
	{
		$id = $this->get('id_j_kegiatan');

		if(!empty($id)){
			$fg = $this->em->get_fasil_detail($id);
		}else{
			$fg = $this->em->get_fasil();
		}

		if(!empty($fg)){
			$this->response($fg, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function datacatin2020_get()
	{
		$prop = $this->get('id_prop');
		$kabkot = $this->get('kabkot');

		if($prop){
			$dc20 = $this->em->get_dacin_prop2020($prop);
		}elseif($kabkot){
			$dc20 = $this->em->get_dacin_kabkot2020($kabkot);
		}else{
			$dc20 = $this->em->get_dacin_2020();
		}

		if($dc20){
			$this->response($dc20, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function datacatin2019_get()
	{
		$prop = $this->get('id_prop');
		$kabkot = $this->get('kabkot');

		if($prop){
			$dc19 = $this->em->get_dacin_prop2019($prop);
		}elseif($kabkot){
			$dc19 = $this->em->get_dacin_kabkot2019($kabkot);
		}else{
			$dc19 = $this->em->get_dacin_2019();
		}

		if($dc19){
			$this->response($dc19, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function datacatin2018_get()
	{
		$prop = $this->get('id_prop');
		$kabkot = $this->get('kabkot');

		if($prop){
			$dc18 = $this->em->get_dacin_prop2018($prop);
		}elseif($kabkot){
			$dc18 = $this->em->get_dacin_kabkot2018($kabkot);
		}else{
			$dc18 = $this->em->get_dacin_2018();
		}

		if($dc18){
			$this->response($dc18, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

}