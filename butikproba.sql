-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 03:28 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `butikproba`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CatId` int(11) NOT NULL,
  `CatName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedBy` int(11) DEFAULT NULL,
  `DeletedBy` int(11) DEFAULT NULL,
  `CreatedAt` datetime NOT NULL,
  `UpdatedAt` datetime DEFAULT NULL,
  `DeletedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CatId`, `CatName`, `isDeleted`, `CreatedBy`, `UpdatedBy`, `DeletedBy`, `CreatedAt`, `UpdatedAt`, `DeletedAt`) VALUES
(23, 'Dior', 0, 1, 1, 1, '2020-01-08 21:49:03', '2020-01-13 03:02:38', '2020-01-08 21:59:25'),
(24, 'Steve Madden', 0, 1, 1, NULL, '2020-01-09 16:41:07', '2020-01-15 14:47:29', NULL),
(25, 'Lui Vitton', 0, 1, 1, NULL, '2020-01-09 17:38:19', '2020-01-13 02:32:14', NULL),
(26, 'Zara', 1, 1, NULL, 1, '2020-01-09 18:05:20', NULL, '2020-01-13 02:33:20'),
(27, 'Bershka', 1, 1, 1, 1, '2020-01-13 02:53:20', '2020-01-13 03:03:30', '2020-01-13 03:04:53'),
(30, 'Christian Louboutin', 0, 1, 1, NULL, '2020-01-13 03:09:22', '2020-01-15 14:20:50', NULL),
(31, 'Channel', 0, 1, 1, NULL, '2020-01-13 03:10:45', '2020-01-13 03:35:14', NULL),
(32, 'Giuseppe Zanotti', 0, 1, 1, NULL, '2020-01-13 03:17:20', '2020-01-15 14:48:19', NULL),
(33, 'Rene Caovilla', 0, 1, 1, NULL, '2020-01-13 03:17:35', '2020-01-15 14:49:57', NULL),
(34, 'Dolce & Gabbana', 0, 1, 1, NULL, '2020-01-13 03:19:42', '2020-01-15 14:50:36', NULL),
(37, 'Bershka', 0, 1, 1, NULL, '2020-01-13 16:05:52', '2020-01-15 14:47:41', NULL),
(54, 'Manolo Blahnik', 0, 1, 1, NULL, '2020-01-13 17:05:35', '2020-01-15 05:02:23', NULL),
(55, 'Aquazzura', 0, 1, NULL, NULL, '2020-01-15 14:53:03', NULL, NULL),
(56, 'Jimmy Choo', 0, 1, NULL, NULL, '2020-01-15 14:53:30', NULL, NULL),
(57, 'Aldo', 0, 1, NULL, NULL, '2020-01-15 14:54:02', NULL, NULL),
(58, 'Betsey Johnson', 0, 1, NULL, NULL, '2020-01-15 14:54:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SalesId` int(11) NOT NULL,
  `SalesName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `StartDate` datetime NOT NULL,
  `EndDate` datetime NOT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `UpdatedAt` datetime NOT NULL,
  `DeletedAt` datetime NOT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `DeletedBy` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SalesId`, `SalesName`, `StartDate`, `EndDate`, `CreatedAt`, `UpdatedAt`, `DeletedAt`, `CreatedBy`, `UpdatedBy`, `DeletedBy`, `isDeleted`) VALUES
(1, 'First Sale', '2020-01-22 00:00:00', '2020-01-23 00:00:00', '2020-01-10 00:00:00', '2020-01-14 22:24:28', '0000-00-00 00:00:00', 1, 1, 0, 0),
(2, 'Second Sale', '2020-01-13 00:00:00', '2020-01-14 00:00:00', '2020-01-10 07:10:48', '0000-00-00 00:00:00', '2020-01-10 07:15:53', 1, 0, 1, 1),
(6, 'March Sale', '2020-03-16 00:00:00', '2020-03-26 00:00:00', '2020-01-14 21:45:10', '2020-01-15 15:23:46', '0000-00-00 00:00:00', 1, 1, 0, 0),
(7, 'April Sale', '2020-04-14 00:00:00', '2020-05-20 00:00:00', '2020-01-14 21:46:21', '2020-01-14 22:24:58', '0000-00-00 00:00:00', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `ShoesId` int(11) NOT NULL,
  `Passcode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ShoesName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Price` int(11) NOT NULL,
  `Size` int(11) NOT NULL,
  `ImgUrl` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `Category` int(11) NOT NULL,
  `CreatedAt` datetime NOT NULL,
  `UpdatedAt` datetime DEFAULT NULL,
  `DeletedAt` datetime DEFAULT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedBy` int(11) DEFAULT NULL,
  `DeletedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`ShoesId`, `Passcode`, `ShoesName`, `Description`, `Price`, `Size`, `ImgUrl`, `isDeleted`, `Category`, `CreatedAt`, `UpdatedAt`, `DeletedAt`, `CreatedBy`, `UpdatedBy`, `DeletedBy`) VALUES
