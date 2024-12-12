<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelola Role Akun</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Role Akun</li>
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
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addRoleModal">Tambah Role</button>
                    </div>
                    <div class="table-responsive">
                        <table id="roleTable" class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Role</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($roles as $role): ?>
                                    <tr>
                                        <td><?= $role['role_id'] ?></td>
                                        <td><?= $role['role_name'] ?></td>
                                        <td><?= $role['role_description'] ?></td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal" onclick="editRole(<?= $role['role_id'] ?>)">Edit</a>
                                            <a href="<?= base_url('admin/deleteRole/' . $role['role_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this role?')">Delete</a>
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

<div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-labelledby="addRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roleModalLabel">Manage Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="roleForm" action="<?= base_url('admin/proses_save_role') ?>" method="post">
                    <div class="form-group">
                        <label for="roleId">Role ID</label>
                        <input type="text" class="form-control" id="roleId" name="roleId" required>
                    </div>
                    <div class="form-group">
                        <label for="roleName">Nama Role</label>
                        <input type="text" class="form-control" id="roleName" name="roleName" required>
                    </div>
                    <div class="form-group">
                        <label for="roleDescription">Deskripsi</label>
                        <input type="text" class="form-control" id="roleDescription" name="roleDescription" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="$('#roleForm').submit()">Save changes</button>
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
                <form id="editForm" action="<?= base_url('admin/proses_update_role') ?>" method="post">
                    <div class="form-group">
                        <label for="editRoleId">Role ID</label>
                        <input type="text" class="form-control" id="editRoleId" name="roleId" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="editRoleName">Nama Role</label>
                        <input type="text" class="form-control" id="editRoleName" name="roleName" required>
                    </div>
                    <div class="form-group">
                        <label for="editRoleDescription">Deskripsi</label>
                        <input type="text" class="form-control" id="editRoleDescription" name="roleDescription" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="$('#editForm').submit()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    function editRole(roleId) {
        $.ajax({
            url: '<?= base_url('admin/getRoleDetails/') ?>' + roleId,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data) {
                    $('#editRoleId').val(data.role_id);
                    $('#editRoleName').val(data.role_name);
                    $('#editRoleDescription').val(data.role_description);
                }
            },
            error: function() {
                alert("Error fetching role data.");
            }
        });
    }
</script>