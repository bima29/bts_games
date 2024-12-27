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
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addBannerModal">Tambah Banner</button>
                    </div>
                    <div class="table-responsive">
                        <table id="bannerTable" class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                ?>
                                <?php foreach ($banners as $banner): ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><img src="<?= base_url('assets/img/' . $banner['image']); ?>" alt="<?= $banner['title']; ?>" class="img-thumbnail" style="width: 150px; height: 80px;"></td>
                                        <td><?= $banner['title']; ?></td>
                                        <td><?= $banner['description']; ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/edit_banner/' . $banner['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="<?= base_url('admin/delete_banner/' . $banner['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus banner ini?')">Hapus</a>
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
                <form id="addBannerForm" action="<?= base_url('admin/add_banner'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="bannerTitle">Judul Banner</label>
                        <input type="text" class="form-control" id="bannerTitle" name="bannerTitle" placeholder="Masukkan judul banner" required>
                    </div>
                    <div class="form-group">
                        <label for="bannerImage">Gambar Banner</label>
                        <input type="file" class="form-control" id="bannerImage" name="bannerImage" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="bannerDescription">Deskripsi</label>
                        <textarea class="form-control" id="bannerDescription" name="bannerDescription" rows="3" placeholder="Masukkan deskripsi banner" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah Banner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

