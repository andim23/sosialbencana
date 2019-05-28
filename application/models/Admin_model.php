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

    public function get($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        return $this->db->get()->result_array();
    }

    // public function statistik_post()
    // {
    //     $query = $this->db->query("SELECT DATE_FORMAT(tanggal,'%d') AS tgl,COUNT(id_post) AS jumlah FROM post WHERE MONTH(tanggal)=MONTH(CURDATE()) GROUP BY DATE(tanggal)");

    //     if($query->num_rows() > 0){
    //         foreach($query->result() as $data){
    //             $hasil[] = $data;
    //         }
    //         return $hasil;
    //     }
    // }
}
