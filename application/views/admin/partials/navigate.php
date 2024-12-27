<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url("admin") ?>" class="brand-link">
        <img src="<?= base_url('assets/img'); ?>/logo-2.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BTS STORE</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/universal/img/'); ?><?= $profil->profile_picture; ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $username; ?></a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php $role_id = $this->session->userdata('role_id'); ?>

                <?php if ($role_id == 1 || $role_id == 2): ?>
                    <li class="nav-item">
                        <a href="<?= base_url('admin') ?>" class="nav-link <?= (uri_string() == 'admin') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Home</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('admin/track_order') ?>" class="nav-link <?= (uri_string() == 'admin/track_order' || uri_string() == 'admin/edit_track_order') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-truck"></i>
                            <p>Track Order</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('admin/price_list') ?>" class="nav-link <?= (uri_string() == 'admin/price_list' || uri_string() == 'admin/edit_price_list' || uri_string() == 'admin/detail_price_list') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Price List</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview <?= (strpos(uri_string(), 'admin/game_categories') !== false || strpos(uri_string(), 'admin/edit_game_categories') !== false || strpos(uri_string(), 'admin/detail_game_categories') !== false || strpos(uri_string(), 'admin/game_list') !== false || strpos(uri_string(), 'admin/edit_game_list') !== false || strpos(uri_string(), 'admin/detail_game_list') !== false || strpos(uri_string(), 'admin/kartu_perdana') !== false || strpos(uri_string(), 'admin/edit_kartu_perdana') !== false || strpos(uri_string(), 'admin/detail_kartu_perdana') !== false) ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link <?= (strpos(uri_string(), 'admin/game_categories') !== false || strpos(uri_string(), 'admin/edit_game_categories') !== false || strpos(uri_string(), 'admin/detail_game_categories') !== false || strpos(uri_string(), 'admin/game_list') !== false || strpos(uri_string(), 'admin/edit_game_list') !== false || strpos(uri_string(), 'admin/detail_game_list') !== false || strpos(uri_string(), 'admin/kartu_perdana') !== false || strpos(uri_string(), 'admin/edit_kartu_perdana') !== false || strpos(uri_string(), 'admin/detail_kartu_perdana') !== false) ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-gamepad"></i>
                            <p>
                                All Data
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="background-color: #2c3e50; padding-left: 15px;">
                            <li class="nav-item">
                                <a href="<?= base_url('admin/game_categories') ?>" class="nav-link <?= (strpos(uri_string(), 'admin/game_categories') !== false || strpos(uri_string(), 'admin/edit_game_categories') !== false || strpos(uri_string(), 'admin/detail_game_categories') !== false) ? 'active' : '' ?>" style="padding-left: 30px;">
                                    <i class="nav-icon fas fa-tags"></i>
                                    <p>Game Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/game_list') ?>" class="nav-link <?= (strpos(uri_string(), 'admin/game_list') !== false || strpos(uri_string(), 'admin/detail_game_list') !== false || strpos(uri_string(), 'admin/edit_game_list') !== false) ? 'active' : '' ?>" style="padding-left: 30px;">
                                    <i class="nav-icon fas fa-list"></i>
                                    <p>List of Games</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/kartu_perdana') ?>" class="nav-link <?= (strpos(uri_string(), 'admin/kartu_perdana') !== false || strpos(uri_string(), 'admin/edit_kartu_perdana') !== false || strpos(uri_string(), 'admin/detail_kartu_perdana') !== false) ? 'active' : '' ?>" style="padding-left: 30px;">
                                    <i class="nav-icon fas fa-sim-card"></i>
                                    <p>List Kartu Perdana</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="<?= base_url('admin/banner') ?>" class="nav-link <?= (uri_string() == 'admin/banner' || preg_match('/^admin\/edit_banner\/\d+/', uri_string())) ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-image"></i>
                            <p>Banners</p>
                        </a>
                    </li>
                <?php endif; ?>


                <?php if ($this->session->userdata('role_id') == 1): ?>
                    <li class="nav-item has-treeview <?= (uri_string() == 'admin/payment_gateway') ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link <?= (uri_string() == 'admin/payment_gateway' || uri_string() == 'admin/edit_payment_gateway') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-plug"></i>
                            <p>
                                Connect API
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="background-color: #2c3e50; padding-left: 15px;">
                            <li class="nav-item">
                                <a href="<?= base_url('admin/payment_gateway') ?>" class="nav-link <?= (uri_string() == 'admin/payment_gateway' || uri_string() == 'admin/edit_payment_gateway') ? 'active' : '' ?>" style="padding-left: 30px;">
                                    <i class="nav-icon fas fa-wallet"></i>
                                    <p>Payment Gateway</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview <?= (uri_string() == 'admin/account_role' || uri_string() == 'admin/manage_account') ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link <?= (uri_string() == 'admin/account_role' || uri_string() == 'admin/manage_account') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                Account
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="background-color: #2c3e50; padding-left: 15px;">
                            <li class="nav-item">
                                <a href="<?= base_url('admin/account_role') ?>" class="nav-link <?= (uri_string() == 'admin/account_role') ? 'active' : '' ?>" style="padding-left: 30px;">
                                    <i class="nav-icon fas fa-id-badge"></i>
                                    <p>Account Role</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/manage_account') ?>" class="nav-link <?= (uri_string() == 'admin/manage_account') ? 'active' : '' ?>" style="padding-left: 30px;">
                                    <i class="nav-icon fas fa-cogs"></i>
                                    <p>Manage Account</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>


                <li class="nav-item">
                    <a href="<?= base_url('admin/profile') ?>" class="nav-link <?= (uri_string() == 'admin/profile') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>My Profile</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('') ?>" class="nav-link" style="padding: 0;">
                        <button class="btn btn-success w-100" style="text-align: left;">
                            <i class="nav-icon fas fa-globe"></i>
                            <p style="display: inline-block; margin-left: 10px;">Lihat Tampilan Web</p>
                        </button>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/logout') ?>" class="nav-link" style="padding: 0;">
                        <button class="btn btn-danger w-100" style="text-align: left;">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p style="display: inline-block; margin-left: 10px;">Logged Out</p>
                        </button>
                    </a>
                </li>
            </ul>

        </nav>

    </div>
</aside>