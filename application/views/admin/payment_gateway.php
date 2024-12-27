<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelola API Payment Gateway</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Payment Gateway</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row bg-white p-4 rounded shadow-sm">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="apiTable" class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama API</th>
                                    <th>Client Key</th>
                                    <th>Server Key</th>
                                    <th>Is Production</th>
                                    <th>Is Sanitized</th>
                                    <th>Is 3DS</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($payment_gateways as $gateway): ?>
                                    <tr>
                                        <td><?= $gateway->id ?></td>
                                        <td><?= $gateway->is_production ? 'Production' : 'Sandbox' ?></td>
                                        <td><?= $gateway->client_key ?></td>
                                        <td><?= $gateway->server_key ?></td>
                                        <td><?= $gateway->is_production ? 'Yes' : 'No' ?></td>
                                        <td><?= $gateway->is_sanitized ? 'Yes' : 'No' ?></td>
                                        <td><?= $gateway->is_3ds ? 'Yes' : 'No' ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/edit_payment_gateway/' . $gateway->id) ?>" class="btn btn-warning btn-sm">Edit</a>
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
                        <label for="clientKey">Client Key</label>
                        <input type="text" class="form-control" id="clientKey" name="clientKey" required>
                    </div>
                    <div class="form-group">
                        <label for="serverKey">Server Key</label>
                        <input type="text" class="form-control" id="serverKey" name="serverKey" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah API</button>
                </form>
            </div>
        </div>
    </div>
</div>