<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Pelanggan</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary tambahModalPelanggan" data-toggle="modal" data-target="#modal-pelanggan"><span class="fas fa-plus"></span>
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
                                        <th>Nama Pelanggan</th>
                                        <th>No Telpon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data['pelanggan'] as $pel) : ?>
                                        <tr>
                                            <td width="5%"><?= $i; ?></td>
                                            <td><?= $pel['nama']; ?></td>
                                            <td><?= $pel['no_tlp']; ?></td>
                                            <td width="20%">
                                                <a href="<?= BASEURL; ?>/pelanggan/edit/<?= $pel['id']; ?>" class="btn btn-warning modalPelangganUbah" data-toggle="modal" data-target="#modal-pelanggan" data-id="<?= $pel['id'] ?>"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="<?= BASEURL; ?>/pelanggan/delete/<?= $pel['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modal-pelanggan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="formLabelPelanggan">Tambah Pelanggan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/pelanggan/tambah" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id">
                            <label for="pelangganName">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="pelangganName" name="pelangganName" placeholder="Nama Pelanggan" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="notelPelanggan">No. Telepon / WA</label>
                            <input type="number" class="form-control" id="notelPelanggan" name="notelPelanggan" placeholder="08.." autocomplete="off">
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