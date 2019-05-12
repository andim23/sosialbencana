<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relawan extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('Relawan_model');
        $this->load->model('Level_model');
        $this->load->model('Status_model');
    }
}