-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2019 at 04:35 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sos_ben`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(10) NOT NULL,
  `p_nama` varchar(255) DEFAULT NULL,
  `p_num` varchar(100) DEFAULT NULL,
  `p_ttl` date DEFAULT NULL,
  `p_jeniskelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `p_alamat` text,
  `p_notlp` int(15) DEFAULT NULL,
  `p_avatar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_image` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_image`, `id_user`, `slug`, `nama`, `deskripsi`, `status`, `gambar`, `tanggal_post`, `tanggal`) VALUES
(3, 1, 'ass-asdas-adsa', 'asdasda asdasd', 'jaskjnasfavanvonaoiaf', 'publish', 'kjaskjnakjsfnkajsnf.jpg', '2019-03-07 00:00:00', '2019-03-13 12:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `sosben_leveluser`
--

CREATE TABLE `sosben_leveluser` (
  `leveluser_id` int(11) NOT NULL,
  `leveluser_kode` int(4) DEFAULT NULL,
  `leveluser_nama` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sosben_logauth`
--

CREATE TABLE `sosben_logauth` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `ip` varchar(20) NOT NULL DEFAULT '0',
  `browser` varchar(25) NOT NULL DEFAULT '0',
  `sistem_operasi` varchar(25) NOT NULL DEFAULT '0',
  `waktu` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sosben_logauth`
--

INSERT INTO `sosben_logauth` (`id`, `username`, `ip`, `browser`, `sistem_operasi`, `waktu`, `status`) VALUES
(1, 'admin', '::1', 'Chrome 72.0.3626.121', 'Windows 10', '2019-03-12 05:45:16', 'Pengguna Registrasi'),
(2, 'admin', '::1', 'Chrome 72.0.3626.121', 'Windows 10', '2019-03-12 05:47:30', 'Pengguna Registrasi');

-- --------------------------------------------------------

--
-- Table structure for table `sosben_statususer`
--

CREATE TABLE `sosben_statususer` (
  `statususer_id` int(11) NOT NULL,
  `statususer_kode` int(4) DEFAULT NULL,
  `statususer_nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `users_num` varchar(100) NOT NULL,
  `users_username` varchar(50) NOT NULL,
  `users_email` varchar(100) NOT NULL,
  `users_password` varchar(72) NOT NULL,
  `users_level` int(4) NOT NULL,
  `users_status` int(4) NOT NULL,
  `users_token` varchar(256) NOT NULL,
  `users_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `users_verifikasi` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kode_kecamatan` varchar(10) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `keterangan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ranking`
--

CREATE TABLE `ranking` (
  `id_rank` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `urutan` int(50) DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `tglupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `users_num`, `users_username`, `users_email`, `users_password`, `users_level`, `users_status`, `users_token`, `users_tanggal`, `users_verifikasi`) VALUES
(1, '', 'admin', 'admin@sosben.com', '$2y$10$fkEcilH370MkSqcIs5beUeGP8nJsCr799LS45mLaLxWHTlM9ZSj9G', 1, 1, 'E0k9ghTGfyKcDJvpz1awmM3ZtLs72Q8FdNVoW4HUXRx-nSu5OYql_rI6ABjeCPibE0k9ghTGfyKcDJvpz1awmM3ZtLs72Q8FdNVoW4HUXRx-nSu5OYql_rI6ABjeCPibE0k9ghTGfyKcDJvpz1awmM3ZtLs72Q8FdNVoW4HUXRx-nSu5OYql_rI6ABjeCPibE0k9ghTGfyKcDJvpz1awmM3ZtLs72Q8FdNVoW4HUXRx-nSu5OYql_rI6ABjeCPib', '2019-03-12 05:47:30', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_image`);

--
-- Indexes for table `sosben_leveluser`
--
ALTER TABLE `sosben_leveluser`
  ADD PRIMARY KEY (`leveluser_id`),
  ADD UNIQUE KEY `leveluser_kode` (`leveluser_kode`);

--
-- Indexes for table `sosben_logauth`
--
ALTER TABLE `sosben_logauth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sosben_statususer`
--
ALTER TABLE `sosben_statususer`
  ADD PRIMARY KEY (`statususer_id`),
  ADD UNIQUE KEY `statususer_kode` (`statususer_kode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_num` (`users_num`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_rank`),
  ADD UNIQUE KEY `id_kecamatan` (`id_kecamatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_image` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sosben_leveluser`
--
ALTER TABLE `sosben_leveluser`
  MODIFY `leveluser_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sosben_logauth`
--
ALTER TABLE `sosben_logauth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id_rank` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
