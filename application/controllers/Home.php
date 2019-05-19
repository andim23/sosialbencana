<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
	}

	public function index()
	{
		$post=$this->Home_model->getPost();
		$data = array(
			'title' => 'Sosial Bencana',
			'isi' => 'Home/index',
			'posting'=>$post
		);
		$this->load->view('layout/file',$data,FALSE);
	}

	public function contact()
	{
		$data = array('title' => 'Sosial Bencana',
									// '' => ,
									'isi' => 'Home/contact'
								);
		$this->load->view('layout/file',$data,FALSE);
	}

	public function login()
	{
		$this->load->view('Home/login');
	}

	public function register()
	{
		$this->load->view('Home/register');
	}

	public function konfirmasi()
	{
		$data = array('title' => 'Sosial Bencana',
									// '' => ,
									'isi' => 'Home/konfirmasi'
								);
		$this->load->view('layout/file',$data,FALSE);
	}
}
