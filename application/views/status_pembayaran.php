<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pembayaran</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" type="module"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Arial', sans-serif;
        }

        .status-container {
            max-width: 700px;
            margin: 0 auto;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        h3 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 25px;
        }

        .alert h4 {
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        .alert {
            border-radius: 12px;
            text-align: center;
            padding: 30px;
        }

        .alert-info {
            background-color: #e9f7fd;
            color: #0177b6;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #e02f44;
        }

        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
        }

        .btn {
            font-size: 1.1rem;
            padding: 12px 30px;
            border-radius: 50px;
            width: 100%;
            max-width: 350px;
            margin: 15px auto;
            display: block;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated.fadeInUp {
            animation: fadeInUp 0.7s ease-in-out;
        }

        .animated.fadeIn {
            animation: fadeIn 1s ease-in-out;
        }

        @media (max-width: 576px) {
            .status-container {
                padding: 20px;
            }

            h3 {
                font-size: 2rem;
            }

            .alert h4 {
                font-size: 1.4rem;
            }

            .btn {
                font-size: 1rem;
                padding: 10px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="status-container text-center">
            <h3 class="mb-4">Status Pembayaran</h3>

            <?php if ($status === 'pending'): ?>
                <div class="alert alert-info p-4 animated fadeIn">
                    <ion-icon name="hourglass" class="mb-3 text-info" style="font-size: 50px;"></ion-icon>
                    <h4>Pembayaran Anda sedang diproses. Harap tunggu konfirmasi.</h4>
                    <p>Kami sedang memproses pembayaran Anda. Silakan cek kembali nanti untuk pembaruan.</p>
                </div>
            <?php elseif ($status === 'gagal'): ?>
                <div class="alert alert-danger p-4 animated fadeIn">
                    <ion-icon name="close-circle" class="mb-3 text-danger" style="font-size: 50px;"></ion-icon>
                    <h4>Pembayaran Anda gagal. Silakan coba lagi.</h4>
                    <p>Terjadi masalah dengan pembayaran Anda. Harap coba transaksi kembali.</p>
                </div>
            <?php elseif ($status === 'sukses'): ?>
                <div class="alert alert-success p-4 animated fadeIn">
                    <ion-icon name="checkmark-circle" class="mb-3 text-success" style="font-size: 50px;"></ion-icon>
                    <h4>Pembayaran Anda berhasil.</h4>
                    <p>Terima kasih! Pembayaran Anda telah diproses dengan sukses.</p>
                </div>
            <?php else: ?>
                <div class="alert alert-warning p-4 animated fadeIn">
                    <ion-icon name="alert-circle" class="mb-3 text-warning" style="font-size: 50px;"></ion-icon>
                    <h4>Status tidak valid. Harap coba lagi nanti.</h4>
                    <p>Jika masalah berlanjut, silakan hubungi dukungan.</p>
                </div>
            <?php endif; ?>

            <div class="mt-4">
                <?php if ($this->session->userdata('user_id')): ?>
                    <p class="text-success"><strong>Status:</strong> Sudah masuk</p>
                    <a href="<?= base_url('home/track'); ?>" class="btn btn-primary mt-3 animated fadeInUp">
                        <i class="fas fa-history"></i> Cek Riwayat Pembelian
                    </a>
                <?php else: ?>
                    <p class="text-danger"><strong>Status:</strong> Belum masuk</p>
                <?php endif; ?>
            </div>

            <?php if ($status === 'gagal' && !$this->session->userdata('user_id')): ?>
                <a href="<?= base_url('auth'); ?>" class="btn btn-primary mt-3 animated fadeInUp">
                    <i class="fas fa-sign-in-alt"></i> Masuk untuk Coba Pembayaran Lagi
                </a>
            <?php elseif ($status === 'gagal'): ?>
                <a href="<?= base_url('home/checkout'); ?>" class="btn btn-warning mt-3 animated fadeInUp">
                    <i class="fas fa-redo-alt"></i> Coba Pembayaran Lagi
                </a>
            <?php endif; ?>

            <a href="<?= base_url(); ?>" class="btn btn-secondary mt-3 animated fadeInUp">
                <i class="fas fa-home"></i> Kembali ke Beranda
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js" integrity="sha384-KJ2OYZ3PnH0PRrZT3rsVqLB1Fz3OOG2KpsgVGeYuFsoHnREw8/pAtfVlgib5V7p9" crossorigin="anonymous"></script>

</body>

</html>
