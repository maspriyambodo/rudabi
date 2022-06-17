<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->role = $this->bodo->Dec($this->session->userdata('role_id'));
    }

    public function Search($searchtxt) {
        $exec = $this->db->select('sys_menu.nama AS menu_nama,sys_menu.icon,sys_menu.link,sys_menu_group.nama AS grup_nama')
                ->from('sys_menu')
                ->join('sys_menu_group', 'sys_menu.group_menu = sys_menu_group.id')
                ->join('sys_permissions', 'sys_menu.id = sys_permissions.id_menu ')
                ->where('`sys_menu`.`stat`', 1, false)
                ->where('`sys_permissions`.`v`', 1, false)
                ->where('`sys_permissions`.`role_id`', $this->role, false)
                ->like('sys_menu.nama', $searchtxt)
                ->or_where('`sys_menu`.`stat`', 1, false)
                ->where('`sys_permissions`.`v`', 1, false)
                ->where('`sys_permissions`.`role_id`', $this->role, false)
                ->like('sys_menu.link', $searchtxt)
                ->get()
                ->result();
        return $exec;
    }

    public function m_kabupaten() {
        $exec = $this->db->select('mt_wil_kabupaten.id_kabupaten,mt_wil_kabupaten.id_provinsi,mt_wil_kabupaten.nama AS nama_kabupaten,mt_wil_provinsi.nama AS nama_provinsi,mt_wil_kabupaten.latitude,mt_wil_kabupaten.longitude')
                ->from('mt_wil_kabupaten')
                ->join('mt_wil_provinsi', 'mt_wil_kabupaten.id_provinsi = mt_wil_provinsi.id_provinsi')
                ->where([
                    '`mt_wil_kabupaten`.`latitude`' => 0 + false,
                    '`mt_wil_kabupaten`.`longitude`' => 0 + false
                ])
                ->get()
                ->result();
        return $exec;
    }

    public function m_kecamatan() {
        $exec = $this->db->select('mt_wil_kecamatan.id_kecamatan,mt_wil_kecamatan.id_kabupaten,mt_wil_kecamatan.nama AS nama_kecamatan,mt_wil_kabupaten.nama AS nama_kabupaten,mt_wil_kecamatan.latitude,mt_wil_kecamatan.longitude')
                ->from('mt_wil_kecamatan')
                ->join('mt_wil_kabupaten', 'mt_wil_kecamatan.id_kabupaten = mt_wil_kabupaten.id_kabupaten')
                ->where([
                    '`mt_wil_kecamatan`.`latitude`' => 0 + false,
                    '`mt_wil_kecamatan`.`longitude`' => 0 + false
                ])
                ->get()
                ->result();
        return $exec;
    }
    
    public function m_kelurahan() {
        $exec = $this->db->select('mt_wil_kelurahan.id_kelurahan,mt_wil_kelurahan.id_kecamatan,mt_wil_kelurahan.nama AS nama_kelurahan,mt_wil_kecamatan.nama AS nama_kecamatan,mt_wil_kelurahan.latitude,mt_wil_kelurahan.longitude')
                ->from('mt_wil_kelurahan')
                ->join('mt_wil_kecamatan', 'mt_wil_kelurahan.id_kecamatan = mt_wil_kecamatan.id_kecamatan')
                ->where([
                    '`mt_wil_kelurahan`.`latitude`' => 0 + false,
                    '`mt_wil_kelurahan`.`longitude`' => 0 + false
                ])
                ->get()
                ->result();
        return $exec;
    }

    public function m_updateGeoloct($data) {
        $tot_data = count($data);
        $upd_succ = 0;
        for ($index = 0; $index < $tot_data; $index++) {
            $this->db->trans_begin();
            $this->db->set([
                        'mt_wil_kecamatan.latitude' => $data[$index]['latitude'],
                        'mt_wil_kecamatan.longitude' => $data[$index]['longitude']
                    ])
                    ->where([
                        '`mt_wil_kecamatan`.`id_kecamatan`' => $data[$index]['id_kecamatan'] + false,
                        '`mt_wil_kecamatan`.`id_kabupaten`' => $data[$index]['id_kabupaten'] + false
                    ])
                    ->update('mt_wil_kecamatan');
            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
                $upd_succ += 1;
            }
        }
        return $upd_succ;
    }
    
    public function m_updateKab($data) {
        $tot_data = count($data);
        $upd_succ = 0;
        for ($index = 0; $index < $tot_data; $index++) {
            $this->db->trans_begin();
            $this->db->set([
                        'mt_wil_kabupaten.latitude' => $data[$index]['latitude'],
                        'mt_wil_kabupaten.longitude' => $data[$index]['longitude']
                    ])
                    ->where([
                        '`mt_wil_kabupaten`.`id_kabupaten`' => $data[$index]['id_kabupaten'] + false,
                        '`mt_wil_kabupaten`.`id_provinsi`' => $data[$index]['id_provinsi'] + false
                    ])
                    ->update('mt_wil_kabupaten');
            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
                $upd_succ += 1;
            }
        }
        return $upd_succ;
    }
    
    public function m_updateKel($data) {
        $tot_data = count($data);
        $upd_succ = 0;
        for ($index = 0; $index < $tot_data; $index++) {
            $this->db->trans_begin();
            $this->db->set([
                        'mt_wil_kelurahan.latitude' => $data[$index]['latitude'],
                        'mt_wil_kelurahan.longitude' => $data[$index]['longitude']
                    ])
                    ->where([
                        '`mt_wil_kelurahan`.`id_kelurahan`' => $data[$index]['id_kelurahan'] + false,
                        '`mt_wil_kelurahan`.`id_kecamatan`' => $data[$index]['id_kecamatan'] + false
                    ])
                    ->update('mt_wil_kelurahan');
            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
                $upd_succ += 1;
            }
        }
        return $upd_succ;
    }

}
