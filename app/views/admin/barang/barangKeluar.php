  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Main content -->
      <section class="content pt-3">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card card-primary card-outline">
                          <div class="card-header">
                              <h3 class="card-title">Daftar Barang Keluar</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="table" class="table">
                                  <thead>
                                      <tr>
                                          <th>No.</th>
                                          <th>Tanggal Keluar</th>
                                          <th>Kode Transaksi</th>
                                          <th>Kode Barang</th>
                                          <th>Nama Barang</th>
                                          <th>Jumlah</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php                                   
                                    $i = 1;
                                    foreach ($data['brg'] as $brg) :                                    
                                    ?>
                                      <tr>
                                          <td><?= $i ?></td>
                                          <td width="150px"><?= date('d-m-Y', strtotime($brg['tggl_transaksi']))?></td>
                                          <td width="15%"><?= $brg['id_transaksi'] ?></td>
                                          <td width="15%"><?= $brg['kode_barang'] ?></td>
                                          <td width="40%"><?= $brg['nama_barang'] ?></td>
                                          <td><?= $brg['jumlah_pembelian'] ?></td>
                                      </tr>
                                    <?php $i++; endforeach; ?>
                                  </tbody>
                              </table>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
              </div>
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>