-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2025 at 07:00 AM
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
-- Database: `web_spark`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `Id` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Email` varchar(70) NOT NULL,
  `Phone` double DEFAULT NULL,
  `Password` varchar(40) NOT NULL,
  `ConfirmPassword` varchar(40) NOT NULL,
  `analyze_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Id`, `Username`, `Email`, `Phone`, `Password`, `ConfirmPassword`, `analyze_count`) VALUES
(12, 'zunairasheraz', 'zunairasheraz2106@gmail.com', NULL, 'MTIzNDU2Nzg=', 'MTIzNDU2Nzg=', 0),
(15, 'neha', 'neha123@gmail.com', NULL, 'MTIzNDU2Nzg=', 'MTIzNDU2Nzg=', 3);

-- --------------------------------------------------------

--
-- Table structure for table `traffic_logs`
--

CREATE TABLE `traffic_logs` (
  `id` int(11) NOT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `is_real` tinyint(1) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `traffic_logs`
--

INSERT INTO `traffic_logs` (`id`, `website_url`, `ip_address`, `user_agent`, `is_real`, `timestamp`) VALUES
(17, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 02:02:20'),
(18, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 02:07:55'),
(19, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 02:08:24'),
(20, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 02:09:17'),
(21, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 02:20:45'),
(22, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 02:23:20'),
(23, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 02:25:46'),
(24, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 02:42:06'),
(25, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 02:43:29'),
(26, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 02:45:55'),
(27, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 02:46:53'),
(28, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:10:01'),
(29, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:10:59'),
(30, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:11:22'),
(31, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:12:04'),
(32, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:12:30'),
(33, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:13:18'),
(34, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:14:59'),
(35, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:15:49'),
(36, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:16:10'),
(37, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:16:33'),
(38, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:16:51'),
(39, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:18:25'),
(40, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:18:35'),
(41, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:34:37'),
(42, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:34:39'),
(43, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:34:50'),
(44, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:43:17'),
(45, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:43:54'),
(46, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:44:33'),
(47, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:44:54'),
(48, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:46:59'),
(49, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:47:36'),
(50, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:48:12'),
(51, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:49:21'),
(52, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:50:52'),
(53, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:50:55'),
(54, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:52:03'),
(55, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:53:01'),
(56, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:53:24'),
(57, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:54:05'),
(58, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:54:25'),
(59, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:55:01'),
(60, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:55:19'),
(61, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:55:40'),
(62, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:56:50'),
(63, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:57:40'),
(64, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:57:59'),
(65, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 03:58:33'),
(66, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 04:08:41'),
(67, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 04:08:56'),
(68, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 04:10:01'),
(69, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 04:12:13'),
(70, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 04:13:47'),
(71, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 04:14:09'),
(72, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 04:18:31'),
(73, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 04:18:59'),
(74, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 04:19:03'),
(75, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 04:19:05'),
(76, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 04:19:09'),
(77, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 04:20:51'),
(78, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 04:20:56'),
(79, 'localhost/WEB%20SPARK/mywebiste.php', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 1, '2025-05-08 04:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `web_id` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(500) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`web_id`, `Id`, `name`, `url`, `description`, `created_at`) VALUES
(19, 15, 'quiz web', 'https://www.buzzfeed.com/', 'quiz app', '2025-05-08 04:13:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `traffic_logs`
--
ALTER TABLE `traffic_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`web_id`),
  ADD KEY `Id` (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `traffic_logs`
--
ALTER TABLE `traffic_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `web_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `websites`
--
ALTER TABLE `websites`
  ADD CONSTRAINT `websites_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `register` (`Id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
