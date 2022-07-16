-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jul 16, 2022 at 01:21 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepop`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `owner_company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `company_name`, `owner_company`) VALUES
(1, 'JYP Entertainments', 'J.Y. Park'),
(2, 'YG Entertainments', 'Yang Hyun-suk\r\n'),
(3, 'S.M. Entertainment', 'Lee Soo-mane'),
(4, 'Big Hit Entertainment\r\n', 'Bang Si-Hyuk'),
(5, 'Pledis Entertainment', 'Han Seong-su');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `id_group` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id_group`, `group_name`, `company_name`) VALUES
(4, 'AESPA', 'S.M. Entertainment'),
(6, 'BIGBANGs', 'Pledis Entertainment'),
(1, 'BTS', 'Big Hit Entertainment\r\n'),
(2, 'ITZY', 'JYP Entertainments'),
(3, 'SEVENTEEN', 'Pledis Entertainment'),
(7, 'Treasure', 'YG Entertainments');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id_members` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id_members`, `nickname`, `name`, `group_name`, `company_name`) VALUES
(3, 'Rap Monster', 'Kim Nam Joons', 'BTS', 'Big Hit Entertainment\r\n'),
(4, 'Ryujin', 'Shin Ryu-jin', 'ITZY', 'JYP Entertainments'),
(9, 'T.O.Ps', 'Choi Seung Hyuns', 'BIGBANGs', 'JYP Entertainments'),
(14, 'Bang Yedam', 'Bang Ye dam', 'Treasure', 'YG Entertainments');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`) VALUES
(1, 'bagas', 'admin', 'admin'),
(2, 'admin', 'admin', 'password_admin'),
(5, 'dera', 'dera1', '$2y$10$kqdz64qUb6.W./f5R50KG.RYU4.VcG6lu6ukorih8OO9lwDPJ9UCq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`),
  ADD KEY `company_name` (`company_name`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id_group`),
  ADD KEY `group_name` (`group_name`,`company_name`),
  ADD KEY `company_name` (`company_name`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id_members`),
  ADD KEY `group_name` (`group_name`,`company_name`),
  ADD KEY `company_name` (`company_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id_members` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD CONSTRAINT `kelompok_ibfk_1` FOREIGN KEY (`company_name`) REFERENCES `company` (`company_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`group_name`) REFERENCES `kelompok` (`group_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_3` FOREIGN KEY (`company_name`) REFERENCES `kelompok` (`company_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
