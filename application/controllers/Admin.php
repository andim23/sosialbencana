<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
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

    // VIEW
    public function profile()
	{
        $data=array(
            'level'=>$this->Dokterumum_model->get('pengguna')
        );
        $this->load->view('',$data);
    }
    public function level()
	{
        $data=array(
            'level'=>$this->Dokterumum_model->get('sosben_leveluser')
        );
        $this->load->view('',$data);
    }

    public function status()
	{
        $data=array(
            'status'=>$this->Dokterumum_model->get('sosben_statususer')
        );
        $this->load->view('',$data);
    }

    // ADD IMAGE
    public function proses_addimage()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->form_validation->set_rules('', '', 'trim|required|xss_clean');
        $this->form_validation->set_rules('', ' ', 'required');
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('');
        }
        else
        {
            $config['upload_path']   = "";
            $config['allowed_types'] = "jpg|png|jpeg";
            $config['max_size']      = "10240";
            $config['remove_space']  = TRUE;
            $config['encrypt_name'] = TRUE;
            
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $this->load->library('image_lib');
                $upload = array(
                    'upload_data' => $this->upload->data()
                );
                $resize=$this->upload->data();

                $configer =  array(
                    'image_library'   => 'gd2',
                    'source_image'    =>  $resize['full_path'],
                    'create_thumb' => FALSE,
                    'maintain_ratio'  =>  FALSE,
                    'width'           =>  1170,
                    'height'          =>  570,
                  );
                  $this->image_lib->clear();
                  $this->image_lib->initialize($configer);
                  

                  if($this->image_lib->resize()){

                      $slug   = url_title($this->input->post(''), 'dash', TRUE);
                      $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
                      $random = date('Y-m-d h:i:s').substr(str_shuffle($str), 0,15);
                      $kodeunik = md5($random);
                      $timestart=strtotime($this->input->post('tanggalawal'));
                      $timeend=strtotime($this->input->post('tanggalakhir'));
                      $newtimestart=date('m-d-Y',$timestart);
                      $newtimeend=date('m-d-Y',$timeend);

                      $data = array(
                          'id_user'=>'',
                          'slug' => $slug,
                          'nama' => $upload['upload_data']['file_type'],
                          'deskripsi' => $upload['upload_data']['file_size'],
                          'status' => $this->input->post(''),
                          'gambar' => $upload['upload_data']['file_type'],
                          'tanggal_post' => $newtimestart,
                          'tanggal'=>''
                      );
                      
                      $this->Admin_model->Insert('post', $data);
                      redirect(base_url(''));
                  }
                  else{
                    $this->session->set_flashdata('error_add_image', 'Maaf image gagal ditambahkan.');
                    redirect(base_url(''));
                  }
            }
            else{
                $this->session->set_flashdata('error_add_image', 'Maaf image gagal ditambahkan.');
                redirect(base_url(''));
            }
        }
    }

    // EDIT IMAGE
    public function proses_editimage()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->form_validation->set_rules('', '', 'trim|required|xss_clean');
        $this->form_validation->set_rules('', 'isi ', 'required');
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('');
        }
        else
        {
            $kode=$this->input->post('');

            if($_FILES['gambar1']['name']=="")
            {
                
                $where = array('id' => $kode);
                $slug   = url_title($this->input->post(''), 'dash', TRUE);
    
                $data=array(
                    'id_user'=>'',
                          'slug' => $slug,
                          'nama' => $upload['upload_data']['file_type'],
                          'deskripsi' => $upload['upload_data']['file_size'],
                          'status' => $this->input->post(''),
                          'gambar' => $upload['upload_data']['file_type'],
                          'tanggal_post' => $newtimestart,
                          'tanggal'=>''
                );
                if($this->Admin_model->update('post',$where,$data)){
                    $this->session->set_flashdata('succes_edit_image', 'Image berhasil diperbarui.');
                    redirect(base_url(''));
                }
                else{
                    $this->session->set_flashdata('error_edit_berita', 'Maaf image gagal diperbarui.');
                    redirect(base_url(''));
                }
            }
    
            else
            {
                $where = array('id' => $kode);
                $image=$this->Pengelola_model->getwhere('post',$where);
                
                if(isset($image))
                {
                    $link='./asset/image_berita/'.$image->nama_file;
                    unlink($link);
                   
                    $config['upload_path']   = "";
                    $config['allowed_types'] = "jpg|png|jpeg";
                    $config['max_size']      = "10240";
                    $config['remove_space']  = TRUE;
                    $config['encrypt_name'] = TRUE;
                    
                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('')) 
                    {
                        $this->load->library('image_lib');
                        $upload = array(
                            'upload_data' => $this->upload->data()
                        );
                        $resize=$this->upload->data();

                        $configer =  array(
                            'image_library'   => 'gd2',
                            'source_image'    =>  $resize['full_path'],
                            'create_thumb' => FALSE,
                            'maintain_ratio'  =>  FALSE,
                            'width'           =>  1170,
                            'height'          =>  570,
                        );
                        $this->image_lib->clear();
                        $this->image_lib->initialize($configer);
                        

                        if($this->image_lib->resize())
                        {
                            $slug   = url_title($this->input->post('judul_berita'), 'dash', TRUE);

                            $data = array(
                                'nama_file' => $upload['upload_data']['file_name'],
                                'tipe_file' => $upload['upload_data']['file_type'],
                                'ukuran_file' => $upload['upload_data']['file_size'],
                                'judul_berita' => $this->input->post(''),
                                'slug_berita' => $slug,
                                'artikel_berita' => $this->input->post(''),
                                'tanggal' => date('Y-m-d'),
                                'waktu' => date('h:i:s'),
                            );

                            if($this->Pengelola_model->update('post',$where,$data))
                            {
                                $this->session->set_flashdata('succes_edit_image', 'Image Berhasil diperbarui.');
                                redirect(base_url(''));
                            }
                            else
                            {
                                $this->session->set_flashdata('error_edit_image', 'Maaf image gagal diperbarui.');
                                redirect(base_url(''));
                            }

                        }
                        else
                        {
                            $this->session->set_flashdata('error_edit_image', 'Maaf image gagal diperbarui.');
                            redirect(base_url(''));
                        }

                    }
                }
                else
                {
                    $this->session->set_flashdata('error_edit_image', 'Maaf image gagal diperbarui');
                    redirect(base_url(''));
                }
             }
        }
    }

     // DELETE IMAGE
     public function deleteimage($id)
     {
         $where=array(
             'id'=>$id
         );
         if($this->Admin_model->delete($where,'post')){
             redirect();
         }
         else{
             redirect();
         }
     }

     // VIEW IMAGE
    public function image()
	{
        $data=array(
            'image'=>$this->Dokterumum_model->get('post')
        );
        $this->load->view('',$data);
    }
}
