<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sicakepp_m extends CI_Model
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

    function get_totalan_laki()
    {
        $query = $this->db_database9->query("
            SELECT
            sum( CASE WHEN a.peg_jenkel = 1 THEN 1 ELSE 0 END ) AS laki_laki
            FROM
            app_pegawai AS a
            LEFT JOIN app_user AS b ON a.peg_user = b.user_id
            INNER JOIN app_propinsi AS c ON a.peg_provinsi = c.propinsi_id
            INNER JOIN app_kabupaten AS d ON a.peg_kabupaten = d.kab_id 
            WHERE
            b.user_type = 1
            ");
        return $query->row();
    }

    function get_totalan_perempuan()
    {
        $query = $this->db_database9->query("
            SELECT
            sum( CASE WHEN a.peg_jenkel = 2 THEN 1 ELSE 0 END ) AS wanita
            FROM
            app_pegawai AS a
            LEFT JOIN app_user AS b ON a.peg_user = b.user_id
            INNER JOIN app_propinsi AS c ON a.peg_provinsi = c.propinsi_id
            INNER JOIN app_kabupaten AS d ON a.peg_kabupaten = d.kab_id 
            WHERE
            b.user_type = 1
            ");
        return $query->row();
    }

    function get_totalan_agama()
    {
        $query = $this->db_database9->query("
            SELECT
            sum( CASE WHEN a.peg_agama = 1 THEN 1 ELSE 0 END ) AS islam
            FROM
            app_pegawai AS a
            LEFT JOIN app_user AS b ON a.peg_user = b.user_id
            INNER JOIN app_propinsi AS c ON a.peg_provinsi = c.propinsi_id
            INNER JOIN app_kabupaten AS d ON a.peg_kabupaten = d.kab_id 
            WHERE
            b.user_type = 1
            ");
        return $query->row();
    }

    function get_totalan_gol1()
    {
        $query = $this->db_database9->query("
            SELECT
            sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'I/a - Juru Muda' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'I/b - Juru Muda Tk.I' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'I/c - Juru' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'I/d - Juru Tk.I' THEN 1 ELSE 0 END ) AS I 
            FROM
            app_user AS a
            INNER JOIN app_msater_data AS b ON a.user_gol = b.item_id
            LEFT JOIN app_pegawai AS c ON a.user_id = c.peg_user
            INNER JOIN app_kabupaten AS d ON c.peg_kabupaten = d.kab_id
            INNER JOIN app_propinsi AS e ON c.peg_provinsi = e.propinsi_id 
            WHERE
            a.user_type = 1 
    --         GROUP BY
    --         c.peg_provinsi
            ");
        return $query->row();
    }

    function get_totalan_gol3()
    {
        $query = $this->db_database9->query("
            SELECT
            sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'III/a - Penata Muda' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'III/b - Penata Muda Tk.I' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'III/c - Penata' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'III/d - Penata Tk.I' THEN 1 ELSE 0 END ) AS III 
            FROM
            app_user AS a
            INNER JOIN app_msater_data AS b ON a.user_gol = b.item_id
            LEFT JOIN app_pegawai AS c ON a.user_id = c.peg_user
            INNER JOIN app_kabupaten AS d ON c.peg_kabupaten = d.kab_id
            INNER JOIN app_propinsi AS e ON c.peg_provinsi = e.propinsi_id 
            WHERE
            a.user_type = 1
            ");
        return $query->row();
    }

    function get_totalan_gol4()
    {
        $query = $this->db_database9->query("
            SELECT
            sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/a - Pembina' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/b - Pembina Tk.I' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/c - Pembina Utama Muda' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/d - Pembina Utama Madya' THEN 1 ELSE 0 END ) +
            sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/e - Pembina Utama' THEN 1 ELSE 0 END ) AS IV
            FROM
            app_user AS a
            INNER JOIN app_msater_data AS b ON a.user_gol = b.item_id
            LEFT JOIN app_pegawai AS c ON a.user_id = c.peg_user
            INNER JOIN app_kabupaten AS d ON c.peg_kabupaten = d.kab_id
            INNER JOIN app_propinsi AS e ON c.peg_provinsi = e.propinsi_id 
            WHERE
            a.user_type = 1 
    --         GROUP BY
    --         c.peg_provinsi
            ");
        return $query->row();
    }

    function get_totalan_dtpegawais()
    {
        $query = $this->db_database9->query("
            SELECT
            count( a.peg_provinsi ) as data_pegawai
            FROM
            app_pegawai AS a
            LEFT JOIN app_user AS b ON a.peg_user = b.user_id
            INNER JOIN app_propinsi AS c ON a.peg_provinsi = c.propinsi_id
            INNER JOIN app_kabupaten AS d ON a.peg_kabupaten = d.kab_id 
            WHERE
            b.user_type = 1
            ");
        return $query->row();
    }

    function get_totalan_dtpensiuns()
    {
        $query = $this->db_database9->query("
            SELECT
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'I/a - Juru Muda' THEN 1 ELSE 0 END ) +
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'I/b - Juru Muda Tk.I' THEN 1 ELSE 0 END ) +
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'I/c - Juru' THEN 1 ELSE 0 END ) +
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'I/d - Juru Tk.I' THEN 1 ELSE 0 END ) +
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'II/a - Pengatur Muda' THEN 1 ELSE 0 END ) +
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'II/b - Pengatur Muda Tk.I' THEN 1 ELSE 0 END ) +
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'II/c - Pengatur' THEN 1 ELSE 0 END ) +
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'II/d - Pengatur Tk.I' THEN 1 ELSE 0 END ) +
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'III/a - Penata Muda' THEN 1 ELSE 0 END ) +
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'III/b - Penata Muda Tk.I' THEN 1 ELSE 0 END ) +
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'III/c - Penata' THEN 1 ELSE 0 END ) +
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'III/d - Penata Tk.I' THEN 1 ELSE 0 END ) +
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/a - Pembina' THEN 1 ELSE 0 END ) +
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/b - Pembina Tk.I' THEN 1 ELSE 0 END ) +
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/c - Pembina Utama Muda' THEN 1 ELSE 0 END ) +
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/d - Pembina Utama Madya' THEN 1 ELSE 0 END ) +
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/e - Pembina Utama' THEN 1 ELSE 0 END ) +
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = '-' THEN 1 ELSE 0 END ) AS data_pensiun
        FROM
        --         app_pegawai as a
        --         LEFT JOIN app_user as b on a.peg_user = b.user_id
        --         LEFT JOIN app_msater_data as c on b.user_gol = c.item_id
        --         LEFT JOIN app_propinsi as d on a.peg_provinsi = d.propinsi_id
        app_user AS a
        INNER JOIN app_msater_data AS b ON a.user_gol = b.item_id
        LEFT JOIN app_pegawai AS c ON a.user_id = c.peg_user
        INNER JOIN app_kabupaten AS d ON c.peg_kabupaten = d.kab_id
        INNER JOIN app_propinsi AS e ON c.peg_provinsi = e.propinsi_id 
        WHERE
        --         a.peg_kabupaten != 0 and a.peg_user != 1
        a.user_type = 1 
