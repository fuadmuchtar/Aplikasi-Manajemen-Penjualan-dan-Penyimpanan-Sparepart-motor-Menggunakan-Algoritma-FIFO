  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Main content -->
      <section class="content pt-3">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card card-primary card-outline">
                          <div class="card-header">
                              <h3 class="card-title">Daftar Barang Masuk</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="table" class="table table-sm">
                                  <thead>
                                      <tr>
                                          <th>No.</th>
                                          <th>Tanggal Masuk</th>
                                          <th>Kode Barang</th>
                                          <th>Nama Barang</th>
                                          <th>Jumlah</th>
                                          <th>Barcode</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php 
                                      require ($_SERVER['DOCUMENT_ROOT']."/pc/skripsi-inventory-bengkel/public/vendor/autoload.php");
                                      $i = 1; ?>
                                      <?php foreach ($data['brg'] as $brg) : ?>
                                          <tr>
                                              <td><?= $i ?></td>
                                              <td width="15%"><?= date('d-m-Y', strtotime($brg['tanggal_barang_masuk'])) ?></td>
                                              <td width="15%"><?= $brg['kode_barang'] ?></td>
                                              <td width="40%"><?= $brg['nama_barang'] ?></td>
                                              <td><?= $brg['qty_history'] ?></td>
                                              <td width="15%">
                                                <?php
                                                $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
                                                file_put_contents('barcode' . $i . '.jpg', $generator->getBarcode($brg['barcode'], $generator::TYPE_EAN_13, 2,35));                                             
                                                ?>
                                                <img src="<?= BASEURL; ?>/barcode<?= $i ?>.jpg" alt="barcode">
                                                <div style="text-align: center;"><?= $brg['barcode'] ?></div>
                                              </td>
                                              <td width="15%">
                                                  <a href="<?= BASEURL; ?>/barang/editStok/<?= $brg['id'] ?>" class="btn btn-warning tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $brg['id'] ?>"><i class="fas fa-edit"></i></a>
                                                  <a href="<?= BASEURL; ?>/barang/deleteBM/<?= $brg['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i></a>
                                              </td>
                                          </tr>
                                          <?php $i++; ?>
                                      <?php endforeach; ?>
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

  <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="formModalLabel">Default Modal</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="<?= BASEURL; ?>/barang/editStok" method="post">
                    <input type="hidden" name="id" id="id">
                      <div class="form-group">
                          <label for="qty">Jumlah</label>
                          <input type="number" class="form-control" id="qty_history" name="qty_update"  autocomplete="off">
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
          </div>
      </div>
  </div>