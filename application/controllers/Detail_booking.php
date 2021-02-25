<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_booking extends CI_Controller 
{

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('booking_model');
		$this->load->model('room_model');
	}

	//data tamu
	public function index()
	{
		$booking 	= $this->booking_model->listing();

		$data = array(	'title' => 	'Detail Booking',
					  				'booking'  	=> $booking,
					  				'isi'		=> 'detail_booking/list'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//delete room
	public function delete($id_booking)
	{
		$room = $this->room_model->detail($id_booking);
		$data = array('id_booking' => $id_booking);
		$this->booking_model->delete($data);
		$this->session->set_flashdata('sukses', 'Cancel Booking Success!');
		redirect(base_url('detail_booking'),'refresh');
	}

	//delete room
	public function send($id_booking)
	{
		$room = $this->room_model->detail($id_booking);
		$data = array('id_booking' => $id_booking);
		$this->booking_model->listing();
		$this->session->set_flashdata('sukses', 'Bukti booking akan dikirim ke email anda dalam waktu 24jam!');
		redirect(base_url('detail_booking'),'refresh');
	}
}