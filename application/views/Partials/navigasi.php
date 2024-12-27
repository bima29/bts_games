<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" id="hamburger-icon"></span>
            <i class="fa-solid fa-xmark d-none" id="close-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item navbar-hover rounded me-2 <?= (uri_string() == '' || uri_string() == '/' || uri_string() == 'Home/index') ? 'active' : ''; ?>">
                    <a class="nav-link" aria-current="page" href="<?= base_url(); ?>"><i class="fas fa-home me-2"></i>Beranda</a>
                </li>
                <li class="nav-item navbar-hover rounded me-2 <?= (uri_string() == 'Home/games') ? 'active' : ''; ?>">
                    <a class="nav-link" aria-current="page" href="<?= base_url('Home/games'); ?>"><i class="fas fa-gamepad me-2"></i>Semua Game</a>
                </li>
                <li class="nav-item navbar-hover rounded me-2 <?= (uri_string() == 'Home/pulsa') ? 'active' : ''; ?>">
                    <a class="nav-link" aria-current="page" href="<?= base_url('Home/pulsa'); ?>"><i class="fas fa-mobile-alt me-2"></i>Pulsa</a>
                </li>
                <li class="nav-item navbar-hover rounded me-2 <?= (uri_string() == 'Home/paket_data') ? 'active' : ''; ?>">
                    <a class="nav-link" aria-current="page" href="<?= base_url('Home/paket_data'); ?>"><i class="fas fa-wifi me-2"></i>Paket Data</a>
                </li>

                <?php if ($this->session->userdata('user_id')): ?>
                    <li class="nav-item navbar-hover rounded me-2 <?= (uri_string() == 'Home/track') ? 'active' : ''; ?>">
                        <a class="nav-link" aria-current="page" href="<?= base_url('Home/track'); ?>"><i class="fas fa-truck me-2"></i>Lacak Pesanan</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item navbar-hover rounded me-2 <?= (uri_string() == 'Home/price') ? 'active' : ''; ?>">
                    <a class="nav-link" aria-current="page" href="<?= base_url('Home/price'); ?>"><i class="fas fa-tag me-2"></i>Catatan Harga</a>
                </li>
                <li class="nav-item navbar-hover me-2 active d-block d-md-none">
                    <?php if ($this->session->userdata('user_id')): ?>
                        <div class="dropdown">
                            <a href="#" class="nav-link" id="profileMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?= $this->session->userdata('username'); ?>
                            </a>
                            <ul class="dropdown-menu bg-secondary" aria-labelledby="profileMenu">
                                <?php if ($this->session->userdata('user_id') == 1 || $this->session->userdata('user_id') == 2): ?>
                                    <li><a class="dropdown-item navbar-hover" href="<?= base_url('admin'); ?>">Dashboard</a></li>
                                <?php endif; ?>
                                <li><a class="dropdown-item navbar-hover mt-2" href="<?= base_url('admin/profile'); ?>">My Profile</a></li>
                                <li><a class="dropdown-item navbar-hover mt-2" href="<?= base_url('home/logout'); ?>">Log Out</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a class="nav-link" aria-current="page" href="<?= base_url('auth'); ?>"><i class="fa-solid fa-right-to-bracket fa-lg"></i> Masuk/Daftar</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>