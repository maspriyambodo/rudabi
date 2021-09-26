<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpenghulu_m extends CI_Model
{
  function __construct(){
    parent::__construct();
    $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
  }

    //fungsi cek session
  function logged_id()
  {
    return $this->session->userdata('user_id');
  }

  // Menghitung total query rudabi ------------------------------------------------------------

  function get_total_datakua()
  {
    $query = $this->db_database2->query("
      SELECT
      count(b.kua_id) as data_kua
      FROM
      iapi_province as a,
      master_kua as b
      WHERE
      -- join
      a.province_id = b.kua_province_id
      -- kondisi
      and b.is_trash != 1
      ");
    return $query->row();
  }

  function get_total_datapenghulu()
  {
    $query = $this->db_database2->query("
      SELECT
      sum(case when b.pegawai_id and b.pegawai_status = 1 then 1 else 0 end) as data_penghulu
      FROM
      iapi_pegawai as b,
      iapi_province as a
      WHERE
      b.is_trash != 1 and a.province_id = b.pegawai_province and b.pegawai_province != 0
      ");
    return $query->row();
  }

  function get_data_peristiwanikah()
  {
    $query = $this->db_database2->query("
      SELECT
      count(b.nikah_id) as data_peristiwa_nikah
      FROM
      iapi_province as a,
      master_nikah as b
      WHERE
      -- join
      a.province_id = b.nikah_province_id
      -- kondisi
      and b.nikah_province_id != 0 and b.nikah_city_id != 0 and b.nikah_kua_id != 0
      ");
    return $query->row();
  }

  function get_datanikahrujuk()
  {
    $query = $this->db_database2->query("
      SELECT
      sum(b.rekap_wali_nasab) + sum(b.rekap_wali_hakim) as data_nikah_rujuk
      FROM
      iapi_province as a,
      master_rekap_nikah as b
      WHERE
      a.province_id = b.rekap_province
      ");
    return $query->row();
  }

  // Menghitung total query rudabi ------------------------------------------------------------

    //fungsi check login
  function check_login($table, $field1, $field2)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($field1);
    $this->db->where($field2);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }

  function get_penghulu()
  {
    $query = $this->db_database2->query("
      SELECT
      b.pegawai_province,
      a.province_title,
      sum(case when b.pegawai_id and b.pegawai_status = 1 then 1 else 0 end) as dt_penghulu,
      sum(case when b.pegawai_pendidikan_terakhir = 'S1' and b.pegawai_status = 1 then 1 else 0 end) as pddk_s1,
      sum(case when b.pegawai_pendidikan_terakhir = 'S2' and b.pegawai_status = 1 then 1 else 0 end) as pddk_s2,
      sum(case when b.pegawai_pendidikan_terakhir = 'S3' and b.pegawai_status = 1 then 1 else 0 end) as pddk_s3,
      sum(case when b.pegawai_kategory_penghulu = 3 and b.pegawai_status = 1 then 1 else 0 end) as dt_pertama,
      sum(case when b.pegawai_kategory_penghulu = 2 and b.pegawai_status = 1 then 1 else 0 end) as dt_madya,
      sum(case when b.pegawai_kategory_penghulu = 1 and b.pegawai_status = 1 then 1 else 0 end) as dt_muda,
      sum(case when b.pegawai_pangkat = 'I/a'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_1a,
      sum(case when b.pegawai_pangkat = 'I/b'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_1b,
      sum(case when b.pegawai_pangkat = 'I/c'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_1c,
      sum(case when b.pegawai_pangkat = 'I/d'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_1d,
      sum(case when b.pegawai_pangkat = 'II/a'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_2a,
      sum(case when b.pegawai_pangkat = 'II/b'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_2b,
      sum(case when b.pegawai_pangkat = 'II/c'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_2c,
      sum(case when b.pegawai_pangkat = 'II/d'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_2d,
      sum(case when b.pegawai_pangkat = 'III/a'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_3a,
      sum(case when b.pegawai_pangkat = 'III/b'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_3b,
      sum(case when b.pegawai_pangkat = 'III/c'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_3c,
      sum(case when b.pegawai_pangkat = 'III/d'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_3d,
      sum(case when b.pegawai_pangkat = 'IV/a'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_4a,
      sum(case when b.pegawai_pangkat = 'IV/b'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_4b,
      sum(case when b.pegawai_pangkat = 'IV/c'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_4c,
      sum(case when b.pegawai_pangkat = 'IV/d'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_4d,
      sum(case when b.pegawai_pangkat = 'IV/e'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_4e
      FROM
      iapi_pegawai as b,
      iapi_province as a
      WHERE
      b.is_trash != 1 and a.province_id = b.pegawai_province and b.pegawai_province != 0
      GROUP BY
      a.province_id
      ");
    return $query->result(); 
  }

  function get_penghulu_props($props)
  {
    $query = $this->db_database2->query("
      SELECT
      b.pegawai_city,
      a.city_title,
      sum(case when b.pegawai_id and b.pegawai_status = 1 then 1 else 0 end) as dt_penghulu,
      sum(case when b.pegawai_pendidikan_terakhir = 'S1' and b.pegawai_status = 1 then 1 else 0 end) as pddk_s1,
      sum(case when b.pegawai_pendidikan_terakhir = 'S2' and b.pegawai_status = 1 then 1 else 0 end) as pddk_s2,
      sum(case when b.pegawai_pendidikan_terakhir = 'S3' and b.pegawai_status = 1 then 1 else 0 end) as pddk_s3,
      sum(case when b.pegawai_kategory_penghulu = 3 and b.pegawai_status = 1 then 1 else 0 end) as dt_pertama,
      sum(case when b.pegawai_kategory_penghulu = 2 and b.pegawai_status = 1 then 1 else 0 end) as dt_madya,
      sum(case when b.pegawai_kategory_penghulu = 1 and b.pegawai_status = 1 then 1 else 0 end) as dt_muda,
      sum(case when b.pegawai_pangkat = 'I/a'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_1a,
      sum(case when b.pegawai_pangkat = 'I/b'and b.pegawai_status = 1 then 1 else 0 end) as pgt_1b,
      sum(case when b.pegawai_pangkat = 'I/c'and b.pegawai_status = 1 then 1 else 0 end) as pgk_1c,
      sum(case when b.pegawai_pangkat = 'I/d'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_1d,
      sum(case when b.pegawai_pangkat = 'II/a'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_2a,
      sum(case when b.pegawai_pangkat = 'II/b'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_2b,
      sum(case when b.pegawai_pangkat = 'II/c'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_2c,
      sum(case when b.pegawai_pangkat = 'II/d'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_2d,
      sum(case when b.pegawai_pangkat = 'III/a'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_3a,
      sum(case when b.pegawai_pangkat = 'III/b'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_3b,
      sum(case when b.pegawai_pangkat = 'III/c'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_3c,
      sum(case when b.pegawai_pangkat = 'III/d'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_3d,
      sum(case when b.pegawai_pangkat = 'IV/a'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_4a,
      sum(case when b.pegawai_pangkat = 'IV/b'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_4b,
      sum(case when b.pegawai_pangkat = 'IV/c'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_4c,
      sum(case when b.pegawai_pangkat = 'IV/d'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_4d,
      sum(case when b.pegawai_pangkat = 'IV/e'and b.pegawai_status = 1 then 1 else 0 end) as pgkt_4e
      FROM
      iapi_pegawai as b,
      iapi_city as a
      WHERE
      -- join
      a.city_id = b.pegawai_city
      -- kondisi
      and b.is_trash != 1 and b.pegawai_province = $props and b.pegawai_province != 0
      GROUP BY
      a.city_id
      ");
    return $query->result(); 
  }

  function get_penghulu_kabs($kabs)
  {
    $query = $this->db_database2->query("
      SELECT
      a.pegawai_nip,
      a.pegawai_fullname,
      a.pegawai_tanggallahir,
      a.pegawai_tempatlahir,
      if(a.pegawai_jenkel = 1, 'Laki-Laki', 'Noket') as kelamin,
      a.pegawai_pendidikan_terakhir as pendidikan,
      a.pegawai_unit_kerja,
      b.kua_title,
      a.pegawai_pangkat,
      a.pegawai_sk_penghulu,
      a.pegawai_tgl_sk_penghulu,
      case
      when a.pegawai_kategory_penghulu = 1 then 'Ahli muda'
      when a.pegawai_kategory_penghulu = 2 then 'Ahli madya'
      when a.pegawai_kategory_penghulu = 3 then 'Ahli pertama'
      end as kategori,
      a.pegawai_jml_angka_kredit
      FROM
      iapi_pegawai as a
      join master_kua as b on a.pegawai_kua = b.kua_id
      WHERE
      a.pegawai_city = $kabs and a.is_trash != 1 and a.pegawai_status = 1
      GROUP BY
      a.pegawai_id
      ");
    return $query->result(); 
  }

  // function ambilkua()
  // {
  //   $query2 = $this->db_database2->query("
  //     SELECT
  //     a.province_id,
  //     a.province_title,
  //     count(b.kua_id) as jum
  //     FROM
  //     iapi_province as a
  //     LEFT JOIN master_kua as b on a.province_id = b.kua_province_id
  //     GROUP BY
  //     a.province_id
  //     ");
  //   return $query2->result();
  // }

  // function ambilkua_id()
  // {
  //   $query2 = $this->db_database2->query("");
  //   return $query2->result();
  // }

  // function getKua($id = null)
  // {
  //   if($id === null){
  //     $this->setGroup;
  //     $this->db_database2->select('province_id, province_title, COUNT(kua_id) as jumlah_kua');
  //     $this->db_database2->from('iapi_province');
  //     $this->db_database2->join('master_kua', 'master_kua.kua_province_id = iapi_province.province_id');
  //     $this->db_database2->group_by('province_id');
  //     return $this->db_database2->get()->result_array();

  //   }else{
  //     $this->setGroup;
  //     $query = $this->db_database2
  //     ->select('city_id, city_title, COUNT(kua_id) as jumlah_kua')
  //     ->select('(select COUNT(iapi_pegawai.pegawai_id) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1) as jumlah_penghulu')

  //     ->select('(select COUNT(iapi_pegawai.pegawai_kategory_penghulu) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND pegawai_kategory_penghulu = 1 AND is_trash != 1) as jumlah_muda')

  //     ->select('(select COUNT(iapi_pegawai.pegawai_kategory_penghulu) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND pegawai_kategory_penghulu = 2 AND is_trash != 1) as jumlah_madya')

  //     ->select('(select COUNT(iapi_pegawai.pegawai_kategory_penghulu) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND pegawai_kategory_penghulu = 3 AND is_trash != 1) as jumlah_pratama')

  //     ->select('(select COUNT(iapi_pegawai.pegawai_kategory_penghulu) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND pegawai_kategory_penghulu = 4 AND is_trash != 1) as jumlah_utama')

  //     ->select("(select COUNT(iapi_pegawai.pegawai_pangkat) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pangkat = 'III/a') as jumlah_IIIa")

  //     ->select("(select COUNT(iapi_pegawai.pegawai_pangkat) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pangkat = 'III/b') as jumlah_IIIb")

  //     ->select("(select COUNT(iapi_pegawai.pegawai_pangkat) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pangkat = 'III/c') as jumlah_IIIc")

  //     ->select("(select COUNT(iapi_pegawai.pegawai_pangkat) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pangkat = 'III/d') as jumlah_IIId")

  //     ->select("(select COUNT(iapi_pegawai.pegawai_pangkat) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pangkat = 'IV/a') as jumlah_IVa")

  //     ->select("(select COUNT(iapi_pegawai.pegawai_pangkat) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pangkat = 'IV/b') as jumlah_IVb")

  //     ->select("(select COUNT(iapi_pegawai.pegawai_pangkat) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pangkat = 'IV/c') as jumlah_IVc")

  //     ->select("(select COUNT(iapi_pegawai.pegawai_pangkat) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pangkat = 'IV/d') as jumlah_IVd")

  //     ->select("(select COUNT(iapi_pegawai.pegawai_pangkat) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pangkat = 'IV/e') as jumlah_IVe")

  //     ->select("(select COUNT(iapi_pegawai.pegawai_pendidikan_terakhir) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pendidikan_terakhir = 'S1') as jumlah_S1")

  //     ->select("(select COUNT(iapi_pegawai.pegawai_pendidikan_terakhir) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pendidikan_terakhir = 'S2') as jumlah_S2")

  //     ->select("(select COUNT(iapi_pegawai.pegawai_pendidikan_terakhir) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pendidikan_terakhir = 'S3') as jumlah_S3")


  //     ->from('master_kua, iapi_city, iapi_province')
  //     // ->join('iapi_city', 'iapi_city.city_id = master_kua.kua_city_id')
  //     // ->join('iapi_province', 'iapi_province.province_id = master_kua.kua_province_id')
  //     ->where('province_id', $id)
  //     ->where('iapi_city.city_id = master_kua.kua_city_id')
  //     ->where('iapi_province.province_id = master_kua.kua_province_id')
  //     ->group_by('city_id')
  //     ->get()
  //     ->result_array();

  //       //$this->db_database2->where('province_id', $id);
  //     return $query;
  //   }
  // }

  function tampil_prov()
  {
    $query = $this->db_database2->query("
      SELECT
      b.pegawai_province as city_province,
      a.province_title,
      sum(case when b.pegawai_id and b.pegawai_status = 1 then 1 else 0 end) as dt_penghulu,
      sum(case when b.pegawai_pendidikan_terakhir = 'SMA' and b.pegawai_status = 1 then 1 else 0 end) as dt_sma,
      sum(case when b.pegawai_pendidikan_terakhir = 'S1' and b.pegawai_status = 1 then 1 else 0 end) as dt_s1,
      sum(case when b.pegawai_pendidikan_terakhir = 'S2' and b.pegawai_status = 1 then 1 else 0 end) as dt_s2,
      sum(case when b.pegawai_pendidikan_terakhir = 'S3' and b.pegawai_status = 1 then 1 else 0 end) as dt_s3,
      sum(case when b.pegawai_kategory_penghulu = 3 and b.pegawai_status = 1 then 1 else 0 end) as dt_pertama,
      sum(case when b.pegawai_kategory_penghulu = 2 and b.pegawai_status = 1 then 1 else 0 end) as dt_madya,
      sum(case when b.pegawai_kategory_penghulu = 1 and b.pegawai_status = 1 then 1 else 0 end) as dt_muda,
      sum(case when b.pegawai_pangkat = 'I/a'and b.pegawai_status = 1 then 1 else 0 end) as dt_1a,
      sum(case when b.pegawai_pangkat = 'I/b'and b.pegawai_status = 1 then 1 else 0 end) as dt_1b,
      sum(case when b.pegawai_pangkat = 'I/c'and b.pegawai_status = 1 then 1 else 0 end) as dt_1c,
      sum(case when b.pegawai_pangkat = 'I/d'and b.pegawai_status = 1 then 1 else 0 end) as dt_1d,
      sum(case when b.pegawai_pangkat = 'II/a'and b.pegawai_status = 1 then 1 else 0 end) as dt_2a,
      sum(case when b.pegawai_pangkat = 'II/b'and b.pegawai_status = 1 then 1 else 0 end) as dt_2b,
      sum(case when b.pegawai_pangkat = 'II/c'and b.pegawai_status = 1 then 1 else 0 end) as dt_2c,
      sum(case when b.pegawai_pangkat = 'II/d'and b.pegawai_status = 1 then 1 else 0 end) as dt_2d,
      sum(case when b.pegawai_pangkat = 'III/a'and b.pegawai_status = 1 then 1 else 0 end) as dt_3a,
      sum(case when b.pegawai_pangkat = 'III/b'and b.pegawai_status = 1 then 1 else 0 end) as dt_3b,
      sum(case when b.pegawai_pangkat = 'III/c'and b.pegawai_status = 1 then 1 else 0 end) as dt_3c,
      sum(case when b.pegawai_pangkat = 'III/d'and b.pegawai_status = 1 then 1 else 0 end) as dt_3d,
      sum(case when b.pegawai_pangkat = 'IV/a'and b.pegawai_status = 1 then 1 else 0 end) as dt_4a,
      sum(case when b.pegawai_pangkat = 'IV/b'and b.pegawai_status = 1 then 1 else 0 end) as dt_4b,
      sum(case when b.pegawai_pangkat = 'IV/c'and b.pegawai_status = 1 then 1 else 0 end) as dt_4c,
      sum(case when b.pegawai_pangkat = 'IV/d'and b.pegawai_status = 1 then 1 else 0 end) as dt_4d,
      sum(case when b.pegawai_pangkat = 'IV/e'and b.pegawai_status = 1 then 1 else 0 end) as dt_4e
      FROM
      iapi_pegawai as b,
      iapi_province as a
      WHERE
      b.is_trash != 1 and a.province_id = b.pegawai_province and b.pegawai_province != 0
      GROUP BY
      a.province_id
      ");
    return $query->result();
  }

  function tampil_kab($prov)
  {
    $query = $this->db_database2->query("
      SELECT
      a.city_id,
      a.city_title,
      sum(case when b.pegawai_id and b.pegawai_status = 1 then 1 else 0 end) as dt_penghulu,
      sum(case when b.pegawai_kategory_penghulu = 3 and b.pegawai_status = 1 then 1 else 0 end) as dt_pertama,
      sum(case when b.pegawai_kategory_penghulu = 2 and b.pegawai_status = 1 then 1 else 0 end) as dt_madya,
      sum(case when b.pegawai_kategory_penghulu = 1 and b.pegawai_status = 1 then 1 else 0 end) as dt_muda,
      sum(case when b.pegawai_pangkat = 'I/a'and b.pegawai_status = 1 then 1 else 0 end) as dt_1a,
      sum(case when b.pegawai_pangkat = 'I/b'and b.pegawai_status = 1 then 1 else 0 end) as dt_1b,
      sum(case when b.pegawai_pangkat = 'I/c'and b.pegawai_status = 1 then 1 else 0 end) as dt_1c,
      sum(case when b.pegawai_pangkat = 'I/d'and b.pegawai_status = 1 then 1 else 0 end) as dt_1d,
      sum(case when b.pegawai_pangkat = 'II/a'and b.pegawai_status = 1 then 1 else 0 end) as dt_2a,
      sum(case when b.pegawai_pangkat = 'II/b'and b.pegawai_status = 1 then 1 else 0 end) as dt_2b,
      sum(case when b.pegawai_pangkat = 'II/c'and b.pegawai_status = 1 then 1 else 0 end) as dt_2c,
      sum(case when b.pegawai_pangkat = 'II/d'and b.pegawai_status = 1 then 1 else 0 end) as dt_2d,
      sum(case when b.pegawai_pangkat = 'III/a'and b.pegawai_status = 1 then 1 else 0 end) as dt_3a,
      sum(case when b.pegawai_pangkat = 'III/b'and b.pegawai_status = 1 then 1 else 0 end) as dt_3b,
      sum(case when b.pegawai_pangkat = 'III/c'and b.pegawai_status = 1 then 1 else 0 end) as dt_3c,
      sum(case when b.pegawai_pangkat = 'III/d'and b.pegawai_status = 1 then 1 else 0 end) as dt_3d,
      sum(case when b.pegawai_pangkat = 'IV/a'and b.pegawai_status = 1 then 1 else 0 end) as dt_4a,
      sum(case when b.pegawai_pangkat = 'IV/b'and b.pegawai_status = 1 then 1 else 0 end) as dt_4b,
      sum(case when b.pegawai_pangkat = 'IV/c'and b.pegawai_status = 1 then 1 else 0 end) as dt_4c,
      sum(case when b.pegawai_pangkat = 'IV/d'and b.pegawai_status = 1 then 1 else 0 end) as dt_4d,
      sum(case when b.pegawai_pangkat = 'IV/e'and b.pegawai_status = 1 then 1 else 0 end) as dt_4e,
      sum(case when b.pegawai_pendidikan_terakhir = 'SMA' and b.pegawai_status = 1 then 1 else 0 end) as dt_sma,
      sum(case when b.pegawai_pendidikan_terakhir = 'S1' and b.pegawai_status = 1 then 1 else 0 end) as dt_s1,
      sum(case when b.pegawai_pendidikan_terakhir = 'S2' and b.pegawai_status = 1 then 1 else 0 end) as dt_s2,
      sum(case when b.pegawai_pendidikan_terakhir = 'S3' and b.pegawai_status = 1 then 1 else 0 end) as dt_s3
      FROM
      iapi_pegawai as b,
      iapi_city as a
      WHERE
      b.is_trash != 1 and a.city_id = b.pegawai_city and b.pegawai_city != 0 and a.city_province = $prov
      GROUP BY
      a.city_id
      ");
    return $query->result();
  }

  function tampil_detail($city)
  {
    $query = $this->db_database2->query("
      SELECT
      b.pegawai_nip,
      c.kua_title ,
      b.pegawai_fullname,
      b.pegawai_tanggallahir,
      b.pegawai_tempatlahir,
      b.pegawai_alamat,
      b.pegawai_agama,
      b.pegawai_pangkat,
      b.pegawai_pendidikan_terakhir,
      b.pegawai_sk_penghulu_terakhir,
      b.pegawai_tgl_sk_penghulu
      FROM
      iapi_city as a,
      iapi_pegawai as b,
      master_kua as c
      WHERE
      a.city_id = b.pegawai_city and b.pegawai_status = 1 and b.is_trash != 1 and c.kua_id = b.pegawai_kua and a.city_id = $city
      GROUP BY
      b.pegawai_id
      ");
    return $query->result();
  }

  // function getPeng($id = null)
  // {
  //   if($id === null){
  //     $this->setGroup;
  //     $this->db_database2->select("city_id, city_title, COUNT(pegawai_id) as jumlah_penghulu");
  //     $this->db_database2->from('iapi_pegawai');
  //     $this->db_database2->join('iapi_city', 'iapi_city.city_id = iapi_pegawai.pegawai_city');
  //     $this->db_database2->where('pegawai_status', '1');
  //       //$this->db_database2->where("is_trash", "!=1");
  //     $this->db_database2->group_by('city_id');
  //     return $this->db_database2->get()->result_array();
  //   }else{
  //     $this->setGroup;
  //     $satu = "!= 1";
  //     $status = "1";
  //     $query = $this->db_database2
  //     ->select("city_id, pegawai_nip as nip, pegawai_fullname as nama, pegawai_tanggallahir as lahir, pegawai_tempatlahir as tempat, pegawai_agama as agama, pegawai_pangkat as pangkat, pegawai_pendidikan_terakhir as pendidikan, pegawai_sk_penghulu_terakhir as sk, pegawai_tgl_sk_penghulu as tgl_sk, pegawai_alamat as alamat")

  //     ->from('iapi_pegawai')
  //     ->join('iapi_city', 'iapi_city.city_id = iapi_pegawai.pegawai_city')
  //     ->where("city_id", $id)
  //       //->where_in("is_trash", 1)
  //     ->where('iapi_pegawai.is_trash', $satu)
  //     ->where('iapi_pegawai.pegawai_status', $status)
  //     ->group_by('pegawai_id')
  //     ->get()
  //     ->result_array();

  //     return $query;
  //   }
  // }

  function get_city($city)
  {
    $query = $this->db_database2->query("
      SELECT
      a.city_id as nikah_city_id,
      a.city_title,
      count(b.nikah_id) as dt_nikah,
      round(avg(b.nikah_usia_pria)) as rt_usia_pria,
      round(avg(b.nikah_usia_wanita)) as rt_usia_wanita,
      sum(case when b.nikah_pddk_pria = 'SD' then 1 else 0 end) as pddk_sd_pria,
      sum(case when b.nikah_pddk_pria = 'SMP' then 1 else 0 end) as pddk_smp_pria,
      sum(case when b.nikah_pddk_pria = 'SMA' then 1 else 0 end) as pddk_sma_pria,
      sum(case when b.nikah_pddk_pria = 'S1' then 1 else 0 end) as pddk_s1_pria,
      sum(case when b.nikah_pddk_pria = 'S2' then 1 else 0 end) as pddk_s2_pria,
      sum(case when b.nikah_pddk_pria = 'S3' then 1 else 0 end) as pddk_s3_pria,
      sum(case when b.nikah_pddk_wanita = 'SD' then 1 else 0 end) as pddk_sd_wanita,
      sum(case when b.nikah_pddk_wanita = 'SMP' then 1 else 0 end) as pddk_smp_wanita,
      sum(case when b.nikah_pddk_wanita = 'SMA' then 1 else 0 end) as pddk_sma_wanita,
      sum(case when b.nikah_pddk_wanita = 'S1' then 1 else 0 end) as pddk_s1_wanita,
      sum(case when b.nikah_pddk_wanita = 'S2' then 1 else 0 end) as pddk_s2_wanita,
      sum(case when b.nikah_pddk_wanita = 'S3' then 1 else 0 end) as pddk_s3_wanita,
      sum(case when b.nikah_tempat = 'KANTOR' then 1 else 0 end) as nikah_kantor,
      sum(case when b.nikah_tempat = 'LUAR' then 1 else 0 end) as nikah_nonkantor,
      sum(case when b.nikah_status = 1 then 1 else 0 end) as nikah_terlaksana,
      sum(case when b.nikah_status = 0 then 1 else 0 end) as nikah_nonterlaksana
      FROM
      iapi_city as a,
      master_nikah as b
      WHERE
-- join
a.city_id = b.nikah_city_id
-- kondisi
and b.nikah_province_id != 0 and b.nikah_city_id != 0 and b.nikah_kua_id != 0 and a.city_province = $city
GROUP BY
a.city_id
");
    return $query->result();
  }

  function get_city_detail($detail)
  {
    $query = $this->db_database2->query("
      SELECT
      a.nikah_nama_pria,
      a.nikah_pddk_pria,
      a.nikah_usia_pria,
      a.nikah_nama_wanita,
      a.nikah_pddk_wanita,
      a.nikah_usia_wanita,
      a.nikah_tanggal,
      b.kua_title,
      a.nikah_tempat,
      a.nikah_wali_nasab,
      a.nikah_wali_hakim,
      a.nikah_no_akte,
      if(a.nikah_status = 1, 'terlaksana', 'belum terlaksana') as 'status'
      FROM
      master_nikah as a,
      master_kua as b
      WHERE
-- join
a.nikah_kua_id = b.kua_id
-- kondisi
and a.nikah_city_id = $detail and a.nikah_province_id != 0 and a.nikah_city_id != 0 and a.nikah_kua_id != 0
GROUP BY
a.nikah_id
");
    return $query->result();
  }

  function get_provinsi()
  {
    $query = $this->db_database2->query("
      SELECT
      a.province_id as city_province,
      a.province_title,
      count(b.nikah_id) as dt_nikah,
      round(avg(b.nikah_usia_pria)) as rt_usia_pria,
      round(avg(b.nikah_usia_wanita)) as rt_usia_wanita,
      sum(case when b.nikah_pddk_pria = 'SD' then 1 else 0 end) as pddk_sd_pria,
      sum(case when b.nikah_pddk_pria = 'SMP' then 1 else 0 end) as pddk_smp_pria,
      sum(case when b.nikah_pddk_pria = 'SMA' then 1 else 0 end) as pddk_sma_pria,
      sum(case when b.nikah_pddk_pria = 'S1' then 1 else 0 end) as pddk_s1_pria,
      sum(case when b.nikah_pddk_pria = 'S2' then 1 else 0 end) as pddk_s2_pria,
      sum(case when b.nikah_pddk_pria = 'S3' then 1 else 0 end) as pddk_s3_pria,
      sum(case when b.nikah_pddk_wanita = 'SD' then 1 else 0 end) as pddk_sd_wanita,
      sum(case when b.nikah_pddk_wanita = 'SMP' then 1 else 0 end) as pddk_smp_wanita,
      sum(case when b.nikah_pddk_wanita = 'SMA' then 1 else 0 end) as pddk_sma_wanita,
      sum(case when b.nikah_pddk_wanita = 'S1' then 1 else 0 end) as pddk_s1_wanita,
      sum(case when b.nikah_pddk_wanita = 'S2' then 1 else 0 end) as pddk_s2_wanita,
      sum(case when b.nikah_pddk_wanita = 'S3' then 1 else 0 end) as pddk_s3_wanita,
      sum(case when b.nikah_tempat = 'KANTOR' then 1 else 0 end) as nikah_kantor,
      sum(case when b.nikah_tempat = 'LUAR' then 1 else 0 end) as nikah_nonkantor,
      sum(case when b.nikah_status = 1 then 1 else 0 end) as nikah_terlaksana,
      sum(case when b.nikah_status = 0 then 1 else 0 end) as nikah_nonterlaksana
      FROM
      iapi_province as a,
      master_nikah as b
      WHERE
      -- join
      a.province_id = b.nikah_province_id
      -- kondisi
      and b.nikah_province_id != 0 and b.nikah_city_id != 0 and b.nikah_kua_id != 0
      GROUP BY
      a.province_id
      ");
    return $query->result();
  }

  function get_kua()
  {
    $query = $this->db_database2->query("
      SELECT
      b.kua_province_id,
      a.province_title,
      count(b.kua_id) as dt_kua
      FROM
      iapi_province as a,
      master_kua as b
      WHERE
      -- join
      a.province_id = b.kua_province_id
      -- kondisi
      and b.is_trash != 1
      GROUP BY
      a.province_id
      ");
    return $query->result();
  }

  function get_kua_provs($provs)
  {
    $query = $this->db_database2->query("
      SELECT
      b.kua_city_id,
      a.city_title,
      count(b.kua_id) as dt_kua
      FROM
      iapi_city as a,
      master_kua as b
      WHERE
      a.city_id = b.kua_city_id and b.is_trash != 1 and b.kua_city_id != 0 and b.kua_province_id = $provs
      GROUP BY
      a.city_id
      ");
    return $query->result();
  }

  function get_kua_kabp($kabp)
  {
    $query = $this->db_database2->query("
      SELECT
      a.kua_id,
      a.kua_title
      FROM
      master_kua as a
      WHERE
      a.kua_city_id = $kabp and a.is_trash != 1
      GROUP BY
      a.kua_id
      ");
    return $query->result();
  }

  function get_kategori()
  {
    $query = $this->db_database2->query("
      SELECT
      a.pegawai_kategory_penghulu,
      case
      when a.pegawai_kategory_penghulu = 1 then 'Ahli muda'
      when a.pegawai_kategory_penghulu = 2 then 'Ahli madya'
      when a.pegawai_kategory_penghulu = 3 then 'Ahli pertama'
      end as kategori,
      count(a.pegawai_id) as dt_kategori
      FROM
      iapi_pegawai as a
      WHERE
      a.is_trash != 1
      GROUP BY
      a.pegawai_kategory_penghulu
      ");
    return $query->result();
  }

  function get_kategori_penghulu($kat)
  {
    $query = $this->db_database2->query("
      SELECT
      a.pegawai_nip,
      a.pegawai_fullname,
      a.pegawai_tanggallahir,
      a.pegawai_tempatlahir,
      if(a.pegawai_jenkel = 1, 'Laki-Laki', 'Noket') as kelamin,
      a.pegawai_pendidikan_terakhir as pendidikan,
      a.pegawai_unit_kerja,
      a.pegawai_pangkat,
      a.pegawai_sk_penghulu,
      a.pegawai_tgl_sk_penghulu,
      case
      when a.pegawai_kategory_penghulu = 1 then 'Ahli muda'
      when a.pegawai_kategory_penghulu = 2 then 'Ahli madya'
      when a.pegawai_kategory_penghulu = 3 then 'Ahli pertama'
      end as kategori,
      a.pegawai_jml_angka_kredit
      FROM
      iapi_pegawai as a
      WHERE
      a.is_trash != 1 and a.pegawai_kategory_penghulu = $kat
      GROUP BY
      pegawai_id
      ");
    return $query->result();
  }

  function get_kategori_pgkt()
  {
    $query = $this->db_database2->query("
      SELECT
      a.pegawai_pangkat,
      count(a.pegawai_pangkat) as dt_pangkat
      FROM
      iapi_pegawai as a
      WHERE
      a.is_trash != 1 and a.pegawai_status = 1
      GROUP BY
      a.pegawai_pangkat
      ");
    return $query->result();
  }

  function get_kategori_pangkat($pangkat)
  {
    $query = $this->db_database2->query("
      SELECT
      a.pegawai_nip,
      a.pegawai_fullname,
      a.pegawai_tanggallahir,
      a.pegawai_tempatlahir,
      if(a.pegawai_jenkel = 1, 'Laki-Laki', 'Noket') as kelamin,
      a.pegawai_pendidikan_terakhir as pendidikan,
      a.pegawai_unit_kerja,
      a.pegawai_pangkat,
      a.pegawai_sk_penghulu,
      a.pegawai_tgl_sk_penghulu,
      case
      when a.pegawai_kategory_penghulu = 1 then 'Ahli muda'
      when a.pegawai_kategory_penghulu = 2 then 'Ahli madya'
      when a.pegawai_kategory_penghulu = 3 then 'Ahli pertama'
      end as kategori,
      a.pegawai_jml_angka_kredit
      FROM
      iapi_pegawai as a
      WHERE
      a.is_trash != 1 and a.pegawai_status = 1 and a.pegawai_pangkat = '$pangkat'
      GROUP BY
      a.pegawai_id
      ");
    return $query->result();
  }

  function get_kategori_tahun()
  {
    $query = $this->db_database2->query("
      SELECT
      a.rekap_tahun
      FROM
      master_rekap_nikah as a
      GROUP BY
      a.rekap_tahun
      ");
    return $query->result();
  }

  function get_nikah()
  {
    $query = $this->db_database2->query("
      SELECT
      b.rekap_province,
      province_title,
      count(distinct b.rekap_city) as dt_kab,
      sum(b.rekap_wali_nasab) + sum(b.rekap_wali_hakim) as dt_nikah,
      sum(case when b.rekap_rujuk then b.rekap_rujuk else 0 end) as dt_rujuk,
      sum(case when b.rekap_bu_pria then b.rekap_bu_pria else 0 end) as dt_bawahumur_pria,
      sum(case when b.rekap_bu_wanita then b.rekap_bu_wanita else 0 end) as dt_bawahumur_wanita,
      sum(case when b.rekap_nikah_dikantor then b.rekap_nikah_dikantor else 0 end) as dt_nikahkantor,
      sum(case when b.rekap_nikah_luar_kantor then b.rekap_nikah_luar_kantor else 0 end) as dt_nonkantor,
      sum(case when b.rekap_pdd_pria_sd then b.rekap_pdd_pria_sd else 0 end) as dt_pddk_sd_pria,
      sum(case when b.rekap_pdd_pria_smp then b.rekap_pdd_pria_smp else 0 end) as dt_pddk_smp_pria,
      sum(case when b.rekap_pdd_pria_sma then b.rekap_pdd_pria_sma else 0 end) as dt_pddk_sma_pria,
      sum(case when b.rekap_pdd_pria_s1 then b.rekap_pdd_pria_s1 else 0 end) as dt_pddk_s1_pria,
      sum(case when b.rekap_pdd_wanita_sd then b.rekap_pdd_wanita_sd else 0 end) as dt_pddk_sd_wanita,
      sum(case when b.rekap_pdd_wanita_smp then b.rekap_pdd_wanita_smp else 0 end) as dt_pddk_smp_wanita,
      sum(case when b.rekap_pdd_wanita_sma then b.rekap_pdd_wanita_sma else 0 end) as dt_pddk_sma_wanita,
      sum(case when b.rekap_pdd_wanita_diatas_s1 then b.rekap_pdd_wanita_diatas_s1 else 0 end) as dt_pddk_s1_wanita,
      'semua tahun' as 'rekap_tahun'
      FROM
      iapi_province as a,
      master_rekap_nikah as b
      WHERE
      a.province_id = b.rekap_province
      GROUP BY
      a.province_id
      ");
    return $query->result();
  }

  function get_nikah_tahun($tahun)
  {
    $query = $this->db_database2->query("
      SELECT
      b.rekap_province,
      province_title,
      count(distinct b.rekap_city) as dt_kab,
      sum(b.rekap_wali_nasab) + sum(b.rekap_wali_hakim) as dt_nikah,
      sum(case when b.rekap_rujuk then b.rekap_rujuk else 0 end) as dt_rujuk,
      sum(case when b.rekap_bu_pria then b.rekap_bu_pria else 0 end) as dt_bawahumur_pria,
      sum(case when b.rekap_bu_wanita then b.rekap_bu_wanita else 0 end) as dt_bawahumur_wanita,
      sum(case when b.rekap_nikah_dikantor then b.rekap_nikah_dikantor else 0 end) as dt_nikahkantor,
      sum(case when b.rekap_nikah_luar_kantor then b.rekap_nikah_luar_kantor else 0 end) as dt_nonkantor,
      sum(case when b.rekap_pdd_pria_sd then b.rekap_pdd_pria_sd else 0 end) as dt_pddk_sd_pria,
      sum(case when b.rekap_pdd_pria_smp then b.rekap_pdd_pria_smp else 0 end) as dt_pddk_smp_pria,
      sum(case when b.rekap_pdd_pria_sma then b.rekap_pdd_pria_sma else 0 end) as dt_pddk_sma_pria,
      sum(case when b.rekap_pdd_pria_s1 then b.rekap_pdd_pria_s1 else 0 end) as dt_pddk_s1_pria,
      sum(case when b.rekap_pdd_wanita_sd then b.rekap_pdd_wanita_sd else 0 end) as dt_pddk_sd_wanita,
      sum(case when b.rekap_pdd_wanita_smp then b.rekap_pdd_wanita_smp else 0 end) as dt_pddk_smp_wanita,
      sum(case when b.rekap_pdd_wanita_sma then b.rekap_pdd_wanita_sma else 0 end) as dt_pddk_sma_wanita,
      sum(case when b.rekap_pdd_wanita_diatas_s1 then b.rekap_pdd_wanita_diatas_s1 else 0 end) as dt_pddk_s1_wanita,
      b.rekap_tahun
      FROM
      iapi_province as a,
      master_rekap_nikah as b
      WHERE
      a.province_id = b.rekap_province and b.rekap_tahun = $tahun
      GROUP BY
      a.province_id
      ");
    return $query->result();
  }

  function get_nikah_provi($tahun,$provi)
  {
    $query = $this->db_database2->query("
      SELECT
      a.city_id,
      a.city_title,
      sum(b.rekap_wali_nasab) + sum(b.rekap_wali_hakim) as dt_nikah,
      sum(case when b.rekap_rujuk then b.rekap_rujuk else 0 end) as dt_rujuk,
      sum(case when b.rekap_bu_pria then b.rekap_bu_pria else 0 end) as dt_bawahumur_pria,
      sum(case when b.rekap_bu_wanita then b.rekap_bu_wanita else 0 end) as dt_bawahumur_wanita,
      sum(case when b.rekap_nikah_dikantor then b.rekap_nikah_dikantor else 0 end) as dt_nikahkantor,
      sum(case when b.rekap_nikah_luar_kantor then b.rekap_nikah_luar_kantor else 0 end) as dt_nonkantor,
      sum(case when b.rekap_pdd_pria_sd then b.rekap_pdd_pria_sd else 0 end) as dt_pddk_sd_pria,
      sum(case when b.rekap_pdd_pria_dibawah_smp then b.rekap_pdd_pria_dibawah_smp else 0 end) as dt_pddk_smp_pria,
      sum(case when b.rekap_pdd_pria_sma then b.rekap_pdd_pria_sma else 0 end) as dt_pddk_sma_pria,
      sum(case when b.rekap_pdd_pria_diatas_s1 then b.rekap_pdd_pria_diatas_s1 else 0 end) as dt_pddk_s1_pria,
      sum(case when b.rekap_pdd_wanita_dibawah_smp then b.rekap_pdd_wanita_dibawah_smp else 0 end) as dt_pddk_smp_wanita,
      sum(case when b.rekap_pdd_wanita_sma then b.rekap_pdd_wanita_sma else 0 end) as dt_pddk_sma_wanita,
      sum(case when b.rekap_pdd_wanita_diatas_s1 then b.rekap_pdd_wanita_diatas_s1 else 0 end) as dt_pddk_s1_wanita,
      b.rekap_tahun
      FROM
      iapi_city as a,
      master_rekap_nikah as b
      WHERE
      a.city_id = b.rekap_city and b.rekap_tahun = $tahun and b.rekap_province = $provi
      GROUP BY
      a.city_id
      ");
    return $query->result();
  }

  function get_nikah_city($tahun,$city)
  {
    $query = $this->db_database2->query("
      SELECT
      a.rekap_id,
      b.city_title,
      c.kua_title,
      a.rekap_wali_nasab,
      a.rekap_wali_hakim,
      a.rekap_wali_adhal,
      a.rekap_wali_chairul_adhal,
      a.rekap_wali_campuran,
      a.rekap_poligami_2,
      a.rekap_poligami_3,
      a.rekap_poligami_4,
      a.rekap_bu_pria,
      a.rekap_bu_wanita,
      a.rekap_nikah_dikantor,
      a.rekap_nikah_luar_kantor,
      a.rekap_nikah_bnpb,
      a.rekap_pdd_pria_sd,
      a.rekap_pdd_pria_dibawah_smp,
      a.rekap_pdd_pria_sma,
      a.rekap_pdd_pria_diatas_s1,
      a.rekap_pdd_wanita_sma,
      a.rekap_pdd_wanita_dibawah_smp,
      a.rekap_pdd_wanita_diatas_s1,
      a.rekap_tahun
      FROM
      master_rekap_nikah as a,
      iapi_city as b,
      master_kua as c
      WHERE
      a.rekap_city = b.city_id and a.rekap_city = $city and a.rekap_tahun = $tahun and c.kua_id = a.rekap_kua
      GROUP BY
      a.rekap_id
      ");
    return $query->result();
  }

  function tampil_pensiun()
  {
    $query = $this->db_database2->query("
      SELECT
      b.province_id as pegawai_province,
      b.province_title,
      sum(case when a.pegawai_id then 1 else 0 end) as dt_penghulu,
      sum(case when a.pegawai_pangkat = 'III/a' then 1 else 0 end) as dt_3a,
      sum(case when a.pegawai_pangkat = 'III/b' then 1 else 0 end) as dt_3b,
      sum(case when a.pegawai_pangkat = 'III/c' then 1 else 0 end) as dt_3c,
      sum(case when a.pegawai_pangkat = 'III/d' then 1 else 0 end) as dt_3d,
      sum(case when a.pegawai_pangkat = 'IV/a' then 1 else 0 end) as dt_4a,
      sum(case when a.pegawai_pangkat = 'IV/b' then 1 else 0 end) as dt_4b,
      sum(case when a.pegawai_pangkat = 'IV/c' then 1 else 0 end) as dt_4c,
      sum(case when a.pegawai_pangkat = 'IV/d' then 1 else 0 end) as dt_4d,
      sum(case when a.pegawai_pangkat = 'IV/e' then 1 else 0 end) as dt_4e,
      sum(case when a.pegawai_kategory_penghulu = 1 then 1 else 0 end) as dt_muda,
      sum(case when a.pegawai_kategory_penghulu = 2 then 1 else 0 end) as dt_madya,
      sum(case when a.pegawai_kategory_penghulu = 3 then 1 else 0 end) as dt_pertama,
      sum(case when a.pegawai_pendidikan_terakhir = 'S1' then 1 else 0 end) as dt_S1,
      sum(case when a.pegawai_pendidikan_terakhir = 'S2' then 1 else 0 end) as dt_S2,
      sum(case when a.pegawai_pendidikan_terakhir = 'S3' then 1 else 0 end) as dt_S3
      FROM
      view_penghulu_pensiun as a,
      iapi_province as b
      WHERE
      a.pegawai_province = b.province_id
      GROUP BY
      b.province_id
      ORDER BY
      b.province_id asc
      ");
    return $query->result();
  }

  function tampil_pensiun_prop($proppn)
  {
    $query = $this->db_database2->query("
      SELECT
      b.city_id as pegawai_city,
      b.city_title,
      sum(case when a.pegawai_id then 1 else 0 end) as dt_penghulu,
      sum(case when a.pegawai_pangkat = 'III/a' then 1 else 0 end) as dt_3a,
      sum(case when a.pegawai_pangkat = 'III/b' then 1 else 0 end) as dt_3b,
      sum(case when a.pegawai_pangkat = 'III/c' then 1 else 0 end) as dt_3c,
      sum(case when a.pegawai_pangkat = 'III/d' then 1 else 0 end) as dt_3d,
      sum(case when a.pegawai_pangkat = 'IV/a' then 1 else 0 end) as dt_4a,
      sum(case when a.pegawai_pangkat = 'IV/b' then 1 else 0 end) as dt_4b,
      sum(case when a.pegawai_pangkat = 'IV/c' then 1 else 0 end) as dt_4c,
      sum(case when a.pegawai_pangkat = 'IV/d' then 1 else 0 end) as dt_4d,
      sum(case when a.pegawai_pangkat = 'IV/e' then 1 else 0 end) as dt_4e,
      sum(case when a.pegawai_kategory_penghulu = 1 then 1 else 0 end) as dt_muda,
      sum(case when a.pegawai_kategory_penghulu = 2 then 1 else 0 end) as dt_madya,
      sum(case when a.pegawai_kategory_penghulu = 3 then 1 else 0 end) as dt_pertama,
      sum(case when a.pegawai_pendidikan_terakhir = 'S1' then 1 else 0 end) as dt_S1,
      sum(case when a.pegawai_pendidikan_terakhir = 'S2' then 1 else 0 end) as dt_S2,
      sum(case when a.pegawai_pendidikan_terakhir = 'S3' then 1 else 0 end) as dt_S3
      FROM
      view_penghulu_pensiun as a,
      iapi_city as b
      WHERE
      a.pegawai_city = b.city_id and a.pegawai_province = $proppn
      GROUP BY
      b.city_id
      ORDER BY
      b.city_id asc
      ");
    return $query->result();
  }

  function tampil_pensiun_kab($kabpn)
  {
    $query = $this->db_database2->query("
      SELECT
      a.pegawai_nip,
      a.pegawai_fullname,
      a.pegawai_tanggallahir,
      a.pegawai_tempatlahir,
      if(a.pegawai_jenkel = 1, 'Laki-laki', 'Perempuan') as kelamin,
      a.pegawai_agama,
      a.pegawai_alamat,
      a.pegawai_pendidikan_terakhir,
      a.pegawai_pangkat,
      case
      when a.pegawai_kategory_penghulu = 1 then 'muda'
      when a.pegawai_kategory_penghulu = 2 then 'madya'
      when a.pegawai_kategory_penghulu = 3 then 'pertama'
      end as jenjang_penghulu,
      a.pegawai_status_tanggal as tanggal_pensiun
      FROM
      view_penghulu_pensiun as a
      WHERE
      a.pegawai_city = $kabpn
      GROUP BY
      a.pegawai_id
      ");
    return $query->result();
  }

  function get_penghulu_bebas()
  {
    $query = $this->db_database2->query("
      SELECT
      a.pegawai_province,
      b.province_title,
      sum(case when a.pegawai_id and a.pegawai_status = 2 then 1 else 0 end) as dt_penghulu,
      sum(case when a.pegawai_pendidikan_terakhir = 'S1' and a.pegawai_status = 2 then 1 else 0 end) as pddk_s1,
      sum(case when a.pegawai_pendidikan_terakhir = 'S2' and a.pegawai_status = 2 then 1 else 0 end) as pddk_s2,
      sum(case when a.pegawai_pendidikan_terakhir = 'S3' and a.pegawai_status = 2 then 1 else 0 end) as pddk_s3,
      sum(case when a.pegawai_kategory_penghulu = 3 and a.pegawai_status = 2 then 1 else 0 end) as dt_pertama,
      sum(case when a.pegawai_kategory_penghulu = 2 and a.pegawai_status = 2 then 1 else 0 end) as dt_madya,
      sum(case when a.pegawai_kategory_penghulu = 1 and a.pegawai_status = 2 then 1 else 0 end) as dt_muda,
      sum(case when a.pegawai_pangkat = 'I/a'and a.pegawai_status = 2 then 1 else 0 end) as pgkt_1a,
      sum(case when a.pegawai_pangkat = 'I/b'and a.pegawai_status = 2 then 1 else 0 end) as pgkt_1b,
      sum(case when a.pegawai_pangkat = 'I/c'and a.pegawai_status = 2 then 1 else 0 end) as pgkt_1c,
      sum(case when a.pegawai_pangkat = 'I/d'and a.pegawai_status = 2 then 1 else 0 end) as pgkt_1d,
      sum(case when a.pegawai_pangkat = 'II/a'and a.pegawai_status = 2 then 1 else 0 end) as pgkt_2a,
      sum(case when a.pegawai_pangkat = 'II/b'and a.pegawai_status = 2 then 1 else 0 end) as pgkt_2b,
      sum(case when a.pegawai_pangkat = 'II/c'and a.pegawai_status = 2 then 1 else 0 end) as pgkt_2c,
      sum(case when a.pegawai_pangkat = 'II/d'and a.pegawai_status = 2 then 1 else 0 end) as pgkt_2d,
      sum(case when a.pegawai_pangkat = 'III/a'and a.pegawai_status = 2 then 1 else 0 end) as pgkt_3a,
      sum(case when a.pegawai_pangkat = 'III/b'and a.pegawai_status = 2 then 1 else 0 end) as pgkt_3b,
      sum(case when a.pegawai_pangkat = 'III/c'and a.pegawai_status = 2 then 1 else 0 end) as pgkt_3c,
      sum(case when a.pegawai_pangkat = 'III/d'and a.pegawai_status = 2 then 1 else 0 end) as pgkt_3d,
      sum(case when a.pegawai_pangkat = 'IV/a'and a.pegawai_status = 2 then 1 else 0 end) as pgkt_4a,
      sum(case when a.pegawai_pangkat = 'IV/b'and a.pegawai_status = 2 then 1 else 0 end) as pgkt_4b,
      sum(case when a.pegawai_pangkat = 'IV/c'and a.pegawai_status = 2 then 1 else 0 end) as pgkt_4c,
      sum(case when a.pegawai_pangkat = 'IV/d'and a.pegawai_status = 2 then 1 else 0 end) as pgkt_4d,
      sum(case when a.pegawai_pangkat = 'IV/e'and a.pegawai_status = 2 then 1 else 0 end) as pgkt_4e
      FROM
      iapi_pegawai as a,
      iapi_province as b
      WHERE
      b.province_id = a.pegawai_province and a.is_trash != 1
      GROUP BY
      b.province_id
      ");
    return $query->result();
  }

  function get_penghulu_bebasprov($pegprov)
  {
    $query = $this->db_database2->query("
      SELECT
      a.city_id,
      a.city_title,
      sum(case when b.pegawai_id and b.pegawai_status = 2 then 1 else 0 end) as dt_penghulu,
      sum(case when b.pegawai_pendidikan_terakhir = 'S1' and b.pegawai_status = 2 then 1 else 0 end) as pddk_s1,
      sum(case when b.pegawai_pendidikan_terakhir = 'S2' and b.pegawai_status = 2 then 1 else 0 end) as pddk_s2,
      sum(case when b.pegawai_pendidikan_terakhir = 'S3' and b.pegawai_status = 2 then 1 else 0 end) as pddk_s3,
      sum(case when b.pegawai_kategory_penghulu = 3 and b.pegawai_status = 2 then 1 else 0 end) as dt_pertama,
      sum(case when b.pegawai_kategory_penghulu = 2 and b.pegawai_status = 2 then 1 else 0 end) as dt_madya,
      sum(case when b.pegawai_kategory_penghulu = 1 and b.pegawai_status = 2 then 1 else 0 end) as dt_muda,
      sum(case when b.pegawai_pangkat = 'I/a'and b.pegawai_status = 2 then 1 else 0 end) as pgkt_1a,
      sum(case when b.pegawai_pangkat = 'I/b'and b.pegawai_status = 2 then 1 else 0 end) as pgkt_1b,
      sum(case when b.pegawai_pangkat = 'I/c'and b.pegawai_status = 2 then 1 else 0 end) as pgkt_1c,
      sum(case when b.pegawai_pangkat = 'I/d'and b.pegawai_status = 2 then 1 else 0 end) as pgkt_1d,
      sum(case when b.pegawai_pangkat = 'II/a'and b.pegawai_status = 2 then 1 else 0 end) as pgkt_2a,
      sum(case when b.pegawai_pangkat = 'II/b'and b.pegawai_status = 2 then 1 else 0 end) as pgkt_2b,
      sum(case when b.pegawai_pangkat = 'II/c'and b.pegawai_status = 2 then 1 else 0 end) as pgkt_2c,
      sum(case when b.pegawai_pangkat = 'II/d'and b.pegawai_status = 2 then 1 else 0 end) as pgkt_2d,
      sum(case when b.pegawai_pangkat = 'III/a'and b.pegawai_status = 2 then 1 else 0 end) as pgkt_3a,
      sum(case when b.pegawai_pangkat = 'III/b'and b.pegawai_status = 2 then 1 else 0 end) as pgkt_3b,
      sum(case when b.pegawai_pangkat = 'III/c'and b.pegawai_status = 2 then 1 else 0 end) as pgkt_3c,
      sum(case when b.pegawai_pangkat = 'III/d'and b.pegawai_status = 2 then 1 else 0 end) as pgkt_3d,
      sum(case when b.pegawai_pangkat = 'IV/a'and b.pegawai_status = 2 then 1 else 0 end) as pgkt_4a,
      sum(case when b.pegawai_pangkat = 'IV/b'and b.pegawai_status = 2 then 1 else 0 end) as pgkt_4b,
      sum(case when b.pegawai_pangkat = 'IV/c'and b.pegawai_status = 2 then 1 else 0 end) as pgkt_4c,
      sum(case when b.pegawai_pangkat = 'IV/d'and b.pegawai_status = 2 then 1 else 0 end) as pgkt_4d,
      sum(case when b.pegawai_pangkat = 'IV/e'and b.pegawai_status = 2 then 1 else 0 end) as pgkt_4e
      FROM
      iapi_city as a,
      iapi_pegawai as b
      WHERE
      b.is_trash != 1 and b.pegawai_province = $pegprov and a.city_id = b.pegawai_city
      GROUP BY
      a.city_id
      ");
    return $query->result();
  }

  function get_penghulu_bebascity($pegcity)
  {
    $query = $this->db_database2->query("
      SELECT
      a.pegawai_nip,
      a.pegawai_fullname,
      a.pegawai_tanggallahir,
      a.pegawai_tempatlahir,
      if(a.pegawai_jenkel = 1, 'Laki-Laki', 'Noket') as kelamin,
      a.pegawai_pendidikan_terakhir as pendidikan,
      b.kua_title,
      a.pegawai_unit_kerja,
      a.pegawai_pangkat,
      a.pegawai_sk_penghulu,
      a.pegawai_tgl_sk_penghulu,
      case
      when a.pegawai_kategory_penghulu = 1 then 'Ahli muda'
      when a.pegawai_kategory_penghulu = 2 then 'Ahli madya'
      when a.pegawai_kategory_penghulu = 3 then 'Ahli pertama'
      end as kategori,
      a.pegawai_jml_angka_kredit,
      a.pegawai_status_tanggal,
      if(a.pegawai_status = 2, 'Pembebasan sementara', 'Tidak diketahui') as status_penghulu
      FROM
      iapi_pegawai as a,
      master_kua as b
      WHERE
      a.pegawai_city = $pegcity and a.pegawai_status = 2 and a.pegawai_kua = b.kua_id
      GROUP BY
      a.pegawai_id
      ");
    return $query->result();
  }

  function get_pensiun()
  {
    $query = $this->db_database2->query("
      SELECT
      a.pegawai_province,
      b.province_title,
      sum(case when a.pegawai_id and a.pegawai_status = 0 then 1 else 0 end) as dt_penghulu,
      sum(case when a.pegawai_pendidikan_terakhir = 'S1' and a.pegawai_status = 0 then 1 else 0 end) as pddk_s1,
      sum(case when a.pegawai_pendidikan_terakhir = 'S2' and a.pegawai_status = 0 then 1 else 0 end) as pddk_s2,
      sum(case when a.pegawai_pendidikan_terakhir = 'S3' and a.pegawai_status = 0 then 1 else 0 end) as pddk_s3,
      sum(case when a.pegawai_kategory_penghulu = 3 and a.pegawai_status = 0 then 1 else 0 end) as dt_pertama,
      sum(case when a.pegawai_kategory_penghulu = 2 and a.pegawai_status = 0 then 1 else 0 end) as dt_madya,
      sum(case when a.pegawai_kategory_penghulu = 1 and a.pegawai_status = 0 then 1 else 0 end) as dt_muda,
      sum(case when a.pegawai_pangkat = 'I/a'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_1a,
      sum(case when a.pegawai_pangkat = 'I/b'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_1b,
      sum(case when a.pegawai_pangkat = 'I/c'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_1c,
      sum(case when a.pegawai_pangkat = 'I/d'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_1d,
      sum(case when a.pegawai_pangkat = 'II/a'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_2a,
      sum(case when a.pegawai_pangkat = 'II/b'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_2b,
      sum(case when a.pegawai_pangkat = 'II/c'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_2c,
      sum(case when a.pegawai_pangkat = 'II/d'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_2d,
      sum(case when a.pegawai_pangkat = 'III/a'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_3a,
      sum(case when a.pegawai_pangkat = 'III/b'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_3b,
      sum(case when a.pegawai_pangkat = 'III/c'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_3c,
      sum(case when a.pegawai_pangkat = 'III/d'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_3d,
      sum(case when a.pegawai_pangkat = 'IV/a'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_4a,
      sum(case when a.pegawai_pangkat = 'IV/b'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_4b,
      sum(case when a.pegawai_pangkat = 'IV/c'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_4c,
      sum(case when a.pegawai_pangkat = 'IV/d'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_4d,
      sum(case when a.pegawai_pangkat = 'IV/e'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_4e
      FROM
      iapi_pegawai as a,
      iapi_province as b
      WHERE
      a.pegawai_province = b.province_id and a.is_trash != 1 and a.pegawai_city != 0
      GROUP BY
      b.province_id
      ");
    return $query->result();
  }

  function get_pensiun_prop($peprov)
  {
    $query = $this->db_database2->query("
      SELECT
      a.pegawai_city,
      b.city_title,
      sum(case when a.pegawai_id and a.pegawai_status = 0 then 1 else 0 end) as dt_penghulu,
      sum(case when a.pegawai_pendidikan_terakhir = 'S1' and a.pegawai_status = 0 then 1 else 0 end) as pddk_s1,
      sum(case when a.pegawai_pendidikan_terakhir = 'S2' and a.pegawai_status = 0 then 1 else 0 end) as pddk_s2,
      sum(case when a.pegawai_pendidikan_terakhir = 'S3' and a.pegawai_status = 0 then 1 else 0 end) as pddk_s3,
      sum(case when a.pegawai_kategory_penghulu = 3 and a.pegawai_status = 0 then 1 else 0 end) as dt_pertama,
      sum(case when a.pegawai_kategory_penghulu = 2 and a.pegawai_status = 0 then 1 else 0 end) as dt_madya,
      sum(case when a.pegawai_kategory_penghulu = 1 and a.pegawai_status = 0 then 1 else 0 end) as dt_muda,
      sum(case when a.pegawai_pangkat = 'I/a'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_1a,
      sum(case when a.pegawai_pangkat = 'I/b'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_1b,
      sum(case when a.pegawai_pangkat = 'I/c'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_1c,
      sum(case when a.pegawai_pangkat = 'I/d'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_1d,
      sum(case when a.pegawai_pangkat = 'II/a'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_2a,
      sum(case when a.pegawai_pangkat = 'II/b'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_2b,
      sum(case when a.pegawai_pangkat = 'II/c'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_2c,
      sum(case when a.pegawai_pangkat = 'II/d'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_2d,
      sum(case when a.pegawai_pangkat = 'III/a'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_3a,
      sum(case when a.pegawai_pangkat = 'III/b'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_3b,
      sum(case when a.pegawai_pangkat = 'III/c'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_3c,
      sum(case when a.pegawai_pangkat = 'III/d'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_3d,
      sum(case when a.pegawai_pangkat = 'IV/a'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_4a,
      sum(case when a.pegawai_pangkat = 'IV/b'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_4b,
      sum(case when a.pegawai_pangkat = 'IV/c'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_4c,
      sum(case when a.pegawai_pangkat = 'IV/d'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_4d,
      sum(case when a.pegawai_pangkat = 'IV/e'and a.pegawai_status = 0 then 1 else 0 end) as pgkt_4e
      FROM
      iapi_pegawai as a,
      iapi_city as b
      WHERE
      a.pegawai_city = b.city_id and a.is_trash != 1 and a.pegawai_province = $peprov and a.pegawai_city != 0
      GROUP BY
      b.city_id
      ");
    return $query->result();
  }

  function get_pensiun_city($pecity)
  {
    $query = $this->db_database2->query("
      SELECT
      a.pegawai_nip,
      a.pegawai_fullname,
      a.pegawai_tanggallahir,
      a.pegawai_tempatlahir,
      if(a.pegawai_jenkel = 1, 'Laki-Laki', 'Noket') as kelamin,
      a.pegawai_pendidikan_terakhir as pendidikan,
      b.kua_title,
      a.pegawai_unit_kerja,
      a.pegawai_pangkat,
      a.pegawai_sk_penghulu,
      a.pegawai_tgl_sk_penghulu,
      case
      when a.pegawai_kategory_penghulu = 1 then 'Ahli muda'
      when a.pegawai_kategory_penghulu = 2 then 'Ahli madya'
      when a.pegawai_kategory_penghulu = 3 then 'Ahli pertama'
      end as kategori,
      a.pegawai_jml_angka_kredit,
      a.pegawai_status_tanggal,
      if(a.pegawai_status = 0, 'Pensiun', 'Tidak diketahui') as status_penghulu
      FROM
      iapi_pegawai as a,
      master_kua as b
      WHERE
      a.is_trash != 1 and a.pegawai_status = 0 and a.pegawai_city = $pecity and a.pegawai_kua = b.kua_id and a.pegawai_city != 0
      GROUP BY
      a.pegawai_id
      ");
    return $query->result();
  }

  function getProp($id = null)
  {
    if($id === null){
      $this->setGroup;
      $this->db_database2->select('iapi_province.province_id, iapi_province.province_title as propinsi');
      $this->db_database2->from('iapi_province');
      $this->db_database2->join('iapi_city', 'iapi_city.city_province = iapi_province.province_id');
      $this->db_database2->group_by('province_title');
      return $this->db_database2->get()->result_array();
    }else{
      $this->setGroup;
      $this->db_database2->select('iapi_province.province_id, iapi_province.province_title as provinsi, city_title');
      $this->db_database2->from('iapi_province');
      $this->db_database2->join('iapi_city', 'iapi_city.city_province = iapi_province.province_id');
      $this->db_database2->group_by('city_title');
      $this->db_database2->where('province_id', $id);
      return $this->db_database2->get()->result_array();
    }
  }

  function getKab($id = null)
  {
    if($id === null){
      $this->setGroup;
      $this->db_database2->select('iapi_city.city_id, iapi_city.city_title as kabupaten');
      $this->db_database2->from('iapi_province');
      $this->db_database2->join('iapi_city', 'iapi_city.city_province = iapi_province.province_id');
      $this->db_database2->group_by('city_title');
      return $this->db_database2->get()->result_array();
    }else{
      $this->setGroup;
      $this->db_database2->select('iapi_city.city_id, iapi_city.city_title as kabupaten, iapi_province.province_title as propinsi');
      $this->db_database2->from('iapi_province');
      $this->db_database2->join('iapi_city', 'iapi_city.city_province = iapi_province.province_id');
      $this->db_database2->group_by('city_title');
      $this->db_database2->where('city_id', $id);
      return $this->db_database2->get()->row();
    }
  }

  function getNP()
  {
    $this->setGroup;
    $this->db_database2->select('COUNT(nikah_status) as jumlah_nikah, province_title');
    $this->db_database2->from('master_nikah');
    $this->db_database2->join('iapi_province', 'iapi_province.province_id = master_nikah.nikah_province_id');
    $this->db_database2->group_by('province_title');
    return $this->db_database2->get()->result();
  }

  function getNK()
  {
    $this->setGroup;
    $this->db_database2->select('COUNT(nikah_status) as jumlah_nikah, city_title');
    $this->db_database2->from('master_nikah');
    $this->db_database2->join('iapi_city', 'iapi_city.city_id = master_nikah.nikah_city_id');
    $this->db_database2->group_by('city_title');
    return $this->db_database2->get()->result();
  }

  function getNKK()
  {
    $this->setGroup;
    $this->db_database2->select('COUNT(nikah_status) as jumlah, kua_title');
    $this->db_database2->from('master_nikah');
    $this->db_database2->join('master_kua', 'master_kua.kua_id = master_nikah.nikah_kua_id');
    $this->db_database2->group_by('kua_title');
    return $this->db_database2->get()->result();
  }
}