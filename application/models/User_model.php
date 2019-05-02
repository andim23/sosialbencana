<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function getUser()
    {
        return $this->db->get('user');
    }

    public function createUser()
    {
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_'; 
        $random = str_repeat(str_shuffle($str),4);

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
            'user_kode'     => $this->input->post('user_kode'),
            'id_level'      => $this->input->post('level'),
            'id_status'     => $this->input->post('status'),
            'email'         => $email,
            'password'      => password_hash($password, PASSWORD_BCRYPT),
            'token'         => $random,
            'tanggal'       => date('Y-m-d H:i:s'),
        );
        $this->db->insert('user',$data);
        return $this->db->affected_rows();
    }

    public function updateUser($where)
    {
        $data = array(
            'id_level'      => $this->input->post('level'),
            'id_status'     => $this->input->post('status'),
            'nama'          => $this->input->post('nama'),
            'email'         => $this->input->post('email'),
            'tgl_lahir'     => $this->input->post('tgl_lahir'),
            'j_kel'         => $this->input->post('j_kel'),
            'phone'         => $this->input->post('phone'),
        );
        $this->db->where('user_kode', $where);
        return $this->db->update('user', $data);
    }

    public function deleteUser($where)
    {
        $this->db->where('user_kode', $where);
        $this->db->delete('user');
        return $this->db->affected_rows();
    }

    public function detaiLUser($where)
    {
        $this->db->where('user_kode', $where);
        return $this->db->get('user');
    }
}
