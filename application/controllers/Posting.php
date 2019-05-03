<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Posting_model');
        $this->load->model('Status_model');
    }
    
    public function index()
    {
        $post           = $this->Posting_model->getPost()->result_array();
        $data = array(
            'post'      => $post,
        );
        $this->load->view('Admin/Posting/index', $data);
    }

    public function tambah()
    {
        $this->load->view('Admin/Posting/tambah');
    }

    public function p_tambah()
    {
        // VALIDASI
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required|xss_clean');
        $this->form_validation->set_rules('latitude', 'Latitude', 'trim|required|xss_clean');
        $this->form_validation->set_rules('longitude', 'Longitude', 'trim|required|xss_clean');
        $this->form_validation->set_rules('caption', 'Caption', 'trim|required|xss_clean');
        $this->form_validation->set_rules('gambar', 'Gambar', 'trim|xss_clean|callback_validasi_gambar');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong');

        $config = array(
            'upload_path'           => './uploads/',
            'allowed_types'         => 'jpg|png|jpeg',
            'max_size'              => '2048',
            'file_name'             => "POST_".date('Ymd')."_".date('His')."_".md5(date('Y-m-d H:i:s').time())."_"."admin",
            'remove_space'          => TRUE,
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('Admin/Posting/tambah');
        }
        else
        {
            $this->upload->do_upload('gambar');
            $this->Posting_model->createPost($this->upload->data('file_name'));
            $this->session->set_flashdata('sukses', 'Berhasil Menambahkan Posting');
            redirect(base_url('posting'));
        }
    }

    public function hapus($id)
    {
        $data = $this->Posting_model->detailPost($id)->row_array();
        $gambar = $data['nama_img'];
        $path = FCPATH."uploads/".$gambar;
        unlink($path);
        $this->Posting_model->deletePost($id, $gambar);
        $this->session->set_flashdata('sukses', 'Berhasil Menghapus Posting');
        redirect(base_url('posting'));
    }

    public function validasi_gambar()
    {
        $this->form_validation->set_message('validasi_gambar', 'Maaf! <b>%s</b> Tidak Boleh Kosong');
        if(empty($_FILES['gambar']['name']))
        {
            return FALSE;
        }
        $this->form_validation->set_message('validasi_gambar', 'Maaf! Ukuran <b>%s</b> Melebihi Batas');
        if($_FILES['gambar']['size'] > 2097152)
        {
            return FALSE;
        }
    }
}
