<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary   card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Pelanggan</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><span class="fas fa-plus"></span>
                                    Tambah Pelanggan
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Pelanggan</th>
                                        <th>No Telpon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;?>
                                <?php foreach ($data['pelanggan'] as $pel) : ?>
                                    <tr>
                                        <td width="5%"><?=$i;?></td>
                                        <td><?=$pel['nama'];?></td>
                                        <td><?=$pel['no_tlp'];?></td>
                                    </tr>
                                    <?php $i++;?>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Tambah Pelanggan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/pelanggan/tambah" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="pelangganName">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="pelangganName" name="pelangganName" placeholder="Nama Pelanggan">
                        </div>
                        <div class="form-group">
                            <label for="notelPelanggan">No. Telepon / WA</label>
                            <input type="number" class="form-control" id="notelPelanggan" name="notelPelanggan" placeholder="08..">
                        </div>
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
<!-- /.modal -->