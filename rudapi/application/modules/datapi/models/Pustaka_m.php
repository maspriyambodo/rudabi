<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pustaka_m extends CI_Model {

function __construct(){
    parent::__construct();
    $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
  }

  // Menghitung totalan data ----------------------------------------------------------------

    function total_buku()
    {
        $query = $this->db_database11->query("
            SELECT
            count(a.biblio_id) as jumlah_buku
            FROM
            biblio as a
            ");
        return $query->row();
    }

    function total_author()
    {
        $query = $this->db_database11->query("
            SELECT
            count(a.biblio_id) as jumlah_author
            FROM
            biblio_author as a
            ");
        return $query->row();
    }

    function total_publisher()
    {
        $query = $this->db_database11->query("
            SELECT
            count(a.publisher_id) as jumlah_publisher
            FROM
            mst_publisher as a
            ");
        return $query->row();
    }

}

/* End of file Simas_m.php */
/* Location: ./application/modules/docs/models/Simas_m.php */