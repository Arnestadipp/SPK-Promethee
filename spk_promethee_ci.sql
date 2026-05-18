-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Agu 2022 pada 22.51
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spk_promethee_ci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE IF NOT EXISTS `alternatif` (
`id_alternatif` int(11) NOT NULL,
  `kode_alternatif` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `kode_alternatif`, `nama`, `alamat`) VALUES
(27, 'A1', 'Sultan Alif Bakker', 'Ds. Nglayang Kec. Jenangan Kab. Ponorogo'),
(28, 'A2', 'Miftah Huwaludin', 'Ds. Brumbun Kec. Wungu Kab. Madiun'),
(29, 'A3', 'Akhmad Khoirul Amin', 'Kec. Banjarejo Kab. Madiun'),
(30, 'A4', 'Nurul Huda', 'Ds. Bacem Kec. Kebonsari Kab. Madiun'),
(31, 'A5', 'Muhammad Farihan F', 'Kec. Dolopo Kab. Madiun '),
(32, 'A6', 'Ahmad Ismail Masdjaya', 'Ds. Glonggong Kec. Dolopo Kab. Madiun'),
(33, 'A7', 'Frisca Dwi Salma Zahrotunnisa', 'Ds. Kalimalang Kec. Sukorejo'),
(34, 'A8', 'Karisma Ridhotul Dwi Anugrah', 'Ds. Tegal Ombo Kec. Kauman Kab. Ponorogo'),
(35, 'A9', 'Nafida Amalina Putri Ramadani', 'Ds. Krebet Kec. Jambon Kab. Ponorogo'),
(36, 'A10', 'Renita Nur Mahmudah', 'Ds. Gupolo Kec. Babadan'),
(37, 'A11', 'Suci Oktafiana', 'Ds. Babadan Kec. Babadan Kab. Ponorogo'),
(38, 'A12', 'Nadia Ertaleta Azzarine', 'Ds. Krajan Kec. Sidomulyo Kab. Trenggalek'),
(39, 'A13', 'Anisaul Masruroh', 'Ds. Karanggondang Kec. Purwantoro Kab. Wonogiri'),
(40, 'A14', 'Yumna Mutiara Putri', 'Kec. Slogohimo Kab. Wonogiri'),
(41, 'A15', 'Nadila Andini N', 'Ds. Ngelewan Kec. Sambit Kab. Ponorogo'),
(42, 'A16', 'Difa Aulia Sumono', 'Ds. Pupus Kec. Ngebel Kab. Ponorogo'),
(43, 'A17', 'Vitra Puji Tri Kusuma', 'Ds. Mlilir Kec. Dolopo Kab. Madiun'),
(44, 'A18', 'Eva Dwi Sri Ningrum', 'Ds. Wagir Lor Kec Ngebel Kab. Ponorogo'),
(45, 'A19', 'Yuda Saputra', 'Ds. Baosan Kidul Kec. Ngrayun Kab. Ponorogo'),
(46, 'A20', 'Mohamad Agus Fery Saputra', 'Ds. Semanding Kec. Jenangan Kab. Ponorogo'),
(47, 'A21', 'Endang Srieni', 'Kec. Kauman Kab. Ponorogo'),
(48, 'A22', 'Indra Rahwana', 'Ds.Wagir Kidul Kec. Pulung Kab. Ponorogo'),
(49, 'A23', 'Siti Devinta Salsabila', 'Ds. Banaran Kec. Pulung Kab. Ponorogo'),
(50, 'A24', 'Fernanda Nasywa Kirana', 'Ds. Jurug Kec Sooko Kab. Ponorogo'),
(51, 'A25', 'Ich Sandra Giovan', 'Ds. Bareng Kec. Pudak Kab. Ponorogo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE IF NOT EXISTS `hasil` (
`id_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_alternatif`, `nilai`, `alamat`) VALUES
(1, 27, 0.0347222, ''),
(2, 28, 0.0277778, ''),
(3, 29, -0.416667, ''),
(4, 30, -0.111111, ''),
(5, 31, 0.0833333, ''),
(6, 32, 0.388889, ''),
(7, 33, -0.111111, ''),
(8, 34, 0.0555556, ''),
(9, 35, -0.0902778, ''),
(10, 36, -0.0972222, ''),
(11, 37, -0.236111, ''),
(12, 38, 0.0625, ''),
(13, 39, 0.00694444, ''),
(14, 40, -0.0902778, ''),
(15, 41, 0.0625, ''),
(16, 42, 0.215278, ''),
(17, 43, 0.0625, ''),
(18, 44, 0.0625, ''),
(19, 45, -0.284722, ''),
(20, 46, 0.0833333, ''),
(21, 47, -0.0694444, ''),
(22, 48, 0.194444, ''),
(23, 49, -0.0902778, ''),
(24, 50, 0.0625, ''),
(25, 51, 0.194444, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
`id_kriteria` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kode_kriteria` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `keterangan`, `kode_kriteria`) VALUES
(34, 'Tes Tulis', 'K1'),
(35, 'Tes Lisan', 'K2'),
(37, 'Praktek Keagamaan', 'K3'),
(38, 'Jarak', 'K4'),
(39, 'Kondisi Rumah', 'K5'),
(40, 'Tes Kesehatan', 'K6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE IF NOT EXISTS `penilaian` (
`id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(79, 27, 34, 49),
(80, 27, 35, 60),
(82, 27, 37, 57),
(83, 27, 38, 68),
(84, 28, 34, 48),
(85, 28, 35, 60),
(87, 28, 37, 63),
(88, 28, 38, 59),
(89, 29, 34, 48),
(90, 29, 35, 51),
(92, 29, 37, 57),
(93, 29, 38, 59),
(94, 30, 34, 48),
(95, 30, 35, 60),
(97, 30, 37, 62),
(98, 30, 38, 68),
(99, 31, 34, 47),
(100, 31, 35, 60),
(102, 31, 37, 62),
(103, 31, 38, 68),
(104, 32, 34, 48),
(105, 32, 35, 61),
(107, 32, 37, 62),
(108, 32, 38, 68),
(109, 27, 39, 64),
(110, 27, 40, 66),
(111, 28, 39, 65),
(112, 28, 40, 67),
(113, 29, 39, 65),
(114, 29, 40, 67),
(115, 30, 39, 64),
(116, 30, 40, 67),
(117, 32, 39, 65),
(118, 32, 40, 66),
(119, 31, 39, 65),
(120, 31, 40, 66),
(121, 33, 34, 48),
(122, 33, 35, 60),
(123, 33, 37, 62),
(124, 33, 38, 68),
(125, 33, 39, 64),
(126, 33, 40, 67),
(127, 34, 34, 48),
(128, 34, 35, 61),
(129, 34, 37, 57),
(130, 34, 38, 68),
(131, 34, 39, 65),
(132, 34, 40, 67),
(133, 35, 34, 47),
(134, 35, 35, 60),
(135, 35, 37, 62),
(136, 35, 38, 68),
(137, 35, 39, 64),
(138, 35, 40, 66),
(139, 36, 34, 48),
(140, 36, 35, 60),
(141, 36, 37, 57),
(142, 36, 38, 68),
(143, 36, 39, 65),
(144, 36, 40, 67),
(145, 37, 34, 47),
(146, 37, 35, 51),
(147, 37, 37, 62),
(148, 37, 38, 68),
(149, 37, 39, 64),
(150, 37, 40, 66),
(151, 38, 34, 48),
(152, 38, 35, 60),
(153, 38, 37, 62),
(154, 38, 38, 59),
(155, 38, 39, 65),
(156, 38, 40, 66),
(157, 39, 34, 48),
(158, 39, 35, 61),
(159, 39, 37, 63),
(160, 39, 38, 59),
(161, 39, 39, 64),
(162, 39, 40, 67),
(163, 40, 34, 47),
(164, 40, 35, 60),
(165, 40, 37, 62),
(166, 40, 38, 59),
(167, 40, 39, 65),
(168, 40, 40, 66),
(169, 41, 34, 48),
(170, 41, 35, 60),
(171, 41, 37, 62),
(172, 41, 38, 68),
(173, 41, 39, 64),
(174, 41, 40, 66),
(175, 42, 34, 48),
(176, 42, 35, 61),
(177, 42, 37, 62),
(178, 42, 38, 68),
(179, 42, 39, 65),
(180, 42, 40, 67),
(181, 43, 34, 48),
(182, 43, 35, 60),
(183, 43, 37, 62),
(184, 43, 38, 68),
(185, 43, 39, 65),
(186, 43, 40, 67),
(187, 44, 34, 48),
(188, 44, 35, 60),
(189, 44, 37, 62),
(190, 44, 38, 68),
(191, 44, 39, 64),
(192, 44, 40, 66),
(193, 45, 34, 48),
(194, 45, 35, 60),
(195, 45, 37, 62),
(196, 45, 38, 59),
(197, 45, 39, 64),
(198, 45, 40, 67),
(199, 46, 34, 47),
(200, 46, 35, 60),
(201, 46, 37, 62),
(202, 46, 38, 68),
(203, 46, 39, 65),
(204, 46, 40, 66),
(205, 47, 34, 48),
(206, 47, 35, 51),
(207, 47, 37, 57),
(208, 47, 38, 68),
(209, 47, 39, 65),
(210, 47, 40, 66),
(211, 48, 34, 49),
(212, 48, 35, 60),
(213, 48, 37, 62),
(214, 48, 38, 68),
(215, 48, 39, 64),
(216, 48, 40, 66),
(217, 49, 34, 47),
(218, 49, 35, 60),
(219, 49, 37, 62),
(220, 49, 38, 68),
(221, 49, 39, 65),
(222, 49, 40, 67),
(223, 50, 34, 48),
(224, 50, 35, 60),
(225, 50, 37, 62),
(226, 50, 38, 59),
(227, 50, 39, 65),
(228, 50, 40, 66),
(229, 51, 34, 49),
(230, 51, 35, 60),
(231, 51, 37, 62),
(232, 51, 38, 68),
(233, 51, 39, 65),
(234, 51, 40, 67);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria`
--

CREATE TABLE IF NOT EXISTS `sub_kriteria` (
`id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `deskripsi`, `nilai`) VALUES
(47, 34, 'Nilai - (65-75)', 2),
(48, 34, 'Nilai - (76-85)', 3),
(49, 34, 'Nilai - (86-100)', 4),
(50, 34, 'Nilai - (<65)', 1),
(51, 35, 'Jawab Benar - (1-4)', 2),
(52, 35, 'Jawab Benar - (0)', 1),
(56, 37, 'Nilai - (<65)', 1),
(57, 37, 'Nilai - (65-75)', 2),
(58, 38, 'Jarak - (>50KM)', 1),
(59, 38, 'Jarak - (25KM-50KM)', 2),
(60, 35, 'Jawab Benar - (5-7)', 3),
(61, 35, 'Jawab Benar - (8-10)', 4),
(62, 37, 'Nilai - (76-85)', 3),
(63, 37, 'Nilai - (86-100)', 4),
(64, 39, 'Layak', 1),
(65, 39, 'Kurang Layak', 2),
(66, 40, 'Kurang Baik (Mempunyai Riwayat Sakit)', 2),
(67, 40, 'Baik', 1),
(68, 38, 'Jarak - (<25KM)', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_user_level`, `nama`, `email`, `username`, `password`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(7, 2, 'User', 'user@gmail.com', 'user', 'ee11cbb19052e40b07aac0ca060c23ee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE IF NOT EXISTS `user_level` (
`id_user_level` int(11) NOT NULL,
  `user_level` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'Administrator'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
 ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
 ADD PRIMARY KEY (`id_hasil`), ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
 ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
 ADD PRIMARY KEY (`id_penilaian`), ADD KEY `id_alternatif` (`id_alternatif`), ADD KEY `id_kriteria` (`id_kriteria`), ADD KEY `nilai` (`nilai`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
 ADD PRIMARY KEY (`id_sub_kriteria`), ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`), ADD KEY `id_user_level` (`id_user_level`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
 ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=235;
--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil`
--
ALTER TABLE `hasil`
ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`nilai`) REFERENCES `sub_kriteria` (`id_sub_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_level`) REFERENCES `user_level` (`id_user_level`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
