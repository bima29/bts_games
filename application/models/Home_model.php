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
}
