<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room_model extends CI_Model {
	
	//listing all room
	public function listing()
	{
		$this->db->select(	'room.*, 
							resort.nama_resort,
							tipe.tipe_room,
							tipe.nama_room,
							tipe.slug_tipe,
							COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('room');
		//join
		$this->db->join('resort','resort.id_resort = room.id_resort','left');
		$this->db->join('tipe','tipe.id_tipe = room.id_tipe','left');
		$this->db->join('gambar','gambar.id_room = room.id_room','left');
		//end join
		$this->db->group_by('room.id_room');
		$this->db->order_by('id_room', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	//listing all room home
	public function read($slug_tipe)
	{
		$this->db->select(	'room.*, 
							resort.nama_resort,
							tipe.tipe_room,
							tipe.nama_room,
							tipe.slug_tipe,
							COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('room');
		//join
		$this->db->join('resort','resort.id_resort = room.id_resort','left');
		$this->db->join('tipe','tipe.id_tipe = room.id_tipe','left');
		$this->db->join('gambar','gambar.id_room = room.id_room','left');
		//end join
		$this->db->where('room.slug_tipe', $slug_tipe);
		$this->db->group_by('room.id_room');
		$this->db->order_by('id_room', 'asc');
		$query = $this->db->get();
		return $query->row();
	}


	//listing all room home
	public function readd($kode_room)
	{
		$this->db->select(	'room.*, 
							resort.nama_resort,
							tipe.tipe_room,
							tipe.nama_room,
							tipe.slug_tipe,
							COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('room');
		//join
		$this->db->join('resort','resort.id_resort = room.id_resort','left');
		$this->db->join('tipe','tipe.id_tipe = room.id_tipe','left');
		$this->db->join('gambar','gambar.id_room = room.id_room','left');
		//end join
		$this->db->where('room.kode_room', $kode_room);
		$this->db->group_by('room.id_room');
		$this->db->order_by('id_room', 'asc');
		$query = $this->db->get();
		return $query->row();
	}


	//detail room
	public function detail($id_room)
	{
		$this->db->select('*');
		$this->db->from('room');
		$this->db->where('id_room', $id_room);
		$this->db->order_by('id_room', 'asc');
		$query = $this->db->get();
		return $query->row();
	}
	
	//detail gambar
	public function detail_gambar($id_gambar)
	{
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_gambar', $id_gambar);
		$this->db->order_by('id_gambar', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	//gambar
	public function gambar($id_room)
	{
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_room', $id_room);
		$this->db->order_by('id_gambar', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	//tambah
	public function tambah_gambar($data)
	{
		$this->db->insert('gambar', $data);
	}	

	//tambah gambar
	public function tambah($data)
	{
		$this->db->insert('room', $data);
	}	

	//edit
	public function edit($data)
	{
		$this->db->where('id_room', $data['id_room']);
		$this->db->update('room', $data);

	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_room', $data['id_room']);
		$this->db->delete('room', $data);

	}

	//delete gambar
	public function delete_gambar($data)
	{
		$this->db->where('id_gambar', $data['id_gambar']);
		$this->db->delete('gambar', $data);

	}
}