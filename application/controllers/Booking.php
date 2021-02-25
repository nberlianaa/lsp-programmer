<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller 
{

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('booking_model');
		$this->load->model('room_model');
		$this->load->model('pemesan_model');
	}

	//halaman booking
	public function proses($id_room)
	{
		$site			= $this->konfigurasi_model->listing();
		$room 			= $this->room_model->detail($id_room);
		$booking 		= $this->booking_model->listing();

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pemesan','Nama Pemesan','required',
			array('required' => '%s harus diisi'));

		if($valid->run()===FALSE) {
		//end validasi
		
		$data 	= array(	'title'			=> 'Booking Room ',
							'site'			=> $site,
							'booking'		=> $booking,
							'room'			=> $room,
							'isi'			=> 'booking/proses'
						);

		$this->load->view('layout/wrapper', $data, FALSE);

		//masuk database
		}else{
			$i = $this->input;
			$data = array(	'id_room'				=> $id_room,
							'nama_pemesan' 			=> $i->post('nama_pemesan'),
							'email' 				=> $i->post('email'),
							'telepon' 				=> $i->post('telepon'),
							'checkin' 				=> $i->post('checkin'),
							'checkout' 				=> $i->post('checkout'),
							'harga'					=> $i->post('harga')
							 );
			$this->booking_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Booking Sukses. Cek Booking  ');
			redirect(base_url('booking/proses/'.$id_room),'refresh');
		}
		//end database
	}
}