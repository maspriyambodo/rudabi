<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupaten extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('kabupaten_m');
		$this->load->model('global_m', 'allmodel');
	}

	public function index()
	{
		$roles = $this->session->userdata('role');
		if($roles != 1){
			redirect(site_url('error404'));
		}else{
			$this->load->view('kabupaten/index', $this->datainclude->_menuBackend());
		}
	}

	public function tambah()
	{
		$data = [
			"id_provinsi" => $this->input->post('id_provinsi', true),
			"id_kabupaten" => $this->input->post('id_kabupaten', true),
			"nama" => $this->input->post('nama', true),
			"latitude" => $this->input->post('latitude', true),
			"longitude" => $this->input->post('longitude', true),
			"created_by" => $this->session->userdata('username'),
			"created_on" => date('Y-m-d H:i:s')
		];
		$this->db->insert("mst_kabupaten", $data);
	}

	public function edited($id)
	{
		$title = $this->uri->segment(2);
		$data = array(
			"tampil"		=> $this->kabupaten_m->ambilID($id),
			"menu" 			=> $this->allmodel->menuBackend(0,""),
			"titleweb" 		=> ".: Halaman Dashboard ".ucfirst($title)." :.",
			"breadcumb" 	=> "Dashboard"
		);
		$this->load->view('kabupaten/edit', $data);
	}

	public function perbaharui()
	{
		$id_p = $this->input->post("id_provinsi");
		$id_k = $this->input->post("id_kabupaten");
        $nm = $this->input->post("nama");
        $lat = $this->input->post("latitude");
        $long = $this->input->post("longitude");
        $updated = $this->session->userdata('username');
        $updated_date = date('Y-m-d H:i:s');
        $is_trash = $this->input->post("is_actived");

        $data = ['id_provinsi' => $id_p, 'id_kabupaten' => $id_k, 'nama' => $nm, 'latitude' => $lat, 'longitude' => $long, 'modified_by' => $updated, 'modified_on' => $updated_date, 'is_actived' => $is_trash];
        $data = $this->kabupaten_m->perbaharuiData($id_k, $data);
        echo json_encode($data);
	}

	public function hapus()
	{
		$id = $this->input->post("id_kabupaten");
        $kondisi = array(
            'is_actived'	=> 0,
            'modified_by'	=> $this->session->userdata('username'),
            'modified_on'	=> date('Y-m-d h:i:s')
        );

        $this->db->set($kondisi);
        $this->db->where('id_kabupaten', $id);
        $this->db->update('mst_kabupaten');

        echo toJSON(resultSuccess("OK",1));
	}

	public function ambildata()
    {
    	$data = [];
        $exec = $this->kabupaten_m->getdata();
        $no = $this->input->get("start");
        if ($this->input->get("filter")) {
            $totalCount = $this->kabupaten_m->count_filtered();
        } else {
            $totalCount = $this->kabupaten_m->count_all();
        }
        foreach ($exec as $value) {
            $no++;
            $row = [];
            $row['no'] = $no;
            $row['provinsi'] = $value->provinsi;
            $row['id_kabupaten'] = $value->id_kabupaten;
            $row['kabupaten'] = $value->kabupaten;
            $row['latitude'] = $value->latitude;
            $row['longitude'] = $value->longitude;
            $row['is_actived'] = $value->is_actived;
            $row['status'] = $value->status;
            $data[] = $row;
        }
        $result = array(
            "data" => $data,
            "success" => true,
            "totalCount" => $totalCount,
        );
        toJson($result);
    }

}

/* End of file Kabupaten.php */
/* Location: ./application/modules/masters/controllers/Kabupaten.php */