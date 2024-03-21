-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 01:40 PM
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
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuti`
--

CREATE TABLE `tbl_cuti` (
  `id_cuti` int(10) NOT NULL,
  `id_sm` varchar(30) DEFAULT NULL,
  `id_bagian` int(10) DEFAULT NULL,
  `jenis_cuti` text DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `tgl_awal` varchar(12) DEFAULT NULL,
  `tgl_akhir` varchar(12) DEFAULT NULL,
  `lama` varchar(10) DEFAULT NULL,
  `token_lampiran` text DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cuti`
--

INSERT INTO `tbl_cuti` (`id_cuti`, `id_sm`, `id_bagian`, `jenis_cuti`, `lokasi`, `tgl_awal`, `tgl_akhir`, `lama`, `token_lampiran`, `id_user`) VALUES
(1, '01.004/SMA-SM/V/2018', 1, '12312312312', '1231231231', '2024-01-21', '2024-01-21', '0', 'd304285b557dc58e6b24adafcb11f4cb', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lampiran`
--

CREATE TABLE `tbl_lampiran` (
  `id_lampiran` int(10) NOT NULL,
  `token_lampiran` varchar(100) NOT NULL,
  `nama_berkas` text DEFAULT NULL,
  `ukuran` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lampiran`
--

INSERT INTO `tbl_lampiran` (`id_lampiran`, `token_lampiran`, `nama_berkas`, `ukuran`) VALUES
(1, 'a9c95b71e504c14a62eecaf72285d31d', '2022-08-07_SM_1659884027.pdf', '122.72'),
(2, '8ebe6294441df39b737a0e73213bd82a', '2022-08-15_SK_1660574668.pdf', '100.71'),
(3, 'be1ca52dd58c1f463b1e2ef8d4565e10', '2022-08-17_SM_1660753033.pdf', '100.71'),
(4, 'cdc00280b6c266c15844ad3bb40c6551', '20240120_PG_1705763627.sql', '11.97'),
(5, '92469012950b57d27c5fefa7a6a73927', '20240121_PG_1705787415.sql', '11.97'),
(6, 'd304285b557dc58e6b24adafcb11f4cb', '20240121_PG_1705787763.sql', '11.97'),
(7, '8ac412522780682ef89b1d97dc11c8d4', '20240121_PG_1705812504.sql', '11.99'),
(8, '149448cff82bd9e6e64e92a59adaa2db', '20240121_PG_1705831532.sql', '11.98');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_madrasah`
--

CREATE TABLE `tbl_madrasah` (
  `id` int(2) NOT NULL,
  `nm_kepala` varchar(50) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `madrasah` varchar(100) DEFAULT NULL,
  `npsn` varchar(20) DEFAULT NULL,
  `nsm` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tapel` varchar(20) DEFAULT NULL,
  `kop_1` text DEFAULT NULL,
  `kop_2` text DEFAULT NULL,
  `telp` text DEFAULT NULL,
  `id_user` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_madrasah`
--

INSERT INTO `tbl_madrasah` (`id`, `nm_kepala`, `nip`, `jabatan`, `madrasah`, `npsn`, `nsm`, `alamat`, `tapel`, `kop_1`, `kop_2`, `telp`, `id_user`) VALUES
(1, 'Drs. Nam Nam, M. Pd. I.', '199909082020101004', 'Kepala Madrasah', 'Madrasah Aliyah 1 Sungai Selatan', '40142312', '151335150006', 'Jl. Solok Utara Gang 7 - Sungai Selatan', '2021/2022', 'KEMENTRIAN AGAMA REPUBLIK INDONESIA', 'KANTOR KEMENTERIAN AGAMA KABUPATEN SUNGSEL', 'Telepon (0338) 671123 - Email: office@ma1sungsel.sch.id', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
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
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nama_pegawai`, `nip`, `ttl`, `jenis_kelamin`, `agama`, `pangkat`, `jabatan`, `id_user`) VALUES
(4, 'H. Rakhmat Noor, M.S.I', '197310122000121002', 'Amuntai, 12 Oktober 1973', 'Laki-Laki', 'Islam', 'Pembina - IV/a', 'Wakamad Bidang Kurikulum', 2),
(3, 'Chairuddin Nur, S.Pd', '197409222006041014', 'Banjarmasin, 22 September 1974', 'Laki-Laki', 'Islam', 'Penata Tingkat I - III/d', 'Wakamad Bidang Kesiswaan', 2),
(5, 'Wisnuwijanarko, SP', '197211131999031007', 'Magetan, 13 November 1972', 'Laki-Laki', 'Islam', 'Pembina I - IV/a', 'Wakamad Bidang Sarana dan Prasarana', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id` int(4) NOT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `ttl` varchar(255) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `jurusan` varchar(10) DEFAULT NULL,
  `nama_orangtua` varchar(255) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `id_user` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id`, `nim`, `nisn`, `nama_siswa`, `jenis_kelamin`, `ttl`, `kelas`, `jurusan`, `nama_orangtua`, `alamat`, `telp`, `id_user`) VALUES
