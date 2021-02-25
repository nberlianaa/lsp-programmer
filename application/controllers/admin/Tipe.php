<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tipe_model');
		$this->load->model('resort_model');
		//proteksi halaman
		$this->simple_login->cek_login();
	}

	//data tipe
	public function index()
	{
		$tipe = $this->tipe_model->listing();

		$data = array(	'title' => 'Data Tipe Kamar',
		  				'tipe'  => $tipe,
		  				'isi'	=> 'admin/tipe/list'
					 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//tambah tipe
	public function tambah()
	{
		$resort = $this->resort_model->listing();
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('tipe_room','Tipe Kamar','required',
				array('required' => '%s harus diisi'));

		if($valid->run()===FALSE) {
			//end validasi

		$data = array(	'title' 	=> 'Tambah Tipe',
		  				'isi'	  	=> 'admin/tipe/tambah'
		  			 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			
			$slug_tipe	= url_title($this->input->post('tipe_room'), 'dash', TRUE);

			$data = array(	'id_resort' => $i->post('id_resort'),
							'nama_room' => $i->post('nama_room'),
							'slug_tipe'	=> $slug_tipe,
							'tipe_room' => $i->post('tipe_room'),
						  );
			$this->tipe_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/tipe'),'refresh');
		}
		//end database
	}


	//edit tipe
	public function edit($id_tipe)
	{
		$resort = $this->resort_model->listing();

		$tipe = $this->tipe_model->detail($id_tipe);

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('tipe_room','Tipe Kamar','required',
				array('required' => '%s harus diisi'));
	
		if($valid->run()===FALSE) {
			//end validasi

		$data = array('title' 	=> 	'Edit Tipe',
									'tipe'		=> $tipe,
					  				'isi'	  	=> 'admin/tipe/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i = $this->input;
			$slug_tipe	= url_title($this->input->post('tipe_room'), 'dash', TRUE);

			$data = array(	'id_resort' 	=> $id_resort,
							'id_tipe'		=> $id_tipe,
							'nama_room' => $i->post('nama_room'),
							'slug_tipe'		=> $slug_tipe,
							'tipe_room' 	=> $i->post('tipe_room'),
						  );
			$this->tipe_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/tipe'),'refresh');
		}
		//end database
	}

	//delete tipe
	public function delete($id_tipe)
	{
		$data = array('id_tipe' => $id_tipe);
		$this->tipe_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/tipe'),'refresh');
	}
}
