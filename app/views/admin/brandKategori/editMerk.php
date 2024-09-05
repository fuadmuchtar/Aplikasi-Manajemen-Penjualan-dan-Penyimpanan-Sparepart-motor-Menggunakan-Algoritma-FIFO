<div class="content-wrapper">
 
    <!-- Main content -->
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Merk</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASEURL; ?>/brandKategori/editMerk" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <?php foreach ($data['merkbyid'] as $row) : ?>
                                        <input type="hidden" name="idMerk" value="<?=$row['id']?>">
                                    <label for="form">Nama</label>
                                    <input type="text" class="form-control" id="form" name="namaMerk" value="<?=$row['merk']?>" autocomplete="off">
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer float-right">
                                <a href="<?= BASEURL; ?>/brandKategori" class="btn btn-danger">Batal</a>
                                <button type="submit" class="btn btn-primary">Ubah</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>