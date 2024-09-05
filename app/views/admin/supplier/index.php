<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Supplier</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><span class="fas fa-plus"></span>
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table" class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Supplier</th>
                                        <th>Nama Supplier</th>
                                        <th>Alamat</th>
                                        <th>Kontak</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data['spl'] as $spl) : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td width="15%"><?= $spl['kode_supplier'] ?></td>
                                            <td width="18%"><?= $spl['nama_supplier'] ?></td>
                                            <td><?= $spl['alamat'] ?></td>
                                            <td width="15%"><?= $spl['kontak'] ?></td>
                                            <td width="20%">
                                                <a href="<?= BASEURL; ?>/supplier/edit/<?= $spl['kode_supplier'] ?>" class="btn btn-warning modalSupplier" data-toggle="modal" data-target="#modalSupplier" data-id="<?= $spl['kode_supplier'] ?>"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="<?= BASEURL; ?>/supplier/delete/<?= $spl['kode_supplier'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i> Hapus</a>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Tambah Supplier</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/supplier/tambah" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="supplierCode">Kode Supplier</label>
                            <?php foreach ($data['max_code'] as $code) : ?>
                                <?php $kodeSupplier = $code;
                                $kodeSupplier++;
                                $h = 'Supplier-';
                                $kode = $h . sprintf("%03s", $kodeSupplier); ?>
                                <input type="text" class="form-control" id="supplierCode" name="supplierCode" value="<?= $kode; ?>" readonly="readonly">
                            <?php endforeach; ?>
                        </div>
                        <div class="form-group">
                            <label for="supplierName">Nama Supplier</label>
                            <input type="text" class="form-control" id="supplierName" name="supplierName" placeholder="Nama Supplier">
                        </div>
                        <div class="form-group">
                            <label for="kontakSupplier">Kontak</label>
                            <textarea class="form-control" rows="2" id="kontakSupplier" name="kontakSupplier" placeholder="Masukkan kontak"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="supplierAddress">Alamat</label>
                            <textarea class="form-control" rows="2" id="supplierAddress" name="supplierAddress" placeholder="Masukkan alamat"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modalSupplier" tabindex="-1" role="dialog" aria-labelledby="formLabelSupplier" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="formLabelSupplier">Ubah Supplier</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/supplier/ubah" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="supplierCode">Kode Supplier</label>
                            <input type="text" class="form-control" id="supplierCodeUbah" name="supplierCode" readonly>
                        </div>
                        <div class="form-group">
                            <label for="supplierName">Nama Supplier</label>
                            <input type="text" class="form-control" id="supplierNameUbah" name="supplierName" placeholder="Nama Supplier">
                        </div>
                        <div class="form-group">
                            <label for="kontakSupplier">Kontak</label>
                            <textarea class="form-control" rows="2" id="kontakSupplierUbah" name="kontakSupplier" placeholder="Masukkan kontak"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="supplierAddress">Alamat</label>
                            <textarea class="form-control" rows="2" id="supplierAddressUbah" name="supplierAddress" placeholder="Masukkan alamat"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between ubahsupplier">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->