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
                    <form action="<?= base_url('admin/update_track_order'); ?>" method="post">
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
                        <input type="hidden" name="banner_id" value="">
                        <div class="form-group d-flex justify-content-between">
                            <a href="<?= base_url('admin/payment_gateway'); ?>" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>