<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direktorat extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('direktorat_m');
		$this->load->model('global_m', 'allmodel');
	}

	public function index()
	{
		$a = str_replace(base_url().$this->uri->segment(1), '', current_url());
		$b = $this->uri->segment(count($this->uri->segment_array())-1);
		// var_dump($b);die();
		$roles = $this->session->userdata('role');
		if($roles != 1){
			redirect(site_url('error404'));
		}else{
			$this->load->view('direktorat/index', $this->datainclude->_menuBackend());
		}
	}

	public function tambah()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"keterangan" => $this->input->post('keterangan', true),
			"created" => $this->session->userdata('username'),
			"created_date" => date('Y-m-d H:i:s')
		];
		$this->db->insert("mst_direktorat", $data);
	}

	public function edited($id)
	{
		$title = $this->uri->segment(2);
		$data = array(
			"tampil"		=> $this->direktorat_m->ambilID($id),
			"menu" 			=> $this->allmodel->menuBackend(0,""),
			"titleweb" 		=> ".: Halaman Dashboard ".ucfirst($title)." :.",
			"breadcumb" 	=> "Dashboard"
		);
		$this->load->view('direktorat/edit', $data);
	}

	public function perbaharui()
	{
		$id = $this->input->post("id");
        $nm = $this->input->post("nama");
        $ket = $this->input->post("keterangan");
        $updated = $this->session->userdata('username');
        $updated_date = date('Y-m-d H:i:s');
        $is_trash = $this->input->post("is_trash");

        $data = ['id' => $id, 'nama' => $nm, 'keterangan' => $ket, 'updated' => $updated, 'updated_date' => $updated_date, 'is_trash' => $is_trash];
        $data = $this->direktorat_m->perbaharuiData($id, $data);
        echo json_encode($data);
	}

	public function hapus()
	{
		$id = $this->input->post("id");
        $kondisi = array(
            'is_trash'	=> 0,
            'deleted'	=> $this->session->userdata('username'),
            'deleted_date'	=> date('Y-m-d h:i:s')
        );

        $this->db->set($kondisi);
        $this->db->where('id', $id);
        $this->db->update('mst_direktorat');

        echo toJSON(resultSuccess("OK",1));
	}

	public function ambildata()
    {
    	$data = [];
        $exec = $this->direktorat_m->getdata();
        $no = $this->input->get("start");
        if ($this->input->get("filter")) {
            $totalCount = $this->direktorat_m->count_filtered();
        } else {
            $totalCount = $this->direktorat_m->count_all();
        }
        foreach ($exec as $value) {
            $no++;
            $row = [];
            $row['no'] = $no;
            $row['id'] = $value->id;
            $row['id_vd'] = $value->id_vd;
            $row['nama'] = $value->nama;
            $row['keterangan'] = $value->keterangan;
            $row['is_trash'] = $value->is_trash;
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

    // keluar dari sistem
	public function keluar(){
		$this->session->sess_destroy();
		redirect('auth','refresh');
	}

}

/* End of file Direktorat.php */
/* Location: ./application/modules/masters/controllers/Direktorat.php */