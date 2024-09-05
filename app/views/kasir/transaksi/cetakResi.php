<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Bengkel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .receipt-container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .workshop-details {
            text-align: center;
            margin-bottom: 20px;
        }

        .workshop-details h2 {
            margin: 0;
            color: #333;
        }

        .workshop-details p {
            margin: 0;
            color: #666;
            font-size: 14px;
        }

        .receipt-details {
            margin-bottom: 20px;
        }

        .receipt-details p {
            margin: 0;
            color: #333;
            font-size: 14px;
        }

        .receipt-details p span {
            float: right;
            font-weight: bold;
        }

        .items {
            margin-bottom: 20px;
            border-top: 1px dashed #ccc;
            border-bottom: 1px dashed #ccc;
            padding: 10px 0;
        }

        .items .item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .items .item:last-child {
            margin-bottom: 0;
        }

        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .thank-you {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="receipt-container">
        <div class="workshop-details">
            <h2>Bengkel Xyz Motor</h2>
            <p>Jl. Xyz, Kota Bekasi, Jawa Barat</p>
            <p>Telepon: 0812-3456-7890</p>
        </div>
        
        <div class="receipt-details">
            <p>Tanggal: <span><?= date('d-m-Y') ?></span></p>
            <p>No. Struk: <span><?= $data['resi'][0]['id_transaksi'] ?></span></p>
            <p>Kasir: <span><?= $data['resi'][0]['NamaKasir'] ?></span></p>
            <p>Nama Pelanggan: <span><?= $data['resi'][0]['NamaPelanggan'] ?></span></p>
        </div>

        <div class="items">
            <?php $total = 0?>
            <?php foreach ($data['resi'] as $item) : ?>
            <div class="item">
                <span><?= $item['nama_barang'] ?></span>
                <span><?= $item['jumlah_pembelian']?> x <?= number_format($item['harga_satuan'], 0, ',', '.') ?> | Rp <?= number_format($item['total_harga'], 0, ',', '.') ?></span>
                <?php $total += $item['total_harga'] ?>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="total">
            <p>Total: Rp <?= number_format($total, 0, ',', '.') ?></p>
        </div>


        <div class="thank-you">
            <p>Terima kasih atas kepercayaan Anda pada Bengkel Xyz Motor!</p>
            <p>Semoga kendaraan Anda selalu dalam kondisi prima.</p>
        </div>
    </div>
</body>
<script>
    window.print();
</script>
</html>