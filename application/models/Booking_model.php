<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing all booking
	public function listing()
	{
		$this->db->select('	booking.*,
							room.nama_resort,
							room.nama_room,
							room.harga'
						);
		$this->db->from('booking');
		//join
		$this->db->join('room','room.id_room = booking.id_room','left');
		//end join
		$this->db->group_by('booking.id_booking');
		$this->db->order_by('id_booking', 'asc');
		$query = $this->db->get();
		return $query->result();
	}


	//detail booking
	public function detail($id_booking)
	{
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->where('id_booking', $id_booking);
		$this->db->order_by('id_booking', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('booking', $data);
	}	

	//edit
	public function edit($data)
	{
		$this->db->where('id_booking', $data['id_booking']);
		$this->db->update('booking', $data);

	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_booking', $data['id_booking']);
		$this->db->delete('booking', $data);

	}
}