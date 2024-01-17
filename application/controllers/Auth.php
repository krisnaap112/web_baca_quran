<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    // method index
    public function index()
    {
        if($this->session->userdata('email')) {
            redirect('user');
        }
        // rules
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        // condition
        if($this->form_validation->run() == false){
            $data['title'] = "User Login";
            $this->load->view('templates/header_stisla', $data);
            $this->load->view('auth/login');
            
        } else {
            // validasi success
            $this->login();
        }
    }

    // method login
    private function login()
    {
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $user       = $this->db->get_where('user', ['email' => $email])->row_array();

        if($user){
            // jika usernya aktif
            if($user['is_active'] == 1 ) {
                // cek passwordnya
                if(password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if( $user['role_id'] == 1 ) {
                        redirect('administrator');
                    } elseif( $user['role_id'] == 2 ) {
                        redirect('user');
                    }
                     else {
                        redirect('ustadz');
                    }
                     
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Email Has Not Activated</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Is Not Registered!</div>');
            redirect('auth');
        }
    }

    // method registration
    public function registration()
    {
        $data['negara'] = $this->db->get('negara')->result_array();

        if($this->session->userdata('email')) {
            redirect('user');
        }
        // form validation
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'This email is already registered']);
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('role_id', 'Role_id', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password1]', ['matches'   => 'Password Dont Matches!',
        'min_length'   => 'Password At Least Minimum 8 character']);
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|matches[password]');
        // condition
        if( $this->form_validation->run() == false ) {
            $data['title'] = 'Member Registration';
            $this->load->view('templates/header_stisla', $data);
            $this->load->view('auth/registration', $data);
            
        } else {
            $email      = $this->input->post('email', true);
            $role_id    = $this->input->post('role_id', true);

            if($role_id == "Member") {
                echo $role_id = 2;
            } else {
                echo $role_id = 3;
            }

            $data = [
                'name_user'    => htmlspecialchars($this->input->post('name', true)),
                'email'        => htmlspecialchars($email),
                'country'      => htmlspecialchars($this->input->post('country', true)),
                'image'        => 'default.jpg',
                'password'     => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id'      => $role_id,
                'is_active'    => 1,
                'date_created' => time()
            ];

            // insert to database user
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Your Accout Has Been Already Created! Please Login</div>');
            redirect('auth');
        }
    }

    // method registration
    public function registration_ustadz()
    {
        $data['kode']      = $this->Ustadz_model->kode_ustadz();
        $data['negara'] = $this->db->get('negara')->result_array();

        if($this->session->userdata('email')) {
            redirect('user');
        }
        
        // form validation
        $this->form_validation->set_rules('id_ustadz', 'Id_ustadz', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'This email is already registered']);
        $this->form_validation->set_rules('no_telp', 'no_Telp', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal_lahir', 'required|trim');
        $this->form_validation->set_rules('keahlian', 'Keahlian', 'required|trim');
        $this->form_validation->set_rules('negara', 'Negara', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password1]', ['matches'   => 'Password Dont Matches!',
        'min_length'     => 'Password At Least Minimum 8 character']);
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|matches[password]');

        // condition
        if( $this->form_validation->run() == false ) {
            $data['title'] = 'Register Ustadz';
            $this->load->view('templates/header_stisla', $data);
            $this->load->view('auth/registration_ustadz');
        } else {
            $id     = $this->input->post('id_ustadz', true);
            $email = $this->input->post('email', true);
            $data = [
                'id_ustadz'     => htmlspecialchars($id),
                'name'          => htmlspecialchars($this->input->post('name', true)),
                'email'         => htmlspecialchars($email),
                'no_telp'       => htmlspecialchars($this->input->post('no_telp', true)),
                'tempat_lahir'  => htmlspecialchars($this->input->post('tanggal_lahir', true)),
                'tempat_lahir'  => htmlspecialchars($this->input->post('tempat_lahir', true)),
                'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', true)),
                'keahlian'      => htmlspecialchars($this->input->post('keahlian', true)),
                'negara'        => htmlspecialchars($this->input->post('negara', true)),
                'alamat'        => htmlspecialchars($this->input->post('alamat', true)),
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'foto'          => 'default.jpg',
                'role_id'       => 3,
                'is_active'     => 0,
                'date_created'  => time()
            ];

            // siapkan token
            $token = base64_encode(random_bytes(40));
            $token = [
                'email'        => $email,
                'token'        => $token,
                'date_created' => time()
            ];

            // insert to database user
            $this->db->insert('ustadz', $data);
            // insert to database user_token
            $this->db->insert('token', $token);

            $this->sendEmail($token, 'verify');


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Your Accout Has Been Already Created! Please Activated Account</div>');
            redirect('auth/index1');
        }
    }

    private function sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'maestroindonesia211@gmail.com',
            'smtp_pass' => 'maestroindonesiadotcom',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('maestroindonesia211@gmail.com', 'Maestro Indonesia');
        $this->email->to($this->input->post('email'));

        if($type == 'verify') {
            $this->email->subject('Verification Your Account');
            $this->email->message('Click this link to verify your account : <a href="'. base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activated Account</a>');
        } else if($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset password : <a href="'. base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if($this->email->send()){
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user  = $this->db->get_where('user', ['email' => $email])->row_array();

        if($user) {
            $token = $this->db->get_where('token', ['token' => $token])->row_array();

            if($token) {

                if(time() - $token['date_created'] < (60 * 60 * 24)){
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');
                    // delete token karena sudah tak terpakai
                    $this->db->delete('token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">This Email '. $email .' Has Been Activated! Please Login</div>');
                        redirect('auth');
                        
                } else {
                    // hapus token dan username lama karena sudah expired
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account Activation Failed! Token Expired</div>');
                        redirect('auth');
                }

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account Activation Failed! Wrong Token</div>');
                    redirect('auth');
            }

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account Activation Failed! Wrong Email</div>');
                redirect('auth');
        }
    }

    // method logout member
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('id_ustadz');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You Have Been Logged Out</div>');
        redirect('auth');
    }

    // method logout ustadz
    public function logout1()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You Have Been Logged Out</div>');
        redirect('auth/index1');
    }

    public function blocked()
    {
       $this->load->view('auth/blocked');
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if($this->form_validation->run() == false){
            $data['title'] = "Forgot Password";
            $this->load->view('templates/header_stisla', $data);
            $this->load->view('auth/forgot-password');
            
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if($user) {
                $token = base64_encode(random_bytes(40));
                $token = [
                    'email'        => $email,
                    'token'        => $token,
                    'date_created' => time()
                ];

                $this->db->insert('token', $token);
                $this->sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please Check Your Email To Reset Password</div>');
                    redirect('auth/forgotPassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Is Not Registered Or Activated</div>');
                    redirect('auth/forgotPassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if($user) {
            $token = $this->db->get_where('token', ['token' => $token])->row_array();

            if($token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Failed! Wrong Token</div>');
                    redirect('auth');
            }

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Failed! Wrong Email</div>');
                redirect('auth');
        }
    }

    public function changePassword()
    {
        if(!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[password1]');
        $this->form_validation->set_rules('password1', 'Repeat Password', 'trim|required|min_length[8]|matches[password]');
        if($this->form_validation->run() == false){
            $data['title'] = "Change Password";
            $this->load->view('templates/header_stisla', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/footer_stisla');
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Has Been Reset</div>');
                redirect('auth');
        }
    }
}