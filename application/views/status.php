<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Checkout</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
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
            "testing": false, // Set to true for testing environment
            "sign": sign
        };

        var xhr = new XMLHttpRequest();
        xhr.open("POST", endpoint, true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = JSON.parse(xhr.responseText);
                if (result.data && result.data.status) {
                    if (result.data.status === 'sukses') {
                        document.getElementById("status").classList.add("status-success");
                        document.getElementById("status").innerText = "Topup request is successful";
                        setTimeout(function() {
                            window.location.href = "home/track"; // Redirect to home/track after 5 seconds
                        }, 5000);
                    } else {
                        document.getElementById("status").classList.add("status-error");
                        document.getElementById("status").innerText = "Topup request failed. Retrying...";
                        setTimeout(checkStatus, 10000); // Retry after 10 seconds if status is still pending
                    }
                } else {
                    document.getElementById("status").classList.add("status-error");
                    document.getElementById("status").innerText = "Error: Unexpected response structure or missing status";
                }
            }
        };
        xhr.send(JSON.stringify(data));
    }

    window.onload = function() {
        checkStatus();
    }
</script>

</body>
</html>
