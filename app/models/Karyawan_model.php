<?php

class Karyawan_model {
    private $table = 'tb_karyawan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getAllKaryawan()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE delete_flag = 0;');
        return $this->db->resultSet();
    }

    public function getTotalKaryawan()
    {
        $this->db->query('SELECT COUNT(id_karyawan) AS TotalKaryawan FROM tb_karyawan WHERE delete_flag = 0;');
        return $this->db->single();
    }

    public function tambahDataKaryawan($data)
    {
        $query = "INSERT INTO tb_karyawan
                    VALUES
                    ('', :nama_karyawan, :no_telpon, :alamat, 0)";
        
        $this->db->query($query);
        $this->db->bind('nama_karyawan', $data['karyawanName']);
        $this->db->bind('no_telpon', $data['notelKaryawan']);
        $this->db->bind('alamat', $data['karyawanAddress']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    
    public function getKaryawanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_karyawan = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function deleteKaryawan($id)
    {
        $query = "UPDATE tb_karyawan SET delete_flag = 1 WHERE id_karyawan = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubah($data)
    {
        $query = "UPDATE tb_karyawan SET
                    nama_karyawan = :karyawanName,
                    no_telpon = :notelKaryawan,
                    alamat = :karyawanAddress
                    WHERE id_karyawan = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('karyawanName', $data['karyawanName']);
        $this->db->bind('notelKaryawan', $data['notelKaryawan']);
        $this->db->bind('karyawanAddress', $data['karyawanAddress']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}