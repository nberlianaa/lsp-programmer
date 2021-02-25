<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resort_model extends CI_Model {
	
	//listing all resort
	public function listing()
	{
		$this->db->select(	'resort.*, 
							COUNT(gambarr.id_gambarr) AS total_gambarr');
		$this->db->from('resort');
		//join
		$this->db->join('gambarr','gambarr.id_resort = resort.id_resort','left');
		//end join
		$this->db->group_by('resort.id_resort');
		$this->db->order_by('id_resort', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	//resort home
	public function home()
	{
		$this->db->select(	'resort.*, 
							COUNT(gambarr.id_gambarr) AS total_gambarr');
		$this->db->from('resort');
		//join
		$this->db->join('gambarr','gambarr.id_resort = resort.id_resort','left');
		//end join
		$this->db->group_by('resort.id_resort');
		$this->db->order_by('id_resort', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	//resort detail
	public function read($nama)
	{
		$this->db->select(	'resort.*, 
							COUNT(gambarr.id_gambarr) AS total_gambarr');
		$this->db->from('resort');
		//join
		$this->db->join('gambarr','gambarr.id_resort = resort.id_resort','left');
		//end join
		$this->db->where('resort.nama', $nama);
		$this->db->group_by('resort.id_resort');
		$this->db->order_by('id_resort', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	//listing tipe room
	public function listing_tipe()
	{
		$this->db->select(	'resort.*, 
							COUNT(gambarr.id_gambarr) AS total_gambarr');
		$this->db->from('resort');
		//join
		$this->db->join('gambarr','gambarr.id_resort = resort.id_resort','left');
		//end join
		$this->db->group_by('resort.id_resort');
		$this->db->order_by('id_resort', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	//detail resort
	public function detail($id_resort)
	{
		$this->db->select('*');
		$this->db->from('resort');
		$this->db->where('id_resort', $id_resort);
		$this->db->order_by('id_resort', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	//detail gambarr
	public function detail_gambarr($id_gambarr)
	{
		$this->db->select('*');
		$this->db->from('gambarr');
		$this->db->where('id_gambarr', $id_gambarr);
		$this->db->order_by('id_gambarr', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	//gambarr
	public function gambarr($id_resort)
	{
		$this->db->select('*');
		$this->db->from('gambarr');
		$this->db->where('id_resort', $id_resort);
		$this->db->order_by('id_gambarr', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	//tambah
	public function tambah_gambarr($data)
	{
		$this->db->insert('gambarr', $data);
	}	

	//tambah gambarr
	public function tambah($data)
	{
		$this->db->insert('resort', $data);
	}	

	//edit
	public function edit($data)
	{
		$this->db->where('id_resort', $data['id_resort']);
		$this->db->update('resort', $data);

	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_resort', $data['id_resort']);
		$this->db->delete('resort', $data);

	}

	//delete gambarr
	public function delete_gambarr($data)
	{
		$this->db->where('id_gambarr', $data['id_gambarr']);
		$this->db->delete('gambarr', $data);

	}
}