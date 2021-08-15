-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2021 at 07:10 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `votings`
--

CREATE TABLE `votings` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `polldetid` int(11) NOT NULL,
  `response` int(11) NOT NULL,
  `votdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votings`
--

INSERT INTO `votings` (`id`, `userid`, `polldetid`, `response`, `votdate`) VALUES
(10, 21, 4, 2, '2021-08-14 12:20:53'),
(11, 21, 5, 3, '2021-08-14 12:21:01'),
(12, 22, 5, 4, '2021-08-14 12:24:13'),
(13, 23, 4, 3, '2021-08-15 10:22:16'),
(14, 24, 4, 1, '2021-08-15 10:28:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `votings`
--
ALTER TABLE `votings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `votings`
--
ALTER TABLE `votings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
