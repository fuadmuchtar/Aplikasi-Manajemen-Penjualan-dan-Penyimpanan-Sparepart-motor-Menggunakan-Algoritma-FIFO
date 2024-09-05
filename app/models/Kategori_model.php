<?php

class Kategori_model {
    private $table = 'tb_kategori';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    
    
    public function getAllKategori()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE delete_flag = 0');
        return $this->db->resultSet();
    }

    public function tambahKategori($data)
    {
        $query = "INSERT INTO ' . $this->table . '
                    VALUES
                    ('', :kategori)";
        
        $this->db->query($query);
        $this->db->bind('kategori', $data['namaKategori']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getKategoriById($id)
    {
        $this->db->query('SELECT * FROM tb_kategori WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function editKategori($data)
    {
        $query = 'UPDATE tb_kategori SET kategori = :kategori WHERE id = :id';
        $this->db->query($query);        
        $this->db->bind('kategori', $data['namaKategori']);
        $this->db->bind('id', $data['idKategori']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteKategori($id)
    {
        $query = 'UPDATE tb_kategori SET delete_flag = 1 WHERE id = :id;';
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}