<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .kop-surat {
            text-align: center;
            margin-bottom: 30px;
        }
        .kop-surat h1 {
            margin: 0;
            font-size: 24px;
        }
        .kop-surat p {
            margin: 5px 0;
            font-size: 14px;
        }
        hr {
            border: 1px solid #000;
            margin: 10px 0 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

    <!-- Kop Surat -->
    <div class="kop-surat">
        <h1>Bengkel Motor XYZ</h1>
        <p>Jl. Xyz, Kota Bekasi, Jawa Barat, 17415</p>
        <p>Telepon: (021) 123-4567 | Email: Xyz@perusahaan.com</p>
    </div>
    <hr>

    <!-- Judul Laporan -->
    <span>Dicetak pada : <?= date('d-m-Y') ?></span>
    <h2 style="text-align: center;">Laporan Penjualan Barang</h2>

    <!-- Tabel Laporan -->
    <table class="table table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Transaksi</th>
                <th>No Invoice</th>
                <th>Nama Pembeli</th>
                <th>Kasir</th>
                <th>Total Transaksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; $totalharga = 0; ?>
            <?php foreach ($data['penjualan'] as $row) : ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= date('d-m-Y', strtotime($row['tggl_transaksi']))?></td>
                <td style="text-align: left;"><?= $row['id_transaksi'] ?></td>
                <td><?= $row['nama'] ?></td>       
                <td><?= $row['kasir'] ?></td>    
                <td><?= number_format($row['total_penjualan'], 0, ',', '.') ?></td>
            </tr>
            <?php $no++; ?>
            <?php $totalharga += $row['total_penjualan']; ?>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5">Total</th>
                <th>Rp <?= number_format($totalharga, 0, ',', '.') ?></th>
            </tr>
        </tfoot>
    </table>

</body>
<script>
    window.print();
</script>
</html>