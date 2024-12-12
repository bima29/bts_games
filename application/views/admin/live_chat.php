<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Live Chat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Live Chat</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row bg-white p-4 rounded shadow-sm">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="chatListTable" class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nama Pengirim</th>
                                    <th>Pesan</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pengguna A</td>
                                    <td>Halo, saya ingin menanyakan tentang produk X.</td>
                                    <td>10 Desember 2024 08:30</td>
                                    <td>
                                        <a href="<?= base_url('admin/chat') ?>" class="btn btn-info btn-sm">Jawab</a>
                                        <a href="#" class="btn btn-danger btn-sm" onclick="deleteContent()">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pengguna B</td>
                                    <td>Apakah produk Y tersedia saat ini?</td>
                                    <td>10 Desember 2024 09:00</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">Jawab</a>
                                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pengguna C</td>
                                    <td>Bagaimana cara membeli produk Z?</td>
                                    <td>10 Desember 2024 10:15</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">Jawab</a>
                                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pengguna D</td>
                                    <td>Adakah diskon untuk produk A?</td>
                                    <td>10 Desember 2024 11:00</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">Jawab</a>
                                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
