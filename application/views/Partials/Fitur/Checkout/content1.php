<style>
    body,
    html {
        margin: 0;
        padding: 0;
        height: 100%;
        font-family: Arial, sans-serif;
        background-image: url('https://images3.alphacoders.com/204/204599.jpg');
        background-size: cover;
        background-position: center;
    }

    .checkout-container {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .game-info img {
        max-width: 100%;
        border-radius: 10px;
    }

    .game-info {
        text-align: center;
    }

    .game-info a {
        text-align: left;
    }

    .game-info h2 {
        text-align: center;
    }

    .game-info h4 {
        margin-top: 10px;
        font-size: 1.5rem;
        color: #333;
    }

    .denomination-wrapper {
        display: flex;
        justify-content: center;
        background-color: #f8f9fa;
        padding: 10px;
    }

    .denomination-option {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        width: max-content;
    }

    @media (max-width: 1024px) {
        .denomination-option {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {
        .denomination-option {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 480px) {
        .denomination-option {
            grid-template-columns: repeat(1, 1fr);
        }
    }

    .denomination-card {
        background-color: #0505;
        color: white;
        border-radius: 8px;
        width: 200px;
        height: 100px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition: transform 0.3s, background-color 0.3s;
    }

    .denomination-card:hover {
        transform: scale(1.05);
        background-color: #3333;
    }
</style>
<div class="container-fluid d-none d-md-flex sticky-top header-top">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center topbar">
            <div class="top-link">
                <img src="<?= base_url('assets/img/logoBTS.png') ?>" alt="Logo" class="img-fluid" style="width: 100%; max-width: 150px;">
            </div>
            <div class="top-info d-flex">

                <div class="search-container">
                    <div class="search-form rounded-pill me-3" id="searchForm">
                        <input type="text" class="text-white" placeholder="Type to search...">
                    </div>
                </div>
                <div class="componen-header-icon-bg rounded" id="searchIcon">
                    <small class="me-3 text-white-50">
                        <i class="fa-solid fa-magnifying-glass fa-lg search-icon" style="color: white;"></i>
                    </small>
                </div>
                <div class="componen-header-icon-bg rounded">
                    <small class="me-3 text-white-50">
                        <a href="<?= base_url('home/login'); ?>" class="text-center">
                            <i class="fa-solid fa-right-to-bracket fa-lg" style="color: white;"></i>
                        </a>
                    </small>
                </div>
                <a class="text-decoration-none text-white" href="<?= base_url('home/login'); ?>">Masuk/Daftar</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid d-flex  mb-4" style="background-color: rgba(225, 225, 225, 0.4);">
    <div class="row mt-4 mb-4 justify-content-center align-items-center">
        <div class="col-md-10 d-flex mt-4">
            <div class="checkout-container">
                <a href="<?= base_url('Home/index'); ?>">
                    <i class="fa-solid fa-arrow-left mb-4" style="color:black;"></i>
                </a>
                <div class="game-info mb-4">
                    <img src="https://static-src.vocagame.com/gamestoreindonesia/banner%20wp-abe2-original.webp" alt="Mobile Legends Banner">
                    <h4>Mobile Legends: Bang Bang</h4>
                    <p>
                        Nikmati pengalaman bermain Mobile Legends dengan diamond yang tersedia.
                        Pilih jumlah diamond yang sesuai dengan kebutuhan Anda.
                    </p>
                    <hr>
                    <h2 class="mt-5">Pilih Nominal Top Up</h2>
                    <div class="mb-4">
                        <div class="d-flex flex-wrap gap-2 justify-content-center mb-3">
                            <button class="btn btn-outline-dark rounded-pill py-2 px-4 fs-6">Diamond</button>
                            <button class="btn btn-outline-dark rounded-pill py-2 px-4 fs-6">Weekly Diamond Pass</button>
                            <button class="btn btn-outline-dark rounded-pill py-2 px-4 fs-6">Twilight Pass</button>
                        </div>
                        <div class="denomination-wrapper">
                            <div class="denomination-option">
                                <a class="text-decoration-none" href="<?= base_url('Home/Checkout2'); ?>">
                                    <div class="denomination-card">
                                        <div>
                                            <div class="text-primary fw-bold fs-4">Rp. 15.000</div>
                                            <span class="fs-6">50 Diamonds</span>
                                        </div>
                                    </div>
                                </a>
                                <a class="text-decoration-none" href="<?= base_url('Home/Checkout2'); ?>">
                                    <div class="denomination-card">
                                        <div>
                                            <div class="text-primary fw-bold fs-4">Rp. 15.000</div>
                                            <span class="fs-6">50 Diamonds</span>
                                        </div>
                                    </div>
                                </a>
                                <a class="text-decoration-none" href="<?= base_url('Home/Checkout2'); ?>">
                                    <div class="denomination-card">
                                        <div>
                                            <div class="text-primary fw-bold fs-4">Rp. 15.000</div>
                                            <span class="fs-6">50 Diamonds</span>
                                        </div>
                                    </div>
                                </a>
                                <a class="text-decoration-none" href="<?= base_url('Home/Checkout2'); ?>">
                                    <div class="denomination-card">
                                        <div>
                                            <div class="text-primary fw-bold fs-4">Rp. 30.000</div>
                                            <span class="fs-6">100 Diamonds</span>
                                        </div>
                                    </div>
                                </a>
                                <a class="text-decoration-none" href="<?= base_url('Home/Checkout2'); ?>">
                                    <div class="denomination-card">
                                        <div>
                                            <div class="text-primary fw-bold fs-4">Rp. 50.000</div>
                                            <span class="fs-6">150 Diamonds</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid footer bg-dark wow fadeIn" data-wow-delay=".3s">
    <div class="container pt-5 pb-4">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
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
            <div class="col-lg-3 col-md-6">
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

            <div class="col-lg-3 col-md-6">
                <a href="#" class="h3 text-white text-decoration-none">Halaman</a>
                <div class="mt-4 d-flex flex-column short-link">
                    <a href="" class="mb-2 text-white text-decoration-none"><i
                            class="fas fa-angle-right text-white me-2"></i>loyalty</a>
                    <a href="" class="mb-2 text-white text-decoration-none"><i
                            class="fas fa-angle-right text-white me-2"></i>Syarat dan Ketentuan</a>
                    <a href="" class="mb-2 text-white text-decoration-none"><i
                            class="fas fa-angle-right text-white me-2"></i>Kebijakan Privasi</a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
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
<script>
    function selectDenomination(element) {
        document.querySelectorAll('.denomination-card').forEach(card => {
            card.classList.remove('active');
        });

        element.classList.add('active');
    }
    const searchIcon = document.getElementById('searchIcon');
    const searchForm = document.getElementById('searchForm');

    searchIcon.addEventListener('click', () => {
        searchForm.classList.toggle('active');
    });

    document.addEventListener('click', (event) => {
        if (!searchForm.contains(event.target) && !searchIcon.contains(event.target)) {
            searchForm.classList.remove('active');
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>