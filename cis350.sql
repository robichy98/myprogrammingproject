-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 12:33 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cis350`
--

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `id` int(11) NOT NULL,
  `days` varchar(255) NOT NULL,
  `slot1` varchar(255) NOT NULL,
  `slot2` varchar(255) NOT NULL,
  `slot3` varchar(255) NOT NULL,
  `slot4` varchar(255) NOT NULL,
  `slot5` varchar(255) NOT NULL,
  `slot6` varchar(255) NOT NULL,
  `slot7` varchar(255) NOT NULL,
  `slot8` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`id`, `days`, `slot1`, `slot2`, `slot3`, `slot4`, `slot5`, `slot6`, `slot7`, `slot8`) VALUES
(1, 'Sunday', '', '', '', '', '', '', '', ''),
(2, 'Monday', '', '', '', '', '', '', '', ''),
(3, 'Tuesday', '', '', '', '', '', '', '', ''),
(4, 'Wednesday', '', '', '', '', '', '', '', ''),
(5, 'Thursday', '', '', '', '', '', '', '', ''),
(6, 'Friday', '', '', '', '', '', '', '', ''),
(7, 'Saturday', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `slots` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `day`
--
ALTER TABLE `day`
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
-- AUTO_INCREMENT for table `day`
--
ALTER TABLE `day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
