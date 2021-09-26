<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simzat_m extends CI_Model {

	public function dataProvinsi()
	{
		$query = $this->db_database11->select('b.id, b.nama, count(a.id) as total')
				->from('users a')
				->join('mst_provinsi b', 'a.provinsi_id = b.id', 'INNER')
				->group_by('b.nasional_id')
				->get()->result();
		return $query;

		$this->db_database11->close();
	}

	public function dataAll($id)
	{
		$query = $this->db_database11->select('a.id, a.name, a.user_type, a.no_hp, a.alamat, a.no_telp, a.website, a.muzakki, a.mustahik, a.lat, a.lng, a.verified')
				->from('users a')
				->where('a.provinsi_id', $id)
				->group_by('a.id')
				->get()->result();
		return $query;

		$this->db_database11->close();
	}

	public function dataTipologi()
	{
		$query = $this->db_database11->select('a.user_type, count(a.id) as total')
				->from('users a')
				->group_by('a.user_type')
				->get()->result();
		return $query;

		$this->db_database11->close();
	}

	public function dataAlls($id)
	{
		$query = $this->db_database11->select('a.id, a.name, a.user_type, a.no_hp, a.alamat, a.no_telp, a.website, a.muzakki, a.mustahik, a.lat, a.lng, a.verified')
				->from('users a')
				->where('a.user_type', $id)
				->get()->result();
		return $query;

		$this->db_database11->close();
	}

	public function dataBaznas()
	{
		$query = $this->db_database11->select('a.id, a.name, a.user_type, a.no_hp, a.alamat, a.no_telp, a.website, a.muzakki, a.mustahik, a.lat, a.lng, a.verified')
				->from('users a')
				->where('a.user_type', 'BAZN')
				->or_where('a.user_type', 'BAZP')
				->or_where('a.user_type', 'BAZK')
				->group_by('a.id')
				->get()->result();
		return $query;

		$this->db_database11->close();
	}

	public function dataLaznas()
	{
		$query = $this->db_database11->select('a.id, a.name, a.user_type, a.no_hp, a.alamat, a.no_telp, a.website, a.muzakki, a.mustahik, a.lat, a.lng, a.verified')
				->from('users a')
				->where('a.user_type', 'LAZN')
				->or_where('a.user_type', 'LAZP')
				->or_where('a.user_type', 'LAZK')
				->or_where('a.user_type', 'LAZ')
				->group_by('a.id')
				->get()->result();
		return $query;

		$this->db_database11->close();
	}

}

/* End of file Simzat_m.php */
/* Location: ./application/modules/datapi/models/Simzat_m.php */