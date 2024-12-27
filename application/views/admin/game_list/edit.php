<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Game List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Game List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row bg-white p-4 rounded shadow-sm">
                <div class="col-12">
                    <form action="<?= base_url('admin/update_game'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="game_id" value="<?= $game['id']; ?>">

                        <div class="form-group">
                            <label for="gameName">Nama Game</label>
                            <input type="text" class="form-control" id="gameName" name="gameName" value="<?= $game['game_name']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="gameCode">Kode Game</label>
                            <input type="text" class="form-control" id="gameCode" name="gameCode" value="<?= $game['game_code']; ?>" required>
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
                            <input type="file" class="form-control" id="gameImage" name="gameImage" accept="image/*" onchange="previewImage(event)">
                        </div>

                        <div class="form-group">
                            <label for="gameCategory">Kategori</label>
                            <select class="form-control" id="gameCategory" name="game_category" required>
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['nama_kategori']; ?>" <?= ($game['category'] == $category['nama_kategori']) ? 'selected' : ''; ?>>
                                        <?= $category['nama_kategori']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="gameType">Jenis</label>
                            <select class="form-control" id="gameType" name="game_type" required>
                                <option value="">Pilih Jenis</option>
                                <?php
                                $unique_types = array_unique(array_column($categories, 'jenis'));
                                foreach ($unique_types as $type):
                                ?>
                                    <option value="<?= $type; ?>" <?= ($game['type'] == $type) ? 'selected' : ''; ?>>
                                        <?= $type; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="gameDescription">Deskripsi</label>
                            <textarea class="form-control" id="gameDescription" name="gameDescription" required><?= $game['description']; ?></textarea>
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <a href="<?= base_url('admin/game_list'); ?>" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('imagePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>