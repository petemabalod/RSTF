-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 02:48 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_email`, `admin_password`) VALUES
('suman@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `stud_id` int(3) NOT NULL,
  `sub_id` varchar(255) NOT NULL,
  `month` varchar(9) NOT NULL,
  `total` int(3) NOT NULL,
  `attendance` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`stud_id`, `sub_id`, `month`, `total`, `attendance`) VALUES
(15, '300', 'April', 20, 15),
(17, '300', 'February', 45, 12),
(17, '300', 'September', 52, 50),
(34, '54', 'January', 23, 5),
(34, '56', 'August', 54, 43),
(34, '56', 'January', 23, 13),
(34, '56', 'March', 14, 3),
(34, '56', 'November', 56, 67),
(34, '76', 'January', 54, 43);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `email` varchar(255) NOT NULL,
  `subject` varchar(10) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `stud_id` int(3) NOT NULL,
  `sub_id` varchar(255) NOT NULL,
  `month` varchar(9) NOT NULL,
  `total` int(3) NOT NULL,
  `marks` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`stud_id`, `sub_id`, `month`, `total`, `marks`) VALUES
(34, '56', 'January', 100, 56),
(34, '76', 'January', 100, 78),
(43, '56', 'May', 100, 87),
(45, '56', 'May', 100, 65),
(76, '56', 'November', 100, 67);

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `stud_id` int(11) NOT NULL,
  `stud_name` varchar(255) NOT NULL,
  `stud_year` int(1) NOT NULL,
  `stud_sem` int(1) NOT NULL,
  `stud_dept` varchar(20) NOT NULL,
  `stud_phno` int(10) NOT NULL,
  `stud_email` varchar(255) NOT NULL,
  `stud_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`stud_id`, `stud_name`, `stud_year`, `stud_sem`, `stud_dept`, `stud_phno`, `stud_email`, `stud_password`) VALUES
(41, 'suman', 4, 8, 'cse', 1234567890, 'abc@gmail.com', '123456789'),
(4, 'abc', 4, 4, 'cse', 1234567890, 'abcd@gmail.com', '123456'),
(17, 'Anwesha Chakraborty', 4, 8, 'CSE', 2147483647, 'anwesha@gmail.com', '12345six');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_login`
--

CREATE TABLE `teacher_login` (
  `t_name` varchar(255) NOT NULL,
  `sub_id` varchar(10) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `t_phno` int(10) NOT NULL,
  `t_email` varchar(255) NOT NULL,
  `t_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_login`
--

INSERT INTO `teacher_login` (`t_name`, `sub_id`, `sub_name`, `t_phno`, `t_email`, `t_password`) VALUES
('a', '1', 'abc', 123, 'a@a', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_email`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`stud_id`,`sub_id`,`month`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`stud_id`,`sub_id`,`month`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`stud_email`);

--
-- Indexes for table `teacher_login`
--
ALTER TABLE `teacher_login`
  ADD PRIMARY KEY (`t_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
