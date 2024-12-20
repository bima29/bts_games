<link rel="stylesheet" href="<?= base_url('assets/css/content1.css') ?>">

<!-- Header -->
<div class="container-fluid d-none d-md-flex sticky-top header-top">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center topbar">
            <div class="top-link d-flex justify-content-center align-items-center">
                <img src="<?= base_url('assets/img/logoBTS.png') ?>" alt="Logo" class="img-fluid img-fluid-header">
                <i>
                    <h4 class="top-link">BTS STORE<span class="text-secondary"> INDONESIA</span></h4>
                </i>
            </div>
            <div class="top-info d-flex align-items-center">
                <?php if ($this->session->userdata('user_id')): ?>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white" id="profileMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= base_url('assets/universal/img/' . $this->session->userdata('profile_picture')) ?>" alt="Profile" class="rounded-circle border border-white profile-img" width="40" height="40" style="object-fit: cover;">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="profileMenu">
                            <?php if ($this->session->userdata('user_id') == 1 || $this->session->userdata('user_id') == 2): ?>
                                <li><a class="dropdown-item" href="<?= base_url('admin'); ?>">Dashboard</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="<?= base_url('admin/profile'); ?>">My Profile</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('home/logout'); ?>">Log Out</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <!-- Show login link when not logged in -->
                    <a class="text-decoration-none text-white" href="<?= base_url('auth'); ?>">Masuk/Daftar</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container-fluid d-flex justify-content-center align-items-center bg-color-blur-white-4 mt-5">
    <div class="checkout-container">
        <!-- Back Icon -->
        <a href="javascript:history.back()" class="m-3">
            <i class="fa-solid fa-arrow-left fs-4 text-dark"></i>
        </a>
        <!-- Game Info -->
        <div class="game-info mb-4 mt-4">
            <img src="<?= base_url('assets/game_images/' . $game->image); ?>" alt="<?= $game->game_name; ?>" class="img-fluid">
            <h4 class="mt-3"><?= $game->game_name; ?></h4>
            <p><?= $game->description; ?></p>
            <hr>
        </div>

        <!-- Pilihan Nominal Top-Up -->
        <h2 class="mt-4 mb-4">Pilih Nominal Top Up</h2>
        <div class="d-flex flex-wrap gap-2 justify-content-center mb-4">
            <?php
            $displayed_units = [];
            foreach ($units as $unit):
                if (!in_array($unit->unit, $displayed_units)):
                    $displayed_units[] = $unit->unit;
            ?>
                    <button class="btn btn-outline-dark rounded-pill py-2 px-4 fs-6"><?= $unit->unit; ?></button>
            <?php
                endif;
            endforeach;
            ?>
        </div>

        <!-- Denomination Option -->
        <div class="denomination-wrapper">
            <div class="denomination-option row gx-1 gy-2">
                <?php foreach ($price_list as $price): ?>
                    <div class="col-10 col-sm-5 col-md-3">
                        <a href="<?= base_url('Home/Checkout2/' . $price->id); ?>" class="text-decoration-none">
                            <div class="denomination-card d-flex flex-column justify-content-center align-items-center">
                                <div class="text-primary fw-bold fs-4">Rp. <?= number_format($price->price); ?></div>
                                <span class="fs-6"><?= $price->nominal; ?> <?= $price->unit; ?></span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="container-fluid footer bg-dark wow fadeIn mt-5" data-wow-delay=".3s">
    <div class="container pt-5 pb-4">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <a href="index.html" class="text-decoration-none">
                    <h1 class="text-white fw-bold d-block text">BTS <span class="text-success">Store</span> </h1>
                </a>
                <p class="text-light">BTS Store Indonesia adalah platform top up game...</p>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="#" class="h3 text-white text-decoration-none">Peta Situs</a>
                <div class="mt-4">
                    <a href="#" class="text-white text-decoration-none">Beranda</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="#" class="h3 text-white text-decoration-none">Hubungi Kami</a>
                <div class="text-light mt-4">
                    <a href="https://wa.me/+6285608744330" class="text-light text-decoration-none">WhatsApp</a>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .profile-img:hover {
        opacity: 0.8;
        cursor: pointer;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
