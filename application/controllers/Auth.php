<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index()
    {
        // var_dump($_SESSION);die;
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            // Validasinya success
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('data_user', array('email' => $email))->row_array();

            // Cek jika data user ada
            if ($user) {
                // Cek jika password benar
                if (password_verify($password, $user['password'])) {

                    // Kalau semua sudah dicek maka buat session
                    $data = [
                        'email' => $user['email'],
                        'role' => $user['role']
                    ];

                    $this->session->set_userdata($data);

                    if (strtolower($this->session->userdata('role')) == 'user') {
                        redirect('user', 'refresh');
                    } elseif (strtolower($this->session->userdata('role')) == 'admin') {
                        redirect('admin', 'refresh');
                    }
                } else {
                    flashData('Email atau Password tidak benar!', 'Gagal Login', 'error');
                    redirect('auth', 'refresh');
                }
            } else {
                flashData('Email atau Password tidak benar!', 'Gagal Login', 'error');
                redirect('auth', 'refresh');
            }
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[data_user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register');
        } else {
            // Data Users
            $data = [
                'name' => htmlspecialchars($this->input->post('name', TRUE)),
                'email' => htmlspecialchars($this->input->post('email', TRUE)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => "User"
            ];

            $this->Auth_model->registration($data);
            redirect('auth', 'refresh');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');

        redirect('auth', 'refresh');
    }

    function Blocked($code) {
        if ($code == '404') {
            $this->load->view('auth/404');
        }
    }
}

/* End of file: Auth.php */
