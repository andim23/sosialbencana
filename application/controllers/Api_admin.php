<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Jumlah_model');
    }
    
    public function posting()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $imagedata = $this->input->post('image_data');
            $imagename = "admin_".date('Y-m-d')."_".time();
            $imagepath = "uploads/$imagename.jpg";
            
            $data = array(
                'nama_img'      => base_url('').$imagepath,
                'api_img'       => $imagepath,
                'slug_post'     => "POST_".date('Ymd')."_".date('His')."_".md5(date('Y-m-d H:i:s').time())."_".$this->input->post('user_kode'),
                'lokasi'        => $this->input->post('lokasi'),
                'lttd_loc'      => $this->input->post('latitude'),
                'lgttd_loc'     => $this->input->post('longitude'),
                'caption'       => $this->input->post('caption'),
                'tanggal'       => date('Y-m-d'),
                'waktu'         => date('H:i:s'),
                'username'      => $this->input->post('user_kode'),
            );
            file_put_contents($imagepath, base64_decode($imagedata));
            if($this->Admin_model->insert('post', $data))
            {
                echo "Berhasil Menambahkan Data";
            }
            else
            {
                echo "Gagal Menambahkan Data";
            }
        }
        else
        {
            echo "Gagal Menambahkan Data";
        }
    }
}