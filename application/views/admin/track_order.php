<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Track Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Track Order</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row bg-white p-4 rounded shadow-sm">
                <div class="col-12">
                    <p class="text-center text-dark font-weight-bold mb-0" style="font-size: 1.2rem;">
                        Silahkan masukkan nomor pesanan Anda untuk melacak statusnya.
                    </p>
                    <form action="#" method="POST" class="mt-3">
                        <div class="form-group">
                            <label for="order_number">Nomor Pesanan:</label>
                            <input type="text" class="form-control" id="order_number" name="order_number" placeholder="Masukkan nomor pesanan" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" id="trackOrderButton">Track Order</button>
                    </form>
                </div>
            </div>

            <div class="row mt-4 bg-white p-4 rounded shadow-sm">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="orderTable" class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nomor Pesanan</th>
                                    <th>Aplikasi Game</th>
                                    <th>Nominal Topup</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pembeli</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>INV001</td>
                                    <td>Game A</td>
                                    <td>1200</td>
                                    <td>Rp 50.000</td>
                                    <td>2024-12-10</td>
                                    <td>John Doe</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm" onclick="deleteContent()">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>INV002</td>
                                    <td>Game B</td>
                                    <td>1200</td>
                                    <td>Rp 100.000</td>
                                    <td>2024-12-09</td>
                                    <td>Jane Smith</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>INV003</td>
                                    <td>Game C</td>
                                    <td>1500</td>
                                    <td>Rp 75.000</td>
                                    <td>2024-12-08</td>
                                    <td>Emily Clark</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>INV004</td>
                                    <td>Game D</td>
                                    <td>1000</td>
                                    <td>Rp 25.000</td>
                                    <td>2024-12-07</td>
                                    <td>Michael Johnson</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>INV005</td>
                                    <td>Game E</td>
                                    <td>2000</td>
                                    <td>Rp 150.000</td>
                                    <td>2024-12-06</td>
                                    <td>David Brown</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>INV006</td>
                                    <td>Game F</td>
                                    <td>800</td>
                                    <td>Rp 40.000</td>
                                    <td>2024-12-05</td>
                                    <td>David Brown</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>INV007</td>
                                    <td>Game G</td>
                                    <td>1800</td>
                                    <td>Rp 90.000</td>
                                    <td>2024-12-04</td>
                                    <td>Olivia Green</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>INV008</td>
                                    <td>Game H</td>
                                    <td>950</td>
                                    <td>Rp 45.000</td>
                                    <td>2024-12-03</td>
                                    <td>James Lee</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>INV009</td>
                                    <td>Game I</td>
                                    <td>1100</td>
                                    <td>Rp 60.000</td>
                                    <td>2024-12-02</td>
                                    <td>Susan Harris</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>INV010</td>
                                    <td>Game J</td>
                                    <td>1400</td>
                                    <td>Rp 70.000</td>
                                    <td>2024-12-01</td>
                                    <td>Kevin Martinez</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>INV011</td>
                                    <td>Game K</td>
                                    <td>1300</td>
                                    <td>Rp 60.000</td>
                                    <td>2024-11-30</td>
                                    <td>Rachel Wilson</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>INV012</td>
                                    <td>Game L</td>
                                    <td>1700</td>
                                    <td>Rp 80.000</td>
                                    <td>2024-11-29</td>
                                    <td>Chris Young</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
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

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="form-group">
                        <label for="order_number">Nomor Pesanan:</label>
                        <input type="text" class="form-control" id="order_number" name="order_number" required>
                    </div>
                    <div class="form-group">
                        <label for="gameType">Nama Game</label>
                        <select class="form-control" id="gameType" name="gameType" required>
                            <option value="Valorant">Valorant</option>
                            <option value="Mobile Legend">Mobile Legend</option>
                            <option value="Tencent">Tencent</option>
                            <option value="Garena">Garena</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Harga</label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Nominal</label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Nama Pembeli</label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveChanges()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var order_number = button.data('order_number');
            var modal = $(this);
            modal.find('.modal-body #order_number').val(order_number);
        });
    });
</script>