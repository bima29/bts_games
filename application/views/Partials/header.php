<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTS STORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

    <style>
        .header-top {
            background: rgba(0, 0, 0, 0.9);
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            color: rgb(255, 255, 255);
        }
    </style>
</head>

<body>
    <div class="container-fluid d-none d-md-flex sticky-top header-top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center topbar">
                <div class="top-link">
                    <img src="<?= base_url('assets/img/logoBTS.png') ?>" alt="Logo" class="img-fluid" style="width: 100%; max-width: 150px;">
                </div>
                <div class="top-info d-flex">

                    <div class="search-container">
                        <div class="search-form rounded-pill me-3" id="searchForm">
                            <input type="text" class="text-white" placeholder="Type to search...">
                        </div>
                    </div>
                    <div class="componen-header-icon-bg rounded" id="searchIcon">
                        <small class="me-3 text-white-50">
                            <i class="fa-solid fa-magnifying-glass fa-lg search-icon" style="color: white;"></i>
                        </small>
                    </div>
                    <div class="componen-header-icon-bg rounded">
                        <small class="me-3 text-white-50">
                            <a href="<?= base_url('home/login'); ?>" class="text-center">
                                <i class="fa-solid fa-right-to-bracket fa-lg" style="color: white;"></i>
                            </a>
                        </small>
                    </div>
                    <a class="text-decoration-none text-white" href="<?= base_url('auth'); ?>">Masuk/Daftar</a>
                </div>
            </div>
        </div>
    </div>
