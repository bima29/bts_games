<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        $user_id = $this->session->userdata('user_id');
        $role_id = $this->session->userdata('role_id');
        $role_id = $this->session->userdata('phone');

        if ($this->session->flashdata('success')) {
            $data['success'] = $this->session->flashdata('success');
        }
        if ($this->session->flashdata('error')) {
            $data['error'] = $this->session->flashdata('error');
        }

        if ($user_id) {
            $data['username'] = $this->session->userdata('username');
            $this->load->vars($data);

            if ($role_id === 3) {
                redirect(base_url());
            }
        } else {
            if ($this->uri->segment(1) !== 'auth') {
                redirect(base_url('auth'));
            }
        }
    }
}
