<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Mtq extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('mtq_m');
		$this->db_database13 = $this->load->database('database13', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
        $this->responseAktif = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data dinonaktifkan.'], REST_Controller::HTTP_FORBIDDEN);
	}

    public function index_get()
    {
        $id = $this->get('peserta_provinsi');

        // if(!empty($id)){
        //     $data = $this->mtq_m->get_mtq_detail($id);
        // }else{
        //     $data = $this->mtq_m->get_mtq();
        // }

        // if(!empty($data)){
        //     $this->response($data, REST_Controller::HTTP_OK);
        // }else{
        //     $this->responseBad;
        // }

        $status = $this->permissions->is_actived();
        if($status == 1){
            if(!empty($id)){
            $data = $this->mtq_m->get_mtq_detail($id);
            }else{
                $data = $this->mtq_m->get_mtq();
            }

            if(!empty($data)){
                $this->response($data, REST_Controller::HTTP_OK);
            }else{
                $this->responseBad;
            }
        }else{
            $this->responseAktif;
        }
    }

}