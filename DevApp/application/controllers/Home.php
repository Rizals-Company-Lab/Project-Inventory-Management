<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('login_id') == 'admin') {

			$this->load->view('home_view');
		} else {
			$this->load->view('home_view_kasir');

		}
	}
}