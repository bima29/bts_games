<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property CI_Loader $load
 * @property CI_Input $input
 * @property CI_Output $output
 * @property CI_Session $session
 * @property CI_DB $db
 * @property Auth_model $auth_model
 */
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth_model');
    }

    public function index()
    {
        // Check if user is already logged in
        if ($this->session->userdata('user_id')) {
            // Redirect based on the role_id
            $role_id = $this->session->userdata('role_id');
            if ($role_id == 1 || $role_id == 2) {
                redirect('admin');
            } elseif ($role_id == 3) {
                redirect(base_url());
            }
        } else {
            // Load login page if not logged in
            $this->load->view('Partials/Fitur/header');
            $this->load->view('Partials/Fitur/Login/content');
            $this->load->view('Partials/Fitur/footer');
        }
    }

    public function sign_up()
    {
        // Check if user is already logged in
        if ($this->session->userdata('user_id')) {
            // Redirect based on the role_id
            $role_id = $this->session->userdata('role_id');
            if ($role_id == 1 || $role_id == 2) {
                redirect('admin');
            } elseif ($role_id == 3) {
                redirect(base_url());
            }
        } else {
            // Load sign-up page if not logged in
            $this->load->view('Partials/Fitur/header');
            $this->load->view('Partials/Fitur/Sign/content');
            $this->load->view('Partials/Fitur/footer');
        }
    }

    public function login()
    {
        // Check if user is already logged in
        if ($this->session->userdata('user_id')) {
            // Redirect based on the role_id
            $role_id = $this->session->userdata('role_id');
            if ($role_id == 1 || $role_id == 2) {
                redirect('admin');
            } elseif ($role_id == 3) {
                redirect(base_url());
            }
        }

        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));

        $user = $this->auth_model->get_user_by_email_password($email, $password);

        if ($user) {
            $this->session->set_userdata('user_id', $user->id);
            $this->session->set_userdata('username', $user->username);
            $this->session->set_userdata('role_id', $user->role_id);

            // Redirect based on role_id
            if ($user->role_id == 1 || $user->role_id == 2) {
                redirect('admin');
            } elseif ($user->role_id == 3) {
                redirect(base_url());
            }
        } else {
            // Set the error flag for incorrect login attempt
            $this->load->view('Partials/Fitur/header');
            $this->load->view('Partials/Fitur/Login/content', ['login_failed' => true]);
            $this->load->view('Partials/Fitur/footer');
        }
    }
}
