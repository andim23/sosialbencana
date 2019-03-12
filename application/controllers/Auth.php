<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        // Load Model
        $this->load->model('Auth_model');
	}

	public function index()
	{
		$this->load->view('welcome_message');
    }
    
    public function regbayangan()
    {
            date_default_timezone_set("Asia/Jakarta");
            $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
            $random = date('Y-m-d h:i:s').substr(str_shuffle($str), 0,15);
            $kodeunik = md5($random);
    
            $data = array(
                'users_username'=>'admin',
                'users_email'=>'admin@sosben.com',
                'users_password' => password_hash('admin', PASSWORD_BCRYPT),
                'users_level'=>'1',
                'users_status'=>'Admin',
                'users_token'=>$kodeunik,
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
}