(14, 'ddaa1099', 'Strap', 'Heels with Pearls - Blue', 80, 8, './assets/PseudoProduct1.jpg', 0, 23, '2020-01-09 16:43:06', '2020-01-15 14:58:20', NULL, 1, 1, NULL),
(21, 'dkasdako9', 'Avelade', 'Beige Heels', 96, 5, './assets/PseudoProduct2.jpg', 0, 23, '2020-01-10 10:00:22', '2020-01-15 14:58:10', NULL, 1, 1, NULL),
(22, 'sjajdoj434', 'Dragonsy', 'Blue high heels with diamonds', 500, 7, './assets/PseudoProduct3.jpg', 0, 54, '2020-01-15 15:00:01', NULL, NULL, 1, NULL, NULL),
(23, 'dsajdoajsa8', 'Lorenzi', 'Rose powder elegant high heels', 120, 5, './assets/PseudoProduct4.jpg', 0, 31, '2020-01-15 15:01:26', NULL, NULL, 1, NULL, NULL),
(24, 'sdadasd99', 'Metalica', 'Metalic high heels', 440, 8, './assets/PseudoProduct5.jpg', 0, 23, '2020-01-15 15:02:15', '2020-01-15 15:07:15', NULL, 1, 1, NULL),
(25, 'dasdasd89', 'Irenee', 'Women\'s Irenee Two-Piece Block-Heel Sandals', 320, 8, './assets/PseudoProduct6.jpg', 0, 23, '2020-01-15 15:03:05', '2020-01-15 15:07:59', NULL, 1, 1, NULL),
(26, 'nlifanifa8', 'Prince d\'Orsay', 'Prince d\'Orsay Evening Pumps', 320, 9, './assets/PseudoProduct7.jpg', 0, 58, '2020-01-15 15:08:58', NULL, NULL, 1, NULL, NULL),
(27, 'cacsacasca89', 'Aveline', 'Aveline Bow-Embellished Sandals', 440, 4, './assets/PseudoProduct8.jpg', 0, 23, '2020-01-15 15:12:51', '2020-01-15 15:22:15', NULL, 1, 1, NULL),
(28, 'dsadassda343', 'Sereno 100', 'Black Suede Sandal with Jewelled Buckle', 120, 8, './assets/PseudoProduct9.jpg', 0, 23, '2020-01-15 15:14:06', '2020-01-15 15:22:25', NULL, 1, 1, NULL),
(29, 'knvisnaiof8', 'Alden', 'Ankle Strap Heels', 77, 8, './assets/PseudoProduct11.jpg', 0, 23, '2020-01-15 15:15:41', '2020-01-15 15:22:48', NULL, 1, 1, NULL),
(30, 'dsadasd9090', 'Annie', 'Feather Suede Sandal 100mm', 800, 9, './assets/PseudoProduct9.jpg', 0, 23, '2020-01-15 15:17:10', '2020-01-15 15:22:41', NULL, 1, 1, NULL),
(31, 'dsadasda90', 'Tropicana', 'Tropicana Tassel 105mm Sandal, Blue Pattern', 44, 7, './assets/PseudoProduct16.jpg', 0, 55, '2020-01-15 15:17:56', NULL, NULL, 1, NULL, NULL),
(32, 'msakmckasca9', 'Renee', 'Embellished Ankle Cuff Sandal, Black', 750, 8, './assets/PseudoProduct15.jpg', 0, 33, '2020-01-15 15:19:10', NULL, NULL, 1, NULL, NULL),
(33, 'sdasdasda88', 'Rese', 'Jeweled Satin Sandal Rose Heel', 860, 7, './assets/PseudoProduct14.jpg', 0, 34, '2020-01-15 15:20:35', NULL, NULL, 1, NULL, NULL),
(34, 'dsadasda88', 'Macy', 'Crystal-Covered Asymmetric Sandal, Beige', 88, 7, './assets/PseudoProduct13.jpg', 0, 33, '2020-01-15 15:21:46', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shoesonsale`
--

CREATE TABLE `shoesonsale` (
  `ShoesId` int(11) NOT NULL,
  `SalesId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shoesonsale`
--

INSERT INTO `shoesonsale` (`ShoesId`, `SalesId`) VALUES
(14, 1),
(14, 6),
(21, 1),
(23, 7),
(25, 7),
(32, 7),
(34, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UsersId` int(11) NOT NULL,
  `FirstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `CreatedAt` datetime NOT NULL,
  `UpdatedAt` datetime DEFAULT NULL,
  `DeletedAt` datetime DEFAULT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedBy` int(11) DEFAULT NULL,
  `DeletedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UsersId`, `FirstName`, `LastName`, `Email`, `Password`, `Username`, `isDeleted`, `CreatedAt`, `UpdatedAt`, `DeletedAt`, `CreatedBy`, `UpdatedBy`, `DeletedBy`) VALUES
