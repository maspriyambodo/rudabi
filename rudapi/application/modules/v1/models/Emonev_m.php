<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Emonev_m extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        //$this->dari = date('2020-01-01');
        //$this->sampai = date('2020-12-30');
        $this->load->helper('text');
    }

    // query terbaru
    public function get_tipologi()
    {
        $query = $this->db_database3->query("
            SELECT a.tipokua,count(a.tipokua) as jml from tblnilaiinstrumen a inner join  (select  max(id) as id,kodekua from tblnilaiinstrumen group by kodekua) as b on a.kodekua = b.kodekua  and a.id = b.id  group by a.tipokua"
        );
        return $query->result();
    }

    // query terbaru
    public function get_tipologi_detail($id)
    {
        $query = $this->db_database3->select('tblkua.kodekua,
                tblkua.kua,
                tblkua.alamat,
                tblkabupaten.kabupaten,
                a.tipokua,
                a.tgl,a.id')
                ->from('tblnilaiinstrumen AS a')
                ->join('( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b', 'a.kodekua = b.kodekua AND a.id = b.id', 'INNER')
                ->join('tblkua', 'a.kodekua = tblkua.kodekua', 'LEFT')
                ->join('tblkabupaten', 'SUBSTR( tblkua.kodekua, 1, 4 ) = tblkabupaten.kodekab ', 'LEFT')
                ->where('a.tipokua', $id)
                ->order_by('a.kodekua ASC, a.tgl ASC')
                ->get()
                ->result();
        return $query;
    }

    // query terbaru
    public function get_rekapkua()
    {
        $query = $this->db_database3->query("
            SELECT
            b.kodeprop, b.propinsi, COUNT(a.id) AS jumlah_kua
            FROM
            tblkua a
            JOIN tblpropinsi b ON SUBSTR(a.kodekua, 1, 2) = b.kodeprop
            GROUP BY
            b.kodeprop
            ");
        return $query->result();
    }

    // query terbaru
    public function get_rekapkua_detail($id)
    {
        $query = $this->db_database3->query("
            SELECT
            a.kodekua, a.kua, a.alamat, a.tlp, a.fax, a.kepala, DATE_FORMAT(a.tglregistrasi,'%d %M %Y') AS tanggal
            FROM
            tblkua a
            WHERE
            SUBSTR(a.kodekua,1,2) = $id
            GROUP BY
            a.id
            ");
        return $query->result();
    }

    // query terbaru
    public function get_statustanah()
    {
        $query = $this->db_database3->query("SELECT a.statustanah, count( a.statustanah ) AS jml, 
            CASE
            WHEN a.statustanah = 0 THEN
            'Tidak Mengisi Inputan' 
            WHEN a.statustanah = 1 THEN
            'Milik negara' 
            WHEN a.statustanah = 2 THEN
            'Milik pemda' 
            WHEN a.statustanah = 3 THEN
            'Sewa' 
            WHEN a.statustanah = 4 THEN
            'Menumpang' 
            WHEN a.statustanah = 5 THEN
            'Wakaf kua' 
            ELSE 'Wakaf non kua' 
            END AS keterangan
            FROM tblnilaiinstrumen a INNER JOIN ( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b ON a.id = b.id 
            GROUP BY a.statustanah");
        return $query->result();
    }

    // query terbaru
    public function get_statustanah_detail($id)
    {
        $query = $this->db_database3->select('tblkua.kodekua,tblkua.kua,tblkua.alamat,tblkabupaten.kabupaten,a.tipokua,a.tgl,a.id')
            ->from('tblnilaiinstrumen AS a')
            ->join('( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b', 'a.kodekua = b.kodekua AND a.id = b.id', 'INNER')
            ->join('tblkua', 'a.kodekua = tblkua.kodekua', 'LEFT')
            ->join('tblkabupaten', 'SUBSTR( tblkua.kodekua, 1, 4 ) = tblkabupaten.kodekab ', 'LEFT')
            ->where('a.statustanah', $id)
            ->order_by('a.kodekua ASC, a.tgl ASC')
            ->get()
            ->result();
        return $query;
    }

    // query terbaru
    public function get_penilaian()
    {
        $query = $this->db_database3->select('tblnilai.tahun,COUNT( tblnilai.tahun ) AS jumlah ')
            ->from('tblnilai')
            ->group_by('tblnilai.tahun')
            ->get()
            ->result();
        return $query;
    }

    // query terbaru
    public function get_penilaian_provinsi($tahun)
    {
        $query = $this->db_database3->query("
            SELECT
            substr(b.kodekua,1,2) as kodekua,
            a.propinsi,
            count(b.id) as dt_penilai,
            sum(case when b.`status` = 1 then 1 else 0 end) as dt_validasi,
            sum(case when b.`status` = 0 then 1 else 0 end) as dt_nonvalidasi,
            sum(case when b.jumlahpenghulu then b.jumlahpenghulu else 0 end) as dt_penghulu,
            sum(case when b.jumlahpegawai then b.jumlahpegawai else 0 end) as dt_pegawai,
            sum(case when b.jumlahpenduduk then b.jumlahpenduduk else 0 end) as dt_penduduk,
            sum(case when b.jumlahmuslim then b.jumlahmuslim else 0 end) as dt_muslim,
            sum(case when b.jumlahnikah then b.jumlahnikah else 0 end) as dt_nikah,
            sum(case when b.luastanah then b.luastanah else 0 end) as dt_luastanah,
            sum(case when b.performa1 then b.performa1 else 0 end) as dt_performa1,
            sum(case when b.performa2 then b.performa2 else 0 end) as dt_performa2,
            sum(case when b.performa3 then b.performa3 else 0 end) as dt_performa3,
            sum(case when b.performa4 then b.performa4 else 0 end) as dt_performa4,
            b.tahun
            FROM
            tblpropinsi as a
            LEFT JOIN tblnilai as b on a.kodeprop = substr(b.kodekua,1,2)
            WHERE
            b.tahun = $tahun and a.kodeprop != 00
            GROUP BY
            a.kodeprop
            ");
        return $query->result();
    }

    // query terbaru
    public function get_penilaian_kabupaten($tahun, $kabupaten)
    {
        $query = $this->db_database3->query("
            SELECT
            b.kodekab,
            b.kabupaten,
            count(a.id) as dt_penilai,
            sum(case when a.`status` = 1 then 1 else 0 end) as dt_validasi,
            sum(case when a.`status` = 0 then 1 else 0 end) as dt_nonvalidasi,
            sum(case when a.jumlahpenghulu then a.jumlahpenghulu else 0 end) as dt_penghulu,
            sum(case when a.jumlahpegawai then a.jumlahpegawai else 0 end) as dt_pegawai,
            sum(case when a.jumlahpenduduk then a.jumlahpenduduk else 0 end) as dt_penduduk,
            sum(case when a.jumlahmuslim then a.jumlahmuslim else 0 end) as dt_muslim,
            sum(case when a.jumlahnikah then a.jumlahnikah else 0 end) as dt_nikah,
            sum(case when a.luastanah then a.luastanah else 0 end) as dt_luastanah,
            sum(case when a.performa1 then a.performa1 else 0 end) as dt_performa1,
            sum(case when a.performa2 then a.performa2 else 0 end) as dt_performa2,
            sum(case when a.performa3 then a.performa3 else 0 end) as dt_performa3,
            sum(case when a.performa4 then a.performa4 else 0 end) as dt_performa4
            FROM
            tblnilai as a
            LEFT JOIN tblkabupaten as b on substr(a.kodekua,1,4) = b.kodekab
            WHERE
            substr(a.kodekua,1,2) = $kabupaten and a.tahun = $tahun and b.kodekab != 'Kode'
            GROUP BY
            b.kodekab
            ");
        return $query->result();
    }

    // query terbaru
    public function get_penilaian_detail($tahun, $id)
    {
        $query2 = $this->db_database3->query("
            SELECT
            a.id,
            a.kodekua,
            a.kua,
            b.kepala,
            a.tgl,
            case
            when a.`status` = 1 then 'Validasi pusat'
            when a.`status` = 0 then 'Novalidasi pusat'
            end as status,
            a.jumlahpenghulu as dt_penghulu,
            a.jumlahpegawai as dt_pegawai,
            a.jumlahpenduduk as dt_penduduk,
            a.jumlahmuslim as dt_muslim,
            a.jumlahnikah as dt_nikah,
            a.luastanah as dt_luastanah,
            a.performa1 as dt_performa1,
            a.performa2 as dt_performa2,
            a.performa3 as dt_performa3,
            a.performa4 as dt_performa4
            FROM
            tblnilai as a
            LEFT JOIN tblkua as b on a.kodekua = b.kodekua
            LEFT JOIN tblkabupaten as c on substr(a.kodekua,1,4) = c.kodekab and substr(b.kodekua,1,4) = c.kodekab
            WHERE
            a.tahun = $tahun and c.kodekab = $id
            GROUP BY
            a.id
            ");
        return $query2->result();
    }

    // query terbaru
    public function get_rekapitulasidata()
    {
        $a = $this->db_database3->select('COUNT( a.id ) AS jumlah,"Sudah Input Data" AS kategori')
            ->from('tblnilaiinstrumen a')
            ->join('( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b', 'a.kodekua = b.kodekua AND a.id = b.id', 'INNER')
            ->get()
            ->result();
        $b = $this->db_database3->select('"Belum Input Data" AS kategori,COUNT(tblkua.id) - ' . $a[0]->jumlah . ' AS jumlah')
            ->from('tblkua')
            ->get()
            ->result();
        $query = array_merge($a, $b);
        return $query;
    }

    // query terbaru
    public function get_rekapitulasiisian()
    {
        $query = $this->db_database3->select('YEAR ( a.tgl ) AS tahun,count( a.tgl ) AS jumlah')
            ->from('tblnilaiinstrumen a')
            ->join('( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b', 'a.id = b.id ', 'INNER')
            ->group_by('YEAR (a.tgl)')
            ->get()
            ->result();
        return $query;
    }

    // query terbaru
    public function get_bangunankua()
    {
        $query = $this->db_database3->select('CASE a.`status` WHEN 0 THEN "Tidak Mengisi Inputan" WHEN 1 THEN "Milik Negara" WHEN 2 THEN "Milik Pemda" WHEN 3 THEN "Sewa" WHEN 4 THEN "Menumpang" WHEN 5 THEN "Wakaf untuk KUA" ELSE "Wakaf Non Untuk KUA" END AS kategori', false)
            ->select('count( a.STATUS ) AS jumlah, a.`status` AS stat')
            ->from('tblnilaiinstrumen a')
            ->join('( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b', 'a.id = b.id', 'INNER')
            ->group_by('a.`status`', false)
            ->get()
            ->result();
        return $query;
    }

    //query terbaru
    public function get_bangunankua_detail($id)
    {
        $query = $this->db_database3->select('tblkua.kodekua,tblkua.kua,tblkua.alamat,tblkabupaten.kabupaten,a.tipokua,a.tgl,a.id')
            ->from('tblnilaiinstrumen AS a')
            ->join('( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b', 'a.kodekua = b.kodekua AND a.id = b.id', 'INNER')
            ->join('tblkua', 'a.kodekua = tblkua.kodekua', 'LEFT')
            ->join('tblkabupaten', 'SUBSTR( tblkua.kodekua, 1, 4 ) = tblkabupaten.kodekab ', 'LEFT')
            ->where('`a`.`status`', $id, false)
            ->order_by('a.kodekua ASC, a.tgl ASC')
            ->get()
            ->result();
        return $query;
    }

    // query terbaru
    public function get_rekapregistrasi()
    {
        $query = $this->db_database3->query("
            SELECT
            a.status,
            case
            when a.status = 0 then 'akun tidak aktif'
            when a.status = 1 then 'akun butuh approval'
            when a.status = 2 then 'akun aktif'
            end as kategori,
            count(case when a.status then 1 else 0 end) as jum
            FROM
            tblkabupaten as a
            GROUP BY
            a.status
            ");
        return $query->result();
    }

    // query terbaru
    public function get_rekapregistrasi_detail($id)
    {
        $query = $this->db_database3->query("
            SELECT
            a.kodekab,
            a.kabupaten,
            a.email,
            a.alamat,
            a.tlp,
            case
            when a.status = 0 then 'akun tidak aktif'
            when a.status = 1 then 'akun butuh approval'
            when a.status = 2 then 'akun aktif'
            end as keterangan
            FROM
            tblkabupaten as a
            WHERE
            a.status = $id 
            GROUP BY
            a.id
            ");
        return $query->result();
    }

    //fungsi cek session
    function logged_id() {
        return $this->session->userdata('user_id');
    }

    //menghitung total data------------------------------------------------------------------
    // $query = $this->db_database3->query("");
    // return $query->row();

    function total_rekap_data_kua()
    {
        $query = $this->db_database3->query("
            SELECT
            count(a.id) as rekap_data_kua
            FROM
            tblkua as a
            ");
        return $query->row();
    }

    function tipologi_kua()
    {
        $query = $this->db_database3->query("
            SELECT
                count( a.tipokua ) AS tipologi_kua
            FROM
                tblnilaiinstrumen a
                INNER JOIN ( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b ON a.kodekua = b.kodekua 
                AND a.id = b.id
            ");
        return $query->row();
    }

    function status_tanah_kua()
    {
        $query = $this->db_database3->query("
            SELECT
                count( a.statustanah ) AS status_tanah_kua
            FROM
                tblnilaiinstrumen a
                INNER JOIN ( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b ON a.id = b.id
            ");
        return $query->row();
    }

    function rekapitulasi_nilai_kua()
    {
        $query = $this->db_database3->query("
            SELECT
                count( a.id ) AS rekapitulasi_penilaian_kua
            FROM
                tblnilai AS a
                LEFT JOIN tblpropinsi AS b ON b.kodeprop = substr( a.kodekua, 1, 2 ) 
            WHERE
                b.kodeprop != 00
            ");
        return $query->row();
    }

    function rekapitulasi_data_kua()
    {
        $query = $this->db_database3->query("
            SELECT
                ( SELECT count( c.id ) FROM tblkua AS c ) - count( a.tgl ) +
                count(a.tgl) AS rekapitulasi_data_kua
            FROM
                tblnilaiinstrumen a
                INNER JOIN ( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b ON a.id = b.id
            ");
        return $query->row();
    }

    function rekap_isian_kua()
    {
        $query = $this->db_database3->query("
            SELECT
                ( SELECT count( c.id ) FROM tblkua AS c ) - count( a.tgl ) +
                count(a.tgl) AS rekap_isian_kua
            FROM
                tblnilaiinstrumen a
                INNER JOIN ( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b ON a.id = b.id
            ");
        return $query->row();
    }

    function status_bangunan_kua()
    {
       $query = $this->db_database3->query("
            SELECT count( a.statustanah ) AS status_bangunan_kua
            FROM tblnilaiinstrumen a INNER JOIN ( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b ON a.id = b.id
        ");
       return $query->row();
    }

    function penggunaan_simkah()
    {
        $query = $this->db_database3->query("
            SELECT
            count( a.simkah ) AS penggunaan_simkah 
            FROM
            tblnilaiinstrumen a
            INNER JOIN ( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b ON a.id = b.id
            ");
        return $query->row();
    }

    function rekapitulasi_registrasi()
    {
        $query = $this->db_database3->query("
            SELECT
            count(a.status) as rekapitulasi_registrasi
            FROM
            tblkua as a
            ");
        return $query->row();
    }    

    //menghitung total data------------------------------------------------------------------

    //fungsi check login
    function check_login($table, $field1, $field2) {
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

    function getKua($id = null) {
        if ($id === null) {
            $this->setGroup;
            $query2 = $this->db_database3->query("SELECT SUBSTR(kodekua,1,2) as kodekua, propinsi, tblpropinsi.alamat, tblpropinsi.tlp, tahunpenilaian, COUNT(SUBSTR(kodekua,1,2)) as jumlah_kua from tblkua join tblpropinsi on SUBSTR(kodekua,1,2) = kodeprop group by kodeprop");
            return $query2->result();
        } else {
            $this->setGroup;
            // tampil data bersarkan propinsi dan join dengan kua
            $query = $this->db_database3->query("
                SELECT
                c.kepala, c.kua, a.kabupaten, b.propinsi, c.alamat, c.tlp
                FROM
                tblkabupaten as a
                LEFT JOIN tblpropinsi as b ON SUBSTR(a.kodekab,1,2)  = b.kodeprop
                LEFT JOIN tblkua as c ON a.kodekab = SUBSTR(c.kodekua,1,4)
                where
                SUBSTR(c.kodekua,1,2) = $id

                -- SELECT kepala, kua, kabupaten, propinsi, tblkua.alamat, tblkua.tlp from tblkua join tblpropinsi on kodeprop = SUBSTR(kodekua,1,2) join tblkabupaten on kodeprop = SUBSTR(kodekab,1,2) where SUBSTR(kodekua,1,2) = '$id' group by kodekua
                ");
            return $query->result();
        }
    }

    function get_bangunan()
    {
        $query = $this->db_database3->query("
            SELECT
            a.kondisi,
            CASE
            WHEN a.kondisi = 0 THEN
            'Tidak mengisi kondisi' 
            WHEN a.kondisi = 1 THEN
            'Kondisi baik' 
            WHEN a.kondisi = 2 THEN
            'Kondisi rudak ringan' 
            WHEN a.kondisi = 3 THEN
            'Kondisi rusak berat' 
            END AS keterangan,
            count(a.kondisi) as jumlah
            FROM
            tblnilaiinstrumen a
            INNER JOIN ( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b ON a.id = b.id 
            GROUP BY
            a.kondisi
            ");
        return $query->result();
    }

    function get_bangunan_id($id)
    {
        $query = $this->db_database3->query("
            SELECT
            a.kodekua,
            c.kua,
            e.kabupaten,
            CASE
            WHEN a.kondisi = 0 THEN 'Tidak mengisi kondisi'
            WHEN a.kondisi = 1 THEN 'Kondisi baik'
            WHEN a.kondisi = 2 THEN 'Kondisi rusak ringan'
            WHEN a.kondisi = 3 THEN 'Kondisi rusak berat'
            END AS kondisi_bangunan,
            a.tgl
            FROM
            tblnilaiinstrumen a
            INNER JOIN (SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b ON a.id = b.id
            INNER JOIN tblkua as c ON a.kodekua = c.kodekua
            INNER JOIN tblkabupaten as e ON substr(c.kodekua,1,4) = e.kodekab
            WHERE
            a.kondisi = $id
            GROUP BY
            a.id
            ");
        return $query->result();
    }

    function getKab($id = null) {
        if ($id === null) {
            $this->setGroup;
            $query = $this->db_database3->query("SELECT SUBSTR(kodekab,1,2) as kodekab, propinsi, tblpropinsi.alamat, tblpropinsi.tlp, tblpropinsi.tahunpenilaian, COUNT(SUBSTR(kodekab,1,2)) as jumlah_kabupaten from tblkabupaten join tblpropinsi on SUBSTR(kodekab,1,2) = kodeprop group by kodeprop");
            return $query->result();
        } else {
            $this->setGroup;
            $query = $this->db_database3->query("SELECT propinsi, kabupaten, tblkabupaten.alamat, tblkabupaten.tlp, tblkabupaten.tglregistrasi from tblkabupaten join tblpropinsi on SUBSTR(kodekab,1,2) = kodeprop where SUBSTR(kodekab,1,2) = '$id' group by kodekab");
            return $query->result();
        }
    }

    function getRek() {
        // rekapitulasi
        $query1 = $this->db_database3->query("
            SELECT
            'ket' as 'belum menginput data',
            (select count(c.id) from tblkua as c) - count(a.tgl) as jml
            FROM
            tblnilaiinstrumen a
            INNER JOIN (SELECT max(id) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua) AS b ON a.id = b.id
            ");
        $query2 = $this->db_database3->query("
            SELECT
            year(a.tgl) as tahun,
            count(a.tgl) AS jml 
            FROM
            tblnilaiinstrumen a
            INNER JOIN (SELECT max(id) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua) AS b ON a.id = b.id
            GROUP BY
            YEAR(a.tgl)
            ");

        $result1 = $query1->result();
        $result2 = $query2->result();

        return array_merge($result1, $result2);

       //   $query = $this->db_database3->query("
       // SELECT YEAR
       // (a.tgl) AS tgl,
       // count(a.tgl) AS jml 
       // FROM
       // tblnilaiinstrumen a
       // INNER JOIN (SELECT max(id) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua) AS b ON a.id = b.id
       // GROUP BY
       // YEAR(a.tgl)
       // ");
       // return $query->result();

        // // tipologi sesuai chart
        // $query2 = $this->db_database3->query("SELECT a.tipokua,count(a.tipokua) as jml from tblnilaiinstrumen a inner join  (select  max(id) as id,kodekua from tblnilaiinstrumen group by kodekua) as b on a.kodekua = b.kodekua  and a.id = b.id  group by a.tipokua ");
        // // data status tanah
        // $query3 = $this->db_database3->query("SELECT a.statustanah, count(a.statustanah) as jml from tblnilaiinstrumen a inner join  (select  max(id) as id,kodekua from tblnilaiinstrumen group by kodekua) as b on  a.id = b.id  group by a.statustanah");
        // $query4 = $this->db_database3->query("SELECT a.* from tblnilaiinstrumen a inner join  (select  max(id) as id,kodekua from tblnilaiinstrumen group by kodekua) as b on a.kodekua = b.kodekua  and a.id = b.id  order by kodekua,tgl DESC");
        // return $query->result();
    }

    function getTip() {
        $query = $this->db_database3->query("SELECT a.tipokua,count(a.tipokua) as jml from tblnilaiinstrumen a inner join  (select  max(id) as id,kodekua from tblnilaiinstrumen group by kodekua) as b on a.kodekua = b.kodekua  and a.id = b.id  group by a.tipokua ");
        return $query->result();
    }

    function getsT() {
        $query = $this->db_database3->query("SELECT a.statustanah, count( a.statustanah ) AS jml, 
            CASE
            WHEN a.statustanah = 0 THEN
            'Tidak Mengisi Inputan' 
            WHEN a.statustanah = 1 THEN
            'Milik negara' 
            WHEN a.statustanah = 2 THEN
            'Milik pemda' 
            WHEN a.statustanah = 3 THEN
            'Sewa' 
            WHEN a.statustanah = 4 THEN
            'Menumpang' 
            WHEN a.statustanah = 5 THEN
            'Wakaf kua' 
            ELSE 'Wakaf non kua' 
            END AS keterangan
            FROM tblnilaiinstrumen a INNER JOIN ( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b ON a.id = b.id 
            GROUP BY a.statustanah");
        return $query->result();
    }

    function getkon()
    {
        $query2 = $this->db_database3->query("SELECT COUNT(SUBSTR(kodekua,1,2)) -  as jumlah_kua from tblkua join tblpropinsi on SUBSTR(kodekua,1,2) = kodeprop order by propinsi");
        return $query2->result();
    }

    function tampil_simkah()
    {
        $query2 = $this->db_database3->query("
            SELECT
            a.simkah,
            case
            when a.simkah = 0 then 'belum mengisi simkah'
            when a.simkah = 1 then 'versi desktop'
            when a.simkah = 2 then 'versi web'
            when a.simkah = 3 then 'belum menggunakan simkah'
            end as kategori,
            count( a.simkah ) AS jml 
            FROM
            tblnilaiinstrumen a
            INNER JOIN ( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b ON a.id = b.id 
            GROUP BY
            a.simkah
            ");
        return $query2->result();
    }

    function tampil_simkah_kat($id)
    {
        $query2 = $this->db_database3->query("
            SELECT
            a.kodekua,
            c.kua,
            d.kabupaten,
            case
            when a.simkah = 0 then 'belum mengisi simkah'
            when a.simkah = 1 then 'versi desktop'
            when a.simkah = 2 then 'versi web'
            when a.simkah = 3 then 'belum menggunakan simkah'
            end as keterangan,
            a.tgl
            FROM
            tblnilaiinstrumen a
            LEFT JOIN tblkua as c on a.kodekua = c.kodekua
            LEFT JOIN tblkabupaten as d on substr(c.kodekua,1,4) = d.kodekab
            INNER JOIN ( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b ON a.kodekua = b.kodekua 
            AND a.id = b.id 
            WHERE
            a.simkah = $id
            ORDER BY
            kodekua,
            tgl ASC
            ");
        return $query2->result();
    }

    function tampil_kankemenag()
    {
        $query2 = $this->db_database3->query("
            SELECT
            a.status,
            case
            when a.status = 0 then 'akun tidak aktif'
            when a.status = 1 then 'akun butuh approval'
            when a.status = 2 then 'akun aktif'
            end as kategori,
            count(case when a.status then 1 else 0 end) as jum
            FROM
            tblkabupaten as a
            -- WHERE
            -- a.kodekab != 0
            GROUP BY
            a.status
            ");
        return $query2->result();
    }

    function tampil_kankemenag_status($id)
    {
        $query2 = $this->db_database3->query("
            SELECT
            a.kodekab,
            a.kabupaten,
            a.email,
            a.alamat,
            a.tlp,
            case
            when a.status = 0 then 'akun tidak aktif'
            when a.status = 1 then 'akun butuh approval'
            when a.status = 2 then 'akun aktif'
            end as keterangan
            FROM
            tblkabupaten as a
            WHERE
            a.status = $id 
            GROUP BY
            a.id
            ");
        return $query2->result();
    }

    function tampil_regkua()
    {
        $query2 = $this->db_database3->query("
            SELECT
            a.status,
            case
            when a.status = 0 then 'akun tidak aktif'
            when a.status = 1 then 'akun butuh approval'
            when a.status = 2 then 'akun aktif'
            end as keterangan,
            count(a.status) as jml
            FROM
            tblkua as a
            GROUP BY
            a.status
            ");
        return $query2->result();
    }

    function tampil_regkua_status($id)
    {
        $query2 = $this->db_database3->query("
            SELECT
            a.kodekua,
            a.kua,
            a.kepala,
            a.alamat,
            a.tlp,
            case
            when a.status = 0 then 'akun tidak aktif'
            when a.status = 1 then 'akun butuh approval'
            when a.status = 2 then 'akun aktif'
            end as keterangan
            FROM
            tblkua as a
            WHERE
            a.status = $id
            GROUP BY
            a.id
            ");
        return $query2->result();
    }

    function tampil_validasi()
    {
        $query2 = $this->db_database3->query("
            SELECT
            substr(b.kodekua,1,2) as kodekua,
            a.propinsi,
            count(b.id) as dt_penilai,
            sum(case when b.`status` = 1 then 1 else 0 end) as dt_validasi,
            sum(case when b.`status` = 0 then 1 else 0 end) as dt_nonvalidasi,
            sum(case when b.jumlahpenghulu then b.jumlahpenghulu else 0 end) as dt_penghulu,
            sum(case when b.jumlahpegawai then b.jumlahpegawai else 0 end) as dt_pegawai,
            sum(case when b.jumlahpenduduk then b.jumlahpenduduk else 0 end) as dt_penduduk,
            sum(case when b.jumlahmuslim then b.jumlahmuslim else 0 end) as dt_muslim,
            sum(case when b.jumlahnikah then b.jumlahnikah else 0 end) as dt_nikah,
            sum(case when b.luastanah then b.luastanah else 0 end) as dt_luastanah,
            sum(case when b.performa1 then b.performa1 else 0 end) as dt_performa1,
            sum(case when b.performa2 then b.performa2 else 0 end) as dt_performa2,
            sum(case when b.performa3 then b.performa3 else 0 end) as dt_performa3,
            sum(case when b.performa4 then b.performa4 else 0 end) as dt_performa4
            FROM
            tblpropinsi as a
            LEFT JOIN tblnilai as b on a.kodeprop = substr(b.kodekua,1,2)
            WHERE
            a.kodeprop != 00
            GROUP BY
            a.kodeprop
            ");
        return $query2->result();
    }

    function tampil_validasi_thnkd($thn,$kd)
    {
        $query2 = $this->db_database3->query("
            SELECT
            b.kodekab,
            b.kabupaten,
            count(a.id) as dt_penilai,
            sum(case when a.`status` = 1 then 1 else 0 end) as dt_validasi,
            sum(case when a.`status` = 0 then 1 else 0 end) as dt_nonvalidasi,
            sum(case when a.jumlahpenghulu then a.jumlahpenghulu else 0 end) as dt_penghulu,
            sum(case when a.jumlahpegawai then a.jumlahpegawai else 0 end) as dt_pegawai,
            sum(case when a.jumlahpenduduk then a.jumlahpenduduk else 0 end) as dt_penduduk,
            sum(case when a.jumlahmuslim then a.jumlahmuslim else 0 end) as dt_muslim,
            sum(case when a.jumlahnikah then a.jumlahnikah else 0 end) as dt_nikah,
            sum(case when a.luastanah then a.luastanah else 0 end) as dt_luastanah,
            sum(case when a.performa1 then a.performa1 else 0 end) as dt_performa1,
            sum(case when a.performa2 then a.performa2 else 0 end) as dt_performa2,
            sum(case when a.performa3 then a.performa3 else 0 end) as dt_performa3,
            sum(case when a.performa4 then a.performa4 else 0 end) as dt_performa4,
            a.tahun
            FROM
            tblnilai as a
            LEFT JOIN tblkabupaten as b on substr(a.kodekua,1,4) = b.kodekab
            WHERE
            substr(a.kodekua,1,2) = $kd and a.tahun = $thn and b.kodekab != 'Kode'
            GROUP BY
            b.kodekab
            ");
        return $query2->result();
    }

    function tampil_validasi_kab($thn,$kab)
    {
        $query2 = $this->db_database3->query("
            SELECT
            a.id,
            a.kodekua,
            a.kua,
            b.kepala,
            a.tgl,
            case
            when a.`status` = 1 then 'Validasi pusat'
            when a.`status` = 0 then 'Novalidasi pusat'
            end as status,
            a.jumlahpenghulu as dt_penghulu,
            a.jumlahpegawai as dt_pegawai,
            a.jumlahpenduduk as dt_penduduk,
            a.jumlahmuslim as dt_muslim,
            a.jumlahnikah as dt_nikah,
            a.luastanah as dt_luastanah,
            a.performa1 as dt_performa1,
            a.performa2 as dt_performa2,
            a.performa3 as dt_performa3,
            a.performa4 as dt_performa4,
            a.tahun
            FROM
            tblnilai as a
            LEFT JOIN tblkua as b on a.kodekua = b.kodekua
            LEFT JOIN tblkabupaten as c on substr(a.kodekua,1,4) = c.kodekab and substr(b.kodekua,1,4) = c.kodekab
            WHERE
            a.tahun = $thn and c.kodekab = $kab
            GROUP BY
            a.id
            ");
        return $query2->result();  
    }

    function tampil_validasi_detail($thn,$id)
    {
        $query2 = $this->db_database3->query("
            SELECT
            a.`status`,
            a.tahun,
            a.kodekua
            FROM
            tblnilai as a
            LEFT JOIN tblkua as b on a.kodekua = b.kodekua
            WHERE
            a.id = $id and a.tahun = $thn
            GROUP BY
            a.id
            ");
        return $query2->result();
    }

    function tampil_validasi_thn($thn)
    {
        $query2 = $this->db_database3->query("
            SELECT
            substr(b.kodekua,1,2) as kodekua,
            a.propinsi,
            count(b.id) as dt_penilai,
            sum(case when b.`status` = 1 then 1 else 0 end) as dt_validasi,
            sum(case when b.`status` = 0 then 1 else 0 end) as dt_nonvalidasi,
            sum(case when b.jumlahpenghulu then b.jumlahpenghulu else 0 end) as dt_penghulu,
            sum(case when b.jumlahpegawai then b.jumlahpegawai else 0 end) as dt_pegawai,
            sum(case when b.jumlahpenduduk then b.jumlahpenduduk else 0 end) as dt_penduduk,
            sum(case when b.jumlahmuslim then b.jumlahmuslim else 0 end) as dt_muslim,
            sum(case when b.jumlahnikah then b.jumlahnikah else 0 end) as dt_nikah,
            sum(case when b.luastanah then b.luastanah else 0 end) as dt_luastanah,
            sum(case when b.performa1 then b.performa1 else 0 end) as dt_performa1,
            sum(case when b.performa2 then b.performa2 else 0 end) as dt_performa2,
            sum(case when b.performa3 then b.performa3 else 0 end) as dt_performa3,
            sum(case when b.performa4 then b.performa4 else 0 end) as dt_performa4,
            b.tahun
            FROM
            tblpropinsi as a
            LEFT JOIN tblnilai as b on a.kodeprop = substr(b.kodekua,1,2)
            WHERE
            b.tahun = $thn
            GROUP BY
            a.kodeprop
            ");
        return $query2->result();
    }

    public function tampil_tahun()
    {
        $query2 = $this->db_database3->query("
            SELECT
            a.tahun,
            count(a.id) as jum
            FROM
            tblnilai as a
            LEFT JOIN tblpropinsi as b on b.kodeprop = substr(a.kodekua,1,2)
            WHERE
            b.kodeprop != 00
            GROUP BY
            a.tahun
            ");
        return $query2->result();
    }

    public function tampil_pertahun($thnnilai)
    {
        $query2 = $this->db_database3->query("
            SELECT
            substr(b.kodekua,1,2) as kodekua,
            a.propinsi,
            count(b.id) as dt_penilai,
            sum(case when b.`status` = 1 then 1 else 0 end) as dt_validasi,
            sum(case when b.`status` = 0 then 1 else 0 end) as dt_nonvalidasi,
            sum(case when b.jumlahpenghulu then b.jumlahpenghulu else 0 end) as dt_penghulu,
            sum(case when b.jumlahpegawai then b.jumlahpegawai else 0 end) as dt_pegawai,
            sum(case when b.jumlahpenduduk then b.jumlahpenduduk else 0 end) as dt_penduduk,
            sum(case when b.jumlahmuslim then b.jumlahmuslim else 0 end) as dt_muslim,
            sum(case when b.jumlahnikah then b.jumlahnikah else 0 end) as dt_nikah,
            sum(case when b.luastanah then b.luastanah else 0 end) as dt_luastanah,
            sum(case when b.performa1 then b.performa1 else 0 end) as dt_performa1,
            sum(case when b.performa2 then b.performa2 else 0 end) as dt_performa2,
            sum(case when b.performa3 then b.performa3 else 0 end) as dt_performa3,
            sum(case when b.performa4 then b.performa4 else 0 end) as dt_performa4,
            b.tahun
            FROM
            tblpropinsi as a
            LEFT JOIN tblnilai as b on a.kodeprop = substr(b.kodekua,1,2)
            WHERE
            b.tahun = $thnnilai and a.kodeprop != 00
            GROUP BY
            a.kodeprop
            ");
        return $query2->result();
    }

    public function tampil_kabkua($thnnilai,$kuakode)
    {
        $query2 = $this->db_database3->query("
            SELECT
            b.kodekab,
            b.kabupaten,
            count(a.id) as dt_penilai,
            sum(case when a.`status` = 1 then 1 else 0 end) as dt_validasi,
            sum(case when a.`status` = 0 then 1 else 0 end) as dt_nonvalidasi,
            sum(case when a.jumlahpenghulu then a.jumlahpenghulu else 0 end) as dt_penghulu,
            sum(case when a.jumlahpegawai then a.jumlahpegawai else 0 end) as dt_pegawai,
            sum(case when a.jumlahpenduduk then a.jumlahpenduduk else 0 end) as dt_penduduk,
            sum(case when a.jumlahmuslim then a.jumlahmuslim else 0 end) as dt_muslim,
            sum(case when a.jumlahnikah then a.jumlahnikah else 0 end) as dt_nikah,
            sum(case when a.luastanah then a.luastanah else 0 end) as dt_luastanah,
            sum(case when a.performa1 then a.performa1 else 0 end) as dt_performa1,
            sum(case when a.performa2 then a.performa2 else 0 end) as dt_performa2,
            sum(case when a.performa3 then a.performa3 else 0 end) as dt_performa3,
            sum(case when a.performa4 then a.performa4 else 0 end) as dt_performa4
            FROM
            tblnilai as a
            LEFT JOIN tblkabupaten as b on substr(a.kodekua,1,4) = b.kodekab
            WHERE
            substr(a.kodekua,1,2) = $kuakode and a.tahun = $thnnilai and b.kodekab != 'Kode'
            GROUP BY
            b.kodekab
            ");
        return $query2->result();
    }

    public function tampil_kuadetail($thnnilai,$kabkode)
    {
        $query2 = $this->db_database3->query("
            SELECT
            a.id,
            a.kodekua,
            a.kua,
            b.kepala,
            a.tgl,
            case
            when a.`status` = 1 then 'Validasi pusat'
            when a.`status` = 0 then 'Novalidasi pusat'
            end as status,
            a.jumlahpenghulu as dt_penghulu,
            a.jumlahpegawai as dt_pegawai,
            a.jumlahpenduduk as dt_penduduk,
            a.jumlahmuslim as dt_muslim,
            a.jumlahnikah as dt_nikah,
            a.luastanah as dt_luastanah,
            a.performa1 as dt_performa1,
            a.performa2 as dt_performa2,
            a.performa3 as dt_performa3,
            a.performa4 as dt_performa4
            FROM
            tblnilai as a
            LEFT JOIN tblkua as b on a.kodekua = b.kodekua
            LEFT JOIN tblkabupaten as c on substr(a.kodekua,1,4) = c.kodekab and substr(b.kodekua,1,4) = c.kodekab
            WHERE
            a.tahun = $thnnilai and c.kodekab = $kabkode
            GROUP BY
            a.id
            ");
        return $query2->result();
    }

    public function Getnilai() {
        //===============================bodo===================================
        $exec = $this->db_database3->select('tblnilai.tahun,COUNT( tblnilai.tahun ) AS jumlah ')
        ->from('tblnilai')
        ->group_by('tblnilai.tahun')
        ->get()
        ->result();
        return $exec;
        //===============================bodo===================================
    }

    public function Getrekap() {
        //===============================bodo===================================
        $a = $this->db_database3->select('COUNT( a.id ) AS jumlah,"Sudah Input Data" AS kategori')
        ->from('tblnilaiinstrumen a')
        ->join('( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b', 'a.kodekua = b.kodekua AND a.id = b.id', 'INNER')
        ->get()
        ->result();
        $b = $this->db_database3->select('"Belum Input Data" AS kategori,COUNT(tblkua.id) - ' . $a[0]->jumlah . ' AS jumlah')
        ->from('tblkua')
        ->get()
        ->result();
        $exec = array_merge($a, $b);
        return $exec;
        //===============================bodo===================================
    }

    public function Getisian() {
        //===============================bodo===================================
        $a = $this->db_database3->select('YEAR ( a.tgl ) AS tahun,count( a.tgl ) AS jumlah')
        ->from('tblnilaiinstrumen a')
        ->join('( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b', 'a.id = b.id ', 'INNER')
        ->group_by('YEAR (a.tgl)')
        ->get()
        ->result();
        return $a;
        //===============================bodo===================================
    }

    public function Tipokua($tipokua) {
        //===============================bodo===================================
        $a = $this->db_database3->select('tblkua.kodekua,
         tblkua.kua,
         tblkua.alamat,
         tblkabupaten.kabupaten,
         a.tipokua,
         a.tgl,a.id')
        ->from('tblnilaiinstrumen AS a')
        ->join('( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b', 'a.kodekua = b.kodekua AND a.id = b.id', 'INNER')
        ->join('tblkua', 'a.kodekua = tblkua.kodekua', 'LEFT')
        ->join('tblkabupaten', 'SUBSTR( tblkua.kodekua, 1, 4 ) = tblkabupaten.kodekab ', 'LEFT')
        ->where('a.tipokua', $tipokua)
        ->order_by('a.kodekua ASC, a.tgl ASC')
        ->get()
        ->result();
        return $a;
        //===============================bodo===================================
    }

    public function Stat_bangunan() {
        //===============================bodo===================================
        $a = $this->db_database3->select('CASE a.`status` WHEN 0 THEN "Tidak Mengisi Inputan" WHEN 1 THEN "Milik Negara" WHEN 2 THEN "Milik Pemda" WHEN 3 THEN "Sewa" WHEN 4 THEN "Menumpang" WHEN 5 THEN "Wakaf untuk KUA" ELSE "Wakaf Non Untuk KUA" END AS kategori', false)
        ->select('count( a.STATUS ) AS jumlah, a.`status` AS stat')
        ->from('tblnilaiinstrumen a')
        ->join('( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b', 'a.id = b.id', 'INNER')
        ->group_by('a.`status`', false)
        ->get()
        ->result();
        return $a;
        //===============================bodo===================================
    }

    public function Statbangunan($id) {
        //===============================bodo===================================
        $a = $this->db_database3->select('tblkua.kodekua,
         tblkua.kua,
         tblkua.alamat,
         tblkabupaten.kabupaten,
         a.tipokua,
         a.tgl,a.id')
        ->from('tblnilaiinstrumen AS a')
        ->join('( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b', 'a.kodekua = b.kodekua AND a.id = b.id', 'INNER')
        ->join('tblkua', 'a.kodekua = tblkua.kodekua', 'LEFT')
        ->join('tblkabupaten', 'SUBSTR( tblkua.kodekua, 1, 4 ) = tblkabupaten.kodekab ', 'LEFT')
        ->where('`a`.`status`', $id, false)
        ->order_by('a.kodekua ASC, a.tgl ASC')
        ->get()
        ->result();
        return $a;
        //===============================bodo===================================
    }

    public function Stat_tanah($statustanah) {
        //===============================bodo===================================
        $a = $this->db_database3->select('tblkua.kodekua,
         tblkua.kua,
         tblkua.alamat,
         tblkabupaten.kabupaten,
         a.tipokua,
         a.tgl,a.id')
        ->from('tblnilaiinstrumen AS a')
        ->join('( SELECT max( id ) AS id, kodekua FROM tblnilaiinstrumen GROUP BY kodekua ) AS b', 'a.kodekua = b.kodekua AND a.id = b.id', 'INNER')
        ->join('tblkua', 'a.kodekua = tblkua.kodekua', 'LEFT')
        ->join('tblkabupaten', 'SUBSTR( tblkua.kodekua, 1, 4 ) = tblkabupaten.kodekab ', 'LEFT')
        ->where('a.statustanah', $statustanah)
        ->order_by('a.kodekua ASC, a.tgl ASC')
        ->get()
        ->result();
        return $a;
        //===============================bodo===================================
    }

}
