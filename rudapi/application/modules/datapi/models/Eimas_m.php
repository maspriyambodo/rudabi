<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eimas_m extends CI_Model {

function __construct(){
    parent::__construct();
    $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
  }

// Menghitung totalan data ----------------------------------------------------------------

function get_totalan_dtmasjid()
{
  $sql = "SELECT sum( CASE WHEN a.masjid_id THEN 1 ELSE 0 END ) as data_masjid
  FROM masjid__content AS a  LEFT JOIN address__provinsi AS b ON a.provinsi_id = b.provinsi_id";
  $query = $this->db_database10->query($sql);
  return $query->row();
}

function get_totalan_dtmushalla()
{
  $sql = "SELECT sum( CASE WHEN a.mushalla_id THEN 1 ELSE 0 END ) as data_mushalla
  FROM mushalla__content AS a LEFT JOIN address__provinsi AS c ON a.provinsi_id = c.provinsi_id ";
  $query = $this->db_database10->query($sql);
  return $query->row();
}

function get_totalan_dtmasjidtipologi()
{
  $sql =" SELECT count(b.tipologi_id = 1) as masjid_tipologi FROM
  masjid__content as a
  INNER JOIN masjid__content_tipologi as b on a.masjid_id = b.masjid_id
  INNER JOIN masjid__tipologi as c on b.tipologi_id = c.tipologi_id ";
  $query = $this->db_database10->query($sql);

  return $query->row();
}

function get_totalan_dtmushallatipologi()
{
  $sql = " SELECT count(b.tipologi_id = 1) as mushalla_tipologi FROM mushalla__content as a
  INNER JOIN mushalla__content_tipologi as b on a.mushalla_id = b.mushalla_id
  INNER JOIN mushalla__tipologi as c on b.tipologi_id = c.tipologi_id ";
  $query = $this->db_database10->query($sql);
  return $query->row();
}

function get_totalan_tipoid()
{
  $sql = " SELECT b.tipologi_id, c.tipologi_name, count(b.tipologi_id) as total FROM masjid__content as a
  INNER JOIN masjid__content_tipologi as b on a.masjid_id = b.masjid_id
  INNER JOIN masjid__tipologi as c on b.tipologi_id = c.tipologi_id
  WHERE b.tipologi_id != 1 and b.tipologi_id != 6 and b.tipologi_id != 2
  GROUP BY  b.tipologi_id ";
  $query = $this->db_database10->query($sql);
  return $query->result();
}

function get_totalan_tipoidmus()
{
  $sql = " SELECT b.tipologi_id, c.tipologi_name, count(b.tipologi_id) as dt_mushalla FROM mushalla__content as a
  INNER JOIN mushalla__content_tipologi as b on a.mushalla_id = b.mushalla_id
  INNER JOIN mushalla__tipologi as c on b.tipologi_id = c.tipologi_id
  GROUP BY b.tipologi_id ORDER BY b.tipologi_id asc ";
  $query = $this->db_database10->query($sql);
  return $query->result();
}

// Menghitung totalan data ----------------------------------------------------------------

function get_provinsi($id = null)
{
  if($id === null){
    $this->setGroup;
    $query1 = $this->db_database10->query("SELECT 'masjid' as kategori, COUNT( masjid__content_tipologi.masjid_id ) AS jumlah FROM masjid__content_tipologi LEFT JOIN address__provinsi ON masjid__content_tipologi.provinsi_id = address__provinsi.provinsi_id ORDER BY masjid__content_tipologi.provinsi_id");

    $query2 = $this->db_database10->query("SELECT 'mushalla' as kategori, COUNT( mushalla__content_tipologi.mushalla_id ) AS jumlah FROM mushalla__content_tipologi LEFT JOIN address__provinsi ON mushalla__content_tipologi.provinsi_id = address__provinsi.provinsi_id ORDER BY mushalla__content_tipologi.provinsi_id");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
  }else{
         //
  }
}

function get_provmas($id = null)
{
  if($id === null)
  {
    $query = $this->db_database10->query("
      SELECT
      address__provinsi.provinsi_id, address__provinsi.provinsi_name,
      SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 1 THEN 1 ELSE 0 END ) AS masjid_negara,
      SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 2 THEN 1 ELSE 0 END ) AS masjid_raya,
      SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 3 THEN 1 ELSE 0 END ) AS masjid_agung,
      SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 4 THEN 1 ELSE 0 END ) AS masjid_besar,
      SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 5 THEN 1 ELSE 0 END ) AS masjid_jami,
      SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 6 THEN 1 ELSE 0 END ) AS masjid_bersejarah,
      SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 7 THEN 1 ELSE 0 END ) AS masjid_publik,
      SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 8 THEN 1 ELSE 0 END ) AS masjid_nasional,
      COUNT( masjid__content.masjid_id ) AS jumlah_masjid
      FROM
      masjid__content
      INNER JOIN masjid__content_tipologi ON masjid__content.masjid_id = masjid__content_tipologi.masjid_id
      INNER JOIN masjid__tipologi ON masjid__content_tipologi.tipologi_id = masjid__tipologi.tipologi_id 
      LEFT JOIN address__provinsi ON masjid__content.provinsi_id = address__provinsi.provinsi_id
      GROUP BY
      masjid__content.provinsi_id 
      ORDER BY
      masjid__content.provinsi_id
      ");
    return $query->result();
  }else{
    $query = $this->db_database10->query("
      SELECT
      address__kabupaten.kabupaten_id, address__kabupaten.kabupaten_name,
      SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 1 THEN 1 ELSE 0 END ) AS masjid_negara,
      SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 2 THEN 1 ELSE 0 END ) AS masjid_raya,
      SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 3 THEN 1 ELSE 0 END ) AS masjid_agung,
      SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 4 THEN 1 ELSE 0 END ) AS masjid_besar,
      SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 5 THEN 1 ELSE 0 END ) AS masjid_jami,
      SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 6 THEN 1 ELSE 0 END ) AS masjid_bersejarah,
      SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 7 THEN 1 ELSE 0 END ) AS masjid_publik,
      SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 8 THEN 1 ELSE 0 END ) AS masjid_nasional,
      COUNT( masjid__content.masjid_id ) AS jumlah_masjid
      FROM
      masjid__content
      INNER JOIN masjid__content_tipologi ON masjid__content.masjid_id = masjid__content_tipologi.masjid_id
      INNER JOIN masjid__tipologi ON masjid__content_tipologi.tipologi_id = masjid__tipologi.tipologi_id 
      LEFT JOIN address__kabupaten ON masjid__content.kabupaten_id = address__kabupaten.kabupaten_id
      WHERE
      masjid__content.provinsi_id = $id
      GROUP BY
      masjid__content.kabupaten_id 
      ORDER BY
      masjid__content.kabupaten_id
      ");
    return $query->result();
  }
}

function get_kabmas($id)
{
  $query = $this->db_database10->query("
    SELECT
    address__kecamatan.kecamatan_id, address__kecamatan.kecamatan_name,
    SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 1 THEN 1 ELSE 0 END ) AS masjid_negara,
    SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 2 THEN 1 ELSE 0 END ) AS masjid_raya,
    SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 3 THEN 1 ELSE 0 END ) AS masjid_agung,
    SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 4 THEN 1 ELSE 0 END ) AS masjid_besar,
    SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 5 THEN 1 ELSE 0 END ) AS masjid_jami,
    SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 6 THEN 1 ELSE 0 END ) AS masjid_bersejarah,
    SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 7 THEN 1 ELSE 0 END ) AS masjdi_publik,
    SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 8 THEN 1 ELSE 0 END ) AS masjid_nasional,
    COUNT( masjid__content.masjid_id ) AS jumlah_masjid
    FROM
    masjid__content
    INNER JOIN masjid__content_tipologi ON masjid__content.masjid_id = masjid__content_tipologi.masjid_id
    INNER JOIN masjid__tipologi ON masjid__content_tipologi.tipologi_id = masjid__tipologi.tipologi_id 
    LEFT JOIN address__kecamatan ON masjid__content.kecamatan_id = address__kecamatan.kecamatan_id
    WHERE
    masjid__content.kabupaten_id = $id
    GROUP BY
    masjid__content.kecamatan_id 
    ORDER BY
    masjid__content.kecamatan_id
    ");
  return $query->result();
}

