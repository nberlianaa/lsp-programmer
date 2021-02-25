<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	//halaman utama website
	public function index()
	{
		$data = array('title' => 'About Us',
					  'isi'	  => 'about/list'
		);			  
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}