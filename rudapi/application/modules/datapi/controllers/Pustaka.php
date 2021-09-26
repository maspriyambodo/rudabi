<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/Cuy_Controller.php';
//require APPPATH . '/libraries/Format.php';


class Pustaka extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('pustaka_m', 'pm');
		$this->db_database11 = $this->load->database('database11', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
	}

	function total_get()
    {
        $datas = array(
            $this->pm->total_buku(),
            $this->pm->total_author(),
            $this->pm->total_publisher()
        );

        var_dump($datas);
        die();

        if(!empty($datas)){
            $this->response($datas, REST_Controller::HTTP_OK);
        }else{
            $this->responseBad;
        }
    }
}