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

	public function contact()
	{
		$data = array('title' => 'Sosial Bencana',
									// '' => ,
									'isi' => 'home/contact'
								);
		$this->load->view('layout/file',$data,FALSE);
	}

	public function login()
	{
		$this->load->view('home/login');
	}

	public function register()
	{
		$this->load->view('home/register');
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
