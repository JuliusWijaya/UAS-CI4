-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 01:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu_id` varchar(30) NOT NULL,
  `menu_level` int(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `icon` varchar(40) NOT NULL,
  `link` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `orderCol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_id`, `menu_level`, `title`, `icon`, `link`, `parent_id`, `is_active`, `orderCol`) VALUES
(1, 'home', 0, 'Home', 'fa fa-home', '/', 0, 1, 0),
(4, 'lapang', 0, 'Field', 'fa fa-field', '/lapang', 0, 1, 2),
(5, 'list-lapang', 1, 'List Field', 'fa fa-field', '/list/lapang', 4, 1, 0),
(6, 'setting', 0, 'Setting ', 'fa fa-gear', '/setting', 0, 1, 3),
(7, 'menu-setting', 1, 'Menu', 'fa fa-circle', '/setting/menu', 6, 1, 0),
(14, 'about', 0, 'About', 'fa fa-info', '/about', 0, 1, 0),
(15, 'contact', 0, 'Contact ', 'fa fa-contact', '/contact', 0, 1, 0),
(16, 'shop', 0, 'Shop', 'fa fa-shop', '/shop', 14, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
