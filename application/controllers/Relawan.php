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

    public function index()
    {
        $relawan            = $this->Relawan_model->newRelawan()->result_array();
        $level              = $this->Level_model->getLevel()->result_array();
        $status             = $this->Status_model->getStatus()->result_array();
        $data = array(
            'relawan'       => $relawan,
            'level'         => $level,
            'status'        => $status,
        );
        $this->load->view('Admin/Relawan/index', $data);
    }
}