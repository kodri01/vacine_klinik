-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 05:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik_hamdalah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `user`, `pass`) VALUES
(5, 'Kodri', 'admin1', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `imunisasi`
--

CREATE TABLE `imunisasi` (
  `id_imunisasi` int(10) NOT NULL,
  `no_nik` bigint(30) NOT NULL,
  `tgl_imun` date NOT NULL,
  `jam_imun` time NOT NULL,
  `paket_imun` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imunisasi`
--

INSERT INTO `imunisasi` (`id_imunisasi`, `no_nik`, `tgl_imun`, `jam_imun`, `paket_imun`) VALUES
(21, 1504030303040004, '2022-06-30', '03:33:00', 'Rotavirus');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `no_nik` bigint(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` int(10) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `nama_ortu` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`no_nik`, `nama`, `tgl_lahir`, `umur`, `jenis_kelamin`, `email`, `no_telp`, `nama_ortu`, `alamat`) VALUES
(1504030303040004, 'Syamsudin', '2007-03-16', 15, 'Laki-Laki', 'udin@gmail.com', '081345464748', 'Budiman', 'Thehok'),
(1508080808080808, 'Kodri', '2001-06-20', 21, 'Laki-Laki', 'mukhtar@gmail.com', '081234567890', 'Mukhtar', 'Jambi'),
(1509090909090909, 'Mustika', '2008-12-18', 8, 'Perempuan', 'bedung@gmail.com', '082132323232', 'bedul', 'Muara Jambi'),
(1602020202020202, 'Risma', '1998-08-05', 24, 'Perempuan', 'risma@gmail.com', '087798989898', 'Resita Bedul', 'Bungo');

-- --------------------------------------------------------

--
-- Table structure for table `skrining`
--

CREATE TABLE `skrining` (
  `id_skrining` int(10) NOT NULL,
  `no_nik` bigint(30) NOT NULL,
  `suhu` int(10) NOT NULL,
  `tekanan_darah` int(10) NOT NULL,
  `quest1` varchar(10) NOT NULL,
  `quest2` varchar(10) NOT NULL,
  `quest3` varchar(10) NOT NULL,
  `quest4` varchar(10) NOT NULL,
  `quest5` varchar(10) NOT NULL,
  `quest6` varchar(10) NOT NULL,
  `quest7` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skrining`
--

INSERT INTO `skrining` (`id_skrining`, `no_nik`, `suhu`, `tekanan_darah`, `quest1`, `quest2`, `quest3`, `quest4`, `quest5`, `quest6`, `quest7`, `keterangan`) VALUES
(12, 1504030303040004, 36, 120, 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Vaksinasi diperbolehkan. '),
(13, 1509090909090909, 34, 114, 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Vaksinasi di Tunda Selama 2 Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `no_nik` bigint(30) NOT NULL,
  `no_pembayaran` int(20) NOT NULL,
  `jenis_paket` varchar(50) NOT NULL,
  `harga_paket` bigint(20) NOT NULL,
  `diskon` int(10) NOT NULL,
  `total_biaya` bigint(20) NOT NULL,
  `uang_bayar` bigint(20) NOT NULL,
  `kembalian` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_nik`, `no_pembayaran`, `jenis_paket`, `harga_paket`, `diskon`, `total_biaya`, `uang_bayar`, `kembalian`) VALUES
(14, 1508080808080808, 2147483647, '0 - 12 Bulan', 1200000, 20, 960000, 1000000, 40000),
(15, 1504030303040004, 2147483647, '0 - 6 Bulan', 350000, 10, 315000, 1000000, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `vaksin`
--

CREATE TABLE `vaksin` (
  `id_vaksin` int(10) NOT NULL,
  `no_nik` bigint(30) NOT NULL,
  `tgl_vaksin` text NOT NULL,
  `jam_vaksin` time NOT NULL,
  `paket_vaksin` varchar(30) NOT NULL,
  `fase_vaksin` varchar(30) NOT NULL,
  `dosis` varchar(15) NOT NULL,
  `no_batch` varchar(30) NOT NULL,
  `no_tiket` varchar(30) NOT NULL,
  `vaksin_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaksin`
--

INSERT INTO `vaksin` (`id_vaksin`, `no_nik`, `tgl_vaksin`, `jam_vaksin`, `paket_vaksin`, `fase_vaksin`, `dosis`, `no_batch`, `no_tiket`, `vaksin_ket`) VALUES
(6, 1602020202020202, '2022-06-24', '23:27:00', 'Pfizer', '2', 'Dosis Penuh', '3152608092776', 'ouFe6aEgyU', 'Telah diberikan Vaksin Pfizer dengan dosis 0.3ml'),
(7, 1508080808080808, '2022-06-29', '23:35:00', 'Janssen (J&J)', '2', 'Dosis Penuh', '6103370592448', '2cA3Z6bDJh', 'Telah diberikan Vaksin Janssen (J&J) Untuk Dosis Pertama');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD PRIMARY KEY (`id_imunisasi`),
  ADD KEY `no_nik` (`no_nik`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`no_nik`);

--
-- Indexes for table `skrining`
--
ALTER TABLE `skrining`
  ADD PRIMARY KEY (`id_skrining`),
  ADD KEY `no_nik` (`no_nik`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksi_ibfk_1` (`no_nik`);

--
-- Indexes for table `vaksin`
--
ALTER TABLE `vaksin`
  ADD PRIMARY KEY (`id_vaksin`),
  ADD KEY `no_nik` (`no_nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `imunisasi`
--
ALTER TABLE `imunisasi`
  MODIFY `id_imunisasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `skrining`
--
ALTER TABLE `skrining`
  MODIFY `id_skrining` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vaksin`
--
ALTER TABLE `vaksin`
  MODIFY `id_vaksin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD CONSTRAINT `imunisasi_ibfk_1` FOREIGN KEY (`no_nik`) REFERENCES `registrasi` (`no_nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skrining`
--
ALTER TABLE `skrining`
  ADD CONSTRAINT `skrining_ibfk_1` FOREIGN KEY (`no_nik`) REFERENCES `registrasi` (`no_nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`no_nik`) REFERENCES `registrasi` (`no_nik`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `vaksin`
--
ALTER TABLE `vaksin`
  ADD CONSTRAINT `vaksin_ibfk_1` FOREIGN KEY (`no_nik`) REFERENCES `registrasi` (`no_nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
