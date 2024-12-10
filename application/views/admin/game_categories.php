<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Game Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Game Categories</li>
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
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addCategoryModal">Tambah Kategori</button>
                    </div>
                    <div class="table-responsive">
                        <table id="categoryTable" class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Jenis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Action</td>
                                    <td>Game dengan aksi cepat dan intens</td>
                                    <td>PC</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Adventure</td>
                                    <td>Game dengan petualangan dan eksplorasi</td>
                                    <td>Mobile</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Puzzle</td>
                                    <td>Game teka-teki yang menantang</td>
                                    <td>PC</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>RPG</td>
                                    <td>Game dengan elemen role-playing</td>
                                    <td>Mobile</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">Edit</a>
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
                <form id="addCategoryForm">
                    <div class="form-group">
                        <label for="categoryName">Nama Kategori</label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryDescription">Deskripsi</label>
                        <textarea class="form-control" id="categoryDescription" name="categoryDescription" required></textarea>
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
