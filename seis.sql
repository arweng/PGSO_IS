-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2019 at 12:13 AM
-- Server version: 5.7.11
-- PHP Version: 7.0.3

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
-- Table structure for table `accountable`
--

CREATE TABLE `accountable` (
  `id` int(11) NOT NULL,
  `section` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountable`
--

INSERT INTO `accountable` (`id`, `section`, `fullname`, `position`) VALUES
(1, 'Section/Not totally functioning', 'Darwin Albo', 'Not totally functioning'),
(2, 'Section of myself', 'Darwin Tubera', 'Position');

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
  `description` varchar(255) DEFAULT NULL,
  `system_log` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brandName`, `description`, `system_log`) VALUES
(1, 'sample', 'sample', '2019-08-02 13:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `classifications`
--

CREATE TABLE `classifications` (
  `id` int(11) NOT NULL,
  `classifications` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classifications`
--

INSERT INTO `classifications` (`id`, `classifications`, `description`, `type_id`) VALUES
(1, 'Classificationism', 'Nothing', 2),
(2, 'dfghdfg', 'fdghdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `description`) VALUES
(1, 'ICTU', 'International Commercial Tuberculosis Unit');

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
(4, '09876', 'jhsada', 'snjabdjabs', 'sdfsadfs', '2019-08-01', 123456, '234sdfgh', 13242, 'dfsdf', 'sdfs', 'dfgsfdg', 'fdsgdf', '2019-08-01 00:14:50'),
(5, '32423', 'safasdfsad', 'sdfsadfsd', 'sadfsdfs', '2019-08-02', 123123, 'sfas2342', 2342342, 'sdfgsdfg', 'sdfgsd', 'fgdfhfdg', 'sdfgsdfsdf', '2019-08-02 05:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(50) DEFAULT NULL,
  `group_description` varchar(50) DEFAULT NULL,
  `privileges` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `group_description`, `privileges`) VALUES
(1, 'Admin', 'Administrator', '225B7B5C2269645C223A5C2264617368626F6172645C222C5C226465736372697074696F6E5C223A5C2244617368626F6172645C222C5C2270726976696C656765735C223A5B7B5C2269645C223A312C5C226465736372697074696F6E5C223A5C2253686F772044617368626F6172645C222C5C2276616C75655C223A747275657D2C7B5C2269645C223A312C5C226465736372697074696F6E5C223A5C22456469742044617368626F6172645C222C5C2276616C75655C223A747275657D2C7B5C2269645C223A312C5C226465736372697074696F6E5C223A5C2244656C6574652044617368626F6172645C222C5C2276616C75655C223A747275657D2C7B5C2269645C223A312C5C226465736372697074696F6E5C223A5C225570646174652044617368626F6172645C222C5C2276616C75655C223A747275657D5D7D2C7B5C2269645C223A5C2265717569706D656E745C222C5C226465736372697074696F6E5C223A5C2245717569706D656E745C222C5C2270726976696C656765735C223A5B7B5C2269645C223A312C5C226465736372697074696F6E5C223A5C2253686F772045717569706D656E745C222C5C2276616C75655C223A747275657D5D7D2C7B5C2269645C223A5C227265706F72745C222C5C226465736372697074696F6E5C223A5C225265706F72745C222C5C2270726976696C656765735C223A5B7B5C2269645C223A312C5C226465736372697074696F6E5C223A5C2253686F77205265706F72745C222C5C2276616C75655C223A747275657D5D7D2C7B5C2269645C223A5C226D61696E74656E616E63655C222C5C226465736372697074696F6E5C223A5C224D61696E74656E616E63655C222C5C2270726976696C656765735C223A5B7B5C2269645C223A312C5C226465736372697074696F6E5C223A5C2253686F77204D61696E74656E616E63655C222C5C2276616C75655C223A747275657D2C7B5C2269645C223A312C5C226465736372697074696F6E5C223A5C2245646974204D61696E74656E616E63655C222C5C2276616C75655C223A747275657D2C7B5C2269645C223A312C5C226465736372697074696F6E5C223A5C2244656C657465204D61696E74656E616E63655C222C5C2276616C75655C223A747275657D2C7B5C2269645C223A312C5C226465736372697074696F6E5C223A5C22557064617465204D61696E74656E616E63655C222C5C2276616C75655C223A747275657D5D7D5D22'),
(2, 'Guest', 'Guest', '225B7B5C2269645C223A5C2264617368626F6172645C222C5C226465736372697074696F6E5C223A5C2244617368626F6172645C222C5C2270726976696C656765735C223A5B7B5C2269645C223A312C5C226465736372697074696F6E5C223A5C2253686F772044617368626F6172645C222C5C2276616C75655C223A66616C73657D2C7B5C2269645C223A312C5C226465736372697074696F6E5C223A5C22456469742044617368626F6172645C222C5C2276616C75655C223A66616C73657D2C7B5C2269645C223A312C5C226465736372697074696F6E5C223A5C2244656C6574652044617368626F6172645C222C5C2276616C75655C223A66616C73657D2C7B5C2269645C223A312C5C226465736372697074696F6E5C223A5C225570646174652044617368626F6172645C222C5C2276616C75655C223A66616C73657D5D7D2C7B5C2269645C223A5C2265717569706D656E745C222C5C226465736372697074696F6E5C223A5C2245717569706D656E745C222C5C2270726976696C656765735C223A5B7B5C2269645C223A312C5C226465736372697074696F6E5C223A5C2253686F772045717569706D656E745C222C5C2276616C75655C223A66616C73657D5D7D2C7B5C2269645C223A5C227265706F72745C222C5C226465736372697074696F6E5C223A5C225265706F72745C222C5C2270726976696C656765735C223A5B7B5C2269645C223A312C5C226465736372697074696F6E5C223A5C2253686F77205265706F72745C222C5C2276616C75655C223A747275657D5D7D2C7B5C2269645C223A5C226D61696E74656E616E63655C222C5C226465736372697074696F6E5C223A5C224D61696E74656E616E63655C222C5C2270726976696C656765735C223A5B7B5C2269645C223A312C5C226465736372697074696F6E5C223A5C2253686F77205265706F72745C222C5C2276616C75655C223A747275657D5D7D5D22');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `brandName` varchar(255) DEFAULT NULL,
  `system_log` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `model`, `description`, `brandName`, `system_log`) VALUES
(1, 'asd', 'asd', 'asd', '2019-08-02 13:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_name`, `description`) VALUES
(2, 'Darwin Albo', 'Something is not good');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type_name`, `description`) VALUES
(1, 'Type_name', 'Nothing to show'),
(2, 'Type_name_again', 'Nothing to show again');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `units` varchar(255) DEFAULT NULL,
  `shortname` varchar(255) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `id` int(11) NOT NULL,
  `users_firstname` varchar(100) DEFAULT NULL,
  `users_middlename` varchar(100) DEFAULT NULL,
  `users_lastname` varchar(100) DEFAULT NULL,
  `users_department` int(11) DEFAULT NULL,
  `appointment_status` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `groups` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `users_firstname`, `users_middlename`, `users_lastname`, `users_department`, `appointment_status`, `username`, `password`, `groups`) VALUES
(1, 'Alexander', 'Garcia', 'Bacomo', 1, 'none', 'admin', 'admin', 1),
(2, 'Darwin', 'Tubera', 'Albo', 1, 'nothing', 'guest', 'guest', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountable`
--
ALTER TABLE `accountable`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `classifications`
--
ALTER TABLE `classifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups` (`groups`),
  ADD KEY `users_department` (`users_department`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountable`
--
ALTER TABLE `accountable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `classifications`
--
ALTER TABLE `classifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `classifications`
--
ALTER TABLE `classifications`
  ADD CONSTRAINT `classifications_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD CONSTRAINT `users_tbl_ibfk_1` FOREIGN KEY (`groups`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_tbl_ibfk_2` FOREIGN KEY (`users_department`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
