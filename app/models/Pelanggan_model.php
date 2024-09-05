<?php

class Pelanggan_model {
    private $table = 'tb_pelanggan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getAllPelanggan()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE delete_flag = 0 AND id != 1');
        return $this->db->resultSet();
    }

    public function tambahDataPelanggan($data)
    {
        $query = "INSERT INTO tb_pelanggan
                    VALUES
                    ('', :nama, :no_tlp ,0)";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['pelangganName']);
        $this->db->bind('no_tlp', $data['notelPelanggan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getPelangganById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahDataPelanggan($data)
    {
        $query = "UPDATE tb_pelanggan SET
                    nama = :nama,
                    no_tlp = :no_tlp
                    WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['pelangganName']);
        $this->db->bind('no_tlp', $data['notelPelanggan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deletePelanggan($id)
    {
        $query = "UPDATE tb_pelanggan SET delete_flag = 1 WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }  
}