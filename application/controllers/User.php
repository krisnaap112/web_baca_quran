<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    //  public function __construct()
    // {
    //     parent::__construct();
    //     is_logged_in();
    // }
    
    public function index()
    {
        $data['title']  = "My Profile";
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ustadz'] = $this->db->get_where('ustadz', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer_stisla');
    }

    public function member()
    {
        $data['title']  = "Account Member";
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['member'] = $this->Member_model->tampilData('user')->result();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('user/member', $data);
        $this->load->view('templates/footer_stisla');
    }

    public function edit()
    {
        $data['title'] = "Edit Profile";
        $data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name_user', 'Full Name', 'required|trim');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header_stisla', $data);
            $this->load->view('templates/sidebar_stisla', $data);
            $this->load->view('templates/navbar_stisla', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer_stisla');
        } else {
            $name        = $this->input->post('name_user');
            $email       = $this->input->post('email');
            $facebook    = $this->input->post('facebook');
            $twitter     = $this->input->post('twitter');
            $github      = $this->input->post('github');
            $instagram   = $this->input->post('instagram');
            // cek jika ada gambar
            $uploadImage = $_FILES['image']['name'];

            if($uploadImage) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg|docx';
                $config['max_size']      = '6144';
                $config['upload_path']   = './assets/img/profile/';
                $this->load->library('upload', $config);

                if($this->upload->do_upload('image')){
                    $old_image = $data['user']['image'];
                    if($old_image != 'default.jpg'){
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            // jalankan query / insert ke database
            $this->db->set('name_user', $name);
            $this->db->set('facebook', $facebook);
            $this->db->set('twitter', $twitter);
            $this->db->set('github', $github);
            $this->db->set('instagram', $instagram);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Your Profile Has Been Updated</div>');
            redirect('user');
        }
    }

    public function editMember($id)
    {
        $where          = ['id' => $id];
        $data['title']  = "Updated Account Member";
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['member'] = $this->Member_model->editData($where, 'user')->result();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('user/update_member', $data);
        $this->load->view('templates/footer_stisla');
    }

    public function updateAccountMember()
    {
        $id           = $this->input->post('id');
        $name         = $this->input->post('name_user');
        $email        = $this->input->post('email');
        $role_id      = $this->input->post('role_id');
        $status       = $this->input->post('is_active');
        // $facebook    = $this->input->post('facebook');
        // $twitter     = $this->input->post('twitter');
        // $github      = $this->input->post('github');
        // $instagram   = $this->input->post('instagram');
            
        // siapkan data
        $data = [
            'name_user' => $name,
            'email'     => $email,
            'role_id'   => $role_id,
            'is_active' => $status,
            // 'facebook'  => $facebook,
            // 'twitter'   => $twitter,
            // 'github'    => $github,
            // 'instagram' => $instagram
        ];

        $where = ['id' => $id];

        $this->Member_model->updateAccountMember($where, $data, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Account Member Berhasil Diubah</div>');
        redirect('user/member');
    }

    public function deleteMember($id)
    {
        $where = ['id' => $id];
        $this->Member_model->deleteAccountMember($where, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account Member Berhasil Dihapus</div>');
        redirect('user/member');
    }

     public function changePassword()
    {
        $data['title'] = "Change Password";
        $data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newPassword', 'New Password', 'required|trim|min_length[8]|matches[newPassword1];');
        $this->form_validation->set_rules('newPassword1', 'Confirm New Password', 'required|trim|min_length[8]|matches[newPassword];');

        if($this->form_validation->run() == false ){
            $this->load->view('templates/header_stisla', $data);
            $this->load->view('templates/sidebar_stisla', $data);
            $this->load->view('templates/navbar_stisla', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer_stisla');
        } else {
            $current_password = $this->input->post('currentPassword');
            $new_password = $this->input->post('newPassword');
            if(!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current Password!</div>');
                    redirect('user/changepassword');
            } else {
                if($current_password == $new_password){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password Can Not Be The Same As Current Password</div>');
                        redirect('user/changepassword');
                } else {
                    // password sudah benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Password Has Been Changed</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function tafsir()
    {
        $data['title']  = "Tafsir";
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if($this->input->post("submit")){
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = null;
        }

        $this->db->like('penulis', $data['keyword']);
        $this->db->or_like('judul_tafsir', $data['keyword']);
        $this->db->from('tafsir');
        
        $data['jumlah'] = $this->db->count_all_results();
        $data['tafsir'] = $this->Member_model->tampil_tafsir('tafsir', $data['keyword'])->result_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('user/tafsir', $data);
        $this->load->view('templates/footer_stisla');
    }

     public function bacaTafsir($id)
    {
        $id             = ['id_tafsir' => $id];
        $data['title']  = "Tafsir Quran";
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tafsir'] = $this->db->get_where('tafsir', $id)->result_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('user/bacaTafsir', $data);
        $this->load->view('templates/footer_stisla');
    }

    public function materi_islami()
    {
        $data['title']  = "Materi Islami";
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if($this->input->post("submit")){
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = null;
        }

        $this->db->like('nama_penulis', $data['keyword']);
        $this->db->or_like('judul', $data['keyword']);
        $this->db->or_like('konten', $data['keyword']);
        $this->db->from('materi_islami');
        
        $data['jumlah'] = $this->db->count_all_results();
        $data['materi'] = $this->Member_model->tampil_materi_islami('materi_islami', $data['keyword'])->result_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('user/materi', $data);
        $this->load->view('templates/footer_stisla');
    }

    public function bacaMateri($id)
    {
        $id             = ['id_materi_islami' => $id];
        $data['title']  = "Materi Islami";
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['materi'] = $this->db->get_where('materi_islami', $id)->result_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('user/bacaArtikel', $data);
        $this->load->view('templates/footer_stisla');
    }

    public function kajian()
    {
        $data['title']  = "Kajian";
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // ambil data keyword
        if($this->input->post("submit")){
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = null;
        }

        $this->db->like('nama_ustadz', $data['keyword']);
        $this->db->or_like('tempat_kajian', $data['keyword']);
        $this->db->or_like('tanggal_kajian', $data['keyword']);
        $this->db->or_like('materi_kajian', $data['keyword']);
        $this->db->from('kajian');

        $data['jumlah'] = $this->db->count_all_results();
        $data['kajian'] = $this->Member_model->tampil_kajian('kajian', $data['keyword'])->result_array();

        $this->load->view('templates/header_stisla', $data);
        $this->load->view('templates/sidebar_stisla', $data);
        $this->load->view('templates/navbar_stisla', $data);
        $this->load->view('user/kajian', $data);
        $this->load->view('templates/footer_stisla');
    }
}