$(document).ready(function() {
    // Initialize DataTables for all tables
    $('#orderTable, #priceListTable, #chatListTable, #categoryTable, #bannerTable, #gameTable, #apiTable, #accountTable').DataTable({
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

    // Custom adjustments for specific tables
    $('#orderTable, #priceListTable').DataTable().settings()[0].searching = false; // Disable search functionality for these tables

    // Adjustments for search and length containers
    $(".dataTables_length").addClass("length-container");
    $(".dataTables_filter").addClass("search-container");

    // Add category form submission
    $('#addCategoryForm').on('submit', function(event) {
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

    // Add account form submission
    $('#addAccountForm').on('submit', function(event) {
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
