<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Profil User
    public function get_profil($user_id)
    {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function update_profil($user_id, $data)
    {
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }

    public function get_old_image($user_id)
    {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        $row = $query->row();
        return $row->profile_picture;
    }

    // Pengelolaan User
    public function get_user($user_id)
    {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function update_password($user_id, $data)
    {
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }

    public function get_accounts()
    {
        $this->db->select('users.id, users.username, users.email, roles.role_name, users.role_id');
        $this->db->from('users');
        $this->db->join('roles', 'roles.role_id = users.role_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_roles()
    {
        $this->db->select('role_id, role_name');
        $query = $this->db->get('roles');
        return $query->result_array();
    }

    public function get_account_by_id($account_id)
    {
        $this->db->select('users.id, users.username, users.email, users.phone, users.full_name, users.profile_picture, users.role_id');
        $this->db->from('users');
        $this->db->join('roles', 'roles.role_id = users.role_id', 'left');
        $this->db->where('users.id', $account_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insert_account($data)
    {
        $this->db->insert('users', $data);
    }

    public function delete_orders_by_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->delete('orders');
    }

    public function delete_account($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

    public function update_account($account_id, $data)
    {
        $this->db->where('id', $account_id);
        return $this->db->update('users', $data);
    }

    public function update_account_password($account_id, $data)
    {
        $this->db->where('id', $account_id);
        return $this->db->update('users', $data);
    }

    // Pengelolaan Roles
    public function get_all_roles()
    {
        $this->db->select('id, role_id, role_name, role_description, created_at, updated_at');
        $this->db->from('roles');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function saveRole($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->insert('roles', $data);
    }

    public function deleteRole($roleId)
    {
        return $this->db->where('role_id', $roleId)->delete('roles');
    }

    public function getRoleById($roleId)
    {
        return $this->db->where('role_id', $roleId)->get('roles')->row_array();
    }

    public function updateRole($roleId, $data)
    {
        return $this->db->where('role_id', $roleId)->update('roles', $data);
    }

    // Pengelolaan Banners
    public function get_all_banners()
    {
        return $this->db->get('banners')->result_array();
    }

    public function add_banner($data)
    {
        return $this->db->insert('banners', $data);
    }

    public function get_banner_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('banners');
        return $query->row_array();
    }

    public function update_banner($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('banners', $data);
    }

    public function delete_banner($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('banners');
    }

    // Pengelolaan Game Categories
    public function get_game_categories()
    {
        return $this->db->get('game_categories')->result_array();
    }

    public function insert_game_category($data)
    {
        if ($this->db->insert('game_categories', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_game_category($category_id)
    {
        if ($category_id) {
            $this->db->where('id', $category_id);
            return $this->db->delete('game_categories');
        }
        return false;
    }

    public function get_game_category_by_id($category_id)
    {
        $this->db->where('id', $category_id);
        $query = $this->db->get('game_categories');
        return $query->row_array();
    }

    public function update_game_category($category_id, $data)
    {
        $this->db->where('id', $category_id);
        return $this->db->update('game_categories', $data);
    }

    public function get_game_list()
    {
        return $this->db->get('games')->result_array();
    }

    public function insert_game($data)
    {
        return $this->db->insert('games', $data);
    }
    public function get_game_categoriess()
    {
        $this->db->distinct();
        $this->db->select('nama_kategori, jenis');
        return $this->db->get('game_categories')->result_array();
    }
    public function get_game_by_id($id)
    {
        return $this->db->get_where('games', ['id' => $id])->row_array();
    }
    public function delete_old_image($image_name)
    {
        if (!empty($image_name) && file_exists('./assets/game_images/' . $image_name)) {
            unlink('./assets/game_images/' . $image_name);
        }
    }

    public function update_game_data($game_id, $data)
    {
        $this->db->where('id', $game_id);
        $this->db->update('games', $data);
    }
    public function delete_game($game_id)
    {
        $this->db->where('id', $game_id);
        $this->db->delete('games');
    }

    public function get_price_list()
    {
        $this->db->select('*');
        $query = $this->db->get('price_list');
        return $query->result();
    }
    public function get_games()
    {
        $this->db->select('game_name, game_code, category, type');
        $query = $this->db->get('games');
        return $query->result();
    }
    public function insert_price_list($data)
    {
        return $this->db->insert('price_list', $data);
    }

    public function get_price_list_by_id($price_list)
    {
        $this->db->where('id', $price_list);
        $query = $this->db->get('price_list');
        return $query->row_array();
    }
    public function get_gamess()
    {
        return $this->db->get('games')->result();
    }
    public function update_price_list($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('price_list', $data);
    }
    public function delete_price_list_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('price_list');
    }
    public function get_price_list_by_code($product_code)
    {
        $this->db->like('product_code', $product_code);
        $query = $this->db->get('price_list');
        return $query->result();
    }
    public function get_orders()
    {
        $this->db->select('id, user_id, game_code, gameid, game_name, topup_amount, price, order_date, buyer_name, status, created_at, satuan');
        $this->db->from('orders');
        return $this->db->get()->result();
    }
    public function get_order_by_id($order_id)
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('id', $order_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function update_order($order_id, $data)
    {
        $this->db->where('id', $order_id);
        $this->db->update('orders', $data);
        return $this->db->affected_rows() > 0;
    }
    public function delete_order($order_id)
    {
        $this->db->where('id', $order_id);
        $this->db->delete('orders');
        return $this->db->affected_rows() > 0;
    }
    public function get_kartu_perdana()
    {
        return $this->db->get('kartu_perdana')->result_array();
    }
    public function save_kartu_perdana($data)
    {
        return $this->db->insert('kartu_perdana', $data);
    }
    public function update_kartu_perdana($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('kartu_perdana', $data);
    }
    public function delete_kartu_perdana($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('kartu_perdana');
    }
    public function get_kartu_perdanaa()
{
    $query = $this->db->get('kartu_perdana');
    return $query->result();
}
}
