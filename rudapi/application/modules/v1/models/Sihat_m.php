<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sihat_m extends CI_Model {

	// ----------------------------------------  Data Daerah simas
 function __construct(){
  parent::__construct();
  $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
}

// query terpakai
public function get_alathisab()
{
    $query = $this->sihat->query("
        SELECT
        b.alat_provinsi,
        a.province_title,
        sum( CASE WHEN b.alat_teropong THEN b.alat_teropong ELSE b.alat_teropong END ) AS jum_teropong,
        sum( CASE WHEN b.alat_altimeter THEN b.alat_altimeter ELSE b.alat_altimeter END ) AS jum_altimeter,
        sum( CASE WHEN b.alat_theodolit THEN b.alat_theodolit ELSE b.alat_theodolit END ) AS jum_theodolit,
        sum( CASE WHEN b.alat_mizwala THEN b.alat_mizwala ELSE b.alat_mizwala END ) AS jum_mizwala,
        sum( CASE WHEN b.alat_gps THEN b.alat_gps ELSE b.alat_gps END ) AS jum_gps,
        sum( CASE WHEN b.alat_kompas THEN b.alat_kompas ELSE b.alat_kompas END ) AS jum_kompas,
        sum( CASE WHEN b.alat_rubu THEN b.alat_rubu ELSE b.alat_rubu END ) AS jum_rubu,
        sum( CASE WHEN b.alat_binoculer THEN b.alat_binoculer ELSE b.alat_binoculer END ) AS jum_binoculer,
        sum( CASE WHEN b.alat_kalkulator THEN b.alat_kalkulator ELSE b.alat_kalkulator END ) AS jum_kalkulator,
        sum( CASE WHEN b.alat_gawanglokasi THEN b.alat_gawanglokasi ELSE b.alat_gawanglokasi END ) AS jum_gawanglokasi,
        b.alat_tahun 
        FROM
        app_province a
        INNER JOIN hisab_data_alat b ON a.province_id = b.alat_provinsi 
        WHERE
        b.alat_tahun = 2021
        GROUP BY
        a.province_id
        ");
    return $query->result();
}

// query terpakai
public function get_alathisab_provinsi_tahun($provinsi, $tahun)
{
    $query = $this->sihat->query("
        SELECT
        a.city_id,
        a.city_title,
        sum( CASE WHEN b.alat_teropong THEN b.alat_teropong ELSE b.alat_teropong END ) AS jum_teropong,
        sum( CASE WHEN b.alat_altimeter THEN b.alat_altimeter ELSE b.alat_altimeter END ) AS jum_altimeter,
        sum( CASE WHEN b.alat_theodolit THEN b.alat_theodolit ELSE b.alat_theodolit END ) AS jum_theodolit,
        sum( CASE WHEN b.alat_mizwala THEN b.alat_mizwala ELSE b.alat_mizwala END ) AS jum_mizwala,
        sum( CASE WHEN b.alat_gps THEN b.alat_gps ELSE b.alat_gps END ) AS jum_gps,
        sum( CASE WHEN b.alat_kompas THEN b.alat_kompas ELSE b.alat_kompas END ) AS jum_kompas,
        sum( CASE WHEN b.alat_rubu THEN b.alat_rubu ELSE b.alat_rubu END ) AS jum_rubu,
        sum( CASE WHEN b.alat_binoculer THEN b.alat_binoculer ELSE b.alat_binoculer END ) AS jum_binoculer,
        sum( CASE WHEN b.alat_kalkulator THEN b.alat_kalkulator ELSE b.alat_kalkulator END ) AS jum_kalkulator,
        sum( CASE WHEN b.alat_gawanglokasi THEN b.alat_gawanglokasi ELSE b.alat_gawanglokasi END ) AS jum_gawanglokasi,
        b.alat_tahun 
        FROM
        app_city AS a
        INNER JOIN hisab_data_alat AS b ON a.city_id = b.alat_kota 
        WHERE
        b.alat_provinsi = $provinsi AND b.alat_tahun = $tahun
        GROUP BY
        a.city_id 
        ORDER BY
        a.city_id ASC
        ");
    return $query->result();
}

// query terpakai
public function get_alathisab_tahun($tahun)
{
    $query = $this->sihat->query("
        SELECT
        b.alat_provinsi,
        a.province_title,
        sum( CASE WHEN b.alat_teropong THEN b.alat_teropong ELSE b.alat_teropong END ) AS jum_teropong,
        sum( CASE WHEN b.alat_altimeter THEN b.alat_altimeter ELSE b.alat_altimeter END ) AS jum_altimeter,
        sum( CASE WHEN b.alat_theodolit THEN b.alat_theodolit ELSE b.alat_theodolit END ) AS jum_theodolit,
        sum( CASE WHEN b.alat_mizwala THEN b.alat_mizwala ELSE b.alat_mizwala END ) AS jum_mizwala,
        sum( CASE WHEN b.alat_gps THEN b.alat_gps ELSE b.alat_gps END ) AS jum_gps,
        sum( CASE WHEN b.alat_kompas THEN b.alat_kompas ELSE b.alat_kompas END ) AS jum_kompas,
        sum( CASE WHEN b.alat_rubu THEN b.alat_rubu ELSE b.alat_rubu END ) AS jum_rubu,
        sum( CASE WHEN b.alat_binoculer THEN b.alat_binoculer ELSE b.alat_binoculer END ) AS jum_binoculer,
        sum( CASE WHEN b.alat_kalkulator THEN b.alat_kalkulator ELSE b.alat_kalkulator END ) AS jum_kalkulator,
        sum( CASE WHEN b.alat_gawanglokasi THEN b.alat_gawanglokasi ELSE b.alat_gawanglokasi END ) AS jum_gawanglokasi,
        b.alat_tahun 
        FROM
        app_province a
        INNER JOIN hisab_data_alat b ON a.province_id = b.alat_provinsi 
        WHERE
        b.alat_tahun = $tahun
        GROUP BY
        a.province_id
        ");
    return $query->result();
}

// query terpakai
function get_tenaga()
{
  $query = $this->sihat->query("
    SELECT
    a.tenaga_provinsi,
    b.province_title,
    count(a.tenaga_id) as jum_ahli
    FROM
    hisab_tenaga_ahli as a
    LEFT JOIN app_province as b on a.tenaga_provinsi = b.province_id
    LEFT JOIN app_city as c on a.tenaga_kota = c.city_id
    GROUP BY
    b.province_id
    ");
  return $query->result();
}

// query terpakai
function get_tenaga_provinsi($provinsi)
{
  $query = $this->sihat->query("
    SELECT
    a.tenaga_kota,
    a.tenaga_nama,
    a.tenaga_tempat_lahir,
    a.tenaga_tanggal_lahir,
    a.tenaga_alamat,
    a.tenaga_telp
    FROM
    hisab_tenaga_ahli as a
    LEFT JOIN app_province as b on a.tenaga_provinsi = b.province_id
    LEFT JOIN app_city as c on a.tenaga_kota = c.city_id
    WHERE
    a.tenaga_provinsi = $provinsi
    GROUP BY
    c.city_id,a.tenaga_id
    ORDER BY
    c.city_id ASC
    ");
  return $query->result();
}

// query terpakai
function get_hisab()
{
  $query = $this->sihat->query("
    SELECT
    b.ukur_provinsi,
    a.province_title,
    count( b.ukur_id ) AS jum_hisab,
    sum( CASE WHEN b.ukur_tempat = 'mushalla' AND b.ukur_tempat IS NOT NULL THEN 1 ELSE 0 END ) AS ukur_berd_mushalla,
    sum( CASE WHEN b.ukur_tempat = 'masjid' AND b.ukur_tempat IS NOT NULL THEN 1 ELSE 0 END ) AS ukur_berd_masjid 
    FROM
    hisab_pengukuran_kiblat AS b
    LEFT JOIN app_province AS a ON a.province_id = b.ukur_provinsi 
    GROUP BY
    a.province_id 
    ORDER BY
    a.province_id ASC
    ");
  return $query->result();
}

// query terpakai
function get_hisab_provinsi($provinsi)
{
  $query = $this->sihat->query("
    SELECT
    b.city_title,
    a.ukur_lokasi,a.ukur_alamat,a.ukur_lintang_deg,a.ukur_lintang_jam,a.ukur_lintang_menit,a.ukur_lintang_arah,
    a.ukur_bujur_deg,a.ukur_bujur_jam,a.ukur_bujur_menit,a.ukur_bujur_arah,a.ukur_azimut_1,a.ukur_azimut_2,a.ukur_azimut_3,
    a.ukur_tempat
    FROM
    hisab_pengukuran_kiblat as a
    LEFT JOIN app_city AS b on a.ukur_kota = b.city_id
    WHERE
    a.ukur_provinsi = $provinsi
    GROUP BY
    a.ukur_id
    ORDER BY
    a.ukur_id
    ");
  return $query->result();
}

function get_filteralat()
{
    $query = $this->sihat->select("a.*")
                ->from("v_ambil_alat as a")
                ->get()->result();
    return $query;

    // $query = $this->sihat->query("
    //     SELECT
    //     sum( CASE WHEN b.alat_teropong THEN b.alat_teropong ELSE b.alat_teropong END ) AS teropong,
    //     sum( CASE WHEN b.alat_theodolit THEN b.alat_theodolit ELSE b.alat_theodolit END ) AS theodolit,
    //     sum( CASE WHEN b.alat_gps THEN b.alat_gps ELSE b.alat_gps END ) AS gps,
    //     sum( CASE WHEN b.alat_binoculer THEN b.alat_binoculer ELSE b.alat_binoculer END ) AS binoculer
    //     FROM
    //     app_province a
    //     INNER JOIN hisab_data_alat b ON a.province_id = b.alat_provinsi 
    //     WHERE
    //     b.alat_tahun = 2020
    //     ");
    // return $query->result();
}

function get_tahun_alat()
{
    $query = $this->sihat->query("");
    return $query->result();
}

function get_totalan_tenaga()
{
    $query = $this->sihat->query("
        SELECT
        count(a.tenaga_id) as tenaga_ahli
        FROM
        hisab_tenaga_ahli as a
        LEFT JOIN app_province as b on a.tenaga_provinsi = b.province_id
        LEFT JOIN app_city as c on a.tenaga_kota = c.city_id
        ");
    return $query->row();
}

function get_totalan_pengukuran()
{
    $query = $this->sihat->query("
        SELECT
        count( b.ukur_id ) as hisab_pengukuran
        FROM
        hisab_pengukuran_kiblat AS b
        LEFT JOIN app_province AS a ON a.province_id = b.ukur_provinsi
            ");
    return $query->row();
}

function get_totalan_lokasi()
{
    $query = $this->sihat->query("
        SELECT
        count( CASE WHEN a.lokasi_id THEN 1 ELSE 0 END ) AS total 
        FROM
        hisab_lokasi_rukyat as a
        LEFT JOIN app_province AS b ON a.lokasi_provinsi = b.province_id
            ");
    return $query->row();
}

function get_totalan_laporan()
{
    $query = $this->sihat->query("
        SELECT
        count(case when b.ukur_id then 1 else 0 end) as hisab_laporan
        FROM
        app_province AS a
        INNER JOIN hisab_pengukuran_laporan AS b ON a.province_id = b.ukur_provinsi
                ");
    return $query->row();
}

function get_totalan_lintang()
{
    $query = $this->sihat->query("
        SELECT
        count(case when b.id_kota then 1 else 0 end) as lintang_kota
        FROM
        app_province AS a
        INNER JOIN data_lintang_kota_cms_new AS b ON a.province_id = b.nama_propinsi
        WHERE
        b.nama_propinsi != 0 and b.nama_kota != 0
                ");
    return $query->row();
}

function get_totalan_ahli()
{
    $query = $this->sihat->query("
        SELECT
        count(a.tenaga_id) as total
        FROM
        hisab_tenaga_ahli as a
        LEFT JOIN app_province as b on a.tenaga_provinsi = b.province_id
        LEFT JOIN app_city as c on a.tenaga_kota = c.city_id
        ");
    return $query->row();
}

function get_totalan()
{
    $query = $this->sihat->select("a.*")
                ->from("v_alathisabrukyat a")
                ->get()->row();
    return $query;
    // $query = $this->sihat->query("
    //     SELECT
    //     sum( CASE WHEN b.alat_teropong THEN b.alat_teropong ELSE b.alat_teropong END ) +
    //     sum( CASE WHEN b.alat_theodolit THEN b.alat_theodolit ELSE b.alat_theodolit END ) +
    //     sum( CASE WHEN b.alat_gps THEN b.alat_gps ELSE b.alat_gps END ) +
    //     sum( CASE WHEN b.alat_binoculer THEN b.alat_binoculer ELSE b.alat_binoculer END ) AS alat_hisab_rukyat
    //     FROM
    //     app_province a
    //     INNER JOIN hisab_data_alat b ON a.province_id = b.alat_provinsi 
    //     WHERE
    //     b.alat_tahun = 2020
    //     ");
    // return $query->row();
}

function get_totalan_tahun($datatotal)
{
    $query = $this->sihat->query("
        SELECT
        sum( CASE WHEN b.alat_teropong THEN b.alat_teropong ELSE b.alat_teropong END ) +
        sum( CASE WHEN b.alat_altimeter THEN b.alat_altimeter ELSE b.alat_altimeter END ) +
        sum( CASE WHEN b.alat_theodolit THEN b.alat_theodolit ELSE b.alat_theodolit END ) +
        sum( CASE WHEN b.alat_mizwala THEN b.alat_mizwala ELSE b.alat_mizwala END ) +
        sum( CASE WHEN b.alat_gps THEN b.alat_gps ELSE b.alat_gps END ) +
        sum( CASE WHEN b.alat_kompas THEN b.alat_kompas ELSE b.alat_kompas END ) +
        sum( CASE WHEN b.alat_rubu THEN b.alat_rubu ELSE b.alat_rubu END ) +
        sum( CASE WHEN b.alat_binoculer THEN b.alat_binoculer ELSE b.alat_binoculer END ) +
        sum( CASE WHEN b.alat_kalkulator THEN b.alat_kalkulator ELSE b.alat_kalkulator END ) +
        sum( CASE WHEN b.alat_gawanglokasi THEN b.alat_gawanglokasi ELSE b.alat_gawanglokasi END ) AS total
        FROM
        app_province a
        INNER JOIN hisab_data_alat b ON a.province_id = b.alat_provinsi 
        WHERE
        b.alat_tahun = $datatotal"
    );
    return $query->row();
}

function alat_tahun2020()
{
  $query = $this->sihat->query("
    SELECT
    b.alat_provinsi,
    a.province_title,
    --  count(b.alat_provinsi) as dt_jumlah,
    sum( CASE WHEN b.alat_teropong THEN b.alat_teropong ELSE b.alat_teropong END ) AS jum_teropong,
    sum( CASE WHEN b.alat_altimeter THEN b.alat_altimeter ELSE b.alat_altimeter END ) AS jum_altimeter,
    sum( CASE WHEN b.alat_theodolit THEN b.alat_theodolit ELSE b.alat_theodolit END ) AS jum_theodolit,
    sum( CASE WHEN b.alat_mizwala THEN b.alat_mizwala ELSE b.alat_mizwala END ) AS jum_mizwala,
    sum( CASE WHEN b.alat_gps THEN b.alat_gps ELSE b.alat_gps END ) AS jum_gps,
    sum( CASE WHEN b.alat_kompas THEN b.alat_kompas ELSE b.alat_kompas END ) AS jum_kompas,
    sum( CASE WHEN b.alat_rubu THEN b.alat_rubu ELSE b.alat_rubu END ) AS jum_rubu,
    sum( CASE WHEN b.alat_binoculer THEN b.alat_binoculer ELSE b.alat_binoculer END ) AS jum_binoculer,
    sum( CASE WHEN b.alat_kalkulator THEN b.alat_kalkulator ELSE b.alat_kalkulator END ) AS jum_kalkulator,
    sum( CASE WHEN b.alat_gawanglokasi THEN b.alat_gawanglokasi ELSE b.alat_gawanglokasi END ) AS jum_gawanglokasi,
    b.alat_tahun 
    FROM
    app_province a
    INNER JOIN hisab_data_alat b ON a.province_id = b.alat_provinsi 
    WHERE
    b.alat_tahun = 2020 
    --  AND b.alat_kota != 0 
    GROUP BY
    a.province_id
    ");
  return $query->result();
}

function alat_provinsi2020($provinsi)
{
  $query = $this->sihat->query("
    SELECT
    a.city_id,
    a.city_title,
    --  count(b.alat_provinsi) as dt_jumlah,
    sum( CASE WHEN b.alat_teropong THEN b.alat_teropong ELSE b.alat_teropong END ) AS jum_teropong,
    sum( CASE WHEN b.alat_altimeter THEN b.alat_altimeter ELSE b.alat_altimeter END ) AS jum_altimeter,
    sum( CASE WHEN b.alat_theodolit THEN b.alat_theodolit ELSE b.alat_theodolit END ) AS jum_theodolit,
    sum( CASE WHEN b.alat_mizwala THEN b.alat_mizwala ELSE b.alat_mizwala END ) AS jum_mizwala,
    sum( CASE WHEN b.alat_gps THEN b.alat_gps ELSE b.alat_gps END ) AS jum_gps,
    sum( CASE WHEN b.alat_kompas THEN b.alat_kompas ELSE b.alat_kompas END ) AS jum_kompas,
    sum( CASE WHEN b.alat_rubu THEN b.alat_rubu ELSE b.alat_rubu END ) AS jum_rubu,
    sum( CASE WHEN b.alat_binoculer THEN b.alat_binoculer ELSE b.alat_binoculer END ) AS jum_binoculer,
    sum( CASE WHEN b.alat_kalkulator THEN b.alat_kalkulator ELSE b.alat_kalkulator END ) AS jum_kalkulator,
    sum( CASE WHEN b.alat_gawanglokasi THEN b.alat_gawanglokasi ELSE b.alat_gawanglokasi END ) AS jum_gawanglokasi,
    b.alat_tahun 
    FROM
    app_city AS a
    INNER JOIN hisab_data_alat AS b ON a.city_id = b.alat_kota 
    WHERE
    b.alat_provinsi = $provinsi
    AND b.alat_tahun = 2020 
    --  AND b.alat_kota != 0 
    GROUP BY
    a.city_id 
    ORDER BY
    a.city_id ASC
    ");
  return $query->result();
}

function alat_tahun2019()
{
  $query = $this->sihat->query("
    SELECT
    b.alat_provinsi,
    a.province_title,
    --  count(b.alat_provinsi) as dt_jumlah,
    sum( CASE WHEN b.alat_teropong THEN b.alat_teropong ELSE b.alat_teropong END ) AS jum_teropong,
    sum( CASE WHEN b.alat_altimeter THEN b.alat_altimeter ELSE b.alat_altimeter END ) AS jum_altimeter,
    sum( CASE WHEN b.alat_theodolit THEN b.alat_theodolit ELSE b.alat_theodolit END ) AS jum_theodolit,
    sum( CASE WHEN b.alat_mizwala THEN b.alat_mizwala ELSE b.alat_mizwala END ) AS jum_mizwala,
    sum( CASE WHEN b.alat_gps THEN b.alat_gps ELSE b.alat_gps END ) AS jum_gps,
    sum( CASE WHEN b.alat_kompas THEN b.alat_kompas ELSE b.alat_kompas END ) AS jum_kompas,
    sum( CASE WHEN b.alat_rubu THEN b.alat_rubu ELSE b.alat_rubu END ) AS jum_rubu,
    sum( CASE WHEN b.alat_binoculer THEN b.alat_binoculer ELSE b.alat_binoculer END ) AS jum_binoculer,
    sum( CASE WHEN b.alat_kalkulator THEN b.alat_kalkulator ELSE b.alat_kalkulator END ) AS jum_kalkulator,
    sum( CASE WHEN b.alat_gawanglokasi THEN b.alat_gawanglokasi ELSE b.alat_gawanglokasi END ) AS jum_gawanglokasi 
    FROM
    app_province a
    INNER JOIN hisab_data_alat b ON a.province_id = b.alat_provinsi 
    WHERE
    b.alat_tahun = 2019 
    --  AND b.alat_kota != 0 
    GROUP BY
    a.province_id
    ");
  return $query->result();
}

function alat_provinsi2019($provinsi)
{
  $query = $this->sihat->query("
    SELECT
    a.city_id,a.city_title,
    sum(case when b.alat_teropong then b.alat_teropong else b.alat_teropong end) as jum_teropong,
    sum(case when b.alat_altimeter then b.alat_altimeter else b.alat_altimeter end) as jum_altimeter,
    sum(case when b.alat_theodolit then b.alat_theodolit else b.alat_theodolit end) as jum_theodolit,
    sum(case when b.alat_mizwala then b.alat_mizwala else b.alat_mizwala end) as jum_mizwala,
    sum(case when b.alat_gps then b.alat_gps else b.alat_gps end) as jum_gps,
    sum(case when b.alat_kompas then b.alat_kompas else b.alat_kompas end) as jum_kompas,
    sum(case when b.alat_rubu then b.alat_rubu else b.alat_rubu end) as jum_rubu,
    sum(case when b.alat_binoculer then b.alat_binoculer else b.alat_binoculer end) as jum_binoculer,
    sum(case when b.alat_kalkulator then b.alat_kalkulator else b.alat_kalkulator end) as jum_kalkulator,
    sum(case when b.alat_gawanglokasi then b.alat_gawanglokasi else b.alat_gawanglokasi end) as jum_gawanglokasi
    FROM
    app_city AS a
    INNER JOIN hisab_data_alat AS b ON a.city_id = b.alat_kota
    WHERE
    b.alat_provinsi = $provinsi and b.alat_tahun = 2019 and b.alat_kota != 0
    GROUP BY
    a.city_id
    ORDER BY
    a.city_id ASC
    ");
  return $query->result();
}

function alat_tahun2018()
{
  $query = $this->sihat->query("
    SELECT
    b.alat_provinsi,a.province_title,
    sum(case when b.alat_teropong then b.alat_teropong else b.alat_teropong end) as jum_teropong,
    sum(case when b.alat_altimeter then b.alat_altimeter else b.alat_altimeter end) as jum_altimeter,
    sum(case when b.alat_theodolit then b.alat_theodolit else b.alat_theodolit end) as jum_theodolit,
    sum(case when b.alat_mizwala then b.alat_mizwala else b.alat_mizwala end) as jum_mizwala,
    sum(case when b.alat_gps then b.alat_gps else b.alat_gps end) as jum_gps,
    sum(case when b.alat_kompas then b.alat_kompas else b.alat_kompas end) as jum_kompas,
    sum(case when b.alat_rubu then b.alat_rubu else b.alat_rubu end) as jum_rubu,
    sum(case when b.alat_binoculer then b.alat_binoculer else b.alat_binoculer end) as jum_binoculer,
    sum(case when b.alat_kalkulator then b.alat_kalkulator else b.alat_kalkulator end) as jum_kalkulator,
    sum(case when b.alat_gawanglokasi then b.alat_gawanglokasi else b.alat_gawanglokasi end) as jum_gawanglokasi
    FROM
    app_province a
    INNER JOIN hisab_data_alat b ON a.province_id = b.alat_provinsi
    WHERE
    b.alat_tahun = 2018 
    -- and b.alat_kota != 0
    GROUP BY
    a.province_id
    ");
  return $query->result();
}

function alat_provinsi2018($provinsi)
{
  $query = $this->sihat->query("
    SELECT
    a.city_id,a.city_title,
    sum(case when b.alat_teropong then b.alat_teropong else b.alat_teropong end) as jum_teropong,
    sum(case when b.alat_altimeter then b.alat_altimeter else b.alat_altimeter end) as jum_altimeter,
    sum(case when b.alat_theodolit then b.alat_theodolit else b.alat_theodolit end) as jum_theodolit,
    sum(case when b.alat_mizwala then b.alat_mizwala else b.alat_mizwala end) as jum_mizwala,
    sum(case when b.alat_gps then b.alat_gps else b.alat_gps end) as jum_gps,
    sum(case when b.alat_kompas then b.alat_kompas else b.alat_kompas end) as jum_kompas,
    sum(case when b.alat_rubu then b.alat_rubu else b.alat_rubu end) as jum_rubu,
    sum(case when b.alat_binoculer then b.alat_binoculer else b.alat_binoculer end) as jum_binoculer,
    sum(case when b.alat_kalkulator then b.alat_kalkulator else b.alat_kalkulator end) as jum_kalkulator,
    sum(case when b.alat_gawanglokasi then b.alat_gawanglokasi else b.alat_gawanglokasi end) as jum_gawanglokasi
    FROM
    app_city AS a
    INNER JOIN hisab_data_alat AS b ON a.city_id = b.alat_kota
    WHERE
    b.alat_provinsi = $provinsi and b.alat_tahun = 2018
     -- and b.alat_kota != 0
     GROUP BY
     a.city_id
     ORDER BY
     a.city_id ASC
     ");
  return $query->result();
}

function alat_tahun2017()
{
  $query = $this->sihat->query("
    SELECT
    b.alat_provinsi,a.province_title,
    sum(case when b.alat_teropong then b.alat_teropong else b.alat_teropong end) as jum_teropong,
    sum(case when b.alat_altimeter then b.alat_altimeter else b.alat_altimeter end) as jum_altimeter,
    sum(case when b.alat_theodolit then b.alat_theodolit else b.alat_theodolit end) as jum_theodolit,
    sum(case when b.alat_mizwala then b.alat_mizwala else b.alat_mizwala end) as jum_mizwala,
    sum(case when b.alat_gps then b.alat_gps else b.alat_gps end) as jum_gps,
    sum(case when b.alat_kompas then b.alat_kompas else b.alat_kompas end) as jum_kompas,
    sum(case when b.alat_rubu then b.alat_rubu else b.alat_rubu end) as jum_rubu,
    sum(case when b.alat_binoculer then b.alat_binoculer else b.alat_binoculer end) as jum_binoculer,
    sum(case when b.alat_kalkulator then b.alat_kalkulator else b.alat_kalkulator end) as jum_kalkulator,
    sum(case when b.alat_gawanglokasi then b.alat_gawanglokasi else b.alat_gawanglokasi end) as jum_gawanglokasi
    FROM
    app_province a
    INNER JOIN hisab_data_alat b ON a.province_id = b.alat_provinsi
    WHERE
    b.alat_tahun = 2017
     -- and b.alat_kota != 0
     GROUP BY
     a.province_id
     ");
  return $query->result();
}

function alat_provinsi2017($provinsi)
{
  $query = $this->sihat->query("
    SELECT
    a.city_id,a.city_title,
    sum(case when b.alat_teropong then b.alat_teropong else b.alat_teropong end) as jum_teropong,
    sum(case when b.alat_altimeter then b.alat_altimeter else b.alat_altimeter end) as jum_altimeter,
    sum(case when b.alat_theodolit then b.alat_theodolit else b.alat_theodolit end) as jum_theodolit,
    sum(case when b.alat_mizwala then b.alat_mizwala else b.alat_mizwala end) as jum_mizwala,
    sum(case when b.alat_gps then b.alat_gps else b.alat_gps end) as jum_gps,
    sum(case when b.alat_kompas then b.alat_kompas else b.alat_kompas end) as jum_kompas,
    sum(case when b.alat_rubu then b.alat_rubu else b.alat_rubu end) as jum_rubu,
    sum(case when b.alat_binoculer then b.alat_binoculer else b.alat_binoculer end) as jum_binoculer,
    sum(case when b.alat_kalkulator then b.alat_kalkulator else b.alat_kalkulator end) as jum_kalkulator,
    sum(case when b.alat_gawanglokasi then b.alat_gawanglokasi else b.alat_gawanglokasi end) as jum_gawanglokasi
    FROM
    app_city AS a
    INNER JOIN hisab_data_alat AS b ON a.city_id = b.alat_kota
    WHERE
    b.alat_provinsi = $provinsi and b.alat_tahun = 2017
     -- and b.alat_kota != 0
     GROUP BY
     a.city_id
     ORDER BY
     a.city_id ASC
     ");
  return $query->result();
}

function alat_tahun2016()
{
  $query = $this->sihat->query("
    SELECT
    b.alat_provinsi,a.province_title,
    sum(case when b.alat_teropong then b.alat_teropong else b.alat_teropong end) as jum_teropong,
    sum(case when b.alat_altimeter then b.alat_altimeter else b.alat_altimeter end) as jum_altimeter,
    sum(case when b.alat_theodolit then b.alat_theodolit else b.alat_theodolit end) as jum_theodolit,
    sum(case when b.alat_mizwala then b.alat_mizwala else b.alat_mizwala end) as jum_mizwala,
    sum(case when b.alat_gps then b.alat_gps else b.alat_gps end) as jum_gps,
    sum(case when b.alat_kompas then b.alat_kompas else b.alat_kompas end) as jum_kompas,
    sum(case when b.alat_rubu then b.alat_rubu else b.alat_rubu end) as jum_rubu,
    sum(case when b.alat_binoculer then b.alat_binoculer else b.alat_binoculer end) as jum_binoculer,
    sum(case when b.alat_kalkulator then b.alat_kalkulator else b.alat_kalkulator end) as jum_kalkulator,
    sum(case when b.alat_gawanglokasi then b.alat_gawanglokasi else b.alat_gawanglokasi end) as jum_gawanglokasi
    FROM
    app_province a
    INNER JOIN hisab_data_alat b ON a.province_id = b.alat_provinsi
    WHERE
    b.alat_tahun = 2016
     -- and b.alat_kota != 0
     GROUP BY
     a.province_id
     ");
  return $query->result();
}

function alat_provinsi2016($provinsi)
{
  $query = $this->sihat->query("
    SELECT
    a.city_id,a.city_title,
    sum(case when b.alat_teropong then b.alat_teropong else b.alat_teropong end) as jum_teropong,
    sum(case when b.alat_altimeter then b.alat_altimeter else b.alat_altimeter end) as jum_altimeter,
    sum(case when b.alat_theodolit then b.alat_theodolit else b.alat_theodolit end) as jum_theodolit,
    sum(case when b.alat_mizwala then b.alat_mizwala else b.alat_mizwala end) as jum_mizwala,
    sum(case when b.alat_gps then b.alat_gps else b.alat_gps end) as jum_gps,
    sum(case when b.alat_kompas then b.alat_kompas else b.alat_kompas end) as jum_kompas,
    sum(case when b.alat_rubu then b.alat_rubu else b.alat_rubu end) as jum_rubu,
    sum(case when b.alat_binoculer then b.alat_binoculer else b.alat_binoculer end) as jum_binoculer,
    sum(case when b.alat_kalkulator then b.alat_kalkulator else b.alat_kalkulator end) as jum_kalkulator,
    sum(case when b.alat_gawanglokasi then b.alat_gawanglokasi else b.alat_gawanglokasi end) as jum_gawanglokasi
    FROM
    app_city AS a
    INNER JOIN hisab_data_alat AS b ON a.city_id = b.alat_kota
    WHERE
    b.alat_provinsi = $provinsi and b.alat_tahun = 2016
     -- and b.alat_kota != 0
     GROUP BY
     a.city_id
     ORDER BY
     a.city_id ASC
     ");
  return $query->result();
}

function alat_tahun2015()
{
  $query = $this->sihat->query("
    SELECT
    b.alat_provinsi,a.province_title,
    sum(case when b.alat_teropong then b.alat_teropong else b.alat_teropong end) as jum_teropong,
    sum(case when b.alat_altimeter then b.alat_altimeter else b.alat_altimeter end) as jum_altimeter,
    sum(case when b.alat_theodolit then b.alat_theodolit else b.alat_theodolit end) as jum_theodolit,
    sum(case when b.alat_mizwala then b.alat_mizwala else b.alat_mizwala end) as jum_mizwala,
    sum(case when b.alat_gps then b.alat_gps else b.alat_gps end) as jum_gps,
    sum(case when b.alat_kompas then b.alat_kompas else b.alat_kompas end) as jum_kompas,
    sum(case when b.alat_rubu then b.alat_rubu else b.alat_rubu end) as jum_rubu,
    sum(case when b.alat_binoculer then b.alat_binoculer else b.alat_binoculer end) as jum_binoculer,
    sum(case when b.alat_kalkulator then b.alat_kalkulator else b.alat_kalkulator end) as jum_kalkulator,
    sum(case when b.alat_gawanglokasi then b.alat_gawanglokasi else b.alat_gawanglokasi end) as jum_gawanglokasi
    FROM
    app_province a
    INNER JOIN hisab_data_alat b ON a.province_id = b.alat_provinsi
    WHERE
    b.alat_tahun = 2015
     -- and b.alat_kota != 0
     GROUP BY
     a.province_id
     ");
  return $query->result();
}

function alat_provinsi2015($provinsi)
{
  $query = $this->sihat->query("
    SELECT
    a.city_id,a.city_title,
    sum(case when b.alat_teropong then b.alat_teropong else b.alat_teropong end) as jum_teropong,
    sum(case when b.alat_altimeter then b.alat_altimeter else b.alat_altimeter end) as jum_altimeter,
    sum(case when b.alat_theodolit then b.alat_theodolit else b.alat_theodolit end) as jum_theodolit,
    sum(case when b.alat_mizwala then b.alat_mizwala else b.alat_mizwala end) as jum_mizwala,
    sum(case when b.alat_gps then b.alat_gps else b.alat_gps end) as jum_gps,
    sum(case when b.alat_kompas then b.alat_kompas else b.alat_kompas end) as jum_kompas,
    sum(case when b.alat_rubu then b.alat_rubu else b.alat_rubu end) as jum_rubu,
    sum(case when b.alat_binoculer then b.alat_binoculer else b.alat_binoculer end) as jum_binoculer,
    sum(case when b.alat_kalkulator then b.alat_kalkulator else b.alat_kalkulator end) as jum_kalkulator,
    sum(case when b.alat_gawanglokasi then b.alat_gawanglokasi else b.alat_gawanglokasi end) as jum_gawanglokasi
    FROM
    app_city AS a
    INNER JOIN hisab_data_alat AS b ON a.city_id = b.alat_kota
    WHERE
    b.alat_provinsi = $provinsi and b.alat_tahun = 2015
     -- and b.alat_kota != 0
     GROUP BY
     a.city_id
     ORDER BY
     a.city_id ASC
     ");
  return $query->result();
}





function get_hisablokasi()
{
  $query = $this->sihat->query("
    SELECT
    a.lokasi_provinsi,
    b.province_title,
    count( CASE WHEN a.lokasi_id THEN 1 ELSE 0 END ) AS jum_lokasi 
    FROM
    hisab_lokasi_rukyat as a
    LEFT JOIN app_province AS b ON a.lokasi_provinsi = b.province_id
    GROUP BY
    b.province_id 
    ORDER BY
    b.province_id ASC
    ");
  return $query->result();
}

function get_hisablokasi_provinsi($provinsi)
{
  $query = $this->sihat->query("
    SELECT
    a.lokasi_kota,
    b.city_title,
    a.lokasi_lokasi,
    a.lokasi_alamat,
    a.lokasi_lintang_deg,
    a.lokasi_lintang_jam,
    a.lokasi_lintang_menit,
    a.lokasi_lintang_arah,
    a.lokasi_bujur_deg,
    a.lokasi_bujur_jam,
    a.lokasi_bujur_menit,
    a.lokasi_bujur_arah 
    FROM
    hisab_lokasi_rukyat AS a
    LEFT JOIN app_city AS b ON a.lokasi_kota = b.city_id
    WHERE
    a.lokasi_provinsi = $provinsi
    GROUP BY
    a.lokasi_id 
    ");
  return $query->result();
}

function get_hisablaporan()
{
  $query = $this->sihat->query("
    SELECT
    b.ukur_provinsi,a.province_title,
    count(case when b.ukur_id then 1 else 0 end) as jum_pengukuran,
    sum(case when b.ukur_terlihat = 'terlihat' then 1 else 0 end) as jum_terlihat,
    sum(case when b.ukur_terlihat = 'tidak terlihat' then 1 else 0 end) as jum_nonterlihat,
    sum(case when b.ukur_bulan = 1 then 1 else 0 end) as bln_muharram,
    sum(case when b.ukur_bulan = 2 then 1 else 0 end) as bln_safar,
    sum(case when b.ukur_bulan = 3 then 1 else 0 end) as bln_rabiulawal,
    sum(case when b.ukur_bulan = 4 then 1 else 0 end) as bln_rabiulakhir,
    sum(case when b.ukur_bulan = 5 then 1 else 0 end) as bln_jumadalula,
    sum(case when b.ukur_bulan = 6 then 1 else 0 end) as bln_jumadalakhirah,
    sum(case when b.ukur_bulan = 7 then 1 else 0 end) as bln_rajab,
    sum(case when b.ukur_bulan = 8 then 1 else 0 end) as bln_syakban,
    sum(case when b.ukur_bulan = 9 then 1 else 0 end) as bln_ramadan,
    sum(case when b.ukur_bulan = 10 then 1 else 0 end) as bln_syawal,
    sum(case when b.ukur_bulan = 11 then 1 else 0 end) as bln_zulkadah,
    sum(case when b.ukur_bulan = 12 then 1 else 0 end) as bln_zulhijjah
    FROM
    app_province AS a
    INNER JOIN hisab_pengukuran_laporan AS b ON a.province_id = b.ukur_provinsi
    -- WHERE
    -- b.ukur_provinsi != 0 and b.ukur_kota != 0
    GROUP BY
    a.province_id
    ORDER BY
    a.province_id ASC
    ");
  return $query->result();
}

function get_hisablaporan_provinsi($provinsi)
{
  $query = $this->sihat->query("
    SELECT
    a.city_title,b.ukur_nama,b.ukur_alamat,b.ukur_azimut_1,b.ukur_azimut_2,b.ukur_azimut_3,b.ukur_tgl_pengukuran,b.ukur_jam_pengukuran,b.ukur_terlihat,b.ukur_tahun,b.ukur_bulan,b.ukur_tanggal,b.ukur_tempat_lahir,b.ukur_tgl_lahir
    FROM
    app_city AS a
    INNER JOIN hisab_pengukuran_laporan AS b ON a.city_id = b.ukur_kota
    WHERE
    b.ukur_provinsi = $provinsi
    GROUP BY
    a.city_id,b.ukur_id
    ORDER BY
    a.city_id ASC
    ");
  return $query->result();
}

function get_lintang()
{
  $query = $this->sihat->query("
    SELECT
    b.nama_propinsi,a.province_title,
    count(case when b.id_kota then 1 else 0 end) as jum_lintang
    FROM
    app_province AS a
    INNER JOIN data_lintang_kota_cms_new AS b ON a.province_id = b.nama_propinsi
    WHERE
    b.nama_propinsi != 0 and b.nama_kota != 0
    GROUP BY
    a.province_id
    ORDER BY
    a.province_id ASC
    ");
  return $query->result();
}

function get_lintang_provinsi($provinsi)
{
  $query = $this->sihat->query("
    SELECT
    a.city_title,b.bujur_tempat,b.lintang_tempat,b.time_zone,
    b.h
    FROM
    app_city AS a
    INNER JOIN data_lintang_kota_cms_new AS b ON a.city_id = b.nama_kota
    WHERE
    b.nama_propinsi = $provinsi and b.nama_propinsi != 0 and b.nama_kota != 0
    GROUP BY
    a.city_id,b.id_kota
    ORDER BY
    a.city_id ASC
    ");
  return $query->result();
}

function get_ramadhan()
{
  $query = $this->sihat->query("
    SELECT
    a.tgl_tahun,a.tgl_hijriah,a.tgl_start,a.tgl_end
    FROM
    hisab_tgl_puasa a
    GROUP BY
    a.tgl_tahun
    ORDER BY
    a.tgl_tahun DESC
    ");
  return $query->result();
}

}

/* End of file Simas_m.php */
/* Location: ./application/modules/docs/models/Simas_m.php */