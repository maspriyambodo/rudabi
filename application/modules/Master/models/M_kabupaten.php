<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_kabupaten extends CI_Model {

    var $table = 'mt_wil_kabupaten';
    var $column_order = [null, 'id_kabupaten', 'nama', 'is_actived', 'longitude', 'latitude', null]; //set column field database for datatable orderable
    var $column_search = ['id_kabupaten', 'nama', 'longitude', 'latitude']; //set column field database for datatable searchable 
    var $order = array('id_kabupaten' => 'asc'); // default order

    private function _get_datatables_query() {
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if ($_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function lists() {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function Get_id($id) {
        $exec = $this->db->select('mt_wil_kabupaten.id_kabupaten')
                ->from('mt_wil_kabupaten')
                ->where('mt_wil_kabupaten.id_kabupaten', $id, false)
                ->get()
                ->row();
        return $exec;
    }

    public function Provinsi() {
        $exec = $this->db->select('mt_wil_provinsi.id_provinsi, mt_wil_provinsi.nama')
                ->from('mt_wil_provinsi')
                ->get()
                ->result();
        return $exec;
    }

    public function Add($data) {
        $this->db->trans_begin();
        $this->db->insert('mt_wil_kabupaten', $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            redirect(base_url(), $this->session->set_flashdata('err_msg', 'error while inserting new kabupaten'));
        } else {
            $this->db->trans_commit();
            redirect(base_url(), $this->session->set_flashdata('succ_msg', 'new kabupaten has been added'));
        }
    }

}
