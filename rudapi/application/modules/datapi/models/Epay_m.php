<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Epay_m extends CI_Model {

	// ----------------------------------------  Data Daerah simas
   function __construct(){
      parent::__construct();
      $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
   }

   // Menghitung total query rudabi ------------------------------------------------------------

   function get_total_penyuluh()
   {
      $query = $this->db_database5->query("
        SELECT
            COUNT( CASE WHEN epai_master_penyuluh.penyuluh_Provinsi_Kode = 'AC' THEN 'AC' ELSE 0 END ) AS jumlah_penyuluh
          FROM
            epai_master_provinsi
            INNER JOIN epai_master_penyuluh ON epai_master_provinsi.provinsi_kode = epai_master_penyuluh.penyuluh_Provinsi_Kode 
            INNER JOIN epai_master_kabkota ON epai_master_penyuluh.penyuluh_KabKota_Kode = epai_master_kabkota.kabkota_kode
          WHERE
            epai_master_penyuluh.penyuluh_Status = 1
        ");
      return $query->row();
   }

   function get_total_penyuluhnew()
   {
    $query = $this->db_database5->query("
      SELECT
            COUNT( CASE WHEN epai_master_penyuluh.penyuluh_Provinsi_Kode = 'AC' THEN 'AC' ELSE 0 END ) AS penyuluh
          FROM
            epai_master_provinsi
            INNER JOIN epai_master_penyuluh ON epai_master_provinsi.provinsi_kode = epai_master_penyuluh.penyuluh_Provinsi_Kode 
            INNER JOIN epai_master_kabkota ON epai_master_penyuluh.penyuluh_KabKota_Kode = epai_master_kabkota.kabkota_kode
          WHERE
            epai_master_penyuluh.penyuluh_Status = 1
      ");
    return $query->row();
   }

   // Menghitung total query rudabi ------------------------------------------------------------

   function get_provinsi($id = null)
   {
      if($id === null){
          $this->setGroup;
          $query = $this->db_database5->query("
          SELECT
            epai_master_provinsi.provinsi_kode,
            epai_master_provinsi.provinsi_nama,
            ( SELECT COUNT( epai_master_kabkota.kabkota_kode ) FROM epai_master_kabkota WHERE SUBSTR( epai_master_kabkota.kabkota_kode, 1, 2 ) = epai_master_provinsi.provinsi_kode ) AS jumlah_kabkot,
            COUNT( CASE WHEN epai_master_penyuluh.penyuluh_Provinsi_Kode = 'AC' THEN 'AC' ELSE 0 END ) AS jumlah_penyuluh,
          ( SELECT COUNT( epai_master_penyuluh.penyuluh_ID ) FROM epai_master_penyuluh WHERE epai_master_penyuluh.penyuluh_StatusOnline = 1 AND epai_master_penyuluh.penyuluh_Provinsi_Kode = epai_master_provinsi.provinsi_kode ) AS jumlah_penyuluh_online  
          FROM
            epai_master_provinsi
            INNER JOIN epai_master_penyuluh ON epai_master_provinsi.provinsi_kode = epai_master_penyuluh.penyuluh_Provinsi_Kode 
            INNER JOIN epai_master_kabkota ON epai_master_penyuluh.penyuluh_KabKota_Kode = epai_master_kabkota.kabkota_kode
          WHERE
            epai_master_penyuluh.penyuluh_Status = 1 
          GROUP BY
            epai_master_provinsi.provinsi_kode
            ");
          return $query->result();
      }else{
         $query = $this->db_database5->query("
            SELECT
            epai_master_penyuluh.penyuluh_KabKota_Kode,
            epai_master_kabkota.kabkota_nama,
          /*  ( SELECT COUNT( DISTINCT epai_master_penyuluh.penyuluh_Kecamatan ) ) AS jumlah_kecamatan,*/
            ( SELECT COUNT(epai_master_penyuluh.penyuluh_ID) FROM epai_master_penyuluh WHERE epai_master_penyuluh.penyuluh_StatusOnline = 1 AND epai_master_kabkota.kabkota_kode = epai_master_penyuluh.penyuluh_KabKota_Kode) AS jumlah_penyuluh_online,
            Count( epai_master_penyuluh.penyuluh_ID ) AS jumlah_penyuluh
            FROM
              epai_master_kabkota
              INNER JOIN epai_master_penyuluh ON epai_master_kabkota.kabkota_kode = epai_master_penyuluh.penyuluh_KabKota_Kode 
            WHERE
              epai_master_penyuluh.penyuluh_Provinsi_Kode = $id AND
              epai_master_penyuluh.penyuluh_Status = 1
            GROUP BY
              epai_master_kabkota.kabkota_kode 
            ORDER BY
              epai_master_kabkota.kabkota_kode ASC
          ");
         return $query->result();
      }
   }

   function get_penyuluh($id = null)
   {
      if($id === null){
          $this->setGroup;
          echo "Masukkan id penyuluh_KabKota_Kode";
      }else{
         $query = $this->db_database5->query("
            SELECT
            epai_master_penyuluh.penyuluh_Kecamatan,
            epai_master_penyuluh.penyuluh_Nama,
            epai_master_penyuluh.penyuluh_JK,
            epai_master_penyuluh.penyuluh_TempatLahir,
            epai_master_penyuluh.penyuluh_TanggalLahir 
          FROM
            epai_master_penyuluh 
          WHERE
            epai_master_penyuluh.penyuluh_KabKota_Kode = $id
            AND epai_master_penyuluh.penyuluh_Status = 1 
          GROUP BY
            epai_master_penyuluh.penyuluh_ID
          ");
         return $query->result();
      }
   }

   function get_penyuluhonline($id = null)
   {
      if($id === null){
          $this->setGroup;
          echo "Masukkan id penyuluh_KabKota_Kode";
      }else{
         $query = $this->db_database5->query("
            SELECT
            epai_master_penyuluh.penyuluh_Kecamatan,
            epai_master_penyuluh.penyuluh_Nama,
            epai_master_penyuluh.penyuluh_JK,
            epai_master_penyuluh.penyuluh_TempatLahir,
            epai_master_penyuluh.penyuluh_TanggalLahir
            FROM
            epai_master_penyuluh
            WHERE
            epai_master_penyuluh.penyuluh_KabKota_Kode = $id AND
            epai_master_penyuluh.penyuluh_Status = 1 AND
            epai_master_penyuluh.penyuluh_StatusOnline = 1
            GROUP BY
            epai_master_penyuluh.penyuluh_ID
          ");
         return $query->result();
      }
   }
   
}

/* End of file Simas_m.php */
/* Location: ./application/modules/docs/models/Simas_m.php */