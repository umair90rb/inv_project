-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.31-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for project_inv
DROP DATABASE IF EXISTS `project_inv`;
CREATE DATABASE IF NOT EXISTS `project_inv` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `project_inv`;

-- Dumping structure for table project_inv.brands
DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`bid`),
  UNIQUE KEY `brand_name` (`brand_name`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table project_inv.brands: ~6 rows (approximately)
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT IGNORE INTO `brands` (`bid`, `brand_name`, `status`) VALUES
	(1, 'Samsung', '1'),
	(13, 'HP', '1'),
	(15, 'Microsoft Corporation XX', '1'),
	(16, 'Adobe', '1'),
	(17, 'Apple', '1'),
	(18, 'Avira', '1');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;

-- Dumping structure for table project_inv.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `parent_cat` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table project_inv.categories: ~6 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT IGNORE INTO `categories` (`cid`, `parent_cat`, `category_name`, `status`) VALUES
	(1, 0, 'Electronics', '1'),
	(2, 0, 'Software', '1'),
	(5, 1, 'Mobiles', '1'),
	(7, 1, 'Laptop', '1'),
	(9, 2, 'Antivirus', '1');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table project_inv.clients
DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cnic` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table project_inv.clients: ~2 rows (approximately)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT IGNORE INTO `clients` (`id`, `name`, `father_name`, `email`, `cnic`, `contact`, `address`) VALUES
	(1, '', '', '', '', '', ''),
	(2, 'Umair', 'M Irshad', 'abc@gmail.com', '11111111111111', '5465465465', 'Chak no 90 rb'),
	(3, 'BMW', 'adds', 'xyz@gmail.com', '123456789', '123456789', 'laskdfh');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Dumping structure for table project_inv.invoice
DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_no` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `sub_total` double NOT NULL,
  `gst` double NOT NULL,
  `discount` double NOT NULL,
  `net_total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` tinytext NOT NULL,
  PRIMARY KEY (`invoice_no`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

-- Dumping data for table project_inv.invoice: ~33 rows (approximately)
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT IGNORE INTO `invoice` (`invoice_no`, `customer_name`, `order_date`, `sub_total`, `gst`, `discount`, `net_total`, `paid`, `due`, `payment_type`) VALUES
	(24, 'Rizwan', '0000-00-00', 445000, 80100, 1000, 524100, 445000, 79100, 'Cash'),
	(25, 'MMM', '0000-00-00', 60000, 10800, 500, 70300, 70300, 0, 'Cash'),
	(26, 'ggg', '0000-00-00', 300000, 54000, 2500, 351500, 351500, 0, 'Cash'),
	(27, 'Rdfgacs ', '0000-00-00', 300000, 54000, 54000, 300000, 300000, 0, 'Cash'),
	(28, '', '0000-00-00', 300000, 54000, 54000, 300000, 300000, 0, 'Cash'),
	(29, 'Rizwan', '2018-11-02', 60000, 10800, 12, 70788, 70788, 0, 'Cash'),
	(30, 'I am Cus', '2018-11-02', 65000, 11700, 500, 76200, 76200, 0, 'Cash'),
	(31, '', '2018-01-03', 60000, 10800, 0, 70800, 70800, 0, 'Cash'),
	(32, 'Arjun', '2018-01-03', 29000, 5220, 55, 34165, 34165, 0, 'Cash'),
	(33, '', '2018-01-03', 60000, 10800, 0, 70800, 70800, 0, 'Cash'),
	(34, 'Rizwan', '2018-01-03', 94500, 17010, 1500, 110010, 110010, 0, 'Cash'),
	(35, 'Rizwan', '2018-01-03', 154000, 27720, 550, 181170, 181170, 0, 'Cash'),
	(36, 'Rizwan', '2018-01-03', 154500, 27810, 2500, 179810, 179810, 0, 'Cash'),
	(37, 'Tyson', '2018-01-03', 90000, 16200, 25.5, 106174.5, 106174.5, 0, 'Cash'),
	(38, 'Rajdhani', '2018-01-03', 89500, 16110, 750.5, 104859.5, 104859.5, 0, 'Cash'),
	(39, 'Kapoor & Son', '2018-01-03', 89500, 16110, 25, 105585, 105585, 0, 'Cash'),
	(40, 'Ajay', '2018-01-03', 89000, 16020, 0, 105020, 105020, 0, 'Cash'),
	(41, 'Jayanta', '2018-01-03', 89000, 16020, 0, 105020, 105020, 0, 'Cash'),
	(42, 'Ajay Kant', '2018-01-03', 65500, 11790, 0, 77290, 77290, 0, 'Cash'),
	(43, 'Egjdks', '2018-01-03', 125500, 22590, 5000, 143090, 143090, 0, 'Cash'),
	(44, 'Tyson', '2018-01-03', 275000, 49500, 4950, 319550, 319550, 0, 'Cash'),
	(45, 'Hndksks', '2018-01-03', 59000, 10620, 0, 69620, 69620, 0, 'Cash'),
	(46, 'Shanawar', '2018-03-06', 65000, 11700, 0, 76700, 76700, 0, 'Card'),
	(47, 'Shanawar', '2018-04-06', 66000, 11880, 0, 77880, 77880, 0, 'Cash'),
	(48, 'ABc', '2018-05-06', 500, 90, 0, 590, 590, 0, 'Cash'),
	(49, 'fxg', '2018-05-06', 500, 90, 0, 590, 590, 0, 'Cash'),
	(50, 'sdfa', '2018-05-06', 65000, 11700, 0, 76700, 7500, 69200, 'Cash'),
	(51, 'adsaaf', '2018-06-06', 65000, 11700, 0, 76700, 76700, 0, 'Cash'),
	(52, 'sadf', '2018-06-06', 65000, 11700, 0, 76700, 4444, 72256, 'Cash'),
	(53, 'dsgfdgasd', '2018-06-06', 65000, 11700, 0, 76700, 555, 76145, 'Cash'),
	(54, 'sdfasd', '2018-06-06', 500, 90, 0, 590, 555, 35, 'Cash'),
	(55, 'dsfgfad', '2018-06-06', 65000, 11700, 0, 76700, 55555, 21145, 'Cash'),
	(56, 'kjhg', '2018-06-06', 130000, 23400, 0, 153400, 153400, 0, 'Cash'),
	(57, 'jhf', '2018-06-06', 130000, 23400, 0, 153400, 153400, 0, 'Cash'),
	(58, 'poiuytf', '2018-06-06', 700000, 126000, 0, 826000, 666, 825334, 'Cash');
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;

-- Dumping structure for table project_inv.invoice_details
DROP TABLE IF EXISTS `invoice_details`;
CREATE TABLE IF NOT EXISTS `invoice_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_no` (`invoice_no`),
  CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

-- Dumping data for table project_inv.invoice_details: ~56 rows (approximately)
/*!40000 ALTER TABLE `invoice_details` DISABLE KEYS */;
INSERT IGNORE INTO `invoice_details` (`id`, `invoice_no`, `product_name`, `price`, `qty`) VALUES
	(1, 25, 'Samsung Galaxy S8', 60000, 1),
	(2, 28, 'Samsung Galaxy S8', 60000, 5),
	(3, 29, 'Samsung Galaxy S8', 60000, 1),
	(4, 30, 'Iphone 8', 65000, 1),
	(5, 31, 'Samsung Galaxy S8', 60000, 1),
	(6, 32, 'Honor 9i', 29000, 1),
	(7, 33, 'Samsung Galaxy S8', 60000, 1),
	(8, 34, 'Avira Antivirus', 500, 1),
	(9, 34, 'Iphone 8', 65000, 1),
	(10, 34, 'Honor 9i', 29000, 1),
	(11, 35, 'Samsung Galaxy S8', 60000, 1),
	(12, 35, 'Honor 9i', 29000, 1),
	(13, 35, 'Iphone 8', 65000, 1),
	(14, 36, 'Samsung Galaxy S8', 60000, 1),
	(15, 36, 'Honor 9i', 29000, 1),
	(16, 36, 'Iphone 8', 65000, 1),
	(17, 36, 'Avira Antivirus', 500, 1),
	(18, 37, 'Samsung Galaxy S8', 60000, 1),
	(19, 37, 'Honor 9i', 29000, 1),
	(20, 37, 'Avira Antivirus', 500, 2),
	(21, 38, 'Samsung Galaxy S8', 60000, 1),
	(22, 38, 'Honor 9i', 29000, 1),
	(23, 38, 'Avira Antivirus', 500, 1),
	(24, 39, 'Samsung Galaxy S8', 60000, 1),
	(25, 39, 'Honor 9i', 29000, 1),
	(26, 39, 'Avira Antivirus', 500, 1),
	(27, 40, 'Samsung Galaxy S8', 60000, 1),
	(28, 40, 'Honor 9i', 29000, 1),
	(29, 41, 'Samsung Galaxy S8', 60000, 1),
	(30, 41, 'Honor 9i', 29000, 1),
	(31, 42, 'Iphone 8', 65000, 1),
	(32, 42, 'Avira Antivirus', 500, 1),
	(33, 43, 'Samsung Galaxy S8', 60000, 1),
	(34, 43, 'Avira Antivirus', 500, 1),
	(35, 43, 'Iphone 8', 65000, 1),
	(36, 44, 'Honor 9i', 29000, 5),
	(37, 44, 'Iphone 8', 65000, 2),
	(38, 45, 'Honor 9i', 29000, 2),
	(39, 45, 'Avira Antivirus', 500, 2),
	(40, 46, 'Iphone 8', 65000, 1),
	(41, 47, 'Iphone 8', 65000, 1),
	(42, 47, 'Avira Antivirus', 500, 1),
	(43, 47, 'Avira Antivirus', 500, 1),
	(44, 48, 'Avira Antivirus', 500, 1),
	(45, 49, 'Avira Antivirus', 500, 1),
	(46, 50, 'Iphone 8', 65000, 1),
	(47, 51, 'Iphone 8', 65000, 1),
	(48, 52, 'Iphone 8', 65000, 1),
	(49, 53, 'Iphone 8', 65000, 1),
	(50, 54, 'Avira Antivirus', 500, 1),
	(51, 55, 'Iphone 8', 65000, 1),
	(52, 56, 'Iphone 8', 65000, 1),
	(53, 56, 'Iphone 8', 65000, 1),
	(54, 57, 'Iphone 8', 65000, 1),
	(55, 57, 'Iphone 8', 65000, 1),
	(56, 58, 'Iphone 8', 65000, 10),
	(57, 58, 'Avira Antivirus', 500, 100);
/*!40000 ALTER TABLE `invoice_details` ENABLE KEYS */;

-- Dumping structure for table project_inv.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` double NOT NULL,
  `product_stock` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `p_status` enum('1','0') NOT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `product_name` (`product_name`),
  KEY `cid` (`cid`),
  KEY `bid` (`bid`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `categories` (`cid`),
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `brands` (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table project_inv.products: ~4 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT IGNORE INTO `products` (`pid`, `cid`, `bid`, `product_name`, `product_price`, `product_stock`, `added_date`, `p_status`) VALUES
	(17, 5, 17, 'Iphone 8', 65000, 1181, '2018-06-03', '1'),
	(18, 9, 18, 'Avira Antivirus', 500, 2886, '2018-01-31', '1');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table project_inv.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `register_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `user_role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `FK_user_user_permissions` (`user_role`),
  CONSTRAINT `FK_user_user_permissions` FOREIGN KEY (`user_role`) REFERENCES `user_permissions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table project_inv.user: ~5 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT IGNORE INTO `user` (`id`, `username`, `email`, `password`, `register_date`, `last_login`, `user_role`) VALUES
	(13, 'abc', 'ab@cd.com', '$2y$08$5BIDG8VQjE6K0Ab303Al9O6MsxinkSrzvyd1I9tt75BUVWaJkRlFm', '2018-06-07', '2018-06-07 00:00:00', 1),
	(14, 'axd', 'cd@er.com', '$2y$08$U6KFWj07qrVrrckCKc1ppe71K160GKhFAFE/j6qlm.6DRUijnRffG', '2018-06-07', '2018-06-07 00:00:00', 2),
	(15, 'abc', 'abs@cd.com', '$2y$08$ZzSQHST3pkz2Jj.caDwtheD2pjkPlSyy6AJZIloQc/d9bdTWW/I.O', '2018-06-07', '2018-06-07 00:00:00', 2),
	(16, 'testt', 'tt@Tt.com', '$2y$08$h2CZtDMNz57KyqRcqEZD..DYH7t621IQoz5TB2oq3Wrs0nS/TEcem', '2018-06-07', '2018-06-07 00:00:00', 4),
	(17, 'finalTest', 'final@test.com', '$2y$08$Qp7ydF8IKFinNUCn4lGBHekogtHlnaxBw8Sy9pBsVrV/QtmoaXXVu', '2018-06-07', '2018-06-07 00:00:00', 7);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table project_inv.user_permissions
DROP TABLE IF EXISTS `user_permissions`;
CREATE TABLE IF NOT EXISTS `user_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '0',
  `add_user` enum('0','1') NOT NULL DEFAULT '0',
  `manage_user` enum('0','1') NOT NULL DEFAULT '0',
  `user_roles` enum('0','1') NOT NULL DEFAULT '0',
  `new_lead` enum('0','1') NOT NULL DEFAULT '0',
  `customer_record` enum('0','1') NOT NULL DEFAULT '0',
  `new_order` enum('0','1') NOT NULL DEFAULT '0',
  `orders` enum('0','1') NOT NULL DEFAULT '0',
  `manage_categories` enum('0','1') NOT NULL DEFAULT '0',
  `manage_brands` enum('0','1') NOT NULL DEFAULT '0',
  `manage_products` enum('0','1') NOT NULL DEFAULT '0',
  `stock_summary` enum('0','1') NOT NULL DEFAULT '0',
  `inventory` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table project_inv.user_permissions: ~6 rows (approximately)
/*!40000 ALTER TABLE `user_permissions` DISABLE KEYS */;
INSERT IGNORE INTO `user_permissions` (`id`, `title`, `add_user`, `manage_user`, `user_roles`, `new_lead`, `customer_record`, `new_order`, `orders`, `manage_categories`, `manage_brands`, `manage_products`, `stock_summary`, `inventory`) VALUES
	(1, 'Admin', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL),
	(2, 'pos', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', NULL),
	(3, 'pos', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', NULL),
	(4, 'tst', '1', '1', '1', '0', '0', '0', '0', '0', '0', '1', '0', '0'),
	(5, 'tst', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', NULL),
	(6, '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1'),
	(7, 'finalTest', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0');
/*!40000 ALTER TABLE `user_permissions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
