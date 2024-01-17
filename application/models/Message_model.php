<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model{

	public function tampilData()
	{
		return $this->db->get('message');
	}

	public function tambahPesan()
	{
		$data = [
	 		 	'email'   => htmlspecialchars($this->input->post('email', true)),
	 		 	'name'    => htmlspecialchars($this->input->post('name', true)),
	 		 	'subject' => htmlspecialchars($this->input->post('subject', true)),
	 		 	'message' => htmlspecialchars($this->input->post('message', true))
	 		];
		// insert kedalam database
		$this->db->insert('message', $data);
	}

	public function delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete('message');
	}
}