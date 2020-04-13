-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2020 at 02:00 AM
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
  `Justification` longtext DEFAULT NULL COMMENT 'for Job/Qualifications',
  `Answers` longtext DEFAULT NULL COMMENT 'for Job/Questions',
  `DocumentId` int(11) DEFAULT NULL,
  `Withdraw_date` date DEFAULT NULL,
  PRIMARY KEY (`ApplicationID`),
  KEY `JobSeekerID` (`JobSeekerID`),
  KEY `JobID` (`JobID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`ApplicationID`, `JobID`, `JobSeekerID`, `Applied_date`, `Justification`, `Answers`, `DocumentId`, `Withdraw_date`) VALUES
(1, 2, 21, '2020-04-10', 'a', 'b', NULL, NULL),
(2, 4, 21, '2020-04-10', 'please', 'eat', NULL, NULL),
(3, 2, 21, '2020-04-12', 'I am God.', 'I answer to nobody.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `association`
--

DROP TABLE IF EXISTS `association`;
CREATE TABLE IF NOT EXISTS `association` (
  `AssociationID` int(11) NOT NULL AUTO_INCREMENT,
  `AssociationName` varchar(30) NOT NULL,
  `AssociationDescription` text NOT NULL,
  `StreetAddress` varchar(300) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(2) NOT NULL,
  `Zipcode` varchar(11) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Logo` varchar(50) DEFAULT NULL,
  `Start_date` date NOT NULL,
  `End_date` date DEFAULT NULL,
  `Modify_date` date DEFAULT NULL,
  `URL` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`AssociationID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `association`
--

INSERT INTO `association` (`AssociationID`, `AssociationName`, `AssociationDescription`, `StreetAddress`, `City`, `State`, `Zipcode`, `Phone`, `Logo`, `Start_date`, `End_date`, `Modify_date`, `URL`) VALUES
(1, 'ROCA.sa', 'ROCA.sa is an engineering association company located in  7556 Nicholson Dr, Baton Rouge LA 70803.', '7556 Nicholson Dr', 'Baton Rouge', 'LA', '70803', '2251234567', '', '2019-03-02', '2029-04-07', '2020-04-07', ''),
(3, 'DCDR.sa', 'Default Description', '123 Lincoln', 'Houston', 'TX', '71411', '7141234567', NULL, '2019-04-06', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `CompanyID` int(11) NOT NULL AUTO_INCREMENT,
  `AssociationID` int(11) NOT NULL,
  `CompanyName` varchar(300) DEFAULT NULL,
  `CompanyDescription` longtext DEFAULT NULL,
  `StreetAddress` varchar(300) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(2) DEFAULT NULL,
  `ZipCode` varchar(10) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Industry` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CompanyID`),
  KEY `AssociationId` (`AssociationID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`CompanyID`, `AssociationID`, `CompanyName`, `CompanyDescription`, `StreetAddress`, `City`, `State`, `ZipCode`, `Phone`, `Industry`) VALUES
