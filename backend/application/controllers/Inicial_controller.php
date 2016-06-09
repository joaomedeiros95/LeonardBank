<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicial_controller extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Leonard Bank';
		$this->load->view('includes/header', $data);
		$this->load->view('index');
		$this->load->view('includes/footer');
	}
}
