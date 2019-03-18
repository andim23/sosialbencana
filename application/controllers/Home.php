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
		$this->load->view('Home/index');
	}

	public function login()
	{
		$this->load->view('Home/login');
	}

	public function register()
	{
		$this->load->view('Home/register');
	}
}
