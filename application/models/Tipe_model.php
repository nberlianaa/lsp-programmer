<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing all tipe
	public function listing()
	{
		$this->db->select('	tipe.*,
							resort.id_resort');
		$this->db->from('tipe');
		//join
		$this->db->join('resort','resort.id_resort = tipe.id_resort','left');
		//end join
		$this->db->order_by('id_tipe', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	//listing all tipe
	public function getData($id_resort)
	{
		$this->db->select('	tipe.*,
							resort.id_resort');
		$this->db->from('tipe');
		//join
		$this->db->join('resort','resort.id_resort = tipe.id_resort','left');
		//end join
		$this->db->where('resort.id_resort', $id_resort);
		$this->db->order_by('resort.id_resort', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	//detail tipe
	public function detail($id_tipe)
	{
		$this->db->select('*');
		$this->db->from('tipe');
		$this->db->where('id_tipe', $id_tipe);
		$this->db->order_by('id_tipe', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('tipe', $data);
	}	

	//edit
	public function edit($data)
	{
		$this->db->where('id_tipe', $data['id_tipe']);
		$this->db->update('tipe', $data);

	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_tipe', $data['id_tipe']);
		$this->db->delete('tipe', $data);

	}
}