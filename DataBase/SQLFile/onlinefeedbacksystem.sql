-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 10:33 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinefeedbacksystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidatedetail`
--

CREATE TABLE `candidatedetail` (
  `CandidateID` int(11) NOT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `CVPath` varchar(100) DEFAULT NULL,
  `PostId` int(11) DEFAULT NULL,
  `FeedbackId` int(11) DEFAULT NULL,
  `FeedbackFormNameInPDF` varchar(45) DEFAULT NULL,
  `IsFeedbackDone` binary(1) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `MobileNumber` varchar(20) DEFAULT NULL,
  `DateOfBirth` timestamp NULL DEFAULT NULL,
  `ExperienceInYears` double DEFAULT NULL,
  `CandidateCode` varchar(45) DEFAULT NULL,
  `IsDeleted` tinyint(4) DEFAULT NULL,
  `CreatedDateTime` timestamp NULL DEFAULT NULL,
  `ModifiedDateTime` timestamp NULL DEFAULT NULL,
  `Education` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidatedetail`
--

INSERT INTO `candidatedetail` (`CandidateID`, `FirstName`, `LastName`, `CVPath`, `PostId`, `FeedbackId`, `FeedbackFormNameInPDF`, `IsFeedbackDone`, `Email`, `Address`, `MobileNumber`, `DateOfBirth`, `ExperienceInYears`, `CandidateCode`, `IsDeleted`, `CreatedDateTime`, `ModifiedDateTime`, `Education`) VALUES
(0, 'Devyani', 'Pandey', 'C:\\xampp\\htdocs\\HappyTechSystem\\CV\\Devyani Resume UK.pdf', 1, NULL, NULL, NULL, 'devyani.r.pandey@gmail.com', 'Abhishek Flat', '232323232', '1996-10-28 00:00:00', 2, NULL, NULL, '2021-01-01 00:00:00', '0000-00-00 00:00:00', 'Master'),
(1, 'Hiren', 'Neema', 'C:\\xampp\\htdocs\\HappyTechSystem\\CV\\Devyani Resume UK.pdf', 1, NULL, NULL, NULL, 'devyani.r.pandey@gmail.com', 'D2 Abhishek', '3232232', '1996-10-28 00:00:00', 6, NULL, NULL, '2021-01-05 00:00:00', '0000-00-00 00:00:00', 'MCA');

-- --------------------------------------------------------

--
-- Table structure for table `candidatefeedbackdetail`
--

CREATE TABLE `candidatefeedbackdetail` (
  `FeedbackId` int(11) NOT NULL,
  `Content` text DEFAULT NULL,
  `IsPassed` binary(1) DEFAULT NULL,
  `IsDeleted` binary(1) DEFAULT NULL,
  `CreatedDateTime` timestamp NULL DEFAULT NULL,
  `ModifiedDateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `commentdetail`
--

CREATE TABLE `commentdetail` (
  `commentid` int(11) NOT NULL,
  `HeaderScectionId` int(11) DEFAULT NULL,
  `Comment` text DEFAULT NULL,
  `EmployeId` int(11) DEFAULT NULL,
  `CandidateId` int(11) DEFAULT NULL,
  `CreatedDate` timestamp NULL DEFAULT NULL,
  `ModifideDate` timestamp NULL DEFAULT NULL,
  `IdDeleted` binary(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentId` int(11) NOT NULL,
  `departmentName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentId`, `departmentName`) VALUES
