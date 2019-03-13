-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2019 at 06:48 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

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
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id_image` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `status_produk` varchar(30) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id_image`, `id_user`, `slug_produk`, `nama_produk`, `deskripsi`, `status_produk`, `gambar`, `tanggal_post`, `tanggal`) VALUES
(3, 1, 'ass-asdas-adsa', 'asdasda asdasd', 'jaskjnasfavanvonaoiaf', 'publish', 'kjaskjnakjsfnkajsnf.jpg', '2019-03-07 00:00:00', '2019-03-13 12:01:47');

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
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(10) NOT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `ttl` varchar(20) DEFAULT NULL,
  `J_kelamin` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telpn` int(15) DEFAULT NULL,
  `gambar` int(100) DEFAULT NULL,
  `level` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `users_username` varchar(50) NOT NULL,
  `users_email` varchar(100) NOT NULL,
  `users_password` varchar(255) NOT NULL,
  `users_level` int(4) NOT NULL,
  `users_status` int(4) NOT NULL,
  `users_token` varchar(256) NOT NULL,
  `users_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `users_verifikasi` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `users_username`, `users_email`, `users_password`, `users_level`, `users_status`, `users_token`, `users_tanggal`, `users_verifikasi`) VALUES
(1, 'admin', 'admin@sosben.com', '$2y$10$fkEcilH370MkSqcIs5beUeGP8nJsCr799LS45mLaLxWHTlM9ZSj9G', 1, 1, 'E0k9ghTGfyKcDJvpz1awmM3ZtLs72Q8FdNVoW4HUXRx-nSu5OYql_rI6ABjeCPibE0k9ghTGfyKcDJvpz1awmM3ZtLs72Q8FdNVoW4HUXRx-nSu5OYql_rI6ABjeCPibE0k9ghTGfyKcDJvpz1awmM3ZtLs72Q8FdNVoW4HUXRx-nSu5OYql_rI6ABjeCPibE0k9ghTGfyKcDJvpz1awmM3ZtLs72Q8FdNVoW4HUXRx-nSu5OYql_rI6ABjeCPib', '2019-03-12 05:47:30', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`);

--
-- Indexes for table `sosben_logauth`
--
ALTER TABLE `sosben_logauth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username` (`users_username`);
	
--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
	
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


