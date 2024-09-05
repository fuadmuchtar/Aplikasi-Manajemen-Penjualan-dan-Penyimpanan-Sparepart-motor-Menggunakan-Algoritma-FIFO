<?php

class BrandKategori extends Controller{
    public function index()
    {
        $data['judul'] = 'Brand dan Kategori Barang';
        $data['page'] = 'brandKategori';
        $data['merk'] = $this->model('Merk_model')->getAllMerk();
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();
        $this->view('templates/header', $data);
        $this->view('brandKategori/index', $data);
        $this->view('templates/footer');
    }

    public function merkTambah()
    {
        if($this->model('Merk_model')->tambahMerk($_POST) > 0) {
            header('Location: ' . BASEURL . '/brandKategori');
            exit;
        }
    }

    public function kategoriTambah()
    {
        if($this->model('Kategori_model')->tambahKategori($_POST) > 0) {
            header('Location: ' . BASEURL . '/brandKategori');
            exit;
        }
    }

    public function viewKategori($id)
    {
        $data['ktgbyid'] = $this->model('Kategori_model')->getKategoriById($id);
        $data['page'] = 'brandKategori';
        $this->view('templates/header', $data);
        $this->view('brandKategori/editKategori', $data);
        $this->view('templates/footer');
    }
    public function viewMerk($id)
    {
        $data['merkbyid'] = $this->model('Merk_model')->getMerkById($id);
        $data['page'] = 'brandKategori';
        $this->view('templates/header', $data);
        $this->view('brandKategori/editMerk', $data);
        $this->view('templates/footer');
    }

    public function editMerk(){
        $this->model('Merk_model')->editMerk($_POST);
        header('Location: ' . BASEURL . '/brandKategori');
        exit;
    }
    public function editKategori(){
        $this->model('Kategori_model')->editKategori($_POST);
        header('Location: ' . BASEURL . '/brandKategori');
        exit;
    }

    public function deleteMerk($id)
    {
        if ($this->model('Merk_model')->deleteMerk($id) > 0) {
            header('Location: ' . BASEURL . '/brandKategori');
            exit;            
        }
    }
    public function deleteKategori($id)
    {
        if ($this->model('Kategori_model')->deleteKategori($id) > 0) {
            header('Location: ' . BASEURL . '/brandKategori');
            exit;            
        }
    }
}