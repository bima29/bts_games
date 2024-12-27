<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengaturan Profil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengaturan Profil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row bg-white p-4 rounded shadow-sm">
                <div class="col-12">
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editProfileModal">Edit Profil</button>
                        <button class="btn btn-warning btn-sm ml-2" data-toggle="modal" data-target="#editPasswordModal">Edit Password</button>
                    </div>
                    <div class="profile-info">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="<?= base_url('assets/universal/img/'); ?><?= $profil->profile_picture; ?>" alt="Profile Picture" class="img-thumbnail rounded-circle">
                            </div>
                            <div class="col-md-8">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Nama Lengkap:</strong> <?= $profil->full_name ?></li>
                                    <li class="list-group-item"><strong>Nama Pengguna:</strong> <?= $profil->username ?></li>
                                    <li class="list-group-item"><strong>Email:</strong> <?= $profil->email ?></li>
                                    <li class="list-group-item"><strong>No HP:</strong> <?= $profil->phone ?></li>
                                    <li class="list-group-item"><strong>Password:</strong> *********</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/proses_edit_profile') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="profilePicture">Gambar Profil</label>
                        <input type="file" class="form-control" id="profilePicture" name="profilePicture">
                    </div>
                    <div class="form-group">
                        <label for="fullName">Nama Lengkap</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Nama Pengguna</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">No HP</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editPasswordModal" tabindex="-1" role="dialog" aria-labelledby="editPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPasswordModalLabel">Edit Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/proses_edit_password') ?>" method="post">
                    <div class="form-group">
                        <label for="currentPassword">Password Saat Ini</label>
                        <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">Password Baru</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

