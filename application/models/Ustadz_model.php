<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ustadz_model extends CI_Model{

	public function kode_ustadz() 
	{
		$this->db->select('RIGHT(ustadz.id_ustadz, 6) as kode', FALSE);
		$this->db->order_by('id_ustadz', 'DESC');
		$this->db->limit(1);

		$query = $this->db->get('ustadz');
		if( $query -> num_rows() <> 0 ){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		} else {
			$kode = 1;
		}
		$kode_max = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "UST2020".$kode_max;
		return $kodejadi;
	}

	public function edit_kajian($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function edit_materi($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function edit_tafsir($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function tampil_data($table, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('name', $keyword);
			$this->db->or_like('email', $keyword);
			$this->db->or_like('keahlian', $keyword);
		}
			

			return $this->db->get($table);
	}

	public function dataKajian($table, $keyword = null)
	{

		if ($keyword) {
			$this->db->like('nama_ustadz', $keyword);
			$this->db->or_like('tempat_kajian', $keyword);
			$this->db->or_like('tanggal_kajian', $keyword);
			$this->db->or_like('waktu', $keyword);
			$this->db->or_like('materi_kajian', $keyword);
		}
			

			return $this->db->get($table);
	}

	public function dataMateri($table, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('nama_penulis', $keyword);
			$this->db->or_like('judul', $keyword);
		}
			return $this->db->get($table);
	}

	public function dataTafsir($table, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('penulis', $keyword);
			$this->db->or_like('judul_tafsir', $keyword);
		}
			return $this->db->get($table);
	}

	public function detailDashboard($id)
	{
		$result = $this->db->where('id_ustadz', $id)->get('kajian');

		// kondisi
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function detail_ustadz($id)
	{
		$result = $this->db->where('id_ustadz', $id)->get('ustadz');

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

	// public function ubahDataustadz($table, $data)
	// {
	// 	$name   		= $this->input->post('name');
	// 	$email   		= $this->input->post('email');
	// 	$no_telp 		= $this->input->post('no_telp');
	// 	$tempat_lahir 	= $this->input->post('tempat_lahir');
	// 	$tanggal_lahir 	= $this->input->post('tanggal_lahir');
	// 	$keahlian 		= $this->input->post('keahlian');
	// 	$negara 		= $this->input->post('negara');
	// 	$alamat 		= $this->input->post('alamat');
	// 	$foto 			= $this->input->post('foto');


	// 		// insert kedalam database
	// 		$this->db->update('ustadz', $data);
	// }


	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}