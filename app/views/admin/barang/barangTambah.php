<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-3">
                    <!-- Horizontal Form -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Barang Baru</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id=tambahForm class="form-horizontal" action="<?= BASEURL; ?>/barang/tambah" method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tgglMasuk">Tanggal Input</label>
                                            <input type="text" class="form-control" id="tgglMasuk" name="tgglMasuk" value="<?= date('Y-m-d H:i'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="supplierCode">Supplier</label>
                                            <select class="custom-select" name="supplierCode" id="supplierCode">
                                                <option disabled selected>Pilih Supplier</option>
                                                <?php foreach ($data['dataSupplier'] as $spl) : ?>
                                                    <option value="<?= $spl['kode_supplier']; ?>"><?= $spl['nama_supplier']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="kodeBarang">Kode Barang</label>
                                            <?php foreach ($data['max_code'] as $code) : ?>
                                                <?php $kodeBarang = $code;
                                                $kodeBarang++;
                                                $h = 'BRG';
                                                $kode = $h . sprintf("%03s", $kodeBarang); ?>
                                                <input type="text" class="form-control" id="kodeBarang" name="kodeBarang" value="<?= $kode; ?>" readonly>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="namaBarang">Nama Barang</label>
                                            <input type="text" class="form-control" id="namaBarang" name="namaBarang" placeholder="Enter ..." autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="merkBarang">Merk</label>
                                            <select class="custom-select" name="merkBarang" id="merkBarang">
                                                <option disabled selected>Pilih Merk</option>
                                                <?php foreach ($data['dataMerk'] as $spl) : ?>
                                                    <option value="<?= $spl['id']; ?>"><?= $spl['merk']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="kategoriBarang">Kategori Barang</label>
                                            <select class="custom-select" name="kategoriBarang" id="kategoriBarang">
                                                <option disabled selected>Pilih Kategori</option>
                                                <?php foreach ($data['dataKategori'] as $spl) : ?>
                                                    <option value="<?= $spl['id']; ?>"><?= $spl['kategori']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="modelbarang">Untuk Model:</label>
                                            <textarea class="form-control" rows="3" id="modelbarang" name="modelbarang" placeholder="Enter ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="deskripsiBarang">Deskripsi</label>
                                            <textarea class="form-control" rows="3" id="deskripsiBarang" name="deskripsiBarang" placeholder="Enter ..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="jmlBarang">Jumlah</label>
                                            <input type="number" class="form-control" id="jmlBarang" name="jmlBarang" placeholder="Enter ..." required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="hargaBarang">Harga Satuan</label>
                                            <input type="number" class="form-control" id="hargaBarang" name="hargaBarang" placeholder="Enter ..." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="hargaJual">Harga Jual (Harga beli + Margin 50%)</label>
                                            <input type="text" class="form-control" id="hargaJual" name="hargaJual" placeholder="Enter ..." required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="totalBarang">Total (Jumlah * Harga Satuan)</label>
                                            <input type="text" class="form-control" id="totalBarang" name="totalBarang" value="" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="<?= BASEURL; ?>/barang" class="btn btn-secondary">Cancel</a>
                                <button type="submit" id=btnTambah class="btn btn-primary float-right">Tambah</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    document.getElementById('btnTambah').addEventListener('click', function (event) {
		event.preventDefault();
		Swal.fire({
  title: "Sukses!",
  text: "Tambah Barang Berhasil!",
  icon: "success",
  confirmButtonText: 'OK'
}).then((result) => {
			
            if (result.isConfirmed) {
                // If confirmed, submit the form
                document.getElementById('tambahForm').submit();
            }
			
			
        });
	
    });
	
</script>

<script type="text/javascript">
    const jml = document.getElementById('jmlBarang');
    const hrgBarang = document.getElementById('hargaBarang');
    const tot = document.getElementById('totalBarang');
    const hrgJual = document.getElementById('hargaJual');

    jml.addEventListener('input', function() {
        const jmlValue = this.value;
        const hrgValue = hrgBarang.value;
        const totValue = jmlValue * hrgValue;
        tot.value = rupiahId(totValue);
    });

    hrgBarang.addEventListener('input', function() {
        const jmlValue = parseInt(jml.value);
        const hrgValue = parseInt(this.value);
        const totValue = jmlValue * hrgValue;
        tot.value = rupiahId(totValue);

        var a = hrgValue * 50 /100 + hrgValue;
        hrgJual.value = rupiahId(a);
    });
    // Number Format
    const rupiahId = (number) => {
        return new Intl.NumberFormat("id-ID", {
            maximumFractionDigits: 0,
            style: "currency",
            currency: "IDR"
        }).format(number);
    }
</script>