<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelola Akun</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manajemen Akun</li>
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
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>


                    <div class="d-flex justify-content-between mb-3">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addAccountModal">Tambah Akun</button>
                    </div>
                    <div class="table-responsive">
                        <table id="accountTable" class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengguna</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($accounts as $account): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $account['username'] ?></td>
                                        <td><?= $account['email'] ?></td>
                                        <td><?= $account['role_name'] ?></td>
                                        <td>
                                            <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal" onclick="editAccount(<?= $account['id'] ?>)">Edit</a>
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editPasswordModal" onclick="editPassword(<?= $account['id'] ?>)">Edit Password</a>
                                            <a href="<?= base_url('admin/delete_account/' . $account['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?');">Hapus</a>
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

<div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="addAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAccountModalLabel">Tambah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/add_manage_account') ?>" method="POST">
                    <div class="form-group">
                        <label for="username">Nama Pengguna</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="full_name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                    </div>
                    <div class="form-group">
                        <label for="profile_picture">Foto Profil</label>
                        <input type="text" class="form-control" id="profile_picture" name="profile_picture" value="default.jpg" readonly>
                    </div>
                    <div class="form-group">
                        <label for="role_id">Role</label>
                        <select class="form-control" id="role_id" name="role_id" required>
                            <?php foreach ($roles as $role): ?>
                                <option value="<?= $role['role_id'] ?>"><?= $role['role_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Akun</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/edit_manage_account') ?>" method="POST">
                    <input type="hidden" id="edit_account_id" name="account_id">
                    <div class="form-group">
                        <label for="edit_username">Nama Pengguna</label>
                        <input type="text" class="form-control" id="edit_username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_phone">Nomor Telepon</label>
                        <input type="text" class="form-control" id="edit_phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_full_name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="edit_full_name" name="full_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_profile_picture">Foto Profil</label>
                        <input type="text" class="form-control" id="edit_profile_picture" name="profile_picture" value="default.jpg" readonly>
                    </div>
                    <div class="form-group">
                        <label for="edit_role_id">Role</label>
                        <select class="form-control" id="edit_role_id" name="role_id" required>
                            <?php foreach ($roles as $role): ?>
                                <option value="<?= $role['role_id'] ?>"><?= $role['role_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editPasswordModal" tabindex="-1" aria-labelledby="editPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPasswordModalLabel">Edit Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/update_password') ?>" method="POST">
                    <div class="form-group">
                        <label for="new_password">Password Baru</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <input type="hidden" id="editPassword_id" name="account_id">
                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function editPassword(accountId) {
        $.ajax({
            url: '<?= base_url('admin/get_account_by_id') ?>',
            method: 'GET',
            data: {
                id: accountId
            },
            success: function(response) {
                const account = JSON.parse(response);


                $('#editPassword_id').val(account.id);
            },
            error: function() {
                alert('Error fetching account data.');
            }
        });

    }






    function editAccount(accountId) {
        $.ajax({
            url: '<?= base_url('admin/get_account_by_id') ?>',
            method: 'GET',
            data: {
                id: accountId
            },
            success: function(response) {
                const account = JSON.parse(response);

                $('#edit_account_id').val(account.id);
                $('#edit_username').val(account.username);
                $('#edit_email').val(account.email);
                $('#edit_phone').val(account.phone);
                $('#edit_full_name').val(account.full_name);
                $('#edit_profile_picture').val(account.profile_picture);
                $('#edit_role_id').val(account.role_id);
                $('#edit_account_id').val(account.id);
            },
            error: function() {
                alert('Error fetching account data.');
            }
        });
    }
</script>