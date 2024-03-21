-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2024 pada 17.58
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
  `nip` varchar(50) DEFAULT NULL,
  `tgl_ns` varchar(50) DEFAULT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `alasan` varchar(50) DEFAULT NULL,
  `token_lampiran` varchar(100) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL,
  `tgl_cuti` varchar(50) DEFAULT NULL,
  `tgl_awal` varchar(50) DEFAULT NULL,
  `tgl_akhir` varchar(50) DEFAULT NULL,
  `lama` varchar(10) DEFAULT NULL,
  `dibaca` int(1) DEFAULT NULL,
  `tgl_disetujui` varchar(50) DEFAULT NULL,
  `catatan` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_cuti`
--

INSERT INTO `tbl_cuti` (`id_cuti`, `nip`, `tgl_ns`, `nama_pegawai`, `alasan`, `token_lampiran`, `id_user`, `tgl_cuti`, `tgl_awal`, `tgl_akhir`, `lama`, `dibaca`, `tgl_disetujui`, `catatan`) VALUES
(134, '197310122000121002', '22-02-2024', 'Ahmad Fauzan Pegawai', 'libur', '76ad46419aef01a4fdcd5ecea1278444', 15, '2024-02-22', '2024-02-22', '2024-02-29', '7', 2, '2024-02-22', 'mantap'),
(135, '197310122000121002', '22-02-2024', 'Ahmad Fauzan Pegawai', 'sakit', '8f78a8a6f8ff7c004b4566408bc240d9', 15, '2024-02-22', '2024-02-22', '2024-02-26', '4', 0, '2024-02-22', 'sudah ada pegawai yang mengajukan cuti di hari yang sama'),
(136, '197310122000121002', '26-02-2024', 'Ahmad Fauzan Kepsek', 'Sakit', '5d2136ce5cf51a0e543749b0209538a0', 14, '2024-02-26', '2024-02-26', '2024-02-29', '3', 1, 'undefined', NULL),
(137, '435234263453', '04-03-2024', 'Ahmad Fauzan', 'sakit hati', '84b90719886a9b880d8aa20db2579e1a', 6, '2024-03-04', '2024-03-04', '2024-03-12', '8', 1, 'undefined', NULL),
(138, '435234263453', '04-03-2024', 'Ahmad Fauzan', 'meriang', '6b75458e3d4048875c0f3ef201677a69', 6, '2024-03-04', '2024-03-04', '2024-03-12', '8', 1, 'undefined', NULL),
(139, '197310122000121002', '04-03-2024', 'Ahmad Fauzan Kepsek', 'Liburan', 'be707c25ed795c67b396d530c69da33d', 14, '2024-03-04', '2024-03-04', '2024-03-05', '1', 1, 'undefined', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_izin`
--

