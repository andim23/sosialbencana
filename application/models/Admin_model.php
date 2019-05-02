<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct(){
        $this->load->database();
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
