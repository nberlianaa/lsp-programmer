<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing all review
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('review');
		$this->db->order_by('id_review', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//detail review
	public function detail($id_review)
	{
		$this->db->select('*');
		$this->db->from('review');
		$this->db->where('id_review', $id_review);
		$this->db->order_by('id_review', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('review', $data);
	}	

	//edit
	public function edit($data)
	{
		$this->db->where('id_review', $data['id_review']);
		$this->db->update('review', $data);

	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_review', $data['id_review']);
		$this->db->delete('review', $data);

	}
}