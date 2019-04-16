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
}
