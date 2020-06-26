-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 09:06 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Phone_Number` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profilePicture` text DEFAULT NULL,
  `AdminId` varchar(50) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `Phone_Number`, `gender`, `dob`, `password`, `profilePicture`, `AdminId`, `reg_date`) VALUES
(1, 'Oluokun kabir adesina', 'oka@vb.com', '', '', '', 'village', 'Admin Profile Pictures/Oluokun kabir adesina (2020-06-12-11-06-11).jpg', 'oka', '2020-06-12 21:33:11'),
(2, 'Adesina kabir Oluokun', 'oakadesina@admin.oic.org', '12345454', '', '2020-06-03', 'village', 'Admin Profile Pictures/Adesina kabir Oluokun (2020-06-17-12-06-37).jpg', 'c81e728d9d4c2f636f067f89cc14862c', '2020-06-17 10:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(6) NOT NULL,
  `CourseCode` varchar(255) NOT NULL,
  `CourseUnit` varchar(255) NOT NULL,
  `CourseTitle` varchar(255) NOT NULL,
  `CourseDesc` varchar(255) NOT NULL,
  `CourseLevel` varchar(100) NOT NULL,
  `CourseCategory` varchar(100) NOT NULL,
  `logo` text NOT NULL,
  `CourseId` varchar(50) NOT NULL,
  `courseReg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `CourseCode`, `CourseUnit`, `CourseTitle`, `CourseDesc`, `CourseLevel`, `CourseCategory`, `logo`, `CourseId`, `courseReg_date`) VALUES
(1, 'CNT102', '3', 'Computer Networking', 'networking', '100', 'Computer Science and Engineering', '', 'c4ca4238a0b923820dcc509a6f75849b', '2020-06-12 22:22:55'),
(2, 'CSE100', '2', 'Introduction to Programming', 'Introduction to programming language', '100', 'Computer Science and Engineering', '', 'c81e728d9d4c2f636f067f89cc14862c', '2020-06-13 10:43:46'),
(3, 'JSP301', '2', 'Introduction to Javascript', 'Dynamic website with php', '200', 'Computer Science and Engineering', '', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '2020-06-16 00:18:29'),
(4, 'BSP101', '2', 'Introduction to Boostrap', 'Design the interface', '100', 'Computer Science and Engineering', '', 'a87ff679a2f3e71d9181a67b7542122c', '2020-06-16 00:19:40'),
(5, 'SQL102', '2', 'SQL injection', 'introduction to database', '100', 'Cyber Security', '', 'e4da3b7fbbce2345d7772b0674a318d5', '2020-06-19 15:15:58'),
(6, 'DAT103', '3', 'Data management', 'data management', '100', 'Cyber Security', '', '1679091c5a880faf6fb5e6087eb1b2dc', '2020-06-19 15:17:21'),
(7, 'JAV201', '2', 'Java Programming', 'Introduction to java', '200', 'Computer Science and Engineering', '', '8f14e45fceea167a5a36dedd4bea2543', '2020-06-25 05:19:15'),
(8, 'HTS301', '2', 'Hearth System', 'hearth system', '300', 'medicine', '', 'c9f0f895fb98ab9159f51fd0297e236d', '2020-06-25 15:06:04'),
(9, 'BOT301', '4', 'Botanay', 'botany', '300', 'medicine', '', '45c48cce2e2d7fbdea1afc51c7c6ad26', '2020-06-25 15:07:16'),
(10, 'psy302', '8', 'physilogy', 'physiotherapy', '300', 'medicine', '', 'd3d9446802a44259755d38e6d163e820', '2020-06-25 15:09:38'),
(11, 'med307', '6', 'medioscience', 'medical laboratory sciences', '300', 'medicine', '', '6512bd43d9caa6e02c990b0a82652dca', '2020-06-25 15:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hod` varchar(255) NOT NULL,
  `FacultyCategory` varchar(255) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `DepartmentId` varchar(50) NOT NULL,
  `DepartmentReg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `hod`, `FacultyCategory`, `logo`, `DepartmentId`, `DepartmentReg_date`) VALUES
(1, 'Computer Science and Engineering', 'K A Adesina', 'Engineering', '', 'c4ca4238a0b923820dcc509a6f75849b', '2020-06-12 22:18:29'),
(2, 'Cyber Security', 'kabir', 'Engineering', '', 'c81e728d9d4c2f636f067f89cc14862c', '2020-06-13 13:46:51'),
(3, 'Information And Technology', 'Adesina the Village Boy', 'Engineering', '', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '2020-06-16 00:16:45'),
(4, 'medicine', 'prof mrs adebisi r', 'Medical Science', '', 'a87ff679a2f3e71d9181a67b7542122c', '2020-06-25 09:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dean` varchar(255) NOT NULL,
  `logo` text NOT NULL,
  `facultyId` varchar(50) NOT NULL,
  `FacultyReg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `dean`, `logo`, `facultyId`, `FacultyReg_date`) VALUES
(1, 'Engineering', 'Kabir Adesina', '', 'c4ca4238a0b923820dcc509a6f75849b', '2020-06-12 22:14:22'),
(2, 'Medical Science', 'Adesina', '', 'c81e728d9d4c2f636f067f89cc14862c', '2020-06-13 13:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `registeredcourse`
--

CREATE TABLE `registeredcourse` (
  `id` int(6) NOT NULL,
  `student` varchar(255) NOT NULL,
  `studentId` varchar(50) NOT NULL,
  `matricNo` varchar(50) NOT NULL,
  `courseTitle` text NOT NULL,
  `courseUnit` varchar(255) NOT NULL,
  `courseCode` varchar(255) NOT NULL,
  `courseId` text NOT NULL,
  `level` varchar(10) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `courseRegId` varchar(40) NOT NULL,
  `scores` varchar(100) NOT NULL,
  `grades` varchar(100) NOT NULL,
  `cgpa` varchar(4) NOT NULL,
  `points` varchar(100) NOT NULL,
  `totalunitpoint` varchar(100) NOT NULL,
  `class` varchar(20) NOT NULL,
  `CourseReg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registeredcourse`
--

INSERT INTO `registeredcourse` (`id`, `student`, `studentId`, `matricNo`, `courseTitle`, `courseUnit`, `courseCode`, `courseId`, `level`, `semester`, `department`, `courseRegId`, `scores`, `grades`, `cgpa`, `points`, `totalunitpoint`, `class`, `CourseReg_date`) VALUES
(1, 'VILLAGE KABIR ADESINA', 'c4ca4238a0b923820dcc509a6f75849b', '200000', 'Computer Networking,Introduction to Programming', '3,2', 'CNT102,CSE100', 'c4ca4238a0b923820dcc509a6f75849b,c81e728d9d4c2f636f067f89cc14862c', '100', 'Rain Semester', 'Computer Science and Engineering', 'c4ca4238a0b923820dcc509a6f75849b', '75,77', 'A,A', '5', '5,5', '15,10', 'FIRST CLASS', '2020-06-23 19:11:46'),
(2, 'OLUOKUN KABIR ADESINA', 'c81e728d9d4c2f636f067f89cc14862c', '200001', 'Computer Networking,Introduction to Programming,Introduction to Boostrap', '3,2,2', 'CNT102,CSE100,BSP101', 'c4ca4238a0b923820dcc509a6f75849b,c81e728d9d4c2f636f067f89cc14862c,a87ff679a2f3e71d9181a67b7542122c', '100', 'Rain Semester', 'Computer Science and Engineering', 'c81e728d9d4c2f636f067f89cc14862c', '72,65,47', 'A,B,D', '3.85', '5,4,2', '15,8,4', 'SECOND CLASS UPPER', '2020-06-25 08:56:50'),
(3, 'VILLAGE KABIR ADESINA', 'c4ca4238a0b923820dcc509a6f75849b', '200000', 'Introduction to Javascript,Java Programming', '2,2', 'JSP301,JAV201', 'eccbc87e4b5ce2fe28308fd9f2a7baf3,8f14e45fceea167a5a36dedd4bea2543', '200', 'Rain Semester', 'Computer Science and Engineering', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '50,61', 'C,B', '3.5', '3,4', '6,8', 'SECOND CLASS UPPER', '2020-06-25 08:58:54'),
(4, 'ADEBISI ABOSEDE RACHEAL', '1679091c5a880faf6fb5e6087eb1b2dc', '200005', 'Hearth System,Botanay,physilogy,medioscience', '2,4,8,6', 'HTS301,BOT301,psy302,med307', 'c9f0f895fb98ab9159f51fd0297e236d,45c48cce2e2d7fbdea1afc51c7c6ad26,d3d9446802a44259755d38e6d163e820,6512bd43d9caa6e02c990b0a82652dca', '300', 'Harmattan Semester', 'medicine', 'a87ff679a2f3e71d9181a67b7542122c', '95,81,55,60', 'A,A,C,B', '3.9', '5,5,3,4', '10,20,24,24', 'SECOND CLASS UPPER', '2020-06-25 15:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(6) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Phone_Number` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `CourseTaken` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `profilePicture` text NOT NULL,
  `StaffId` varchar(50) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `Phone_Number`, `password`, `CourseTaken`, `category`, `faculty`, `state`, `city`, `address`, `gender`, `dob`, `profilePicture`, `StaffId`, `reg_date`) VALUES
