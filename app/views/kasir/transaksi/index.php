<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <!-- Horizontal Form -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Cari Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <form action="<?= BASEURL; ?>/transaksi/cari" method="post">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="submit" class="btn btn-default" id="tombolCari" name="tombolCari">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control font-italic" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Cari Barang.." name="keyword" id="keyword" autocomplete="off" required oninvalid="this.setCustomValidity('Masukkan pencarian terlebih dahulu!')" oninput="setCustomValidity('')">
                                </div>
                            </form>
                            <table id="" class="table">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($_POST['tombolCari'])) : ?>
                                        <?php foreach ($data['brg'] as $brg) : ?>
                                            <tr>
                                                <td><?= $brg['kode_barang'] ?></td>
                                                <td><?= $brg['nama_barang'] ?></td>
                                                <td><?= $brg['stok'] ?></td>
                                                <td width="15%">Rp <?= number_format($brg['harga_jual'], 0, ',', '.') ?></td>
                                                <td><a href="<?= BASEURL; ?>/transaksi/add/<?= $brg['id']; ?>" class="btn btn-success"><i class="fas fa-cart-plus"></i></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Pelanggan -->
                <div class="col-4">
                    <form id="checkoutForm" action="<?= BASEURL; ?>/transaksi/checkOut" method="post">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Data Pelanggan</h3>
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <a href="<?= BASEURL; ?>/transaksi/pelangganReset" class="btn btn-danger btn-block" onclick="return confirm('Apakah anda yakin ingin mereset pelanggan?')">Reset</a>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-default">Pilih</button>
                                    </div>
                                </div>
                                <input type="hidden" name="id_pelanggan" id="idPelanggan" <?php if (isset($_SESSION['idPelanggan'])) : ?>
                                    value="<?= $_SESSION['idPelanggan']; ?>"
                                    <?php else : ?> value="1" <?php endif; ?>>
                                <div class="form-group mb-2">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="(tidak wajib diisi)" <?php if (isset($_SESSION['namaPembeli'])) : ?> value="<?= $_SESSION['namaPembeli']; ?>" <?php endif; ?>>
                                </div>
                                <div class="form-group mb-0">
                                    <label for="noTelp">No Telepon</label>
                                    <input type="text" class="form-control" id="noTelp" placeholder="(tidak wajib diisi)" <?php if (isset($_SESSION['noTelp'])) : ?> value="<?= $_SESSION['noTelp']; ?>" <?php endif; ?>>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <!-- Keranjang -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Keranjang</h3>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <table class="table table-sm">
                                    <thead">
                                        <tr>
                                            <?php
                                            $inv = 'INV-' . date('Ymd') . '-' . rand(1000, 9999);
                                            ?>
                                            <td class="col-4" style="border: 1px solid black;">No.Transaksi: <span class="font-weight-bold"><?= $inv ?><input type="hidden" name="no_transaksi" id="noTransaksi" value="<?= $inv ?>"></span></td>
                                            <td class="col-4" style="border: 1px solid black;">Tgl. Transaksi: <span class="font-weight-bold"><input type="hidden" name="tanggal_transaksi" id="tanggal_transaksi" value="<?= date('Y-m-d'); ?>"><?= date('d/m/Y'); ?></span></td>
                                            <td class="col-4" style="border: 1px solid black;">Kasir: <span class="font-weight-bold"><input type="hidden" name="id_kasir" id="id_kasir" value="<?= $_SESSION['idKasir'] ?>"><?= $_SESSION['nama']; ?></span></td>
                                        </tr>
                                        </thead>
                                </table>
                            </div>
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Harga Satuan</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        $total_all = 0; ?>

                                        <?php foreach ($data['cart-items'] as $item) : ?>
                                            <input type="hidden" name="kode_barang[]" value="<?= $item['kode_barang']; ?>">
                                            <input type="hidden" name="hrg[]" class="hrg" value="<?= $item['harga_jual']; ?>">
                                            <input type="hidden" name="hrgbeli[]" value="<?= $item['harga_beli']?>">

                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $item['nama_barang'] ?></td>
                                                <td>
                                                    <!-- qty -->
                                                    <input type="number" name="jumlah[]" class="jml qty" value=1 min=1 max="<?= $item['stok']; ?>" style="width: 50px" data-price="<?= $item['harga_jual']; ?>" onchange="if(this.value > <?= $item['stok']; ?>) {this.value = <?= $item['stok']; ?>; alert('Jumlah melebihi stok!');}" required>
                                                </td>
                                                <td>
                                                    <!-- harga -->
                                                    Rp <?= number_format($item['harga_jual'], 0, ',', '.') ?>
                                                </td>
                                                <td>
                                                    <!-- total -->
                                                    <input type="text" name="total[]" class="total" value="Rp <?= number_format($item['harga_jual'], 0, ',', '.') ?>" style="width: 100px" readonly>
                                                </td>
                                                <td>
                                                    <a href="<?= BASEURL; ?>/transaksi/hapus/<?= $item['id']; ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fas fa-trash"></i></a>
                                                </td>
                                                <?php $total_all ?>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group row">
                                        <label for="totalPayment" class="col-sm-3 col-form-label">Bayar:</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="totalPayment" placeholder="Masukkan jumlah uang" min="0" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group row">
                                        <label for="change" class="col-sm-4 col-form-label">Kembalian:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="change" placeholder="Rp. XXX.XXX" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group row">
                                        <?php

                                        $totalAll = 0

                                        ?>
                                        <?php foreach ($data['cart-items'] as $item) : ?>
                                            <?php $totalAll += $item['harga_jual']; ?>
                                        <?php endforeach; ?>
                                        <label for="totalAmount" class="col-sm-2 col-form-label">Total:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="total_bayar" id="totalAmount" value="Rp <?= number_format($totalAll, 0, ',', '.') ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <a href="<?= BASEURL; ?>/transaksi/cartReset" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Reset</a>
                                <button type="submit" class="btn btn-success" id="btnBayar" disabled>Bayar</button>
                            </div>
                        </div>
                    </div>
                    </form>
					<!----- ---->
					<!----- ---->
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pelanggan Terdaftar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/transaksi/pilihPelanggan" method="post">
                    <div class="form-group">
                        <label for="pembeliSelected">Pembeli</label>
                        <select class="custom-select" name="pembeliSelected" id="pembeliSelected">
                            <option disabled selected>Pilih Data</option>
                            <?php foreach ($data['pelanggan'] as $pelanggan) : ?>
                                <option value="<?= $pelanggan['id'] ?>"><?= $pelanggan['nama']; ?> <?= '(' . $pelanggan['no_tlp'] . ')';  ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Pilih</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- JavaScript -->


