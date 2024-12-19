<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Midtrans\Config;
use Midtrans\Snap;

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model', 'homes');
        require_once FCPATH . 'vendor/autoload.php';
        $this->load->database();
        $query = $this->db->get_where('payment_gateway_config', ['id' => 1]);
        $config = $query->row();

        Config::$serverKey = $config->server_key;
        Config::$clientKey = $config->client_key;
        Config::$isProduction = (bool)$config->is_production;
        Config::$isSanitized = (bool)$config->is_sanitized;
        Config::$is3ds = (bool)$config->is_3ds;
    }

    public function index()
    {
        $category_name = $this->input->get('category');
        $search_query = $this->input->get('search');

        if ($category_name) {
            $data['games'] = $this->homes->get_games_by_category($category_name);
        } else {
            $data['games'] = $this->homes->get_games_by_search($search_query);
        }

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
        $category_name = $this->input->get('category');
        $search_query = $this->input->get('search');

        if ($category_name) {
            $data['games'] = $this->homes->get_games_by_category($category_name);
        } else {
            $data['games'] = $this->homes->get_games_by_search($search_query);
        }

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
        $data['prices'] = $this->homes->get_all_prices();

        $this->load->view('Partials/header', $data);
        $this->load->view('Partials/navigasi');
        $this->load->view('Partials/Price_List/content');
        $this->load->view('Partials/footer');
    }

    public function review()
    {
        $this->load->view('Partials/header');
        $this->load->view('Partials/navigasi');
        $this->load->view('Partials/Review/content');
        $this->load->view('Partials/footer');
    }

    public function Checkout1($id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect(base_url('auth'));
        }

        // Ambil data game berdasarkan ID
        $data['game'] = $this->db->get_where('games', ['id' => $id])->row();

        if (!$data['game']) {
            show_404();
        }

        // Ambil data price_list berdasarkan game_name
        $data['price_list'] = $this->db->get_where('price_list', ['product_name' => $data['game']->game_name])->result();

        // Ambil unit unik dari price_list
        $this->db->distinct();
        $this->db->select('unit');
        $this->db->where('product_name', $data['game']->game_name);
        $data['units'] = $this->db->get('price_list')->result();

        $this->load->view('Partials/Fitur/header', $data);
        $this->load->view('Partials/Fitur/Checkout/content1', $data);
        $this->load->view('Partials/Fitur/footer');
    }

    public function Checkout2($price_id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect(base_url('auth'));
        }

        $user_id = $this->session->userdata('user_id');
        $user = $this->db->get_where('users', ['id' => $user_id])->row();
        if (!$user) {
            show_404();
        }

        $price = $this->db->get_where('price_list', ['id' => $price_id])->row();
        if (!$price) {
            show_404();
        }

        $game = $this->db->get_where('games', ['game_name' => $price->product_name])->row();
        if (!$game) {
            show_404();
        }

        $gross_amount = round($price->price);
        $transaction_details = [
            'order_id' => 'order-' . uniqid(),
            'gross_amount' => $gross_amount,
        ];

        $customer_details = [
            'first_name' => $user->full_name,
            'last_name' => "",
            'email' => $user->email,
            'phone' => $user->phone,
        ];

        $transaction_data = [
            'payment_type' => 'credit_card',
            'credit_card' => ['secure' => true],
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
        ];

        $snap_token = Snap::getSnapToken($transaction_data);

        $data = [
            'price' => $price,
            'game' => $game,
            'price_id' => $price_id,
            'snap_token' => $snap_token,
            'user' => $user,
        ];

        $this->load->view('Partials/Fitur/header', $data);
        $this->load->view('Partials/Fitur/input_detail/index', $data);
        $this->load->view('Partials/Fitur/footer');
    }

    public function SavePayment()
    {
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";

        $status = $this->input->post('status');
        $user_id = $this->input->post('user_id');
        $game_code = $this->input->post('game_code');
        $game_name = $this->input->post('game_name');
        $topup_amount = $this->input->post('topup_amount');
        $price = $this->input->post('price');
        $buyer_name = $this->input->post('buyer_name');
        $gameId = $this->input->post('game_id');

        if (!$game_code || !$game_name || !$topup_amount || !$price || !$buyer_name || !$gameId) {
            echo "Missing required fields.";
            die;
        }

        $data = [
            'user_id' => $user_id,
            'gameid' => $gameId,
            'game_code' => $game_code,
            'game_name' => $game_name,
            'topup_amount' => $topup_amount,
            'price' => $price,
            'order_date' => date('Y-m-d H:i:s'),
            'buyer_name' => $buyer_name,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert('orders', $data);

        if ($status === 'success') {
            echo ('Success Cok');
        } elseif ($status === 'pending') {
            echo ('Pending Cok');
        } else {
            echo ('Gagal Cok');
        }
    }



    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
}
