<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Api_model');
    }

    public function login_api()
    {
        $data1 = $this->Api_model->getuser()->result();
        if($data1)
        {
            echo json_encode(array('result' => $data1), TRUE);    
        }
        else
        {
            echo json_encode(array(
                'result' => 'Error',
                'message' => 'Data Kosong'
            ));
        }
    }

    public function posting_api()
    {
        $data = array(
            'nama_img'=>$this->input->post(''),
            'tipe_img'=>$this->input->post(''),
            'size_img'=>$this->input->post(''),
            'slug_post'=>$this->input->post(''),
            'lttd_img'=>$this->input->post(''),
            'lgttd_img'=>$this->input->post(''),
            'lokasi'=>$this->input->post(''),
            'lttd_log'=>$this->input->post(''),
            'lgttd_log'=>$this->input->post('')
        );
    }
}