<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sipaham_m extends CI_Model {

	public function dataKonflik()
	{
		$query = $this->db_database14->select('a.jenis_pelaku, a.konflik_name, a.penyebab_konflik, a.tempat_kejadian, date_format(a.tanggal_kejadian, "%d %M %Y") as tanggal_kejadian, a.waktu_kejadian, a.jumlah_pelaku, a.jenis_korban, a.jumlah_korban, a.jumlah_meninggal, a.jumlah_luka, a.tingkat_kerusakan, a.sarana_prasarana')
				->from('konflik_data a')
				->get()->result();
		return $query;

		$this->db_database14->close();
	}

}

/* End of file Sipaham_m.php */
/* Location: ./application/modules/datapi/models/Sipaham_m.php */