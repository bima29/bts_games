<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth_model');
    }

    public function index()
    {
        if ($this->session->userdata('user_id')) {
            $role_id = $this->session->userdata('role_id');
            if ($role_id == 1 || $role_id == 2) {
                redirect(base_url('admin'));
            } elseif ($role_id == 3) {
                redirect(base_url());
            }
        } else {
            $this->load->view('Partials/Fitur/header');
            $this->load->view('Partials/Fitur/Login/content');
            $this->load->view('Partials/Fitur/footer');
        }
    }

    public function sign_up()
    {
        if ($this->session->userdata('user_id')) {
            $role_id = $this->session->userdata('role_id');
            if ($role_id == 1 || $role_id == 2) {
                redirect(base_url('admin'));
            } elseif ($role_id == 3) {
                redirect(base_url());
            }
        } else {
            $this->load->view('Partials/Fitur/header');
            $this->load->view('Partials/Fitur/Sign/content');
            $this->load->view('Partials/Fitur/footer');
        }
    }

    public function register()
    {
        $telp = $this->input->post('telp');
        $email = $this->input->post('email');
        $fullName = $this->input->post('fullName');
        $nickName = $this->input->post('nickName');
        $password = $this->input->post('password');
        $passwordVer = $this->input->post('passwordVer');

        $errors = [];

        if (empty($telp)) {
            $errors['telp'] = 'No Telepon is required.';
        }

        if (empty($email)) {
            $errors['email'] = 'Email Address is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format.';
        }

        if (empty($fullName)) {
            $errors['fullName'] = 'Nama Lengkap is required.';
        }

        if (empty($nickName)) {
            $errors['nickName'] = 'Nama Panggilan is required.';
        }

        if (empty($password)) {
            $errors['password'] = 'Password is required.';
        } elseif (strlen($password) < 6) {
            $errors['password'] = 'Password must be at least 6 characters.';
        }

        if (empty($passwordVer)) {
            $errors['passwordVer'] = 'Password Verifikasi is required.';
        } elseif ($password !== $passwordVer) {
            $errors['passwordVer'] = 'Passwords do not match.';
        }

        if (!empty($errors)) {
            $this->load->view('Partials/Fitur/header');
            $this->load->view('Partials/Fitur/Sign/content', ['errors' => $errors]);
            $this->load->view('Partials/Fitur/footer');
        } else {
            $data = array(
                'username' => $nickName,
                'email' => $email,
                'phone' => $telp,
                'password' => sha1($password),
                'full_name' => $fullName,
                'role_id' => 3,
                'profile_picture' => 'default.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            if ($this->auth_model->insert_user($data)) {
                $this->session->set_flashdata('message', 'Registrasi berhasil! Silakan login.');
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', 'Registrasi gagal! Coba lagi.');
                redirect('sign_up');
            }
        }
    }


    public function prosses_login()
    {
        if ($this->session->userdata('user_id')) {
            $role_id = $this->session->userdata('role_id');
            if ($role_id == 1 || $role_id == 2) {
                redirect(base_url('admin'));
            } elseif ($role_id == 3) {
                redirect(base_url());
            }
        }

        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));

        $user = $this->auth_model->get_user_by_email_password($email, $password);

        if ($user) {
            $session_data = array(
                'user_id'   => $user->id,
                'username'  => $user->username,
                'role_id'   => $user->role_id,
                'phone'   => $user->phone,
                'profile_picture'   => $user->profile_picture
            );
            $this->session->set_userdata($session_data);

            // Update login_at field after successful login
            $this->auth_model->update_login_at($user->id);

            if ($user->role_id == 1 || $user->role_id == 2) {
                redirect(base_url('admin'));
            } elseif ($user->role_id == 3) {
                redirect(base_url());
            }
        } else {
            $this->load->view('Partials/Fitur/header');
            $this->load->view('Partials/Fitur/Login/content', ['login_failed' => true]);
            $this->load->view('Partials/Fitur/footer');
        }
    }
}
