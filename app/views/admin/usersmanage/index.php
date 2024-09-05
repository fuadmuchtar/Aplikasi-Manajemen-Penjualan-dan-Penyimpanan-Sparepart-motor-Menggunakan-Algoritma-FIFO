<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Daftar User</h3>
                            <div class="card-tools">
                                <a href="<?= BASEURL; ?>/users/tambah" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Tipe</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data['users'] as $row) : ?>
                                        <tr>
                                            <td width="5%"><?= $i; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['username']; ?></td>
                                            <td><?php if ($row['level'] == 1) : ?>Admin<?php elseif ($row['level'] == 2) : ?>Kasir<?php endif ?></td>
                                            <td width="20%">
                                                <a href="<?= BASEURL; ?>/users/detail/<?= $row['id'] ?>" class="btn btn-info"><i class="fas fa-file-alt"></i> Detail</a>
                                                <a href="<?= BASEURL; ?>/users/delete/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i> Hapus</a>
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