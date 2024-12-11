<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        
        // Check if user is logged in on every page
        $user_id = $this->session->userdata('user_id');
        $role_id = $this->session->userdata('role_id');

        if ($user_id) {
            // Optionally load user data into views (like username, role_id, etc.)
            $data['username'] = $this->session->userdata('username');
            $this->load->vars($data);

            // You can handle role-based logic here
            if ($role_id === 3) {
                // Redirect role_id 3 users to the home page
                redirect(base_url());
            }
        } else {
            // Redirect to login if not logged in and not on 'auth' page
            if ($this->uri->segment(1) !== 'auth') {
                redirect(base_url('auth'));
            }
        }
    }
}
