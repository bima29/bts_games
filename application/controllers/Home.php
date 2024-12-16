<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {

        $this->load->view('Partials/header');
        $this->load->view('Partials/navigasi');
        $this->load->view('Partials/banner');
        $this->load->view('Partials/Home/content');
        $this->load->view('Partials/footer');
    }
    public function games()
    {
        $this->load->view('Partials/header');
        $this->load->view('Partials/navigasi');
        $this->load->view('Partials/All_Game/content');
        $this->load->view('Partials/footer');
    }
    public function track()
    {
        $this->load->view('Partials/header');
        $this->load->view('Partials/navigasi');
        $this->load->view('Partials/Track_Order/content');
        $this->load->view('Partials/footer');
    }
    public function price()
    {
        $this->load->view('Partials/header');
        $this->load->view('Partials/navigasi');
        $this->load->view('Partials/Price_list/content');
        $this->load->view('Partials/footer');
    }
    public function review()
    {
        $this->load->view('Partials/header');
        $this->load->view('Partials/navigasi');
        $this->load->view('Partials/Review/content');
        $this->load->view('Partials/footer');
    }
    public function Live()
    {
        $this->load->view('Partials/header');
        $this->load->view('Partials/navigasi');
        $this->load->view('Partials/Live/content');
        $this->load->view('Partials/footer');
    }
    public function Checkout1()
    {
        $this->load->view('Partials/Fitur/header');
        $this->load->view('Partials/Fitur/Checkout/content1');
        $this->load->view('Partials/Fitur/footer');
    }
    public function Checkout2()
    {
        $this->load->view('Partials/Fitur/header');
        $this->load->view('Partials/Fitur/Checkout/content2');
        $this->load->view('Partials/Fitur/footer');
    }
    public function Checkout3()
    {
        $this->load->view('Partials/Fitur/header');
        $this->load->view('Partials/Fitur/Checkout/content3');
        $this->load->view('Partials/Fitur/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
}
