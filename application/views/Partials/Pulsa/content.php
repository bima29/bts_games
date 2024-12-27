<div class="container-fluid container-bg-img-pricelist">
    <div class="container mt-5 rounded bg-color-blur-black-4 mb-5 centered-container">
        <div class="container d-flex align-items-center shadow p-5 rounded">
            <div class="bg-white rounded-pill shadow p-3 d-inline-block">
                <img src="<?= base_url('assets/img/mobile.png') ?>" alt="Location Icon" class="img-fluid img-fluid-pricelist">
            </div>
            <div class="ms-5">
                <p class="mb-0 responsive-p">btsstoreindonesia.com</p>
                <h1 class="mt-2 text-white">Pulsa</h1>
            </div>
        </div>

        <div class="category-buttons d-flex flex-wrap gap-2 justify-content-start mt-5">
            <form method="GET" action="<?= base_url('Home/pulsa'); ?>" class="d-flex w-100 mb-3">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari produk..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <input type="hidden" name="category" value="<?= isset($_GET['category']) ? htmlspecialchars($_GET['category']) : ''; ?>">
                <button type="submit" class="btn btn-outline-light">Cari</button>
            </form>
            <a href="<?= base_url('Home/pulsa'); ?>" class="text-decoration-none">
                <button class="btn btn-outline-light rounded-pill py-2 px-4 fs-6 <?= !isset($_GET['category']) ? 'active' : ''; ?>">Show All</button>
            </a>
            <?php foreach ($categories as $category): ?>
                <a href="<?= base_url('Home/pulsa?category=' . urlencode($category->nama_kategori) . '&search=' . (isset($_GET['search']) ? urlencode($_GET['search']) : '')); ?>" class="text-decoration-none">
                    <button class="btn btn-outline-light rounded-pill py-2 px-4 fs-6 <?= isset($_GET['category']) && $_GET['category'] == $category->nama_kategori ? 'active' : ''; ?>">
                        <?= htmlspecialchars($category->nama_kategori); ?>
                    </button>
                </a>
            <?php endforeach; ?>
        </div>


        <div class="row mt-4 mb-4 bg-gray-dark shadow">
            <?php foreach ($pulsa_items as $item): ?>
                <div class="col-6 col-md-3 mt-3 mb-3 dataCover">
                <a href="<?= base_url('Home/SelectPayment2/' . $item->id); ?>" class="text-decoration-none">
                        <div class="card shadow-lg border-0 h-100" style="background-color: #343a40; border-radius: 15px;">
                            <div class="card-body text-center d-flex flex-column justify-content-between">
                                <p class="card-text text-white fw-bold mb-2"><?= htmlspecialchars($item->product_name); ?></p>
                                <h5 class="card-title text-light mb-3">Pulsa <?= htmlspecialchars($item->nominal); ?></h5>
                                <p class="card-text text-white fw-semibold">Harga:
                                    <span class="text-success fw-bold">Rp.<?= number_format($item->price, 0, ',', '.'); ?></span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>


    </div>
</div>

<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
    }

    .text-white-50 {
        color: rgba(255, 255, 255, 0.5);
    }

    .text-white-75 {
        color: rgba(255, 255, 255, 0.75);
    }
</style>