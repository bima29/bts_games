<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Game List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Game List</li>
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
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addGameModal">Tambah Game</button>
                    </div>
                    <div class="table-responsive">
                        <table id="gameTable" class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Gambar</th>
                                    <th>Nama Game</th>
                                    <th>Kode Game</th>
                                    <th>Kategori</th>
                                    <th>Jenis</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><img src="game-a.jpg" alt="Game A" class="img-thumbnail" style="width: 80px; height: 80px;"></td>
                                    <td>Game A</td>
                                    <td>GA1200</td>
                                    <td>Action</td>
                                    <td>PC</td>
                                    <td>Game dengan aksi cepat dan intens</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">Detail</a>
                                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><img src="game-b.jpg" alt="Game B" class="img-thumbnail" style="width: 80px; height: 80px;"></td>
                                    <td>Game B</td>
                                    <td>GB1200</td>
                                    <td>Adventure</td>
                                    <td>Mobile</td>
                                    <td>Game dengan petualangan dan eksplorasi</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">Detail</a>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><img src="game-c.jpg" alt="Game C" class="img-thumbnail" style="width: 80px; height: 80px;"></td>
                                    <td>Game C</td>
                                    <td>GC1500</td>
                                    <td>Puzzle</td>
                                    <td>PC</td>
                                    <td>Game teka-teki yang menantang</td>
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

<div class="modal fade" id="addGameModal" tabindex="-1" role="dialog" aria-labelledby="addGameModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGameModalLabel">Tambah Game</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addGameForm">
                    <div class="form-group">
                        <label for="gameName">Nama Game</label>
                        <input type="text" class="form-control" id="gameName" name="gameName" required>
                    </div>
                    <div class="form-group">
                        <label for="gameCode">Kode Game</label>
                        <input type="text" class="form-control" id="gameCode" name="gameCode" required>
                    </div>
                    <div class="form-group">
                        <label for="gameImage">Gambar Game</label>
                        <input type="file" class="form-control" id="gameImage" name="gameImage" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="gameCategory">Kategori</label>
                        <select class="form-control" id="gameCategory" name="gameCategory" required>
                            <option value="Action">Action</option>
                            <option value="Adventure">Adventure</option>
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
                    <div class="form-group">
                        <label for="gameDescription">Deskripsi</label>
                        <textarea class="form-control" id="gameDescription" name="gameDescription" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Game</button>
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
                        <label for="gameName">Nama Game</label>
                        <input type="text" class="form-control" id="gameName" name="gameName" required>
                    </div>
                    <div class="form-group">
                        <label for="gameCode">Kode Game</label>
                        <input type="text" class="form-control" id="gameCode" name="gameCode" required>
                    </div>
                    <div class="form-group">
                        <label for="gameImage">Gambar Game</label>
                        <input type="file" class="form-control" id="gameImage" name="gameImage" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="gameCategory">Kategori</label>
                        <select class="form-control" id="gameCategory" name="gameCategory" required>
                            <option value="Action">Action</option>
                            <option value="Adventure">Adventure</option>
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
                    <div class="form-group">
                        <label for="gameDescription">Deskripsi</label>
                        <textarea class="form-control" id="gameDescription" name="gameDescription" required></textarea>
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