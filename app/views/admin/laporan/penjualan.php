<div class="content-wrapper">

    <!-- Main content -->
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Laporan Penjualan</h3>
                            <div class="card-tools">
                                <a href="<?= BASEURL; ?>/laporan/cetakpenjualan" target="_blank" class="btn btn-success"><span class="fa fa-print"></span> Cetak Laporan</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table" class="table table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Kode Transaksi</th>
                                        <th>Nama Pembeli</th>
                                        <th>Total Bayar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data['penjualan'] as $row) : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= date('d-m-Y', strtotime($row['tggl_transaksi'])) ?></td>
                                            <td><?= $row['id_transaksi'] ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td>Rp <?= number_format($row['total_pembayaran'], 0, ',', '.') ?></td>
                                            <td width="20%">
                                                <a href="<?= BASEURL; ?>/laporan/penjualandetail/<?= $row['id_p'] ?>" class="btn btn-info modalPenjualan" data-toggle="modal" data-target="#modal-penjualan" data-id="<?= $row['id_p'] ?>"><i class="fas fa-file-alt"></i> Detail</a>
                                                <a href="<?= BASEURL; ?>/laporan/cetakresi/<?= $row['id_p'] ?>" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Resi</a>
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

<div class="modal fade" id="modal-penjualan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100">Detail Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table" class="table table-sm" style="text-align: center;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="dataPenjualan">
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>