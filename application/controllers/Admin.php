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

    // Track Order Start
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
    // Track Order End

    // Price List Start
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
    // Price List End

    // Live Chat Start
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
    // Live Chat End

    // Chat Start
    public function chat()
    {
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
    // Game Categories End

    // Game List Start
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
    // Game List End

    // Bannner Start
    public function banner()
    {
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
    // Payment Gateway End

    // Digiflazz Start
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
    // Digiflazz End

    // Account Role Start
    public function account_role()
    {
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
        $role = $this->admin->getRoleById($roleId);
        echo json_encode($role);
    }

    public function proses_update_role()
    {
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
        $account_id = $this->input->get('id');
        $account = $this->admin->get_account_by_id($account_id);
        echo json_encode($account);
    }

    public function edit_manage_account()
    {
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
        $data = array('password' => password_hash($new_password, PASSWORD_DEFAULT));
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
