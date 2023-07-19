-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2018 at 01:20 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbattendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblautonumber`
--

CREATE TABLE IF NOT EXISTS `tblautonumber` (
  `AutoID` int(11) NOT NULL AUTO_INCREMENT,
  `AutoStart` varchar(30) NOT NULL,
  `AutoEnd` int(11) NOT NULL,
  `AutoInc` int(11) NOT NULL,
  `AutoType` varchar(30) NOT NULL,
  PRIMARY KEY (`AutoID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblautonumber`
--

INSERT INTO `tblautonumber` (`AutoID`, `AutoStart`, `AutoEnd`, `AutoInc`, `AutoType`) VALUES
(1, '2017', 56, 1, 'AuthPrint');

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE IF NOT EXISTS `tblcourse` (
  `CourseID` int(11) NOT NULL AUTO_INCREMENT,
  `CourseCode` varchar(30) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `DepartmentID` int(11) NOT NULL,
  PRIMARY KEY (`CourseID`),
  KEY `DepartmentID` (`DepartmentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`CourseID`, `CourseCode`, `Description`, `DepartmentID`) VALUES
(3, 'BSIT', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 1),
(4, 'BEED', 'BACHELOR OF SCIENCE IN ELEMENTARY EDUCATION', 4),
(5, 'BSBA Financial Management', 'BACHELOR OF SCIENCE IN BUSINES ADMINISTRATION', 3),
(6, 'BSED', 'BACHELOR  OF SCIENCE IN SECONDARY EDUCATION', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE IF NOT EXISTS `tbldepartment` (
  `DepartmentID` int(11) NOT NULL AUTO_INCREMENT,
  `Department` varchar(30) NOT NULL,
  `Description` varchar(99) NOT NULL,
  PRIMARY KEY (`DepartmentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`DepartmentID`, `Department`, `Description`) VALUES
(1, 'ITE', 'IT DEPARTMENT'),
(3, 'BITE', 'BUSINESS AND IT EDUCATION'),
(4, 'TEA', 'TEACHER EDUCATION DEPARTMENT');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogs`
--

CREATE TABLE IF NOT EXISTS `tbllogs` (
  `LOGID` int(11) NOT NULL AUTO_INCREMENT,
  `USERID` int(11) NOT NULL,
  `LOGDATETIME` datetime NOT NULL,
  `LOGROLE` varchar(30) NOT NULL,
  `LOGMODE` varchar(30) NOT NULL,
  PRIMARY KEY (`LOGID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=161 ;

--
-- Dumping data for table `tbllogs`
--

INSERT INTO `tbllogs` (`LOGID`, `USERID`, `LOGDATETIME`, `LOGROLE`, `LOGMODE`) VALUES
(1, 1, '2017-01-24 01:53:37', 'Administrator', 'Logged out'),
(2, 1, '2017-01-24 02:48:48', 'Administrator', 'Logged in'),
(3, 1, '2017-01-24 06:45:15', 'Administrator', 'Logged out'),
(4, 1, '2017-01-24 06:45:19', 'Administrator', 'Logged in'),
(5, 1, '2017-01-24 06:51:14', 'Administrator', 'Logged out'),
(6, 1, '2017-01-29 07:40:53', 'Administrator', 'Logged in'),
(7, 1, '2017-01-29 07:41:02', 'Administrator', 'Logged out'),
(8, 1, '2017-01-29 07:43:38', 'Administrator', 'Logged in'),
(9, 1, '2017-01-29 07:44:28', 'Administrator', 'Logged in'),
(10, 1, '2017-01-29 07:44:38', 'Administrator', 'Logged out'),
(11, 1, '2017-01-29 07:44:45', 'Administrator', 'Logged in'),
(12, 1, '2017-01-29 07:44:52', 'Administrator', 'Logged out'),
(13, 1, '2017-01-29 07:45:47', 'Administrator', 'Logged in'),
(14, 1, '2017-01-29 07:49:33', 'Administrator', 'Logged out'),
(15, 1, '2017-01-29 07:49:38', 'Administrator', 'Logged in'),
(16, 1, '2017-01-29 07:53:10', 'Administrator', 'Logged out'),
(17, 1, '2017-01-29 07:53:37', 'Administrator', 'Logged in'),
(18, 1, '2017-01-29 09:05:02', 'Administrator', 'Logged out'),
(19, 1, '2017-01-29 09:05:15', 'Administrator', 'Logged in'),
(20, 1, '2017-01-29 09:21:21', 'Administrator', 'Logged out'),
(21, 1, '2017-01-29 09:21:27', 'Administrator', 'Logged in'),
(22, 1, '2017-01-29 09:22:12', 'Administrator', 'Logged out'),
(23, 1, '2017-01-29 09:22:16', 'Administrator', 'Logged in'),
(24, 1, '2017-01-29 11:22:09', 'Administrator', 'Logged out'),
(25, 1, '2017-01-29 11:22:39', 'Administrator', 'Logged in'),
(26, 1, '2017-01-29 11:37:32', 'Administrator', 'Logged out'),
(27, 1, '2017-01-30 08:28:49', 'Administrator', 'Logged in'),
(28, 1, '2017-01-30 09:40:52', 'Administrator', 'Logged out'),
(29, 1, '2017-01-30 09:41:39', 'Administrator', 'Logged in'),
(30, 1, '2017-01-30 11:15:50', 'Administrator', 'Logged out'),
(31, 1, '2017-02-03 05:57:55', 'Administrator', 'Logged in'),
(32, 1, '2017-02-03 06:23:40', 'Administrator', 'Logged out'),
(33, 1, '2017-02-06 03:44:59', 'Administrator', 'Logged in'),
(34, 1, '2017-02-10 10:56:48', 'Administrator', 'Logged in'),
(35, 1, '2017-02-11 06:40:48', 'Administrator', 'Logged in'),
(36, 1, '2017-02-11 08:22:58', 'Administrator', 'Logged out'),
(37, 1, '2017-02-11 08:23:08', 'Administrator', 'Logged in'),
(38, 1, '2017-02-11 10:21:32', 'Administrator', 'Logged out'),
(39, 1, '2017-02-11 10:21:36', 'Administrator', 'Logged in'),
(40, 1, '2017-02-11 12:44:15', 'Administrator', 'Logged out'),
(41, 1, '2017-02-11 12:44:22', 'Administrator', 'Logged in'),
(42, 1, '2017-02-11 13:09:14', 'Administrator', 'Logged out'),
(43, 1, '2017-02-11 13:09:42', 'Administrator', 'Logged in'),
(44, 1, '2017-02-12 08:21:30', 'Administrator', 'Logged in'),
(45, 1, '2017-02-12 11:52:58', 'Administrator', 'Logged in'),
(46, 1, '2017-02-12 13:11:42', 'Administrator', 'Logged out'),
(47, 1, '2017-02-12 13:12:00', 'Administrator', 'Logged in'),
(48, 1, '2017-02-12 13:14:59', 'Administrator', 'Logged out'),
(49, 1, '2017-02-12 13:17:23', 'Administrator', 'Logged in'),
(50, 1, '2017-02-13 06:35:27', 'Administrator', 'Logged out'),
(51, 1, '2017-02-13 06:35:54', 'Administrator', 'Logged in'),
(52, 1, '2017-02-13 06:44:05', 'Administrator', 'Logged out'),
(53, 1, '2017-02-13 06:46:07', 'Administrator', 'Logged in'),
(54, 1, '2017-02-13 07:10:54', 'Administrator', 'Logged out'),
(55, 1, '2017-02-13 07:11:57', 'Administrator', 'Logged in'),
(56, 1, '2017-02-13 07:55:22', 'Administrator', 'Logged in'),
(57, 1, '2017-02-13 07:55:38', 'Administrator', 'Logged out'),
(58, 1, '2017-02-13 07:57:00', 'Administrator', 'Logged in'),
(59, 1, '2017-02-13 08:03:54', 'Administrator', 'Logged out'),
(60, 1, '2017-02-13 08:04:05', 'Administrator', 'Logged in'),
(61, 1, '2017-02-13 08:42:41', 'Administrator', 'Logged out'),
(62, 1, '2017-02-13 08:42:49', 'Administrator', 'Logged in'),
(63, 1, '2017-02-13 09:07:34', 'Administrator', 'Logged out'),
(64, 1, '2017-02-13 09:07:43', 'Administrator', 'Logged in'),
(65, 1, '2017-02-13 09:25:02', 'Administrator', 'Logged out'),
(66, 1, '2017-02-13 09:25:11', 'Administrator', 'Logged in'),
(67, 1, '2017-02-13 09:26:01', 'Administrator', 'Logged out'),
(68, 1, '2017-02-13 09:26:17', 'Administrator', 'Logged in'),
(69, 1, '2017-02-13 09:48:09', 'Administrator', 'Logged out'),
(70, 1, '2017-02-13 09:48:51', 'Administrator', 'Logged in'),
(71, 1, '2017-02-13 09:52:24', 'Administrator', 'Logged out'),
(72, 1, '2017-02-13 09:53:22', 'Administrator', 'Logged in'),
(73, 1, '2017-02-13 10:04:28', 'Administrator', 'Logged out'),
(74, 1, '2017-02-13 10:04:33', 'Administrator', 'Logged in'),
(75, 1, '2017-02-13 10:04:58', 'Administrator', 'Logged out'),
(76, 1, '2017-02-13 10:05:05', 'Administrator', 'Logged in'),
(77, 1, '2017-02-14 05:24:23', 'Administrator', 'Logged in'),
(78, 1, '2017-02-14 06:08:35', 'Administrator', 'Logged out'),
(79, 1, '2017-02-14 08:08:19', 'Administrator', 'Logged in'),
(80, 1, '2017-02-14 08:37:12', 'Administrator', 'Logged out'),
(81, 1, '2017-02-14 08:37:23', 'Administrator', 'Logged in'),
(82, 1, '2017-02-14 08:52:18', 'Administrator', 'Logged out'),
(83, 1, '2017-02-14 08:54:10', 'Administrator', 'Logged in'),
(84, 1, '2017-02-17 00:51:27', 'Administrator', 'Logged in'),
(85, 1, '2017-02-17 05:10:46', 'Administrator', 'Logged out'),
(86, 1, '2017-02-17 05:11:57', 'Administrator', 'Logged in'),
(87, 1, '2017-02-17 05:18:17', 'Administrator', 'Logged out'),
(88, 1, '2017-02-17 05:20:56', 'Administrator', 'Logged in'),
(89, 1, '2017-02-17 05:36:58', 'Administrator', 'Logged in'),
(90, 1, '2017-02-17 06:07:09', 'Administrator', 'Logged out'),
(91, 1, '2017-02-18 02:00:39', 'Administrator', 'Logged in'),
(92, 1, '2017-02-19 03:15:19', 'Administrator', 'Logged in'),
(93, 1, '2017-02-19 06:33:26', 'Administrator', 'Logged out'),
(94, 1, '2017-02-19 06:33:54', 'Administrator', 'Logged in'),
(95, 1, '2017-02-19 06:34:02', 'Administrator', 'Logged out'),
(96, 1, '2017-02-20 03:42:46', 'Administrator', 'Logged in'),
(97, 1, '2017-02-23 06:46:15', 'Administrator', 'Logged in'),
(98, 1, '2017-02-26 12:38:40', 'Administrator', 'Logged in'),
(99, 1, '2017-02-26 12:50:05', 'Administrator', 'Logged out'),
(100, 1, '2017-02-26 12:50:17', 'Administrator', 'Logged in'),
(101, 1, '2017-02-26 12:53:11', 'Administrator', 'Logged out'),
(102, 1, '2017-02-26 13:11:17', 'Administrator', 'Logged in'),
(103, 1, '2017-03-02 06:34:19', 'Administrator', 'Logged in'),
(104, 1, '2017-03-02 08:29:24', 'Administrator', 'Logged in'),
(105, 1, '2017-03-02 11:37:04', 'Administrator', 'Logged out'),
(106, 1, '2017-03-02 11:37:45', 'Administrator', 'Logged in'),
(107, 1, '2017-03-02 11:38:33', 'Administrator', 'Logged out'),
(108, 6, '2017-03-02 11:38:45', 'Registrar', 'Logged in'),
(109, 6, '2017-03-02 11:51:59', 'Registrar', 'Logged out'),
(110, 1, '2017-03-02 13:42:16', 'Administrator', 'Logged in'),
(111, 1, '2017-03-02 13:45:38', 'Administrator', 'Logged out'),
(112, 1, '2017-03-02 13:45:44', 'Administrator', 'Logged in'),
(113, 1, '2017-03-03 03:00:06', 'Administrator', 'Logged out'),
(114, 1, '2017-03-03 05:56:11', 'Administrator', 'Logged in'),
(115, 1, '2017-03-03 10:11:18', 'Administrator', 'Logged out'),
(116, 1, '2017-03-03 10:28:36', 'Administrator', 'Logged in'),
(117, 1, '2017-03-03 10:43:02', 'Administrator', 'Logged out'),
(118, 7, '2017-03-03 10:43:10', 'Registrar', 'Logged in'),
(119, 7, '2017-03-03 10:43:36', 'Registrar', 'Logged out'),
(120, 1, '2017-03-03 10:43:41', 'Administrator', 'Logged in'),
(121, 1, '2017-03-03 10:44:50', 'Administrator', 'Logged out'),
(122, 7, '2017-03-03 10:44:55', 'Registrar', 'Logged in'),
(123, 7, '2017-03-03 10:48:53', 'Registrar', 'Logged out'),
(124, 1, '2017-03-03 10:48:57', 'Administrator', 'Logged in'),
(125, 1, '2017-03-03 11:17:36', 'Administrator', 'Logged in'),
(126, 1, '2017-03-03 18:21:25', 'Administrator', 'Logged in'),
(127, 1, '2017-03-04 00:16:04', 'Administrator', 'Logged in'),
(128, 1, '2017-03-04 10:59:24', 'Administrator', 'Logged in'),
(129, 1, '2017-03-04 11:13:16', 'Administrator', 'Logged in'),
(130, 1, '2017-03-04 11:15:49', 'Administrator', 'Logged out'),
(131, 8, '2017-03-04 11:15:57', 'Registrar', 'Logged in'),
(132, 8, '2017-03-04 11:16:32', 'Registrar', 'Logged out'),
(133, 1, '2017-03-04 11:16:37', 'Administrator', 'Logged in'),
(134, 1, '2017-03-04 17:55:52', 'Administrator', 'Logged in'),
(135, 1, '2017-03-05 09:43:48', 'Administrator', 'Logged in'),
(136, 1, '2017-03-05 13:36:22', 'Administrator', 'Logged out'),
(137, 1, '2017-03-05 13:36:45', 'Administrator', 'Logged in'),
(138, 1, '2017-03-05 13:54:39', 'Administrator', 'Logged out'),
(139, 1, '2017-03-08 07:54:02', 'Administrator', 'Logged in'),
(140, 1, '2017-03-08 08:02:08', 'Administrator', 'Logged out'),
(141, 1, '2017-03-13 10:52:30', 'Administrator', 'Logged in'),
(142, 1, '2017-03-14 20:18:18', 'Administrator', 'Logged in'),
(143, 1, '2017-03-14 22:36:17', 'Administrator', 'Logged in'),
(144, 1, '2017-03-15 02:02:32', 'Administrator', 'Logged in'),
(145, 1, '2017-03-16 03:43:51', 'Administrator', 'Logged in'),
(146, 1, '2017-03-16 04:05:04', 'Administrator', 'Logged out'),
(147, 1, '2018-10-20 22:44:37', 'Administrator', 'Logged in'),
(148, 1, '2018-10-20 23:00:36', 'Administrator', 'Logged out'),
(149, 1, '2018-10-20 23:20:52', 'Administrator', 'Logged in'),
(150, 1, '2018-10-20 23:40:43', 'Administrator', 'Logged out'),
(151, 1, '2018-10-21 00:05:56', 'Administrator', 'Logged in'),
(152, 1, '2018-10-21 00:05:59', 'Administrator', 'Logged out'),
(153, 1, '2018-10-21 00:08:08', 'Administrator', 'Logged in'),
(154, 1, '2018-10-21 00:09:19', 'Administrator', 'Logged out'),
(155, 1, '2018-10-21 00:11:11', 'Administrator', 'Logged in'),
(156, 1, '2018-10-21 01:10:19', 'Administrator', 'Logged out'),
(157, 1, '2018-10-21 01:10:38', 'Administrator', 'Logged in'),
(158, 1, '2018-10-21 01:12:38', 'Administrator', 'Logged in'),
(159, 1, '2018-10-21 01:19:03', 'Administrator', 'Logged out'),
(160, 1, '2018-10-21 01:19:07', 'Administrator', 'Logged in');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE IF NOT EXISTS `tblstudent` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `StudentID` varchar(30) NOT NULL,
  `Firstname` varchar(99) NOT NULL,
  `Lastname` varchar(99) NOT NULL,
  `Middlename` varchar(99) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `BirthDate` date NOT NULL,
  `Age` int(11) NOT NULL,
  `ContactNo` varchar(30) NOT NULL,
  `YearLevel` varchar(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `StudPhoto` varchar(255) NOT NULL,
  `Cand_Status` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `StudentID` (`StudentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`ID`, `StudentID`, `Firstname`, `Lastname`, `Middlename`, `Address`, `Gender`, `BirthDate`, `Age`, `ContactNo`, `YearLevel`, `CourseID`, `StudPhoto`, `Cand_Status`) VALUES
(1, '023256469', 'KENJIE', 'PALACIOS', 'ECHALAR', 'KABANKALAN CITY', 'Male', '1992-11-20', 24, '0232546886', 'Fourth', 3, 'photo/login.png', 'Candidate'),
(2, '12312312', 'JAKE', 'PALMA', 'ECHALAR', 'KABANKALAN CITY', 'Male', '1990-11-11', 26, '12312312312', 'Second', 4, 'photo/import1.png', 'Candidate'),
(3, '8583362', 'JANRY', 'TAN', 'MELMOM', 'KABANKALAN CITY', 'Male', '1991-08-16', 25, '12312312312', 'First', 3, '', 'Candidate'),
(4, '0010266936', 'JASON', 'BATUTU', 'RERE', 'KABANKALAN CITY', 'Male', '1994-02-14', 23, '21312312312321', 'First', 3, 'photo/Koala.jpg', 'Candidate'),
(5, '8798794', 'ALMA', 'RECARDO', 'TORRES', 'HIMAMAYLAN CITY', 'Female', '1989-04-26', 27, '09047894777', 'Second', 4, '', ''),
(6, '8675543', 'CHESKA', 'RAMIREZ', 'UY', 'KABANKALAN CITY', 'Female', '1990-01-31', 27, '09567435788', 'Third', 5, '', ''),
(7, '1253235', 'RAMON', 'CORPUZ', 'SANTOS', 'DANCALAN, ILOG', 'Male', '1994-02-17', 23, '09567453453', 'First', 3, '', ''),
(8, '654567896', 'KAREN', 'VARGAS', 'ONG', 'KABANKALAN CITY', 'Female', '1993-03-22', 23, '09457545699', 'First', 3, '', ''),
(9, '5434689', 'KENMARK', 'REYES', 'DELA CRUZ', 'SUAY, HIMAMAYLAN CITY', 'Male', '1992-11-16', 24, '09567534689', 'First', 6, '', ''),
(10, '57053590', 'CHERYL', 'LACSON', 'PADILLA', 'KABANKALAN CITY', 'Female', '1990-05-25', 26, '09206543456', 'Second', 3, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbltimetable`
--

CREATE TABLE IF NOT EXISTS `tbltimetable` (
  `TimeTableID` int(11) NOT NULL AUTO_INCREMENT,
  `StudentID` varchar(90) NOT NULL,
  `TimeInAM` varchar(30) NOT NULL,
  `TimeOutAM` varchar(30) NOT NULL,
  `TimeInPM` varchar(30) NOT NULL,
  `TimeOutPM` varchar(30) NOT NULL,
  `AttendDate` date NOT NULL,
  PRIMARY KEY (`TimeTableID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbltimetable`
--

INSERT INTO `tbltimetable` (`TimeTableID`, `StudentID`, `TimeInAM`, `TimeOutAM`, `TimeInPM`, `TimeOutPM`, `AttendDate`) VALUES
(1, '0010266936', '04:39 AM', '04:39 AM', '', '', '2018-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `tblverifytimeintimeout`
--

CREATE TABLE IF NOT EXISTS `tblverifytimeintimeout` (
  `VerifyID` int(11) NOT NULL AUTO_INCREMENT,
  `StudentID` varchar(90) NOT NULL,
  `TimeIn` varchar(30) NOT NULL,
  `TimeOut` varchar(30) NOT NULL,
  `Verification` varchar(90) NOT NULL,
  `DateValidation` date NOT NULL,
  PRIMARY KEY (`VerifyID`),
  UNIQUE KEY `StudentID` (`StudentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblverifytimeintimeout`
--

INSERT INTO `tblverifytimeintimeout` (`VerifyID`, `StudentID`, `TimeIn`, `TimeOut`, `Verification`, `DateValidation`) VALUES
(1, '0010266936', '04:39 AM', '', 'TimeIn', '2018-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE IF NOT EXISTS `useraccounts` (
  `ACCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_NAME` varchar(255) NOT NULL,
  `ACCOUNT_USERNAME` varchar(255) NOT NULL,
  `ACCOUNT_PASSWORD` text NOT NULL,
  `ACCOUNT_TYPE` varchar(30) NOT NULL,
  `EMPID` int(11) NOT NULL,
  `USERIMAGE` varchar(255) NOT NULL,
  PRIMARY KEY (`ACCOUNT_ID`),
  UNIQUE KEY `ACCOUNT_USERNAME` (`ACCOUNT_USERNAME`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`ACCOUNT_ID`, `ACCOUNT_NAME`, `ACCOUNT_USERNAME`, `ACCOUNT_PASSWORD`, `ACCOUNT_TYPE`, `EMPID`, `USERIMAGE`) VALUES
(1, 'Janno Palacios', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 1234, 'photos/import2.png'),
(5, 'James Yap', 'james', '474ba67bdb289c6263b36dfd8a7bed6c85b04943', 'Administrator', 0, ''),
(6, 'LLOYD', 'lloyd', '12dea96fec20593566ab75692c9949596833adc9', 'Registrar', 0, ''),
(7, 'SSG1', 'ssg', '24ce6d489183f0ce4bd322ec5f59b45f9177288d', 'Registrar', 0, ''),
(8, 'SSG2', 'ssg2', '5e0b5b0eae521294ac33b471d64dcee6acff3799', 'Registrar', 0, '');
