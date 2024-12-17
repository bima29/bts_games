<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model', 'homes');
    }

    public function index()
    {
        $data['games'] = $this->homes->get_all_games();
        $data['categories'] = $this->homes->get_all_categories();
        $data['banners'] = $this->homes->get_all_banners();


        $this->load->view('Partials/header', $data);
        $this->load->view('Partials/navigasi');
        $this->load->view('Partials/banner');
        $this->load->view('Partials/Home/content');
        $this->load->view('Partials/footer');
    }
    public function games()
    {
        $data['games'] = $this->homes->get_all_games();
        $data['categories'] = $this->homes->get_all_categories();

        $this->load->view('Partials/header', $data);
        $this->load->view('Partials/navigasi');
        $this->load->view('Partials/All_Game/content');
        $this->load->view('Partials/footer');
    }
    public function track()
    {
        if (!$this->session->userdata('user_id')) {
            redirect(base_url('auth'));
        }
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
        if (!$this->session->userdata('user_id')) {
            redirect(base_url('auth'));
        }
        $this->load->view('Partials/header');
        $this->load->view('Partials/navigasi');
        $this->load->view('Partials/Live/content');
        $this->load->view('Partials/footer');
    }
    public function Checkout1($id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect(base_url('auth'));
        }

        $data['game'] = $this->db->get_where('games', ['id' => $id])->row();

        if (!$data['game']) {
            show_404();
        }

        $data['price_list'] = $this->db->get_where('price_list', ['product_name' => $data['game']->game_name])->result();

        $this->db->distinct();
        $this->db->select('unit');
        $this->db->where('product_name', $data['game']->game_name);
        $data['units'] = $this->db->get('price_list')->result();

        $this->load->view('Partials/Fitur/header', $data);
        $this->load->view('Partials/Fitur/Checkout/content1', $data);
        $this->load->view('Partials/Fitur/footer');
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
}
