<?php

defined('BASEPATH') || exit('trying to signin backdoor?');

class M_kelurahan extends CI_Model {

    public function insert_kel($data) {
        $tot_data = count($data);
        $upd_succ = 0;
        for ($index = 0; $index < $tot_data; $index++) {
            $this->db->trans_begin();
            $this->db->set([
                        '`mt_kelurahan`.`id_kelurahan`' => $data[$index]['kode_kel'],
                        '`mt_kelurahan`.`id_kecamatan`' => $data[$index]['kode_kec'],
                        '`mt_kelurahan`.`id_kabupaten`' => $data[$index]['kode_kab'],
                        '`mt_kelurahan`.`id_provinsi`' => $data[$index]['kode_prov'],
                        'mt_kelurahan.nama_kelurahan' => $data[$index]['nama_kel_s'],
                        'mt_kelurahan.nama_kecamatan' => $data[$index]['nama_kec_s'],
                        'mt_kelurahan.nama_kabupaten' => $data[$index]['nama_kab_s'],
                        'mt_kelurahan.nama_provinsi' => $data[$index]['nama_prop_'],
                        'mt_kelurahan.stat' => 1,
                        'mt_kelurahan.syscreateuser' => 1,
                        'mt_kelurahan.syscreatedate' => date('Y-m-d H:i:s')
                    ])
                    ->insert('mt_kelurahan');
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
