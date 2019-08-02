-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2019 at 01:18 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seis`
--

-- --------------------------------------------------------

--
-- Table structure for table `ack_reciept`
--

CREATE TABLE `ack_reciept` (
  `id` int(11) NOT NULL,
  `properrty_no` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `acquisition_date` date DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `inventory_tag` int(11) DEFAULT NULL,
  `classification` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `_condition` varchar(255) DEFAULT NULL,
  `acquisition` varchar(255) DEFAULT NULL,
  `system_log` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brandName` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brandName`, `description`) VALUES
(1, 'sample', 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `property_no` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `acquisition` varchar(100) DEFAULT NULL,
  `acquisition_date` date DEFAULT NULL,
  `acquisition_cost` int(100) DEFAULT NULL,
  `_serial` varchar(100) DEFAULT NULL,
  `inventory_tag` int(100) DEFAULT NULL,
  `classification` varchar(100) DEFAULT NULL,
  `_condition` varchar(100) DEFAULT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `system_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `property_no`, `description`, `model`, `acquisition`, `acquisition_date`, `acquisition_cost`, `_serial`, `inventory_tag`, `classification`, `_condition`, `supplier`, `remarks`, `system_log`) VALUES
(1, '34234', 'fdsdf', 'sdfs', 'sdfs', '2019-02-02', 787, '32', 0, 'asd', 'asd', 'asd', 'asd', '2019-07-31 03:52:54'),
(2, '1400778', 'dfgdfg', 'dfgsd', 'sdfgsdf', '2019-07-30', 4334534, '456456fghfgh', 46456, 'fghfg', 'hfghfg', 'hfghf', 'ghdfghd', '2019-07-30 08:50:01'),
(3, '2324', 'fdg', 'fdg', 'dfgfg', '2019-07-31', 25, 'sdr23456', 4532450, 'dfgdf', 'fdgfdg', 'fdgfd', 'gfdg', '2019-07-31 00:24:48'),
(4, '09876', 'jhsada', 'snjabdjabs', 'sdfsadfs', '2019-08-01', 123456, '234sdfgh', 13242, 'dfsdf', 'sdfs', 'dfgsfdg', 'fdsgdf', '2019-08-01 00:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `brandName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `model`, `description`, `brandName`) VALUES
(1, 'asd', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `users_id` int(11) NOT NULL,
  `users_firstname` varchar(100) DEFAULT NULL,
  `users_middlename` varchar(100) DEFAULT NULL,
  `users_lastname` varchar(100) DEFAULT NULL,
  `users_department` varchar(50) DEFAULT NULL,
  `appointment_status` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`users_id`, `users_firstname`, `users_middlename`, `users_lastname`, `users_department`, `appointment_status`, `username`, `password`) VALUES
(2, 'Alexander', 'Garcia', 'Bacomo', NULL, NULL, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ack_reciept`
--
ALTER TABLE `ack_reciept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ack_reciept`
--
ALTER TABLE `ack_reciept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
