<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtq_m extends CI_Model {

    public function get_mtq(){
        $query = $this->db_database13->query("
            SELECT b.*,count(a.peserta_daftar_tgl) as total 
            from mtq_peserta as a
            left join malut_mtq_master_provinsi b on a.peserta_provinsi = b.prov_id 
            group by peserta_provinsi
        ");
        return $query->result();
    }

    public function get_mtq_detail($id){
        $query = $this->db_database13->query("SELECT * from mtq_peserta where peserta_provinsi = '$id' ");
        return $query->result();
    }

}

/* End of file Simas_m.php */
/* Location: ./application/modules/docs/models/Simas_m.php */