-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 11:31 AM
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

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `po_invoice` () RETURNS VARCHAR(20) CHARSET latin1 BEGIN
    DECLARE currentDate VARCHAR(8);
    DECLARE lastSerialNumber INT;
    DECLARE invoiceNumber VARCHAR(20);

    -- Mendapatkan tanggal saat ini
    SET currentDate = DATE_FORMAT(NOW(), '%Y%m%d');

    -- Mendapatkan nomor urutan terakhir dari database
    SELECT MAX(CAST(SUBSTRING(no_transaksi, 13) AS SIGNED)) INTO lastSerialNumber
    FROM po_transaksi
    WHERE DATE(tgl_created_transaksi) = DATE(NOW());

    -- Mendapatkan nomor urutan terakhir atau setel ke 0 jika belum ada data sebelumnya
    IF lastSerialNumber IS NULL THEN
        SET lastSerialNumber = 1;
    ELSE
        SET lastSerialNumber = lastSerialNumber + 1;
    END IF;

    -- Membuat nomor invoice dengan format yang diinginkan
    SET invoiceNumber = CONCAT('PO-', currentDate, '-', LPAD(lastSerialNumber, 4, '0'));

    RETURN invoiceNumber;
END$$

DELIMITER ;

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
-- Table structure for table `mst_jenis_po`
--

