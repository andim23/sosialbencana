<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level_model extends CI_Model {

    public function getLevel()
    {
        return $this->db->get('level');
    }

    private function autoIncrement()
    {
        $this->db->select_max('kode_level');
        $data = $this->db->get('level')->row_array();
        return $data['kode_level']+1;
    }

    public function createLevel()
    {
        $kode = $this->autoIncrement();
        $data = array(
            'kode_level'        => $kode,
            'level'             => $this->input->post('level'),
            'tanggal'           => date('Y-m-d H:i:s'),
        );
        return $this->db->insert('level', $data);
    }

    public function updateLevel($where)
    {
        $data = array(
            'level'             => $this->input->post('level'),
            'tanggal'           => date('Y-m-d H:i:s'),
        );
        $this->db->where('kode_level', $where);
        return $this->db->update('level', $data);
    }

    public function deleteLevel($where)
    {
        $this->db->where('kode_level', $where);
        return $this->db->delete('level');
    }
}
