<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi_islam extends CI_Controller{

	 // public function __construct()
  //   {
  //       parent::__construct();
  //       is_logged_in();
  //   }

	public function index()
	{
		$data['title'] 		= 'Daftar Materi Islami';
		$data['user']  		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ustadz']  	= $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();
		$data['materi']		= $this->db->get('materi_islami')->result_array();
 
        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('materi islam/index', $data);
        $this->load->view('templates/footer_stisla');
	}

	public function pesan() {

		$nama   	 	 = htmlspecialchars($this->input->post('name', true));
		$email 	 		 = htmlspecialchars($this->input->post('email', true));
		$subject 	  	 = htmlspecialchars($this->input->post('subject', true));
		$message  	  	 = htmlspecialchars($this->input->post('message', 'Waktu', true));
			
			$data = [
				'name'		=> $nama,
				'email'		=> $email,
				'subject'	=> $subject,
				'message'	=> $message
			];

			// masukkan data kedalam database
			$this->db->insert('message', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">Selamat...! Pesanmu Berhasil Dibuat</div>');
			if ( $ustadz ) {
				redirect('ustadz');
			} else {
				redirect('user');
			}
	}

	

	public function data_ustadz(){
		$data['title'] 	= 'Daftar Ustadz';
		$data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ustadz'] = $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();

		// ambil data keyword
		if($this->input->post("submit")){
			$data['keyword'] = $this->input->post('keyword');
		} else {
			$data['keyword'] = null;
		}

		$data['ustadz']	= $this->Ustadz_model->tampil_data('ustadz', $data['keyword'])->result();

		$this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('ustadz/data_ustadz', $data);
        $this->load->view('templates/footer_stisla');
	}

	public function kajian(){
		$data['title'] 	= 'Jadwal Kajian';
		$data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ustadz'] = $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();
		$data['kajian'] = $this->db->get("kajian")->result();


		$this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla1', $data);
        $this->load->view('ustadz/kajian', $data);
        $this->load->view('templates/footer_stisla');
	}

	public function buat_jadwal(){
		$data['title'] 	= 'Jadwal Kajian';
		$data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ustadz'] = $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();

		 // rules
        $this->form_validation->set_rules('nama_ustadz', 'Nama_ustadz', 'required');
        $this->form_validation->set_rules('tempat_kajian', 'Tempat_kajian', 'required');
        $this->form_validation->set_rules('tanggal_kajian', 'Tanggal_kajian', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('materi_kajian', 'Materi_kajian', 'required');
        $this->form_validation->set_rules('is_active', 'Is_active', 'required');

        if ($this->form_validation->run() == false) {
        	$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
	        $this->load->view('templates/navbar_stisla1', $data);
	        $this->load->view('ustadz/buat_kajian', $data);
	        $this->load->view('templates/footer_stisla');
        } else {
        	 $data = [
                'nama_ustadz'    => htmlspecialchars($this->input->post('nama_ustadz', true)),
                'tempat_kajian'  => htmlspecialchars($this->input->post('tempat_kajian', true)),
                'tanggal_kajian' => htmlspecialchars($this->input->post('tanggal_kajian', true)),
                'waktu' 		 => htmlspecialchars($this->input->post('waktu', true)),
                'materi_kajian'  => htmlspecialchars($this->input->post('materi_kajian', true)),
                'is_active'    	 => 1
            ];

            $this->db->insert('kajian', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal Kajian Berhasil Dibuat</div>');
			redirect('ustadz');
        }
	}

	public function detail($id)
	{
		$data['title'] 		= 'Profile Ustadz';
		$data['user']  		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['detail'] 	= $this->Ustadz_model->detail_ustadz($id);


        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('ustadz/profile_ustadz', $data);
        $this->load->view('templates/footer_stisla');
	}

	public function update($id)
	{
		$where 		    	= ['id_ustadz' => $id];
		$data['title']  	= "Ubah Data ustadz";
		$data['user']   	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ustadz']     = $this->Ustadz_model->edit_data($where, 'ustadz')->result();

		$this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla1', $data);
        $this->load->view('ustadz/update_ustadz', $data);
        $this->load->view('templates/footer_stisla');
	}

	public function update_ustadz()
	{
		$id 			 = $this->input->post('kode_ustadz');
		$nama_ustadz     = $this->input->post('nama_ustadz');
		$alamat 	     = $this->input->post('alamat');
		$email 	 		 = $this->input->post('email');
		$no_telpon 	     = $this->input->post('no_telpon');
		$tempat_lahir 	 = $this->input->post('tempat_lahir');
		$tanggal_lahir 	 = $this->input->post('tanggal_lahir');
		$mata_pelajaran  = $this->input->post('mata_pelajaran');
		$image 	         = $this->input->post('image');
		$is_active 	     = $this->input->post('is_active');

        $where = ['id_ustadz' => $id];

		$this->ustadz_model->ubahDataustadz($where, $data, 'ustadz');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mahasiswa Berhasil Diubah</div>');
		redirect('ustadz');
	}
	  
	public function delete($id)
	{
		$where = ['id_ustadz' => $id];
			$this->ustadz_model->hapus_data($where, 'ustadz');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Mahasiswa Berhasil Dihapus</div>');
			redirect('ustadz');
	}
}