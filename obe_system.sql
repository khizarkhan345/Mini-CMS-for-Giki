-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2019 at 09:36 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obe system`
--

-- --------------------------------------------------------

--
-- Table structure for table `controller_of_examination`
--

CREATE TABLE `controller_of_examination` (
  `Emp_id` varchar(10) NOT NULL,
  `Emp_name` varchar(50) NOT NULL,
  `Emp_rank` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `controller_of_examination`
--

INSERT INTO `controller_of_examination` (`Emp_id`, `Emp_name`, `Emp_rank`) VALUES
('emp121', 'Niaz Ahmad', 'Director'),
('emp122', 'Khizar Hayat khan', 'Pro Rector'),
('emp123', 'Muhammad shahab', 'Rector');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `C_id` varchar(10) NOT NULL,
  `C_name` varchar(100) NOT NULL,
  `Cr_hrs` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`C_id`, `C_name`, `Cr_hrs`) VALUES
('CH101', 'Chemistry for engineers', 2),
('cs101', 'introduction to computer programming', 2),
('cs101l', 'introduction to computer programming Lab', 1),
('cs221', 'Data structure and algorithm', 3),
('cs231', 'Discrete mathematics', 3),
('ME101', 'Workshop', 1),
('MT101', 'Calculus-I ', 3),
('PH101', 'Mechanics', 3),
('PH101l', 'Mechanics lab', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_activities`
--

