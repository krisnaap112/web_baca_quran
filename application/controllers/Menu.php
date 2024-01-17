<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    
	public function index()
	{
		$data['title'] = "Menu Management";
        $data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
        	$this->load->view('templates/header_stisla', $data);
	        $this->load->view('templates/sidebar_stisla', $data);
	        $this->load->view('templates/navbar_stisla', $data);
	        $this->load->view('menu/index', $data);
	        $this->load->view('templates/footer_stisla');
        } else {
        	$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Berhasil Di Tambahkan</div>');
            redirect('menu');
        }
	}
	public function submenu()
	{

		$data['title']   = "Submenu Management";
        $data['user']    = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
        $data['subMenu']  = $this->Menu_model->tampil_data('user_sub_menu')->result_array();
        $data['menu']     = $this->db->get('user_menu')->result_array();
        

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');



        if($this->form_validation->run() == false){
        	// view
        $this->load->view('templates/header_stisla', $data);
	    $this->load->view('templates/sidebar_stisla', $data);
	    $this->load->view('templates/navbar_stisla', $data);
	    $this->load->view('menu/submenu', $data);
	    $this->load->view('templates/footer_stisla');
        } else {
        	$data = [
        		'title'       => $this->input->post('title'),
        		'menu_id'     => $this->input->post('menu_id'),
        		'url'         => $this->input->post('url'),
        		'icon'        => $this->input->post('icon'),
        		'is_active'   => $this->input->post('is_active')
        	];
        	$this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu Berhasil Di Tambahkan</div>');
            redirect('menu/submenu');
        }
	}

    public function update($id)
    {
        $where           = ['id' => $id];
        $data['title']   = "Submenu Management";
        $data['user']    = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
        $data['subMenu'] = $this->Menu_model->edit_data($where, 'user_sub_menu')->result();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('menu/update_menu', $data);
        $this->load->view('templates/footer_stisla');
    }

    public function update_menu()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('is_active', 'Is_active', 'required');

        $id              = $this->input->post('id');
        $title           = $this->input->post('title');
        $menu_id         = $this->input->post('menu_id');
        $url             = $this->input->post('url');
        $icon            = $this->input->post('icon');
        $is_active       = $this->input->post('is_active');

        $where = ['id' => $id];
            $this->Menu_model->update_menu($where, $data, $table);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Sub Menu Berhasil Ubah</div>');
            redirect('menu/submenu');
        }

    public function delete_menu($id)
    {
        $id = ['id'    => $id];
        $this->db->where($id);
        $this->db->delete('user_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Berhasil Di Hapus</div>');
        redirect('menu');
    }

    public function delete($id)
    {
        $where = ['id' => $id];
        $this->Menu_model->hapus_data($where, 'user_sub_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu Berhasil Di Hapus</div>');
        redirect('menu/submenu');
    }
}