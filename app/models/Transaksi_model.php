<?php

class Transaksi_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addToCart($id)
    {
        $query = "SELECT * FROM tb_barang WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $data = $this->db->single();

        if ($data['stok'] > 0) {
            $this->db->query('SELECT * FROM cart_temp');
            $result = $this->db->resultSet();
            $result2 = array_column($result, 'kode_barang');
            if (in_array($data['kode_barang'], $result2)) {
                return false;
            } else {
                $query = "INSERT INTO cart_temp VALUES
                        ('', :kode_barang)";
                $this->db->query($query);
                $this->db->bind('kode_barang', $data['kode_barang']);
                $this->db->execute();

                return $this->db->rowCount();
            }
        } else {
            return false;
        }
    }

    public function getAllCartItems()
    {
        $query = "SELECT cart_temp.id, tb_barang.kode_barang, tb_barang.nama_barang, tb_barang.harga_beli, tb_barang.harga_jual, tb_barang.stok FROM cart_temp
                    LEFT JOIN tb_barang ON cart_temp.kode_barang = tb_barang.kode_barang
                    ORDER BY cart_temp.id";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function hapusItemCart($id)
    {
        $query = "DELETE FROM cart_temp WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function checkout($data)
    {
        /* proses ALGORITMA FIFO */
        /* data-datanya */
        $idTransaksi = $data['no_transaksi'];
        $tglTransaksi = $data['tanggal_transaksi'];
        $idKasir = $data['id_kasir'];
        $idPelanggan = $data['id_pelanggan'];
        $total = intval(preg_replace('/[^0-9]+/', '', $data['total_bayar']), 10);

        $count = count($data['kode_barang']);
        for ($i = 0; $i < $count; $i++) {

            $totalHarga = intval(preg_replace('/[^0-9]+/', '', $data['total'][$i]), 10);
            // jalankan query
            $qty = $data['jumlah'][$i];

            $query = "SELECT * FROM tb_barang_masuk WHERE kode_barang = :kd AND qty > 0 ORDER by tanggal_barang_masuk ASC";
            $this->db->query($query);
            $this->db->bind('kd', $data['kode_barang'][$i]);
            $result = $this->db->resultSet();

            foreach ($result as $row) {
                $stok = $row['qty'];

                if ($qty > 0) {
                    $temp = $qty;
                    $qty = $qty - $stok;

                    if ($qty > 0) {
                        $stok_update = 0;
                    } else {
                        $stok_update = $stok - $temp;
                    };

                    $query = "UPDATE tb_barang_masuk SET qty = :qty WHERE id = :id";
                    $this->db->query($query);
                    $this->db->bind('qty', $stok_update);
                    $this->db->bind('id', $row['id']);
                    $this->db->execute();
                }
            }

            $query = "UPDATE tb_barang_masuk SET total_update = qty * harga_beli WHERE kode_barang = :kode_barang";
            $this->db->query($query);
            $this->db->bind('kode_barang', $data['kode_barang'][$i]);
            $this->db->execute();

            $query = "INSERT INTO tb_penjualan_detail VALUES
                        ('', :id_transaksi, :kode_barang, :qty, :harga_satuan, :total_harga)";
            $this->db->query($query);
            $this->db->bind('id_transaksi', $idTransaksi);
            $this->db->bind('kode_barang', $data['kode_barang'][$i]);
            $this->db->bind('qty', $data['jumlah'][$i]);
            $this->db->bind('harga_satuan', $data['hrg'][$i]);
            $this->db->bind('total_harga', $totalHarga);
            $this->db->execute();


            // update stok
            $query = "UPDATE tb_barang SET stok = stok - :qty WHERE kode_barang = :kode_barang";

            $this->db->query($query);
            $this->db->bind('qty', $data['jumlah'][$i]);
            $this->db->bind('kode_barang', $data['kode_barang'][$i]);

            $this->db->execute();
        }
        // insert ke tb_penjualan
        $query = "INSERT INTO tb_penjualan VALUES
                ('', :id_transaksi, :tggl_transaksi, :id_pelanggan, :id_kasir, :total_penjualan, :total_pembayaran)";
        $this->db->query($query);
        $this->db->bind('id_transaksi', $idTransaksi);
        $this->db->bind('tggl_transaksi', $tglTransaksi);
        $this->db->bind('id_pelanggan', $idPelanggan);
        $this->db->bind('id_kasir', $idKasir);
        $this->db->bind('total_penjualan', $total);
        $this->db->bind('total_pembayaran', $total);
        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function getlastid()
    {
        $query = "SELECT tb_penjualan.id_p FROM tb_penjualan WHERE id_p = ( SELECT MAX(id_p) FROM tb_penjualan);";
        $this->db->query($query);
        return $this->db->single();
    }

    public function resetCart()
    {
        $query = "TRUNCATE cart_temp";
        $this->db->query($query);
        $this->db->execute();
    }

    public function pilihPelanggan($data)
    {
        $query = "SELECT * FROM tb_pelanggan WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['pembeliSelected']);

        return $this->db->single();
    }

    public function pelangganReset()
    {
        unset($_SESSION['namaPembeli']);
        unset($_SESSION['noTelp']);
    }

    public function cariBarang()
    {
        if (!empty($_POST['keyword']) && $_POST['keyword'] != ' ') {
            $keyword = $_POST['keyword'];
            $query = "SELECT * FROM tb_barang WHERE kode_barang LIKE :keyword OR nama_barang LIKE :keyword AND delete_flag = 0";

            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
            return $this->db->resultSet();
        } else {
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        }
    }

    public function getAllRiwayat()
    {
        $query = "SELECT * FROM tb_penjualan, tb_pelanggan WHERE tb_penjualan.id_pelanggan = tb_pelanggan.id ORDER BY tb_penjualan.id_p DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getTotalInvoice()
    {
        $query = "SELECT COUNT(id_transaksi) AS TotalInvoice FROM tb_penjualan;";
        $this->db->query($query);
        return $this->db->single();
    }
}
