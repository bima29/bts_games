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

        $user_id = $this->session->userdata('user_id');


        $orders = $this->homes->get_orders_by_user($user_id);

        $data['orders'] = $orders;

        $this->load->view('Partials/header');
        $this->load->view('Partials/navigasi');
        $this->load->view('Partials/Track_Order/content', $data);
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

    public function paket_data()
    {
        $search = $this->input->get('search');
        $category = $this->input->get('category');

        $data['categories'] = $this->homes->getPaketDataCategories();
        $data['paket_data'] = $this->homes->getFilteredPaketDataItems($category, $search);
        $this->load->view('Partials/header', $data);
        $this->load->view('Partials/navigasi');
        $this->load->view('Partials/Paket_Data/content');
        $this->load->view('Partials/footer');
    }
    public function pulsa()
    {

        $search = $this->input->get('search');
        $category = $this->input->get('category');

        $data['categories'] = $this->homes->getPulsaCategories();
        $data['pulsa_items'] = $this->homes->getFilteredPulsaItems($category, $search);

        $this->load->view('Partials/header');
        $this->load->view('Partials/navigasi');
        $this->load->view('Partials/Pulsa/content', $data);
        $this->load->view('Partials/footer');
    }


    public function Checkout1($id)
    {

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


    public function SelectPayment($price_id)
    {
        // Ambil data price berdasarkan ID
        $data['price'] = $this->db->get_where('price_list', ['id' => $price_id])->row();

        if (!$data['price']) {
            show_404();
        }

        // Tambahkan price_id ke data
        $data['price_id'] = $price_id;

        $this->load->view('Partials/Fitur/pilih_metode/index', $data);
    }



    public function Checkout2($price_id, $fee = null)
    {
        $fee = $fee ?? 0;

        $user_id = $this->session->userdata('user_id');

        if (!$user_id) {
            $price = $this->db->get_where('price_list', ['id' => $price_id])->row();
            if (!$price) {
                show_404();
            }

            $game = $this->db->get_where('games', ['game_name' => $price->product_name])->row();
            if (!$game) {
                show_404();
            }

            $gross_amount = round($price->price + $fee);

            $transaction_details = [
                'order_id' => 'order-' . uniqid(),
                'gross_amount' => $gross_amount,
            ];

            $enabled_payments = [];

            if ($fee == ($price->price * 0.005)) {
                $enabled_payments = ['other_qris'];
            } elseif ($fee == 4500) {
                $enabled_payments = ['bca_va', 'bni_va', 'bri_va', 'echannel', 'other_va', 'permata_va'];
            } elseif ($fee == ($price->price * 0.025)) {
                $enabled_payments = ['gopay'];
            } else {
                $enabled_payments = [
                    'gopay',
                    'shopeepay',
                    'permata_va',
                    'bca_va',
                    'bni_va',
                    'bri_va',
                    'echannel',
                    'other_va',
                    'other_qris',
                    'qris',
                    'indomaret',
                    'alfamart',
                    'akulaku',
                ];
            }

            $transaction_data = [
                'enabled_payments' => $enabled_payments,
                'transaction_details' => $transaction_details,
            ];

            $snap_token = Snap::getSnapToken($transaction_data);

            $data = [
                'price' => $price,
                'fee' => $fee,
                'game' => $game,
                'price_id' => $price_id,
                'snap_token' => $snap_token,
                'user' => null,
            ];

            $this->load->view('Partials/Fitur/header', $data);
            $this->load->view('Partials/Fitur/input_detail/index', $data);
            $this->load->view('Partials/Fitur/footer');
            return;
        }

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

        $gross_amount = round($price->price + $fee);

        $transaction_details = [
            'order_id' => 'order-' . uniqid(),
            'gross_amount' => $gross_amount,
        ];

        $enabled_payments = [];

        if ($fee == ($price->price * 0.005)) {
            $enabled_payments = ['other_qris'];
        } elseif ($fee == 4500) {
            $enabled_payments = ['bca_va', 'bni_va', 'bri_va', 'echannel', 'other_va'];
        } elseif ($fee == ($price->price * 0.025)) {
            $enabled_payments = ['gopay'];
        } else {
            $enabled_payments = [
                'gopay',
                'shopeepay',
                'permata_va',
                'bca_va',
                'bni_va',
                'bri_va',
                'echannel',
                'other_va',
                'other_qris',
                'qris',
                'indomaret',
                'alfamart',
                'akulaku',
            ];
        }

        $transaction_data = [
            'enabled_payments' => $enabled_payments,
            'transaction_details' => $transaction_details,
            'customer_details' => [
                'first_name' => $user->full_name,
                'last_name' => "",
                'email' => $user->email,
                'phone' => $user->phone,
            ],
        ];

        $snap_token = Snap::getSnapToken($transaction_data);

        $data = [
            'price' => $price,
            'fee' => $fee,
            'game' => $game,
            'price_id' => $price_id,
            'snap_token' => $snap_token,
            'user' => $user,
        ];

        // Load view
        $this->load->view('Partials/Fitur/header', $data);
        $this->load->view('Partials/Fitur/input_detail/index', $data);
        $this->load->view('Partials/Fitur/footer');
    }


    public function Checkout3($price_id, $fee = null)
    {
        $fee = $fee ?? 0;

        $user_id = $this->session->userdata('user_id');

        if (!$user_id) {
            $price = $this->db->get_where('price_list', ['id' => $price_id])->row();
            if (!$price) {
                show_404();
            }

            $gross_amount = round($price->price + $fee);

            $transaction_details = [
                'order_id' => 'order-' . uniqid(),
                'gross_amount' => $gross_amount,
            ];


            $enabled_payments = [];

            if ($fee == ($price->price * 0.005)) {
                $enabled_payments = ['other_qris'];
            } elseif ($fee == 4500) {
                $enabled_payments = ['bca_va', 'bni_va', 'bri_va', 'echannel', 'other_va', 'permata_va'];
            } elseif ($fee == ($price->price * 0.025)) {
                $enabled_payments = ['gopay'];
            } else {
                $enabled_payments = [
                    'gopay',
                    'shopeepay',
                    'permata_va',
                    'bca_va',
                    'bni_va',
                    'bri_va',
                    'echannel',
                    'other_va',
                    'other_qris',
                    'qris',
                    'indomaret',
                    'alfamart',
                    'akulaku',
                ];
            }

            $transaction_data = [
                'enabled_payments' => $enabled_payments,
                'transaction_details' => $transaction_details,
            ];

            $snap_token = Snap::getSnapToken($transaction_data);

            $data = [
                'price' => $price,
                'price_id' => $price_id,
                'fee' => $fee,
                'snap_token' => $snap_token,
                'user' => null,
            ];

            $this->load->view('Partials/Fitur/header', $data);
            $this->load->view('Partials/Fitur/input_detail/index');
            $this->load->view('Partials/Fitur/footer');
            return;
        }

        $user = $this->db->get_where('users', ['id' => $user_id])->row();
        if (!$user) {
            show_404();
        }

        $price = $this->db->get_where('price_list', ['id' => $price_id])->row();
        if (!$price) {
            show_404();
        }


        $gross_amount = round($price->price + $fee);

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

        $enabled_payments = [];

        if ($fee == ($price->price * 0.005)) {
            $enabled_payments = ['other_qris'];
        } elseif ($fee == 4500) {
            $enabled_payments = ['bca_va', 'bni_va', 'bri_va', 'echannel', 'other_va'];
        } elseif ($fee == ($price->price * 0.025)) {
            $enabled_payments = ['gopay'];
        } else {
            $enabled_payments = [
                'gopay',
                'shopeepay',
                'permata_va',
                'bca_va',
                'bni_va',
                'bri_va',
                'echannel',
                'other_va',
                'other_qris',
                'qris',
                'indomaret',
                'alfamart',
                'akulaku',
            ];
        }

        $transaction_data = [
            'enabled_payments' => $enabled_payments,
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,

        ];


        $snap_token = Snap::getSnapToken($transaction_data);

        $data = [
            'price' => $price,
            'fee' => $fee,
            'price_id' => $price_id,
            'snap_token' => $snap_token,
            'user' => $user,
        ];


        $this->load->view('Partials/Fitur/header', $data);
        $this->load->view('Partials/Fitur/input_detail/index', $data);
        $this->load->view('Partials/Fitur/footer');
    }

    public function SelectPayment2($price_id)
    {
        // Ambil data price berdasarkan ID
        $data['price'] = $this->db->get_where('price_list', ['id' => $price_id])->row();

        if (!$data['price']) {
            show_404();
        }

        // Tambahkan price_id ke data
        $data['price_id'] = $price_id;

        $this->load->view('Partials/Fitur/pilih_metode/index2', $data);
    }

    public function Checkout4($game_code, $fee = null)
    {
        $fee = $fee ?? 0;

        $user_id = $this->session->userdata('user_id');
        $orderId = $this->input->get('order_id');
        $game_id = $this->input->get('game_id');
        $phone = $this->input->get('phone');
        $buyer_name = $this->input->get('buyer_name');
        $price = $this->input->get('price');
        $satuan = $this->input->get('satuan');

        $user = $this->db->get_where('users', ['id' => $user_id])->row();
        if (!$user) {
            show_404();
        }

        $price = $this->db->get_where('price_list', ['product_code' => $game_code])->row();
        if (!$price) {
            show_404();
        }

        $order = $this->db->get_where('orders', ['id' => $orderId])->row();
        if (!$price) {
            show_404();
        }

        $gross_amount = round($price->price + $fee);

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

        $enabled_payments = [];

        if ($fee == ($price->price * 0.005)) {
            $enabled_payments = ['other_qris'];
        } elseif ($fee == 4500) {
            $enabled_payments = ['bca_va', 'bni_va', 'bri_va', 'echannel', 'other_va', 'permata_va'];
        } elseif ($fee == ($price->price * 0.025)) {
            $enabled_payments = ['gopay'];
        } else {
            $enabled_payments = [
                'gopay',
                'shopeepay',
                'permata_va',
                'bca_va',
                'bni_va',
                'bri_va',
                'echannel',
                'other_va',
                'other_qris',
                'qris',
                'indomaret',
                'alfamart',
                'akulaku',
            ];
        }

        $transaction_data = [
            'enabled_payments' => $enabled_payments,
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
        ];


        $snap_token = Snap::getSnapToken($transaction_data);

        $data = [
            'price' => $price,
            'fee' => $fee,
            'order' => $order,
            'snap_token' => $snap_token,
            'user' => $user,
            'game_code' => $game_code,
            'game_id' => $game_id,
            'phone' => $phone,
            'buyer_name' => $buyer_name,
            'satuan' => $satuan,
        ];

        $this->load->view('Partials/Fitur/header', $data);
        $this->load->view('Partials/Fitur/input_detail/index', $data);
        $this->load->view('Partials/Fitur/footer');
    }

    public function SelectPayment3($price_id)
    {
        $data['price'] = $this->db->get_where('price_list', ['product_code' => $price_id])->row();

        if (!$data['price']) {
            show_404();
        }

        $data['price_id'] = $price_id;

        $data['order_id'] = $this->input->post('order_id');
        $data['game_id'] = $this->input->post('game_id');
        $data['phone'] = $this->input->post('phone');
        $data['buyer_name'] = $this->input->post('buyer_name');
        $data['price2'] = $this->input->post('price');
        $data['satuan'] = $this->input->post('satuan');

        $this->load->view('Partials/Fitur/pilih_metode/index3', $data);
    }


    public function SavePayment()
    {
        $status = $this->input->post('status');
        $user_id = $this->input->post('user_id');
        $game_code = $this->input->post('game_code');
        $game_name = $this->input->post('game_name');
        $topup_amount = $this->input->post('topup_amount');
        $price = $this->input->post('price');
        $buyer_name = $this->input->post('buyer_name');
        $phone = $this->input->post('phone');
        $gameId = $this->input->post('game_id');
        $satuan = $this->input->post('satuan');

        if (!$game_code || !$game_name || !$topup_amount || !$price || !$buyer_name || !$gameId) {
            echo "Missing required fields.";
            die;
        }

        $data = [
            'user_id' => $user_id,
            'gameid' => $gameId,
            'satuan' => $satuan,
            'game_code' => $game_code,
            'game_name' => $game_name,
            'topup_amount' => $topup_amount,
            'price' => $price,
            'order_date' => date('Y-m-d H:i:s'),
            'buyer_name' => $buyer_name,
            'ponsel' => $phone,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];


        $this->db->insert('orders', $data);

        if ($status === 'success') {
            $this->load->library('Digiflazz');

            $ref_id = 'ref' . time();
            $result = $this->digiflazz->createTransaction($game_code, $gameId, $ref_id);

            if ($result['status'] === 'error') {
                echo $result['message'];
                return;
            }

            if (isset($result['data']['status'])) {
                $status = strtolower($result['data']['status']);
                switch ($status) {
                    case 'pending':
                        redirect('home/status_checkout?status=pending&ref_id=' . $ref_id . '&game_code=' . $game_code . '&gameId=' . $gameId);
                        break;
                    case 'sukses':
                        redirect('home/status_checkout?status=success&ref_id=' . $ref_id . '&game_code=' . $game_code . '&gameId=' . $gameId);
                        break;
                    default:
                        redirect('home/status_checkout?status=failed&ref_id=' . $ref_id . '&game_code=' . $game_code . '&gameId=' . $gameId);
                        break;
                }
            } else {
                echo 'Error: Unexpected response structure';
            }
        } elseif ($status === 'pending') {
            redirect($this->session->userdata('user_id') ? 'home/status_pembayaran?status=pending' : 'home/status_pembayaran?status=gagal');
        } else {
            redirect('home/status_pembayaran?status=gagal');
        }
    }


    public function status_checkout()
    {
        $ref_id = $this->input->get('ref_id');
        $game_code = $this->input->get('game_code');
        $gameId = $this->input->get('gameId');

        if ($ref_id) {
            $this->load->library('Digiflazz');
            $transactionData = $this->digiflazz->getTransactionStatus($ref_id);
        } else {
            $transactionData = [
                'status' => 'unknown',
                'message' => 'Please provide a valid transaction reference ID.',
            ];
        }

        $data['ref_id'] = $ref_id;
        $data['game_code'] = $game_code;
        $data['gameId'] = $gameId;
        $data['transactionData'] = $transactionData;

        $this->load->view('status_topup', $data);
    }



    public function status_pembayaran()
    {
        $status = $this->input->get('status');

        if (!$status) {
            $status = 'pending';
        }

        $data['status'] = $status;

        $this->load->view('status_pembayaran', $data);
    }



    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }


    // public function digiflazz()
    // {
    //     $username = 'siyonaop5jdD';
    //     $dev_key = 'dev-089c5890-bc7f-11ef-89b8-ab41d3b11203';
    //     $endpoint = 'https://api.digiflazz.com/v1/transaction';
    //     $buyer_sku_code = 'i10'; // Updated SKU code
    //     $customer_no = '085608744330'; // Updated customer number
    //     $ref_id = 'test3'; // Updated Ref ID
    //     $sign = md5($username . $dev_key . $ref_id); // MD5 signature for 'username' + 'dev_key' + 'ref_id'

    //     $data = array(
    //         "username" => $username,
    //         "buyer_sku_code" => $buyer_sku_code,
    //         "customer_no" => $customer_no,
    //         "ref_id" => $ref_id,
    //         "testing" => true, // Set to true for testing environment
    //         "sign" => $sign
    //     );

    //     $data_string = json_encode($data);

    //     $ch = curl_init($endpoint);
    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //         'Content-Type: application/json',
    //         'Content-Length: ' . strlen($data_string)
    //     ));

    //     $response = curl_exec($ch);

    //     if (curl_errno($ch)) {
    //         echo 'Curl error: ' . curl_error($ch);
    //         curl_close($ch);
    //         return;
    //     }

    //     curl_close($ch);

    //     $result = json_decode($response);

    //     if ($result === null && json_last_error() !== JSON_ERROR_NONE) {
    //         echo 'Error decoding JSON response';
    //         return;
    //     }

    //     if (isset($result->data->status)) {
    //         switch (strtolower($result->data->status)) {
    //             case 'pending':
    //                 echo 'Topup request is pending';
    //                 break;
    //             case 'sukses':
    //                 echo 'Topup request is successful';
    //                 break;
    //             default:
    //                 echo 'Error: ' . (isset($result->data->message) ? $result->data->message : 'Unknown error');
    //                 break;
    //         }
    //     } else {
    //         echo 'Error: Unexpected response structure or missing status';
    //     }
    // }
}
