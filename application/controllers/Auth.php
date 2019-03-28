<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Auth_model');
    }
    
    public function proseslogin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        // VALIDASI
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|xss_clean|valid_email|valid_emails');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[8]');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong!');
        $this->form_validation->set_message('valid_email', 'Maaf! <b>%s</b> Tidak Valid');
        $this->form_validation->set_message('valid_emails', 'Maaf! <b>%s</b> Tidak Valid');
        $this->form_validation->set_message('min_length', 'Maaf! <b>%s</b> Minimal <b>%s</b> Karakter.');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('Home/login');
        }
        else
        {
            $cek = $this->Auth_model->cekUser($email);
            if($cek->num_rows() > 0)
            {
                $data = $cek->row_array();
                print_r($data);
                if(password_verify($password, $data['users_password']))
                {
                    /**
                     * STATUS
                     * 1 = AKTIF
                     * 2 = TIDAK AKTIF
                     * 3 = BANNED
                     */
                    if($data['users_status'] == '1')
                    {
                        /**
                         * LEVEL
                         * 1 = DEVELOPER
                         * 2 = RELAWAN
                         */
                        if($data['users_level'] == '1')
                        {
                            $session = array(
                                'username' => $data['users_username'],
                                'email' => $data['users_email'],
                                'level' => 'Developer',
                            );
                            $this->session->set_userdata($session);
                            redirect(base_url('developer'));
                        }
                        if($data['users_level'] == '2')
                        {
                            $session = array(
                                'username' => $data['users_username'],
                                'email' => $data['users_email'],
                                'level' => 'Relawan',
                            );
                            $this->session->set_userdata($session);
                            redirect(base_url('relawan'));
                        }
                    }
                    if($data['users_status'] == '2')
                    {
                        $this->session->set_flashdata('gagal', 'Maaf! Akun Anda Belum Aktif.');
                        redirect(base_url('login'));
                    }
                    if($data['users_status'] == '3')
                    {
                        $this->session->set_flashdata('gagal', 'Maaf! Akun Anda Dinonaktifkan, Silahkan Hubungi Customer Service.');
                        redirect(base_url('login'));
                    }
                }
                else
                {
                    $this->session->set_flashdata('gagal', 'Maaf! Password Anda Salah');
                    redirect(base_url('login'));
                }
            }
            else
            {
                $this->session->set_flashdata('gagal', 'Maaf! Akun Tidak Ditemukan');
                redirect(base_url('login'));
            }
        }
    }

    public function prosesregister()
    {
        // VALIDASI
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|is_unique[users.users_username]');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|xss_clean|valid_email|valid_emails|is_unique[users.users_email]');
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
            $this->load->view('Home/register');
        }
        else
        {
            $this->Auth_model->daftarAkun();
            $this->session->set_flashdata('sukses', 'Berhasil Melakukan Registrasi! Silahkan Cek Email.');
            redirect(base_url('login'));
        }
    }

    public function aktivasi($token)
    {
        $cek = $this->Auth_model->cekAktivasi($token);
        if($cek->num_rows() > 0)
        {
            $data = $cek->row_array();
            if($data['users_status'] == 2 && $data['users_verifikasi'] == NULL)
            {
                $this->Auth_model->updateAktivasi($token);
                $this->session->set_flashdata('sukses', 'Akun Anda Berhasil Aktif! Silahkan Login');
                redirect(base_url('login'));
            }
            else
            {
                $this->session->set_flashdata('gagal', 'Akun Telah Aktif.');
                redirect(base_url('login'));
            }
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Maaf! Akun Tidak Ditemukan');
            redirect(base_url('login'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'), 'refresh');
    }

    public function test()
    {
        echo $this->security->get_csrf_token_name()."<br>";
        echo $this->security->get_csrf_hash();
    }
}
