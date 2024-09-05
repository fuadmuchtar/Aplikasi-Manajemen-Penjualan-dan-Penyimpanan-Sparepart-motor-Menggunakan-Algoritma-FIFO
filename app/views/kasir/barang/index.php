<div class="content-wrapper">

  <!-- Main content -->
  <section class="content pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h2 class="card-title">Daftar Stock Barang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table" class="table">
                <thead>
                  <tr>
                    <th style="width: 10px">No.</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Harga Jual</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($data['brg'] as $brg) : ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td width="15%"><?= $brg['kode_barang'] ?></td>
                      <td><?= $brg['nama_barang'] ?></td>
                      <td width="12%"><?= $brg['kategori'] ?></td>
                      <td><?= $brg['stok'] ?></td>
                      <td width="13%">Rp <?= number_format($brg['harga_jual'], 0, ',', '.') ?></td>
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
