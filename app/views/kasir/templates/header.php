<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menu <?=$data['judul'];?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?=BASEURL;?>/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=BASEURL;?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?=BASEURL;?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?=BASEURL;?>/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="<?=BASEURL;?>/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=BASEURL;?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?=BASEURL;?>/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?=BASEURL;?>/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=BASEURL;?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=BASEURL;?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=BASEURL;?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=BASEURL;?>/plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?=BASEURL;?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?=BASEURL;?>/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=BASEURL;?>/dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <a class="nav-link"href="<?=BASEURL;?>/auth/logout" role="button" onclick="return confirm('Apakah anda yakin ingin keluar?')"><i class="fas fa-sign-out-alt"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?=BASEURL;?>" class="brand-link">
        <img src="<?=BASEURL;?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Bengkel Xyz</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item" id="home">
              <a href="<?=BASEURL;?>/home" class="nav-link <?php if($data['page'] === 'homeIndex'){echo 'active';};?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item" id="transaksi">
              <a href="<?=BASEURL;?>/barang" class="nav-link <?php if($data['page'] === 'barangIndex'){echo 'active';};?>">
                <i class="nav-icon fas fa-boxes"></i>
                <p>
                  Data Barang
                </p>
              </a>
            </li>
            <li class="nav-item" id="transaksi">
              <a href="<?=BASEURL;?>/transaksi" class="nav-link <?php if($data['page'] === 'transaksiIndex'){echo 'active';};?>">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Transaksi
                </p>
              </a>
            </li>
            <li class="nav-item" id="barang">
              <a href="<?=BASEURL;?>/transaksi/riwayat" class="nav-link <?php if($data['page'] === 'transaksiHistory'){echo 'active';};?>">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>
                  Riwayat Transaksi
                </p>
              </a>
            </li>
            <li class="nav-header">MASTER DATA</li>
            <li class="nav-item" id="pelanggan">
              <a href="<?=BASEURL;?>/pelanggan" class="nav-link <?php if($data['page'] === 'pelangganIndex'){echo 'active';};?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Pelanggan
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
