<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jumlah_model extends CI_Model {

    public function jumlahUser()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->num_rows();
    }

    public function jumlahPost()
    {
        $this->db->select('*');
        $this->db->from('post');
        return $this->db->get()->num_rows();
    }

    public function jumlahReact()
    {
        $this->db->select('*');
        $this->db->from('reaction');
        return $this->db->get()->num_rows();
    }

    public function jumlahLevel()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->num_rows();
    }

    public function jumlahKategori()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->num_rows();
    }

    /** 
     * ---------- PRESENTASI ----------
     */
    public function userAktif()
    {
        $this->db->select('id_status');
        $this->db->from('user');
        $this->db->where('id_status', 1);
        return $this->db->get()->num_rows();
    }

    public function userTidakAktif()
    {
        $this->db->select('id_status');
        $this->db->from('user');
        $this->db->where('id_status', 2);
        return $this->db->get()->num_rows();
    }
}
