-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 01:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `praxa`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(2, 'Macedonia'),
(3, 'Hungary'),
(4, 'France'),
(6, 'Argentina'),
(7, 'Japan'),
(14, 'Honduras'),
(15, 'Poland'),
(18, 'Mexiko');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `pfp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `phone`, `country`, `city`, `address`, `zipcode`, `gender`, `active`, `pfp`) VALUES
(154, 'hihiqwertuuuuuuuuu', 'haha@gm.com', 'qsd', '851264ec0f0b1fbb0461262d5497b322b2aba84c', 'q', 0, 'q', 'q', 'q', 0, 0, 'pictures/buddhagiant----tiantan11739751280_4_3_2_1.jpg'),
(155, 'hihiqweqweq', 'haha@gm.coml', 'q', '$2y$10$uWbyjUvJKkt4d8YmehvLN.NPn2RFmOS1n5PBTkaxsnNnZlhJVdX.S', 'q', 0, 'q', 'q', 'q', 0, 0, NULL),
(156, 'miert  ', 'haha@gmail.com', 'qre', '$2y$10$9xL8fIF6aJybpEuGH/KeSONPFqO9cmnmryB6/OTDYmDkrTzpZmJx.', 'q', 0, 'q', 'q', 'q', 0, 0, NULL),
(157, 'miert  ', 'haha@gmail.coms', 'qret', '$2y$10$ykBPVFiUxUnMAB6ukgiPe.DEjd1hwT6su4aDSWx85tL/WsPJJm1TW', 'q', 0, 'q', 'q', 'q', 0, 0, NULL),
(158, 'miert  ', 'haha@ssgmail.coms', 'weq', 'aead3028c4c881bbcb1d8cd6b9a432bbdb11ecf0', 'q', 0, 'q', 'q', 'q', 0, 0, NULL),
(163, 'hi', 'qweqwe@g.co', 'aik;ms;kldmaskd', '851264ec0f0b1fbb0461262d5497b322b2aba84c', 'w', 0, '', '', '', 0, 0, 'pictures/buddhagiant----tiantan11739751280.jpg'),
(164, 'qqwe', 'qwwq@gmail.com', 'qwewe', '851264ec0f0b1fbb0461262d5497b322b2aba84c', '34234', 6, 'q', 'q', '', 0, 0, 'pictures/buddhagiant----tiantan11739751280_5_4_3_2_1.jpg'),
(165, 'rtt', 'wqeqwe@gmail.com', 'qweqwe', '851264ec0f0b1fbb0461262d5497b322b2aba84c', 'q', 0, 'q', 'wer', 'w', 0, 0, 'pictures/buddhagiant----tiantan11739751280_6_5_4_3_2_1.jpg'),
(166, 'rtt', 'qweqw@gmail.com', 'qweqwqwe', '851264ec0f0b1fbb0461262d5497b322b2aba84c', '', 0, '', '', '', 0, 0, 'pictures/buddhagiant----tiantan11739751280_7_6_5_4_3_2_1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country-id` (`country`),
  ADD KEY `country-id_2` (`country`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
