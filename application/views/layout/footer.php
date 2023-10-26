<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- DarkModeToggle -->
<div class="theme-container shadow-light">
    <img id="theme-icon" src="https://www.uplooder.net/img/image/55/7aa9993fc291bc170abea048589896cf/sun.svg" alt="ERR">
</div>

<!-- jQuery -->
<script src="<?= base_url('assets/template/') ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/template/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Sweetalert2 -->
<script src="<?= base_url('assets/sweetalert/') ?>sweetalert2.all.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/template/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/template/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/template/') ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/template/') ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/template/') ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/template/') ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/template/') ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/template/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/template/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/template/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url('assets/template/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/template/') ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/template/') ?>dist/js/pages/dashboard.js"></script>
<!-- MyJS -->
<script src="<?= base_url('assets/MyJS/') ?>script.js"></script>

<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>

<script>
    var base_url = "<?= base_url() ?>";
</script>
</body>

</html>