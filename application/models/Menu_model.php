<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
	public function getSubMenu()
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
					FROM `user_sub_menu` JOIN `user_menu`
					  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
					";
		return $this->db->query($query)->result_array();
	}

	public function tampil_data($table, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('menu_id', $keyword);
			$this->db->or_like('title', $keyword);
		}
			return $this->db->get('user_sub_menu');
	}

	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update_menu($where, $table, $data)
	{
		$data = [
	 		 	'title'   		   => htmlspecialchars($this->input->post('title', true)),
	 		 	'menu_id'   	   => htmlspecialchars($this->input->post('menu_id', true)),
	 		 	'url' 	   		   => htmlspecialchars($this->input->post('url', true)),
	 		 	'icon'    		   => htmlspecialchars($this->input->post('icon', true)),
	 		 	'is_active' 	   => htmlspecialchars($this->input->post('is_active', true))
	 		];

			// insert kedalam database
	 		$this->db->where($where);
			$this->db->update('user_sub_menu', $data);
	}

	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}