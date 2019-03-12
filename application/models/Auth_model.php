<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function insert($table,$data)
    {
        return $this->db->insert($table, $data); 
    }

    public function cekUser($username)
    {
        $this->db->select('*');
        $this->db->from('diskomin_user');
        $this->db->where('username', $username);
        $cek = $this->db->get();
        return $cek;
    }
}
