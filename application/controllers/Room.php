<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller 
{

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('room_model');
		$this->load->model('tipe_model');	
	}

	//listing data resort
	public function detail($slug_tipe)
	{
		$site			= $this->konfigurasi_model->listing();
		$room			= $this->room_model->read($slug_tipe);
		$id_room		= $room->id_room;
		$gambar			= $this->room_model->gambar($id_room);
			
		$data 	= array(	'title'			=> $room->nama_room,
							'site'			=> $site,
							'room'			=> $room,
							'gambar'		=> $gambar,
							'isi'			=> 'room/detail'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}
