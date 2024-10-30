-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 03:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_email`, `admin_password`) VALUES
('jaymabalod74@gmail.com', '119941130018');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `stud_id` int(3) NOT NULL,
  `scan_time` datetime NOT NULL,
  `status` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`stud_id`, `scan_time`, `status`) VALUES
(1131507, '2024-10-18 14:30:01', 'Time Out'),
(1131507, '2024-10-18 14:30:01', 'Time Out'),
(1131507, '2024-10-18 14:30:01', 'Time Out'),
(1131507, '2024-10-18 14:30:01', 'Time Out'),
(1131507, '2024-10-18 14:33:21', 'Time In'),
(1131507, '2024-10-18 14:33:33', 'Time In'),
(1131507, '2024-10-18 14:33:39', 'Time In'),
(1131507, '2024-10-18 14:34:43', 'Time Out'),
(1131507, '2024-10-29 08:41:13', 'Time In'),
(1131507, '2024-10-29 15:13:45', 'Time In'),
(1131507, '2024-10-29 15:13:53', 'Time In'),
(2147483647, '2024-10-30 10:32:53', 'Time In');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `email` varchar(255) NOT NULL,
  `subject` varchar(10) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade_levels`
--

CREATE TABLE `grade_levels` (
  `id` int(11) NOT NULL,
  `grade_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade_levels`
--

INSERT INTO `grade_levels` (`id`, `grade_level`) VALUES
(28, '11'),
(29, '12');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `stud_id` int(11) NOT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `activity` varchar(50) DEFAULT NULL,
  `hps` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `section_id`, `student_name`, `stud_id`, `subject`, `activity`, `hps`, `score`) VALUES
(32, 62, 'Pete', 11769, 'Math', 'Assignment/Activity', 100, 10),
(33, 62, 'Pete', 11769, 'Math', 'Assignment/Activity', 100, 10),
(34, 62, 'Bracil', 1131507, 'English', 'Periodical', 100, 60);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `grade_level_id` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `grade_level_id`, `section_name`) VALUES
(62, 28, 'IO'),
(63, 29, 'Orion'),
(64, 29, 'Random');

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `stud_email` varchar(255) NOT NULL,
  `stud_password` varchar(255) NOT NULL,
  `stud_name` varchar(255) NOT NULL,
  `stud_id` varchar(255) NOT NULL,
  `stud_year` varchar(255) NOT NULL,
  `stud_sem` varchar(255) NOT NULL,
  `stud_dept` varchar(255) NOT NULL,
  `stud_phno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`stud_email`, `stud_password`, `stud_name`, `stud_id`, `stud_year`, `stud_sem`, `stud_dept`, `stud_phno`) VALUES
('peter.a.mabalod@gmail.com', 'Dr3yrandy', '', '', '', '', '', ''),
('jacob.a.mabalod@gmail.com', 'jacob61111', 'John Doe', '2', '2', '2', 'CHED', '092593685643');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_login`
--

CREATE TABLE `teacher_login` (
  `t_name` varchar(255) NOT NULL,
  `sub_id` varchar(10) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `t_phno` bigint(10) NOT NULL,
  `t_email` varchar(255) NOT NULL,
  `t_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_login`
--

INSERT INTO `teacher_login` (`t_name`, `sub_id`, `sub_name`, `t_phno`, `t_email`, `t_password`) VALUES
('Michelle', '1234567890', 'MATH', 0, 'peter.a.mabalod@gmail.com', 'Dr3yrandy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grade_levels`
--
ALTER TABLE `grade_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grade_level_id` (`grade_level_id`);

--
-- Indexes for table `teacher_login`
--
ALTER TABLE `teacher_login`
  ADD PRIMARY KEY (`t_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grade_levels`
--
ALTER TABLE `grade_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `fk_grade_level_id` FOREIGN KEY (`grade_level_id`) REFERENCES `grade_levels` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
