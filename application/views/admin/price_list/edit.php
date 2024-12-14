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
                    <form action="<?= base_url('admin/update_track_order'); ?>" method="post">
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
                        <input type="hidden" name="banner_id" value="">
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