<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function activityUser()
    {
        $this->db->select('lokasi, caption, tanggal, waktu, user_kode');
        $this->db->order_by('id_post', 'DESC');
        $this->db->limit(5,0);
        return $this->db->get('post');
    }
}
