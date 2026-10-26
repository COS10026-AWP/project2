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
-- Table structure for table `contribution_section`
--

CREATE TABLE `contribution_section` (
  `contribution_index` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contribution_1` text NOT NULL,
  `contribution_2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contribution_section`
--

INSERT INTO `contribution_section` (`contribution_index`, `student_id`, `name`, `contribution_1`, `contribution_2`) VALUES
(1, '106696764', 'Harper', 'Leader in project planning, responsible for HTML, CSS, and the home page.', 'Responsible for manage.php, added dynamic menu for mobile, and CSS for the manage.php'),
(2, '106565482', 'Nathan', 'Co-leader, responsible for the job info page.', 'Responsible for login.php, search.php, setting.php, and CSS for login.php and search.php'),
(3, '105996858', 'Tiffany', 'Responsible for the job application page.', 'Responsible for process_eoi.php, and CSS for apply.php and process_eoi.php'),
(4, '106379243', 'Khoi', 'Responsible for the about page.', 'Setting up tables and databases to be used for about.php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contribution_section`
--
ALTER TABLE `contribution_section`
  ADD PRIMARY KEY (`contribution_index`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
