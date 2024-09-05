<?php

class Supplier extends Controller{
    public function index()
    {
        $data['judul'] = 'Supplier Toko';
        $data['page'] = 'supplierIndex';
        $data['spl'] = $this->model('Supplier_model')->getAllSupplier();
        $data['max_code'] = $this->model('Supplier_model')->getMaxCode();
        $this->view('templates/header', $data);
        $this->view('supplier/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if($this->model('Supplier_model')->tambahDataSupplier($_POST) > 0) {
            header('Location: ' . BASEURL . '/supplier');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Supplier_model')->getSupplierByKd($_POST['kd']));
    }

    public function ubah()
    {
        if($this->model('Supplier_model')->ubahDataSupplier($_POST) > 0) {
            header('Location: ' . BASEURL . '/supplier');
            exit;
        }
    }

    public function delete($id)
    {
        if($this->model('Supplier_model')->deleteSupplier($id) > 0) {
            header('Location: ' . BASEURL . '/supplier');
            exit;
        }
    }
}
