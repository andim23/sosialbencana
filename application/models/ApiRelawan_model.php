<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiRelawan_model extends CI_Model {

    private function autoIncrement()
    {
        $this->db->select_max('slug_post');
        $data = $this->db->get('post')->row_array();
        return $data['slug_post']+1;
    }

    public function getEmailRelawan($email)
    {
        $this->db->select('email');
        $this->db->from('user');
        $this->db->where('email', $email);
        return $this->db->get();
    }

    public function registerRelawan()
    {
        $data = array(
            'user_kode'         => $this->input->post('user_kode'),
            'id_relawan'        => 2,
            'id_status'         => 4,
            'email'             => $this->input->post('email'),
            'tanggal'           => date('Y-m-d H:i:s'),
        );
        return $this->db->insert('user', $data);
    }

    public function detailRelawan($where = NULL)
    {
        $this->db->where('user_kode', $where);
        return $this->db->get('user');
    }

    public function updateRelawan($where = NULL)
    {
        $data = array(
            'nama'                  => $this->input->post('nama'),
            'email'                 => $this->input->post('email'),
            'tgl_lahir'             => $this->input->post('tgl_lahir'),
            'j_kel'                 => $this->input->post('j_kel'),
            'phone'                 => $this->input->post('phone'),
        );
        $this->db->where('user_kode', $where);
        return $this->db->update('user', $data);
    }

    public function getPost()
    {
        $this->db->order_by('id_post', 'DESC');
        return $this->db->get('post');
    }

    public function getPostRelawan($where = NULL)
    {
        $this->db->order_by('id_post', 'DESC');
        $this->db->where('user_kode', $where);
        return $this->db->get('post');
    }

    public function createPost($imagepath1, $imagepath2)
    {
        $slug = $this->autoIncrement();
        $data = array(
            'nama_img'      => $imagepath1,
            'api_img'       => base_url().$imagepath2,
            'slug_post'     => $slug,
            'lokasi'        => $this->input->post('lokasi'),
            'lttd_loc'      => $this->input->post('latitude'),
            'lgttd_loc'     => $this->input->post('longitude'),
            'caption'       => $this->input->post('caption'),
            'tanggal'       => date('Y-m-d'),
            'waktu'         => date('H:i:s'),
            'user_kode'     => $this->input->post('user_kode'),
        );
        return $this->db->insert('post', $data);
    }

    public function deletePost($where)
    {
        $this->db->where($where);
        $res=$this->db->delete('post');
        return $res;
    }

    public function getwhererow($row,$table,$where)
    {
        $this->db->select($row);
        $this->db->from($table);
        $this->db->where($where); 
        $query = $this->db->get();
        return $query->row();
    }

    public function Update($table, $where, $isi)
    {
        $this->db->where($where);
        return $this->db->update($table, $isi);
    }
}
