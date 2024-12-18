<link rel="stylesheet" href="<?= base_url('assets/css/content1.css') ?>">

<div class="container-fluid d-none d-md-flex sticky-top header-top">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center topbar">
            <div class="top-link d-flex justify-content-center align-items-center">
                <img src="<?= base_url('assets/img/logoBTS.png') ?>" alt="Logo" class="img-fluid img-fluid-header">
                <i>
                    <h4 class="top-link">BTS STORE<span class="text-secondary"> INDONESIA</span></h4>
                </i>
            </div>
            <div class="top-info d-flex justify-content-center align-items-center">
                <?php if ($this->session->userdata('user_id')): ?>
                    <!-- Display profile picture and menu when logged in -->
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white" id="profileMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= base_url('assets/universal/img/' . $this->session->userdata('profile_picture')) ?>" alt="Profile" class="rounded-circle border border-white profile-img" width="40" height="40" style="object-fit: cover;">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="profileMenu">
                            <li><a class="dropdown-item" href="#">My Profile</a></li>
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

<div class="container-fluid vh-100 d-flex justify-content-center align-items-center bg-color-blur-white-4">
    <div class="checkout-container position-relative">
        <!-- Icon Back di dalam checkout-container kiri atas -->
        <a href="javascript:history.back()" class="position-absolute top-0 start-0 m-3">
            <i class="fa-solid fa-arrow-left fs-4 text-dark"></i>
        </a>

        <div class="game-info mb-4">
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
            <div class="row">
                <?php foreach ($price_list as $price): ?>
                    <div class="col-12 col-sm-6 col-md-4 mb-3">
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


<div class="container-fluid footer bg-dark wow fadeIn mt-auto" data-wow-delay=".3s">
    <div class="container pt-5 pb-4">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <a href="index.html" class="text-decoration-none">
                    <h1 class="text-white fw-bold d-block text">BTS <span class="text-success">Store</span> </h1>
                </a>
                <p class="text-justify text-light">BTS Store Indonesia adalah platform top up game dan Voucher Game harga termurah, tercepat dan terpercaya di Indonesia. Topup lebih dari 100++ game online Paling Top dunia seperti PUBG, Mobile Legend, Free Fire, Honor Of King dan game lainnya.Transaksi di sistem Kami tidak harus registrasi terlebih dahulu, Anda bisa transaksi tanpa daftar dengan mudah via web.
                    Metode pembayaran yang kami dukung mudah digunakan.</p>
                <div class="d-flex hightech-link">
                    <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i
                            class="fab fa-facebook-f text-primary"></i></a>
                    <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i
                            class="fab fa-twitter text-primary"></i></a>
                    <a href="https://www.instagram.com/blacktigersquad.id/profilecard/?igsh=dzBuOTY4bzFvaDJz" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i
                            class="fab fa-instagram text-primary"></i></a>
                    <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-0"><i
                            class="fab fa-linkedin-in text-primary"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="#" class="h3 text-white text-decoration-none">Peta Situs</a>
                <div class="mt-4 d-flex flex-column short-link">
                    <a href="" class="mb-2 text-white text-decoration-none"><i
                            class="fas fa-angle-right text-white me-2"></i>Beranda</a>
                    <a href="" class="mb-2 text-white text-decoration-none"><i
                            class="fas fa-angle-right text-white me-2"></i>Semua Game</a>
                    <a href="" class="mb-2 text-white text-decoration-none"><i
                            class="fas fa-angle-right text-white me-2"></i>Masuk</a>
                    <a href="" class="mb-2 text-white text-decoration-none"><i
                            class="fas fa-angle-right text-white me-2"></i>Daftar</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="#" class="h3 text-white text-decoration-none">Hubungi Kami</a>
                <div class="text-white mt-4 d-flex flex-column contact-link">
                    <a href="#" class="pb-3 text-light border-bottom border-dark text-decoration-none"><i
                            class="fas fa-map-marker-alt text-white me-2"></i> Kebonsari Kulon, Kota
                        Probolinggo, Jawa Timur</a>
                    <hr>
                    <a href="https://wa.me/+6285608744330" class="py-3 text-light border-bottom border-dark  text-decoration-none"><i
                            class="fas fa-phone-alt text-white me-2 text-decoration-none"></i> +62 856-0874-4330</a>
                    <hr>
                    <a href="#" class="py-3 text-light border-bottom border-dark text-decoration-none"><i
                            class="fas fa-envelope text-white me-2"></i> btsstore46@gmail.com</a>
                    <hr>
                </div>
            </div>
        </div>
        <hr class="text-light mt-5 mb-4">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <span class="text-light"><a href="#" class="text-white text-decoration-none">© 2024 BTS STORE INDONESIA </a></span>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/content1.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>