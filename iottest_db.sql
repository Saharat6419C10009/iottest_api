-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2023 at 08:49 AM
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
-- Database: `iottest_db`
--
CREATE DATABASE IF NOT EXISTS `iottest_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `iottest_db`;

-- --------------------------------------------------------

--
-- Table structure for table `room1_tb`
--

CREATE TABLE `room1_tb` (
  `id` int(11) NOT NULL,
  `airValue1` double NOT NULL,
  `airValue2` double NOT NULL,
  `airValue3` double NOT NULL,
  `roomDate` date NOT NULL,
  `roomTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room1_tb`
--

INSERT INTO `room1_tb` (`id`, `airValue1`, `airValue2`, `airValue3`, `roomDate`, `roomTime`) VALUES
(1, 23.33, 21.99, 30.33, '2023-07-08', '10:33:33'),
(2, 22.22, 23.08, 33.4, '2023-07-12', '11:30:00'),
(3, 14.54, 18.18, 19.33, '2023-07-14', '09:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `room2_tb`
--

CREATE TABLE `room2_tb` (
  `id` int(11) NOT NULL,
  `airValue1` double NOT NULL,
  `airValue2` double NOT NULL,
  `airValue3` double NOT NULL,
  `roomDate` date NOT NULL,
  `roomTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room2_tb`
--

INSERT INTO `room2_tb` (`id`, `airValue1`, `airValue2`, `airValue3`, `roomDate`, `roomTime`) VALUES
(1, 19.52, 25.18, 22.33, '2023-07-08', '08:57:21'),
(2, 32.22, 21.18, 17.4, '2023-07-12', '10:30:00'),
(3, 25.54, 27.52, 25.53, '2023-07-14', '14:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `room3_tb`
--

CREATE TABLE `room3_tb` (
  `id` int(11) NOT NULL,
  `airValue1` double NOT NULL,
  `airValue2` double NOT NULL,
  `airValue3` double NOT NULL,
  `roomDate` date NOT NULL,
  `roomTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room3_tb`
--

INSERT INTO `room3_tb` (`id`, `airValue1`, `airValue2`, `airValue3`, `roomDate`, `roomTime`) VALUES
(1, 21.48, 31.18, 26.33, '2023-07-09', '08:57:21'),
(2, 27.54, 26.52, 23.53, '2023-07-10', '14:33:33'),
(3, 30.22, 22.18, 25.4, '2023-07-12', '10:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `userId` int(11) NOT NULL,
  `userFullname` varchar(50) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `userPassword` varchar(20) NOT NULL,
  `userStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`userId`, `userFullname`, `userName`, `userPassword`, `userStatus`) VALUES
(1, 'สมดี ใจบัตร', 'somdee', '11111', 1),
(2, 'สมบัตร ใจดี', 'sombat', '22222', 1),
(3, 'สมใจ ดีบัตร', 'somjai', '33333', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room1_tb`
--
ALTER TABLE `room1_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room2_tb`
--
ALTER TABLE `room2_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room3_tb`
--
ALTER TABLE `room3_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `room1_tb`
--
ALTER TABLE `room1_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room2_tb`
--
ALTER TABLE `room2_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room3_tb`
--
ALTER TABLE `room3_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
