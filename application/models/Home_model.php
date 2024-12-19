<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{


    public function get_all_games()
    {
        $this->db->select('id, image, game_name, game_code, category, type, description');
        $query = $this->db->get('games');
        return $query->result();
    }
    public function get_all_categories()
    {
        $this->db->select('id, nama_kategori');
        $query = $this->db->get('game_categories');
        return $query->result();
    }
    public function get_all_banners()
    {
        $query = $this->db->get('banners');
        return $query->result();
    }
    public function get_game_by_id($id)
    {
        return $this->db->get_where('games', ['id' => $id])->row();
    }

    public function get_price_list_by_game_name($game_name)
    {
        return $this->db->get_where('price_list', ['product_name' => $game_name])->result();
    }

    public function get_all_prices()
    {
        return $this->db->get('price_list')->result_array();
    }
    public function get_games_by_category($category_name)
    {
        $this->db->like('category', $category_name);
        $query = $this->db->get('games');
        return $query->result();
    }

    public function get_games_by_search($search_query)
    {
        $this->db->like('game_name', $search_query);
        $query = $this->db->get('games');
        return $query->result();
    }
}
