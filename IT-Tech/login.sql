-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 11:07 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(200) NOT NULL,
  `nama_lengkap` varchar(45) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(35) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `foto_profile` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `no_ktp`, `alamat`, `email`, `username`, `password`, `no_tlp`, `foto_profile`) VALUES
(1, 'demon', '0404040400', '......', 'admin@root.com', 'admin', 'root', '0877665554423', '');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id_user` int(200) NOT NULL,
  `nama_lengkap` varchar(45) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(35) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `foto_profile` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id_user`, `nama_lengkap`, `no_ktp`, `alamat`, `email`, `username`, `password`, `no_tlp`, `foto_profile`) VALUES
(1, 'aditya astrio', '2147483647', 'gba2', 'borderlands68@gmail.com', 'frost', 'Frozen09', '087744132866', 'emojhon.png'),
(7, 'aaa', '1234567812345678', 'sdf', 'borderlands68@gmail.com', 'bob', '1234', '087744132866', '11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(100) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `tarif` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `kota`, `tarif`) VALUES
(1, 'bandung', 35000),
(2, 'jakarta', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(100) NOT NULL,
  `id_pembelian` int(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `jumlah_pembayaran` int(100) NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `tanggal_pembayaran`, `jumlah_pembayaran`, `bukti`) VALUES
(4, 33, 'aditya', 'mandiri', '2019-11-30', 435000, '201911300754404.jpg'),
(5, 1, 'aditya', 'mandiri', '2019-12-01', 165000, '20191201101547s2s v2.png'),
(6, 2, 'aditya', 'BRI', '2019-12-01', 415000, '20191201102052jv.2.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(100) NOT NULL,
  `id_pelanggan` int(100) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `total_pembelian` varchar(255) NOT NULL,
  `alamat_pengiriman` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `nama_kota`, `tarif`, `total_pembelian`, `alamat_pengiriman`, `status`) VALUES
(1, 1, 1, '2019-12-01', 'bandung', 35000, '165000', 'skarda n3', 'Sudah melakukan pembayaran'),
(2, 1, 2, '2019-12-01', 'jakarta', 25000, '415000', 'tomang raya', 'Sudah melakukan pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(19, 33, 62, 2),
(20, 33, 64, 1),
(21, 34, 63, 1),
(22, 34, 64, 1),
(23, 36, 60, 1),
(24, 37, 60, 1),
(25, 37, 63, 2),
(26, 38, 63, 1),
(27, 38, 64, 1),
(28, 38, 65, 1),
(29, 39, 63, 1),
(30, 39, 62, 1),
(31, 40, 62, 1),
(32, 40, 60, 1),
(33, 41, 62, 1),
(34, 42, 60, 1),
(35, 43, 62, 1),
(36, 44, 62, 3),
(37, 45, 62, 2),
(38, 1, 66, 1),
(39, 2, 66, 3);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(200) NOT NULL,
  `id_user` int(225) NOT NULL,
  `produkname` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `stok_produk` int(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `seller` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_user`, `produkname`, `price`, `stok_produk`, `description`, `seller`, `lokasi`, `foto`) VALUES
(60, 7, 'sendok', '30000', 2, 'kuat tahan banting anti karat anti nyamuk dan elegant', 'bob', 'malang', 'cover.png'),
(62, 7, 'baju', '200000', 1, 'kuat dan tahan lama', 'bob', 'makassar', '11.jpg'),
(63, 7, 'topi', '500000', 1, 'anti panas', 'bob', 'jawa tengah', '9.jpg'),
(64, 7, 'sendal', '10000', 5, 'anti maling ', 'bob', 'bandung', '11.jpg'),
(65, 1, 'mantl', '50000', 5, 'anti air', 'frost', 'jakarta', '8.jpg'),
(66, 1, 'kaos', '130000', 2, 'bahan combed 30s kuat warna tahan lama dan elastis tidak gampang sobek', 'frost', 'makassar', '81vL0zMgUzL._UX679_.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id_user` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
