<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ustadz extends CI_Controller{

	 // public function __construct()
  //   {
  //       parent::__construct();
  //       is_logged_in();
  //   }

	public function index()
	{
		$data['title'] 		= 'Profile Ustadz';
		$data['user']  		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ustadz']  	= $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();

        // form validation
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'no_Telp', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal_lahir', 'required');
        $this->form_validation->set_rules('keahlian', 'Keahlian', 'required');
        $this->form_validation->set_rules('negara', 'Negara', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        
        if( $this->form_validation->run() == false ) {
            $this->load->view('templates/header_stisla', $data);
            $this->load->view('templates/sidebar_stisla', $data);
            $this->load->view('templates/navbar_stisla', $data);
            $this->load->view('ustadz/index', $data);
            $this->load->view('templates/footer_stisla');
        } else {

            $nama            = htmlspecialchars($this->input->post('name'));
            $email           = htmlspecialchars($this->input->post('email'));
            $telp            = htmlspecialchars($this->input->post('no_telp'));
            $tempatLahir     = htmlspecialchars($this->input->post('tempat_lahir'));
            $tanggalLahir    = htmlspecialchars($this->input->post('tanggal_lahir'));
            $keahlian        = htmlspecialchars($this->input->post('keahlian'));
            $negara          = htmlspecialchars($this->input->post('negara'));
            $alamat          = htmlspecialchars($this->input->post('alamat'));
            $is_active       = htmlspecialchars($this->input->post('is_active'));
            $password        = htmlspecialchars($this->input->post('password'));
            $tanggal         = htmlspecialchars($this->input->post('date_created'));
            $gambar          = $_FILES['foto']['name'];

            if($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['upload_path']   = './assets/img/profile/';
                $config['max_size']      = '6144';
                $config['max_width']     = '4000';
                $config['max_height']    = '2000';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('foto')){
                    $gambar = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }

        $data = [
            'name'          => $nama,
            'email'         => $email,
            'no_telp'       => $telp,
            'tempat_lahir'  => $tempatLahir,
            'tanggal_lahir' => $tanggalLahir,
            'keahlian'      => $keahlian,
            'negara'        => $negara,
            'alamat'        => $alamat,
            'foto'          => $gambar,
            'password'      => $password,
            'date_created'  => $tanggal,
            'is_active'     => $is_active
        ];

            $this->db->insert('ustadz', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat..! Profilmu Anda Sudah Lengkap</div>');
            redirect('ustadz');

        }
	}

	public function dashboard() {
		$data['title'] 		= 'Dashboard Saya';
		$data['user']  		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ustadz']  	= $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('ustadz/dashboard', $data);
        $this->load->view('templates/footer_stisla');
	}


	public function editProfile()
	{
		// rules
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_telp', 'No_telp', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tangal_lahir', 'Tangal_lahir', 'required');
        $this->form_validation->set_rules('keahlian', 'Keahlian', 'required');
        $this->form_validation->set_rules('negara', 'Negara', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('foto', 'foto', 'required');

        $id              = htmlspecialchars($this->input->post('id_ustadz'));
        $nama            = htmlspecialchars($this->input->post('name'));
        $email           = htmlspecialchars($this->input->post('email'));
        $telp      		 = htmlspecialchars($this->input->post('no_telp'));
        $tempatLahir     = htmlspecialchars($this->input->post('tempat_lahir'));
        $tanggalLahir    = htmlspecialchars($this->input->post('tanggal_lahir'));
        $keahlian        = htmlspecialchars($this->input->post('keahlian'));
        $negara          = htmlspecialchars($this->input->post('negara'));
        $alamat          = htmlspecialchars($this->input->post('alamat'));
        $gambar 	     = $_FILES['foto']['name'];

            if($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['upload_path']   = './assets/img/profile/';
                $config['max_size']      = '6144';
                $config['max_width']     = '4000';
                $config['max_height']    = '2000';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('foto')){
                    $gambar = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
			}

        $data = [
            'name' 		    => $nama,
            'email'  	    => $email,
            'no_telp'       => $telp,
            'tempat_lahir'  => $tempatLahir,
            'tanggal_lahir' => $tanggalLahir,
            'keahlian'      => $keahlian,
            'negara'		=> $negara,
            'alamat'		=> $alamat,
            'foto'			=> $gambar
        ];
            
        $this->db->where('email', $email);
        $this->db->update('ustadz', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat..! Profilmu Berhasil Di Ubah</div>');
        redirect('ustadz');
	}


	public function kajian(){
		$data['title'] 	= 'Jadwal Kajian';
		$data['user'] 	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ustadz'] = $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();
        $data['kajian'] = $this->db->get_where('kajian', ['email' => $this->session->userdata('email')])->result_array();

        // rules 
        $this->form_validation->set_rules('nama_ustadz', 'Nama_ustadz', 'required');
        $this->form_validation->set_rules('tempat_kajian', 'Tempat_Kajian', 'required');
        $this->form_validation->set_rules('tanggal_kajian', 'Tanggal_kajian', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('materi_kajian', 'Materi_kajian', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_stisla', $data);
            $this->load->view('templates/sidebar_stisla', $data);
            $this->load->view('templates/navbar_stisla', $data);
            $this->load->view('ustadz/kajian', $data);
            $this->load->view('templates/footer_stisla');
        } else {
            // jika data ada, siapkan data
        $id              = htmlspecialchars($this->input->post('id_ustadz', true));
        $email           = htmlspecialchars($this->input->post('email', true));
        $namaUstadz      = htmlspecialchars($this->input->post('nama_ustadz', true));
        $tempatKajian    = htmlspecialchars($this->input->post('tempat_kajian', true));
        $tglKajian       = htmlspecialchars($this->input->post('tanggal_kajian', true));
        $waktu           = htmlspecialchars($this->input->post('waktu', 'Waktu', true));
        $materiKajian    = htmlspecialchars($this->input->post('materi_kajian', true));
        $gambar          = $_FILES['gambar']['name'];

            if($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['upload_path']   = './assets/img/kajian/';
                $config['max_size']      = '6144';
                $config['max_width']     = '4000';
                $config['max_height']    = '2000';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('gambar')){
                    $gambar = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            
            $data = [
                'id_ustadz'         => $id,
                'nama_ustadz'       => $namaUstadz,
                'email'             => $email,
                'tempat_kajian'     => $tempatKajian,
                'tanggal_kajian'    => $tglKajian,
                'waktu'             => $waktu,
                'materi_kajian'     => $materiKajian,
                'gambar'            => $gambar,
                'is_active'         => 1
            ];

            // masukkan data kedalam database
            $this->db->insert('kajian', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">Selamat...! Jadwal Kajian Berhasil Dibuat</div>');
            redirect('ustadz/kajian');
        }
	}


	public function editKajian($id)
    {
        $id              = ['id' => $id];
        $data['title']   = "Edit Jadwal Kajian";
        $data['user']    = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
        $data['ustadz']  = $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array(); 
        $data['kajian']  = $this->Ustadz_model->edit_kajian($id, 'kajian')->result_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('ustadz/editKajian', $data);
        $this->load->view('templates/footer_stisla');
    }

	public function editJadwalKajian() {

        // rules 
        $this->form_validation->set_rules('nama_ustadz', 'Nama_ustadz', 'required');
        $this->form_validation->set_rules('tempat_kajian', 'Tempat_Kajian', 'required');
        $this->form_validation->set_rules('tanggal_kajian', 'Tanggal_kajian', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('materi_kajian', 'Materi_kajian', 'required');

        if( $this->form_validation->run() == false ) {
            $this->editKajian();
        } else {
            $id              = htmlspecialchars($this->input->post('id'));
            $nama            = htmlspecialchars($this->input->post('nama_ustadz'));
            $tempat          = htmlspecialchars($this->input->post('tempat_kajian'));
            $email           = htmlspecialchars($this->input->post('email'));
            $tanggal         = htmlspecialchars($this->input->post('tanggal_kajian'));
            $waktu           = htmlspecialchars($this->input->post('waktu'));
            $materi          = htmlspecialchars($this->input->post('materi_kajian'));
            $status          = htmlspecialchars($this->input->post('is_active'));
            $gambar          = $_FILES['gambar']['name'];

            if($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['upload_path']   = './assets/img/kajian/';
                $config['max_size']      = '6144';
                $config['max_width']     = '4000';
                $config['max_height']    = '2000';
                $this->load->library('upload', $config);
                if($this->upload->do_upload('gambar')){
                    $gambar = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }

        $data = [
            'nama_ustadz'       => htmlspecialchars($nama),
            'tempat_kajian'     => htmlspecialchars($tempat),
            'email'             => htmlspecialchars($email),
            'tanggal_kajian'    => htmlspecialchars($tanggal),
            'waktu'             => htmlspecialchars($waktu),
            'materi_kajian'     => htmlspecialchars($materi),
            'is_active'         => htmlspecialchars($status),
            'gambar'            => htmlspecialchars($gambar)
        ];

            $id = ['id' => $id];
                
            $this->db->where($id);
            $this->db->update('kajian', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat..! Jadwal Kajian Berhasil Di Ubah</div>');
            redirect('ustadz/kajian');
        }
	}

	public function hapusKajian($id) {
		$id = ['id' => $id];
		$this->db->where($id);
		$this->db->delete('kajian');
		$this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">Selamat...! Jadwal Kajian Berhasil Dihapus</div>');
		redirect('ustadz/kajian');
	}

    public function materi_islami(){
        $data['title']  = 'Materi Islami';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ustadz'] = $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();
        $data['materi'] = $this->db->get_where('materi_islami', ['email' => $this->session->userdata('email')])->result_array();


        // rules 
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');

        if( $this->form_validation->run() == false ) {
            $this->load->view('templates/header_stisla', $data);
            $this->load->view('templates/sidebar_stisla', $data);
            $this->load->view('templates/navbar_stisla', $data);
            $this->load->view('ustadz/materi_islami', $data);
            $this->load->view('templates/footer_stisla');
        } else  {
            // jika data ada, siapkan data
            $id              = htmlspecialchars($this->input->post('id_ustadz', true));
            $namaPenulis     = htmlspecialchars($this->input->post('nama_penulis', true));
            $email           = htmlspecialchars($this->input->post('email', 'Email', true));
            $judul           = htmlspecialchars($this->input->post('judul', 'Judul', true));
            $konten          = $this->input->post('konten', 'konten', true);

                $data = [
                    'id_ustadz'         => $id,
                    'nama_penulis'      => $namaPenulis,
                    'email'             => $email,
                    'judul'             => $judul,
                    'konten'            => $konten
                ];

            // masukkan data kedalam database
            $this->db->insert('materi_islami', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Selamat...! Materi Islami Berhasil Dibuat</div>');
            redirect('ustadz/materi_islami');
        }
    }

    public function detailMateri($id)
    {
        $id             = ['id_materi_islami' => $id];
        $data['title']  = 'Isi Materi Islami';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ustadz'] = $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();
        $data['materi'] = $this->db->get_where('materi_islami', $id)->result_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('ustadz/detailMateriIslami', $data);
        $this->load->view('templates/footer_stisla');
    }


	public function editMateri($id)
    {
        $id              = ['id_materi_islami' => $id];
        $data['title']   = "Edit Materi Islami";
        $data['user']    = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
        $data['ustadz']  = $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array(); 
        $data['materi']  = $this->Ustadz_model->edit_materi($id, 'materi_islami')->result_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('ustadz/editMateri', $data);
        $this->load->view('templates/footer_stisla');
    }

	public function editMateriIslami() {
        // rules 
        // rules 
        $this->form_validation->set_rules('nama_penulis', 'Nama_penulis', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');

        if ( $this->form_validation->run() == false ) {
             $this->ediTafsir();
        } else {

            $id              = htmlspecialchars($this->input->post('id_materi_islami', true));
            $penulis         = htmlspecialchars($this->input->post('nama_penulis', true));
            $judul           = htmlspecialchars($this->input->post('judul', true));
            $konten          = $this->input->post('konten', true);
            
            $data = [
                'nama_penulis'  => $penulis,
                'judul'         => $judul,
                'konten'        => $konten
            ];

            $id = ['id_materi_islami' => $id];

            // masukkan data kedalam database
            $this->db->where($id);
            $this->db->update('materi_islami', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Selamat...! Materi Islami Anda Berhasil Diubah</div>');
            redirect('ustadz/materi_islami');
        }
	}

	public function hapusMateri($id) {
		$id = ['id_materi_islami' => $id];

		$this->db->where($id);
		$this->db->delete('materi_islami');
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Selamat...! Materi Islami Berhasil Dihapus</div>');

		redirect('ustadz/materi_islami');
	}

    public function tafsir(){
        $data['title']      = 'Tafsir';
        $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ustadz']     = $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();
        $data['tafsir']     = $this->db->get_where('tafsir', ['email' => $this->session->userdata('email')])->result_array();
        $data['keahlian']   = $this->db->get_where('ustadz', ['keahlian' == 'Tafsir'])->result_array();

        // rules 
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('judul_tafsir', 'Judul_tafsir', 'required');
        $this->form_validation->set_rules('isi_tafsir', 'Isi_tafsir', 'required');

        if( $this->form_validation->run() == false ) {
            $this->load->view('templates/header_stisla', $data);
            $this->load->view('templates/sidebar_stisla', $data);
            $this->load->view('templates/navbar_stisla', $data);
            $this->load->view('ustadz/tafsir', $data);
            $this->load->view('templates/footer_stisla');
        } else {
            // jika data ada, siapkan data
        $id              = htmlspecialchars($this->input->post('id_ustadz', true));
        $penulis         = htmlspecialchars($this->input->post('penulis', true));
        $email           = htmlspecialchars($this->input->post('email', true));
        $judul           = htmlspecialchars($this->input->post('judul_tafsir', true));
        $isi             = $this->input->post('isi_tafsir', true);

            $data = [
                'id_ustadz'     => $id,
                'penulis'       => $penulis,
                'email'         => $email,
                'judul_tafsir'  => $judul,
                'isi_tafsir'    => $isi
            ];

            // masukkan data kedalam database
            $this->db->insert('tafsir', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Selamat...! Tafsir Berhasil Dibuat</div>');
            redirect('ustadz/tafsir');

        }
    }

    public function detailTafsir($id)
    {
        $id = ['id_tafsir' => $id];
        $data['title']  = 'Isi Tafsir';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ustadz'] = $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();
        $data['tafsir'] = $this->db->get_where('tafsir', $id)->result_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('ustadz/detailTafsir', $data);
        $this->load->view('templates/footer_stisla');
    }

	public function editTafsir($id)
    {
        $id              = ['id_tafsir' => $id];
        $data['title']   = "Edit Tafsir";
        $data['user']    = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
        $data['ustadz']  = $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array(); 
        $data['tafsir']  = $this->Ustadz_model->edit_tafsir($id, 'tafsir')->result_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('ustadz/editTafsir', $data);
        $this->load->view('templates/footer_stisla');
    }

	public function editTafsirSaya()
	{
        // rules 
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('judul_tafsir', 'Judul_tafsir', 'required');
        $this->form_validation->set_rules('isi_tafsir', 'Isi_tafsir', 'required');

        if ( $this->form_validation->run() == false ) {
             $this->ediTafsir();
        } else {

            $id              = htmlspecialchars($this->input->post('id_tafsir', true));
            $penulis         = htmlspecialchars($this->input->post('penulis', true));
            $email           = htmlspecialchars($this->input->post('email', true));
            $judul           = htmlspecialchars($this->input->post('judul_tafsir', true));
            $isi             = $this->input->post('isi_tafsir', true);
            
            $data = [
                'penulis'       => $penulis,
                'judul_tafsir'  => $judul,
                'email'         => $email,
                'isi_tafsir'    => $isi
            ];

            $id = ['id_tafsir' => $id];

            // masukkan data kedalam database
            $this->db->where($id);
            $this->db->update('tafsir', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Selamat...! Tafsir Berhasil Diubah</div>');
            redirect('ustadz/tafsir');
        }
	}

	public function hapusTafsir($id) {
		$id = ['id_tafsir' => $id];
		$this->db->where($id);
		$this->db->delete('tafsir');
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Selamat...! Tafsir Berhasil Dihapus</div>');
		redirect('ustadz/tafsir');
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

	public function editUstadz($id){
		$id 				= ['id_ustadz' => $id];
		$data['title'] 		= 'Edit Ustadz';
		$data['user']  		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ustadz'] 	= $this->db->get('ustadz', $id)->result_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('ustadz/edit_ustadz', $data);
        $this->load->view('templates/footer_stisla');
	}

	public function editAksesUstadz(){

		// rules 
		$this->form_validation->set_rules('is_active', 'Is_active', 'required');

		// kondisi
		if( $this->form_validation->run() == false ){
			$this->editUstadz();
		} else {

			$id        = ['id_ustadz' => $id];
			$is_active = $this->input->post('is_active', true);

			$data = ['is_active' => $is_active];

            $this->db->where($id);
			$this->db->update('ustadz', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akses ustadz Berhasil Diubah</div>');
	 		redirect('administrator/data_ustadz');
		}
	}

	  
	public function delete($id)
	{
		$where = ['id_ustadz' => $id];
		$this->Ustadz_model->hapus_data($where, 'ustadz');
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Ustadz Berhasil Dihapus</div>');
		redirect('administrator/data_ustadz');
	}
}