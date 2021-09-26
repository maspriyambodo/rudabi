<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Pustaka extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('pustaka_m');
		$this->db_database12 = $this->load->database('database12', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
        $this->responseAktif = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data dinonaktifkan.'], REST_Controller::HTTP_FORBIDDEN);
	}

    function penerbit_get()
    {
        $id = $this->get('publisher_id');

        // if(!empty($id))
        // {
        //     $data = $this->pustaka_m->penerbit_detail($id);
        // }else{
        //     $data = $this->pustaka_m->penerbit();
        // }

        // if(!empty($data))
        // {
        //     $this->response($data, REST_Controller::HTTP_OK);
        // }else{
        //     $this->responseBad;
        // }

        $status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($id))
            {
                $data = $this->pustaka_m->penerbit_detail($id);
            }else{
                $data = $this->pustaka_m->penerbit();
            }

            if(!empty($data))
            {
                $this->response($data, REST_Controller::HTTP_OK);
            }else{
                $this->responseBad;
            }
        }else{
            $this->responseAktif;
        }
    }

}