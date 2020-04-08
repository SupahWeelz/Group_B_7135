-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 08, 2020 at 06:54 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se_jobsearchapp`
--

USE se_jobsearchapp;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE IF NOT EXISTS `application` (
  `ApplicationID` int(11) NOT NULL AUTO_INCREMENT,
  `JobID` int(11) NOT NULL,
  `JobSeekerID` int(11) NOT NULL,
  `Applied_date` date NOT NULL,
  `Justification` longtext NOT NULL COMMENT 'for Job/Qualifications',
  `Answers` longtext NOT NULL COMMENT 'for Job/Questions',
  `DocumentId` int(11) DEFAULT NULL,
  `Withdraw_date` date NOT NULL,
  PRIMARY KEY (`ApplicationID`),
  KEY `JobSeekerID` (`JobSeekerID`),
  KEY `JobID` (`JobID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `association`
--

DROP TABLE IF EXISTS `association`;
CREATE TABLE IF NOT EXISTS `association` (
  `AssociationID` int(11) NOT NULL,
  `AssociationName` varchar(30) NOT NULL,
  `Street Address` varchar(300) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(2) NOT NULL,
  `Zipcode` varchar(11) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Logo` varchar(50) NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Modify_date` date NOT NULL,
  `URL` varchar(300) NOT NULL,
  PRIMARY KEY (`AssociationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `CompanyID` int(11) NOT NULL AUTO_INCREMENT,
  `AssociationID` int(11) NOT NULL,
  `CompanyName` varchar(50) DEFAULT NULL,
  `Description` varchar(300) DEFAULT NULL,
  `Street Address` varchar(300) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `State` varchar(2) DEFAULT NULL,
  `ZipCode` varchar(11) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Industry` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CompanyID`),
  KEY `AssociationId` (`AssociationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `JobID` int(11) NOT NULL AUTO_INCREMENT,
  `JobName` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `CompanyID` int(11) NOT NULL,
  `Post_date` date NOT NULL,
  `Open_date` date NOT NULL,
  `Close_date` date NOT NULL,
  `Number_available` int(11) NOT NULL,
  `PostedBy` int(11) NOT NULL COMMENT 'subset of userID',
  `Qualification` text NOT NULL,
  `SalaryRange` varchar(50) NOT NULL,
  `JobType` int(11) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Benefits` text NOT NULL,
  `Questions` text NOT NULL,
  PRIMARY KEY (`JobID`),
  KEY `Postby` (`PostedBy`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JobID`, `JobName`, `Description`, `CompanyID`, `Post_date`, `Open_date`, `Close_date`, `Number_available`, `PostedBy`, `Qualification`, `SalaryRange`, `JobType`, `Location`, `Benefits`, `Questions`) VALUES
(1, 'Software Engineer', 'Manage all steps of software cycle', 1, '2020-04-04', '2020-04-04', '2020-04-04', 3, 1, 'Good thinker', '$55,000-$65,000', 2, 'My house', 'My house', 'Who is David S. Pumpkins?');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

DROP TABLE IF EXISTS `jobseeker`;
CREATE TABLE IF NOT EXISTS `jobseeker` (
  `JobSeekerID` int(11) NOT NULL AUTO_INCREMENT,
  `PersonalStatement` text DEFAULT NULL,
  `Education` text DEFAULT NULL,
  `JobHistory` text DEFAULT NULL,
  `Skills` text DEFAULT NULL,
  `Experience` text DEFAULT NULL,
  `Documents` text DEFAULT NULL,
  `EverEmployee` tinyint(1) NOT NULL DEFAULT 0,
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`JobSeekerID`),
  UNIQUE KEY `UserID` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`JobSeekerID`, `PersonalStatement`, `Education`, `JobHistory`, `Skills`, `Experience`, `Documents`, `EverEmployee`, `UserID`) VALUES
(1, 'Hey', 'You', 'Guys', 'Like', 'Pie?', NULL, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

DROP TABLE IF EXISTS `uploads`;
CREATE TABLE IF NOT EXISTS `uploads` (
  `FileID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `FileName` varchar(100) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `FileType` varchar(50) NOT NULL,
  `FileSize` varchar(50) NOT NULL,
  `Data` mediumblob NOT NULL,
  PRIMARY KEY (`FileID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

DROP TABLE IF EXISTS `userlogin`;
CREATE TABLE IF NOT EXISTS `userlogin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserTypeID` int(2) NOT NULL DEFAULT 50,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `MiddleName` varchar(30) DEFAULT NULL,
  `LastName` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Email` (`Email`),
  KEY `usertypeid` (`UserTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`ID`, `UserTypeID`, `Username`, `Password`, `FirstName`, `MiddleName`, `LastName`, `Email`) VALUES
(1, 10, 'schu', '444444', '', NULL, '', 'schu2@lsu.edu'),
(8, 40, 'weelz', '444444', 'Chris', '', 'Dai', 'gg@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
CREATE TABLE IF NOT EXISTS `usertype` (
  `UserTypeID` int(11) NOT NULL DEFAULT 50,
  `UserTypeName` varchar(50) NOT NULL,
  PRIMARY KEY (`UserTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`UserTypeID`, `UserTypeName`) VALUES
(10, 'System Admin'),
(20, 'Manager'),
(30, 'Recruiter'),
(40, 'Employee'),
(50, 'Potential');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`JobSeekerID`) REFERENCES `jobseeker` (`JobSeekerID`),
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`JobID`) REFERENCES `job` (`JobID`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`AssociationID`) REFERENCES `association` (`AssociationID`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`PostedBy`) REFERENCES `userlogin` (`ID`);

--
-- Constraints for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD CONSTRAINT `jobseeker_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `userlogin` (`ID`);

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `userlogin` (`ID`);

--
-- Constraints for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD CONSTRAINT `userlogin_ibfk_1` FOREIGN KEY (`UserTypeID`) REFERENCES `usertype` (`UserTypeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
