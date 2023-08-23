-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 11:32 AM
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
-- Table structure for table `mst_divisi`
--

CREATE TABLE `mst_divisi` (
  `id_divisi` char(36) NOT NULL,
  `kode_divisi` varchar(10) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL,
  `tgl_created_divisi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stts_aktif_divisi` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = non | 1 = aktif',
  `stts_rmv_divisi` datetime DEFAULT NULL COMMENT 'null belum terhapus',
  `rmv_by_divisi` char(36) DEFAULT NULL,
  `updated_by_divisi` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_divisi`
--

INSERT INTO `mst_divisi` (`id_divisi`, `kode_divisi`, `nama_divisi`, `tgl_created_divisi`, `stts_aktif_divisi`, `stts_rmv_divisi`, `rmv_by_divisi`, `updated_by_divisi`) VALUES
('13df031d-415a-11ee-9410-b42e992a3f2c', 'A001', 'HOV', '2023-08-23 09:09:18', 1, NULL, NULL, '1'),
('872155f2-415a-11ee-9410-b42e992a3f2c', 'A002', 'HOV2', '2023-08-23 09:12:31', 1, NULL, NULL, '1'),
('93ac4d70-416c-11ee-9410-b42e992a3f2c', 'A003', 'HOV33', '2023-08-23 11:21:43', 1, '2023-08-23 11:24:13', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_supplier`
--

CREATE TABLE `mst_supplier` (
  `id_supplier` char(36) NOT NULL,
  `kode_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `no_telp_supplier` varchar(15) DEFAULT NULL,
  `email_supplier` varchar(50) DEFAULT NULL,
  `alamat_supplier` varchar(200) DEFAULT NULL,
  `tgl_created_supplier` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stts_aktif_supplier` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = non | 1 = aktif',
  `stts_rmv_supplier` datetime DEFAULT NULL COMMENT 'null belum terhapus',
  `rmv_by_supplier` char(36) DEFAULT NULL,
  `updated_by_supplier` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_supplier`
--

INSERT INTO `mst_supplier` (`id_supplier`, `kode_supplier`, `nama_supplier`, `no_telp_supplier`, `email_supplier`, `alamat_supplier`, `tgl_created_supplier`, `stts_aktif_supplier`, `stts_rmv_supplier`, `rmv_by_supplier`, `updated_by_supplier`) VALUES
('16787c32-4188-11ee-9410-b42e992a3f2c', 'S001', 'SUP HOV 1q', '0852525252', 'supplier@gmail.com', 'asd', '2023-08-23 14:38:39', 1, NULL, NULL, '1'),
('7640fc4c-418c-11ee-9410-b42e992a3f2c', 'S002', 'SUP HOV 2', '0852525252', 's', '', '2023-08-23 15:09:58', 0, '2023-08-23 16:06:16', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_users`
--

CREATE TABLE `mst_users` (
  `id_users` char(36) NOT NULL,
  `fk_divisi` varchar(36) NOT NULL,
  `nama_users` varchar(50) NOT NULL,
  `username_users` varchar(50) NOT NULL,
  `email_users` varchar(100) NOT NULL,
  `password_users` varchar(255) NOT NULL,
  `stts_aktif_users` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=non aktif | 1= aktif',
  `tgl_created_users` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by_users` char(36) DEFAULT NULL,
  `stts_rmv_users` datetime DEFAULT NULL COMMENT 'null = blm di hapus',
  `rmv_by_users` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_users`
--

INSERT INTO `mst_users` (`id_users`, `fk_divisi`, `nama_users`, `username_users`, `email_users`, `password_users`, `stts_aktif_users`, `tgl_created_users`, `updated_by_users`, `stts_rmv_users`, `rmv_by_users`) VALUES
('0f2ac654-3bfc-11ee-a740-b42e992a3f2c', '13df031d-415a-11ee-9410-b42e992a3f2c', 'qweqwe', 'qweqwe', '', '$2y$10$5gJS7J1nof6rRj30UUFHmeqtNK9mze9huVtK0TOysuj7Hf1kYIs5i', 1, '2023-08-23 09:09:29', NULL, NULL, '1'),
('1', '13df031d-415a-11ee-9410-b42e992a3f2c', 'admin', 'admin', 'admin@gmail.com', '$2y$10$TqOqWr8PCvJAWxTBGZktLuS3.veGXFk8l31uXf7Zrcy3VXICeaBZO', 1, '2023-08-23 09:09:32', NULL, NULL, NULL),
('486acab7-40bf-11ee-af54-b42e992a3f2c', '13df031d-415a-11ee-9410-b42e992a3f2c', 'yama', 'ayam', '', '$2y$10$o1Zb98M6G4Kvy1TykZDH0eV3NeB5.alg8cMWUnDWZFErgK95oCyYi', 1, '2023-08-23 09:09:34', '1', NULL, NULL),
('4f5b277d-3bfc-11ee-a740-b42e992a3f2c', '13df031d-415a-11ee-9410-b42e992a3f2c', '321', 'asdasd', '', '$2y$10$kJ4mqVamTq8adSyWigYW3upL/oIQxCpVgMMykQpfH4x3G0Tgh/RCe', 1, '2023-08-23 09:09:36', '1', NULL, '1'),
('ef0a237f-3bda-11ee-a740-b42e992a3f2c', '13df031d-415a-11ee-9410-b42e992a3f2c', 'superadmin', 'superadmin', '', '$2y$10$ZzbNCN8krg3RDX8o3OKo7.K6Fd3EmvazH7nojwsK63EBHEX8qYVle', 1, '2023-08-23 09:09:38', NULL, NULL, NULL);

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `modul_application`
--
ALTER TABLE `modul_application`
  ADD PRIMARY KEY (`id_modul_app`);

--
-- Indexes for table `mst_divisi`
--
ALTER TABLE `mst_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `mst_supplier`
--
ALTER TABLE `mst_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `mst_users`
--
ALTER TABLE `mst_users`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `id_users` (`updated_by_users`),
  ADD KEY `mst_divisi` (`fk_divisi`);

--
-- Indexes for table `sub_modul_app`
--
ALTER TABLE `sub_modul_app`
  ADD PRIMARY KEY (`id_sub_ma`);

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
