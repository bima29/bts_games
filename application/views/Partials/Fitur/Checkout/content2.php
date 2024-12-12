<link rel="stylesheet" href="<?= base_url('assets/css/content2.css') ?>">
<div class="container-fluid d-none d-md-flex sticky-top header-top">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center topbar">
            <div class="top-link d-flex justify-content-center align-items-center">
                <img src="<?= base_url('assets/img/logoBTS.png') ?>" alt="Logo" class="img-fluid img-fluid-header">
                <i>
                    <h4 class="top-link">BTS STORE<span class="text-secondary"> INDONESIA</span></h4>
                </i>
            </div>
            <div class="top-info d-flex">

                <div class="search-container">
                    <div class="search-form rounded-pill me-3" id="searchForm">
                        <input type="text" class="text-white" placeholder="Type to search...">
                    </div>
                </div>
                <div class="componen-header-icon-bg rounded" id="searchIcon">
                    <small class="me-3 text-white-50">
                        <i class="fa-solid fa-magnifying-glass fa-lg search-icon white"></i>
                    </small>
                </div>
                <div class="componen-header-icon-bg rounded">
                    <small class="me-3 text-white-50">
                        <a href="<?= base_url('auth'); ?>" class="text-center">
                            <i class="fa-solid fa-right-to-bracket fa-lg white"></i>
                        </a>
                    </small>
                </div>
                <a class="text-decoration-none text-white" href="<?= base_url('auth'); ?>">Masuk/Daftar</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid d-flex mb-4 bg-color-blur-white-4">
    <div class="row w-100 justify-content-center align-items-center">

        <div class="col-md-6 justify-content-center  mt-4">
            <div class="checkout-container cc-size">
                <a href="<?= base_url('Home/Checkout1'); ?>">
                    <i class="fa-solid fa-arrow-left mb-4 black"></i>
                </a>
                <div class="text-center">
                    <img src="https://static-src.vocagame.com/gamestoreindonesia/banner%20wp-abe2-original.webp" class="card-img" alt="Mobile Legends Banner">
                    <h4>Mobile Legends: Bang Bang</h4>
                    <p>
                        Nikmati pengalaman bermain Mobile Legends dengan diamond yang tersedia.
                        Pilih jumlah diamond yang sesuai dengan kebutuhan Anda.
                    </p>
                    <hr>
                    <p class="text-dark">Item yang Anda Pilih</p>
                    <b>
                        <h4 class="text-primary">5 diamond </h4>
                    </b>
                    <p class="text-dark" style="margin:0; padding:0;">Harga : Rp 15.000</p>
                    <hr>
                </div>

                <form>
                    <div class="mb-3">
                        <label for="userId" class="form-label">Game ID</label>
                        <input type="text" class="form-control" id="userId" placeholder="Enter your Game ID">
                    </div>

                    <div class="mb-3">
                        <label for="serverId" class="form-label">Server ID</label>
                        <input type="text" class="form-control" id="serverId" placeholder="Enter your Server ID (Optional)">
                    </div>

                    <div class="mb-3">
                        <label for="noWhatsapp" class="form-label">Nomor Whatsapp</label>
                        <input type="text" class="form-control" id="noWhatsapp" placeholder="Masukkan No Whatsapp">
                    </div>
                    <a href="<?= base_url('Home/Checkout3'); ?>" class="btn btn-primary w-100">Lanjut</a>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid footer bg-dark">
    <div class="container pt-5 pb-4">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <a href="index.html" class="text-decoration-none">
                    <h1 class="text-white fw-bold d-block text">BTS <span class="text-success">Store</span> </h1>
                </a>
                <p class="mt-4 text-light">Pengembang Fourta adalah sebuah perusahaan terkemuka pengembangan web ,
                    aplikasi seluler , dan e-perdagangan elektronikKami membuat custom</p>
                <div class="d-flex hightech-link">
                    <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i
                            class="fab fa-facebook-f text-primary"></i></a>
                    <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i
                            class="fab fa-twitter text-primary"></i></a>
                    <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i
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
                            class="fas fa-envelope text-white me-2"></i> info@fourtadev.com</a>
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
<script src="<?= base_url('assets/js/content2.js') ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>