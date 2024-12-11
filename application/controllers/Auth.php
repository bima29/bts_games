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
                'role_id'   => $user->role_id
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
