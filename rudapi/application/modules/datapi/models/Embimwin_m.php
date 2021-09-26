<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Embimwin_m extends CI_Model
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

    // Menghitung totalan data ----------------------------------------------------------------

    function total_targetcatin()
    {
        $query = $this->db_database4->query("
            SELECT
            count(distinct b.id_peserta) AS realisasi_wilayah
            FROM
            tb_kegiatan As a
            INNER JOIN tb_peserta As b ON a.id_kegiatan = b.id_kegiatan,
            tb_target_wilayah As c, tb_inf_kantor As d, tb_target_pusat AS e
            WHERE
            (b.status_kehadiran_suami = 1 OR b.status_kehadiran_istri = 1) AND SUBSTRING( a.id_penyelenggara, 1, 2 ) = substr(c.wilayah,1,2) AND YEAR ( a.tanggal_awal_kegiatan ) = 2020 AND d.kode_lokasi = c.wilayah AND c.tahun_target_wilayah = 2020 AND e.tahun_target_pusat = 2020
            ");
        return $query->row();
    }

    function total_datacatin()
    {
        $query = $this->db_database4->query("
            SELECT
            count(a.id_peserta) AS jumlah_peserta
            FROM
            tb_peserta AS a
            INNER JOIN tb_kegiatan AS b ON a.id_kegiatan = b.id_kegiatan ,
            tb_target_pusat AS c
            WHERE
            year(b.tanggal_awal_kegiatan) = c.tahun_target_pusat
            ");
        return $query->row();
    }

    function total_fasilitator()
    {
        $query = $this->db_database4->query("
            SELECT
            count(a.id_fasilitator) as fasilitator_bimwin
            FROM
            tb_fasilitator as a
            LEFT JOIN tb_kegiatan_fasilitator as b on a.id_kegiatan = b.id_kegiatan_fasilitator
            LEFT JOIN tb_jenis_kegiatan_new as c on b.id_jenis_kegiatan = c.id_j_kegiatan
            ");
        return $query->row();
    }

    // Menghitung totalan data ----------------------------------------------------------------

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

    function get_all()
    {
        $query = $this->db_database4->query("
            SELECT
            a.id_target_pusat,
            a.tahun_target_pusat as tahun_target_wilayah,
            a.target_pusat,
            a.anggaran,
            sum(case when c.id_peserta and c.status_kehadiran_suami = '1' OR c.status_kehadiran_istri = '1' then 1 else 0 end) as realisasi_pusat,
            a.anggaran * sum(case when c.id_peserta and c.status_kehadiran_suami = '1' OR c.status_kehadiran_istri = '1' then 1 else 0 end) as total_realisasi,
            sum(case when c.id_peserta and c.status_kehadiran_suami = '1' OR c.status_kehadiran_istri = '1' then 1 else 0 end) / a.target_pusat * 100 as persentase_realisasi,
            a.tahun_target_pusat
            FROM
            tb_target_pusat as a,
            tb_kegiatan as b,
            tb_peserta as c
            WHERE
            b.id_kegiatan = c.id_kegiatan and YEAR ( b.tanggal_awal_kegiatan ) = a.tahun_target_pusat 
            GROUP BY
            a.tahun_target_pusat
            ");
        return $query->result();
    }

    function get_all_tahun($tahun)
    {
        $query = $this->db_database4->query("
            SELECT
            a.id_prop,
            a.nama_lokasi,
            b.target_wilayah,
            c.anggaran,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 1 OR d.status_kehadiran_istri = 1 then 1 else 0 end) as realisasi_wilayah,
            c.anggaran * sum(case when d.id_peserta and d.status_kehadiran_suami = 1 OR d.status_kehadiran_istri = 1 then 1 else 0 end) as total_realisasi,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 1 OR d.status_kehadiran_istri = 1 then 1 else 0 end) / b.target_wilayah * 100 as persentase_realisasi,
            c.tahun_target_pusat
            FROM
            tb_inf_kantor as a,
            tb_target_wilayah as b,
            tb_target_pusat as c,
            tb_peserta as d,
            tb_kegiatan as e
            WHERE
            a.kode_lokasi = b.wilayah and b.tahun_target_wilayah = c.tahun_target_pusat and d.id_kegiatan = e.id_kegiatan and b.tahun_target_wilayah = $tahun and year(e.tanggal_awal_kegiatan) = $tahun and substr(b.wilayah,1,2) = substr(e.id_penyelenggara,1,2)
            GROUP BY
            b.id_target_wilayah
            ORDER BY
            a.kode_lokasi asc
            ");
        return $query->result();
    }

    function get_all_prop($prop,$tahun)
    {
        $query = $this->db_database4->query("
            SELECT
            b.kabkot,
            a.nama_lokasi,
            b.target_kabkot,
            c.anggaran,
            b.target_kabkot * c.anggaran as total_anggaran,
            sum(case when e.id_peserta and e.status_kehadiran_suami = 1 OR e.status_kehadiran_istri = 1 then 1 else 0 end) as realisasi_kabupaten,
            c.anggaran * sum(case when e.id_peserta and e.status_kehadiran_suami = 1 OR e.status_kehadiran_istri = 1 then 1 else 0 end) as total_realisasi,
            sum(case when e.id_peserta and e.status_kehadiran_suami = 1 OR e.status_kehadiran_istri = 1 then 1 else 0 end) / b.target_kabkot * 100 as persentase_realisasi,
            c.tahun_target_pusat
            FROM
            tb_inf_kantor as a,
            tb_target_kabkot as b,
            tb_target_pusat as c,
            tb_kegiatan as d
            INNER JOIN tb_peserta as e on d.id_kegiatan = e.id_kegiatan
            WHERE
            a.id_prop = $prop and a.kode_lokasi = b.kabkot and b.tahun_target_kabkot = $tahun and c.tahun_target_pusat = $tahun and year(d.tanggal_awal_kegiatan) = $tahun and d.id_penyelenggara = b.kabkot
            GROUP BY
            b.id_target_kabkot
            ");
        return $query->result();
    }

    function get_all_kabkot($kabk,$tahun)
    {
        $query = $this->db_database4->query("
            SELECT
            b.kua,
            a.nama_lokasi,
            b.target_kua,
            c.anggaran,
            b.target_kua * c.anggaran as total_anggaran,
            sum(case when e.id_peserta and e.status_kehadiran_suami = 1 OR e.status_kehadiran_istri = 1 then 1 else 0 end) as realisasi_kabkot,
            c.anggaran * sum(case when e.id_peserta and e.status_kehadiran_suami = 1 OR e.status_kehadiran_istri = 1 then 1 else 0 end) as total_realisasi,
            sum(case when e.id_peserta and e.status_kehadiran_suami = 1 OR e.status_kehadiran_istri = 1 then 1 else 0 end) / b.target_kua * 100 as persentase_realisasi
            FROM
            tb_inf_kantor as a,
            tb_target_kua as b,
            tb_target_pusat as c,
            tb_kegiatan as d
            INNER JOIN tb_peserta as e on d.id_kegiatan = e.id_kegiatan
            WHERE
            a.kode_lokasi = b.kua and b.tahun_target_kua = $tahun and b.kabkot = $kabk and c.tahun_target_pusat = $tahun and (d.tanggal_awal_kegiatan) = $tahun and d.id_penyelenggara = b.kua
            GROUP BY
            b.id_target_kua
            ");
        return $query->result();
    }

    // function get_tahun($tahun)
    // {
    //     $query = $this->db_database4->query("
    //         SELECT
    //         d.id_prop,e.tahun_target_pusat,d.nama_lokasi,c.target_wilayah,format(e.anggaran,0) as anggaran, format(c.target_wilayah * e.anggaran, 0) as total_anggaran,
    //         count(distinct b.id_peserta) AS realisasi_wilayah,
    //         format(count(distinct b.id_peserta) * e.anggaran, 0) as total_realisasi,
    //         format(count(distinct b.id_peserta) / c.target_wilayah * 100, 2) as persentase_realisasi
    //         FROM
    //         tb_kegiatan As a
    //         INNER JOIN tb_peserta As b ON a.id_kegiatan = b.id_kegiatan,
    //         tb_target_wilayah As c, tb_inf_kantor As d, tb_target_pusat AS e
    //         WHERE
    //         (b.status_kehadiran_suami = 1 OR b.status_kehadiran_istri = 1) AND SUBSTRING( a.id_penyelenggara, 1, 2 ) = substr(c.wilayah,1,2) AND YEAR ( a.tanggal_awal_kegiatan ) = $tahun AND d.kode_lokasi = c.wilayah AND c.tahun_target_wilayah = $tahun AND e.tahun_target_pusat = $tahun
    //         GROUP BY
    //         d.id_prop
    //         ORDER BY
    //         d.id_prop
    //         ");
    //     return $query->result();
    // }

    function get_targetcatin_2020()
    {
        $query = $this->db_database4->query("
            SELECT
            d.id_prop,d.nama_lokasi,c.target_wilayah,format(e.anggaran,0) as anggaran, format(c.target_wilayah * e.anggaran, 0) as total_anggaran,
            count(distinct b.id_peserta) AS realisasi_wilayah,
            format(count(distinct b.id_peserta) * e.anggaran, 0) as total_realisasi,
            format(count(distinct b.id_peserta) / c.target_wilayah * 100, 2) as persentase_realisasi,
            c.tahun_target_wilayah
            FROM
            tb_kegiatan As a
            INNER JOIN tb_peserta As b ON a.id_kegiatan = b.id_kegiatan,
            tb_target_wilayah As c, tb_inf_kantor As d, tb_target_pusat AS e
            WHERE
            (b.status_kehadiran_suami = 1 OR b.status_kehadiran_istri = 1) AND SUBSTRING( a.id_penyelenggara, 1, 2 ) = substr(c.wilayah,1,2) AND YEAR ( a.tanggal_awal_kegiatan ) = 2020 AND d.kode_lokasi = c.wilayah AND c.tahun_target_wilayah = 2020 AND e.tahun_target_pusat = 2020
            GROUP BY
            d.id_prop
            ORDER BY
            d.id_prop
            ");
        return $query->result();
    }

    function get_targetcatin_prop2020($prop)
    {
        $query = $this->db_database4->query("
            SELECT
            a.kabkot,
            b.nama_lokasi,a.target_kabkot,format(c.anggaran,0) AS anggaran,format(a.target_kabkot * c.anggaran, 0) AS total_anggaran,
            count(e.id_peserta) AS realisasi_kabupaten,format(count(e.id_peserta) * c.anggaran, 0) AS total_realisasi,
            format(count(e.id_peserta) / a.target_kabkot * 100, 2) AS persentase_realisasi
            FROM
            tb_target_kabkot AS a , tb_inf_kantor AS b , tb_target_pusat AS c ,
            tb_kegiatan AS d
            INNER JOIN tb_peserta AS e ON d.id_kegiatan = e.id_kegiatan
            WHERE
            b.id_prop = $prop AND a.tahun_target_kabkot = 2020 AND a.kabkot = b.kode_lokasi AND c.tahun_target_pusat = 2020 AND
            YEAR ( d.tanggal_awal_kegiatan ) = 2020 AND SUBSTRING( d.id_penyelenggara, 1, 4 ) = substr(b.kode_lokasi,1,4) AND e.status_kehadiran_suami = 1 AND e.status_kehadiran_istri = 1
            GROUP BY
            a.id_target_kabkot
            ");
        return $query->result();
    }

    function get_targetcatin_kabkot2020($kabkot)
    {
        $query = $this->db_database4->query("
            SELECT
            b.kode_lokasi,
            b.nama_lokasi,a.target_kua,format(c.anggaran, 0) AS anggaran,format(c.anggaran * a.target_kua, 0) AS total_anggaran,
            count(d.id_peserta) AS realisasi_kabupaten,format(count(d.id_peserta) * c.anggaran, 0) AS total_realisasi,
            format(count(d.id_peserta) / a.target_kua * 100, 2) AS persentase_realisasi
            FROM
            tb_target_kua AS a ,tb_inf_kantor AS b ,tb_target_pusat AS c ,tb_peserta AS d
            INNER JOIN tb_kegiatan AS e ON d.id_kegiatan = e.id_kegiatan
            WHERE
            a.tahun_target_kua = 2020 AND a.kabkot = $kabkot AND a.kua = b.kode_lokasi AND c.tahun_target_pusat = 2020 AND YEAR ( e.tanggal_awal_kegiatan ) = 2020 and e.id_penyelenggara = b.kode_lokasi
            GROUP BY
            a.id_target_kua
            ");
        return $query->result();
    }

    function get_targetcatin_2019()
    {
        $query = $this->db_database4->query("
            SELECT
            d.id_prop,d.nama_lokasi,c.target_wilayah,format(e.anggaran,0) as anggaran, format(c.target_wilayah * e.anggaran, 0) as total_anggaran,
            count(distinct b.id_peserta) AS realisasi_wilayah,
            format(count(distinct b.id_peserta) * e.anggaran, 0) as total_realisasi,
            format(count(distinct b.id_peserta) / c.target_wilayah * 100, 2) as persentase_realisasi,
            c.tahun_target_wilayah
            FROM
            tb_kegiatan As a
            INNER JOIN tb_peserta As b ON a.id_kegiatan = b.id_kegiatan,
            tb_target_wilayah As c, tb_inf_kantor As d, tb_target_pusat AS e
            WHERE
            (b.status_kehadiran_suami = 1 OR b.status_kehadiran_istri = 1) AND SUBSTRING( a.id_penyelenggara, 1, 2 ) = substr(c.wilayah,1,2) AND YEAR ( a.tanggal_awal_kegiatan ) = 2019 AND d.kode_lokasi = c.wilayah AND c.tahun_target_wilayah = 2019 AND e.tahun_target_pusat = 2019
            GROUP BY
            d.id_prop
            ORDER BY
            d.id_prop
            ");
        return $query->result();
    }

    function get_targetcatin_prop2019($prop)
    {
        $query = $this->db_database4->query("
            SELECT
            a.kabkot,
            b.nama_lokasi,a.target_kabkot,format(c.anggaran,0) AS anggaran,format(a.target_kabkot * c.anggaran, 0) AS total_anggaran,
            count(e.id_peserta) AS realisasi_kabupaten,format(count(e.id_peserta) * c.anggaran, 0) AS total_realisasi,
            format(count(e.id_peserta) / a.target_kabkot * 100, 2) AS persentase_realisasi
            FROM
            tb_target_kabkot AS a , tb_inf_kantor AS b , tb_target_pusat AS c ,
            tb_kegiatan AS d
            INNER JOIN tb_peserta AS e ON d.id_kegiatan = e.id_kegiatan
            WHERE
            b.id_prop = $prop AND a.tahun_target_kabkot = 2019 AND a.kabkot = b.kode_lokasi AND c.tahun_target_pusat = 2019 AND
            YEAR ( d.tanggal_awal_kegiatan ) = 2019 AND SUBSTRING( d.id_penyelenggara, 1, 4 ) = substr(b.kode_lokasi,1,4)
            GROUP BY
            a.id_target_kabkot
            ");
        return $query->result();
    }

    function get_targetcatin_kabkot2019($kabkot)
    {
        $query = $this->db_database4->query("
            SELECT
            b.kode_lokasi,
            b.nama_lokasi,a.target_kua,format(c.anggaran, 0) AS anggaran,format(c.anggaran * a.target_kua, 0) AS total_anggaran,
            count(d.id_peserta) AS realisasi_kabupaten,format(count(d.id_peserta) * c.anggaran, 0) AS total_realisasi,
            format(count(d.id_peserta) / a.target_kua * 100, 2) AS persentase_realisasi
            FROM
            tb_target_kua AS a ,tb_inf_kantor AS b ,tb_target_pusat AS c ,tb_peserta AS d
            INNER JOIN tb_kegiatan AS e ON d.id_kegiatan = e.id_kegiatan
            WHERE
            a.tahun_target_kua = 2019 AND a.kabkot = $kabkot AND a.kua = b.kode_lokasi AND c.tahun_target_pusat = 2019 AND YEAR ( e.tanggal_awal_kegiatan ) = 2019 and e.id_penyelenggara = b.kode_lokasi
            GROUP BY
            a.id_target_kua
            ");
        return $query->result();
    }

    function get_targetcatin_2018()
    {
        $query = $this->db_database4->query("
            SELECT
            d.id_prop,d.nama_lokasi,c.target_wilayah,format(e.anggaran,0) as anggaran, format(c.target_wilayah * e.anggaran, 0) as total_anggaran,
            count(distinct b.id_peserta) AS realisasi_wilayah,
            format(count(distinct b.id_peserta) * e.anggaran, 0) as total_realisasi,
            format(count(distinct b.id_peserta) / c.target_wilayah * 100, 2) as persentase_realisasi,
            c.tahun_target_wilayah
            FROM
            tb_kegiatan As a
            INNER JOIN tb_peserta As b ON a.id_kegiatan = b.id_kegiatan,
            tb_target_wilayah As c, tb_inf_kantor As d, tb_target_pusat AS e
            WHERE
            (b.status_kehadiran_suami = 1 OR b.status_kehadiran_istri = 1) AND SUBSTRING( a.id_penyelenggara, 1, 2 ) = substr(c.wilayah,1,2) AND YEAR ( a.tanggal_awal_kegiatan ) = 2018 AND d.kode_lokasi = c.wilayah AND c.tahun_target_wilayah = 2018 AND e.tahun_target_pusat = 2018
            GROUP BY
            d.id_prop
            ORDER BY
            d.id_prop
            ");
        return $query->result();
    }

    function get_targetcatin_prop2018($prop)
    {
        $query = $this->db_database4->query("
            SELECT
            a.kabkot,
            b.nama_lokasi,a.target_kabkot,format(c.anggaran,0) AS anggaran,format(a.target_kabkot * c.anggaran, 0) AS total_anggaran,
            count(e.id_peserta) AS realisasi_kabupaten,format(count(e.id_peserta) * c.anggaran, 0) AS total_realisasi,
            format(count(e.id_peserta) / a.target_kabkot * 100, 2) AS persentase_realisasi
            FROM
            tb_target_kabkot AS a , tb_inf_kantor AS b , tb_target_pusat AS c ,
            tb_kegiatan AS d
            INNER JOIN tb_peserta AS e ON d.id_kegiatan = e.id_kegiatan
            WHERE
            b.id_prop = $prop AND a.tahun_target_kabkot = 2018 AND a.kabkot = b.kode_lokasi AND c.tahun_target_pusat = 2018 AND
            YEAR ( d.tanggal_awal_kegiatan ) = 2018 AND SUBSTRING( d.id_penyelenggara, 1, 4 ) = substr(b.kode_lokasi,1,4)
            GROUP BY
            a.id_target_kabkot
            ");
        return $query->result();
    }

    function get_targetcatin_kabkot2018($kabkot)
    {
        $query = $this->db_database4->query("
            SELECT
            b.kode_lokasi,
            b.nama_lokasi,a.target_kua,format(c.anggaran, 0) AS anggaran,format(c.anggaran * a.target_kua, 0) AS total_anggaran,
            count(d.id_peserta) AS realisasi_kabupaten,format(count(d.id_peserta) * c.anggaran, 0) AS total_realisasi,
            format(count(d.id_peserta) / a.target_kua * 100, 2) AS persentase_realisasi
            FROM
            tb_target_kua AS a ,tb_inf_kantor AS b ,tb_target_pusat AS c ,tb_peserta AS d
            INNER JOIN tb_kegiatan AS e ON d.id_kegiatan = e.id_kegiatan
            WHERE
            a.tahun_target_kua = 2018 AND a.kabkot = $kabkot AND a.kua = b.kode_lokasi AND c.tahun_target_pusat = 2018 AND YEAR ( e.tanggal_awal_kegiatan ) = 2018 and e.id_penyelenggara = b.kode_lokasi
            GROUP BY
            a.id_target_kua
            ");
        return $query->result();
    }

    /*---------------------------------------------- data catin ikut bimwin ----------------------------------------------*/

    function get_dacin()
    {
        $query = $this->db_database4->query("
            SELECT
            c.tahun_target_pusat as tahun_target_wilayah,
            format(c.target_pusat, 0) AS target_pusat,
            format(count(a.id_peserta), 0) AS jumlah_catin,
            format(sum(case when a.id_peserta and a.status_kehadiran_suami = 1 OR a.status_kehadiran_istri = 1 then 1 else 0 end), 0) AS hadir_suami,
            format(sum(case when a.id_peserta and a.status_kehadiran_suami = 0 AND a.status_kehadiran_istri = 0 then 1 else 0 end), 0) AS nonhadir_istri,
            format(sum(case when a.status_kehadiran_suami and a.status_kehadiran_suami = 1 then 1 else 0 end), 0) AS hadir_suami_bimwin,
            format(sum(case when a.status_kehadiran_istri and a.status_kehadiran_istri = 1 then 1 else 0 end), 0) AS hadir_istri_bimwin
            FROM
            tb_peserta AS a
            INNER JOIN tb_kegiatan AS b ON a.id_kegiatan = b.id_kegiatan ,
            tb_target_pusat AS c
            WHERE
            year(b.tanggal_awal_kegiatan) = c.tahun_target_pusat
            GROUP BY
            c.tahun_target_pusat
            ORDER BY
            c.tahun_target_pusat DESC
            ");
        return $query->result();
    }

    function get_dacin_tahun($tahun)
    {
        $query = $this->db_database4->query("
            SELECT
            b.id_prop,b.nama_lokasi,format(a.target_wilayah, 0) AS target_wilayah,
            count(case when d.id_peserta then 1 else 0 end) AS jum_catin,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 1 OR d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_pasutri,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 0 AND d.status_kehadiran_istri = 0 then 1 else 0 end) AS nonhadir_pasutri,
            sum(case when d.status_kehadiran_suami and d.status_kehadiran_suami = 1 then 1 else 0 end) AS hadir_bimwin_suami,
            sum(case when d.status_kehadiran_istri and d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_bimwin_istri,
            a.tahun_target_wilayah
            FROM
            tb_target_wilayah AS a ,tb_inf_kantor AS b ,
            tb_kegiatan AS c
            INNER JOIN tb_peserta AS d ON c.id_kegiatan = d.id_kegiatan
            WHERE
            a.wilayah = b.kode_lokasi AND a.tahun_target_wilayah = $tahun and SUBSTR(c.id_penyelenggara,1,2) = b.id_prop and year(c.tanggal_awal_kegiatan) = $tahun
            GROUP BY
            b.id_prop
            ");
        return $query->result();
    }

    function get_dacin_wilayah($tahun,$idwil)
    {
        $query = $this->db_database4->query("
            SELECT
            b.kabkot,
            a.nama_lokasi,
            b.target_kabkot,
            count( CASE WHEN d.id_peserta THEN 1 ELSE 0 END ) AS jum_catin,
            sum( CASE WHEN d.id_peserta AND d.status_kehadiran_suami = 1 OR d.status_kehadiran_istri = 1 THEN 1 ELSE 0 END ) AS hadir_pasutri,
            sum( CASE WHEN d.id_peserta AND d.status_kehadiran_suami = 0 AND d.status_kehadiran_istri = 0 THEN 1 ELSE 0 END ) AS nonhadir_pasutri,
            sum( CASE WHEN d.status_kehadiran_suami AND d.status_kehadiran_suami = 1 THEN 1 ELSE 0 END ) AS hadir_suami,
            sum( CASE WHEN d.status_kehadiran_istri AND d.status_kehadiran_istri = 1 THEN 1 ELSE 0 END ) AS hadir_istri,
            b.tahun_target_kabkot 
            FROM
            tb_inf_kantor AS a,
            tb_target_kabkot AS b,
            tb_kegiatan AS c
            INNER JOIN tb_peserta AS d ON c.id_kegiatan = d.id_kegiatan 
            WHERE
            b.tahun_target_kabkot = $tahun 
            AND a.id_prop = $idwil 
            AND b.kabkot = a.kode_lokasi 
            AND b.tahun_target_kabkot = $tahun 
            AND substr( c.id_penyelenggara, 1, 4 ) = substr( b.kabkot, 1, 4 ) 
            AND YEAR ( c.tanggal_awal_kegiatan ) = $tahun 
            GROUP BY
            a.id_prop,
            a.id_kab 
            ORDER BY
            a.id_prop ASC
            ");
        return $query->result();
    }

    function get_dacin_kabupaten($kua,$kabkot)
    {
        $query = $this->db_database4->query("
            SELECT
            a.kua,
            b.nama_lokasi,
            sum(case when d.id_peserta then 1 else 0 end) as dt_catin,
            sum( CASE WHEN d.id_peserta AND d.status_kehadiran_suami = 1 OR d.status_kehadiran_istri = 1 THEN 1 ELSE 0 END ) AS hadir_pasutri,
            sum( CASE WHEN d.id_peserta AND d.status_kehadiran_suami = 0 AND d.status_kehadiran_istri = 0 THEN 1 ELSE 0 END ) AS nonhadir_pasutri,
            sum( CASE WHEN d.status_kehadiran_suami AND d.status_kehadiran_suami = 1 THEN 1 ELSE 0 END ) AS hadir_suami,
            sum( CASE WHEN d.status_kehadiran_istri AND d.status_kehadiran_istri = 1 THEN 1 ELSE 0 END ) AS hadir_istri
            FROM
            tb_target_kua as a
            LEFT JOIN tb_inf_kantor as b on a.kua = b.kode_lokasi
            LEFT JOIN tb_kegiatan as c on a.kua = c.id_penyelenggara and b.kode_lokasi = c.id_penyelenggara
            LEFT JOIN tb_peserta as d on c.id_kegiatan = d.id_kegiatan
            WHERE
            a.kabkot = $kabkot and a.tahun_target_kua = $kua
            GROUP BY
            a.id_target_kua
            ");
        return $query->result();
    }

    function get_instruk()
    {
        $query = $this->db_database4->query("
            SELECT
            a.id_sk,
            a.no_sk,
            a.perihal,
            a.lokasi,
            a.tanggal_sk,
            sum(case when b.id_instruktur then 1 else 0 end) as dt_instruktur
            FROM
            tb_sk_instruktur_new as a
            LEFT JOIN tb_instruktur as b on a.no_sk = b.no_sk
            GROUP BY
            a.no_sk
            ");
        return $query->result();
    }

    function get_instruk_detail($id)
    {
        $query = $this->db_database4->query("
            SELECT
            *
            FROM
            tb_instruktur as a
            WHERE
            a.no_sk = '$id'
            GROUP BY
            a.id_instruktur
            ");
        return $query->result();
    }

    function get_fasil_detail($id)
    {
        $query = $this->db_database4->query("
            SELECT
            a.nik_fasilitator,
            a.nama_fasilitator,
            a.tempat_lahir,
            a.tanggal_lahir,
            a.jabatan_pekerjaan,
            a.instansi_pekerjaan,
            a.alamat,
            a.alamat_kantor,
            a.no_hp,
            a.email,
            a.no_sertifikasi,
            a.tanggal
            FROM
            tb_fasilitator as a
            LEFT JOIN tb_kegiatan_fasilitator as b on a.id_kegiatan = b.id_kegiatan_fasilitator
            LEFT JOIN tb_jenis_kegiatan_new as c on b.id_jenis_kegiatan = c.id_j_kegiatan
            WHERE
            c.id_j_kegiatan = $id
            GROUP BY
            a.id_fasilitator
            ");
        return $query->result();
    }

    function get_fasil()
    {
        $query = $this->db_database4->query("
            SELECT
            c.id_j_kegiatan,
            c.jenis_kegiatan,
            count(a.id_fasilitator) as dt_fasilitator
            FROM
            tb_fasilitator as a
            LEFT JOIN tb_kegiatan_fasilitator as b on a.id_kegiatan = b.id_kegiatan_fasilitator
            LEFT JOIN tb_jenis_kegiatan_new as c on b.id_jenis_kegiatan = c.id_j_kegiatan
            GROUP BY
            c.id_j_kegiatan
            ");
        return $query->result();
    }

    function get_dacin_2020()
    {
        $query = $this->db_database4->query("
            SELECT
            b.id_prop,b.nama_lokasi,format(a.target_wilayah, 0) AS target_wilayah,
            count(case when d.id_peserta then 1 else 0 end) AS jum_catin,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 1 OR d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_pasutri,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 0 AND d.status_kehadiran_istri = 0 then 1 else 0 end) AS nonhadir_pasutri,
            sum(case when d.status_kehadiran_suami and d.status_kehadiran_suami = 1 then 1 else 0 end) AS hadir_bimwin_suami,
            sum(case when d.status_kehadiran_istri and d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_bimwin_istri,
            a.tahun_target_wilayah
            FROM
            tb_target_wilayah AS a ,tb_inf_kantor AS b ,
            tb_kegiatan AS c
            INNER JOIN tb_peserta AS d ON c.id_kegiatan = d.id_kegiatan
            WHERE
            a.wilayah = b.kode_lokasi AND a.tahun_target_wilayah = 2020 and SUBSTR(c.id_penyelenggara,1,2) = b.id_prop and year(c.tanggal_awal_kegiatan) = 2020
            GROUP BY
            b.id_prop
            ");
        return $query->result();
    }

    function get_dacin_prop2020($prop)
    {
        $query = $this->db_database4->query("
            SELECT
            b.kabkot,a.nama_lokasi,b.target_kabkot,
            count(case when d.id_peserta then 1 else 0 end) AS jum_catin,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 1 OR d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_pasutri,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 0 AND d.status_kehadiran_istri = 0 then 1 else 0 end) AS nonhadir_pasutri,
            sum(case when d.status_kehadiran_suami and d.status_kehadiran_suami = 1 then 1 else 0 end) AS hadir_suami,
            sum(case when d.status_kehadiran_istri and d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_istri,
            b.tahun_target_kabkot
            FROM
            tb_inf_kantor AS a,tb_target_kabkot AS b,
            tb_kegiatan AS c
            INNER JOIN tb_peserta AS d ON c.id_kegiatan = d.id_kegiatan
            WHERE
            b.tahun_target_kabkot = 2020 AND a.id_prop = $prop AND b.kabkot = a.kode_lokasi AND b.tahun_target_kabkot = 2020 AND substr(c.id_penyelenggara,1,4) = substr(b.kabkot,1,4) AND year(c.tanggal_awal_kegiatan) = 2020
            GROUP BY
            a.id_prop,a.id_kab
            ORDER BY
            a.id_prop ASC
            ");
        return $query->result();
    }

    function get_dacin_kabkot2020($kabkot)
    {
        $query = $this->db_database4->query("
            SELECT
            a.id_kec,a.nama_lokasi,b.target_kua,
            count(case when d.id_peserta then 1 else 0 end) AS jum_catin,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 1 OR d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_pasutri,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 0 AND d.status_kehadiran_istri = 0 then 1 else 0 end) AS nonhadir_pasutri,
            sum(case when d.status_kehadiran_suami and d.status_kehadiran_suami = 1 then 1 else 0 end) AS hadir_suami,
            sum(case when d.status_kehadiran_istri and d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_istri
            FROM
            tb_inf_kantor AS a,tb_target_kua AS b,
            tb_kegiatan AS c
            INNER JOIN tb_peserta AS d ON c.id_kegiatan = d.id_kegiatan
            WHERE
            b.kabkot = $kabkot AND a.kode_lokasi = b.kua AND b.tahun_target_kua = 2020 AND year(c.tanggal_awal_kegiatan) = 2020 AND c.id_penyelenggara = a.kode_lokasi
            GROUP BY
            b.id_target_kua
            ");
        return $query->result();
    }

    function get_dacin_2019()
    {
        $query = $this->db_database4->query("
            SELECT
            b.id_prop,b.nama_lokasi,format(a.target_wilayah, 0) AS target_wilayah,
            count(case when d.id_peserta then 1 else 0 end) AS jum_catin,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 1 OR d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_pasutri,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 0 AND d.status_kehadiran_istri = 0 then 1 else 0 end) AS nonhadir_pasutri,
            sum(case when d.status_kehadiran_suami and d.status_kehadiran_suami = 1 then 1 else 0 end) AS hadir_bimwin_suami,
            sum(case when d.status_kehadiran_istri and d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_bimwin_istri,
            a.tahun_target_wilayah
            FROM
            tb_target_wilayah AS a ,tb_inf_kantor AS b ,
            tb_kegiatan AS c
            INNER JOIN tb_peserta AS d ON c.id_kegiatan = d.id_kegiatan
            WHERE
            a.wilayah = b.kode_lokasi AND a.tahun_target_wilayah = 2019 and SUBSTR(c.id_penyelenggara,1,2) = b.id_prop and year(c.tanggal_awal_kegiatan) = 2019
            GROUP BY
            b.id_prop
            ");
        return $query->result();
    }

    function get_dacin_prop2019($prop)
    {
        $query = $this->db_database4->query("
            SELECT
            b.kabkot,a.nama_lokasi,b.target_kabkot,
            count(case when d.id_peserta then 1 else 0 end) AS jum_catin,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 1 OR d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_pasutri,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 0 AND d.status_kehadiran_istri = 0 then 1 else 0 end) AS nonhadir_pasutri,
            sum(case when d.status_kehadiran_suami and d.status_kehadiran_suami = 1 then 1 else 0 end) AS hadir_suami,
            sum(case when d.status_kehadiran_istri and d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_istri,
            b.tahun_target_kabkot
            FROM
            tb_inf_kantor AS a,tb_target_kabkot AS b,
            tb_kegiatan AS c
            INNER JOIN tb_peserta AS d ON c.id_kegiatan = d.id_kegiatan
            WHERE
            b.tahun_target_kabkot = 2019 AND a.id_prop = $prop AND b.kabkot = a.kode_lokasi AND b.tahun_target_kabkot = 2019 AND substr(c.id_penyelenggara,1,4) = substr(b.kabkot,1,4) AND year(c.tanggal_awal_kegiatan) = 2019
            GROUP BY
            a.id_prop,a.id_kab
            ORDER BY
            a.id_prop ASC
            ");
        return $query->result();
    }

    function get_dacin_kabkot2019($kabkot)
    {
        $query = $this->db_database4->query("
            SELECT
            a.id_kec,a.nama_lokasi,b.target_kua,
            count(case when d.id_peserta then 1 else 0 end) AS jum_catin,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 1 OR d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_pasutri,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 0 AND d.status_kehadiran_istri = 0 then 1 else 0 end) AS nonhadir_pasutri,
            sum(case when d.status_kehadiran_suami and d.status_kehadiran_suami = 1 then 1 else 0 end) AS hadir_suami,
            sum(case when d.status_kehadiran_istri and d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_istri
            FROM
            tb_inf_kantor AS a,tb_target_kua AS b,
            tb_kegiatan AS c
            INNER JOIN tb_peserta AS d ON c.id_kegiatan = d.id_kegiatan
            WHERE
            b.kabkot = $kabkot AND a.kode_lokasi = b.kua AND b.tahun_target_kua = 2019 AND year(c.tanggal_awal_kegiatan) = 2019 AND c.id_penyelenggara = a.kode_lokasi
            GROUP BY
            b.id_target_kua
            ");
        return $query->result();
    }

    function get_dacin_2018()
    {
        $query = $this->db_database4->query("
            SELECT
            b.id_prop,b.nama_lokasi,format(a.target_wilayah, 0) AS target_wilayah,
            count(case when d.id_peserta then 1 else 0 end) AS jum_catin,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 1 OR d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_pasutri,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 0 AND d.status_kehadiran_istri = 0 then 1 else 0 end) AS nonhadir_pasutri,
            sum(case when d.status_kehadiran_suami and d.status_kehadiran_suami = 1 then 1 else 0 end) AS hadir_bimwin_suami,
            sum(case when d.status_kehadiran_istri and d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_bimwin_istri,
            a.tahun_target_wilayah
            FROM
            tb_target_wilayah AS a ,tb_inf_kantor AS b ,
            tb_kegiatan AS c
            INNER JOIN tb_peserta AS d ON c.id_kegiatan = d.id_kegiatan
            WHERE
            a.wilayah = b.kode_lokasi AND a.tahun_target_wilayah = 2018 and SUBSTR(c.id_penyelenggara,1,2) = b.id_prop and year(c.tanggal_awal_kegiatan) = 2018
            GROUP BY
            b.id_prop
            ");
        return $query->result();
    }

    function get_dacin_prop2018($prop)
    {
        $query = $this->db_database4->query("
            SELECT
            b.kabkot,a.nama_lokasi,b.target_kabkot,
            count(case when d.id_peserta then 1 else 0 end) AS jum_catin,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 1 OR d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_pasutri,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 0 AND d.status_kehadiran_istri = 0 then 1 else 0 end) AS nonhadir_pasutri,
            sum(case when d.status_kehadiran_suami and d.status_kehadiran_suami = 1 then 1 else 0 end) AS hadir_suami,
            sum(case when d.status_kehadiran_istri and d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_istri,
            b.tahun_target_kabkot
            FROM
            tb_inf_kantor AS a,tb_target_kabkot AS b,
            tb_kegiatan AS c
            INNER JOIN tb_peserta AS d ON c.id_kegiatan = d.id_kegiatan
            WHERE
            b.tahun_target_kabkot = 2018 AND a.id_prop = $prop AND b.kabkot = a.kode_lokasi AND b.tahun_target_kabkot = 2018 AND substr(c.id_penyelenggara,1,4) = substr(b.kabkot,1,4) AND year(c.tanggal_awal_kegiatan) = 2018
            GROUP BY
            a.id_prop,a.id_kab
            ORDER BY
            a.id_prop ASC
            ");
        return $query->result();
    }

    function get_dacin_kabkot2018($kabkot)
    {
        $query = $this->db_database4->query("
            SELECT
            a.id_kec,a.nama_lokasi,b.target_kua,
            count(case when d.id_peserta then 1 else 0 end) AS jum_catin,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 1 OR d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_pasutri,
            sum(case when d.id_peserta and d.status_kehadiran_suami = 0 AND d.status_kehadiran_istri = 0 then 1 else 0 end) AS nonhadir_pasutri,
            sum(case when d.status_kehadiran_suami and d.status_kehadiran_suami = 1 then 1 else 0 end) AS hadir_suami,
            sum(case when d.status_kehadiran_istri and d.status_kehadiran_istri = 1 then 1 else 0 end) AS hadir_istri
            FROM
            tb_inf_kantor AS a,tb_target_kua AS b,
            tb_kegiatan AS c
            INNER JOIN tb_peserta AS d ON c.id_kegiatan = d.id_kegiatan
            WHERE
            b.kabkot = $kabkot AND a.kode_lokasi = b.kua AND b.tahun_target_kua = 2018 AND year(c.tanggal_awal_kegiatan) = 2018 AND c.id_penyelenggara = a.kode_lokasi
            GROUP BY
            b.id_target_kua
            ");
        return $query->result();
    }

}