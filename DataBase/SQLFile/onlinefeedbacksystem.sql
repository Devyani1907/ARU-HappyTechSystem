Create schema if not exists onlinefeedbacksystem;
-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 03:45 PM
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
  `IsDeleted` binary(1) DEFAULT NULL,
  `CreatedDateTime` timestamp NULL DEFAULT NULL,
  `ModifiedDateTime` timestamp NULL DEFAULT NULL,
  `Education` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `headersectiondetail`
--

CREATE TABLE `headersectiondetail` (
  `HeaderColumnID` int(11) NOT NULL,
  `HeaderColumnName` varchar(45) DEFAULT NULL,
  `TempateDetailId` int(11) DEFAULT NULL
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
  `IsDeleted` binary(1) DEFAULT NULL,
  `CreatedDateTime` timestamp NULL DEFAULT NULL,
  `ModifiedDateTime` timestamp NULL DEFAULT NULL,
  `Education` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Name` varchar(45) NOT NULL,
  `IsDeleted` binary(1) DEFAULT NULL,
  `CreatedDateTime` timestamp NULL DEFAULT NULL,
  `ModifiedDateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidatedetail`
--
ALTER TABLE `candidatedetail`
  ADD PRIMARY KEY (`CandidateID`),
  ADD KEY `CandidateToPostId_idx` (`PostId`),
  ADD KEY `CandidateToFeedbackId_idx` (`FeedbackId`);

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
  ADD KEY `EmployeeDetail_idx` (`EmployeId`),
  ADD KEY `CommentToCandidateDetaill_idx` (`CandidateId`),
  ADD KEY `CommentToHeaderScetion_idx` (`HeaderScectionId`);

--
-- Indexes for table `employeecandidatemapping`
--
ALTER TABLE `employeecandidatemapping`
  ADD KEY `CandidateIdMapping_idx` (`CandidateId`),
  ADD KEY `EmployeeIdMapping_idx` (`EmployeeId`);

--
-- Indexes for table `employeedetail`
--
ALTER TABLE `employeedetail`
  ADD PRIMARY KEY (`EmployeeId`),
  ADD KEY `EmployeeToRoleId_idx` (`RoleId`);

--
-- Indexes for table `headersectiondetail`
--
ALTER TABLE `headersectiondetail`
  ADD PRIMARY KEY (`HeaderColumnID`),
  ADD KEY `TemplateDetail_idx` (`TempateDetailId`);

--
-- Indexes for table `postdetail`
--
ALTER TABLE `postdetail`
  ADD PRIMARY KEY (`PostId`);

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
-- Constraints for dumped tables
--

--
-- Constraints for table `candidatedetail`
--
ALTER TABLE `candidatedetail`
  ADD CONSTRAINT `CandidateToFeedbackId` FOREIGN KEY (`FeedbackId`) REFERENCES `candidatefeedbackdetail` (`FeedbackId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CandidateToPostId` FOREIGN KEY (`PostId`) REFERENCES `postdetail` (`PostId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `commentdetail`
--
ALTER TABLE `commentdetail`
  ADD CONSTRAINT `CommentToCandidateDetaill` FOREIGN KEY (`CandidateId`) REFERENCES `candidatedetail` (`CandidateID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CommentToHeaderScetion` FOREIGN KEY (`HeaderScectionId`) REFERENCES `headersectiondetail` (`HeaderColumnID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `EmployeeDetail` FOREIGN KEY (`EmployeId`) REFERENCES `employeedetail` (`EmployeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employeecandidatemapping`
--
ALTER TABLE `employeecandidatemapping`
  ADD CONSTRAINT `CandidateIdMapping` FOREIGN KEY (`CandidateId`) REFERENCES `candidatedetail` (`CandidateID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `EmployeeIdMapping` FOREIGN KEY (`EmployeeId`) REFERENCES `employeedetail` (`EmployeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employeedetail`
--
ALTER TABLE `employeedetail`
  ADD CONSTRAINT `EmployeeToRoleId` FOREIGN KEY (`RoleId`) REFERENCES `roledetail` (`RoleId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `headersectiondetail`
--
ALTER TABLE `headersectiondetail`
  ADD CONSTRAINT `TemplateDetail` FOREIGN KEY (`TempateDetailId`) REFERENCES `templatedetail` (`TemplateId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
