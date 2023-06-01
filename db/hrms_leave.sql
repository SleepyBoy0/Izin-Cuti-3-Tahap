-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 05:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms_leave`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(25) NOT NULL,
  `leave_start` date NOT NULL,
  `leave_end` date NOT NULL,
  `reason` varchar(25) NOT NULL,
  `total_leave` bigint(25) NOT NULL,
  `status` bigint(25) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `validation` varchar(255) DEFAULT NULL,
  `lvl1` varchar(11) DEFAULT NULL,
  `lvl2` varchar(11) DEFAULT NULL,
  `lvl3` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `user_id`, `leave_start`, `leave_end`, `reason`, `total_leave`, `status`, `create_at`, `update_at`, `validation`, `lvl1`, `lvl2`, `lvl3`) VALUES
(6, 11, '2023-05-30', '2023-06-01', 'Sakit', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3', '3', '2', '3'),
(7, 11, '2023-05-30', '2023-06-01', 'asdasd', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3', '2', '0', '2'),
(9, 11, '2023-05-01', '2023-05-30', 'Kuliah', 29, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3', '0', '1', '0'),
(10, 11, '2023-05-30', '2023-06-01', 'Kuliah', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3', '2', '0', '1'),
(11, 16, '2023-05-30', '2023-05-31', 'asdasd', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3', '0', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` bigint(20) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'Admin Department'),
(2, 'Human Resource Department'),
(4, 'IT Department'),
(5, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` bigint(20) NOT NULL,
  `name` varchar(25) NOT NULL,
  `department_id` bigint(25) NOT NULL,
  `description` bigint(25) NOT NULL,
  `salary_start` bigint(25) NOT NULL,
  `salary_end` bigint(25) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`, `department_id`, `description`, `salary_start`, `salary_end`, `create_at`, `update_at`) VALUES
(1, 'Pegawai', 2, 1, 150000, 150000, '2023-05-29 06:12:16', '2023-05-29 06:12:16'),
(2, 'Leader', 2, 1, 250000, 250000, '2023-05-29 06:12:16', '2023-05-29 06:12:16'),
(3, 'Admin', 1, 1, 180000, 180000, '2023-05-29 06:16:13', '2023-05-29 06:16:13'),
(4, 'lvl1', 2, 1, 150000, 150000, '2023-05-30 03:48:58', '2023-05-30 03:48:58'),
(5, 'lvl2', 2, 1, 150000, 150000, '2023-05-30 03:48:58', '2023-05-30 03:48:58'),
(6, 'lvl3', 2, 1, 150000, 150000, '2023-05-30 03:48:58', '2023-05-30 03:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `position_id` bigint(25) NOT NULL,
  `user_number` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `sex` varchar(25) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `position_id`, `user_number`, `name`, `phone_number`, `email`, `password`, `username`, `sex`, `create_at`, `update_at`) VALUES
(1, 3, '2131115', 'Admin', '081372998433', 'Admin@gmail.com', '123123', 'admin', 'M', '2023-05-29 06:17:31', '2023-05-29 06:17:31'),
(8, 2, '2131115', 'Hrd1', '081372998433', 'hrd@gmail.com', '123123', 'HRD 1', 'M', '2023-05-29 19:07:45', '2023-05-29 19:07:45'),
(9, 4, '2131115', 'Manager', '081372998433', 'manager@gmail.com', '123123', 'manager', 'M', '2023-05-29 19:07:45', '2023-05-29 19:07:45'),
(10, 2, '2131115', 'Hrd2', '081372998433', 'hrd@gmail.com', '123123', 'HRD 2', 'M', '2023-05-29 19:07:45', '2023-05-29 19:07:45'),
(11, 1, '2131115', 'Robby Lianto', '081372998433', 'robbylianto53@gmail.com', '123123', 'robby', 'M', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 4, '2131115', 'level 1', '081372998433', 'Admin@gmail.com', '123123', 'lvl1', 'M', '2023-05-30 03:50:25', '2023-05-30 03:50:25'),
(14, 5, '2131115', 'level 2', '081372998433', 'manager@gmail.com', '123123', 'lvl2', 'F', '2023-05-30 03:50:25', '2023-05-30 03:50:25'),
(15, 6, '2131115', 'level 3', '081372998433', 'hrd@gmail.com', '123123', 'lvl3', 'F', '2023-05-30 03:51:08', '2023-05-30 03:51:08'),
(16, 1, '2131097', 'Irfansyah', '081372998433', 'robbylianto53@gmail.com', '123123', 'irfan', 'M', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 1, '123123', 'Tito Adrian Pribadi', '123123123123', 'robbylianto53@gmail.com', '123123', 'tito', 'F', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
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
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
