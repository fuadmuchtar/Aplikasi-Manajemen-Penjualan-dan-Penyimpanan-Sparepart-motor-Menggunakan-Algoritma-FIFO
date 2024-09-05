<?php

class Laporan extends Controller
{
    public function pembelian()
    {
        $data['judul'] = 'Laporan Pembelian';
        $data['page'] = 'pembelianIndex';
        $data['pembelian'] = $this->model('Laporan_model')->getAllPembelian();
        $this->view('templates/header', $data);
        $this->view('laporan/pembelian', $data);
        $this->view('templates/footer');
    }

    public function penjualan()
    {
        $data['judul'] = 'Laporan Penjualan';
        $data['page'] = 'penjualanIndex';
        $data['penjualan'] = $this->model('Laporan_model')->getAllPenjualan();
        $this->view('templates/header', $data);
        $this->view('laporan/penjualan', $data);
        $this->view('templates/footer');
    }

    public function getdetailpembelian()
    {
        echo json_encode($this->model('Laporan_model')->getPembelianDetail($_POST['id']));
    }

    public function getdetailpenjualan()
    {
        echo json_encode($this->model('Laporan_model')->getPenjualanDetail($_POST['id']));
    }

    public function cetakpembelian()
    {
        $data['pembelian'] = $this->model('Laporan_model')->getLaporanPembelian();
        $this->view('laporan/cetakPembelian', $data);
    }

    public function cetakpenjualan()
    {
        $data['penjualan'] = $this->model('Laporan_model')->getLaporanPenjualan();
        $this->view('laporan/cetakPenjualan', $data);
    }

    public function cetakresi($id)
    {
        $data['resi'] = $this->model('Laporan_model')->getResi($id);
        $this->view('laporan/cetakResi', $data);
    }
}
