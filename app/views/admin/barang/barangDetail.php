<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card card-primary card-outline">
                        <?php $i = 1; ?>
                        <?php foreach ($data['brgbyid'] as $row) : ?>
                        <div class="card-header">
                            <h3 class="card-title">Detail Barang</h3>
                            <div class="card-tools">
                                <a class="btn btn-warning" href="<?= BASEURL; ?>/barang/edit/<?= $row['id'] ?>"><i class="fa fa-edit"></i> Edit</a>
                                <a href="<?= BASEURL; ?>/barang/delete/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i> Hapus</a>
                                    <a class="btn btn-default" href="<?= BASEURL; ?>/barang"><i class="fa fa-angle-left"></i> Back</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <img src="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <small class="mx-2 text-muted">Nama Merk</small>
                                            <div class="pl-4"><?= $row['merk'] ?></div>
                                        </div>
                                        <div class="col-md-6">
                                            <small class="mx-2 text-muted">Kategori</small>
                                            <div class="pl-4"><?= $row['kategori'] ?></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <small class="mx-2 text-muted">Model</small>
                                            <div class="pl-4"><?= $row['model'] ?></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <small class="mx-2 text-muted">Nama</small>
                                            <div class="pl-4"><?= $row['nama_barang'] ?></div>
                                        </div>
                                        <div class="col-md-6">
                                            <small class="mx-2 text-muted">Harga Jual</small>
                                            <div class="pl-4">Rp <?= number_format($row['harga_jual'], 0, ',', '.') ?></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <small class="mx-2 text-muted">Deskripsi</small>
                                            <div class="pl-4"><?= $row['deskripsi'] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <?php break;?>
                                <?php endforeach; ?>
                                <br>
                                <div class="container" style="width: 60%;">
                                    <h5 style="text-align: center;">Riwayat Stok</h5>
                                    <table class="table table-sm table-bordered" style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <td>No.</td>
                                                <td>Tanggal</td>
                                                <td>Stok Awal</td>
                                                <td>Stok Update</td>
                                                <td>Harga Beli/pcs</td>
                                                <td>Total Harga Pembelian</td>
                                                <td>Total Harga Update</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($data['brgbyid'] as $row) : ?>

                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= date('d-m-Y H:i', strtotime($row['tanggal_barang_masuk']))?></td>
                                                <td><?= $row['qty_history'] ?></td>
                                                <td><?= $row['qty'] ?></td>
                                                <td>Rp <?= number_format($row['harga_beli'], 0, ',', '.') ?></td>
                                                <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
                                                <td><?php if ($row['total_update'] == $row['total'] || $row['total_update'] == 0) {echo 'Stok Utuh';} else {echo 'Rp ' . number_format($row['total_update'], 0, ',', '.');} ?></td>
                                            </tr>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>                                        
                                        </tbody>
                                    </table>
                                </div>

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