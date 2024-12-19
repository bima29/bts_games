<link rel="stylesheet" href="<?= base_url('assets/css/signin.css') ?>">
<div class="container-fluid container-bg-img-fitur-signin">
    <div class="container-wrapper bg-color-blur-black-5">
        <div class="row justify-content-center align-items-center w-100">
            <div class="card login-card p-4">
                <a href="<?= base_url(''); ?>">
                    <i class="fa-solid fa-arrow-left white"></i>
                </a>
                <h4 class="text-center mb-4 text-white">Daftarkan Akun Anda</h4>
                <form action="<?php echo base_url('auth/register'); ?>" method="POST" onsubmit="return validatePasswords()">
                    <div class="mb-3">
                        <label for="telp" class="form-label text-white">No Telepon</label>
                        <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukkan nomor telepon" required>
                        <?php if (isset($errors['telp'])): ?>
                            <div class="text-danger"><?php echo $errors['telp']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"  required>
                        <?php if (isset($errors['email'])): ?>
                            <div class="text-danger"><?php echo $errors['email']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="fullName" class="form-label text-white">Nama Lengkap</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Masukkan nama lengkap anda"  required>
                        <?php if (isset($errors['fullName'])): ?>
                            <div class="text-danger"><?php echo $errors['fullName']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="nickName" class="form-label text-white">Nama Panggilan</label>
                        <input type="text" class="form-control" id="nickName" name="nickName" placeholder="Masukkan nama panggilan anda" required>
                        <?php if (isset($errors['nickName'])): ?>
                            <div class="text-danger"><?php echo $errors['nickName']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-white">Password</label>
                        <div class="password-input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi" required>
                            <?php if (isset($errors['password'])): ?>
                                <div class="text-danger"><?php echo $errors['password']; ?></div>
                            <?php endif; ?>
                            <i class="toggle-password bi bi-eye" id="togglePassword1"></i>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="passwordVer" class="form-label text-white">Password Verifikasi</label>
                        <div class="password-input-group">
                            <input type="password" class="form-control" id="passwordVer" name="passwordVer" placeholder="Masukkan kata sandi verifikasi" required>
                            <?php if (isset($errors['passwordVer'])): ?>
                                <div class="text-danger"><?php echo $errors['passwordVer']; ?></div>
                            <?php endif; ?>
                            <i class="toggle-password bi bi-eye" id="togglePassword2"></i>
                        </div>
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

<script src="<?= base_url('assets/js/signin.js') ?>"></script>
<script>
    function validatePasswords() {
        var password = document.getElementById("password").value;
        var passwordVer = document.getElementById("passwordVer").value;

        if (password !== passwordVer) {
            alert("Password dan Password Verifikasi tidak sama.");
            return false;
        }

        return true;
    }
</script>