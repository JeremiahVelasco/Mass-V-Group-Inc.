-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2023 at 05:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `batteries`
--

CREATE TABLE `batteries` (
  `id` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `mvgi` varchar(200) DEFAULT NULL,
  `jis_type` varchar(200) DEFAULT NULL,
  `warranty` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `saved_slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batteries`
--

INSERT INTO `batteries` (`id`, `image`, `name`, `mvgi`, `jis_type`, `warranty`, `description`, `saved_slot`) VALUES
(1, 'assets/New Megaforce MF.png', 'MegaForce ', 'DIN55', '55559', '18 MONTHS/6 MONTHS', 'High Performance Battery', 1),
(10, 'assets/SuperKing.png', 'SuperKing', 'BJG31A', '11234', '6 Months', 'Hybrid Reinforced – Ideal for Tropical Climate Low-Maintenance', 0),
(11, 'assets/Primera.png', 'Primera', '4H0LAL', '448901', '12 Months', 'Re-engineered Elements', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batteries`
--
ALTER TABLE `batteries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batteries`
--
ALTER TABLE `batteries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
