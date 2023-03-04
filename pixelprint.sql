-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 04:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pixelprint`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(10) NOT NULL,
  `kodebarang` varchar(10) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `harga` float(10,0) NOT NULL,
  `stok` varchar(20) NOT NULL DEFAULT '0',
  `deskripsi` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kodebarang`, `namabarang`, `harga`, `stok`, `deskripsi`, `tanggal`) VALUES
(22, 'PXL006', 'Truthear Zero', 900000, 'tersedia', 'Selama iklan masih ada barang ready', '2023-02-14 04:46:50'),
(19, 'PXL003', 'PopUp Zero two Lonte', 33333332, 'tersedia', 'Selama iklan masih ada barang ready', '2023-02-14 04:41:40'),
(20, 'PXL004', 'Truthear Hola', 330000, 'tersedia', 'Selama iklan masih ada barang ready', '2023-02-14 04:44:13'),
(13, 'PXL001', 'PopUp Parade Yotsuba Nakano', 690000, 'tersedia', 'Selama iklan masih ada barang ready', '2023-02-14 04:15:03'),
(15, 'PXL002', 'PopUp Parade Nino Nakano', 690000, 'tersedia', 'Selama iklan masih ada barang ready', '2023-02-14 04:16:27'),
(21, 'PXL005', 'Moondrop Blessing 2', 2500000, 'tersedia', 'Selama iklan masih ada barang ready', '2023-02-14 04:44:30'),
(24, 'PXL007', 'Etimotic ES2R', 800000, 'tersedia', 'Selama iklan masih ada barang ready', '2023-02-28 04:24:46'),
(25, 'PXL008', 'Tanchjim Ola Bass Edition', 522000, 'tersedia', 'Selama iklan masih ada barang ready', '2023-03-01 13:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) NOT NULL,
  `iduser` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `kodetransaksi` varchar(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `kodebarang` varchar(10) NOT NULL,
  `namabarang` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `iduser`, `name`, `kodetransaksi`, `jumlah`, `kodebarang`, `namabarang`, `alamat`, `status`) VALUES
(27, 10, 'Nino Nakano', 'TRX010', 22, 'PXL007', 'Etimotic ES2R', 'rfasasfsadfas', 0),
(28, 2, 'Madoka Higuchi', 'TRX011', 322, 'PXL008', 'Tanchjim Ola Bass Edition', 'asdsafsafsafsa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `name`, `username`, `password`, `level`) VALUES
(1, 'Meguru Hachimiya', 'meguwu', 'megurucantik', 'admin'),
(2, 'Madoka Higuchi', 'mamadoka', 'madokacantik', 'customer'),
(10, 'Nino Nakano', 'nino', 'ninocantik', 'customer'),
(11, 'Nakiri Erina', 'ewrina', 'godtongue123', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NewIndex` (`kodebarang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
