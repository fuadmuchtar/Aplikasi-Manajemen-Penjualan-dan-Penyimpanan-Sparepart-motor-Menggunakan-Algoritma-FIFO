<?php

class Merk_model {
    private $table = 'tb_merk';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    
    public function getAllMerk()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE delete_flag = 0');
        return $this->db->resultSet();
    }

    public function tambahMerk($data)
    {
        $query = "INSERT INTO tb_merk
                    VALUES
                    ('', :merk, '')";
        
        $this->db->query($query);
        $this->db->bind('merk', $data['namaMerk']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getMerkById($id)
    {
        $this->db->query('SELECT * FROM tb_merk WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function editMerk($data)
    {
        $query = "UPDATE tb_merk SET merk = :merk WHERE id = :id";
        $this->db->query($query);        
        $this->db->bind('merk', $data['namaMerk']);
        $this->db->bind('id', $data['idMerk']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteMerk($id)
    {
        $query = 'UPDATE tb_merk SET delete_flag = 1 WHERE id = :id;';
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}