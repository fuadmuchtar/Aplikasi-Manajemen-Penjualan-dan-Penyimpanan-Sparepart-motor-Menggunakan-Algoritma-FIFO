<?php

class Home extends Controller{
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['page'] = 'homeIndex';
        
        $data['totalbarang'] = $this->model('Barang_model')->getTotalBarang();
        $data['totalstok'] = $this->model('Barang_model')->getTotalStok();
        $data['totalbarangkeluar'] = $this->model('Barang_model')->getTotalBarangKeluar();        
        $data['totalkaryawan'] = $this->model('Karyawan_model')->getTotalKaryawan();
        $data['totalsupplier'] = $this->model('Supplier_model')->getTotalSupplier();
        $data['totalinvoice'] = $this->model('Transaksi_model')->getTotalInvoice();

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}