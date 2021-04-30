-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 04:07 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logs`
--

-- --------------------------------------------------------

--
-- Table structure for table `kosi assets`
--

CREATE TABLE `kosi assets` (
  `id` int(50) NOT NULL,
  `Items` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kosi assets`
--

INSERT INTO `kosi assets` (`id`, `Items`) VALUES
(1, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `office items`
--

CREATE TABLE `office items` (
  `id` int(100) NOT NULL,
  `Item` varchar(100) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `img` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `office items`
--

INSERT INTO `office items` (`id`, `Item`, `Quantity`, `img`) VALUES
(1, 'Laptop', 40, 'assets/img/image.jpeg'),
(2, 'Refrigerator', 30, 'assets/img/frige.jpeg'),
(3, 'Furniture', 25, 'assets/img/funiture.jpeg'),
(4, 'Air Condition', 24, 'assets/img/ac.jpeg'),
(5, 'Printer', 20, 'assets/img/printer.jpeg'),
(6, 'Cabinet', 20, 'assets/img/cabinet.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `Item` varchar(100) NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `username`, `Item`, `Status`) VALUES
(1, 'Kosi', 'Laptop', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `requests2`
--

CREATE TABLE `requests2` (
  `id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `status` enum('pending','accepted','declined') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `position` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `position`) VALUES
(1, 'emmanuel', 'emmapass', 'Manager'),
(2, 'daniel', 'danpass', 'HR'),
(3, 'Kosi', 'Kosipass', 'Employer'),
(4, 'tizzy', 'tizzypass', 'Employer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kosi assets`
--
ALTER TABLE `kosi assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office items`
--
ALTER TABLE `office items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests2`
--
ALTER TABLE `requests2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kosi assets`
--
ALTER TABLE `kosi assets`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `office items`
--
ALTER TABLE `office items`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requests2`
--
ALTER TABLE `requests2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