function get_musprov($id = null)
{
  if($id === null)
  {
    $query = $this->db_database10->query("
      SELECT
      address__provinsi.provinsi_id, address__provinsi.provinsi_name,
      SUM( CASE WHEN mushalla__content_tipologi.tipologi_id = 1 THEN 1 ELSE 0 END ) AS mushalla_perumahan,
      SUM( CASE WHEN mushalla__content_tipologi.tipologi_id = 2 THEN 1 ELSE 0 END ) AS mushalla_publik,
      SUM( CASE WHEN mushalla__content_tipologi.tipologi_id = 3 THEN 1 ELSE 0 END ) AS mushalla_perkantoran,
      SUM( CASE WHEN mushalla__content_tipologi.tipologi_id = 4 THEN 1 ELSE 0 END ) AS mushalla_pendidikan,
      COUNT( mushalla__content.mushalla_id ) AS jumlah_mushalla
      FROM
      mushalla__content
      INNER JOIN mushalla__content_tipologi ON mushalla__content.mushalla_id = mushalla__content_tipologi.mushalla_id
      INNER JOIN mushalla__tipologi ON mushalla__content_tipologi.tipologi_id = mushalla__tipologi.tipologi_id 
      LEFT JOIN address__provinsi ON mushalla__content.provinsi_id = address__provinsi.provinsi_id
      GROUP BY
      mushalla__content.provinsi_id 
      ORDER BY
      mushalla__content.provinsi_id
      ");
    return $query->result();
  }else{
    $query = $this->db_database10->query("
      SELECT
      address__kabupaten.kabupaten_id,
      address__kabupaten.kabupaten_name,
      SUM( CASE WHEN mushalla__content_tipologi.tipologi_id = 1 THEN 1 ELSE 0 END ) AS mushalla_perumahan,
      SUM( CASE WHEN mushalla__content_tipologi.tipologi_id = 2 THEN 1 ELSE 0 END ) AS mushalla_publik,
      SUM( CASE WHEN mushalla__content_tipologi.tipologi_id = 3 THEN 1 ELSE 0 END ) AS mushalla_perkantoran,
      SUM( CASE WHEN mushalla__content_tipologi.tipologi_id = 4 THEN 1 ELSE 0 END ) AS mushalla_pendidikan,
      COUNT( mushalla__content.mushalla_id ) AS jumlah_mushalla 
      FROM
      mushalla__content
      INNER JOIN mushalla__content_tipologi ON mushalla__content.mushalla_id = mushalla__content_tipologi.mushalla_id
      INNER JOIN mushalla__tipologi ON mushalla__content_tipologi.tipologi_id = mushalla__tipologi.tipologi_id
      LEFT JOIN address__kabupaten ON mushalla__content.kabupaten_id = address__kabupaten.kabupaten_id
      WHERE
      mushalla__content.provinsi_id = $id
      GROUP BY
      mushalla__content.kabupaten_id 
      ORDER BY
      mushalla__content.kabupaten_id
      ");
    return $query->result();
  }
}

function get_muskec($id)
{
  $query = $this->db_database10->query("
    SELECT
    address__kecamatan.kecamatan_id,
    address__kecamatan.kecamatan_name,
    SUM( CASE WHEN mushalla__content_tipologi.tipologi_id = 1 THEN 1 ELSE 0 END ) AS mushalla_perumahan,
    SUM( CASE WHEN mushalla__content_tipologi.tipologi_id = 2 THEN 1 ELSE 0 END ) AS mushalla_publik,
    SUM( CASE WHEN mushalla__content_tipologi.tipologi_id = 3 THEN 1 ELSE 0 END ) AS mushalla_perkantoran,
    SUM( CASE WHEN mushalla__content_tipologi.tipologi_id = 4 THEN 1 ELSE 0 END ) AS mushalla_pendidikan,
    COUNT( mushalla__content.mushalla_id ) AS jumlah_mushalla 
    FROM
    mushalla__content
    INNER JOIN mushalla__content_tipologi ON mushalla__content.mushalla_id = mushalla__content_tipologi.mushalla_id
    INNER JOIN mushalla__tipologi ON mushalla__content_tipologi.tipologi_id = mushalla__tipologi.tipologi_id
    LEFT JOIN address__kecamatan ON mushalla__content.kecamatan_id = address__kecamatan.kecamatan_id 
    WHERE
    mushalla__content.kabupaten_id = $id
    GROUP BY
    mushalla__content.kecamatan_id 
    ORDER BY
    mushalla__content.kecamatan_id
    ");
  return $query->result();
}

function tampil_propinsi()
{
  $query = $this->db_database10->query("
    SELECT
    a.provinsi_id,
    b.provinsi_name,
    sum(case when a.fas_id = 1 then 1 else 0 end) as dt_srnibdh,
    sum(case when a.fas_id = 2 then 1 else 0 end) as dt_wudhu,
    sum(case when a.fas_id = 3 then 1 else 0 end) as dt_kmrmandi,
    sum(case when a.fas_id = 4 then 1 else 0 end) as dt_genset,
    sum(case when a.fas_id = 5 then 1 else 0 end) as dt_multimedia,
    sum(case when a.fas_id = 6 then 1 else 0 end) as dt_ac,
    sum(case when a.fas_id = 7 then 1 else 0 end) as dt_kantorsekretariat,
    sum(case when a.fas_id = 8 then 1 else 0 end) as dt_perpustakaan,
    sum(case when a.fas_id = 9 then 1 else 0 end) as dt_koperasi,
    sum(case when a.fas_id = 10 then 1 else 0 end) as dt_poliklinik,
    sum(case when a.fas_id = 11 then 1 else 0 end) as dt_ambulance,
    sum(case when a.fas_id = 12 then 1 else 0 end) as dt_prlgkpn_jenazah,
    sum(case when a.fas_id = 13 then 1 else 0 end) as dt_aula,
    sum(case when a.fas_id = 14 then 1 else 0 end) as dt_toko,
    sum(case when a.fas_id = 15 then 1 else 0 end) as dt_tmpt_belajar,
    sum(case when a.fas_id = 16 then 1 else 0 end) as dt_tmpt_titip_sandal,
    sum(case when a.fas_id = 17 then 1 else 0 end) as dt_gudang,
    sum(case when a.fas_id = 18 then 1 else 0 end) as dt_taman,
    sum(case when a.fas_id = 19 then 1 else 0 end) as dt_parkir,
    sum(case when a.fas_id = 20 then 1 else 0 end) as dt_internet,
    sum(case when a.fas_id = 21 then 1 else 0 end) as dt_penginapan,
    sum(case when a.fas_id = 22 then 1 else 0 end) as dt_perkantoran,
    sum(case when a.fas_id = 23 then 1 else 0 end) as dt_situs_bersejarah,
    sum(case when a.fas_id = 24 then 1 else 0 end) as dt_museum
    FROM
    masjid__content_fas as a,
    address__provinsi as b
    WHERE
    a.provinsi_id != 0 and a.provinsi_id = b.provinsi_id
    GROUP BY
    a.provinsi_id
    ");
  return $query->result();
}

function tampil_kabupaten($prop)
{
  $query = $this->db_database10->query("
    SELECT
    b.kabupaten_id,
    b.kabupaten_name,
    sum(case when a.fas_id = 1 then 1 else 0 end) as dt_srnibdh,
    sum(case when a.fas_id = 2 then 1 else 0 end) as dt_wudhu,
    sum(case when a.fas_id = 3 then 1 else 0 end) as dt_kmrmandi,
    sum(case when a.fas_id = 4 then 1 else 0 end) as dt_genset,
    sum(case when a.fas_id = 5 then 1 else 0 end) as dt_multimedia,
    sum(case when a.fas_id = 6 then 1 else 0 end) as dt_ac,
    sum(case when a.fas_id = 7 then 1 else 0 end) as dt_kantorsekretariat,
    sum(case when a.fas_id = 8 then 1 else 0 end) as dt_perpustakaan,
    sum(case when a.fas_id = 9 then 1 else 0 end) as dt_koperasi,
    sum(case when a.fas_id = 10 then 1 else 0 end) as dt_poliklinik,
    sum(case when a.fas_id = 11 then 1 else 0 end) as dt_ambulance,
    sum(case when a.fas_id = 12 then 1 else 0 end) as dt_prlgkpn_jenazah,
    sum(case when a.fas_id = 13 then 1 else 0 end) as dt_aula,
    sum(case when a.fas_id = 14 then 1 else 0 end) as dt_toko,
    sum(case when a.fas_id = 15 then 1 else 0 end) as dt_tmpt_belajar,
    sum(case when a.fas_id = 16 then 1 else 0 end) as dt_tmpt_titip_sandal,
    sum(case when a.fas_id = 17 then 1 else 0 end) as dt_gudang,
    sum(case when a.fas_id = 18 then 1 else 0 end) as dt_taman,
    sum(case when a.fas_id = 19 then 1 else 0 end) as dt_parkir,
    sum(case when a.fas_id = 20 then 1 else 0 end) as dt_internet,
    sum(case when a.fas_id = 21 then 1 else 0 end) as dt_penginapan,
    sum(case when a.fas_id = 22 then 1 else 0 end) as dt_perkantoran,
    sum(case when a.fas_id = 23 then 1 else 0 end) as dt_situs_bersejarah,
    sum(case when a.fas_id = 24 then 1 else 0 end) as dt_museum
    FROM
    masjid__content_fas as a,
    address__kabupaten as b
    WHERE
    a.kabupaten_id != 0 and a.kabupaten_id = b.kabupaten_id and a.provinsi_id = $prop
    GROUP BY
    a.kabupaten_id
    ORDER BY
    b.kabupaten_id asc
    ");
  return $query->result();
}

function tampil_kecamatan($kab)
{
  $query = $this->db_database10->query("
    SELECT
    b.kecamatan_id,
    b.kecamatan_name,
    sum(case when a.fas_id = 1 then 1 else 0 end) as dt_srnibdh,
    sum(case when a.fas_id = 2 then 1 else 0 end) as dt_wudhu,
    sum(case when a.fas_id = 3 then 1 else 0 end) as dt_kmrmandi,
    sum(case when a.fas_id = 4 then 1 else 0 end) as dt_genset,
    sum(case when a.fas_id = 5 then 1 else 0 end) as dt_multimedia,
    sum(case when a.fas_id = 6 then 1 else 0 end) as dt_ac,
    sum(case when a.fas_id = 7 then 1 else 0 end) as dt_kantorsekretariat,
    sum(case when a.fas_id = 8 then 1 else 0 end) as dt_perpustakaan,
    sum(case when a.fas_id = 9 then 1 else 0 end) as dt_koperasi,
    sum(case when a.fas_id = 10 then 1 else 0 end) as dt_poliklinik,
    sum(case when a.fas_id = 11 then 1 else 0 end) as dt_ambulance,
    sum(case when a.fas_id = 12 then 1 else 0 end) as dt_prlgkpn_jenazah,
    sum(case when a.fas_id = 13 then 1 else 0 end) as dt_aula,
    sum(case when a.fas_id = 14 then 1 else 0 end) as dt_toko,
    sum(case when a.fas_id = 15 then 1 else 0 end) as dt_tmpt_belajar,
    sum(case when a.fas_id = 16 then 1 else 0 end) as dt_tmpt_titip_sandal,
    sum(case when a.fas_id = 17 then 1 else 0 end) as dt_gudang,
    sum(case when a.fas_id = 18 then 1 else 0 end) as dt_taman,
    sum(case when a.fas_id = 19 then 1 else 0 end) as dt_parkir,
    sum(case when a.fas_id = 20 then 1 else 0 end) as dt_internet,
    sum(case when a.fas_id = 21 then 1 else 0 end) as dt_penginapan,
    sum(case when a.fas_id = 22 then 1 else 0 end) as dt_perkantoran,
    sum(case when a.fas_id = 23 then 1 else 0 end) as dt_situs_bersejarah,
    sum(case when a.fas_id = 24 then 1 else 0 end) as dt_museum
    FROM
    masjid__content_fas as a,
    address__kecamatan as b
    WHERE
    a.kecamatan_id != 0 and a.kecamatan_id = b.kecamatan_id and b.kabupaten_id = $kab
    GROUP BY
    a.kecamatan_id
    ORDER BY
    b.kecamatan_id asc
    ");
  return $query->result();
}

function tampil_tipologi_masjid()
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
}

function tampil_tipologi_mushalla()
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
}

function tampil_propmas()
{
  $query = $this->db_database10->select("*")->from("v_datamasjid")->get()->result();
  return $query;
}

function tampil_prop($prop1)
{
  $query = $this->db_database10->query("
    SELECT
    b.kabupaten_id,
    b.kabupaten_name,
    sum( CASE WHEN a.masjid_id THEN 1 ELSE 0 END ) AS dt_masjid,
    sum( CASE WHEN a.tanah_id = 1 THEN 1 ELSE 0 END ) AS dt_wakaf,
    sum( CASE WHEN a.tanah_id = 2 THEN 1 ELSE 0 END ) AS dt_shm,
    sum( CASE WHEN a.tanah_id = 3 THEN 1 ELSE 0 END ) AS dt_girik,
    sum( CASE WHEN a.tanah_id = 4 THEN 1 ELSE 0 END ) AS dt_bmn,
    sum( CASE WHEN a.tanah_id = 5 THEN 1 ELSE 0 END ) AS dt_sewa,
    sum( CASE WHEN a.tanah_id = 6 THEN 1 ELSE 0 END ) AS dt_hibah,
    sum( CASE WHEN a.masjid_tanah THEN 1 ELSE 0 END ) AS dt_tanah,
    sum( CASE WHEN a.masjid_bangunan THEN 1 ELSE 0 END ) AS dt_bangunan,
    sum( CASE WHEN a.masjid_num_jamaah THEN 1 ELSE 0 END ) AS dt_jamaah,
    sum( CASE WHEN a.masjid_num_pengurus THEN 1 ELSE 0 END ) AS dt_pengurus,
    sum( CASE WHEN a.masjid_num_imam THEN 1 ELSE 0 END ) AS dt_imam,
    sum( CASE WHEN a.masjid_num_khatib THEN 1 ELSE 0 END ) AS dt_khatib,
    sum( CASE WHEN a.masjid_num_muazin THEN 1 ELSE 0 END ) AS dt_muazin,
    sum( CASE WHEN a.masjid_num_remaja THEN 1 ELSE 0 END ) AS dt_remaja 
    FROM
    masjid__content AS a
    LEFT JOIN address__kabupaten AS b ON a.kabupaten_id = b.kabupaten_id
    WHERE
    a.provinsi_id = $prop1
    GROUP BY
    b.kabupaten_id 
    ORDER BY
    b.kabupaten_id ASC
    ");
  return $query->result();
}

function tampil_kabmas($kab1)
{
  $query = $this->db_database10->query("
    SELECT
    b.kecamatan_id,
    b.kecamatan_name,
    sum( CASE WHEN a.masjid_id THEN 1 ELSE 0 END ) AS dt_masjid,
    sum( CASE WHEN a.tanah_id = 1 THEN 1 ELSE 0 END ) AS dt_wakaf,
    sum( CASE WHEN a.tanah_id = 2 THEN 1 ELSE 0 END ) AS dt_shm,
    sum( CASE WHEN a.tanah_id = 3 THEN 1 ELSE 0 END ) AS dt_girik,
    sum( CASE WHEN a.tanah_id = 4 THEN 1 ELSE 0 END ) AS dt_bmn,
    sum( CASE WHEN a.tanah_id = 5 THEN 1 ELSE 0 END ) AS dt_sewa,
    sum( CASE WHEN a.tanah_id = 6 THEN 1 ELSE 0 END ) AS dt_hibah,
    sum( CASE WHEN a.masjid_tanah THEN 1 ELSE 0 END ) AS dt_tanah,
    sum( CASE WHEN a.masjid_bangunan THEN 1 ELSE 0 END ) AS dt_bangunan,
    sum( CASE WHEN a.masjid_num_jamaah THEN 1 ELSE 0 END ) AS dt_jamaah,
    sum( CASE WHEN a.masjid_num_pengurus THEN 1 ELSE 0 END ) AS dt_pengurus,
    sum( CASE WHEN a.masjid_num_imam THEN 1 ELSE 0 END ) AS dt_imam,
    sum( CASE WHEN a.masjid_num_khatib THEN 1 ELSE 0 END ) AS dt_khatib,
    sum( CASE WHEN a.masjid_num_muazin THEN 1 ELSE 0 END ) AS dt_muazin,
    sum( CASE WHEN a.masjid_num_remaja THEN 1 ELSE 0 END ) AS dt_remaja 
    FROM
    masjid__content AS a
    LEFT JOIN address__kecamatan AS b ON a.kecamatan_id = b.kecamatan_id
    WHERE
    a.kabupaten_id = $kab1
    GROUP BY
    b.kecamatan_id 
    ORDER BY
    b.kecamatan_id ASC
    ");
  return $query->result();
}

function tampil_detail($kec1)
{
  $query = $this->db_database10->query("
    SELECT
    a.masjid_id,
    a.masjid_name,
    a.tahun,
    a.masjid_address,
    a.masjid_phone,
    a.masjid_email,
    a.masjid_tanah,
    a.masjid_bangunan,
    a.masjid_num_jamaah as jamaah,
    a.masjid_num_imam as imam,
    a.masjid_num_khatib as khatib,
    a.masjid_num_muazin as muazin,
    a.masjid_num_remaja as remaja,
    a.masjid_lat,
    a.masjid_long
    FROM
    masjid__content as a
    WHERE
    a.kecamatan_id = $kec1
    GROUP BY
    a.masjid_id
    ORDER BY
    a.masjid_id asc
    ");
  return $query->result();
}

function tampil_propmas_mushalla()
{
  $query = $this->db_database10->select("*")->from("v_datamushalla")->get()->result();
  return $query;
}

function tampil_prop_mushalla($prop2)
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
    a.provinsi_id = $prop2
    GROUP BY
    c.kabupaten_id 
    ORDER BY
    c.kabupaten_id ASC
    ");
  return $query->result();
}

function tampil_kabmas_mushalla($kab2)
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
    a.kabupaten_id = $kab2
    GROUP BY
    c.kecamatan_id 
    ORDER BY
    c.kecamatan_id ASC
    ");
  return $query->result();
}

function tampil_detail_mushalla($kec2)
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
    a.kecamatan_id = $kec2
    GROUP BY
    a.mushalla_id
    ORDER BY
    a.mushalla_id asc
    ");
  return $query->result();
}

function tampil_propinsi_mushalla()
{
  $query = $this->db_database10->query("
    SELECT
    a.provinsi_id,
    b.provinsi_name,
    sum(case when a.fas_id = 1 then 1 else 0 end) as dt_srnibdh,
    sum(case when a.fas_id = 2 then 1 else 0 end) as dt_wudhu,
    sum(case when a.fas_id = 3 then 1 else 0 end) as dt_kmrmandi,
    sum(case when a.fas_id = 4 then 1 else 0 end) as dt_genset,
    sum(case when a.fas_id = 5 then 1 else 0 end) as dt_multimedia,
    sum(case when a.fas_id = 6 then 1 else 0 end) as dt_ac,
    sum(case when a.fas_id = 7 then 1 else 0 end) as dt_kantorsekretariat,
    sum(case when a.fas_id = 8 then 1 else 0 end) as dt_perpustakaan,
    sum(case when a.fas_id = 9 then 1 else 0 end) as dt_koperasi,
    sum(case when a.fas_id = 10 then 1 else 0 end) as dt_poliklinik,
    sum(case when a.fas_id = 11 then 1 else 0 end) as dt_ambulance,
    sum(case when a.fas_id = 12 then 1 else 0 end) as dt_prlgkpn_jenazah,
    sum(case when a.fas_id = 13 then 1 else 0 end) as dt_aula,
    sum(case when a.fas_id = 14 then 1 else 0 end) as dt_toko,
    sum(case when a.fas_id = 15 then 1 else 0 end) as dt_tmpt_belajar,
    sum(case when a.fas_id = 16 then 1 else 0 end) as dt_tmpt_titip_sandal,
    sum(case when a.fas_id = 17 then 1 else 0 end) as dt_gudang,
    sum(case when a.fas_id = 18 then 1 else 0 end) as dt_taman,
    sum(case when a.fas_id = 19 then 1 else 0 end) as dt_parkir,
    sum(case when a.fas_id = 20 then 1 else 0 end) as dt_internet,
    sum(case when a.fas_id = 21 then 1 else 0 end) as dt_penginapan,
    sum(case when a.fas_id = 22 then 1 else 0 end) as dt_perkantoran,
    sum(case when a.fas_id = 23 then 1 else 0 end) as dt_situs_bersejarah,
    sum(case when a.fas_id = 24 then 1 else 0 end) as dt_museum
    FROM
    mushalla__content_fas as a,
    address__provinsi as b
    WHERE
    a.provinsi_id != 0 and a.provinsi_id = b.provinsi_id
    GROUP BY
    a.provinsi_id
    ORDER BY
    b.provinsi_kode asc
    ");
  return $query->result();
}

function tampil_kecamatan_mushalla($kabfm)
{
  $query = $this->db_database10->query("
    SELECT
    a.kabupaten_id,
    b.kabupaten_name,
    sum(case when a.fas_id = 1 then 1 else 0 end) as dt_srnibdh,
    sum(case when a.fas_id = 2 then 1 else 0 end) as dt_wudhu,
    sum(case when a.fas_id = 3 then 1 else 0 end) as dt_kmrmandi,
    sum(case when a.fas_id = 4 then 1 else 0 end) as dt_genset,
    sum(case when a.fas_id = 5 then 1 else 0 end) as dt_multimedia,
    sum(case when a.fas_id = 6 then 1 else 0 end) as dt_ac,
    sum(case when a.fas_id = 7 then 1 else 0 end) as dt_kantorsekretariat,
    sum(case when a.fas_id = 8 then 1 else 0 end) as dt_perpustakaan,
    sum(case when a.fas_id = 9 then 1 else 0 end) as dt_koperasi,
    sum(case when a.fas_id = 10 then 1 else 0 end) as dt_poliklinik,
    sum(case when a.fas_id = 11 then 1 else 0 end) as dt_ambulance,
    sum(case when a.fas_id = 12 then 1 else 0 end) as dt_prlgkpn_jenazah,
    sum(case when a.fas_id = 13 then 1 else 0 end) as dt_aula,
    sum(case when a.fas_id = 14 then 1 else 0 end) as dt_toko,
    sum(case when a.fas_id = 15 then 1 else 0 end) as dt_tmpt_belajar,
    sum(case when a.fas_id = 16 then 1 else 0 end) as dt_tmpt_titip_sandal,
    sum(case when a.fas_id = 17 then 1 else 0 end) as dt_gudang,
    sum(case when a.fas_id = 18 then 1 else 0 end) as dt_taman,
    sum(case when a.fas_id = 19 then 1 else 0 end) as dt_parkir,
    sum(case when a.fas_id = 20 then 1 else 0 end) as dt_internet,
    sum(case when a.fas_id = 21 then 1 else 0 end) as dt_penginapan,
    sum(case when a.fas_id = 22 then 1 else 0 end) as dt_perkantoran,
    sum(case when a.fas_id = 23 then 1 else 0 end) as dt_situs_bersejarah,
    sum(case when a.fas_id = 24 then 1 else 0 end) as dt_museum
    FROM
    mushalla__content_fas as a,
    address__kabupaten as b
    WHERE
    a.kabupaten_id != 0 and a.kabupaten_id = b.kabupaten_id and b.provinsi_id = $kabfm
    GROUP BY
    a.kabupaten_id
    ORDER BY
    b.kabupaten_kode asc
    ");
  return $query->result();
}

function tampil_kabupaten_mushalla($propfm)
{
  $query = $this->db_database10->query("
    SELECT
    a.kecamatan_id,
    b.kecamatan_name,
    sum(case when a.fas_id = 1 then 1 else 0 end) as dt_srnibdh,
    sum(case when a.fas_id = 2 then 1 else 0 end) as dt_wudhu,
    sum(case when a.fas_id = 3 then 1 else 0 end) as dt_kmrmandi,
    sum(case when a.fas_id = 4 then 1 else 0 end) as dt_genset,
    sum(case when a.fas_id = 5 then 1 else 0 end) as dt_multimedia,
    sum(case when a.fas_id = 6 then 1 else 0 end) as dt_ac,
    sum(case when a.fas_id = 7 then 1 else 0 end) as dt_kantorsekretariat,
    sum(case when a.fas_id = 8 then 1 else 0 end) as dt_perpustakaan,
    sum(case when a.fas_id = 9 then 1 else 0 end) as dt_koperasi,
    sum(case when a.fas_id = 10 then 1 else 0 end) as dt_poliklinik,
    sum(case when a.fas_id = 11 then 1 else 0 end) as dt_ambulance,
    sum(case when a.fas_id = 12 then 1 else 0 end) as dt_prlgkpn_jenazah,
    sum(case when a.fas_id = 13 then 1 else 0 end) as dt_aula,
    sum(case when a.fas_id = 14 then 1 else 0 end) as dt_toko,
    sum(case when a.fas_id = 15 then 1 else 0 end) as dt_tmpt_belajar,
    sum(case when a.fas_id = 16 then 1 else 0 end) as dt_tmpt_titip_sandal,
    sum(case when a.fas_id = 17 then 1 else 0 end) as dt_gudang,
    sum(case when a.fas_id = 18 then 1 else 0 end) as dt_taman,
    sum(case when a.fas_id = 19 then 1 else 0 end) as dt_parkir,
    sum(case when a.fas_id = 20 then 1 else 0 end) as dt_internet,
    sum(case when a.fas_id = 21 then 1 else 0 end) as dt_penginapan,
    sum(case when a.fas_id = 22 then 1 else 0 end) as dt_perkantoran,
    sum(case when a.fas_id = 23 then 1 else 0 end) as dt_situs_bersejarah,
    sum(case when a.fas_id = 24 then 1 else 0 end) as dt_museum
    FROM
    mushalla__content_fas as a,
    address__kecamatan as b
    WHERE
    a.kecamatan_id != 0 and a.kecamatan_id = b.kecamatan_id and b.kabupaten_id = $propfm
    GROUP BY
    a.kecamatan_id
    ORDER BY
    b.kecamatan_kode asc
    ");
  return $query->result();
}

function tampil_kegiatan_mas()
{
  $query = $this->db_database10->query("
    SELECT
    b.provinsi_id,
    b.provinsi_name,
    sum(case when a.keg_id = 1 then 1 else 0 end) as dt_shalat_fardhu,
    sum(case when a.keg_id = 2 then 1 else 0 end) as dt_shalat_jumat,
    sum(case when a.keg_id = 3 then 1 else 0 end) as dt_hbi,
    sum(case when a.keg_id = 4 then 1 else 0 end) as dt_dakwah,
    sum(case when a.keg_id = 5 then 1 else 0 end) as dt_pengajian,
    sum(case when a.keg_id = 6 then 1 else 0 end) as dt_koperasi,
    sum(case when a.keg_id = 7 then 1 else 0 end) as dt_pendidikan,
    sum(case when a.keg_id = 8 then 1 else 0 end) as dt_zakat,
    sum(case when a.keg_id = 9 then 1 else 0 end) as dt_upz,
    sum(case when a.keg_id = 10 then 1 else 0 end) as dt_bim_mualaf,
    sum(case when a.keg_id = 11 then 1 else 0 end) as dt_bim_haji
    FROM
    masjid__content_keg as a,
    address__provinsi as b
    WHERE
    a.provinsi_id != 0 and b.provinsi_id = a.provinsi_id
    GROUP BY
    a.provinsi_id
    ORDER BY
    b.provinsi_kode asc
    ");
  return $query->result();
}

function tampil_kegiatan_masprop($propkeg)
{
  $query = $this->db_database10->query("
    SELECT
    b.kabupaten_id,
    b.kabupaten_name,
    sum(case when a.keg_id = 1 then 1 else 0 end) as dt_shalat_fardhu,
    sum(case when a.keg_id = 2 then 1 else 0 end) as dt_shalat_jumat,
    sum(case when a.keg_id = 3 then 1 else 0 end) as dt_hbi,
    sum(case when a.keg_id = 4 then 1 else 0 end) as dt_dakwah,
    sum(case when a.keg_id = 5 then 1 else 0 end) as dt_pengajian,
    sum(case when a.keg_id = 6 then 1 else 0 end) as dt_koperasi,
    sum(case when a.keg_id = 7 then 1 else 0 end) as dt_pendidikan,
    sum(case when a.keg_id = 8 then 1 else 0 end) as dt_zakat,
    sum(case when a.keg_id = 9 then 1 else 0 end) as dt_upz,
    sum(case when a.keg_id = 10 then 1 else 0 end) as dt_bim_mualaf,
    sum(case when a.keg_id = 11 then 1 else 0 end) as dt_bim_haji
    FROM
    masjid__content_keg as a,
    address__kabupaten as b
    WHERE
    a.kabupaten_id != 0 and a.kabupaten_id = b.kabupaten_id and a.provinsi_id = $propkeg
    GROUP BY
    a.kabupaten_id
    ORDER BY
    b.kabupaten_kode asc
    ");
  return $query->result();
}

function tampil_kegiatan_maskab($kabkeg)
{
  $query = $this->db_database10->query("
    SELECT
    b.kecamatan_id,
    b.kecamatan_name,
    sum(case when a.keg_id = 1 then 1 else 0 end) as dt_shalat_fardhu,
    sum(case when a.keg_id = 2 then 1 else 0 end) as dt_shalat_jumat,
    sum(case when a.keg_id = 3 then 1 else 0 end) as dt_hbi,
    sum(case when a.keg_id = 4 then 1 else 0 end) as dt_dakwah,
    sum(case when a.keg_id = 5 then 1 else 0 end) as dt_pengajian,
    sum(case when a.keg_id = 6 then 1 else 0 end) as dt_koperasi,
    sum(case when a.keg_id = 7 then 1 else 0 end) as dt_pendidikan,
    sum(case when a.keg_id = 8 then 1 else 0 end) as dt_zakat,
    sum(case when a.keg_id = 9 then 1 else 0 end) as dt_upz,
    sum(case when a.keg_id = 10 then 1 else 0 end) as dt_bim_mualaf,
    sum(case when a.keg_id = 11 then 1 else 0 end) as dt_bim_haji
    FROM
    masjid__content_keg as a,
    address__kecamatan as b
    WHERE
    a.kecamatan_id != 0 and a.kecamatan_id = b.kecamatan_id and a.kabupaten_id = $kabkeg
    GROUP BY
    a.kecamatan_id
    ORDER BY
    b.kecamatan_kode asc
    ");
  return $query->result();
}

function tampil_kegiatan_mus()
{
  $query = $this->db_database10->query("
    SELECT
    b.provinsi_id,
    b.provinsi_name,
    sum(case when a.keg_id = 1 then 1 else 0 end) as dt_shalat_fardhu,
    sum(case when a.keg_id = 2 then 1 else 0 end) as dt_shalat_jumat,
    sum(case when a.keg_id = 3 then 1 else 0 end) as dt_hbi,
    sum(case when a.keg_id = 4 then 1 else 0 end) as dt_dakwah,
    sum(case when a.keg_id = 5 then 1 else 0 end) as dt_pengajian,
    sum(case when a.keg_id = 6 then 1 else 0 end) as dt_koperasi,
    sum(case when a.keg_id = 7 then 1 else 0 end) as dt_pendidikan,
    sum(case when a.keg_id = 8 then 1 else 0 end) as dt_zakat,
    sum(case when a.keg_id = 9 then 1 else 0 end) as dt_upz,
    sum(case when a.keg_id = 10 then 1 else 0 end) as dt_bim_mualaf,
    sum(case when a.keg_id = 11 then 1 else 0 end) as dt_bim_haji
    FROM
    mushalla__content_keg as a,
    address__provinsi as b
    WHERE
    a.provinsi_id != 0 and b.provinsi_id = a.provinsi_id
    GROUP BY
    a.provinsi_id
    ORDER BY
    b.provinsi_kode asc
    ");
  return $query->result();
}

function tampil_kegiatan_musprop($propkeg2)
{
  $query = $this->db_database10->query("
    SELECT
    b.kabupaten_id,
    b.kabupaten_name,
    sum(case when a.keg_id = 1 then 1 else 0 end) as dt_shalat_fardhu,
    sum(case when a.keg_id = 2 then 1 else 0 end) as dt_shalat_jumat,
    sum(case when a.keg_id = 3 then 1 else 0 end) as dt_hbi,
    sum(case when a.keg_id = 4 then 1 else 0 end) as dt_dakwah,
    sum(case when a.keg_id = 5 then 1 else 0 end) as dt_pengajian,
    sum(case when a.keg_id = 6 then 1 else 0 end) as dt_koperasi,
    sum(case when a.keg_id = 7 then 1 else 0 end) as dt_pendidikan,
    sum(case when a.keg_id = 8 then 1 else 0 end) as dt_zakat,
    sum(case when a.keg_id = 9 then 1 else 0 end) as dt_upz,
    sum(case when a.keg_id = 10 then 1 else 0 end) as dt_bim_mualaf,
    sum(case when a.keg_id = 11 then 1 else 0 end) as dt_bim_haji
    FROM
    mushalla__content_keg as a,
    address__kabupaten as b
    WHERE
    a.kabupaten_id != 0 and b.kabupaten_id = a.kabupaten_id and a.provinsi_id = $propkeg2
    GROUP BY
    a.kabupaten_id
    ORDER BY
    b.kabupaten_kode asc
    ");
  return $query->result();
}

function tampil_kegiatan_muskab($kabkeg2)
{
  $query = $this->db_database10->query("
    SELECT
    b.kecamatan_id,
    b.kecamatan_name,
    sum(case when a.keg_id = 1 then 1 else 0 end) as dt_shalat_fardhu,
    sum(case when a.keg_id = 2 then 1 else 0 end) as dt_shalat_jumat,
    sum(case when a.keg_id = 3 then 1 else 0 end) as dt_hbi,
    sum(case when a.keg_id = 4 then 1 else 0 end) as dt_dakwah,
    sum(case when a.keg_id = 5 then 1 else 0 end) as dt_pengajian,
    sum(case when a.keg_id = 6 then 1 else 0 end) as dt_koperasi,
    sum(case when a.keg_id = 7 then 1 else 0 end) as dt_pendidikan,
    sum(case when a.keg_id = 8 then 1 else 0 end) as dt_zakat,
    sum(case when a.keg_id = 9 then 1 else 0 end) as dt_upz,
    sum(case when a.keg_id = 10 then 1 else 0 end) as dt_bim_mualaf,
    sum(case when a.keg_id = 11 then 1 else 0 end) as dt_bim_haji
    FROM
    mushalla__content_keg as a,
    address__kecamatan as b
    WHERE
    a.kecamatan_id != 0 and b.kecamatan_id = a.kecamatan_id and a.kabupaten_id = $kabkeg2
    GROUP BY
    a.kecamatan_id
    ORDER BY
    b.kecamatan_kode asc
    ");
  return $query->result();
}

function tampil_sdm_mas()
{
  $query = $this->db_database10->query("
    SELECT
    b.provinsi_id,
    b.provinsi_name,
    format(sum(case when a.masjid_num_jamaah then a.masjid_num_jamaah else 0 end), 0) as dt_jamaah,
    format(sum(case when a.masjid_num_imam then a.masjid_num_imam else 0 end), 0) as dt_imam,
    format(sum(case when a.masjid_num_khatib then a.masjid_num_khatib else 0 end), 0) as dt_khatib,
    format(sum(case when a.masjid_num_muazin then a.masjid_num_muazin else 0 end), 0) as dt_muazin,
    format(sum(case when a.masjid_num_remaja then a.masjid_num_remaja else 0 end), 0) as dt_remaja
    FROM
    masjid__content as a,
    address__provinsi as b
    WHERE
    a.provinsi_id = b.provinsi_id and a.provinsi_id != 0
    GROUP BY
    a.provinsi_id
    ORDER BY
    b.provinsi_kode asc
    ");
  return $query->result();
}

function tampil_sdm_masprop($propsdm)
{
  $query = $this->db_database10->query("
    SELECT
    b.kabupaten_id,
    b.kabupaten_name,
    format(sum(case when a.masjid_num_jamaah then a.masjid_num_jamaah else 0 end), 0) as dt_jamaah,
    format(sum(case when a.masjid_num_imam then a.masjid_num_imam else 0 end), 0) as dt_imam,
    format(sum(case when a.masjid_num_khatib then a.masjid_num_khatib else 0 end), 0) as dt_khatib,
    format(sum(case when a.masjid_num_muazin then a.masjid_num_muazin else 0 end), 0) as dt_muazin,
    format(sum(case when a.masjid_num_remaja then a.masjid_num_remaja else 0 end), 0) as dt_remaja
    FROM
    masjid__content as a,
    address__kabupaten as b
    WHERE
    a.kabupaten_id = b.kabupaten_id and a.kabupaten_id != 0 and a.provinsi_id = $propsdm
    GROUP BY
    a.kabupaten_id
    ORDER BY
    b.kabupaten_kode asc
    ");
  return $query->result();
}

function tampil_sdm_maskab($kabsdm)
{
  $query = $this->db_database10->query("
    SELECT
    b.kecamatan_id,
    b.kecamatan_name,
    format(sum(case when a.masjid_num_jamaah then a.masjid_num_jamaah else 0 end), 0) as dt_jamaah,
    format(sum(case when a.masjid_num_imam then a.masjid_num_imam else 0 end), 0) as dt_imam,
    format(sum(case when a.masjid_num_khatib then a.masjid_num_khatib else 0 end), 0) as dt_khatib,
    format(sum(case when a.masjid_num_muazin then a.masjid_num_muazin else 0 end), 0) as dt_muazin,
    format(sum(case when a.masjid_num_remaja then a.masjid_num_remaja else 0 end), 0) as dt_remaja
    FROM
    masjid__content as a,
    address__kecamatan as b
    WHERE
    a.kecamatan_id = b.kecamatan_id and a.kecamatan_id != 0 and a.kabupaten_id = $kabsdm
    GROUP BY
    a.kecamatan_id
    ORDER BY
    b.kecamatan_kode asc
    ");
  return $query->result();
}

function tampil_sdm_mus()
{
  $query = $this->db_database10->query("
    SELECT
    b.provinsi_id,
    b.provinsi_name,
    format(sum(case when a.mushalla_num_jamaah then a.mushalla_num_jamaah else 0 end), 0) as dt_jamaah,
    format(sum(case when a.mushalla_num_imam then a.mushalla_num_imam else 0 end), 0) as dt_imam,
    format(sum(case when a.mushalla_num_khatib then a.mushalla_num_khatib else 0 end), 0) as dt_khatib,
    format(sum(case when a.mushalla_num_muazin then a.mushalla_num_muazin else 0 end), 0) as dt_muazin,
    format(sum(case when a.mushalla_num_remaja then a.mushalla_num_remaja else 0 end), 0) as dt_remaja
    FROM
    mushalla__content as a,
    address__provinsi as b
    WHERE
    a.provinsi_id = b.provinsi_id and a.provinsi_id != 0
    GROUP BY
    a.provinsi_id
    ORDER BY
    b.provinsi_kode asc
    ");
  return $query->result();
}

function tampil_sdm_musprop($propsdm2)
{
  $query = $this->db_database10->query("
    SELECT
    b.kabupaten_id,
    b.kabupaten_name,
    format(sum(case when a.mushalla_num_jamaah then a.mushalla_num_jamaah else 0 end), 0) as dt_jamaah,
    format(sum(case when a.mushalla_num_imam then a.mushalla_num_imam else 0 end), 0) as dt_imam,
    format(sum(case when a.mushalla_num_khatib then a.mushalla_num_khatib else 0 end), 0) as dt_khatib,
    format(sum(case when a.mushalla_num_muazin then a.mushalla_num_muazin else 0 end), 0) as dt_muazin,
    format(sum(case when a.mushalla_num_remaja then a.mushalla_num_remaja else 0 end), 0) as dt_remaja
    FROM
    mushalla__content as a,
    address__kabupaten as b
    WHERE
    a.kabupaten_id = b.kabupaten_id and a.kabupaten_id != 0 and a.provinsi_id = $propsdm2
    GROUP BY
    a.kabupaten_id
    ORDER BY
    b.kabupaten_kode asc
    ");
  return $query->result();
}

function tampil_sdm_muskab($kabsdm2)
{
  $query = $this->db_database10->query("
    SELECT
    b.kecamatan_id,
    b.kecamatan_name,
    format(sum(case when a.mushalla_num_jamaah then a.mushalla_num_jamaah else 0 end), 0) as dt_jamaah,
    format(sum(case when a.mushalla_num_imam then a.mushalla_num_imam else 0 end), 0) as dt_imam,
    format(sum(case when a.mushalla_num_khatib then a.mushalla_num_khatib else 0 end), 0) as dt_khatib,
    format(sum(case when a.mushalla_num_muazin then a.mushalla_num_muazin else 0 end), 0) as dt_muazin,
    format(sum(case when a.mushalla_num_remaja then a.mushalla_num_remaja else 0 end), 0) as dt_remaja
    FROM
    mushalla__content as a,
    address__kecamatan as b
    WHERE
    a.kecamatan_id = b.kecamatan_id and a.kecamatan_id != 0 and a.kabupaten_id = $kabsdm2
    GROUP BY
    a.kecamatan_id
    ORDER BY
    b.kecamatan_kode asc
    ");
  return $query->result();
}

function tampil_legal_mas()
{
  $query = $this->db_database10->query("
    SELECT
    b.provinsi_id,
    b.provinsi_name,
    sum(case when a.tanah_id = 1 then 1 else 0 end) as dt_wakaf,
    sum(case when a.tanah_id = 2 then 1 else 0 end) as dt_shm,
    sum(case when a.tanah_id = 3 then 1 else 0 end) as dt_girik,
    sum(case when a.tanah_id = 4 then 1 else 0 end) as dt_bmn,
    sum(case when a.tanah_id = 5 then 1 else 0 end) as dt_sewa,
    sum(case when a.tanah_id = 6 then 1 else 0 end) as dt_hibah
    FROM
    masjid__content as a,
    address__provinsi as b
    WHERE
    a.provinsi_id != 0 and b.provinsi_id = a.provinsi_id
    GROUP BY
    b.provinsi_id
    ORDER BY
    b.provinsi_kode asc
    ");
  return $query->result();
}

function tampil_legal_masprop($lglsprop)
{
  $query = $this->db_database10->query("
    SELECT
    b.kabupaten_id,
    b.kabupaten_name,
    sum(case when a.tanah_id = 1 then 1 else 0 end) as dt_wakaf,
    sum(case when a.tanah_id = 2 then 1 else 0 end) as dt_shm,
    sum(case when a.tanah_id = 3 then 1 else 0 end) as dt_girik,
    sum(case when a.tanah_id = 4 then 1 else 0 end) as dt_bmn,
    sum(case when a.tanah_id = 5 then 1 else 0 end) as dt_sewa,
    sum(case when a.tanah_id = 6 then 1 else 0 end) as dt_hibah
    FROM
    masjid__content as a,
    address__kabupaten as b
    WHERE
    a.kabupaten_id != 0 and b.kabupaten_id = a.kabupaten_id and a.provinsi_id = $lglsprop
    GROUP BY
    b.kabupaten_id
    ORDER BY
    b.kabupaten_kode asc
    ");
  return $query->result();
}

function tampil_legal_maskab($lglskab)
{
  $query = $this->db_database10->query("
    SELECT
    b.kecamatan_id,
    b.kecamatan_name,
    sum(case when a.tanah_id = 1 then 1 else 0 end) as dt_wakaf,
    sum(case when a.tanah_id = 2 then 1 else 0 end) as dt_shm,
    sum(case when a.tanah_id = 3 then 1 else 0 end) as dt_girik,
    sum(case when a.tanah_id = 4 then 1 else 0 end) as dt_bmn,
    sum(case when a.tanah_id = 5 then 1 else 0 end) as dt_sewa,
    sum(case when a.tanah_id = 6 then 1 else 0 end) as dt_hibah
    FROM
    masjid__content as a,
    address__kecamatan as b
    WHERE
    a.kecamatan_id != 0 and b.kecamatan_id = a.kecamatan_id and a.kabupaten_id = $lglskab
    GROUP BY
    b.kecamatan_id
    ORDER BY
    b.kecamatan_kode asc
    ");
  return $query->result();
}

function tampil_legal_mus()
{
  $query = $this->db_database10->query("
    SELECT
    b.provinsi_id,
    b.provinsi_name,
    sum(case when a.tanah_id = 1 then 1 else 0 end) as dt_wakaf,
    sum(case when a.tanah_id = 2 then 1 else 0 end) as dt_shm,
    sum(case when a.tanah_id = 3 then 1 else 0 end) as dt_girik,
    sum(case when a.tanah_id = 4 then 1 else 0 end) as dt_bmn,
    sum(case when a.tanah_id = 5 then 1 else 0 end) as dt_sewa,
    sum(case when a.tanah_id = 6 then 1 else 0 end) as dt_hibah
    FROM
    mushalla__content as a,
    address__provinsi as b
    WHERE
    a.provinsi_id != 0 and b.provinsi_id = a.provinsi_id
    GROUP BY
    b.provinsi_id
    ORDER BY
    b.provinsi_kode asc
    ");
  return $query->result();
}

function tampil_legal_musprop($lglsmprop)
{
  $query = $this->db_database10->query("
    SELECT
    b.kabupaten_id,
    b.kabupaten_name,
    sum(case when a.tanah_id = 1 then 1 else 0 end) as dt_wakaf,
    sum(case when a.tanah_id = 2 then 1 else 0 end) as dt_shm,
    sum(case when a.tanah_id = 3 then 1 else 0 end) as dt_girik,
    sum(case when a.tanah_id = 4 then 1 else 0 end) as dt_bmn,
    sum(case when a.tanah_id = 5 then 1 else 0 end) as dt_sewa,
    sum(case when a.tanah_id = 6 then 1 else 0 end) as dt_hibah
    FROM
    mushalla__content as a,
    address__kabupaten as b
    WHERE
    a.kabupaten_id != 0 and b.kabupaten_id = a.kabupaten_id and a.provinsi_id = $lglsmprop
    GROUP BY
    b.kabupaten_id
    ORDER BY
    b.kabupaten_kode asc
    ");
  return $query->result();
}

function tampil_legal_muskab($lglsmkab)
{
  $query = $this->db_database10->query("
    SELECT
    b.kecamatan_id,
    b.kecamatan_name,
    sum(case when a.tanah_id = 1 then 1 else 0 end) as dt_wakaf,
    sum(case when a.tanah_id = 2 then 1 else 0 end) as dt_shm,
    sum(case when a.tanah_id = 3 then 1 else 0 end) as dt_girik,
    sum(case when a.tanah_id = 4 then 1 else 0 end) as dt_bmn,
    sum(case when a.tanah_id = 5 then 1 else 0 end) as dt_sewa,
    sum(case when a.tanah_id = 6 then 1 else 0 end) as dt_hibah
    FROM
    mushalla__content as a,
    address__kecamatan as b
    WHERE
    a.kecamatan_id != 0 and b.kecamatan_id = a.kecamatan_id and a.kabupaten_id = $lglsmkab
    GROUP BY
    b.kecamatan_id
    ORDER BY
    b.kecamatan_kode asc
    ");
  return $query->result();
}

function tampil_kondisimasjid()
{
  $query = $this->db_database10->query("
    SELECT
    b.provinsi_id,
    b.provinsi_name,
    sum(case when a.kondisi_id = 1 then 1 else 0 end) as dt_baik,
    sum(case when a.kondisi_id = 2 then 1 else 0 end) as dt_kurangbaik,
    sum(case when a.kondisi_id = 3 then 1 else 0 end) as dt_rusakringan,
    sum(case when a.kondisi_id = 4 then 1 else 0 end) as dt_rusakberat
    FROM
    masjid__content as a,
    address__provinsi as b
    WHERE
    a.provinsi_id != 0 and a.provinsi_id = b.provinsi_id
    GROUP BY
    b.provinsi_id
    ORDER BY
    b.provinsi_kode asc
    ");
  return $query->result();
}

function tampil_kondisimasjid_prop($kndsmprop)
{
  $query = $this->db_database10->query("
    SELECT
    b.kabupaten_id,
    b.kabupaten_name,
    sum(case when a.kondisi_id = 1 then 1 else 0 end) as dt_baik,
    sum(case when a.kondisi_id = 2 then 1 else 0 end) as dt_kurangbaik,
    sum(case when a.kondisi_id = 3 then 1 else 0 end) as dt_rusakringan,
    sum(case when a.kondisi_id = 4 then 1 else 0 end) as dt_rusakberat
    FROM
    masjid__content as a,
    address__kabupaten as b
    WHERE
    a.kabupaten_id != 0 and a.kabupaten_id = b.kabupaten_id and a.provinsi_id = $kndsmprop
    GROUP BY
    b.kabupaten_id
    ORDER BY
    b.kabupaten_kode asc
    ");
  return $query->result();
}

function tampil_kondisimasjid_kab($kndsmkab)
{
  $query = $this->db_database10->query("
    SELECT
    b.kecamatan_id,
    b.kecamatan_name,
    sum(case when a.kondisi_id = 1 then 1 else 0 end) as dt_baik,
    sum(case when a.kondisi_id = 2 then 1 else 0 end) as dt_kurangbaik,
    sum(case when a.kondisi_id = 3 then 1 else 0 end) as dt_rusakringan,
    sum(case when a.kondisi_id = 4 then 1 else 0 end) as dt_rusakberat
    FROM
    masjid__content as a,
    address__kecamatan as b
    WHERE
    a.kecamatan_id != 0 and a.kecamatan_id = b.kecamatan_id and a.kabupaten_id = $kndsmkab
    GROUP BY
    b.kecamatan_id
    ORDER BY
    b.kecamatan_kode asc
    ");
  return $query->result();
}

function tampil_kondisimushalla()
{
  $query = $this->db_database10->query("
    SELECT
    b.provinsi_id,
    b.provinsi_name,
    sum(case when a.kondisi_id = 1 then 1 else 0 end) as dt_baik,
    sum(case when a.kondisi_id = 2 then 1 else 0 end) as dt_kurangbaik,
    sum(case when a.kondisi_id = 3 then 1 else 0 end) as dt_rusakringan,
    sum(case when a.kondisi_id = 4 then 1 else 0 end) as dt_rusakberat
    FROM
    mushalla__content as a,
    address__provinsi as b
    WHERE
    a.provinsi_id != 0 and a.provinsi_id = b.provinsi_id
    GROUP BY
    b.provinsi_id
    ORDER BY
    b.provinsi_kode asc
    ");
  return $query->result();
}

function tampil_kondisimushalla_prop($musprop)
{
  $query = $this->db_database10->query("
    SELECT
    b.kabupaten_id,
    b.kabupaten_name,
    sum(case when a.kondisi_id = 1 then 1 else 0 end) as dt_baik,
    sum(case when a.kondisi_id = 2 then 1 else 0 end) as dt_kurangbaik,
    sum(case when a.kondisi_id = 3 then 1 else 0 end) as dt_rusakringan,
    sum(case when a.kondisi_id = 4 then 1 else 0 end) as dt_rusakberat
    FROM
    mushalla__content as a,
    address__kabupaten as b
    WHERE
    a.kabupaten_id != 0 and a.kabupaten_id = b.kabupaten_id and a.provinsi_id = $musprop
    GROUP BY
    b.kabupaten_id
    ORDER BY
    b.kabupaten_kode asc
    ");
  return $query->result();
}

function tampil_kondisimushalla_kab($muskab)
{
  $query = $this->db_database10->query("
    SELECT
    b.kecamatan_id,
    b.kecamatan_name,
    sum(case when a.kondisi_id = 1 then 1 else 0 end) as dt_baik,
    sum(case when a.kondisi_id = 2 then 1 else 0 end) as dt_kurangbaik,
    sum(case when a.kondisi_id = 3 then 1 else 0 end) as dt_rusakringan,
    sum(case when a.kondisi_id = 4 then 1 else 0 end) as dt_rusakberat
    FROM
    mushalla__content as a,
    address__kecamatan as b
    WHERE
    a.kecamatan_id != 0 and a.kecamatan_id = b.kecamatan_id and a.kabupaten_id = $muskab
    GROUP BY
    b.kecamatan_id
    ORDER BY
    b.kecamatan_kode asc
    ");
  return $query->result();
}

function tampil_fahammasjid()
{
  $query = $this->db_database10->query("
    SELECT
    b.provinsi_id,
    b.provinsi_name,
    sum(case when a.faham_id = 1 then 1 else 0 end) as dt_sunni,
    sum(case when a.faham_id = 2 then 1 else 0 end) as dt_syiah,
    sum(case when a.faham_id = 3 then 1 else 0 end) as dt_ahmadiyah,
    sum(case when a.faham_id = 4 then 1 else 0 end) as dt_gafatar
    FROM
    masjid__content as a,
    address__provinsi as b
    WHERE
    a.provinsi_id != 0 and a.provinsi_id = b.provinsi_id
    GROUP BY
    b.provinsi_id
    ORDER BY
    b.provinsi_kode asc
    ");
  return $query->result();
}

function tampil_fahammasjid_prop($fahprop)
{
  $query = $this->db_database10->query("
    SELECT
    b.kabupaten_id,
    b.kabupaten_name,
    sum(case when a.faham_id = 1 then 1 else 0 end) as dt_sunni,
    sum(case when a.faham_id = 2 then 1 else 0 end) as dt_syiah,
    sum(case when a.faham_id = 3 then 1 else 0 end) as dt_ahmadiyah,
    sum(case when a.faham_id = 4 then 1 else 0 end) as dt_gafatar
    FROM
    masjid__content as a,
    address__kabupaten as b
    WHERE
    a.kabupaten_id != 0 and a.kabupaten_id = b.kabupaten_id and a.provinsi_id = $fahprop
    GROUP BY
    b.kabupaten_id
    ORDER BY
    b.kabupaten_kode asc
    ");
  return $query->result();
}

function tampil_fahammasjid_kab($fahkab)
{
  $query = $this->db_database10->query("
    SELECT
    b.kecamatan_id,
    b.kecamatan_name,
    sum(case when a.faham_id = 1 then 1 else 0 end) as dt_sunni,
    sum(case when a.faham_id = 2 then 1 else 0 end) as dt_syiah,
    sum(case when a.faham_id = 3 then 1 else 0 end) as dt_ahmadiyah,
    sum(case when a.faham_id = 4 then 1 else 0 end) as dt_gafatar
    FROM
    masjid__content as a,
    address__kecamatan as b
    WHERE
    a.kecamatan_id != 0 and a.kecamatan_id = b.kecamatan_id and a.kabupaten_id = $fahkab
    GROUP BY
    b.kecamatan_id
    ORDER BY
    b.kecamatan_kode asc
    ");
  return $query->result();
}

function tampil_fahammushalla()
{
  $query = $this->db_database10->query("
    SELECT
    b.provinsi_id,
    b.provinsi_name,
    sum(case when a.faham_id = 1 then 1 else 0 end) as dt_sunni,
    sum(case when a.faham_id = 2 then 1 else 0 end) as dt_syiah,
    sum(case when a.faham_id = 3 then 1 else 0 end) as dt_ahmadiyah,
    sum(case when a.faham_id = 4 then 1 else 0 end) as dt_gafatar
    FROM
    mushalla__content as a,
    address__provinsi as b
    WHERE
    a.provinsi_id != 0 and a.provinsi_id = b.provinsi_id
    GROUP BY
    b.provinsi_id
    ORDER BY
    b.provinsi_kode asc
    ");
  return $query->result();
}

function tampil_fahammushalla_prop($fmprop)
{
  $query = $this->db_database10->query("
    SELECT
    b.kabupaten_id,
    b.kabupaten_name,
    sum(case when a.faham_id = 1 then 1 else 0 end) as dt_sunni,
    sum(case when a.faham_id = 2 then 1 else 0 end) as dt_syiah,
    sum(case when a.faham_id = 3 then 1 else 0 end) as dt_ahmadiyah,
    sum(case when a.faham_id = 4 then 1 else 0 end) as dt_gafatar
    FROM
    mushalla__content as a,
    address__kabupaten as b
    WHERE
    a.kabupaten_id != 0 and a.kabupaten_id = b.kabupaten_id and a.provinsi_id = $fmprop
    GROUP BY
    b.kabupaten_id
    ORDER BY
    b.kabupaten_kode asc
    ");
  return $query->result();
}

function tampil_fahammushalla_kab($fmkab)
{
  $query = $this->db_database10->query("
    SELECT
    b.kecamatan_id,
    b.kecamatan_name,
    sum(case when a.faham_id = 1 then 1 else 0 end) as dt_sunni,
    sum(case when a.faham_id = 2 then 1 else 0 end) as dt_syiah,
    sum(case when a.faham_id = 3 then 1 else 0 end) as dt_ahmadiyah,
    sum(case when a.faham_id = 4 then 1 else 0 end) as dt_gafatar
    FROM
    mushalla__content as a,
    address__kecamatan as b
    WHERE
    a.kecamatan_id != 0 and a.kecamatan_id = b.kecamatan_id and a.kabupaten_id = $fmkab
    GROUP BY
    b.kecamatan_id
    ORDER BY
    b.kecamatan_kode asc
    ");
  return $query->result();
}

function tampil_orgasmasjid()
{
  $query = $this->db_database10->query("
    SELECT
    b.provinsi_id,
    b.provinsi_name,
    sum(case when a.afiliasi_id = 1 then 1 else 0 end) as dt_nu,
    sum(case when a.afiliasi_id = 2 then 1 else 0 end) as dt_muhammadiyah,
    sum(case when a.afiliasi_id = 3 then 1 else 0 end) as dt_persis,
    sum(case when a.afiliasi_id = 4 then 1 else 0 end) as dt_nahdlatul_wathan,
    sum(case when a.afiliasi_id = 5 then 1 else 0 end) as dt_al_washliyah,
    sum(case when a.afiliasi_id = 6 then 1 else 0 end) as dt_al_ittihadiyah,
    sum(case when a.afiliasi_id = 7 then 1 else 0 end) as dt_al_irsyad_al_islamiyyah,
    sum(case when a.afiliasi_id = 8 then 1 else 0 end) as dt_mathlaul_anwar,
    sum(case when a.afiliasi_id = 9 then 1 else 0 end) as dt_persatuan_islam_tionghoa_indonesia,
    sum(case when a.afiliasi_id = 10 then 1 else 0 end) as dt_persatuan_tarbiyah_islamiyah,
    sum(case when a.afiliasi_id = 11 then 1 else 0 end) as dt_ldii,
    sum(case when a.afiliasi_id = 12 then 1 else 0 end) as dt_hti,
    sum(case when a.afiliasi_id = 13 then 1 else 0 end) as dt_fpi
    FROM
    masjid__content as a,
    address__provinsi as b
    WHERE
    a.provinsi_id != 0 and a.provinsi_id = b.provinsi_id and a.afiliasi_id != 0
    GROUP BY
    a.provinsi_id
    ORDER BY
    b.provinsi_kode asc
    ");
  return $query->result();
}

function tampil_orgasmasjid_prop($omprop)
{
  $query = $this->db_database10->query("
    SELECT
    b.kabupaten_id,
    b.kabupaten_name,
    sum(case when a.afiliasi_id = 1 then 1 else 0 end) as dt_nu,
    sum(case when a.afiliasi_id = 2 then 1 else 0 end) as dt_muhammadiyah,
    sum(case when a.afiliasi_id = 3 then 1 else 0 end) as dt_persis,
    sum(case when a.afiliasi_id = 4 then 1 else 0 end) as dt_nahdlatul_wathan,
    sum(case when a.afiliasi_id = 5 then 1 else 0 end) as dt_al_washliyah,
    sum(case when a.afiliasi_id = 6 then 1 else 0 end) as dt_al_ittihadiyah,
    sum(case when a.afiliasi_id = 7 then 1 else 0 end) as dt_al_irsyad_al_islamiyyah,
    sum(case when a.afiliasi_id = 8 then 1 else 0 end) as dt_mathlaul_anwar,
    sum(case when a.afiliasi_id = 9 then 1 else 0 end) as dt_persatuan_islam_tionghoa_indonesia,
    sum(case when a.afiliasi_id = 10 then 1 else 0 end) as dt_persatuan_tarbiyah_islamiyah,
    sum(case when a.afiliasi_id = 11 then 1 else 0 end) as dt_ldii,
    sum(case when a.afiliasi_id = 12 then 1 else 0 end) as dt_hti,
    sum(case when a.afiliasi_id = 13 then 1 else 0 end) as dt_fpi
    FROM
    masjid__content as a,
    address__kabupaten as b
    WHERE
    a.kabupaten_id != 0 and a.kabupaten_id = b.kabupaten_id and a.afiliasi_id != 0 and a.provinsi_id = $omprop
    GROUP BY
    a.kabupaten_id
    ORDER BY
    b.kabupaten_kode asc
    ");
  return $query->result();
}

function tampil_orgasmasjid_kab($omkab)
{
  $query = $this->db_database10->query("
    SELECT
    b.kecamatan_id,
    b.kecamatan_name,
    sum(case when a.afiliasi_id = 1 then 1 else 0 end) as dt_nu,
    sum(case when a.afiliasi_id = 2 then 1 else 0 end) as dt_muhammadiyah,
    sum(case when a.afiliasi_id = 3 then 1 else 0 end) as dt_persis,
    sum(case when a.afiliasi_id = 4 then 1 else 0 end) as dt_nahdlatul_wathan,
    sum(case when a.afiliasi_id = 5 then 1 else 0 end) as dt_al_washliyah,
    sum(case when a.afiliasi_id = 6 then 1 else 0 end) as dt_al_ittihadiyah,
    sum(case when a.afiliasi_id = 7 then 1 else 0 end) as dt_al_irsyad_al_islamiyyah,
    sum(case when a.afiliasi_id = 8 then 1 else 0 end) as dt_mathlaul_anwar,
    sum(case when a.afiliasi_id = 9 then 1 else 0 end) as dt_persatuan_islam_tionghoa_indonesia,
    sum(case when a.afiliasi_id = 10 then 1 else 0 end) as dt_persatuan_tarbiyah_islamiyah,
    sum(case when a.afiliasi_id = 11 then 1 else 0 end) as dt_ldii,
    sum(case when a.afiliasi_id = 12 then 1 else 0 end) as dt_hti,
    sum(case when a.afiliasi_id = 13 then 1 else 0 end) as dt_fpi
    FROM
    masjid__content as a,
    address__kecamatan as b
    WHERE
    a.kecamatan_id != 0 and a.kecamatan_id = b.kecamatan_id and a.afiliasi_id != 0 and a.kabupaten_id = $omkab
    GROUP BY
    a.kecamatan_id
    ORDER BY
    b.kecamatan_kode asc
    ");
  return $query->result();
}

function tampil_orgasmushalla()
{
  $query = $this->db_database10->query("
    SELECT
    b.provinsi_id,
    b.provinsi_name,
    sum(case when a.afiliasi_id = 1 then 1 else 0 end) as dt_nu,
    sum(case when a.afiliasi_id = 2 then 1 else 0 end) as dt_muhammadiyah,
    sum(case when a.afiliasi_id = 3 then 1 else 0 end) as dt_persis,
    sum(case when a.afiliasi_id = 4 then 1 else 0 end) as dt_nahdlatul_wathan,
    sum(case when a.afiliasi_id = 5 then 1 else 0 end) as dt_al_washliyah,
    sum(case when a.afiliasi_id = 6 then 1 else 0 end) as dt_al_ittihadiyah,
    sum(case when a.afiliasi_id = 7 then 1 else 0 end) as dt_al_irsyad_al_islamiyyah,
    sum(case when a.afiliasi_id = 8 then 1 else 0 end) as dt_mathlaul_anwar,
    sum(case when a.afiliasi_id = 9 then 1 else 0 end) as dt_persatuan_islam_tionghoa_indonesia,
    sum(case when a.afiliasi_id = 10 then 1 else 0 end) as dt_persatuan_tarbiyah_islamiyah,
    sum(case when a.afiliasi_id = 11 then 1 else 0 end) as dt_ldii,
    sum(case when a.afiliasi_id = 12 then 1 else 0 end) as dt_hti,
    sum(case when a.afiliasi_id = 13 then 1 else 0 end) as dt_fpi
    FROM
    mushalla__content as a,
    address__provinsi as b
    WHERE
    a.provinsi_id != 0 and a.provinsi_id = b.provinsi_id and a.afiliasi_id != 0
    GROUP BY
    a.provinsi_id
    ORDER BY
    b.provinsi_kode asc
    ");
  return $query->result();
}

function tampil_orgasmushalla_prop($omsprop)
{
  $query = $this->db_database10->query("
    SELECT
    b.kabupaten_id,
    b.kabupaten_name,
    sum(case when a.afiliasi_id = 1 then 1 else 0 end) as dt_nu,
    sum(case when a.afiliasi_id = 2 then 1 else 0 end) as dt_muhammadiyah,
    sum(case when a.afiliasi_id = 3 then 1 else 0 end) as dt_persis,
    sum(case when a.afiliasi_id = 4 then 1 else 0 end) as dt_nahdlatul_wathan,
    sum(case when a.afiliasi_id = 5 then 1 else 0 end) as dt_al_washliyah,
    sum(case when a.afiliasi_id = 6 then 1 else 0 end) as dt_al_ittihadiyah,
    sum(case when a.afiliasi_id = 7 then 1 else 0 end) as dt_al_irsyad_al_islamiyyah,
    sum(case when a.afiliasi_id = 8 then 1 else 0 end) as dt_mathlaul_anwar,
    sum(case when a.afiliasi_id = 9 then 1 else 0 end) as dt_persatuan_islam_tionghoa_indonesia,
    sum(case when a.afiliasi_id = 10 then 1 else 0 end) as dt_persatuan_tarbiyah_islamiyah,
    sum(case when a.afiliasi_id = 11 then 1 else 0 end) as dt_ldii,
    sum(case when a.afiliasi_id = 12 then 1 else 0 end) as dt_hti,
    sum(case when a.afiliasi_id = 13 then 1 else 0 end) as dt_fpi
    FROM
    mushalla__content as a,
    address__kabupaten as b
    WHERE
    a.kabupaten_id != 0 and a.kabupaten_id = b.kabupaten_id and a.afiliasi_id != 0 and a.provinsi_id = $omsprop
    GROUP BY
    a.kabupaten_id
    ORDER BY
    b.kabupaten_kode asc
    ");
  return $query->result();
}

function tampil_orgasmushalla_kab($omskab)
{
  $query = $this->db_database10->query("
    SELECT
    b.kecamatan_id,
    b.kecamatan_name,
    sum(case when a.afiliasi_id = 1 then 1 else 0 end) as dt_nu,
    sum(case when a.afiliasi_id = 2 then 1 else 0 end) as dt_muhammadiyah,
    sum(case when a.afiliasi_id = 3 then 1 else 0 end) as dt_persis,
    sum(case when a.afiliasi_id = 4 then 1 else 0 end) as dt_nahdlatul_wathan,
    sum(case when a.afiliasi_id = 5 then 1 else 0 end) as dt_al_washliyah,
    sum(case when a.afiliasi_id = 6 then 1 else 0 end) as dt_al_ittihadiyah,
    sum(case when a.afiliasi_id = 7 then 1 else 0 end) as dt_al_irsyad_al_islamiyyah,
    sum(case when a.afiliasi_id = 8 then 1 else 0 end) as dt_mathlaul_anwar,
    sum(case when a.afiliasi_id = 9 then 1 else 0 end) as dt_persatuan_islam_tionghoa_indonesia,
    sum(case when a.afiliasi_id = 10 then 1 else 0 end) as dt_persatuan_tarbiyah_islamiyah,
    sum(case when a.afiliasi_id = 11 then 1 else 0 end) as dt_ldii,
    sum(case when a.afiliasi_id = 12 then 1 else 0 end) as dt_hti,
    sum(case when a.afiliasi_id = 13 then 1 else 0 end) as dt_fpi
    FROM
    mushalla__content as a,
    address__kecamatan as b
    WHERE
    a.kecamatan_id != 0 and a.kecamatan_id = b.kecamatan_id and a.afiliasi_id != 0 and a.kabupaten_id = $omskab
    GROUP BY
    a.kecamatan_id
    ORDER BY
    b.kecamatan_kode asc
    ");
  return $query->result();
}

   // function get_kecmas($id = null)
   // {
   //    if($id === null){
   //      $this->setGroup;
   //      $query = $this->db_database10->query("
        // SELECT
        //   address__kabupaten.kabupaten_id,
        //   address__kabupaten.kabupaten_name,
        //   SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 1 THEN 1 ELSE 0 END ) AS masjid_negara,
        //   SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 2 THEN 1 ELSE 0 END ) AS masjid_raya,
        //   SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 3 THEN 1 ELSE 0 END ) AS masjid_agung,
        //   SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 4 THEN 1 ELSE 0 END ) AS masjid_besar,
        //   SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 5 THEN 1 ELSE 0 END ) AS masjid_jami,
        //   SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 6 THEN 1 ELSE 0 END ) AS masjid_bersejarah,
        //   SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 7 THEN 1 ELSE 0 END ) AS mushalla_publik,
        //   SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 8 THEN 1 ELSE 0 END ) AS masjid_nasional,
        //   COUNT( masjid__content.masjid_id ) AS jumlah_masjid 
        // FROM
        //   masjid__content
        //   INNER JOIN masjid__content_tipologi ON masjid__content.masjid_id = masjid__content_tipologi.masjid_id
        //   INNER JOIN masjid__tipologi ON masjid__content_tipologi.tipologi_id = masjid__tipologi.tipologi_id
        //   LEFT JOIN address__kabupaten ON masjid__content.kabupaten_id = address__kabupaten.kabupaten_id 
        // GROUP BY
        //   address__kabupaten.kabupaten_id 
        // ORDER BY
        //   address__kabupaten.kabupaten_id
   //      ");
   //    return $query->result();
   //    }else{
   //      $query = $this->db_database10->query("
   //      SELECT
   //        address__kecamatan.kecamatan_id,
   //        address__kecamatan.kecamatan_name,
   //        SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 1 THEN 1 ELSE 0 END ) AS masjid_negara,
   //        SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 2 THEN 1 ELSE 0 END ) AS masjid_raya,
   //        SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 3 THEN 1 ELSE 0 END ) AS masjid_agung,
   //        SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 4 THEN 1 ELSE 0 END ) AS masjid_besar,
   //        SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 5 THEN 1 ELSE 0 END ) AS masjid_jami,
   //        SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 6 THEN 1 ELSE 0 END ) AS masjid_bersejarah,
   //        SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 7 THEN 1 ELSE 0 END ) AS mushalla_publik,
   //        SUM( CASE WHEN masjid__content_tipologi.tipologi_id = 8 THEN 1 ELSE 0 END ) AS masjid_nasional,
   //        COUNT( masjid__content.masjid_id ) AS jumlah_masjid 
   //      FROM
   //        masjid__content
   //        INNER JOIN masjid__content_tipologi ON masjid__content.masjid_id = masjid__content_tipologi.masjid_id
   //        INNER JOIN masjid__tipologi ON masjid__content_tipologi.tipologi_id = masjid__tipologi.tipologi_id
   //        LEFT JOIN address__kecamatan ON masjid__content_tipologi.kecamatan_id = address__kecamatan.kecamatan_id
   //      WHERE
   //        masjid__content.kabupaten_id = 1
   //      GROUP BY
   //        masjid__content.kecamatan_id 
   //      ORDER BY
   //        masjid__content.kecamatan_id
   //      ");
   //    return $query->result();
   //    }
   // }


}

/* End of file Simas_m.php */
/* Location: ./application/modules/docs/models/Simas_m.php */