-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2019 at 12:42 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `brgysys`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_no` int(15) NOT NULL,
  `precinct_no` int(15) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `category` int(4) NOT NULL,
  `assisted_by` varchar(255) NOT NULL,
  `address_province` varchar(150) NOT NULL,
  `address_city` varchar(150) NOT NULL,
  `address_brgy` varchar(255) NOT NULL,
  `address_street_house` varchar(255) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `citizenship_acquired` tinyint(3) NOT NULL DEFAULT '0',
  `natural_reacquire_date` date NOT NULL,
  `certificate_no` int(20) NOT NULL,
  `period_residence_city_yr` int(11) NOT NULL,
  `period_residence_city_month` int(11) NOT NULL,
  `period_residence_phil_yr` int(11) NOT NULL,
  `profession` varchar(200) NOT NULL,
  `tin` int(20) NOT NULL,
  `sex` tinyint(2) NOT NULL DEFAULT '0',
  `date_birth` date NOT NULL,
  `place_birth_city` varchar(100) NOT NULL,
  `place_birth_province` varchar(100) NOT NULL,
  `civil_status` tinyint(2) NOT NULL,
  `spouse` varchar(150) NOT NULL,
  `approved` tinyint(2) NOT NULL DEFAULT '0',
  `user_role` tinyint(5) NOT NULL DEFAULT '0',
  `account_id` int(11) NOT NULL,
  `deleted` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `application_no`, `precinct_no`, `firstname`, `middlename`, `lastname`, `category`, `assisted_by`, `address_province`, `address_city`, `address_brgy`, `address_street_house`, `citizenship`, `citizenship_acquired`, `natural_reacquire_date`, `certificate_no`, `period_residence_city_yr`, `period_residence_city_month`, `period_residence_phil_yr`, `profession`, `tin`, `sex`, `date_birth`, `place_birth_city`, `place_birth_province`, `civil_status`, `spouse`, `approved`, `user_role`, `account_id`, `deleted`) VALUES
(4, 2147483647, 2147483647, 'Jonel Patrick', 'Legaspo', 'Opsimar', 9000, 'Angel Locsin', 'asdad', 'Davao City', 'Brgy 76-A', 'Sandawa street', 'American', 1, '2017-06-13', 897732451, 1, 8, 36, 'Soul Collector', 2147483647, 1, '2019-03-20', 'California', 'Daval del Norte', 1, 'Anne Curts', 0, 1, 5, 0),
(6, 234234234, 123123123, 'Edgar', 'N', 'Parokya', 9111, 'Jiego Bangkilan', 'Davao del Sur', 'Davao City', 'Brgy 76-A', 'Nograles Street.', 'American', 1, '2019-03-13', 2147483647, 1, 1, 1, 'Singer', 23123123, 1, '1960-01-13', 'Davao City', 'Davao del Sur', 1, 'Neri', 1, 2, 2, 0),
(7, 234234234, 123123123, 'Edgar', 'N', 'Parokya', 9111, 'Jiego Bangkilan', 'Davao del Sur', 'Davao City', 'Brgy 76-A', 'Nograles Street.', 'American', 1, '2019-03-13', 2147483647, 1, 1, 1, 'Singer', 23123123, 1, '1960-01-13', 'Davao City', 'Davao del Sur', 1, 'Neri', 1, 3, 3, 0),
(8, 2312, 123, 'Kate Ethel', 'K.', 'Dagohoy', 9000, 'Jiego Bangkilan', 'Davao del Sur', 'Davao City', 'Brgy 76-A', 'Nograles Street.', 'Philam', 0, '2019-03-12', 23123123, 2, 2, 2, 'sdasd', 3123123, 1, '2019-03-13', 'Davao City', 'Daval del Norte', 0, '', 0, 4, 6, 0),
(9, 2312, 123, 'Kate Ethel', 'K.', 'Dagohoy', 9000, 'Jiego Bangkilan', 'Davao del Sur', 'Davao City', 'Brgy 76-A', 'Nograles Street.', 'Philam', 0, '2019-03-12', 23123123, 2, 2, 2, 'sdasd', 3123123, 1, '2019-03-13', 'Davao City', 'Daval del Norte', 0, '', 1, 4, 9, 0),
(10, 2147483647, 23423424, 'Adrian', 'D.', 'Lopez', 9010, 'Jiego Bangkilan', 'Davao del Sur', 'Davao City', 'Brgy 76-A', 'Nograles Ave', 'American', 1, '2019-03-05', 33423, 3, 3, 3, 'Singer', 334234234, 1, '2019-03-12', 'Davao City', 'Davao del Sur', 0, 'Angel Locsin', 1, 3, 8, 0),
(11, 22222, 2222, 'Maxpein', 'D.', 'Tejada', 9000, '', 'Davao del Sur', 'Davao City', 'Brgy 76-A', 'Nograles Ave', 'Filipino', 0, '2019-03-04', 2312312, 2, 2, 2, 'Soul Collector', 3333, 1, '2019-03-12', 'Davao City', 'Davao del Sur', 0, 'Neri', 1, 2, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(140) NOT NULL,
  `password` varchar(140) NOT NULL,
  `deleted` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `email`, `password`, `deleted`) VALUES
(2, 'parokya@gmail.com', 'parokya', 0),
(3, 'johndoe@gmail.com', 'tangere123', 0),
(4, 'facilitator@gmail.com', 'admin', 0),
(5, 'admin@gmail.com', 'admin', 0),
(6, '', '', 0),
(7, 'collector@gmail.com', 'collector', 0),
(8, 'residence@gmail.com', 'residence', 0),
(9, 'facilitator@gmail.com', 'facilitator', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
