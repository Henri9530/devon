-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 06:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `username`, `email`, `password`, `image`, `date_created`) VALUES
(1, 'Devon', 'Barangan', 'devon', 'devon@gmail.com', '123', '', '2024-10-09 06:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblcriteria`
--

CREATE TABLE `tblcriteria` (
  `criteria_id` int(11) NOT NULL,
  `criteria` varchar(255) NOT NULL,
  `order_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`department_id`, `department_name`) VALUES
(1, 'BSIT'),
(2, 'BSED (English)'),
(3, 'BSED (Math)'),
(4, 'BEED'),
(5, 'HTM'),
(6, 'BSCRIM');

-- --------------------------------------------------------

--
-- Table structure for table `tblevaluate`
--

CREATE TABLE `tblevaluate` (
  `evaluation_id` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblevaluateanswer`
--

CREATE TABLE `tblevaluateanswer` (
  `evaluation_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblquestion`
--

CREATE TABLE `tblquestion` (
  `question_id` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `order_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblrestriction`
--

CREATE TABLE `tblrestriction` (
  `restriction_id` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblschoolyear`
--

CREATE TABLE `tblschoolyear` (
  `school_year_id` int(11) NOT NULL,
  `annual_year` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `is_default` int(11) NOT NULL,
  `is_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `student_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `year` int(1) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `teacher_count` int(11) NOT NULL,
  `is_done` int(2) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`student_id`, `school_id`, `fname`, `lname`, `email`, `password`, `department_id`, `year`, `subject`, `section`, `image`, `teacher_count`, `is_done`, `date_created`) VALUES
(1, 1234567, 'Henri', 'Mendoza', 'henri@gmail.com', '123', 1, 4, '', '1', '', 0, 0, '2024-10-09 06:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `tblteacher`
--

CREATE TABLE `tblteacher` (
  `teacher_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tblcriteria`
--
ALTER TABLE `tblcriteria`
  ADD PRIMARY KEY (`criteria_id`),
  ADD UNIQUE KEY `criteria` (`criteria`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `tblevaluate`
--
ALTER TABLE `tblevaluate`
  ADD PRIMARY KEY (`evaluation_id`),
  ADD KEY `school_year_id` (`school_year_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `tblevaluateanswer`
--
ALTER TABLE `tblevaluateanswer`
  ADD KEY `evaluation_id` (`evaluation_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `tblquestion`
--
ALTER TABLE `tblquestion`
  ADD PRIMARY KEY (`question_id`),
  ADD UNIQUE KEY `question` (`question`),
  ADD KEY `school_year_id` (`school_year_id`),
  ADD KEY `criteria_id` (`criteria_id`);

--
-- Indexes for table `tblrestriction`
--
ALTER TABLE `tblrestriction`
  ADD PRIMARY KEY (`restriction_id`),
  ADD KEY `school_year_id` (`school_year_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tblschoolyear`
--
ALTER TABLE `tblschoolyear`
  ADD PRIMARY KEY (`school_year_id`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `school_id` (`school_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `tblteacher`
--
ALTER TABLE `tblteacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `department_id` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcriteria`
--
ALTER TABLE `tblcriteria`
  MODIFY `criteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblevaluate`
--
ALTER TABLE `tblevaluate`
  MODIFY `evaluation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblquestion`
--
ALTER TABLE `tblquestion`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tblrestriction`
--
ALTER TABLE `tblrestriction`
  MODIFY `restriction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblschoolyear`
--
ALTER TABLE `tblschoolyear`
  MODIFY `school_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblteacher`
--
ALTER TABLE `tblteacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblevaluate`
--
ALTER TABLE `tblevaluate`
  ADD CONSTRAINT `tblevaluate_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `tblteacher` (`teacher_id`),
  ADD CONSTRAINT `tblevaluate_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `tblstudent` (`student_id`),
  ADD CONSTRAINT `tblevaluate_ibfk_3` FOREIGN KEY (`school_year_id`) REFERENCES `tblschoolyear` (`school_year_id`);

--
-- Constraints for table `tblevaluateanswer`
--
ALTER TABLE `tblevaluateanswer`
  ADD CONSTRAINT `tblevaluateanswer_ibfk_1` FOREIGN KEY (`evaluation_id`) REFERENCES `tblevaluate` (`evaluation_id`),
  ADD CONSTRAINT `tblevaluateanswer_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `tblquestion` (`question_id`);

--
-- Constraints for table `tblquestion`
--
ALTER TABLE `tblquestion`
  ADD CONSTRAINT `tblquestion_ibfk_1` FOREIGN KEY (`school_year_id`) REFERENCES `tblschoolyear` (`school_year_id`),
  ADD CONSTRAINT `tblquestion_ibfk_2` FOREIGN KEY (`criteria_id`) REFERENCES `tblcriteria` (`criteria_id`);

--
-- Constraints for table `tblrestriction`
--
ALTER TABLE `tblrestriction`
  ADD CONSTRAINT `tblrestriction_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `tblteacher` (`teacher_id`),
  ADD CONSTRAINT `tblrestriction_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `tblstudent` (`student_id`),
  ADD CONSTRAINT `tblrestriction_ibfk_3` FOREIGN KEY (`school_year_id`) REFERENCES `tblschoolyear` (`school_year_id`);

--
-- Constraints for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD CONSTRAINT `tblstudent_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `tbldepartment` (`department_id`);

--
-- Constraints for table `tblteacher`
--
ALTER TABLE `tblteacher`
  ADD CONSTRAINT `tblteacher_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `tbldepartment` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
