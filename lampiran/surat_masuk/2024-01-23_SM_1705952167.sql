-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 03:39 PM
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
-- Database: `surat2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_pegawai` int(10) NOT NULL,
  `nama_pegawai` text DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `ttl` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `pangkat` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_pegawai`, `nama_pegawai`, `nip`, `ttl`, `jenis_kelamin`, `agama`, `pangkat`, `jabatan`, `id_user`) VALUES
(7, 'H. Rakhmat Noor, M.S.I', '197310122000121002', 'Amuntai, 12 Oktober 1973', 'Laki-Laki', 'Islam', 'Pembina - IV/a', 'Wakamad Bidang Kurikulum', 2),
(8, 'Chairuddin Nur, S.Pd', '197409222006041014', 'Banjarmasin, 22 September 1974', 'Laki-Laki', 'Islam', 'Penata Tingkat I - III/d', 'Wakamad Bidang Kesiswaan', 2),
(6, 'Dra. Hj. Nana Mairi, M.Pd', '196505041994032004', 'Banjarmasin, 04 Mei 1965', 'Perempuan', 'Islam', 'Pembina Tingkat I - IV/b', 'Kepala Madrasah', 2),
(9, 'Muhammad Fajar Rivanny, S.Pd', '197405172005011005', 'Kotabaru, 17 Mei 1974', 'Laki-Laki', 'Islam', 'Pembina I - IV/a', 'Wakamad Bidang Hubungan Kemasyarakatan', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
