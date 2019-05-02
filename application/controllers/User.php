<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Level_model');
        $this->load->model('Status_model');
    }
    
    public function index()
    {
        $user       = $this->User_model->getUser()->result_array();
        $level      = $this->Level_model->getLevel()->result_array();
        $status     = $this->Status_model->getStatus()->result_array();
        $data = array(
            'user'      => $user,
            'level'     => $level,
            'status'    => $status,
        );
        $this->load->view('Admin/User/index', $data);
    }

    public function detail($kode)
    {
        $user       = $this->User_model->detailUser($kode)->row_array();
        $level      = $this->Level_model->getLevel()->result_array();
        $status     = $this->Status_model->getStatus()->result_array();
        $data = array(
            'user'      => $user,
            'level'     => $level,
            'status'    => $status,
        );
        $this->load->view('Admin/User/detail', $data);
    }

    public function tambah()
    {
        $level      = $this->Level_model->getLevel()->result_array();
        $status     = $this->Status_model->getStatus()->result_array();
        $data = array(
            'level'         => $level,
            'status'        => $status,
        );
        $this->load->view('Admin/User/tambah', $data);
    }

    public function p_tambah()
    {
        // VALIDASI
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|xss_clean|valid_email|valid_emails|is_unique[user.email]');
        $this->form_validation->set_rules('level', 'Level', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[8]');
        $this->form_validation->set_rules('konfirmasi', 'Konfirmasi Password', 'trim|required|xss_clean|matches[password]');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong!');
        $this->form_validation->set_message('is_unique', 'Maaf! <b>%s</b> Telah Digunakan. Harap Menggunakan Akun lain.');
        $this->form_validation->set_message('valid_email', 'Maaf! <b>%s</b> Tidak Valid');
        $this->form_validation->set_message('valid_emails', 'Maaf! <b>%s</b> Tidak Valid');
        $this->form_validation->set_message('matches', 'Maaf! <b>%s</b> Tidak Sama.');
        $this->form_validation->set_message('min_length', 'Maaf! <b>%s</b> Minimal <b>%s</b> Karakter.');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('Admin/User/tambah');
        }
        else
        {
            $this->User_model->createUser();
            $this->session->set_flashdata('sukses', 'Berhasil Melakukan Registrasi!');
            redirect(base_url('user'));
        }
    }

    public function edit($kode)
    {
        $user       = $this->User_model->detailUser($kode)->row_array();
        $level      = $this->Level_model->getLevel()->result_array();
        $status     = $this->Status_model->getStatus()->result_array();
        $data = array(
            'user'      => $user,
            'level'     => $level,
            'status'    => $status,
        );
        $this->load->view('Admin/User/edit', $data);
    }

    public function p_edit()
    {
        // VALIDASI
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|valid_emails|xss_clean');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric|min_length[10]|max_length[13]|xss_clean');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required|xss_clean');
        $this->form_validation->set_rules('j_kel', 'Jenis Kelamin', 'trim|required|xss_clean');
        $this->form_validation->set_rules('level', 'Level', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong!');
        $this->form_validation->set_message('valid_email', 'Maaf! <b>%s</b> Tidak Valid');
        $this->form_validation->set_message('valid_emails', 'Maaf! <b>%s</b> Tidak Valid');
        $this->form_validation->set_message('numeric', 'Maaf! <b>%s</b> Harus Berformat Angka');
        $this->form_validation->set_message('min_length', 'Maaf! <b>%s</b> Minimal <b>%s</b> Karakter');
        $this->form_validation->set_message('max_length', 'Maaf! <b>%s</b> Maksimal <b>%s</b> Karakter');

        $kode = $this->input->post('user_kode');

        if($this->form_validation->run() == FALSE)
        {
            $user       = $this->User_model->detailUser($kode)->row_array();
            $level      = $this->Level_model->getLevel()->result_array();
            $status     = $this->Status_model->getStatus()->result_array();
            $data = array(
                'user'      => $user,
                'level'     => $level,
                'status'    => $status,
            );
            $this->load->view('Admin/User/edit', $data);
        }
        else
        {
            $this->User_model->updateUser($kode);
            $this->session->set_flashdata('sukses', 'Berhasil Mengubah Data');
            redirect(base_url('user'));
        }
    }

    public function hapus($kode)
    {
        $this->User_model->deleteUser($kode);
        $this->session->set_flashdata('sukses', 'Berhasil Menghapus Data');
        redirect(base_url('user'));
    }
}