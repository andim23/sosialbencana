<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_model extends CI_Model {

    public function getStatus()
    {
        return $this->db->get('status');
    }

    private function autoIncrement()
    {
        $this->db->select_max('kode_status');
        $data = $this->db->get('status')->row_array();
        return $data['kode_status']+1;
    }

    public function createStatus()
    {
        $kode = $this->autoIncrement();
        $data = array(
            'kode_status'       => $kode,
            'nama_status'       => $this->input->post('nama_status'),
            'tanggal'           => date('Y-m-d H:i:s'),
        );
        return $this->db->insert('status', $data);
    }

    public function updateStatus($where)
    {
        $data = array(
            'nama_status'       => $this->input->post('nama_status'),
            'tanggal'           => date('Y-m-d H:i:s'),
        );
        $this->db->where('kode_status', $where);
        return $this->db->update('status', $data);
    }

    public function deleteStatus($where)
    {
        $this->db->where('kode_status', $where);
        return $this->db->delete('status');
    }
}
