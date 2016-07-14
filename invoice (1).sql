-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2016 at 11:29 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
