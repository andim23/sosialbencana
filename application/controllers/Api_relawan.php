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
        $post = $this->Apirelawan->getPost();
        if($post->num_rows() > 0)
        {
            echo json_encode(array(
                'result'        => $post->result(),
            ), TRUE);
            $this->output->set_status_header(200);
        }
        else
        {
            echo json_encode(array(
                'result' => 'Error',
                'message' => 'Data Kosong'
            ));
            $this->output->set_status_header(422);
        }
    }

    public function postrelawan($kode = NULL)
    {
        $post           = $this->Apirelawan->getPostRelawan($kode)->result();
        if($kode == NULL)
        {
            echo json_encode(array(
                'result' => 'Error',
                'message' => 'Kode Tidak Ditemukan'
            ));
            $this->output->set_status_header(422);
        }
        else
        {
            if($this->Apirelawan->getPostRelawan($kode)->num_rows() > 0)
            {
                echo json_encode(array(
                    'result' => $post
                ), TRUE);
                $this->output->set_status_header(200);
            }
            else
            {
                echo json_encode(array(
                    'result' => 'Error',
                    'message' => 'Data Tidak Ada'
                ));
                $this->output->set_status_header(422);
            }
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
                $this->output->set_status_header(200);
            }
            else
            {
                echo "Gagal Menambahkan Data";
                $this->output->set_status_header(422);
            }
        }
        else
        {
            echo "Gagal Menambahkan Data";
            $this->output->set_status_header(422);
        }
    }

    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $email=$this->input->post('email');
            $cek = $this->Apirelawan->getEmailRelawan($email);

            if($cek->num_rows() == 0)
            {
                if($this->Apirelawan->registerRelawan())
                {
                    echo "Berhasil Registasi. Mohon Menunggu";
                    $this->output->set_status_header(200);
                }
                else
                {
                    echo "Gagal Registrasi";
                    $this->output->set_status_header(422);
                }
            }
            else
            {
                echo json_encode(array(
                    'result' => 'Gagal Register',
                    'message' => 'Maaf! Email Anda Telah Digunakan.'
                ));
            }
        }
        else
        {
            echo json_encode(array(
                'result' => 'Gagal Register',
                'message' => 'Maaf! Registrasi Gagal Dilakukan.'
            ));
        }
    }

    public function detail($kode = NULL)
    {
        $profil     = $this->Apirelawan->detailRelawan($kode);
        if($kode == NULL)
        {
            echo json_ecnode(array(
                'status'        => false,
                'message'       => 'Data Tidak Ditemukan'
            ));
            $this->output->set_status_header(422);
        }
        else
        {
            if($profil->num_rows() > 0)
            {
                echo json_encode(array(
                    'result'        => $profil->result(),
                ), TRUE);
                $this->output->set_status_header(200);
            }
            else
            {
                echo json_ecnode(array(
                    'status'        => false,
                    'message'       => 'Data Tidak Ada'
                ));
                $this->output->set_status_header(422);
            }
        }
    }
}
