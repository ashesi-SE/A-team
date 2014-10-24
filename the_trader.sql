-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2014 at 03:05 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `the_trader`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Food'),
(2, 'Electronics'),
(3, 'Fashion'),
(4, 'Services'),
(5, 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(10) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(50) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`) VALUES
(1, 'Ashesi campus'),
(2, 'Dufie'),
(3, 'Colombiana'),
(4, 'Charlotte'),
(5, 'Masere'),
(6, 'Berekuso town'),
(7, 'Comet'),
(8, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `price_type`
--

CREATE TABLE IF NOT EXISTS `price_type` (
  `price_id` int(10) NOT NULL AUTO_INCREMENT,
  `price_type` varchar(50) NOT NULL,
  PRIMARY KEY (`price_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `price_type`
--

INSERT INTO `price_type` (`price_id`, `price_type`) VALUES
(1, 'Negotiable'),
(2, 'Fixed');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE IF NOT EXISTS `seller` (
  `seller_id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_name` varchar(50) NOT NULL,
  `seller_location` varchar(50) NOT NULL,
  `seller_email` varchar(100) NOT NULL,
  `seller_phone` varchar(15) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_details` text NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_image` varchar(1000) NOT NULL,
  `price` varchar(10) NOT NULL,
  `price_type` int(50) NOT NULL,
  PRIMARY KEY (`seller_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `seller_name`, `seller_location`, `seller_email`, `seller_phone`, `product_name`, `product_details`, `product_category`, `product_image`, `price`, `price_type`) VALUES
(15, 'Susana', 'Ashesi campus', 'susana.ndede@ashesi.edu.gh', '0269624606', 'iPhone 6', 'Slightly used', 'Electronics', 'phone1.jpg', '700', 0),
(17, 'Esi', 'Charlotte', 'esi@ashesi.edu.gh', '0243566542', 'Hand Bag', 'Brand New', 'Fashion', 'bag1.jpg', '50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `usercode` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(36) NOT NULL,
  `group` enum('admin','cho','dhmt') NOT NULL,
  PRIMARY KEY (`usercode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usercode`, `username`, `password`, `group`) VALUES
(3, 'yeenuwa', '8bfe9f23b6721d2fbcc8c5c039169f69', 'admin'),
(9, 'popselladmin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
