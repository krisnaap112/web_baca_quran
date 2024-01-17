<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

	public function addRole(){

		$data = [
			'access' => htmlspecialchars($this->input->post('access', true)),
		];

		$this->db->insert('access', $data);	
	}

	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function updateRole($where, $data, $table)
	{
		$data = [
			'access' => $this->input->post('access', true)
		];

		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function deleteRole($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}