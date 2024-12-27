<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .status-container {
            margin-top: 50px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .status-message {
            font-size: 1.25rem;
            font-weight: 500;
        }

        .loading {
            font-size: 1.1rem;
            color: #888;
        }

        .alert-icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

        .status-alert-container {
            margin-top: 30px;
        }

        .additional-info {
            margin-top: 20px;
            font-size: 1.1rem;
            color: #555;
        }

        #top-bar {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }

        #top-bar .date-time {
            font-size: 1.1rem;
        }

        #top-bar .notification-icon {
            font-size: 3rem;
            cursor: pointer;
        }

        .btn-group .btn {
            margin: 5px;
        }

        @media (max-width: 768px) {
            .status-message {
                font-size: 1rem;
            }

            .alert-icon {
                font-size: 40px;
            }
        }

        /* Box shadow and card styles */
        .notification-box {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <!-- Top bar with Notification Icon -->
    <div id="top-bar" class="container">
        <div class="notification-icon">
            <i class="fas fa-bell"></i>
        </div>
    </div>

    <div class="container mt-5">
        <div class="status-container text-center notification-box">
            <h1 class="mb-4">Status Checkout</h1>
            <p id="status" class="status-message">
                <?= isset($transactionData['message']) ? $transactionData['message'] : 'Sedang memeriksa status topup Anda...' ?>
            </p>
            <p class="loading" id="loading-text" style="display: <?= isset($transactionData['status']) && $transactionData['status'] == 'Gagal' ? 'none' : 'block'; ?>">Harap tunggu...</p>

            <div class="btn-group mt-3">
                <?php if ($this->session->userdata('user_id')): ?>
                    <a href="<?= base_url('Home/track'); ?>" class="btn btn-primary">
                        <i class="fas fa-search"></i> Cek Transaksi
                    </a>
                <?php else: ?>
                    <a href="<?= base_url(); ?>" class="btn btn-secondary">
                        <i class="fas fa-home"></i> Kembali ke Beranda
                    </a>
                <?php endif; ?>
            </div>

            <!-- Form untuk melakukan refresh status -->
            <form method="get" action="<?= base_url('Home/status_checkout'); ?>" id="statusForm" class="mt-3">
                <input type="hidden" name="ref_id" value="<?= isset($transactionData['ref_id']) ? $transactionData['ref_id'] : '' ?>">
                <input type="hidden" name="game_code" value="<?= isset($transactionData['game_code']) ? $transactionData['game_code'] : '' ?>">
                <input type="hidden" name="gameId" value="<?= isset($transactionData['gameId']) ? $transactionData['gameId'] : '' ?>">
                <button type="submit" class="btn btn-info">
                    <i class="fas fa-sync-alt"></i> Segarkan Status
                </button>
            </form>

            <div class="status-alert-container mt-4">
                <?php if (isset($transactionData)): ?>
                    <?php
                    $status = $transactionData['status'] ?? 'unknown';
                    $message = $transactionData['message'] ?? 'Tidak ada pesan';
                    $statusClass = '';
                    $icon = '';
                    if ($status === 'Sukses') {
                        $statusClass = 'alert-success';
                        $icon = '<i class="fas fa-check-circle text-success alert-icon"></i>';
                    } elseif ($status === 'Pending') {
                        $statusClass = 'alert-info';
                        $icon = '<i class="fas fa-hourglass text-info alert-icon"></i>';
                    } else {
                        $statusClass = 'alert-danger';
                        $icon = '<i class="fas fa-times-circle text-danger alert-icon"></i>';
                    }
                    ?>
                    <div class="alert <?= $statusClass ?> p-4">
                        <?= $icon ?>
                        <h4><?= $message ?></h4>
                        <p>Referensi ID: <?= $transactionData['ref_id'] ?></p>
                        <p>Nomor Pembeli: <?= $transactionData['customer_no'] ?></p>
                        <p>Status: <?= $transactionData['status'] ?></p>
                        <p id="status-date-time">Tanggal: <span id="current-status-time"></span></p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Additional Information -->
            <div class="additional-info mt-4">
                <p><strong>Catatan:</strong> Jika status topup Anda tetap "Pending" dalam waktu yang lama ataupun "Gagal", harap ambil tangkapan layar dari halaman ini dan hubungi kami melalui live chat di beranda. Tetap di halaman ini sampai transaksi Anda ditandai sebagai berhasil, kemudian klik tombol "Segarkan Status" untuk memperbarui status Anda.</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <script>
        function updateTime() {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const day = now.getDate().toString().padStart(2, '0');
            const month = (now.getMonth() + 1).toString().padStart(2, '0');
            const year = now.getFullYear();
            const timeString = `${hours}:${minutes}`;
            const dateString = `${day}/${month}/${year}`;
            document.getElementById('current-status-time').innerText = `${dateString} ${timeString}`;
        }

        setInterval(updateTime, 1000); // Update every second
    </script>
</body>

</html>
