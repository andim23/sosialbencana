<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_admin extends CI_Controller {

    /**
     * PT = PROSES TAMBAH
     * PU = PROSES UPDATE
     */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Jumlah_model');
    }
    
    public function index()
    {
        $data1 = $this->Jumlah_model->jumlahUser();
        $data2 = $this->Jumlah_model->jumlahReact();
        $data3 = $this->Jumlah_model->jumlahPost();
        $data4 = $this->Jumlah_model->userAktif();
        $data5 = $this->Jumlah_model->userTidakAktif();
        $data = array(
            'user' => $data1,
            'react' => $data2,
            'post' => $data3,
            'aktif' => $data4,
            'tidakAktif' => $data5,
        );
        $this->load->view('Admin/index', $data);
    }
    /** 
     * ---------- USER ----------
     */
    /* ----- USER ----- */
    public function user()
    {
        $data1 = $this->Admin_model->dataUser()->result_array();
        $data2 = $this->Admin_model->dataLevel()->result_array();
        $data3 = $this->Admin_model->dataStatus()->result_array();
        $data = array(
            'user' => $data1,
            'level' => $data2,
            'status' => $data3,
        );
        // print_r($data);
        $this->load->view('Admin/User/index', $data);
    }

    public function detailuser($kode)
    {
        $data1 = $this->Admin_model->detailUser($kode)->row_array();
        $data = array(
            'user' => $data1,
        );
        $this->load->view('Admin/User/detail', $data);
    }

    public function tambahuser()
    {
        $data1 = $this->Admin_model->dataLevel()->result_array();
        $data2 = $this->Admin_model->dataStatus()->result_array();
        $data = array(
            'level' => $data1,
            'status' => $data2,
        );
        $this->load->view('Admin/User/tambah', $data);
    }

    public function pt_user()
    {
        // VALIDASI
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|is_unique[user.username]');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|xss_clean|valid_email|valid_emails|is_unique[user.email]');
        $this->form_validation->set_rules('level', 'Level', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[8]');
        $this->form_validation->set_rules('konfirmasi', 'Konfirmasi Password', 'trim|required|xss_clean|matches[password]');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong!');
        $this->form_validation->set_message('is_unique', 'Maaf! <b>%s</b> Telah Digunakan. Harap Menggunakan Akun lain.');
        $this->form_validation->set_message('valid_email', 'Maaf! <b>%s</b> Tidak Valid');
        $this->form_validation->set_message('valid_emails', 'Maaf! <b>%s</b> Tidak Valid');
        $this->form_validation->set_message('matches', 'Maaf! <b>%s</b> Tidak Sama.');
        $this->form_validation->set_message('min_length', 'Maaf! <b>%s</b> Minimal <b>%s</b> Karakter.');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('Admin/User/tambah');
        }
        else
        {
            $this->Admin_model->tambahUser();
            $this->session->set_flashdata('sukses', 'Berhasil Melakukan Registrasi!');
            redirect(base_url('admin/user'));
        }
    }

    public function edituser($kode)
    {
        $data1 = $this->Admin_model->detailUser($kode)->row_array();
        $data = array(
            'user' => $data1,
        );
        $this->load->view('Admin/User/edit', $data);
    }

    public function pu_user()
    {

    }

    public function hapususer($kode)
    {
        if($this->Admin_model->hapusUser($kode))
        {
            $this->session->set_flashdata('sukses', 'Berhasil Menghapus Data');
            redirect(base_url('admin/user'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Gagal Menghapus Data');
            redirect(base_url('admin/user'));
        }
    }

    /* ----- LEVEL USER ----- */
    public function leveluser()
    {
        $data1 = $this->Admin_model->dataLevel()->result_array();
        $data2 = $this->Jumlah_model->jumlahLevel();
        $data = array(
            'level' => $data1,
            'jumlahlevel' => $data2+1,
        );
        $this->load->view('Admin/User/leveluser', $data);
    }

    public function pt_leveluser()
    {
        // VALIDASI
        $this->form_validation->set_rules('kode', 'Kode Level', 'trim|required|xss_clean|is_unique[level.kode_level]');
        $this->form_validation->set_rules('level', 'Nama Level', 'trim|required|xss_clean');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong.');
        $this->form_validation->set_message('is_unique', 'Maaf! <b>%s</b> Telah Digunakan');

        if($this->form_validation->run() == FALSE)
        {
            $data1 = $this->Admin_model->dataLevel()->result_array();
            $data = array(
                'level' => $data1,
            );
            $this->load->view('Admin/User/leveluser', $data);
        }
        else
        {
            $this->Admin_model->tambahLevel();
            $this->session->set_flashdata('sukses', 'Berhasil Menambahkan Data');
            redirect(base_url('admin/leveluser'));
        }
    }

    public function pu_leveluser()
    {
        // VALIDASI
        $this->form_validation->set_rules('kode', 'Kode Level', 'trim|required|xss_clean');
        $this->form_validation->set_rules('level', 'Nama Level', 'trim|required|xss_clean');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong.');

        if($this->form_validation->run() == FALSE)
        {
            $data1 = $this->Admin_model->dataLevel()->result_array();
            $data = array(
                'level' => $data1,
            );
            $this->load->view('Admin/User/leveluser', $data);
        }
        else
        {
            $this->Admin_model->ubahLevel($this->input->post('kode'));
            $this->session->set_flashdata('sukses', 'Berhasil Mengubah Data');
            redirect(base_url('admin/leveluser'));
        }
    }

    public function hapusleveluser($kode)
    {
        $query = $this->Admin_model->hapusLevel($kode);
        if($query)
        {
            $this->session->set_flashdata('sukses', 'Berhasil Menghapus Data');
            redirect(base_url('admin/leveluser'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Gagal Menghapus Data');
            redirect(base_url('admin/leveluser'));
        }
    }

    /* ----- STATUS USER ----- */
    public function statususer()
    {
        $data1 = $this->Admin_model->dataStatus()->result_array();
        $data2 = $this->Jumlah_model->jumlahStatus();
        $data = array(
            'status' => $data1,
            'jumlahstatus' => $data2+1,
        );
        $this->load->view('Admin/User/statususer', $data);
    }

    public function pt_statususer()
    {
        // VALIDASI
        $this->form_validation->set_rules('kode', 'Kode Status', 'trim|required|xss_clean|is_unique[status.kode_status]');
        $this->form_validation->set_rules('status', 'Nama Status', 'trim|required|xss_clean');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong.');
        $this->form_validation->set_message('is_unique', 'Maaf! <b>%s</b> Telah Digunakan');

        if($this->form_validation->run() == FALSE)
        {
            $data1 = $this->Admin_model->dataStatus()->result_array();
            $data = array(
                'status' => $data1,
            );
            $this->load->view('Admin/User/statususer', $data);
            // echo validation_errors();
        }
        else
        {
            $this->Admin_model->tambahStatus();
            $this->session->set_flashdata('sukses', 'Berhasil Menambahkan Data');
            redirect(base_url('admin/statususer'));
        }
    }

    public function pu_statususer()
    {
        // VALIDASI
        $this->form_validation->set_rules('kode', 'Kode Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status', 'Nama Status', 'trim|required|xss_clean');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong.');

        if($this->form_validation->run() == FALSE)
        {
            $data1 = $this->Admin_model->dataStatus()->result_array();
            $data = array(
                'status' => $data1,
            );
            $this->load->view('Admin/User/statususer', $data);
        }
        else
        {
            $this->Admin_model->ubahStatus($this->input->post('kode'));
            $this->session->set_flashdata('sukses', 'Berhasil Mengubah Data');
            redirect(base_url('admin/statususer'));
        }
    }

    public function hapusstatususer($kode)
    {
        $query = $this->Admin_model->hapusStatus($kode);
        if($query)
        {
            $this->session->set_flashdata('sukses', 'Berhasil Menghapus Data');
            redirect(base_url('admin/statususer'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Gagal Menghapus Data');
            redirect(base_url('admin/statususer'));
        }
    }

    // DELETE
    public function deleteprofile($id)
    {
        $where=array(
            'id'=>$id
        );
        if($this->Admin_model->delete($where,'pengguna')){
            redirect();
        }
        else{
            redirect();
        }
    }

    public function deletelevel($id)
    {
        $where=array(
            'id'=>$id
        );
        if($this->Admin_model->delete($where,'sosben_leveluser')){
            redirect();
        }
        else{
            redirect();
        }
    }

    public function deletestatus($id)
    {
        $where=array(
            'id'=>$id
        );
        if($this->Admin_model->delete($where,'sosben_statususer')){
            redirect();
        }
        else{
            redirect();
        }
    }

    // CREATE
    public function createprofile($table, $data)
    {
    
    }

    public function createlevel()
    {
        $data=array(
            'leveluser_kode'=>$this->input->post(''),
            'leveluser_nama'=>$this->input->post('')
        );
        if($this->Admin_model->insert('sosben_leveluser',$data)){
            $this->session->set_flashdata('success_add_level', 'Berhasil menambahkan data');
            redirect();
        }
        else{
            $this->session->set_flashdata('error_add_status', 'Maaf data gagal ditambahkan');
            redirect();
        }
    }

    public function createstatus()
    {
        $data=array(
            'statususer_kode'=>$this->input->post(''),
            'statususer_nama'=>$this->input->post('')
        );
        if($this->Admin_model->insert('sosben_statususer',$data)){
            $this->session->set_flashdata('success_add_status', 'Berhasil menambahkan data');
            redirect();
        }
        else{
            $this->session->set_flashdata('error_add_status', 'Maaf data gagal ditambahkan');
            redirect();
        }
    }

    // UPDATE

    public function editprofile($table, $data)
    {
    
    }

    public function editlevel()
    {
        $id=$this->input->post(id);
        $where=array('id'=> $id);
        $data=array(
            'leveluser_kode'=>$this->input->post(''),
            'leveluser_nama'=>$this->input->post('')
        );
        if($this->Admin_model->update('sosben_leveluser', $where, $data)){
            $this->session->set_flashdata('success_edit_level', 'Berhasil memperbarui data');
            redirect(); 
        }
        else{
            $this->session->set_flashdata('error_edit_level', 'Maaf data diperbarui');
            redirect();
        }
    }

    public function editstatus()
    {
        $id=$this->input->post(id);
        $where=array('id'=> $id);
        $data=array(
            'statususer_kode'=>$this->input->post(''),
            'statususer_nama'=>$this->input->post('')
        );
        if($this->Admin_model->update('sosben_statususer', $where, $data)){
            $this->session->set_flashdata('success_edit_status', 'Berhasil memperbarui data');
            redirect(); 
        }
        else{
            $this->session->set_flashdata('error_edit_status', 'Maaf data diperbarui');
            redirect();
        }
    }

    public function userposting($username)
    {
        $data1 = $this->Admin_model->userPosting($username)->result();
        if($data1)
        {
            echo json_encode(array(
                'result' => $data1,
            ));
        }
        else
        {
            echo json_encode(array(
                'result' => 'Error',
                'message' => 'Postingan Kosong'
            ));
        }
    }
}
