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
                    $this->session->set_flashdata('gagal', 'Maaf! Akun Anda Belum Aktif');
                    redirect(base_url('login'));
                }
            }
            else
            {
                echo "Password Salah";
            }
        }
        else
        {
            echo "Akun Tidak Ditemukan";
        }
    }
    
    public function regbayangan()
    {
            date_default_timezone_set("Asia/Jakarta");
            $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_'; 
            $random = str_repeat(str_shuffle($str),4);
    
            $data = array(
                'users_username'=>'admin',
                'users_email'=>'admin@sosben.com',
                'users_password' => password_hash('admin', PASSWORD_BCRYPT),
                'users_level'=>'1',
                'users_status'=>'1',
                'users_tanggal' => date('Y-m-d H:i:s'),
                'users_token'=>$random,
            );
    
            $update=$this->Auth_model->insert('users',$data);
            if($update)
                {
                    if ($this->agent->is_browser())
                    {
                        $agent = $this->agent->browser().' '.$this->agent->version();
                    }
                    elseif ($this->agent->is_robot())
                    {
                        $agent = $this->agent->robot();
                    }
                    elseif ($this->agent->is_mobile())
                    {
                        $agent = $this->agent->mobile();
                    }
                    else
                    {
                        $agent = 'Unidentified User Agent';
                    }
        
                    $data_log = array(
                        'username' => 'admin',
                        'ip' => $this->input->ip_address(),
                        'browser' => $agent,
                        'sistem_operasi' => $this->agent->platform(),
                        'waktu' => date('Y-m-d h:i:s'),
                        'status' => 'Pengguna Registrasi'
                    );
                    $data_log = $this->db->insert('sosben_logauth', $data_log);	
                }
                echo 'done';
    }

    Public function proses_login()
    {
        date_default_timezone_set('Asia/Jakarta');
        // $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        // $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong');

        $username = 'admin';
        $password = 'admin';

        // if($this->form_validation->run() == FALSE)
        // {
        //     $this->load->view('Auth');
        // }
        // else
        // {
            $cek = $this->Auth_model->cekUser($username);
            
            if($cek->num_rows() > 0)
            {
                $data = $cek->row_array();
                if(password_verify($password, $data['users_password']))
                {   
                          $this->session->set_userdata('username', $data['users_username']);
                            if($data['users_level']=='1')
                            {
                                $this->session->set_userdata('level', 'Admin');
                            }
                            elseif($data['users_level']=='2')
                            {
                                $this->session->set_userdata('level', 'User');
                            }
                            $this->session->set_userdata('status', 'Login');

                            if ($this->agent->is_browser())
                            {
                                $agent = $this->agent->browser().' '.$this->agent->version();
                            }
                            elseif ($this->agent->is_robot())
                            {
                                $agent = $this->agent->robot();
                            }
                            elseif ($this->agent->is_mobile())
                            {
                                $agent = $this->agent->mobile();
                            }
                            else
                            {
                                $agent = 'Unidentified User Agent';
                            }
                
                            $data_log = array(
                                'username' => $username,
                                'ip' => $this->input->ip_address(),
                                'browser' => $agent,
                                'sistem_operasi' => $this->agent->platform(),
                                'waktu' => date('Y-m-d h:i:s'),
                                'status' => 'Pengguna Login'
                            );
                            $data_log = $this->Auth_model->insert('sosben_logauth', $data_log);
                            //redirect(base_url('Pengelola'));
                            echo 'berhasil login';
                }
                    
                else
                {
                    //$this->session->set_flashdata('Password Salah', 'Maaf Username atau Password Salah.');
                    //redirect(base_url('Auth'));   
                    echo 'error';
                }
            }
            // else{
            //     $this->session->set_flashdata('Username', 'Maaf anda tidak terdaftar.');
            //         // redirect(base_url('Auth'));
            //         echo 'error';
            // }
        //}
    }

    public function test()
    {
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_'; 
        $random = str_repeat(str_shuffle($str),4);
        echo $random . "<br>" . time();
    }
}
