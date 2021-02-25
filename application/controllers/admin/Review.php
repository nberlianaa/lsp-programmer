<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller 
{

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('review_model');
		//proteksi halaman
		$this->simple_login->cek_login();
	}

		//data tamu
	public function index()
	{
		$review = $this->review_model->listing();
		$data = array(	'title' => 	'Data review ',
					  				'review'  	=> $review,
					  				'isi'		=> 'admin/review/list'
					 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}