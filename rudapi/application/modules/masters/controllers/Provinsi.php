<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('provinsi_m');
		$this->load->model('global_m', 'allmodel');
	}

	public function index()
	{
		$a = str_replace(base_url().$this->uri->segment(1).'/', '', current_url());
		// var_dump($a);die();
		$b = $this->uri->segment(count($this->uri->segment_array())-1);
		// var_dump($b);die();
		$roles = $this->session->userdata('role');
		if($roles != 1){
			redirect(site_url('error404'));
		}else{
			$this->load->view('provinsi/index', $this->datainclude->_menuBackend());
		}
	}

	public function tambah()
	{
		$data = [
			"id_provinsi" => $this->input->post('id_provinsi', true),
			"nama" => $this->input->post('nama', true),
			"latitude" => $this->input->post('latitude', true),
			"longitude" => $this->input->post('longitude', true),
			"created_by" => $this->session->userdata('username'),
			"created_on" => date('Y-m-d H:i:s')
		];
		$this->db->insert("mst_provinsi", $data);
	}

	public function edited($id)
	{
		$title = $this->uri->segment(2);
		$data = array(
			"tampil"		=> $this->provinsi_m->ambilID($id),
			"menu" 			=> $this->allmodel->menuBackend(0,""),
			"titleweb" 		=> ".: Halaman Dashboard ".ucfirst($title)." :.",
			"breadcumb" 	=> "Dashboard"
		);
		$this->load->view('provinsi/edit', $data);
	}

	public function perbaharui()
	{
		$id = $this->input->post("id_provinsi");
        $nm = $this->input->post("nama");
        $lat = $this->input->post("latitude");
        $long = $this->input->post("longitude");
        $updated = $this->session->userdata('username');
        $updated_date = date('Y-m-d H:i:s');
        $is_trash = $this->input->post("is_actived");

        $data = ['id_provinsi' => $id, 'nama' => $nm, 'latitude' => $lat, 'longitude' => $long, 'modified_by' => $updated, 'modified_on' => $updated_date, 'is_actived' => $is_trash];
        $data = $this->provinsi_m->perbaharuiData($id, $data);
        echo json_encode($data);
	}

	public function hapus()
	{
		$id = $this->input->post("id_provinsi");
        $kondisi = array(
            'is_actived'	=> 0,
            'modified_by'	=> $this->session->userdata('username'),
            'modified_on'	=> date('Y-m-d h:i:s')
        );

        $this->db->set($kondisi);
        $this->db->where('id_provinsi', $id);
        $this->db->update('mst_provinsi');

        echo toJSON(resultSuccess("OK",1));
	}

	public function ambildata()
    {
    	$data = [];
        $exec = $this->provinsi_m->getdata();
        $no = $this->input->get("start");
        if ($this->input->get("filter")) {
            $totalCount = $this->provinsi_m->count_filtered();
        } else {
            $totalCount = $this->provinsi_m->count_all();
        }
        foreach ($exec as $value) {
            $no++;
            $row = [];
            $row['no'] = $no;
            $row['id_provinsi'] = $value->id_provinsi;
            $row['nama'] = $value->nama;
            $row['latitude'] = $value->latitude;
            $row['longitude'] = $value->longitude;
            $row['is_actived'] = $value->is_actived;
            $data[] = $row;
        }
        $result = array(
            "data" => $data,
            "success" => true,
            "totalCount" => $totalCount,
        );
        toJson($result);
    }

    // keluar dari sistem
	public function keluar(){
		$this->session->sess_destroy();
		redirect('auth','refresh');
	}

}

/* End of file Provinsi.php */
/* Location: ./application/modules/masters/controllers/Provinsi.php */