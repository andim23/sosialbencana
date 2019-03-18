<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function cekUser($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('users_email', $email);
        return $this->db->get();
    }
}
