<div class="container-fluid container-bg-img-home">
    <div id="loadingScreen">
        <img src="<?= base_url('assets/img/logoBTS.png') ?>" alt="Loading..." class="loadingGif">
    </div>

    <div id="mainContent" style="display: none;">
    </div>

    <div class="container mt-5 rounded bg-color-blur-black-4">
        <h1 class="text-white">Welcome to BTS Store Indonesia</h1>
        <p class="text-white">Your one-stop shop for all your gaming needs!</p>
        <div class="category-buttons d-flex flex-wrap gap-2 justify-content-start mt-3">
            <?php foreach ($categories as $category): ?>
                <button class="btn btn-outline-light rounded-pill py-2 px-4 fs-6"><?= $category->nama_kategori; ?></button>
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

<script src="<?= base_url('assets/js/loadingscreen.js'); ?>"></script>