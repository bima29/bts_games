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

        <form method="post" action="<?= base_url('Home/ProceedToPayment'); ?>" class="mb-4">
            <div class="mb-3">
                <label for="game_id" class="form-label">Game Code</label>
                <input type="text" class="form-control" id="game_code" name="game_code" value="<?= $game->game_code; ?>" readonly style="text-align: center;">
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Masukkan User ID Anda" required style="text-align: center;">
            </div>

            <h4 class="mt-3">Nominal: Rp. <?= number_format($price->price); ?></h4>
            <p><?= $price->nominal . ' ' . $price->unit; ?></p>

            <!-- Hidden input for snap_token -->
            <input type="hidden" id="snap_token" name="snap_token" value="<?= $snap_token; ?>">

            <!-- Payment button (initially disabled) -->
            <button type="button" id="pay-button" class="btn btn-primary mt-4" disabled>Bayar Sekarang</button>
        </form>

        <script type="text/javascript">
            // Function to check if user_id is filled
            function togglePayButton() {
                var userId = document.getElementById('user_id').value;
                var payButton = document.getElementById('pay-button');

                // Enable button if user_id is filled, otherwise disable it
                payButton.disabled = !userId;
            }

            // Attach input event listener to the user_id field
            document.getElementById('user_id').addEventListener('input', togglePayButton);

            // Trigger Midtrans Snap payment modal on button click
            document.getElementById('pay-button').onclick = function() {
                var snapToken = document.getElementById('snap_token').value;

                snap.pay(snapToken, {
                    onSuccess: function(result) {
                        alert("Pembayaran berhasil!");
                        console.log(result);

                        // Redirect to success page or trigger callback
                        window.location.href = "<?= base_url('payment/callback'); ?>";
                    },
                    onPending: function(result) {
                        alert("Pembayaran tertunda!");
                        console.log(result);
                    },
                    onError: function(result) {
                        alert("Pembayaran gagal!");
                        console.log(result);
                    }
                });
            };
        </script>

        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="YOUR_CLIENT_KEY"></script>



    </div>
</div>