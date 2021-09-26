<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uplodan {

	public function __construct(){
        $this->CI = &get_instance();
    }

    // gambar frontend
    public function dokumen_1()
    {
        $url = site_url('gambar/tambah/');
        $nama_gambar = 'Slider_'.$_FILES["dok1"]['name'];

        $config['upload_path']      = 'assets/img/frontend/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $nama_gambar;

        $this->CI->load->library('upload');
        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload('dok1')) {
            echo $this->CI->upload->display_errors('', '');
            return $url;
        }
        return $this->CI->upload->data('file_name');
    }

    // gambar artikel
    public function dokumen_2()
    {
        $url = site_url('post/article/tambah/');
        $nama_gambar = 'Artikel_'.$_FILES["dok2"]['name'];

        $config['upload_path']      = 'assets/img/artikel/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $nama_gambar;

        $this->CI->load->library('upload');
        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload('dok2')) {
            echo $this->CI->upload->display_errors('', '');
            return $url;
        }
        return $this->CI->upload->data('file_name');
    }

    // gambar produk
    public function dokumen_3()
    {
        $url = site_url('post/product/tambah/');
        $nama_gambar = 'Produk_'.$_FILES["dok3"]['name'];

        $config['upload_path']      = 'assets/img/produk/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $nama_gambar;

        $this->CI->load->library('upload');
        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload('dok3')) {
            echo $this->CI->upload->display_errors('', '');
            return $url;
        }
        return $this->CI->upload->data('file_name');
    }
    
    // gambar popup
    public function dokumen_4()
    {
        $url = site_url('popup/tambah/');
        $nama_gambar = 'Popup_'.$_FILES["dok4"]['name'];

        $config['upload_path']      = 'assets/img/popups/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $nama_gambar;

        $this->CI->load->library('upload');
        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload('dok4')) {
            echo $this->CI->upload->display_errors('', '');
            return $url;
        }
        return $this->CI->upload->data('file_name');
    }

    // gambar popup
    public function dokumen_5()
    {
        $nama_gambar = 'Popup_'.$_FILES["dok5"]['name'];

        $config['upload_path']      = 'assets/img/penawaran/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $nama_gambar;

        $this->CI->load->library('upload');
        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload('dok5')) {
            echo $this->CI->upload->display_errors('', '');
            // return $this->CI->gambar->tambah();
        }
        return $this->CI->upload->data('file_name');
    }


}

/* End of file Uplodan.php */
/* Location: ./application/libraries/Uplodan.php */
