-- Adminer 4.8.1 MySQL 8.0.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1,	'iniadmin',	'123hore'),
(2,	'nadief',	'1234hore'),
(3,	'fani',	'12345hore');

DROP TABLE IF EXISTS `admin_produk`;
CREATE TABLE `admin_produk` (
  `id_admin` int DEFAULT NULL,
  `id_produk` int DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  KEY `id_admin` (`id_admin`),
  KEY `id_produk` (`id_produk`),
  CONSTRAINT `admin_produk_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  CONSTRAINT `admin_produk_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `admin_produk` (`id_admin`, `id_produk`, `createdAt`) VALUES
(1,	2,	'2023-07-12 07:13:33'),
(1,	1,	'2023-07-12 07:14:37'),
(2,	3,	'2023-07-12 07:14:37'),
(2,	4,	'2023-07-12 07:14:37'),
(1,	1,	'2023-07-12 07:14:38'),
(2,	5,	'2023-07-12 07:14:38'),
(2,	3,	'2023-07-12 07:14:38'),
(2,	4,	'2023-07-12 07:14:39'),
(2,	5,	'2023-07-12 07:14:39'),
(3,	6,	'2023-07-12 07:15:31'),
(3,	7,	'2023-07-12 07:15:35'),
(1,	8,	'2023-07-12 07:21:17');

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1,	'Makanan'),
(2,	'Minuman'),
(3,	'Snack'),
(4,	'Dessert'),
(5,	'Produk Daging'),
(6,	'Pizza & Pasta'),
(7,	'Kue Kering'),
(8,	'BARU1'),
(9,	'BARU2'),
(10,	'Aneka Mie'),
(11,	'Aneka Nasi'),
(12,	'Cepat saji'),
(13,	'Kopi'),
(14,	'Bakmi');

DROP TABLE IF EXISTS `label`;
CREATE TABLE `label` (
  `id_label` int NOT NULL AUTO_INCREMENT,
  `nama_label` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_label`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `label` (`id_label`, `nama_label`) VALUES
(1,	'Best Seller'),
(2,	'Rekomendasi'),
(3,	'Paket Hemat');

DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `id_produk` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `produk` (`id_produk`, `nama`, `deskripsi`, `status`, `stok`, `foto`, `harga`) VALUES
(1,	'Es Teh',	'Teh dengan es',	1,	10,	'inifoto',	3000),
(2,	'Es Jeruk',	'Jeruk dengan es',	1,	5,	'inifoto',	5000),
(3,	'Mie Ayam',	'Mie dengan ayam',	1,	15,	'inifoto',	10000),
(4,	'Kebab Supreme',	'Kebab dengan daging sapi',	1,	8,	'inifoto',	19000),
(5,	'Roti Bakar',	'Roti dibakar',	1,	7,	'inifoto',	8000),
(6,	'Es Campur',	'Es nya dicampur',	1,	7,	'inifoto',	12000),
(7,	'Palu Butung',	'Es pisang dibalut ijo ijo',	1,	7,	'inifoto',	12000),
(8,	'Mie Ayam dan Es Teh',	'Mie ayam dan Es Teh',	1,	4,	'inifoto',	12000);

DROP TABLE IF EXISTS `produk_kategori`;
CREATE TABLE `produk_kategori` (
  `id_produk` int DEFAULT NULL,
  `id_kategori` int DEFAULT NULL,
  KEY `id_produk` (`id_produk`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `produk_kategori_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  CONSTRAINT `produk_kategori_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `produk_kategori` (`id_produk`, `id_kategori`) VALUES
(8,	1);

DROP TABLE IF EXISTS `produk_label`;
CREATE TABLE `produk_label` (
  `id_produk` int DEFAULT NULL,
  `id_label` int DEFAULT NULL,
  KEY `id_produk` (`id_produk`),
  KEY `id_label` (`id_label`),
  CONSTRAINT `produk_label_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  CONSTRAINT `produk_label_ibfk_2` FOREIGN KEY (`id_label`) REFERENCES `label` (`id_label`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `produk_label` (`id_produk`, `id_label`) VALUES
(2,	2),
(3,	3),
(7,	3),
(1,	1);

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `id_review` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_review`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- 2023-07-14 13:32:32