<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function index()
    {
        $this->load->view('Partials/Fitur/header');
        $this->load->view('Partials/Fitur/Login/content');
        $this->load->view('Partials/Fitur/footer');
    }
    public function sign_up()
    {
        $this->load->view('Partials/Fitur/header');
        $this->load->view('Partials/Fitur/Sign/content');
        $this->load->view('Partials/Fitur/footer');
    }
}