<style>
    body,
    html {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    .row {
        height: 100vh;
        /* Full screen height */
    }

    .login-card {
        max-width: 400px;
        margin: auto;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* fitur password encryption */
    .password-input-group {
        position: relative;
    }

    .toggle-password {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #6c757d;
        /* Bootstrap's muted color */
    }

    .toggle-password:hover {
        color: #000;
        /* Darker on hover */
    }
</style>

<div class="container-fluid" style="background-image:url('https://images3.alphacoders.com/204/204599.jpg');
background-size: cover;
background-position: center;
background-repeat: no-repeat;
">
    <div class="row justify-content-center align-items-center" style="background-color: rgba(255, 255, 255, 0.5);">
        <div class="card login-card p-4 w-100" style="background-color: rgba(0, 0, 0, 0.5);">
            <a href="<?= base_url(''); ?>">
                <i class="fa-solid fa-arrow-left" style="color:white;"></i>
            </a>
            <h4 class="text-center mb-4 text-white">Masuk ke Akun Anda</h4>
            <form>
                <div class="mb-3">
                    <label for="email" class="form-label text-white">Alamat Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Masukkan email anda" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-white">Kata Sandi</label>
                    <div class="password-input-group">
                        <input type="password" class="form-control" id="password" placeholder="Masukkan kata sandi" required>
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
<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
</script>