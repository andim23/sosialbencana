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
            echo json_encode(array(
                'status'        => false,
                'message'       => 'Data Tidak Ditemukan'
            ));
            $this->output->set_status_header(422);
        }
        else
        {
            if($profil->num_rows() > 0)
            {
                echo json_encode($profil->row());
            }
            else
            {
                echo json_encode(array(
                    'status'        => false,
                    'message'       => 'Data Tidak Ada'
                ));
                $this->output->set_status_header(422);
            }
        }
    }

    public function delete_posting($slug)
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            if($slug == NULL)
            {
                echo json_encode(array(
                    'status'        => false,
                    'message'       => 'Data Tidak Ditemukan'
                ));
                $this->output->set_status_header(422);
            }
            else
            {
                $where=array('slug_post'=>$slug);
                $file=$this->Apirelawan->getwhererow('nama_img','post',$where);
                $linkfolder='./uploads/'.$file->nama_img;

                if(isset($linkfolder))
                {
                    unlink($linkfolder);
                    if($this->Apirelawan->deletePost($where))
                    {
                        echo json_encode(array(
                            'status'        => TRUE,
                            'message'       => 'Data Berhasil Dihapus'
                        ));
                        $this->output->set_status_header(422);
                    }
                    else
                    {
                        echo json_encode(array(
                            'status'        => FALSE,
                            'message'       => 'Data Gagal Dihapus'
                        ));
                        $this->output->set_status_header(422);
                    }
                }
                else
                {
                    echo json_encode(array(
                        'status'        => false,
                        'message'       => 'Link Data Salah'
                    ));
                    $this->output->set_status_header(422);
                }
            }
        }
        else
        {
            echo json_encode(array(
                'status'        => false,
                'message'       => 'REQUEST DENIED'
            ));
            $this->output->set_status_header(422);
        }
    }

    public function update_datadiri()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $where=array(
                'user_kode'=>$this->input->post('userkode')
            );

            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'j_kel' => $this->input->post('j_kel'),
                'phone' => $this->input->post('phone')
            );
            
            if($this->Apirelawan->update('user',$where, $data))
            {
                echo json_encode(array(
                    'status'        => TRUE,
                    'message'       => 'Data berhasil diupdate'
                ));
                $this->output->set_status_header(422);
            }
            else
            {
                echo json_encode(array(
                    'status'        => FALSE,
                    'message'       => 'Data gagal diupdate'
                ));
                $this->output->set_status_header(422);
            }
        }
        else
        {
            echo json_encode(array(
                'status'        => FALSE,
                'message'       => 'REQUEST DENIED'
            ));
            $this->output->set_status_header(422);
        }
    }
}
