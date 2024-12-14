<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Digiflazz</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Digiflazz</li>
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
                            <label for="userKey">User Key</label>
                            <input type="text" class="form-control" id="userKey" name="userKey" required>
                        </div>
                        <div class="form-group">
                            <label for="secretKey">Secret Key</label>
                            <input type="text" class="form-control" id="secretKey" name="secretKey" required>
                        </div>
                        <input type="hidden" name="banner_id" value="">
                        <div class="form-group d-flex justify-content-between">
                            <a href="<?= base_url('admin/digiflazz'); ?>" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>