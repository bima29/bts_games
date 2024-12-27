<div class="container-fluid container-bg-img-home">
    <div id="loadingScreen">
        <img src="<?= base_url('assets/img/logoBTS.png') ?>" alt="Loading..." class="loadingGif">
    </div>

    <div id="mainContent" style="display: none;">
    </div>

    <div class="container mt-5 rounded bg-color-blur-black-4">
        <h1 class="text-white">Selamat Datang di BTS Store Indonesia</h1>
        <p class="text-white">💎 Destinasi Terbaik untuk Para Gamers! 🎮 Temukan penawaran terbaik dan top-up dengan mudah. 🚀</p>
        <div class="mt-5 d-flex justify-content-center align-items-center">
            <div class="container rounded p-5 w-100 bg-color-blur-black-5">
                <form class="d-flex w-100" method="get" action="<?= base_url('Home/index'); ?>">
                    <div class="input-group w-100">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-magnifying-glass icon-fa-magnifying-glass"></i>
                        </span>
                        <input class="form-control text-white bg-color-blur-black-7 fs-p-br-input custom-input" type="text" name="search" placeholder="Cari game yang anda inginkan..."
                            aria-label="Order Number" value="<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                        <button class="btn btn-outline-success ms-0 btn-fontsize-padding" type="submit">Cari</button>
                    </div>
                </form>

            </div>
        </div>

        <div class="category-buttons d-flex flex-wrap gap-2 justify-content-start mt-5">
            <a href="<?= base_url('Home/index'); ?>" class="text-decoration-none">
                <button class="btn btn-outline-light rounded-pill py-2 px-4 fs-6 <?= !isset($_GET['category']) ? 'active' : ''; ?>">Show All</button>
            </a>
            <?php foreach ($categories as $category): ?>
                <a href="<?= base_url('Home/index?category=' . $category->nama_kategori . '&search=' . (isset($_GET['search']) ? $_GET['search'] : '')); ?>" class="text-decoration-none">
                    <button class="btn btn-outline-light rounded-pill py-2 px-4 fs-6 <?= isset($_GET['category']) && $_GET['category'] == $category->nama_kategori ? 'active' : ''; ?>">
                        <?= $category->nama_kategori; ?>
                    </button>
                </a>
            <?php endforeach; ?>
        </div>



        <div class="row mt-4 mb-4">
            <?php foreach ($games as $game): ?>
                <div class="col-6 col-md-3 mb-3">
                    <a href="<?= base_url('Home/Checkout1/' . $game->id); ?>" class="text-decoration-none">
                        <div class="card align-items-center justify-content-center bg-color-blur-black-5">
                            <img src="<?= base_url('assets/game_images/' . $game->image); ?>" class="card-img-top gameImage" alt="Game Image">
                            <div class="card-body text-center">
                                <h5 class="card-title text-white"><?= $game->game_name; ?></h5>
                                <p class="card-text text-white"><?= $game->category; ?></p>
                            </div>
                            <h3 class="text-white gameText bg-color-blur-black-5 b-r-5px">
                                <?= $game->game_name; ?>
                            </h3>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>

        </div>


        <hr>
    </div>
</div>

<style>
    .gameImage {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 5px;
    }

    .card {
        overflow: hidden;
        border: none;
    }
</style>

<script src="<?= base_url('assets/js/loadingscreen.js'); ?>"></script>