<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpenais_m extends CI_Model {

	// ----------------------------------------  Data Daerah simas
  function __construct(){
    parent::__construct();
    $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
  }

  public function get_majelis()
  {
    $this->setGroup;
    $query = $this->db_database5->query("
      SELECT a.province_id,a.province_title,
      count( CASE WHEN b.majelis_provinsi = a.province_id THEN 1 ELSE 0 END ) AS jumlah_majelis,
      (select SUM(b.majelis_pengurus_laki) from master_majelis_taklim b where b.is_trash = 0 and a.province_id = b.majelis_provinsi) as pengurus_laki,
      (select SUM(b.majelis_pengurus_perempuan) from master_majelis_taklim b where b.is_trash = 0 and a.province_id = b.majelis_provinsi) as pengurus_perempuan,
      (select SUM(b.majelis_pengurus_jml) from master_majelis_taklim b where b.is_trash = 0 and a.province_id = b.majelis_provinsi) as jumlah_pengurus
      FROM
      app_province a
      LEFT JOIN master_majelis_taklim b ON a.province_id = b.majelis_provinsi
      WHERE
      b.is_trash = 0 and b.majelis_provinsi <> '' and b.majelis_nama is not null and b.majelis_nama <> ''
      GROUP BY
      a.province_id
      ORDER BY
      a.province_id ASC
      ");
    return $query->result();
  }

  public function get_majelis_kabupaten($provinsi)
  {
    $this->setGroup;
    $query = $this->db_database5->query("
      SELECT
      a.city_id,a.city_title,
      sum(case when b.majelis_city = a.city_id then 1 else 0 end) as jum_majelis,
      sum(case when b.majelis_papan = 'ADA' then 1 else 0 end) as jum_papan,
      sum(case when b.majelis_lemari = 'ADA' then 1 else 0 end) as jum_lemari,
      sum(case when b.majelis_meja = 'ADA' then 1 else 0 end) as jum_meja,
      sum(case when b.majelis_alas = 'ADA' then 1 else 0 end) as jum_alas,
      sum(case when b.majelis_komputer = 'ADA' then 1 else 0 end) as jum_komputer,
      sum(case when b.majelis_plang = 'ADA' then 1 else 0 end) as jum_plang
      FROM
      app_city a
      INNER JOIN master_majelis_taklim b ON a.city_id = b.majelis_city
      WHERE
      b.majelis_provinsi = $provinsi AND b.is_trash = 0 and b.majelis_nama is not null and b.majelis_nama <> ''
      GROUP BY
      a.city_id
      ORDER BY
      a.city_id ASC
    ");
    return $query->result();
  }

  public function get_majelis_kecamatan($kabupaten)
  {
    $this->setGroup;
    $query = $this->db_database5->query("
      SELECT
      a.city_title,b.majelis_ketua,b.majelis_pend_ketua,b.majelis_nama,b.majelis_alamat,b.majelis_thn_berdiri,b.majelis_izin_opr,b.majelis_status_tanah,b.majelis_luas_tanah,b.majelis_luas_bangunan,b.majelis_pengurus_laki,b.majelis_pengurus_perempuan,b.majelis_formal,b.majelis_informal,b.majelis_non_formal,b.majelis_kualifikasi,b.majelis_pengajar_laki,b.majelis_pengajar_perempuan,b.majelis_vol_kegiatan,b.majelis_tmp_binaan,b.majelis_materi,majelis_alamat_binaan,b.majelis_profesi,b.majelis_suku,b.majelis_kelompok
      FROM
      app_city a
      INNER JOIN master_majelis_taklim b ON a.city_id = b.majelis_city
      WHERE
      b.majelis_city = $kabupaten AND b.is_trash = 0 and b.majelis_nama is not null and b.majelis_nama <> ''
      GROUP BY
      a.city_id, b.majelis_id
      ORDER BY
      a.city_id ASC
      ");
    return $query->result();
  }

  public function get_seniislam()
  {
    $query = $this->db_database5->query("
      SELECT
      b.lembaga_seni_provinsi,a.province_title,count(b.lembaga_seni_id) AS jum_ls,
      SUM( CASE WHEN b.lembaga_seni_topography = 'DARATAN' THEN 1 ELSE 0 END ) AS topo_kat_darat,
      SUM( CASE WHEN b.lembaga_seni_topography = 'LAUTAN' THEN 1 ELSE 0 END ) AS topo_kat_laut,
      SUM( CASE WHEN b.lembaga_seni_geography = 'KOTA' THEN 1 ELSE 0 END ) AS geo_kat_kota,
      SUM( CASE WHEN b.lembaga_seni_geography = 'DESA' THEN 1 ELSE 0 END ) AS geo_kat_desa,
      SUM( CASE WHEN b.lembaga_seni_geography = 'PELOSOK' THEN 1 ELSE 0 END ) AS geo_kat_pelosok,
      SUM( CASE WHEN b.lembaga_seni_geography = 'PELOSOK TERISOLIR' THEN 1 ELSE 0 END ) AS geo_kat_pelosok_teri
      FROM
      app_province a
      INNER JOIN master_lembaga_seni b ON a.province_id = b.lembaga_seni_provinsi
      WHERE
      b.is_trash = 0
      GROUP BY
      a.province_id,a.province_title
      ORDER BY
      a.province_id ASC
    ");
    return $query->result();
  }

  public function get_seniislam_kabupaten($provinsi)
  {
    $query = $this->db_database5->query("
      SELECT
      a.city_id,a.city_title,
      COUNT( CASE WHEN b.lembaga_seni_id = a.city_id THEN 1 ELSE 0 END ) AS jum_lembaga,
      SUM( CASE WHEN b.lembaga_seni_papan = 'ADA' THEN 1 ELSE 0 END ) AS jum_papan,
      SUM( CASE WHEN b.lembaga_seni_lemari = 'ADA' THEN 1 ELSE 0 END ) AS jum_lemari,
      SUM( CASE WHEN b.lembaga_seni_meja = 'ADA' THEN 1 ELSE 0 END ) AS jum_meja,
      SUM( CASE WHEN b.lembaga_seni_alas = 'ADA' THEN 1 ELSE 0 END ) AS jum_alas,
      SUM( CASE WHEN b.lembaga_seni_komputer = 'ADA' THEN 1 ELSE 0 END ) AS jum_komputer,
      SUM( CASE WHEN b.lembaga_seni_bank = 'ADA' THEN 1 ELSE 0 END ) AS jum_bank,
      SUM( CASE WHEN b.lembaga_seni_plang = 'ADA' THEN 1 ELSE 0 END ) AS jum_plang 
      FROM
      app_city a
      INNER JOIN master_lembaga_seni b ON a.city_id = b.lembaga_seni_city 
      WHERE
      b.is_trash = 0 AND b.lembaga_seni_provinsi = $provinsi 
      GROUP BY
      b.lembaga_seni_city 
      ORDER BY
      b.lembaga_seni_city ASC
    ");
    return $query->result();
  }

  public function get_seniislam_kecamatan($kabupaten)
  {
    $query = $this->db_database5->query("
      SELECT
      a.city_title,b.lembaga_seni_nama,b.lembaga_seni_thn_berdiri,b.lembaga_seni_alamat,b.lembaga_seni_transportasi,b.lembaga_seni_topography,b.lembaga_seni_geography,b.lembaga_seni_izin_opr,
      b.lembaga_seni_no_akte,b.lembaga_seni_status_tanah,b.lembaga_seni_luas_tanah,b.lembaga_seni_luas_bangunan,
      b.lembaga_seni_papan,b.lembaga_seni_lemari,b.lembaga_seni_meja,b.lembaga_seni_alas,b.lembaga_seni_komputer,b.lembaga_seni_plang,b.lembaga_seni_visi,b.lembaga_seni_misi
      FROM
      app_city AS a
      INNER JOIN master_lembaga_seni AS b ON a.city_id = b.lembaga_seni_city 
      WHERE
      b.is_trash = 0 AND b.lembaga_seni_city = $kabupaten
      GROUP BY
      b.lembaga_seni_city,b.lembaga_seni_id 
      ORDER BY
      b.lembaga_seni_city ASC
    ");
    return $query->result();
  }

  public function get_dakwah()
  {
    $query = $this->db_database5->query("
      SELECT
      a.province_id,a.province_title,
      count(case when b.lembaga_id = a.province_id then 1 else 0 end) as jum_dakwah,
      sum(case when b.lembaga_topography = 'DARATAN' then 1 else 0 end) as topo_daratan,
      sum(case when b.lembaga_topography = 'LAUTAN' then 1 else 0 end) as topo_lautan,
      sum(case when b.lembaga_geography = 'KOTA' then 1 else 0 end) as geo_kota,
      sum(case when b.lembaga_geography = 'DESA' then 1 else 0 end) as geo_desa,
      sum(case when b.lembaga_geography = 'PELOSOK' then 1 else 0 end) as geo_pelosok,
      sum(case when b.lembaga_geography = 'PELOSOK TERISOLIR' then 1 else 0 end) as geo_pelosok_terisolir
      FROM
      app_province a
      INNER JOIN master_lembaga_dakwah b ON a.province_id = b.lembaga_provinsi
      WHERE
      b.is_trash = 0
      GROUP BY
      a.province_id
      ORDER BY
      a.province_id ASC
    ");
    return $query->result();
  }

  public function get_dakwah_kabupaten($provinsi)
  {
    $query = $this->db_database5->query("
      SELECT
      b.city_id,b.city_title,
      count(case when c.lembaga_id = b.city_id then 1 else 0 end) as jum_dakwah,
      sum(case when c.lembaga_status_tanah = 'MILIK SEKOLAH/MADRASAH' then 1 else 0 end) as milik_sekolah,
      sum(case when c.lembaga_status_tanah = 'WAKAF' then 1 else 0 end) as milik_wakaf,
      sum(case when c.lembaga_status_tanah = 'YAYASAN' then 1 else 0 end) as milik_yayasan,
      sum(case when c.lembaga_status_tanah = 'PEMERINTAH' then 1 else 0 end) as milik_pemerintah,
      sum(case when c.lembaga_luas_tanah = c.lembaga_city then c.lembaga_luas_tanah else c.lembaga_luas_tanah end) as luas_tanah,
      sum(case when c.lembaga_luas_bangunan = c.lembaga_city then c.lembaga_luas_bangunan else c.lembaga_luas_bangunan end) as luas_bangunan,
      sum(case when c.lembaga_pengurus_laki = c.lembaga_city then c.lembaga_pengurus_laki else c.lembaga_pengurus_laki end) as jum_pngrs_laki,
      sum(case when c.lembaga_pengurus_perempuan = c.lembaga_city then c.lembaga_pengurus_perempuan else c.lembaga_pengurus_perempuan end) as jum_pngrs_perempuan
      FROM
      app_province a
      INNER JOIN master_lembaga_dakwah c ON a.province_id = c.lembaga_provinsi
      INNER JOIN app_city b ON c.lembaga_city = b.city_id
      WHERE
      c.is_trash = 0 AND a.province_id = $provinsi
      GROUP BY
      b.city_id,a.province_id
      ORDER BY
      b.city_id ASC
    ");
    return $query->result();
  }

  public function get_dakwah_kecamatan($kabupaten)
  {
    $query = $this->db_database5->query("
      SELECT
      a.city_id,a.city_title,b.lembaga_ketua,b.lembaga_nama,b.lembaga_thn_berdiri,b.lembaga_alamat,b.lembaga_no_akte,b.lembaga_izin_opr,b.lembaga_topography,b.lembaga_geography,b.lembaga_transportasi,
      b.lembaga_status_tanah,b.lembaga_no_sertifikat,b.lembaga_luas_tanah,b.lembaga_luas_bangunan,b.lembaga_pengurus_laki,b.lembaga_pengurus_perempuan,b.lembaga_papan,b.lembaga_lemari,b.lembaga_meja,
      b.lembaga_alas,b.lembaga_komputer,b.lembaga_plang,b.lembaga_visi,b.lembaga_misi,b.lembaga_afiliasi
      FROM
      app_city AS a
      INNER JOIN master_lembaga_dakwah AS b ON a.city_id = b.lembaga_city
      WHERE
      b.is_trash = 0 AND a.city_id = $kabupaten
      GROUP BY
      a.city_id,b.lembaga_id
      ORDER BY
      a.city_id ASC
    ");
    return $query->result();
  }

  public function get_ormas()
  {
    $query = $this->db_database5->query("
      SELECT
      a.province_id,a.province_title,
      count(case when b.ormas_id = a.province_id then 1 else 0 end) as jum_ormas,
      sum(case when b.ormas_topography = 'DARATAN' then 1 else 0 end) as topo_darat,
      sum(case when b.ormas_topography = 'LAUTAN' then 1 else 0 end) as topo_lautan,
      sum(case when b.ormas_geography = 'KOTA' then 1 else 0 end) as geo_kota,
      sum(case when b.ormas_geography = 'DESA' then 1 else 0 end) as geo_desa,
      sum(case when b.ormas_geography = 'PELOSOK' then 1 else 0 end) as geo_pelosok,
      sum(case when b.ormas_geography = 'PELOSOK TERISOLIR' then 1 else 0 end) as geo_pelosok_terisolir
      FROM
      app_province a
      INNER JOIN master_ormas b ON a.province_id = b.ormas_provinsi
      WHERE
      b.is_trash = 0
      GROUP BY
      a.province_id
      ORDER BY
      a.province_id ASC
    ");
    return $query->result();
  }

  public function get_ormas_kabupaten($provinsi)
  {
    $query = $this->db_database5->query("
      SELECT
      b.city_id,b.city_title,
      count(case when c.ormas_id = b.city_id then 1 else 0 end) as jum_ormas,
      sum(case when c.ormas_status_tanah = 'MILIK SEKOLAH/MADRASAH' then 1 else 0 end) as milik_sekolah,
      sum(case when c.ormas_status_tanah = 'WAKAF' then 1 else 0 end) as milik_wakaf,
      sum(case when c.ormas_status_tanah = 'YAYASAN' then 1 else 0 end) as milik_yayasan,
      sum(case when c.ormas_status_tanah = 'PEMERINTAH' then 1 else 0 end) as milik_pemerintah,
      sum(case when c.ormas_luas_tanah = b.city_id then 1 else 0 end) as luas_tanah,
      sum(case when c.ormas_luas_bangunan = b.city_id then 1 else 0 end) as luas_bangunan
      FROM
      app_province a
      INNER JOIN master_ormas c ON a.province_id = c.ormas_provinsi
      INNER JOIN app_city b ON c.ormas_city = b.city_id
      WHERE
      c.is_trash = 0 AND a.province_id = $provinsi
      GROUP BY
      a.province_id,c.ormas_city
      ORDER BY
      a.province_id ASC
    ");
    return $query->result();
  }

  public function get_ormas_kecamatan($kabupaten)
  {
    $query = $this->db_database5->query("
      SELECT
      b.ormas_ketua,b.ormas_nama,b.ormas_thn_berdiri,b.ormas_alamat,b.ormas_izin_opr,b.ormas_transportasi,b.ormas_topography,b.ormas_geography,b.ormas_status_tanah,b.ormas_luas_tanah,
      b.ormas_luas_bangunan,b.ormas_pengurus_laki,b.ormas_pengurus_perempuan,b.ormas_papan,b.ormas_lemari,
      b.ormas_meja,b.ormas_alas,b.ormas_komputer,b.ormas_plang,b.ormas_visi,b.ormas_misi,b.ormas_afiliasi
      FROM
      app_city AS a
      INNER JOIN master_ormas AS b ON a.city_id = b.ormas_city
      WHERE
      b.is_trash = 0 AND a.city_id = $kabupaten
      GROUP BY
      a.city_id,b.ormas_id
      ORDER BY
      a.city_id ASC
    ");
    return $query->result();
  }

  public function get_dewanhakim()
  {
    $query = $this->db_database5->query("
      SELECT
      a.province_id,a.province_title,
      count(case when b.dewan_id = a.province_id then 1 else 0 end) as jum_dewan,
      sum(case when b.dewan_daerah_sunda = a.province_id then b.dewan_daerah_sunda else b.dewan_daerah_sunda end) as jum_dewan_sunda,
      sum(case when b.dewan_daerah_jawa = a.province_id then b.dewan_daerah_jawa else b.dewan_daerah_jawa end) as jum_dewan_jawa,
      sum(case when b.dewan_daerah_sumatera = a.province_id then b.dewan_daerah_sumatera else b.dewan_daerah_sumatera end) as jum_dewan_sumatera,
      sum(case when b.dewan_daerah_sulawesi = a.province_id then b.dewan_daerah_sulawesi else b.dewan_daerah_sulawesi end) as jum_dewan_sulawesi,
      sum(case when b.dewan_daerah_lain = a.province_id then b.dewan_daerah_lain else b.dewan_daerah_lain end) as jum_dewan_lain,
      sum(case when b.dewan_asing_inggris = a.province_id then b.dewan_asing_inggris else b.dewan_asing_inggris end) as dewan_asing_inggris,
      sum(case when b.dewan_asing_arab = a.province_id then b.dewan_asing_arab else b.dewan_asing_arab end) as dewan_asing_arab,
      sum(case when b.dewan_asing_lain = a.province_id then b.dewan_asing_lain else b.dewan_asing_lain end) as dewan_asing_lain
      FROM
      app_province a
      INNER JOIN master_dewan b ON a.province_id = b.dewan_provinsi
      WHERE
      b.is_trash = 0 and b.dewan_provinsi <> '' and b.dewan_nama is not null and b.dewan_nama <> ''
      GROUP BY
      a.province_id,a.province_title
      ORDER BY
      a.province_id ASC
    ");
    return $query->result();
  }

  public function get_dewanhakim_kabupaten($provinsi)
  {
    $query = $this->db_database5->query("
      SELECT
      b.city_id,b.city_title,
      count(case when c.dewan_id = b.city_id then 1 else 0 end) as jum_dewan,
      sum(case when c.dewan_jenis_kelamin = 'PEREMPUAN' then 1 else 0 end) as jum_perempuan,
      sum(case when c.dewan_jenis_kelamin = 'LAKI-LAKI' then 1 else 0 end) as jum_pria,
      sum(case when c.dewan_status_kawin = 'KAWIN' then 1 else 0 end) as status_kawin,
      sum(case when c.dewan_status_kawin = 'BELUM KAWIN' then 1 else 0 end) as status_belum_kawin,
      sum(case when c.dewan_pendidikan = 'SMP/MTS' then 1 else 0 end) as pend_smp,
      sum(case when c.dewan_pendidikan = 'SMA/MA/STM' then 1 else 0 end) as pend_sma,
      sum(case when c.dewan_pendidikan = 'PESANTREN' then 1 else 0 end) as pend_pesantren,
      sum(case when c.dewan_pendidikan = 'DIPLOMA I' then 1 else 0 end) as pend_diploma1,
      sum(case when c.dewan_pendidikan = 'DIPLOMA II' then 1 else 0 end) as pend_diploma2,
      sum(case when c.dewan_pendidikan = 'DIPLOMA III' then 1 else 0 end) as pend_diploma3,
      sum(case when c.dewan_pendidikan = 'S1' then 1 else 0 end) as pend_s1,
      sum(case when c.dewan_pendidikan = 'S2' then 1 else 0 end) as pend_s2,
      sum(case when c.dewan_pendidikan = 'S3' then 1 else 0 end) as pend_s3
      FROM
      app_province a
      INNER JOIN master_dewan c ON a.province_id = c.dewan_provinsi
      INNER JOIN app_city b ON c.dewan_city = b.city_id
      WHERE
      c.is_trash = 0 and c.dewan_provinsi <> '' and c.dewan_nama is not null and c.dewan_nama <> '' and a.province_id = $provinsi
      GROUP BY
      a.province_id,c.dewan_city
      ORDER BY
      a.province_id ASC
    ");
    return $query->result();
  }

  public function get_dewanhakim_kecamatan($kabupaten)
  {
    $query = $this->db_database5->query("
      SELECT
      b.dewan_nama,b.dewan_jenis_kelamin,b.dewan_tmp_lahir,b.dewan_tgl_lahir,b.dewan_alamat,b.dewan_status_kawin,
      b.dewan_pendidikan,b.dewan_asing_inggris,b.dewan_asing_arab,b.dewan_asing_lain,b.dewan_daerah_sunda,
      b.dewan_daerah_jawa,b.dewan_daerah_sumatera,b.dewan_daerah_sulawesi,b.dewan_daerah_lain,b.dewan_nama_keg1,
      b.dewan_nama_keg2,b.dewan_nama_keg3,b.dewan_nama_keg4
      FROM
      app_city AS a
      INNER JOIN master_dewan AS b ON a.city_id = b.dewan_city
      WHERE
      b.is_trash = 0 and b.dewan_provinsi <> '' and b.dewan_nama is not null and b.dewan_nama <> '' and a.city_id = $kabupaten
      GROUP BY
      a.city_id,b.dewan_id
      ORDER BY
      a.city_id ASC
    ");
    return $query->result();
  }

  public function get_gurungaji()
  {
    $query = $this->db_database5->query("
      SELECT
      a.province_id,a.province_title,
      count(b.tokoh_id) AS jum_tokoh,
      sum(case when b.tokoh_jenis_kelamin = 'LAKI-LAKI' then 1 else 0 end) as tokoh_pria,
      sum(case when b.tokoh_jenis_kelamin = 'PEREMPUAN' then 1 else 0 end) as tokoh_perempuan,
      sum(case when b.tokoh_status_kawin = 'KAWIN' then 1 else 0 end) as tokoh_kawin,
      sum(case when b.tokoh_status_kawin = 'BELUM KAWIN' then 1 else 0 end) as tokoh_belum_kawin
      FROM
      app_province a
      INNER JOIN master_tokoh b ON a.province_id = b.tokoh_provinsi
      WHERE
      b.is_trash = 0 and b.tokoh_provinsi <> '' and b.tokoh_nama is not null and b.tokoh_nama <> ''
      GROUP BY
      a.province_id,b.tokoh_provinsi
      ORDER BY
      a.province_id ASC
    ");
    return $query->result();
  }

  public function get_gurungaji_kabupaten($provinsi)
  {
    $query = $this->db_database5->query("
      SELECT
      b.city_id,b.city_title,
      count(c.tokoh_id) as jum_tokoh,
      sum(case when c.tokoh_jenis_kelamin = 'LAKI-LAKI' then 1 else 0 end) As jum_pria,
      sum(case when c.tokoh_jenis_kelamin = 'PEREMPUAN' then 1 else 0 end) As jum_perempuan,
      sum( CASE WHEN c.tokoh_status_kawin = 'KAWIN' THEN 1 ELSE 0 END ) AS jum_kawin,
      sum( CASE WHEN c.tokoh_status_kawin = 'BELUM KAWIN' THEN 1 ELSE 0 END ) AS jum_belum_kawin,
      sum(case when c.tokoh_pendidikan = 'SMP/MTS' then 1 else 0 end) as pend_smp,
      sum(case when c.tokoh_pendidikan = 'SMA/MA/STM' then 1 else 0 end) as pend_sma,
      sum(case when c.tokoh_pendidikan = 'PESANTREN' then 1 else 0 end) as pend_pesantren,
      sum(case when c.tokoh_pendidikan = 'DIPLOMA I' then 1 else 0 end) as pend_diploma1,
      sum(case when c.tokoh_pendidikan = 'DIPLOMA II' then 1 else 0 end) as pend_diploma2,
      sum(case when c.tokoh_pendidikan = 'DIPLOMA III' then 1 else 0 end) as pend_diploma3,
      sum(case when c.tokoh_pendidikan = 'S1' then 1 else 0 end) as pend_s1,
      sum(case when c.tokoh_pendidikan = 'S2' then 1 else 0 end) as pend_s2,
      sum(case when c.tokoh_pendidikan = 'S3' then 1 else 0 end) as pend_s3
      FROM
      app_province a
      INNER JOIN master_tokoh c ON a.province_id = c.tokoh_provinsi
      INNER JOIN app_city b ON c.tokoh_city = b.city_id
      WHERE
      c.is_trash = 0 and c.tokoh_provinsi <> '' and c.tokoh_nama is not null and c.tokoh_nama <> '' AND a.province_id = $provinsi
      GROUP BY
      a.province_id,c.tokoh_city
      ORDER BY
      b.city_id ASC
    ");
    return $query->result();
  }

  public function get_gurungaji_kecamatan($kabupaten)
  {
    $query = $this->db_database5->query("
      SELECT
      b.tokoh_nama,b.tokoh_tempat_lahir,b.tokoh_tgl_lahir,b.tokoh_jenis_kelamin,b.tokoh_alamat,b.tokoh_status_kawin,
      b.tokoh_pendidikan,b.tokoh_etnis,b.tokoh_gol_darah,b.tokoh_tinggi,b.tokoh_berat,b.tokoh_rambut,b.tokoh_muka,
      b.tokoh_kulit
      FROM
      app_city a
      INNER JOIN master_tokoh b ON a.city_id = b.tokoh_city
      WHERE
      a.city_id = $kabupaten AND b.is_trash = 0 and b.tokoh_provinsi <> '' and b.tokoh_nama is not null and b.tokoh_nama <> ''
      GROUP BY
      a.city_id,b.tokoh_id
      ORDER BY
      a.city_id ASC
    ");
    return $query->result();
  }

  public function get_lptq()
  {
    $query = $this->db_database5->query("
      SELECT
      a.province_id,a.province_title,
      count( CASE WHEN b.lsm_provinsi = a.province_id THEN 1 ELSE 0 END ) AS jum_lsm,
      sum( CASE WHEN b.lsm_topography = 'DARATAN' THEN 1 ELSE 0 END ) AS topo_daratan,
      sum( CASE WHEN b.lsm_topography = 'LAUTAN' THEN 1 ELSE 0 END ) AS topo_lautan,
      sum( CASE WHEN b.lsm_geography = 'KOTA' THEN 1 ELSE 0 END ) AS geo_kota,
      sum( CASE WHEN b.lsm_geography = 'DESA' THEN 1 ELSE 0 END ) AS geo_desa,
      sum( CASE WHEN b.lsm_geography = 'PELOSOK' THEN 1 ELSE 0 END ) AS geo_pelosok,
      sum( CASE WHEN b.lsm_geography = 'PELOSOK TERISOLIR' THEN 1 ELSE 0 END ) AS geo_pelosok_terisolir
      FROM
      app_province a
      INNER JOIN master_lsm b ON a.province_id = b.lsm_provinsi 
      WHERE
      b.is_trash = 0 
      GROUP BY
      a.province_id 
      ORDER BY
      a.province_id ASC
    ");
    return $query->result();
  }

  public function get_lptq_kabupaten($provinsi)
  {
    $query = $this->db_database5->query("
      SELECT
      c.lsm_city,
      b.city_title,
      count(c.lsm_id) as jum_lsm,
      sum( CASE WHEN c.lsm_topography = 'DARATAN' THEN 1 ELSE 0 END ) AS topo_daratan,
      sum( CASE WHEN c.lsm_topography = 'LAUTAN' THEN 1 ELSE 0 END ) AS topo_lautan,
      sum( CASE WHEN c.lsm_geography = 'KOTA' THEN 1 ELSE 0 END ) AS geo_kota,
      sum( CASE WHEN c.lsm_geography = 'DESA' THEN 1 ELSE 0 END ) AS geo_desa,
      sum( CASE WHEN c.lsm_geography = 'PELOSOK' THEN 1 ELSE 0 END ) AS geo_pelosok,
      sum( CASE WHEN c.lsm_geography = 'PELOSOK TERISOLIR' THEN 1 ELSE 0 END ) AS geo_pelosok_terisolir
      FROM
      app_province AS a
      INNER JOIN app_city AS b ON a.province_id = b.city_province
      LEFT JOIN master_lsm AS c ON c.lsm_city = b.city_id
      WHERE
      a.province_id = $provinsi and c.is_trash = 0
      GROUP BY
      a.province_id,b.city_id
      ORDER BY
      b.city_id ASC
    ");
    return $query->result();
  }

  public function get_lptq_kecamatan($kabupaten)
  {
    $query = $this->db_database5->query("
      SELECT
      a.lsm_nama,
      a.lsm_alamat,
      a.lsm_thn_berdiri,
      a.lsm_afiliasi,
      a.lsm_nama_ketua
      FROM
      master_lsm as a
      WHERE
      a.lsm_city = $kabupaten
      GROUP BY
      a.lsm_id
    ");
    return $query->result();
  }

  public function get_hafidz()
  {
    $query = $this->db_database5->query("
      SELECT
      a.province_id,a.province_title,
      count(b.hafiz_id) as jum_hafiz,
      sum(case when b.hafiz_jenis_kelamin = 'LAKI-LAKI' then 1 else 0 end) as hafiz_pria,
      sum(case when b.hafiz_jenis_kelamin = 'PEREMPUAN' then 1 else 0 end) as hafiz_perempuan,
      sum(case when b.hafiz_status_kawin = 'KAWIN' then 1 else 0 end) as hafiz_kawin,
      sum(case when b.hafiz_status_kawin = 'BELUM KAWIN' then 1 else 0 end) as hafiz_belum_kawin
      FROM
      app_province a
      INNER JOIN master_hafiz b ON a.province_id = b.hafiz_provinsi
      WHERE
      b.is_trash = 0
      GROUP BY
      a.province_id,a.province_title
      ORDER BY
      a.province_id ASC
    ");
    return $query->result();
  }

  public function get_hafidz_kabupaten($provinsi)
  {
    $query = $this->db_database5->query("
      SELECT
      b.city_id,b.city_title,
      count(c.hafiz_id) as jum_hafiz,
      sum(case when c.hafiz_pendidikan = 'SMP/MTS' then 1 else 0 end) as pend_smp,
      sum(case when c.hafiz_pendidikan = 'SMA/MA/STM' then 1 else 0 end) as pend_sma,
      sum(case when c.hafiz_pendidikan = 'PESANTREN' then 1 else 0 end) as pend_pesantren,
      sum(case when c.hafiz_pendidikan = 'DIPLOMA I' then 1 else 0 end) as pend_diploma1,
      sum(case when c.hafiz_pendidikan = 'DIPLOMA II' then 1 else 0 end) as pend_diploma2,
      sum(case when c.hafiz_pendidikan = 'DIPLOMA III' then 1 else 0 end) as pend_diploma3,
      sum(case when c.hafiz_pendidikan = 'S1' then 1 else 0 end) as pend_s1,
      sum(case when c.hafiz_pendidikan = 'S2' then 1 else 0 end) as pend_s2,
      sum(case when c.hafiz_pendidikan = 'S3' then 1 else 0 end) as pend_s3
      FROM
      app_province a
      INNER JOIN master_hafiz c ON a.province_id = c.hafiz_provinsi
      INNER JOIN app_city b ON c.hafiz_city = b.city_id
      WHERE
      c.is_trash = 0 AND a.province_id = $provinsi
      GROUP BY
      a.province_id,b.city_id
      ORDER BY
      b.city_id ASC
    ");
    return $query->result();
  }

  public function get_hafidz_kecamatan($kabupaten)
  {
    $query = $this->db_database5->query("
      SELECT
      b.hafiz_nama,b.hafiz_nama_ayah,b.hafiz_nama_ibu,b.hafiz_nama_istri_suami,b.hafiz_alamat,b.hafiz_tempat_lahir,b.hafiz_tgl_lahir,b.hafiz_jenis_kelamin,b.hafiz_status_kawin,b.hafiz_tinggi,
      b.hafiz_berat,b.hafiz_rambut,b.hafiz_muka,b.hafiz_kulit,b.hafiz_gol_darah,b.hafiz_pendidikan,b.hafiz_pekerjaan
      FROM
      app_city AS a
      INNER JOIN master_hafiz AS b ON a.city_id = b.hafiz_city
      WHERE
      b.is_trash = 0 AND
      a.city_id = $kabupaten
      GROUP BY
      a.city_id,
      b.hafiz_id
      ORDER BY
      a.city_id ASC
    ");
    return $query->result();
  }

  public function get_qari()
  {
    $query = $this->db_database5->query("
      SELECT
      a.province_id,a.province_title,
      count(b.qari_id) as jum_qari,
      sum(case when b.qari_jenis_kelamin = 'LAKI-LAKI' then 1 else 0 end) as qari_pria,
      sum(case when b.qari_jenis_kelamin = 'PEREMPUAN' then 1 else 0 end) as qari_perempuan,
      sum(case when b.qari_status_kawin = 'KAWIN' then 1 else 0 end) as qari_kawin,
      sum(case when b.qari_status_kawin = 'BELUM KAWIN' then 1 else 0 end) as qari_belum_kawin
      FROM
      app_province a
      INNER JOIN master_qari b ON a.province_id = b.qari_provinsi
      WHERE
      b.is_trash = 0
      GROUP BY
      a.province_id
      ORDER BY
      a.province_id ASC
    ");
    return $query->result();
  }

  public function get_qari_kabupaten($provinsi)
  {
    $query = $this->db_database5->query("
      SELECT
      b.city_id,b.city_title,
      count(c.qari_id) as jum_qari,
      sum(case when c.qari_pendidikan = 'SMP/MTS' then 1 else 0 end) as pend_smp,
      sum(case when c.qari_pendidikan = 'SMA/MA/STM' then 1 else 0 end) as pend_sma,
      sum(case when c.qari_pendidikan = 'PESANTREN' then 1 else 0 end) as pend_pesantren,
      sum(case when c.qari_pendidikan = 'DIPLOMA I' then 1 else 0 end) as pend_diploma1,
      sum(case when c.qari_pendidikan = 'DIPLOMA II' then 1 else 0 end) as pend_diploma2,
      sum(case when c.qari_pendidikan = 'DIPLOMA III' then 1 else 0 end) as pend_diploma3,
      sum(case when c.qari_pendidikan = 'S1' then 1 else 0 end) as pend_s1,
      sum(case when c.qari_pendidikan = 'S2' then 1 else 0 end) as pend_s2,
      sum(case when c.qari_pendidikan = 'S3' then 1 else 0 end) as pend_s3
      FROM
      app_province a
      INNER JOIN master_qari c ON a.province_id = c.qari_provinsi
      INNER JOIN app_city b ON b.city_id = c.qari_city
      WHERE
      c.is_trash = 0 AND a.province_id = $provinsi
      GROUP BY
      a.province_id,b.city_id
      ORDER BY
      b.city_id ASC
    ");
    return $query->result();
  }

  public function get_qari_kecamatan($kabupaten)
  {
    $query = $this->db_database5->query("
      SELECT
      b.qari_nama,b.qari_nama_ayah,b.qari_nama_ibu,b.qari_nama_istri_suami,b.qari_tempat_lahir,b.qari_tgl_lahir,
      b.qari_jenis_kelamin,b.qari_alamat,b.qari_gol_darah,b.qari_tinggi,b.qari_berat,b.qari_rambut,b.qari_muka,
      b.qari_kulit,b.qari_status_kawin,b.qari_pendidikan,b.qari_pekerjaan,b.qari_etnis
      FROM
      app_city AS a
      INNER JOIN master_qari AS b ON a.city_id = b.qari_city
      WHERE
      b.is_trash = 0 AND
      a.city_id = $kabupaten
      GROUP BY
      a.city_id,
      b.qari_id
      ORDER BY
      a.city_id ASC
    ");
    return $query->result();
  }

  public function get_mufassir()
  {
    $query = $this->db_database5->query("
      SELECT
      a.province_id,a.province_title,
      count(b.mufassir_id) as jum_mufassir,
      sum(case when b.mufassir_jenis_kelamin = 'LAKI-LAKI' then 1 else 0 end) as mufassir_pria,
      sum(case when b.mufassir_jenis_kelamin = 'PEREMPUAN' then 1 else 0 end) as mufassir_perempuan,
      sum(case when b.mufassir_status_kawin = 'KAWIN' then 1 else 0 end) as mufassir_kawin,
      sum(case when b.mufassir_status_kawin = 'BELUM KAWIN' then 1 else 0 end) as mufassir_belum_kawin
      FROM
      app_province a
      INNER JOIN master_mufassir b ON a.province_id = b.mufassir_provinsi
      WHERE
      b.is_trash = 0
      GROUP BY
      a.province_id
      ORDER BY
      a.province_id ASC
    ");
    return $query->result();
  }

  public function get_mufassir_kabupaten($provinsi)
  {
    $query = $this->db_database5->query("
      SELECT
      b.city_id,b.city_title,
      count(c.mufassir_id) as jum_mufassir,
      sum(case when c.mufassir_pendidikan = 'SMP/MTS' then 1 else 0 end) as pend_smp,
      sum(case when c.mufassir_pendidikan = 'SMA/MA/STM' then 1 else 0 end) as pend_sma,
      sum(case when c.mufassir_pendidikan = 'PESANTREN' then 1 else 0 end) as pend_pesantren,
      sum(case when c.mufassir_pendidikan = 'DIPLOMA I' then 1 else 0 end) as pend_diploma1,
      sum(case when c.mufassir_pendidikan = 'DIPLOMA II' then 1 else 0 end) as pend_diploma2,
      sum(case when c.mufassir_pendidikan = 'DIPLOMA III' then 1 else 0 end) as pend_diploma3,
      sum(case when c.mufassir_pendidikan = 'S1' then 1 else 0 end) as pend_s1,
      sum(case when c.mufassir_pendidikan = 'S2' then 1 else 0 end) as pend_s2,
      sum(case when c.mufassir_pendidikan = 'S3' then 1 else 0 end) as pend_s3
      FROM
      app_province a
      INNER JOIN master_mufassir c ON a.province_id = c.mufassir_provinsi
      INNER JOIN app_city b ON b.city_id = c.mufassir_city
      WHERE
      c.is_trash = 0 AND a.province_id = $provinsi
      GROUP BY
      a.province_id,b.city_id
      ORDER BY
      b.city_id ASC
    ");
    return $query->result();
  }

  public function get_mufassir_kecamatan($kabupaten)
  {
    $query = $this->db_database5->query("
      SELECT
      b.mufassir_nama,b.mufassir_nama_ayah,b.mufassir_nama_ibu,b.mufassir_nama_istri_suami,b.mufassir_tempat_lahir,b.mufassir_tgl_lahir,b.mufassir_jenis_kelamin,b.mufassir_alamat,b.mufassir_status_kawin,b.mufassir_gol_darah,b.mufassir_tinggi,b.mufassir_berat,b.mufassir_rambut,b.mufassir_muka,b.mufassir_kulit,b.mufassir_etnis,b.mufassir_pekerjaan
      FROM
      app_city AS a
      INNER JOIN master_mufassir AS b ON a.city_id = b.mufassir_city
      WHERE
      b.is_trash = 0 AND a.city_id = $kabupaten
      GROUP BY
      a.city_id,b.mufassir_id
      ORDER BY
      a.city_id ASC
    ");
    return $query->result();
  }

  public function get_kaligrafer()
  {
    $query = $this->db_database5->query("
      SELECT
      a.province_id,a.province_title,
      count(b.kaligrafer_id) as jum_kaligrafer,
      sum(case when b.kaligrafer_jenis_kelamin = 'LAKI-LAKI' then 1 else 0 end) as klgf_pria,
      sum(case when b.kaligrafer_jenis_kelamin = 'PEREMPUAN' then 1 else 0 end) as klgf_perempuan,
      sum(case when b.kaligrafer_status_kawin = 'KAWIN' then 1 else 0 end) as klgf_kawin,
      sum(case when b.kaligrafer_status_kawin = 'BELUM KAWIN' then 1 else 0 end) as klgf_belum_kawin
      FROM
      app_province a
      INNER JOIN master_kaligrafer b ON a.province_id = b.kaligrafer_provinsi
      WHERE
      b.is_trash = 0
      GROUP BY
      a.province_id
      ORDER BY
      a.province_id ASC
      ");
    return $query->result();
  }

  public function get_kaligrafer_kabupaten($provinsi)
  {
    $query = $this->db_database5->query("
      SELECT
      b.city_id,b.city_title,
      count(c.kaligrafer_id) as jum_kaligrafer,
      sum(case when c.kaligrafer_pendidikan = 'SMP/MTS' then 1 else 0 end) as pend_smp,
      sum(case when c.kaligrafer_pendidikan = 'SMA/MA/STM' then 1 else 0 end) as pend_sma,
      sum(case when c.kaligrafer_pendidikan = 'PESANTREN' then 1 else 0 end) as pend_pesantren,
      sum(case when c.kaligrafer_pendidikan = 'DIPLOMA I' then 1 else 0 end) as pend_diploma1,
      sum(case when c.kaligrafer_pendidikan = 'DIPLOMA II' then 1 else 0 end) as pend_diploma2,
      sum(case when c.kaligrafer_pendidikan = 'DIPLOMA III' then 1 else 0 end) as pend_diploma3,
      sum(case when c.kaligrafer_pendidikan = 'S1' then 1 else 0 end) as pend_s1,
      sum(case when c.kaligrafer_pendidikan = 'S2' then 1 else 0 end) as pend_s2,
      sum(case when c.kaligrafer_pendidikan = 'S3' then 1 else 0 end) as pend_s3
      FROM
      app_province a
      INNER JOIN master_kaligrafer c ON a.province_id = c.kaligrafer_provinsi
      INNER JOIN app_city b ON b.city_id = c.kaligrafer_city
      WHERE
      c.is_trash = 0 AND a.province_id = $provinsi
      GROUP BY
      a.province_id,b.city_id
      ORDER BY
      b.city_id ASC
      ");
    return $query->result();
  }

  public function get_kaligrafer_kecamatan($kabupaten)
  {
    $query = $this->db_database5->query("
      SELECT
      b.kaligrafer_nama,b.kaligrafer_nama_ayah,b.kaligrafer_nama_ibu,b.kaligrafer_nama_istri_suami,b.kaligrafer_tempat_lahir,b.kaligrafer_tgl_lahir,b.kaligrafer_jenis_kelamin,b.kaligrafer_alamat,b.kaligrafer_status_kawin,b.kaligrafer_gol_darah,b.kaligrafer_tinggi,b.kaligrafer_berat,b.kaligrafer_rambut,
      b.kaligrafer_muka,b.kaligrafer_kulit,b.kaligrafer_etnis,b.kaligrafer_pendidikan,b.kaligrafer_pekerjaan
      FROM
      app_city AS a
      INNER JOIN master_kaligrafer AS b ON a.city_id = b.kaligrafer_city
      WHERE
      b.is_trash = 0 AND a.city_id = $kabupaten
      GROUP BY
      a.city_id,b.kaligrafer_id
      ORDER BY
      a.city_id ASC
      ");
    return $query->result();
  }

  public function get_seniman()
  {
    $query = $this->db_database5->query("
      SELECT
      a.province_id,a.province_title,
      count(b.seniman_id) as jum_seniman,
      sum(case when b.seniman_jenis_kelamin = 'LAKI-LAKI' then 1 else 0 end) as snmn_pria,
      sum(case when b.seniman_jenis_kelamin = 'PEREMPUAN' then 1 else 0 end) as snmn_perempuan,
      sum(case when b.seniman_status_kawin = 'KAWIN' then 1 else 0 end) as snmn_kawin,
      sum(case when b.seniman_status_kawin = 'BELUM KAWIN' then 1 else 0 end) as snmn_belum_kawin
      FROM
      app_province a
      INNER JOIN master_seniman b ON a.province_id = b.seniman_provinsi
      WHERE
      b.is_trash = 0
      GROUP BY
      a.province_id
      ORDER BY
      a.province_id ASC
      ");
    return $query->result();
  }

  public function get_seniman_kabupaten($provinsi)
  {
    $query = $this->db_database5->query("
      SELECT
      b.city_id,b.city_title,
      count(c.seniman_id) as jum_seniman,
      sum(case when c.seniman_pendidikan = 'SMP/MTS' then 1 else 0 end) as pend_smp,
      sum(case when c.seniman_pendidikan = 'SMA/MA/STM' then 1 else 0 end) as pend_sma,
      sum(case when c.seniman_pendidikan = 'PESANTREN' then 1 else 0 end) as pend_pesantren,
      sum(case when c.seniman_pendidikan = 'DIPLOMA I' then 1 else 0 end) as pend_diploma1,
      sum(case when c.seniman_pendidikan = 'DIPLOMA II' then 1 else 0 end) as pend_diploma2,
      sum(case when c.seniman_pendidikan = 'DIPLOMA III' then 1 else 0 end) as pend_diploma3,
      sum(case when c.seniman_pendidikan = 'S1' then 1 else 0 end) as pend_s1,
      sum(case when c.seniman_pendidikan = 'S2' then 1 else 0 end) as pend_s2,
      sum(case when c.seniman_pendidikan = 'S3' then 1 else 0 end) as pend_s3
      FROM
      app_province a
      INNER JOIN master_seniman c ON a.province_id = c.seniman_provinsi
      INNER JOIN app_city b ON b.city_id = c.seniman_city
      WHERE
      c.is_trash = 0 AND a.province_id = $provinsi
      GROUP BY
      a.province_id,b.city_id
      ORDER BY
      b.city_id ASC
      ");
    return $query->result();
  }

  public function get_seniman_kecamatan($kabupaten)
  {
    $query = $this->db_database5->query("
      SELECT
      b.seniman_nama,b.seniman_nama_ayah,b.seniman_nama_ibu,b.seniman_nama_istri_suami,b.seniman_tempat_lahir,
      b.seniman_tgl_lahir,b.seniman_jenis_kelamin,b.seniman_alamat,b.seniman_gol_darah,b.seniman_tinggi,
      b.seniman_berat,b.seniman_rambut,b.seniman_muka,b.seniman_kulit,b.seniman_status_kawin,b.seniman_pendidikan,
      b.seniman_etnis
      FROM
      app_city AS a
      INNER JOIN master_seniman AS b ON a.city_id = b.seniman_city
      WHERE
      b.is_trash = 0 AND a.city_id = $kabupaten
      GROUP BY
      a.city_id,b.seniman_id
      ORDER BY
      a.city_id ASC
      ");
    return $query->result();
  }

  public function get_budayawan()
  {
    $query = $this->db_database5->query("
      SELECT
      a.province_id,a.province_title,
      count(b.budayawan_muslim_id) as jum_bdymuslim,
      sum(case when b.budayawan_muslim_jenis_kelamin = 'LAKI-LAKI' then 1 else 0 end) as muslim_pria,
      sum(case when b.budayawan_muslim_jenis_kelamin = 'PEREMPUAN' then 1 else 0 end) as muslim_perempuan,
      sum(case when b.budayawan_muslim_status_kawin = 'KAWIN' then 1 else 0 end) as muslim_kawin,
      sum(case when b.budayawan_muslim_status_kawin = 'BELUM KAWIN' then 1 else 0 end) as muslim_belum_kawin
      FROM
      app_province a
      INNER JOIN master_budayawan_muslim b ON a.province_id = b.budayawan_muslim_provinsi
      WHERE
      b.is_trash = 0
      GROUP BY
      a.province_id
      ORDER BY
      a.province_id ASC
      ");
    return $query->result();
  }

  public function get_budayawan_kabupaten($provinsi)
  {
    $query = $this->db_database5->query("
      SELECT
      b.city_id,b.city_title,
      count(c.budayawan_muslim_id) as jum_bdymuslim,
      sum(case when c.budayawan_muslim_pendidikan = 'SMP/MTS' then 1 else 0 end) as pend_smp,
      sum(case when c.budayawan_muslim_pendidikan = 'SMA/MA/STM' then 1 else 0 end) as pend_sma,
      sum(case when c.budayawan_muslim_pendidikan = 'PESANTREN' then 1 else 0 end) as pend_pesantren,
      sum(case when c.budayawan_muslim_pendidikan = 'DIPLOMA I' then 1 else 0 end) as pend_diploma1,
      sum(case when c.budayawan_muslim_pendidikan = 'DIPLOMA II' then 1 else 0 end) as pend_diploma2,
      sum(case when c.budayawan_muslim_pendidikan = 'DIPLOMA III' then 1 else 0 end) as pend_diploma3,
      sum(case when c.budayawan_muslim_pendidikan = 'S1' then 1 else 0 end) as pend_s1,
      sum(case when c.budayawan_muslim_pendidikan = 'S2' then 1 else 0 end) as pend_s2,
      sum(case when c.budayawan_muslim_pendidikan = 'S3' then 1 else 0 end) as pend_s3
      FROM
      app_province a
      INNER JOIN master_budayawan_muslim c ON a.province_id = c.budayawan_muslim_provinsi
      INNER JOIN app_city b ON b.city_id = c.budayawan_muslim_city
      WHERE
      c.is_trash = 0 AND a.province_id = $provinsi
      GROUP BY
      a.province_id,b.city_id
      ORDER BY
      b.city_id ASC
      ");
    return $query->result();
  }

  public function get_budayawan_kecamatan($kecamatan)
  {
    $query = $this->db_database5->query("
      SELECT
      b.budayawan_muslim_nama,b.budayawan_muslim_nama_ayah,b.budayawan_muslim_nama_ibu,b.budayawan_muslim_nama_istri_suami,b.budayawan_muslim_tempat_lahir,b.budayawan_muslim_tgl_lahir,
      b.budayawan_muslim_jenis_kelamin,b.budayawan_muslim_alamat,b.budayawan_muslim_gol_darah,b.budayawan_muslim_tinggi,b.budayawan_muslim_berat,b.budayawan_muslim_rambut,b.budayawan_muslim_muka,
      b.budayawan_muslim_kulit,b.budayawan_muslim_status_kawin,b.budayawan_muslim_etnis,b.budayawan_muslim_pendidikan
      FROM
      app_city AS a
      INNER JOIN master_budayawan_muslim AS b ON a.city_id = b.budayawan_muslim_city
      WHERE
      b.is_trash = 0 AND a.city_id = $kecamatan
      GROUP BY
      a.city_id,b.budayawan_muslim_id
      ORDER BY
      a.city_id ASC
      ");
    return $query->result();
  }

  public function get_radioislam()
  {
    $query = $this->db_database5->query("
      SELECT
      a.province_id,a.province_title,
      count(b.radio_id) as jum_radio,
      sum(case when b.radio_topography = 'DARATAN' then 1 else 0 end) as topo_daratan,
      sum(case when b.radio_topography = 'LAUTAN' then 1 else 0 end) as topo_lautan,
      sum(case when b.radio_geography = 'KOTA' then 1 else 0 end) as geo_kota,
      sum(case when b.radio_geography = 'DESA' then 1 else 0 end) as geo_desa,
      sum(case when b.radio_geography = 'PELOSOK' then 1 else 0 end) as geo_pelosok,
      sum(case when b.radio_geography = 'PELOSOK TERISOLIR' then 1 else 0 end) as geo_pelosok_terisolir
      FROM
      app_province a
      INNER JOIN master_radio_keagamaan b ON a.province_id = b.radio_provinsi
      WHERE
      b.is_trash = 0
      GROUP BY
      a.province_id
      ORDER BY
      a.province_id ASC
      ");
    return $query->result();
  }

  public function get_radioislam_kabupaten($provinsi)
  {
    $query = $this->db_database5->query("
      SELECT
      b.city_id,b.city_title,
      count(c.radio_id) as jum_radio,
      sum(case when c.radio_status_tanah = 'MILIK SEKOLAH/MADRASAH' then 1 else 0 end) milik_sekolah,
      sum(case when c.radio_status_tanah = 'WAKAF' then 1 else 0 end) milik_wakaf,
      sum(case when c.radio_status_tanah = 'YAYASAN' then 1 else 0 end) milik_yayasan,
      sum(case when c.radio_status_tanah = 'PEMERINTAH' then 1 else 0 end) milik_pemerintah,
      sum(case when c.radio_luas_tanah = a.province_id then REPLACE(c.radio_luas_tanah,'.','') else REPLACE(c.radio_luas_tanah,'.','') end) luas_tanah,
      sum(case when c.radio_luas_bangunan = a.province_id then REPLACE(c.radio_luas_bangunan,'.','') else REPLACE(c.radio_luas_bangunan,'.','') end) luas_bangunan,
      sum(case when c.radio_pengurus_laki = a.province_id then c.radio_pengurus_laki else c.radio_pengurus_laki end) pengurus_laki,
      sum(case when c.radio_pengurus_perempuan = a.province_id then c.radio_pengurus_perempuan else c.radio_pengurus_perempuan end) pengurus_perempuan
      FROM
      app_province a
      INNER JOIN master_radio_keagamaan c ON a.province_id = c.radio_provinsi
      INNER JOIN app_city b ON b.city_id = c.radio_city
      WHERE
      c.is_trash = 0 AND a.province_id = $provinsi
      GROUP BY
      a.province_id,b.city_id
      ORDER BY
      b.city_id ASC
      ");
    return $query->result();
  }

  public function get_radioislam_kecamatan($kabupaten)
  {
    $query = $this->db_database5->query("
      SELECT
      b.radio_ketua,b.radio_nama,b.radio_thn_berdiri,b.radio_alamat,b.radio_izin_opr,b.radio_status_tanah,b.radio_luas_tanah,b.radio_luas_bangunan,b.radio_no_sertifikat,b.radio_topography,b.radio_geography,b.radio_pengurus_laki,b.radio_pengurus_perempuan,b.radio_jangkauan,b.radio_waktu,b.radio_sejarah,b.radio_visi,
      b.radio_misi,b.radio_penyiar1,b.radio_siaran1,b.radio_pukul1,b.radio_favorit1,b.radio_jam1,b.radio_afiliasi
      FROM
      app_city AS a
      INNER JOIN master_radio_keagamaan AS b ON a.city_id = b.radio_city
      WHERE
      b.is_trash = 0 AND a.city_id = $kabupaten
      GROUP BY
      a.city_id,b.radio_id
      ORDER BY
      a.city_id ASC
      ");
    return $query->result();
  }

  public function get_penulisislam()
  {
    $query = $this->db_database5->query("
      SELECT
      a.province_id,a.province_title,
      count(b.penulis_id) as jum_penulis,
      sum(case when b.penulis_jenis_kelamin = 'LAKI-LAKI' then 1 else 0 end) as penulis_pria,
      sum(case when b.penulis_jenis_kelamin = 'PEREMPUAN' then 1 else 0 end) as penulis_perempuan,
      sum(case when b.penulis_status_kawin = 'KAWIN' then 1 else 0 end) as penulis_kawin,
      sum(case when b.penulis_status_kawin = 'BELUM KAWIN' then 1 else 0 end) as penulis_belum_kawin
      FROM
      app_province a
      INNER JOIN master_penulis b ON a.province_id = b.penulis_provinsi
      WHERE
      b.is_trash = 0
      GROUP BY
      a.province_id
      ORDER BY
      a.province_id ASC
      ");
    return $query->result();
  }

  public function get_penulisislam_kabupaten($provinsi)
  {
    $query = $this->db_database5->query("
      SELECT
      b.city_id,b.city_title,
      count(c.penulis_id) as jumlah_penulis,
      sum(case when c.penulis_pendidikan = 'SMP/MTS' then 1 else 0 end) as pend_smp,
      sum(case when c.penulis_pendidikan = 'SMA/MA/STM' then 1 else 0 end) as pend_sma,
      sum(case when c.penulis_pendidikan = 'PESANTREN' then 1 else 0 end) as pend_pesantren,
      sum(case when c.penulis_pendidikan = 'DIPLOMA I' then 1 else 0 end) as pend_diploma1,
      sum(case when c.penulis_pendidikan = 'DIPLOMA II' then 1 else 0 end) as pend_diploma2,
      sum(case when c.penulis_pendidikan = 'DIPLOMA III' then 1 else 0 end) as pend_diploma3,
      sum(case when c.penulis_pendidikan = 'S1' then 1 else 0 end) as pend_s1,
      sum(case when c.penulis_pendidikan = 'S2' then 1 else 0 end) as pend_s2,
      sum(case when c.penulis_pendidikan = 'S3' then 1 else 0 end) as pend_s3
      FROM
      app_province a
      INNER JOIN master_penulis c ON a.province_id = c.penulis_provinsi
      INNER JOIN app_city b ON b.city_id = c.penulis_city
      WHERE
      c.is_trash = 0 AND a.province_id = $provinsi
      GROUP BY
      a.province_id,b.city_id
      ORDER BY
      b.city_id ASC
      ");
    return $query->result();
  }

  public function get_penulisislam_kecamatan($kabupaten)
  {
    $query = $this->db_database5->query("
      SELECT
      b.penulis_nama,b.penulis_nama_ayah,b.penulis_nama_ibu,b.penulis_nama_istri_suami,b.penulis_tempat_lahir,
      b.penulis_tgl_lahir,b.penulis_jenis_kelamin,b.penulis_alamat,b.penulis_status_kawin,b.penulis_gol_darah,
      b.penulis_tinggi,b.penulis_berat,b.penulis_rambut,b.penulis_muka,b.penulis_kulit,b.penulis_etnis,
      b.penulis_pendidikan
      FROM
      app_city AS a
      INNER JOIN master_penulis AS b ON a.city_id = b.penulis_city
      WHERE
      b.is_trash = 0 AND a.city_id = $kabupaten
      GROUP BY
      a.city_id,b.penulis_id
      ORDER BY
      a.city_id ASC
      ");
    return $query->result();
  }

}

/* End of file Simas_m.php */
/* Location: ./application/modules/docs/models/Simas_m.php */