--         GROUP BY
--         c.peg_provinsi
            ");
        return $query->row();
    }

    // Menghitung totalan data ----------------------------------------------------------------

    //////////////////////////////////////////// MUTASI PEGAWAI ////////////////////////////////////////////

    function get_pegawai()
    {
        $query = $this->db_database9->query("
            SELECT
            c.propinsi_id AS peg_provinsi,
            c.propinsi_nama,
            count( a.peg_provinsi ) AS j_pegawai,
            sum( CASE WHEN a.peg_jenkel = 1 THEN 1 ELSE 0 END ) AS laki_laki,
            sum( CASE WHEN a.peg_jenkel = 2 THEN 1 ELSE 0 END ) AS perempuan,
            sum( CASE WHEN a.peg_jenkel = 0 THEN 1 ELSE 0 END ) AS laki_perempuan,
            sum( CASE WHEN a.peg_agama = 1 THEN 1 ELSE 0 END ) AS agama_islam,
            sum( CASE WHEN a.peg_agama = 0 THEN 1 ELSE 0 END ) AS tanpa_agama 
            FROM
            app_pegawai AS a
            LEFT JOIN app_user AS b ON a.peg_user = b.user_id
            INNER JOIN app_propinsi AS c ON a.peg_provinsi = c.propinsi_id
            INNER JOIN app_kabupaten AS d ON a.peg_kabupaten = d.kab_id 
            WHERE
            b.user_type = 1 
            GROUP BY
            c.propinsi_id
            ");
        return $query->result();
    }

    function get_pegawai_prop($propinsi)
    {
        $query = $this->db_database9->query("
            SELECT
            d.kab_id AS peg_kabupaten,
            d.kab_nama,
            count( a.peg_provinsi ) AS j_pegawai,
            sum( CASE WHEN a.peg_jenkel = 1 THEN 1 ELSE 0 END ) AS laki_laki,
            sum( CASE WHEN a.peg_jenkel = 2 THEN 1 ELSE 0 END ) AS perempuan,
            sum( CASE WHEN a.peg_jenkel = 0 THEN 1 ELSE 0 END ) AS laki_perempuan,
            sum( CASE WHEN a.peg_agama = 1 THEN 1 ELSE 0 END ) AS agama_islam,
            sum( CASE WHEN a.peg_agama = 0 THEN 1 ELSE 0 END ) AS tanpa_agama 
            FROM
            app_pegawai AS a
            LEFT JOIN app_user AS b ON a.peg_user = b.user_id
            INNER JOIN app_kabupaten AS d ON a.peg_kabupaten = d.kab_id 
            WHERE
            b.user_type = 1 and a.peg_provinsi = $propinsi
            GROUP BY
            d.kab_id
            ");
        return $query->result();
    }

    function get_pegawai_kab($kabkot)
    {
        $query = $this->db_database9->query("   
            SELECT
            a.peg_id,
            b.user_fullname AS nama,
            CASE

            WHEN a.peg_jenkel = 1 THEN
            'laki-laki' 
            WHEN a.peg_jenkel = 2 THEN
            'perempuan' 
            WHEN a.peg_jenkel = 0 THEN
            'tanpa keterangan' 
            END AS kelamin,
            IF
            ( a.peg_agama = 1, 'islam', 'tanpa keterangan' ) AS agama,
            ( SELECT count( app_pegawai_ortu.ortu_id ) FROM app_pegawai_ortu WHERE app_pegawai_ortu.ortu_peg_id = a.peg_id ) AS ortu,
            ( SELECT count( app_pegawai_saudara.sdr_id ) FROM app_pegawai_saudara WHERE app_pegawai_saudara.sdr_peg_id = a.peg_id ) AS sdr,
            ( SELECT count( app_pegawai_mertua.mert_id ) FROM app_pegawai_mertua WHERE app_pegawai_mertua.mert_peg_id = a.peg_id ) AS mert,
            ( SELECT count( app_pegawai_pasangan.psg_peg_id ) FROM app_pegawai_pasangan WHERE app_pegawai_pasangan.psg_peg_id = a.peg_id ) AS psg,
            ( SELECT count( app_pegawai_anak.anak_peg_id ) FROM app_pegawai_anak WHERE app_pegawai_anak.anak_peg_id = a.peg_id ) AS anak,
            ( SELECT count( app_pegawai_pendidikan.pdd_id ) FROM app_pegawai_pendidikan WHERE app_pegawai_pendidikan.pdd_peg_id = a.peg_id ) AS pdd,
            ( SELECT count( app_pegawai_org_kampus.kmps_id ) FROM app_pegawai_org_kampus WHERE app_pegawai_org_kampus.kmps_peg_id = a.peg_id ) AS kmps,
            ( SELECT count( app_pegawai_org_slta.slta_id ) FROM app_pegawai_org_slta WHERE app_pegawai_org_slta.slta_peg_id = a.peg_id ) AS slta,
            ( SELECT count( app_pegawai_kursus.kur_id ) FROM app_pegawai_kursus WHERE app_pegawai_kursus.kur_peg_id = a.peg_id ) AS kur,
            ( SELECT count( app_pegawai_ngajar.ngjr_id ) FROM app_pegawai_ngajar WHERE app_pegawai_ngajar.ngjr_peg_id = a.peg_id ) AS ngjr,
            ( SELECT count( app_pegawai_abmas.abmas_id ) FROM app_pegawai_abmas WHERE app_pegawai_abmas.abmas_peg_id = a.peg_id ) AS abmas,
            ( SELECT count( app_pegawai_bimas.bimas_id ) FROM app_pegawai_bimas WHERE app_pegawai_bimas.bimas_peg_id = a.peg_id ) AS bimas,
            ( SELECT count( app_pegawai_buku.buku_id ) FROM app_pegawai_buku WHERE app_pegawai_buku.buku_peg_id = a.peg_id ) AS buku,
            ( SELECT count( app_pegawai_makalah.mkl_id ) FROM app_pegawai_makalah WHERE app_pegawai_makalah.mkl_peg_id = a.peg_id ) AS mkl,
            ( SELECT count( app_pegawai_resensi.res_id ) FROM app_pegawai_resensi WHERE app_pegawai_resensi.res_peg_id = a.peg_id ) AS res,
            ( SELECT count( app_pegawai_jabatan.jbt_id ) FROM app_pegawai_jabatan WHERE app_pegawai_jabatan.jbt_peg_id = a.peg_id ) AS jbt,
            ( SELECT count( app_pegawai_kepangkatan.pkt_id ) FROM app_pegawai_kepangkatan WHERE app_pegawai_kepangkatan.pkt_peg_id = a.peg_id ) AS pkt,
            ( SELECT count( app_pegawai_kgb.kgb_id ) FROM app_pegawai_kgb WHERE app_pegawai_kgb.kgb_peg_id = a.peg_id ) AS kgb,
            ( SELECT count( app_pegawai_kunjungan_ln.ln_id ) FROM app_pegawai_kunjungan_ln WHERE app_pegawai_kunjungan_ln.ln_peg_id = a.peg_id ) AS ln,
            ( SELECT count( app_pegawai_nomor.nmr_id ) FROM app_pegawai_nomor WHERE app_pegawai_nomor.nmr_peg_id = a.peg_id ) AS nmr,
            ( SELECT count( app_pegawai_penelitian.pen_id ) FROM app_pegawai_penelitian WHERE app_pegawai_penelitian.pen_peg_id = a.peg_id ) AS pen,
            ( SELECT count( app_pegawai_seminar.smnr_id ) FROM app_pegawai_seminar WHERE app_pegawai_seminar.smnr_peg_id = a.peg_id ) AS smnr,
            ( SELECT count( app_pegawai_tanda_jasa.tnj_id ) FROM app_pegawai_tanda_jasa WHERE app_pegawai_tanda_jasa.tnj_peg_id = a.peg_id ) AS tnj,
            ( SELECT count( app_pegawai_data_file.file_id ) FROM app_pegawai_data_file WHERE app_pegawai_data_file.file_peg_id = a.peg_id ) AS file 
            FROM
            app_pegawai AS a
            LEFT JOIN app_user AS b ON a.peg_user = b.user_id
            WHERE
            a.peg_kabupaten = $kabkot and b.user_type = 1
            GROUP BY
            a.peg_id
            ");

$data = $query->result();
return $data;
}

function get_pegawai_det($detail)
{
        //////////// BIODATA DIRI
    $query1 = $this->db_database9->query("
        SELECT
        b.user_nip AS nip,
        b.user_fullname AS nama,
        CASE

        WHEN a.peg_jenkel = 1 THEN
        'laki-laki' 
        WHEN a.peg_jenkel = 2 THEN
        'perempuan' 
        WHEN a.peg_jenkel = 0 THEN
        'tanpa keterangan' 
        END AS kelamin,
        a.peg_tempat_lahir,
        a.peg_tgl_lahir,
        IF
        ( a.peg_agama = 1, 'islam', 'tanpa keterangan' ) AS agama,
        c.propinsi_nama AS propinsi,
        d.kab_nama AS kabupaten,
        a.peg_kecamatan AS kecamatan,
        a.peg_kelurahan AS kelurahan,
        a.peg_kodepos AS kodpos,
        a.peg_tinggi AS tinggi,
        a.peg_berat AS berat,
        a.peg_rambut AS rambut,
        a.peg_muka AS muka,
        a.peg_kulit AS kulit,
        a.peg_ciri_khas AS ciri2,
        a.peg_cacat AS cacat,
        a.peg_hobi AS hobi 
        FROM
        app_pegawai AS a
        LEFT JOIN app_user AS b ON a.peg_user = b.user_id
        LEFT JOIN app_propinsi AS c ON a.peg_provinsi = c.propinsi_id
        LEFT JOIN app_kabupaten AS d ON c.propinsi_id = d.kab_propinsi_id 
        AND a.peg_kabupaten = d.kab_id 
        WHERE
        a.peg_id = $detail 
        GROUP BY
        a.peg_id
        ");

        //////////// PENDIDIKAN
    $query2 = $this->db_database9->query("
        SELECT
        b.pdd_tingkat,
        b.pdd_nama,
        b.pdd_fakultas,
        b.pdd_jurusan,
        b.pdd_akte,
        b.pdd_tahun_lulus,
        b.pdd_tempat,
        b.pdd_ttd
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_pendidikan as b on a.peg_id = b.pdd_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.pdd_id
        ");

        //////////// KURSUS
    $query3 = $this->db_database9->query("
        SELECT
        b.kur_nama,
        b.kur_periode,
        b.kur_jam,
        b.kur_hari,
        b.kur_bulan,
        b.kur_tahun,
        b.kur_tempat,
        b.kur_penyelenggara
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_kursus as b on a.peg_id = b.kur_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.kur_id
        ");

        //////////// KEPANGKATAN
    $query4 = $this->db_database9->query("
        SELECT
        b.pkt_jenis_sk,
        b.pkt_pangkat,
        b.pkt_gol,
        b.pkt_no_sk,
        b.pkt_akte,
        b.pkt_tgl_sk,
        b.pkt_tmt_sk,
        b.pkt_gaji_pokok,
        b.pkt_pak
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_kepangkatan as b on a.peg_id = b.pkt_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.pkt_id
        ");

        //////////// JABATAN
    $query5 = $this->db_database9->query("
        SELECT
        b.jbt_jabatan,
        b.jbt_tmt,
        b.jbt_gol,
        b.jbt_tunjangan,
        b.jbt_surat_kep
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_jabatan as b on a.peg_id = b.jbt_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.jbt_id
        ");

        //////////// TANDA JASA
    $query6 = $this->db_database9->query("
        SELECT
        b.tnj_nama,
        b.tnj_tahun,
        b.tnj_pemberi,
        b.tnj_note
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_tanda_jasa as b on a.peg_id = b.tnj_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.tnj_id
        ");

        //////////// KUNJUNGAN
    $query7 = $this->db_database9->query("
        SELECT
        b.ln_negara,
        b.ln_tahun,
        b.ln_lama,
        b.ln_pembiaya
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_kunjungan_ln as b on a.peg_id = b.ln_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.ln_id
        ");

        //////////// MENGAJAR
    $query8 = $this->db_database9->query("
        SELECT
        b.ngjr_matkul,
        b.ngjr_jenjang,
        b.ngjr_jurusan,
        b.ngjr_periode
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_ngajar as b on a.peg_id = b.ngjr_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.ngjr_id
        ");

        //////////// SEMINAR
    $query9 = $this->db_database9->query("
        SELECT
        b.smnr_tahun,
        b.smnr_judul,
        b.smnr_penyelenggara
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_seminar as b on a.peg_id = b.smnr_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.smnr_id
        ");

        //////////// ABMAS
    $query10 = $this->db_database9->query("
        SELECT
        b.abmas_tahun,
        b.abmas_kegiatan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_abmas as b on a.peg_id = b.abmas_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.abmas_id
        ");

        //////////// BIMAS
    $query11 = $this->db_database9->query("
        SELECT
        b.bimas_tahun,
        b.bimas_pembimbingan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_bimas as b on a.peg_id = b.bimas_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.bimas_id
        ");

        //////////// PASANGAN
    $query12 = $this->db_database9->query("
        SELECT
        b.psg_nama,
        b.psg_tmpt_lahir,
        b.psg_tgl_lahir,
        b.psg_tgl_nikah,
        b.psg_pekerjaan,
        b.psg_keterangan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_pasangan as b on a.peg_id = b.psg_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.psg_id
        ");

        //////////// ANAK
    $query13 = $this->db_database9->query("
        SELECT
        b.anak_nama,
        b.anak_jenkel,
        b.anak_tmpt_lahir,
        b.anak_status,
        b.anak_pekerjaan,
        b.anak_keterangan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_anak as b on a.peg_id = b.anak_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.anak_id
        ");

        //////////// ORANG TUA
    $query14 = $this->db_database9->query("
        SELECT
        b.ortu_nama,
        b.ortu_tgl_lahir,
        b.ortu_pekerjaan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_ortu as b on a.peg_id = b.ortu_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.ortu_id
        ");

        //////////// MERTUA
    $query15 = $this->db_database9->query("
        SELECT
        b.mert_nama,
        b.mert_tgl_lahir,
        b.mert_pekerjaan,
        b.mert_keterangan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_mertua as b on a.peg_id = b.mert_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.mert_id
        ");

        //////////// SAUDARA KANDUNG
    $query16 = $this->db_database9->query("
        SELECT
        b.sdr_nama,
        b.sdr_jenkel,
        b.sdr_tgl_lahir,
        b.sdr_pekerjaan,
        b.sdr_keterangan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_saudara as b on a.peg_id = b.sdr_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.sdr_id
        ");

        //////////// SLTA
    $query17 = $this->db_database9->query("
        SELECT
        b.slta_nama,
        b.slta_kedudukan,
        b.slta_periode,
        b.slta_tempat,
        b.slta_nama_pimpinan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_org_slta as b on a.peg_id = b.slta_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.slta_id
        ");

        //////////// KAMPUS
    $query18 = $this->db_database9->query("
        SELECT
        b.kmps_nama,
        b.kmps_kedudukan,
        b.kmps_periode,
        b.kmps_tempat,
        b.kmps_nama_pimpinan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_org_kampus as b on a.peg_id = b.kmps_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.kmps_id
        ");

        //////////// PENELITIAN
    $query19 = $this->db_database9->query("
        SELECT
        b.pen_tahun,
        b.pen_judul,
        b.pen_jabatan,
        b.pen_sumber_dana
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_penelitian as b on a.peg_id = b.pen_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.pen_id
        ");

        //////////// BUKU
    $query20 = $this->db_database9->query("
        SELECT
        b.buku_tahun,
        b.buku_judul,
        b.buku_penyelenggara
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_buku as b on a.peg_id = b.buku_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.buku_id
        ");

        //////////// MAKALAH
    $query21 = $this->db_database9->query("
        SELECT
        b.mkl_tahun,
        b.mkl_judul,
        b.mkl_penyelenggara
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_makalah as b on a.peg_id = b.mkl_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.mkl_id
        ");

        //////////// RESENSI
    $query22 = $this->db_database9->query("
        SELECT
        b.res_tahun,
        b.res_judul,
        b.res_penyelenggara
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_resensi as b on a.peg_id = b.res_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.res_id
        ");

        //////////// KGB
    $query23 = $this->db_database9->query("
        SELECT
        b.kgb_gol,
        b.kgb_no_sk,
        b.kgb_tgl_sk,
        b.kgb_tmt_sk,
        b.kgb_mk_tahun,
        b.kgb_mk_bulan,
        b.kgb_ket
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_kgb as b on a.peg_id = b.kgb_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.kgb_id
        ");

        //////////// NOMOR
    $query24 = $this->db_database9->query("
        SELECT
        b.nmr_karpeg,
        b.nmr_karis,
        b.nmr_kpe,
        b.nmr_taspen,
        b.nmr_askes,
        b.nmr_nuptk,
        b.nmr_nidn,
        b.nmr_ktp,
        b.nmr_npwp
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_nomor as b on a.peg_id = b.nmr_peg_id
        WHERE
        a.peg_id = $detail
        GROUP BY
        b.nmr_id
        ");


    $result1['biodata'] = $query1->result();
    $result2['pendidikan'] = $query2->result();
    $result3['kursus'] = $query3->result();
    $result4['kepangkatan'] = $query4->result();
    $result5['jabatan'] = $query5->result();
    $result6['tanda_jasa'] = $query6->result();
    $result7['kunjungan'] = $query7->result();
    $result8['mengajar'] = $query8->result();
    $result9['seminar'] = $query9->result();
    $result10['abmas'] = $query10->result();
    $result11['bimas'] = $query11->result();
    $result12['pasangan'] = $query12->result();
    $result13['anak'] = $query13->result();
    $result14['orang_tua'] = $query14->result();
    $result15['mertua'] = $query15->result();
    $result16['saudara_kandung'] = $query16->result();
    $result17['slta'] = $query17->result();
    $result18['kampus'] = $query18->result();
    $result19['penelitian'] = $query19->result();
    $result20['buku'] = $query20->result();
    $result21['makalah'] = $query21->result();
    $result22['resensi'] = $query22->result();
    $result23['kgb'] = $query23->result();
    $result24['nomor'] = $query24->result();

    return array_merge($result1, $result2, $result3, $result4, $result5, $result6, $result7, $result8, $result9, $result10, $result11, $result12, $result13, $result14, $result15, $result16, $result17, $result18, $result19, $result20, $result21, $result22, $result23, $result24);
}

//////////// BY ID ORTU
function get_pegawai_ortu($dt_ortu)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_pegawai_ortu as c on b.peg_id = c.ortu_peg_id
        WHERE
        c.ortu_peg_id = $dt_ortu
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.ortu_nama,
        b.ortu_tgl_lahir,
        b.ortu_pekerjaan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_ortu as b on a.peg_id = b.ortu_peg_id
        WHERE
        b.ortu_peg_id = $dt_ortu
        GROUP BY
        b.ortu_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID SAUDARA
function get_pegawai_saudara($dt_saudara)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_pegawai_saudara as c on b.peg_id = c.sdr_peg_id
        WHERE
        c.sdr_peg_id = $dt_saudara
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.sdr_nama,
        b.sdr_jenkel,
        b.sdr_tgl_lahir,
        b.sdr_pekerjaan,
        b.sdr_keterangan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_saudara as b on a.peg_id = b.sdr_peg_id
        WHERE
        b.sdr_peg_id = $dt_saudara
        GROUP BY
        b.sdr_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID MERTUA
function get_pegawai_mertua($dt_mertua)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_pegawai_mertua as c on b.peg_id = c.mert_peg_id
        WHERE
        c.mert_peg_id = $dt_mertua
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.mert_nama,
        b.mert_tgl_lahir,
        b.mert_pekerjaan,
        b.mert_keterangan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_mertua as b on a.peg_id = b.mert_peg_id
        WHERE
        b.mert_peg_id = $dt_mertua
        GROUP BY
        b.mert_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID PASANGAN
function get_pegawai_pasangan($dt_pasangan)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_pegawai_pasangan as c on b.peg_id = c.psg_peg_id
        WHERE
        c.psg_peg_id = 52
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.psg_nama,
        b.psg_tmpt_lahir,
        b.psg_tgl_lahir,
        b.psg_tgl_nikah,
        b.psg_pekerjaan,
        b.psg_keterangan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_pasangan as b on a.peg_id = b.psg_peg_id
        WHERE
        b.psg_peg_id = $dt_pasangan
        GROUP BY
        b.psg_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID ANAK
function get_pegawai_anak($dt_anak)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_pegawai_anak as c on b.peg_id = c.anak_peg_id
        WHERE
        c.anak_peg_id = $dt_anak
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.anak_nama,
        b.anak_jenkel,
        b.anak_tmpt_lahir,
        b.anak_status,
        b.anak_pekerjaan,
        b.anak_keterangan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_anak as b on a.peg_id = b.anak_peg_id
        WHERE
        b.anak_peg_id = $dt_anak
        GROUP BY
        b.anak_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID PENDIDIKAN
function get_pegawai_pendidikan($dt_pendidikan)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_pendidikan AS c ON b.peg_id = c.pdd_peg_id 
        WHERE
        c.pdd_peg_id = $dt_pendidikan
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.pdd_tingkat,
        b.pdd_nama,
        b.pdd_fakultas,
        b.pdd_jurusan,
        b.pdd_akte,
        b.pdd_tahun_lulus,
        b.pdd_tempat,
        b.pdd_ttd
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_pendidikan as b on a.peg_id = b.pdd_peg_id
        WHERE
        b.pdd_peg_id = $dt_pendidikan
        GROUP BY
        b.pdd_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID KAMPUS
function get_pegawai_kampus($dt_kampus)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_org_kampus AS c ON b.peg_id = c.kmps_peg_id 
        WHERE
        c.kmps_peg_id = $dt_kampus 
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.kmps_nama,
        b.kmps_kedudukan,
        b.kmps_periode,
        b.kmps_tempat,
        b.kmps_nama_pimpinan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_org_kampus as b on a.peg_id = b.kmps_peg_id
        WHERE
        b.kmps_peg_id = $dt_kampus
        GROUP BY
        b.kmps_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID SLTA
function get_pegawai_slta($dt_slta)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_org_slta AS c ON b.peg_id = c.slta_peg_id 
        WHERE
        c.slta_peg_id = $dt_slta
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.slta_nama,
        b.slta_kedudukan,
        b.slta_periode,
        b.slta_tempat,
        b.slta_nama_pimpinan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_org_slta as b on a.peg_id = b.slta_peg_id
        WHERE
        b.slta_peg_id = $dt_slta
        GROUP BY
        b.slta_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID KURSUS
function get_pegawai_kursus($dt_kursus)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_kursus AS c ON b.peg_id = c.kur_peg_id 
        WHERE
        c.kur_peg_id = $dt_kursus
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.kur_nama,
        b.kur_periode,
        b.kur_jam,
        b.kur_hari,
        b.kur_bulan,
        b.kur_tahun,
        b.kur_tempat,
        b.kur_penyelenggara
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_kursus as b on a.peg_id = b.kur_peg_id
        WHERE
        b.kur_peg_id = $dt_kursus
        GROUP BY
        b.kur_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID NGAJAR
function get_pegawai_ngajar($dt_ngajar)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_ngajar AS c ON b.peg_id = c.ngjr_peg_id 
        WHERE
        c.ngjr_peg_id = $dt_ngajar 
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.ngjr_matkul,
        b.ngjr_jenjang,
        b.ngjr_jurusan,
        b.ngjr_periode
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_ngajar as b on a.peg_id = b.ngjr_peg_id
        WHERE
        b.ngjr_peg_id = $dt_ngajar
        GROUP BY
        b.ngjr_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID ABMAS
function get_pegawai_abmas($dt_abmas)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_abmas AS c ON b.peg_id = c.abmas_peg_id 
        WHERE
        c.abmas_peg_id = $dt_abmas
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.abmas_tahun,
        b.abmas_kegiatan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_abmas as b on a.peg_id = b.abmas_peg_id
        WHERE
        b.abmas_peg_id = $dt_abmas
        GROUP BY
        b.abmas_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID BIMAS
function get_pegawai_bimas($dt_bimas)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_bimas AS c ON b.peg_id = c.bimas_peg_id 
        WHERE
        c.bimas_peg_id = $dt_bimas
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.bimas_tahun,
        b.bimas_pembimbingan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_bimas as b on a.peg_id = b.bimas_peg_id
        WHERE
        b.bimas_peg_id = $dt_bimas
        GROUP BY
        b.bimas_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID BUKU
function get_pegawai_buku($dt_buku)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_buku AS c ON b.peg_id = c.buku_peg_id 
        WHERE
        c.buku_peg_id = $dt_buku
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.buku_tahun,
        b.buku_judul,
        b.buku_penyelenggara
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_buku as b on a.peg_id = b.buku_peg_id
        WHERE
        b.buku_peg_id = $dt_buku
        GROUP BY
        b.buku_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID MAKALAH
function get_pegawai_makalah($dt_makalah)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_makalah AS c ON b.peg_id = c.mkl_peg_id 
        WHERE
        c.mkl_peg_id = $dt_makalah 
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.mkl_tahun,
        b.mkl_judul,
        b.mkl_penyelenggara
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_makalah as b on a.peg_id = b.mkl_peg_id
        WHERE
        b.mkl_peg_id = $dt_makalah
        GROUP BY
        b.mkl_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID RESENSI
function get_pegawai_resensi($dt_resensi)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_resensi AS c ON b.peg_id = c.res_peg_id 
        WHERE
        c.res_peg_id = $dt_resensi 
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.res_tahun,
        b.res_judul,
        b.res_penyelenggara
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_resensi as b on a.peg_id = b.res_peg_id
        WHERE
        b.res_peg_id = $dt_resensi
        GROUP BY
        b.res_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID JABATAN
function get_pegawai_jabatan($dt_jabatan)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_jabatan AS c ON b.peg_id = c.jbt_peg_id 
        WHERE
        c.jbt_peg_id = $dt_jabatan
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.jbt_jabatan,
        b.jbt_tmt,
        b.jbt_gol,
        b.jbt_tunjangan,
        b.jbt_surat_kep
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_jabatan as b on a.peg_id = b.jbt_peg_id
        WHERE
        b.jbt_peg_id = $dt_jabatan
        GROUP BY
        b.jbt_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID KEPANGKATAN
function get_pegawai_kepangkatan($dt_kepangkatan)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_kepangkatan AS c ON b.peg_id = c.pkt_peg_id
        WHERE
        c.pkt_peg_id = $dt_kepangkatan
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.pkt_jenis_sk,
        b.pkt_pangkat,
        b.pkt_gol,
        b.pkt_no_sk,
        b.pkt_akte,
        b.pkt_tgl_sk,
        b.pkt_tmt_sk,
        b.pkt_gaji_pokok,
        b.pkt_pak
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_kepangkatan as b on a.peg_id = b.pkt_peg_id
        WHERE
        b.pkt_peg_id = $dt_kepangkatan
        GROUP BY
        b.pkt_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID KGB
function get_pegawai_kgb($dt_kgb)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_kgb AS c ON b.peg_id = c.kgb_peg_id
        WHERE
        c.kgb_peg_id = $dt_kgb
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.kgb_gol,
        b.kgb_no_sk,
        b.kgb_tgl_sk,
        b.kgb_tmt_sk,
        b.kgb_mk_tahun,
        b.kgb_mk_bulan,
        b.kgb_ket
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_kgb as b on a.peg_id = b.kgb_peg_id
        WHERE
        b.kgb_peg_id = $dt_kgb
        GROUP BY
        b.kgb_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID KUNJUNGAN
function get_pegawai_kunjungan($dt_kunjungan)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_kunjungan_ln AS c ON b.peg_id = c.ln_peg_id
        WHERE
        c.ln_peg_id = $dt_kunjungan
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.ln_negara,
        b.ln_tahun,
        b.ln_lama,
        b.ln_pembiaya
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_kunjungan_ln as b on a.peg_id = b.ln_peg_id
        WHERE
        b.ln_peg_id = $dt_kunjungan
        GROUP BY
        b.ln_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID NOMOR
function get_pegawai_nomor($dt_nomor)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_nomor AS c ON b.peg_id = c.nmr_peg_id
        WHERE
        c.nmr_peg_id = $dt_nomor 
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.nmr_karpeg,
        b.nmr_karis,
        b.nmr_kpe,
        b.nmr_taspen,
        b.nmr_askes,
        b.nmr_nuptk,
        b.nmr_nidn,
        b.nmr_ktp,
        b.nmr_npwp
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_nomor as b on a.peg_id = b.nmr_peg_id
        WHERE
        b.nmr_peg_id = $dt_nomor
        GROUP BY
        b.nmr_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID PENELITIAN
function get_pegawai_penelitian($dt_penelitian)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_penelitian AS c ON b.peg_id = c.pen_peg_id
        WHERE
        c.pen_peg_id = $dt_penelitian
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.pen_tahun,
        b.pen_judul,
        b.pen_jabatan,
        b.pen_sumber_dana
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_penelitian as b on a.peg_id = b.pen_peg_id
        WHERE
        b.pen_peg_id = $dt_penelitian
        GROUP BY
        b.pen_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID SEMINAR
function get_pegawai_seminar($dt_seminar)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_seminar AS c ON b.peg_id = c.smnr_peg_id
        WHERE
        c.smnr_peg_id = $dt_seminar
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.smnr_tahun,
        b.smnr_judul,
        b.smnr_penyelenggara
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_seminar as b on a.peg_id = b.smnr_peg_id
        WHERE
        b.smnr_peg_id = $dt_seminar
        GROUP BY
        b.smnr_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID TANDAJASA
function get_pegawai_tandajasa($dt_tandajasa)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_tanda_jasa AS c ON b.peg_id = c.tnj_peg_id
        WHERE
        c.tnj_peg_id = $dt_tandajasa
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.tnj_nama,
        b.tnj_tahun,
        b.tnj_pemberi,
        b.tnj_note
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_tanda_jasa as b on a.peg_id = b.tnj_peg_id
        WHERE
        b.tnj_peg_id = $dt_tandajasa
        GROUP BY
        b.tnj_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

//////////// BY ID FILE
function get_pegawai_file($dt_file)
{
    $query1 = $this->db_database9->query("
        SELECT
        a.user_fullname 
        FROM
        app_user AS a
        LEFT JOIN app_pegawai AS b ON a.user_id = b.peg_user
        LEFT JOIN app_pegawai_data_file AS c ON b.peg_id = c.file_peg_id
        WHERE
        c.file_peg_id = $dt_file 
        GROUP BY
        b.peg_id
        ");

    $query2 = $this->db_database9->query("
        SELECT
        b.file_data,
        b.file_keterangan
        FROM
        app_pegawai as a
        LEFT JOIN app_pegawai_data_file as b on a.peg_id = b.file_peg_id
        WHERE
        b.file_peg_id = $dt_file
        GROUP BY
        b.file_id
        ");

    $result1 = $query1->result();
    $result2 = $query2->result();

    return array_merge($result1, $result2);
}

function tampil_golongan()
{
    $query = $this->db_database9->query("
        SELECT
        a.item_id,
        a.item_type,
        a.item_name
        FROM
        app_msater_data as a
        WHERE
        a.item_type = 'golongan'
        ");
    return $query->result();
}

function get_pensiun()
{
    $query = $this->db_database9->query("
        SELECT
        c.peg_provinsi,
        e.propinsi_nama,
        --              count(c.peg_id) as dt,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'I/a - Juru Muda' THEN 1 ELSE 0 END ) AS Ia,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'I/b - Juru Muda Tk.I' THEN 1 ELSE 0 END ) AS Ib,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'I/c - Juru' THEN 1 ELSE 0 END ) AS Ic,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'I/d - Juru Tk.I' THEN 1 ELSE 0 END ) AS Id,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'II/a - Pengatur Muda' THEN 1 ELSE 0 END ) AS IIa,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'II/b - Pengatur Muda Tk.I' THEN 1 ELSE 0 END ) AS IIb,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'II/c - Pengatur' THEN 1 ELSE 0 END ) AS IIc,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'II/d - Pengatur Tk.I' THEN 1 ELSE 0 END ) AS IId,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'III/a - Penata Muda' THEN 1 ELSE 0 END ) AS IIIa,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'III/b - Penata Muda Tk.I' THEN 1 ELSE 0 END ) AS IIIb,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'III/c - Penata' THEN 1 ELSE 0 END ) AS IIIc,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'III/d - Penata Tk.I' THEN 1 ELSE 0 END ) AS IIId,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/a - Pembina' THEN 1 ELSE 0 END ) AS IVa,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/b - Pembina Tk.I' THEN 1 ELSE 0 END ) AS IVb,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/c - Pembina Utama Muda' THEN 1 ELSE 0 END ) AS IVc,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/d - Pembina Utama Madya' THEN 1 ELSE 0 END ) AS IVd,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/e - Pembina Utama' THEN 1 ELSE 0 END ) AS IVe,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = '-' THEN 1 ELSE 0 END ) AS tanpa_golongan 
        FROM
        app_user AS a
        INNER JOIN app_msater_data AS b ON a.user_gol = b.item_id
        LEFT JOIN app_pegawai AS c ON a.user_id = c.peg_user
        INNER JOIN app_kabupaten AS d ON c.peg_kabupaten = d.kab_id
        INNER JOIN app_propinsi AS e ON c.peg_provinsi = e.propinsi_id 
        WHERE
        --         a.peg_kabupaten != 0 and a.peg_user != 1
        a.user_type = 1 
        GROUP BY
        c.peg_provinsi
        ");
    return $query->result();
}

function get_pensiun_prop($prop)
{
    $query = $this->db_database9->query("
        SELECT
        d.kab_id,
        d.kab_nama,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'I/a - Juru Muda' THEN 1 ELSE 0 END ) AS Ia,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'I/b - Juru Muda Tk.I' THEN 1 ELSE 0 END ) AS Ib,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'I/c - Juru' THEN 1 ELSE 0 END ) AS Ic,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'I/d - Juru Tk.I' THEN 1 ELSE 0 END ) AS Id,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'II/a - Pengatur Muda' THEN 1 ELSE 0 END ) AS IIa,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'II/b - Pengatur Muda Tk.I' THEN 1 ELSE 0 END ) AS IIb,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'II/c - Pengatur' THEN 1 ELSE 0 END ) AS IIc,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'II/d - Pengatur Tk.I' THEN 1 ELSE 0 END ) AS IId,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'III/a - Penata Muda' THEN 1 ELSE 0 END ) AS IIIa,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'III/b - Penata Muda Tk.I' THEN 1 ELSE 0 END ) AS IIIb,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'III/c - Penata' THEN 1 ELSE 0 END ) AS IIIc,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'III/d - Penata Tk.I' THEN 1 ELSE 0 END ) AS IIId,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/a - Pembina' THEN 1 ELSE 0 END ) AS IVa,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/b - Pembina Tk.I' THEN 1 ELSE 0 END ) AS IVb,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/c - Pembina Utama Muda' THEN 1 ELSE 0 END ) AS IVc,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/d - Pembina Utama Madya' THEN 1 ELSE 0 END ) AS IVd,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = 'IV/e - Pembina Utama' THEN 1 ELSE 0 END ) AS IVe,
        sum( CASE WHEN b.item_type = 'golongan' AND b.item_name = '-' THEN 1 ELSE 0 END ) AS tanpa_golongan 
        FROM
        --  app_pegawai AS a
        --  LEFT JOIN app_user AS b ON a.peg_user = b.user_id
        --  LEFT JOIN app_msater_data AS c ON b.user_gol = c.item_id
        --  LEFT JOIN app_kabupaten AS d ON a.peg_kabupaten = d.kab_id 
        app_user AS a
        INNER JOIN app_msater_data AS b ON a.user_gol = b.item_id
        LEFT JOIN app_pegawai AS c ON a.user_id = c.peg_user
        INNER JOIN app_kabupaten AS d ON c.peg_kabupaten = d.kab_id
        -- INNER JOIN app_propinsi AS e ON c.peg_provinsi = e.propinsi_id
        WHERE
        c.peg_provinsi = $prop and a.user_type = 1 
        GROUP BY
        c.peg_kabupaten
        ");
    return $query->result();
}

function get_pensiun_kabkot($kab)
{
    $query = $this->db_database9->query("
        SELECT
        a.user_nip,
        a.user_fullname,
        c.item_name,
        case
        when b.peg_jenkel = 1 then 'laki-laki'
        when b.peg_jenkel = 2 then 'perempuan'
        when b.peg_jenkel = 0 then 'no_kelamin'
        end as kelamin,
        b.peg_tgl_lahir,
        b.peg_alamat,
        (year(CURDATE()) - year(b.peg_tgl_lahir)) as usia,
        (58 - (year(CURDATE()) - year(b.peg_tgl_lahir))) as waktu_tersisa
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_msater_data as c on a.user_gol = c.item_id
        WHERE
        b.peg_kabupaten = $kab and a.user_type = 1
        GROUP BY
        b.peg_id
        ORDER BY
        c.item_name
        ");
    return $query->result();
}

function get_pensiun_golIa($kabkot, $golIa)
{
    $query = $this->db_database9->query("
        SELECT
        a.user_nip,
        a.user_fullname,
        c.item_name,
        case
        when b.peg_jenkel = 1 then 'laki-laki'
        when b.peg_jenkel = 2 then 'perempuan'
        when b.peg_jenkel = 0 then 'no_kelamin'
        end as kelamin,
        b.peg_tgl_lahir,
        b.peg_alamat,
        (year(CURDATE()) - year(b.peg_tgl_lahir)) as usia,
        (58 - (year(CURDATE()) - year(b.peg_tgl_lahir))) as waktu_tersisa
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_msater_data as c on a.user_gol = c.item_id
        WHERE
        c.item_id = $golIa and b.peg_kabupaten = $kabkot
        GROUP BY
        b.peg_id
        ");
    return $query->result();
}

function get_pensiun_golIb($kabkot, $golIb)
{
    $query = $this->db_database9->query("
        SELECT
        a.user_nip,
        a.user_fullname,
        c.item_name,
        case
        when b.peg_jenkel = 1 then 'laki-laki'
        when b.peg_jenkel = 2 then 'perempuan'
        when b.peg_jenkel = 0 then 'no_kelamin'
        end as kelamin,
        b.peg_tgl_lahir,
        b.peg_alamat,
        (year(CURDATE()) - year(b.peg_tgl_lahir)) as usia,
        (58 - (year(CURDATE()) - year(b.peg_tgl_lahir))) as waktu_tersisa
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_msater_data as c on a.user_gol = c.item_id
        WHERE
        c.item_id = $golIb and b.peg_kabupaten = $kabkot
        GROUP BY
        b.peg_id
        ");
    return $query->result();
}

function get_pensiun_golIc($kabkot, $golIc)
{
    $query = $this->db_database9->query("
        SELECT
        a.user_nip,
        a.user_fullname,
        c.item_name,
        case
        when b.peg_jenkel = 1 then 'laki-laki'
        when b.peg_jenkel = 2 then 'perempuan'
        when b.peg_jenkel = 0 then 'no_kelamin'
        end as kelamin,
        b.peg_tgl_lahir,
        b.peg_alamat,
        (year(CURDATE()) - year(b.peg_tgl_lahir)) as usia,
        (58 - (year(CURDATE()) - year(b.peg_tgl_lahir))) as waktu_tersisa
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_msater_data as c on a.user_gol = c.item_id
        WHERE
        c.item_id = $golIc and b.peg_kabupaten = $kabkot
        GROUP BY
        b.peg_id
        ");
    return $query->result();
}

function get_pensiun_golId($kabkot, $golId)
{
    $query = $this->db_database9->query("
        SELECT
        a.user_nip,
        a.user_fullname,
        c.item_name,
        case
        when b.peg_jenkel = 1 then 'laki-laki'
        when b.peg_jenkel = 2 then 'perempuan'
        when b.peg_jenkel = 0 then 'no_kelamin'
        end as kelamin,
        b.peg_tgl_lahir,
        b.peg_alamat,
        (year(CURDATE()) - year(b.peg_tgl_lahir)) as usia,
        (58 - (year(CURDATE()) - year(b.peg_tgl_lahir))) as waktu_tersisa
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_msater_data as c on a.user_gol = c.item_id
        WHERE
        c.item_id = $golId and b.peg_kabupaten = $kabkot
        GROUP BY
        b.peg_id
        ");
    return $query->result();
}

function get_pensiun_golIIa($kabkot, $golIIa)
{
    $query = $this->db_database9->query("
        SELECT
        a.user_nip,
        a.user_fullname,
        c.item_name,
        case
        when b.peg_jenkel = 1 then 'laki-laki'
        when b.peg_jenkel = 2 then 'perempuan'
        when b.peg_jenkel = 0 then 'no_kelamin'
        end as kelamin,
        b.peg_tgl_lahir,
        b.peg_alamat,
        (year(CURDATE()) - year(b.peg_tgl_lahir)) as usia,
        (58 - (year(CURDATE()) - year(b.peg_tgl_lahir))) as waktu_tersisa
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_msater_data as c on a.user_gol = c.item_id
        WHERE
        c.item_id = $golIIa and b.peg_kabupaten = $kabkot
        GROUP BY
        b.peg_id
        ");
    return $query->result();
}

function get_pensiun_golIIb($kabkot, $golIIb)
{
    $query = $this->db_database9->query("
        SELECT
        a.user_nip,
        a.user_fullname,
        c.item_name,
        case
        when b.peg_jenkel = 1 then 'laki-laki'
        when b.peg_jenkel = 2 then 'perempuan'
        when b.peg_jenkel = 0 then 'no_kelamin'
        end as kelamin,
        b.peg_tgl_lahir,
        b.peg_alamat,
        (year(CURDATE()) - year(b.peg_tgl_lahir)) as usia,
        (58 - (year(CURDATE()) - year(b.peg_tgl_lahir))) as waktu_tersisa
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_msater_data as c on a.user_gol = c.item_id
        WHERE
        c.item_id = $golIIb and b.peg_kabupaten = $kabkot
        GROUP BY
        b.peg_id
        ");
    return $query->result();
}

function get_pensiun_golIIc($kabkot, $golIIc)
{
    $query = $this->db_database9->query("
        SELECT
        a.user_nip,
        a.user_fullname,
        c.item_name,
        case
        when b.peg_jenkel = 1 then 'laki-laki'
        when b.peg_jenkel = 2 then 'perempuan'
        when b.peg_jenkel = 0 then 'no_kelamin'
        end as kelamin,
        b.peg_tgl_lahir,
        b.peg_alamat,
        (year(CURDATE()) - year(b.peg_tgl_lahir)) as usia,
        (58 - (year(CURDATE()) - year(b.peg_tgl_lahir))) as waktu_tersisa
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_msater_data as c on a.user_gol = c.item_id
        WHERE
        c.item_id = $golIIc and b.peg_kabupaten = $kabkot
        GROUP BY
        b.peg_id
        ");
    return $query->result();
}

function get_pensiun_golIId($kabkot, $golIId)
{
    $query = $this->db_database9->query("
        SELECT
        a.user_nip,
        a.user_fullname,
        c.item_name,
        case
        when b.peg_jenkel = 1 then 'laki-laki'
        when b.peg_jenkel = 2 then 'perempuan'
        when b.peg_jenkel = 0 then 'no_kelamin'
        end as kelamin,
        b.peg_tgl_lahir,
        b.peg_alamat,
        (year(CURDATE()) - year(b.peg_tgl_lahir)) as usia,
        (58 - (year(CURDATE()) - year(b.peg_tgl_lahir))) as waktu_tersisa
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_msater_data as c on a.user_gol = c.item_id
        WHERE
        c.item_id = $golIId and b.peg_kabupaten = $kabkot
        GROUP BY
        b.peg_id
        ");
    return $query->result();
}

function get_pensiun_golIVa($kabkot, $golIVa)
{
    $query = $this->db_database9->query("
        SELECT
        a.user_nip,
        a.user_fullname,
        c.item_name,
        case
        when b.peg_jenkel = 1 then 'laki-laki'
        when b.peg_jenkel = 2 then 'perempuan'
        when b.peg_jenkel = 0 then 'no_kelamin'
        end as kelamin,
        b.peg_tgl_lahir,
        b.peg_alamat,
        (year(CURDATE()) - year(b.peg_tgl_lahir)) as usia,
        (58 - (year(CURDATE()) - year(b.peg_tgl_lahir))) as waktu_tersisa
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_msater_data as c on a.user_gol = c.item_id
        WHERE
        c.item_id = $golIVa and b.peg_kabupaten = $kabkot
        GROUP BY
        b.peg_id
        ");
    return $query->result();
}

function get_pensiun_golIVb($kabkot, $golIVb)
{
    $query = $this->db_database9->query("
        SELECT
        a.user_nip,
        a.user_fullname,
        c.item_name,
        case
        when b.peg_jenkel = 1 then 'laki-laki'
        when b.peg_jenkel = 2 then 'perempuan'
        when b.peg_jenkel = 0 then 'no_kelamin'
        end as kelamin,
        b.peg_tgl_lahir,
        b.peg_alamat,
        (year(CURDATE()) - year(b.peg_tgl_lahir)) as usia,
        (58 - (year(CURDATE()) - year(b.peg_tgl_lahir))) as waktu_tersisa
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_msater_data as c on a.user_gol = c.item_id
        WHERE
        c.item_id = $golIVb and b.peg_kabupaten = $kabkot
        GROUP BY
        b.peg_id
        ");
    return $query->result();
}

function get_pensiun_golIVc($kabkot, $golIVc)
{
    $query = $this->db_database9->query("
        SELECT
        a.user_nip,
        a.user_fullname,
        c.item_name,
        case
        when b.peg_jenkel = 1 then 'laki-laki'
        when b.peg_jenkel = 2 then 'perempuan'
        when b.peg_jenkel = 0 then 'no_kelamin'
        end as kelamin,
        b.peg_tgl_lahir,
        b.peg_alamat,
        (year(CURDATE()) - year(b.peg_tgl_lahir)) as usia,
        (58 - (year(CURDATE()) - year(b.peg_tgl_lahir))) as waktu_tersisa
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_msater_data as c on a.user_gol = c.item_id
        WHERE
        c.item_id = $golIVc and b.peg_kabupaten = $kabkot
        GROUP BY
        b.peg_id
        ");
    return $query->result();
}

function get_pensiun_golIVd($kabkot, $golIVd)
{
    $query = $this->db_database9->query("
        SELECT
        a.user_nip,
        a.user_fullname,
        c.item_name,
        case
        when b.peg_jenkel = 1 then 'laki-laki'
        when b.peg_jenkel = 2 then 'perempuan'
        when b.peg_jenkel = 0 then 'no_kelamin'
        end as kelamin,
        b.peg_tgl_lahir,
        b.peg_alamat,
        (year(CURDATE()) - year(b.peg_tgl_lahir)) as usia,
        (58 - (year(CURDATE()) - year(b.peg_tgl_lahir))) as waktu_tersisa
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_msater_data as c on a.user_gol = c.item_id
        WHERE
        c.item_id = $golIVd and b.peg_kabupaten = $kabkot
        GROUP BY
        b.peg_id
        ");
    return $query->result();
}

function get_pensiun_golIVe($kabkot, $golIVe)
{
    $query = $this->db_database9->query("
        SELECT
        a.user_nip,
        a.user_fullname,
        c.item_name,
        case
        when b.peg_jenkel = 1 then 'laki-laki'
        when b.peg_jenkel = 2 then 'perempuan'
        when b.peg_jenkel = 0 then 'no_kelamin'
        end as kelamin,
        b.peg_tgl_lahir,
        b.peg_alamat,
        (year(CURDATE()) - year(b.peg_tgl_lahir)) as usia,
        (58 - (year(CURDATE()) - year(b.peg_tgl_lahir))) as waktu_tersisa
        FROM
        app_user as a
        LEFT JOIN app_pegawai as b on a.user_id = b.peg_user
        LEFT JOIN app_msater_data as c on a.user_gol = c.item_id
        WHERE
        c.item_id = $golIVe and b.peg_kabupaten = $kabkot
        GROUP BY
        b.peg_id
        ");
    return $query->result();
}

function get_golongan()
{
    $query = $this->db_database9->query("
        SELECT
        a.item_id, a.item_name
        FROM
        app_msater_data as a
        WHERE
        a.item_type = 'golongan'
        GROUP BY
        a.item_id
        ");
    return $query->result();
}

function get_skptahun()
{
    // $this->setGroup;
    $query = $this->db_database9->query("
        SELECT
        a.skp_user_id,
        c.item_name,
        count(a.skp_user_id) as jm_penginput,
        sum(a.skp_ak) as jm_ak,
        sum(a.skp_qty) as jm_qty,
        sum(a.skp_output) as jm_output,
        sum(a.skp_volume) as jm_volume,
        sum(a.skp_satuan) as jm_satuan,
        format(sum(a.skp_biaya), 0) as jm_biaya
        FROM
        app_skp as a
        LEFT JOIN app_user as b on a.skp_user_id = b.user_id
        left join app_msater_data as c on c.item_id = b.user_gol
        GROUP BY
        a.skp_user_id
        ");
    return $query->result();
}

function get_skp_pertahun($thn)
{
    $query = $this->db_database9->query("
        SELECT
        a.skp_user_id,
        c.item_name,
        count(a.skp_user_id) as jm_penginput,
        sum(a.skp_ak) as jm_ak,
        sum(a.skp_qty) as jm_qty,
        sum(a.skp_output) as jm_output,
        sum(a.skp_volume) as jm_volume,
        sum(a.skp_satuan) as jm_satuan,
        format(sum(a.skp_biaya), 0) as jm_biaya,
        a.skp_tahun
        FROM
        app_skp as a
        LEFT JOIN app_user as b on a.skp_user_id = b.user_id
        left join app_msater_data as c on c.item_id = b.user_gol
        WHERE
        a.skp_tahun = $thn
        GROUP BY
        a.skp_user_id
        ");
    return $query->result();
}

function get_tahun()
{
    $query = $this->db_database9->query("
        SELECT
        a.skp_id,
        a.skp_tahun
        FROM
        app_skp as a
        GROUP BY
        a.skp_tahun
        ");
    return $query->result();
}

function get_tahunbulan()
{
    $query = $this->db_database9->query("
        SELECT
        year(a.keg_date) as tahun
        FROM
        app_kegiatan as a
        WHERE
        year(a.keg_date) != 0000
        GROUP BY
        year(a.keg_date)
        ");
    return $query->result();
}

function get_skpbulan()
{
    $query = $this->db_database9->query("
        SELECT
        c.item_id,
        c.item_name as jenis_kegiatan,
        sum(case when month(b.keg_date) = 01 then 1 else 0 end) as dt_januari,
        sum(case when month(b.keg_date) = 02 then 1 else 0 end) as dt_februari,
        sum(case when month(b.keg_date) = 03 then 1 else 0 end) as dt_maret,
        sum(case when month(b.keg_date) = 04 then 1 else 0 end) as dt_april,
        sum(case when month(b.keg_date) = 05 then 1 else 0 end) as dt_mei,
        sum(case when month(b.keg_date) = 06 then 1 else 0 end) as dt_juni,
        sum(case when month(b.keg_date) = 07 then 1 else 0 end) as dt_juli,
        sum(case when month(b.keg_date) = 08 then 1 else 0 end) as dt_agustus,
        sum(case when month(b.keg_date) = 09 then 1 else 0 end) as dt_september,
        sum(case when month(b.keg_date) = 10 then 1 else 0 end) as dt_oktober,
        sum(case when month(b.keg_date) = 11 then 1 else 0 end) as dt_november,
        sum(case when month(b.keg_date) = 12 then 1 else 0 end) as dt_desember
        FROM
        app_user as a
        LEFT JOIN app_kegiatan as b on a.user_id = b.user_add
        LEFT JOIN app_msater_data as c on b.keg_jenis = c.item_id
        WHERE
        c.item_type = 'jenis_kegiatan' and b.keg_jenis != 0
        GROUP BY
        c.item_id
        ");
    return $query->result();
}

function get_perbulan($thn)
{
    $query = $this->db_database9->query("
        SELECT
        c.item_id,
        c.item_name as jenis_kegiatan,
        sum(case when month(b.keg_date) = 01 then 1 else 0 end) as dt_januari,
        sum(case when month(b.keg_date) = 02 then 1 else 0 end) as dt_februari,
        sum(case when month(b.keg_date) = 03 then 1 else 0 end) as dt_maret,
        sum(case when month(b.keg_date) = 04 then 1 else 0 end) as dt_april,
        sum(case when month(b.keg_date) = 05 then 1 else 0 end) as dt_mei,
        sum(case when month(b.keg_date) = 06 then 1 else 0 end) as dt_juni,
        sum(case when month(b.keg_date) = 07 then 1 else 0 end) as dt_juli,
        sum(case when month(b.keg_date) = 08 then 1 else 0 end) as dt_agustus,
        sum(case when month(b.keg_date) = 09 then 1 else 0 end) as dt_september,
        sum(case when month(b.keg_date) = 10 then 1 else 0 end) as dt_oktober,
        sum(case when month(b.keg_date) = 11 then 1 else 0 end) as dt_november,
        sum(case when month(b.keg_date) = 12 then 1 else 0 end) as dt_desember
        FROM
        app_user as a
        LEFT JOIN app_kegiatan as b on a.user_id = b.user_add
        LEFT JOIN app_msater_data as c on b.keg_jenis = c.item_id
        WHERE
        year(b.keg_date) = $thn and c.item_type = 'jenis_kegiatan' and b.keg_jenis != 0
        GROUP BY
        c.item_id
        ");
    return $query->result();
}

}