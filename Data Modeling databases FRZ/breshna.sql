-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 01, 2021 at 09:09 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `breshna`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `date_year` int(11) NOT NULL,
  `date_month` tinyint(4) NOT NULL,
  `date_day` tinyint(4) NOT NULL,
  `absent_hour` tinyint(4) NOT NULL,
  PRIMARY KEY (`attendance_id`),
  KEY `employee_attendance_fk` (`employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `employee_id`, `date_year`, `date_month`, `date_day`, `absent_hour`) VALUES
(6, 50, 2020, 2, 2, 9),
(2, 50, 2019, 8, 3, 10),
(1, 51, 2020, 2, 2, 4),
(3, 51, 2020, 2, 2, 9),
(4, 50, 2020, 2, 2, 9),
(7, 52, 2020, 4, 2, 12),
(8, 52, 2020, 4, 2, 12),
(9, 54, 2020, 4, 2, 2),
(10, 52, 2020, 4, 2, 12),
(11, 51, 2020, 4, 2, 90),
(12, 54, 2020, 4, 2, 2),
(13, 50, 2020, 4, 2, 2),
(14, 52, 2020, 4, 2, 5),
(15, 56, 2020, 4, 2, 12),
(16, 43, 2020, 4, 2, 8),
(17, 45, 2020, 4, 2, 1),
(18, 51, 2020, 4, 2, 2),
(19, 41, 2020, 4, 2, 1),
(20, 53, 2020, 4, 2, 1),
(21, 49, 2020, 4, 2, 4),
(22, 51, 2020, 4, 2, 2),
(23, 51, 2020, 4, 2, 1),
(24, 41, 2020, 4, 2, 2),
(25, 51, 2020, 4, 2, 3),
(26, 41, 2020, 4, 2, 2),
(27, 62, 2020, 4, 2, 4),
(28, 51, 2020, 4, 2, 9),
(29, 51, 2020, 6, 2, 8),
(30, 54, 2020, 6, 2, 1),
(31, 51, 2020, 4, 3, 1),
(32, 51, 2020, 4, 3, 1),
(33, 51, 2020, 4, 3, 2),
(34, 51, 2020, 4, 3, 3),
(35, 51, 2020, 4, 3, 2),
(36, 51, 2020, 4, 3, 2),
(37, 51, 2020, 4, 3, 12),
(38, 51, 2020, 4, 3, 1),
(39, 51, 2020, 4, 3, 12),
(40, 51, 2020, 4, 3, 5),
(41, 51, 2020, 4, 3, 5),
(42, 2, 2018, 4, 10, 15),
(43, 74, 2018, 4, 11, 123),
(44, 74, 2018, 4, 11, 1),
(45, 74, 2018, 4, 11, 1),
(46, 74, 2018, 4, 11, 1),
(47, 74, 2018, 4, 11, 4),
(48, 76, 2018, 4, 12, 5),
(49, 79, 2018, 4, 14, 1),
(50, 97, 2018, 4, 15, 5),
(51, 97, 2018, 4, 15, 2),
(52, 76, 2018, 5, 15, 5),
(53, 95, 2017, 4, 18, 8),
(54, 101, 2017, 4, 18, 2),
(55, 95, 2017, 4, 18, 2),
(56, 95, 2017, 4, 18, 80),
(57, 97, 2020, 8, 13, 12),
(58, 97, 2020, 8, 13, 5),
(59, 100, 2020, 8, 13, 5),
(60, 101, 2020, 8, 13, 8),
(61, 100, 2020, 8, 13, 8),
(62, 100, 2020, 8, 13, 7),
(63, 100, 2020, 8, 13, 9),
(64, 95, 2020, 9, 23, 2),
(65, 97, 2020, 9, 23, 2),
(66, 101, 2020, 9, 23, 2),
(67, 100, 2021, 1, 15, 5),
(68, 100, 2021, 1, 15, 5),
(69, 100, 2021, 1, 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(64) NOT NULL,
  PRIMARY KEY (`bank_id`),
  UNIQUE KEY `bank_name` (`bank_name`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_name`) VALUES
