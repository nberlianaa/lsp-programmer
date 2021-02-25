<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Labuan_model extends CI_Model 
{
	//detail single
    public function single($id_room) 
    {
     $this->db->select(‘*’);
     $this->db->from(‘room’);
     $this->db->where(‘id_room’,’3’);
     $query = $this->db->get();
     return $query->result();
    }
}