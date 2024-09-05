<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menu <?= $data['judul']; ?></title>


  <!-- iCheck for checkboxes and radio inputs -->
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/dropzone/min/dropzone.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="<?= BASEURL; ?>/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= BASEURL; ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
          <a class="nav-link" href="<?= BASEURL; ?>/auth/logout" role="button" onclick="return confirm('Apakah anda yakin ingin keluar?')"><i class="fas fa-sign-out-alt"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= BASEURL; ?>" class="brand-link">
        <img src="<?= BASEURL; ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
              <a href="<?= BASEURL; ?>" class="nav-link <?php if ($data['page'] === 'homeIndex') {
                                                          echo 'active';
                                                        }; ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item" id="stock">
              <a href="<?= BASEURL; ?>/barang" class="nav-link <?php if ($data['page'] === 'barangIndex') {
                                                                  echo 'active';
                                                                }; ?>">
                <i class="nav-icon fas fa-boxes"></i>
                <p>
                  Stock Barang
                </p>
              </a>
            </li>
            <li class="nav-item" id="stock-in">
              <a href="<?= BASEURL; ?>/barang/in" class="nav-link <?php if ($data['page'] === 'barangMasuk') {
                                                                    echo 'active';
                                                                  }; ?>">
                <i class="nav-icon fas fa-sign-in-alt"></i>
                <p>
                  Barang Masuk
                </p>
              </a>
            </li>
            <li class="nav-item" id="stock-out">
              <a href="<?= BASEURL; ?>/barang/out" class="nav-link <?php if ($data['page'] === 'barangKeluar') {
                                                                      echo 'active';
                                                                    }; ?>">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Barang Keluar
                </p>
              </a>
            </li>
            <li class="nav-header">MASTER DATA</li>
            <li class="nav-item" id="supplier">
              <a href="<?= BASEURL; ?>/supplier" class="nav-link <?php if ($data['page'] === 'supplierIndex') {
                                                                    echo 'active';
                                                                  }; ?>">
                <i class="nav-icon fas fa-file-invoice"></i>
                <p>
                  Data Supplier
                </p>
              </a>
            </li>
            <li class="nav-item" id="karyawan">
              <a href="<?= BASEURL; ?>/karyawan" class="nav-link <?php if ($data['page'] === 'karyawanIndex') {
                                                                    echo 'active';
                                                                  }; ?>">
                <i class="nav-icon fas fa-user-friends"></i>
                <p>
                  Data Karyawan
                </p>
              </a>
            </li>
            <li class="nav-item" id="pelanggan">
              <a href="<?= BASEURL; ?>/pelanggan" class="nav-link <?php if ($data['page'] === 'pelangganIndex') {
                                                                    echo 'active';
                                                                  }; ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Pelanggan
                </p>
              </a>
            </li>
            <li class="nav-item <?php if ($data['page'] === 'pembelianIndex' || $data['page'] === 'penjualanIndex') {
                                  echo 'menu-open';
                                }; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>
                  Laporan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item" id="laporanPenjualan">
                  <a href="<?= BASEURL; ?>/laporan/pembelian" class="nav-link <?php if ($data['page'] === 'pembelianIndex') {
                                                                                echo 'active';
                                                                              }; ?>">
                    <i class="nav-icon"></i>
                    <p>
                      Laporan Pembelian
                    </p>
                  </a>
                </li>
                <li class="nav-item" id="laporanPenjualan">
                  <a href="<?= BASEURL; ?>/laporan/penjualan" class="nav-link <?php if ($data['page'] === 'penjualanIndex') {
                                                                                echo 'active';
                                                                              }; ?>">
                    <i class="nav-icon"></i>
                    <p>
                      Laporan Penjualan
                    </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">MAINTENANCE</li>
            <li class="nav-item" id="brandKategori">
              <a href="<?= BASEURL; ?>/brandKategori" class="nav-link <?php if ($data['page'] === 'brandKategori') {
                                                                        echo 'active';
                                                                      }; ?>">
                <i class="nav-icon fas fa-th-list"></i>
                <p>
                  Brand dan kategori
                </p>
              </a>
            </li>
            <li class="nav-item" id="usermanage">
              <a href="<?= BASEURL; ?>/users" class="nav-link <?php if ($data['page'] === 'user') {
                                                                echo 'active';
                                                              }; ?>">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>
                  User Management
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>