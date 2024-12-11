<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Check if the user is logged in
        $role_id = $this->session->userdata('role_id');
        if ($role_id == 3) {
            redirect(base_url()); // Redirect to home page if role_id is 3
        }
    }

    public function index()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/index');
        $this->load->view('admin/partials/footer');
    }

    public function track_order()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/track_order');
        $this->load->view('admin/partials/footer');
    }

    public function price_list()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/price_list');
        $this->load->view('admin/partials/footer');
    }

    public function live_chat()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/live_chat');
        $this->load->view('admin/partials/footer');
    }

    public function game_categories()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/game_categories');
        $this->load->view('admin/partials/footer');
    }

    public function game_list()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/game_list');
        $this->load->view('admin/partials/footer');
    }

    public function banner()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/banner');
        $this->load->view('admin/partials/footer');
    }

    public function payment_gateway()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/payment_gateway');
        $this->load->view('admin/partials/footer');
    }

    public function digiflazz()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/digiflazz');
        $this->load->view('admin/partials/footer');
    }

    public function account_role()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/account_role');
        $this->load->view('admin/partials/footer');
    }

    public function manage_account()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/manage_account');
        $this->load->view('admin/partials/footer');
    }

    public function profile()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/profile');
        $this->load->view('admin/partials/footer');
    }
    public function logout()
    {
        $this->session->sess_destroy();

        redirect(base_url('auth'));
    }
}
