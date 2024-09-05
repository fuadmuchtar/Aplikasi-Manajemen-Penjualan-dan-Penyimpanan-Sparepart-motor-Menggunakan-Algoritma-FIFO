<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-3">
                    <!-- Horizontal Form -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="<?= BASEURL; ?>/barang/update" method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tgglMasuk">Tanggal Input</label>
                                            <input type="text" class="form-control" id="tgglMasuk" value="<?= $data['brg']['tanggal_barang']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="hidden" name="id" id="<?= $data['brg']['id']; ?>">
                                        <div class="form-group">
                                            <label for="supplierCode">Supplier</label>
                                            <select class="custom-select" name="supplierCode" id="supplierCode">
                                                <option disabled selected>Pilih Supplier</option>
                                                <?php foreach ($data['dataSupplier'] as $spl) : ?>
                                                    <option value="<?= $spl['kode_supplier']; ?>" <?= $data['brg']['kode_supplier'] == $spl['kode_supplier'] ? 'selected' : ''; ?>><?= $spl['nama_supplier']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="kodeBarang">Kode Barang</label>
                                                <input type="text" class="form-control" id="kodeBarang" value="<?= $data['brg']['kode_barang']; ?>" readonly>                                
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="namaBarang">Nama Barang</label>
                                            <input type="text" class="form-control" id="namaBarang" name="namaBarang" value="<?= $data['brg']['nama_barang']; ?>" placeholder="Enter ..." autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="merkBarang">Merk</label>
                                            <select class="custom-select" name="merkBarang" id="merkBarang">
                                                <option disabled selected>Pilih Merk</option>
                                                <?php foreach ($data['dataMerk'] as $row) : ?>
                                                    <option value="<?= $row['id']; ?>" <?= $data['brg']['merk'] == $row['merk'] ? 'selected' : ''; ?>><?= $row['merk']; ?></option>
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
                                                    <option value="<?= $spl['id']; ?>" <?= $data['brg']['kategori'] == $spl['kategori'] ? 'selected' : ''; ?>><?= $spl['kategori']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="modelbarang">Untuk Model:</label>
                                            <textarea class="form-control" rows="3" id="modelbarang" name="modelbarang" placeholder="Enter ..."><?= $data['brg']['model']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="deskripsiBarang">Deskripsi</label>
                                            <textarea class="form-control" rows="3" id="deskripsiBarang" name="deskripsiBarang" placeholder="Enter ..."><?= $data['brg']['deskripsi']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="jmlBarang">Jumlah</label>
                                            <input type="number" class="form-control" id="jmlBarang" value="<?= $data['brg']['qty_history']; ?>" placeholder="Enter ..." readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="hargaBarang">Harga Satuan</label>
                                            <input type="text" class="form-control" id="hargaBarang" value="<?= 'Rp ' . number_format($data['brg']['harga_beli'], 0, ',', '.');?>" placeholder="Enter ..." readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="hargaJual">Harga Jual (Harga beli + Margin 50%)</label>
                                            <input type="text" class="form-control" id="hargaJual" value="<?= $data['brg']['harga_jual']; ?>" name="hargaJual" placeholder="Enter ..." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="totalBarang">Total (Jumlah * Harga Satuan)</label>
                                            <input type="text" class="form-control" id="totalBarang" value="<?= 'Rp ' . number_format($data['brg']['total'], 0, ',', '.'); ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="<?= BASEURL; ?>/barang" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary float-right">Ubah</button>
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