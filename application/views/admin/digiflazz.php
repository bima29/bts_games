<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelola API Digiflazz Top-Up</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Digiflazz Top-Up</li>
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
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addApiModal">Tambah API</button>
                    </div>
                    <div class="table-responsive">
                        <table id="apiTable" class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama API</th>
                                    <th>User Key</th>
                                    <th>Secret Key</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Digiflazz Sandbox</td>
                                    <td>12345-USER-KEY</td>
                                    <td>67890-SECRET-KEY</td>
                                    <td>
                                    <a href="<?=base_url('admin/edit_digiflazz')?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm" onclick="deleteContent()">Delete</a>                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Digiflazz Production</td>
                                    <td>ABCDE-USER-KEY</td>
                                    <td>FGHIJ-SECRET-KEY</td>
                                    <td>
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

<div class="modal fade" id="addApiModal" tabindex="-1" role="dialog" aria-labelledby="addApiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addApiModalLabel">Tambah API</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addApiForm">
                    <div class="form-group">
                        <label for="apiName">Nama API</label>
                        <input type="text" class="form-control" id="apiName" name="apiName" required>
                    </div>
                    <div class="form-group">
                        <label for="userKey">User Key</label>
                        <input type="text" class="form-control" id="userKey" name="userKey" required>
                    </div>
                    <div class="form-group">
                        <label for="secretKey">Secret Key</label>
                        <input type="text" class="form-control" id="secretKey" name="secretKey" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah API</button>
                </form>
            </div>
        </div>
    </div>
</div>