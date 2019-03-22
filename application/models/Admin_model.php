<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

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
