<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesan_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing all pemesan
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('pemesan');
		$this->db->order_by('id_pemesan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//detail pemesan yg login
	public function sudah_login($email,$nama_pemesan)
	{
		$this->db->select('*');
		$this->db->from('pemesan');
		$this->db->where('email', $email);
		$this->db->where('nama_pemesan', $nama_pemesan);
		$this->db->order_by('id_pemesan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//detail pemesan
	public function detail($id_pemesan)
	{
		$this->db->select('*');
		$this->db->from('pemesan');
		$this->db->where('id_pemesan', $id_pemesan);
		$this->db->order_by('id_pemesan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('pemesan', $data);
	}	

	//edit
	public function edit($data)
	{
		$this->db->where('id_pemesan', $data['id_pemesan']);
		$this->db->update('pemesan', $data);

	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_pemesan', $data['id_pemesan']);
		$this->db->delete('pemesan', $data);

	}
}