 <!-- /.content-wrapper -->
 <footer class="main-footer">
     <strong>Copyright &copy; 2024 <a href="http://btsstoreindonesia.com/">BTSGames</a>.</strong>
     All rights reserved.
     <div class="float-right d-none d-sm-inline-block">
         <b>Version</b> 3.2.0
     </div>
 </footer>


 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
     <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->
 </div>
 <!-- ./wrapper -->

 <!-- jQuery -->
 <script src="<?= base_url('assets/dashboard'); ?>/plugins/jquery/jquery.min.js"></script>

 <!-- jQuery UI 1.11.4 -->
 <script src="<?= base_url('assets/dashboard'); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>

 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
     $.widget.bridge('uibutton', $.ui.button)
 </script>

 <!-- Bootstrap 4 -->
 <script src="<?= base_url('assets/dashboard'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- ChartJS -->
 <script src="<?= base_url('assets/dashboard'); ?>/plugins/chart.js/Chart.min.js"></script>

 <!-- Sparkline -->
 <script src="<?= base_url('assets/dashboard'); ?>/plugins/sparklines/sparkline.js"></script>

 <!-- JQVMap -->
 <script src="<?= base_url('assets/dashboard'); ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
 <script src="<?= base_url('assets/dashboard'); ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

 <!-- jQuery Knob Chart -->
 <script src="<?= base_url('assets/dashboard'); ?>/plugins/jquery-knob/jquery.knob.min.js"></script>

 <!-- daterangepicker -->
 <script src="<?= base_url('assets/dashboard'); ?>/plugins/moment/moment.min.js"></script>
 <script src="<?= base_url('assets/dashboard'); ?>/plugins/daterangepicker/daterangepicker.js"></script>

 <!-- Tempusdominus Bootstrap 4 -->
 <script src="<?= base_url('assets/dashboard'); ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

 <!-- Summernote -->
 <script src="<?= base_url('assets/dashboard'); ?>/plugins/summernote/summernote-bs4.min.js"></script>

 <!-- overlayScrollbars -->
 <script src="<?= base_url('assets/dashboard'); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

 <!-- AdminLTE App -->
 <script src="<?= base_url('assets/dashboard'); ?>/dist/js/adminlte.js"></script>

 <!-- AdminLTE for demo purposes -->
 <script src="<?= base_url('assets/dashboard'); ?>/dist/js/pages/dashboard.js"></script>

 <!-- DataTables -->
 <script src="<?= base_url('assets/dashboard'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= base_url('assets/dashboard'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>


 <script>
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
 </script>




 </body>

 </html>