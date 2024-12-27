<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Track Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Track Order</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row bg-white p-4 rounded shadow-sm">
                <div class="col-12">
                    <p class="text-center text-dark font-weight-bold mb-0" style="font-size: 1.2rem;">
                        Silahkan masukkan nomor pesanan Anda untuk melacak statusnya.
                    </p>
                    <form action="#" method="POST" class="mt-3">
                        <div class="form-group">
                            <label for="order_number">Nomor Pesanan:</label>
                            <input type="text" class="form-control" id="order_number" name="order_number" placeholder="Masukkan nomor pesanan" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" id="trackOrderButton">Track Order</button>
                    </form>
                </div>
            </div>

            <div class="row mt-4 bg-white p-4 rounded shadow-sm">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="orderTable" class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nomor Pesanan</th>
                                    <th>Game ID</th>
                                    <th>Nama Game</th>
                                    <th>Nominal Topup</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pembeli</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td><?= $order->user_id . '-' . $order->game_code . '-' . date('Ymd-His', strtotime($order->created_at)) ?></td>
                                        <td><?= $order->gameid ?></td>
                                        <td><?= $order->game_name ?></td>
                                        <td><?= $order->topup_amount ?></td>
                                        <td><?= $order->satuan ?></td>
                                        <td>Rp <?= number_format($order->price, 0, ',', '.') ?></td>
                                        <td><?= date('Y-m-d', strtotime($order->order_date)) ?></td>
                                        <td><?= $order->buyer_name ?></td>
                                        <td><?= $order->status ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/edit_track_order/' . $order->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this order?')) { window.location.href = '<?= base_url('admin/delete_track_order/') ?>' + <?= $order->id ?>; }">Delete</a>
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