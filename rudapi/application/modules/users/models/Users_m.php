<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_m extends CI_Model {

	var $table = 'view_users';
    var $column_order = [null,'nama','username','password','level','email','status','created'];
    var $column_search = ['nama','username','password','level','email','status','created'];
    var $order = array('id_user' => 'asc');

	function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query()
    {
        
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // versi baru
    function ambilRole()
    {
        $query = $this->db->get_where('view_roles', array('is_trash' => 1))->result();
        return $query;
    }

    // versi baru
	function ByID($id)
	{
        $query = $this->db->get_where('view_users', array('id_user' => $id))->row();
        return $query;
	}

	// versi baru
	function perbaharuiUsers($id, $data)
	{
		$this->db->where("id_user", $id);
        $this->db->update("sys_users", $data);
	}

	function get_fasilitas()
	{
		$query = $this->db->get_where('fasilitas', array('is_trash' => 1))->result();
		return $query;
	}

	function send_insert($data)
	{
		$this->db->insert('fasilitas', $data);
	}

	function edit_fasilitas($id)
	{
		$query = $this->db->get_where('fasilitas', ['md5(id_fsl)' => $id])->row();
		return $query;
	}

	function send_update($id, $data)
	{
		$this->db->where('id_fsl', $id);
		$this->db->update('fasilitas', $data);
	}

	function send_deleted($id)
	{
		$config = array(
			'is_trash' => 0,
			'deleted' => $this->session->userdata('id_user'),
			'deleted_date' => date('Y-m-d h:i:s')
		);

		$this->db->set($config);
		$this->db->where(['md5(id_fsl)' => $id]);
		$this->db->update('fasilitas');
	}

}

/* End of file fasilitas_m.php */
/* Location: ./application/modules/fasilitas/models/fasilitas_m.php */