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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'wow@gmail..com', '$2y$10$KkYyM2o3O8mpG33EkFWV/OupuaEcCcczgl.bXoBO1GVTVx5Eh44uG', '2021-08-08 13:18:17'),
(2, '106120131@nitt.edu', '$2y$10$Cf7jdPlKtabNJ0066EP4V.wS7a60atKwj5xLzJj5ExkAnb88mDDc6', '2021-08-08 13:23:35'),
(3, 'swati24@gmail.com', '$2y$10$9QuqqgrpN/oQ8eVmet4bcO9Pt6iJ5OUTF90TgTPxuwKGS.jr0zhde', '2021-08-08 13:26:00'),
(4, 'bhupi24@gmail.com', '$2y$10$fZ6UTG1mu1ZKJiRhqza0/.z2npeRCLMQeTp9ADvUo/AN7XrAifjmK', '2021-08-08 13:33:27'),
(5, 'nicey24@g.com', '$2y$10$5ZdwPE8GENUymAANw6aOY./X5P9Bsb7Uh6n0YuupCImcYDGZEMrPm', '2021-08-08 14:43:40'),
(8, 'bhupi2@gmail.com', '$2y$10$h5rimbHTRMuIhO4DTOb.iOSmP/4eU5GV1DI1v7yCUIyhKalc0zX5C', '2021-08-08 15:14:56'),
(9, 'swatip@gmail.com', '$2y$10$EXqkDX8OWQSk/nqowUUTweGSxbiXx6uvpz37BSdwUJUpptMURqVHy', '2021-08-08 15:23:54'),
(11, 'sandy', '$2y$10$G1QmJ04axPI.wGCM78FvC.4rN1GUj.iZF3s702qhjJCTJ5MmTSSjy', '2021-08-08 15:47:59'),
(13, 'saswatip', '$2y$10$/85nqrXnkk3zIGM3wditJOTYiTpneuX60r2nU9ixVE04CD5HacNqC', '2021-08-08 18:50:52'),
(16, 'swatip24', '$2y$10$i9Cobc3wJofJZJGct3sCRu/GOqqTJZehSxOTUf64znuMlGBlf06K.', '2021-08-11 21:15:02'),
(17, 'qwer', '$2y$10$mHROkwVWE3QNiwWoUZavv.4GRd6kjhLZgQyNpRxTlwkMmB1OI7cNK', '2021-08-12 21:45:43'),
(20, 'nitt123', '$2y$10$Y.7CJf3TclrmT/adNLRHNu/o5iKUiJDGuXtK05myV3zGoeHWRYnJa', '2021-08-14 12:08:40'),
(21, 'richa', '$2y$10$brH5SzlyzgwjPmt74nCje.vO0.RAmsfPLSe7dOs/swlM.dT26HZF2', '2021-08-14 12:13:00'),
(22, 'bhupi', '$2y$10$ImRZqAK5/hw4OnXhMymOFe0NDJALBUV46eTiFhLIiGg38k4DDzbKe', '2021-08-14 12:23:46'),
(23, 'swatinitt123', '$2y$10$TYV9GJ/jBc34DdG46JZJgedXCj0aM6mussJa7plqgl5c5mNeeyQ.i', '2021-08-15 10:20:57'),
(24, 'delta', '$2y$10$EGLgxluVNiXW1KNlCg2IP.QHTv9BYlyXWitdFWGkKm5jH9a7vxYBq', '2021-08-15 10:28:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
