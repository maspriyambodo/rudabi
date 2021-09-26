<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Users_m', 'um');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$logged_in = $this->session->userdata('logged_in');
		if(!$logged_in){
			redirect(site_url('auth'));
		}else{
			$data = array(
				'titleweb' => '.: Halaman Users :.',
				'breadcumb' => 'Users',
				'roles' => $this->um->ambilRole()
			);
			$this->load->view('users_v', $data);
		}
	}

	// versi baru
	public function tambah()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"username" => $this->input->post('username', true),
			"password" => md5($this->input->post('ket_fsl', true)),
			"level" => $this->input->post('level', true),
			"email" => $this->input->post('email', true),
			"created" => $this->input->post('created', true),
			"created_date" => $this->input->post('created_date', true)
		];
		$this->db->insert("sys_users", $data);
	}

	// versi baru
	public function edit($id)
	{
		$data = array(
			'titleweb' => '.: Halaman Users :.',
			'breadcumb' => 'Users',
			'tampil' => $this->um->ByID($id),
			'roles' => $this->um->ambilRole()
		);
		$this->load->view('edit_v', $data);
	}

	// versi baru
	public function perbaharui()
	{
		$id = $this->input->post("id_user");
        $nama = $this->input->post("nama");
        $user = $this->input->post("username");
        $pass = md5($this->input->post("password"));
        $lvl = $this->input->post("level");
        $mail = $this->input->post("email");
        $updated = $this->input->post("updated");
        $updated_date = $this->input->post("updated_date");
        $is_trash = $this->input->post("is_trash");

        $data = ['id_user' => $id, 'nama' => $nama, 'username' => $user, 'password' => $pass, 'level' => $lvl, 'email' => $mail, 'updated' => $updated, 'updated_date' => $updated_date, 'is_trash' => $is_trash];
        $data = $this->um->perbaharuiUsers($id, $data);
        echo json_encode($data);
	}

	// versi baru
	public function hapus()
	{
		$id = $this->input->post('id_user');
        $kondisi = array(
            'is_trash' => 0,
            'deleted' => $this->session->userdata('username'),
            'deleted_date' => date('Y-m-d h:i:s')
        );

        $this->db->set($kondisi);
        $this->db->where('id_user', $id);
        $this->db->update('sys_users');
	}

	// server side
	function ambildata()
    {
        $list = $this->um->get_datatables();

        $data = array();
        $no = $_POST['start'];
        foreach ($list as $value){

        	$a = '<a class="text-dark" data-toggle="tooltip" data-html="true" href="'.base_url('Administrator/Usergroup/Detail/').''.$value->id_user.'" title="Detail User" style="margin-right: 8px;"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;';
        	$b = '<a class="text-warning btn_edit" data-toggle="tooltip" href="'.base_url('users/edit/').''.$value->id_user.'" data-html="true" title="Edit User" style="margin-right: 4px;"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
        	$c = '<a class="text-danger btn_hapus" data-toggle="tooltip" data-id="'.$value->id_user.'" data-html="true" title="Nonaktifkan User" style="margin-right: 10px;"><i class="fa fa-minus-circle"></i></a>';

            $no++;
            $row = array();
            $row[] = '<center>'.$no.'.'.'</center>';
            $row[] = $value->nama;
            $row[] = $value->username;
            $row[] = $value->password;
            $row[] = $value->email;
            $row[] = $value->status;
            $row[] = '<center>'.''.$a.' '.$b.' '.$c.''.'</center>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->um->count_all(),
            "recordsFiltered" => $this->um->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

	// keluar dari sistem
	public function keluar(){
		$this->session->sess_destroy();
		redirect('auth','refresh');
	}

}

/* End of file Fasilitas.php */
/* Location: ./application/modules/Fasilitas/controllers/Fasilitas.php */