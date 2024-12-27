<div class="container-fluid container-bg-img-trackorder">
    <div class="container mt-5 rounded bg-color-blur-black-4">
        <div class="container d-flex align-items-center shadow p-5 rounded">
            <div class="bg-white rounded-pill shadow p-3 d-inline-block">
                <img src="<?= base_url('assets/img/location.png') ?>" alt="Location Icon" class="img-fluid img-fluid-location">
            </div>

            <div class="ms-5">
                <p class="mb-0 responsive-p">btsstoreindonesia.com</p>
                <h1 class="mt-2 text-white">Lacak Pesanan</h1>
            </div>
        </div>

        <div class="container mt-4">
            <h3 class="mb-4 text-white">Riwayat Pesanan</h3>
            <?php if (empty($orders)): ?>
                <div class="container mt-4 d-flex justify-content-center align-items-center min-height-50vh">
                    <div class="text-center mb-5">
                        <img src="<?= base_url('assets/img/empty.png') ?>" alt="Empty Image" class="img-fluid mb-3">
                        <p class="text-white">Produk belum bisa ditampilkan,</p>
                        <p class="text-white">silakan isi nomor HP terlebih dahulu</p>
                    </div>
                </div>
            <?php else: ?>
                <div class="container-fluid mt-4 mb-5 text-white rounded p-4 bg-color-blur-black-5">
                    <div class="table-responsive">
                        <table class="table-hover text-white rounded bg-color-blur-white-3 w-100">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="px-3 py-2 text-center">Nama Pembeli</th>
                                    <th class="px-3 py-2 text-center">Nama Produk</th>
                                    <th class="px-3 py-2 text-center">Nominal Produk</th>
                                    <th class="px-3 py-2 text-center">Satuan Produk</th>
                                    <th class="px-3 py-2 text-center">Harga</th>
                                    <th class="px-3 py-2 text-center">Tanggal</th>
                                    <th class="px-3 py-2 text-center">Status</th>
                                    <th class="px-3 py-2 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td class="px-3 py-2 text-center">
                                            <?= $order->buyer_name ?>
                                        </td>
                                        <td class="px-3 py-2 text-center"><?= $order->game_name ?></td>
                                        <td class="px-3 py-2 text-center"><?= $order->topup_amount ?></td>
                                        <td class="px-3 py-2 text-center"><?= $order->satuan ?></td>
                                        <td class="px-3 py-2 text-center"><?= $order->price ?></td>
                                        <td class="px-3 py-2 text-center"><?= date('d-m-Y', strtotime($order->order_date)) ?></td>
                                        <td class="px-3 py-2 text-center" style="padding: 5px;">
                                            <span class="<?php
                                                            if ($order->status == 'success') {
                                                                echo 'bg-success text-white';
                                                            } elseif ($order->status == 'pending') {
                                                                echo 'bg-warning text-dark';
                                                            } elseif ($order->status == 'failed') {
                                                                echo 'bg-danger text-white';
                                                            }
                                                            ?>" style="border-radius: 10px; padding: 5px; display: inline-block;">
                                                <?= $order->status ?>
                                            </span>
                                        </td>
                                        <td class="px-3 py-2 text-center">
                                            <?php if ($order->status == 'success'): ?>
                                                <span class="bg-success text-white px-3 py-1 rounded d-inline-block">Selesai</span>
                                            <?php elseif ($order->status == 'pending'): ?>
                                                <button class="btn btn-primary px-3 py-1 rounded d-inline-block" onclick="sendCheckoutData('<?= $order->id ?>', '<?= $order->game_code ?>', '<?= $order->gameid ?>', '<?= $order->ponsel ?>', '<?= $order->buyer_name ?>', '<?= $order->price ?>', '<?= $order->satuan ?>')">Topup</button>
                                            <?php elseif ($order->status == 'failed'): ?>
                                                <span class="bg-danger text-white px-3 py-1 rounded d-inline-block">Batal</span>
                                            <?php endif; ?>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    function sendCheckoutData(id, gameCode, gameId, phone, buyerName, price, satuan) {
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '<?= base_url('Home/SelectPayment3') ?>/' + gameCode;

        var orderIdInput = document.createElement('input');
        orderIdInput.type = 'hidden';
        orderIdInput.name = 'order_id';
        orderIdInput.value = id;
        form.appendChild(orderIdInput);

        var gameIdInput = document.createElement('input');
        gameIdInput.type = 'hidden';
        gameIdInput.name = 'game_id';
        gameIdInput.value = gameId;
        form.appendChild(gameIdInput);

        var phoneInput = document.createElement('input');
        phoneInput.type = 'hidden';
        phoneInput.name = 'phone';
        phoneInput.value = phone;
        form.appendChild(phoneInput);

        var buyerNameInput = document.createElement('input');
        buyerNameInput.type = 'hidden';
        buyerNameInput.name = 'buyer_name';
        buyerNameInput.value = buyerName;
        form.appendChild(buyerNameInput);

        var priceInput = document.createElement('input');
        priceInput.type = 'hidden';
        priceInput.name = 'price';
        priceInput.value = price;
        form.appendChild(priceInput);

        var satuanInput = document.createElement('input');
        satuanInput.type = 'hidden';
        satuanInput.name = 'satuan';
        satuanInput.value = satuan;
        form.appendChild(satuanInput);

        document.body.appendChild(form);
        form.submit();
    }
</script>

