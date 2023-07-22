<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function index()
	{
		$data['menu'] = 'dashboard';
		$this->load->view("includes/header", $data);
		$this->load->view("includes/sidebar");
		$this->load->view("dashboard/index");
		$this->load->view("includes/footer");
	}
}