(1, 'Azizi Bank'),
(2, 'Pashtani Bank'),
(3, 'Maiwand Bank'),
(4, 'Kabul Bank'),
(5, 'Islamic Bank'),
(9, 'Wardak bank'),
(8, 'Afghan bank');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

DROP TABLE IF EXISTS `contract`;
CREATE TABLE IF NOT EXISTS `contract` (
  `contract_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `position` varchar(32) NOT NULL,
  `gross_salary` int(11) NOT NULL,
  PRIMARY KEY (`contract_id`),
  KEY `employee_contract_fk` (`employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`contract_id`, `employee_id`, `start_date`, `end_date`, `position`, `gross_salary`) VALUES
(1, 1, '2020-04-01', '2021-04-01', 'afghan', 12000),
(2, 2, '2020-04-01', '2021-04-01', 'afghan', 12000),
(37, 76, '2018-04-14', '2021-04-14', 'c', 2),
(4, 4, '2020-04-01', '2021-04-01', 'afghan', 12000),
(5, 4, '2020-04-01', '2021-04-01', 'afghan', 12000),
(6, 4, '2020-04-01', '2021-04-01', 'afghan', 12000),
(7, 1, '2020-04-01', '2021-04-01', 'afghan', 12000),
(8, 1, '2020-04-01', '2021-04-01', 'afghan', 12000),
(9, 4, '2020-04-01', '2021-04-01', 'afghan', 12000),
(10, 1, '2020-04-01', '2021-04-01', 'afghan', 12000),
(11, 12, '2020-04-01', '2021-04-01', 'afghan', 12000),
(12, 12, '2020-04-01', '2021-04-01', 'afghan', 12000),
(13, 16, '2020-04-01', '2021-04-01', 'afghan', 12000),
(14, 22, '2020-04-01', '2021-04-01', 'afghan', 12000),
(15, 29, '2020-04-01', '2020-05-01', 'new firozi', 90),
(16, 29, '2020-04-01', '2021-04-01', 'afghan', 12000),
(17, 29, '2020-04-01', '2020-05-01', 'lmlm', 10),
(18, 29, '2020-04-01', '2021-04-01', 'afghan', 12000),
(19, 29, '2020-04-01', '2020-05-01', 'lala', 900),
(32, 45, '2020-04-15', '2020-04-15', 'w', 1),
(31, 44, '2020-04-09', '2020-04-06', 'Ø¶Û±mm', 2555),
(33, 51, '2020-04-01', '2020-05-15', 'Admin', 4501212),
(22, 21, '2020-04-09', '2021-04-22', 'mmmmmm', 111111),
(28, 45, '2020-04-02', '2021-04-14', 'qwqw', 12),
(34, 40, '2020-04-02', '2020-04-29', 'l', 12),
(35, 40, '2020-04-08', '2020-04-14', 'm', 1),
(36, 20, '2020-04-07', '2020-04-15', 'a', 12),
(38, 76, '2018-04-11', '2020-04-02', 'd', 1),
(39, 79, '2018-04-20', '2020-05-20', 'q`', 1),
(40, 101, '2020-10-08', '2020-10-31', 'admin', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `counterbox`
--

DROP TABLE IF EXISTS `counterbox`;
CREATE TABLE IF NOT EXISTS `counterbox` (
  `counter_id` int(11) NOT NULL,
  `customer_type` tinyint(1) NOT NULL,
  `coeffecent` int(11) NOT NULL,
  `phase` tinyint(4) NOT NULL,
  `account_no` int(11) NOT NULL,
  `customer_no` int(11) NOT NULL,
  `customer_name` varchar(128) NOT NULL,
  `father_name` varchar(32) DEFAULT NULL,
  `province_id` int(11) NOT NULL,
  `district` varchar(64) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `junction` varchar(128) NOT NULL,
  `transformer` varchar(128) NOT NULL,
  `box_id` varchar(128) NOT NULL,
  `rout_code` varchar(255) NOT NULL,
  PRIMARY KEY (`counter_id`),
  KEY `province_counterbox_fk` (`province_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `counterbox`
--

INSERT INTO `counterbox` (`counter_id`, `customer_type`, `coeffecent`, `phase`, `account_no`, `customer_no`, `customer_name`, `father_name`, `province_id`, `district`, `address`, `junction`, `transformer`, `box_id`, `rout_code`) VALUES
(2, 1, 11, 22, 111, 2, 'FAHimullah', 'Shafiqullah', 1, 'Haska Mena', 'Nangarhar, Jalalabad', 'First', 'First', '11', '1'),
(1, 0, 9090, 6, 808080, 780002528, 'faizullah', 'Shafiqullah', 1, 'Haska Mena', 'Nangarhar, Jalalabad', 'First', 'First', '11', '61'),
(13, 0, 11, 22, 111, 2, 'firozi', 'Shafiqullah', 1, 'Haska Mena', 'Nangarhar, Jalalabad', 'First', 'First', '11', '1'),
(14, 0, 11, 22, 111, 2, 'firozi', 'Shafiqullah', 1, 'Haska Mena', 'Nangarhar, Jalalabad', 'First', 'First', '11', '1'),
(5, 0, 11, 22, 111, 2, 'firozi', 'Shafiqullah', 1, 'Haska Mena', 'Nangarhar, Jalalabad', 'First', 'First', '11', '1'),
(25, 0, 11, 22, 111, 2, 'firozi', 'Shafiqullah', 1, 'Haska Mena', 'Nangarhar, Jalalabad', 'First', 'First', '11', '1'),
(15, 0, 11, 22, 111, 2, 'firozi', 'Shafiqullah', 1, 'Haska Mena', 'Nangarhar, Jalalabad', 'First', 'First', '11', '145'),
(3, 1, 11, 22, 111, 2, 'Atiqullah', 'Shafiqullah', 7, 'Haska Mena', 'Nangarhar, Jalalabad', 'First', 'First', '11', '1'),
(45, 0, 11, 22, 111, 2, 'firozi', 'Shafiqullah', 1, 'Haska Mena', 'Nangarhar, Jalalabad', 'First', 'First', '11', '1'),
(23, 0, 11, 22, 111, 2, 'firozi', 'Shafiqullah', 1, 'Haska Mena', 'Nangarhar, Jalalabad', 'First', 'First', '11', '1'),
(3939, 0, 9, 9, 9, 780002528, 'afghan', 'hhh', 1, 'Chak', 'Ú©Ø§Ø¨Ù„', '56', '45', '9', '9');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `fathername` varchar(32) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birth_year` int(11) NOT NULL,
  `nic` varchar(64) NOT NULL,
  `marital_status` tinyint(1) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `district` varchar(64) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `degree_id` int(11) NOT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `hire_date` date NOT NULL,
  `resign_date` date DEFAULT NULL,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `nic` (`nic`),
  UNIQUE KEY `email` (`email`),
  KEY `employee_province_fk` (`province_id`),
  KEY `employee_degree_fk` (`degree_id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `firstname`, `lastname`, `fathername`, `gender`, `birth_year`, `nic`, `marital_status`, `province_id`, `district`, `address`, `email`, `degree_id`, `photo`, `hire_date`, `resign_date`) VALUES
(100, 'ÙÛŒØ¶ Ø§Ù„Ù„Ù‡', 'ÙÛŒØ±ÙˆØ²ÛŒ', 'Ø­Ø§Ø¬ÛŒ ÙÛŒØ±ÙˆØ² Ø®Ø§Ù†', 0, 1998, 'ØªØ°Ú©Ø±Ù‡ Ø§Ù„Ú©ØªØ±ÙˆÙ†ÛŒÚ©ÛŒ', 0, 1, 'Ú†Ú© ÙˆØ±Ø¯Ú« Ø§ÙØºØ§Ù†Ø³ØªØ§Ù†', ' Ø§ÙˆØ³Ù†ÛŒ Ø§Ø¯Ø±Ø³ Ú©Ù†Ø¯Ø² Ø§ÙØºØ§Ù†Ø³ØªØ§Ù†  ', 'Faizullah.firozi@gmail.com4y', 2, 'images/employee/1597338019firozi (1).jpeg', '2018-04-14', NULL),
(3, 'javad', 'firozi', 'haji Atiqullah', 1, 2002, '12345afghanb', 0, 1, 'Chak', '      afghanistan            ', 'javadjavn@gmail.com', 4, 'images/employee/1585642093firozi (2122).jpg', '2020-03-31', '2023-04-12'),
(95, 'Atiqullah ', 'firozi', 'haji firoz', 0, 2000, 'atiq tazakira', 1, 1, 'chak', '  company kabul    ', NULL, 1, 'images/employee/1523737970firozi (28).jpeg', '2018-04-14', NULL),
(76, 'AFGHAN LALA', 'LALA LALA', 'JANAN ', 0, 2000, 'AAA', 1, 1, '', '', NULL, 1, 'images/employee/user_m.png', '2018-04-11', NULL),
(97, 'Fahimullah', 'Firozi', 'Haji Firoz', 0, 1995, 'Fahim Tazakira', 1, 1, 'Chak', 'Kabul', 'Fahim.firoz@gmail.com', 2, 'images/employee/1523738249firozi (661).jpg', '2018-04-14', NULL),
(98, 'Faizullah', 'Firozi', 'Haji Firoz', 0, 1998, 'Tazakira Faizullah 0780002528', 0, 1, 'Chak', 'Kunduz Afghanistan', 'Faizullah.firozi@gmail.comm', 3, 'images/employee/1523738401firozi (282).jpg', '2018-04-14', NULL),
(1, 'Faizullah', 'Firozi', 'Haji', 0, 1998, '1234678910', 0, 1, 'Chak', 'Wardak Afghanistan Sibak Ahmad khil ', 'faizullah.firozi@gmail.com', 3, 'images/employee/1585827641firozi (1952).jpg', '2020-04-02', NULL),
(101, 'Afghan', 'Wardak', 'Afghan', 0, 1992, 'kkll12', 0, 13, 'chak', '  Afghan Wrdak    ', 'Wardak@gmail.com', 1, 'images/employee/1526380311firozi (1726).JPG', '2021-01-15', NULL),
(93, 'Haji Firoz', 'Firozi', 'Abdul Raqib', 0, 1980, 'firoz NIC 1213', 1, 1, 'Chak wardak jan', ' Desanbigy Kabul Afghanistan   ', 'firozi@gmail.com', 3, 'images/employee/1523737501firozi (20).jpeg', '2020-04-02', NULL),
(91, 'sss', 'sss', 'sss', 0, 2000, 'ssss', 1, 1, 'sss', '', NULL, 1, 'images/employee/user_m.png', '2018-04-14', NULL),
(83, 'hjhkhkjhkjhkjh', 'hkjhkjhkjh', 'hkjhkjhkjh', 0, 2000, 'hkjhkjhkj', 1, 1, '', '', NULL, 1, 'images/employee/user_m.png', '2018-04-11', NULL),
(96, 'Zabihullah', 'firozi', 'haji firozi', 0, 2000, 'zabi tazakira', 1, 1, 'chak', 'Khust Afghanistan', 'Zabi.firozi@gmail.com', 2, 'images/employee/1523738055firozi (355).jpg', '2018-04-14', NULL),
(94, 'Nimatullah', 'Firozi', 'Haji Firozi', 0, 1990, 'Nimat Tazakira 12431', 1, 1, 'Chak', 'Khosh-hal mana Kabul Afghanistan', 'Nimatulla.firoziwardak@gmail.com', 3, 'images/employee/1523737648firozi (31).jpg', '2018-04-14', NULL),
(103, 'Ù…Ø­Ù…Ø¯ Ø­Ù†ÛŒÙ', 'Ø´Ø±ÛŒÙÛŒ ', 'Ù…Ø­Ù…ÙˆØ¯', 0, 1999, '12121215Ø¬', 0, 1, 'Ø³ÛŒØ¯ Ø¢Ø¨Ø§Ø¯', ' Ú©Ø§Ø¨Ù„ Ø§ÙØºØ§Ù†Ø³ØªØ§Ù†  ', 'hanifwardak.2018@gmail.com', 5, 'images/employee/1597292559firozi (1685).JPG', '2020-08-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_phone`
--

DROP TABLE IF EXISTS `employee_phone`;
CREATE TABLE IF NOT EXISTS `employee_phone` (
  `phone_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  PRIMARY KEY (`phone_id`),
  UNIQUE KEY `phone_no` (`phone_no`),
  KEY `employee_phone_fk` (`employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_phone`
--

INSERT INTO `employee_phone` (`phone_id`, `employee_id`, `phone_no`) VALUES
(1, 1, '0780002528'),
(2, 2, '070300873'),
(3, 3, '07378373873'),
(4, 4, '070073873');

-- --------------------------------------------------------

--
-- Table structure for table `emp_degree`
--

DROP TABLE IF EXISTS `emp_degree`;
CREATE TABLE IF NOT EXISTS `emp_degree` (
  `degree_id` int(11) NOT NULL AUTO_INCREMENT,
  `degree_name` varchar(32) NOT NULL,
  PRIMARY KEY (`degree_id`),
  UNIQUE KEY `degree_name` (`degree_name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_degree`
--

INSERT INTO `emp_degree` (`degree_id`, `degree_name`) VALUES
(1, 'None Educated'),
(2, 'Bachloria'),
(3, 'Bachelor'),
(4, 'Master'),
(5, 'PHD');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
CREATE TABLE IF NOT EXISTS `expense` (
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `currency` tinyint(1) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `payment_year` int(11) NOT NULL,
  `payment_month` tinyint(4) NOT NULL,
  `payment_day` tinyint(4) NOT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

DROP TABLE IF EXISTS `income`;
CREATE TABLE IF NOT EXISTS `income` (
  `invoice_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `receipt_year` int(11) NOT NULL,
  `receipt_month` tinyint(4) NOT NULL,
  `receipt_day` tinyint(4) NOT NULL,
  KEY `invoice_income_fk` (`invoice_id`),
  KEY `bank_income_fk` (`bank_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`invoice_id`, `bank_id`, `receipt_year`, `receipt_month`, `receipt_day`) VALUES
(1, 1, 2020, 4, 5),
(1, 1, 2018, 4, 8),
(1, 1, 2018, 4, 8),
(1, 1, 2018, 4, 8),
(2, 2, 2020, 5, 12),
(1, 1, 2018, 4, 9),
(1, 1, 2018, 4, 9),
(3, 2, 2018, 4, 9),
(1, 1, 2021, 1, 15),
(1, 1, 2021, 1, 15),
(2, 1, 2021, 1, 15),
(13, 1, 2021, 1, 15),
(1, 1, 2021, 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `counter_id` int(11) NOT NULL,
  `round_read` tinyint(4) NOT NULL,
  `issue_year` int(11) NOT NULL,
  `issue_month` tinyint(4) NOT NULL,
  `issue_day` tinyint(4) NOT NULL,
  `expire_date` date NOT NULL,
  `previous_value` int(11) NOT NULL,
  `present_value` int(11) NOT NULL,
  `electricity_charge` int(11) NOT NULL,
  `bank_charge` int(11) NOT NULL DEFAULT '0',
  `service_charge` int(11) NOT NULL DEFAULT '0',
  `stationay_charge` int(11) NOT NULL DEFAULT '0',
  `surcharge` int(11) NOT NULL DEFAULT '0',
  `invoice_amount` int(11) NOT NULL,
  `taxt` int(11) NOT NULL DEFAULT '0',
  `payable_amount` int(11) NOT NULL,
  `due_amount` int(11) NOT NULL DEFAULT '0',
  `total_amount` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `counterbox_ivoice_fk` (`counter_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `counter_id`, `round_read`, `issue_year`, `issue_month`, `issue_day`, `expire_date`, `previous_value`, `present_value`, `electricity_charge`, `bank_charge`, `service_charge`, `stationay_charge`, `surcharge`, `invoice_amount`, `taxt`, `payable_amount`, `due_amount`, `total_amount`) VALUES
(1, 1, 3, 2020, 4, 5, '2020-04-20', 900, 1200, 750, 0, 0, 0, 0, 770, 0, 770, 0, 770),
(2, 2, 1, 2020, 4, 5, '2020-04-20', 100, 300, 1000, 0, 0, 0, 0, 1230, 0, 1230, 0, 1230),
(3, 3, 3, 2020, 4, 5, '2020-04-20', 10, 10, 25, 0, 0, 0, 0, 20, 0, 20, 0, 30),
(4, 1, 1, 2020, 4, 6, '2020-05-16', 1200, 1500, 750, 10, 500, 10, 0, 1250, 0, 1250, 0, 750),
(5, 3, 1, 2020, 4, 6, '2020-05-16', 10, 50, 100, 10, 70, 10, 0, 170, 0, 170, 30, 130),
(6, 1, 1, 2020, 4, 6, '2020-05-16', 1500, 15000, 81000, 10, 200, 10, 0, 81200, 0, 81200, 750, 81750),
(7, 1, 1, 2018, 4, 10, '2018-05-20', 15000, 15020, 50, 10, 0, 10, 0, 50, 0, 50, 81750, 81800),
(8, 1, 1, 2017, 4, 18, '2017-05-28', 15020, 15030, 25, 10, 0, 10, 0, 25, 0, 25, 81800, 81825);

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

DROP TABLE IF EXISTS `overtime`;
CREATE TABLE IF NOT EXISTS `overtime` (
  `employee_id` int(11) NOT NULL,
  `date_year` int(11) NOT NULL,
  `date_month` tinyint(4) NOT NULL,
  `date_day` tinyint(4) NOT NULL,
  `over_hour` tinyint(4) NOT NULL,
  PRIMARY KEY (`employee_id`,`date_year`,`date_month`,`date_day`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`employee_id`, `date_year`, `date_month`, `date_day`, `over_hour`) VALUES
(1, 2019, 8, 2, 5),
(1, 2019, 8, 3, 10),
(2, 2019, 8, 3, 8),
(3, 2019, 8, 3, 3),
(4, 2019, 8, 3, 9),
(64, 2020, 4, 3, 9),
(51, 2020, 4, 3, 2),
(54, 2020, 4, 3, 2),
(45, 2020, 4, 3, 12),
(52, 2020, 4, 3, 2),
(60, 2020, 4, 3, 35),
(2, 2020, 4, 4, 12),
(1, 2020, 4, 4, 1),
(1, 2020, 4, 7, 4),
(2, 2020, 4, 7, 8),
(1, 2020, 5, 4, 1),
(1, 2018, 4, 10, 50),
(1, 2018, 4, 11, 1),
(2, 2018, 4, 11, 12),
(95, 2018, 5, 15, 5),
(94, 2018, 5, 15, 50),
(95, 2017, 4, 18, 11),
(101, 2017, 4, 18, 2),
(101, 2020, 8, 13, 8),
(100, 2020, 8, 13, 9),
(3, 2020, 8, 13, 90),
(101, 2020, 9, 23, 3),
(100, 2021, 1, 15, 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `employee_id` int(11) NOT NULL,
  `date_year` int(11) NOT NULL,
  `date_month` tinyint(4) NOT NULL,
  `overtime_amount` int(11) NOT NULL DEFAULT '0',
  `absent_amount` int(11) NOT NULL DEFAULT '0',
  `allowance` int(11) NOT NULL DEFAULT '0',
  `allowance_remark` varchar(255) DEFAULT NULL,
  `deduct` int(11) NOT NULL DEFAULT '0',
  `deduct_remark` varchar(255) DEFAULT NULL,
  `taxtable_salary` int(11) NOT NULL DEFAULT '0',
  `taxt_amount` int(11) NOT NULL DEFAULT '0',
  `net_salary` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`employee_id`,`date_year`,`date_month`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`employee_id`, `date_year`, `date_month`, `overtime_amount`, `absent_amount`, `allowance`, `allowance_remark`, `deduct`, `deduct_remark`, `taxtable_salary`, `taxt_amount`, `net_salary`) VALUES
(1, 2018, 4, 10, 0, 0, NULL, 0, NULL, 0, 0, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT,
  `province_name` varchar(32) NOT NULL,
  PRIMARY KEY (`province_id`),
  UNIQUE KEY `province_name` (`province_name`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`) VALUES
(1, 'Wardak'),
(2, 'Nangarhar'),
(3, 'Kunar'),
(4, 'Logar'),
(5, 'Nooristan'),
(6, 'Kabul'),
(7, 'Paktya'),
(8, 'Nisat lala'),
(9, 'kabal'),
(10, 'Takhar'),
(11, 'Ghazni'),
(16, 'Helmand'),
(15, ''),
(12, 'ÙˆØ±Ø¯Ú«'),
(13, 'Kandahar'),
(14, 'Panjsher'),
(17, 'Ø¨Ù„Ø¨Ù„ ÙˆÙ„Ø§ÛŒØª'),
(18, 'Nimroz');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `employee_id` int(11) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `account_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`employee_id`, `user_name`, `user_password`, `account_status`) VALUES
(1, 'admin', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1),
(2, 'afghan', '*11E4CF1FE196084B21E6EC627B518FA5640FFFFD', 1),
(82, 'tata', '*53C946569835FCDF430805D6A8114B14AA1CB16C', 1),
(80, 'ff', '*59054B951C0041B22BE886DD3168D3EB6B249FB5', 1),
(86, 'z', '*F24059C44AE7FCD38A595267C522FB133E9F06F1', 0),
(102, 'atal', '*07E70C96AC66D9671CC0F45EFB98F64FB1320BCE', 1),
(100, 'tariq', '*45CF95FCEC0A626D6ED82D694D882E75D23A7FE4', 1),
(87, 'hr', '*4C35FAC00F443C6F2FCB52AA4CC9AD6B4BC26598', 1),
(88, 'finance', '*FCDC6A19DA2DD30E055C3E7BBEB60148D3ED31E4', 1),
(89, 'customer', '*71863C254516DFEB4FF64B27BA21FF236947E535', 1),
(96, 'zabi', '*667F407DE7C6AD07358FA38DAED7828A72014B4E', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

DROP TABLE IF EXISTS `user_level`;
CREATE TABLE IF NOT EXISTS `user_level` (
  `employee_id` int(11) NOT NULL,
  `admin_level` tinyint(4) NOT NULL DEFAULT '0',
  `hr_level` tinyint(4) NOT NULL DEFAULT '0',
  `finance_level` tinyint(4) NOT NULL DEFAULT '0',
  `customer_level` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`employee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`employee_id`, `admin_level`, `hr_level`, `finance_level`, `customer_level`) VALUES
(1, 8, 8, 8, 8),
(79, 1, 1, 1, 0),
(84, 1, 1, 1, 1),
(3, 0, 1, 0, 1),
(85, 0, 0, 1, 0),
(86, 1, 1, 1, 1),
(87, 0, 1, 0, 0),
(88, 0, 0, 1, 0),
(89, 0, 0, 0, 1),
(96, 0, 0, 0, 1),
(102, 8, 8, 8, 8),
(100, 0, 0, 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
