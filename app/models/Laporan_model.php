<?php

class Laporan_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPembelian()
    {
        $this->db->query('SELECT bm.id, bm.tanggal_barang_masuk, b.kode_supplier, b.kode_barang, b.nama_barang, bm.qty_history, bm.total FROM tb_barang b, tb_barang_masuk bm, tb_supplier WHERE b.kode_barang = bm.kode_barang AND b.delete_flag = 0 GROUP BY bm.id DESC;');
        return $this->db->resultSet();
    }

    public function getAllPenjualan()
    {
        $this->db->query('SELECT * FROM tb_penjualan, tb_pelanggan WHERE tb_penjualan.id_pelanggan = tb_pelanggan.id ORDER BY tb_penjualan.id_p DESC;');
        return $this->db->resultSet();
    }

    public function getPembelianDetail($id)
    {
        $this->db->query('SELECT bm.id, bm.tanggal_barang_masuk, b.kode_supplier, s.nama_supplier, b.kode_barang, b.nama_barang, bm.qty_history, bm.harga_beli, bm.total FROM tb_barang b, tb_barang_masuk bm, tb_supplier s WHERE b.kode_barang = bm.kode_barang AND b.kode_supplier = s.kode_supplier AND bm.id = :id;');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getPenjualanDetail($id)
    {
        $this->db->query('SELECT t1.id_p, t1.id_transaksi, t1.tggl_transaksi, t2.kode_barang, t3.nama_barang, t2.jumlah_pembelian, t2.harga_satuan, t2.total_harga, t4.nama AS kasir, t5.nama AS pelanggan FROM tb_penjualan t1, tb_penjualan_detail t2, tb_barang t3, tb_login t4, tb_pelanggan t5 WHERE t1.id_transaksi = t2.id_transaksi AND t2.kode_barang = t3.kode_barang AND t4.id = t1.id_kasir AND t5.id = t1.id_pelanggan AND t1.id_p = :id;');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function getLaporanPembelian()
    {
        $this->db->query('SELECT bm.id, bm.tanggal_barang_masuk, b.kode_supplier, b.kode_barang, b.nama_barang, bm.qty_history, bm.total, s.nama_supplier FROM tb_barang b, tb_barang_masuk bm, tb_supplier s WHERE b.kode_barang = bm.kode_barang AND b.kode_supplier = s.kode_supplier AND b.delete_flag = 0 GROUP BY bm.id;');
        return $this->db->resultSet();
    }
    
    public function getLaporanPenjualan()
    {
        $this->db->query('SELECT p.*, pl.nama, pl.no_tlp, l.nama AS kasir FROM tb_penjualan p, tb_pelanggan pl, tb_login l WHERE p.id_pelanggan = pl.id AND p.id_kasir = l.id ORDER BY p.id_p;');
        return $this->db->resultSet();
    }

    public function getResi($id)
    {
        $this->db->query('select t4.*, t5.*, t1.nama AS NamaKasir, t3.nama AS NamaPelanggan
                            from tb_login t1
                            INNER join tb_penjualan t2 on t1.id=t2.id_kasir
                            INNER join tb_pelanggan t3 on t2.id_pelanggan=t3.id
                            INNER join tb_penjualan_detail t4 on t2.id_transaksi=t4.id_transaksi
                            INNER JOIN tb_barang t5 on t4.kode_barang=t5.kode_barang
                            WHERE t2.id_p = :id;');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }
}