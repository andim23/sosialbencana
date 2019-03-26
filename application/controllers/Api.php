<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Home_model');
    }
    
    public function user_api()
    {
        $data1 = $this->Home_model->getUser();
        echo json_encode($data1);
    }
}
