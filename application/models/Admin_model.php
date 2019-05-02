<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    /** 
     * ---------- USER ----------
     */
    /* ----- LEVEL USER ----- */
    public function tambahUser()
    {
        
    }

    public function hapusUser($where)
    {
        $this->db->where('num', $where);
        return $this->db->delete('user');
    }

    public function userPosting($where)
    {
        $this->db->where('username', $where);
        return $this->db->get('post');
    }

    public function insert($table,$data)
    {
        return $this->db->insert($table, $data);
    }
}
