<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sumber extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('sumber_m');
		$this->load->model('global_m', 'allmodel');
	}

	public function index()
	{
		$roles = $this->session->userdata('role');
		if($roles != 1){
			redirect(site_url('error404'));
		}else{
			$this->load->view('sumber/index', $this->datainclude->_menuBackend());
		}
	}

	public function tambah()
	{
		$data = [
			"id_direktorat" => $this->input->post('id_direktorat', true),
			"nama" => $this->input->post('nama', true),
			"situs" => $this->input->post('situs', true),
			"ip_lokal" => $this->input->post('ip_lokal', true),
			"keterangan" => $this->input->post('keterangan', true),
			"created" => $this->session->userdata('username'),
			"created_date" => date('Y-m-d H:i:s')
		];
		$this->db->insert("mst_kategoriapi", $data);
	}

	public function edited($id)
	{
		$title = $this->uri->segment(2);
		$data = array(
			"tampil"		=> $this->sumber_m->ambilID($id),
			"menu" 			=> $this->allmodel->menuBackend(0,""),
			"titleweb" 		=> ".: Halaman Dashboard ".ucfirst($title)." :.",
			"direktorat"	=> $this->datainclude->_direktorat(),
			"breadcumb" 	=> "Dashboard"
		);
		$this->load->view('sumber/edit', $data);
	}

	public function perbaharui()
	{
		$id = $this->input->post("id");
        $direktorat = $this->input->post("id_direktorat");
        $nm = $this->input->post("nama");
        $situs = $this->input->post("situs");
        $lokal = $this->input->post("ip_lokal");
        $ket = $this->input->post("keterangan");
        $updated = $this->session->userdata('username');
        $updated_date = date('Y-m-d H:i:s');
        $is_trash = $this->input->post("is_trash");

        $data = ['id' => $id, 'id_direktorat' => $direktorat, 'nama' => $nm, 'situs' => $situs, 'ip_lokal' => $lokal, 'keterangan' => $ket, 'updated' => $updated, 'updated_date' => $updated_date, 'is_trash' => $is_trash];
        $data = $this->sumber_m->perbaharuiData($id, $data);
        echo json_encode($data);
	}

	public function hapus()
	{
		$id = $this->input->post("id");
        $kondisi = array(
            'is_trash'		=> 0,
            'deleted'		=> $this->session->userdata('username'),
            'deleted_date'	=> date('Y-m-d h:i:s')
        );

        $this->db->set($kondisi);
        $this->db->where('id', $id);
        $this->db->update('mst_kategoriapi');

        echo toJSON(resultSuccess("OK",1));
	}

	public function ambildata()
    {
    	$data = [];
        $exec = $this->sumber_m->getdata();
        $no = $this->input->get("start");
        if ($this->input->get("filter")) {
            $totalCount = $this->sumber_m->count_filtered();
        } else {
            $totalCount = $this->sumber_m->count_all();
        }
        foreach ($exec as $value) {
            $no++;
            $row = [];
            $row['no'] = $no;
            $row['id'] = $value->id;
            $row['situs'] = $value->situs;
            $row['nama'] = $value->nama;
            $row['direktorat'] = $value->direktorat;
            $row['ip_lokal'] = $value->ip_lokal;
            $row['keterangan'] = $value->keterangan;
            $row['status'] = $value->status;
            $row['is_trash'] = $value->is_trash;
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

/* End of file Sumber.php */
/* Location: ./application/modules/masters/controllers/Sumber.php */