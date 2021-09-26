<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simas_m extends CI_Model {

  public function dt_masjid()
  {
    $query = $this->db_database10->select("*")->from("v1_masjid")->get()->result();
    return $query;
    $this->db_database10->close();
  }

  public function dt_masjidprovinsi($param_prov)
  {
    $query = $this->db_database10->get_where('v1_masjid_kab', ['provinsi' => $param_prov])->result();
    return $query;
    $this->db_database10->close();
  }

  public function dt_masjidkabupaten($param_kab)
  {
    $query = $this->db_database10->get_where('v1_masjid_kec', ['kabupaten' => $param_kab])->result();
    return $query;
    $this->db_database10->close();
  }

  public function dt_masjiddetail($param_kec)
  {
    $query = $this->db_database10->get_where('v1_masjid_detail', ['kecamatan_id' => $param_kec])->result();
    return $query;
    $this->db_database10->close();
  }

  public function dt_mushalla()
  {
    $query = $this->db_database10->select("*")->from("v_datamushalla")->get()->result();
    return $query;
    $this->db_database10->close();
  }

  public function dt_mushallaprovinsi($param_prov)
  {
    $query = $this->db_database10->query("
      SELECT
      c.kabupaten_id,
      c.kabupaten_name,
      sum( CASE WHEN a.mushalla_id THEN 1 ELSE 0 END ) AS dt_mushalla,
      sum( CASE WHEN a.tanah_id = 1 THEN 1 ELSE 0 END ) AS dt_wakaf,
      sum( CASE WHEN a.tanah_id = 2 THEN 1 ELSE 0 END ) AS dt_shm,
      sum( CASE WHEN a.tanah_id = 3 THEN 1 ELSE 0 END ) AS dt_girik,
      -- sum( CASE WHEN a.tanah_id = 4 THEN 1 ELSE 0 END ) AS dt_bmn,
      -- sum( CASE WHEN a.tanah_id = 5 THEN 1 ELSE 0 END ) AS dt_sewa,
      -- sum( CASE WHEN a.tanah_id = 6 THEN 1 ELSE 0 END ) AS dt_hibah,
      sum( CASE WHEN a.mushalla_tanah THEN 1 ELSE 0 END ) AS dt_tanah,
      sum( CASE WHEN a.mushalla_bangunan THEN 1 ELSE 0 END ) AS dt_bangunan,
      sum( CASE WHEN a.mushalla_num_jamaah THEN 1 ELSE 0 END ) AS dt_jamaah,
      sum( CASE WHEN a.mushalla_num_pengurus THEN 1 ELSE 0 END ) AS dt_pengurus,
      sum( CASE WHEN a.mushalla_num_imam THEN 1 ELSE 0 END ) AS dt_imam,
      sum( CASE WHEN a.mushalla_num_khatib THEN 1 ELSE 0 END ) AS dt_khatib,
      sum( CASE WHEN a.mushalla_num_muazin THEN 1 ELSE 0 END ) AS dt_muazin,
      sum( CASE WHEN a.mushalla_num_remaja THEN 1 ELSE 0 END ) AS dt_remaja 
      FROM
      mushalla__content AS a
      LEFT JOIN address__kabupaten AS c ON a.kabupaten_id = c.kabupaten_id
      WHERE
      a.provinsi_id = $param_prov
      GROUP BY
      c.kabupaten_id 
      ORDER BY
      c.kabupaten_id ASC
    ");
    return $query->result();
    $this->db_database10->close();
  }

  public function dt_mushallakabupaten($param_kab)
  {
    $query = $this->db_database10->query("
      SELECT
      c.kecamatan_id,
      c.kecamatan_name,
      sum( CASE WHEN a.mushalla_id THEN 1 ELSE 0 END ) AS dt_mushalla,
      sum( CASE WHEN a.tanah_id = 1 THEN 1 ELSE 0 END ) AS dt_wakaf,
      sum( CASE WHEN a.tanah_id = 2 THEN 1 ELSE 0 END ) AS dt_shm,
      sum( CASE WHEN a.tanah_id = 3 THEN 1 ELSE 0 END ) AS dt_girik,
      -- sum( CASE WHEN a.tanah_id = 4 THEN 1 ELSE 0 END ) AS dt_bmn,
      -- sum( CASE WHEN a.tanah_id = 5 THEN 1 ELSE 0 END ) AS dt_sewa,
      -- sum( CASE WHEN a.tanah_id = 6 THEN 1 ELSE 0 END ) AS dt_hibah,
      sum( CASE WHEN a.mushalla_tanah THEN 1 ELSE 0 END ) AS dt_tanah,
      sum( CASE WHEN a.mushalla_bangunan THEN 1 ELSE 0 END ) AS dt_bangunan,
      sum( CASE WHEN a.mushalla_num_jamaah THEN 1 ELSE 0 END ) AS dt_jamaah,
      sum( CASE WHEN a.mushalla_num_pengurus THEN 1 ELSE 0 END ) AS dt_pengurus,
      sum( CASE WHEN a.mushalla_num_imam THEN 1 ELSE 0 END ) AS dt_imam,
      sum( CASE WHEN a.mushalla_num_khatib THEN 1 ELSE 0 END ) AS dt_khatib,
      sum( CASE WHEN a.mushalla_num_muazin THEN 1 ELSE 0 END ) AS dt_muazin,
      sum( CASE WHEN a.mushalla_num_remaja THEN 1 ELSE 0 END ) AS dt_remaja 
      FROM
      mushalla__content AS a
      LEFT JOIN address__kecamatan AS c ON a.kecamatan_id = c.kecamatan_id
      WHERE
      a.kabupaten_id = $param_kab
      GROUP BY
      c.kecamatan_id 
      ORDER BY
      c.kecamatan_id ASC
    ");
    return $query->result();
    $this->db_database10->close();
  }

  public function dt_mushalladetail($param_kec)
  {
    $query = $this->db_database10->query("
      SELECT
      a.mushalla_id,
      a.mushalla_name,
      a.tahun,
      a.mushalla_address,
      a.mushalla_phone,
      a.mushalla_email,
      a.mushalla_tanah,
      a.mushalla_bangunan,
      a.mushalla_num_jamaah,
      a.mushalla_num_imam,
      a.mushalla_num_khatib,
      a.mushalla_num_muazin,
      a.mushalla_num_remaja,
      a.mushalla_long,
      a.mushalla_lat
      FROM
      mushalla__content as a
      WHERE
      a.kecamatan_id = $param_kec
      GROUP BY
      a.mushalla_id
      ORDER BY
      a.mushalla_id asc
    ");
    return $query->result();
    $this->db_database10->close();
  }

  public function get_masjidtipologi()
  {
    $query = $this->db_database10->query("
      SELECT
      b.tipologi_id,
      c.tipologi_name,
      count(b.tipologi_id = 1) as dt_masjid
      FROM
      masjid__content as a
      INNER JOIN masjid__content_tipologi as b on a.masjid_id = b.masjid_id
      INNER JOIN masjid__tipologi as c on b.tipologi_id = c.tipologi_id
      GROUP BY
      b.tipologi_id
      ORDER BY
      b.tipologi_id asc
    ");
    return $query->result();
    $this->db_database10->close();
  }

  public function get_masjidtipologi_detail($id)
  {
    $query = $this->db_database10->query("
      SELECT
      b.masjid_name, b.masjid_address, b.tahun, b.masjid_phone, b.masjid_tanah, b.masjid_bangunan, b.masjid_num_imam, b.masjid_num_jamaah, b.masjid_num_khatib, b.masjid_num_muazin, b.masjid_num_remaja, b.masjid_num_pengurus, b.masjid_lat, b.masjid_long
      FROM
      masjid__content_tipologi a
      JOIN masjid__content b ON a.masjid_id = b.masjid_id
      WHERE
      a.tipologi_id = $id
    ");
    return $query->result();
    $this->db_database10->close();
  }

  public function get_mushallatipologi()
  {
    $query = $this->db_database10->query("
      SELECT
      b.tipologi_id,
      c.tipologi_name,
      count(b.tipologi_id = 1) as dt_mushalla
      FROM
      mushalla__content as a
      INNER JOIN mushalla__content_tipologi as b on a.mushalla_id = b.mushalla_id
      INNER JOIN mushalla__tipologi as c on b.tipologi_id = c.tipologi_id
      GROUP BY
      b.tipologi_id
      ORDER BY
      b.tipologi_id asc
    ");
    return $query->result();
    $this->db_database10->close();
  }

  public function get_mushallatipologi_detail($id)
  {
    $query = $this->db_database10->query("
      SELECT
      b.mushalla_name, b.mushalla_address, b.tahun, b.mushalla_phone, b.mushalla_tanah, b.mushalla_bangunan, b.mushalla_num_imam, b.mushalla_num_jamaah, b.mushalla_num_khatib, b.mushalla_num_muazin, b.mushalla_num_remaja, b.mushalla_num_pengurus, b.mushalla_lat, b.mushalla_long
      FROM
      mushalla__content_tipologi a
      JOIN mushalla__content b ON a.mushalla_id = b.mushalla_id
      WHERE
      a.tipologi_id = $id
    ");
    return $query->result();
    $this->db_database10->close();
  }

}

/* End of file Simas_m.php */
/* Location: ./application/modules/docs/models/Simas_m.php */