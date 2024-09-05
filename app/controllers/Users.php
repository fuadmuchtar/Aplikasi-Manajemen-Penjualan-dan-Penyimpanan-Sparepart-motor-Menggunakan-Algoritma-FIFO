<?php

class Users extends Controller{
    public function index()
    {
        $data['judul'] = 'Kelola User';
        $data['page'] = 'user';
        $data['users'] = $this->model('Users_model')->getAllUser();
        $this->view('templates/header', $data);
        $this->view('usersmanage/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail User';
        $data['page'] = 'userdetail';
        $data['user'] = $this->model('Users_model')->getUserById($id);
        $this->view('templates/header', $data);
        $this->view('usersmanage/view', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah User';
        $data['page'] = 'useradd';
        $this->view('templates/header', $data);
        $this->view('usersmanage/tambah');
        $this->view('templates/footer');
    }

    public function add()
    {
        if($this->model('Users_model')->addUser($_POST) > 0) {
            header('Location: ' . BASEURL . '/users');
            exit;
        }
    }

    public function delete($id)
    {
        $this->model('Users_model')->deleteUser($id);
        header('location: ' . BASEURL . '/users');
        exit;
    }

    public function update()
    {
        if($this->model('Users_model')->updateUser($_POST) > 0) {
            header('Location: ' . BASEURL . '/users');
            exit;
        }
    }
    
}