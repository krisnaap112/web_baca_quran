<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Quran_model extends CI_Model{

	public function tampil_data($table, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('surah', $keyword);
			$this->db->or_like('arti_surah', $keyword);
			$this->db->or_like('jumlah_ayat', $keyword);
			$this->db->or_like('jenis_surah', $keyword);
		}
			

			return $this->db->get($table);
	}


	public function editQuran($id, $table)
	{
		return $this->db->get_where('hafal_quran', $id);
	}

	public function tampil_surah($table, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('surah', $keyword);
			$this->db->or_like('arti_surah', $keyword);
			$this->db->or_like('jumlah_ayat', $keyword);
			$this->db->or_like('jenis_surah', $keyword);
		}
			

			return $this->db->get($table);
	}

	public function tampil_murottal($table, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('judul', $keyword);
			$this->db->or_like('qori', $keyword);
		}
			

			return $this->db->get($table);
	}

	public function tampil_tafsir($table, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('penulis', $keyword);
			$this->db->or_like('judul_tafsir', $keyword);
		}
			

			return $this->db->get($table);
	}

	public function detail_tafsir($id)
	{
		$result = $this->db->where('id_tafsir', $id)->get('tafsir');

		// kondisi
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}


	public function dataJuz($table, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('juz', $keyword);
		}
			

			return $this->db->get($table);
	}

	public function detail_juz($id)
	{
		$result = $this->db->where('id_juz', $id)->get('juz');

		// kondisi
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function detail_quran($id)
	{
		$result = $this->db->where('id_surah', $id)->get('surah');

		// kondisi
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function ubahDataQuran($where, $table, $data)
	{
		$data = [
	 		 	'nama_quran'      => htmlspecialchars($this->input->post('nama_quran', true)),
	 		 	'alamat' 	       => htmlspecialchars($this->input->post('alamat', true)),
	 		 	'email'     	   => htmlspecialchars($this->input->post('email', true)),
	 		 	'no_telpon' 	   => htmlspecialchars($this->input->post('no_telpon', true)),
	 		 	'tempat_lahir'     => htmlspecialchars($this->input->post('tempat_lahir', true)),
	 		 	'tanggal_lahir'    => htmlspecialchars($this->input->post('tanggal_lahir', true)),
	 		 	'image' 	   	   => htmlspecialchars($this->input->post('image', true)),
	 		 	'mata_pelajaran'   => htmlspecialchars($this->input->post('mata_pelajaran', true)),
	 		 	'is_active' 	   => htmlspecialchars($this->input->post('is_active', true))
	 		];

			// insert kedalam database
	 		$this->db->where($where);
			$this->db->update('quran', $data);
	}


	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}