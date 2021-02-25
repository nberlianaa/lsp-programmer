<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing all pembayaran
	public function listing()
	{
		$this->db->select(	'pembayaran.*, 
							booking.nama_resort,
							booking.nama_room,
							booking.nama_pemesan,
							booking.checkin,
							booking.checkout,
							booking.harga
						 ');
		$this->db->from('pembayaran');
		//join db
		$this->db->join('booking','booking.id_booking = pembayaran.id_booking','left');
		//end join
		$this->db->order_by('id_pembayaran', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//detail pembayaran
	public function detail($id_pembayaran)
	{
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->where('id_pembayaran', $id_pembayaran);
		$this->db->order_by('id_pembayaran', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('pembayaran', $data);
	}	

	//edit
	public function edit($data)
	{
		$this->db->where('id_pembayaran', $data['id_pembayaran']);
		$this->db->update('pembayaran', $data);

	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_pembayaran', $data['id_pembayaran']);
		$this->db->delete('pembayaran', $data);

	}
}