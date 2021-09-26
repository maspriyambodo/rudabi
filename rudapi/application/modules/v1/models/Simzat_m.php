<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simzat_m extends CI_Model {

	public function get_baznas()
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

	public function get_laznas()
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