-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 03:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `kosi assets`
--

CREATE TABLE `kosi assets` (
  `id` int(50) NOT NULL,
  `Items` varchar(50) NOT NULL,
  `Stats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kosi assets`
--

INSERT INTO `kosi assets` (`id`, `Items`, `Stats`) VALUES
(1, 'Laptop', 'Granted');

-- --------------------------------------------------------

--
-- Table structure for table `office items`
--

CREATE TABLE `office items` (
  `id` int(100) NOT NULL,
  `Item` varchar(100) NOT NULL,
  `Quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `office items`
--

INSERT INTO `office items` (`id`, `Item`, `Quantity`) VALUES
(1, 'Laptop', 40),
(2, 'Refrigerator', 30),
(3, 'Furniture', 25),
(4, 'AirCondition', 24),
(5, 'Printer', 20),
(6, 'Cabinet', 20);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `Item` varchar(100) NOT NULL,
  `Stats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `username`, `Item`, `Stats`) VALUES
(1, 'Kosi', 'Laptop', 'Accepted'),
(2, 'Kosi', 'Refrigerator', 'pending'),
(3, 'Kosi', 'Furniture', 'pending'),
(4, 'tizzy', 'AirCondition', 'Granted'),
(5, 'tizzy', 'Cabinet', 'Granted'),
(6, 'tizzy', 'Laptop', 'Rejected'),
(7, 'Kosi', 'Furniture', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tizzy assets`
--

CREATE TABLE `tizzy assets` (
  `id` int(100) NOT NULL,
  `Items` varchar(100) DEFAULT NULL,
  `Stats` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tizzy assets`
--

INSERT INTO `tizzy assets` (`id`, `Items`, `Stats`) VALUES
(1, 'Cabinet', 'Granted'),
(2, 'AirCondition', 'Granted'),
(3, 'Laptop', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `position` char(50) NOT NULL,
  `Firstname` text DEFAULT NULL,
  `Lastname` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `position`, `Firstname`, `Lastname`) VALUES
(1, 'emmanuel', 'emmapass', 'Manager', 'Emmanuel', 'Lebe'),
(2, 'daniel', 'danpass', 'HR', 'Daniel', 'Afam'),
(3, 'Kosi', 'Kosipass', 'Employer', 'Kosiso', 'Obiako'),
(4, 'tizzy', 'tizzypass', 'Employer', 'Tolu', 'Ayo');

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
-- Indexes for table `tizzy assets`
--
ALTER TABLE `tizzy assets`
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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tizzy assets`
--
ALTER TABLE `tizzy assets`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
