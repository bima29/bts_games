<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Price List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Price List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row bg-white p-4 rounded shadow-sm">
                <div class="col-12">
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php elseif ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('error'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <p class="text-center text-dark font-weight-bold mb-0" style="font-size: 1.2rem;">
                        Silahkan masukkan kode produk untuk melihat harga.
                    </p>
                    <form action="<?= base_url('admin/price_list') ?>" method="POST" class="mt-3">
                        <div class="form-group">
                            <label for="product_code">Kode Produk:</label>
                            <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Masukkan kode produk">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Cari Harga</button>
                    </form>

                </div>
            </div>

            <div class="row mt-4">
                <div class="d-flex justify-content-start mb-3">
                    <button class="btn btn-success btn-sm mr-2" data-toggle="modal" data-target="#addPriceListModal">Tambah Price List Game</button>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addPriceListCardModal">Tambah Price List Kartu Perdana</button>
                </div>
            </div>



            <div class="row mt-2 bg-white p-4 rounded shadow-sm">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="priceListTable" class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Kode Produk</th>
                                    <th>Kode Item</th>
                                    <th>Harga</th>
                                    <th>Nominal</th>
                                    <th>Satuan</th>
                                    <th>Kategori Item</th>
                                    <th>Jenis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($price_list as $product): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $product->product_name ?></td>
                                        <td><?= $product->product_code ?></td>
                                        <td><?= $product->game_code ?></td>
                                        <td>Rp <?= number_format($product->price, 0, ',', '.') ?></td>
                                        <td><?= $product->nominal ?></td>
                                        <td><?= $product->unit ?></td>
                                        <td><?= $product->game_category ?></td>
                                        <td><?= $product->game_type ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/detail_price_list/' . $product->id) ?>" class="btn btn-info btn-sm">Detail</a>
                                            <a href="<?= base_url('admin/edit_price_list/' . $product->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="<?= base_url('admin/delete_price_list/' . $product->id) ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus game ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<div class="modal fade" id="addPriceListModal" tabindex="-1" role="dialog" aria-labelledby="addPriceListModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPriceListModalLabel">Tambah Price List Game</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="<?= base_url('admin/addprice_list') ?>">
                    <div class="form-group">
                        <label for="gameType">Nama Game</label>
                        <input type="text" class="form-control" id="gameSearch" placeholder="Masukan kata kunci untuk mencari nama game pada pilih nama game" autocomplete="off">
                        <select class="form-control mt-2" id="gameType" name="gameType" required>
                            <option value="">Pilih Nama Game</option>
                            <?php foreach ($games as $game): ?>
                                <option value="<?= $game->game_name ?>"
                                    data-game_code="<?= $game->game_code ?>"
                                    data-category="<?= $game->category ?>"
                                    data-type="<?= $game->type ?>">
                                    <?= $game->game_name ?>
                                </option> <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Kode Produk</label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Nominal</label>
                        <input type="number" class="form-control" id="nominal" name="nominal" required>
                    </div>
                    <div class="form-group">
                        <label for="unit">Satuan</label>
                        <input type="text" class="form-control" id="unit" name="unit" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Item Kode</label>
                        <input type="text" class="form-control" id="game_code" name="game_code" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Kategori Item</label>
                        <input type="text" class="form-control" id="category" name="category" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Jenis</label>
                        <input type="text" class="form-control" id="type" name="type" readonly required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Price List</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addPriceListCardModal" tabindex="-1" role="dialog" aria-labelledby="addPriceListCardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPriceListCardModalLabel">Tambah Price List Kartu Perdana</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addCardPriceListForm" method="POST" action="<?= base_url('admin/addprice_list') ?>">
                    <div class="form-group">
                        <label for="cardSearch">Nama Kartu Perdana</label>
                        <input type="text" class="form-control" id="cardSearch" placeholder="Masukkan kata kunci untuk mencari nama kartu perdana" autocomplete="off">
                        <select class="form-control mt-2" id="cardType" name="gameType" required>
                            <option value="">Pilih Nama Kartu Perdana</option>
                            <?php foreach ($kartu_perdana as $card): ?>
                                <option value="<?= $card->nama_item ?>"
                                    data-card_code="<?= $card->kode_item ?>"
                                    data-jenis="<?= $card->jenis ?>">
                                    <?= $card->nama_item ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productCode">Kode Produk</label>
                        <input type="text" class="form-control" id="productCode" name="categoryName" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" class="form-control" id="price" name="harga" required>
                    </div>
                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="number" class="form-control" id="nominal" name="nominal" required>
                    </div>
                    <div class="form-group">
                        <label for="unit">Satuan</label>
                        <input type="text" class="form-control" id="unit" name="unit" placeholder="Contoh: Pulsa, atau 5 GB (14 hari)" required>
                    </div>

                    <div class="form-group">
                        <label for="unit">Kategori Item</label>
                        <select class="form-control" id="unit" name="category" required>
                            <option value="">Pilih Kategori</option>
                            <option value="pulsa">Pulsa</option>
                            <option value="paket_data">Paket Data</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="card_code">Kode Item</label>
                        <input type="text" class="form-control" id="card_code" name="game_code" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="card_type">Jenis</label>
                        <input type="text" class="form-control" id="card_type" name="type" readonly required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Price List</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    document.getElementById('gameSearch').addEventListener('input', function() {
        let searchQuery = this.value.toLowerCase();
        let options = document.querySelectorAll('#gameType option');

        options.forEach(function(option) {
            let gameName = option.textContent.toLowerCase();
            if (gameName.indexOf(searchQuery) !== -1) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });
    });

    document.getElementById('gameType').addEventListener('change', function() {
        let selectedOption = this.options[this.selectedIndex];
        document.getElementById('game_code').value = selectedOption.getAttribute('data-game_code');
        document.getElementById('category').value = selectedOption.getAttribute('data-category');
        document.getElementById('type').value = selectedOption.getAttribute('data-type');
    });



    document.getElementById('cardSearch').addEventListener('input', function() {
        let searchQuery = this.value.toLowerCase();
        let options = document.querySelectorAll('#cardType option');

        options.forEach(function(option) {
            let cardName = option.textContent.toLowerCase();
            if (cardName.indexOf(searchQuery) !== -1) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });
    });

    document.getElementById('cardType').addEventListener('change', function() {
        let selectedOption = this.options[this.selectedIndex];
        document.getElementById('card_code').value = selectedOption.getAttribute('data-card_code');
        document.getElementById('card_type').value = selectedOption.getAttribute('data-jenis');
    });
</script>