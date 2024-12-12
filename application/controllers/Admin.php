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
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/index');
        $this->load->view('admin/partials/footer');
    }

    public function track_order()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/track_order');
        $this->load->view('admin/partials/footer');
    }

    public function price_list()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/price_list');
        $this->load->view('admin/partials/footer');
    }

    public function live_chat()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/live_chat');
        $this->load->view('admin/partials/footer');
    }

    public function game_categories()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/game_categories');
        $this->load->view('admin/partials/footer');
    }

    public function game_list()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/game_list');
        $this->load->view('admin/partials/footer');
    }

    public function banner()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/banner');
        $this->load->view('admin/partials/footer');
    }

    public function payment_gateway()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/payment_gateway');
        $this->load->view('admin/partials/footer');
    }

    public function digiflazz()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/digiflazz');
        $this->load->view('admin/partials/footer');
    }

    public function account_role()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/account_role');
        $this->load->view('admin/partials/footer');
    }

    public function manage_account()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $user_id = $this->session->userdata('user_id');
        $profil = $this->admin->get_profil($user_id);
        $data['profil'] = $profil;
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/manage_account');
        $this->load->view('admin/partials/footer');
    }

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
        $data = array('password' => password_hash($new_password, PASSWORD_DEFAULT));
        $this->admin->update_password($user_id, $data);
    
        $this->session->set_flashdata('success', 'Password berhasil diupdate');
        redirect('admin/profile');
    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect(base_url('auth'));
    }
}
