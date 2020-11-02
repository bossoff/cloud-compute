-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2017 at 10:16 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cloud_computing`
--
CREATE DATABASE IF NOT EXISTS `cloud_computing` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cloud_computing`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_pass`
--

CREATE TABLE IF NOT EXISTS `admin_pass` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_pass`
--

INSERT INTO `admin_pass` (`id`, `Username`, `Password`) VALUES
(1, 'admin', 'admin'),
(2, 'aremu', 'draremu');

-- --------------------------------------------------------

--
-- Table structure for table `cust_profile`
--

CREATE TABLE IF NOT EXISTS `cust_profile` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Surname` varchar(50) NOT NULL,
  `Othername` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Phone_No` varchar(15) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cust_profile`
--

INSERT INTO `cust_profile` (`ID`, `Surname`, `Othername`, `Gender`, `Phone_No`, `Username`, `Password`) VALUES
(1, 'Esinniobiwa', 'Quareeb', 'Male', '08162609437', 'quareeb', 'error404'),
(2, 'Esinniobiwa', 'Quareeb', 'Male', '08162609437', 'quareeb', 'error404'),
(3, 'Esinniobiwa', 'Quareeb', 'Male', '08162609437', 'quareeb', 'error404'),
(4, 'Olawale', 'Adegoke', 'Female', '08162875010', 'mm', 'mm');

-- --------------------------------------------------------

--
-- Table structure for table `draft`
--

CREATE TABLE IF NOT EXISTS `draft` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Message` text NOT NULL,
  `sDate` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `draft`
--

INSERT INTO `draft` (`ID`, `Username`, `Message`, `sDate`) VALUES
(1, 'quareeb', 'I love my life, it is so plain', '13-06-2017');

-- --------------------------------------------------------

--
-- Table structure for table `passcodes`
--

CREATE TABLE IF NOT EXISTS `passcodes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Phone_No` varchar(15) NOT NULL,
  `Passcode` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `passcodes`
--

INSERT INTO `passcodes` (`ID`, `Phone_No`, `Passcode`, `Status`) VALUES
(3, '08162609437', '26278695', 'USED'),
(4, '08162875010', '23750226', 'USED');

-- --------------------------------------------------------

--
-- Table structure for table `recent_otp`
--

CREATE TABLE IF NOT EXISTS `recent_otp` (
  `Username` varchar(50) NOT NULL,
  `OTP_Code` varchar(10) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recent_otp`
--

INSERT INTO `recent_otp` (`Username`, `OTP_Code`, `Status`) VALUES
('quareeb', '5139855', 'EXPIRED'),
('mm', '24230745', 'EXPIRED'),
('quareeb', '14717268', 'EXPIRED'),
('quareeb', '9911031', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `send_file`
--

CREATE TABLE IF NOT EXISTS `send_file` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Sender` varchar(50) NOT NULL,
  `Receiver` varchar(50) NOT NULL,
  `Message` text NOT NULL,
  `sDate` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `send_file`
--

INSERT INTO `send_file` (`ID`, `Sender`, `Receiver`, `Message`, `sDate`) VALUES
(1, 'mm', 'quareeb', 'I love my life', '13-06-2017');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
