-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 03:02 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdbdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_izin`
--

CREATE TABLE `tbl_izin` (
  `id_cuti` int(10) NOT NULL,
  `id_sm` varchar(30) DEFAULT NULL,
  `id_pegawai` int(10) DEFAULT NULL,
  `alasan` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `tgl_awal` varchar(12) DEFAULT NULL,
  `tgl_akhir` varchar(12) DEFAULT NULL,
  `lama` varchar(10) DEFAULT NULL,
  `token_lampiran` text DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_izin`
--

INSERT INTO `tbl_izin` (`id_cuti`, `id_sm`, `id_pegawai`, `alasan`, `keterangan`, `tgl_awal`, `tgl_akhir`, `lama`, `token_lampiran`, `id_user`) VALUES
(1, '01.004/SMA-SM/V/2018', 1, '12312312312', '1231231231', '2024-01-21', '2024-01-21', '0', 'd304285b557dc58e6b24adafcb11f4cb', 2),
(5, '01.004/SMA-SM/V/2018', 3, '88888888888', '888888888888', '2024-01-22', '2024-01-22', '0', 'c599667104a5939ad4bea901ac792a6b', 2),
(6, 'undefined', 4, 'aaaaaaa', 'aaaaaaaa', '2024-01-22', '2024-01-22', '0', 'fc3527404cdad391c7c352d157c99ab0', 2),
(7, 'undefined', 4, '222222222', '222222222', '2024-01-22', '2024-01-22', '0', 'a447832c03fed7810caf6b8de4268b8b', 2),
(8, 'undefined', 3, '2424242424', '24242424', '2024-01-22', '2024-01-22', '0', 'b21909fa98b750dd196df42755d90e27', 2),
(9, 'undefined', 4, 'Belum gajian', 'Beasiswa KIP Kuliah Uniskas', '2024-01-22', '2024-01-22', '0', '2d5c0c34b67e53e28cbd84b3d6713016', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_izin`
--
ALTER TABLE `tbl_izin`
  ADD PRIMARY KEY (`id_cuti`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_izin`
--
ALTER TABLE `tbl_izin`
  MODIFY `id_cuti` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