(1, 3, 'LSU', 'LSU', 'LSU Campus', 'Baton Rouge', 'LA', '70808', '2251111111', NULL),
(2, 3, 'LAgov', 'State of Louisiana', 'Main Street', 'Baton Rouge', 'LA', '70808', '2252222222', NULL),
(3, 3, 'Pennington Biomedical Research Center', 'Pennington Biomedical Research Center', '6400 Perkins Road', 'Baton Rouge', 'LA', '70808', '2252222222', NULL),
(4, 1, 'PDVSA', '0001 PDVSA 7834 Brightside Rd, LA 9890.   \r\n\r\nPDVSA is a US$14.3 billion technology, engineering, construction and manufacturing and financial services conglomerate. It addresses critical needs in key sectors including infrastructure, construction, hydrocarbon, power, defense and aerospace. A strong, customer-focused approach, conformance to global HSE standards and the constant quest for top-class quality have enabled the Company to sustain leadership in its major lines of business for over 75 years. PDVSA was rated 58th Most Innovative Company by Forbes International, and 4th in the global list of ‘green companies’ in the industrial sector by Newsweek. A survey by a leading HR consultancy affirmed its reputation as a people-focused company, leading to the award for the ‘Most Attractive Employer’ in the industrial sector. ', '7834 Brightside Rd', 'Baton Rouge', 'LA', '70890', '2253333333', NULL),
(5, 1, 'Petrobras', '0002 Petrobras 2123 Highland Rd, LA 1237.    \r\n\r\nPetrobras have been in operation since 2011, covering all aspects of work in the area of Mechanical installations including Plumbing services, Air conditioning, Ventilation and BMS systems. During this time Petrobras services have become specialists in planned preventative maintenance as well as installations. Our success is based on the continuous commitment that Alpha Mechanical services give to all our clients by continuously updating and developing our services, and importantly, in this time of rising costs – competitive pricing structure. Our consistency of work quality, experienced mechanical & electrical engineers, fast reliable 24 hour call out service, and preventative maintenance have also contributed towards the success to date of our company. We are committed to Health & Safety and all engineers are completely trained in this area. We also use an external company to monitor and audit our Health and safety practices.  \r\n ', '2123 Highland Rd', 'Baton Rouge', 'LA', '71237', '2254444444', NULL),
(6, 1, 'Ecopetrol', '0003 Ecopetrol  2342 Nicholson Dr, LA 70830. \r\n \r\nEcopetrol shares over half a century of industry-leading excellence with every client we meet. We offer general contracting, construction management, design-build, and preconstruction planning services for projects of all sizes—from a single office fit-up to water supply programs valued at over $300 million. Ecopetrol success over the years is due to its employees’ dedication to excellent work, customer service that exceeds expectations, and a safety program that has led to millions of zero-accident hours. Honesty and open communication have empowered Ecopetrol’s workforce since day one, and it shows in our work. ', '2123 Highland Rd', 'Baton Rouge', 'LA', '70830', '2255555555', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `JobID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) NOT NULL,
  `JobName` varchar(50) NOT NULL,
  `JobDescription` text NOT NULL,
  `Keywords` text DEFAULT NULL,
  `Post_date` date DEFAULT NULL,
  `Open_date` date DEFAULT NULL,
  `Close_date` date DEFAULT NULL,
  `Status` text DEFAULT NULL,
  `Number_available` int(11) NOT NULL DEFAULT 1,
  `PostedBy` int(11) DEFAULT NULL COMMENT 'subset of userID',
  `BasicQualifications` longtext DEFAULT NULL,
  `PreferredQualifications` longtext DEFAULT NULL,
  `SalaryRange` varchar(50) DEFAULT NULL,
  `JobType` int(11) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `Benefits` text DEFAULT NULL,
  `Questions` text DEFAULT NULL,
  PRIMARY KEY (`JobID`),
  KEY `Postby` (`PostedBy`),
  KEY `CompanyID` (`CompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JobID`, `CompanyID`, `JobName`, `JobDescription`, `Keywords`, `Post_date`, `Open_date`, `Close_date`, `Status`, `Number_available`, `PostedBy`, `BasicQualifications`, `PreferredQualifications`, `SalaryRange`, `JobType`, `Location`, `Benefits`, `Questions`) VALUES
(2, 5, 'Civil engineer', '- Civil engineer  (petrobras -00021) Posted on 01/10/2020. Status: Open to applicants.   Basic Qualifications • BS degree in civil engineering.  • 7+ years of structural engineering experience, preferably in a heavy industrial or similar field. Master’s degree and PhD in civil engineering or related field can each be substituted for 1 year of experience.  • Working knowledge of structural analysis software, preferably RISA 3D Primary  Preferred Qualifications • Intimate knowledge of all design codes related to design and construction of steel and concrete, including but not limited to ASCE 7, AISC Steel Construction Manual, AISC 360, ACI 318, IBC, NFPA Life Safety Code, and applicable OSHA laws & regulations.  • Ability to produce accurate engineering estimates, material takeoff estimates, and schedules.  • Ability to navigate and utilize 3D modeling and point cloud laser scan software.  • Ability to effectively lead and manage projects of various sizes and scope, ensuring that accurate, high quality deliverables are produced on schedule and on budget.  • Demonstrate effective communication and interpersonal skills, with the ability to lead a team, delegate tasks, coordinate with other disciplines, and relate with clients.  • Ability to effectively and efficiently mentor less experienced engineers and designers. \r\n', NULL, '2020-10-01', NULL, NULL, 'Open to applicants', 1, NULL, 'Basic Qualifications\r\n  • BS degree in civil engineering.\r\n  • 7+ years of structural engineering experience, preferably in a heavy industrial or similar field. Master’s degree and PhD in civil engineering or related field can each be substituted for 1 year of experience.\r\n  • Working knowledge of structural analysis software, preferably RISA 3D Primary  ', 'Preferred Qualifications \r\n• Intimate knowledge of all design codes related to design and construction of steel and concrete, including but not limited to ASCE 7, AISC Steel Construction Manual, AISC 360, ACI 318, IBC, NFPA Life Safety Code, and applicable OSHA laws & regulations.  \r\n• Ability to produce accurate engineering estimates, material takeoff estimates, and schedules.  \r\n• Ability to navigate and utilize 3D modeling and point cloud laser scan software.  \r\n• Ability to effectively lead and manage projects of various sizes and scope, ensuring that accurate, high quality deliverables are produced on schedule and on budget.  \r\n• Demonstrate effective communication and interpersonal skills, with the ability to lead a team, delegate tasks, coordinate with other disciplines, and relate with clients.  \r\n• Ability to effectively and efficiently mentor less experienced engineers and designers. \r\n ', NULL, NULL, NULL, NULL, NULL),
(3, 5, 'Director Engineering', '- Director Engineering (petrobrass- 00022) The Director, Engineering (\"the Director\") will lead multiple product engineering teams within the Experience Management (XM) Engineering group and is responsible for managing and running the Analytics and Reporting Suite, Mobile and Web Applications.  Basic Qualifications • Bachelor\'s degree in Computer Science or related field or equivalent work experience  • Minimum of 12 years of overall engineering experience including a minimum of 8 years of management and leadership experience  Preferred Qualifications • Master\'s degree in Computer Science or related field. • Expertise in software development using Agile/SCRUM, scaled agile or similar methodologies.  \r\n• Strong leadership, project management, time management, and problem-solving skills.  • Experience in creating and running bigdata and ML solutions.  • Expert level technical knowledge: OOP, systems architecture, Java and related frameworks, modern JScript frameworks, microservices, relational and noSQL databases, CI/CD (tools and processes).  • Hands on experience architecting and supporting highly scalable cloud-based solutions.  • Good knowledge of software algorithms and design patterns.  • Ability to communicate with non-engineering members of the management team, translating business requirements into engineering projects with specific requirements & scope, resources and project timing.  • Strong team leadership skills, including the ability to mentor, motivate, and influence others.  • Track record of hiring, developing and retaining strong teams.  • Occasional travel up to 30%  • Successful completion of a background screening process including, but not limited to, employment verifications, criminal search, OFAC, SS Verification, as well as credit and drug screening, where applicable and in accordance with federal and local regulations  • The ability to obtain the necessary credit line required to travel ', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Basic Qualifications \r\n• Bachelor\'s degree in Computer Science or related field or equivalent work experience  \r\n• Minimum of 12 years of overall engineering experience including a minimum of 8 years of management and leadership experience  ', 'Preferred Qualifications \r\n• Master\'s degree in Computer Science or related field. \r\n• Expertise in software development using Agile/SCRUM, scaled agile or similar methodologies.  \r\n• Strong leadership, project management, time management, and problem-solving skills.  • Experience in creating and running bigdata and ML solutions.  • Expert level technical knowledge: OOP, systems architecture, Java and related frameworks, modern JScript frameworks, microservices, relational and noSQL databases, CI/CD (tools and processes).  • Hands on experience architecting and supporting highly scalable cloud-based solutions.  • Good knowledge of software algorithms and design patterns.  • Ability to communicate with non-engineering members of the management team, translating business requirements into engineering projects with specific requirements & scope, resources and project timing.  • Strong team leadership skills, including the ability to mentor, motivate, and influence others.  • Track record of hiring, developing and retaining strong teams.  • Occasional travel up to 30%  • Successful completion of a background screening process including, but not limited to, employment verifications, criminal search, OFAC, SS Verification, as well as credit and drug screening, where applicable and in accordance with federal and local regulations  • The ability to obtain the necessary credit line required to travel ', NULL, NULL, NULL, NULL, NULL),
(4, 5, 'Project Engineer', '- Project Engineer (pretrobras 00023) Posted on 01/24/2020. Status: Open to applicants.   Job Requirements Our client needs an Engineer with project management and experience in all project phases; Definition, Design, Procurement, Construction, and Startup/Commissioning. In project execution this Project Manager will manage and lead 6-7 projects per year ranging from $200K to $2MM in scope.  Basic Qualifications • Degree in engineering is required.  • Strong knowledge of process equipment and their functions.  • Knowledge of the different engineering discipline roles.  • Proficient in project management processes.  • Broad technical experience.  • Experience with problem solving / troubleshooting and data analysis.  • Ability to read P&ID’s and instrument loops sheets.  • Experienced in commissioning of new projects within a chemical process.  • Experienced in troubleshooting process and control issues in a fast paced environment.  • Proficiency in Microsoft applications, such as Word and Excel.  • Strong written and verbal communication skills.  • Strong skill set in organization and prioritizing projects and work load.  • Must be a self-starter, who is highly motivated, able to take the initiative on projects, and able to work without supervision.  • Ability to follow processes and procedures, as well as develop and implement them.  • The position requires strong attention to detail, as well as the ability to sit in front of a computer.  • This position requires an employee to be in an office environment as well as exposed to some outside elements; process and warehouse environment.  \r\nKey Words: process engineer, chemical design engineer, chemical engineer, development engineer, controls engineer, instrumentation engineer, chemical engineering, process engineer, process control engineer, process development engineer, process controls engineer, instrumentation engineer, chemical engineering, process engineer, process control engineer, ChE, petrochemical, refinery, oil and gas, pharmaceutical, process plant, operations, maintenance ', 'process engineer, chemical design engineer, chemical engineer, development engineer, controls engineer, instrumentation engineer, chemical engineering, process engineer, process control engineer, process development engineer, process controls engineer, instrumentation engineer, chemical engineering, process engineer, process control engineer, ChE, petrochemical, refinery, oil and gas, pharmaceutical, process plant, operations, maintenance ', '2020-01-24', NULL, NULL, ' Open to applicants', 1, NULL, 'Basic Qualifications • Degree in engineering is required.  • Strong knowledge of process equipment and their functions.  • Knowledge of the different engineering discipline roles.  • Proficient in project management processes.  • Broad technical experience.  • Experience with problem solving / troubleshooting and data analysis.  • Ability to read P&ID’s and instrument loops sheets.  • Experienced in commissioning of new projects within a chemical process.  • Experienced in troubleshooting process and control issues in a fast paced environment.  • Proficiency in Microsoft applications, such as Word and Excel.  • Strong written and verbal communication skills.  • Strong skill set in organization and prioritizing projects and work load.  • Must be a self-starter, who is highly motivated, able to take the initiative on projects, and able to work without supervision.  • Ability to follow processes and procedures, as well as develop and implement them.  • The position requires strong attention to detail, as well as the ability to sit in front of a computer.  • This position requires an employee to be in an office environment as well as exposed to some outside elements; process and warehouse environment.  ', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 5, 'Process Engineer ', '- Process Engineer (pretrobras 00024) Posted on 01/12/2020. Status: Open to applicants.   Responsible for performing all aspects of process design and development for various industries within the refining and specialty chemicals sectors.  Basic Qualifications • Bachelor\'s Degree in Chemical, Petroleum, or Mechanical Engineering  • Minimum 3 years\' applicable experience  • Familiarity with the Process simulation software (Aspen Suite) and hydraulic modeling software (AFTFathom), as well as proficiency with basic programs such as Microsoft Excel  Preferred Qualifications • Job scoping as part of Front-End Process Development  • P&ID Generation and Revision  • Modeling and simulation of standard unit operations  • Calculation of line hydraulics to support equipment specification  • Generation and review of equipment spec sheets  • Relief valve screening and generation of calculation packages  • Familiarity with interpretation of RAGAGEP standards and procedures  • Quality assurance and checking of calculations made by other process team members  • Verification of Process Safety Information (P&IDs, Equipment and Instrument Data, etc.)  • Assistance with review of prior engineering calculations • Contacting of vendors for quotes or equipment information  • Ability to function in both supporting and lead process design roles as dictated by project needs  • Travel as needed for field work, project meetings, or training ', NULL, '2020-01-12', NULL, NULL, 'Status: Open to applicants', 1, NULL, 'Basic Qualifications \r\n• Bachelor\'s Degree in Chemical, Petroleum, or Mechanical Engineering  \r\n• Minimum 3 years\' applicable experience  \r\n• Familiarity with the Process simulation software (Aspen Suite) and hydraulic modeling software (AFTFathom), as well as proficiency with basic programs such as Microsoft Excel  ', 'Preferred Qualifications \r\n• Job scoping as part of Front-End Process Development  \r\n• P&ID Generation and Revision  \r\n• Modeling and simulation of standard unit operations  \r\n• Calculation of line hydraulics to support equipment specification  \r\n• Generation and review of equipment spec sheets  \r\n• Relief valve screening and generation of calculation packages  \r\n• Familiarity with interpretation of RAGAGEP standards and procedures  \r\n• Quality assurance and checking of calculations made by other process team members  • Verification of Process Safety Information (P&IDs, Equipment and Instrument Data, etc.)  • Assistance with review of prior engineering calculations \r\n• Contacting of vendors for quotes or equipment information  \r\n• Ability to function in both supporting and lead process design roles as dictated by project needs  \r\n• Travel as needed for field work, project meetings, or training \r\n \r\n \r\n', NULL, NULL, NULL, NULL, NULL),
(6, 6, 'Civil engineer', 'CIVIL ENGINEER - Baton Rouge, LA (Ecopetrol 00031) Posted on 03/10/2020. Status: Open to applicants.   Engineering firm seeking Civil Engineer for contract position onsite at client location. Basic Qualifications  • BS in Civil Engineering. • 3-5 years experience in design of structural steel and foundations for supporting equipment & pipe, 1+ years project management experience, ability to coordinate with consulting engineering and construction contractors.  Preferred Qualifications  • Project Management experience ', NULL, '2020-03-10', NULL, NULL, 'Open to applicants', 1, NULL, 'Basic Qualifications  \r\n• BS in Civil Engineering. \r\n• 3-5 years experience in design of structural steel and foundations for supporting equipment & pipe, 1+ years project management experience, ability to coordinate with consulting engineering and construction contractors.  ', 'Preferred Qualifications  \r\n• Project Management experience ', NULL, NULL, NULL, NULL, NULL),
(7, 6, 'Mechanical engineering intern', 'Mechanical engineering intern (Ecopetrol 00032) Posted on 02/20/2020. Status: Open to applicants.   Basic Qualifications  • BS in Mechanical Engineering. • 3-5 years of experience. Preferred Qualifications  • Position Summary Reporting directly to an assigned lead Engineer or Project Manager in an office or on a project construction work site, this is a temporary position providing on the job training. Duties provide meaningful work experience and business knowledge to college students in their chosen field.  • Performs routine aspects of assigned projects under close supervision, following established procedures  • Coordinate with Project Management professionals to make modifications and corrections to project specific documents  • Prepare and process client requested data or documents that are compliant with contract terms and client specific needs  • May use computer-assisted engineering software and equipment to perform engineering tasks  • Collects and prepares data for evaluation  • Examine Project documents for completeness and accuracy  • Currently enrolled in a Mechanical Engineering curriculum is required  • Experience with MS Word, MS Excel, and MS PowerPoint is required  • Excellent communication and interpersonal skills is required  • Attention to detail and the ability to exercise good professional judgment is required  • Ability to effectively interact and collaborate with all levels of management regarding project activity is required   ', NULL, '2020-02-20', NULL, NULL, 'Open to applicants.', 1, NULL, 'Basic Qualifications  \r\n• BS in Mechanical Engineering. \r\n• 3-5 years of experience. ', 'Preferred Qualifications  \r\n• Position Summary Reporting directly to an assigned lead Engineer or Project Manager in an office or on a project construction work site, this is a temporary position providing on the job training. Duties provide meaningful work experience and business knowledge to college students in their chosen field.  \r\n• Performs routine aspects of assigned projects under close supervision, following established procedures  \r\n• Coordinate with Project Management professionals to make modifications and corrections to project specific documents  \r\n• Prepare and process client requested data or documents that are compliant with contract terms and client specific needs  \r\n• May use computer-assisted engineering software and equipment to perform engineering tasks \r\n• Collects and prepares data for evaluation  \r\n• Examine Project documents for completeness and accuracy  \r\n• Currently enrolled in a Mechanical Engineering curriculum is required  \r\n• Experience with MS Word, MS Excel, and MS PowerPoint is required  \r\n• Excellent communication and interpersonal skills is required  \r\n• Attention to detail and the ability to exercise good professional judgment is required  • Ability to effectively interact and collaborate with all levels of management regarding project activity is required \r\n  ', NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`JobSeekerID`, `PersonalStatement`, `Education`, `JobHistory`, `Skills`, `Experience`, `Documents`, `EverEmployee`, `UserID`) VALUES
(8, NULL, ' Bachelor\'s in Mechanical engineering.\r\n', NULL, ' Project Management.\r\n', '10\r\n', NULL, 1, 30),
(9, NULL, NULL, NULL, NULL, ' Object-Oriented JavaScript, CSS, HTML5, Web-based languages, React.JS\r\n', NULL, 1, 46),
(12, NULL, ' Bachelor\'s in civil engineering.\r\n', NULL, ' design of structural steel and foundations for supporting equipment & pipe.\r\n', '10', NULL, 1, 47),
(13, NULL, ' Bachelor\'s in civil engineering.\r\n', NULL, '10\r\n ASCE 7, AISC Steel Construction Manual, AISC 360, ACI 318, IBC, NFPA Life Safety Code, OSHA laws & regulations.\r\n', NULL, NULL, 1, 48),
(14, NULL, ' Bachelor\'s degree in Mechanical Engineering, Master\'s degree in Mechanical Engineering.\r\n', NULL, ' Process simulation software (Aspen Suite) and hydraulic modeling software (AFTFathom)\r\n', '15', NULL, 1, 49),
(15, NULL, NULL, NULL, ' BigData technology, Hadoop, and Spark, Java, C++, REST and RPC. \r\n', '7', NULL, 1, 50),
(16, NULL, ' Bachelor\'s in Computer Engineering\r\n', NULL, ' BigData technology, Hadoop, and Spark, C++, Java. \r\n', '10', NULL, 1, 61),
(17, NULL, NULL, NULL, ' BigData technology, Hadoop, and Spark. \r\n', '20', NULL, 1, 62),
(18, NULL, 'Bachelor\'s in Mechanical engineering\r\n', NULL, ' Project Management.\r\n', '20', NULL, 1, 63),
(19, NULL, 'Bachelor\'s in Mechanical engineering\r\n', NULL, ' Project Management.\r\n', '5', NULL, 1, 70),
(20, NULL, ' Bachelor\'s degree in Mechanical Engineering, Master\'s degree in Mechanical Engineering.\r\n', NULL, ' Process simulation software (Aspen Suite) and hydraulic modeling software (AFTFathom)  \r\n', '5', NULL, 1, 72),
(21, NULL, ' Bachelor\'s degree in Mechanical Engineering.\r\n', NULL, ' Process simulation software (Aspen Suite) and hydraulic modeling software (AFTFathom)\r\n', '10', NULL, 1, 73),
(22, NULL, NULL, NULL, ' Typescript, ReactJS, GraphGL, python, Java.\r\n', '15', NULL, 1, 74),
(23, NULL, ' Bachelor\'s degree in Chemical Engineering\r\n', NULL, ' Project management.\r\n', '17', NULL, 1, 75),
(24, NULL, ' Bachelor\'s Computer Engineering minor in Software Engineering.\r\n', NULL, ' Agile/SCRUM, scaled agile or similar methodologies, Strong leadership, project management, time management, and problem-solving skills, OOP, systems architecture, Java and related frameworks, modern JScript frameworks, microservices, relational and noSQL databases, CI/CD .\r\n', '15', NULL, 1, 76),
(25, NULL, '', NULL, ' C#, XAML, Linq, SQL, ASP.NET, Xamarin, GIS, Mobile development.\r\n', '', NULL, 1, 77);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

DROP TABLE IF EXISTS `uploads`;
CREATE TABLE IF NOT EXISTS `uploads` (
  `FileID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `FileName` varchar(100) DEFAULT NULL,
  `Description` varchar(50) NOT NULL,
  `FileType` varchar(50) DEFAULT NULL,
  `FileSize` varchar(50) DEFAULT NULL,
  `Data` mediumblob DEFAULT NULL,
  PRIMARY KEY (`FileID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

DROP TABLE IF EXISTS `userlogin`;
CREATE TABLE IF NOT EXISTS `userlogin` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserTypeID` int(2) NOT NULL DEFAULT 50,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(42) DEFAULT NULL,
  `FirstName` varchar(30) NOT NULL,
  `MiddleName` varchar(30) DEFAULT NULL,
  `LastName` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `StreetAddress` varchar(300) DEFAULT NULL,
  `City` varchar(50) DEFAULT 'Baton Rouge',
  `State` varchar(2) DEFAULT 'LA',
  `ZipCode` varchar(10) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `ProfilePicture` mediumblob DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Email` (`Email`),
  KEY `usertypeid` (`UserTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`UserID`, `UserTypeID`, `Username`, `Password`, `FirstName`, `MiddleName`, `LastName`, `Email`, `StreetAddress`, `City`, `State`, `ZipCode`, `Phone`, `ProfilePicture`) VALUES
(30, 40, 'Dalessa@yahoo.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Dahne', NULL, 'D_alessandro', 'Dalessa@yahoo.com', '', 'Baton Rouge', 'LA', '32', NULL, ''),
(46, 40, 'dani@hotmail.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Dani', NULL, 'Rodriguez', 'dani@hotmail.com', '1654 Brightside Dr Baton Rouge', 'Baton Rouge', 'LA', '70820', NULL, ''),
(47, 40, 'danielCaraba@hotmail.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Daniel', NULL, 'Caraballo', 'danielCaraba@hotmail.com', '1655 Brightside Dr Baton Rouge', 'Baton Rouge', 'LA', '70820', NULL, ''),
(48, 40, 'daniel@hotmail.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Daniel', NULL, 'Rodriguez', 'daniel@hotmail.com', '1656 Brightside Dr Baton Rouge', 'Baton Rouge', 'LA', '70820', NULL, ''),
(49, 40, 'DS@yahoo.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Denisse', NULL, 'Saenz', 'DS@yahoo.com', '1423 Burbank Dr Gonzales', 'Baton Rouge', 'LA', '5674', NULL, ''),
(50, 40, 'JD@yahoo.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Jose', NULL, 'Rodriguez', 'JD@yahoo.com', '4532 Nicholson Dr Baton Roug', 'Baton Rouge', 'LA', '70803', NULL, ''),
(61, 40, 'kt@yahoo.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Julia', NULL, 'Mata', 'kt@yahoo.com', '1423 Burbank Dr Gonzales', 'Baton Rouge', 'LA', '5674', NULL, ''),
(62, 40, 'Manuel', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Manuel', NULL, 'Caballero', '', '7896 Gonzales', 'Baton Rouge', 'LA', '5678', NULL, ''),
(63, 40, 'Mauortiz@hotmail.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Mauricio', NULL, 'Ortiz', 'Mauortiz@hotmail.com', '5432 Nicholson Dr Covington', 'Baton Rouge', 'LA', '6756', NULL, ''),
(70, 40, 'NS@gmail.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Nathalie', NULL, 'Stephano', 'NS@gmail.com', '6734 Corporate Baton Rouge', 'Baton Rouge', 'LA', '70801', NULL, ''),
(72, 40, 'Paula', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Paula', NULL, 'Smith', 'paula@yahoo.com', '7896 Lafayette', 'Baton Rouge', 'LA', '7085', NULL, ''),
(73, 40, 'SS@gmail.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Samuel', NULL, 'Stephano', 'SS@gmail.com', '6734 Corporate Baton Rouge', 'Baton Rouge', 'LA', '70801', NULL, ''),
(74, 40, 'st@hotmail.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Santi', NULL, 'Salas', 'st@hotmail.com', '5432 Nicholson Dr Covington', 'Baton Rouge', 'LA', '6756', NULL, ''),
(75, 40, 'stortiz@hotmail.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Santiago', NULL, 'Ortiz', 'stortiz@hotmail.com', '5432 Nicholson Dr Covington', 'Baton Rouge', 'LA', '67569', NULL, ''),
(76, 40, 'SRodriguez@yahoo.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Sebastian', NULL, 'Rodriguez', 'SRodriguez@yahoo.com', '', 'Baton Rouge', 'LA', '32', NULL, ''),
(77, 40, 'ST@gmail.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Sim', NULL, 'Thapa', 'ST@gmail.com', '6734 Corporate Baton Rouge', 'Baton Rouge', 'LA', '70801', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
CREATE TABLE IF NOT EXISTS `usertype` (
  `UserTypeID` int(11) NOT NULL DEFAULT 50,
  `UserTypeName` varchar(50) NOT NULL,
  `UserTypeDescription` text DEFAULT NULL,
  PRIMARY KEY (`UserTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`UserTypeID`, `UserTypeName`, `UserTypeDescription`) VALUES
(10, 'System Admin', NULL),
(20, 'Manager', NULL),
(30, 'Recruiter', NULL),
(40, 'Employee', NULL),
(50, 'Potential', NULL);

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
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`PostedBy`) REFERENCES `userlogin` (`UserID`),
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`CompanyID`) REFERENCES `company` (`CompanyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD CONSTRAINT `jobseeker_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `userlogin` (`UserID`);

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `userlogin` (`UserID`);

--
-- Constraints for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD CONSTRAINT `userlogin_ibfk_1` FOREIGN KEY (`UserTypeID`) REFERENCES `usertype` (`UserTypeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
