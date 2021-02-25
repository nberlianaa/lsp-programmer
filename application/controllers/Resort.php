<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resort extends CI_Controller 
{

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('room_model');
		$this->load->model('tipe_model');
		$this->load->model('resort_model');
	}

	//listing data resort
	public function detail($nama)
	{
		$site			= $this->konfigurasi_model->listing();
		$tipe 			= $this->tipe_model->listing();
		$resort 		= $this->resort_model->read($nama);
		$id_resort 		= $resort->id_resort;
		$tipe 			= $this->tipe_model->getData($id_resort);
		$gambarr 		= $this->resort_model->gambarr($id_resort);
			
		$data 	= array(	'title'			=> $resort->nama_resort,
							'site'			=> $site,
							'resort'		=> $resort,
							'tipe'			=> $tipe,
							'gambarr'		=> $gambarr,
							'isi'			=> 'resort/detail'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}