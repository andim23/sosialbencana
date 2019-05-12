<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_relawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('ApiRelawan_model', 'Apirelawan');
    }

    public function post()
    {
        $post = $this->Apirelawan->getPost()->result();
        if($post)
        {
            echo json_encode(array('result' => $post), TRUE);    
        }
        else
        {
            echo json_encode(array(
                'result' => 'Error',
                'message' => 'Data Kosong'
            ));
        }
    }

    public function postrelawan($kode)
    {
        $post           = $this->Apirelawan->getPostRelawan($kode)->result();
        if($this->Apirelawan->getPostRelawan($kode)->num_rows() > 0)
        {
            if($post)
            {
                echo json_encode(array('result' => $post), TRUE);    
            }
            else
            {
                echo json_encode(array(
                    'result' => 'Error',
                    'message' => 'Data Kosong'
                ));
            }
        }
        else
        {
            echo json_encode(array(
                'result' => 'Error',
                'message' => 'Data Tidak Ada'
            ));
        }
    }

    public function posting()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $imagedata = $this->input->post('image_data');
            $imagename = "POST_".date('Ymd')."_".date('His')."_".md5(date('Y-m-d H:i:s').time())."_".$this->input->post('user_kode');
            $imagepath1 = "$imagename.jpg";
            $imagepath2 = "uploads/$imagepath1";
            
            file_put_contents($imagepath2, base64_decode($imagedata));
            if($this->Apirelawan->createPost($imagepath1, $imagepath2))
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

    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if($this->Apirelawan->registerRelawan())
            {
                echo "Berhasil Registasi. Mohon Menunggu";
            }
            else
            {
                echo "Gagal Registrasi";
            }
        }
        else
        {
            echo "Gagal";
        }
    }
}