(6, '11111111', '1111111', '111111', 'Perempuan', '1111111', 'XI', 'IPS', '11111111', '1111111', '111111', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sk`
--

CREATE TABLE `tbl_sk` (
  `id_sk` int(10) NOT NULL,
  `no_sk` varchar(20) DEFAULT NULL,
  `tgl_kegiatan` varchar(12) DEFAULT NULL,
  `no_sm` text DEFAULT NULL,
  `tgl_sk` varchar(12) DEFAULT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `alasan` text DEFAULT NULL,
  `asal_instansi` varchar(100) DEFAULT NULL,
  `token_lampiran` text DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL,
  `pelaksana` varchar(255) DEFAULT NULL,
  `bagian` varchar(255) DEFAULT NULL,
  `peringatan` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sk`
--

INSERT INTO `tbl_sk` (`id_sk`, `no_sk`, `tgl_kegiatan`, `no_sm`, `tgl_sk`, `kode`, `alasan`, `asal_instansi`, `token_lampiran`, `id_user`, `pelaksana`, `bagian`, `peringatan`) VALUES
(1, '001', '2022-08-15', '01.004/SMA-SM/V/2018', '2022-08-15', 'PP.02', 'Pelaksanaan KSM Kabupaten', 'Kemenag Sungsel', '8ebe6294441df39b737a0e73213bd82a', 2, 'Arsip', 'Kepala TU', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ska`
--

CREATE TABLE `tbl_ska` (
  `id_ska` int(10) NOT NULL,
  `id_siswa` int(10) DEFAULT NULL,
  `nomor_ska` varchar(4) DEFAULT NULL,
  `no_ska` varchar(100) DEFAULT NULL,
  `jenis_ska` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tgl_ska` varchar(100) DEFAULT NULL,
  `id_user` int(1) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `ttd` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ska`
--

INSERT INTO `tbl_ska` (`id_ska`, `id_siswa`, `nomor_ska`, `no_ska`, `jenis_ska`, `keterangan`, `tgl_ska`, `id_user`, `date`, `ttd`) VALUES
(1, 1, '009', 'MA-SM/V/2022', '1', 'kegiatan paskibraka kabupaten', 'Sungai Selatan, 08 Agustus 2022', 2, '2022-08-17 23:15:23', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sm`
--

CREATE TABLE `tbl_sm` (
  `id_sm` int(10) NOT NULL,
  `no_sm` text DEFAULT NULL,
  `tgl_ns` varchar(12) DEFAULT NULL,
  `no_surat` text DEFAULT NULL,
  `tgl_no_surat` varchar(12) DEFAULT NULL,
  `nama_pegawai` text DEFAULT NULL,
  `penerima` text DEFAULT NULL,
  `alasan` text DEFAULT NULL,
  `token_lampiran` varchar(100) DEFAULT NULL,
  `bagian` varchar(255) DEFAULT NULL,
  `disposisi` text DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL,
  `tgl_sm` varchar(12) DEFAULT NULL,
  `lampiran` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `sifat` varchar(20) DEFAULT NULL,
  `dibaca` int(1) DEFAULT NULL,
  `tgl_disetujui` varchar(20) DEFAULT NULL,
  `segera` text DEFAULT NULL,
  `biasa` text DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `tgl_disposisi` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sm`
--

INSERT INTO `tbl_sm` (`id_sm`, `no_sm`, `tgl_ns`, `no_surat`, `tgl_no_surat`, `nama_pegawai`, `penerima`, `alasan`, `token_lampiran`, `bagian`, `disposisi`, `id_user`, `tgl_sm`, `lampiran`, `status`, `sifat`, `dibaca`, `tgl_disetujui`, `segera`, `biasa`, `catatan`, `tgl_disposisi`) VALUES
(1, '001', '07-08-2022', '01.004/SMA-SM/V/2018', '2022-07-01', 'Kemenag Sungsel', 'PP.01', 'Pelaksanaan KSM Kabupaten', 'a9c95b71e504c14a62eecaf72285d31d', 'Guru', 'Deni Kurniawan, S. Pd.', 2, '2022-08-07', '1 Lampiran', 'Asli', 'Segera', 3, '2022-08-07', 'Tindak lanjuti', 'Bicarakan dengan saya', '-', '2022-08-07 21:57:32'),
(2, '002', '17-08-2022', '01.004/SMA-SM/V/2022', '2022-08-16', 'Perpusda', 'PP.00', 'Pelaksaan Bazar Buku Pendidikan', 'be1ca52dd58c1f463b1e2ef8d4565e10', 'Kepala Perpustakaan', 'Deni Kurniawan, S. Pd.', 2, '2022-08-17', '1 Lampiran', 'Asli', 'Segera', 3, '2022-08-17', 'Tindak lanjuti<br>Setuju<br>Edarkan', 'Bicarakan dengan saya<br>Bicarakan bersama', 'Menghadap saya dan melakukan koordinasi', '2022-08-17 23:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tugas`
--

CREATE TABLE `tbl_tugas` (
  `id_tugas` int(10) NOT NULL,
  `id_sm` varchar(30) DEFAULT NULL,
  `id_pegawai` int(10) DEFAULT NULL,
  `kegiatan` text DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `tgl_awal` varchar(12) DEFAULT NULL,
  `tgl_akhir` varchar(12) DEFAULT NULL,
  `lama` varchar(10) DEFAULT NULL,
  `token_lampiran` text DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tugas`
--

INSERT INTO `tbl_tugas` (`id_tugas`, `id_sm`, `id_pegawai`, `kegiatan`, `lokasi`, `tgl_awal`, `tgl_akhir`, `lama`, `token_lampiran`, `id_user`) VALUES
(1, '01.004/SMA-SM/V/2018', 1, 'asdwadsa', 'awdsadaw', '2024-01-20', '2024-01-22', '2', 'cdc00280b6c266c15844ad3bb40c6551', 2),
(2, '01.004/SMA-SM/V/2018', 1, '1231432432', '4214214141', '2024-01-21', '2024-01-21', '0', '92469012950b57d27c5fefa7a6a73927', 2),
(3, '01.004/SMA-SM/V/2018', 2, '123123', '12312312', '2024-01-21', '2024-01-21', '0', '8ac412522780682ef89b1d97dc11c8d4', 2),
(4, '01.004/SMA-SM/V/2018', 3, 'asdawdas', 'awdasd', '2024-01-21', '2024-01-21', '0', '149448cff82bd9e6e64e92a59adaa2db', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `pengalaman` text DEFAULT NULL,
  `level` enum('s_admin','admin','user','ktu','kepala') DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `tgl_daftar` varchar(20) DEFAULT NULL,
  `terakhir_login` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama_lengkap`, `email`, `alamat`, `telp`, `pengalaman`, `level`, `status`, `tgl_daftar`, `terakhir_login`) VALUES
(3, 'user', '21232f297a57a5a743894a0e4a801fc3', 'Suharto, S. Ag.', 'user@gmail.com', 'Jl. Solok Utara Gang 7 - Sungai Selatan', '081444451251', '-', 'user', 'aktif', '07-08-2022 20:15:11', '20-01-2024 22:16:53'),
(2, 'petugas', '21232f297a57a5a743894a0e4a801fc3', 'Andreanto, S. H.', 'petugas@gmail.com', 'Jl. Solok Utara Gang 7 - Sungai Selatan', '081444451251', '-', 'admin', 'aktif', '07-08-2022 20:16:09', '21-01-2024 11:35:50'),
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@gmail.com', 'Jl. Solok Utara Gang 7 - Sungai Selatan', '081444451251', '-', 's_admin', 'aktif', '07-08-2022 17:03:12', '21-01-2024 06:00:50'),
(4, 'ktu', '21232f297a57a5a743894a0e4a801fc3', 'Sutrisno, S. Pd.', 'ktu@gmail.com', 'Jl. Solok Utara Gang 7 - Sungai Selatan', '081444451251', '-', 'ktu', 'aktif', '07-08-2022 20:14:40', '20-01-2024 22:18:59'),
(5, 'kepala', '21232f297a57a5a743894a0e4a801fc3', 'Drs. Nam Nam, M. Pd. I.', 'kepala@gmail.com', 'Jl. Solok Utara Gang 7 - Sungai Selatan', '081444451251', '-', 'kepala', 'aktif', '07-08-2022 20:12:51', '21-01-2024 04:47:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `tbl_lampiran`
--
ALTER TABLE `tbl_lampiran`
  ADD PRIMARY KEY (`id_lampiran`);

--
-- Indexes for table `tbl_madrasah`
--
ALTER TABLE `tbl_madrasah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sk`
--
ALTER TABLE `tbl_sk`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indexes for table `tbl_ska`
--
ALTER TABLE `tbl_ska`
  ADD PRIMARY KEY (`id_ska`);

--
-- Indexes for table `tbl_sm`
--
ALTER TABLE `tbl_sm`
  ADD PRIMARY KEY (`id_sm`);

--
-- Indexes for table `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  MODIFY `id_cuti` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_lampiran`
--
ALTER TABLE `tbl_lampiran`
  MODIFY `id_lampiran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_madrasah`
--
ALTER TABLE `tbl_madrasah`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_sk`
--
ALTER TABLE `tbl_sk`
  MODIFY `id_sk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ska`
--
ALTER TABLE `tbl_ska`
  MODIFY `id_ska` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sm`
--
ALTER TABLE `tbl_sm`
  MODIFY `id_sm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  MODIFY `id_tugas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
