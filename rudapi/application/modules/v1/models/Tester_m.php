<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tester_m extends CI_Model
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

    function getKua($id, $id2)
    {
      if($id == 'province_id'){
        //
        $query = $this->db_database2->query("SELECT city_id, province_title, city_title FROM iapi_province LEFT JOIN iapi_city ON iapi_province.province_id = iapi_city.city_province WHERE iapi_province.province_id = '$id'");
        return $query->result_array();
      }else if($id2 == 'city_id'){
        //
        $query = $this->db_database2->query("SELECT city_id, city_title FROM iapi_city WHERE iapi_city.city_id = '$id2'");
        return $query->result();
      }else{
        //
        $query = $this->db_database2->query("SELECT province_id, province_title FROM iapi_province");
        return $query->result_array();
      }

      // if(empty($id)){
      //   //tampil semua
      //   $query = $this->db_database2->query("SELECT province_id, province_title FROM iapi_province");
      //   return $query->result_array();

      // }else if($id){
      //   //province_id
      //   $query = $this->db_database2->query("SELECT city_id, province_title, city_title FROM iapi_province LEFT JOIN iapi_city ON iapi_province.province_id = iapi_city.city_province WHERE iapi_province.province_id = '$id'");
      //   //->join("iapi_province", "iapi_city, iapi_city.city_province = iapi_province.province_id");
      //   return $query->result();

      // }else{
      //   //
      //   $query = $this->db_database2->query("SELECT city_id, city_title FROM iapi_city WHERE city_id = $id2");
      //   // ->join("iapi_province", "iapi_city, iapi_city.city_province = iapi_province.province_id")
      //   // ->join("iapi_city", "iapi_city.");
      //   return $query->result();
      // }
    }

    function getKua2($id2)
    {
        $id2 = $this->get('city_id');
        if($id2 == TRUE)
        {
          $this->db_database2->select('city_id, city_title');
        $this->db_database2->from('iapi_city');
        $this->db_database2->group_by('city_id');
        $this->db_database2->where('city_id', $id2);
        return $this->db_database2->get()->result_array();
        }else{
          's';
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