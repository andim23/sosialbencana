<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('Auth_model');
    }
    
    public function user_api()
    {
        $data1 = $this->Auth_model->dataUser()->result();
        echo json_encode($data1);
    }

    public function post_api()
    {
        $data1 = $this->Home_model->dataPost()->result();
        echo json_encode($data1);
    }
}
