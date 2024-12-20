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

        .img-fluid-c {
            width: 100%;
            max-width: 150px;
        }

        .i-color-c-white {
            color: white;
        }
    </style>
</head>

<body>
    <div class="container-fluid d-none d-md-flex sticky-top header-top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center topbar">
                <div class="top-link d-flex justify-content-center align-items-center">
                    <img src="<?= base_url('assets/img/logoBTS.png') ?>" alt="Logo" class="img-fluid img-fluid-c">
                    <i>
                        <h4 class="top-link">BTS STORE<span class="text-secondary"> INDONESIA</span></h4>
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
                        <!-- Show login link when not logged in -->
                        <a class="text-decoration-none text-white" href="<?= base_url('auth'); ?>">Masuk/Daftar</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <style>
        .profile-img:hover {
            opacity: 0.8;
            cursor: pointer;
        }
    </style>