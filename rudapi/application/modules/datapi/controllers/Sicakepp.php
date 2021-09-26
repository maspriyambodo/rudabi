<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/REST_Controller.php';
//require APPPATH . '/libraries/Format.php';

class Sicakepp extends REST_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Sicakepp_m', 'em');
		$this->db_database9 = $this->load->database('database9', TRUE);
		$this->responseBad = $this->set_response(['status'=> FALSE, 'message'=>'Maaf, data belum tersedia'], REST_Controller::HTTP_NOT_FOUND);
		// $this->methods['index_get']['limit'] = $this->angka->nilai(); // dalam 1 jam
		// $this->methods['pensiun_get']['limit'] = $this->angka->nilai(); // dalam 1 jam
		// $this->methods['golongan_get']['limit'] = $this->angka->nilai(); // dalam 1 jam
		// $this->methods['skptahunan_get']['limit'] = $this->angka->nilai(); // dalam 1 jam
		// // $this->methods['skptahunan_put']['limit'] = $this->angka->nilai(); // dalam 1 jam
		// $this->methods['skptahun_get']['limit'] = $this->angka->nilai(); // dalam 1 jam
		// $this->methods['skpbulanan_get']['limit'] = $this->angka->nilai(); // dalam 1 jam
		// $this->methods['tahunbulan_get']['limit'] = $this->angka->nilai(); // dalam 1 jam
	}

	// Menghitung totalan data ----------------------------------------------------------------

	function total_get()
	{
		$datas = array(
			$this->em->get_totalan_dtpegawais(),
			$this->em->get_totalan_dtpensiuns(),
			$this->em->get_totalan_laki(),
			$this->em->get_totalan_perempuan(),
			$this->em->get_totalan_agama(),
			$this->em->get_totalan_gol1(),
			$this->em->get_totalan_gol3(),
			$this->em->get_totalan_gol4()
		);

		if(!empty($datas)){
			$this->response($datas, REST_Controller::HTTP_OK);
		}else{
			$this->responseNon;
		}	
	}

	// Menghitung totalan data ----------------------------------------------------------------

	function index_get()
	{
		$propinsi = $this->get('peg_provinsi');
		$kabkot = $this->get('peg_kabupaten');
		$detail = $this->get('peg_id');
		$dt_ortu = $this->get('ortu_peg_id');
		$dt_saudara = $this->get('sdr_peg_id');
		$dt_mertua = $this->get('mert_peg_id');
		$dt_pasangan = $this->get('psg_peg_id');
		$dt_anak = $this->get('anak_peg_id');
		$dt_pendidikan = $this->get('pdd_peg_id');
		$dt_kampus = $this->get('kmps_peg_id');
		$dt_slta = $this->get('slta_peg_id');
		$dt_kursus = $this->get('kur_peg_id');
		$dt_ngajar = $this->get('ngjr_peg_id');
		$dt_abmas = $this->get('abmas_peg_id');
		$dt_bimas = $this->get('bimas_peg_id');
		$dt_buku = $this->get('buku_peg_id');
		$dt_makalah = $this->get('mkl_peg_id');
		$dt_resensi = $this->get('res_peg_id');
		$dt_jabatan = $this->get('jbt_peg_id');
		$dt_kepangkatan = $this->get('pkt_peg_id');
		$dt_kgb = $this->get('kgb_peg_id');
		$dt_kunjungan = $this->get('ln_peg_id');
		$dt_nomor = $this->get('nmr_peg_id');
		$dt_penelitian = $this->get('pen_peg_id');
		$dt_seminar = $this->get('smnr_peg_id');
		$dt_tandajasa = $this->get('tnj_peg_id');
		$dt_file = $this->get('file_peg_id');

		if($propinsi){
			$pgw = $this->em->get_pegawai_prop($propinsi);
		}else if($kabkot){
			$pgw = $this->em->get_pegawai_kab($kabkot);
		}else if($detail){
			$pgw = $this->em->get_pegawai_det($detail);
		}else if($dt_ortu){
			$pgw = $this->em->get_pegawai_ortu($dt_ortu);
		}else if($dt_saudara){
			$pgw = $this->em->get_pegawai_saudara($dt_saudara);
		}else if($dt_mertua){
			$pgw = $this->em->get_pegawai_mertua($dt_mertua);
		}else if($dt_pasangan){
			$pgw = $this->em->get_pegawai_pasangan($dt_pasangan);
		}else if($dt_anak){
			$pgw = $this->em->get_pegawai_anak($dt_anak);
		}else if($dt_pendidikan){
			$pgw = $this->em->get_pegawai_pendidikan($dt_pendidikan);
		}else if($dt_kampus){
			$pgw = $this->em->get_pegawai_kampus($dt_kampus);
		}else if($dt_slta){
			$pgw = $this->em->get_pegawai_slta($dt_slta);
		}else if($dt_kursus){
			$pgw = $this->em->get_pegawai_kursus($dt_kursus);
		}else if($dt_ngajar){
			$pgw = $this->em->get_pegawai_ngajar($dt_ngajar);
		}else if($dt_abmas){
			$pgw = $this->em->get_pegawai_abmas($dt_abmas);
		}else if($dt_bimas){
			$pgw = $this->em->get_pegawai_bimas($dt_bimas);
		}else if($dt_buku){
			$pgw = $this->em->get_pegawai_buku($dt_buku);
		}else if($dt_makalah){
			$pgw = $this->em->get_pegawai_makalah($dt_makalah);
		}else if($dt_resensi){
			$pgw = $this->em->get_pegawai_resensi($dt_resensi);
		}else if($dt_jabatan){
			$pgw = $this->em->get_pegawai_jabatan($dt_jabatan);
		}else if($dt_kepangkatan){
			$pgw = $this->em->get_pegawai_kepangkatan($dt_kepangkatan);
		}else if($dt_kgb){
			$pgw = $this->em->get_pegawai_kgb($dt_kgb);
		}else if($dt_kunjungan){
			$pgw = $this->em->get_pegawai_kunjungan($dt_kunjungan);
		}else if($dt_nomor){
			$pgw = $this->em->get_pegawai_nomor($dt_nomor);
		}else if($dt_penelitian){
			$pgw = $this->em->get_pegawai_penelitian($dt_penelitian);
		}else if($dt_seminar){
			$pgw = $this->em->get_pegawai_seminar($dt_seminar);
		}else if($dt_tandajasa){
			$pgw = $this->em->get_pegawai_tandajasa($dt_tandajasa);
		}else if($dt_file){
			$pgw = $this->em->get_pegawai_file($dt_file);
		}else{
			$pgw = $this->em->get_pegawai();
		}

		if($pgw){
			$this->response($pgw, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function pensiun_get()
	{
		$propinsi = $this->get('peg_provinsi');
		$kabkot = $this->get('kab_id');
		$golIa = $this->get('item_id');
		$golIb = $this->get('item_id');
		$golIc = $this->get('item_id');
		$golId = $this->get('item_id');
		$golIIa = $this->get('item_id');
		$golIIb = $this->get('item_id');
		$golIIc = $this->get('item_id');
		$golIId = $this->get('item_id');
		$golIIIa = $this->get('item_id');
		$golIIIb = $this->get('item_id');
		$golIIIc = $this->get('item_id');
		$golIIId = $this->get('item_id');
		$golIVa = $this->get('item_id');
		$golIVb = $this->get('item_id');
		$golIVc = $this->get('item_id');
		$golIVd = $this->get('item_id');
		$golIVe = $this->get('item_id');

		if(!empty($kabkot) && !empty($golIa))
		{
			$pnsn = $this->em->get_pensiun_golIa($kabkot, $golIa);
		}else if(!empty($kabkot) && !empty($golIb)){
			$pnsn = $this->em->get_pensiun_golIb($kabkot, $golIb);
		}else if(!empty($kabkot) && !empty($golIc)){
			$pnsn = $this->em->get_pensiun_golIc($kabkot, $golIc);
		}else if(!empty($kabkot) && !empty($golId)){
			$pnsn = $this->em->get_pensiun_golId($kabkot, $golId);
		}else if(!empty($kabkot) && !empty($golIIa)){
			$pnsn = $this->em->get_pensiun_golIIa($kabkot, $golIIa);
		}else if(!empty($kabkot) && !empty($golIIb)){
			$pnsn = $this->em->get_pensiun_golIIb($kabkot, $golIIb);
		}else if(!empty($kabkot) && !empty($golIIc)){
			$pnsn = $this->em->get_pensiun_golIIc($kabkot, $golIIc);
		}else if(!empty($kabkot) && !empty($golIId)){
			$pnsn = $this->em->get_pensiun_golIId($kabkot, $golIId);
		}else if(!empty($kabkot) && !empty($golIIIa)){
			$pnsn = $this->em->get_pensiun_golIIIa($kabkot, $golIIIa);
		}else if(!empty($kabkot) && !empty($golIIIb)){
			$pnsn = $this->em->get_pensiun_golIIIb($kabkot, $golIIIb);
		}else if(!empty($kabkot) && !empty($golIIIc)){
			$pnsn = $this->em->get_pensiun_golIIIc($kabkot, $golIIIc);
		}else if(!empty($kabkot) && !empty($golIIId)){
			$pnsn = $this->em->get_pensiun_golIIId($kabkot, $golIIId);
		}else if(!empty($kabkot) && !empty($golIVa)){
			$pnsn = $this->em->get_pensiun_golIVa($kabkot, $golIVa);
		}else if(!empty($kabkot) && !empty($golIVb)){
			$pnsn = $this->em->get_pensiun_golIVb($kabkot, $golIVb);
		}else if(!empty($kabkot) && !empty($golIVc)){
			$pnsn = $this->em->get_pensiun_golIVc($kabkot, $golIVc);
		}else if(!empty($kabkot) && !empty($golIVd)){
			$pnsn = $this->em->get_pensiun_golIVd($kabkot, $golIVd);
		}else if(!empty($kabkot) && !empty($golIVe)){
			$pnsn = $this->em->get_pensiun_golIVe($kabkot, $golIVe);
		}else if($propinsi){
			$pnsn = $this->em->get_pensiun_prop($propinsi);
		}else if($kabkot){
			$pnsn = $this->em->get_pensiun_kabkot($kabkot);
		}else{
			$pnsn = $this->em->get_pensiun();
		}

		if($pnsn){
			$this->response($pnsn, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function golongan_get()
	{
		$gol = $this->em->get_golongan();

		if(!empty($gol))
		{
			$this->response($gol, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function skptahunan_get()
	{
		$thn = $this->get('skp_tahun');

		if(!empty($thn))
		{
			$skptahun = $this->em->get_skp_pertahun($thn);
		}else{
			$skptahun = $this->em->get_skptahun();
		}

		if(!empty($skptahun))
		{
			$this->response($skptahun, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function skptahun_get()
	{
		$skp = $this->em->get_tahun();

		if(!empty($skp))
		{
			$this->response($skp, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function skpbulanan_get()
	{
		$item = $this->get('item_id');
		$thn = $this->get('keg_date');

		if(!empty($thn))
		{
			$skpb = $this->em->get_perbulan($thn);
		}else{
			$skpb = $this->em->get_skpbulan();
		}

		if(!empty($skpb))
		{
			$this->response($skpb, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

	function tahunbulan_get()
	{
		$thnbln = $this->em->get_tahunbulan();

		if(!empty($thnbln))
		{
			$this->response($thnbln, REST_Controller::HTTP_OK);
		}else{
			$this->responseBad;
		}
	}

}