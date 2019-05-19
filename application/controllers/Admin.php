<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Jumlah_model');
    }
    
    public function index()
    {
        $user           = $this->Jumlah_model->jumlahUser();
        $post           = $this->Jumlah_model->jumlahPost();
        $activity       = $this->Admin_model->activityUser()->result_array();
        $stastitik      = $this->Admin_model->statistik_post();
        $data = array(
            'user'      => $user,
            'post'      => $post,
            'activity'  => $activity,
            'stastitik' => $stastitik
        );
        //echo var_dump($stastitik) ;
        $this->load->view('Admin/index', $data);
    }

    public function listAPI()
    {
        $data=array(
            'api'=>$this->Admin_model->get('list_api')
        );
        $this->load->view('Admin/listapi',$data);
    }

    public function test()
    {
        $this->db->select_max('slug_post');
        $a = $this->db->get('post')->row_array();
        $b = $a['slug_post']+1;
        print_r($b);
    }
}
