<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Price List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Price List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row bg-white p-4 rounded shadow-sm">
                <div class="col-12">
                    <form action="<?= base_url('admin/update_price_list'); ?>" method="post">
                        <input type="hidden" name="price_list_id" value="<?= $price_list['id']; ?>">

                        <div class="form-group">
                            <label for="gameType">Nama Game</label>
                            <input type="text" class="form-control" id="gameSearch" placeholder="Masukkan kata kunci untuk mencari nama game" autocomplete="off">
                            <select class="form-control mt-2" id="gameType" name="gameType" required>
                                <option value="">Pilih Nama Game</option>
                                <?php foreach ($games as $game): ?>
                                    <option value="<?= $game->game_name; ?>" data-category="<?= $game->category; ?>" data-type="<?= $game->type; ?>" <?= $game->game_name === $price_list['product_name'] ? 'selected' : ''; ?>>
                                        <?= $game->game_name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="categoryName">Kode Produk</label>
                            <input type="text" class="form-control" id="categoryName" name="categoryName" value="<?= $price_list['product_code']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="text" class="form-control" id="price" name="price" value="<?= $price_list['price']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" class="form-control" id="nominal" name="nominal" value="<?= $price_list['nominal']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="unit">Satuan</label>
                            <input type="text" class="form-control" id="unit" name="unit" value="<?= $price_list['unit']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="game_category">Kode Item</label>
                            <input type="text" class="form-control" id="game_category" name="game_category" value="<?= $price_list['game_code']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="game_category">Kategori Item</label>
                            <input type="text" class="form-control" id="game_category" name="game_category" value="<?= $price_list['game_category']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="game_type">Jenis</label>
                            <input type="text" class="form-control" id="game_type" name="game_type" value="<?= $price_list['game_type']; ?>" readonly>
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <a href="<?= base_url('admin/price_list'); ?>" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.getElementById('gameSearch').addEventListener('input', function () {
        let searchQuery = this.value.toLowerCase();
        let options = document.querySelectorAll('#gameType option');

        options.forEach(function (option) {
            let gameName = option.textContent.toLowerCase();
            if (gameName.indexOf(searchQuery) !== -1) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });
    });

    document.getElementById('gameType').addEventListener('change', function () {
        let selectedOption = this.options[this.selectedIndex];
        document.getElementById('game_category').value = selectedOption.getAttribute('data-category');
        document.getElementById('game_type').value = selectedOption.getAttribute('data-type');
    });
</script>