<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-Mb-zeSXdlNJ6hKQJ"></script>
</head>
<body>
    <h2>Pembayaran sebesar Rp 100.000</h2>
    <button id="pay-button">Bayar Sekarang</button>

    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            snap.pay('<?php echo $snap_token; ?>', {
                onSuccess: function(result) {
                    alert("Pembayaran berhasil!");
                    console.log(result);
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
        }
    </script>
</body>
</html>
