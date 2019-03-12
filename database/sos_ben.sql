-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2019 at 06:11 AM
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
(1, 'admin', '::1', 'Chrome 72.0.3626.121', 'Windows 10', '2019-03-12 05:08:39', 'Pengguna Registrasi');

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
(13, 'admin', 'admin@sosben.com', '$2y$10$az8u0rmAg22EwDr.FGgcOO4FMXuHvxW.XJbrXyRgu58vNpHqyX.W.', 1, 0, 'f61e3d0eb3b3f92dabba92fb5c055cfc', '2019-03-12 05:08:39', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sosben_logauth`
--
ALTER TABLE `sosben_logauth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sosben_logauth`
--
ALTER TABLE `sosben_logauth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
