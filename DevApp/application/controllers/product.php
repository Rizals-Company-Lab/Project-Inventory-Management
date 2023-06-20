<?php
defined('BASEPATH') or exit('No direct script access allowed');

class product extends CI_Controller
{
	public function index()
	{
		$this->load->view('product_view');
	}
	function add_new(){
		$this->load->view('add_product_view');
	}
}