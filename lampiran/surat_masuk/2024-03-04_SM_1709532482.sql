-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Feb 2024 pada 18.33
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pkl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cuti`
--

CREATE TABLE `tbl_cuti` (
  `id_cuti` int(10) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `tgl_ns` varchar(12) DEFAULT NULL,
  `no_asal` text DEFAULT NULL,
  `pengirim` text DEFAULT NULL,
  `perihal` text DEFAULT NULL,
  `token_lampiran` varchar(100) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL,
  `tgl_cuti` varchar(12) DEFAULT NULL,
  `tgl_awal` varchar(12) DEFAULT NULL,
  `tgl_akhir` varchar(12) DEFAULT NULL,
  `lama` varchar(10) DEFAULT NULL,
  `dibaca` int(1) DEFAULT NULL,
  `tgl_ajuan` varchar(20) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_cuti`
--

INSERT INTO `tbl_cuti` (`id_cuti`, `nip`, `tgl_ns`, `no_asal`, `pengirim`, `perihal`, `token_lampiran`, `id_user`, `tgl_cuti`, `tgl_awal`, `tgl_akhir`, `lama`, `dibaca`, `tgl_ajuan`, `catatan`) VALUES
(113, '197310122000121002', '19-02-2024', 'undefined', 'Ahmad Fauzan Pegawai', 'a', 'a931fdbe47dcd76152500d5686a5575c', 15, '2024-02-19', '2024-02-19', '2024-02-20', '1', 2, '2024-02-19', 'a'),
(110, '197310122000121002', '19-02-2024', 'undefined', 'Ahmad Fauzan Pegawai', 'a', '980a0ff672a5dcbe9c06144e5dc6b08a', 15, '2024-02-19', '2024-02-19', '2024-02-20', '1', 1, 'undefined', NULL),
(120, '435234263453', '20-02-2024', 'undefined', 'Ahmad Fauzan', 'a', '03d682194f71ce565ae31d62526b1b83', 6, '2024-02-20', '2024-02-20', '2024-02-20', '0', 1, 'undefined', NULL),
(119, '435234263453', '20-02-2024', 'undefined', 'Ahmad Fauzan', 'a', 'af568b0772bc83800d054339622c895c', 6, '2024-02-20', '2024-02-20', '2024-02-20', '0', 1, 'undefined', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_izin`
--

CREATE TABLE `tbl_izin` (
  `id_izin` int(10) NOT NULL,
  `id_siswa` int(10) DEFAULT NULL,
  `alasan` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `tgl_awal` varchar(12) DEFAULT NULL,
  `tgl_akhir` varchar(12) DEFAULT NULL,
  `lama` varchar(10) DEFAULT NULL,
  `token_lampiran` text DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_izin`
--

INSERT INTO `tbl_izin` (`id_izin`, `id_siswa`, `alasan`, `keterangan`, `tgl_awal`, `tgl_akhir`, `lama`, `token_lampiran`, `id_user`) VALUES
(21, 18, 'Belum gajian', 'Beasiswa KIP Kuliah Uniska', '2024-02-13', '2024-02-13', '0', '03d74158d7fc1fead931001afbdbb757', 6),
(22, 18, 'Belum gajian', 'Beasiswa KIP Kuliah Uniskas', '2024-02-19', '2024-02-19', '0', '23f932041918ca863f88d7651128bb3a', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lampiran`
--

CREATE TABLE `tbl_lampiran` (
  `id_lampiran` int(10) NOT NULL,
  `token_lampiran` varchar(100) NOT NULL,
  `nama_berkas` text DEFAULT NULL,
  `ukuran` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_lampiran`
--

INSERT INTO `tbl_lampiran` (`id_lampiran`, `token_lampiran`, `nama_berkas`, `ukuran`) VALUES
(31, 'a7499a46a8b5e6eb9d2d5262d00b0b5a', '2024-01-23_SM_1705952167.sql', '2.34'),
(2, '8ebe6294441df39b737a0e73213bd82a', '2022-08-15_SK_1660574668.pdf', '100.71'),
(30, 'c0cc1a33bf45a580c788977b2f9e42b0', '2024-01-22_SM_1705941653.sql', '2.34'),
(4, 'cdc00280b6c266c15844ad3bb40c6551', '20240120_PG_1705763627.sql', '11.97'),
(5, '92469012950b57d27c5fefa7a6a73927', '20240121_PG_1705787415.sql', '11.97'),
(6, 'd304285b557dc58e6b24adafcb11f4cb', '20240121_PG_1705787763.sql', '11.97'),
(7, '8ac412522780682ef89b1d97dc11c8d4', '20240121_PG_1705812504.sql', '11.99'),
(8, '149448cff82bd9e6e64e92a59adaa2db', '20240121_PG_1705831532.sql', '11.98'),
(22, 'a447832c03fed7810caf6b8de4268b8b', '20240122_PG_1705906739.sql', '15.13'),
(21, 'fc3527404cdad391c7c352d157c99ab0', '20240122_PG_1705906706.sql', '15.13'),
(16, '09d6ad38e66b1e1e17302c0be2e966dd', '20240122_PG_1705903123.sql', '15.13'),
(23, 'b21909fa98b750dd196df42755d90e27', '20240122_PG_1705910083.sql', '15.13'),
(20, 'c599667104a5939ad4bea901ac792a6b', '20240122_PG_1705906503.sql', '15.13'),
(24, '2d5c0c34b67e53e28cbd84b3d6713016', '20240122_PG_1705910676.sql', '15.13'),
(25, 'ad42b2b8181f6e6a900c7e343e047b1e', '20240122_PG_1705932375.cs', '2.53'),
(26, 'ee6f72aca52e4f64872fd96b9224d759', '20240122_PG_1705932555.sql', '15.12'),
(27, 'e1b25ea8cbc9a2c2c59a87d059fd4f2e', '20240122_PG_1705932915.sql', '2.5'),
(28, 'aff0233731f768de262877d6154316bf', '20240122_PG_1705939720.sql', '2.34'),
(29, '48eaf61711e85e6b1f571405900a6f6c', '20240122_PG_1705940254.sql', '2.34'),
(33, '98c657d9c5b35c4cd7d8c0d28f8a8c2a', '20240123_PG_1705964651.sql', '2.34'),
(41, 'd47cc2411625a9949d263523239682d3', '20240124_PG_1706036366.pdf', '465.72'),
(36, 'c28d43723856507bcaf9c7cb9d4404a9', '20240124_PG_1706035113.pdf', '768.45'),
(39, '28a4bab1511315283d47bb9776c404d1', '2024-01-24_SM_1706036230.pdf', '465.72'),
(40, 'ed5f2c4d2ee2374e422dc5c926dc63e0', '2024-01-24_SK_1706036298.pdf', '465.72'),
(42, 'e9ac17a33917e5d6b822afde806aef7f', '20240124_PG_1706036421.pdf', '465.72'),
(43, '22e3f5696c6e0fdf23a76254be1a4064', '20240124_PG_1706036474.pdf', '465.72'),
(44, 'ec892bc1022b45ec4b58d0ff03ee8708', '2024-01-28_SM_1706460907.jpg', '23.78'),
(45, '0ec2edecba48d79bb51bd700067be5eb', '2024-01-28_SM_1706461066.png', '1373.18'),
(59, '89aa12a5c63f4907afd113302d5924cb', '2024-02-02_SM_1706847908.jpg', '23.78'),
(48, 'a7d5f109e0cf6849408590fda1e8a0d9', '2024-01-29_SM_1706507146.txt', '0.46'),
(49, 'd0b857b4c76f6d2d2f43fb03c34baa27', '2024-01-29_SM_1706507268.jpg', '23.78'),
(60, '3ead01f36cc96ec3e958a26ad281dede', '2024-02-02_SM_1706850015.png', '841.86'),
(56, '9698d6d62c1bf1e5d7f2ffb444d8b9d1', '2024-02-01_CUTI_1706782882.png', '1373.18'),
(90, '9b11c9eb6944c7ac87a4f6bf80bd7c19', '2024-02-04_CUTI_1707051434.png', '1373.18'),
(121, '20f73fd8b282ca94843c66d14328e078', '2024-02-13_CUTI_1707793684.docx', '69.92'),
(120, '7eb1f35f4d69b926fe1e09509777c50d', '2024-02-13_CUTI_1707793606.docx', '69.92'),
(58, '165ddae2741f5d13e4855adc4d63e0c9', '2024-02-02_CUTI_1706838170.png', '1373.18'),
(89, 'c81169d3010eda90472cd8381b30f091', '2024-02-04_CUTI_1707051388.pdf', '216.38'),
(76, '446d39a71a8d8ec28ae13b7b041bd65c', '2024-02-04_CUTI_1707031040.png', '1373.18'),
(84, 'fcf513c2ea2040ea82c04bb444ea983d', '2024-02-04_CUTI_1707038243.jfif', '354.41'),
(118, '03d74158d7fc1fead931001afbdbb757', '20240213_PG_1707766723.png', '1373.18'),
(94, 'e13b2e78446b62a7fd032ac81c7b3223', '2024-02-07_CUTI_1707305841.png', '1373.18'),
(97, '0e9d7d750277f3bec28d43f14f8b4eb6', '2024-02-07_CUTI_1707309453.png', '1373.18'),
(98, '7c501c0934abe80342b0b4ab6b50cde1', '2024-02-07_CUTI_1707311397.png', '1373.18'),
(102, 'd47ef87eccc962ded7d8361a1e1a8dc2', '2024-02-08_CUTI_1707326645.pptx', '176.13'),
(103, '637429dd7bac3448c23637f893493ca6', '2024-02-08_CUTI_1707327126.pptx', '175.32'),
(105, '9bc3ecbfa770b751372389586a4c1670', '2024-02-08_CUTI_1707327204.pptx', '175.32'),
(106, 'f7f41d2d0f2b3e8be347470ab6454493', '2024-02-08_CUTI_1707327988.pdf', '662.85'),
(108, '7c3a0d73a429e4b8800d27ce373b78eb', '2024-02-08_CUTI_1707328061.pptx', '68.31'),
(112, '7a41ade317262e1e38098e9e74a9102d', '2024-02-13_CUTI_1707765443.jpg', '23.78'),
(110, '0e14d3772d1cc6ff253b965258762c95', '2024-02-08_CUTI_1707328142.pptx', '68.31'),
(111, '79908dd4a6bf22e4bfd23a0d307c8dc6', '2024-02-13_CUTI_1707765340.jpg', '23.78'),
(113, 'e7b7ccaf9dd5ce7e3867e3fdbcdf5a36', '2024-02-13_CUTI_1707765455.png', '1373.18'),
(123, '14865bc28d5b973e7180fc3028644bd7', '2024-02-13_CUTI_1707793780.docx', '69.92'),
(122, '5786d7e178181ffd6a395808be96f632', '2024-02-13_CUTI_1707793771.docx', '69.92'),
(130, 'c86d881011e8732220358465130721bf', '2024-02-13_CUTI_1707795478.pptx', '343.34'),
(128, '1fe03840dbb83983f8b36c853a3b2d97', '2024-02-13_CUTI_1707795413.pptx', '175.32'),
(132, '231c306c5971d1233bdf4be188ebd2a5', '2024-02-13_CUTI_1707795557.pptx', '176.13'),
(133, '10655e57dbcdebc455314d846052f78c', '2024-02-18_CUTI_1708267551.jpg', '23.78'),
(134, 'e47433a6f6b974d7cda204c946f095f5', '2024-02-18_CUTI_1708267562.png', '1373.18'),
(141, '97af1316fc926bd677ab317fa796e4e0', '2024-02-19_CUTI_1708279368.jpg', '23.78'),
(143, 'cabca3cc69b5bdd734220631192026dc', '2024-02-19_CUTI_1708279905.png', '1373.18'),
(149, '980a0ff672a5dcbe9c06144e5dc6b08a', '2024-02-19_CUTI_1708295346.png', '841.86'),
(152, 'a931fdbe47dcd76152500d5686a5575c', '2024-02-19_CUTI_1708295726.sql', '11.97'),
(153, '80eb1756c3dda355b8e4d0ca39b46f31', '20240219_PG_1708332839.sql', '20.21'),
(154, '23f932041918ca863f88d7651128bb3a', '20240219_PG_1708355970.pdf', '662.85'),
(161, '939fe9e53ace13f56b732d917fa8699b', '2024-02-20_SK_1708362754.docx', '69.92'),
(157, '8e4b5558662a074e1378d02bfede94f1', '2024-02-19_SK_1708357463.sql', '20.21'),
(167, 'af568b0772bc83800d054339622c895c', '2024-02-20_CUTI_1708363503.docx', '69.92'),
(168, '03d682194f71ce565ae31d62526b1b83', '2024-02-20_CUTI_1708363652.mdj', '76.88'),
(160, '62aab044f8da9d7af1e305c4e312a3ff', '2024-02-19_SK_1708358199.sql', '11.97');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_madrasah`
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
-- Dumping data untuk tabel `tbl_madrasah`
--

INSERT INTO `tbl_madrasah` (`id`, `nm_kepala`, `nip`, `jabatan`, `madrasah`, `npsn`, `nsm`, `alamat`, `tapel`, `kop_1`, `kop_2`, `telp`, `id_user`) VALUES
(1, 'Dra. Hj. Nana Mairi, M.Pd', '196505041994032004', 'Kepala Madrasah', 'MADRASAH ALIYAH NEGERI 3 KOTA BANJARMASIN', '30315578', '131163710003\r\n', 'Jl. Batu BenawaI/61 RT. 63 Banjarmasin', '2023/2024', 'KEMENTRIAN AGAMA REPUBLIK INDONESIA', 'KANTOR KEMENTERIAN AGAMA KOTA BANJARMASIN', 'No. Telp: +62888-4365828 | Email : mantigabjm55464@gmail.com', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(10) NOT NULL,
  `nama_pegawai` text DEFAULT NULL,
  `nip_pegawai` varchar(30) DEFAULT NULL,
  `ttl` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `pangkat` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nama_pegawai`, `nip_pegawai`, `ttl`, `jenis_kelamin`, `agama`, `pangkat`, `jabatan`, `id_user`) VALUES
(13, 'Dra. Hj. Nana Mairi, M.Pd', '196505041994032004', 'Banjarmasin, 04 Mei 1965', 'Perempuan', 'Islam', 'Pembina Tingkat I - IV/b', 'Kepala Madrasah', 6),
(14, 'H. Rakhmat Noor, M.S.I', '197310122000121002', 'Amuntai, 12 Oktober 1973', 'Laki-Laki', 'Islam', 'Pembina - IV/a', 'Wakamad Bidang Kurikulum', 6),
(11, 'Dra. Hj. Nana Mairi, M.Pd', '196505041994032004', 'Banjarmasin, 04 Mei 1965', 'Perempuan', 'Islam', 'Pembina Tingkat I - IV/b', 'Kepala Madrasah', 12),
(15, 'H. Rakhmat Noor, M.S.I', '197310122000121002', 'Banjarmasin, 22 September 1974', 'Laki-Laki', 'Islam', 'Pembina - IV/a', 'Wakamad Bidang Kesiswaan', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(10) NOT NULL,
  `nama_siswa` text DEFAULT NULL,
  `nim` varchar(30) DEFAULT NULL,
  `nisn` varchar(30) DEFAULT NULL,
  `ttl` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `telpon` varchar(50) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nama_siswa`, `nim`, `nisn`, `ttl`, `jenis_kelamin`, `agama`, `kelas`, `jurusan`, `telpon`, `id_user`) VALUES
(17, 'ani', '21415325325', '12423532532', 'Banjarmasin, 04 Mei 1965', 'Perempuan', 'Islam', 'XI', 'IPS', '0874325235325', 12),
(18, 'Anggi', '2142143523', '2143253255', 'Banjarmasin, 22 September 1974', 'Perempuan', 'Islam', 'XI', 'IPS', '0986724234235', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sk`
--

CREATE TABLE `tbl_sk` (
  `id_sk` int(10) NOT NULL,
  `id_surat` varchar(20) DEFAULT NULL,
  `tgl_kegiatan` varchar(12) DEFAULT NULL,
  `no_surat` text DEFAULT NULL,
  `tgl_sk` varchar(12) DEFAULT NULL,
  `perihal` text DEFAULT NULL,
  `asal_instansi` varchar(100) DEFAULT NULL,
  `token_lampiran` text DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sk`
--

INSERT INTO `tbl_sk` (`id_sk`, `id_surat`, `tgl_kegiatan`, `no_surat`, `tgl_sk`, `perihal`, `asal_instansi`, `token_lampiran`, `id_user`) VALUES
(8, 'no s.k', '2024-02-19', 'no surat', '2024-02-19', 'perihal surat', 'asal instansi surat', '8e4b5558662a074e1378d02bfede94f1', 6),
(11, 'hhhhh', '2024-02-19', 'hhhhh', '2024-02-19', 'hhh', 'hhh', '62aab044f8da9d7af1e305c4e312a3ff', 6),
(12, 'c', '2024-02-20', 'c', '2024-02-20', 'c', 'c', '939fe9e53ace13f56b732d917fa8699b', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sm`
--

CREATE TABLE `tbl_sm` (
  `id_sm` int(10) NOT NULL,
  `no_surat` text DEFAULT NULL,
  `tgl_ns` varchar(12) DEFAULT NULL,
  `no_asal` text DEFAULT NULL,
  `tgl_no_asal` varchar(12) DEFAULT NULL,
  `tgl_awal` varchar(30) DEFAULT NULL,
  `tgl_akhir` varchar(30) DEFAULT NULL,
  `pengirim` text DEFAULT NULL,
  `penerima` text DEFAULT NULL,
  `perihal` text DEFAULT NULL,
  `token_lampiran` varchar(100) DEFAULT NULL,
  `pegawai` varchar(255) DEFAULT NULL,
  `disposisi` text DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL,
  `tgl_sm` varchar(12) DEFAULT NULL,
  `lampiran` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `sifat` varchar(20) DEFAULT NULL,
  `dibaca` int(1) DEFAULT NULL,
  `tgl_ajuan` varchar(20) DEFAULT NULL,
  `segera` text DEFAULT NULL,
  `biasa` text DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `tgl_disposisi` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sm`
--

INSERT INTO `tbl_sm` (`id_sm`, `no_surat`, `tgl_ns`, `no_asal`, `tgl_no_asal`, `tgl_awal`, `tgl_akhir`, `pengirim`, `penerima`, `perihal`, `token_lampiran`, `pegawai`, `disposisi`, `id_user`, `tgl_sm`, `lampiran`, `status`, `sifat`, `dibaca`, `tgl_ajuan`, `segera`, `biasa`, `catatan`, `tgl_disposisi`) VALUES
(18, '227', '02-02-2024', 'U-033/PCNU-BJM/Tanf.A.1/XI/2023', 'undefined', '2024-02-02', '2024-02-02', 'PCNU', 'undefined', 'Surat Undangan Kegiatan Seminar', '3ead01f36cc96ec3e958a26ad281dede', 'Kepala Madrasah', 'Dra. Hj. Nana Mairi, M.Pd', 6, '2024-02-01', '1', 'undefined', 'undefined', 3, '2024-02-02', NULL, NULL, 'Pelan pelan saja', '2024-02-02 12:02:01'),
(17, '002', '02-02-2024', '0752/Ma.17.01-3/PP.00.6/11/2023', 'undefined', '2024-02-02', '2024-02-02', 'MAN 3 KOTA BJM', 'undefined', 'Surat Keterangan Izin Melakukan Penelitian, an.Wilda Oktavias', '89aa12a5c63f4907afd113302d5924cb', NULL, NULL, 6, '2024-02-02', '-', 'undefined', 'undefined', 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tugas`
--

CREATE TABLE `tbl_tugas` (
  `id_tugas` int(10) NOT NULL,
  `id_sm` varchar(30) DEFAULT NULL,
  `id_pegawai` int(10) DEFAULT NULL,
  `kegiatan` varchar(100) DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `tgl_awal` varchar(12) DEFAULT NULL,
  `tgl_akhir` varchar(12) DEFAULT NULL,
  `lama` varchar(10) DEFAULT NULL,
  `token_lampiran` text DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tugas`
--

INSERT INTO `tbl_tugas` (`id_tugas`, `id_sm`, `id_pegawai`, `kegiatan`, `lokasi`, `tgl_awal`, `tgl_akhir`, `lama`, `token_lampiran`, `id_user`) VALUES
(17, '0752/Ma.17.01-3/PP.00.6/11/202', 11, 'Rekon Pembayaran Susulan Honor PPNPN Bulan Agustus 2023', 'bjm', '2024-02-19', '2024-02-29', '10', '80eb1756c3dda355b8e4d0ca39b46f31', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `pengalaman` text DEFAULT NULL,
  `hoby` varchar(100) DEFAULT NULL,
  `level` enum('s_admin','admin','kepsek','pegawai') DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `tgl_daftar` varchar(20) DEFAULT NULL,
  `terakhir_login` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `nip`, `password`, `nama_lengkap`, `telp`, `alamat`, `pengalaman`, `hoby`, `level`, `status`, `tgl_daftar`, `terakhir_login`) VALUES
(15, 'Ahmad Fauzan Pegawai', '197310122000121002', 'be07b6f13e9381cd084f452cc1c80942', 'Ahmad Fauzan Pegawai', '-', '-', '-', '-', 'pegawai', 'aktif', '18-02-2024 22:07:31', '19-02-2024 01:14:28'),
(14, 'Ahmad Fauzan Kepsek', NULL, '6ac86d71b0f938e0c671caeff1ea82b5', 'Ahmad Fauzan Kepsek', '-', '-', '-', '-', 'kepsek', 'aktif', '27-01-2024 01:26:09', '19-02-2024 13:14:30'),
(6, 'Ahmad Fauzan Admin', '435234263453', 'e66b68f6c149d36c9332c6e7882c4fc7', 'Ahmad Fauzan', '085252269845', 'bjb', 'it', 'turue', 'admin', 'aktif', NULL, '19-02-2024 21:52:56'),
(7, 'Ahmad Fauzan S_admin', '56375376575637', '0888a28f39a3092b5002452347e0c156', 'Ahmad Fauzan', '08345345345435', 'bjm', 'webdev', 'lukis', 's_admin', 'aktif', NULL, '19-02-2024 21:52:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indeks untuk tabel `tbl_izin`
--
ALTER TABLE `tbl_izin`
  ADD PRIMARY KEY (`id_izin`);

--
-- Indeks untuk tabel `tbl_lampiran`
--
ALTER TABLE `tbl_lampiran`
  ADD PRIMARY KEY (`id_lampiran`);

--
-- Indeks untuk tabel `tbl_madrasah`
--
ALTER TABLE `tbl_madrasah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tbl_sk`
--
ALTER TABLE `tbl_sk`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indeks untuk tabel `tbl_sm`
--
ALTER TABLE `tbl_sm`
  ADD PRIMARY KEY (`id_sm`);

--
-- Indeks untuk tabel `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  MODIFY `id_cuti` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT untuk tabel `tbl_izin`
--
ALTER TABLE `tbl_izin`
  MODIFY `id_izin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbl_lampiran`
--
ALTER TABLE `tbl_lampiran`
  MODIFY `id_lampiran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT untuk tabel `tbl_madrasah`
--
ALTER TABLE `tbl_madrasah`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_sk`
--
ALTER TABLE `tbl_sk`
  MODIFY `id_sk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_sm`
--
ALTER TABLE `tbl_sm`
  MODIFY `id_sm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  MODIFY `id_tugas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
