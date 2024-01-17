<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer_stisla');
    }

    public function contact()
    {
        $data['title'] = "Message";
        $data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['message'] = $this->db->get('message')->result_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('admin/contact', $data);
        $this->load->view('templates/footer_stisla');
    }

    public function contactuss()
    {
        $data['title'] = "Kontakus";
        $data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kontakus'] = $this->db->get('kontakus')->result_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('admin/contactuss', $data);
        $this->load->view('templates/footer_stisla');
    }

    public function delete($id)
    {
        $where = ['id' => $id];
        $this->Message_model->delete($where, 'message');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Message Has Been Delete</div>');
            redirect('administrator/contact');
    }

    public function deletek($id_k)
    {
        $where = ['id_k' => $id_k];
        $this->Kontakus_model->delete($where, 'kontakus');
        $this->session->set_flashdata('kontakus', '<div class="alert alert-danger" role="alert">Message Has Been Delete</div>');
            redirect('administrator/contactuss');
    }

     public function role()
    {
        $data['title'] = "Access";
        $data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role']  = $this->db->get('access')->result_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer_stisla');
    }

     public function roleAccess($role_id)
    {
        $data['title'] = "Role Access";
        $data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role']  = $this->db->get_where('access', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer_stisla');
    }

    public function roleUpdate($id){
        $where = ['id' => $id];
        $data['title'] = "Update Role";
        $data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role']  = $this->Admin_model->edit_data($where, 'access')->result();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('admin/role_update', $data);
        $this->load->view('templates/footer_stisla');
    }

    public function updateAccess(){
        $id    = $this->input->post('id');
        $role  = $this->input->post('access');
        $where = ['id' => $id];

        $this->Admin_model->updateRole($where, $data, 'access');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role Has been Updated</div>');
        redirect('administrator/role');
    }

    public function deleteRole($id){
        $where = ['id' => $id];
        $this->Admin_model->deleteRole($where, 'access');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Role Has been Deleted</div>');
        redirect('administrator/role');
    }

    public function addRole(){
        $data['title'] = "Add New Role";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // rules
        $this->form_validation->set_rules('access', 'Access', 'required');

        // kondisi
        if ($this->form_validation->run() == false)
        {
            $this->load->view('templates/header_stisla', $data);
            $this->load->view('templates/sidebar_stisla', $data);
            $this->load->view('templates/navbar_stisla', $data);
            $this->load->view('akademik/jurusan', $data);
            $this->load->view('templates/footer_stisla');
        } else {
            // insert ke database
                $this->Admin_model->addRole();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role Has Been Added</div>');
                redirect('administrator/role');
        }
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if($result->num_rows() < 1){
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed</div>');
    }

    public function data_ustadz(){
        $data['title']  = 'Daftar Ustadz';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ustadz'] = $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();
        $data['ustadz'] = $this->Ustadz_model->tampil_data('ustadz')->result();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('admin/data_ustadz', $data);
        $this->load->view('templates/footer_stisla');
    }

}