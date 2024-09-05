<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Karyawan</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary tambahModalKaryawan" data-toggle="modal" data-target="#modal-karyawan"><span class="fas fa-plus"></span>
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
                                        <th>Nama Karyawan</th>
                                        <th>No telpon</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data['karyawan'] as $kar) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $kar['nama_karyawan'] ?></td>
                                            <td><?= $kar['no_telpon'] ?></td>
                                            <td><?= $kar['alamat'] ?></td>
                                            <td width="20%">
                                                <a href="<?= BASEURL; ?>/karyawan/edit/<?= $kar['id_karyawan'] ?>" class="btn btn-warning modalKaryawan" data-toggle="modal" data-target="#modal-karyawan" data-id="<?= $kar['id_karyawan'] ?>"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="<?= BASEURL; ?>/karyawan/hapus/<?= $kar['id_karyawan'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i> Hapus</a>
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

<div class="modal fade" id="modal-karyawan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="formLabelKaryawan">Tambah Karyawan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/karyawan/tambah" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id">
                            <label for="karyawanName">Nama Karyawan</label>
                            <input type="text" class="form-control" id="karyawanName" name="karyawanName" placeholder="Nama Supplier">
                        </div>
                        <div class="form-group">
                            <label for="notelKaryawan">No. Telepon / WA</label>
                            <input type="number" class="form-control" id="notelKaryawan" name="notelKaryawan" placeholder="08..">
                        </div>
                        <div class="form-group">
                            <label for="karyawanAddress">Alamat</label>
                            <textarea class="form-control" rows="2" id="karyawanAddress" name="karyawanAddress" placeholder="Masukkan alamat"></textarea>
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