(1, 'KABIR,ADESINA,VILLAGE', 'kavadesina@staff.oic.org', '12343442', 'village', 'Data management', 'Cyber Security', 'Engineering', '', 'Osogbo Oroki', '', 'Female', '2020-06-10', '../staff/Staff Profile Pictures/VILLAGE,KABIR,ADESINA (2020-06-23-07-06-40).jpg', 'c4ca4238a0b923820dcc509a6f75849b', '2020-06-23 17:52:40'),
(2, 'ADEMOLA,OLUWAYEMI,TAIWO', 'aotoluwayemi@staff.oic.org', '234334354', 'village', 'Introduction to Programming', 'Computer Science and Engineering', 'Engineering', '', '', '', 'Male', '2020-06-07', '../staff/Staff Profile Pictures/OLUWAYEMI,TAIWO,ADEMOLA (2020-06-17-10-06-28).jpg', 'c81e728d9d4c2f636f067f89cc14862c', '2020-06-18 18:32:30'),
(3, 'village,boy,kabir', 'vbkboy@staff.oic.org', '23434323', 'village', '', '', '', '', '', '', '', '2020-06-07', '', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '2020-06-17 09:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(6) NOT NULL,
  `SurName` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Phone_Number` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Level` varchar(50) NOT NULL,
  `matricNo` varchar(10) NOT NULL,
  `CurrentSemester` varchar(30) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Faculty` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `profilePicture` text NOT NULL,
  `NextOfKin` varchar(100) NOT NULL,
  `CGPA` varchar(5) NOT NULL,
  `class` varchar(50) NOT NULL,
  `StudentId` varchar(50) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `SurName`, `FirstName`, `LastName`, `email`, `Phone_Number`, `password`, `Level`, `matricNo`, `CurrentSemester`, `Department`, `Faculty`, `state`, `city`, `Address`, `dob`, `gender`, `profilePicture`, `NextOfKin`, `CGPA`, `class`, `StudentId`, `reg_date`) VALUES
(1, 'village', 'Kabir', 'Adesina', 'vkakabir@student.oic.org', '12345678', 'village', '200', '200000', 'Rain Semester', 'Computer Science and Engineering', 'Engineering', '', '', '', '', '', '../student/Student Profile Pictures/VILLAGE KABIR ADESINA (2020-06-13-12-06-59).jpg', '', '4.333', 'SECOND CLASS UPPER', 'c4ca4238a0b923820dcc509a6f75849b', '2020-06-25 08:58:54'),
(2, 'Oluokun', 'Kabir', 'Adesina', 'okakabir@student.oic.org', '123456781', 'village', '100', '200001', 'Rain Semester', 'Computer Science and Engineering', 'Engineering', '', '', '', '', '', 'Student Profile Pictures/OLUOKUN KABIR ADESINA (2020-06-16-07-06-54).jpg', '', '3.857', 'SECOND CLASS UPPER', 'c81e728d9d4c2f636f067f89cc14862c', '2020-06-25 08:56:50'),
(3, 'village', 'ades', 'omo oluokun', 'vaoades@student.oic.org', '12332321', 'village', '', '200002', '', '', '', '', '', '', '', '', '', '', '0', '', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '2020-06-12 22:11:23'),
(4, 'Omo', 'Oluokun', 'Kabir', 'ookoluokun@student.oic.org', '23231233221', 'village', '100', '200003', '', 'Cyber Security', 'Engineering', '', '', '', '', '', '', '', '0', '', 'a87ff679a2f3e71d9181a67b7542122c', '2020-06-18 04:09:32'),
(5, 'ajala', 'dorcas', 'tabitha', 'adtdorcas@student.oic.org', '12345789', 'tabitha', '400', '200004', '', 'Information And Technology', 'Engineering', '', '', '', '', '', '../student/Student Profile Pictures/AJALA DORCAS TABITHA (2020-06-24-11-06-20).jpg', '', '0', '', 'e4da3b7fbbce2345d7772b0674a318d5', '2020-06-24 09:36:21'),
(6, 'adebisi', 'abosede', 'racheal', 'aarabosede@student.oic.org', '08162326307', 'folasade', '300', '200005', 'Harmattan Semester', 'medicine', 'Medical Science', 'oyo state', 'ibadan', 'house 4,zone4,oluyole etension,oluyole ibadan', '2000-07-14', 'Female', '../student/Student Profile Pictures/ADEBISI ABOSEDE RACHEAL (2020-06-25-11-06-13).jpg', 'oluwashindara arisekola', '3.9', 'SECOND CLASS UPPER', '1679091c5a880faf6fb5e6087eb1b2dc', '2020-06-25 15:17:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registeredcourse`
--
ALTER TABLE `registeredcourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registeredcourse`
--
ALTER TABLE `registeredcourse`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
