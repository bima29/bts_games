<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Banner</li>
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

                    <form action="<?= base_url('admin/update_banner'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="bannerTitle">Judul Banner</label>
                            <input type="text" class="form-control" id="bannerTitle" name="bannerTitle" value="<?= $banner['title']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="bannerImage">Gambar Banner</label>
                            <div id="imagePreviewWrapper">
                                <img src="<?= base_url('assets/img/' . $banner['image']); ?>" alt="<?= $banner['title']; ?>" class="img-thumbnail" style="width: 150px; height: 80px;">
                            </div>
                            <input type="file" class="form-control" id="bannerImage" name="bannerImage" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <label for="bannerDescription">Deskripsi</label>
                            <textarea class="form-control" id="bannerDescription" name="bannerDescription" required><?= $banner['description']; ?></textarea>
                        </div>
                        <input type="hidden" name="banner_id" value="<?= $banner['id']; ?>">
                        <div class="form-group d-flex justify-content-between">
                            <a href="<?= base_url('admin/banner'); ?>" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>