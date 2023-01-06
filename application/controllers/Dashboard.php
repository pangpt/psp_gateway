<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->template->load('backend/template', 'backend/dashboard');
	}

	function login()
	{
		$this->load->view('backend/login');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */