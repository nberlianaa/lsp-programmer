<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller 
{

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('booking_model');
		$this->load->model('room_model');
		//proteksi halaman
		$this->simple_login->cek_login();
	}

	//data tamu
	public function index()
	{
		$booking 	= $this->booking_model->listing();

		$data = array(	'title' => 	'Data Booking',
					  				'booking'  	=> $booking,
					  				'isi'		=> 'admin/booking/list'
					 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}