<script>
    // Get the elements
    const jmlElements = document.getElementsByClassName('jml');
    const totalElements = document.getElementsByClassName('total');
    const totalAll = document.getElementById('totalAmount');
    const totalPayment = document.getElementById('totalPayment');
    const change = document.getElementById('change');
    const exec = document.getElementById('btnBayar');

    // Convert to arrays
    const jmlArray = Array.from(jmlElements);
    const totalArray = Array.from(totalElements);

    // Now you can use forEach
    jmlArray.forEach((qty, index) => {
        qty.addEventListener('input', function() {
            const qtyValue = parseFloat(this.value); // Get qty as a number
            const price = parseFloat(this.getAttribute('data-price')); // Get price as a number
            const total = qtyValue * price;
            // Find the corresponding total element using the index
            totalArray[index].value = rupiah(total);

            // Total All
            let totalAllValue = 0;
            totalArray.forEach((total) => {
                totalAllValue += parseFloat(total.value.replace(/[Rp.]/g, ''));
            });
            totalAll.value = rupiah(totalAllValue);

            if (totalAllValue > totalPayment.value) {
                exec.disabled = true;
                change.value = "Jumlah Bayar Kurang";
            } else {
                exec.disabled = false;
                change.value = rupiah(totalPayment.value - totalAllValue);
            }
        });

        // qty.addEventListener('keyup', function() {
        //     if (isNaN(totalPayment)) {
        //         exec.disabled = true;
        //     }else {
        //         exec.disabled = false;
        //     }
        // });
    });

    // Total Payment
    totalPayment.addEventListener('input', function() {
        const totalAllValue = parseFloat(totalAll.value.replace(/[Rp.]/g, ''));
        const paymentValue = parseFloat(this.value.replace(/[Rp.]/g, ''));
        const changeValue = paymentValue - totalAllValue;
        if (paymentValue < totalAllValue) {
            change.value = "Jumlah Bayar Kurang";
            exec.disabled = true;
        } else if (isNaN(changeValue)) {
            change.value = rupiah(0);
            exec.disabled = true;
        } else {
            change.value = rupiah(changeValue);
            exec.disabled = false;
        }
    });

    const rupiah = (number) => {
        return new Intl.NumberFormat("id-ID", {
            maximumFractionDigits: 0,
            style: "currency",
            currency: "IDR"
        }).format(number);
    }
</script>