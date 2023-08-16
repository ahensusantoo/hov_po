-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 11:23 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hov_po`
--

-- --------------------------------------------------------

--
-- Table structure for table `modul_application`
--

CREATE TABLE `modul_application` (
  `id_modul_app` varchar(5) NOT NULL,
  `nama_modul_app` varchar(50) NOT NULL,
  `stts_aktif_modul_app` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=non aktif | 1 = aktif',
  `stts_rmv_midul_app` datetime DEFAULT NULL COMMENT 'null blm terdelete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modul_application`
--

INSERT INTO `modul_application` (`id_modul_app`, `nama_modul_app`, `stts_aktif_modul_app`, `stts_rmv_midul_app`) VALUES
('01', 'PURCHASE ORDER', 1, NULL),
('02', 'LIKUIDITAS SALDO KAS DAN BANK', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_modul_app`
--

CREATE TABLE `sub_modul_app` (
  `id_sub_ma` int(11) NOT NULL,
  `fk_modul_app` varchar(5) NOT NULL,
  `nama_sub_ma` varchar(50) NOT NULL,
  `id_parent_sub_ma` int(11) NOT NULL,
  `stts_aktif_sub_ma` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=non aktif | 1 = aktif',
  `stts_rmv_dub_ma` datetime DEFAULT NULL COMMENT 'null blm terdeleteblm terdelete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_modul_app`
--

INSERT INTO `sub_modul_app` (`id_sub_ma`, `fk_modul_app`, `nama_sub_ma`, `id_parent_sub_ma`, `stts_aktif_sub_ma`, `stts_rmv_dub_ma`) VALUES
(1, '01', 'Suplier', 0, 1, NULL),
(2, '01', 'devisi', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` char(36) NOT NULL,
  `nama_users` varchar(50) NOT NULL,
  `username_users` varchar(50) NOT NULL,
  `email_users` varchar(100) NOT NULL,
  `password_users` varchar(255) NOT NULL,
  `stts_aktif_users` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=non aktif | 1= aktif',
  `created_by_users` char(36) DEFAULT NULL,
  `tgl_created_users` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stts_rmv_users` datetime DEFAULT NULL COMMENT 'null = blm di hapus',
  `rmv_by_users` char(36) DEFAULT NULL,
  `tgl_rmv_users` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama_users`, `username_users`, `email_users`, `password_users`, `stts_aktif_users`, `created_by_users`, `tgl_created_users`, `stts_rmv_users`, `rmv_by_users`, `tgl_rmv_users`) VALUES
('0f2ac654-3bfc-11ee-a740-b42e992a3f2c', 'qweqwe', 'qweqwe', '', '$2y$10$5gJS7J1nof6rRj30UUFHmeqtNK9mze9huVtK0TOysuj7Hf1kYIs5i', 1, '1', '2023-08-16 06:13:45', NULL, NULL, NULL),
('1', 'admin', 'admin', 'admin@gmail.com', '$2y$10$TqOqWr8PCvJAWxTBGZktLuS3.veGXFk8l31uXf7Zrcy3VXICeaBZO', 1, NULL, '2023-08-15 02:21:30', NULL, NULL, NULL),
('4f5b277d-3bfc-11ee-a740-b42e992a3f2c', 'asdads', 'asdasd', '', '$2y$10$kJ4mqVamTq8adSyWigYW3upL/oIQxCpVgMMykQpfH4x3G0Tgh/RCe', 1, '1', '2023-08-16 06:15:33', NULL, NULL, NULL),
('ef0a237f-3bda-11ee-a740-b42e992a3f2c', 'superadmin', 'superadmin', '', '$2y$10$ZzbNCN8krg3RDX8o3OKo7.K6Fd3EmvazH7nojwsK63EBHEX8qYVle', 1, '1', '2023-08-16 02:16:39', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `modul_application`
--
ALTER TABLE `modul_application`
  ADD PRIMARY KEY (`id_modul_app`);

--
-- Indexes for table `sub_modul_app`
--
ALTER TABLE `sub_modul_app`
  ADD PRIMARY KEY (`id_sub_ma`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sub_modul_app`
--
ALTER TABLE `sub_modul_app`
  MODIFY `id_sub_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
