<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {

    public function get($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        return $this->db->get();
    }

    public function getuser()
    {
        $this->db->select('id_user,username,password');
        $this->db->from('user');
        return $this->db->get();
    }

}
