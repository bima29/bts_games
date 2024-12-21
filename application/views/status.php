<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Checkout</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/js-md5@2.3.0/build/md5.min.js"></script> <!-- Include MD5 library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .container {
            text-align: center;
            padding: 30px;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .status-message {
            font-size: 18px;
            color: #888;
            margin-bottom: 20px;
        }

        .status-success {
            color: #28a745;
            font-size: 20px;
            font-weight: 500;
        }

        .status-error {
            color: #dc3545;
            font-size: 20px;
            font-weight: 500;
        }

        .loading {
            font-size: 18px;
            color: #6c757d;
            margin-top: 10px;
        }

        .redirect-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .redirect-button:hover {
            background-color: #0056b3;
        }

        .refresh-button {
            margin-top: 30px; /* Increased margin to provide more spacing */
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .refresh-button:hover {
            background-color: #218838;
        }

        .refresh-info {
            margin-top: 15px; /* Adjusted margin */
            font-size: 14px;
            color: #6c757d;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
                width: 90%;
            }

            h1 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Status Checkout</h1>
        <p id="status" class="status-message">Checking your topup status...</p>
        <p class="loading" id="loading-text">Please wait...</p>

        <?php if ($this->session->userdata('user_id')): ?>
            <a href="<?= base_url('home/track') ?>" class="redirect-button">Go to Order Tracking</a>
        <?php else: ?>
            <a href="<?= base_url() ?>" class="redirect-button">Back to Home</a>
        <?php endif; ?>

        <a href="javascript:void(0);" class="refresh-button" onclick="checkStatus()">Refresh Status</a>
        <p class="refresh-info">Click to refresh and check the latest status of your topup request.</p>
    </div>

    <script>
        function checkStatus() {
            var ref_id = '<?= $ref_id ?>';
            var username = 'siyonaop5jdD';
            var dev_key = 'dev-089c5890-bc7f-11ef-89b8-ab41d3b11203';
            var endpoint = 'https://api.digiflazz.com/v1/transaction';

            var sign = md5(username + dev_key + ref_id);

            var data = {
                "username": username,
                "buyer_sku_code": '<?= $game_code ?>',
                "customer_no": '<?= $gameId ?>',
                "ref_id": ref_id,
                "testing": true,
                "sign": sign
            };

            $.ajax({
                url: endpoint,
                method: "POST",
                contentType: "application/json",
                data: JSON.stringify(data),
                success: function(response) {
                    var statusElement = $("#status");
                    var loadingTextElement = $("#loading-text");
                    if (response.data && response.data.status) {
                        if (response.data.status === 'sukses') {
                            statusElement.addClass("status-success").text("Topup request is successful");
                        } else if (response.data.status === 'pending') {
                            statusElement.addClass("status-error").text("Topup request is pending");
                        } else {
                            statusElement.addClass("status-error").text("Topup request failed. Retrying...");
                        }
                    } else {
                        statusElement.addClass("status-error").text("Error: Unexpected response structure or missing status");
                    }
                    loadingTextElement.hide();
                },
                error: function() {
                    $("#status").addClass("status-error").text("An error occurred while processing your request.");
                    $("#loading-text").hide();
                }
            });
        }

        $(document).ready(function() {
            setTimeout(checkStatus, 2000);
        });
    </script>

</body>

</html>
