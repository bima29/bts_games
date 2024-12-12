<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

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
}
