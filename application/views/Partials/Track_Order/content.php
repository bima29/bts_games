<?php
$title = 'All Game||BTS Store';
?>
<div class="container-fluid" style="background-image:url('https://images.alphacoders.com/116/1163842.jpg');
background-size: cover;
background-position: center;
background-repeat: no-repeat;
background-attachment: fixed;
overflow: auto;
height: 100%;
">
    <div class="container mt-5 rounded" style="background-color: rgba(0, 0, 0, 0.4);">
        <div class="container d-flex align-items-center shadow p-5 rounded">
            <div class="bg-white rounded-pill shadow p-3 d-inline-block">
                <img src="<?= base_url('assets/img/location.png') ?>" alt="Location Icon" class="img-fluid" style="max-width: 70px; max-height: 70px; object-fit: cover;">
            </div>

            <div class="ms-5">
            <p class="mb-0 responsive-p">btsstoreindonesia.com</p>
            <h1 class="mt-2 text-white">Lacak Pesanan</h1>
            </div>
        </div>

        <div class="mt-5 d-flex justify-content-center align-items-center">
            <div class="container border border-light rounded p-5 w-100" style="background-color: rgba(0, 0, 0, 0.5);">
                <form class="d-flex w-100">
                    <div class="input-group w-100">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-magnifying-glass" style="color: gray; font-size: 1.5rem;"></i>
                        </span>
                        <input class="form-control text-white" style="background-color: rgba(0, 0, 0, 0.7);" type="text" placeholder="Masukkan Nomor Telepon atau Nomor Invoice" aria-label="Order Number" style="font-size: 1.2rem; padding: 0.75rem; border-right: none;">
                        <button class="btn btn-outline-success ms-0" type="submit" style="font-size: 1.2rem; padding: 0.75rem 1.5rem;">Cari</button>
                    </div>
                </form>
                <p class="text-white">Pesanan kamu tidak terdaftar meskipun kamu yakin sudah memesan? Harap tunggu 1-2 jam, namun jika pesanan masih tidak muncul maka kamu dapat menghubungi kami via <a class="text-decoration-none text-primary"><b>Whatsapp</b></a></p>
            </div>
        </div>
        <div class="container mt-4">
            <h3 class="mb-4 text-white">Riwayat Pesanan</h3>
            <div class="container mt-4 d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                <div class="text-center mb-5">
                    <img src="<?= base_url('assets/img/empty.png') ?>" alt="Empty Image" class="img-fluid mb-3">
                    <p class="text-white">Produk belum bisa ditampilkan,</p>
                    <p class="text-white">silakan isi nomor HP terlebih dahulu</p>
                </div>
            </div>
        </div>
        <style>
            .table {
                border-radius: 30px;
                overflow: hidden;
                width: 100%;
            }

            .table thead {
                border-top-left-radius: 30px;
                border-top-right-radius: 30px;
            }

            .table tbody tr:last-child td {
                border-bottom-left-radius: 30px;
                border-bottom-right-radius: 30px;
            }

            .table td,
            .table th {
                vertical-align: middle;
                padding: 20px;
                border: none;
                word-wrap: break-word;
                text-align: center;
            }

            .table-hover tbody tr:hover {
                background-color: rgba(255, 255, 255, 0.1);
            }

            .table td img {
                width: 50px;
                height: auto;
                border-radius: 8px;
            }

            .btn {
                padding: 10px 20px;
                font-size: 14px;
                border-radius: 30px;
            }

            @media (max-width: 768px) {

                .table td,
                .table th {
                    padding: 10px;
                    font-size: 12px;
                }

                .table td img {
                    width: 40px;
                }

                .btn {
                    font-size: 12px;
                    padding: 8px 16px;
                }
            }

            @media (max-width: 576px) {
                .table {
                    font-size: 12px;
                }

                .table td {
                    display: block;
                    text-align: left;
                    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
                }

                .table th {
                    display: none;
                }

                .table td img {
                    width: 30px;
                }

                .btn {
                    padding: 6px 12px;
                }
            }
        </style>
        <!-- Ada -->
        <div class="container mt-4 mb-5 text-white rounded p-4" style="background-color: rgba(0, 0, 0, 0.5);">
            <table class="table text-white table-hover rounded" style="background-color: rgba(225, 225, 225, 0.3);">
                <thead class="bg-primary text-white rounded">
                    <tr>
                        <th>Aplikasi Game</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="https://static-src.vocagame.com/gamestoreindonesia/ML-64f6.webp" class="rounded" width="10%" alt="">
                            Mobile Legend
                        </td>
                        <td>5 Diamonds (5 + 0 Bonus)</td>
                        <td>Rp 1.461,-</td>
                        <td>11-07-2024</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="https://static-src.vocagame.com/gamestoreindonesia/ML-64f6.webp" class="rounded" width="10%" alt="">
                            Mobile Legend
                        </td>
                        <td>10 Diamonds (9 + 1 Bonus)</td>
                        <td>Rp 2.923,-</td>
                        <td>11-07-2024</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="https://static-src.vocagame.com/gamestoreindonesia/ML-64f6.webp" class="rounded" width="10%" alt="">
                            Mobile Legend
                        </td>
                        <td>12 Diamonds (11 + 1 Bonus)</td>
                        <td>Rp 3.401,-</td>
                        <td>11-07-2024</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>