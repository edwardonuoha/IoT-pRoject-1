-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 07:20 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esp32`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_building`
--

CREATE TABLE `assign_building` (
  `assign_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `building_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_building`
--

INSERT INTO `assign_building` (`assign_id`, `user_id`, `building_id`, `created_at`) VALUES
(1, 11, 1, '2020-05-11 17:13:11'),
(2, 12, 2, '2020-05-11 17:13:41'),
(3, 11, 2, '2020-05-11 17:13:46'),
(4, 17, 1, '2020-05-11 17:15:26'),
(5, 17, 2, '2020-05-11 17:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`id`, `name`, `email`, `address`, `phone`, `created_at`) VALUES
(1, 'Headgreenhouse', 'head@gmail.com', NULL, NULL, '2019-03-13 04:34:15'),
(2, 'Branch', 'branch@gmail.com', NULL, NULL, '2019-03-13 04:34:30'),
(3, 'sugarcane', 'james@test.com', NULL, NULL, '2019-03-13 09:32:25'),
(4, 'Robin', 'mazharulslm9@gmail.com', '4047 Okeechobee Blvd\r\n33409', '8001230000', '2020-05-10 13:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `building_id` int(11) DEFAULT NULL,
  `event` timestamp NOT NULL DEFAULT current_timestamp(),
  `temperature` varchar(10) NOT NULL,
  `humidity` varchar(10) NOT NULL,
  `ppm` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `building_id`, `event`, `temperature`, `humidity`, `ppm`) VALUES
(1, 1, '2019-03-03 20:09:03', '23.00', '5.00', '200'),
(2, 2, '2019-03-07 20:22:04', '24.00', '5.00', '250'),
(3, 2, '2019-03-11 00:04:14', '32.00', '7.00', '304'),
(4, 1, '2019-03-11 05:12:05', '28.00', '9.00', '299'),
(5, 1, '2019-03-13 17:40:00', '35.00', '4.00', '300'),
(7, 3, '2019-03-13 10:42:09', '32.00', '9.00', '350'),
(8, 4, '2020-05-10 13:42:13', '29.00', '4.00', '400'),
(9, 4, '2020-05-10 16:51:36', '32.00', '4.00', '400'),
(10, 4, '2020-05-10 17:01:20', '32.00', '4.00', '400'),
(11, 4, '2020-05-10 17:02:47', '32.00', '4.00', '400'),
(12, 4, '2020-05-10 17:04:48', '32.00', '4.00', '400'),
(13, 4, '2020-05-10 17:08:37', '32.00', '4.00', '400'),
(14, 4, '2020-05-10 17:10:15', '32.00', '4.00', '400'),
(15, 4, '2020-05-10 17:12:33', '32.00', '4.00', '400'),
(16, 4, '2020-05-10 17:15:44', '32.00', '4.00', '400'),
(17, 4, '2020-05-10 17:16:03', '32.00', '4.00', '400'),
(18, 4, '2020-05-10 17:16:57', '32.00', '4.00', '400'),
(19, 4, '2020-05-10 17:18:18', '32.00', '4.00', '400'),
(20, 4, '2020-05-10 17:19:18', '32.00', '4.00', '400'),
(21, 4, '2020-05-10 17:19:42', '32.00', '4.00', '400');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1=Admin,2=User',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Active,0=Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `role`, `status`, `created_at`) VALUES
(11, 'Kenyon Wise', 'fekones@mailinator.net', '25d55ad283aa400af464c76d713c07ad', NULL, 2, 1, '2019-03-11 06:49:27'),
(12, 'Quamar Beck', 'zepuqynow@mailinator.com', '25d55ad283aa400af464c76d713c07ad', NULL, 2, 1, '2019-03-11 06:49:57'),
(13, 'Abdul Head', 'byjaxu@mailinator.net', '25d55ad283aa400af464c76d713c07ad', NULL, 1, 1, '2019-03-11 10:54:23'),
(14, 'edward', 'edward_onuoha@yahoo.com', '2365aea11ff3c6976c23425375723d9f', NULL, 2, 1, '2019-03-11 12:47:36'),
(16, 'John Doe', 'john@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '8001230000', 1, 1, '2020-05-10 13:37:20'),
(17, 'Mazhar', 'mazhar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '981293829', 2, 1, '2020-05-11 17:15:11'),
(18, 'Prionto', 'pew@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2384897', 2, 1, '2020-05-11 17:28:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_building`
--
ALTER TABLE `assign_building`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_building`
--
ALTER TABLE `assign_building`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
