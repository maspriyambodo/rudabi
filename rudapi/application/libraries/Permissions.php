<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions {

	public function __construct(){
        $this->ci = &get_instance();
        $this->ci->load->model('global_m', 'model');
    }

    public function is_view()
    {
    	$roles = $this->ci->session->userdata('role');
    	$data = $this->ci->model->cek_permission($roles);
    	return $data;
    }

    public function is_actived()
    {
        $user = $this->ci->session->userdata('role');
        $data = $this->ci->model->cek_activedkey();
        return $data;
    }

}

/* End of file Permissions.php */
/* Location: ./application/libraries/Permissions.php */