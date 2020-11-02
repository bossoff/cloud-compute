-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 18, 2015 at 05:31 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `msc_otp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_pass`
--

CREATE TABLE IF NOT EXISTS `admin_pass` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_pass`
--

INSERT INTO `admin_pass` (`Username`, `Password`) VALUES
('ademola', 'ayobami'),
('aremu', 'draremu');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cust_profile`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `draft`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `passcodes`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `send_file`
--

