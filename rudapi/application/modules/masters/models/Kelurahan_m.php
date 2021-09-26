<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelurahan_m extends CI_Model {

	var $table = 'view_kelurahan';
    var $column_search = ['kecamatan','kelurahan','status'];
    var $order = array('id_kelurahan' => 'asc');

    private function _get_datatables_query() {
        $this->db->from($this->table);
        $i = 0;
        $filter = $this->input->get("filter");
        $arrFilter = urldecode($filter);
        $decode = json_decode($arrFilter);
        $sort = $this->input->get('sort');
        foreach ($this->column_search as $item) {
            if ($filter) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $decode[0]->value);
                } else {
                    $this->db->or_like($item, $decode[0]->value);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if ($sort != '') {
            $this->db->order_by($sort, $this->input->get('dir'));
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getdata() {
        $this->_get_datatables_query();
        $page = $this->input->get("page");
        if ($this->input->get("limit")) {
            $limit = $this->input->get("limit");
        } else {
            $limit = 10;
        }
        $start = $page * $limit;
        $result_db_request = $this->db->limit($limit, $start)->get();
        return $result_db_request->result();
    }

    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function ambilID($id)
    {
        $query = $this->db->get_where('mst_kelurahan', array('id_kelurahan' => $id))->row();
        return $query;
    }

    public function perbaharuiData($id_p, $data)
    {
        $this->db->where("id_kelurahan", $id_p);
        $this->db->update("mst_kelurahan", $data);
    }

}

/* End of file Kelurahan_m.php */
/* Location: ./application/modules/masters/models/Kelurahan_m.php */