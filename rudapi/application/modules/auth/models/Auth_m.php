<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model {

    // cek keberadaan user di sistem
	function check_user_account($username, $password){
		$this->db->select('*');
		$this->db->from('sys_users a');
		$this->db->join('sys_roles b', 'a.level = b.id', 'left');
		$this->db->where('a.username', $username);
		$this->db->where('a.password', $password);
		$this->db->where('a.is_trash !=', 0);
		return $this->db->get();
	}
// mengambil data user tertentu
	function get_user($id_user){
		$this->db->select('*');
		$this->db->from('sys_users');
		$this->db->where('id_user', $id_user);
		return $this->db->get();
	}

}

/* End of file Auth_m.php */
/* Location: ./application/modules/auth/models/Auth_m.php */