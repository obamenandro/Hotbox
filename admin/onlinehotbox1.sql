-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 11, 2018 at 03:24 AM
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
-- Database: `onlinehotbox1`
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
  `rquantity` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_reserved` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `reservedproduct`
--

INSERT INTO `reservedproduct` (`id`, `customername`, `ctno`, `code`, `rquantity`, `date_reserved`) VALUES
(7, 'bryan', '09564789159', 'bmaegis1', '1', '2018-01-26'),
(6, 'bryan', '09564789159', 'obs1', '1', '2018-01-26'),
(5, 'bryan', '09564789159', 'bmaegis1', '1', '2018-01-26'),
(8, 'bryan', '09564789159', 'obs1', '1', '2018-01-26'),
(9, 'bryan', '09564789159', 'bmaegis1', '1', '2018-01-26'),
(10, 'bryan', '09564789159', 'obs1', '1', '2018-01-26'),
(11, 'bryan', '09564789159', 'bmaegis1', '1', '2018-01-26'),
(12, 'bryan', '09564789159', 'obs1', '1', '2018-01-26'),
(13, 'b', '09564789159', 'bmaegis1', '1', '2018-01-26'),
(14, 'b', '09564789159', 'obs1', '1', '2018-01-26'),
(15, 'bryan', '09564789159', 'bmaegis1', '1', '2018-01-26'),
(16, 'bryan', '09564789159', 'obs1', '1', '2018-01-26'),
(17, 'Bryan', '09564789159', 'bmaegis1', '1', '2018-01-26'),
(18, 'Bryan', '09564789159', 'obs1', '1', '2018-01-26'),
(19, 'bryan', '09564789159', 'bmaegis1', '1', '2018-01-29'),
(20, 'jim', '09547862596', 'bmaegis1', '1', '2018-01-29'),
(21, 'jim', '09547862596', 'obs1', '1', '2018-01-29'),
(22, 'ric', '09547862596', 'bmaegis1', '1', '2018-01-29'),
(23, 'ric', '09547862596', 'obs1', '1', '2018-01-29'),
(24, 'jim', '09234156789', 'vape1234', '5', '2018-01-27');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`, `quantity`) VALUES
(1, 'Box Mod Aegis', 'bmaegis1', 'box mod Aegis.jpg', 2150.00, 3),
(2, 'Obs engine RTA', 'obs1', 'tank OBSVTK-2.jpg', 1000.00, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
