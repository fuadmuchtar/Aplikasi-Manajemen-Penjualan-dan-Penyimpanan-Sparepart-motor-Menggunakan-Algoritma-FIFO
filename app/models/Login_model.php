<?php

class Login_model
{
    private $table = 'tb_login';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getLoginUser($data)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE username = :username AND password = :password");
        
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $d = $this->db->single();
        
        $cek = $this->db->rowCount();
        
        if ($cek > 0) {
            if ($d['level'] == 1) {
                $_SESSION['logged'] = true;
                $_SESSION['username'] = $d['username'];
                $_SESSION['level'] = "admin";
                $_SESSION['nama'] = $d['nama'];
                $_SESSION['waktu_login'] = date("h:i:sa");
                header('Location: ' . BASEURL . '/home');
                exit;
            } else if ($d['level'] == 2) {
                $_SESSION['logged'] = true;
                $_SESSION['idKasir'] = $d['id'];
                $_SESSION['username'] = $d['username'];
                $_SESSION['level'] = "kasir";
                $_SESSION['nama'] = $d['nama'];
                $_SESSION['waktu_login'] = date("h:i:sa");
                header('Location: ' . BASEURL . '/home');
                exit;
            } else {                
                header('Location: ' . BASEURL . '/login');
                exit;
            }
        } else {
            echo '<script>alert("Username atau Password yang anda masukkan salah")</script>';
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}