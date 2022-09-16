-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.9.2-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for teskoding
CREATE DATABASE IF NOT EXISTS `teskoding` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `teskoding`;

-- Dumping structure for table teskoding.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_jenis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` varchar(20) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table teskoding.jenis
CREATE TABLE IF NOT EXISTS `jenis` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` varchar(20) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table teskoding.kartustok
CREATE TABLE IF NOT EXISTS `kartustok` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `stok_awal` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `stok_akhir` int(11) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` varchar(20) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table teskoding.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table teskoding.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` varchar(20) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
