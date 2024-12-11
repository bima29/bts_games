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
        // Query the database to get the user by email and password
        $this->db->select('id, username, role_id');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', $password);  // Assuming passwords are stored as sha1 hash
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row(); // Return user data including role_id
        } else {
            return null;
        }
    }
}

