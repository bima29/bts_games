<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Notification extends CI_Controller
{

    public function index()
    {
        $this->load->view('all_notifications/header');
        $this->load->view('all_notifications/success/content');
        $this->load->view('all_notifications/footer');
    }
    public function failure()
    {
        $this->load->view('all_notifications/header');
        $this->load->view('all_notifications/failure/content');
        $this->load->view('all_notifications/footer');
    }
    public function pending()
    {
        $this->load->view('all_notifications/header');
        $this->load->view('all_notifications/pending/content');
        $this->load->view('all_notifications/footer');
    }
}
