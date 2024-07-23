-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 07:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atm_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_details`
--

CREATE TABLE `acc_details` (
  `a_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `a_name` varchar(20) NOT NULL,
  `a_no` bigint(20) DEFAULT NULL,
  `a_bal` decimal(11,0) DEFAULT NULL,
  `a_wd` decimal(11,0) DEFAULT NULL,
  `a_dp` decimal(11,0) DEFAULT NULL,
  `a_status` int(1) DEFAULT NULL,
  `c_d_t` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acc_details`
--

INSERT INTO `acc_details` (`a_id`, `u_id`, `a_name`, `a_no`, `a_bal`, `a_wd`, `a_dp`, `a_status`, `c_d_t`) VALUES
(1, 1, 'sai', 6552566622, 2245, 400, 1200000, 1, '2024-07-22 06:00:14'),
(2, 2, 'demudu', 5468987622, 34000, 3000, NULL, 1, '2023-10-26 07:03:32'),
(3, 3, 'devi', 6544556622, 44000, 1000, NULL, 1, '2023-10-22 16:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `atmbal_details`
--

CREATE TABLE `atmbal_details` (
  `atm_id` int(11) NOT NULL,
  `atm_tbal` bigint(11) DEFAULT NULL,
  `n_2000` int(10) DEFAULT NULL,
  `n_500` int(10) DEFAULT NULL,
  `n_200` int(10) DEFAULT NULL,
  `n_100` int(10) DEFAULT NULL,
  `atm_status` int(1) DEFAULT NULL,
  `c_d_t` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `atmbal_details`
--

INSERT INTO `atmbal_details` (`atm_id`, `atm_tbal`, `n_2000`, `n_500`, `n_200`, `n_100`, `atm_status`, `c_d_t`) VALUES
(1, 998600, 200, 571, 498, 1004, 1, '2024-07-22 06:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `rec_details`
--

CREATE TABLE `rec_details` (
  `r_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `r_name` varchar(20) DEFAULT NULL,
  `r_accno` bigint(11) DEFAULT NULL,
  `r_bal` decimal(11,0) NOT NULL,
  `r_dp` decimal(11,0) NOT NULL,
  `r_status` int(1) DEFAULT NULL,
  `c_d_t` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rec_details`
--

INSERT INTO `rec_details` (`r_id`, `u_id`, `r_name`, `r_accno`, `r_bal`, `r_dp`, `r_status`, `c_d_t`) VALUES
(1, 1, 'pavankumar', 6756456622, 1000, 1000, 1, '2023-10-26 06:44:21'),
(2, 2, 'mahesh', 5432809811, 10000, 10000, 1, '2023-10-26 07:01:28'),
(3, 3, 'rohith', 2345897711, 0, 0, 1, '2023-10-26 06:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `tra_details`
--

CREATE TABLE `tra_details` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(20) DEFAULT NULL,
  `t_accno` bigint(11) DEFAULT NULL,
  `t_wd` decimal(11,0) NOT NULL,
  `t_dp` decimal(11,0) NOT NULL,
  `t_tbal` decimal(11,0) DEFAULT NULL,
  `t_status` enum('1','0') DEFAULT '1',
  `c_d_t` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tra_details`
--

