<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Game List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Game List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row bg-white p-4 rounded shadow-sm">
                <div class="col-12">
                    <form action="<?= base_url('admin/update_game/' . $game['id']); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="gameName">Nama Game</label>
                            <input type="text" class="form-control" id="gameName" name="game_name" value="<?= $game['game_name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="gameCode">Kode Game</label>
                            <input type="text" class="form-control" id="gameCode" name="game_code" value="<?= $game['game_code']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="gameImage">Gambar Game</label>
                            <?php if (!empty($game['image'])): ?>
                                <div class="mt-2">
                                    <img src="<?= base_url('assets/game_images/' . $game['image']); ?>" alt="Gambar Game" class="img-fluid" style="max-height: 150px;">
                                </div>
                            <?php else: ?>
                                <div class="mt-2">
                                    <p>Tidak ada gambar tersedia</p>
                                </div>
                            <?php endif; ?>
                        </div>


                        <div class="form-group">
                            <label for="gameCategory">Kategori</label>
                            <input type="text" class="form-control" id="gameCategory" name="game_category" value="<?= $game['category']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="gameType">Jenis</label>
                            <input type="text" class="form-control" id="gameType" name="game_type" value="<?= $game['type']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="gameDescription">Deskripsi</label>
                            <textarea class="form-control" id="gameDescription" name="game_description" required><?= $game['description']; ?></textarea>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <a href="<?= base_url('admin/game_list'); ?>" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>