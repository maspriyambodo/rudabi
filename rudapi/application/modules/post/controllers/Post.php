<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_post');
		$this->load->model('global_m', 'allmodel');
	}

	public function index()
	{
		$roles = $this->session->userdata('role');

		if($roles != 1){
			redirect(site_url('error404'));
		}else{
			$this->load->view('index', $this->datainclude->_menuBackend());
		}
	}

	public function tambah()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"id_ktgrapi" => $this->input->post('id_ktgrapi', true),
			"id_path" => $this->input->post('id_path', true),
			"path" => $this->input->post('path', true),
			"methods" => $this->input->post('methods', true),
			"keterangan" => $this->input->post('keterangan', true),
			"created" => $this->session->userdata('username'),
			"created_date" => date('Y-m-d H:i:s')
		];
		$this->db->insert("dt_postapi", $data);
		$post_id = $this->db->insert_id();

		$param = $this->input->post('params');
		$pembuat = $this->session->userdata('username');
		$tanggal = date('Y-m-d H:i:s');

        $result = array();
		foreach ($param as $key => $val) {
			$result[] = array(
				'id_post' 		=> $post_id,
				'nama' 			=> $param[$key],
				'created' 		=> $pembuat,
				'created_date' 	=> $tanggal
			);
		}
		$this->db->insert_batch('dt_params', $result);
	}

	public function edited($id)
	{
		$title = $this->uri->segment(2);
		$data = array(
			"tampil"		=> $this->m_post->ambilID($id),
			"param"			=> $this->m_post->ambilParam($id),
			"menu" 			=> $this->allmodel->menuBackend(0,""),
			"titleweb" 		=> ".: Halaman Dashboard ".ucfirst($title)." :.",
			"paths"			=> $this->datainclude->_path(),
			"kategori"		=> $this->datainclude->_kategoriapi(),
			"breadcumb" 	=> "Dashboard"
		);
		$this->load->view('edit', $data);
	}

	public function detail($id){
		$title = $this->uri->segment(2);
		$data = array(
			"tampil"		=> $this->m_post->ambilID($id),
			"param"			=> $this->m_post->ambilParams($id),
			"menu" 			=> $this->allmodel->menuBackend(0,""),
			"titleweb" 		=> ".: Halaman Dashboard ".ucfirst($title)." :.",
			"paths"			=> $this->datainclude->_path(),
			"kategori"		=> $this->datainclude->_kategoriapi(),
			"breadcumb" 	=> "Dashboard"
		);
		$this->load->view('detail', $data);
	}

	public function perbaharui()
	{
		$link = $_SERVER['HTTP_REFERER'];
		$id = $this->input->post("id_api");
		$single = array(
			'id_path' => $this->input->post('id_path'),
			'id_ktgrapi' => $this->input->post('id_ktgrapi'),
			'nama' => $this->input->post('namas'),
			'path' => $this->input->post('path'),
			'methods' => $this->input->post('methods'),
			'keterangan' => $this->input->post('keterangan'),
			'updated' => $this->session->userdata('username'),
			'updated_date' => date('Y-m-d H:i:s'),
			'is_trash' => $this->input->post('is_trash')
		);
		$this->m_post->perbaharuiData($id, $single);
		echo "<script>alert('Data berhasil diperbaharui');window.location = '".$link."';</script>";
	}

	public function perbaharui_params()
	{
		$link = $_SERVER['HTTP_REFERER'];
		
		$id 	= $this->input->post('id');
		$post 	= $this->input->post('id_post');
		$namas 	= $this->input->post('nama');
		$user 	= $this->session->userdata('username');
		$tgl 	= date('Y-m-d H:i:s');

		$result = array();
		foreach ($id as $key => $val) {
			$result[] = array(
				'id'			=> $id[$key],
				'id_post' 		=> $post[$key],
				'nama' 			=> $namas[$key],
				'updated' 		=> $user,
				'updated_date' 	=> $tgl
			);
		}

		$this->db->update_batch('dt_params', $result, 'id');
		echo "<script>alert('Data berhasil diperbaharui');window.location = '".$link."';</script>";
	}

	public function hapus()
	{
		$id = $this->input->post("id");
        $kondisi = array(
            'is_trash'	=> 0,
            'deleted'		=> $this->session->userdata('username'),
            'deleted_date'	=> date('Y-m-d h:i:s')
        );

        $this->db->set($kondisi);
        $this->db->where('id', $id);
        $this->db->update('dt_postapi');

        echo toJSON(resultSuccess("OK",1));
	}

	public function ambildata()
    {
    	$data = [];
        $exec = $this->m_post->getdata();
        $no = $this->input->get("start");
        if ($this->input->get("filter")) {
            $totalCount = $this->m_post->count_filtered();
        } else {
            $totalCount = $this->m_post->count_all();
        }
        foreach ($exec as $value) {
            $no++;
            $row = [];
            $row['no'] = $no;
            $row['id'] = $value->id;
            $row['id_vp'] = $value->id_vp;
            $row['sumber'] = ucfirst($value->sumber);
            $row['nama'] = ucfirst($value->nama);
            $row['nama_path'] = $value->nama_path;
            $row['methods'] = $value->methods;
            $row['keterangan'] = ucfirst($value->keterangan);
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

/* End of file Dashboard.php */
/* Location: ./application/modules/dashboard/controllers/Dashboard.php */