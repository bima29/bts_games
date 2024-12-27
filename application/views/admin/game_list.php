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
                    <div class="d-flex justify-content-between mb-3">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addGameModal">Tambah Game</button>
                    </div>
                    <div class="table-responsive">
                        <table id="gameTable" class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
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
                                <?php $no = 1;
                                foreach ($games as $game): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><img src="<?= base_url('assets/game_images/' . $game['image']) ?>" alt="<?= $game['game_name'] ?>" class="img-thumbnail" style="width: 80px; height: 80px;"></td>
                                        <td><?= $game['game_name'] ?></td>
                                        <td><?= $game['game_code'] ?></td>
                                        <td><?= $game['category'] ?></td>
                                        <td><?= $game['type'] ?></td>
                                        <td><?= $game['description'] ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/detail_game_list/' . $game['id']) ?>" class="btn btn-info btn-sm">Detail</a>
                                            <a href="<?= base_url('admin/edit_game_list/' . $game['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="<?= base_url('admin/delete_game/' . $game['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus game ini?')">Hapus</a>
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
                <form action="<?= base_url('admin/add_game') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="gameName">Nama Game</label>
                        <input type="text" class="form-control" id="gameName" name="game_name" required>
                    </div>
                    <div class="form-group">
                        <label for="gameCode">Kode Game</label>
                        <input type="text" class="form-control" id="gameCode" name="game_code" required>
                    </div>
                    <div class="form-group">
                        <label for="gameImage">Gambar Game</label>
                        <input type="file" class="form-control" id="gameImage" name="game_image" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="gameCategory">Kategori</label>
                        <select class="form-control" id="gameCategory" name="game_category" required>
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= htmlspecialchars($category['nama_kategori']); ?>" <?= (isset($game) && $game['category'] == $category['nama_kategori']) ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($category['nama_kategori']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="gameType">Jenis</label>
                        <select class="form-control" id="gameType" name="game_type" required>
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
                        <textarea class="form-control" id="gameDescription" name="game_description" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Game</button>
                </form>
            </div>
        </div>
    </div>
</div>