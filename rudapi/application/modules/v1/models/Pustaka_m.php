<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pustaka_m extends CI_Model {

function __construct(){
    parent::__construct();
    $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
  }

    // ini kepake
    function penerbit()
    {
        $query = $this->db_database12->query("SELECT p.publisher_id, p.publisher_name, count(b.publisher_id) as jumlah FROM biblio AS b
        LEFT JOIN mst_publisher AS p ON b.publisher_id=p.publisher_id where p.publisher_id is not null group by p.publisher_id  ");
        return $query->result();
    }

    // ini kepake
    function penerbit_detail($id)
    {
        $query = $this->db_database12->query("SELECT b.*, p.publisher_name, pl.place_name,c.category FROM biblio AS b
        LEFT JOIN mst_publisher AS p ON b.publisher_id=p.publisher_id
        LEFT JOIN mst_place AS pl ON b.publish_place_id=pl.place_id
        LEFT JOIN mst_category c ON c.category_id = b.category_id where  b.publisher_id = $id  ");
        return $query->result();
    }

}

/* End of file Simas_m.php */
/* Location: ./application/modules/docs/models/Simas_m.php */