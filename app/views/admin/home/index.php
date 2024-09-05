    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?= $data['totalbarang']['TotalBarang']; ?></h3>

                  <p>Jumlah Product</p>
                </div>
                <div class="icon">
                  <i class="fas fa-box-open"></i>
                </div>
                <a href="<?= BASEURL; ?>/barang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-orange">
                <div class="inner">
                  <h3><?php if( $data['totalstok']['TotalStok'] == null ) { echo '0'; } else { echo $data['totalstok']['TotalStok']; }; ?></h3>

                  <p>Total Barang Masuk</p>
                </div>
                <div class="icon">
                  <i class="fas fa-arrow-alt-circle-down"></i>
                </div>
                <a href="<?= BASEURL; ?>/barang/in" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php if( $data['totalbarangkeluar']['TotalBarangKeluar'] == null ) { echo '0'; } else { echo $data['totalbarangkeluar']['TotalBarangKeluar']; }; ?></h3>

                  <p>Total Barang Keluar</p>
                </div>
                <div class="icon">
                  <i class="fas fa-arrow-alt-circle-up"></i>
                </div>
                <a href="<?= BASEURL; ?>/barang/out" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-olive">
                <div class="inner">
                  <h3><?= $data['totalsupplier']['TotalSupplier']; ?></h3>

                  <p>Supplier</p>
                </div>
                <div class="icon">
                  <i class="fas fa-sitemap"></i>
                </div>
                <a href="<?= BASEURL; ?>/supplier" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?= $data['totalkaryawan']['TotalKaryawan']; ?></h3>

                  <p>Karyawan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="<?= BASEURL; ?>/karyawan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?= $data['totalinvoice']['TotalInvoice']; ?></h3>

                  <p>Total Transaksi</p>
                </div>
                <div class="icon">
                  <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <a href="<?= BASEURL; ?>/laporan/penjualan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>

          <div class="row d-none">
            <div class="col-12 d-flex justify-content-center">
              <div class="card" style="width: 90%; text-align: center">
              <p class="card-header card-outline card-danger">Stok Barang Menipis</p>
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  
                    <tr>
                      <td></td>
                    </tr>
                  
                </tbody>
              </table>
              </div>
            </div>
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>