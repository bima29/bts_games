<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Halaman untuk memilih metode pembayaran dengan berbagai opsi seperti Virtual Account, QRIS, dan Gopay.">
    <meta name="author" content="Your Name">
    <title>Pilih Metode Pembayaran</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        .payment-card {
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .payment-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <div class="container-fluid d-flex justify-content-center align-items-center bg-light mt-5 mb-5">
        <div class="checkout-container w-100 px-3" style="max-width: 600px;">
            <!-- Back Icon -->
            <a href="javascript:history.back()" class="m-3 text-dark d-flex align-items-center">
                <i class="fa fa-arrow-left fs-4 mr-2"></i>
                <span>Kembali</span>
            </a>

            <h2 class="text-center mt-4 mb-4 font-weight-bold">Pilih Metode Pembayaran</h2>

            <div class="payment-method-wrapper">
                <div class="row no-gutters">
                    <!-- Virtual Account -->
                    <div class="col-12 col-md-4 px-2 mb-3">
                        <a href="<?= base_url('Home/Checkout4/' . $price_id . '/' . ($price->price * 0.005) . '?order_id=' . $order_id . '&game_id=' . $game_id . '&phone=' . $phone . '&buyer_name=' . urlencode($buyer_name) . '&price=' . $price->price . '&satuan=' . $satuan); ?>" class="text-decoration-none">
                            <div class="payment-card p-3 border rounded d-flex flex-column align-items-center text-center bg-white shadow-sm h-100">
                                <i class="fa fa-university fa-2x text-primary mb-3"></i>
                                <span class="payment-name font-weight-bold">Virtual Account</span>
                                <span class="payment-fee text-muted">Biaya layanan: Rp. 4,500</span>
                            </div>
                        </a>
                    </div>
                    <!-- QRIS -->
                    <div class="col-12 col-md-4 px-2 mb-3">
                        <a href="<?= base_url('Home/Checkout4/' . $price_id . '/' . ($price->price * 0.005) . '?order_id=' . $order_id . '&game_id=' . $game_id . '&phone=' . $phone . '&buyer_name=' . urlencode($buyer_name) . '&price=' . $price->price . '&satuan=' . $satuan); ?>" class="text-decoration-none">
                            <div class="payment-card p-3 border rounded d-flex flex-column align-items-center text-center bg-white shadow-sm h-100">
                                <i class="fa fa-qrcode fa-2x text-success mb-3"></i>
                                <span class="payment-name font-weight-bold">QRIS</span>
                                <span class="payment-fee text-muted">Biaya layanan: <?= 'Rp. ' . number_format($price->price * 0.005, 0, ',', '.'); ?></span>
                            </div>
                        </a>
                    </div>
                    <!-- Gopay -->
                    <div class="col-12 col-md-4 px-2 mb-3">
                        <a href="<?= base_url('Home/Checkout4/' . $price_id . '/' . ($price->price * 0.025) . '?order_id=' . $order_id . '&game_id=' . $game_id . '&phone=' . $phone . '&buyer_name=' . urlencode($buyer_name) . '&price=' . $price->price . '&satuan=' . $satuan); ?>" class="text-decoration-none">
                            <div class="payment-card p-3 border rounded d-flex flex-column align-items-center text-center bg-white shadow-sm h-100">
                                <i class="fa fa-wallet fa-2x text-info mb-3"></i>
                                <span class="payment-name font-weight-bold">Gopay</span>
                                <span class="payment-fee text-muted">Biaya layanan: <?= 'Rp. ' . number_format($price->price * 0.025, 0, ',', '.'); ?></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>