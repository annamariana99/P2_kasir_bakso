-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2025 at 08:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_anna`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan_penjualan`
--

CREATE TABLE `laporan_penjualan` (
  `id` int(11) NOT NULL,
  `kdproduk` text NOT NULL,
  `nm_produk` text NOT NULL,
  `kategori` text NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` text NOT NULL,
  `jam` text NOT NULL,
  `kasir` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kat`
--

CREATE TABLE `tb_kat` (
  `id` int(11) NOT NULL,
  `kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kat`
--

INSERT INTO `tb_kat` (`id`, `kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(11) NOT NULL,
  `kdproduk` text NOT NULL,
  `nm_produk` text NOT NULL,
  `kategori` text NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `kdproduk`, `nm_produk`, `kategori`, `stok`, `harga`) VALUES
(0, 'KD002', 'bakso halus extra pedas', 'Makanan', 50, 10000),
(0, 'KD003', 'bakso halus pedas', 'Makanan', 50, 10000),
(0, 'KD004', 'bakso halus tidak pedas', 'Makanan', 50, 10000),
(0, 'KD005', 'bakso urat isi pedas', 'Makanan', 50, 13000),
(0, 'KD006', 'bakso super pedas', 'Makanan', 100, 16000),
(0, 'KD007', 'bakso super tidak pedas', 'Makanan', 100, 16000),
(0, 'KD008', 'bakso spesial extra pedas', 'Makanan', 25, 25000),
(0, 'KD009', 'bakso spesial pedas', 'Makanan', 25, 25000),
(0, 'KD0010', 'mie ayam', 'Makanan', 30, 12000),
(0, 'KD0011', 'mie ayam bakso super', 'Makanan', 49, 23000),
(0, 'KB002', 's tee', 'Minuman', 50, 4000),
(0, 'KB003', 'es teh manis', 'Minuman', 50, 5000),
(0, 'KB004', 'air mineral botol', 'Minuman', 49, 4000),
(0, 'KB005', 'es teh tawar', 'Minuman', 20, 4000),
(0, 'KB006', 'jeruk hangat', 'Minuman', 20, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL,
  `level` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `level`, `foto`) VALUES
(11, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin Kasir ', 'admin', '522-admin logoZ.jpg'),
(13, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir', 'kasir', '967-kasir logoZ.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_temp`
--

CREATE TABLE `transaksi_temp` (
  `id` int(11) NOT NULL,
  `kdproduk` text NOT NULL,
  `nm_produk` text NOT NULL,
  `kategori` text NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_temp`
--

INSERT INTO `transaksi_temp` (`id`, `kdproduk`, `nm_produk`, `kategori`, `jumlah_beli`, `total`) VALUES
(0, 'KB005', 'es teh tawar', 'Minuman', 1, 4000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
