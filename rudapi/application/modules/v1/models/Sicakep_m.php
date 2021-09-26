<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sicakep_m extends CI_Model
{
    
    public function get_pegawai()
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

    public function get_pegawai_kabupaten($provinsi)
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
            b.user_type = 1 and a.peg_provinsi = $provinsi
            GROUP BY
            d.kab_id
            ");
        return $query->result();
    }

    public function get_pegawai_kecamatan($kabupaten)
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
            a.peg_kabupaten = $kabupaten and b.user_type = 1
            GROUP BY
            a.peg_id
            ");

        $data = $query->result();
        return $data;
    }

    public function get_pensiun()
    {
    $query = $this->db_database9->query("
        SELECT
        c.peg_provinsi,
        e.propinsi_nama,
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
        a.user_type = 1 
        GROUP BY
        c.peg_provinsi
        ");
    return $query->result();
    }

    public function get_pensiun_kabupaten($provinsi)
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
            app_user AS a
            INNER JOIN app_msater_data AS b ON a.user_gol = b.item_id
            LEFT JOIN app_pegawai AS c ON a.user_id = c.peg_user
            INNER JOIN app_kabupaten AS d ON c.peg_kabupaten = d.kab_id
            WHERE
            c.peg_provinsi = $provinsi and a.user_type = 1 
            GROUP BY
            c.peg_kabupaten
        ");
        return $query->result();
    }

    public function get_pensiun_kecamatan($kabupaten)
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
            b.peg_kabupaten = $kabupaten and a.user_type = 1
            GROUP BY
            b.peg_id
            ORDER BY
            c.item_name
        ");
        return $query->result();
    }
}