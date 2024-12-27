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
                            <input type="text" class="form-control" id="order_number" name="order_number" value="<?= $order->user_id . '-' . $order->game_code . '-' . date('Ymd-His', strtotime($order->created_at)) ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="game_id">Game ID</label>
                            <input type="text" class="form-control" id="game_id" name="game_id" value="<?= $order->gameid ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="game_name">Nama Game</label>
                            <select class="form-control" id="game_name" name="game_name" required>
                                <option value="Valorant" <?= $order->game_name == 'Valorant' ? 'selected' : '' ?>>Valorant</option>
                                <option value="Mobile Legend" <?= $order->game_name == 'Mobile Legend' ? 'selected' : '' ?>>Mobile Legend</option>
                                <option value="Tencent" <?= $order->game_name == 'Tencent' ? 'selected' : '' ?>>Tencent</option>
                                <option value="Garena" <?= $order->game_name == 'Garena' ? 'selected' : '' ?>>Garena</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="topup_amount">Nominal Topup</label>
                            <input type="text" class="form-control" id="topup_amount" name="topup_amount" value="<?= $order->topup_amount ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="topup_amount">Satuan</label>
                            <input type="text" class="form-control" id="satuan" name="satuan" value="<?= $order->topup_amount ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="text" class="form-control" id="price" name="price" value="<?= $order->price ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="order_date">Tanggal</label>
                            <input type="text" class="form-control" id="order_date" name="order_date" value="<?= date('Y-m-d', strtotime($order->order_date)) ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="buyer_name">Nama Pembeli</label>
                            <input type="text" class="form-control" id="buyer_name" name="buyer_name" value="<?= $order->buyer_name ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="success" <?= $order->status == 'success' ? 'selected' : '' ?>>success</option>
                                <option value="pending" <?= $order->status == 'pending' ? 'selected' : '' ?>>pending</option>
                                <option value="failed" <?= $order->status == 'failed' ? 'selected' : '' ?>>failed</option>
                            </select>
                        </div>
                        <input type="hidden" name="order_id" value="<?= $order->id ?>">
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