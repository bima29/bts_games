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
                    <form action="#" method="POST" class="mt-3">
                        <div class="form-group">
                            <label for="product_code">Kode Produk:</label>
                            <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Masukkan kode produk" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" id="searchButton">Cari Harga</button>
                    </form>
                </div>
            </div>

            <div class="row mt-4">
                <div class="d-flex justify-content-between mb-3">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addCategoryModal">Tambah Kategori</button>
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
                                    <th>Nominal</th>
                                    <th>Satuan</th>
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
                                    <td>1200</td>
                                    <td>Diamond</td>
                                    <td>Action</td>
                                    <td>PC</td>
                                    <td>
                                        <a href="<?= base_url('admin/detail_price_list/')?>" class="btn btn-info btn-sm">Detail</a>
                                        <a href="<?= base_url('admin/edit_price_list/')?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm" onclick="deleteContent()">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Game B</td>
                                    <td>GB1200</td>
                                    <td>Rp 100.000</td>
                                    <td>1200</td>
                                    <td>Cash</td>
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
                                    <td>1500</td>
                                    <td>Ushee</td>
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
                                    <td>1000</td>
                                    <td>Diamond</td>
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
                                    <td>2000</td>
                                    <td>Cash</td>
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

<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Tambah Kategori Game</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="form-group">
                        <label for="gameType">Nama Game</label>
                        <select class="form-control" id="gameType" name="gameType" required>
                            <option value="Valorant">Valorant</option>
                            <option value="Mobile Legend">Mobile Legend</option>
                            <option value="Tencent">Tencent</option>
                            <option value="Garena">Garena</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Kode Produk</label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Harga</label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Nominal</label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                    </div>
                    <div class="form-group">
                        <label for="gameType">Satuan</label>
                        <select class="form-control" id="gameType" name="gameType" required>
                            <option value="Diamond">Diamond</option>
                            <option value="Cash">Cash</option>
                            <option value="UC">UC</option>
                            <option value="Point">Point</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gameType">Kategori Game</label>
                        <select class="form-control" id="gameType" name="gameType" required>
                            <option value="Action">Action</option>
                            <option value="Advanture">Advanture</option>
                            <option value="Puzzle">Puzzle</option>
                            <option value="RPG">RPG</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gameType">Jenis</label>
                        <select class="form-control" id="gameType" name="gameType" required>
                            <option value="PC">PC</option>
                            <option value="Mobile">Mobile</option>
                            <option value="Console">Console</option>
                            <option value="Pulsa">Pulsa</option>
                            <option value="Paket Data">Paket Data</option>
                            <option value="PLN">PLN</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                </form>
            </div>
        </div>
    </div>
</div>