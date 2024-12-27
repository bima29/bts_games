<link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">

<div class="container-fluid container-bg-img-fitur-login">
    <div class="row justify-content-center align-items-center bg-color-blur-white-5">
        <div class="card login-card p-4 w-100 bg-color-blur-black-5">
            <a href="<?= base_url('Home/index'); ?>">
                <i class="fa-solid fa-arrow-left white"></i>
            </a>
            <h4 class="text-center mb-4 text-white">Masuk ke Akun Anda</h4>

            <?php if (isset($login_failed) && $login_failed): ?>
                <div class="alert alert-danger mt-2" role="alert">
                    Username / password Salah
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('message')): ?>
                <div class="alert alert-success mt-2" role="alert">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('auth/prosses_login') ?>" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label text-white">Alamat Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email anda" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-white">Kata Sandi</label>
                    <div class="password-input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi" required>
                        <i class="toggle-password bi bi-eye" id="togglePassword"></i>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label for="rememberMe" class="form-check-label text-white">Ingatkan saya</label>
                    </div>
                    <a href="#" class="text-decoration-none">Lupa Kata Sandi?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100">Masuk</button>
            </form>
            <div class="text-center mt-4">
                <p class="text-white">Tidak Memiliki Akun? <a href="<?= base_url('auth/sign_up'); ?>" class="text-decoration-none">Daftar</a></p>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/login.js') ?>"></script>