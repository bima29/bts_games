<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_user_by_email_password($email, $password)
    {
        $this->db->select('id, username, role_id');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function update_login_at($user_id)
    {
        $this->db->set('login_at', 'NOW()', FALSE); // Use NOW() to set the current timestamp
        $this->db->where('id', $user_id);
        $this->db->update('users');
    }
}
