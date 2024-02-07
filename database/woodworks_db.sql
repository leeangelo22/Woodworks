-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 04:05 AM
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
-- Database: `woodworks_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_appointment`
--

CREATE TABLE `book_appointment` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `service` varchar(50) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_appointment`
--

INSERT INTO `book_appointment` (`id`, `name`, `email`, `phone`, `date`, `time`, `service`, `message`, `created_at`) VALUES
(1, 'Lee', 'sample@gmail.com', '09876543210', '2024-02-07', '10:17:00', 'Home Service', 'sample', '2024-02-07 02:18:06'),
(2, 'Sample', 'sample@gmail.com', '09876543210', '2024-02-07', '10:23:00', 'Door', 'sample message', '2024-02-07 02:23:49'),
(3, '', '', '', '0000-00-00', '00:00:00', '', 'sample message', '2024-02-07 02:25:41'),
(4, 'Sample', 'sample@gmail.com', '09876543210', '2024-02-07', '10:38:00', 'Wardrobe', 'sample message', '2024-02-07 02:38:22'),
(5, 'Sample', 'sample@gmail.com', '09876543210', '2024-02-07', '10:40:00', 'Door', 'sample msg', '2024-02-07 02:40:23'),
(6, 'Lee', 'sample@gmail.com', '09876543210', '2024-02-07', '10:44:00', 'Cabinet', 'sample', '2024-02-07 02:44:21'),
(7, 'Lee', 'sample@gmail.com', '09876543210', '2024-02-07', '10:44:00', 'Cabinet', 'sample', '2024-02-07 02:46:03'),
(8, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:47:00', 'Hamba', 'fhdfsdsa', '2024-02-07 02:47:46'),
(9, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:47:00', 'Hamba', 'fhdfsdsa', '2024-02-07 02:50:58'),
(10, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:52:00', 'Cabinet', 'asfsfasf', '2024-02-07 02:52:19'),
(11, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:52:00', 'Cabinet', 'asfsfasf', '2024-02-07 02:54:59'),
(12, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:52:00', 'Cabinet', 'asfsfasf', '2024-02-07 02:54:59'),
(13, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:52:00', 'Cabinet', 'asfsfasf', '2024-02-07 02:55:00'),
(14, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:52:00', 'Cabinet', 'asfsfasf', '2024-02-07 02:55:00'),
(15, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:52:00', 'Cabinet', 'asfsfasf', '2024-02-07 02:55:00'),
(16, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:52:00', 'Cabinet', 'asfsfasf', '2024-02-07 02:55:01'),
(17, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:52:00', 'Cabinet', 'asfsfasf', '2024-02-07 02:55:01'),
(18, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:52:00', 'Cabinet', 'asfsfasf', '2024-02-07 02:55:48'),
(19, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:52:00', 'Cabinet', 'asfsfasf', '2024-02-07 02:55:49'),
(20, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:52:00', 'Cabinet', 'asfsfasf', '2024-02-07 02:55:49'),
(21, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:52:00', 'Cabinet', 'asfsfasf', '2024-02-07 02:55:49'),
(22, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:52:00', 'Cabinet', 'asfsfasf', '2024-02-07 02:55:49'),
(23, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:52:00', 'Cabinet', 'asfsfasf', '2024-02-07 02:55:50'),
(24, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:52:00', 'Cabinet', 'asfsfasf', '2024-02-07 02:55:50'),
(25, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:52:00', 'Cabinet', 'asfsfasf', '2024-02-07 02:55:50'),
(26, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:52:00', 'Cabinet', 'asfsfasf', '2024-02-07 02:55:50'),
(27, 'Lee', 'lamollo@gmail.com', '09876543210', '2024-02-07', '10:52:00', 'Cabinet', 'asfsfasf', '2024-02-07 02:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Sample', 'sample@gmail.com', 'Sample', 'sample message', '2024-02-07 02:58:46'),
(2, 'Sample', 'sample@gmail.com', 'Sample', 'sample message', '2024-02-07 03:02:26'),
(3, 'Sample', 'sample@gmail.com', 'Sample', 'sample message', '2024-02-07 03:02:59'),
(4, 'Sample', 'sample@gmail.com', 'Sample', 'sample message', '2024-02-07 03:03:00'),
(5, 'Sample', 'sample@gmail.com', 'Sample', 'sample message', '2024-02-07 03:03:00'),
(6, 'Sample', 'sample@gmail.com', 'Sample', 'sample message', '2024-02-07 03:03:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_appointment`
--
ALTER TABLE `book_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_appointment`
--
ALTER TABLE `book_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