CREATE TABLE `tbl_izin` (
  `id_izin` int(10) NOT NULL,
  `id_siswa` int(10) DEFAULT NULL,
  `alasan` varchar(100) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `tgl_awal` varchar(50) DEFAULT NULL,
  `tgl_akhir` varchar(50) DEFAULT NULL,
  `lama` varchar(50) DEFAULT NULL,
  `token_lampiran` varchar(100) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_izin`
--

INSERT INTO `tbl_izin` (`id_izin`, `id_siswa`, `alasan`, `keterangan`, `tgl_awal`, `tgl_akhir`, `lama`, `token_lampiran`, `id_user`) VALUES
(21, 18, 'Belum gajian', 'Beasiswa KIP Kuliah Uniska', '2024-02-13', '2024-02-13', '0', '03d74158d7fc1fead931001afbdbb757', 6),
(22, 18, 'Belum gajian', 'Beasiswa KIP Kuliah Uniskas', '2024-02-19', '2024-02-19', '0', '23f932041918ca863f88d7651128bb3a', 6),
(23, 20, 'sakit', 'sakit', '2024-03-04', '2024-03-05', '1', 'acae65a24d69f595eff8fb4c9fa8c1a1', 6),
(24, 21, 'sakit', 'sakit', '2024-03-04', '2024-03-05', '1', 'adfdca3e279c1e5332ea20e3ef92b485', 6),
(25, 22, 'sakit', 'sakit', '2024-03-04', '2024-03-05', '1', 'a778f47b903c27c5351afbfd0c7f9cc7', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lampiran`
--

CREATE TABLE `tbl_lampiran` (
  `id_lampiran` int(10) NOT NULL,
  `token_lampiran` varchar(100) NOT NULL,
  `nama_berkas` varchar(100) DEFAULT NULL,
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
(154, '23f932041918ca863f88d7651128bb3a', '20240219_PG_1708355970.pdf', '662.85'),
(193, 'd2967f950b38bd5013196153043a1063', '2024-03-04_SK_1709532601.pdf', '4133.37'),
(194, '3e060688e0744894fd2d03e1ef32fcd8', '2024-03-04_SK_1709532623.sql', '20.21'),
(167, 'af568b0772bc83800d054339622c895c', '2024-02-20_CUTI_1708363503.docx', '69.92'),
(168, '03d682194f71ce565ae31d62526b1b83', '2024-02-20_CUTI_1708363652.mdj', '76.88'),
(192, '9528d257a67055f045b5c3b7b519e8fa', '2024-03-04_SK_1709532576.sql', '20.38'),
(170, 'a95222050da0b4266df40820a298dfa9', '2024-02-20_CUTI_1708364134.docx', '69.92'),
(174, '4c7ada983b1608ca9915e18d0dedcbda', '2024-02-20_CUTI_1708366086.mdj', '76.88'),
(175, '06aac46e7cd8529228ddfdcba79221b0', '2024-02-20_CUTI_1708396669.docx', '69.92'),
(176, '61b455caa98fbeb80d7744146f8ce7b1', '2024-02-20_CUTI_1708398001.docx', '6531.09'),
(177, '7e39fc465b944c527bebbac9ba4dcafa', '2024-02-21_SM_1708497783.sql', '11.97'),
(182, 'be9d1c740bb8df8237d4c03aa5253cff', '2024-02-22_CUTI_1708567470.sql', '20.21'),
(198, '2490cd18d2871087fa27ee611210327d', '20240304_PG_1709532810.sql', '20.38'),
(180, 'c19272e3a9957b2429b2b9a21908a55d', '2024-02-21_CUTI_1708498787.docx', '6531.09'),
(184, 'e2f82c18db5bf992527bbb0e90bfd605', '2024-02-22_CUTI_1708567536.sql', '20.21'),
(185, '76ad46419aef01a4fdcd5ecea1278444', '2024-02-22_CUTI_1708567606.sql', '20.21'),
(186, '8f78a8a6f8ff7c004b4566408bc240d9', '2024-02-22_CUTI_1708567618.sql', '20.21'),
(187, '5d2136ce5cf51a0e543749b0209538a0', '2024-02-26_CUTI_1708888938.sql', '11.97'),
(188, 'c249e7412e8cae0944c0642fabb8b787', '2024-03-04_SM_1709488891.docx', '3852.92'),
(189, '0b6225fc94aa2922e46c1a0119f830b2', '2024-03-04_SM_1709532370.sql', '20.96'),
(190, '5db8ec390f4bde5fbc512cf3ae9c34a2', '2024-03-04_SM_1709532439.sql', '20.96'),
(191, '850656a8700c6c52b370b165bd2ec6cf', '2024-03-04_SM_1709532482.sql', '20.96'),
(195, '05c25fad81047ddfc0fa8aeecb871490', '2024-03-04_SK_1709532647.sql', '20.96'),
(196, '2043344426c9d9c2996dcd4ee0335d66', '2024-03-04_SK_1709532676.sql', '20.96'),
(197, '3d2a24745193b9e69a16f8b90cc00803', '20240304_PG_1709532756.pdf', '4133.37'),
(199, '4491c69fd778eb48261da897079cbfa5', '20240304_PG_1709532846.sql', '20.96'),
(200, 'be843f3dd994a91e6dc77fc2a94ec4cd', '20240304_PG_1709532875.sql', '20.38'),
(201, 'cc5801c3a0cbeb8427483ad4fd88a44e', '20240304_PG_1709532909.sql', '20.38'),
(202, '84b90719886a9b880d8aa20db2579e1a', '2024-03-04_CUTI_1709532961.sql', '20.38'),
(203, '6b75458e3d4048875c0f3ef201677a69', '2024-03-04_CUTI_1709532975.pdf', '768.45'),
(204, 'acae65a24d69f595eff8fb4c9fa8c1a1', '20240304_PG_1709533043.sql', '20.38'),
(205, 'adfdca3e279c1e5332ea20e3ef92b485', '20240304_PG_1709533060.sql', '20.38'),
(206, 'a778f47b903c27c5351afbfd0c7f9cc7', '20240304_PG_1709533075.sql', '20.21'),
(207, 'be707c25ed795c67b396d530c69da33d', '2024-03-04_CUTI_1709533632.sql', '20.38');

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
  `npsn` varchar(50) DEFAULT NULL,
  `nsm` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tapel` varchar(50) DEFAULT NULL,
  `kop_1` varchar(50) DEFAULT NULL,
  `kop_2` varchar(50) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `id_user` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_madrasah`
--

INSERT INTO `tbl_madrasah` (`id`, `nm_kepala`, `nip`, `jabatan`, `madrasah`, `npsn`, `nsm`, `alamat`, `tapel`, `kop_1`, `kop_2`, `telp`, `id_user`) VALUES
(1, 'Dra. Hj. Nana Mairi, M.Pd', '196505041994032004', 'Kepala Madrasah', 'MADRASAH ALIYAH NEGERI 3 KOTA BANJARMASIN', '30315578', '131163710003\r\n', 'Jl. Batu BenawaI/61 RT. 63 Banjarmasin', '2023/2024', 'KEMENTRIAN AGAMA REPUBLIK INDONESIA', 'KANTOR KEMENTERIAN AGAMA KOTA BANJARMASIN', 'No. Telp: +62888-4365828 | Email : mantigabjm55464', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(10) NOT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
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
(15, 'Wisnuwijanarko, SP', '197310122000121002', 'Banjarmasin, 22 September 1974', 'Laki-Laki', 'Islam', 'Pembina - IV/a', 'Wakamad Bidang Kesiswaan', 6),
(16, 'Chairuddin Nur, S.Pd', '213412432524353', 'Banjarmasin, 04 Mei 1965', 'Laki-Laki', 'Islam', 'Pembina - IV/a', 'Wakamad Bidang Kesiswaan', 6),
(17, 'Muhammad Fajar Rivanny, S.Pd', '1523513321451255', 'Magetan, 13 November 1972', 'Laki-Laki', 'Islam', 'Pembina Tingkat I - IV/b', 'Wakamad Bidang Sarana dan Prasarana', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(10) NOT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `nim` varchar(50) DEFAULT NULL,
  `nisn` varchar(50) DEFAULT NULL,
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
(18, 'Anggi', '2142143523', '2143253255', 'Banjarmasin, 22 September 1974', 'Perempuan', 'Islam', 'XI', 'IPS', '0986724234235', 6),
(19, 'Riyan', '2010010146', '4214153453', 'Kandangan, 22 September 1974', 'Laki-Laki', 'Islam', 'XI', 'BAHASA', '0986724234235', 6),
(20, 'Dani', '2010010145', '2143253423', 'Kapuas, 22 September 2000', 'Laki-Laki', 'Islam', 'XI', 'IPS', '089463168141', 6),
(21, 'Gina', '2010010231', '3232532534', 'Banjarmasin, 04 Mei 1965', 'Perempuan', 'Islam', 'X', 'IPS', '0894191264812', 6),
(22, 'Hendra', '2010010145', '4343554457', 'Amuntai, 12 Oktober 1973', 'Laki-Laki', 'Islam', 'XI', 'IPA', '084913548678', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sk`
--

CREATE TABLE `tbl_sk` (
  `id_sk` int(10) NOT NULL,
  `no_sk` varchar(50) DEFAULT NULL,
  `tgl_kegiatan` varchar(50) DEFAULT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `tgl_sk` varchar(50) DEFAULT NULL,
  `perihal` varchar(50) DEFAULT NULL,
  `asal_instansi` varchar(50) DEFAULT NULL,
  `token_lampiran` varchar(100) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sk`
--

INSERT INTO `tbl_sk` (`id_sk`, `no_sk`, `tgl_kegiatan`, `no_surat`, `tgl_sk`, `perihal`, `asal_instansi`, `token_lampiran`, `id_user`) VALUES
(14, '0722', '2024-03-04', '0722/Ma.17.01-3/PP.00.6/11/2023', '2024-03-04', 'Surat Undangan Kegiatan Sosialisasi', 'MAN 3 KOTA BJM', 'd2967f950b38bd5013196153043a1063', 6),
(13, '0720', '2024-03-04', '0720/Ma.17.10-3/PP.00.6/11/2023', '2024-03-04', 'Surat Izin Pembuatan Laporan Kegiatan (PPKB) An.Pe', 'MAN 3 KOTA BJM', '9528d257a67055f045b5c3b7b519e8fa', 6),
(15, '0726', '2024-03-04', '0726/Ma.17.01-3/PP.00.6/11/2023', '2024-03-04', 'Surat Tugas Mengikuti Kegiatan MGMP Ekonomi, 3 Ora', 'MAN 3 KOTA BJM', '3e060688e0744894fd2d03e1ef32fcd8', 6),
(16, '0728', '2024-03-04', '0728/Ma.17.01-3/PP.00.6/11/2023', '2024-03-04', 'Surat Tugas Mengikuti MGMP Rumpun PAI, 13 Orang.', 'MAN 3 KOTA BJM', '05c25fad81047ddfc0fa8aeecb871490', 6),
(17, '0730', '2024-03-04', '0730/Ma.17.01-3/PP.00.6/11/2023', '2024-03-04', 'Surat Keterangan Siswa MAN 3, an. Muhammad Lathif', 'MAN 3 KOTA BJM', '2043344426c9d9c2996dcd4ee0335d66', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sm`
--

CREATE TABLE `tbl_sm` (
  `id_sm` int(10) NOT NULL,
  `no_sm` varchar(50) DEFAULT NULL,
  `tgl_ns` varchar(50) DEFAULT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `tgl_awal` varchar(50) DEFAULT NULL,
  `tgl_akhir` varchar(50) DEFAULT NULL,
  `asal_instansi` varchar(50) DEFAULT NULL,
  `perihal` varchar(50) DEFAULT NULL,
  `token_lampiran` varchar(100) DEFAULT NULL,
  `pegawai` varchar(50) DEFAULT NULL,
  `disposisi` varchar(50) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL,
  `tgl_sm` varchar(50) DEFAULT NULL,
  `lampiran` varchar(50) DEFAULT NULL,
  `dibaca` int(1) DEFAULT NULL,
  `tgl_ajuan` varchar(50) DEFAULT NULL,
  `catatan` varchar(50) DEFAULT NULL,
  `tgl_disposisi` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sm`
--

INSERT INTO `tbl_sm` (`id_sm`, `no_sm`, `tgl_ns`, `no_surat`, `tgl_awal`, `tgl_akhir`, `asal_instansi`, `perihal`, `token_lampiran`, `pegawai`, `disposisi`, `id_user`, `tgl_sm`, `lampiran`, `dibaca`, `tgl_ajuan`, `catatan`, `tgl_disposisi`) VALUES
(19, 'no S.ms', '21-02-2024', 'nomor surat', '2024-02-21', '2024-02-25', 'asal instansi surat', 'perihal', '7e39fc465b944c527bebbac9ba4dcafa', 'Guru', 'Wisnuwijanarko, SP', 6, '2024-02-21', '1', 3, '2024-03-04', 'sip', '2024-03-04 13:30:03'),
(21, '4179', '04-03-2024', '3243/fsfwefs/2156', '2024-03-01', '2024-03-31', 'kemenag', 'Kegiatan di kemenag', 'c249e7412e8cae0944c0642fabb8b787', 'Kepala Madrasah', 'Chairuddin Nur, S.Pd', 6, '2024-03-04', '2', 3, '2024-03-04', 'sip', '2024-03-04 13:29:23'),
(22, '4179', '04-03-2024', '43563534456', '2024-03-04', '2024-03-19', 'kemenag', 'kegiatan sukuran', '0b6225fc94aa2922e46c1a0119f830b2', 'Kepala TU', 'H. Rakhmat Noor, M.S.I', 6, '2024-03-04', '2', 3, '2024-03-04', 'sip', '2024-03-04 13:29:34'),
(23, '4123', '04-03-2024', '5234523652', '2024-03-04', '2024-03-04', 'kemenag', 'Apel', '5db8ec390f4bde5fbc512cf3ae9c34a2', 'Kepala Madrasah', 'H. Rakhmat Noor, M.S.I', 6, '2024-03-04', '1', 3, '2024-03-04', 'sip', '2024-03-04 13:29:42'),
(24, '4245', '04-03-2024', '1252354366', '2024-03-04', '2024-03-04', 'kemenag', 'rapat ', '850656a8700c6c52b370b165bd2ec6cf', 'Kepala TU', 'Muhammad Fajar Rivanny, S.Pd', 6, '2024-03-04', '1', 3, '2024-03-04', 'sip', '2024-03-04 13:29:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tugas`
--

CREATE TABLE `tbl_tugas` (
  `id_tugas` int(10) NOT NULL,
  `id_sm` int(10) DEFAULT NULL,
  `id_pegawai` int(10) DEFAULT NULL,
  `kegiatan` varchar(100) DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `tgl_awal` varchar(50) DEFAULT NULL,
  `tgl_akhir` varchar(50) DEFAULT NULL,
  `lama` varchar(50) DEFAULT NULL,
  `token_lampiran` varchar(100) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tugas`
--

INSERT INTO `tbl_tugas` (`id_tugas`, `id_sm`, `id_pegawai`, `kegiatan`, `lokasi`, `tgl_awal`, `tgl_akhir`, `lama`, `token_lampiran`, `id_user`) VALUES
(19, 21, 14, 'Mengikuti Kegiatan Seminar, 5 Orang.', 'Dinas Pendidikan Dan  Kebudayaan', '2024-03-04', '2024-03-04', '0', '3d2a24745193b9e69a16f8b90cc00803', 6),
(20, 23, 17, 'Pelatihan Penguatan Literasi dan Numerasi', 'Dinas Pendidikan Dan  Kebudayaan', '2024-03-04', '2024-03-04', '0', '2490cd18d2871087fa27ee611210327d', 6),
(21, 3243, 15, 'Surat Undangan Peluncuran Buku &quot;Perspektif Generasi  Genzi Terhadap Film Matahari Dari Bumi Ban', 'Universitas Terbuka', '2024-03-04', '2024-03-04', '0', '4491c69fd778eb48261da897079cbfa5', 6),
(22, 22, 16, 'Konferensi Kerja I PGRI Cabang Khusus Kementerian Agama Kota Banjarmasin', 'PGRI Cabang Khusus KEMENAG', '2024-03-04', '2024-03-04', '0', 'be843f3dd994a91e6dc77fc2a94ec4cd', 6),
(23, 22, 13, 'Hadir Pertemuan MGMP', 'MGMP Sejarah', '2024-03-04', '2024-03-04', '0', 'cc5801c3a0cbeb8427483ad4fd88a44e', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `pengalaman` varchar(100) DEFAULT NULL,
  `hoby` varchar(30) DEFAULT NULL,
  `level` enum('s_admin','admin','kepsek','pegawai') DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `tgl_daftar` varchar(20) DEFAULT NULL,
  `terakhir_login` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `nip`, `password`, `nama_lengkap`, `telp`, `alamat`, `pengalaman`, `hoby`, `level`, `status`, `tgl_daftar`, `terakhir_login`) VALUES
(15, 'Ahmad Fauzan Pegawai', '197310122000121002', 'be07b6f13e9381cd084f452cc1c80942', 'Ahmad Fauzan Pegawai', '-', '-', '-', '-', 'pegawai', 'aktif', '18-02-2024 22:07:31', '04-03-2024 12:05:41'),
(14, 'Ahmad Fauzan Kepsek', '197310122000121002', '6ac86d71b0f938e0c671caeff1ea82b5', 'Ahmad Fauzan Kepsek', '-', '-', '-', '-', 'kepsek', 'aktif', NULL, '04-03-2024 13:28:35'),
(6, 'Ahmad Fauzan Admin', '435234263453', 'e66b68f6c149d36c9332c6e7882c4fc7', 'Ahmad Fauzan', '085252269845', 'bjb', 'it', 'turue', 'admin', 'aktif', NULL, '21-03-2024 23:41:32'),
(7, 'Ahmad Fauzan S_admin', '56375376575637', '0888a28f39a3092b5002452347e0c156', 'Ahmad Fauzan', '08345345345435', 'bjm', 'webdev', 'lukis', 's_admin', 'aktif', NULL, '04-03-2024 13:27:55'),
(16, 'Ahmad Fauzan kepsek2', NULL, '7708c75784311437b442a70579a7e3d5', 'Ahmad Fauzan kepsek2', '-', '-', '-', '-', 'kepsek', 'aktif', '04-03-2024 12:41:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD PRIMARY KEY (`id_cuti`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indeks untuk tabel `tbl_izin`
--
ALTER TABLE `tbl_izin`
  ADD PRIMARY KEY (`id_izin`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_lampiran`
--
ALTER TABLE `tbl_lampiran`
  ADD PRIMARY KEY (`id_lampiran`);

--
-- Indeks untuk tabel `tbl_madrasah`
--
ALTER TABLE `tbl_madrasah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_sk`
--
ALTER TABLE `tbl_sk`
  ADD PRIMARY KEY (`id_sk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_sm`
--
ALTER TABLE `tbl_sm`
  ADD PRIMARY KEY (`id_sm`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_sm` (`id_sm`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id_cuti` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT untuk tabel `tbl_izin`
--
ALTER TABLE `tbl_izin`
  MODIFY `id_izin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tbl_lampiran`
--
ALTER TABLE `tbl_lampiran`
  MODIFY `id_lampiran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT untuk tabel `tbl_madrasah`
--
ALTER TABLE `tbl_madrasah`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbl_sk`
--
ALTER TABLE `tbl_sk`
  MODIFY `id_sk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_sm`
--
ALTER TABLE `tbl_sm`
  MODIFY `id_sm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  MODIFY `id_tugas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