CREATE TABLE `mst_jenis_po` (
  `id_jenis_po` char(36) NOT NULL,
  `kode_jenis_po` varchar(10) NOT NULL,
  `nama_jenis_po` varchar(50) NOT NULL,
  `tgl_created_jenis_po` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stts_aktif_jenis_po` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = non | 1 = aktif',
  `stts_rmv_jenis_po` datetime DEFAULT NULL COMMENT 'null belum terhapus',
  `rmv_by_jenis_po` char(36) DEFAULT NULL,
  `updated_by_jenis_po` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_jenis_po`
--

INSERT INTO `mst_jenis_po` (`id_jenis_po`, `kode_jenis_po`, `nama_jenis_po`, `tgl_created_jenis_po`, `stts_aktif_jenis_po`, `stts_rmv_jenis_po`, `rmv_by_jenis_po`, `updated_by_jenis_po`) VALUES
('82267fbc-4c7f-11ee-856e-b42e992a3f2c', 'asdasd', 'asdads', '2023-09-06 13:35:02', 1, NULL, NULL, '1');

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
('c728b8f9-421c-11ee-bf6f-b42e9950a6e1', '13df031d-415a-11ee-9410-b42e992a3f2c', 'asd', 'asd', '', '$2y$10$AFPXdrLHwu.DXLVGELmDN.SiFNRSHihxOq51t4QCJBNMUUWOVKgZK', 0, '2023-08-24 01:23:14', '1', '2023-08-24 08:23:14', '1'),
('c728b8f9-421c-11ee-bf6f-b42e9950a6e4', '872155f2-415a-11ee-9410-b42e992a3f2c', 'admin', 'admin', 'admin@gmail.com', '$2y$10$TqOqWr8PCvJAWxTBGZktLuS3.veGXFk8l31uXf7Zrcy3VXICeaBZO', 1, '2023-09-07 07:44:04', '1', NULL, NULL),
('ef0a237f-3bda-11ee-a740-b42e992a3f2c', '13df031d-415a-11ee-9410-b42e992a3f2c', 'superadmin', 'superadmin', '', '$2y$10$ZzbNCN8krg3RDX8o3OKo7.K6Fd3EmvazH7nojwsK63EBHEX8qYVle', 1, '2023-08-23 09:09:38', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `po_cart`
--

CREATE TABLE `po_cart` (
  `id_cart_po` char(36) NOT NULL,
  `fk_users_cart_po` char(36) NOT NULL,
  `fk_divisi_cart_po` char(36) NOT NULL,
  `item_cart_po` varchar(100) NOT NULL,
  `qty_po_cart` varchar(20) NOT NULL,
  `harga_cart_po` varchar(30) NOT NULL,
  `diskon_cart_po` varchar(30) NOT NULL DEFAULT '0',
  `ppn_cart_po` varchar(30) NOT NULL DEFAULT '0',
  `service_cart_po` varchar(30) NOT NULL DEFAULT '0',
  `sub_total_cart_po` varchar(50) NOT NULL,
  `grand_total_cart_po` varchar(50) NOT NULL,
  `tgl_created_item_po` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `po_transaksi`
--

CREATE TABLE `po_transaksi` (
  `id_transaksi` char(36) NOT NULL,
  `no_transaksi` varchar(30) NOT NULL,
  `fk_users` char(36) NOT NULL,
  `fk_divisi` char(36) NOT NULL,
  `fk_supplier` char(36) NOT NULL,
  `fk_jenis_po` char(36) NOT NULL,
  `tgl_po_transaksi` datetime NOT NULL,
  `jml_item_transkasi` varchar(10) NOT NULL,
  `sub_total_transaksi` varchar(50) NOT NULL,
  `grand_total_transaksi` varchar(50) NOT NULL,
  `tgl_tempo_transaksi` datetime NOT NULL,
  `keterangan_transkasi` text,
  `updated_by_transkasi` char(36) DEFAULT NULL,
  `tgl_created_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_transaksi`
--

INSERT INTO `po_transaksi` (`id_transaksi`, `no_transaksi`, `fk_users`, `fk_divisi`, `fk_supplier`, `fk_jenis_po`, `tgl_po_transaksi`, `jml_item_transkasi`, `sub_total_transaksi`, `grand_total_transaksi`, `tgl_tempo_transaksi`, `keterangan_transkasi`, `updated_by_transkasi`, `tgl_created_transaksi`) VALUES
('6db5047d-4e2a-11ee-a591-b42e992a3f2c', 'PO-20230908-0001', 'c728b8f9-421c-11ee-bf6f-b42e9950a6e4', '872155f2-415a-11ee-9410-b42e992a3f2c', '16787c32-4188-11ee-9410-b42e992a3f2c', '82267fbc-4c7f-11ee-856e-b42e992a3f2c', '2023-09-08 00:00:00', '121', '1040100', '1040100', '2023-09-08 00:00:00', 'asd', NULL, '2023-09-08 09:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `po_transaksi_detail`
--

CREATE TABLE `po_transaksi_detail` (
  `id_transaksi_detail` char(36) NOT NULL,
  `fk_transaksi` char(36) NOT NULL,
  `nama_item_detail` varchar(100) NOT NULL,
  `qty_item_detail` varchar(20) NOT NULL,
  `harga_satuan_detail` varchar(20) NOT NULL,
  `diskon_peritem_detail` double NOT NULL DEFAULT '0',
  `pajak_peritem_detail` double NOT NULL DEFAULT '0',
  `service_peritem_detail` double NOT NULL DEFAULT '0',
  `sub_total_detail` varchar(50) NOT NULL,
  `grand_total_detail` varchar(50) NOT NULL,
  `updated_by_detail` char(36) DEFAULT NULL,
  `tgl_created_detail` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_transaksi_detail`
--

INSERT INTO `po_transaksi_detail` (`id_transaksi_detail`, `fk_transaksi`, `nama_item_detail`, `qty_item_detail`, `harga_satuan_detail`, `diskon_peritem_detail`, `pajak_peritem_detail`, `service_peritem_detail`, `sub_total_detail`, `grand_total_detail`, `updated_by_detail`, `tgl_created_detail`) VALUES
('6db53afa-4e2a-11ee-a591-b42e992a3f2c', '6db5047d-4e2a-11ee-a591-b42e992a3f2c', 'gula', '1', '100', 0, 0, 0, '100', '100', NULL, '2023-09-08 09:31:03'),
('6db54632-4e2a-11ee-a591-b42e992a3f2c', '6db5047d-4e2a-11ee-a591-b42e992a3f2c', 'ayam', '100', '10000', 0, 0, 0, '1000000', '1000000', NULL, '2023-09-08 09:31:03'),
('6db550f2-4e2a-11ee-a591-b42e992a3f2c', '6db5047d-4e2a-11ee-a591-b42e992a3f2c', 'bebek', '20', '2000', 0, 0, 0, '40000', '40000', NULL, '2023-09-08 09:31:03');

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
-- Table structure for table `tbl_sessions`
--

CREATE TABLE `tbl_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sessions`
--

INSERT INTO `tbl_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('7hs26nmfl45o9h40p523ladu9dijsgbe', '::1', 1693983036, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639333938333033363b69645f75736572737c733a313a2231223b6e616d615f75736572737c733a353a2261646d696e223b666b5f6469766973697c733a33363a2238373231353566322d343135612d313165652d393431302d623432653939326133663263223b757365726e616d655f75736572737c733a353a2261646d696e223b656d61696c5f75736572737c733a31353a2261646d696e40676d61696c2e636f6d223b6c6f676765645f696e7c623a313b),
('9vtptti4kch1jgon8cl6pjae1e5kmnkc', '::1', 1694054312, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639343035343330363b69645f75736572737c733a313a2231223b6e616d615f75736572737c733a353a2261646d696e223b666b5f6469766973697c733a33363a2238373231353566322d343135612d313165652d393431302d623432653939326133663263223b757365726e616d655f75736572737c733a353a2261646d696e223b656d61696c5f75736572737c733a31353a2261646d696e40676d61696c2e636f6d223b6c6f676765645f696e7c623a313b),
('a47qjl4btndvku5fc07u1lhhtc0alitb', '::1', 1693982096, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639333938323039363b69645f75736572737c733a313a2231223b6e616d615f75736572737c733a353a2261646d696e223b666b5f6469766973697c733a33363a2238373231353566322d343135612d313165652d393431302d623432653939326133663263223b757365726e616d655f75736572737c733a353a2261646d696e223b656d61696c5f75736572737c733a31353a2261646d696e40676d61696c2e636f6d223b6c6f676765645f696e7c623a313b),
('aunqcabdjm4b4halbk1k97ogqehrpffn', '::1', 1693972175, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639333937323137353b69645f75736572737c733a313a2231223b6e616d615f75736572737c733a353a2261646d696e223b666b5f6469766973697c733a33363a2238373231353566322d343135612d313165652d393431302d623432653939326133663263223b757365726e616d655f75736572737c733a353a2261646d696e223b656d61696c5f75736572737c733a31353a2261646d696e40676d61696c2e636f6d223b6c6f676765645f696e7c623a313b),
('blp1od4vi15qh07bqusve6uhfa781aha', '::1', 1693987921, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639333938373732303b69645f75736572737c733a313a2231223b6e616d615f75736572737c733a353a2261646d696e223b666b5f6469766973697c733a33363a2238373231353566322d343135612d313165652d393431302d623432653939326133663263223b757365726e616d655f75736572737c733a353a2261646d696e223b656d61696c5f75736572737c733a31353a2261646d696e40676d61696c2e636f6d223b6c6f676765645f696e7c623a313b),
('cli2j6eevk9ufomm1bvkf2ga52f2jh7n', '::1', 1694165472, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639343136353437323b69645f75736572737c733a33363a2263373238623866392d343231632d313165652d626636662d623432653939353061366534223b6e616d615f75736572737c733a353a2261646d696e223b666b5f6469766973697c733a33363a2238373231353566322d343135612d313165652d393431302d623432653939326133663263223b757365726e616d655f75736572737c733a353a2261646d696e223b656d61696c5f75736572737c733a31353a2261646d696e40676d61696c2e636f6d223b6c6f676765645f696e7c623a313b),
('jee0i2brigrljo0mqnmqnefalta2me7j', '::1', 1693987720, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639333938373732303b69645f75736572737c733a313a2231223b6e616d615f75736572737c733a353a2261646d696e223b666b5f6469766973697c733a33363a2238373231353566322d343135612d313165652d393431302d623432653939326133663263223b757365726e616d655f75736572737c733a353a2261646d696e223b656d61696c5f75736572737c733a31353a2261646d696e40676d61696c2e636f6d223b6c6f676765645f696e7c623a313b),
('lml81uct8b92ii76mj5jfkqh3da3glba', '::1', 1693972175, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639333937323137353b69645f75736572737c733a313a2231223b6e616d615f75736572737c733a353a2261646d696e223b666b5f6469766973697c733a33363a2238373231353566322d343135612d313165652d393431302d623432653939326133663263223b757365726e616d655f75736572737c733a353a2261646d696e223b656d61696c5f75736572737c733a31353a2261646d696e40676d61696c2e636f6d223b6c6f676765645f696e7c623a313b),
('m491dveiht55ojl4fvpv4mg8eisl4gbg', '::1', 1693964052, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639333936343035323b69645f75736572737c733a313a2231223b6e616d615f75736572737c733a353a2261646d696e223b666b5f6469766973697c733a33363a2238373231353566322d343135612d313165652d393431302d623432653939326133663263223b757365726e616d655f75736572737c733a353a2261646d696e223b656d61696c5f75736572737c733a31353a2261646d696e40676d61696c2e636f6d223b6c6f676765645f696e7c623a313b),
('m82ai2k865obg9e5rt585tr148ijr5dm', '::1', 1693984074, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639333938343037343b69645f75736572737c733a313a2231223b6e616d615f75736572737c733a353a2261646d696e223b666b5f6469766973697c733a33363a2238373231353566322d343135612d313165652d393431302d623432653939326133663263223b757365726e616d655f75736572737c733a353a2261646d696e223b656d61696c5f75736572737c733a31353a2261646d696e40676d61696c2e636f6d223b6c6f676765645f696e7c623a313b),
('o4t9gt5q1jvkjvnovggi79eji04uar2f', '::1', 1694165100, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639343136353130303b69645f75736572737c733a33363a2263373238623866392d343231632d313165652d626636662d623432653939353061366534223b6e616d615f75736572737c733a353a2261646d696e223b666b5f6469766973697c733a33363a2238373231353566322d343135612d313165652d393431302d623432653939326133663263223b757365726e616d655f75736572737c733a353a2261646d696e223b656d61696c5f75736572737c733a31353a2261646d696e40676d61696c2e636f6d223b6c6f676765645f696e7c623a313b),
('ot8g98tpgeop8oiddqni0ksgemq7mkl2', '::1', 1693967609, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639333936373630393b69645f75736572737c733a313a2231223b6e616d615f75736572737c733a353a2261646d696e223b666b5f6469766973697c733a33363a2238373231353566322d343135612d313165652d393431302d623432653939326133663263223b757365726e616d655f75736572737c733a353a2261646d696e223b656d61696c5f75736572737c733a31353a2261646d696e40676d61696c2e636f6d223b6c6f676765645f696e7c623a313b),
('pg25slng28p9c4bpgu241h1nk75qo0vj', '::1', 1694165473, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639343136353437323b69645f75736572737c733a33363a2263373238623866392d343231632d313165652d626636662d623432653939353061366534223b6e616d615f75736572737c733a353a2261646d696e223b666b5f6469766973697c733a33363a2238373231353566322d343135612d313165652d393431302d623432653939326133663263223b757365726e616d655f75736572737c733a353a2261646d696e223b656d61696c5f75736572737c733a31353a2261646d696e40676d61696c2e636f6d223b6c6f676765645f696e7c623a313b),
('svr2s66rbt426pafker66lmqb1j8iu8a', '::1', 1694163187, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639343136333138373b69645f75736572737c733a33363a2263373238623866392d343231632d313165652d626636662d623432653939353061366534223b6e616d615f75736572737c733a353a2261646d696e223b666b5f6469766973697c733a33363a2238373231353566322d343135612d313165652d393431302d623432653939326133663263223b757365726e616d655f75736572737c733a353a2261646d696e223b656d61696c5f75736572737c733a31353a2261646d696e40676d61696c2e636f6d223b6c6f676765645f696e7c623a313b);

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
-- Indexes for table `mst_jenis_po`
--
ALTER TABLE `mst_jenis_po`
  ADD PRIMARY KEY (`id_jenis_po`);

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
-- Indexes for table `po_cart`
--
ALTER TABLE `po_cart`
  ADD PRIMARY KEY (`id_cart_po`),
  ADD KEY `fk_users_cart_po` (`fk_users_cart_po`),
  ADD KEY `fk_divisi_cart_po` (`fk_divisi_cart_po`);

--
-- Indexes for table `po_transaksi`
--
ALTER TABLE `po_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `po_transaksi_detail`
--
ALTER TABLE `po_transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

--
-- Indexes for table `sub_modul_app`
--
ALTER TABLE `sub_modul_app`
  ADD PRIMARY KEY (`id_sub_ma`);

--
-- Indexes for table `tbl_sessions`
--
ALTER TABLE `tbl_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

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
