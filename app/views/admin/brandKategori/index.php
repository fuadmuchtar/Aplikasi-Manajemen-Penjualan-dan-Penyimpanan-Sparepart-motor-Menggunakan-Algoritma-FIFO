<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mt-3">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">List Merk</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#merkModal">
                                    <span class="fas fa-plus"></span>
                                    Tambah
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table" class="table table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>Nama Merk</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data['merk'] as $merk) : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $merk['merk']; ?></td>
                                            <td width="20%">
                                            <a href="<?= BASEURL; ?>/brandKategori/viewMerk/<?= $merk['id']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="<?= BASEURL; ?>/brandKategori/deleteMerk/<?= $merk['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6 mt-3">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">List Kategori</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kategoriModal">
                                    <span class="fas fa-plus"></span>
                                    Tambah
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table2" class="table table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>Nama Kategori</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data['kategori'] as $kat) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $kat['kategori']; ?></td>
                                            <td width="20%">
                                                <a href="<?= BASEURL; ?>/brandKategori/viewKategori/<?= $kat['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="<?= BASEURL; ?>/brandKategori/deleteKategori/<?= $kat['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i></a>
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

<div class="modal fade" id="merkModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Merk Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/brandKategori/merkTambah" method="post">
                    <div class="form-group">
                        <label for="Nama Merk" class="col-form-label">Nama Merk:</label>
                        <input type="text" class="form-control" id="namaMerk" name="namaMerk">
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="kategoriModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/brandKategori/kategoriTambah" method="post">
                    <div class="form-group">
                        <label for="Nama Merk" class="col-form-label">Nama Kategori:</label>
                        <input type="text" class="form-control" id="namaMerk" name="namaKategori">
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>