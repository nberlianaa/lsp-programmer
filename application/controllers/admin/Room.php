<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {

//load model
public function __construct()
{
	parent::__construct();
	$this->load->model('room_model');
	$this->load->model('tipe_model');
	$this->load->model('resort_model');
	//proteksi halaman
	$this->simple_login->cek_login();
}

//data kamar
public function index()
{
	$room = $this->room_model->listing();
	$data = array(	'title' => 'Data Kamar',
				  	'room'  => $room,
				  	'isi'	=> 'admin/room/list'
				 );
	$this->load->view('admin/layout/wrapper', $data, FALSE);
}

//gambar
public function gambar($id_room)
{
	$room   	= $this->room_model->detail($id_room);
	$gambar 	= $this->room_model->gambar($id_room);

	//validasi input
	$valid = $this->form_validation;

	$valid->set_rules('judul_gambar','Nama Gambar','required',
			array('required'	=> '%s harus diisi'));
	
	if($valid->run()) {
			$config['upload_path']		= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']			= '2400';
			$config['max_width']		= '2024';
			$config['max_height']		= '2024';

			$this->load->library('upload', $config);

			if(! $this->upload->do_upload('gambar')){ 
		//end validasi

	$data = array('title' 	=> 	'Tambah Gambar Kamar : '.$room->nama_room,
								'room'		=> $room,
								'gambar'	=> $gambar,
								'error'		=> $this->upload->display_error(),
				  				'isi'	  	=> 'admin/room/gambar');
	$this->load->view('admin/layout/wrapper', $data, FALSE);
	//masuk database
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());

		//create thumbnail gambar
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= './assets/upload/image/' .$upload_gambar['upload_data']['file_name'];
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
		$data = array(	'id_room'		=> $id_room,
						'judul_gambar' 	=> $i->post('judul_gambar'),
						//disimpan nama file gambar
						'gambar'		=> $upload_gambar['upload_data']['file_name'], 
					 );
		$this->room_model->tambah_gambar($data);
		$this->session->set_flashdata('sukses', 'Gambar telah ditambah');
		redirect(base_url('admin/room/gambar/' .$id_room),'refresh');
	}
	}
	//end database
	$data = array(	'title' 	=> 'Tambah Gambar Kamar : '.$room->nama_room,
					'room'		=> $room,
					'gambar'	=> $gambar,
				  	'isi'	  	=> 'admin/room/gambar');

	$this->load->view('admin/layout/wrapper', $data, FALSE);
}

//tambah kamar
public function tambah()
{
	//ambil data tipe
	$tipe = $this->tipe_model->listing();

	//ambil data resort
	$resort = $this->resort_model->listing();

	//validasi input
	$valid = $this->form_validation;

	$valid->set_rules('nama_room','Nama Kamar','required',
			array(	'required'	=> '%s harus diisi'));
	
	if($valid->run()) {
			$config['upload_path']		= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']			= '2400';
			$config['max_width']		= '2024';
			$config['max_height']		= '2024';

	$this->load->library('upload', $config);

	if(! $this->upload->do_upload('gambar')){ 
	//end validasi

	$data = array('title' 	=> 	'Tambah Room',
								'tipe'	=>$tipe,
								'error'	=> $this->upload->display_error(),
				  				'isi'	=> 'admin/room/tambah');
	$this->load->view('admin/layout/wrapper', $data, FALSE);
	//masuk database
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());

		//create thumbnail gambar
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= './assets/upload/image/' .$upload_gambar['upload_data']['file_name'];
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
						'id_resort' 	=> $i->post('id_resort'),
						'kode_room' 	=> $i->post('kode_room'),
						'fasilitas' 	=> $i->post('fasilitas'),
						'status' 		=> $i->post('status'),
						'harga' 		=> $i->post('harga'),
						//disimpan nama file gambar
						'gambar'		=> $upload_gambar['upload_data']['file_name'], 
					 );
		$this->room_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data telah ditambah');
		redirect(base_url('admin/room'),'refresh');
	}
	}
	//end database
	$data = array(	'title' 	=> 'Tambah Kamar',
					'tipe'		=> $tipe,
					'resort'	=> $resort,
				  	'isi'	  	=> 'admin/room/tambah');
	$this->load->view('admin/layout/wrapper', $data, FALSE);
}


