-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 09:59 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `single_earn`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_borrow`
--

CREATE TABLE `table_borrow` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `amount` double NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_borrow`
--

INSERT INTO `table_borrow` (`id`, `name`, `amount`, `created`) VALUES
(1, 'সুজন', 7000, '2021-12-18 20:03:48'),
(2, 'বুনু', 6000, '2021-12-18 20:03:48'),
(3, 'স্কুল', 0, '2021-12-18 20:15:45'),
(4, 'দোকান বাকি', 87, '2021-12-18 20:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `table_cost`
--

CREATE TABLE `table_cost` (
  `id` int(11) NOT NULL,
  `cost_name` varchar(255) NOT NULL,
  `event` varchar(60) NOT NULL,
  `amount` double NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_cost`
--

INSERT INTO `table_cost` (`id`, `cost_name`, `event`, `amount`, `created`) VALUES
(44, '2q', 'vehicle', 2, '2021-12-10 20:48:58'),
(45, '2q', 'vehicle', 2, '2021-12-10 20:49:04'),
(46, '2q', 'vehicle', 2, '2021-12-10 20:49:07'),
(47, '2q', 'vehicle', 2, '2021-12-10 20:49:22'),
(48, '2q', 'vehicle', 2, '2021-12-10 20:49:50'),
(49, 'ewrw3', 'vehicle', 3, '2021-12-10 20:50:51'),
(50, 'as', 'vehicle', 33, '2021-12-10 20:51:04'),
(51, '22', 'vehicle', 22, '2021-12-10 21:01:02'),
(52, 'hakim', 'vehicle', 44, '2021-12-11 06:48:44'),
(53, '45', 'vehicle', 33, '2021-12-11 07:01:18'),
(54, '44', 'vehicle', 4, '2021-12-11 07:02:14'),
(55, 'breakfast', 'vehicle', 404, '2021-12-11 07:04:11'),
(56, '22', 'vehicle', 22, '2021-12-11 07:30:00'),
(57, 'সকালের নাস্তা', 'match_bazar', 120, '2021-12-11 20:16:25'),
(58, 'স্যাম্পু', 'match_bazar', 5, '2021-12-11 20:19:39'),
(59, 'School', 'match_bazar', 200, '2021-12-12 06:38:14'),
(60, 'সাবান', 'match_bazar', 100, '2021-12-12 06:48:21'),
(61, 'amni', 'match_bazar', 200, '2021-12-12 19:04:19'),
(62, 'School', 'match_bazar', 300, '2021-12-13 05:41:07'),
(63, 'রিক্সা ভাড়া', 'vehicle', 100, '2021-12-13 05:44:48'),
(64, 'bazar', 'match_bazar', 120, '2021-12-14 09:11:32'),
(65, 't-shirt', 'match_bazar', 340, '2021-12-14 09:14:58'),
(66, 'রিয়েক্ট কোর্স', 'vehicle', 1200, '2021-12-16 05:06:43'),
(67, 'React', 'Online Course', 1200, '2021-12-16 06:44:41'),
(68, 'টিসু', 'ম্যাচের বাজার', 25, '2021-12-16 16:22:42'),
(69, 'টিসু, মগ, সবজি', 'ম্যাচের বাজার', 120, '2021-12-16 18:20:39'),
(70, 'মাছ', 'বন্ধন ম্যাচ', 220, '2021-12-17 18:54:54'),
(71, 'চকলেট', 'no catagory', 130, '2021-12-17 19:17:20'),
(72, 'amar koros', 'no catagory', 3, '2021-12-17 20:37:13'),
(73, 'macher koros', 'no catagory', 6, '2021-12-17 20:39:43'),
(74, 'ফুল কপি', 'ম্যাচের বাজার', 50, '2021-12-18 19:08:00'),
(75, 'টমেটো', 'ম্যাচের বাজার', 30, '2021-12-18 19:08:24'),
(76, 'টমেটো', 'বন্ধন ম্যাচ', 30, '2021-12-18 19:09:44'),
(77, 'ফুল কপি', 'বন্ধন ম্যাচ', 50, '2021-12-18 19:10:02'),
(78, 'পেয়াজ ১কেজি', 'বন্ধন ম্যাচ', 40, '2021-12-18 19:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `table_cost_event`
--

CREATE TABLE `table_cost_event` (
  `id` int(11) NOT NULL,
  `event_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_cost_event`
--

INSERT INTO `table_cost_event` (`id`, `event_name`) VALUES
(1, 'match_bazar'),
(2, 'vehicle'),
(3, 'Shoping'),
(5, 'School'),
(7, 'Online Course'),
(27, 'ম্যাচের বাজার'),
(28, 'বন্ধন ম্যাচ');

-- --------------------------------------------------------

--
-- Table structure for table `table_income`
--

CREATE TABLE `table_income` (
  `id` int(11) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `catagory` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_income`
--

INSERT INTO `table_income` (`id`, `event_name`, `catagory`, `amount`, `created`) VALUES
(1, 'Sumaiya mariya', 'private', 5000, '2021-12-16 18:41:49'),
(2, 'Fayeja', 'private', 6000, '2021-12-16 18:42:23'),
(3, 'টাইপিং', 'Project', 4000, '2021-12-16 19:17:54'),
(4, 'sifat', 'no catagory', 2500, '2021-12-16 19:29:00'),
(5, 'aman', 'others', 400, '2021-12-16 20:00:08'),
(6, '355', 'others', 345, '2021-12-18 19:31:52'),
(7, 'Sifath', 'Tuition', 2500, '2021-12-18 19:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `table_income_catagory`
--

CREATE TABLE `table_income_catagory` (
  `id` int(11) NOT NULL,
  `catagory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_income_catagory`
--

INSERT INTO `table_income_catagory` (`id`, `catagory`) VALUES
(6, 'Developing'),
(7, 'Tuition'),
(8, 'School'),
(9, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `table_lending`
--

CREATE TABLE `table_lending` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_lending`
--

INSERT INTO `table_lending` (`id`, `name`, `amount`, `created`) VALUES
(1, 'aliusl islam dipu', 0, '2021-12-17 20:46:50'),
(2, 'Nayem', 1750, '2021-12-17 20:47:27'),
(3, 'সুজন', 0, '2021-12-17 21:46:53'),
(4, 'নাজমুল হাসান', -78, '2021-12-17 21:48:47'),
(5, 'কামরুল হাসান (ম্যাচ মেম্বার)', 0, '2021-12-17 21:55:00'),
(6, 'ফারুক', 0, '2021-12-18 04:53:54'),
(7, 'সুজন', 1200, '2021-12-18 16:52:07'),
(8, 'দিপু', 18000, '2021-12-18 17:55:52'),
(9, 'দিপু', 250, '2021-12-18 17:56:21'),
(10, 'কামরুল হাসান', 0, '2021-12-18 17:57:07'),
(11, 'ফারুক (ফুফুতো ভাই)', 5000, '2021-12-18 17:58:01'),
(12, 'কামরুল হাসান', 200, '2021-12-18 18:48:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_borrow`
--
ALTER TABLE `table_borrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_cost`
--
ALTER TABLE `table_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_cost_event`
--
ALTER TABLE `table_cost_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_income`
--
ALTER TABLE `table_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_income_catagory`
--
ALTER TABLE `table_income_catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_lending`
--
ALTER TABLE `table_lending`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_borrow`
--
ALTER TABLE `table_borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_cost`
--
ALTER TABLE `table_cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `table_cost_event`
--
ALTER TABLE `table_cost_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `table_income`
--
ALTER TABLE `table_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_income_catagory`
--
ALTER TABLE `table_income_catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `table_lending`
--
ALTER TABLE `table_lending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
