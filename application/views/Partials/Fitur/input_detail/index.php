<link rel="stylesheet" href="<?= base_url('assets/css/content2.css') ?>">

<div class="container-fluid d-none d-md-flex sticky-top header-top">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center topbar">
            <div class="top-link d-flex align-items-center">
                <img src="<?= base_url('assets/img/logo-2.jpg') ?>" alt="Logo" class="img-fluid img-fluid-header py-2 px-2">
                <i>
                    <h4 class="top-link mt-2 ms-3">BTS STORE<span class="text-secondary mt-2"> INDONESIA</span></h4>
                </i>
            </div>
            <div class="top-info d-flex align-items-center">
                <?php if ($this->session->userdata('user_id')): ?>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white" id="profileMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= base_url('assets/universal/img/' . $this->session->userdata('profile_picture')) ?>" alt="Profile" class="rounded-circle border border-white profile-img" width="40" height="40" style="object-fit: cover;">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="profileMenu">
                            <?php if ($this->session->userdata('user_id') == 1 || $this->session->userdata('user_id') == 2): ?>
                                <li><a class="dropdown-item" href="<?= base_url('admin'); ?>">Dashboard</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="<?= base_url('admin/profile'); ?>">My Profile</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('home/logout'); ?>">Log Out</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a class="text-decoration-none text-white" href="<?= base_url('auth'); ?>">Masuk/Daftar</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid d-flex justify-content-center align-items-center bg-color-blur-white-4 mt-5 mb-5">
    <div class="checkout-container">
        <a href="javascript:history.back()" class="position-absolute top-0 start-0 m-3">
            <i class="fa-solid fa-arrow-left fs-4 text-dark"></i>
        </a>


        <?php if (!empty($game->game_name) && !empty($game->image) && file_exists('assets/game_images/' . $game->image)): ?>
            <div class="game-info mb-4">
                <img src="<?= base_url('assets/game_images/' . $game->image); ?>" alt="<?= $game->game_name; ?>" class="img-fluid">
                <h4 class="mt-3"><?= $game->game_name; ?></h4>
                <p><?= $game->description; ?></p>
                <hr>
            </div>
        <?php endif; ?>
        <div class="game-info mb-4 text-center">
            <div class="alert alert-info" role="alert">
                <i class="fas fa-info-circle"></i> <strong>Penting!</strong> Lihat <a href="#additional-info" class="alert-link">Cara Top Up</a> di bagian bawah untuk instruksi lebih lanjut.
            </div>
        </div>

        <form method="post" action="<?= base_url('Home/SavePayment'); ?>" class="mb-4">
            <div class="mb-3">
                <label for="game_code" class="form-label">Item Code</label>
                <input type="text" class="form-control" id="game_code" name="game_code" value="<?= $price->product_code; ?>" readonly style="text-align: center;">
            </div>
            <?php if ($this->session->userdata('phone')): ?>
                <div type="hidden" class="mb-3">
                    <label for="user_id" class="form-label">User ID</label>
                    <input type="text" class="form-control" id="user_id" name="user_id" value="<?= $this->session->userdata('user_id'); ?>" readonly style="text-align: center;">
                </div>
            <?php else: ?>
                <div class="mb-3">
                    <label for="user_id" class="form-label">User ID</label>
                    <input type="text" class="form-control" id="user_id" name="user_id" value="100" readonly style="text-align: center;">
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="game_id" class="form-label">Game ID / No Hp (jika melakukan pembelian pulsa, gunakan 0 diawal tidak pakai 62)</label>
                <input type="text" class="form-control" id="game_id" name="game_id"
                    placeholder="<?= isset($order->gameid) && $order->gameid ? '' : 'Masukkan Game ID atau Nomor HP ( contoh. 0812345678 )'; ?>"
                    required style="text-align: center;"
                    value="<?= isset($order->gameid) ? $order->gameid : ''; ?>">
            </div>



            <div class="mb-3">
                <label for="game_id" class="form-label">Nomor Hp</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php if ($this->session->userdata('user_id')) {
                                                                                            echo $this->session->userdata('phone');
                                                                                        } ?>" required style="text-align: center;">
            </div>
            <div class="mb-3">
                <label for="game_id" class="form-label">Nama Pembeli</label>
                <input type="text" class="form-control" id="buyer_name" name="buyer_name" value="<?php if ($this->session->userdata('user_id')) {
                                                                                                        echo $user->full_name;
                                                                                                    } ?>" required style="text-align: center;">
            </div>


            <div class="card shadow-sm p-4 mb-4 bg-white rounded">
                <h4 class="font-weight-bold text-center text-primary"><?= $price->product_name; ?></h4>
                <div class="mt-3">
                    <p class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Biaya Item:</span>
                        <span class="font-weight-bold">Rp. <?= number_format($price->price, 0, ',', '.'); ?></span>
                    </p>
                    <p class="d-flex justify-content-between align-items-center flex-wrap">
                        <span class="text-muted">Biaya Layanan 
                            <small class="text-muted">
                                <?php
                                if ($fee == ($price->price * 0.005)) {
                                    echo "(QRIS)";
                                } elseif ($fee == 4500) {
                                    echo "(Virtual Account)";
                                } elseif ($fee == ($price->price * 0.025)) {
                                    echo "(Gopay)";
                                }
                                ?>
                            </small> :
                        </span>
                        <span class="font-weight-bold">Rp. <?= number_format($fee, 0, ',', '.'); ?></span>
                    </p>
                    <hr>
                    <h5 class="d-flex justify-content-between align-items-center text-success">
                        <span>Total:</span>
                        <span class="font-weight-bold">Rp. <?= number_format($price->price + $fee, 0, ',', '.'); ?></span>
                    </h5>
                </div>
                <div class="text-center mt-3">
                    <h5 class="text-muted"><?= $price->nominal . ' ' . $price->unit; ?></h5>
                </div>
            </div>
                <style>
                    @media (max-width: 576px) {
                        .d-flex {
                            flex-wrap: wrap; /* Allow the flex items to wrap on mobile */
                        }
                        .d-flex span {
                            white-space: normal; /* Allow text to wrap normally */
                        }
                        .font-weight-bold {
                            font-size: 14px; /* Adjust font size if necessary */
                        }
                        small.text-muted {
                            font-size: 12px; /* Adjust font size of small text if needed */
                        }
                    }
                </style>

            <input type="hidden" name="game_name" value="<?= $price->product_name; ?>">
            <input type="hidden" name="satuan" value="<?= $price->unit; ?>">
            <input type="hidden" name="topup_amount" value="<?= $price->nominal . ' ' . $price->unit; ?>">
            <input type="hidden" name="price" id="price" value="<?= $price->price + $fee; ?>">
            <input type="hidden" id="snap_token" name="snap_token" value="<?= $snap_token; ?>">
            <input type="hidden" class="form-control" id="status" name="status" value="success" readonly style="text-align: center;">


            <button type="button" id="pay-button" class="btn btn-primary mt-4" disabled>Bayar Sekarang</button>
        </form>
        <div id="additional-info" class="mt-4 px-3 py-4 border rounded shadow-sm bg-light" style="max-height: 300px; overflow-y: auto;">
            <h5 class="mb-3">Instruksi Topup</h5>
            <p id="game-specific-instructions" class="lead text-muted text-start">
            <ol class="list-unstyled text-start">
                <li><strong>MLBB (Mobile Legends Bang Bang):</strong> Masukkan Game ID dengan format UserIDServerID jadi satu (Contoh: 1234501).</li>
                <li><strong>Pulsa / Paket Data:</strong> Masukkan nomor HP yang sesuai dengan yang akan di topup.</li>
                <li><strong>Free Fire:</strong> Masukkan Game ID (ID Free Fire) yang valid.</li>
                <li><strong>PUBG Mobile:</strong> Masukkan Game ID sesuai dengan ID PUBG Anda (Contoh: 123456789).</li>
                <li><strong>Call of Duty Mobile:</strong> Masukkan Game ID sesuai dengan ID Call of Duty Anda (Contoh: COD12345678).</li>
                <li><strong>Arena of Valor (AoV):</strong> Masukkan Game ID dengan format PlayerID+ServerID (Contoh: 987654+ID).</li>
                <li><strong>Free Fire Max:</strong> Masukkan Game ID sesuai dengan ID Free Fire Max Anda (Contoh: 123456789).</li>
                <li><strong>Knives Out:</strong> Masukkan Game ID sesuai dengan ID Knives Out Anda (Contoh: KNO98765432).</li>
                <li><strong>Ragnarok Mobile:</strong> Masukkan Game ID dengan format Player ID (Contoh: 12345).</li>
                <li><strong>Lineage 2: Revolution:</strong> Masukkan Game ID sesuai ID Lineage 2 Anda (Contoh: L2R123456).</li>
                <li><strong>FIFA Mobile:</strong> Masukkan Game ID sesuai dengan ID FIFA Mobile Anda (Contoh: FIFA987654).</li>
                <li><strong>Black Desert Mobile:</strong> Masukkan Game ID sesuai dengan ID Black Desert Anda (Contoh: BD123456).</li>
                <li><strong>King of Glory:</strong> Masukkan Game ID dengan format PlayerID+ServerID (Contoh: 987654+01).</li>
                <li><strong>Shadow Fight 3:</strong> Masukkan Game ID sesuai dengan ID Shadow Fight Anda (Contoh: SF12345).</li>
                <li><strong>Dragon Nest Mobile:</strong> Masukkan Game ID dengan format ID Dragon Nest (Contoh: DN12345).</li>
            </ol>
            </p>
        </div>





        <script type="text/javascript">
            function togglePayButton() {
                var gameId = document.getElementById('game_id').value;
                var payButton = document.getElementById('pay-button');

                payButton.disabled = !gameId;
            }


            window.onload = function() {
                togglePayButton();
            }



            document.getElementById('game_id').addEventListener('input', togglePayButton);

            document.getElementById('pay-button').onclick = function() {
                var snapToken = document.getElementById('snap_token').value;

                snap.pay(snapToken, {
                    onSuccess: function(result) {
                        submitForm('success');
                    },
                    onPending: function(result) {
                        submitForm('pending');
                    },
                    onError: function(result) {
                        submitForm('failed');
                    }
                });
            };

            function submitForm(status) {
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = '<?= base_url('Home/SavePayment'); ?>';

                var statusInput = document.createElement('input');
                statusInput.type = 'hidden';
                statusInput.name = 'status';
                statusInput.value = status;
                form.appendChild(statusInput);

                var gameCodeInput = document.createElement('input');
                gameCodeInput.type = 'hidden';
                gameCodeInput.name = 'game_code';
                gameCodeInput.value = document.getElementById('game_code').value;
                form.appendChild(gameCodeInput);

                var userIdInput = document.createElement('input');
                userIdInput.type = 'hidden';
                userIdInput.name = 'user_id';
                userIdInput.value = document.getElementById('user_id').value;
                form.appendChild(userIdInput);

                var gameIdInput = document.createElement('input');
                gameIdInput.type = 'hidden';
                gameIdInput.name = 'game_id';
                gameIdInput.value = document.getElementById('game_id').value;
                form.appendChild(gameIdInput);

                var gameNameInput = document.createElement('input');
                gameNameInput.type = 'hidden';
                gameNameInput.name = 'game_name';
                gameNameInput.value = document.querySelector('[name="game_name"]').value;
                form.appendChild(gameNameInput);

                var topupAmountInput = document.createElement('input');
                topupAmountInput.type = 'hidden';
                topupAmountInput.name = 'topup_amount';
                topupAmountInput.value = document.querySelector('[name="topup_amount"]').value;
                form.appendChild(topupAmountInput);

                var priceInput = document.createElement('input');
                priceInput.type = 'hidden';
                priceInput.name = 'price';
                priceInput.value = document.querySelector('[name="price"]').value;
                form.appendChild(priceInput);

                var buyerNameInput = document.createElement('input');
                buyerNameInput.type = 'hidden';
                buyerNameInput.name = 'buyer_name';
                buyerNameInput.value = document.querySelector('[name="buyer_name"]').value;
                form.appendChild(buyerNameInput);

                var satuanInput = document.createElement('input');
                satuanInput.type = 'hidden';
                satuanInput.name = 'satuan';
                satuanInput.value = document.querySelector('[name="satuan"]').value;
                form.appendChild(satuanInput);

                var phoneInput = document.createElement('input');
                phoneInput.type = 'hidden';
                phoneInput.name = 'phone';
                phoneInput.value = document.querySelector('[name="phone"]').value;
                form.appendChild(phoneInput);

                var snapTokenInput = document.createElement('input');
                snapTokenInput.type = 'hidden';
                snapTokenInput.name = 'snap_token';
                snapTokenInput.value = document.querySelector('[name="snap_token"]').value;
                form.appendChild(snapTokenInput);

                document.body.appendChild(form);
                form.submit();
            }
        </script>

        <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="YOUR_CLIENT_KEY"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    </div>
</div>