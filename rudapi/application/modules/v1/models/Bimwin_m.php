<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimwin_m extends CI_Model
{
    public function get_targetcatin()
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
            (b.status_kehadiran_suami = 1 OR b.status_kehadiran_istri = 1) AND SUBSTRING( a.id_penyelenggara, 1, 2 ) = substr(c.wilayah,1,2) AND YEAR ( a.tanggal_awal_kegiatan ) = YEAR(curdate()) AND d.kode_lokasi = c.wilayah AND c.tahun_target_wilayah = YEAR(curdate()) AND e.tahun_target_pusat = YEAR(curdate())
            GROUP BY
            d.id_prop
            ORDER BY
            d.id_prop
            ");
        return $query->result();
    }

    public function get_targetcatin_tahun($tahun)
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
            (b.status_kehadiran_suami = 1 OR b.status_kehadiran_istri = 1) AND SUBSTRING( a.id_penyelenggara, 1, 2 ) = substr(c.wilayah,1,2) AND YEAR ( a.tanggal_awal_kegiatan ) = $tahun AND d.kode_lokasi = c.wilayah AND c.tahun_target_wilayah = $tahun AND e.tahun_target_pusat = $tahun
            GROUP BY
            d.id_prop
            ORDER BY
            d.id_prop
            ");
        return $query->result();
    }

    public function get_targetcatin_provinsi($provinsi, $tahun)
    {
        $query = $this->db_database4->query("
            SELECT
            a.kabkot,
            b.nama_lokasi,a.target_kabkot,format(c.anggaran,0) AS anggaran,format(a.target_kabkot * c.anggaran, 0) AS total_anggaran,
            count(e.id_peserta) AS realisasi_kabupaten,format(count(e.id_peserta) * c.anggaran, 0) AS total_realisasi,
            format(count(e.id_peserta) / a.target_kabkot * 100, 2) AS persentase_realisasi, year(d.tanggal_awal_kegiatan) as tanggal_kegiatan
            FROM
            tb_target_kabkot AS a , tb_inf_kantor AS b , tb_target_pusat AS c ,
            tb_kegiatan AS d
            INNER JOIN tb_peserta AS e ON d.id_kegiatan = e.id_kegiatan
            WHERE
            b.id_prop = $provinsi AND a.tahun_target_kabkot = $tahun AND a.kabkot = b.kode_lokasi AND c.tahun_target_pusat = $tahun AND
            YEAR ( d.tanggal_awal_kegiatan ) = $tahun AND SUBSTRING( d.id_penyelenggara, 1, 4 ) = substr(b.kode_lokasi,1,4) AND e.status_kehadiran_suami = 1 AND e.status_kehadiran_istri = 1
            GROUP BY
            a.id_target_kabkot
            ");
        return $query->result();
    }

    public function get_datacatin()
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

    public function get_datacatin_tahun($tahun)
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

    public function get_datacatin_kua($kua, $kabupaten)
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
            a.kabkot = $kabupaten and a.tahun_target_kua = $kua
            GROUP BY
            a.id_target_kua
            ");
        return $query->result();
    }

    public function get_datacatin_provinsi($provinsi, $tahun)
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
            AND a.id_prop = $provinsi 
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

    public function get_fasilitator()
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

    public function get_fasilitator_detail($id)
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

}