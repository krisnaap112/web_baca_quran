<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quran extends CI_Controller{

	 // public function __construct()
  //   {
  //       parent::__construct();
  //       is_logged_in();
  //   }

	public function index()
	{
		$data['title'] 		= 'Al Quran';
		$data['user']  		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ustadz']  	= $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();

		// ambil data keyword
		if($this->input->post("submit")){
			$data['keyword'] = $this->input->post('keyword');
		} else {
			$data['keyword'] = null;
		}

		$this->db->like('surah', $data['keyword']);
		$this->db->or_like('arti_surah', $data['keyword']);
		$this->db->or_like('jumlah_ayat', $data['keyword']);
		$this->db->or_like('jenis_surah', $data['keyword']);
		$this->db->or_like('jumlah_ayat', $data['keyword']);
		$this->db->from('surah');
		$data['jumlah'] = $this->db->count_all_results();

		$data['quran']	= $this->Quran_model->tampil_data('surah', $data['keyword'])->result_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        if ($data['ustadz']) {
        	$this->load->view('templates/navbar_stisla', $data);
        } else {
        	 $this->load->view('templates/navbar_stisla', $data);
        }
        $this->load->view('quran/index', $data);
        $this->load->view('templates/footer_stisla');
	}

	
	public function ayat()
	{
		$data['title'] 		= 'Al Quran';
		$data['user']  		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ustadz']  	= $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->get('surah');
		$this->db->order_by('jumlah_ayat', 'asc');

		// ambil data keyword
		if($this->input->post("submit")){
			$data['keyword'] = $this->input->post('keyword');
		} else {
			$data['keyword'] = null;
		}

		$data['surat']	= $this->Quran_model->tampil_data('surah', $data['keyword'])->result();

		$this->db->like('surah', $data['keyword']);
		$this->db->or_like('arti_surah', $data['keyword']);
		$this->db->or_like('jumlah_ayat', $data['keyword']);
		$this->db->or_like('jenis_surah', $data['keyword']);
		$this->db->from('surah');
		$data['jumlah'] = $this->db->count_all_results();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        if ($data['ustadz']) {
        	$this->load->view('templates/navbar_stisla', $data);
        } else {
        	 $this->load->view('templates/navbar_stisla', $data);
        }
        $this->load->view('quran/ayat', $data);
        $this->load->view('templates/footer_stisla');
	}

	public function card()
	{
		$data['title'] 		= 'Al Quran';
		$data['user']  		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ustadz']  	= $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();

		// ambil data keyword
		if($this->input->post("submit")){
			$data['keyword'] = $this->input->post('keyword');
		} else {
			$data['keyword'] = null;
		}

		$this->db->like('surah', $data['keyword']);
		$this->db->or_like('arti_surah', $data['keyword']);
		$this->db->or_like('jumlah_ayat', $data['keyword']);
		$this->db->or_like('jenis_surah', $data['keyword']);
		$this->db->from('surah');
		$data['jumlah'] = $this->db->count_all_results();

		$data['surat']	= $this->Quran_model->tampil_surah('surah', $data['keyword'])->result_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        if ($data['ustadz']) {
        	$this->load->view('templates/navbar_stisla', $data);
        } else {
        	 $this->load->view('templates/navbar_stisla', $data);
        }
        $this->load->view('quran/card', $data);
        $this->load->view('templates/footer_stisla');
	}

	public function cardAyat()
	{
		$data['title'] 		= 'Al Quran';
		$data['user']  		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ustadz']  	= $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->get('surah');
		$this->db->order_by('jumlah_ayat', 'asc');

		// ambil data keyword
		if($this->input->post("submit")){
			$data['keyword'] = $this->input->post('keyword');
		} else {
			$data['keyword'] = null;
		}

		$data['surat']	= $this->Quran_model->tampil_data('surah', $data['keyword'])->result_array();

		$this->db->like('surah', $data['keyword']);
		$this->db->or_like('arti_surah', $data['keyword']);
		$this->db->or_like('jumlah_ayat', $data['keyword']);
		$this->db->or_like('jenis_surah', $data['keyword']);
		$this->db->from('surah');
		$data['jumlah'] = $this->db->count_all_results();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        if ($data['ustadz']) {
        	$this->load->view('templates/navbar_stisla', $data);
        } else {
        	 $this->load->view('templates/navbar_stisla', $data);
        }
        $this->load->view('quran/card_ayat', $data);
        $this->load->view('templates/footer_stisla');
	}


	
	public function murottal()
	{
		$data['title'] 		= 'Murottal Quran';
		$data['user']  		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ustadz']  	= $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();

		// ambil data keyword
		if($this->input->post("submit")){
			$data['keyword'] = $this->input->post('keyword');
		} else {
			$data['keyword'] = null;
		}

		$this->db->like('judul', $data['keyword']);
		$this->db->or_like('qori', $data['keyword']);
		$this->db->from('murottal');
		$data['jumlah'] = $this->db->count_all_results();

		$data['murottal']	= $this->Quran_model->tampil_murottal('murottal', $data['keyword'])->result_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        if ($data['ustadz']) {
        	$this->load->view('templates/navbar_stisla', $data);
        } else {
        	 $this->load->view('templates/navbar_stisla', $data);
        }
        $this->load->view('quran/murottal', $data);
        $this->load->view('templates/footer_stisla');
	}

	public function materi()
	{
		$data['user']  		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['ustadz']  	= $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] 		= "Materi Al Quran";
		$data['materi']		= $this->db->get('materi_quran')->result_array();

		$this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        if ($data['ustadz']) {
        	$this->load->view('templates/navbar_stisla', $data);
        } else {
        	 $this->load->view('templates/navbar_stisla', $data);
        }
        $this->load->view('quran/materi', $data);
        $this->load->view('templates/footer_stisla');
	}


	
	public function detail($id)
	{
		$data['user']  		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['detail'] 	= $this->Quran_model->detail_quran($id);
		$data['ustadz']  	= $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();
		

		if($id == 1){
			$data['quran']		= $this->db->get('quran_id', 7, 0)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Fatihah';

			
	        $this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);

		} elseif($id == 2) {
			$data['quran']		= $this->db->get('quran_id', 286, 7)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 1)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Baqarah';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);

		} elseif($id == 3) {
			$data['quran']		= $this->db->get('quran_id', 200, 293)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 2)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Ali Imran';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);

		} elseif($id == 4) {
			$data['quran']		= $this->db->get('quran_id', 176, 493)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 3)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'An Nisa';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);

	    } elseif($id == 5) {
			$data['quran']		= $this->db->get('quran_id', 120, 669)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 4)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Maidah';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);

	    } elseif($id == 6) {
			$data['quran']		= $this->db->get('quran_id', 165, 789)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 5)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al An`am';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 7) {
			$data['quran']		= $this->db->get('quran_id', 206, 954)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 6)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al A`raf';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 8) {
			$data['quran']		= $this->db->get('quran_id', 75, 1160)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 7)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Anfal';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 9) {
			$data['quran']		= $this->db->get('quran_id', 129, 1235)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 8)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'At Taubah';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 10) {
			$data['quran']		= $this->db->get('quran_id', 109, 1364)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 9)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Yunus';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 11) {
			$data['quran']		= $this->db->get('quran_id', 123, 1473)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 10)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Hud';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 12) {
			$data['quran']		= $this->db->get('quran_id', 111, 1596)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 11)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Yusuf';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 13) {
			$data['quran']		= $this->db->get('quran_id', 43, 1707)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 12)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Ar R`ad';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 14) {
			$data['quran']		= $this->db->get('quran_id', 52, 1750)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 13)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Ibrahim';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 15) {
			$data['quran']		= $this->db->get('quran_id', 99, 1802)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 14)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Hijr';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 16) {
			$data['quran']		= $this->db->get('quran_id', 128, 1901)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 15)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'An Nahl';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 17) {
			$data['quran']		= $this->db->get('quran_id', 111, 2029)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 16)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Isra';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 18) {
			$data['quran']		= $this->db->get('quran_id', 110, 2140)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 17)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Kahf';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 19) {
			$data['quran']		= $this->db->get('quran_id', 98, 2250)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 18)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Maryam';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 20) {
			$data['quran']		= $this->db->get('quran_id', 135, 2348)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 19)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Ta-Ha';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 21) {
			$data['quran']		= $this->db->get('quran_id', 112, 2483)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 20)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Anbiya';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 22) {
			$data['quran']		= $this->db->get('quran_id', 78, 2595)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 21)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Hajj';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 23) {
			$data['quran']		= $this->db->get('quran_id', 118, 2673)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 22)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Mu`minun';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 24) {
			$data['quran']		= $this->db->get('quran_id', 64, 2791)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 23)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'An Nur';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 25) {
			$data['quran']		= $this->db->get('quran_id', 77, 2855)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 24)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Furqan';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 26) {
			$data['quran']		= $this->db->get('quran_id', 227, 2932)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 25)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'As Syu`ara';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 27) {
			$data['quran']		= $this->db->get('quran_id', 93, 3159)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 26)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'An Naml';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 28) {
			$data['quran']		= $this->db->get('quran_id', 88, 3252)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 27)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Qasas';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 29) {
			$data['quran']		= $this->db->get('quran_id', 69, 3340)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 28)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Ankabut';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 30) {
			$data['quran']		= $this->db->get('quran_id', 60, 3409)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 29)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Ar Rum';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 31) {
			$data['quran']		= $this->db->get('quran_id', 34, 3469)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 30)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Luqman';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 32) {
			$data['quran']		= $this->db->get('quran_id', 30, 3503)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 31)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'As Sajdah';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 33) {
			$data['quran']		= $this->db->get('quran_id', 73, 3533)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 32)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Ahzab';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 34) {
			$data['quran']		= $this->db->get('quran_id', 54, 3606)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 33)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Saba';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 35) {
			$data['quran']		= $this->db->get('quran_id', 45, 3660)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 34)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Fatir';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 36) {
			$data['quran']		= $this->db->get('quran_id', 83, 3705)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 35)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Yasin';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 37) {
			$data['quran']		= $this->db->get('quran_id', 182, 3788)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 36)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'As Saffat';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 38) {
			$data['quran']		= $this->db->get('quran_id', 88, 3970)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 37)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Sad';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 39) {
			$data['quran']		= $this->db->get('quran_id', 75, 4058)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 38)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Az Zumar';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 40) {
			$data['quran']		= $this->db->get('quran_id', 85, 4133)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 39)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Ghafir';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 41) {
			$data['quran']		= $this->db->get('quran_id', 54, 4218)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 40)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Fussilat';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 42) {
			$data['quran']		= $this->db->get('quran_id', 53, 4272)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 41)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Asy Syura';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 43) {
			$data['quran']		= $this->db->get('quran_id', 89, 4325)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 42)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Az Zukhruf';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 44) {
			$data['quran']		= $this->db->get('quran_id', 59, 4414)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 43)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Ad Dukhan';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 45) {
			$data['quran']		= $this->db->get('quran_id', 37, 4473)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 44)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Jasiyah';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 46) {
			$data['quran']		= $this->db->get('quran_id', 35, 4510)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 45)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Ahqaf';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 47) {
			$data['quran']		= $this->db->get('quran_id', 38, 4545)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 46)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Muhammad';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 48) {
			$data['quran']		= $this->db->get('quran_id', 29, 4583)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 47)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Fath';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 49) {
			$data['quran']		= $this->db->get('quran_id', 18, 4612)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 48)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Hujurat';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 50) {
			$data['quran']		= $this->db->get('quran_id', 45, 4630)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 49)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Qaf';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 51) {
			$data['quran']		= $this->db->get('quran_id', 60, 4675)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 50)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Az Zariyat';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 52) {
			$data['quran']		= $this->db->get('quran_id', 49, 4735)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 51)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'At Tur';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 53) {
			$data['quran']		= $this->db->get('quran_id', 62, 4784)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 52)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'An Najm';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 54) {
			$data['quran']		= $this->db->get('quran_id', 55, 4846)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 53)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Qamar';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 55) {
			$data['quran']		= $this->db->get('quran_id', 78, 4901)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 54)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Ar Rahman';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 56) {
			$data['quran']		= $this->db->get('quran_id', 96, 4979)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 55)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Waqiah';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 57) {
			$data['quran']		= $this->db->get('quran_id', 29, 5075)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 56)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Hadid';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 58) {
			$data['quran']		= $this->db->get('quran_id', 22, 5104)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 57)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Mujadilah';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 59) {
			$data['quran']		= $this->db->get('quran_id', 24, 5126)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 58)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Hasyr';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 60) {
			$data['quran']		= $this->db->get('quran_id', 13, 5150)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 59)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Mumtahanah';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 61) {
			$data['quran']		= $this->db->get('quran_id', 14, 5163)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 60)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'As Saff';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 62) {
			$data['quran']		= $this->db->get('quran_id', 11, 5177)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 61)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Jumu`ah';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 63) {
			$data['quran']		= $this->db->get('quran_id', 11, 5188)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 62)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Munafiqun';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 64) {
			$data['quran']		= $this->db->get('quran_id', 18, 5199)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 63)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'At Taghabun';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 65) {
			$data['quran']		= $this->db->get('quran_id', 12, 5217)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 64)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'At Talaq';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 66) {
			$data['quran']		= $this->db->get('quran_id', 12, 5229)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 65)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'At Tahrim';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 67) {
			$data['quran']		= $this->db->get('quran_id', 30, 5241)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 66)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Mulk';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 68) {
			$data['quran']		= $this->db->get('quran_id', 52, 5271)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 67)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Qalam';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 69) {
			$data['quran']		= $this->db->get('quran_id', 52, 5323)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 68)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Haqqah';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 70) {
			$data['quran']		= $this->db->get('quran_id', 44, 5375)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 69)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Ma`arij';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 71) {
			$data['quran']		= $this->db->get('quran_id', 28, 5419)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 70)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Nuh';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 72) {
			$data['quran']		= $this->db->get('quran_id', 28, 5447)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 71)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Jinn';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 73) {
			$data['quran']		= $this->db->get('quran_id', 20, 5475)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 72)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Muzammil';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 74) {
			$data['quran']		= $this->db->get('quran_id', 56, 5495)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 73)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Muddassir';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 75) {
			$data['quran']		= $this->db->get('quran_id', 40, 5551)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 74)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Qiyamah';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 76) {
			$data['quran']		= $this->db->get('quran_id', 31, 5591)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 75)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Insan';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 77) {
			$data['quran']		= $this->db->get('quran_id', 50, 5622)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 76)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Mursalat';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 78) {
			$data['quran']		= $this->db->get('quran_id', 40, 5672)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 77)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'An Naba';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 79) {
			$data['quran']		= $this->db->get('quran_id', 46, 5712)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 78)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'An Nazi`at';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 80) {
			$data['quran']		= $this->db->get('quran_id', 42, 5758)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 79)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Abasa';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 81) {
			$data['quran']		= $this->db->get('quran_id', 29, 5800)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 80)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'At Takwir';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 82) {
			$data['quran']		= $this->db->get('quran_id', 19, 5829)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 81)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'At Infitar';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 83) {
			$data['quran']		= $this->db->get('quran_id', 36, 5848)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 82)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'At Muthaffifiin';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 84) {
			$data['quran']		= $this->db->get('quran_id', 25, 5884)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 83)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'At Insiqaq';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 85) {
			$data['quran']		= $this->db->get('quran_id', 22, 5909)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 84)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'At Buruj';

			$this->load->view('templates/header_stisla', $data);
		    if ($data['ustadz']) {
	        	$this->load->view('templates/navbar_stisla', $data);
	        } else {
	        	 $this->load->view('templates/navbar_stisla', $data);
	        }
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	    } elseif($id == 86) {
			$data['quran']		= $this->db->get('quran_id', 17, 5931)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 85)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'At Thariq';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 87) {
			$data['quran']		= $this->db->get('quran_id', 19, 5948)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 86)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al A`la';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 88) {
			$data['quran']		= $this->db->get('quran_id', 26, 5967)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 87)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Ghasyiyah';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 89) {
			$data['quran']		= $this->db->get('quran_id', 30, 5993)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 88)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Fajr';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 90) {
			$data['quran']		= $this->db->get('quran_id', 20, 6023)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 89)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Balad';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 91) {
			$data['quran']		= $this->db->get('quran_id', 15, 6043)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 90)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'As Syams';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 92) {
			$data['quran']		= $this->db->get('quran_id', 21, 6058)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 91)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Lail';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 93) {
			$data['quran']		= $this->db->get('quran_id', 11, 6079)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 92)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Ad Duha';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 94) {
			$data['quran']		= $this->db->get('quran_id', 8, 6090)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 93)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Insyirah';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 95) {
			$data['quran']		= $this->db->get('quran_id', 8, 6098)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 94)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'At Tin';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 96) {
			$data['quran']		= $this->db->get('quran_id', 19, 6106)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 95)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Alaq';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 97) {
			$data['quran']		= $this->db->get('quran_id', 5, 6125)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 96)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Qadr';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 98) {
			$data['quran']		= $this->db->get('quran_id', 8, 6130)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 97)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Bayyinah';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 99) {
			$data['quran']		= $this->db->get('quran_id', 8, 6138)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 98)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Az Zalzalah';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 100) {
			$data['quran']		= $this->db->get('quran_id', 11, 6146)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 99)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Adiyat';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 101) {
			$data['quran']		= $this->db->get('quran_id', 11, 6157)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 100)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Qari`ah';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 102) {
			$data['quran']		= $this->db->get('quran_id', 8, 6168)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 101)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'At Takasur';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 103) {
			$data['quran']		= $this->db->get('quran_id', 3, 6176)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 102)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Asr';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 104) {
			$data['quran']		= $this->db->get('quran_id', 9, 6179)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 103)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Humazah';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 105) {
			$data['quran']		= $this->db->get('quran_id', 5, 6188)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 104)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Fil';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 106) {
			$data['quran']		= $this->db->get('quran_id', 4, 6193)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 105)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Quraisy';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 107) {
			$data['quran']		= $this->db->get('quran_id', 7, 6197)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 106)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Ma`un';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 108) {
			$data['quran']		= $this->db->get('quran_id', 3, 6204)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 107)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Kausar';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 109) {
			$data['quran']		= $this->db->get('quran_id', 6, 6207)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 108)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Kafirun';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 110) {
			$data['quran']		= $this->db->get('quran_id', 3, 6213)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 109)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'An Nasr';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 111) {
			$data['quran']		= $this->db->get('quran_id', 5, 6216)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 110)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Lahab';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 112) {
			$data['quran']		= $this->db->get('quran_id', 4, 6221)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 111)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Ikhlas';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 113) {
			$data['quran']		= $this->db->get('quran_id', 5, 6225)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 112)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'Al Falaq';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    } elseif($id == 114) {
			$data['quran']		= $this->db->get('quran_id', 6, 6230)->result();
			$data['surah']		= $this->db->get_where('surah', ['arti_surah'], 1, 113)->result_array();
			$data['bismillah']  = $this->db->get_where('quran_id', ['ayat'], 1)->result_array();
			$data['title'] 		= 'An Nas';

			$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
			$this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('quran/Al Quran', $data);
	        $this->load->view('templates/footer_stisla', $data);
	        
	    }
	}
}