-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2026 at 10:03 AM
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
-- Database: `world_wide_travel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_section`
--

CREATE TABLE `image_section` (
  `img_index` int(11) NOT NULL,
  `img_location` text NOT NULL,
  `img_alt_description` text NOT NULL,
  `img_title` text NOT NULL,
  `img_figcaption` text NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image_section`
--

INSERT INTO `image_section` (`img_index`, `img_location`, `img_alt_description`, `img_title`, `img_figcaption`, `width`, `height`) VALUES
(1, 'images/group.png', 'A picture of us!', 'Group Photo', 'From left to right: Harper, Nathan, Khoi, Tiffany', 1200, 900);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image_section`
--
ALTER TABLE `image_section`
  ADD PRIMARY KEY (`img_index`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image_section`
--
ALTER TABLE `image_section`
  MODIFY `img_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
