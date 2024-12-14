<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Track Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Track Order</li>
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
                            <label for="order_number">Nomor Pesanan:</label>
                            <input type="text" class="form-control" id="order_number" name="order_number" required>
                        </div>
                        <div class="form-group">
                            <label for="gameType">Nama Game</label>
                            <select class="form-control" id="gameType" name="gameType" required>
                                <option value="Valorant">Valorant</option>
                                <option value="Mobile Legend">Mobile Legend</option>
                                <option value="Tencent">Tencent</option>
                                <option value="Garena">Garena</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoryName">Harga</label>
                            <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                        </div>
                        <div class="form-group">
                            <label for="categoryName">Nominal</label>
                            <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                        </div>
                        <div class="form-group">
                            <label for="bannerDescription">Kategori Game</label>
                            <textarea class="form-control" id="bannerDescription" name="bannerDescription" required></textarea>
                        </div>
                        <input type="hidden" name="banner_id" value="">
                        <div class="form-group d-flex justify-content-between">
                            <a href="<?= base_url('admin/track_order'); ?>" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>