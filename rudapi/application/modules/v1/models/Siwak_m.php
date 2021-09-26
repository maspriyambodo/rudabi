<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siwak_m extends CI_Model
{
    
    public function get_tanah()
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

    public function get_tanah_kabupaten($provinsi)
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
            a.lokasi_kabupatenkota = b.Lokasi_Kab and a.lokasi_propinsi = b.Lokasi_Prop and b.Lokasi_Prop = $provinsi
            GROUP BY
            a.lokasi_kabupatenkota
            ");
        return $query->result();
    }

    public function get_tanah_kecamatan($kabupaten)
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
            a.lokasi_kode = $kabupaten and b.Lokasi_Prop = substr(a.lokasi_kode,1,2) and b.Lokasi_Kab = substr(a.lokasi_kode,4,2) and b.Lokasi_Kec = substr(a.lokasi_kode,7,2)
            GROUP BY
            a.lokasi_kecamatan
            ");
        return $query->result();
    }

    public function get_tanah_detail($kecamatan)
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
            a.lokasi_ID = $kecamatan
            and b.Lokasi_Prop = substr(a.lokasi_kode,1,2) and b.Lokasi_Kab = substr(a.lokasi_kode,4,2) and b.Lokasi_Kec = substr(a.lokasi_kode,7,2)
            GROUP BY
            b.ID_Dir
            ");
        return $query->result();
    }

}