<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Esbsnn_m extends CI_Model
{
    // function __construct(){
    //     parent::__construct();
    //     $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
    // }
    public function __destruct() {  
        $this->db->close();  
    }

	//fungsi cek session
    function logged_id()
    {
        return $this->session->userdata('user_id');
    }

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

    // Menghitung totalan data ----------------------------------------------------------------

    function total_all()
    {
        $query = $this->db_database8->query("
            SELECT
                count( a.biblio_id ) +
                ( SELECT count( b.author_id ) FROM mst_author AS b ) +
                ( SELECT count( c.topic_id ) FROM mst_topic AS c ) +
                ( SELECT count( d.publisher_id ) FROM mst_publisher AS d ) AS total
            FROM
                biblio AS a
            ");
        return $query->row();
    }

    function total_buku()
    {
        $query = $this->db_database8->query("
            SELECT
            count(a.biblio_id) as jumlah_buku
            FROM
            biblio as a
            ");
        return $query->row();
    }

    function total_author()
    {
        $query = $this->db_database8->query("
            SELECT
            count(a.author_id) as jumlah_author
            FROM
            mst_author as a
            ");
        return $query->row();
    }

    function total_publisher()
    {
        $query = $this->db_database8->query("
            SELECT
            count(a.publisher_id) as jumlah_publisher
            FROM
            mst_publisher as a
            ");
        return $query->row();
    }

    function total_topic()
    {
        $query = $this->db_database8->query("
            SELECT
            count(a.topic_id) as jumlah_topic
            FROM
            mst_topic as a
            ");
        return $query->row();
    }

    function get_totalan_dtsatkers()
    {
        $query = $this->db_database8->query("
            SELECT
            count(distinct b.kab_id) +
            count(b.kab_id and b.kab_kode_satker > 0) +
            (count(case when b.kab_id then b.kab_id else 0 end) - count(b.kab_id and b.kab_kode_satker > 0)) +
            count(b.kab_id and b.kab_nama_satker > 0) +
            (count(case when b.kab_id then b.kab_id else 0 end) - count(b.kab_id and b.kab_nama_satker > 0)) as satker
            FROM
            app_propinsi as a
            INNER JOIN app_kabupaten as b ON a.propinsi_id = b.kab_propinsi_id
            -- INNER JOIN app_user as c ON b.kab_id = c.user_kabupaten and a.propinsi_id = c.user_propinsi
            WHERE
            a.is_trash = 0 and b.kab_status = 0
            ");
        return $query->row();
    }

    function get_totalan()
    {
        $query = $this->db_database8->query("
            SELECT
            count( b.usul_id ) +
            sum( CASE WHEN b.usul_sertifikat = 'Kementerian Agama' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN b.usul_sertifikat = 'Proses Balik Nama Kemenag' THEN 1 ELSE 0 END ) +
            count( b.usul_nama_kua ) +
            format( sum( b.usul_luas_tanah ), 0 ) +
            sum( CASE WHEN b.usul_status_tanah = 'Penghapusan Gedung' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN b.usul_status_tanah = 'Tanah Kosong' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN b.usul_status_tanah = 'Perluasan Bangunan' THEN 1 ELSE 0 END ) +
            format( sum( b.usul_nilai_dipa ), 0 ) AS usulan_triwulan
            FROM
            app_propinsi AS a
            INNER JOIN app_usulan AS b ON a.propinsi_id = b.usul_propinsi 
            WHERE
            b.usul_tahun = 2021
            AND b.usul_status = 2
            ");
        return $query->row();
    }

    function get_totalan_dttahun($datatotal)
    {
        $query = $this->db_database8->query("
            SELECT
            count( b.usul_id ) +
            sum( CASE WHEN b.usul_sertifikat = 'Kementerian Agama' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN b.usul_sertifikat = 'Proses Balik Nama Kemenag' THEN 1 ELSE 0 END ) +
            count( b.usul_nama_kua ) +
            format( sum( b.usul_luas_tanah ), 0 ) +
            sum( CASE WHEN b.usul_status_tanah = 'Penghapusan Gedung' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN b.usul_status_tanah = 'Tanah Kosong' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN b.usul_status_tanah = 'Perluasan Bangunan' THEN 1 ELSE 0 END ) +
            format( sum( b.usul_nilai_dipa ), 0 ) AS total
            FROM
            app_propinsi AS a
            INNER JOIN app_usulan AS b ON a.propinsi_id = b.usul_propinsi 
            WHERE
            b.usul_tahun = $datatotal
            AND b.usul_status = 2
            ");
        return $query->row();
    }

    function get_totalan_it()
    {
        $query = $this->db_database8->query("
            SELECT
            count( a.usul_id ) +
            count( a.usul_nama_kua ) +
            format( sum( a.usul_luas_tanah ), 0 ) +
            sum( CASE WHEN a.usul_status_tanah = 'Penghapusan Gedung' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN a.usul_status_tanah = 'Tanah Kosong' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN a.usul_status_tanah = 'Perluasan Bangunan' THEN 1 ELSE 0 END ) +
            format( sum( a.usul_nilai_dipa ), 0 ) +
            sum( CASE WHEN a.usul_status = 0 THEN 1 ELSE 0 END ) +
            sum( CASE WHEN a.usul_status = 1 THEN 1 ELSE 0 END ) AS input_triwulan
            FROM
            app_usulan AS a
            INNER JOIN app_propinsi AS b ON a.usul_propinsi = b.propinsi_id 
            WHERE
            a.usul_tahun = 2021
            AND a.usul_status < 2
            ");
        return $query->row();
    }

    function get_totalan_dtinputtahun($datatotal)
    {
        $query = $this->db_database8->query("
            SELECT
            count( a.usul_id ) +
            count( a.usul_nama_kua ) +
            format( sum( a.usul_luas_tanah ), 0 ) +
            sum( CASE WHEN a.usul_status_tanah = 'Penghapusan Gedung' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN a.usul_status_tanah = 'Tanah Kosong' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN a.usul_status_tanah = 'Perluasan Bangunan' THEN 1 ELSE 0 END ) +
            format( sum( a.usul_nilai_dipa ), 0 ) +
            sum( CASE WHEN a.usul_status = 0 THEN 1 ELSE 0 END ) +
            sum( CASE WHEN a.usul_status = 1 THEN 1 ELSE 0 END ) AS total
            FROM
            app_usulan AS a
            INNER JOIN app_propinsi AS b ON a.usul_propinsi = b.propinsi_id 
            WHERE
            a.usul_tahun = $datatotal
            AND a.usul_status < 2
            ");
        return $query->row();
    }

    function get_totalan_au()
    {
        $query = $this->db_database8->query("
            SELECT
            count( a.usul_id ) +
            count( a.usul_nama_kua ) +
            sum( a.usul_luas_tanah ) +
            sum( CASE WHEN a.usul_status_tanah = 'Penghapusan Gedung' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN a.usul_status_tanah = 'Tanah Kosong' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN a.usul_status_tanah = 'Perluasan Bangunan' THEN 1 ELSE 0 END ) +
            format( sum( a.usul_nilai_dipa ), 0 ) AS approved_usulan
            FROM
            app_usulan AS a
            INNER JOIN app_propinsi AS b ON a.usul_propinsi = b.propinsi_id 
            WHERE
            a.usul_tahun = 2021
            AND a.usul_status = 1
            ");
        return $query->row();
    }

    function get_detailperpus()
    {
        $query = $this->db_database8->query("");
        return $query->result();
    }

    function get_totalan_dtautahun($datatotal)
    {
        $query = $this->db_database8->query("
            SELECT
            count( a.usul_id ) +
            count( a.usul_nama_kua ) +
            sum( a.usul_luas_tanah ) +
            sum( CASE WHEN a.usul_status_tanah = 'Penghapusan Gedung' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN a.usul_status_tanah = 'Tanah Kosong' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN a.usul_status_tanah = 'Perluasan Bangunan' THEN 1 ELSE 0 END ) +
            format( sum( a.usul_nilai_dipa ), 0 ) AS total
            FROM
            app_usulan AS a
            INNER JOIN app_propinsi AS b ON a.usul_propinsi = b.propinsi_id 
            WHERE
            a.usul_tahun = $datatotal
            AND a.usul_status = 1
            ");
        return $query->row();
    }

    // Menghitung totalan data ----------------------------------------------------------------

    //////////////////////////////////////////// ESBSN PROPINSI ////////////////////////////////////////////
    function get_esbsn()
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
        // mysql_close($query);
    }

    function get_esbsn_prop($propinsi)
    {
        $query = $this->db_database8->query("
            SELECT
            a.kab_id,a.kab_nama,a.kab_kode_satker,a.kab_nama_satker,a.kmg_kode_pendek,a.kmg_kode_panjang,a.kmg_nama_pendek,a.kmg_nama_panjang
            FROM
            app_kabupaten as a
            -- INNER JOIN app_user as b ON a.kab_id = b.user_kabupaten
            -- INNER JOIN app_propinsi as c ON c.propinsi_id = b.user_propinsi
            WHERE
            a.kab_propinsi_id = $propinsi and a.is_trash = 0 and a.kab_status = 0
            GROUP BY
            a.kab_id
            ORDER BY
            a.kab_id ASC
            ");
        return $query->result();
    }

    function get_tahun()
    {
        $query = $this->db_database8->query("
            SELECT
            a.usul_tahun 
            FROM 
            app_usulan as a
            WHERE
            a.usul_tahun != 0
            GROUP BY
            a.usul_tahun 
            ");
        return $query->result();
    }

    //////////////////////////////////////////// USULAN TRIWULAN ////////////////////////////////////////////
    function esbsn_tahun_triwulan($tahun)
    {
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

    function esbsn_propinsi_triwulan($tahun,$propinsi)
    {
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
            AND a.usul_propinsi = $propinsi 
            GROUP BY
            a.usul_kabupaten 
            ORDER BY
            a.usul_kabupaten
            ");
        return $query->result();
    }

    function esbsn_kabupaten_triwulan($tahun,$propinsi,$kabupaten)
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
            AND a.usul_propinsi = $propinsi
            AND a.usul_status = 2
            GROUP BY
            a.usul_id 
            ORDER BY
            a.usul_id ASC
            ");
        return $query->result();
    }

    //////////////////////////////////////////// INPUT USULAN ////////////////////////////////////////////
    function esbsn_tahun_inputusulan($tahun)
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

    function esbsn_propinsi_inputusulan($tahun,$propinsi)
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
            AND a.usul_propinsi = $propinsi 
            AND a.usul_status < 2
            GROUP BY
            b.kab_id 
            ORDER BY
            b.kab_id
            ");
        return $query->result();
    }

    function esbsn_kabupaten_inputusulan($tahun,$propinsi,$kabupaten)
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
            AND a.usul_kabupaten = $kabupaten 
            AND a.usul_propinsi = $propinsi 
            AND a.usul_status < 2 
            GROUP BY
            a.usul_id 
            ORDER BY
            a.usul_id
            ");
        return $query->result();
    }

    //////////////////////////////////////////// APPROVE USULAN ////////////////////////////////////////////
    function esbsn_tahun_approveusulan($tahun)
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

    function esbsn_propinsi_approveusulan($tahun,$propinsi)
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
            AND a.usul_propinsi = $propinsi 
            AND a.usul_status = 1
            GROUP BY
            b.kab_id 
            ORDER BY
            b.kab_id
            ");
        return $query->result();
    }

    function esbsn_kabupaten_approveusulan($tahun,$propinsi,$kabupaten)
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
            AND a.usul_propinsi = $propinsi
            AND a.usul_status = 1
            GROUP BY
            a.usul_id 
            ORDER BY
            a.usul_kabupaten
            ");
        return $query->result();
    }

    //////////////////////////////////////////// APPROVE USULAN ////////////////////////////////////////////
    function esbsn_tahun_ceklisusulan($tahun)
    {
        $query = $this->db_database8->query("
            SELECT
            b.usul_propinsi, a.propinsi_nama,
            sum(case when c.cek_type_id and c.cek_type_id = 1 then 1 else 0 end) jum_sertifikat,
            sum(case when c.cek_type_id and c.cek_type_id = 2 then 1 else 0 end) jum_rekomendasi_pu,
            sum(case when c.cek_type_id and c.cek_type_id = 3 then 1 else 0 end) jum_surat_usulan,
            sum(case when c.cek_type_id and c.cek_type_id = 4 then 1 else 0 end) jum_surat_pengantar,
            sum(case when c.cek_type_id and c.cek_type_id = 5 then 1 else 0 end) jum_sptjm,
            sum(case when c.cek_type_id and c.cek_type_id = 6 then 1 else 0 end) jum_fs,
            sum(case when c.cek_type_id and c.cek_type_id = 7 then 1 else 0 end) jum_kak,
            sum(case when c.cek_type_id and c.cek_type_id = 8 then 1 else 0 end) jum_site_plan,
            sum(case when c.cek_type_id and c.cek_type_id = 9 then 1 else 0 end) jum_sk_psp,
            sum(case when c.cek_type_id and c.cek_type_id = 10 then 1 else 0 end) jum_foto,
            sum(case when c.cek_type_id and c.cek_type_id = 12 then 1 else 0 end) jum_rab,
            sum(case when c.cek_type_id and c.cek_type_id = 13 then 1 else 0 end) jum_surat_bpn,
            sum(case when c.cek_type_id and c.cek_type_id = 14 then 1 else 0 end) jum_akte_jubel,
            sum(case when c.cek_type_id and c.cek_type_id = 11 then 1 else 0 end) jum_lainnya,
            b.usul_tahun
            FROM
            app_propinsi as a
            LEFT JOIN app_usulan as b ON a.propinsi_id = b.usul_propinsi
            LEFT JOIN app_usulan_ceklis as c ON b.usul_id = c.cek_usul_id
            WHERE
            b.usul_tahun = $tahun and b.usul_status < 2
            GROUP BY
            a.propinsi_id
            ");
        return $query->result();
    }

    function esbsn_propinsi_ceklisusulan($tahun,$propinsi)
    {
        $query = $this->db_database8->query("
            SELECT
            b.usul_id,b.usul_nama_kua,
            sum(case when b.usul_id = a.cek_usul_id and a.cek_type_id = 1 then 1 else 0 end) as jum_sertifikat,
            sum(case when b.usul_id = a.cek_usul_id and a.cek_type_id = 2 then 1 else 0 end) as jum_rekomendasi_pu,
            sum(case when b.usul_id = a.cek_usul_id and a.cek_type_id = 3 then 1 else 0 end) as jum_surat_usulan,
            sum(case when b.usul_id = a.cek_usul_id and a.cek_type_id = 4 then 1 else 0 end) as jum_surat_pengantar,
            sum(case when b.usul_id = a.cek_usul_id and a.cek_type_id = 5 then 1 else 0 end) as jum_sptjm,
            sum(case when b.usul_id = a.cek_usul_id and a.cek_type_id = 6 then 1 else 0 end) as jum_fs,
            sum(case when b.usul_id = a.cek_usul_id and a.cek_type_id = 7 then 1 else 0 end) as jum_kak,
            sum(case when b.usul_id = a.cek_usul_id and a.cek_type_id = 8 then 1 else 0 end) as jum_site_plan,
            sum(case when b.usul_id = a.cek_usul_id and a.cek_type_id = 9 then 1 else 0 end) as jum_sk_psp,
            sum(case when b.usul_id = a.cek_usul_id and a.cek_type_id = 10 then 1 else 0 end) as jum_foto,
            sum(case when b.usul_id = a.cek_usul_id and a.cek_type_id = 12 then 1 else 0 end) as jum_rab,
            sum(case when b.usul_id = a.cek_usul_id and a.cek_type_id = 13 then 1 else 0 end) as jum_surat_bpn,
            sum(case when b.usul_id = a.cek_usul_id and a.cek_type_id = 14 then 1 else 0 end) as jum_akte_jubel,
            sum(case when b.usul_id = a.cek_usul_id and a.cek_type_id = 11 then 1 else 0 end) as jum_lainnya,
            b.usul_cek_note,
            b.usul_tahun
            FROM
            app_usulan_ceklis as a,
            app_usulan as b
            WHERE
            b.usul_propinsi = $propinsi and b.usul_tahun = $tahun and b.usul_status < 2 and (b.usul_id = a.cek_usul_id  or b.usul_id <> 1 and a.cek_usul_id <> 1)
            GROUP BY
            b.usul_id
            ");
        return $query->result();
    }

    function esbsn_id_ceklisusulan($usul,$tahun)
    {
        $query = $this->db_database8->query("
            SELECT
            b.usul_nama_kua,a.cek_type
            FROM
            app_usulan_ceklis as a,
            app_usulan as b
            WHERE
            b.usul_tahun = $tahun and b.usul_status < 2 and a.cek_usul_id = $usul and b.usul_id = a.cek_usul_id
            GROUP BY
            a.cek_id
            ");
        return $query->result();
    }

}