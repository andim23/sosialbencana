<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_auth extends CI_Controller {

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
            if(password_verify($password, $data['password']))
            {
                /**
                 * STATUS
                 * 1 = AKTIF
                 * 2 = TIDAK AKTIF
                 * 3 = BANNED
                 */
                if($data['id_status'] == '1')
                {
                    /**
                     * LEVEL
                     * 1 = DEVELOPER
                     * 2 = RELAWAN
                     */
                    if($data['id_level'] == '1')
                    {
                        echo json_encode(array(
                            'result' => 'Developer',
                            'message' => 'Maaf! Akun anda berlevel DEVELOPER'
                        ));
                    }
                    if($data['id_level'] == '2')
                    {
                        $session = array(
                            'username' => $data['username'],
                            'email' => $data['email'],
                            'level' => 'Relawan',
                        );
                        echo json_encode($data);
                    }
                }
                if($data['id_status'] == '2')
                {
                    echo json_encode(array(
                        'result' => 'Error',
                        'message' => 'Maaf! Akun Anda Belum Aktif'
                    ));
                }
                if($data['id_status'] == '3')
                {
                    echo json_encode(array(
                        'result' => 'Error',
                        'message' => 'Maaf! Akun Anda Dinonaktifkan, Silahkan Hubungi Customer Service'
                    ));
                }
            }
            else
            {
                echo json_encode(array(
                    'result' => 'Error',
                    'message' => 'Maaf! Password Anda Salah'
                ));
            }
        }
        else
        {
            echo json_encode(array(
                'result' => 'Error',
                'message' => 'Maaf! Akun Tidak Ditemukan'
            ));
        }
    }
}
