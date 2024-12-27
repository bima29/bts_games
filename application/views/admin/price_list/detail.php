<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Price List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Price List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row bg-white p-4 rounded shadow-sm">
                <div class="col-12">
                    <form>
                        <div class="form-group">
                            <label for="product_name">Nama Produk</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $category['product_name']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="product_code">Kode Produk</label>
                            <input type="text" class="form-control" id="product_code" name="product_code" value="<?= $category['product_code']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="text" class="form-control" id="price" name="price" value="<?= $category['price']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" class="form-control" id="nominal" name="nominal" value="<?= $category['nominal']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="unit">Satuan</label>
                            <input type="text" class="form-control" id="unit" name="unit" value="<?= $category['unit']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="game_category">Kode Item</label>
                            <input type="text" class="form-control" id="game_category" name="game_category" value="<?= $category['game_code']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="game_category">Kategori Item</label>
                            <input type="text" class="form-control" id="game_category" name="game_category" value="<?= $category['game_category']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="game_type">Jenis</label>
                            <input type="text" class="form-control" id="game_type" name="game_type" value="<?= $category['game_type']; ?>" readonly>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <a href="<?= base_url('admin/price_list'); ?>" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
