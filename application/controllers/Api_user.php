<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Home_model');
    }

    public function post()
    {
        $post = $this->Home_model->dataPost()->result();
        if($post)
        {
            echo json_encode(array('result' => $post), TRUE);    
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
