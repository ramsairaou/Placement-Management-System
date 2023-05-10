-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 05:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placement`
--

-- --------------------------------------------------------

--
-- Table structure for table `attends`
--

CREATE TABLE `attends` (
  `EID` varchar(50) NOT NULL,
  `SID` varchar(50) NOT NULL,
  `MARKS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attends`
--

INSERT INTO `attends` (`EID`, `SID`, `MARKS`) VALUES
('E001', 'S001', 40),
('E001', 'S003', 30),
('E002', 'S001', 50);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `CID` varchar(50) NOT NULL,
  `NAME` char(50) NOT NULL,
  `ADDRESS` varchar(50) NOT NULL,
  `PHONE` varchar(12) NOT NULL,
  `JOB_ROLE` char(50) NOT NULL,
  `PACKAGE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`CID`, `NAME`, `ADDRESS`, `PHONE`, `JOB_ROLE`, `PACKAGE`) VALUES
('C001', 'ORACLE', 'BENGALURU', '8041076000', 'CLOUD  DEVELOPMENT', '10LPA'),
('C002', 'GOOGLE', 'BENGALURU', '9448252722', 'DATA ANALYST', '20LPA'),
('C003', 'INFOSYS', 'MANGALURU', '8242451485', 'TECHNICAL LEAD', '10LPA'),
('C004', 'WIPRO', 'MYSURU', '8213983082', 'CHIEF ARCHITECT', '6LPA'),
('C005', 'COHESITY', 'MUMBAI', '8618103090', 'SRE', '22LPA');

--
-- Triggers `company`
--
DELIMITER $$
CREATE TRIGGER `com_phone` BEFORE INSERT ON `company` FOR EACH ROW BEGIN
IF (new.PHONE NOT REGEXP '^[0-9]{10}$')
THEN 
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT ="INVALID PHONE NUMBER LENGTH";
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `EID` varchar(50) NOT NULL,
  `DATE` date NOT NULL,
  `CID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`EID`, `DATE`, `CID`) VALUES
('E001', '2023-02-24', 'C001'),
('E002', '2023-02-27', 'C002'),
('E003', '2023-03-10', 'C003');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `sl.no` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`sl.no`, `username`, `password`) VALUES
(1, 'admin1', '1234'),
(2, 'admin2', '5678');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `SID` varchar(50) NOT NULL,
  `SNAME` char(50) NOT NULL,
  `SPHONE` varchar(12) DEFAULT NULL,
  `CLG_NAME` char(50) NOT NULL,
  `GPA` float NOT NULL,
  `TID` varchar(50) DEFAULT NULL,
  `CID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`SID`, `SNAME`, `SPHONE`, `CLG_NAME`, `GPA`, `TID`, `CID`) VALUES
('S001', 'ANUSHA', '9606091565', 'SCEM', 9, 'T001', 'C001'),
('S002', 'NIKHIL', '8105998129', 'SCEM', 8.5, 'T002', 'C002'),
('S003', 'PAVAN', '8318103090', 'SCEM', 8.9, NULL, NULL),
('S004', 'KEERTHI', '9686149776', 'SCEM', 8.2, 'T004', NULL),
('S005', 'SACHIN', '9980714090', 'SCEM', 10, NULL, 'C005');

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `Stu_gpa` BEFORE INSERT ON `student` FOR EACH ROW IF NEW.GPA< '5' THEN SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'Minimum Required Gpa is 5';
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `TID` varchar(50) NOT NULL,
  `TNAME` char(50) NOT NULL,
  `COURSE` varchar(50) NOT NULL,
  `TDURATION` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`TID`, `TNAME`, `COURSE`, `TDURATION`) VALUES
('T001', 'SURESH', 'CLOUD COMPUTING', '8 WEEKS'),
('T002', 'RAM', ' PYTHON', '5 WEEKS'),
('T003', 'JOSHUVA', 'C/C++', '10 WEEKS'),
('T004', 'LAVANYA', 'DJANGO', '8 WEEKS'),
('T005', 'ESTER', 'COMPUTER NETWOKS', '5 WEEKS'),
('T006', 'ZYAN', 'JAVA ', '6 WEEKS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attends`
--
ALTER TABLE `attends`
  ADD PRIMARY KEY (`EID`,`SID`),
  ADD KEY `SID` (`SID`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`EID`),
  ADD KEY `CID` (`CID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`sl.no`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`SID`),
  ADD KEY `student_ibfk_1` (`TID`),
  ADD KEY `student_ibfk_2` (`CID`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`TID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `sl.no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attends`
--
ALTER TABLE `attends`
  ADD CONSTRAINT `attends_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attends_ibfk_2` FOREIGN KEY (`EID`) REFERENCES `exam` (`EID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `company` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`TID`) REFERENCES `training` (`TID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`CID`) REFERENCES `company` (`CID`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
