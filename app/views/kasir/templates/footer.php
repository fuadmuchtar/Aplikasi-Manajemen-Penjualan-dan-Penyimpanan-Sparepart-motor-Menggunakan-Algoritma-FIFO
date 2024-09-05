<!-- /.content-wrapper -->
<footer class="main-footer">
  <!-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.2.0
  </div> -->
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<!-- jQuery -->
<script src="<?= BASEURL; ?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= BASEURL; ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= BASEURL; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= BASEURL; ?>/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= BASEURL; ?>/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= BASEURL; ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= BASEURL; ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= BASEURL; ?>/plugins/moment/moment.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= BASEURL; ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= BASEURL; ?>/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= BASEURL; ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= BASEURL; ?>/dist/js/adminlte.js"></script>
<script src="<?= BASEURL; ?>/dist/js/script.js"></script>
<script src="<?= BASEURL; ?>/plugins/js/script.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= BASEURL; ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= BASEURL; ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= BASEURL; ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- SweetAlert2 -->
<script src="<?= BASEURL; ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= BASEURL; ?>/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= BASEURL; ?>/dist/js/adminlte.min.js"></script>


<script>
  $(function() {
    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('#table').DataTable({
      "paging": true,
      "searching": true,
      topStart: 'search',
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "fixedHeader": true
    });
  });
</script>
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "info": false,
      "paging": false,
      "ordering": false,
      "ajax": {
        "url": "<?= BASEURL; ?>/barang/json",
        "dataSrc": ""
      },
      "columns": [{
          "data": "kode_barang"
        },
        {
          "data": "nama_barang"
        },
        {
          "data": "stok"
        },
        {
          "data": "id"
        }
      ]
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

  $(document).ready(function() {
    $('#table1').DataTable({
      "responsive": true,
      "info": false,
      "ordering": false,
      "lengthChange": false,
      "autoWidth": false,
      "paging": false,
      "ajax": {
        "url": "<?= BASEURL; ?>/barang/json",
        "dataSrc": ""
      },
      "columns": [{
          "data": "kode_barang"
        },
        {
          "data": "nama_barang"
        },
        {
          "data": "stok"
        }
      ]
    });
  });
</script>
</body>

</html>