<?php

defined('BASEPATH') OR exit('trying to signin backdoor?');

class M_penyuluh extends CI_Model {

    public function __construct()
    {
        $this->table = 'vstat_prov';
        $this->column_order_prov = ['vstat_prov.id_prov', 'vstat_prov.provinsi', 'vstat_prov.jumlah_kua', 'vstat_prov.jumlah_pns', 'vstat_prov.jumlah_nonpns'];
        $this->column_search_prov = ['vstat_prov.provinsi'];
        $this->order_prov = ['vstat_prov.id_prov' => 'asc'];
        $this->column_order_kabkot = ['vstat_prov.id_kab', 'vstat_prov.kabupaten', 'vstat_prov.id_prov', 'vstat_prov.jumlah_kua', 'vstat_prov.jumlah_pns', 'vstat_prov.jumlah_nonpns'];
        $this->column_search_kabkot = ['vstat_kab.kabupaten'];
        $this->order_kabkot = ['vstat_kab.id_kab' => 'asc'];
        $this->db_epa = $this->load->database('epa', TRUE);
    }

    public function Signin($data) {
        $exec = $this->db->query('CALL sys_auth("' . $data['uname'] . '");')->row();
        mysqli_next_result($this->db->conn_id);
        return $exec;
    }

    public function index($param) {
        $exec = $this->db->query('CALL vstat_prov_select("' . $param['param'] . '",' . $param['id_user'] . ',' . $param['panjang'] . ',' . $param['mulai'] . ');');
        mysqli_next_result($this->db->conn_id);
        return $exec->result();
    }

    private function _get_datatables_query($prov_id = null) {
        // print_r($prov_id);
        if ($prov_id == null ){
            $this->db_epa->select('vstat_prov.id_prov, vstat_prov.provinsi, vstat_prov.jumlah_kua, vstat_prov.jumlah_pns, vstat_prov.jumlah_nonpns');
            $this->db_epa->from($this->table);

            $i = 0;
            foreach ($this->column_search_prov as $item) { // loop column
                if ($_GET['search']['value']) { // if datatable send POST for search
                    if ($i === 0) { // first loop
                        $this->db_epa->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db_epa->like($item, $_GET['search']['value']);
                    } else {
                        $this->db_epa->or_like($item, $_GET['search']['value']);
                    }

                    if (count($this->column_search_prov) - 1 == $i) //last loop
                        $this->db_epa->group_end(); //close bracket
                }
                $i++;
            }

            if (isset($_GET['order'])) { // here order processing
                $this->db_epa->order_by($this->column_order_prov[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
            } else if (isset($this->order_prov)) {
                $order = $this->order_prov;
                $this->db_epa->order_by(key($order), $order[key($order)]);
            }
        } else {
            $this->db_epa->select('vstat_kab.id_kab, vstat_kab.kabupaten, vstat_kab.id_prov, vstat_kab.provinsi, vstat_kab.jumlah_kua, vstat_kab.jumlah_pns, vstat_kab.jumlah_nonpns');
            $this->db_epa->from('vstat_kab')->where('vstat_kab.id_prov', $prov_id);

            $i = 0;
            foreach ($this->column_search_kabkot as $item) { // loop column
                if ($_GET['search']['value']) { // if datatable send POST for search
                    if ($i === 0) { // first loop
                        $this->db_epa->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db_epa->like($item, $_GET['search']['value']);
                    } else {
                        $this->db_epa->or_like($item, $_GET['search']['value']);
                    }

                    if (count($this->column_search_kabkot) - 1 == $i) //last loop
                        $this->db_epa->group_end(); //close bracket
                }
                $i++;
            }

            if (isset($_GET['order'])) { // here order processing
                $this->db_epa->order_by($this->column_order_kabkot[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
            } else if (isset($this->order_kabkot)) {
                $order = $this->order_kabkot;
                $this->db_epa->order_by(key($order), $order[key($order)]);
            }
        }
    }

    public function lists($prov_id = null) {
        $this->_get_datatables_query($prov_id);
        if ($_GET['length'] != -1)
            $this->db_epa->limit($_GET['length'], $_GET['start']);
        $query = $this->db_epa->get();
        return $query->result();
    }

    public function count_filtered($prov_id = null) {
        $this->_get_datatables_query($prov_id);
        $query = $this->db_epa->get();
        return $query->num_rows();
    }

    public function count_all($prov_id = null) {
        $this->_get_datatables_query($prov_id);
        return $this->db_epa->count_all_results();
    }

}
