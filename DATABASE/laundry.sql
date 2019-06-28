-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 03:16 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `tipe`) VALUES
('asd', '123', 'owner'),
('qwe', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pesenan`
--

CREATE TABLE `pesenan` (
  `no_order` varchar(10) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_tlp` int(13) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `jenis_paket` varchar(20) NOT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `jumlah_kg` varchar(10) NOT NULL,
  `total` varchar(100) NOT NULL,
  `keterangan` text,
  `status_pembayaran` varchar(30) NOT NULL,
  `status_order` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesenan`
--

INSERT INTO `pesenan` (`no_order`, `nama_pelanggan`, `no_tlp`, `tanggal_masuk`, `jenis_paket`, `tanggal_keluar`, `jumlah_kg`, `total`, `keterangan`, `status_pembayaran`, `status_order`) VALUES
('P01', 'asa', 0, '0000-00-00', 'Paket Express', '0000-00-00', '5', '30000', '', 'Lunas', 'sudah diambil'),
('P02', 'beber', 0, '0000-00-00', 'Paket Express', '0000-00-00', '3', '18000', '', 'Lunas', 'sudah diambil'),
('P03', 'sutejo', 0, '0000-00-00', 'cancel', '0000-00-00', '5', '0', '', 'Lunas', 'cancel'),
('P04', 'GDGSDGSDGSD', 0, '2019-04-15', 'Paket Express', '2019-04-16', '5', '30000', '', 'Lunas', 'sudah diambil'),
('P05', 'test', 0, '0000-00-00', 'Paket Express', '0000-00-00', '', '0', '', 'Belum Bayar', 'cancel'),
('P06', 'test', 2198888, '2019-04-15', 'Paket Kilat', '2019-04-17', '1', '5000', 'asuuuuu', 'Lunas', 'sudah diambil'),
('P07', 'chck', 21, '2019-04-15', 'Paket Kilat', '2019-04-17', '2', '10000', 'oke', 'Lunas', 'sudah diambil'),
('P08', 'wess', 123, '2019-04-15', 'Paket Express', '2019-04-16', '2', '12000', '', 'Lunas', 'sudah diambil'),
('P09', 'sassa', 456, '2019-04-15', 'Paket Express', '2019-04-16', '5', '30000', '', 'Belum Bayar', 'belum diambil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pesenan`
--
ALTER TABLE `pesenan`
  ADD PRIMARY KEY (`no_order`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
