<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $user_id = $this->session->userdata('user_id');
        $role_id = $this->session->userdata('role_id');
        if (!$user_id) {
            if ($this->uri->segment(1) !== 'auth') {
                redirect(base_url('auth'));
            }
        } else {
            $data['username'] = $this->session->userdata('username');
            $this->load->vars($data);
            if ($role_id === 3) {
                redirect(base_url());
            }
        }
        $this->load->model('admin_model', 'admin');
    }

    public function index()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;

        $data['total_games'] = $this->db->count_all('games');
        $data['total_users'] = $this->db->count_all('users');
        $data['total_transactions'] = $this->db->count_all('orders');
        $data['total_products'] = $this->db->count_all('price_list');

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/index');
        $this->load->view('admin/partials/footer');
    }


    // Track Order Start
    public function track_order()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;

        $data['orders'] = $this->admin->get_orders();

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/track_order', $data);
        $this->load->view('admin/partials/footer');
    }




    public function edit_track_order($order_id)
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;

        $order = $this->admin->get_order_by_id($order_id);
        $data['order'] = $order;

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/track_order/edit');
        $this->load->view('admin/partials/footer');
    }
    public function update_track_order()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $order_id = $this->input->post('order_id');
        $data = [
            'gameId' => $this->input->post('game_id'),
            'game_name' => $this->input->post('game_name'),
            'topup_amount' => $this->input->post('topup_amount'),
            'price' => $this->input->post('price'),
            'status' => $this->input->post('status'),
            'buyer_name' => $this->input->post('buyer_name'),
            'satuan' => $this->input->post('satuan'),
        ];

        // Update order details in the database
        $this->admin->update_order($order_id, $data);

        $this->session->set_flashdata('success', 'Order updated successfully');
        redirect('admin/track_order');
    }
    public function delete_track_order($order_id)
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $this->admin->delete_order($order_id);

        $this->session->set_flashdata('success', 'Order deleted successfully');
        redirect('admin/track_order');
    }

    //Track Order End 

    // Price List Start
    public function price_list()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;

        $search_query = $this->input->post('product_code');
        if (!empty($search_query)) {
            // Filter the price list based on product code
            $data['price_list'] = $this->admin->get_price_list_by_code($search_query);
        } else {
            // Get all price lists if no search query
            $data['price_list'] = $this->admin->get_price_list();
        }

        $data['games'] = $this->admin->get_games();
        $data['kartu_perdana'] = $this->admin->get_kartu_perdanaa();

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/price_list');
        $this->load->view('admin/partials/footer');
    }




    public function addprice_list()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $gameType = $this->input->post('gameType', TRUE);
        $categoryName = $this->input->post('categoryName', TRUE);
        $harga = $this->input->post('harga', TRUE);
        $nominal = $this->input->post('nominal', TRUE);
        $unit = $this->input->post('unit', TRUE);
        $category = $this->input->post('category', TRUE);
        $type = $this->input->post('type', TRUE);
        $game_code = $this->input->post('game_code', TRUE);

        $data = [
            'product_name' => $gameType,
            'product_code' => $categoryName,
            'game_code' => $game_code,
            'price' => $harga,
            'nominal' => $nominal,
            'unit' => $unit,
            'game_category' => $category,
            'game_type' => $type,
        ];

        $result = $this->admin->insert_price_list($data);

        if ($result) {
            $this->session->set_flashdata('success', 'Price list berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan price list.');
        }

        redirect('admin/price_list');
    }


    public function edit_price_list($price_list_id)
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $data['profil'] = $this->admin->get_profil($user_id);

        // Get price list data and games data
        $data['price_list'] = $this->admin->get_price_list_by_id($price_list_id);
        $data['games'] = $this->admin->get_gamess();

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/price_list/edit');
        $this->load->view('admin/partials/footer');
    }

    public function update_price_list()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $data = [
            'product_name'  => $this->input->post('gameType', TRUE),
            'product_code'  => $this->input->post('categoryName', TRUE),
            'price'         => $this->input->post('price', TRUE),
            'nominal'       => $this->input->post('nominal', TRUE),
            'unit'          => $this->input->post('unit', TRUE),
            'game_category' => $this->input->post('game_category', TRUE),
            'game_type'     => $this->input->post('game_type', TRUE)
        ];

        $price_list_id = $this->input->post('price_list_id', TRUE);

        $this->admin->update_price_list($price_list_id, $data);

        $this->session->set_flashdata('success', 'Price list updated successfully!');
        redirect('admin/price_list');
    }

    public function delete_price_list($id)
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        if (!$this->session->userdata('username')) {
            redirect('login');
        }

        $delete = $this->admin->delete_price_list_by_id($id);

        if ($delete) {
            $this->session->set_flashdata('message', 'Data berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat menghapus data.');
        }

        redirect('admin/price_list');
    }


    public function detail_price_list($price_list)
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;

        $price = $this->admin->get_price_list_by_id($price_list);

        if ($price) {
            $data['category'] = $price;
        } else {
            $this->session->set_flashdata('error', 'Kategori tidak ditemukan');
            redirect('admin/game_categories');
        }

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/price_list/detail');
        $this->load->view('admin/partials/footer');
    }
    // Price List End


    // Chat Start
    public function chat()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/chat');
        $this->load->view('admin/partials/footer');
    }
    // Chat End

    // Game Categories Start
    public function game_categories()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;

        $data['game_categories'] = $this->admin->get_game_categories();

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/game_categories', $data);
        $this->load->view('admin/partials/footer');
    }

    public function save_game_category()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $nama_kategori = $this->input->post('nama_kategori', TRUE);
        $deskripsi = $this->input->post('deskripsi', TRUE);
        $jenis = $this->input->post('jenis', TRUE);

        if (empty($nama_kategori) || empty($deskripsi) || empty($jenis)) {
            $this->session->set_flashdata('error', 'Semua field harus diisi.');
            redirect('admin/game_categories');
        } else {
            $data = [
                'nama_kategori' => $nama_kategori,
                'deskripsi' => $deskripsi,
                'jenis' => $jenis
            ];
            $this->admin->insert_game_category($data);

            $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan');
            redirect('admin/game_categories');
        }
    }


    public function edit_game_categories($category_id)
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;

        $category = $this->admin->get_game_category_by_id($category_id);

        if ($category) {
            $data['category'] = $category;
        } else {
            $this->session->set_flashdata('error', 'Kategori tidak ditemukan');
            redirect('admin/game_categories');
        }

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/game_categories/edit', $data);
        $this->load->view('admin/partials/footer');
    }

    public function update_game_category()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $category_id = $this->input->post('category_id');

        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
            'deskripsi' => $this->input->post('deskripsi'),
            'jenis' => $this->input->post('jenis'),
        ];

        $result = $this->admin->update_game_category($category_id, $data);

        if ($result) {
            $this->session->set_flashdata('success', 'Kategori berhasil diperbarui');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui kategori');
        }

        redirect('admin/game_categories');
    }



    public function delete_game_category($category_id)
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        if ($category_id) {
            $result = $this->admin->delete_game_category($category_id);

            if ($result) {
                $this->session->set_flashdata('success', 'Kategori berhasil dihapus');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus kategori');
            }
        } else {
            $this->session->set_flashdata('error', 'Kategori tidak ditemukan');
        }

        redirect('admin/game_categories');
    }

    // Game Categories End

    // Game List Start
    public function game_list()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');

        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;

        $categories = $this->admin->get_game_categoriess();
        $unique_categories = array_map("unserialize", array_unique(array_map("serialize", $categories)));

        $data['categories'] = $unique_categories;
        $data['games'] = $this->admin->get_game_list();

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/game_list');
        $this->load->view('admin/partials/footer');
    }



    public function add_game()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $game_name = $this->input->post('game_name', TRUE);
        $game_code = $this->input->post('game_code', TRUE);
        $game_category = $this->input->post('game_category', TRUE);
        $game_type = $this->input->post('game_type', TRUE);
        $game_description = $this->input->post('game_description', TRUE);

        $config['upload_path'] = './assets/game_images/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('game_image')) {
            $upload_data = $this->upload->data();
            $game_image = $upload_data['file_name'];
        } else {
            $game_image = '';
        }

        $data = [
            'game_name' => $game_name,
            'game_code' => $game_code,
            'image' => $game_image,
            'category' => $game_category,
            'type' => $game_type,
            'description' => $game_description
        ];

        if ($this->admin->insert_game($data)) {
            $this->session->set_flashdata('success', 'Game berhasil ditambahkan.');
            redirect('admin/game_list');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambah game.');
            redirect('admin/game_list');
        }
    }


    public function edit_game_list($game_id)
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;
        $categories = $this->admin->get_game_categoriess();
        $unique_categories = array_map("unserialize", array_unique(array_map("serialize", $categories)));

        $data['categories'] = $unique_categories;
        $data['game'] = $this->admin->get_game_by_id($game_id);
        if (!$data['game']) {
            $this->session->set_flashdata('error', 'Game tidak ditemukan');
            redirect('admin/game_list');
        }

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/game_list/edit');
        $this->load->view('admin/partials/footer');
    }

    public function update_game()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $this->load->helper('file');

        $game_id = $this->input->post('game_id', true);
        $game_name = $this->input->post('gameName', true);
        $game_code = $this->input->post('gameCode', true);
        $game_category = $this->input->post('game_category', true);
        $game_type = $this->input->post('game_type', true);
        $game_description = $this->input->post('gameDescription', true);

        $game = $this->admin->get_game_by_id($game_id);
        if (!$game) {
            $this->session->set_flashdata('error', 'Game tidak ditemukan');
            redirect('admin/game_list');
        }

        $config['upload_path'] = './assets/game_images/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;
        $config['file_name'] = time() . '_' . $_FILES['gameImage']['name'];

        $this->load->library('upload', $config);

        if ($_FILES['gameImage']['name']) {
            if ($this->upload->do_upload('gameImage')) {
                $uploaded_image = $this->upload->data('file_name');
                $this->admin->delete_old_image($game['image']); // Hapus gambar lama melalui model
            } else {
                $this->session->set_flashdata('error', 'Gagal mengunggah gambar: ' . $this->upload->display_errors());
                redirect('admin/game_list');
            }
        } else {
            $uploaded_image = $game['image'];
        }

        $update_data = [
            'game_name' => $game_name,
            'game_code' => $game_code,
            'category' => $game_category,
            'type' => $game_type,
            'description' => $game_description,
            'image' => $uploaded_image
        ];

        $this->admin->update_game_data($game_id, $update_data);

        $this->session->set_flashdata('success', 'Data game berhasil diperbarui');
        redirect('admin/game_list');
    }

    public function delete_game($game_id)
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $game = $this->admin->get_game_by_id($game_id);
        if (!$game) {
            $this->session->set_flashdata('error', 'Game tidak ditemukan');
            redirect('admin/game_list');
        }

        if (!empty($game['image']) && file_exists('./assets/game_images/' . $game['image'])) {
            unlink('./assets/game_images/' . $game['image']);
        }

        $this->admin->delete_game($game_id);

        $this->session->set_flashdata('success', 'Game berhasil dihapus');
        redirect('admin/game_list');
    }


    public function detail_game_list($id)
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;

        $data['game'] = $this->admin->get_game_by_id($id);

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/game_list/detail', $data);
        $this->load->view('admin/partials/footer');
    }

    // Game List End

    // Kartu Perdana

    public function kartu_perdana()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;

        $data['kartu_perdana'] = $this->admin->get_kartu_perdana();

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/kartu_perdana');
        $this->load->view('admin/partials/footer');
    }

    public function save_kartu_perdana()
    {
        $data = array(
            'nama_item' => $this->security->xss_clean($this->input->post('nama_item')),
            'kode_item' => $this->security->xss_clean($this->input->post('kode_item')),
            'jenis' => $this->security->xss_clean($this->input->post('jenis'))
        );

        $insert = $this->admin->save_kartu_perdana($data);

        if ($insert) {
            $this->session->set_flashdata('success', 'Kartu Perdana berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Kartu Perdana gagal ditambahkan');
        }

        redirect('admin/kartu_perdana');
    }

    public function update_kartu_perdana()
    {
        $data = array(
            'nama_item' => $this->security->xss_clean($this->input->post('nama_item')),
            'kode_item' => $this->security->xss_clean($this->input->post('kode_item')),
            'jenis' => $this->security->xss_clean($this->input->post('jenis'))
        );

        $id = $this->input->post('id');

        $update = $this->admin->update_kartu_perdana($id, $data);

        if ($update) {
            $this->session->set_flashdata('success', 'Kartu Perdana berhasil diperbarui');
        } else {
            $this->session->set_flashdata('error', 'Kartu Perdana gagal diperbarui');
        }

        redirect('admin/kartu_perdana');
    }

    public function delete_kartu_perdana($id)
    {
        $delete = $this->admin->delete_kartu_perdana($id);

        if ($delete) {
            $this->session->set_flashdata('success', 'Kartu Perdana berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Kartu Perdana gagal dihapus');
        }

        redirect('admin/kartu_perdana');
    }



    // Kartu Perdana End

    // Bannner Start
    public function banner()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;
        $data['banners'] = $this->admin->get_all_banners();

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/banner');
        $this->load->view('admin/partials/footer');
    }

    public function edit_banner($id = null)
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        if (!$id) {
            $this->session->set_flashdata('error', 'Banner tidak ditemukan.');
            redirect('admin/banner');
        }

        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $data['profil'] = $this->admin->get_profil($user_id);
        $data['banner'] = $this->admin->get_banner_by_id($id);

        if (!$data['banner']) {
            $this->session->set_flashdata('error', 'Banner tidak ditemukan.');
            redirect('admin/banner');
        }

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/banner/edit', $data); // Mengirimkan data banner ke view
        $this->load->view('admin/partials/footer');
    }


    public function add_banner()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        if (!empty($_FILES['bannerImage']['name'])) {
            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;
            $config['file_name'] = time() . '_' . $_FILES['bannerImage']['name'];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('bannerImage')) {
                $uploadData = $this->upload->data();
                $data = [
                    'title' => $this->input->post('bannerTitle', true),
                    'description' => $this->input->post('bannerDescription', true),
                    'image' => $uploadData['file_name']
                ];

                if ($this->admin->add_banner($data)) {
                    $this->session->set_flashdata('success', 'Banner berhasil ditambahkan.');
                } else {
                    $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan banner.');
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            }
        } else {
            $this->session->set_flashdata('error', 'Gambar banner wajib diunggah.');
        }

        redirect('admin/banner');
    }



    public function update_banner()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $id = $this->input->post('banner_id');
        $data = [
            'title' => $this->input->post('bannerTitle'),
            'description' => $this->input->post('bannerDescription')
        ];

        $current_banner = $this->admin->get_banner_by_id($id);
        $current_image = $current_banner['image'];

        if (!empty($_FILES['bannerImage']['name'])) {
            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['file_name'] = time() . '_' . $_FILES['bannerImage']['name'];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('bannerImage')) {
                $data['image'] = $this->upload->data('file_name');

                if (!empty($current_image) && file_exists('./assets/img/' . $current_image)) {
                    unlink('./assets/img/' . $current_image);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
                return;
            }
        }

        if ($this->admin->update_banner($id, $data)) {
            $this->session->set_flashdata('success', 'Role successfully added.');
        } else {
            $this->session->set_flashdata('error', 'Failed to add role.');
        }

        redirect('admin/banner');
    }

    public function delete_banner($id)
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1 && $role_id != 2) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $banner = $this->admin->get_banner_by_id($id);
        $image = $banner['image'];

        if ($this->admin->delete_banner($id)) {
            if (!empty($image) && file_exists('./assets/img/' . $image)) {
                unlink('./assets/img/' . $image);
            }

            $this->session->set_flashdata('success', 'Banner has been successfully deleted.');

            redirect('admin/banner');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete the banner. Please try again.');

            redirect('admin/banner');
        }
    }
    // Bannner End

    // Payment Gateway Start
    public function payment_gateway()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }

        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $data['profil'] = $this->admin->get_profil($user_id);

        $this->load->database();
        $query = $this->db->get('payment_gateway_config');
        $data['payment_gateways'] = $query->result();

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/payment_gateway', $data);
        $this->load->view('admin/partials/footer');
    }

    public function edit_payment_gateway($id)
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;
        $query = $this->db->get_where('payment_gateway_config', ['id' => $id]);
        $data['gateway'] = $query->row();

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/payment_gateway/edit');
        $this->load->view('admin/partials/footer');
    }

    public function update_payment_gateway()
    {
        $data = [
            'client_key' => $this->input->post('client_key'),
            'server_key' => $this->input->post('server_key'),
            'is_production' => $this->input->post('is_production'),
            'is_sanitized' => $this->input->post('is_sanitized'),
            'is_3ds' => $this->input->post('is_3ds'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('payment_gateway_config', $data);

        $this->session->set_flashdata('success', 'Payment Gateway updated successfully.');
        redirect('admin/payment_gateway');
    }

    // Payment Gateway End

    // Account Role Start
    public function account_role()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;

        $data['roles'] = $this->admin->get_all_roles();

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/account_role', $data);
        $this->load->view('admin/partials/footer');
    }

    public function proses_save_role()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }
        $roleId = $this->input->post('roleId');
        $roleName = $this->input->post('roleName');
        $roleDescription = $this->input->post('roleDescription');

        $data = [
            'role_id' => $roleId,
            'role_name' => $roleName,
            'role_description' => $roleDescription
        ];

        if ($this->admin->saveRole($data)) {
            $this->session->set_flashdata('success', 'Role successfully added.');
        } else {
            $this->session->set_flashdata('error', 'Failed to add role.');
        }

        redirect('admin/account_role');
    }

    public function getRoleDetails($roleId)
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }
        $role = $this->admin->getRoleById($roleId);
        echo json_encode($role);
    }

    public function proses_update_role()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }
        $roleId = $this->input->post('roleId');
        $roleName = $this->input->post('roleName');
        $roleDescription = $this->input->post('roleDescription');

        $data = [
            'role_name' => $roleName,
            'role_description' => $roleDescription
        ];

        if ($this->admin->updateRole($roleId, $data)) {
            $this->session->set_flashdata('success', 'Role successfully updated.');
        } else {
            $this->session->set_flashdata('error', 'Failed to update role.');
        }

        redirect('admin/account_role');
    }


    public function deleteRole($roleId)
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }
        if ($this->admin->deleteRole($roleId)) {
            $this->session->set_flashdata('success', 'Role successfully deleted.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete role.');
        }
        redirect('admin/account_role');
    }
    // Account Role End

    // Manage Account Start
    public function manage_account()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;

        $data['roles'] = $this->admin->get_roles();

        $data['accounts'] = $this->admin->get_accounts();

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/manage_account', $data);
        $this->load->view('admin/partials/footer');
    }

    public function add_manage_account()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }
        $this->load->helper(array('form', 'url'));

        $username = $this->input->post('username', TRUE);
        $email = $this->input->post('email', TRUE);
        $phone = $this->input->post('phone', TRUE);
        $password = sha1($this->input->post('password', TRUE));
        $full_name = $this->input->post('full_name', TRUE);
        $profile_picture = 'default.jpg';
        $role_id = $this->input->post('role_id', TRUE);

        $data = array(
            'username' => $username,
            'email' => $email,
            'phone' => $phone,
            'password' => $password,
            'full_name' => $full_name,
            'profile_picture' => $profile_picture,
            'role_id' => $role_id
        );

        $insert = $this->admin->insert_account($data);

        if ($insert) {
            $this->session->set_flashdata('success', 'Gagal menambahkan akun.');
        } else {
            $this->session->set_flashdata('success', 'Akun berhasil ditambahkan.');
        }

        redirect('admin/manage_account');
    }

    public function get_account_by_id()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }
        $account_id = $this->input->get('id');
        $account = $this->admin->get_account_by_id($account_id);
        echo json_encode($account);
    }

    public function edit_manage_account()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }
        $account_id = $this->input->post('account_id');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $full_name = $this->input->post('full_name');
        $profile_picture = $this->input->post('profile_picture');
        $role_id = $this->input->post('role_id');

        $data = array(
            'username' => $username,
            'email' => $email,
            'phone' => $phone,
            'full_name' => $full_name,
            'profile_picture' => $profile_picture,
            'role_id' => $role_id
        );


        $update = $this->admin->update_account($account_id, $data);

        if ($update) {
            $this->session->set_flashdata('success', 'Akun berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui akun.');
        }

        redirect('admin/manage_account');
    }

    public function update_password()
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }
        $account_id = $this->input->post('account_id');
        $new_password = $this->input->post('new_password');
        $hashed_password = sha1($new_password);

        $data = array(
            'password' => $hashed_password
        );

        $update = $this->admin->update_account_password($account_id, $data);

        if ($update) {
            $this->session->set_flashdata('success', 'Akun berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui akun.');
        }

        redirect('admin/manage_account');
    }


    public function delete_account($id)
    {
        $role_id = $this->session->userdata('role_id');

        if ($role_id != 1) {
            $this->session->set_flashdata('error', 'Access Denied: You do not have permission to access this page.');
            redirect('admin/profile');
        }
        $this->admin->delete_orders_by_user($id);

        $delete = $this->admin->delete_account($id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Akun berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus akun.');
        }
        redirect('admin/manage_account');
    }
    // Manage Account End


    // Profile Start
    public function profile()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/profile');
        $this->load->view('admin/partials/footer');
    }

    public function proses_edit_profile()
    {
        $user_id = $this->session->userdata('user_id');
        $data = array(
            'full_name' => $this->input->post('fullName', TRUE),
            'username' => $this->input->post('username', TRUE),
            'email' => $this->input->post('email', TRUE),
            'phone' => $this->input->post('phone', TRUE),
        );
        $config['upload_path'] = './assets/universal/img/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('profilePicture')) {
            $old_image = $this->admin->get_old_image($user_id);
            if ($old_image) {
                unlink('./assets/universal/img/' . $old_image);
            }
            $data['profile_picture'] = $this->upload->data('file_name');
        } else {
            $data['profile_picture'] = $this->admin->get_old_image($user_id);
        }
        $this->admin->update_profil($user_id, $data);
        redirect('admin/profile');
    }

    public function proses_edit_password()
    {
        $user_id = $this->session->userdata('user_id');
        $current_password = $this->input->post('currentPassword', TRUE);
        $new_password = $this->input->post('newPassword', TRUE);
        $confirm_password = $this->input->post('confirmPassword', TRUE);

        $user = $this->admin->get_user($user_id);
        if (sha1($current_password) != $user->password) {
            $error = 'Password saat ini tidak benar';
            echo '<div class="alert alert-danger">
            <strong>Gagal! Password Salah</strong>
        </div>
        <a href="' . base_url('admin/profile') . '" class="btn btn-primary">Kembali ke Profil</a>';
            exit;
        }

        if ($new_password != $confirm_password) {
            $error = 'Password baru dan konfirmasi password baru tidak sama';
            echo '<div class="alert alert-danger">
            <strong>Gagal! Password Baru Tidak Sama.</strong>
        </div>
        <a href="' . base_url('admin/profile') . '" class="btn btn-primary">Kembali ke Profil</a>';
            exit;
        }
        $data = array('password' => sha1($new_password));
        $this->admin->update_password($user_id, $data);

        $this->session->set_flashdata('success', 'Password berhasil diupdate');
        redirect('admin/profile');
    }
    // Profile End

    // Logged OUT Start
    public function logout()
    {
        $this->session->sess_destroy();

        redirect(base_url('auth'));
    }
    // Logged OUT End

}