INSERT INTO `tra_details` (`t_id`, `t_name`, `t_accno`, `t_wd`, `t_dp`, `t_tbal`, `t_status`, `c_d_t`) VALUES
(1, 'pavan', 6552566622, 1000, 0, 18000, '1', '2023-10-20 06:19:16'),
(2, 'mani', 5468987622, 5000, 0, 50000, '1', '2023-10-20 06:20:36'),
(3, 'anandh', 6544556622, 5000, 0, 50000, '1', '2023-10-20 06:24:50'),
(4, 'pavan', 6552566622, 1000, 0, 17000, '1', '2023-10-20 06:47:44'),
(5, 'pavan', 6552566622, 1000, 0, 16000, '1', '2023-10-20 06:51:58'),
(6, 'anandh', 6544556622, 3000, 0, 47000, '1', '2023-10-20 07:18:24'),
(7, 'anandh', 6544556622, 1000, 0, 46000, '1', '2023-10-20 07:22:23'),
(8, 'anandh', 6544556622, 1000, 0, 45000, '1', '2023-10-20 07:22:58'),
(9, 'anandh', 6544556622, 1000, 0, 44000, '1', '2023-10-20 07:23:59'),
(10, 'mani', 5468987622, 3000, 0, 47000, '1', '2023-10-20 15:54:30'),
(11, 'mani', 5468987622, 2000, 0, 45000, '1', '2023-10-22 16:01:54'),
(12, 'demudu', 5468987622, 5000, 0, 40000, '1', '2023-10-22 16:10:17'),
(13, 'demudu', 5468987622, 1000, 0, 39000, '1', '2023-10-23 16:45:28'),
(14, 'demudu', 5468987622, 1000, 0, 38000, '1', '2023-10-24 16:39:40'),
(15, 'sai', 6552566622, 1000, 0, 15000, '1', '2023-10-25 06:16:14'),
(16, 'sai', 6552566622, 3000, 0, 12000, '1', '2023-10-25 07:03:39'),
(17, 'sai', 6552566622, 1000, 0, 11000, '1', '2023-10-25 07:32:06'),
(18, 'demudu', 5468987622, 1000, 0, 37000, '1', '2023-10-25 07:33:42'),
(19, '', 0, 0, 1000, 1000, '1', '2023-10-25 16:16:11'),
(20, 'sai', 6552566622, 0, 10000, 21000, '1', '2023-10-26 06:05:07'),
(21, 'sai', 6552566622, 0, 10000, 31000, '1', '2023-10-26 06:07:36'),
(22, 'sai', 6552566622, 0, 55, 31055, '1', '2023-10-26 06:08:40'),
(23, 'sai', 6552566622, 0, 555, 31610, '1', '2023-10-26 06:11:24'),
(24, 'sai', 6552566622, 0, 5555, 36610, '1', '2023-10-26 06:11:56'),
(25, 'pavankumar', 6756456622, 0, 1000, 1000, '1', '2023-10-26 06:44:20'),
(26, 'sai', 6552566622, 0, 1000, 37610, '1', '2023-10-26 06:45:38'),
(27, 'sai', 6552566622, 1000, 0, 36610, '1', '2023-10-26 06:53:13'),
(28, 'sai', 6552566622, 0, 1000, 37610, '1', '2023-10-26 06:59:20'),
(29, 'sai', 6552566622, 0, 30, 37640, '1', '2023-10-26 06:59:44'),
(30, '', 0, 0, 10000, 10000, '1', '2023-10-26 07:00:22'),
(31, 'mahesh', 5432809811, 0, 10000, 10000, '1', '2023-10-26 07:01:28'),
(32, 'sai', 6552566622, 0, 55, 37695, '1', '2023-10-26 07:02:13'),
(33, 'demudu', 5468987622, 3000, 0, 34000, '1', '2023-10-26 07:03:32'),
(34, 'sai', 6552566622, 30000, 0, 7695, '1', '2023-10-26 07:43:48'),
(35, 'sai', 6552566622, 50, 0, 7645, '1', '2023-10-26 07:48:16'),
(36, 'sai', 6552566622, 2000, 0, 5645, '1', '2023-10-26 07:49:55'),
(37, 'sai', 6552566622, 2000, 0, 3645, '1', '2023-10-26 07:52:20'),
(38, 'sai', 6552566622, 0, 1200000, 1203645, '1', '2023-11-02 06:48:44'),
(39, 'sai', 6552566622, 1200000, 0, 3645, '1', '2023-11-02 06:49:42'),
(40, 'sai', 6552566622, 1000, 0, 2645, '1', '2023-11-16 07:12:09'),
(41, 'sai', 6552566622, 400, 0, 2245, '1', '2024-07-22 06:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(20) DEFAULT NULL,
  `u_mail` varchar(30) DEFAULT NULL,
  `u_pwd` varchar(20) DEFAULT NULL,
  `u_con` bigint(12) DEFAULT NULL,
  `u_status` int(1) DEFAULT NULL,
  `c_d_t` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`u_id`, `u_name`, `u_mail`, `u_pwd`, `u_con`, `u_status`, `c_d_t`) VALUES
(1, 'saichandra', 'saichandra2332@gmail.com', '1111', 7386606346, 1, '2023-10-25 07:04:21'),
(2, 'demudu', 'sdemudu2332@gmail.com', '2332', 9949646346, 1, '2023-10-14 08:02:11'),
(3, 'devi', 'sdevi5252@gmail.com', '5252', 9160498404, 1, '2023-10-14 08:04:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_details`
--
ALTER TABLE `acc_details`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `atmbal_details`
--
ALTER TABLE `atmbal_details`
  ADD PRIMARY KEY (`atm_id`);

--
-- Indexes for table `rec_details`
--
ALTER TABLE `rec_details`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tra_details`
--
ALTER TABLE `tra_details`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_details`
--
ALTER TABLE `acc_details`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `atmbal_details`
--
ALTER TABLE `atmbal_details`
  MODIFY `atm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rec_details`
--
ALTER TABLE `rec_details`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tra_details`
--
ALTER TABLE `tra_details`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
