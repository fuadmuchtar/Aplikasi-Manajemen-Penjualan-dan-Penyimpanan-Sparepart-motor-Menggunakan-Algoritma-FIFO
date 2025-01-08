-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2024 at 03:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_temp`
--

CREATE TABLE `cart_temp` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_temp`
--

INSERT INTO `cart_temp` (`id`, `kode_barang`) VALUES
(1, 'BRG001'),
(2, 'BRG003'),
(3, 'BRG005');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kode_supplier` varchar(20) NOT NULL,
  `kategori_id` int(10) NOT NULL,
  `merk_id` int(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `model` text NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `harga_beli` bigint(20) NOT NULL DEFAULT 0,
  `harga_jual` bigint(20) NOT NULL DEFAULT 0,
  `total` bigint(20) NOT NULL DEFAULT 0,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `tanggal_barang` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `kode_barang`, `nama_barang`, `kode_supplier`, `kategori_id`, `merk_id`, `deskripsi`, `model`, `stok`, `harga_beli`, `harga_jual`, `total`, `delete_flag`, `tanggal_barang`) VALUES
(9, 'BRG001', 'ENDURO 4T 20W-50 API SL JASO MA, 24X0,8L', 'Supplier-001', 12, 7, 'Oli Motor Pertamina - ENDURO4T20W-50APISLJASOMA,24X0,8L Kode Produk: A070207415 Kategori: Oli ENDURO 4T SAE 20W-50 adalah oli pelumas berkualitas tinggi yang diformulasikan dari oli dasar mineral berkualitas tinggi dan aditif pilihan, yang didesain khusus untuk sepeda motor empat tak. ENDURO 4T SAE 20W-50 tersedia dalam Vol 1L dan 0.8L (dapat dicek di etalase kami). ENDURO 4T SAE 20W-50 adalah produk multigrad yang stabil dengan karakteristik temperatur rendah dan tinggi yang baik. TINGKATAN MUTU ENDURO 4T SAE 20W-50 memenuhi tingkat kinerja API SJ dan JASO MA (disetujui). KEUNGGULAN 1. Memiliki viskositas yang stabil baik pada suhu rendah maupun tinggi, memberikan permulaan yang mudah dan memberikan pelumasan yang optimal pada operasi suhu &amp; kecepatan tinggi. 2. Mencegah selip kopling basah. 3. Stabilitas oksidasi dan degradasi yang sangat baik di bawah paparan suhu operasi tinggi. 4. Menjaga mesin tetap bersih dan memberikan interpretasi yang sangat baik terhadap pembentukan deposit piston. 5. Memberikan perlindungan optimal terhadap karat dan keausan yang berlebihan. PENGGUNAAN ENDURO 4T SAE 20W-50 sangat direkomendasikan untuk mesin motor empat tak seperti Honda, Suzuki, Kawasaki, Yamaha, dan sepeda motor lainnya. Oli ini juga cocok untuk mesin motor empat tak buatan China dan Korea. Oli motor 100% asli/original Pertamina. Pastikan Anda membeli dan menggunakan oli motor yang berkualitas Sebelum memesan, mohon konfirmasi stok terlebih dahulu. MOHON DIPERHATIKAN: Sebelum membuka paket harap lakukan pengambilan video untuk syarat penukaran/pengembalian barang. Jika terjadi kerusakan/barang cacat/barang tidak sesuai/barang kurang. Segala macam klaim yang tidak disertakan video dianggap tidak sah/tidak dilayani / tidak dapat kami proses.', '', 39, 43000, 64500, 860000, 0, '2024-09-02 18:44:00'),
(10, 'BRG002', 'GRIPCOMPTHROTTLE', 'Supplier-001', 9, 15, 'Nama Produk: Grip Comp Throttle Kode Produk: 53140K44V00 Kategori: Stang Stir (Steering Handle) Produk ini bisa digunakan oleh motor: BeAT dan BeAT Street K1A (2020 - Sekarang) BeAT POP eSP K61 (2014 - 2019) BeAT Sporty eSP K25G (2014 - 2016) BeAT Sporty eSP K81 (2016 - 2020) Scoopy eSP K93 (2017 - 2020) Vario 125 eSP K60 (2015 - 2018) Vario 150 eSP K59 (2015 - 2018) Suku cadang 100% asli/original Honda AHM (Honda Genuine Parts). Pastikan Anda membeli dan menggunakan suku cadang asli Honda yang sudah terjamin kualitasnya. Sebelum memesan, mohon konfirmasi stok terlebih dahulu. MOHON DIPERHATIKAN: Sebelum membuka paket harap lakukan pengambilan video untuk syarat penukaran/pengembalian barang. Jika terjadi kerusakan/barang cacat/barang tidak sesuai/barang kurang. Segala macam klaim yang tidak disertakan video dianggap tidak sah/tidak dilayani / tidak dapat kami proses.', '', 37, 11500, 17250, 172500, 0, '2024-09-02 18:46:00'),
(11, 'BRG003', 'BATTERY GTZ5S GS', 'Supplier-003', 14, 15, '', '', 20, 248000, 372000, 4960000, 0, '2024-09-02 18:49:00'),
(12, 'BRG004', 'fghfhg', 'Supplier-001', 12, 7, '', '', 0, 0, 0, 0, 1, '2024-09-04 13:31:00'),
(13, 'BRG005', 'Spion', 'Supplier-002', 9, 7, '', '', 10, 35000, 52500, 350000, 0, '2024-09-05 01:26:00');

--
-- Triggers `tb_barang`
--
DELIMITER $$
CREATE TRIGGER `trigger_tambah_barang` AFTER INSERT ON `tb_barang` FOR EACH ROW BEGIN
	INSERT INTO tb_barang_masuk (id, kode_barang, qty, qty_history, harga_beli, total, total_update, delete_flag, tanggal_barang_masuk, barcode) VALUES ('', new.kode_barang, new.stok, new.stok, new.harga_beli, new.total, new.total, 0, new.tanggal_barang, CAST((RAND() * (89999) + 10000) as int));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `qty` int(15) NOT NULL,
  `qty_history` int(15) DEFAULT NULL,
  `harga_beli` bigint(20) NOT NULL DEFAULT 0,
  `total` bigint(20) NOT NULL,
  `total_update` bigint(20) NOT NULL DEFAULT 0,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `tanggal_barang_masuk` timestamp NOT NULL DEFAULT current_timestamp(),
  `barcode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id`, `kode_barang`, `qty`, `qty_history`, `harga_beli`, `total`, `total_update`, `delete_flag`, `tanggal_barang_masuk`, `barcode`) VALUES
(1, 'BRG001', 14, 20, 43000, 860000, 602000, 0, '2024-09-02 18:44:00', 48941),
(2, 'BRG002', 12, 15, 11500, 172500, 138000, 0, '2024-09-02 18:46:00', 35189),
(3, 'BRG001', 20, 20, 43000, 860000, 860000, 0, '2024-09-02 18:48:00', 26491),
(4, 'BRG003', 20, 20, 248000, 4960000, 0, 0, '2024-09-02 18:49:00', 98462),
(5, 'BRG002', 25, 25, 11500, 287500, 287500, 0, '2024-09-04 12:54:00', 45871),
(6, 'BRG004', 0, 0, 0, 0, 0, 1, '2024-09-04 13:31:00', 25945),
(7, 'BRG001', 5, 5, 43000, 215000, 215000, 0, '2024-09-05 01:25:00', 34134),
(8, 'BRG005', 10, 10, 35000, 350000, 350000, 0, '2024-09-05 01:26:00', 55287);

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(25) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `delete_flag` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama_karyawan`, `no_telpon`, `alamat`, `delete_flag`) VALUES
(1, 'Agus', '23423', 'adsasd', 1),
(2, 'Anwar', '8465', 'bekasi', 1),
(3, 'Rivaldi', '084568451235', 'Jl. Menteng No V\r\nJakarta Timur', 0),
(5, 'ABC', '0846', '123', 1),
(6, 'Abdur', '045669874', 'Jalan Dipenogoro\r\nPapua\r\nIndonesia', 1),
(7, '05164', '056849494', 'asdasdqw', 1),
(8, 'Bejo', '089752451864', 'Jl Ahmad Yani\r\nKota Bekasi', 0),
(9, 'Agus', '082245678451', 'Graha Indah\r\nJati Asih Pondok Gede Kota Bekasi', 0),
(10, 'Ronaldo Maldini', '085645687945', 'Jl. Mangga Besar No. 15 Rt. 3 Rw. 5\r\nGalaxy\r\nBekasi Barat', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `kategori`, `delete_flag`) VALUES
(8, 'Aksesoris', 0),
(9, 'Parts Body', 0),
(10, 'Chasiss', 0),
(11, 'Part Mesin', 0),
(12, 'Oli', 0),
(13, 'Ban', 0),
(14, 'Alat-alat', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(2) NOT NULL DEFAULT 1,
  `nama` varchar(20) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_add` datetime NOT NULL DEFAULT current_timestamp(),
  `date_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `password`, `level`, `nama`, `delete_flag`, `date_add`, `date_update`) VALUES
