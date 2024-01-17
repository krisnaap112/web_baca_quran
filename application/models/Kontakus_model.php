<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Kontakus_model extends CI_Model{

	public function tampilDatab()
	{
		return $this->db->get('kontakus');
	}

	public function tambahPesanb()
	{
		$data = [
	 		 	'namae'   => htmlspecialchars($this->input->post('namae', true)),
	 		 	'nohp'    => htmlspecialchars($this->input->post('nohp', true)),
	 		 	'imil' => htmlspecialchars($this->input->post('imil', true)),
	 		 	'kritik' => htmlspecialchars($this->input->post('kritik', 'Waktu',true))
	 		];
		// insert kedalam database
		$this->db->insert('kontakus', $data);
	}

	public function delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete('kontakus');
	}
}