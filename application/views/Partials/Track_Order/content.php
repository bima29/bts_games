<link rel="stylesheet" href="<?= base_url('assets/css/table.css') ?>">


<div class="container-fluid container-bg-img-trackorder">
    <div class="container mt-5 rounded bg-color-blur-black-4">
        <div class="container d-flex align-items-center shadow p-5 rounded">
            <div class="bg-white rounded-pill shadow p-3 d-inline-block">
                <img src="<?= base_url('assets/img/location.png') ?>" alt="Location Icon" class="img-fluid img-fluid-location">
            </div>

            <div class="ms-5">
                <p class="mb-0 responsive-p">btsstoreindonesia.com</p>
                <h1 class="mt-2 text-white">Lacak Pesanan</h1>
            </div>
        </div>

        <div class="mt-5 d-flex justify-content-center align-items-center">
            <div class="container border border-light rounded p-5 w-100 bg-color-blur-black-5">
                <form class="d-flex w-100">
                    <div class="input-group w-100">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-magnifying-glass icon-fa-magnifying-glass"></i>
                        </span>
                        <input class="form-control text-white bg-color-blur-black-7 fs-p-br-input custom-input" type="text" placeholder="Masukkan Nomor Telepon atau Nomor Invoice"
                            aria-label="Order Number">
                        <button class="btn btn-outline-success ms-0 btn-fontsize-padding" type="submit">Cari</button>
                    </div>
                </form>
                <p class="text-white">Pesanan kamu tidak terdaftar meskipun kamu yakin sudah memesan? Harap tunggu 1-2 jam, namun jika pesanan masih tidak muncul maka kamu dapat menghubungi kami via <a class="text-decoration-none text-primary"><b>Whatsapp</b></a></p>
            </div>
        </div>
        <div class="container mt-4">
            <h3 class="mb-4 text-white">Riwayat Pesanan</h3>
            <div class="container mt-4 d-flex justify-content-center align-items-center min-height-50vh">
                <div class="text-center mb-5">
                    <img src="<?= base_url('assets/img/empty.png') ?>" alt="Empty Image" class="img-fluid mb-3">
                    <p class="text-white">Produk belum bisa ditampilkan,</p>
                    <p class="text-white">silakan isi nomor HP terlebih dahulu</p>
                </div>
            </div>
        </div>
        <!-- Ada -->
        <div class="container-fluid mt-4 mb-5 text-white rounded p-4 bg-color-blur-black-5">
            <div style="overflow-x: auto; white-space: nowrap;">
                <table class="table-hover text-white rounded bg-color-blur-white-3 w-100">
                    <thead class="bg-primary text-white">
                        <thead class="bg-primary text-white rounded">
                            <tr>
                                <th class="px-3 py-2 text-center">Aplikasi Game</th>
                                <th class="px-3 py-2 text-center">Nama Produk</th>
                                <th class="px-3 py-2 text-center">Harga</th>
                                <th class="px-3 py-2 text-center">Tanggal</th>
                            </tr>
                        </thead>
                    <tbody>
                        <tr>
                            <td class="px-3 py-2 text-center">
                                <img src="https://static-src.vocagame.com/gamestoreindonesia/ML-64f6.webp" class="rounded" width="10%" alt="">
                                Mobile Legend
                            </td>
                            <td class="px-3 py-2 text-center">5 Diamonds (5 + 0 Bonus)</td>
                            <td class="px-3 py-2 text-center">Rp 1.461,-</td>
                            <td class="px-3 py-2 text-center">11-07-2024</td>
                        </tr>
                        <tr>
                            <td class="px-3 py-2 text-center">
                                <img src="https://static-src.vocagame.com/gamestoreindonesia/ML-64f6.webp" class="rounded" width="10%" alt="">
                                Mobile Legend
                            </td>
                            <td class="px-3 py-2 text-center">10 Diamonds (9 + 1 Bonus)</td>
                            <td class="px-3 py-2 text-center">Rp 2.923,-</td>
                            <td class="px-3 py-2 text-center">11-07-2024</td>
                        </tr>
                        <tr>
                            <td class="px-3 py-2 text-center">
                                <img src="https://static-src.vocagame.com/gamestoreindonesia/ML-64f6.webp" class="rounded" width="10%" alt="">
                                Mobile Legend
                            </td>
                            <td class="px-3 py-2 text-center">12 Diamonds (11 + 1 Bonus)</td>
                            <td class="px-3 py-2 text-center">Rp 3.401,-</td>
                            <td class="px-3 py-2 text-center">11-07-2024</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>