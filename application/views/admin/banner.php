<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Banner</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row bg-white p-4 rounded shadow-sm">
                <div class="col-12">
                    <div class="d-flex justify-content-between mb-3">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addBannerModal">Tambah Banner</button>
                    </div>
                    <div class="table-responsive">
                        <table id="bannerTable" class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><img src="banner-a.jpg" alt="Banner A" class="img-thumbnail" style="width: 150px; height: 80px;"></td>
                                    <td>Promo Diskon</td>
                                    <td>Diskon hingga 50% untuk pembelian produk tertentu</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><img src="banner-b.jpg" alt="Banner B" class="img-thumbnail" style="width: 150px; height: 80px;"></td>
                                    <td>Top-Up Cepat</td>
                                    <td>Top-up instan dengan harga terbaik</td>
                                    <td>
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

<div class="modal fade" id="addBannerModal" tabindex="-1" role="dialog" aria-labelledby="addBannerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBannerModalLabel">Tambah Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addBannerForm">
                    <div class="form-group">
                        <label for="bannerTitle">Judul Banner</label>
                        <input type="text" class="form-control" id="bannerTitle" name="bannerTitle" required>
                    </div>
                    <div class="form-group">
                        <label for="bannerImage">Gambar Banner</label>
                        <input type="file" class="form-control" id="bannerImage" name="bannerImage" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="bannerDescription">Deskripsi</label>
                        <textarea class="form-control" id="bannerDescription" name="bannerDescription" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Banner</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="form-group">
                        <label for="bannerTitle">Judul Banner</label>
                        <input type="text" class="form-control" id="bannerTitle" name="bannerTitle" required>
                    </div>
                    <div class="form-group">
                        <label for="bannerImage">Gambar Banner</label>
                        <input type="file" class="form-control" id="bannerImage" name="bannerImage" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="bannerDescription">Deskripsi</label>
                        <textarea class="form-control" id="bannerDescription" name="bannerDescription" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveChanges()">Save changes</button>
            </div>
        </div>
    </div>
</div>