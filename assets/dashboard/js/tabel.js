     $(document).ready(function() {
         $('#orderTable, #priceListTable').DataTable({
             "paging": true,
             "lengthChange": true,
             "lengthMenu": [10, 50, 100],
             "searching": false,
             "ordering": true,
             "info": true,
             "autoWidth": false,
             "responsive": true,
             "columnDefs": [{
                 "targets": '_all',
                 "orderable": true
             }]
         });
     });

     $(document).ready(function() {
         var table = $('#chatListTable').DataTable({
             "paging": true,
             "lengthChange": true,
             "lengthMenu": [10, 50, 100],
             "searching": true, // Enable search functionality
             "ordering": true,
             "info": true,
             "autoWidth": false,
             "responsive": true,
             "dom": '<"d-flex justify-content-between"<"length-container"l><"search-container"f>>tp', // Custom DOM structure
             "columnDefs": [{
                 "targets": '_all',
                 "orderable": true
             }]
         });

         // Move the search bar to the right of the "Show entries" dropdown
         $(".dataTables_length").addClass("length-container");
         $(".dataTables_filter").addClass("search-container");
     });

     $(document).ready(function() {
         $('#categoryTable').DataTable({
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
     });

     $(document).ready(function() {
         $('#bannerTable').DataTable({
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
     });

     $(document).ready(function() {
         $('#gameTable').DataTable({
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
     });
    
     $(document).ready(function() {
         $('#apiTable').DataTable({
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
     });
 