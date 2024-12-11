<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property CI_Loader $load
 * @property CI_Input $input
 * @property CI_Output $output
 * @property CI_Session $session
 * @property CI_DB $db
 */
class Admin extends CI_Controller {
    public function index()
    {
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/index');
        $this->load->view('admin/partials/footer');
    }
 
    public function track_order()
    {
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/track_order');
        $this->load->view('admin/partials/footer');
    }
  
    public function price_list()
    {
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/price_list');
        $this->load->view('admin/partials/footer');
    }
   
    public function live_chat()
    {
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/live_chat');
        $this->load->view('admin/partials/footer');
    }

    public function game_categories()
    {
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/game_categories');
        $this->load->view('admin/partials/footer');
    }

    public function game_list()
    {
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/game_list');
        $this->load->view('admin/partials/footer');
    }

    public function banner()
    {
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/banner');
        $this->load->view('admin/partials/footer');
    }

    public function payment_gateway()
    {
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/payment_gateway');
        $this->load->view('admin/partials/footer');
    }

    public function digiflazz()
    {
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/digiflazz');
        $this->load->view('admin/partials/footer');
    }
   
}