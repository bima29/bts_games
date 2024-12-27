<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List Kartu Perdana</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Kartu Perdana</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row bg-white p-4 rounded shadow-sm">
                <div class="col-12">
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php elseif ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('error'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="d-flex justify-content-between mb-3">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addCardModal">Tambah Kartu Perdana</button>
                    </div>
                    <div class="table-responsive">
                        <table id="kartuperdana" class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Item</th>
                                    <th>Kode Item</th>
                                    <th>Jenis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($kartu_perdana as $card):
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $card['nama_item']; ?></td>
                                        <td><?= $card['kode_item']; ?></td>
                                        <td><?= $card['jenis']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editCardModal"
                                                data-id="<?= $card['id']; ?>"
                                                data-nama_item="<?= $card['nama_item']; ?>"
                                                data-kode_item="<?= $card['kode_item']; ?>"
                                                data-jenis="<?= $card['jenis']; ?>">Edit</button>
                                            <a href="<?= base_url('admin/delete_kartu_perdana/' . $card['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kartu ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="addCardModal" tabindex="-1" role="dialog" aria-labelledby="addCardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCardModalLabel">Tambah Kartu Perdana</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('admin/save_kartu_perdana'); ?>">
                    <div class="form-group">
                        <label for="cardName">Nama Item</label>
                        <select class="form-control" id="cardName" name="nama_item" required>
                            <option value="">-- Pilih Kartu Perdana --</option>
                            <option value="Telkomsel">Telkomsel</option>
                            <option value="Indosat Ooredoo">Indosat Ooredoo</option>
                            <option value="XL Axiata">XL Axiata</option>
                            <option value="Tri (3)">Tri (3)</option>
                            <option value="Smartfren">Smartfren</option>
                            <option value="Axis">Axis</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cardCode">Kode Item</label>
                        <input type="text" class="form-control" id="cardCode" name="kode_item" required>
                    </div>

                    <div class="form-group">
                        <label for="cardType">Jenis</label>
                        <select class="form-control" id="cardType" name="jenis" required readonly>
                            <option selected value="Mobile">Mobile</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Kartu</button>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editCardModal" tabindex="-1" role="dialog" aria-labelledby="editCardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCardModalLabel">Edit Kartu Perdana</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('admin/update_kartu_perdana'); ?>">
                    <input type="hidden" id="editCardId" name="id">
                    <div class="form-group">
                        <label for="editCardName">Nama Item</label>
                        <select class="form-control" id="editCardName" name="nama_item" required>
                            <option value="Telkomsel">Telkomsel</option>
                            <option value="Indosat Ooredoo">Indosat Ooredoo</option>
                            <option value="XL Axiata">XL Axiata</option>
                            <option value="Tri (3)">Tri (3)</option>
                            <option value="Smartfren">Smartfren</option>
                            <option value="Axis">Axis</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editCardCode">Kode Item</label>
                        <input type="text" class="form-control" id="editCardCode" name="kode_item" required>
                    </div>
                    <div class="form-group">
                        <label for="editCardType">Jenis</label>
                        <select class="form-control" id="editCardType" name="jenis" required readonly>
                            <option selected value="Mobile">Mobile</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#kartuperdana').DataTable({
            "paging": true,
            "lengthChange": true,
            "lengthMenu": [10, 50, 100],
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "dom": '<"d-flex justify-content-between"<"length-container"l><"search-container"f>>tp',
            "columnDefs": [{
                "targets": '_all',
                "orderable": true
            }]
        });

        $(".dataTables_length").addClass("length-container");
        $(".dataTables_filter").addClass("search-container");
    });

    $(document).ready(function() {
        $('#editCardModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var cardId = button.data('id');
            var cardName = button.data('nama_item');
            var cardCode = button.data('kode_item');
            var cardType = button.data('jenis');

            var modal = $(this);
            modal.find('#editCardId').val(cardId);
            modal.find('#editCardName').val(cardName);
            modal.find('#editCardCode').val(cardCode);
            modal.find('#editCardType').val(cardType);
        });
    });
</script>