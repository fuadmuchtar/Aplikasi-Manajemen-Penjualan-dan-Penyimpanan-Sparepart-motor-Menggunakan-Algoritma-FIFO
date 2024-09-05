<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <form action="<?= BASEURL; ?>/users/update" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php foreach ($data['user'] as $row) : ?>
                                            <input type="hidden" name="id" id="id" value="<?= $row['id']; ?>">
                                            <input type="hidden" name="date_update" id="date_update" value="<?= date('Y-m-d H:i:s'); ?>">
                                            <div class="form-group">
                                                <label for="nama">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama']; ?>" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" value="<?= $row['username']; ?>" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="text" class="form-control" id="password" name="password" value="" autocomplete="off">
                                                <small><i>Kosongkan jika tidak ingin diubah.</i></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="level">Level</label>
                                                <select class="custom-select" name="level" id="level">
                                                    <?php if ($row['level'] == '1') : ?>
                                                        <option value="1" selected>Admin</option>
                                                        <option value="2">Kasir</option>
                                                    <?php else : ?>
                                                        <option value="1">Admin</option>
                                                        <option value="2" selected>Kasir</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?= BASEURL; ?>/users" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>