<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Payment Gateway</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Payment Gateway</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row bg-white p-4 rounded shadow-sm">
                <div class="col-12">
                    <form action="<?= base_url('admin/update_payment_gateway') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $gateway->id ?>">

                        <div class="form-group">
                            <label for="client_key">Client Key</label>
                            <input type="text" id="client_key" name="client_key" value="<?= $gateway->client_key ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="server_key">Server Key</label>
                            <input type="text" id="server_key" name="server_key" value="<?= $gateway->server_key ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="is_production">Is Production</label>
                            <select id="is_production" name="is_production" class="form-control">
                                <option value="1" <?= $gateway->is_production ? 'selected' : '' ?>>Yes</option>
                                <option value="0" <?= !$gateway->is_production ? 'selected' : '' ?>>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="is_sanitized">Is Sanitized</label>
                            <select id="is_sanitized" name="is_sanitized" class="form-control">
                                <option value="1" <?= $gateway->is_sanitized ? 'selected' : '' ?>>Yes</option>
                                <option value="0" <?= !$gateway->is_sanitized ? 'selected' : '' ?>>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="is_3ds">Is 3DS</label>
                            <select id="is_3ds" name="is_3ds" class="form-control">
                                <option value="1" <?= $gateway->is_3ds ? 'selected' : '' ?>>Yes</option>
                                <option value="0" <?= !$gateway->is_3ds ? 'selected' : '' ?>>No</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('admin/payment_gateway') ?>" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>