(1, 'Accountant'),
(2, 'Manager'),
(3, 'Developer'),
(4, 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `employeecandidatemapping`
--

CREATE TABLE `employeecandidatemapping` (
  `EmployeeId` int(11) NOT NULL,
  `CandidateId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employeedetail`
--

CREATE TABLE `employeedetail` (
  `EmployeeId` int(11) NOT NULL,
  `EmployeeName` varchar(45) DEFAULT NULL,
  `EmployeeCode` int(11) DEFAULT NULL,
  `UserName` varchar(45) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `RoleId` int(11) DEFAULT NULL,
  `IsDeleted` binary(1) DEFAULT NULL,
  `CreatedDateTime` timestamp NULL DEFAULT NULL,
  `ModifiedDateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `postdetail`
--

CREATE TABLE `postdetail` (
  `PostId` int(11) NOT NULL,
  `PostName` varchar(45) DEFAULT NULL,
  `PostOpeningDateTime` timestamp NULL DEFAULT NULL,
  `PostClosingDateTime` timestamp NULL DEFAULT NULL,
  `VacancyAvail` int(11) DEFAULT NULL,
  `ExperienceInYears` double DEFAULT NULL,
  `IsDeleted` tinyint(4) DEFAULT NULL,
  `CreatedDateTime` timestamp NULL DEFAULT NULL,
  `ModifiedDateTime` timestamp NULL DEFAULT NULL,
  `Education` varchar(45) DEFAULT NULL,
  `departmentId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postdetail`
--

INSERT INTO `postdetail` (`PostId`, `PostName`, `PostOpeningDateTime`, `PostClosingDateTime`, `VacancyAvail`, `ExperienceInYears`, `IsDeleted`, `CreatedDateTime`, `ModifiedDateTime`, `Education`, `departmentId`) VALUES
(1, 'Software Develoer', '2020-10-28 00:00:00', '2021-06-05 00:00:00', 5, 2, 0, '2020-10-03 00:00:00', NULL, 'Master', 3),
(2, 'Senior accountant', '2020-10-28 00:00:00', '2021-06-05 00:00:00', 3, 1, 0, '2020-10-03 00:00:00', NULL, 'B COM', 1),
(3, 'Project Manager', '2020-10-28 00:00:00', '2021-06-05 00:00:00', 1, 5, 0, '2020-10-03 00:00:00', NULL, 'MBA', 2),
(4, 'Junior Developer', '2020-10-28 00:00:00', '2021-06-05 00:00:00', 5, 2, 0, '2020-10-03 00:00:00', NULL, 'Bachelor', 3),
(5, 'Senior Developer', '2020-10-28 00:00:00', '2021-06-05 00:00:00', 5, 2, 0, '2020-10-03 00:00:00', NULL, 'Master', 3);

-- --------------------------------------------------------

--
-- Table structure for table `roledetail`
--

CREATE TABLE `roledetail` (
  `RoleId` int(11) NOT NULL,
  `RoleName` varchar(45) DEFAULT NULL,
  `IsDeleted` binary(1) DEFAULT NULL,
  `CreatedDateTime` timestamp NULL DEFAULT NULL,
  `ModifiedDateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `templatedetail`
--

CREATE TABLE `templatedetail` (
  `TemplateId` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `IsDeleted` binary(1) DEFAULT '0',
  `CreatedDateTime` timestamp NULL DEFAULT NULL,
  `ModifiedDateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `templatedetail`
--

INSERT INTO `templatedetail` (`TemplateId`, `Name`, `IsDeleted`, `CreatedDateTime`, `ModifiedDateTime`) VALUES
(1, 'HR Feedback Template', NULL, '2021-03-15 23:02:36', NULL),
(2, 'Practical  Feedback Template', NULL, '2021-03-15 23:02:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `templatefieldsdetail`
--

CREATE TABLE `templatefieldsdetail` (
  `TemplatefieldId` int(11) NOT NULL,
  `TemplateLabel` varchar(45) DEFAULT NULL,
  `FieldType` varchar(45) DEFAULT 'Text',
  `SectionType` varchar(45) DEFAULT NULL,
  `TemplateDetailID` int(11) DEFAULT NULL,
  `TemplateLabelId` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `templatefieldsdetail`
--

INSERT INTO `templatefieldsdetail` (`TemplatefieldId`, `TemplateLabel`, `FieldType`, `SectionType`, `TemplateDetailID`, `TemplateLabelId`) VALUES
(1, 'CandidateName', 'Text', 'header', 1, 'CanNameId'),
(2, 'CandidateEmail', 'Text', 'header', 1, 'CanEmailId'),
(3, 'ExperienceComment', 'Text Area', 'body', 1, 'CanExpCommentId'),
(4, 'CandidateName', 'Text', 'header', 2, 'CanNameId'),
(5, 'CandidateEmail', 'Text', 'header', 2, 'CanEmailId'),
(6, 'PracticalExamComment', 'Text Area', 'body', 2, 'CanPracExamCommentId');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidatedetail`
--
ALTER TABLE `candidatedetail`
  ADD PRIMARY KEY (`CandidateID`),
  ADD KEY `CandidateToPost_idx` (`PostId`),
  ADD KEY `CandidateToCandidateFeedback_idx` (`FeedbackId`);

--
-- Indexes for table `candidatefeedbackdetail`
--
ALTER TABLE `candidatefeedbackdetail`
  ADD PRIMARY KEY (`FeedbackId`);

--
-- Indexes for table `commentdetail`
--
ALTER TABLE `commentdetail`
  ADD PRIMARY KEY (`commentid`),
  ADD KEY `CommentTOCandidate_idx` (`CandidateId`),
  ADD KEY `CommentToEmployee_idx` (`EmployeId`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentId`);

--
-- Indexes for table `employeecandidatemapping`
--
ALTER TABLE `employeecandidatemapping`
  ADD KEY `CandidateMapping_idx` (`CandidateId`),
  ADD KEY `EmployeeMapping_idx` (`EmployeeId`);

--
-- Indexes for table `employeedetail`
--
ALTER TABLE `employeedetail`
  ADD PRIMARY KEY (`EmployeeId`),
  ADD KEY `EmployeeToRole_idx` (`RoleId`);

--
-- Indexes for table `postdetail`
--
ALTER TABLE `postdetail`
  ADD PRIMARY KEY (`PostId`),
  ADD KEY `PostToDepartment_idx` (`departmentId`);

--
-- Indexes for table `roledetail`
--
ALTER TABLE `roledetail`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `templatedetail`
--
ALTER TABLE `templatedetail`
  ADD PRIMARY KEY (`TemplateId`);

--
-- Indexes for table `templatefieldsdetail`
--
ALTER TABLE `templatefieldsdetail`
  ADD PRIMARY KEY (`TemplatefieldId`),
  ADD KEY `HeaderSectionToTemplateDetail_idx` (`TemplateDetailID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidatedetail`
--
ALTER TABLE `candidatedetail`
  MODIFY `CandidateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candidatefeedbackdetail`
--
ALTER TABLE `candidatefeedbackdetail`
  MODIFY `FeedbackId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commentdetail`
--
ALTER TABLE `commentdetail`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employeedetail`
--
ALTER TABLE `employeedetail`
  MODIFY `EmployeeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postdetail`
--
ALTER TABLE `postdetail`
  MODIFY `PostId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roledetail`
--
ALTER TABLE `roledetail`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `templatedetail`
--
ALTER TABLE `templatedetail`
  MODIFY `TemplateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `templatefieldsdetail`
--
ALTER TABLE `templatefieldsdetail`
  MODIFY `TemplatefieldId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidatedetail`
--
ALTER TABLE `candidatedetail`
  ADD CONSTRAINT `CandidateToCandidateFeedback` FOREIGN KEY (`FeedbackId`) REFERENCES `candidatefeedbackdetail` (`FeedbackId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CandidateToPost` FOREIGN KEY (`PostId`) REFERENCES `postdetail` (`PostId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `commentdetail`
--
ALTER TABLE `commentdetail`
  ADD CONSTRAINT `CommentTOCandidate` FOREIGN KEY (`CandidateId`) REFERENCES `candidatedetail` (`CandidateID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CommentToEmployee` FOREIGN KEY (`EmployeId`) REFERENCES `employeedetail` (`EmployeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employeecandidatemapping`
--
ALTER TABLE `employeecandidatemapping`
  ADD CONSTRAINT `CandidateMapping` FOREIGN KEY (`CandidateId`) REFERENCES `candidatedetail` (`CandidateID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `EmployeeMapping` FOREIGN KEY (`EmployeeId`) REFERENCES `employeedetail` (`EmployeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employeedetail`
--
ALTER TABLE `employeedetail`
  ADD CONSTRAINT `EmployeeToRole` FOREIGN KEY (`RoleId`) REFERENCES `roledetail` (`RoleId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `postdetail`
--
ALTER TABLE `postdetail`
  ADD CONSTRAINT `PostToDepartment` FOREIGN KEY (`departmentId`) REFERENCES `department` (`departmentId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `templatefieldsdetail`
--
ALTER TABLE `templatefieldsdetail`
  ADD CONSTRAINT `HeaderSectionToTemplateDetail` FOREIGN KEY (`TemplateDetailID`) REFERENCES `templatedetail` (`TemplateId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
