<link rel="stylesheet" href="<?= base_url('assets/css/table2.css') ?>">

<div class="container-fluid container-bg-img-pricelist">
    <div class="container mt-5 rounded bg-color-blur-black-4">
        <div class="container d-flex align-items-center shadow p-5 rounded">
            <div class="bg-white rounded-pill shadow p-3 d-inline-block">
                <img src="<?= base_url('assets/img/pricetag.png') ?>" alt="Location Icon" class="img-fluid img-fluid-pricelist">
            </div>

            <div class="ms-5">
                <p class="mb-0 responsive-p">btsstoreindonesia.com</p>
                <h1 class="mt-2 text-white">Catatan Harga</h1>
            </div>
        </div>
        <div class="mt-5 justify-content-center align-items-center">
            <div class="container border border-light rounded p-5 w-100 bg-color-blur-black-6">
                <form class="d-flex w-100" method="GET" action="">
                    <div class="input-group w-100">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-magnifying-glass icon-fa-magnifying-glass"></i>
                        </span>
                        <input class="form-control text-white bg-color-blur-black-7 custom-input" type="text" name="search" placeholder="Ketik nama produk..." aria-label="Order Number" style="font-size: 1.2rem; padding: 0.75rem; border-right: none;" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <button class="btn btn-outline-success ms-0 fs-p-br-input" type="submit">Cari produk</button>
                    </div>
                </form>
            </div>


            <div class="container-fluid mt-4 mb-5 text-white rounded p-4 bg-color-blur-black-5">
                <div style="overflow-x: auto; white-space: nowrap;">
                    <table class="table-hover text-white rounded bg-color-blur-white-3 w-100">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="px-3 py-2 text-center">Nama Produk</th>
                                <th class="px-3 py-2 text-center">Kode Produk</th>
                                <th class="px-3 py-2 text-center">Harga</th>
                                <th class="px-3 py-2 text-center">Nominal</th>
                                <th class="px-3 py-2 text-center">Satuan</th>
                                <th class="px-3 py-2 text-center">Kategori Game</th>
                                <th class="px-3 py-2 text-center">Jenis Game</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $search = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
                            $filteredPrices = array_filter($prices, function ($price) use ($search) {
                                return empty($search) || strpos(strtolower($price['product_name']), $search) !== false;
                            });
                            ?>

                            <?php if (!empty($filteredPrices)) : ?>
                                <?php foreach ($filteredPrices as $price) : ?>
                                    <tr>
                                        <td class="px-3 py-2 text-center"><?= $price['product_name']; ?></td>
                                        <td class="px-3 py-2 text-center"><?= $price['product_code']; ?></td>
                                        <td class="px-3 py-2 text-center">Rp <?= number_format($price['price'], 0, ',', '.'); ?></td>
                                        <td class="px-3 py-2 text-center"><?= $price['nominal']; ?></td>
                                        <td class="px-3 py-2 text-center"><?= $price['unit']; ?></td>
                                        <td class="px-3 py-2 text-center"><?= $price['game_category']; ?></td>
                                        <td class="px-3 py-2 text-center"><?= $price['game_type']; ?></td>
                                      
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data tersedia</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
