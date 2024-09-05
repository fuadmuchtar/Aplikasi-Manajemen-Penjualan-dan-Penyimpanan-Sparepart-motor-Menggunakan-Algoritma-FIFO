<div class="content-wrapper">

    <!-- Main content -->
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Laporan Pembelian</h3>
                            <div class="card-tools">
                                <a href="<?= BASEURL; ?>/laporan/cetakpembelian" target="_blank" class="btn btn-success"><span class="fa fa-print"></span> Cetak Laporan</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table" class="table table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Kode Supplier</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data['pembelian'] as $row) : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $row['tanggal_barang_masuk'] ?></td>
                                            <td><?= $row['kode_supplier'] ?></td>
                                            <td><?= $row['kode_barang'] ?></td>
                                            <td><?= $row['nama_barang'] ?></td>
                                            <td><?= $row['qty_history'] ?></td>
                                            <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
                                            <td class="text-center">
                                                <a href="<?= BASEURL; ?>/laporan/pembeliandetail/<?= $row['id'] ?>" class="btn btn-info modalPembelian" data-toggle="modal" data-target="#modal-pembelian" data-id="<?= $row['id'] ?>"><i class="fas fa-file-alt"></i> Detail</a>
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

<div class="modal fade" id="modal-pembelian">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100">Detail Pembelian Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-sm" style="text-align: center;">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kode Supplier</th>
                            <th>Nama Supplier</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="dataPembelian">
                        <tr>
                            <td id="tanggal"></td>
                            <td id="kodesupplier"></td>
                            <td id="namasupplier"></td>
                            <td id="kodebarang"></td>
                            <td id="namabarang" style="text-align: left;"></td>
                            <td id="qty"></td>
                            <td id="harga" style="text-align: right;"></td>
                            <td id="total" style="text-align: right;"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->