CREATE TABLE `course_activities` (
  `Inst_id` varchar(10) NOT NULL,
  `C_id` varchar(10) NOT NULL,
  `Assignment_%` int(5) DEFAULT '0',
  `Quizes_%` int(5) NOT NULL DEFAULT '0',
  `Mid_%` int(5) NOT NULL DEFAULT '0',
  `Final_%` int(5) NOT NULL,
  `Project_%` int(5) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_activities_record`
--

CREATE TABLE `course_activities_record` (
  `Inst_id` varchar(10) NOT NULL,
  `C_id` varchar(10) NOT NULL,
  `Reg_no` int(10) NOT NULL,
  `Assignment_%` int(5) DEFAULT '0',
  `Quizes_%` int(5) NOT NULL,
  `Mid_%` int(5) NOT NULL,
  `Final_%` int(5) NOT NULL,
  `Project_%` int(5) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_clo's`
--

CREATE TABLE `course_clo's` (
  `Clo_name` varchar(5) NOT NULL,
  `C_id` varchar(10) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_offering`
--

CREATE TABLE `course_offering` (
  `Dept_id` varchar(10) NOT NULL,
  `Prog_id` varchar(10) NOT NULL,
  `Emp_id` varchar(10) NOT NULL,
  `C_id` varchar(10) NOT NULL,
  `Inst_id` varchar(10) NOT NULL,
  `Semester` int(5) NOT NULL,
  `Year` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_offering`
--

INSERT INTO `course_offering` (`Dept_id`, `Prog_id`, `Emp_id`, `C_id`, `Inst_id`, `Semester`, `Year`) VALUES
('FCSE', 'BCE', 'emp123', 'CH101', 'ist121', 4, 2019),
('FCSE', 'BCE', 'emp123', 'cs101', 'ist121', 4, 2019),
('FES', 'BCE', 'emp123', 'cs231', 'ist121', 1, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `course_prerequisite`
--

CREATE TABLE `course_prerequisite` (
  `C_id` varchar(10) NOT NULL,
  `Pre_requisite` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `degree_plane`
--

CREATE TABLE `degree_plane` (
  `Dept_id` varchar(10) NOT NULL,
  `Prog_id` varchar(10) NOT NULL,
  `C_id` varchar(10) NOT NULL,
  `Semester` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dept_id` varchar(10) NOT NULL,
  `Dept_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dept_id`, `Dept_name`) VALUES
('FCSE', 'Faculty of Computer Science and Engineering'),
('FCV', 'Faculty of Civil Engineering '),
('FEE', 'Faculty of Electrical Engineering'),
('FES', 'Faculty of Engineering Sciences'),
('FMCE', 'Faculty of Materials Science & Chemical Engineering '),
('FME', 'Faculty of Mechanical Engineering'),
('MGS', 'Department of Management Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `department_login`
--

CREATE TABLE `department_login` (
  `username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Dept_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `examination_login`
--

CREATE TABLE `examination_login` (
  `Emp_id` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examination_login`
--

INSERT INTO `examination_login` (`Emp_id`, `username`, `Password`) VALUES
('emp123', 'shahab', '123');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `Inst_id` varchar(10) NOT NULL,
  `Inst_name` varchar(50) NOT NULL,
  `Highest_degree` int(10) NOT NULL,
  `DOJ` date NOT NULL,
  `Rank` varchar(20) NOT NULL,
  `Dept_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`Inst_id`, `Inst_name`, `Highest_degree`, `DOJ`, `Rank`, `Dept_id`) VALUES
('ist121', 'Dr. Fawad Hussain', 20, '2019-12-11', 'Associate Professor ', 'FCSE');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_login`
--

CREATE TABLE `instructor_login` (
  `Inst_id` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manage_plo's`
--

CREATE TABLE `manage_plo's` (
  `Dept_id` varchar(10) NOT NULL,
  `Prog_id` varchar(10) NOT NULL,
  `P_name` varchar(5) NOT NULL,
  `C_id` varchar(10) NOT NULL,
  `Clo_name` varchar(5) NOT NULL,
  `Assigned_%` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mange_clo's`
--

CREATE TABLE `mange_clo's` (
  `C_id` varchar(10) NOT NULL,
  `Inst_id` varchar(10) NOT NULL,
  `Clo_name` varchar(5) NOT NULL,
  `Assignment_%` int(5) DEFAULT '0',
  `Quizes_%` int(5) DEFAULT '0',
  `Mid_%` int(5) DEFAULT '0',
  `Final_%` int(5) DEFAULT '0',
  `Project_%` int(5) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plos`
--

CREATE TABLE `plos` (
  `P_name` varchar(5) NOT NULL,
  `Prog_id` varchar(10) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plos`
--

INSERT INTO `plos` (`P_name`, `Prog_id`, `Description`) VALUES
('', 'BCE', ''),
('PLO1', 'BCE', 'abc									 \r\n									 '),
('PLO2', 'BCE', '	Must be able to work individually and both in a team. Must be a team player. Must be a critical thi'),
('stude', 'BCE', '									 mandatory for every student  \r\n									 ');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `Prog_id` varchar(10) NOT NULL,
  `Dept_id` varchar(10) NOT NULL,
  `Prog_name` varchar(100) NOT NULL,
  `No_of_semesters` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`Prog_id`, `Dept_id`, `Prog_name`, `No_of_semesters`) VALUES
('BCE', 'FCSE', 'Bachelor of Computer engineering', 8),
('BCS', 'FCSE', 'Bachelor of Computer Science', 0),
('BEE', 'FEE', 'Bachelor of Electronic Engineering', 0),
('BEP', 'FEE', 'Bachelor of Power Engineering', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Reg_no` int(10) NOT NULL,
  `Prog_id` varchar(10) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Reg_no`, `Prog_id`, `student_name`, `DOB`) VALUES
(2016194, 'BCE', 'Khizar Hayat', '1998-08-18'),
(2016353, 'BCE', 'Muhammad Shahab', '1999-03-05'),
(2016387, 'BCE', 'Niaz Ahmad', '1997-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `student_clo_record`
--

CREATE TABLE `student_clo_record` (
  `Reg_no` int(10) NOT NULL,
  `C_id` varchar(10) NOT NULL,
  `Clo_name` varchar(5) NOT NULL,
  `Obtained_%` int(5) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_plo_record`
--

CREATE TABLE `student_plo_record` (
  `Reg_no` int(10) NOT NULL,
  `P_name` varchar(5) NOT NULL,
  `obtained_%` varchar(5) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_plo_record`
--

INSERT INTO `student_plo_record` (`Reg_no`, `P_name`, `obtained_%`, `Status`) VALUES
(2016194, 'PLO1', '98', 'Pass'),
(2016194, 'PLO2', '98', 'Pass'),
(2016353, 'PLO1', '99', 'Pass'),
(2016353, 'PLO2', '99', 'Pass'),
(2016387, 'PLO1', '97', 'Pass'),
(2016387, 'PLO2', '97', 'Pass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `controller_of_examination`
--
ALTER TABLE `controller_of_examination`
  ADD PRIMARY KEY (`Emp_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`C_id`);

--
-- Indexes for table `course_activities`
--
ALTER TABLE `course_activities`
  ADD PRIMARY KEY (`Inst_id`,`C_id`),
  ADD KEY `C_id` (`C_id`);

--
-- Indexes for table `course_activities_record`
--
ALTER TABLE `course_activities_record`
  ADD PRIMARY KEY (`Inst_id`,`C_id`,`Reg_no`),
  ADD KEY `C_id` (`C_id`),
  ADD KEY `Reg_no` (`Reg_no`);

--
-- Indexes for table `course_clo's`
--
ALTER TABLE `course_clo's`
  ADD PRIMARY KEY (`Clo_name`,`C_id`),
  ADD KEY `C_id` (`C_id`);

--
-- Indexes for table `course_offering`
--
ALTER TABLE `course_offering`
  ADD PRIMARY KEY (`Dept_id`,`Prog_id`,`Emp_id`,`C_id`,`Inst_id`),
  ADD KEY `Prog_id` (`Prog_id`),
  ADD KEY `C_id` (`C_id`),
  ADD KEY `Inst_id` (`Inst_id`),
  ADD KEY `Emp_id` (`Emp_id`);

--
-- Indexes for table `course_prerequisite`
--
ALTER TABLE `course_prerequisite`
  ADD PRIMARY KEY (`C_id`,`Pre_requisite`);

--
-- Indexes for table `degree_plane`
--
ALTER TABLE `degree_plane`
  ADD PRIMARY KEY (`Dept_id`,`Prog_id`,`C_id`),
  ADD KEY `Prog_id` (`Prog_id`),
  ADD KEY `C_id` (`C_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dept_id`);

--
-- Indexes for table `department_login`
--
ALTER TABLE `department_login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `Dept_id` (`Dept_id`);

--
-- Indexes for table `examination_login`
--
ALTER TABLE `examination_login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `Emp_id` (`Emp_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`Inst_id`),
  ADD KEY `Dept_id` (`Dept_id`);

--
-- Indexes for table `instructor_login`
--
ALTER TABLE `instructor_login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `Inst_id` (`Inst_id`);

--
-- Indexes for table `manage_plo's`
--
ALTER TABLE `manage_plo's`
  ADD PRIMARY KEY (`Dept_id`,`Prog_id`,`P_name`,`C_id`,`Clo_name`),
  ADD KEY `Prog_id` (`Prog_id`),
  ADD KEY `P_name` (`P_name`),
  ADD KEY `manage_plo's_ibfk_4` (`C_id`),
  ADD KEY `Clo_name` (`Clo_name`);

--
-- Indexes for table `mange_clo's`
--
ALTER TABLE `mange_clo's`
  ADD PRIMARY KEY (`C_id`,`Inst_id`,`Clo_name`),
  ADD KEY `Inst_id` (`Inst_id`),
  ADD KEY `Clo_name` (`Clo_name`);

--
-- Indexes for table `plos`
--
ALTER TABLE `plos`
  ADD PRIMARY KEY (`P_name`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`Prog_id`),
  ADD KEY `Dept_id` (`Dept_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Reg_no`),
  ADD KEY `Prog_id` (`Prog_id`);

--
-- Indexes for table `student_clo_record`
--
ALTER TABLE `student_clo_record`
  ADD PRIMARY KEY (`Reg_no`,`C_id`,`Clo_name`),
  ADD KEY `student_clo_record_ibfk_2` (`C_id`),
  ADD KEY `Clo_name` (`Clo_name`);

--
-- Indexes for table `student_plo_record`
--
ALTER TABLE `student_plo_record`
  ADD PRIMARY KEY (`Reg_no`,`P_name`),
  ADD KEY `P_name` (`P_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_activities`
--
ALTER TABLE `course_activities`
  ADD CONSTRAINT `course_activities_ibfk_1` FOREIGN KEY (`Inst_id`) REFERENCES `instructor` (`Inst_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `course_activities_ibfk_2` FOREIGN KEY (`C_id`) REFERENCES `courses` (`C_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_activities_record`
--
ALTER TABLE `course_activities_record`
  ADD CONSTRAINT `course_activities_record_ibfk_1` FOREIGN KEY (`Inst_id`) REFERENCES `instructor` (`Inst_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `course_activities_record_ibfk_2` FOREIGN KEY (`C_id`) REFERENCES `courses` (`C_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `course_activities_record_ibfk_3` FOREIGN KEY (`Reg_no`) REFERENCES `student` (`Reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_clo's`
--
ALTER TABLE `course_clo's`
  ADD CONSTRAINT `course_clo's_ibfk_1` FOREIGN KEY (`C_id`) REFERENCES `courses` (`C_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_offering`
--
ALTER TABLE `course_offering`
  ADD CONSTRAINT `course_offering_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_offering_ibfk_2` FOREIGN KEY (`Prog_id`) REFERENCES `program` (`Prog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_offering_ibfk_3` FOREIGN KEY (`C_id`) REFERENCES `courses` (`C_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_offering_ibfk_4` FOREIGN KEY (`Inst_id`) REFERENCES `instructor` (`Inst_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `course_offering_ibfk_5` FOREIGN KEY (`Emp_id`) REFERENCES `controller_of_examination` (`Emp_id`) ON UPDATE CASCADE;

--
-- Constraints for table `course_prerequisite`
--
ALTER TABLE `course_prerequisite`
  ADD CONSTRAINT `course_prerequisite_ibfk_1` FOREIGN KEY (`C_id`) REFERENCES `courses` (`C_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `degree_plane`
--
ALTER TABLE `degree_plane`
  ADD CONSTRAINT `degree_plane_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `degree_plane_ibfk_2` FOREIGN KEY (`Prog_id`) REFERENCES `program` (`Prog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `degree_plane_ibfk_3` FOREIGN KEY (`C_id`) REFERENCES `courses` (`C_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department_login`
--
ALTER TABLE `department_login`
  ADD CONSTRAINT `department_login_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `examination_login`
--
ALTER TABLE `examination_login`
  ADD CONSTRAINT `examination_login_ibfk_1` FOREIGN KEY (`Emp_id`) REFERENCES `controller_of_examination` (`Emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`) ON UPDATE CASCADE;

--
-- Constraints for table `instructor_login`
--
ALTER TABLE `instructor_login`
  ADD CONSTRAINT `instructor_login_ibfk_1` FOREIGN KEY (`Inst_id`) REFERENCES `instructor` (`Inst_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manage_plo's`
--
ALTER TABLE `manage_plo's`
  ADD CONSTRAINT `manage_plo's_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manage_plo's_ibfk_2` FOREIGN KEY (`Prog_id`) REFERENCES `program` (`Prog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manage_plo's_ibfk_3` FOREIGN KEY (`P_name`) REFERENCES `plos` (`P_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manage_plo's_ibfk_4` FOREIGN KEY (`C_id`) REFERENCES `course_clo's` (`C_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manage_plo's_ibfk_5` FOREIGN KEY (`Clo_name`) REFERENCES `course_clo's` (`Clo_name`) ON UPDATE CASCADE;

--
-- Constraints for table `mange_clo's`
--
ALTER TABLE `mange_clo's`
  ADD CONSTRAINT `mange_clo's_ibfk_1` FOREIGN KEY (`C_id`) REFERENCES `course_clo's` (`C_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mange_clo's_ibfk_2` FOREIGN KEY (`Inst_id`) REFERENCES `instructor` (`Inst_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mange_clo's_ibfk_3` FOREIGN KEY (`Clo_name`) REFERENCES `course_clo's` (`Clo_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Prog_id`) REFERENCES `program` (`Prog_id`) ON UPDATE CASCADE;

--
-- Constraints for table `student_clo_record`
--
ALTER TABLE `student_clo_record`
  ADD CONSTRAINT `student_clo_record_ibfk_1` FOREIGN KEY (`Reg_no`) REFERENCES `student` (`Reg_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_clo_record_ibfk_2` FOREIGN KEY (`C_id`) REFERENCES `course_clo's` (`C_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `student_clo_record_ibfk_3` FOREIGN KEY (`Clo_name`) REFERENCES `course_clo's` (`Clo_name`) ON UPDATE CASCADE;

--
-- Constraints for table `student_plo_record`
--
ALTER TABLE `student_plo_record`
  ADD CONSTRAINT `student_plo_record_ibfk_1` FOREIGN KEY (`Reg_no`) REFERENCES `student` (`Reg_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_plo_record_ibfk_2` FOREIGN KEY (`P_name`) REFERENCES `plos` (`P_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
