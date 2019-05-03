<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting_model extends CI_Model {

    public function getPost()
    {
        return $this->db->get('post');
    }

    private function autoIncrement()
    {
        $this->db->select_max('slug_post');
        $data = $this->db->get('post')->row_array();
        return $data['slug_post']+1;
    }

    public function createPost($name)
    {
        $slug = $this->autoIncrement();
        $data = array(
            'nama_img'      => $name,
            'api_img'       => base_url('uploads/').$name,
            'slug_post'     => $slug,
            'lokasi'        => $this->input->post('lokasi'),
            'lttd_loc'      => $this->input->post('latitude'),
            'lgttd_loc'     => $this->input->post('longitude'),
            'caption'       => $this->input->post('caption'),
            'tanggal'       => date('Y-m-d'),
            'waktu'         => date('H:i:s'),
            'user_kode'     => 'admin',
        );
        return $this->db->insert('post', $data);
    }

    public function updatePost($where, $name)
    {
        $data = array(
            'nama_img'      => $name,
            'api_img'       => base_url('uploads/').$name,
            'lokasi'        => $this->input->post('lokasi'),
            'lttd_loc'      => $this->input->post('latitude'),
            'lgttd_loc'     => $this->input->post('longitude'),
            'caption'       => $this->input->post('caption'),
            'tanggal'       => date('Y-m-d'),
            'waktu'         => date('H:i:s'),
            'user_kode'     => 'admin',
        );
        $this->db->where('id_post', $where);
        return $this->db->update('post', $data);
    }

    public function deletePost($where, $img)
    {
        $this->db->where('id_post', $where);
        $this->db->where('nama_img', $img);
        return $this->db->delete('post');
    }

    public function detailPost($where)
    {
        $this->db->where('id_post', $where);
        return $this->db->get('post');
    }
}
