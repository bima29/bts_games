<link rel="stylesheet" href="<?= base_url('assets/css/content1.css') ?>">
<div class="container-fluid vh-100 d-flex justify-content-center align-items-center bg-color-blur-white-4">
    <div class="checkout-container position-relative">
        <a href="javascript:history.back()" class="position-absolute top-0 start-0 m-3">
            <i class="fa-solid fa-arrow-left fs-4 text-dark"></i>
        </a>

        <div class="game-info mb-4">
            <img src="<?= base_url('assets/game_images/' . $game->image); ?>" alt="<?= $game->game_name; ?>" class="img-fluid">
            <h4 class="mt-3"><?= $game->game_name; ?></h4>
            <p><?= $game->description; ?></p>
            <hr>
        </div>

        <form method="post" action="<?= base_url('Home/SavePayment'); ?>" class="mb-4">
            <div class="mb-3">
                <label for="game_code" class="form-label">Game Code</label>
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
                <label for="game_id" class="form-label">Game ID</label>
                <input type="text" class="form-control" id="game_id" name="game_id" required style="text-align: center;">
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


            <h4 class="mt-3">Nominal: Rp. <?= number_format($price->price); ?></h4>
            <p><?= $price->nominal . ' ' . $price->unit; ?></p>

            <input type="hidden" name="game_name" value="<?= $price->product_name; ?>">
            <input type="hidden" name="topup_amount" value="<?= $price->nominal . ' ' . $price->unit; ?>">
            <input type="hidden" name="price" value="<?= $price->price; ?>">
            <input type="hidden" id="snap_token" name="snap_token" value="<?= $snap_token; ?>">
            <input type="hidden" class="form-control" id="status" name="status" value="Sukses" readonly style="text-align: center;">


            <button type="button" id="pay-button" class="btn btn-primary mt-4" disabled>Bayar Sekarang</button>
        </form>

        <script type="text/javascript">
            function togglePayButton() {
                var gameId = document.getElementById('game_id').value;
                var payButton = document.getElementById('pay-button');

                payButton.disabled = !gameId;
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

                var buyerNameInput = document.createElement('input');
                buyerNameInput.type = 'hidden';
                buyerNameInput.name = 'phone';
                buyerNameInput.value = document.querySelector('[name="phone"]').value;
                form.appendChild(buyerNameInput);

                var snapTokenInput = document.createElement('input');
                snapTokenInput.type = 'hidden';
                snapTokenInput.name = 'snap_token';
                snapTokenInput.value = document.querySelector('[name="snap_token"]').value;
                form.appendChild(snapTokenInput);

                document.body.appendChild(form);
                form.submit();
            }
        </script>

        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="YOUR_CLIENT_KEY"></script>

    </div>
</div>