(1, 'admin', 'admin', 1, 'Fuad Muchtar', 0, '2024-07-16 11:20:01', '2024-08-28 07:46:34'),
(2, 'kasir', 'kasir', 2, 'Agus', 0, '2024-07-16 16:59:56', '2024-07-16 11:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_merk`
--

CREATE TABLE `tb_merk` (
  `id` int(11) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_merk`
--

INSERT INTO `tb_merk` (`id`, `merk`, `delete_flag`) VALUES
(1, 'Yamaha', 0),
(2, 'Honda', 0),
(3, 'Suzuki', 0),
(5, 'Kawasaki', 0),
(6, 'AHM', 0),
(7, 'Pertamina', 0),
(8, 'OEM', 0),
(15, 'Lainnya', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id`, `nama`, `no_tlp`, `delete_flag`) VALUES
(1, '-', '', 0),
(3, 'Fuad Muchtar', '085549876540', 0),
(4, 'Abdul', '0564654', 1),
(5, 'Muhammad Zainuddin', '085155409948', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_p` int(11) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL,
  `tggl_transaksi` date NOT NULL,
  `id_pelanggan` int(10) NOT NULL DEFAULT 1,
  `id_kasir` int(10) NOT NULL,
  `total_penjualan` bigint(20) NOT NULL,
  `total_pembayaran` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_p`, `id_transaksi`, `tggl_transaksi`, `id_pelanggan`, `id_kasir`, `total_penjualan`, `total_pembayaran`) VALUES
(43, 'INV-20240904-4681', '2024-09-04', 1, 2, 64500, 64500),
(44, 'INV-20240904-2990', '2024-09-04', 1, 2, 193500, 193500),
(45, 'INV-20240904-4123', '2024-09-04', 1, 2, 180750, 180750);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan_detail`
--

CREATE TABLE `tb_penjualan_detail` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `jumlah_pembelian` int(12) NOT NULL,
  `harga_satuan` bigint(20) DEFAULT 0,
  `total_harga` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penjualan_detail`
--

INSERT INTO `tb_penjualan_detail` (`id`, `id_transaksi`, `kode_barang`, `jumlah_pembelian`, `harga_satuan`, `total_harga`) VALUES
(47, 'INV-20240904-4681', 'BRG001', 1, 64500, 64500),
(48, 'INV-20240904-2990', 'BRG001', 3, 64500, 193500),
(49, 'INV-20240904-4123', 'BRG001', 2, 64500, 129000),
(50, 'INV-20240904-4123', 'BRG002', 3, 17250, 51750);

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `kode_supplier` varchar(20) NOT NULL,
  `nama_supplier` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(30) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`kode_supplier`, `nama_supplier`, `alamat`, `kontak`, `delete_flag`) VALUES
