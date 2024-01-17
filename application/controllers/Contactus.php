<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller {

	
	

	public function pesanbc() {

		$namae   	 	 = htmlspecialchars($this->input->post('namae', true));
		$nohp 	 		 = htmlspecialchars($this->input->post('nohp', true));
		$imil	 	  	 = htmlspecialchars($this->input->post('imil', true));
		$kritik  	  	 = htmlspecialchars($this->input->post('kritik',  true));
			
			$data = [
				'namae'		=> $namae,
				'nohp'		=> $nohp,
				'imil'	=> $imil,
				'kritik'	=> $kritik
			];

			// masukkan data kedalam database
			$this->db->insert('kontakus', $data);
			redirect('welcome');
			
	}
}
