-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2019 at 02:05 PM
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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kode_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `kode_level` varchar(10) NOT NULL,
  `level` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `kode_level`, `level`, `tanggal`) VALUES
(1, '1', 'Admin', '2019-03-28 16:59:37'),
(2, '2', 'Relawan', '2019-03-28 16:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_reac` int(11) NOT NULL,
  `nama_img` varchar(255) NOT NULL,
  `type_img` varchar(50) NOT NULL,
  `size_img` int(11) NOT NULL,
  `slug_post` varchar(255) NOT NULL,
  `lttd_img` varchar(255) NOT NULL,
  `lgttd_img` varchar(255) NOT NULL,
  `lttd_loc` varchar(255) NOT NULL,
  `lgttd_loc` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reaction`
--

CREATE TABLE `reaction` (
  `id` int(11) NOT NULL,
  `user_num` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `kode_status` int(11) NOT NULL,
  `nama_status` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `kode_status`, `nama_status`, `tanggal`) VALUES
(1, 1, 'Aktif', '2019-03-30 07:15:21'),
(2, 2, 'Belum Aktif', '2019-03-30 07:15:29'),
(3, 3, 'Diblokir', '2019-03-30 07:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `num` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_status` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `j_kel` enum('Laki Laki','Perempuan','','') DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `token` varchar(256) NOT NULL,
  `verifikasi` timestamp NULL DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `num`, `id_level`, `id_status`, `nama`, `email`, `username`, `password`, `tgl_lahir`, `j_kel`, `phone`, `avatar`, `token`, `verifikasi`, `tanggal`) VALUES
(2, '106280320191553779843', 2, 1, NULL, 'wrep17@gmail.com', 'iniwahyu', '$2y$10$qZToRQVcpbLDaT23slaML.wbWcl2a3yIEgcVOeRmt4A07Suo.1xoe', NULL, NULL, NULL, NULL, 'T9Ehu5agCJ4-kHo1qjtrLVW3y62SIPRDfcOYU_pXMN7sb8dGKexF0wvliBnzAZQmT9Ehu5agCJ4-kHo1qjtrLVW3y62SIPRDfcOYU_pXMN7sb8dGKexF0wvliBnzAZQmT9Ehu5agCJ4-kHo1qjtrLVW3y62SIPRDfcOYU_pXMN7sb8dGKexF0wvliBnzAZQmT9Ehu5agCJ4-kHo1qjtrLVW3y62SIPRDfcOYU_pXMN7sb8dGKexF0wvliBnzAZQm', '2019-03-28 13:33:21', '2019-03-28 13:30:49'),
(3, '106280320191553779847', 1, 1, 'Admin', 'admin@sosben.com', 'admin', '$2y$10$qZToRQVcpbLDaT23slaML.wbWcl2a3yIEgcVOeRmt4A07Suo.1xoe', '2019-03-28', 'Laki Laki', '08123456789', NULL, 'T9Ehu5agCJ4-kHo1qjtrLVW3y62SIPRDfcOYU_pXMN7sb8dGKexF0wvliBnzAZQmT9Ehu5agCJ4-kHo1qjtrLVW3y62SIPRDfcOYU_pXMN7sb8dGKexF0wvliBnzAZQmT9Ehu5agCJ4-kHo1qjtrLVW3y62SIPRDfcOYU_pXMN7sb8dGKexF0wvliBnzAZQmT9Ehu5agCJ4-kHo1qjtrLVW3y62SIPRDfcOYU_pXMN7sb8dGKexF0wvliBnzAZQm', '2019-03-28 13:33:23', '2019-03-28 13:30:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `kode_kategori` (`kode_kategori`,`nama_kategori`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`),
  ADD UNIQUE KEY `kode_level` (`kode_level`,`level`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `reaction`
--
ALTER TABLE `reaction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_num` (`user_num`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`),
  ADD UNIQUE KEY `kode_status` (`kode_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `num` (`num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reaction`
--
ALTER TABLE `reaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
