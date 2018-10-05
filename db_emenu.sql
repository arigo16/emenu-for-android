-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 19 Agu 2018 pada 09.13
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
('Drink', 1, 'System', '2018-03-22 21:02:54', 'System', '2018-03-22 21:02:54'),
('Food', 1, 'System', '2018-03-22 21:02:54', 'System', '2018-03-22 21:02:54'),
('Paket', 1, 'arg', '2018-07-29 14:02:00', 'arg', '2018-07-29 14:12:02');

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
('MN001', 'Drink', 'Es Teh Manis', 4000, 'Teh manis', 'MN001.jpg', 1, 1, 'fitri', '2018-08-05 07:45:56', 'fitri', '2018-08-05 16:55:47'),
('MN002', 'Food', 'Ayam Bakar Madu', 35000, '', 'MN002.jpg', 1, 1, 'fitri', '2018-08-05 07:46:18', 'fitri', '2018-08-05 16:50:30'),
('MN003', 'Paket', 'Paket 3', 50000, '2 Nasi + 2 Ayam + 1 Sup', '', 1, 1, 'fitri', '2018-08-12 21:33:08', 'fitri', '2018-08-12 21:33:08'),
('MN004', 'Drink', 'Jus Mangga', 12000, '', '', 0, 1, 'fitri', '2018-08-18 20:06:56', 'fitri', '2018-08-18 20:20:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderdetails_temp`
--

CREATE TABLE IF NOT EXISTS `orderdetails_temp` (
  `id_menu` varchar(10) NOT NULL,
  `menu` varchar(30) NOT NULL,
  `qty` int(4) NOT NULL,
  `price_order` int(11) NOT NULL
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
('ORD180805001', '2018-08-05 13:21:05', 2, 'elisa', 10, 195000, 19500, 214500, 0, 'fitri'),
('ORD180805002', '2018-08-05 14:15:56', 4, '', 1, 4000, 400, 4400, 0, 'fitri'),
('ORD180805003', '2018-08-05 16:04:57', 1, 'riyan', 2, 70000, 7000, 77000, 0, 'fitri'),
('ORD180805004', '2018-08-05 16:16:07', 2, '', 6, 24000, 2400, 26400, 0, 'fitri'),
('ORD180808001', '2018-08-08 09:45:54', 1, '', 2, 8000, 800, 8800, 0, 'fitri'),
('ORD180811001', '2018-08-11 17:03:35', 4, '', 2, 8000, 800, 8800, 0, 'fitri'),
('ORD180811002', '2018-08-11 19:38:26', 2, '', 18, 382000, 38200, 420200, 0, 'fitri'),
('ORD180812001', '2018-08-12 21:33:20', 2, '', 2, 100000, 10000, 110000, 0, 'fitri');

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
  `price_order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ordersdetails`
--

INSERT INTO `ordersdetails` (`no`, `id_order`, `id_menu`, `qty`, `price_order`) VALUES
(1, 'ORD180805001', 'MN001', 5, 20000),
(2, 'ORD180805001', 'MN002', 5, 175000),
(3, 'ORD180805002', 'MN001', 1, 4000),
(4, 'ORD180805003', 'MN002', 2, 70000),
(5, 'ORD180805004', 'MN001', 6, 24000),
(6, 'ORD180808001', 'MN001', 2, 8000),
(7, 'ORD180811001', 'MN001', 2, 8000),
(8, 'ORD180811002', 'MN001', 8, 32000),
(9, 'ORD180811002', 'MN002', 10, 350000),
(10, 'ORD180812001', 'MN003', 2, 100000);

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
('PYM180805001', '2018-08-05 15:59:20', 'ORD180805002', 4400, 0, 'fitri'),
('PYM180805002', '2018-08-05 16:09:34', 'ORD180805001', 215000, 500, 'fitri'),
('PYM180805003', '2018-08-05 16:11:21', 'ORD180805003', 80000, 3000, 'fitri'),
('PYM180805004', '2018-08-05 16:16:32', 'ORD180805004', 26400, 0, 'fitri'),
('PYM180808001', '2018-08-08 09:46:12', 'ORD180808001', 9000, 200, 'fitri'),
('PYM180811001', '2018-08-11 19:39:39', 'ORD180811002', 430000, 9800, 'fitri'),
('PYM180812001', '2018-08-12 21:33:30', 'ORD180812001', 110000, 0, 'fitri'),
('PYM180812002', '2018-08-12 21:33:37', 'ORD180811001', 8800, 0, 'fitri');

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
(1, 4, 0, 1, 'arg', '2018-07-29 14:16:36', 'arg', '2018-08-19 12:26:04'),
(2, 4, 0, 1, 'arg', '2018-07-29 14:16:40', 'arg', '2018-08-19 12:26:01'),
(3, 2, 0, 1, 'arg', '2018-07-29 14:16:44', 'arg', '2018-08-19 09:48:40'),
(4, 5, 0, 1, 'fitri', '2018-08-05 09:35:48', 'fitri', '2018-08-12 21:33:37');

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
('anggara', '1bc0249a6412ef49b07fe6f62e6dc8de', 'Ari Anggara', 'Cashier', '2018-03-16 11:00:00', 1, 'System', '2018-02-24 16:09:18', 'System', '2018-02-26 15:33:52'),
('arg', 'cf82191f507d61266c7b339318e086a8', 'Arigo', 'Administrator', '2018-07-29 14:49:10', 1, 'System', '2018-02-24 11:40:33', 'System', '2018-02-24 11:40:33'),
('fitri', '29bc8d9c9fc7b855c89736e88da878a6', 'Fitri Nurul Fathonah', 'Owner', '2018-08-18 20:06:39', 1, 'System', '2018-02-24 11:40:33', 'System', '2018-02-24 11:40:33'),
('riyan', 'cf82191f507d61266c7b339318e086a8', 'Heriyansah', 'Waiter', '0000-00-00 00:00:00', 1, 'arg', '2018-07-29 12:08:50', 'arg', '2018-07-29 12:08:50');

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
MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
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
