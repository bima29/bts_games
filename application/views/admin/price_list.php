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
                    <p class="text-center text-dark font-weight-bold mb-0" style="font-size: 1.2rem;">
                        Silahkan masukkan kode produk atau layanan untuk melihat harga.
                    </p>
                    <form action="<?= base_url('admin/price_list.php') ?>" method="POST" class="mt-3">
                        <div class="form-group">
                            <label for="product_code">Kode Produk:</label>
                            <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Masukkan kode produk" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Cari Harga</button>
                    </form>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 text-left">
                    <a href="#" class="btn btn-success">Tambah Harga</a>
                </div>
            </div>

            <div class="row mt-2 bg-white p-4 rounded shadow-sm">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="priceListTable" class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Kode Produk</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Kategori Game</th>
                                    <th>Jenis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Game A</td>
                                    <td>GA1200</td>
                                    <td>Rp 50.000</td>
                                    <td>Top-up Game A dengan nominal 1200</td>
                                    <td>Action</td>
                                    <td>PC</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">Detail</a>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Game B</td>
                                    <td>GB1200</td>
                                    <td>Rp 100.000</td>
                                    <td>Top-up Game B dengan nominal 1200</td>
                                    <td>Adventure</td>
                                    <td>Mobile</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">Detail</a>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Game C</td>
                                    <td>GC1500</td>
                                    <td>Rp 75.000</td>
                                    <td>Top-up Game C dengan nominal 1500</td>
                                    <td>Puzzle</td>
                                    <td>PC</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">Detail</a>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Game D</td>
                                    <td>GD1000</td>
                                    <td>Rp 25.000</td>
                                    <td>Top-up Game D dengan nominal 1000</td>
                                    <td>RPG</td>
                                    <td>Mobile</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">Detail</a>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Game E</td>
                                    <td>GE2000</td>
                                    <td>Rp 150.000</td>
                                    <td>Top-up Game E dengan nominal 2000</td>
                                    <td>RPG</td>
                                    <td>PC</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">Detail</a>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>