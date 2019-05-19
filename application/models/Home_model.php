<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function getUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function dataPost()
    {
        return $this->db->get('post');
    }

    public function getPost()
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->order_by('id_post', 'DESC');
        $this->db->limit(6);
        $res = $this->db->get();        
        return $res->result_array();
    }
}
