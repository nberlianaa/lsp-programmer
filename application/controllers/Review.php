<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller 
{
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('review_model');
	}
	
	//halaman review
	public function index()
	{
	//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_tamu','Nama','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('email','Email','required',
			array('required' => '%s harus diisi'));

		if($valid->run()===FALSE) {
		//end validasi

		$data = array('title' 	=> 'Review',
					  'isi'	  	=> 'review/list');
		$this->load->view('layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$data = array(	'nama_tamu' 			=> $i->post('nama_tamu'),
				  			'email' 				=> $i->post('email'),
							'comment' 				=> $i->post('comment'),
							 );
			$this->review_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Review Send!');
			redirect(base_url('review'),'refresh');
		}
		//end database
	}
}