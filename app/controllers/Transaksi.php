<?php

class Transaksi extends Controller
{
    public function index()
    {
        $data['judul'] = 'Transaksi';
        $data['page'] = 'transaksiIndex';
        $data['pelanggan'] = $this->model('Pelanggan_model')->getAllPelanggan();
        $data['cart-items'] = $this->model('Transaksi_model')->getAllCartItems();
        $this->view('templates/header', $data);
        $this->view('transaksi/index', $data);
        $this->view('templates/footer');
    }

    public function riwayat()
    {
        $data['judul'] = 'Riwayat Transaksi';
        $data['page'] = 'transaksiHistory';
        $data['penjualan'] = $this->model('Laporan_model')->getAllPenjualan();
        $this->view('templates/header', $data);
        $this->view('transaksi/riwayat', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['judul'] = 'Transaksi';
        $data['page'] = 'transaksiIndex';
        $data['brg'] = $this->model('Transaksi_model')->cariBarang($_POST);
        $data['pelanggan'] = $this->model('Pelanggan_model')->getAllPelanggan();
        $data['cart-items'] = $this->model('Transaksi_model')->getAllCartItems();
        $this->view('templates/header', $data);
        $this->view('transaksi/index', $data);
        $this->view('templates/footer');
    }

    public function add($id)
    {
        if ($this->model('Transaksi_model')->addToCart($id) > 0) {
            // Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        } else {
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Transaksi_model')->hapusItemCart($id) > 0) {
            // Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        }
    }

    public function cartReset()
    {
        $this->model('Transaksi_model')->resetCart();
        $this->model('Transaksi_model')->pelangganReset();
        header('Location: ' . BASEURL . '/transaksi');
        exit;
    }

    public function pilihPelanggan()
    {
        $data = $this->model('Transaksi_model')->pilihPelanggan($_POST);
        $_SESSION['idPelanggan'] = $data['id'];
        $_SESSION['namaPembeli'] = $data['nama'];
        $_SESSION['noTelp'] = $data['no_tlp'];
        header('Location: ' . BASEURL . '/transaksi');
        exit;
    }

    public function pelangganReset()
    {
        $this->model('Transaksi_model')->pelangganReset();
        header('Location: ' . BASEURL . '/transaksi');
        exit;
    }
	
    public function checkOut()
    {
        if ($this->model('Transaksi_model')->checkout($_POST) > 0) {
            $this->model('Transaksi_model')->resetCart();
            $this->model('Transaksi_model')->pelangganReset();
            $id = $this->model('Transaksi_model')->getlastid();
            $idd = $id['id_p'];
			// Pass idd to the view
			
			file_put_contents("id.txt",$idd);
            echo ("<script>
                    if (confirm('Cetak Resi?')) {
                        window.open('" . BASEURL . "/transaksi/cetakresi/" . $idd . "', '_blank');
						alert('" . BASEURL . "/transaksi/cetakresi/" . $idd . "');
						
                        location.href = '" . BASEURL . "/transaksi';
                    } else {
                    location.href = '" . BASEURL . "/transaksi';
                    }
                    </script>");
        
		} else {
            echo 'gagal';
        }
		
    }
	
	

    public function cetakresi($id)
    {
        $data['resi'] = $this->model('Laporan_model')->getResi($id);
        $this->view('transaksi/cetakResi', $data);
    }
}