//edit room
public function edit($id_room)
{
	$room = $this->room_model->detail($id_room);

	//ambil data tipe
	$tipe = $this->tipe_model->listing();

	//ambil data resort
	$resort = $this->resort_model->listing();

	//validasi input
	$valid = $this->form_validation; 

	$valid->set_rules('nama_room','Nama Kamar','required',
			array(	'required'	=> '%s harus diisi'));

	if($valid->run()) {
			//check jika gambar diganti
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path']		= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']			= '2400';
			$config['max_width']		= '2024';
			$config['max_height']		= '2024';

			$this->load->library('upload', $config);

			if(! $this->upload->do_upload('gambar')){ 
		//end validasi

	$data = array(	'title' 	=> 'Edit Kamar : '.$room->nama_room,
					'room'		=> $room,
					'error'		=> $this->upload->display_error(),
				  	'isi'	  	=> 'admin/room/edit');
	$this->load->view('admin/layout/wrapper', $data, FALSE);
	//masuk database
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());

		//create thumbnail gambar
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= './assets/upload/image/' .$upload_gambar['upload_data']['file_name'];
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

		$data = array(	'id_room'		=> $id_room,
						'id_tipe' 		=> $i->post('id_tipe'),
						'id_resort' 	=> $i->post('id_resort'),
						'kode_room'		=> $i->post('kode_room'),
						'fasilitas' 	=> $i->post('fasilitas'),
						'status' 		=> $i->post('status'),
						'harga' 		=> $i->post('harga'),
						//disimpan nama file gambar
						'gambar'		=> $upload_gambar['upload_data']['file_name'], 
					 );
		$this->room_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diedit');
		redirect(base_url('admin/room'),'refresh');
	}}else{
		//edit kamar tanpa ganti gambar
		$i = $this->input;
		$data = array(	'id_room'		=> $id_room,
						'id_tipe' 		=> $i->post('id_tipe'),
						'id_resort' 	=> $i->post('id_resort'),
						'kode_room'		=> $i->post('kode_room'),
						'fasilitas' 	=> $i->post('fasilitas'),
						'status' 		=> $i->post('status'),
						'harga' 		=> $i->post('harga'),
						//gambar tidak diganti
						//'gambar'		=> $upload_gambar['upload_data']['file_name'], 
					 );
		$this->room_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diedit');
		redirect(base_url('admin/room'),'refresh');
	}}
	
	//end database
	$data = array(	'title' 	=> 'Edit Kamar : '.$room->nama_room,
					'tipe'		=> $tipe,
					'room'		=> $room,
					'resort'	=> $resort,
				  	'isi'	  	=> 'admin/room/edit');
	$this->load->view('admin/layout/wrapper', $data, FALSE);
}

//delete room
public function delete($id_room)
{
	//hapus gambar
		$room = $this->room_model->detail($id_room);
		unlink('./assets/upload/image/'.$room->gambar);
		unlink('./assets/upload/image/thumbs/'.$room->gambar);
	//end hapus gambar
	$data = array('id_room' => $id_room);
	$this->room_model->delete($data);
	$this->session->set_flashdata('sukses', 'Data telah dihapus');
	redirect(base_url('admin/room'),'refresh');
}

//delete gambar
public function delete_gambar($id_room,$id_gambar)
{
	//hapus gambar
		$gambar = $this->room_model->detail_gambar($id_gambar);
		unlink('./assets/upload/image/'.$gambar->gambar);
		unlink('./assets/upload/image/thumbs/'.$gambar->gambar);
	//end hapus gambar
	$data = array('id_gambar' => $id_gambar );
	$this->room_model->delete_gambar($data);
	$this->session->set_flashdata('sukses', 'Gambar telah dihapus');
	redirect(base_url('admin/room/gambar/'.$id_room),'refresh');
}
}
