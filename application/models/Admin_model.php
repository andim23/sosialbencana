<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    /** 
     * ---------- USER ----------
     */
    /* ----- LEVEL USER ----- */
    public function dataUser()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get();
    }

    public function detailUser($kode)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('num', $kode);
        return $this->db->get();
    }

    public function tambahUser()
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
            'id_level'=> $this->input->post('level'),
            'id_status'=> $this->input->post('status'),
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'token'=> $random,
            'tanggal' => date('Y-m-d H:i:s'),
        );
        return $this->db->insert('user',$data);
    }

    public function hapusUser($where)
    {
        $this->db->where('num', $where);
        return $this->db->delete('user');
    }

    /* ----- LEVEL USER ----- */
    public function dataLevel()
    {
        $this->db->select('*');
        $this->db->from('level');
        return $this->db->get();
    }

    public function tambahLevel()
    {
        $data = array(
            'kode_level' => $this->input->post('kode'),
            'level' => $this->input->post('level'),
            'tanggal' => date('Y-m-d H:i:s'),
        );
        return $this->db->insert('level', $data);
    }
    /* ----- STATUS USER ----- */

    public function delete($where,$table)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }

    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function update($table, $id, $data)
    {
        $this->db->where($id);
        return $this->db->update($table, $data);
    }

    public function get($table)
    {
        $query=$this->db->get($table);
        return $query->result_query();
    }
}
