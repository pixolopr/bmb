-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2016 at 11:11 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `billmate`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE IF NOT EXISTS `access` (
  `id` int(11) NOT NULL COMMENT 'id',
  `name` varchar(255) NOT NULL COMMENT 'name'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'regular');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL COMMENT 'id',
  `name` varchar(255) NOT NULL COMMENT 'text',
  `contact` varchar(15) NOT NULL COMMENT 'tel',
  `address` varchar(255) NOT NULL COMMENT 'text',
  `company` varchar(255) NOT NULL COMMENT 'text'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL COMMENT 'id',
  `bill_no` varchar(255) NOT NULL COMMENT 'text',
  `customer_id` int(11) NOT NULL COMMENT 'dropdown customer|name',
  `status_id` int(11) NOT NULL COMMENT 'dropdown status|name',
  `user_id` int(11) NOT NULL COMMENT 'dropdown users|name',
  `date` date NOT NULL COMMENT 'date',
  `type` varchar(255) NOT NULL COMMENT 'text',
  `weight` float NOT NULL COMMENT 'number',
  `unit_amount` float NOT NULL COMMENT 'number',
  `reciever_contact` varchar(15) NOT NULL COMMENT 'text',
  `paid` float NOT NULL COMMENT 'number',
  `amount` float NOT NULL COMMENT 'number',
  `service_tax` float NOT NULL COMMENT 'number',
  `swachhbharat_tax` float NOT NULL COMMENT 'number',
  `krishikalyancess_tax` float NOT NULL COMMENT 'number',
  `total` float NOT NULL COMMENT 'number',
  `from_place` varchar(255) NOT NULL COMMENT 'text',
  `to_place` varchar(255) NOT NULL COMMENT 'text'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL COMMENT 'id',
  `name` varchar(255) NOT NULL COMMENT 'text'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE IF NOT EXISTS `tax` (
  `id` int(11) NOT NULL COMMENT 'id',
  `name` varchar(255) NOT NULL COMMENT 'text',
  `value` float NOT NULL COMMENT 'number',
  `from_date` date DEFAULT NULL COMMENT 'date',
  `to_date` date DEFAULT NULL COMMENT 'date'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `name`, `value`, `from_date`, `to_date`) VALUES
(1, 'service tax', 14, '2016-07-12', NULL),
(2, 'swachh bharat tax', 0.5, '2016-07-12', NULL),
(3, 'krishi kalyan cess', 0.5, '2016-07-12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL COMMENT 'id',
  `username` varchar(255) NOT NULL COMMENT 'text',
  `password` varchar(255) NOT NULL COMMENT 'password',
  `name` varchar(255) NOT NULL COMMENT 'text',
  `access` int(11) NOT NULL COMMENT 'dropdown access|name',
  `email` varchar(255) NOT NULL COMMENT 'email'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `access`, `email`) VALUES
(1, 'abhay', '9e34c02fc4b8ac268ef9aefdf547c6f1a8004254', 'abhay amin', 1, 'abhay@abhay.com'),
(2, 'akshay', 'akshay123', 'akshay amin', 0, ''),
(3, 'ak', '648885717e3706718af2e8dbc52a6e7c4e95da7f', 'sada', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';
--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
