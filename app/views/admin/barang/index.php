<div class="content-wrapper">

  <!-- Main content -->
  <section class="content pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Daftar Stock Barang</h3>
              <div class="card-tools">
                <a href="<?= BASEURL; ?>/barang/printStock" target="_blank" class="btn btn-success"><span class="fa fa-print"></span></a>
                <a href="<?= BASEURL; ?>/barang/add" class="btn btn-primary"><span class="fas fa-plus"></span> Beli Barang</a>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahstok"><span class="fas fa-plus"></span>
                  Tambah Stok
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table" class="table table-sm">
                <thead>
                  <tr>
                    <th style="width: 10px">No.</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Harga Jual</th>
                    <th>Aksi</th>
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
                      <td width="20%">
                        <a href="<?= BASEURL; ?>/barang/detail/<?= $brg['id'] ?>" class="btn btn-info"><i class="fas fa-file-alt"></i> Detail</a>
                        <!--
						<a href="<?= BASEURL; ?>/barang/delete/<?= $brg['id'] ?>" class="btn btn-danger" id='hpsbarang' onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i> Hapus</a>
						-->
						<a href="<?= BASEURL; ?>/barang/delete/<?= $brg['id'] ?>" class="btn btn-danger" id="hpsbarang" onclick="hapusBarang(event, '<?= BASEURL; ?>/barang/delete/<?= $brg['id'] ?>')">
    <i class="fas fa-trash"></i> Hapus
</a>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function hapusBarang(event, url) {
    event.preventDefault(); // Mencegah tautan untuk langsung dieksekusi

    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url; // Redirect ke URL penghapusan
        }
    });
}
</script>
						
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

<div class="modal fade" id="tambahstok">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Stok Barang</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id=tambahForm action="<?= BASEURL; ?>/barang/tambahStok" method="post">
          <div class="form-group">
            <label for="tanggal" class="col-form-label">Tanggal:</label>
            <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d H:i'); ?>">
          </div>
          <div class="form-group">
            <label for="kodeBarang" class="col-form-label">Nama Barang:</label>
            <select class="custom-select" name="kodeBarang" id="kodeBarang">
              <option disabled selected>Pilih Barang</option>
              <?php foreach ($data['brg'] as $row) : ?>
                <option value="<?= $row['kode_barang']; ?>"><?= $row['kode_barang'] . ' - ' . $row['nama_barang'] . ' | ' . 'Rp ' . number_format($row['harga_beli'], 0, ',', '.'); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="jumlah" class="col-form-label">Jumlah:</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" oninput="total2()">
          </div>
          <div class="form-group">
            <label for="harga" class="col-form-label">Harga Satuan:</label>
            <input type="number" class="form-control" id="harga" name="harga" oninput="total2()">
          </div>
          <div class="form-group">
            <label for="total" class="col-form-label">Total:</label>
            <input type="text" class="form-control" id="total" name="total" value="" readonly>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" id=btnTambah class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    document.getElementById('btnTambah').addEventListener('click', function (event) {
		event.preventDefault();
		Swal.fire({
  title: "Sukses!",
  text: "Beli Barang Berhasil!",
  icon: "success",
  confirmButtonText: 'OK'
}).then((result) => {
			
            if (result.isConfirmed) {
                // If confirmed, submit the form
                document.getElementById('tambahForm').submit();
            }
			
			
        });
	
    });
	////////////////////////
	
	////////////////////////
</script>
  <script type="text/javascript">
    function total2() {
      var grand_total = document.getElementById('jumlah').value * document.getElementById('harga').value;
      document.getElementById('total').value =  rupiahBM(grand_total);
    }

    const rupiahBM = (number) => {
        return new Intl.NumberFormat("id-ID", {
            maximumFractionDigits: 0,
            style: "currency",
            currency: "IDR"
        }).format(number);
    }
  </script>