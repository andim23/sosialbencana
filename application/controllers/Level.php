<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Level_model');
    }

    public function index()
    {
        $level          = $this->Level_model->getLevel()->result_array();
        $data = array(
            'level'         => $level,
        );
        $this->load->view('Admin/Level/index', $data);
    }

    public function p_tambah()
    {
        // VALIDASI
        $this->form_validation->set_rules('level', 'Level', 'trim|required|xss_clean');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong!');

        if($this->form_validation->run() == FALSE)
        {
            $level          = $this->Level_model->getLevel()->result_array();
            $data = array(
                'level'         => $level,
            );
            $this->load->view('Admin/Level/index', $data);
        }
        else
        {
            $this->Level_model->createLevel();
            $this->session->set_flashdata('sukses', 'Berhasil Menambahkan Data');
            redirect(base_url('level'));
        }
    }

    public function p_edit()
    {
        // VALIDASI
        $this->form_validation->set_rules('level', 'Level', 'trim|required|xss_clean');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong!');

        $kode = $this->input->post('kode_level');

        if($this->form_validation->run() == FALSE)
        {
            $level          = $this->Level_model->getLevel()->result_array();
            $data = array(
                'level'         => $level,
            );
            $this->load->view('Admin/Level/index', $data);
        }
        else
        {
            $this->Level_model->updateLevel($kode);
            $this->session->set_flashdata('sukses', 'Berhasil Mengubah Data');
            redirect(base_url('level'));
        }
    }

    public function hapus($kode)
    {
        $this->Level_model->deleteLevel($kode);
        $this->session->set_flashdata('sukses', 'Berhasil Menghapus Data');
        redirect(base_url('level'));
    }
}