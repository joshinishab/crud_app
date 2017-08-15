-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2017 at 10:10 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crud_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `postal_code` varchar(15) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `phone`, `city`, `state`, `postal_code`, `country`) VALUES
(1, 'Nisha Joshi', '8589523527', 'San Diego', 'California', '92121', 'USA'),
(2, 'Bhagyesh Joshi', '8589874563', 'San Diego', 'California', '92101', 'USA'),
(3, 'Chintan Zaveri', '9758697895', 'Vadodara', 'Gujrat', '390020', 'India'),
(4, 'Ben Moore', '9768547235', 'Maitland', 'Florida', '32751', 'USA'),
(5, 'Dan Ryall', '6137828782', 'Ottawa', 'Ontario', 'K1A0G9', 'Canada'),
(6, 'John Smith', '4158796587', 'San Francisco', 'California', '94114', 'USA'),
(7, 'Frank ', '4086597825', 'San Diego', 'California', '92103', 'USA'),
(8, 'Rachel', '9732061508', 'Newark', 'New Jersey', '07102', 'USA'),
(9, 'Monica Geller', '8796541236', 'Orlando', 'Florida', '32801', 'USA'),
(10, 'Ted mosby', '8974586985', 'Austin', 'Texas', '78749', 'USA'),
(11, 'Robin', '8754896547', 'Houston', 'Texas', '77057', 'USA'),
(13, 'Ross Geller', '4086597827', 'San Francisco', 'California', '94114', 'USA');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
