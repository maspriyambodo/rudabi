<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Mtq extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('mtq_m', 'pm');
		$this->db_database13 = $this->load->database('database13', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
	}

	function totalpeserta_get()
    {
        $datas = array($this->pm->totalpeserta());

        if(!empty($datas)){
            $this->response($datas, REST_Controller::HTTP_OK);
        }else{
            $this->responseBad;
        }
    }

    function detailpeserta_get()
    {
        $datas = $this->pm->detailpeserta();

        if(!empty($datas)){
            $this->response($datas, REST_Controller::HTTP_OK);
        }else{
            $this->responseBad;
        }
    }

    function detailpesertapropinsi_get()
    {
        $datas = $this->pm->detailpesertapropinsi();

        if(!empty($datas)){
            $this->response($datas, REST_Controller::HTTP_OK);
        }else{
            $this->responseBad;
        }
    }


    function per_propinsi_get()
    {
        $id = $this->get('id');
        $datas = $this->pm->per_propinsi($id);

        if(!empty($datas)){
            $this->response($datas, REST_Controller::HTTP_OK);
        }else{
            $this->responseBad;
        }
    }

}