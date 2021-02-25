<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resort extends CI_Controller {

//load model
public function __construct()
{
	parent::__construct();
	$this->load->model('resort_model');
	$this->load->model('tipe_model');
	$this->load->model('room_model');
	//proteksi halaman
	$this->simple_login->cek_login();
}

//data kamar
public function index()
{
	$resort = $this->resort_model->listing();
	$data = array(	'title'		=> 'Data Resort',
				  	'resort'	=> $resort,
				  	'isi'		=> 'admin/resort/list'
				 );
	$this->load->view('admin/layout/wrapper', $data, FALSE);
}

//gambarr
public function gambarr($id_resort)
{
	$resort   	= $this->resort_model->detail($id_resort);
	$gambarr 	= $this->resort_model->gambarr($id_resort);

	//validasi input
	$valid = $this->form_validation;

	$valid->set_rules('judul_gambarr','Nama Gambar','required',
			array('required'	=> '%s harus diisi'));
	
	if($valid->run()) {
			$config['upload_path']		= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']			= '2400';
			$config['max_width']		= '2024';
			$config['max_height']		= '2024';

			$this->load->library('upload', $config);

			if(! $this->upload->do_upload('gambarr')){ 
		//end validasi

	$data = array('title' 	=> 	'Tambah Gambar Kamar : '.$resort->nama_resort,
								'resort'		=> $resort,
								'gambarr'	=> $gambarr,
								'error'		=> $this->upload->display_error(),
				  				'isi'	  	=> 'admin/resort/gambarr');
	$this->load->view('admin/layout/wrapper', $data, FALSE);
	//masuk database
	}else{
		$upload_gambarr = array('upload_data' => $this->upload->data());

		//create thumbnail gambarr
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= './assets/upload/image/' .$upload_gambarr['upload_data']['file_name'];
		//lokasi folder thumbnail
		$config['new_image']		= './assets/upload/image/thumbs/';
		$config['create_thumb'] 	= TRUE;
		$config['maintain_ratio'] 	= TRUE;
		$config['width']        	= 250;//pixel
		$config['height']       	= 250;//pixel
		$config['thumb_marker']		= '';

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
		//end create thumbnail

		$i = $this->input;
		$data = array(	'id_resort'		=> $id_resort,
						'judul_gambarr' 	=> $i->post('judul_gambarr'),
						//disimpan nama file gambarr
						'gambarr'		=> $upload_gambarr['upload_data']['file_name'], 
					 );
		$this->resort_model->tambah_gambarr($data);
		$this->session->set_flashdata('sukses', 'Gambar telah ditambah');
		redirect(base_url('admin/resort/gambarr/' .$id_resort),'refresh');
	}
	}
	//end database
	$data = array(	'title' 	=> 'Tambah Gambar Kamar : '.$resort->nama_resort,
					'resort'		=> $resort,
					'gambarr'	=> $gambarr,
				  	'isi'	  	=> 'admin/resort/gambarr');

	$this->load->view('admin/layout/wrapper', $data, FALSE);
}

//tambah kamar
public function tambah()
{
	//ambil data tipe
	$tipe = $this->tipe_model->listing();

	//validasi input
	$valid = $this->form_validation;

	$valid->set_rules('nama_resort','Resort','required',
			array(	'required'	=> '%s harus diisi'));
	
	if($valid->run()) {
			$config['upload_path']		= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']			= '2400';
			$config['max_width']		= '2024';
			$config['max_height']		= '2024';

	$this->load->library('upload', $config);

	if(! $this->upload->do_upload('gambarr')){ 
	//end validasi

	$data = array('title' 	=> 	'Tambah Resort',
								'tipe'	=>$tipe,
								'error'	=> $this->upload->display_error(),
				  				'isi'	=> 'admin/resort/tambah');
	$this->load->view('admin/layout/wrapper', $data, FALSE);
	//masuk database
	}else{
		$upload_gambarr = array('upload_data' => $this->upload->data());

		//create thumbnail gambarr
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= './assets/upload/image/' .$upload_gambarr['upload_data']['file_name'];
		//lokasi folder thumbnail
		$config['new_image']		= './assets/upload/image/thumbs/';
		$config['create_thumb'] 	= TRUE;
		$config['maintain_ratio'] 	= TRUE;
		$config['width']        	= 250;//pixel
		$config['height']       	= 250;//pixel
		$config['thumb_marker']		= '';

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
		//end create thumbnail

		$i = $this->input;

		$data = array(	'id_tipe'		=> $i->post('id_tipe'),
						'nama_resort' 	=> $i->post('nama_resort'),
						'keterangan' 	=> $i->post('keterangan'),
						//disimpan nama file gambarr
						'gambarr'		=> $upload_gambarr['upload_data']['file_name'], 
					 );
		$this->resort_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data telah ditambah');
		redirect(base_url('admin/resort'),'refresh');
	}
	}
	//end database
	$data = array(	'title' 	=> 'Tambah Kamar',
					'tipe'		=> $tipe,
				  	'isi'	  	=> 'admin/resort/tambah');
	$this->load->view('admin/layout/wrapper', $data, FALSE);
}


//edit resort
public function edit($id_resort)
{
	$resort = $this->resort_model->detail($id_resort);

	//ambil data tipe
	$tipe = $this->tipe_model->listing();

	//validasi input
	$valid = $this->form_validation;

	$valid->set_rules('nama_resort','Nama Kamar','required',
			array('required'	=> '%s harus diisi'));
	
	if($valid->run()) {
			//check jika gambarr diganti
			if(!empty($_FILES['gambarr']['name'])) {
			$config['upload_path']		= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']			= '2400';
			$config['max_width']		= '2024';
			$config['max_height']		= '2024';

			$this->load->library('upload', $config);

			if(! $this->upload->do_upload('gambarr')){ 
		//end validasi

	$data = array(	'title' 	=> 'Edit Kamar : '.$resort->nama_resort,
					'resort'	=> $resort,
					'error'		=> $this->upload->display_error(),
				  	'isi'	  	=> 'admin/resort/edit');
	$this->load->view('admin/layout/wrapper', $data, FALSE);
	//masuk database
	}else{
		$upload_gambarr = array('upload_data' => $this->upload->data());

		//create thumbnail gambarr
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= './assets/upload/image/' .$upload_gambarr['upload_data']['file_name'];
		//lokasi folder thumbnail
		$config['new_image']		= './assets/upload/image/thumbs/';
		$config['create_thumb'] 	= TRUE;
		$config['maintain_ratio'] 	= TRUE;
		$config['width']        	= 250;//pixel
		$config['height']       	= 250;//pixel
		$config['thumb_marker']		= '';

		$this->load->library('image_lib', $config);

		  $this->image_lib->resize();
		//end create thumbnail

		$i = $this->input;

		$data = array(	'id_resort'		=> $id_resort,
						'nama_resort' 	=> $i->post('nama_resort'),
						'keterangan' 	=> $i->post('keterangan'),
						//disimpan nama file gambarr
						'gambarr'		=> $upload_gambarr['upload_data']['file_name'], 
					 );
		$this->resort_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diedit');
		redirect(base_url('admin/resort'),'refresh');
	}}else{
		//edit kamar tanpa ganti gambarr
		$i = $this->input;

		$data = array(	'id_resort'		=> $id_resort,
						'nama_resort' 	=> $i->post('nama_resort'),
						'keterangan' 	=> $i->post('keterangan'),
						//gambarr tidak diganti
						//'gambarr'		=> $upload_gambarr['upload_data']['file_name'], 
					 );
		$this->resort_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diedit');
		redirect(base_url('admin/resort'),'refresh');
	}}
	
	//end database
	$data = array(	'title' 	=> 'Edit Kamar : '.$resort->nama_resort,
					'tipe'		=> $tipe,
					'resort'	=> $resort,
				  	'isi'	  	=> 'admin/resort/edit');
	$this->load->view('admin/layout/wrapper', $data, FALSE);
}

//delete resort
public function delete($id_resort)
{
	//hapus gambarr
		$resort = $this->resort_model->detail($id_resort);
		unlink('./assets/upload/image/'.$resort->gambarr);
		unlink('./assets/upload/image/thumbs/'.$resort->gambarr);
	//end hapus gambarr
	$data = array('id_resort' => $id_resort);
	$this->resort_model->delete($data);
	$this->session->set_flashdata('sukses', 'Data telah dihapus');
	redirect(base_url('admin/resort'),'refresh');
}

//delete gambarr
public function delete_gambarr($id_resort,$id_gambarr)
{
	//hapus gambarr
		$gambarr = $this->resort_model->detail_gambarr($id_gambarr);
		unlink('./assets/upload/image/'.$gambarr->gambarr);
		unlink('./assets/upload/image/thumbs/'.$gambarr->gambarr);
	//end hapus gambarr
	$data = array('id_gambarr' => $id_gambarr );
	$this->resort_model->delete_gambarr($data);
	$this->session->set_flashdata('sukses', 'Gambar telah dihapus');
	redirect(base_url('admin/resort/gambarr/'.$id_resort),'refresh');
}
}
