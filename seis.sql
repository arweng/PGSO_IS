-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2019 at 04:27 PM
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
(1, '1234', 'Good As Fuck', 'dekugtar Aircon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(2, '5678', 'Good As Fuck', 'dekugtar Unit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(3, '1400778', 'Better', 'Cellphone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(4, '1400778', 'dasdsa', 'asdas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(5, 'dasdas', 'sadasd', 'dasdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(6, 'asdsaf', 'sdfsd', 'sdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(7, 'sdfsd', 'fsdf', 'sdfsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(8, 'fsdfsd', 'sdfsdf', 'gfdgdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(9, '456', 'Maba', 'Cellphone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(10, '789', 'Ho', 'Cellphone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(11, '1400776', 'fsdfsd', 'ljk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(12, '1400773', 'gf', 'ghdfgsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(13, '1400779', 'dhfjgh', 'fasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(14, '1400780', 'Most', 'dsadsa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(15, '1400781', 'Oyweah', 'adasdsa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(16, 'sdfsdfsdf', 'fdgfdgfd', 'dfgdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(17, 'dasdsaf', 'asdadsd', 'asdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(18, 'asdasda', 'asdasda', 'sadasda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(19, 'asdasd', 'sadasd', 'sadasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(20, '1400778', 'Huawei', 'Cellphone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(21, 'ssdf345', 'Asus', 'Tablet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(22, '435rfdv', 'Macbook Pro', 'Laptop', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(23, '1400778', 'Huawei', 'Cellphone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(24, 'ssdf345', 'Asus', 'Tablet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44'),
(25, '435rfdv', 'Macbook Pro', 'Laptop', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-25 06:55:44');

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
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
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
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
