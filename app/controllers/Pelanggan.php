<?php

class Pelanggan extends Controller{
    public function index()
    {
        $data['judul'] = 'Pelanggan';
        $data['page'] = 'pelangganIndex';
        $data['pelanggan'] = $this->model('Pelanggan_model')->getAllPelanggan();
        $this->view('templates/header', $data);
        $this->view('pelanggan/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if($this->model('Pelanggan_model')->tambahDataPelanggan($_POST) > 0) {
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Pelanggan_model')->getPelangganById($_POST['id']));
    }

    public function ubah()
    {
        if($this->model('Pelanggan_model')->ubahDataPelanggan($_POST) > 0) {
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        }
    }

    public function delete($id)
    {
        if($this->model('Pelanggan_model')->deletePelanggan($id) > 0) {
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        }
    }
}
