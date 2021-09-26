<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi{

	public function __construct()
	{
        $this->CI = &get_instance();
    }

	public function dtartikel()
	{
		$this->CI->form_validation->set_rules('id_kat', 'kategori', 'required');
		$this->CI->form_validation->set_rules('title_art', 'judul', 'trim|required');
		$this->CI->form_validation->set_rules('keyword_art', 'kata kunci', 'trim|required');
		$this->CI->form_validation->set_rules('pranala_art', 'link url', 'trim|required');
		$this->CI->form_validation->set_rules('desc_art', 'deskripsi', 'trim|required');
		$this->CI->form_validation->set_rules('teks_art', 'isi artikel', 'trim|required');
		$this->CI->form_validation->set_rules('tag_art', 'tag artikel', 'trim|required');
		$this->CI->form_validation->set_rules('is_trash', 'status artikel', 'required');
		if(empty($_FILES['dok2']['name'])){
            $this->CI->form_validation->set_rules('dok2', 'gambar artikel', 'required');}
	}

	public function dtartikel_update()
	{
		$this->CI->form_validation->set_rules('id_kat', 'kategori', 'required');
		$this->CI->form_validation->set_rules('title_art', 'judul', 'trim|required');
		$this->CI->form_validation->set_rules('keyword_art', 'kata kunci', 'trim|required');
		$this->CI->form_validation->set_rules('pranala_art', 'link url', 'trim|required');
		$this->CI->form_validation->set_rules('desc_art', 'deskripsi', 'trim|required');
		$this->CI->form_validation->set_rules('teks_art', 'isi artikel', 'trim|required');
		$this->CI->form_validation->set_rules('tag_art', 'tag artikel', 'trim|required');
		$this->CI->form_validation->set_rules('is_trash', 'status artikel', 'required');
		// if(empty($_FILES['dok2']['name'])){
  //           $this->CI->form_validation->set_rules('dok2', 'gambar artikel', 'required');}
	}

	public function dtproduct()
	{
		$this->CI->form_validation->set_rules('id_kat', 'kategori', 'required');
		$this->CI->form_validation->set_rules('id_hrg', 'harga', 'required');
		$this->CI->form_validation->set_rules('id_area', 'area', 'required');
		$this->CI->form_validation->set_rules('id_fsl', 'fasilitas', 'required');
		$this->CI->form_validation->set_rules('id_stn', 'satuan', 'required');
		$this->CI->form_validation->set_rules('jdl_prdk', 'judul', 'required');
		$this->CI->form_validation->set_rules('desc_prdk', 'deskripsi', 'required');
		$this->CI->form_validation->set_rules('pranala_prdk', 'link url', 'required');
		$this->CI->form_validation->set_rules('is_trash', 'status produk', 'required');
		if(empty($_FILES['dok3']['name'])){
            $this->CI->form_validation->set_rules('dok3', 'gambar produk', 'required');}
	}

	public function dtproduct_update()
	{
		$this->CI->form_validation->set_rules('id_kat', 'kategori', 'required');
		$this->CI->form_validation->set_rules('id_hrg', 'harga', 'required');
		$this->CI->form_validation->set_rules('id_area', 'area', 'required');
		$this->CI->form_validation->set_rules('id_fsl', 'fasilitas', 'required');
		$this->CI->form_validation->set_rules('id_stn', 'satuan', 'required');
		$this->CI->form_validation->set_rules('jdl_prdk', 'judul', 'required');
		$this->CI->form_validation->set_rules('desc_prdk', 'deskripsi', 'required');
		$this->CI->form_validation->set_rules('pranala_prdk', 'link url', 'required');
		$this->CI->form_validation->set_rules('is_trash', 'status produk', 'required');
		// if(empty($_FILES['dok3']['name'])){
  //           $this->CI->form_validation->set_rules('dok3', 'gambar produk', 'required');}
	}
	
	public function dtpopup_update()
	{
		$this->CI->form_validation->set_rules('id', 'ID User', 'trim|required|is_numeric');
		$this->CI->form_validation->set_rules('jdl', 'judul Popup', 'trim|required');
		$this->CI->form_validation->set_rules('ktrgn', 'Keterangan Popup', 'trim|required');
		$this->CI->form_validation->set_rules('id_menu', 'Lokasi Popup', 'trim|required');
		$this->CI->form_validation->set_rules('is_trash', 'Status Popup', 'trim|required');
		// if(empty($_FILES['dok4']['name'])){
  //           $this->CI->form_validation->set_rules('dok4', 'Gambar Popup', 'required');}
	}

}

/* End of file Validasi.php */
/* Location: ./application/libraries/Validasi.php */
