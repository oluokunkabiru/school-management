-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 06:43 AM
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
  `CGPA` decimal(10,0) NOT NULL,
  `StudentId` varchar(50) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `SurName`, `FirstName`, `LastName`, `email`, `Phone_Number`, `password`, `Level`, `matricNo`, `CurrentSemester`, `Department`, `Faculty`, `state`, `city`, `Address`, `dob`, `gender`, `profilePicture`, `NextOfKin`, `CGPA`, `StudentId`, `reg_date`) VALUES
(1, 'village', 'Kabir', 'Adesina', 'vkakabir@student.oic.org', '12345678', 'village', '100', '200000', 'Rain Semester', 'Computer Science and Engineering', 'Engineering', '', '', '', '', '', '../student/Student Profile Pictures/VILLAGE KABIR ADESINA (2020-06-13-12-06-59).jpg', '', '0', 'c4ca4238a0b923820dcc509a6f75849b', '2020-06-13 09:51:40'),
(2, 'Oluokun', 'Kabir', 'Adesina', 'okakabir@student.oic.org', '123456781', 'village', '100', '200001', 'Rain Semester', 'Computer Science and Engineering', 'Engineering', '', '', '', '', '', 'Student Profile Pictures/OLUOKUN KABIR ADESINA (2020-06-16-07-06-54).jpg', '', '0', 'c81e728d9d4c2f636f067f89cc14862c', '2020-06-16 17:23:54'),
(3, 'village', 'ades', 'omo oluokun', 'vaoades@student.oic.org', '12332321', 'village', '', '200002', '', '', '', '', '', '', '', '', '', '', '0', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '2020-06-12 22:11:23'),
(4, 'Omo', 'Oluokun', 'Kabir', 'ookoluokun@student.oic.org', '23231233221', 'village', '100', '200003', '', 'Cyber Security', 'Engineering', '', '', '', '', '', '', '', '0', 'a87ff679a2f3e71d9181a67b7542122c', '2020-06-18 04:09:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
