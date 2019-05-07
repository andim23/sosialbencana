<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relawan_model extends CI_Model {

    public function newRelawan()
    {
        $this->db->where('id_status', 4);
        $this->db->order_by('id_user', 'DESC');
        return $this->db->get('user');
    }

    public function registerRelawan()
    {
        $data = array(
            'user_kode'         => $this->input->post('user_kode'),
            'id_relawan'        => 2,
            'id_status'         => 2,
            'email'             => $this->input->post('email'),
            'tanggal'           => date('Y-m-d H:i:s'),
        );
        return $this->db->insert('user', $data);
    }
}
