<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Esbsn_m extends CI_Model
{
    public function get_satker()
    {
        $query = $this->db_database8->query("
            SELECT
            b.kab_propinsi_id,a.propinsi_nama,
            count(distinct b.kab_id) as jum_kab,
            count(b.kab_id and b.kab_kode_satker > 0) as ada_kd_satker,
            (count(case when b.kab_id then b.kab_id else 0 end) - count(b.kab_id and b.kab_kode_satker > 0)) as non_kd_satker,
            count(b.kab_id and b.kab_nama_satker > 0) as ada_nama_satker,
            (count(case when b.kab_id then b.kab_id else 0 end) - count(b.kab_id and b.kab_nama_satker > 0)) as non_nama_satker
            FROM
            app_propinsi as a
            INNER JOIN app_kabupaten as b ON a.propinsi_id = b.kab_propinsi_id
            -- INNER JOIN app_user as c ON b.kab_id = c.user_kabupaten and a.propinsi_id = c.user_propinsi
            WHERE
            a.is_trash = 0 and b.kab_status = 0
            GROUP BY
            a.propinsi_id
            ORDER BY
            a.propinsi_id
            ");
        return $query->result();
    }

    public function get_satker_detail($provinsi)
    {
        $query = $this->db_database8->query("
            SELECT
            a.kab_id,a.kab_nama,a.kab_kode_satker,a.kab_nama_satker,a.kmg_kode_pendek,a.kmg_kode_panjang,a.kmg_nama_pendek,a.kmg_nama_panjang
            FROM
            app_kabupaten as a
            WHERE
            a.kab_propinsi_id = $provinsi and a.is_trash = 0 and a.kab_status = 0
            GROUP BY
            a.kab_id
            ORDER BY
            a.kab_id ASC
            ");
        return $query->result();
    }

    public function get_usulantriwulan(){
        // $toyear = curdate(year());
        $query = $this->db_database8->query("
            SELECT
            b.usul_propinsi,
            a.propinsi_nama,
            count( b.usul_id ) AS jum_data,
            sum( CASE WHEN b.usul_sertifikat = 'Kementerian Agama' THEN 1 ELSE 0 END ) AS sert_kemanag,
            sum( CASE WHEN b.usul_sertifikat = 'Proses Balik Nama Kemenag' THEN 1 ELSE 0 END ) AS sert_baliknama,
            count( b.usul_nama_kua ) AS jum_kua,
            format( sum( b.usul_luas_tanah ), 0 ) AS luas_tanah,
            sum( CASE WHEN b.usul_status_tanah = 'Penghapusan Gedung' THEN 1 ELSE 0 END ) AS penghapusan_gedung,
            sum( CASE WHEN b.usul_status_tanah = 'Tanah Kosong' THEN 1 ELSE 0 END ) AS tanah_kosong,
            sum( CASE WHEN b.usul_status_tanah = 'Perluasan Bangunan' THEN 1 ELSE 0 END ) AS perluasan_bangunan,
            format( sum( b.usul_nilai_dipa ), 0 ) AS nilai_dipa,
            b.usul_tahun
            FROM
            app_propinsi AS a
            INNER JOIN app_usulan AS b ON a.propinsi_id = b.usul_propinsi 
            WHERE
            b.usul_tahun = YEAR(CURDATE())
            AND b.usul_status = 2 
            GROUP BY
            a.propinsi_id 
            ORDER BY
            a.propinsi_id
            ");
        return $query->result();
    }

    public function get_usulantriwulan_tahun($tahun){
        $query = $this->db_database8->query("
            SELECT
            b.usul_propinsi,
            a.propinsi_nama,
            count( b.usul_id ) AS jum_data,
            sum( CASE WHEN b.usul_sertifikat = 'Kementerian Agama' THEN 1 ELSE 0 END ) AS sert_kemanag,
            sum( CASE WHEN b.usul_sertifikat = 'Proses Balik Nama Kemenag' THEN 1 ELSE 0 END ) AS sert_baliknama,
            count( b.usul_nama_kua ) AS jum_kua,
            format( sum( b.usul_luas_tanah ), 0 ) AS luas_tanah,
            sum( CASE WHEN b.usul_status_tanah = 'Penghapusan Gedung' THEN 1 ELSE 0 END ) AS penghapusan_gedung,
            sum( CASE WHEN b.usul_status_tanah = 'Tanah Kosong' THEN 1 ELSE 0 END ) AS tanah_kosong,
            sum( CASE WHEN b.usul_status_tanah = 'Perluasan Bangunan' THEN 1 ELSE 0 END ) AS perluasan_bangunan,
            format( sum( b.usul_nilai_dipa ), 0 ) AS nilai_dipa,
            b.usul_tahun
            FROM
            app_propinsi AS a
            INNER JOIN app_usulan AS b ON a.propinsi_id = b.usul_propinsi 
            WHERE
            b.usul_tahun = $tahun
            AND b.usul_status = 2 
            GROUP BY
            a.propinsi_id 
            ORDER BY
            a.propinsi_id
            ");
        return $query->result();
    }

    public function get_usulantriwulan_kabupaten($tahun, $provinsi){
        $query = $this->db_database8->query("
            SELECT
            a.usul_kabupaten,
            b.kab_nama,
            count( a.usul_id ) AS jum_data,
            sum( CASE WHEN a.usul_sertifikat = 'Kementerian Agama' THEN 1 ELSE 0 END ) AS sert_kemanag,
            sum( CASE WHEN a.usul_sertifikat = 'Proses Balik Nama Kemenag' THEN 1 ELSE 0 END ) AS sert_baliknama,
            count( a.usul_nama_kua ) AS jum_kua,
            format( sum( a.usul_luas_tanah ), 0 ) AS luas_tanah,
            sum( CASE WHEN a.usul_status_tanah = 'Penghapusan Gedung' THEN 1 ELSE 0 END ) AS penghapusan_gedung,
            sum( CASE WHEN a.usul_status_tanah = 'Tanah Kosong' THEN 1 ELSE 0 END ) AS tanah_kosong,
            sum( CASE WHEN a.usul_status_tanah = 'Perluasan Bangunan' THEN 1 ELSE 0 END ) AS perluasan_bangunan,
            format( sum( a.usul_nilai_dipa ), 0 ) AS nilai_dipa 
            FROM
            app_usulan AS a
            INNER JOIN app_kabupaten AS b ON a.usul_kabupaten = b.kab_id 
            WHERE
            a.usul_tahun = $tahun 
            AND a.usul_status = 2 
            AND a.usul_propinsi = $provinsi
            GROUP BY
            a.usul_kabupaten 
            ORDER BY
            a.usul_kabupaten
            ");
        return $query->result();
    }

    public function get_usulantriwulan_kecamatan($tahun, $provinsi, $kabupaten)
    {
        $query = $this->db_database8->query("
            SELECT
            a.usul_kpl_kua,
            a.usul_pic_kua,
            a.usul_nama_kua,
            a.usul_alamat_kua,
            a.usul_tlp_kua,
            a.usul_pic_hp_kua,
            a.usul_sertifikat,
            a.usul_luas_tanah,
            a.usul_status_tanah,
            a.usul_date,
            a.usul_tahun,
            a.usul_unit_organisasi,
            a.usul_no_dipa,
            a.usul_nilai_dipa,
            a.usul_info_kegiatan 
            FROM
            app_usulan AS a 
            WHERE
            a.usul_tahun = $tahun  
            AND a.usul_kabupaten = $kabupaten 
            AND a.usul_propinsi = $provinsi
            AND a.usul_status = 2
            GROUP BY
            a.usul_id 
            ORDER BY
            a.usul_id ASC
            ");
        return $query->result();
    }

    public function get_inputtriwulan()
    {
        $query = $this->db_database8->query("
            SELECT
            a.usul_propinsi,
            b.propinsi_nama,
            count( a.usul_id ) AS jum_kabkot,
            count( a.usul_nama_kua ) AS jum_kua,
            format( sum( a.usul_luas_tanah ), 0 ) AS luas_tanah,
            sum( CASE WHEN a.usul_status_tanah = 'Penghapusan Gedung' THEN 1 ELSE 0 END ) AS penghapusan_gedung,
            sum( CASE WHEN a.usul_status_tanah = 'Tanah Kosong' THEN 1 ELSE 0 END ) AS tanah_kosong,
            sum( CASE WHEN a.usul_status_tanah = 'Perluasan Bangunan' THEN 1 ELSE 0 END ) AS perluasan_bangunan,
            format( sum( a.usul_nilai_dipa ), 0 ) AS nilai_dipa,
            sum( CASE WHEN a.usul_status = 0 THEN 1 ELSE 0 END ) AS status_pending,
            sum( CASE WHEN a.usul_status = 1 THEN 1 ELSE 0 END ) AS status_req_approve,
            a.usul_tahun
            FROM
            app_usulan AS a
            INNER JOIN app_propinsi AS b ON a.usul_propinsi = b.propinsi_id 
            WHERE
            a.usul_tahun = YEAR(CURDATE())
            AND a.usul_status < 2 
            GROUP BY
            b.propinsi_id 
            ORDER BY
            b.propinsi_id
            ");
        return $query->result();
    }

    public function get_inputtriwulan_tahun($tahun)
    {
        $query = $this->db_database8->query("
            SELECT
            a.usul_propinsi,
            b.propinsi_nama,
            count( a.usul_id ) AS jum_kabkot,
            count( a.usul_nama_kua ) AS jum_kua,
            format( sum( a.usul_luas_tanah ), 0 ) AS luas_tanah,
            sum( CASE WHEN a.usul_status_tanah = 'Penghapusan Gedung' THEN 1 ELSE 0 END ) AS penghapusan_gedung,
            sum( CASE WHEN a.usul_status_tanah = 'Tanah Kosong' THEN 1 ELSE 0 END ) AS tanah_kosong,
            sum( CASE WHEN a.usul_status_tanah = 'Perluasan Bangunan' THEN 1 ELSE 0 END ) AS perluasan_bangunan,
            format( sum( a.usul_nilai_dipa ), 0 ) AS nilai_dipa,
            sum( CASE WHEN a.usul_status = 0 THEN 1 ELSE 0 END ) AS status_pending,
            sum( CASE WHEN a.usul_status = 1 THEN 1 ELSE 0 END ) AS status_req_approve,
            a.usul_tahun
            FROM
            app_usulan AS a
            INNER JOIN app_propinsi AS b ON a.usul_propinsi = b.propinsi_id 
            WHERE
            a.usul_tahun = $tahun
            AND a.usul_status < 2 
            GROUP BY
            b.propinsi_id 
            ORDER BY
            b.propinsi_id
            ");
        return $query->result();
    }

    public function get_inputtriwulan_kabupaten($tahun, $provinsi)
    {
        $query = $this->db_database8->query("
            SELECT
            a.usul_kabupaten,
            b.kab_nama,
            count( a.usul_id ) AS data_kabkot,
            count( a.usul_nama_kua ) AS data_kua,
            format( sum( a.usul_luas_tanah ), 0 ) AS luas_tanah,
            sum( CASE WHEN a.usul_status_tanah = 'Penghapusan Gedung' THEN 1 ELSE 0 END ) AS penghapusan_gedung,
            sum( CASE WHEN a.usul_status_tanah = 'Tanah Kosong' THEN 1 ELSE 0 END ) AS tanah_kosong,
            sum( CASE WHEN a.usul_status_tanah = 'Perluasan Bangunan' THEN 1 ELSE 0 END ) AS perluasan_bangunan,
            format( sum( a.usul_nilai_dipa ), 0 ) AS nilai_dipa,
            sum( CASE WHEN a.usul_status = 0 THEN 1 ELSE 0 END ) AS status_pending,
            sum( CASE WHEN a.usul_status = 1 THEN 1 ELSE 0 END ) AS status_req_approve,
            a.usul_tahun
            FROM
            app_usulan AS a
            INNER JOIN app_kabupaten AS b ON a.usul_kabupaten = b.kab_id 
            WHERE
            a.usul_tahun = $tahun  
            AND a.usul_propinsi = $provinsi
            AND a.usul_status < 2
            GROUP BY
            b.kab_id 
            ORDER BY
            b.kab_id
            ");
        return $query->result();
    }

    public function get_inputtriwulan_kecamatan($tahun, $provinsi, $kabupaten)
    {
        $query = $this->db_database8->query("
            SELECT
            c.propinsi_nama,
            b.kab_nama,
            a.usul_nama_kua,
            a.usul_alamat_kua,
            a.usul_status_tanah,
            format( a.usul_nilai_dipa, 0 ) AS usul_nilai_dipa,
            IF
            ( a.usul_status = 0, 'Pending', 'Request Approve' ) AS STATUS 
            FROM
            app_usulan AS a
            INNER JOIN app_kabupaten AS b ON a.usul_kabupaten = b.kab_id
            INNER JOIN app_propinsi AS c ON b.kab_propinsi_id = c.propinsi_id 
            AND a.usul_propinsi = c.propinsi_id 
            WHERE
            a.usul_tahun = $tahun 
            AND a.usul_propinsi = $provinsi
            AND a.usul_kabupaten = $kabupaten 
            AND a.usul_status < 2 
            GROUP BY
            a.usul_id 
            ORDER BY
            a.usul_id
            ");
        return $query->result();
    }

    public function get_approved()
    {
        $query = $this->db_database8->query("
            SELECT
            a.usul_propinsi,
            b.propinsi_nama,
            count( a.usul_id ) AS jum_kabkot,
            count( a.usul_nama_kua ) AS jum_kua,
            sum( a.usul_luas_tanah ) AS luas_tanah,
            sum( CASE WHEN a.usul_status_tanah = 'Penghapusan Gedung' THEN 1 ELSE 0 END ) AS penghapusan_gedung,
            sum( CASE WHEN a.usul_status_tanah = 'Tanah Kosong' THEN 1 ELSE 0 END ) AS tanah_kosong,
            sum( CASE WHEN a.usul_status_tanah = 'Perluasan Bangunan' THEN 1 ELSE 0 END ) AS perluasan_bangunan,
            format( sum( a.usul_nilai_dipa ), 0 ) AS nilai_dipa,
            IF
            ( a.usul_status = 1, 'Request Approve', 'Dirubah' ) AS STATUS,
            a.usul_tahun 
            FROM
            app_usulan AS a
            INNER JOIN app_propinsi AS b ON a.usul_propinsi = b.propinsi_id 
            WHERE
            a.usul_tahun = YEAR(CURDATE())
            AND a.usul_status = 1 
            GROUP BY
            b.propinsi_id 
            ORDER BY
            b.propinsi_id ASC
            ");
        return $query->result();
    }

    public function get_approved_tahun($tahun)
    {
        $query = $this->db_database8->query("
            SELECT
            a.usul_propinsi,
            b.propinsi_nama,
            count( a.usul_id ) AS jum_kabkot,
            count( a.usul_nama_kua ) AS jum_kua,
            sum( a.usul_luas_tanah ) AS luas_tanah,
            sum( CASE WHEN a.usul_status_tanah = 'Penghapusan Gedung' THEN 1 ELSE 0 END ) AS penghapusan_gedung,
            sum( CASE WHEN a.usul_status_tanah = 'Tanah Kosong' THEN 1 ELSE 0 END ) AS tanah_kosong,
            sum( CASE WHEN a.usul_status_tanah = 'Perluasan Bangunan' THEN 1 ELSE 0 END ) AS perluasan_bangunan,
            format( sum( a.usul_nilai_dipa ), 0 ) AS nilai_dipa,
            IF
            ( a.usul_status = 1, 'Request Approve', 'Dirubah' ) AS STATUS,
            a.usul_tahun 
            FROM
            app_usulan AS a
            INNER JOIN app_propinsi AS b ON a.usul_propinsi = b.propinsi_id 
            WHERE
            a.usul_tahun = $tahun
            AND a.usul_status = 1 
            GROUP BY
            b.propinsi_id 
            ORDER BY
            b.propinsi_id ASC
            ");
        return $query->result();
    }

    public function get_approved_kabupaten($tahun, $provinsi)
    {
        $query = $this->db_database8->query("
            SELECT
            a.usul_kabupaten,
            b.kab_nama,
            count( a.usul_id ) AS jum_kabkot,
            count( a.usul_nama_kua ) AS jum_kua,
            sum( a.usul_luas_tanah ) AS luas_tanah,
            sum( CASE WHEN a.usul_status_tanah = 'Penghapusan Gedung' THEN 1 ELSE 0 END ) AS penghapusan_gedung,
            sum( CASE WHEN a.usul_status_tanah = 'Tanah Kosong' THEN 1 ELSE 0 END ) AS tanah_kosong,
            sum( CASE WHEN a.usul_status_tanah = 'Perluasan Bangunan' THEN 1 ELSE 0 END ) AS perluasan_bangunan,
            format( sum( a.usul_nilai_dipa ), 0 ) AS nilai_dipa,
            IF
            ( a.usul_status = 1, 'Request Approve', 'Dirubah' ) AS STATUS,
            a.usul_tahun 
            FROM
            app_usulan AS a
            INNER JOIN app_kabupaten AS b ON a.usul_kabupaten = b.kab_id 
            WHERE
            a.usul_tahun = $tahun  
            AND a.usul_propinsi = $provinsi
            AND a.usul_status = 1
            GROUP BY
            b.kab_id 
            ORDER BY
            b.kab_id
            ");
        return $query->result();
    }

    public function get_approved_kecamatan($tahun,$provinsi,$kabupaten)
    {
        $query = $this->db_database8->query("
            SELECT
            c.propinsi_nama,
            b.kab_nama,
            a.usul_nama_kua,
            a.usul_alamat_kua,
            a.usul_status_tanah,
            format( a.usul_nilai_dipa, 0 ) AS nilai_dipa,
            IF
            ( a.usul_status = 1, 'Request Approve', 'Dirubah' ) AS STATUS 
            FROM
            app_usulan AS a
            INNER JOIN app_kabupaten AS b ON a.usul_kabupaten = b.kab_id
            INNER JOIN app_propinsi AS c ON b.kab_propinsi_id = c.propinsi_id 
            AND a.usul_propinsi = c.propinsi_id 
            WHERE
            a.usul_tahun = $tahun  
            AND a.usul_kabupaten = $kabupaten 
            AND a.usul_propinsi = $provinsi
            AND a.usul_status = 1
            GROUP BY
            a.usul_id 
            ORDER BY
            a.usul_kabupaten
            ");
        return $query->result();
    }

}