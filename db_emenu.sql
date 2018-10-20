-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 20 Okt 2018 pada 16.27
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_emenu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category` varchar(20) NOT NULL,
  `isActive` int(1) NOT NULL,
  `CreatedBy` varchar(8) NOT NULL DEFAULT 'System',
  `CreatedTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` varchar(8) NOT NULL DEFAULT 'System',
  `UpdatedTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`category`, `isActive`, `CreatedBy`, `CreatedTime`, `UpdatedBy`, `UpdatedTime`) VALUES
('Es Krim', 1, 'System', '2018-03-22 21:02:54', 'System', '2018-10-20 11:36:54'),
('Makanan', 1, 'System', '2018-03-22 21:02:54', 'System', '2018-10-20 11:36:36'),
('Minuman', 1, 'fitri', '2018-09-16 10:24:23', 'fitri', '2018-10-20 11:36:27'),
('Paket', 1, 'arg', '2018-07-29 14:02:00', 'arg', '2018-07-29 14:12:02'),
('Sambal', 1, 'fitri', '2018-10-20 11:43:37', 'fitri', '2018-10-20 11:43:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id_menu` varchar(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `menu` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `photo` text,
  `status_menu` tinyint(4) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `CreatedBy` varchar(8) NOT NULL DEFAULT 'System',
  `CreatedTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` varchar(8) NOT NULL DEFAULT 'System',
  `UpdatedTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id_menu`, `category`, `menu`, `price`, `description`, `photo`, `status_menu`, `isActive`, `CreatedBy`, `CreatedTime`, `UpdatedBy`, `UpdatedTime`) VALUES
