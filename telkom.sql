-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2020 pada 16.47
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id` int(128) NOT NULL,
  `nomor` varchar(128) NOT NULL,
  `hd` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `waktu` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id`, `nomor`, `hd`, `status`, `waktu`) VALUES
(1, 'MDN10938426', '1657301075', 'GAMAS', '2020-06-11 18:33:29'),
(2, 'MDN10938426', '1657301075', 'PENDING', '2020-06-11 19:20:02'),
(3, 'NJM124572', '1657301075', 'IN TECHNICIAN', '2020-06-12 05:43:19'),
(4, 'JKL899823747', '1657301075', 'PENDING', '2020-06-12 07:50:01'),
(5, 'JKL899823747', '1657301075', 'CLOSE', '2020-06-12 07:50:13'),
(6, 'KJL773929', '1657301011', 'GAMAS', '2020-06-12 19:11:37'),
(7, 'MDN10938426', '1657301011', 'PENDING', '2020-06-13 12:40:48'),
(8, 'JKL899823747', '1657301075', 'IN TECHNICIAN', '2020-06-13 12:43:22'),
(9, 'JKL899823747', '1657301011', 'PENDING', '2020-06-13 12:43:47'),
(10, 'JKL899823747', '1657301011', 'GAMAS', '2020-06-13 12:47:44'),
(11, 'JKL899823747', '1657301011', 'CLOSE', '2020-06-23 06:30:58'),
(12, 'MDN10938426', '1657301011', 'CLOSE', '2020-06-23 06:31:24'),
(13, 'JKL899823747', '1657301075', 'PENDING', '2020-06-24 13:53:48'),
(14, 'JKT46872834', '1657301075', 'PENDING', '2020-06-24 15:08:40'),
(15, 'MTK82784732', '1657301075', 'PENDING', '2020-06-24 15:09:01'),
(16, 'MDN10092847', '1657301075', 'PENDING', '2020-06-24 15:09:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `input`
--

CREATE TABLE `input` (
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
  `sleeve` int(2) DEFAULT NULL,
  `adaptor` int(2) DEFAULT NULL,
  `precon50` int(2) DEFAULT NULL,
  `precon75` int(2) DEFAULT NULL,
  `precon100` int(2) DEFAULT NULL,
  `precon150` int(2) DEFAULT NULL,
  `ps1:4` int(2) DEFAULT NULL,
  `ps1:8` int(2) DEFAULT NULL,
  `pigtail` int(2) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `input`
--

INSERT INTO `input` (`nomor_tiket`, `status`, `layanan`, `segmen`, `teknisi1`, `teknisi2`, `helpdesk`, `sto`, `alpro`, `perbaikan`, `keterangan`, `tgl_input`, `tgl_update`, `sleeve`, `adaptor`, `precon50`, `precon75`, `precon100`, `precon150`, `ps1:4`, `ps1:8`, `pigtail`, `image`) VALUES
('ASL12345', 'GAMAS', 'VPN IP', 'DGS', 'Black Mamba', 'Saykoji', 'Safrijul Fahreza', 'DLT', 'FO', 'GAMAS BACKBONE', '', '2020-06-19 16:25:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default.png'),
('JKL899823747', 'PENDING', 'METRO E', 'DBS', 'Saykoji', 'Black Mamba', 'Ahmad Sahnan', 'SKI', 'FO', 'KABEL ADAPTOR MODEM / ONT RUSAK', '', '2019-08-28 10:28:37', '2020-06-24 13:53:48', 5, 2, 2, 1, 1, 1, 2, 1, 1, 'default.png'),
('JKT18724739027', 'CLOSE', 'VPN IP', 'DGS', 'Saykoji', 'Test', 'Safrijul Fahreza', 'SKI', 'FO', 'KABEL ADAPTOR MODEM/ONT RUSAK', 'mhgcghcghg', '2019-08-24 19:22:41', '2020-02-15 16:35:53', 1, 3, 0, 5, 0, 0, 0, 0, 0, 'default.png'),
('JKT46872834', 'PENDING', 'METRO E', 'DGS', 'Test', 'Black Mamba', 'Ahmad Sahnan', 'TJR', 'FO', 'KONFIGURASI ULANG (CONFIG ULANG)', '', '2019-08-27 11:12:39', '2020-06-24 15:08:40', 2, 2, 0, 0, 0, 0, 0, 0, 0, 'default.png'),
('KJL773929', 'GAMAS', 'ASTINET', 'DES', 'Black Mamba', 'Ahmad Sahnan', 'Safrijul Fahreza', 'DLT', 'FO', 'PORT SPLITTER DI ODP', '', '2020-02-15 16:40:49', '2020-06-12 19:20:25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'default.png'),
('KL882981', 'IN TECHNICIAN', 'METRO E', 'DES', 'Black Mamba', 'Ahmad Sahnan', 'Safrijul Fahreza', 'SPM', 'FO', 'JUMPER MSAN / RK', '', '2020-06-17 18:07:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default.png'),
('MDN10092847', 'PENDING', 'METRO E', 'DBS', 'Saykoji', 'Test', 'Polan', 'DLT', 'FO', 'CATUAN LISTRIK PELANGGAN BERMASALAH', 'hggaghavas', '2019-08-24 18:49:58', '2020-06-24 15:09:32', 3, 6, 3, 6, 4, 2, 5, 2, 6, 'default.png'),
('MDN10938426', 'CLOSE', 'VPN IP', 'DES', 'Black Mamba', 'Saykoji', 'Safrijul Fahreza', 'SPM', 'COOPER', 'BAIK SENDIRI / CALL OK', 'vgjckjgkgjvj', '2019-08-24 19:19:53', '2020-06-23 06:31:24', 1, 0, 0, 0, 0, 0, 0, 0, 0, 'perbaikan.jpg'),
('MTK82784732', 'PENDING', 'VPN IP', 'DGS', 'Saykoji', 'Black Mamba', 'Safrijul Fahreza', 'DLT', 'COOPER', 'KABEL DROP CORE PUTUS', 'Rusak', '2019-08-25 08:23:54', '2020-06-24 15:09:01', 1, 0, 0, 0, 0, 0, 0, 10, 6, 'default.png'),
('NJM124572', 'IN TECHNICIAN', 'METRO E', 'DGS', 'Saykoji', 'Ahmad Sahnan', 'Safrijul Fahreza', 'GLG', 'FO', 'GAMAS BACKBONE', 'Testing aja', '2019-08-24 17:00:00', '2020-06-18 15:36:38', 3, 2, 2, 3, 4, 3, 1, 5, 7, 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `nomor_tiket` varchar(100) NOT NULL,
  `token` varchar(128) NOT NULL,
  `rate` int(1) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id`, `nomor_tiket`, `token`, `rate`, `keterangan`) VALUES
(1, 'NJM124572', 'b0fa484077691a0913fa8d5dfdec07fd', 1, 'bagus'),
(2, 'MDN10092847', '6bb320e11bcfd40d72a8f6f967c7558e', 0, ''),
(3, 'MDN10938426', '8e04baa00b1ef675a6b87dd43bd23017', 4, 'test'),
(4, 'JKT18724739027', '3bb5a3141c3c12cef007be8209273083', 0, ''),
(5, 'MTK82784732', '75d5c465ba98d45330e302af6899f297', 0, ''),
(6, 'JKT46872834', 'be707e60d0bf603378e49f4902099405', 0, ''),
(7, 'JKL899823747', '784b43bf3f9ee40645f208738ec5edd9', 0, ''),
(8, 'KJL773929', '9e1d176e1a1cbf6e8af9163f75e53773', 0, ''),
(9, 'KL882981', '1c6550dd9af662eff307cb928395b532', 0, ''),
(10, 'ASL12345', '70c0182fd33db5e06f579474892b765b', 0, '');

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
  `pilihan` varchar(3) NOT NULL
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
(2, 'Fahreza Safrijul', '1657301071', 'default.jpg', '$2y$10$1HfsfalpoLNcBrPexe4IQe85t8O/UJn6q66pCyT3wfvglhKePv35i', 2, 1, 1563706830),
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
(15, 3, 2),
(18, 3, 7);

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
(6, 'Performance'),
(7, 'Teknisi');

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
(2, 2, 'Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 5, 'Input Laporan', 'input', 'fas fa-fw fa-keyboard', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 1, 'Teknisi', 'admin/teknisi', 'fas fa-fw fa-wrench', 1),
(9, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(10, 6, 'Report Status Ticket', 'input/table', 'fas fa-fw fa-table', 1),
(11, 1, 'Sub Segmentasi', 'admin/subsegmentasi', 'fas fa-fw fa-flag', 1),
(12, 6, 'Grafik', 'input/grafik', 'fas fa-fw fa-chart-line', 1),
(13, 1, 'Registrasi User', 'admin/registrasi', 'fas fa-fw fa-users', 1),
(16, 7, 'Task', 'teknisi', 'fas fa-fw fa-hard-hat', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `input`
--
ALTER TABLE `input`
  ADD PRIMARY KEY (`nomor_tiket`),
  ADD KEY `tgl_input` (`tgl_input`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sto`
--
ALTER TABLE `sto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `sto`
--
ALTER TABLE `sto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
