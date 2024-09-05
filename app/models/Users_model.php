<?php

class Users_model
{
    private $table = 'tb_login';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAlluser()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE delete_flag = 0');
        return $this->db->resultSet();
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function addUser($data)
    {
        $query = 'INSERT INTO tb_login VALUES("", :username, :password, :level, :nama, 0, "", "")';
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('level', $data['level']);
        $this->db->bind('nama', $data['nama']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateUser($data)
    {
        $query = 'UPDATE ' . $this->table . ' SET username = :username, password = :password, level = :level, nama = :nama, date_update = :date_update WHERE id = :id;';
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('level', $data['level']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('date_update', $data['date_update']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteUser($id)
    {
        $query = 'UPDATE ' . $this->table . ' SET delete_flag = 1 WHERE id = :id;';
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