(1, 'Aja', 'Ajcetic', 'aja@gmail.com', 'bcc1b098becadc98dcb74298fc30d4c4', 'Admin', 0, '2020-01-09 16:38:37', '2020-01-15 15:26:44', NULL, 1, 1, NULL),
(2, 'Igor', 'Andjelkovic', 'igiigi@gmail.com', '7d0d2932689347e54e26daee8ef452fd', 'Igor', 0, '2020-01-14 19:17:31', '2020-01-15 15:24:07', NULL, 1, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CatId`),
  ADD KEY `created` (`CreatedBy`),
  ADD KEY `updated` (`UpdatedBy`),
  ADD KEY `deleted` (`DeletedBy`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SalesId`),
  ADD KEY `created` (`CreatedBy`),
  ADD KEY `updated` (`UpdatedBy`),
  ADD KEY `delete` (`DeletedBy`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`ShoesId`),
  ADD KEY `Foreign Key` (`Category`),
  ADD KEY `created` (`CreatedBy`),
  ADD KEY `updated` (`UpdatedBy`),
  ADD KEY `deleted` (`DeletedBy`);

--
-- Indexes for table `shoesonsale`
--
ALTER TABLE `shoesonsale`
  ADD PRIMARY KEY (`ShoesId`,`SalesId`),
  ADD KEY `SalesId` (`SalesId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UsersId`),
  ADD KEY `created` (`CreatedBy`),
  ADD KEY `updated` (`UpdatedBy`),
  ADD KEY `deleted` (`DeletedBy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SalesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `ShoesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `users` (`UsersId`),
  ADD CONSTRAINT `categories_ibfk_2` FOREIGN KEY (`UpdatedBy`) REFERENCES `users` (`UsersId`),
  ADD CONSTRAINT `categories_ibfk_3` FOREIGN KEY (`DeletedBy`) REFERENCES `users` (`UsersId`);

--
-- Constraints for table `shoes`
--
ALTER TABLE `shoes`
  ADD CONSTRAINT `shoes_ibfk_1` FOREIGN KEY (`Category`) REFERENCES `categories` (`CatId`),
  ADD CONSTRAINT `shoes_ibfk_2` FOREIGN KEY (`CreatedBy`) REFERENCES `users` (`UsersId`),
  ADD CONSTRAINT `shoes_ibfk_3` FOREIGN KEY (`UpdatedBy`) REFERENCES `users` (`UsersId`),
  ADD CONSTRAINT `shoes_ibfk_4` FOREIGN KEY (`DeletedBy`) REFERENCES `users` (`UsersId`);

--
-- Constraints for table `shoesonsale`
--
ALTER TABLE `shoesonsale`
  ADD CONSTRAINT `shoesonsale_ibfk_1` FOREIGN KEY (`ShoesId`) REFERENCES `shoes` (`ShoesId`),
  ADD CONSTRAINT `shoesonsale_ibfk_2` FOREIGN KEY (`SalesId`) REFERENCES `sales` (`SalesId`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `users` (`UsersId`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`UpdatedBy`) REFERENCES `users` (`UsersId`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`DeletedBy`) REFERENCES `users` (`UsersId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
