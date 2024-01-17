<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model{
	// model jurusan
	public function tampilData($table, $keyword = null)
	{

		if ($keyword) {
			$this->db->like('name_user', $keyword);
	        $this->db->or_like('email', $keyword);
		}

		return $this->db->get($table);
	}

	public function tampil_kajian($table, $keyword = null)
	{

		if ($keyword) {
			$this->db->like('nama_ustadz', $keyword);
	        $this->db->or_like('tempat_kajian', $keyword);
	        $this->db->or_like('tanggal_kajian', $keyword);
	        $this->db->or_like('materi_kajian', $keyword);
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

	public function tampil_materi_islami($table, $keyword = null)
	{

		if ($keyword) {
			$this->db->like('nama_penulis', $keyword);
	        $this->db->or_like('judul', $keyword);
	        $this->db->or_like('konten', $keyword);
		}

		return $this->db->get($table);
	}

	public function editData($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function updateAccountMember($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function deleteAccountMember($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}