('Supplier-001', 'KlikNSS', 'Gedung The Victoria Lantai 5-6\r\nJl. Tomang Raya Kav. 35-37, RT.12/RW.5\r\nTomang, Kec. Grogol Petamburan\r\nJakarta Barat', '081222233845', 0),
('Supplier-002', 'PT. Dirgaputra Ekapratama', 'PT. Dirgaputra Ekapratama\r\nJl. Pulobuaran Raya Blok EE Kav. I No. 4\r\nKawasan Industri Pulogadung\r\nJakarta', '02146826631', 0),
('Supplier-003', 'Mass Metalindo', 'Jl HOS Cokroaminoto no 24\r\nKec. Karang Tengah, Kel. Karang Timur\r\nKota Tangerang', 'massmetalindo.com', 0),
('Supplier-004', 'PT Niterra Mobility', 'Jl. Raya Jakarta – Bogor Km 26,6 Jakarta 13740', '0218710974\r\nmarketing@ngkbusi.', 0),
('Supplier-005', 'PT Maju Terus', 'Jl. Maju aja jangan mundur mundur', '0214875123\r\nmaju@terus.com', 1),
('Supplier-006', 'huig', 'yugyugvu', 'jhnb hjvj', 0),
('Supplier-007', '5456', 'jhjjv', '465', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_temp`
--
ALTER TABLE `cart_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_merk`
--
ALTER TABLE `tb_merk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `tb_penjualan_detail`
--
ALTER TABLE `tb_penjualan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`kode_supplier`),
  ADD UNIQUE KEY `kode_supplier` (`kode_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_temp`
--
ALTER TABLE `cart_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_merk`
--
ALTER TABLE `tb_merk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_penjualan_detail`
--
ALTER TABLE `tb_penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD CONSTRAINT `tb_barang_masuk_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `tb_barang` (`kode_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
