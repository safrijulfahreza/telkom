-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24 Apr 2020 pada 06.42
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telkom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `input`
--

CREATE TABLE `input` (
  `id` int(11) NOT NULL,
  `nomor_tiket` varchar(128) NOT NULL,
  `status` varchar(15) NOT NULL,
  `layanan` varchar(11) NOT NULL,
  `segmen` varchar(11) NOT NULL,
  `teknisi1` varchar(128) NOT NULL,
  `teknisi2` varchar(128) NOT NULL,
  `helpdesk` varchar(128) NOT NULL,
  `sto` varchar(11) NOT NULL,
  `alpro` varchar(11) NOT NULL,
  `perbaikan` varchar(128) NOT NULL,
  `keterangan` varchar(130) NOT NULL,
  `tgl_input` timestamp NULL DEFAULT NULL,
  `tgl_update` timestamp NULL DEFAULT NULL,
  `sleeve` int(11) DEFAULT NULL,
  `adaptor` int(11) DEFAULT NULL,
  `precon50` int(11) DEFAULT NULL,
  `precon75` int(11) DEFAULT NULL,
  `precon100` int(11) DEFAULT NULL,
  `precon150` int(11) DEFAULT NULL,
  `ps1:4` int(11) DEFAULT NULL,
  `ps1:8` int(11) DEFAULT NULL,
  `pigtail` int(11) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `input`
--

INSERT INTO `input` (`id`, `nomor_tiket`, `status`, `layanan`, `segmen`, `teknisi1`, `teknisi2`, `helpdesk`, `sto`, `alpro`, `perbaikan`, `keterangan`, `tgl_input`, `tgl_update`, `sleeve`, `adaptor`, `precon50`, `precon75`, `precon100`, `precon150`, `ps1:4`, `ps1:8`, `pigtail`, `image`) VALUES
(1, 'NJM124572', 'CLOSE', 'METRO E', 'DGS', 'Saykoji', 'Ahmad Sahnan', 'Safrijul Fahreza', 'GLG', 'FO', 'GAMAS BACKBONE', 'Testing aja', '2019-08-24 17:00:00', '2020-02-15 16:35:25', 3, 2, 2, 3, 4, 3, 1, 5, 7, ''),
(2, 'MDN10092847', 'PENDING', 'METRO E', 'DBS', 'Saykoji', 'Test', 'Safrijul Fahreza', 'DLT', 'FO', 'CATUAN LISTRIK PELANGGAN BERMASALAH', 'hggaghavas', '2019-08-24 18:49:58', '2020-02-15 16:35:33', 3, 6, 3, 6, 4, 2, 5, 2, 6, ''),
(5, 'MDN10938426', 'GAMAS', 'VPN IP', 'DES', 'Black Mamba', 'Saykoji', 'Safrijul Fahreza', 'SPM', 'COOPER', 'BAIK SENDIRI / CALL OK', 'vgjckjgkgjvj', '2019-08-24 19:19:53', '2020-02-15 16:35:41', 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(6, 'JKT18724739027', 'CLOSE', 'VPN IP', 'DGS', 'Saykoji', 'Test', 'Safrijul Fahreza', 'SKI', 'FO', 'KABEL ADAPTOR MODEM/ONT RUSAK', 'mhgcghcghg', '2019-08-24 19:22:41', '2020-02-15 16:35:53', 1, 3, 0, 5, 0, 0, 0, 0, 0, ''),
(7, 'MTK82784732', 'CLOSE', 'VPN IP', 'DGS', 'Saykoji', 'Black Mamba', 'Safrijul Fahreza', 'DLT', 'COOPER', 'KABEL DROP CORE PUTUS', 'Rusak', '2019-08-25 08:23:54', '2020-02-15 16:36:16', 1, 0, 0, 0, 0, 0, 0, 10, 6, ''),
(8, 'JKT46872834', 'CLOSE', 'METRO E', 'DGS', 'Test', 'Black Mamba', 'Black Mamba', 'TJR', 'FO', 'KONFIGURASI ULANG (CONFIG ULANG)', '', '2019-08-27 11:12:39', '2020-02-15 16:36:25', 2, 2, 0, 0, 0, 0, 0, 0, 0, ''),
(9, 'JKL899823747', 'CLOSE', 'METRO E', 'DBS', 'Saykoji', 'Test', 'Ahmad Sahnan', 'SKI', 'FO', 'BAIK SENDIRI / CALL OK', '', '2019-08-28 10:28:37', '2020-02-15 16:36:34', 3, 2, 2, 1, 1, 1, 2, 1, 1, ''),
(10, 'KJL773929', 'IN TECHNICIAN', 'ASTINET', 'DES', 'Black Mamba', 'Saykoji', 'Safrijul Fahreza', 'DLT', 'FO', 'PORT SPLITTER DI ODP', '', '2020-02-15 16:40:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id` int(11) NOT NULL,
  `subsegmen` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perbaikan`
--

INSERT INTO `perbaikan` (`id`, `subsegmen`) VALUES
(1, 'ALAMAT TIDAK DITEMUKAN'),
(2, 'BAIK SENDIRI / CALL OK'),
(3, 'BUKA ISOLIR'),
(4, 'CATUAN LISTRIK PELANGGAN BERMASALAH'),
(5, 'CPE PELANGGAN BERMASALAH'),
(6, 'DEGRADASI COOPER'),
(7, 'GAMAS BACKBONE'),
(8, 'GAMAS DISTRIBUSI'),
(9, 'GAMAS FEEDER'),
(10, 'GAMAS PRIMER'),
(11, 'GAMAS SEKUNDER'),
(12, 'IKR/G BERMASALAH'),
(13, 'JUMPER DI MSAN / RK'),
(14, 'JUMPER MSAN / RK'),
(15, 'KABEL ADAPTOR MODEM / ONT RUSAK'),
(16, 'KABEL ADAPTOR MODEM/ONT RUSAK'),
(17, 'KABEL DROP CORE PUTUS'),
(18, 'KABEL DW PUTUS'),
(19, 'KABEL LAN BERMASALAH'),
(20, 'KONEKTOR DI ODP RUSAK'),
(21, 'KONFIGURASI ULANG (CONFIG ULANG)'),
(22, 'MODEM HANG'),
(23, 'MODEM RUSAK'),
(24, 'MSAN DOWN'),
(25, 'OLT DOWN'),
(26, 'ONT HANG'),
(27, 'ONT RUSAK'),
(28, 'PABX PELANGGAN BERMASALAH'),
(29, 'PATCHCORD DI PELANGGAN'),
(30, 'PELANGGAN SUDAH CABUT / CABUT LAYANAN'),
(31, 'PELANGGAN TIDAK MERASA LAPOR'),
(32, 'PIGTAIL DI ODP'),
(33, 'PIGTAIL DI ROSET'),
(34, 'PORT DSLAM / MSAN BERMASALAH'),
(35, 'PORT DSLAM/MSAN BERMASALAH'),
(36, 'PORT SPLITTER DI ODP'),
(37, 'REMOTE STB RUSAK'),
(38, 'SETTING ULANG WIFI'),
(39, 'SPLITTER DI ODP'),
(40, 'STB RUSAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sto`
--

CREATE TABLE `sto` (
  `id` int(11) NOT NULL,
  `pilihan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sto`
--

INSERT INTO `sto` (`id`, `pilihan`) VALUES
(1, 'MDC'),
(2, 'SKI'),
(3, 'DLT'),
(4, 'SPM'),
(5, 'TJR'),
(6, 'LBP'),
(7, 'GLG'),
(8, 'PER'),
(9, 'TMU'),
(10, 'TTG'),
(11, 'PDB'),
(12, 'CTD'),
(13, 'BJI'),
(14, 'STB'),
(15, 'PBD'),
(16, 'TJP'),
(17, 'PGL'),
(18, 'TJM'),
(19, 'BLW'),
(20, 'KIB'),
(21, 'PUB'),
(22, 'PRT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknisi`
--

CREATE TABLE `teknisi` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `nik` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `teknisi`
--

INSERT INTO `teknisi` (`id`, `nama`, `nik`) VALUES
(1, 'Safrijul Fahreza', 1657301075),
(2, 'Maulana', 1657301087),
(3, 'Abay', 1657301085),
(5, 'Saykoji', 1657301065),
(6, 'Wanda', 1657301098);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nik` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `nik`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Safrijul Fahreza', '1657301075', 'SF.jpg', '$2y$10$S6YyTRjY.zrtmQUj9Kv9X.STBcVJHRIuH7gQbrwlcn2DoG.9Ic5.u', 1, 1, 1563688183),
(2, 'Safrijul Fahreza', '1657301071', 'default.jpg', '$2y$10$1HfsfalpoLNcBrPexe4IQe85t8O/UJn6q66pCyT3wfvglhKePv35i', 2, 1, 1563706830),
(3, 'Black Mamba', '1657301011', 'default.jpg', '$2y$10$516qFNgN7loCVFdfSaydyuhrNHMaE55th5jBy3rfmWNsEWjsC/Xyq', 3, 1, 1566903926),
(5, 'Reza', '1657301076', 'default.jpg', '$2y$10$uY7UOKFRw4z1uF.xadB8X.NJ0Fi5VbsBcn8oe0zyLyudB2Zclaxsm', 2, 0, 1566907310),
(6, 'Saykoji', '1657301070', 'default.jpg', '$2y$10$7qlEJZKrpAOFIZE4WR.chuKCEx3iQsaS188drMe8tgSp4H.4joXPq', 3, 1, 1566907331),
(7, 'Ahmad Sahnan', '95150306', 'default.jpg', '$2y$10$IzxOqCVmtWaKUVID5lssS.ixuBdYIN.WmgSAMXMGYwKT0n4SbPs.m', 3, 1, 1566988061),
(9, 'Test', '1234567', 'default.jpg', '$2y$10$8.5d725QpW0sc8bF/ZxfVuMaK96XZLAOfkjHh7OXmpbneScxnzgqi', 3, 1, 1581612771);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(5, 1, 5),
(6, 2, 5),
(7, 1, 3),
(8, 1, 2),
(10, 2, 6),
(11, 1, 6),
(13, 3, 6),
(14, 3, 5),
(15, 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(5, 'Input'),
(6, 'Performance');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Helpdesk'),
(3, 'Teknisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 0),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 5, 'Input', 'input', 'fas fa-fw fa-keyboard', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 1, 'Teknisi', 'admin/teknisi', 'fas fa-fw fa-wrench', 1),
(9, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(10, 6, 'Report Status Ticket', 'input/table', 'fas fa-fw fa-table', 1),
(11, 1, 'Sub Segmentasi', 'admin/subsegmentasi', 'fas fa-fw fa-flag', 1),
(12, 5, 'Grafik', 'input/grafik', 'fas fa-fw fa-chart-line', 1),
(13, 1, 'Registrasi User', 'admin/registrasi', 'fas fa-fw fa-users', 1),
(14, 6, 'Report Technician', 'input/tech', 'fas fa-fw fa-hard-hat', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `input`
--
ALTER TABLE `input`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sto`
--
ALTER TABLE `sto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `input`
--
ALTER TABLE `input`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `sto`
--
ALTER TABLE `sto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
