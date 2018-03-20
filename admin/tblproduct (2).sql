-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 04, 2018 at 05:53 PM
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
-- Table structure for table `tblproduct`
--

DROP TABLE IF EXISTS `tblproduct`;
CREATE TABLE IF NOT EXISTS `tblproduct` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) COLLATE utf8_bin NOT NULL,
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  `image` text COLLATE utf8_bin NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `code`, `name`, `type`, `image`, `price`, `quantity`) VALUES
(41, 'Juice262', 'Blisslite Watermelon', 'Juice', 'blisslite-watermelon.jpg', 120.00, 100),
(40, 'Juice744', 'mc2 charger', 'Juice', 'xtar mc2 charger.jpg', 250.00, 20),
(39, 'Charger281', 'xtar4 bay charger', 'Charger', 'xtar 4bay charger.jpg', 1000.00, 30),
(38, 'Mod834', 'Box mod Snowwolf', 'Mod', 'box mod snowwolf.jpg', 3000.00, 10),
(37, 'Mod33', 'Box Mod Aegis', 'Mod', 'box mod Aegis.jpg', 1900.00, 10),
(36, 'Atomizer672', 'Obs Engine Rta', 'Atomizer', 'tank OBSVTK-2.jpg', 1300.00, 50),
(42, 'Juice898', 'Eldiablo Beelzebub', 'Juice', 'eldiablojuice-beelzebub.jpg', 150.00, 100);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
