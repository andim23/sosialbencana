<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Status_model');
    }

    public function index()
    {
        $status          = $this->Status_model->getStatus()->result_array();
        $data = array(
            'status'         => $status,
        );
        $this->load->view('Admin/Status/index', $data);
    }

    public function p_tambah()
    {
        // VALIDASI
        $this->form_validation->set_rules('nama_status', 'Status', 'trim|required|xss_clean');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong!');

        if($this->form_validation->run() == FALSE)
        {
            $status          = $this->Status_model->getStatus()->result_array();
            $data = array(
                'status'         => $status,
            );
            $this->load->view('Admin/Status/index', $data);
        }
        else
        {
            $this->Status_model->createStatus();
            $this->session->set_flashdata('sukses', 'Berhasil Menambahkan Data');
            redirect(base_url('status'));
        }
    }

    public function p_edit()
    {
        // VALIDASI
        $this->form_validation->set_rules('nama_status', 'Status', 'trim|required|xss_clean');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong!');

        $kode = $this->input->post('kode_status');

        if($this->form_validation->run() == FALSE)
        {
            $status          = $this->Status_model->getStatus()->result_array();
            $data = array(
                'status'         => $status,
            );
            $this->load->view('Admin/Status/index', $data);
        }
        else
        {
            $this->Status_model->updateStatus($kode);
            $this->session->set_flashdata('sukses', 'Berhasil Mengubah Data');
            redirect(base_url('status'));
        }
    }

    public function hapus($kode)
    {
        $this->Status_model->deleteStatus($kode);
        $this->session->set_flashdata('sukses', 'Berhasil Menghapus Data');
        redirect(base_url('status'));
    }
}