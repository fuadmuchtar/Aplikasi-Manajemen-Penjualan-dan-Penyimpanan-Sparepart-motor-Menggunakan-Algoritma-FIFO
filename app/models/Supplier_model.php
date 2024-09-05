<?php

class Supplier_model {
    private $table = 'tb_supplier';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getAllSupplier()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' Where delete_flag = 0');
        return $this->db->resultSet();
    }

    public function getTotalSupplier()
    {
        $this->db->query('SELECT COUNT(kode_supplier) AS TotalSupplier FROM tb_supplier Where delete_flag = 0');
        return $this->db->single();
    }

    public function getMaxCode()
    {
        $this->db->query("SELECT MAX(SUBSTR(kode_supplier, 10) * 1) FROM " . $this->table );
        return $this->db->single();
    }

    public function tambahDataSupplier($data)
    {
        $query = "INSERT INTO tb_supplier
                    VALUES
                    (:kode_supplier, :nama_supplier, :alamat, :kontak, 0)";
        
        $this->db->query($query);
        $this->db->bind('kode_supplier', $data['supplierCode']);
        $this->db->bind('nama_supplier', $data['supplierName']);
        $this->db->bind('alamat', $data['supplierAddress']);
        $this->db->bind('kontak', $data['kontakSupplier']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getSupplierByKd($kd)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kode_supplier = :kd');
        $this->db->bind('kd', $kd);
        return $this->db->single();
    }

    public function ubahDataSupplier($data)
    {
        $query = "UPDATE tb_supplier
                    SET
                    nama_supplier = :nama_supplier,
                    alamat = :alamat,
                    kontak = :kontak
                    WHERE kode_supplier = :kd";
        
        $this->db->query($query);
        $this->db->bind('kd', $data['supplierCode']);
        $this->db->bind('nama_supplier', $data['supplierName']);
        $this->db->bind('alamat', $data['supplierAddress']);
        $this->db->bind('kontak', $data['kontakSupplier']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteSupplier($id)
    {
        $query = "UPDATE tb_supplier SET delete_flag = 1 WHERE kode_supplier = :kd";
        $this->db->query($query);
        $this->db->bind('kd', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}