<?php

class Karyawan extends Controller{
    public function index()
    {
        $data['judul'] = 'Karyawan';
        $data['page'] = 'karyawanIndex';
        $data['karyawan'] = $this->model('Karyawan_model')->getAllKaryawan();
        $this->view('templates/header', $data);
        $this->view('karyawan/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if($this->model('Karyawan_model')->tambahDataKaryawan($_POST) > 0) {
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Karyawan_model')->getKaryawanById($_POST['id']));
    }
    
    public function ubah()
    {
        if($this->model('Karyawan_model')->ubah($_POST) > 0) {
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        }
    }
    public function hapus($id)
    {
        if($this->model('Karyawan_model')->deleteKaryawan($id) > 0) {
            header('Location: ' . BASEURL . '/karyawan');
            exit;
        }
    }

}
