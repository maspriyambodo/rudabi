<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpenghulu_m extends CI_Model
{
    function __construct()
    {
      parent::__construct();
      $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
    }

    //fungsi cek session
    function logged_id()
    {
      return $this->session->userdata('user_id');
    }

    public function get_kua()
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
        a.province_id = b.kua_province_id
        and b.is_trash != 1
        GROUP BY
        a.province_id
      ");
      return $query->result();
    }

    public function get_kua_kabupaten($provinsi)
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
        a.city_id = b.kua_city_id and b.is_trash != 1 and b.kua_city_id != 0 and b.kua_province_id = $provinsi
        GROUP BY
        a.city_id
      ");
      return $query->result();
    }

    public function get_kua_kecamatan($kabupaten)
    {
      $query = $this->db_database2->query("
        SELECT
        a.kua_id,
        a.kua_title
        FROM
        master_kua as a
        WHERE
        a.kua_city_id = $kabupaten and a.is_trash != 1
        GROUP BY
        a.kua_id
      ");
      return $query->result();
    }

    public function get_penghulu()
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

    public function get_penghulu_kabupaten($provinsi)
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
        b.is_trash != 1 and a.city_id = b.pegawai_city and b.pegawai_city != 0 and a.city_province = $provinsi
        GROUP BY
        a.city_id
      ");
      return $query->result();
    }

    public function get_penghulu_kecamatan($kabupaten)
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
        a.city_id = b.pegawai_city and b.pegawai_status = 1 and b.is_trash != 1 and c.kua_id = b.pegawai_kua and a.city_id = $kabupaten
        GROUP BY
        b.pegawai_id
      ");
      return $query->result();
    }

    public function get_nikah()
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

    public function get_nikah_kabupaten($provinsi)
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
        and b.nikah_province_id != 0 and b.nikah_city_id != 0 and b.nikah_kua_id != 0 and a.city_province = $provinsi
        GROUP BY
        a.city_id
      ");
      return $query->result();
    }

    public function get_nikah_detail($kabupaten)
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
      and a.nikah_city_id = $kabupaten and a.nikah_province_id != 0 and a.nikah_city_id != 0 and a.nikah_kua_id != 0
      GROUP BY
      a.nikah_id
      ");
      return $query->result();
    }
}