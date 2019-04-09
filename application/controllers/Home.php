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
		$data = array('title' => 'Sosial Bencana',
									// '' => ,
									'isi' => 'home/index'
								);
		$this->load->view('layout/file',$data,FALSE);
	}

	public function login()
	{
		$data = array('title' => 'Sosial Bencana',
									// '' => ,
									'isi' => 'home/login'
								);
		$this->load->view('layout/file',$data,FALSE);
	}

	public function register()
	{
		$data = array('title' => 'Sosial Bencana',
									// '' => ,
									'isi' => 'home/register'
								);
		$this->load->view('layout/file',$data,FALSE);
	}

	public function konfirmasi()
	{
		$data = array('title' => 'Sosial Bencana',
									// '' => ,
									'isi' => 'home/konfirmasi'
								);
		$this->load->view('layout/file',$data,FALSE);
	}
}
