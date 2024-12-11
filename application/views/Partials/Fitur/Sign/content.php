<link rel="stylesheet" href="<?=base_url('assets/css/signin.css')?>">
<div class="container-fluid container-bg-img-fitur-signin">
    <div class="container-wrapper bg-color-blur-black-5">
        <div class="row justify-content-center align-items-center w-100">
            <div class="card login-card p-4">
                <a href="<?= base_url(''); ?>">
                    <i class="fa-solid fa-arrow-left white"></i>
                </a>
                <h4 class="text-center mb-4 text-white">Daftarkan Akun Anda</h4>
                <form>
                    <div class="mb-3">
                        <label for="telp" class="form-label text-white">No Telepon</label>
                        <input type="text" class="form-control" id="telp" placeholder="Masukkan nomor telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="fullName" class="form-label text-white">Nama Lengkap</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Masukkan nama lengkap anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="nickName" class="form-label text-white">Nama Panggilan</label>
                        <input type="text" class="form-control" id="nickName" placeholder="Masukkan nama panggilan anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-white">Password</label>
                        <div class="password-input-group">
                            <input type="password" class="form-control" id="password" placeholder="Masukkan kata sandi" required>
                            <i class="toggle-password bi bi-eye" id="togglePassword1"></i>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="passwordVer" class="form-label text-white">Password Verifikasi</label>
                        <div class="password-input-group">
                            <input type="password" class="form-control" id="passwordVer" placeholder="Masukkan kata sandi verifikasi" required>
                            <i class="toggle-password bi bi-eye" id="togglePassword2"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label for="rememberMe" class="form-check-label text-white">Ingatkan Saya</label>
                        </div>
                        <a href="#" class="text-decoration-none">Lupa Kata Sandi?</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Daftar</button>
                </form>
                <div class="text-center mt-4">
                    <p class="text-white">Anda Memiliki Akun? <a href="<?= base_url('auth'); ?>" class="text-decoration-none">Masuk</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url('assets/js/signin.js')?>"></script>