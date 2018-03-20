-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 26, 2018 at 06:05 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinehotbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservedproduct`
--

DROP TABLE IF EXISTS `reservedproduct`;
CREATE TABLE IF NOT EXISTS `reservedproduct` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `customername` text COLLATE utf8_bin NOT NULL,
  `ctno` varchar(20) COLLATE utf8_bin NOT NULL,
  `code` varchar(255) COLLATE utf8_bin NOT NULL,
  `price` double(10,2) NOT NULL,
  `rquantity` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_reserved` date NOT NULL,
  `randomizer` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `soldproduct`
--

DROP TABLE IF EXISTS `soldproduct`;
CREATE TABLE IF NOT EXISTS `soldproduct` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_bin NOT NULL,
  `squantity` varchar(255) COLLATE utf8_bin NOT NULL,
  `price` double(10,2) NOT NULL,
  `rand` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

DROP TABLE IF EXISTS `tblproduct`;
CREATE TABLE IF NOT EXISTS `tblproduct` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `code` varchar(255) COLLATE utf8_bin NOT NULL,
  `image` text COLLATE utf8_bin NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`, `quantity`) VALUES
(1, 'Box Mod Aegis', 'bmaegis1', 'box mod Aegis.jpg', 2150.00, 50),
(2, 'Obs engine RTA', 'obs1', 'tank OBSVTK-2.jpg', 1000.00, 50),
(3, 'Box Mod Snow Wolf', 'Bmsw1', 'box mod snowwolf.jpg', 3200.00, 50),
(4, 'Vandy Vape RTA', 'Vvrta1', 'tank vandy vape.jpg', 1200.00, 50),
(5, 'Xtar 4bay charger', 'X4bc1', 'xtar 4bay charger.jpg', 1000.00, 50),
(6, 'Xtar mc1 charger', 'Xmc1', 'xtar mc1 charger.jpg', 250.00, 50),
(7, 'Xtar mc2 charger', 'Xmc2', 'xtar mc2 charger.jpg', 500.00, 50);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
