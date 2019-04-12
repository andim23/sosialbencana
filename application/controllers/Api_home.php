<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('Auth_model');
    }
    
    public function user_api()
    {
        $data1 = $this->Auth_model->dataUser()->result();
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

    public function post_api()
    {
        $data1 = $this->Home_model->dataPost()->result();
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
}