('MN001', 'Minuman', 'Es Teh Manis', 4000, '', 'MN001.jpg', 1, 1, 'fitri', '2018-08-05 07:45:56', 'fitri', '2018-10-07 18:04:21'),
('MN002', 'Makanan', 'Ayam Bakar Madu', 30000, '', 'MN002.jpg', 1, 1, 'fitri', '2018-08-05 07:46:18', 'fitri', '2018-09-16 13:07:06'),
('MN003', 'Paket', 'Paket 3', 50000, '1 Nasi + 1 Ayam + 1 Sup + 1 Es Jeruk', '', 1, 1, 'fitri', '2018-08-12 21:33:08', 'fitri', '2018-10-20 11:33:50'),
('MN004', 'Minuman', 'Jus Mangga', 12000, '', 'MN004.jpg', 0, 1, 'fitri', '2018-08-18 20:06:56', 'fitri', '2018-10-20 20:17:20'),
('MN005', 'Minuman', 'Jus Buah Naga', 12000, '', 'MN005.jpg', 1, 1, 'fitri', '2018-09-04 10:33:44', 'fitri', '2018-10-20 11:52:31'),
('MN006', 'Minuman', 'Jus Sirsak', 12000, '', 'MN006.jpg', 0, 1, 'fitri', '2018-10-20 11:32:44', 'fitri', '2018-10-20 12:12:32'),
('MN007', 'Paket', 'Paket 1', 40000, '1 Nasi + 1 Ayam + Teh Tawar', '', 1, 1, 'fitri', '2018-10-20 11:34:32', 'fitri', '2018-10-20 11:34:32'),
('MN008', 'Paket', 'Paket 2', 45000, '1 Nasi + 1 Ayam + 1 Sup + Teh Tawar', '', 1, 1, 'fitri', '2018-10-20 11:35:14', 'fitri', '2018-10-20 11:35:14'),
('MN009', 'Es Krim', 'Es Krim Coklat', 5000, '', 'MN009.jpg', 1, 1, 'fitri', '2018-10-20 11:35:40', 'fitri', '2018-10-20 12:01:21'),
('MN010', 'Es Krim', 'Es Krim Strawberry', 5000, '', 'MN010.jpg', 1, 1, 'fitri', '2018-10-20 11:35:55', 'fitri', '2018-10-20 11:53:12'),
('MN011', 'Makanan', 'Ayam Goreng', 25000, '', 'MN011.jpg', 0, 1, 'fitri', '2018-10-20 11:38:08', 'fitri', '2018-10-20 12:05:44'),
('MN012', 'Makanan', 'Bebek Goreng', 35000, '', 'MN012.jpg', 1, 1, 'fitri', '2018-10-20 11:38:29', 'fitri', '2018-10-20 11:53:39'),
('MN013', 'Minuman', 'Es Soda Gembira', 7000, '', 'MN013.jpg', 1, 1, 'fitri', '2018-10-20 11:39:11', 'fitri', '2018-10-20 11:53:52'),
('MN014', 'Minuman', 'Es Jeruk', 10000, '', 'MN014.jpg', 1, 1, 'fitri', '2018-10-20 11:39:22', 'fitri', '2018-10-20 11:54:07'),
('MN015', 'Es Krim', 'Es Krim Vanila', 5000, '', 'MN015.jpg', 0, 1, 'fitri', '2018-10-20 11:40:58', 'fitri', '2018-10-20 12:06:20'),
('MN016', 'Es Krim', 'Es Krim Coklat Vanila Straw', 5000, '', 'MN016.jpg', 1, 1, 'fitri', '2018-10-20 11:41:49', 'fitri', '2018-10-20 12:01:50'),
('MN017', 'Minuman', 'Air Mineral', 3000, '', 'MN017.jpg', 1, 1, 'fitri', '2018-10-20 11:42:06', 'fitri', '2018-10-20 11:54:39'),
('MN018', 'Makanan', 'Ikan Gurame Bakar', 35000, '', 'MN018.jpg', 1, 1, 'fitri', '2018-10-20 11:42:33', 'fitri', '2018-10-20 11:54:46'),
('MN019', 'Sambal', 'Sambal Ijo', 3000, '', 'MN019.jpg', 1, 1, 'fitri', '2018-10-20 11:43:47', 'fitri', '2018-10-20 11:54:59'),
('MN020', 'Sambal', 'Sambal Matah', 3000, '', 'MN020.jpg', 1, 1, 'fitri', '2018-10-20 11:43:56', 'fitri', '2018-10-20 11:55:12'),
('MN021', 'Sambal', 'Sambal Mangga', 4000, '', '', 1, 1, 'fitri', '2018-10-20 11:44:08', 'fitri', '2018-10-20 11:44:08'),
('MN022', 'Sambal', 'Sambal Kecap', 3000, '', 'MN022.jpg', 1, 1, 'fitri', '2018-10-20 11:44:23', 'fitri', '2018-10-20 11:55:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderdetails_edit`
--

CREATE TABLE IF NOT EXISTS `orderdetails_edit` (
  `id_order` varchar(12) CHARACTER SET utf8 NOT NULL,
  `id_menu` varchar(10) CHARACTER SET utf8 NOT NULL,
  `qty` int(4) NOT NULL,
  `price_order` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderdetails_temp`
--

CREATE TABLE IF NOT EXISTS `orderdetails_temp` (
  `id_menu` varchar(10) NOT NULL,
  `menu` varchar(30) NOT NULL,
  `qty` int(4) NOT NULL,
  `price_order` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id_order` varchar(12) NOT NULL,
  `date_order` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `no_table` tinyint(2) NOT NULL,
  `customer` varchar(30) NOT NULL DEFAULT 'Anonymous',
  `total_qty` int(4) NOT NULL,
  `total_price` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `grandtotal` int(11) NOT NULL,
  `status_order` tinyint(1) NOT NULL,
  `username` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id_order`, `date_order`, `no_table`, `customer`, `total_qty`, `total_price`, `ppn`, `grandtotal`, `status_order`, `username`) VALUES
('ORD180827001', '2018-08-27 11:42:55', 1, '', 2, 8000, 800, 8800, 0, 'fitri'),
('ORD180828001', '2018-08-28 11:44:45', 2, '', 3, 74000, 7400, 81400, 0, 'fitri'),
('ORD180828002', '2018-08-28 13:23:50', 2, 'Ari', 5, 113000, 11300, 124300, 0, 'riyan'),
('ORD180916001', '2018-09-16 09:52:50', 1, 'Deni', 2, 47000, 4700, 51700, 0, 'riyan'),
('ORD180916002', '2018-09-16 09:53:26', 2, '', 1, 4000, 400, 4400, 0, 'riyan'),
('ORD180916003', '2018-09-16 09:54:36', 4, 'Otoy', 2, 54000, 5400, 59400, 0, 'riyan'),
('ORD180916004', '2018-09-16 19:07:47', 1, '', 3, 64000, 6400, 70400, 0, 'fitri'),
('ORD180916005', '2018-09-16 19:14:52', 1, '', 2, 34000, 3400, 37400, 0, 'riyan'),
('ORD180916006', '2018-09-16 19:19:10', 2, '', 1, 12000, 1200, 13200, 0, 'riyan'),
('ORD180916007', '2018-09-16 19:24:23', 4, '', 1, 50000, 5000, 55000, 0, 'fitri'),
('ORD180916008', '2018-09-16 19:26:52', 1, '', 1, 4000, 400, 4400, 0, 'fitri'),
('ORD180916009', '2018-09-16 19:29:34', 2, '', 1, 30000, 3000, 33000, 0, 'fitri'),
('ORD180922001', '2018-09-22 06:27:38', 1, '', 3, 92000, 9200, 101200, 0, 'riyan'),
('ORD180923001', '2018-09-23 12:36:34', 1, 'Arigo', 2, 8000, 800, 8800, 0, 'fitri'),
('ORD180929001', '2018-09-29 13:45:37', 1, '', 2, 34000, 3400, 37400, 0, 'riyan'),
('ORD180929002', '2018-09-29 19:54:48', 1, '', 2, 30000, 3000, 33000, 0, 'fitri'),
('ORD180930001', '2018-09-30 10:16:19', 2, '', 2, 54000, 5400, 59400, 0, 'riyan'),
('ORD180930002', '2018-09-30 10:16:43', 4, '', 1, 30000, 3000, 33000, 0, 'riyan'),
('ORD180930003', '2018-09-30 10:59:21', 1, '', 1, 30000, 3000, 33000, 0, 'riyan'),
('ORD180930004', '2018-09-30 11:04:05', 1, '', 1, 12000, 1200, 13200, 0, 'riyan'),
('ORD180930005', '2018-09-30 11:04:25', 3, '', 2, 34000, 3400, 37400, 0, 'riyan'),
('ORD180930006', '2018-09-30 11:07:49', 2, '', 2, 24000, 2400, 26400, 0, 'fitri'),
('ORD180930007', '2018-09-30 11:07:56', 5, '', 2, 100000, 10000, 110000, 0, 'fitri'),
('ORD180930008', '2018-09-30 11:08:05', 4, '', 1, 50000, 5000, 55000, 0, 'fitri'),
('ORD180930009', '2018-09-30 11:35:42', 1, '', 1, 4000, 400, 4400, 0, 'fitri'),
('ORD180930010', '2018-09-30 11:42:52', 1, '', 2, 34000, 3400, 37400, 0, 'riyan'),
('ORD180930011', '2018-09-30 11:49:43', 1, '', 3, 92000, 9200, 101200, 0, 'riyan'),
('ORD180930012', '2018-09-30 12:01:02', 3, '', 1, 50000, 5000, 55000, 0, 'fitri'),
('ORD180930013', '2018-09-30 12:55:06', 2, '', 2, 34000, 3400, 37400, 0, 'riyan'),
('ORD180930014', '2018-09-30 13:08:16', 3, '', 2, 42000, 4200, 46200, 0, 'riyan'),
('ORD180930015', '2018-09-30 20:11:07', 1, '', 2, 42000, 4200, 46200, 0, 'riyan'),
('ORD180930016', '2018-09-30 17:46:25', 4, '', 1, 30000, 3000, 33000, 0, 'riyan'),
('ORD180930017', '2018-09-30 20:06:30', 3, 'Leni', 2, 80000, 8000, 88000, 0, 'riyan'),
('ORD181005001', '2018-10-06 00:19:50', 1, 'dbk', 1, 50000, 5000, 55000, 0, 'riyan'),
('ORD181005002', '2018-10-06 00:21:28', 3, '', 1, 50000, 5000, 55000, 0, 'riyan'),
('ORD181005003', '2018-10-06 00:23:46', 1, '', 1, 4000, 400, 4400, 0, 'riyan'),
('ORD181016001', '2018-10-16 09:24:02', 2, '', 2, 34000, 3400, 37400, 0, 'fitri'),
('ORD181016002', '2018-10-16 09:24:14', 4, '', 4, 124000, 12400, 136400, 0, 'fitri'),
('ORD181016003', '2018-10-16 09:46:05', 1, '', 5, 118000, 11800, 129800, 0, 'fitri'),
('ORD181016004', '2018-10-16 09:46:18', 3, '', 5, 60000, 6000, 66000, 0, 'fitri'),
('ORD181019001', '2018-10-19 16:44:36', 1, '', 11, 70000, 7000, 77000, 0, 'riyan'),
('ORD181020001', '2018-10-20 12:08:07', 2, '', 2, 38000, 3800, 41800, 0, 'riyan');

--
-- Trigger `orders`
--
DELIMITER //
CREATE TRIGGER `UPDATE TABLE` BEFORE INSERT ON `orders`
 FOR EACH ROW BEGIN
 UPDATE tables SET status = 1
 WHERE no_table = NEW.no_table;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ordersdetails`
--

CREATE TABLE IF NOT EXISTS `ordersdetails` (
`no` bigint(20) NOT NULL,
  `id_order` varchar(12) NOT NULL,
  `id_menu` varchar(10) NOT NULL,
  `qty` int(4) NOT NULL,
  `price_order` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ordersdetails`
--

INSERT INTO `ordersdetails` (`no`, `id_order`, `id_menu`, `qty`, `price_order`, `status`) VALUES
(1, 'ORD180827001', 'MN001', 2, 4000, 0),
(2, 'ORD180828001', 'MN002', 2, 35000, 0),
(3, 'ORD180828001', 'MN001', 1, 4000, 0),
(4, 'ORD180828002', 'MN001', 2, 4000, 0),
(5, 'ORD180828002', 'MN002', 3, 35000, 0),
(10, 'ORD180916001', 'MN002', 1, 35000, 0),
(11, 'ORD180916001', 'MN005', 1, 12000, 0),
(12, 'ORD180916002', 'MN001', 1, 4000, 0),
(13, 'ORD180916003', 'MN001', 1, 4000, 0),
(14, 'ORD180916003', 'MN003', 1, 50000, 0),
(15, 'ORD180916004', 'MN001', 1, 4000, 0),
(16, 'ORD180916004', 'MN002', 2, 30000, 0),
(17, 'ORD180916005', 'MN001', 1, 4000, 0),
(18, 'ORD180916005', 'MN002', 1, 30000, 0),
(19, 'ORD180916006', 'MN005', 1, 12000, 0),
(20, 'ORD180916007', 'MN003', 1, 50000, 0),
(21, 'ORD180916008', 'MN001', 1, 4000, 0),
(22, 'ORD180916009', 'MN002', 1, 30000, 0),
(23, 'ORD180922001', 'MN002', 1, 30000, 0),
(24, 'ORD180922001', 'MN003', 1, 50000, 0),
(25, 'ORD180922001', 'MN005', 1, 12000, 0),
(26, 'ORD180923001', 'MN001', 2, 4000, 0),
(27, 'ORD180929001', 'MN001', 1, 4000, 0),
(28, 'ORD180929001', 'MN002', 1, 30000, 0),
(34, 'ORD180929002', 'MN002', 2, 30000, 0),
(35, 'ORD180930001', 'MN001', 1, 4000, 0),
(36, 'ORD180930001', 'MN003', 1, 50000, 0),
(37, 'ORD180930002', 'MN002', 1, 30000, 0),
(38, 'ORD180930003', 'MN002', 1, 30000, 0),
(39, 'ORD180930004', 'MN005', 1, 12000, 0),
(40, 'ORD180930005', 'MN001', 1, 4000, 0),
(41, 'ORD180930005', 'MN002', 1, 30000, 0),
(42, 'ORD180930006', 'MN005', 2, 12000, 0),
(43, 'ORD180930007', 'MN003', 2, 50000, 0),
(44, 'ORD180930008', 'MN003', 1, 50000, 0),
(46, 'ORD180930009', 'MN001', 1, 4000, 0),
(47, 'ORD180930010', 'MN001', 1, 4000, 0),
(48, 'ORD180930010', 'MN002', 1, 30000, 0),
(49, 'ORD180930011', 'MN002', 1, 30000, 0),
(50, 'ORD180930011', 'MN003', 1, 50000, 0),
(51, 'ORD180930011', 'MN005', 1, 12000, 0),
(52, 'ORD180930012', 'MN003', 1, 50000, 0),
(53, 'ORD180930013', 'MN001', 1, 4000, 0),
(54, 'ORD180930013', 'MN002', 1, 30000, 0),
(55, 'ORD180930014', 'MN002', 1, 30000, 0),
(56, 'ORD180930014', 'MN005', 1, 12000, 0),
(66, 'ORD180930016', 'MN002', 1, 30000, 0),
(100, 'ORD180930017', 'MN002', 1, 30000, 0),
(101, 'ORD180930017', 'MN003', 1, 50000, 0),
(102, 'ORD180930015', 'MN002', 1, 30000, 0),
(103, 'ORD180930015', 'MN005', 1, 12000, 0),
(104, 'ORD181005001', 'MN003', 1, 50000, 0),
(105, 'ORD181005002', 'MN003', 1, 50000, 0),
(106, 'ORD181005003', 'MN001', 1, 4000, 0),
(107, 'ORD181016001', 'MN002', 1, 30000, 0),
(108, 'ORD181016001', 'MN001', 1, 4000, 0),
(109, 'ORD181016002', 'MN005', 2, 12000, 0),
(110, 'ORD181016002', 'MN003', 2, 50000, 0),
(111, 'ORD181016003', 'MN001', 2, 4000, 0),
(112, 'ORD181016003', 'MN002', 2, 30000, 0),
(113, 'ORD181016003', 'MN003', 1, 50000, 0),
(114, 'ORD181016004', 'MN004', 2, 12000, 0),
(115, 'ORD181016004', 'MN005', 3, 12000, 0),
(117, 'ORD181019001', 'MN001', 10, 4000, 0),
(118, 'ORD181019001', 'MN002', 1, 30000, 0),
(119, 'ORD181020001', 'MN012', 1, 35000, 0),
(120, 'ORD181020001', 'MN017', 1, 3000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id_payment` varchar(12) NOT NULL,
  `date_payment` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_order` varchar(12) NOT NULL,
  `cash` int(11) NOT NULL,
  `changemoney` int(11) NOT NULL,
  `username` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id_payment`, `date_payment`, `id_order`, `cash`, `changemoney`, `username`) VALUES
('PYM180827001', '2018-08-27 11:43:06', 'ORD180827001', 9000, 200, 'fitri'),
('PYM180828001', '2018-08-28 11:44:53', 'ORD180828001', 82000, 600, 'fitri'),
('PYM180828002', '2018-08-28 13:30:27', 'ORD180828002', 125000, 700, 'anggara'),
('PYM180916001', '2018-09-16 09:53:37', 'ORD180916001', 55000, 3300, 'fitri'),
('PYM180916002', '2018-09-16 09:56:04', 'ORD180916003', 60000, 600, 'fitri'),
('PYM180916003', '2018-09-16 09:56:12', 'ORD180916002', 5000, 600, 'fitri'),
('PYM180916004', '2018-09-16 19:08:00', 'ORD180916004', 71000, 600, 'fitri'),
('PYM180916005', '2018-09-16 19:15:16', 'ORD180916005', 38000, 600, 'fitri'),
('PYM180916006', '2018-09-16 19:19:20', 'ORD180916006', 14000, 800, 'fitri'),
('PYM180916007', '2018-09-16 19:24:36', 'ORD180916007', 55000, 0, 'fitri'),
('PYM180916008', '2018-09-16 19:27:22', 'ORD180916008', 5000, 600, 'fitri'),
('PYM180916009', '2018-09-16 19:29:41', 'ORD180916009', 33000, 0, 'fitri'),
('PYM180922001', '2018-09-22 06:28:25', 'ORD180922001', 102000, 800, 'fitri'),
('PYM180923001', '2018-09-23 12:36:46', 'ORD180923001', 9000, 200, 'fitri'),
('PYM180929001', '2018-09-29 17:36:33', 'ORD180929001', 37500, 100, 'fitri'),
('PYM180929002', '2018-09-29 19:55:55', 'ORD180929002', 34000, 1000, 'fitri'),
('PYM180930001', '2018-09-30 11:03:19', 'ORD180930003', 33000, 0, 'fitri'),
('PYM180930002', '2018-09-30 11:03:31', 'ORD180930002', 33000, 0, 'fitri'),
('PYM180930003', '2018-09-30 11:03:41', 'ORD180930001', 60000, 600, 'fitri'),
('PYM180930004', '2018-09-30 11:13:08', 'ORD180930008', 55000, 0, 'fitri'),
('PYM180930005', '2018-09-30 11:13:20', 'ORD180930007', 110000, 0, 'fitri'),
('PYM180930006', '2018-09-30 11:13:31', 'ORD180930005', 38000, 600, 'fitri'),
('PYM180930007', '2018-09-30 11:13:40', 'ORD180930004', 15000, 1800, 'fitri'),
('PYM180930008', '2018-09-30 11:13:48', 'ORD180930006', 27000, 600, 'fitri'),
('PYM180930009', '2018-09-30 11:36:17', 'ORD180930009', 4500, 100, 'fitri'),
('PYM180930010', '2018-09-30 11:44:17', 'ORD180930010', 40000, 2600, 'fitri'),
('PYM180930011', '2018-09-30 12:51:31', 'ORD180930011', 120000, 18800, 'fitri'),
('PYM180930012', '2018-09-30 12:51:41', 'ORD180930012', 60000, 5000, 'fitri'),
('PYM180930013', '2018-09-30 12:56:36', 'ORD180930013', 38000, 600, 'fitri'),
('PYM180930014', '2018-09-30 13:09:36', 'ORD180930014', 50000, 3800, 'fitri'),
('PYM180930015', '2018-09-30 20:11:52', 'ORD180930017', 88000, 0, 'fitri'),
('PYM180930016', '2018-09-30 20:12:00', 'ORD180930016', 33000, 0, 'fitri'),
('PYM180930017', '2018-09-30 20:12:09', 'ORD180930015', 47000, 800, 'fitri'),
('PYM181006001', '2018-10-06 00:22:27', 'ORD181005002', 55000, 0, 'fitri'),
('PYM181006002', '2018-10-06 00:22:43', 'ORD181005001', 55000, 0, 'fitri'),
('PYM181007001', '2018-10-07 11:47:16', 'ORD181005003', 4500, 100, 'fitri'),
('PYM181016001', '2018-10-16 09:24:42', 'ORD181016002', 137000, 600, 'fitri'),
('PYM181016002', '2018-10-16 09:24:55', 'ORD181016001', 40000, 2600, 'fitri'),
('PYM181016003', '2018-10-16 09:46:58', 'ORD181016004', 67000, 1000, 'fitri'),
('PYM181016004', '2018-10-16 09:47:08', 'ORD181016003', 130000, 200, 'fitri'),
('PYM181019001', '2018-10-19 16:47:48', 'ORD181019001', 100000, 23000, 'fitri'),
('PYM181020001', '2018-10-20 12:08:28', 'ORD181020001', 42000, 200, 'fitri');

--
-- Trigger `payments`
--
DELIMITER //
CREATE TRIGGER `UPDATE STATUS ORDER` BEFORE INSERT ON `payments`
 FOR EACH ROW BEGIN
 UPDATE orders SET status_order = 0
 WHERE id_order = NEW.id_order;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `no_table` tinyint(2) NOT NULL,
  `quota` tinyint(2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `CreatedBy` varchar(8) NOT NULL DEFAULT 'System',
  `CreatedTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` varchar(8) NOT NULL DEFAULT 'System',
  `UpdatedTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tables`
--

INSERT INTO `tables` (`no_table`, `quota`, `status`, `isActive`, `CreatedBy`, `CreatedTime`, `UpdatedBy`, `UpdatedTime`) VALUES
(1, 4, 0, 1, 'arg', '2018-07-29 14:16:36', 'arg', '2018-10-19 16:47:48'),
(2, 4, 0, 1, 'arg', '2018-07-29 14:16:40', 'arg', '2018-10-20 12:08:28'),
(3, 2, 0, 1, 'arg', '2018-07-29 14:16:44', 'arg', '2018-10-16 09:46:58'),
(4, 5, 0, 1, 'fitri', '2018-08-05 09:35:48', 'fitri', '2018-10-16 09:24:42'),
(5, 6, 0, 1, 'fitri', '2018-09-16 13:00:37', 'fitri', '2018-09-30 15:07:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(8) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `authorization` varchar(20) NOT NULL,
  `LastLogin` datetime NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `CreatedBy` varchar(8) NOT NULL DEFAULT 'System',
  `CreatedTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` varchar(8) NOT NULL DEFAULT 'System',
  `UpdatedTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`, `fullname`, `authorization`, `LastLogin`, `isActive`, `CreatedBy`, `CreatedTime`, `UpdatedBy`, `UpdatedTime`) VALUES
('anggara', 'cf82191f507d61266c7b339318e086a8', 'Ari Anggara', 'Cashier', '2018-09-16 10:00:35', 1, 'System', '2018-02-24 16:09:18', 'System', '2018-02-26 15:33:52'),
('arg', 'cf82191f507d61266c7b339318e086a8', 'Arigo', 'Administrator', '2018-09-30 10:56:55', 1, 'fitri', '2018-09-16 13:44:53', 'fitri', '2018-09-16 13:44:53'),
('elisa', 'cf82191f507d61266c7b339318e086a8', 'Elisa Fitriani', 'Waiter', '0000-00-00 00:00:00', 1, 'fitri', '2018-10-20 21:04:27', 'fitri', '2018-10-20 21:04:27'),
('fitri', '29bc8d9c9fc7b855c89736e88da878a6', 'Fitri Nurul Fathonah', 'Owner', '2018-10-20 21:03:46', 1, 'System', '2018-02-24 11:40:33', 'System', '2018-02-24 11:40:33'),
('riyan', 'cf82191f507d61266c7b339318e086a8', 'Heriyansah', 'Waiter', '2018-10-20 21:10:42', 1, 'arg', '2018-07-29 12:08:50', 'arg', '2018-07-29 12:08:50'),
('teddy', 'cf82191f507d61266c7b339318e086a8', 'Teddy Ripai', 'Waiter', '2018-10-20 21:05:05', 1, 'fitri', '2018-10-20 21:04:43', 'fitri', '2018-10-20 21:04:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`category`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`id_menu`), ADD KEY `id_category` (`category`);

--
-- Indexes for table `orderdetails_edit`
--
ALTER TABLE `orderdetails_edit`
 ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `orderdetails_temp`
--
ALTER TABLE `orderdetails_temp`
 ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id_order`), ADD KEY `id_table` (`no_table`), ADD KEY `username` (`username`), ADD KEY `no_table` (`no_table`);

--
-- Indexes for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
 ADD PRIMARY KEY (`no`), ADD KEY `id_order` (`id_order`), ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
 ADD PRIMARY KEY (`id_payment`), ADD KEY `id_order` (`id_order`), ADD KEY `username` (`username`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
 ADD PRIMARY KEY (`no_table`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=121;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `menus`
--
ALTER TABLE `menus`
ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`category`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON UPDATE CASCADE,
ADD CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`no_table`) REFERENCES `tables` (`no_table`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ordersdetails`
--
ALTER TABLE `ordersdetails`
ADD CONSTRAINT `ordersdetails_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON UPDATE CASCADE,
ADD CONSTRAINT `ordersdetails_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id_menu`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON UPDATE CASCADE,
ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
