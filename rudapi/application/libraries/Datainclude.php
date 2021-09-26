<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datainclude{

	public function __construct(){
        $this->CI = &get_instance();
        $this->CI->load->model('global_m');
    }

	function _menuBackend()
	{
		$linknow = current_url();
		$title = $this->CI->uri->segment(2);
		$data = array(
			"menu" 			=> $this->CI->global_m->menuBackend(0,""),
			"tampil" 		=> $this->CI->global_m->cek_permission($linknow),
			"paths"			=> $this->_path(),
			"kategori"		=> $this->_kategoriapi(),
			"direktorat"	=> $this->_direktorat(),
			"titleweb" 		=> ".: Halaman Dashboard ".ucfirst($title)." :.",
			"breadcumb" 	=> "Dashboard"
			);
		return $data;
	}

	function _provinsi()
	{
		$data = $this->CI->global_m->ambilProvinsi();
		return $data;
	}

	function _kabupaten()
	{
		$data = $this->CI->global_m->ambilKabupaten();
		return $data;
	}

	function _kecamatan()
	{
		$data = $this->CI->global_m->ambilKecamatan();
		return $data;
	}

	function _path()
	{
		$data = $this->CI->global_m->ambilPath();
		return $data;
	}

	function _kategoriapi()
	{
		$data = $this->CI->global_m->ambilKategori();
		return $data;
	}

	function _direktorat()
	{
		$data = $this->CI->global_m->ambilDirektorat();
		return $data;
	}

	// Menu Permission
	function _added()
	{
		$linknow = current_url();
		$tampil = $this->CI->global_m->cek_permission($linknow);
		return $tampil->is_add;
	}

	function _edited()
	{
		$linknow = current_url();
		$tampil = $this->CI->global_m->cek_permission($linknow);
		return $tampil->is_edited;
	}

	function _deleted()
	{
		$linknow = current_url();
		$tampil = $this->CI->global_m->cek_permission($linknow);
		return $tampil->is_deleted;
	}

	function _published()
	{
		$linknow = current_url();
		$tampil = $this->CI->global_m->cek_permission($linknow);
		return $tampil->is_publish;
	}

}

/* End of file Datainclude.php */
/* Location: ./application/libraries/Datainclude.php */
