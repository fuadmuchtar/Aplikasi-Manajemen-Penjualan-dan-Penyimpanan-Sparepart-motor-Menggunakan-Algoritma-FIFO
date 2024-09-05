<?php

class Barang extends Controller{

    public $brg;
    public function index()
    {
        $data['judul'] = 'Stok Barang';
        $data['page'] = 'barangIndex';
        $data['dataSupplier'] = $this->model('Supplier_model')->getAllSupplier();
        $data['dataMerk'] = $this->model('Merk_model')->getAllMerk();
        $data['dataKategori'] = $this->model('Kategori_model')->getAllKategori();
        $data['max_code'] = $this->model('Barang_model')->getMaxCode();
        $data['brg'] = $this->model('Barang_model')->getAllBarang();
        $this->view('templates/header', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Beli Barang';
        $data['page'] = 'tambahBarang';
        $data['dataSupplier'] = $this->model('Supplier_model')->getAllSupplier();
        $data['dataMerk'] = $this->model('Merk_model')->getAllMerk();
        $data['dataKategori'] = $this->model('Kategori_model')->getAllKategori();
        $data['max_code'] = $this->model('Barang_model')->getMaxCode();
        $this->view('templates/header', $data);
        $this->view('barang/barangTambah', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['page'] = 'barangDetail';
        $data['brgbyid'] = $this->model('Barang_model')->getBarangById($id);
        $this->view('templates/header', $data);
        $this->view('barang/barangDetail', $data);
        $this->view('templates/footer');
    }

    public function in()
    {
        $data['judul'] = 'Barang Masuk';
        $data['page'] = 'barangMasuk';
        $data['brg'] = $this->model('Barang_model')->getAllBarangMasuk();
        $this->view('templates/header', $data);
        $this->view('barang/barangMasuk', $data);
        $this->view('templates/footer');
    }

    public function out()
    {
        $data['judul'] = 'Barang Keluar';
        $data['page'] = 'barangKeluar';
        $data['brg'] = $this->model('Barang_model')->getAllBarangKeluar();
        $this->view('templates/header', $data);
        $this->view('barang/barangKeluar', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if($this->model('Barang_model')->tambahDataBarang($_POST) > 0) {
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
    }

    public function tambahStok()
    {
        if($this->model('Barang_model')->tambahStokBarang($_POST) > 0) {
            header('Location: ' . BASEURL . '/barang/in');
            exit;
        }
    }

    public function delete($id)
    {
        if($this->model('Barang_model')->deleteBarang($id) > 0) {
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
    }

    public function deleteBM($id)
    {
        if($this->model('Barang_model')->deleteBarangMasuk($id) > 0) {
            header('Location: ' . BASEURL . '/barang/in');
            exit;
        }
    }

    public function edit($id)
    {
        $data['brg'] = $this->model('Barang_model')->getBarangById2($id);
        $data['dataSupplier'] = $this->model('Supplier_model')->getAllSupplier();
        $data['dataMerk'] = $this->model('Merk_model')->getAllMerk();
        $data['dataKategori'] = $this->model('Kategori_model')->getAllKategori();
        $data['judul'] = 'Edit Barang';
        $data['page'] = 'barangEdit';
        $this->view('templates/header', $data);
        $this->view('barang/barangEdit', $data);
        $this->view('templates/footer');
    }

    public function getubah()
    {
        echo json_encode($this->model('Barang_model')->getBmById($_POST['id']));
    }

    public function editStok()
    {
        if($this->model('Barang_model')->editStokBarang($_POST) > 0) {
            header('Location: ' . BASEURL . '/barang/in');
            exit;
        }
    }

    public function update()
    {
        $this->model('Barang_model')->updateBarang($_POST);
            header('Location: ' . BASEURL . '/barang');
            exit;
    }

    public function printStock()
    {
        $data['stock'] = $this->model('Barang_model')->getStokAll();
        $this->view('barang/printStock', $data);
    }
}