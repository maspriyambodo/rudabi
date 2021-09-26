<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_m extends CI_Model {

	private $table = 'pesankontak as a';

	function ambil_pesan()
	{
		$this->db->select("a.id_pesan,a.name,a.email,a.pesan,a.created_date,
			a.posisi
			");
		$this->db->from($this->table);
		$this->db->where('is_trash !=', 0);
		$this->db->order_by('a.id_pesan','ASC');
		return $this->db->get()->result();
	}

	function cekid()
	{
		$this->db->select('a.id_pesan');
		$this->db->from($this->table);
		$this->db->limit(1);
		$this->db->order_by('a.id_pesan','DESC');
		return $this->db->get()->row();
	}

// 	function count_article()
// 	{
// 		$this->db->select('count(id_art) as total');
// 		$query = $this->db->get_where('artikel', array('is_trash !=' => 0))->row();
// 		return $query;
// 	}

// 	function count_product()
// 	{
// 		$this->db->select('count(id_sldr) as total');
// 		$query = $this->db->get_where('kategori_slider', array('is_trash !=' => 0))->row();
// 		return $query;
// 	}

// 	function count_pesan()
// 	{
// 		$this->db->select('count(id_pesan) as total');
// 		$query = $this->db->get_where('pesankontak', array('is_trash !=' => 0))->row();
// 		return $query;
// 	}

// 	function count_harga_produk()
// 	{
// 		$this->db->select('count(id_email) as total');
// 		$query = $this->db->get_where('pesanemail', array('is_trash !=' => 0))->row();
// 		return $query;
// 	}

// 	function count_browser()
// 	{
// 		$this->db->distinct();
// 		$this->db->select('a.browser');
// 		$this->db->from('pesanemail a');
// 		$this->db->where('a.is_trash !=', 0);
// 		return $this->db->get()->result();
// 	}

// 	function count_totbrowser()
// 	{
// 		// $this->db->distinct();
// 		$this->db->select('count(a.browser) as total, a.browser');
// 		$this->db->from('pesanemail a');
// 		$this->db->where('a.is_trash !=', 0);
// 		$this->db->group_by('a.browser');
// 		return $this->db->get()->result();
// 	}

// 	function count_os()
// 	{
// 		$this->db->select('count(a.platform) as total, a.platform');
// 		$this->db->from('pesanemail a');
// 		$this->db->where('a.is_trash !=', 0);
// 		$this->db->group_by('a.platform');
// 		return $this->db->get()->result();
// 	}

// 	function hitung_pesan_kontak()
// 	{
// 		$this->db->distinct();
// 		$this->db->select('count(a.id_pesan) as total, a.platform');
// 		$this->db->from('pesankontak a');
// 		$this->db->where('a.is_trash !=', 0);
// 		$this->db->group_by('a.platform');
// 		return $this->db->get()->result();
// 	}

}

/* End of file Dashboard_m.php */
/* Location: ./application/modules/dashboard/models/Dashboard_m.php */