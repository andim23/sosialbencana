<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }
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

    /* ----- LEVEL USER ----- */
    public function dataLevel()
    {
        $this->db->select('*');
        $this->db->from('level');
        return $this->db->get();
    }

    public function tambahLevel()
    {
        $data = array(
            'kode_level' => $this->input->post('kode'),
            'level' => $this->input->post('level'),
            'tanggal' => date('Y-m-d H:i:s'),
        );
        return $this->db->insert('level', $data);
    }

    public function ubahLevel($where)
    {
        $data = array(
            'level' => $this->input->post('level'),
        );
        $this->db->where('kode_level', $where);
        return $this->db->update('level', $data);
    }

    public function hapusLevel($where)
    {
        $this->db->where('kode_level', $where);
        return $this->db->delete('level');
    }

    /* ----- STATUS USER ----- */
    public function dataStatus()
    {
        $this->db->select('*');
        $this->db->from('status');
        return $this->db->get();
    }

    public function list()
    {
        $this->db->select('user.*, status.nama_status');
        $this->db->from('user');
        $this->db->join('user', 'user.id_user = status.nama_status', 'LEFT');
        $query = $this->db->get();
        return $query->result();
    }

    public function tambahStatus()
    {
        $data = array(
            'kode_status' => $this->input->post('kode'),
            'nama_status' => $this->input->post('status'),
            'tanggal' => date('Y-m-d H:i:s'),
        );
        return $this->db->insert('status', $data);
    }

    public function ubahStatus($where)
    {
        $data = array(
            'nama_status' => $this->input->post('status'),
        );
        $this->db->where('kode_status', $where);
        return $this->db->update('status', $data);
    }

    public function hapusStatus($where)
    {
        $this->db->where('kode_status', $where);
        return $this->db->delete('status');
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
