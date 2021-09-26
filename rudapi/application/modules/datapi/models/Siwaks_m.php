<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siwaks_m extends CI_Model
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

    function get_total_wakaf()
    {
        $query = $this->db_database7->query("
            SELECT
            format( count( CASE WHEN b.ID_Dir THEN 1 ELSE 0 END ), 0 ) AS siwak
            FROM
            propinsi AS a
            INNER JOIN t_wakaf AS b ON a.lokasi_propinsi = b.Lokasi_Prop 
            ");
        return $query->row();
    }

    function get_total_filterwakaf()
    {
        $query = $this->db_database7->query("
            SELECT
            sum(case when b.ID_Dir then 1 else 0 end) as tanah_wakaf,
                        sum(b.Luas) as luas_tanah,
            sum(b.Luas and b.`Status` = 'Sudah Sertifikat') as bersertifikat,
            sum(case when b.ID_Dir and b.`Status` = 'Belum Sertifikat' then 1 else 0 end) as nonsertifikat
            FROM
            propinsi as a,
            t_wakaf as b
            WHERE
            a.lokasi_propinsi = b.Lokasi_Prop
            ");
        return $query->row();
    }

    function get_total_filterpengguna()
    {
        $query = $this->db_database7->query("
            SELECT
            sum(case when b.ID_Dir and b.Penggunaan = 'Masjid' then 1 else 0 end) as pengguna_masjid,
            sum(case when b.ID_Dir and b.Penggunaan = 'Musholla' then 1 else 0 end) as pengguna_musholla,
            sum(case when b.ID_Dir and b.Penggunaan = 'Sekolah' then 1 else 0 end) as pengguna_sekolah,
            sum(case when b.ID_Dir and b.Penggunaan = 'Sosial Lainnya' then 1 else 0 end) as pengguna_sosial
            FROM
            propinsi as a,
            t_wakaf as b
            WHERE
            a.lokasi_propinsi = b.Lokasi_Prop
            ");
        return $query->row();
    }

    function get_total_totalpengguna()
    {
        $query = $this->db_database7->query("
            SELECT
            sum(case when b.ID_Dir and b.Penggunaan = 'Masjid' then 1 else 0 end) +
            sum(case when b.ID_Dir and b.Penggunaan = 'Musholla' then 1 else 0 end) +
            sum(case when b.ID_Dir and b.Penggunaan = 'Sekolah' then 1 else 0 end) +
            sum(case when b.ID_Dir and b.Penggunaan = 'Sosial Lainnya' then 1 else 0 end) as total
            FROM
            propinsi as a,
            t_wakaf as b
            WHERE
            a.lokasi_propinsi = b.Lokasi_Prop
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

    function get_siwak()
    {
        $query = $this->db_database7->query("
            SELECT
            b.Lokasi_Prop,a.lokasi_nama,
            format( count( CASE WHEN b.ID_Dir THEN 1 ELSE 0 END ), 0 ) AS jum,
            -- format(sum(round(case when b.Luas then b.Luas else 0 end, 0)), 0) AS luas,
            sum(b.Luas) as luas,
            sum(case when b.Penggunaan = 'Masjid' then 1 else 0 end) AS peng_masjid,
            sum(case when b.Penggunaan = 'Mushalla' then 1 else 0 end) AS peng_mushalla,
            sum(case when b.Penggunaan = 'Makam' then 1 else 0 end) AS peng_makam,
            sum(case when b.Penggunaan = 'Sekolah' then 1 else 0 end) AS peng_sekolah,
            sum(case when b.Penggunaan = 'Pesantren' then 1 else 0 end) AS peng_pesantren,
            sum(case when b.Penggunaan = 'Sosial Lainnya' then 1 else 0 end) AS peng_sosial_dll,
            format( sum( CASE WHEN b.STATUS = 'Sudah Sertifikat' THEN 1 ELSE 0 END ), 0 ) AS sdh_sertifikat,
            sum(b.Luas) as luas_sertifikat,
            -- format(sum(round(case when b.Luas and b.Status = 'Sudah Sertifikat' then b.Luas else 0 end, 0)), 0) AS luas_sertifikat,
            format( sum( CASE WHEN b.STATUS = 'Belum Sertifikat' THEN 1 ELSE 0 END ), 0 ) AS blm_sertifikat,
            sum(b.Luas) as luas_nonsertifikat,
            -- format(sum(round(case when b.Luas and b.Status = 'Belum Sertifikat' then b.Luas else 0 end, 0)), 0) AS luas_nonsertifikat 
            FROM
            propinsi AS a
            INNER JOIN t_wakaf AS b ON a.lokasi_propinsi = b.Lokasi_Prop 
            GROUP BY
            a.lokasi_propinsi 
            ORDER BY
            a.lokasi_propinsi
            ");
        return $query->result();
    }

    function get_siwak_prop($propinsi)
    {
        $query = $this->db_database7->query("
            SELECT
            substr(b.lokasi_kode,1,5) as lokasi_kode,
            b.lokasi_nama,
            count( CASE WHEN c.Lokasi_Kab THEN 1 ELSE 0 END ) AS jum,
            -- format(sum(round(case when c.Luas then c.Luas else 0 end, 0)), 0) AS luas,
            sum(b.Luas) as luas,
            sum(case when c.Penggunaan = 'Masjid' then 1 else 0 end) AS peng_masjid,
            sum(case when c.Penggunaan = 'Mushalla' then 1 else 0 end) AS peng_mushalla,
            sum(case when c.Penggunaan = 'Makam' then 1 else 0 end) AS peng_makam,
            sum(case when c.Penggunaan = 'Sekolah' then 1 else 0 end) AS peng_sekolah,
            sum(case when c.Penggunaan = 'Pesantren' then 1 else 0 end) AS peng_pesantren,
            sum(case when c.Penggunaan = 'Sosial Lainnya' then 1 else 0 end) AS peng_sosial_dll,
            sum(CASE WHEN c.STATUS = 'Sudah Sertifikat' THEN 1 ELSE 0 END ) AS sdh_sertifikat,
            sum(c.Luas) as luas_sertifikat,
            -- format(sum(round(case when c.Luas and c.Status = 'Sudah Sertifikat' then c.Luas else 0 end, 0)), 0) AS luas_sertifikat,
            sum(CASE WHEN c.STATUS = 'Belum Sertifikat' THEN 1 ELSE 0 END ) AS blm_sertifikat,
            sum(c.Luas) as luas_nonsertifikat,
            -- format(sum(round(case when c.Luas and c.Status = 'Belum Sertifikat' then c.Luas else 0 end, 0)), 0) AS luas_nonsertifikat
            FROM
            kabupaten AS b
            INNER JOIN t_wakaf AS c ON b.lokasi_kabupatenkota = c.Lokasi_Kab 
            AND b.lokasi_propinsi = c.Lokasi_Prop 
            WHERE
            c.Lokasi_Prop = $propinsi
            GROUP BY
            b.lokasi_ID
            ");
        return $query->result();
    }

    function get_siwak_kab($kabupaten)
    {
        $query = $this->db_database7->query("
            SELECT
            a.lokasi_kode,
            a.lokasi_nama,
            count(distinct case when b.ID_Dir then b.ID_Dir else b.ID_Dir end) AS jum,
            -- format(sum(round(case when b.Luas then b.Luas else 0 end, 0)), 0) AS luas,
            sum(b.Luas) as luas,
            sum(case when b.Penggunaan = 'Masjid' then 1 else 0 end) AS peng_masjid,
            sum(case when b.Penggunaan = 'Mushalla' then 1 else 0 end) AS peng_mushalla,
            sum(case when b.Penggunaan = 'Makam' then 1 else 0 end) AS peng_makam,
            sum(case when b.Penggunaan = 'Sekolah' then 1 else 0 end) AS peng_sekolah,
            sum(case when b.Penggunaan = 'Pesantren' then 1 else 0 end) AS peng_pesantren,
            sum(case when b.Penggunaan = 'Sosial Lainnya' then 1 else 0 end) AS peng_sosial_dll,
            sum(case when b.ID_Dir and b.Status = 'Sudah Sertifikat' then 1 else 0 end) AS jum_sertifikat,
            format(sum(round(case when b.Luas and b.Status = 'Sudah Sertifikat' then b.Luas else 0 end, 0)), 0) AS luas_sertifikat,
            sum(case when b.ID_Dir and b.Status = 'Belum Sertifikat' then 1 else 0 end) AS jum_nonsertifikat,
            format(sum(round(case when b.Luas and b.Status = 'Belum Sertifikat' then b.Luas else 0 end, 0)), 0) AS luas_nonsertifikat
            FROM
            kecamatan as a
            INNER JOIN t_wakaf as b ON a.lokasi_kecamatan = b.Lokasi_Kec
            WHERE
            a.lokasi_kode = $kabupaten and b.Lokasi_Prop = substr(a.lokasi_kode,1,2) and b.Lokasi_Kab = substr(a.lokasi_kode,4,2)
            GROUP BY
            a.lokasi_ID
            ");
        return $query->result();
    }

    function get_siwak_kec($kecamatan)
    {
        $query = $this->db_database7->query("
            SELECT
            b.ID_Dir,b.Wakif,b.Nadzir,b.Penggunaan,b.Ket,b.Lokasi_Kel,b.Lokasi_Desa,b.Luas,b.S_No,b.S_Tgl,b.AIW_No,b.AIW_Tgl,
            b.Lat,b.Longi,b.`Status`
            FROM
            kecamatan AS a
            INNER JOIN t_wakaf AS b ON a.lokasi_kecamatan = b.Lokasi_Kec
            WHERE
            a.lokasi_kode = '$kecamatan' AND b.Lokasi_Prop = substr(a.lokasi_kode,1,2) AND b.Lokasi_Kab = substr(a.lokasi_kode,4,2) AND b.Lokasi_Kec = substr(a.lokasi_kode,7,2)
            GROUP BY
            b.ID_Dir
            ORDER BY
            b.ID_Dir ASC
            ");
        return $query->result();
    }

    function get_siwak_detail($detail)
    {
        $query = $this->db_database7->query("
            SELECT
            a.Penggunaan,b.lokasi_nama as provinsi,c.lokasi_nama as kabupaten,d.lokasi_nama as kecamatan,a.Lokasi_Kel as kelurahan,a.Lokasi_Desa as alamat,a.Luas,a.luas_bangunan,a.Wakif,a.Nadzir,a.Status,a.S_No,a.S_Tgl,a.AIW_No,a.AIW_Tgl
            FROM
            t_wakaf as a
            INNER JOIN propinsi as b ON a.Lokasi_Prop = b.lokasi_propinsi
            INNER JOIN kabupaten as c ON c.lokasi_propinsi = b.lokasi_propinsi and a.Lokasi_Kab = c.lokasi_kabupatenkota
            INNER JOIN kecamatan as d ON c.lokasi_kabupatenkota = d.lokasi_kabupatenkota and b.lokasi_propinsi = d.lokasi_propinsi and a.Lokasi_Kec = d.lokasi_kecamatan
            WHERE
            a.ID_Dir = $detail
            GROUP BY
            a.ID_Dir
            ");
        return $query->result();
    }

    function get_twakaf()
    {
        $query = $this->db_database7->query("
            SELECT
            b.Lokasi_Prop,
            a.lokasi_nama,
            format(sum(case when b.ID_Dir then 1 else 0 end), 0) as dt_wakaf,
            sum(b.Luas) as dt_luas,
            sum(b.Luas and b.`Status` = 'Sudah Sertifikat') as dt_sertifikat,
            -- format(sum(case when b.ID_Dir and b.`Status` = 'Sudah Sertifikat' then 1 else 0 end), 0) as dt_sertifikat,
            sum(case when b.Luas and b.`Status` = 'Sudah Sertifikat' then b.Luas else 0 end) as dt_luas_sertifikat,
            -- format(sum(case when b.Luas and b.`Status` = 'Sudah Sertifikat' then b.Luas else 0 end), 0) as dt_luas_sertifikat,
            format(sum(case when b.ID_Dir and b.`Status` = 'Belum Sertifikat' then 1 else 0 end), 0) as dt_nonsertifikat,
            sum(case when b.Luas and b.`Status` = 'Belum Sertifikat' then b.Luas else 0 end) as dt_luas_nonsertifikat,
            -- format(sum(case when b.Luas and b.`Status` = 'Belum Sertifikat' then b.Luas else 0 end), 0) as dt_luas_nonsertifikat,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Masjid' then 1 else 0 end), 0) as pengguna_masjid,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Musholla' then 1 else 0 end), 0) as pengguna_musholla,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Sekolah' then 1 else 0 end), 0) as pengguna_sekolah,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Pesantren' then 1 else 0 end), 0) as pengguna_pesantren,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Makam' then 1 else 0 end), 0) as pengguna_makam,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Sosial Lainnya' then 1 else 0 end), 0) as pengguna_sosial,
            format(sum(case when b.ID_Dir and b.pendidikan = '' then 1 else 0 end), 0) as dt_pddk_kosong,
            format(sum(case when b.ID_Dir and b.pendidikan = 'SD Sederajat' then 1 else 0 end), 0) as dt_pddk_sd,
            format(sum(case when b.ID_Dir and b.pendidikan = 'SMP Sederajat' then 1 else 0 end), 0) as dt_pddk_smp,
            format(sum(case when b.ID_Dir and b.pendidikan = 'SLTA Sederajat' then 1 else 0 end), 0) as dt_pddk_slta,
            format(sum(case when b.ID_Dir and b.pendidikan = 'D1 Sederajat' then 1 else 0 end), 0) as dt_pddk_d1,
            format(sum(case when b.ID_Dir and b.pendidikan = 'D2 Sederajat' then 1 else 0 end), 0) as dt_pddk_d2,
            format(sum(case when b.ID_Dir and b.pendidikan = 'D3 Sederajat' then 1 else 0 end), 0) as dt_pddk_d3,
            format(sum(case when b.ID_Dir and b.pendidikan = 'D4 Sederajat' then 1 else 0 end), 0) as dt_pddk_d4,
            format(sum(case when b.ID_Dir and b.pendidikan = 'S1 Sederajat' then 1 else 0 end), 0) as dt_pddk_s1,
            format(sum(case when b.ID_Dir and b.pendidikan = 'S2 Sederajat' then 1 else 0 end), 0) as dt_pddk_s2,
            format(sum(case when b.ID_Dir and b.pendidikan = 'S3 Sederajat' then 1 else 0 end), 0) as dt_pddk_s3
            FROM
            propinsi as a,
            t_wakaf as b
            WHERE
            a.lokasi_propinsi = b.Lokasi_Prop
            GROUP BY
            a.lokasi_propinsi
            ");
        return $query->result();
    }

    function get_twakaf_prop($prop)
    {
        $query = $this->db_database7->query("
            SELECT
            substr(a.lokasi_kode,1,5) as lokasi_kode,
            a.lokasi_nama,
            format(sum(case when b.ID_Dir then 1 else 0 end), 0) as dt_wakaf,
            -- format(sum(case when b.Luas then b.Luas else 0 end), 0) as dt_luas,
            sum(case when b.Luas then b.Luas else 0 end) as dt_luas,
            format(sum(case when b.ID_Dir and b.`Status` = 'Sudah Sertifikat' then 1 else 0 end), 0) as dt_sertifikat,
            sum(case when b.Luas and b.`Status` = 'Sudah Sertifikat' then b.Luas else 0 end) as dt_luas_sertifikat,
            -- format(sum(case when b.Luas and b.`Status` = 'Sudah Sertifikat' then b.Luas else 0 end), 0) as dt_luas_sertifikat,
            format(sum(case when b.ID_Dir and b.`Status` = 'Belum Sertifikat' then 1 else 0 end), 0) as dt_nonsertifikat,
            sum(case when b.Luas and b.`Status` = 'Belum Sertifikat' then b.Luas else 0 end) as dt_luas_nonsertifikat,
            -- format(sum(case when b.Luas and b.`Status` = 'Belum Sertifikat' then b.Luas else 0 end), 0) as dt_luas_nonsertifikat,
            -- format(sum(case when b.Luas and b.`Status` = 'Belum Sertifikat' then b.Luas else 0 end), 0) as dt_luas_nonsertifikat,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Masjid' then 1 else 0 end), 0) as pengguna_masjid,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Musholla' then 1 else 0 end), 0) as pengguna_musholla,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Sekolah' then 1 else 0 end), 0) as pengguna_sekolah,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Pesantren' then 1 else 0 end), 0) as pengguna_pesantren,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Makam' then 1 else 0 end), 0) as pengguna_makam,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Sosial Lainnya' then 1 else 0 end), 0) as pengguna_sosial,
            format(sum(case when b.ID_Dir and b.pendidikan = '' then 1 else 0 end), 0) as dt_pddk_kosong,
            format(sum(case when b.ID_Dir and b.pendidikan = 'SD Sederajat' then 1 else 0 end), 0) as dt_pddk_sd,
            format(sum(case when b.ID_Dir and b.pendidikan = 'SMP Sederajat' then 1 else 0 end), 0) as dt_pddk_smp,
            format(sum(case when b.ID_Dir and b.pendidikan = 'SLTA Sederajat' then 1 else 0 end), 0) as dt_pddk_slta,
            format(sum(case when b.ID_Dir and b.pendidikan = 'D1 Sederajat' then 1 else 0 end), 0) as dt_pddk_d1,
            format(sum(case when b.ID_Dir and b.pendidikan = 'D2 Sederajat' then 1 else 0 end), 0) as dt_pddk_d2,
            format(sum(case when b.ID_Dir and b.pendidikan = 'D3 Sederajat' then 1 else 0 end), 0) as dt_pddk_d3,
            format(sum(case when b.ID_Dir and b.pendidikan = 'D4 Sederajat' then 1 else 0 end), 0) as dt_pddk_d4,
            format(sum(case when b.ID_Dir and b.pendidikan = 'S1 Sederajat' then 1 else 0 end), 0) as dt_pddk_s1,
            format(sum(case when b.ID_Dir and b.pendidikan = 'S2 Sederajat' then 1 else 0 end), 0) as dt_pddk_s2,
            format(sum(case when b.ID_Dir and b.pendidikan = 'S3 Sederajat' then 1 else 0 end), 0) as dt_pddk_s3
            FROM
            kabupaten as a,
            t_wakaf as b
            WHERE
            a.lokasi_kabupatenkota = b.Lokasi_Kab and a.lokasi_propinsi = b.Lokasi_Prop and b.Lokasi_Prop = $prop
            GROUP BY
            a.lokasi_kabupatenkota
            ");
        return $query->result();
    }

    function get_twakaf_kab($kab)
    {
        $query = $this->db_database7->query("
            SELECT
            a.lokasi_kode,
            a.lokasi_ID,
            a.lokasi_nama,
            format(sum(case when b.ID_Dir then 1 else 0 end), 0) as dt_wakaf,
            -- format(sum(case when b.Luas then b.Luas else 0 end), 0) as dt_luas,
            sum(case when b.Luas then b.Luas else 0 end) as dt_luas,
            format(sum(case when b.ID_Dir and b.`Status` = 'Sudah Sertifikat' then 1 else 0 end), 0) as dt_sertifikat,
            sum(case when b.Luas and b.`Status` = 'Sudah Sertifikat' then b.Luas else 0 end) as dt_luas_sertifikat,
            -- format(sum(case when b.Luas and b.`Status` = 'Sudah Sertifikat' then b.Luas else 0 end), 0) as dt_luas_sertifikat,
            format(sum(case when b.ID_Dir and b.`Status` = 'Belum Sertifikat' then 1 else 0 end), 0) as dt_nonsertifikat,
            sum(case when b.Luas and b.`Status` = 'Belum Sertifikat' then b.Luas else 0 end) as dt_luas_nonsertifikat,
            -- format(sum(case when b.Luas and b.`Status` = 'Belum Sertifikat' then b.Luas else 0 end), 0) as dt_luas_nonsertifikat,
            -- format(sum(case when b.Luas and b.`Status` = 'Belum Sertifikat' then b.Luas else 0 end), 0) as dt_luas_nonsertifikat,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Masjid' then 1 else 0 end), 0) as pengguna_masjid,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Musholla' then 1 else 0 end), 0) as pengguna_musholla,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Sekolah' then 1 else 0 end), 0) as pengguna_sekolah,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Pesantren' then 1 else 0 end), 0) as pengguna_pesantren,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Makam' then 1 else 0 end), 0) as pengguna_makam,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Sosial Lainnya' then 1 else 0 end), 0) as pengguna_sosial,
            format(sum(case when b.ID_Dir and b.pendidikan = '' then 1 else 0 end), 0) as dt_pddk_kosong,
            format(sum(case when b.ID_Dir and b.pendidikan = 'SD Sederajat' then 1 else 0 end), 0) as dt_pddk_sd,
            format(sum(case when b.ID_Dir and b.pendidikan = 'SMP Sederajat' then 1 else 0 end), 0) as dt_pddk_smp,
            format(sum(case when b.ID_Dir and b.pendidikan = 'SLTA Sederajat' then 1 else 0 end), 0) as dt_pddk_slta,
            format(sum(case when b.ID_Dir and b.pendidikan = 'D1 Sederajat' then 1 else 0 end), 0) as dt_pddk_d1,
            format(sum(case when b.ID_Dir and b.pendidikan = 'D2 Sederajat' then 1 else 0 end), 0) as dt_pddk_d2,
            format(sum(case when b.ID_Dir and b.pendidikan = 'D3 Sederajat' then 1 else 0 end), 0) as dt_pddk_d3,
            format(sum(case when b.ID_Dir and b.pendidikan = 'D4 Sederajat' then 1 else 0 end), 0) as dt_pddk_d4,
            format(sum(case when b.ID_Dir and b.pendidikan = 'S1 Sederajat' then 1 else 0 end), 0) as dt_pddk_s1,
            format(sum(case when b.ID_Dir and b.pendidikan = 'S2 Sederajat' then 1 else 0 end), 0) as dt_pddk_s2,
            format(sum(case when b.ID_Dir and b.pendidikan = 'S3 Sederajat' then 1 else 0 end), 0) as dt_pddk_s3
            FROM
            kecamatan as a,
            t_wakaf as b
            WHERE
            a.lokasi_kode = $kab and b.Lokasi_Prop = substr(a.lokasi_kode,1,2) and b.Lokasi_Kab = substr(a.lokasi_kode,4,2) and b.Lokasi_Kec = substr(a.lokasi_kode,7,2)
            GROUP BY
            a.lokasi_kecamatan
            ");
        return $query->result();
    }

    function get_twakaf_kec($kec)
    {
        $query = $this->db_database7->query("
            SELECT
            b.ID_Dir,
            b.Lokasi_Kel,
            b.Luas,
            b.Penggunaan,
            b.Wakif,
            b.Nadzir,
            b.S_No,
            b.S_Tgl,
            b.AIW_No,
            b.AIW_Tgl
            FROM
            inf_lokasi as a,
            t_wakaf as b
            WHERE
            a.lokasi_ID = $kec
            and b.Lokasi_Prop = substr(a.lokasi_kode,1,2) and b.Lokasi_Kab = substr(a.lokasi_kode,4,2) and b.Lokasi_Kec = substr(a.lokasi_kode,7,2)
            GROUP BY
            b.ID_Dir
            ");
        return $query->result();
    }

    function get_twakaf_statussert($stat,$kec)
    {
        $query = $this->db_database7->query("
            SELECT
            b.ID_Dir,
            b.Lokasi_Kel,
            b.Luas,
            b.Penggunaan,
            b.Wakif,
            b.Nadzir,
            b.S_No,
            b.S_Tgl,
            b.AIW_No,
            b.AIW_Tgl,
            b.`Status`
            FROM
            inf_lokasi as a,
            t_wakaf as b
            WHERE
            a.lokasi_ID = $kec and b.Status = '$stat'
            and b.Lokasi_Prop = substr(a.lokasi_kode,1,2) and b.Lokasi_Kab = substr(a.lokasi_kode,4,2) and b.Lokasi_Kec = substr(a.lokasi_kode,7,2)
            GROUP BY
            b.ID_Dir
            ");
        return $query->result();
    }

    function get_twakaf_statusnonsert($statnon,$kec)
    {
        $query = $this->db_database7->query("
            SELECT
            b.ID_Dir,
            b.Lokasi_Kel,
            b.Luas,
            b.Penggunaan,
            b.Wakif,
            b.Nadzir,
            b.S_No,
            b.S_Tgl,
            b.AIW_No,
            b.AIW_Tgl,
            b.`Status`
            FROM
            inf_lokasi as a,
            t_wakaf as b
            WHERE
            a.lokasi_ID = $statnon and b.`Status` = '$statnon'
            and b.Lokasi_Prop = substr(a.lokasi_kode,1,2) and b.Lokasi_Kab = substr(a.lokasi_kode,4,2) and b.Lokasi_Kec = substr(a.lokasi_kode,7,2)
            GROUP BY
            b.ID_Dir
            ");
        return $query->result();
    }

    function get_kategoritanah()
    {
        $query = $this->db_database7->query("
            SELECT
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Masjid' then 1 else 0 end), 0) as pengguna_masjid,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Musholla' then 1 else 0 end), 0) as pengguna_musholla,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Sekolah' then 1 else 0 end), 0) as pengguna_sekolah,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Pesantren' then 1 else 0 end), 0) as pengguna_pesantren,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Makam' then 1 else 0 end), 0) as pengguna_makam,
            format(sum(case when b.ID_Dir and b.Penggunaan = 'Sosial Lainnya' then 1 else 0 end), 0) as pengguna_sosial
            FROM
            propinsi as a,
            t_wakaf as b
            WHERE
            a.lokasi_propinsi = b.Lokasi_Prop
            ");
        return $query->result();
    }

    function get_kategoripendidikan()
    {
        $query = $this->db_database7->query("
            SELECT
            format(sum(case when b.ID_Dir and b.pendidikan = 'SD Sederajat' then 1 else 0 end), 0) as dt_pddk_sd,
            format(sum(case when b.ID_Dir and b.pendidikan = 'SMP Sederajat' then 1 else 0 end), 0) as dt_pddk_smp,
            format(sum(case when b.ID_Dir and b.pendidikan = 'SLTA Sederajat' then 1 else 0 end), 0) as dt_pddk_slta,
            format(sum(case when b.ID_Dir and b.pendidikan = 'D1 Sederajat' then 1 else 0 end), 0) as dt_pddk_d1,
            format(sum(case when b.ID_Dir and b.pendidikan = 'D2 Sederajat' then 1 else 0 end), 0) as dt_pddk_d2,
            format(sum(case when b.ID_Dir and b.pendidikan = 'D3 Sederajat' then 1 else 0 end), 0) as dt_pddk_d3,
            format(sum(case when b.ID_Dir and b.pendidikan = 'D4 Sederajat' then 1 else 0 end), 0) as dt_pddk_d4,
            format(sum(case when b.ID_Dir and b.pendidikan = 'S1 Sederajat' then 1 else 0 end), 0) as dt_pddk_s1,
            format(sum(case when b.ID_Dir and b.pendidikan = 'S2 Sederajat' then 1 else 0 end), 0) as dt_pddk_s2,
            format(sum(case when b.ID_Dir and b.pendidikan = 'S3 Sederajat' then 1 else 0 end), 0) as dt_pddk_s3
            FROM
            propinsi as a,
            t_wakaf as b
            WHERE
            a.lokasi_propinsi = b.Lokasi_Prop
            ");
        return $query->result();
    }

}