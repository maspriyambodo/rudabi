<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Global_m extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->roles = $this->session->userdata('role');
		$this->satu = $this->uri->segment(1);
        $this->dua = $this->uri->segment(2);
        $this->gabung = $this->uri->segment(1).'/'.$this->uri->segment(2);
	}

    public function menuBackend($parent,$hasil)
    {
        $w = $this->db->query("SELECT * from rudapi.view_menupis WHERE parent_id = '".$parent."' and is_trash = 1 order by no_urut");

        foreach($w->result() as $h)
        {
            if($this->satu == $h->pranala){
                $aktiflink = 'active';
            }else{
                $aktiflink = '';
            }

            if($this->gabung == $h->pranala){
                $submenu = 'active';
            }else{
                $submenu = '';
            }

            // masih belum bisa kebuka menu opennya
            if($this->gabung == $h->pranala){
                $openmenu = 'menu-is-opening menu-open';
            }else if(!$this->satu == $h->pranala){
                $openmenu = '';
            }else{
                $openmenu = '';
            }

            $cek_parent = $this->db->query("SELECT * from rudapi.view_menupis WHERE parent_id = ".$h->id."");
            if(($cek_parent->num_rows()) > 0)
            {
                $hasil .= '<li class="nav-item '.$openmenu.'"><a href="'.base_url().$h->pranala.'" class="nav-link '.$aktiflink.'"><i class="'.$h->icon.'" aria-hidden="true"></i> '.$h->nm_menu.' <i class="'.$h->arah_kanan.'" aria-hidden="true"></i></a> '; //data-toggle="dropdown"
            }else{
                $hasil.='<li class="nav-item '.$openmenu.'"><a href="'.base_url().$h->pranala.'" class="nav-link '.$aktiflink.$submenu.'"><i class="'.$h->icon.'" aria-hidden="true"></i> '.$h->nm_menu.'</a></li>';
            }

            $hasil .= '<ul class="nav nav-treeview">';
            $hasil  = $this->menuBackend($h->id,$hasil);
            $hasil .= '</ul>';       
            $hasil .= "</li></li>";
        }
        return str_replace('<ul class="nav nav-treeview"></ul>','',$hasil);
    }

	public function cek_permission($linknow)
	{
        $query = $this->db->query('
                SELECT
                a.level, a.is_view, a.is_add, a.is_edited, a.is_deleted, a.is_publish, a.id as id_menu, a.pranala
                FROM
                view_menupis a
                WHERE
                a.level = 1 and a.pranala = REPLACE("'.$linknow.'", "'.base_url().'", "") ');
        return $query->row();
        $this->db->close();
	}

    public function ambilProvinsi()
    {
        $query = $this->db->get_where('mst_provinsi', array('is_actived' => 1))->result();
        return $query;
    }

    public function ambilKabupaten()
    {
        $query = $this->db->get_where('mst_kabupaten', array('is_actived' => 1))->result();
        return $query;
    }

    public function ambilKecamatan()
    {
        $query = $this->db->get_where('mst_kecamatan', array('is_actived' => 1))->result();
        return $query;
    }

    public function ambilPath()
    {
        $query = $this->db->get_where('dt_path', array('is_trash' => 1))->row();
        return $query;
    }

    public function ambilKategori()
    {
        $query = $this->db->get_where('mst_kategoriapi', array('is_trash' => 1))->result();
        return $query;
    }

    public function ambilDirektorat()
    {
        $query = $this->db->get_where('mst_direktorat', array('is_trash' => 1))->result();
        return $query;
    }

    public function cek_activedkey()
    {
        // $kondisi = array('a.level' => $user, 'a.active' => 1);
        $query = $this->db->select('a.active')
                ->from('keys a')
                // ->join('sys_users b', 'a.id_user = b.id_user', 'INNER')
                ->where('a.active', 1)
                ->get();
        return $query->row();
    }

}

/* End of file Global_m.php */
/* Location: ./application/models/Global_m.php */