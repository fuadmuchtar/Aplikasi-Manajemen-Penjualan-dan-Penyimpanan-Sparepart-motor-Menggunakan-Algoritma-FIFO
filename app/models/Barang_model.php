<?php

class Barang_model
{
    private $table = 'tb_barang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBarang()
    {
        $this->db->query('SELECT b.id, kode_barang, nama_barang, b.kode_supplier, k.kategori, m.merk, deskripsi, model, stok, harga_beli, harga_jual, total, tanggal_barang 
                            FROM tb_barang b, tb_merk m, tb_kategori k 
                            WHERE k.id = b.kategori_id AND m.id = b.merk_id AND b.delete_flag = 0 ORDER BY b.tanggal_barang ASC;');
        return $this->db->resultSet();
    }

    public function getTotalBarang()
    {
        $this->db->query('SELECT COUNT(id) AS TotalBarang FROM tb_barang WHERE delete_flag = 0;');
        return $this->db->single();
    }

    public function getAllBarangMasuk()
    {
        $this->db->query('SELECT tb_barang_masuk.id, tb_barang_masuk.kode_barang, tb_barang.nama_barang, tb_barang_masuk.qty, tb_barang_masuk.qty_history ,tb_barang_masuk.harga_beli, tb_barang_masuk.total, tb_barang_masuk.tanggal_barang_masuk, tb_barang_masuk.barcode FROM tb_barang_masuk LEFT JOIN tb_barang ON tb_barang_masuk.kode_barang = tb_barang.kode_barang WHERE tb_barang.delete_flag = 0 ORDER BY tb_barang_masuk.id DESC;');
        return $this->db->resultSet();
    }

    public function getTotalStok()
    {
        $this->db->query('SELECT SUM(qty_history) AS TotalStok FROM tb_barang_masuk WHERE delete_flag = 0;');
        return $this->db->single();
    }

    public function getAllBarangKeluar()
    {
        $this->db->query('SELECT p.tggl_transaksi, pd.id_transaksi, b.kode_barang, b.nama_barang, pd.jumlah_pembelian, pd.total_harga FROM tb_penjualan_detail pd, tb_barang b, tb_penjualan p WHERE pd.kode_barang = b.kode_barang AND pd.id_transaksi = p.id_transaksi ORDER BY p.id_p DESC');
        return $this->db->resultSet();        
    }

    public function getTotalBarangKeluar()
    {
        $this->db->query('SELECT sum(jumlah_pembelian) AS TotalBarangKeluar FROM `tb_penjualan_detail`;');
        return $this->db->single();
    }

    public function getMaxCode()
    {
        $this->db->query("SELECT MAX(SUBSTR(kode_barang, 4) * 1) FROM " . $this->table);
        return $this->db->single();
    }

    public function getBarangById($id)
    {
        $this->db->query('SELECT b.id, b.kode_barang, nama_barang, b.kode_supplier, k.kategori, m.merk, deskripsi, model, stok, bm.harga_beli, b.harga_jual, bm.total, bm.total_update, tanggal_barang, bm.tanggal_barang_masuk, bm.qty_history, bm.qty FROM tb_barang b, tb_merk m, tb_kategori k, tb_barang_masuk bm WHERE k.id = b.kategori_id AND m.id = b.merk_id AND bm.kode_barang = b.kode_barang AND b.id = :id ORDER BY bm.tanggal_barang_masuk DESC;');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function getBarangById2($id)
    {
        $this->db->query('SELECT b.id, b.kode_barang, nama_barang, b.kode_supplier, k.kategori, m.merk, deskripsi, model, stok, bm.harga_beli, b.harga_jual, bm.total, tanggal_barang, bm.tanggal_barang_masuk, bm.qty_history, bm.qty FROM tb_barang b, tb_merk m, tb_kategori k, tb_barang_masuk bm WHERE k.id = b.kategori_id AND m.id = b.merk_id AND bm.kode_barang = b.kode_barang AND b.id = :id ORDER BY bm.tanggal_barang_masuk DESC;');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataBarang($data)
    {
        $total = intval(preg_replace('/[^0-9]+/', '', $data['totalBarang']), 10);
        $hrgJual = intval(preg_replace('/[^0-9]+/', '', $data['hargaJual']), 10);
        $query = "INSERT INTO tb_barang VALUES
                    ('', :kode_barang, :nama_barang, :kode_supplier, :kategori_id, :merk_id, :deskripsi, :model, :stok, :harga_beli, :harga_jual, :total, '', :tanggal_barang)";
        $this->db->query($query);
        $this->db->bind('kode_barang', $data['kodeBarang']);
        $this->db->bind('nama_barang', $data['namaBarang']);
        $this->db->bind('kode_supplier', $data['supplierCode']);
        $this->db->bind('kategori_id', $data['kategoriBarang']);
        $this->db->bind('merk_id', $data['merkBarang']);
        $this->db->bind('deskripsi', $data['deskripsiBarang']);
        $this->db->bind('model', $data['modelbarang']);
        $this->db->bind('stok', $data['jmlBarang']);
        $this->db->bind('harga_beli', $data['hargaBarang']);
        $this->db->bind('harga_jual', $hrgJual);
        $this->db->bind('total', $total);
        $this->db->bind('tanggal_barang', $data['tgglMasuk']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tambahStokBarang($data)
    {
        $barcode = mt_rand(11111,99999);

        $total = intval(preg_replace('/[^0-9]+/', '', $data['total']), 10);
        $query = "INSERT INTO tb_barang_masuk VALUES
                    ('', :kode_barang, :qty, :qty_history, :harga_beli, :total, :total_update, '', :tanggal_barang_masuk, :barcode)";

        $this->db->query($query);
        $this->db->bind('kode_barang', $data['kodeBarang']);
        $this->db->bind('qty', $data['jumlah']);
        $this->db->bind('qty_history', $data['jumlah']);
        $this->db->bind('harga_beli', $data['harga']);
        $this->db->bind('total', $total);
        $this->db->bind('total_update', $total);
        $this->db->bind('tanggal_barang_masuk', $data['tanggal']);
        $this->db->bind('barcode', $barcode);

        $this->db->execute();

        $query = "UPDATE tb_barang SET stok = stok + :qty WHERE kode_barang = :kode_barang";

        $this->db->query($query);
        $this->db->bind('kode_barang', $data['kodeBarang']);
        $this->db->bind('qty', $data['jumlah']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editStokBarang($data)
    {
        $qtybaru = $data['qty_update'];

        $query = "SELECT * FROM tb_barang_masuk WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $data = $this->db->single();

        if($qtybaru > $data['qty_history']){
            $selisih = $qtybaru - $data['qty_history'];
            $query = 'UPDATE tb_barang_masuk SET qty_history = :qty_history, qty = qty + :qty_baru WHERE id = :id';
            $this->db->query($query);
            $this->db->bind('id', $data['id']);
            $this->db->bind('qty_history', $qtybaru);
            $this->db->bind('qty_baru', $selisih);
            $this->db->execute();


            $query = "UPDATE tb_barang SET stok = stok + :selisih WHERE kode_barang = :kode_barang";
            $this->db->query($query);
            $this->db->bind('kode_barang', $data['kode_barang']);
            $this->db->bind('selisih', $selisih);
            $this->db->execute();
        }

        if($qtybaru < $data['qty_history']){
            $selisih = $data['qty_history'] - $qtybaru;
            $query = 'UPDATE tb_barang_masuk SET qty_history = :qty_history, qty = qty - :qty_baru WHERE id = :id';
            $this->db->query($query);
            $this->db->bind('id', $data['id']);
            $this->db->bind('qty_history', $qtybaru);
            $this->db->bind('qty_baru', $selisih);
            $this->db->execute();
        }

        return $this->db->rowCount();
    }
    
    public function deleteBarang($id)
    {
        $query = "SELECT * FROM tb_barang WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $data = $this->db->single();

        $query = "UPDATE tb_barang_masuk SET delete_flag = 1 WHERE kode_barang = :kode_barang";
        $this->db->query($query);
        $this->db->bind('kode_barang', $data['kode_barang']);
        $this->db->execute();

        $query = "UPDATE tb_barang SET delete_flag = 1 WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();        

        return $this->db->rowCount();
    }

    public function deleteBarangMasuk($id)
    {
        $query = "SELECT * FROM tb_barang_masuk WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $data = $this->db->single();

        $kodeBarang = $data['kode_barang'];
        $qty = $data['qty'];

        $query = "UPDATE tb_barang SET stok = stok - :qty WHERE kode_barang = :kode_barang";
        $this->db->query($query);
        $this->db->bind('qty', $qty);
        $this->db->bind('kode_barang', $kodeBarang);
        $this->db->execute();

        $query = "DELETE FROM tb_barang_masuk WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getBmById($id)
    {
        $this->db->query('SELECT * FROM tb_barang_masuk WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function updateBarang($data){
        $query = "UPDATE tb_barang SET
                    nama_barang = :nama_barang, kode_supplier = :kode_supplier, kategori_id = :kategori_id, merk_id = :merk_id, deskripsi = :deskripsi, model = :model, harga_jual = :harga_jual WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama_barang', $data['namaBarang']);
        $this->db->bind('kode_supplier', $data['supplierCode']);
        $this->db->bind('kategori_id', $data['kategoriBarang']);
        $this->db->bind('merk_id', $data['merkBarang']);
        $this->db->bind('deskripsi', $data['deskripsiBarang']);
        $this->db->bind('model', $data['modelbarang']);
        $this->db->bind('harga_jual', $data['hargaJual']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getStokAll()
    {
        $this->db->query('SELECT * FROM tb_barang');
        return $this->db->resultSet();
    }
}
