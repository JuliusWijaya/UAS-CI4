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
-- Table structure for table `lapang`
--

CREATE TABLE `lapang` (
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_main` varchar(6) NOT NULL,
  `selesai` varchar(6) NOT NULL,
  `lapang` varchar(2) NOT NULL,
  `nama_tim` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapang`
--

INSERT INTO `lapang` (`id_user`, `tanggal`, `jam_main`, `selesai`, `lapang`, `nama_tim`) VALUES
(1, '2022-10-29', '08:00', '09:00', '1', 'SMANPATAS'),
(2, '2022-10-30', '10:00', '11:00', '2', 'SMANDA'),
(3, '2022-10-31', '14:00', '15:00', '1', 'SATAS'),
(4, '2022-11-02', '10:00', '11:00', '2', 'CAMPUS'),
(21, '2023-01-03', '09:00', '10:00', '1', 'UNSIL'),
(24, '2023-01-13', '13:30', '15:30', '1', 'LSC'),
(33, '2023-01-06', '22:05', '23:05', '2', 'Binus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lapang`
--
ALTER TABLE `lapang`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lapang`
--
ALTER TABLE `lapang`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
