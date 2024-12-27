<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Game Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Game Categories</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row bg-white p-4 rounded shadow-sm">
                <div class="col-12">
                    <form action="<?= base_url('admin/update_game_category'); ?>" method="post">
                        <div class="form-group">
                            <label for="categoryName">Nama Kategori</label>
                            <input type="text" class="form-control" id="categoryName" name="nama_kategori" value="<?= isset($category) ? $category['nama_kategori'] : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="categoryDescription">Deskripsi</label>
                            <textarea class="form-control" id="categoryDescription" name="deskripsi" required><?= isset($category) ? $category['deskripsi'] : ''; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="gameType">Jenis</label>
                            <select class="form-control" id="gameType" name="jenis" required>
                                <option value="PC" <?= (isset($category) && $category['jenis'] == 'PC') ? 'selected' : ''; ?>>PC</option>
                                <option value="Mobile" <?= (isset($category) && $category['jenis'] == 'Mobile') ? 'selected' : ''; ?>>Mobile</option>
                                <option value="Console" <?= (isset($category) && $category['jenis'] == 'Console') ? 'selected' : ''; ?>>Console</option>
                                <option value="Pulsa" <?= (isset($category) && $category['jenis'] == 'Pulsa') ? 'selected' : ''; ?>>Pulsa</option>
                                <option value="Paket Data" <?= (isset($category) && $category['jenis'] == 'Paket Data') ? 'selected' : ''; ?>>Paket Data</option>
                                <option value="PLN" <?= (isset($category) && $category['jenis'] == 'PLN') ? 'selected' : ''; ?>>PLN</option>
                            </select>
                        </div>
                        <input type="hidden" name="category_id" value="<?= isset($category) ? $category['id'] : ''; ?>">
                        <div class="form-group d-flex justify-content-between">
                            <a href="<?= base_url('admin/game_categories'); ?>" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>