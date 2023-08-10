-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 11:25 AM
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
('1', 'admin', 'admin', 'admin@gmail.com', '$2y$10$TqOqWr8PCvJAWxTBGZktLuS3.veGXFk8l31uXf7Zrcy3VXICeaBZO', 1, NULL, '2023-08-10 07:06:57', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
