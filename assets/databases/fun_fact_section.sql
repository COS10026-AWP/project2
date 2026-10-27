-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2026 at 10:02 AM
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
-- Table structure for table `fun_fact_section`
--

CREATE TABLE `fun_fact_section` (
  `fun_facts` int(11) NOT NULL,
  `nathan` text NOT NULL,
  `harper` text NOT NULL,
  `tiffany` text NOT NULL,
  `khoi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fun_fact_section`
--

INSERT INTO `fun_fact_section` (`fun_facts`, `nathan`, `harper`, `tiffany`, `khoi`) VALUES
(1, 'Used to dream of becoming a ski instructor to travel the world, but never found the time to stack up enough experience', 'Nearly drown as a kid', 'Can recognize 85% of Asian countries by their flags most of the times', 'Have ungodly skills to play rhythm games, along with a neverending hyperfixation on them '),
(2, 'Runs around in circles for eight hours a week, and spends around the same time doing flashcards (both as hobbies)', 'Had 8 stiches on her foot as a kid', 'Have a Spotify playlist that is over 75 hours', 'Have met multiple popular celebrities in person and had their autographs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fun_fact_section`
--
ALTER TABLE `fun_fact_section`
  ADD PRIMARY KEY (`fun_facts`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fun_fact_section`
--
ALTER TABLE `fun_fact_section`
  MODIFY `fun_facts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
