<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('ApiUser_model', 'apiuser');
    }

    public function post()
    {
        $post = $this->apiuser->getPost();
        if($post->num_rows() > 0)
        {
            echo json_encode(array(
                'result'        => $post->result(),
            ), TRUE);
            $this->output->set_status_header(200);
        }
        else
        {
            echo json_encode(array(
                'result' => 'Error',
                'message' => 'Data Kosong'
            ));
            $this->output->set_status_header(422);
        }
    }

    public function getPostdetail($slug)
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            //$slug=$this->input->get('slug');

            if($slug == NULL)
            {
                echo json_encode(array(
                    'status'        => false,
                    'message'       => 'Data Tidak Ditemukan'
                ));
                $this->output->set_status_header(422);
            }
            else
            {
                $posting     = $this->apiuser->getPostdetail($slug);
                if($posting->num_rows() > 0)
                {
                    echo json_encode(array(
                        'status'        => true,
                        'data'       => $posting->row_array()
                    ));
                }
                else
                {
                    echo json_encode(array(
                        'status'        => false,
                        'message'       => 'Data Tidak Ada'
                    ));
                    $this->output->set_status_header(422);
                }
            }
        }
        else
        {
            echo json_encode(array(
                'status'        => false,
                'message'       => 'REQUEST DENIED'
            ));
            $this->output->set_status_header(422);
        }
    }
}
