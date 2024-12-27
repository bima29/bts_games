$(document).ready(function () {
    $('#priceListTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "lengthMenu": [10, 50, 100],
        "searching": true, 
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "dom": '<"d-flex justify-content-between"<"length-container"l>>tp',
        "columnDefs": [{
            "targets": '_all',
            "orderable": true
        }]
    });
    
    $('#searchButton').on('click', function (event) {
        event.preventDefault();
        var search = $('#product_code').val().trim(); 
        var table = $('#priceListTable').DataTable();
        table.columns(1).search(search).draw(); 
    });
    
    $('#orderTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "lengthMenu": [10, 50, 100],
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "dom": '<"d-flex justify-content-between"<"length-container"l>>tp',
        "columnDefs": [{
            "targets": '_all',
            "orderable": true
        }]
    });

    $('#trackOrderButton').on('click', function (event) {
        event.preventDefault();
        var orderNumber = $('#order_number').val();
        var table = $('#orderTable').DataTable();
        table.columns(0).search(orderNumber).draw(); 
    });

    $('#chatListTable, #categoryTable, #bannerTable, #gameTable, #apiTable, #accountTable').DataTable({
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

    $('#addCategoryForm').on('submit', function (event) {
        event.preventDefault();
        var categoryName = $('#categoryName').val();
        var categoryDescription = $('#categoryDescription').val();
        var gameType = $('#gameType').val();
        var topupType = $('#topupType').val();
        var newRow = `
            <tr>
                <td>New ID</td>
                <td>${categoryName}</td>
                <td>${categoryDescription}</td>
                <td>${gameType}</td>
                <td>${topupType}</td>
                <td>
                    <a href="#" class="btn btn-info btn-sm">Edit</a>
                    <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        `;
        $('#categoryTable tbody').append(newRow);
        $('#addCategoryModal').modal('hide');
    });

    $('#addAccountForm').on('submit', function (event) {
        event.preventDefault();
        var username = $('#username').val();
        var email = $('#email').val();
        var role = $('#role').val();
        var newRow = `
            <tr>
                <td>New ID</td>
                <td>${username}</td>
                <td>${email}</td>
                <td>${role}</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        `;
        $('#accountTable tbody').append(newRow);
        $('#addAccountModal').modal('hide');
    });

  

});