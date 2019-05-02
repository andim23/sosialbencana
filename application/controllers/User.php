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

    /* ----- LEVEL USER ----- */
    public function leveluser()
    {
        $data1 = $this->User_model->dataLevel()->result_array();
        $data2 = $this->Jumlah_model->jumlahLevel();
        $data = array(
            'level' => $data1,
            'jumlahlevel' => $data2+1,
        );
        $this->load->view('Admin/User/leveluser', $data);
    }

    public function pt_leveluser()
    {
        // VALIDASI
        $this->form_validation->set_rules('kode', 'Kode Level', 'trim|required|xss_clean|is_unique[level.kode_level]');
        $this->form_validation->set_rules('level', 'Nama Level', 'trim|required|xss_clean');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong.');
        $this->form_validation->set_message('is_unique', 'Maaf! <b>%s</b> Telah Digunakan');

        if($this->form_validation->run() == FALSE)
        {
            $data1 = $this->User_model->dataLevel()->result_array();
            $data = array(
                'level' => $data1,
            );
            $this->load->view('Admin/User/leveluser', $data);
        }
        else
        {
            $this->User_model->tambahLevel();
            $this->session->set_flashdata('sukses', 'Berhasil Menambahkan Data');
            redirect(base_url('admin/leveluser'));
        }
    }

    public function pu_leveluser()
    {
        // VALIDASI
        $this->form_validation->set_rules('kode', 'Kode Level', 'trim|required|xss_clean');
        $this->form_validation->set_rules('level', 'Nama Level', 'trim|required|xss_clean');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong.');

        if($this->form_validation->run() == FALSE)
        {
            $data1 = $this->User_model->dataLevel()->result_array();
            $data = array(
                'level' => $data1,
            );
            $this->load->view('Admin/User/leveluser', $data);
        }
        else
        {
            $this->User_model->ubahLevel($this->input->post('kode'));
            $this->session->set_flashdata('sukses', 'Berhasil Mengubah Data');
            redirect(base_url('admin/leveluser'));
        }
    }

    public function hapusleveluser($kode)
    {
        $query = $this->User_model->hapusLevel($kode);
        if($query)
        {
            $this->session->set_flashdata('sukses', 'Berhasil Menghapus Data');
            redirect(base_url('admin/leveluser'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Gagal Menghapus Data');
            redirect(base_url('admin/leveluser'));
        }
    }

    /* ----- STATUS USER ----- */
    public function statususer()
    {
        $data1 = $this->User_model->dataStatus()->result_array();
        $data2 = $this->Jumlah_model->jumlahStatus();
        $data = array(
            'status' => $data1,
            'jumlahstatus' => $data2+1,
        );
        $this->load->view('Admin/User/statususer', $data);
    }

    public function pt_statususer()
    {
        // VALIDASI
        $this->form_validation->set_rules('kode', 'Kode Status', 'trim|required|xss_clean|is_unique[status.kode_status]');
        $this->form_validation->set_rules('status', 'Nama Status', 'trim|required|xss_clean');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong.');
        $this->form_validation->set_message('is_unique', 'Maaf! <b>%s</b> Telah Digunakan');

        if($this->form_validation->run() == FALSE)
        {
            $data1 = $this->User_model->dataStatus()->result_array();
            $data = array(
                'status' => $data1,
            );
            $this->load->view('Admin/User/statususer', $data);
            // echo validation_errors();
        }
        else
        {
            $this->User_model->tambahStatus();
            $this->session->set_flashdata('sukses', 'Berhasil Menambahkan Data');
            redirect(base_url('admin/statususer'));
        }
    }

    public function pu_statususer()
    {
        // VALIDASI
        $this->form_validation->set_rules('kode', 'Kode Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status', 'Nama Status', 'trim|required|xss_clean');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong.');

        if($this->form_validation->run() == FALSE)
        {
            $data1 = $this->User_model->dataStatus()->result_array();
            $data = array(
                'status' => $data1,
            );
            $this->load->view('Admin/User/statususer', $data);
        }
        else
        {
            $this->User_model->ubahStatus($this->input->post('kode'));
            $this->session->set_flashdata('sukses', 'Berhasil Mengubah Data');
            redirect(base_url('admin/statususer'));
        }
    }

    public function hapusstatususer($kode)
    {
        $query = $this->User_model->hapusStatus($kode);
        if($query)
        {
            $this->session->set_flashdata('sukses', 'Berhasil Menghapus Data');
            redirect(base_url('admin/statususer'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Gagal Menghapus Data');
            redirect(base_url('admin/statususer'));
        }
    }
}
