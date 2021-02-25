

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('room_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('tipe_model');
		$this->load->model('resort_model');
	}

	//halaman utama website
	public function index()
	{
		$site	= $this->konfigurasi_model->listing();
		$resort = $this->resort_model->home();
		$tipe 	= $this->tipe_model->listing();

		$data = array(	'title' => $site->nama_web,
						'site'	=> $site,
						'resort'=> $resort,
						'tipe'	=> $tipe,
					  	'isi'	=> 'home/list'
		);			  
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}