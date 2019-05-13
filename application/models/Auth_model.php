<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function cekUser($userkode)
    {
        $this->db->select('user_kode,nama,email,password,id_status,id_level');
        $this->db->from('user');
        $this->db->where('user_kode', $userkode);
        return $this->db->get();
    }

    public function daftarAkun()
    {
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_'; 
        $random = str_repeat(str_shuffle($str),4);
        $num = "10".rand(1,9).date('dmY').time();

        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "testingemailmahasiswa@gmail.com";
		$config['smtp_pass'] = "akusayangkamu123";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
				
		$ci->email->initialize($config);

		$isi = '<table>';
		$isi .= '<tr><td><h4>Aktifkan Akun Sosial Bencana!</h4></td></tr>';
		$isi .= '<tr><td><p>Halo <b>' . $email . '</b> terima kasih telah melakukan pendaftaran di Sosial Bencana. Kami beritahukan kepada Anda untuk melakukan aktivasi akun agar bisa digunakan.</p></td></tr>';
		$isi .= '<tr><td><a href="'.base_url().'aktivasi/'.$random.'">AKTIVASI AKUN</a></td></tr>';
		$isi .= '<tr><td><p>Terima Kasih, Salam Hormat</p></td></tr>';
		$isi .= '</table>';
		
		$ci->email->from('noreply@sosben.com', 'noreply');
		$ci->email->to($email);
		$ci->email->subject('AKTIFASI AKUN SOSIAL BENCANA');
		$ci->email->message($isi);
		$this->email->send();

        $data = array(
            'num' => $num,
            'id_level'=> 2,
            'id_status'=> 2,
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'token'=> $random,
            'tanggal' => date('Y-m-d H:i:s'),
        );
        return $this->db->insert('user',$data);
    }

    public function cekAktivasi($token)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('token', $token);
        return $this->db->get();
    }

    public function updateAktivasi($token)
    {
        $data = array(
            'id_status' => '1',
            'verifikasi' => date('Y-m-d H:i:s'),
        );
        $this->db->where('token', $token);
        return $this->db->update('user', $data);
    }

    public function dataUser()
    {
        return $this->db->get('user');
    }
}
