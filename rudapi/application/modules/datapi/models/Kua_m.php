<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kua_m extends CI_Model
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

    function getKua($id = null)
    {
      if($id === null){
        $this->setGroup;
        $this->db_database2->select('province_id, province_title, COUNT(kua_id) as jumlah_kua');
        $this->db_database2->from('iapi_province');
        $this->db_database2->join('master_kua', 'master_kua.kua_province_id = iapi_province.province_id');
        $this->db_database2->group_by('province_id');
        return $this->db_database2->get()->result_array();

      }else{
        $this->setGroup;
        $query = $this->db_database2
           ->select('city_title, COUNT(kua_id) as jumlah_kua')
           ->select('(select COUNT(iapi_pegawai.pegawai_id) from iapi_pegawai where pegawai_city = kua_city_id) as jumlah_penghulu')

           ->select('(select COUNT(iapi_pegawai.pegawai_kategory_penghulu) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND pegawai_kategory_penghulu = 1 AND is_trash != 1) as jumlah_muda')

           //->select('(select COUNT(iapi_pegawai.pegawai_kategory_penghulu) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND pegawai_kategory_penghulu = 2 AND is_trash != 1) as jumlah_madya')

           //->select('(select COUNT(iapi_pegawai.pegawai_kategory_penghulu) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND pegawai_kategory_penghulu = 3 AND is_trash != 1) as jumlah_pratama')

           //->select('(select COUNT(iapi_pegawai.pegawai_kategory_penghulu) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND pegawai_kategory_penghulu = 4 AND is_trash != 1) as jumlah_utama')

           ->select("(select COUNT(iapi_pegawai.pegawai_pangkat) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pangkat = 'III/a') as jumlah_IIIa")

           // ->select("(select COUNT(iapi_pegawai.pegawai_pangkat) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pangkat = 'III/b') as jumlah_IIIb")

           // ->select("(select COUNT(iapi_pegawai.pegawai_pangkat) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pangkat = 'III/c') as jumlah_IIIc")

           // ->select("(select COUNT(iapi_pegawai.pegawai_pangkat) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pangkat = 'III/d') as jumlah_IIId")

           // ->select("(select COUNT(iapi_pegawai.pegawai_pangkat) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pangkat = 'IV/a') as jumlah_IVa")

           // ->select("(select COUNT(iapi_pegawai.pegawai_pangkat) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pangkat = 'IV/b') as jumlah_IVb")

           // ->select("(select COUNT(iapi_pegawai.pegawai_pangkat) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pangkat = 'IV/c') as jumlah_IVc")

           // ->select("(select COUNT(iapi_pegawai.pegawai_pangkat) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pangkat = 'IV/d') as jumlah_IVd")

           // ->select("(select COUNT(iapi_pegawai.pegawai_pangkat) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pangkat = 'IV/e') as jumlah_IVe")

           ->select("(select COUNT(iapi_pegawai.pegawai_pendidikan_terakhir) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pendidikan_terakhir = 'S1') as jumlah_S1")

           ->select("(select COUNT(iapi_pegawai.pegawai_pendidikan_terakhir) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pendidikan_terakhir = 'S2') as jumlah_S2")

           ->select("(select COUNT(iapi_pegawai.pegawai_pendidikan_terakhir) from iapi_pegawai where pegawai_city = kua_city_id AND pegawai_status = 1 AND is_trash != 1 AND pegawai_pendidikan_terakhir = 'S3') as jumlah_S3")


           ->from('master_kua')
           ->join('iapi_city', 'iapi_city.city_id = master_kua.kua_city_id')
           ->join('iapi_province', 'iapi_province.province_id = master_kua.kua_province_id')
           ->where('province_id', $id)
           ->group_by('city_id')
           ->get()
           ->result_array();

        //$this->db_database2->where('province_id', $id);
        return $query;
      }
    }

    function getProp($id = null)
    {
      if($id === null){
        $this->setGroup;
        $this->db_database2->select('iapi_province.province_id, iapi_province.province_title as propinsi');
        $this->db_database2->from('iapi_province');
        $this->db_database2->join('iapi_city', 'iapi_city.city_province = iapi_province.province_id');
        $this->db_database2->group_by('province_title');
        return $this->db_database2->get()->result_array();
      }else{
        $this->setGroup;
        $this->db_database2->select('iapi_province.province_id, iapi_province.province_title as provinsi, city_title');
        $this->db_database2->from('iapi_province');
        $this->db_database2->join('iapi_city', 'iapi_city.city_province = iapi_province.province_id');
        $this->db_database2->group_by('city_title');
        $this->db_database2->where('province_id', $id);
        return $this->db_database2->get()->result_array();
      }
    }

    function getKab($id = null)
    {
        if($id === null){
        $this->setGroup;
        $this->db_database2->select('iapi_city.city_id, iapi_city.city_title as kabupaten');
        $this->db_database2->from('iapi_province');
        $this->db_database2->join('iapi_city', 'iapi_city.city_province = iapi_province.province_id');
        $this->db_database2->group_by('city_title');
        return $this->db_database2->get()->result_array();
      }else{
        $this->setGroup;
        $this->db_database2->select('iapi_city.city_id, iapi_city.city_title as kabupaten, iapi_province.province_title as propinsi');
        $this->db_database2->from('iapi_province');
        $this->db_database2->join('iapi_city', 'iapi_city.city_province = iapi_province.province_id');
        $this->db_database2->group_by('city_title');
        $this->db_database2->where('city_id', $id);
        return $this->db_database2->get()->row();
      }
    }

    function getNP()
    {
        $this->setGroup;
        $this->db_database2->select('COUNT(nikah_status) as jumlah_nikah, province_title');
        $this->db_database2->from('master_nikah');
        $this->db_database2->join('iapi_province', 'iapi_province.province_id = master_nikah.nikah_province_id');
        $this->db_database2->group_by('province_title');
        return $this->db_database2->get()->result();
    }

    function getNK()
    {
        $this->setGroup;
        $this->db_database2->select('COUNT(nikah_status) as jumlah_nikah, city_title');
        $this->db_database2->from('master_nikah');
        $this->db_database2->join('iapi_city', 'iapi_city.city_id = master_nikah.nikah_city_id');
        $this->db_database2->group_by('city_title');
        return $this->db_database2->get()->result();
    }

    function getNKK()
    {
        $this->setGroup;
        $this->db_database2->select('COUNT(nikah_status) as jumlah, kua_title');
        $this->db_database2->from('master_nikah');
        $this->db_database2->join('master_kua', 'master_kua.kua_id = master_nikah.nikah_kua_id');
        $this->db_database2->group_by('kua_title');
        return $this->db_database2->get()->result();
    }
}