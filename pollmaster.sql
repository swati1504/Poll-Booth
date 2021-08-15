-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2021 at 07:09 AM
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
-- Table structure for table `pollmaster`
--

CREATE TABLE `pollmaster` (
  `id` int(11) NOT NULL,
  `polldet` text NOT NULL,
  `opt1` text NOT NULL,
  `opt2` text NOT NULL,
  `opt3` text NOT NULL,
  `opt4` text NOT NULL,
  `pollstatus` varchar(20) DEFAULT NULL,
  `pollstart` datetime NOT NULL DEFAULT current_timestamp(),
  `pollend` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pollmaster`
--

INSERT INTO `pollmaster` (`id`, `polldet`, `opt1`, `opt2`, `opt3`, `opt4`, `pollstatus`, `pollstart`, `pollend`) VALUES
(4, 'Choose the design ', 'Design A', 'Design B', 'Design C', 'Design D', 'Active', '2021-08-14 12:16:37', '2021-08-14 12:22:38'),
(5, 'choose the tshirt design', '1', '2', '3', '4', 'Closed', '2021-08-14 12:19:52', '2021-08-14 12:24:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pollmaster`
--
ALTER TABLE `pollmaster`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pollmaster`
--
ALTER TABLE `pollmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
