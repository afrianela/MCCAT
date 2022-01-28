-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 04:55 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mctrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(200) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `shift` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fname`, `lname`, `email`, `pwd`, `created_at`, `shift`) VALUES
(20000001, 'Crs', 'Mrk', 'admin@gmail.com', 'admin', '2022-01-06 07:15:39', '8:00 AM - 5:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(200) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `bday` date NOT NULL,
  `cstatus` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `gdrive` varchar(255) NOT NULL,
  `cpnum` varchar(100) NOT NULL,
  `relig` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `brgy` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `startdt` date NOT NULL,
  `enddt` date NOT NULL,
  `reqhr` int(100) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `company` varchar(100) NOT NULL,
  `empstatus` varchar(100) NOT NULL,
  `emptype` varchar(100) NOT NULL,
  `rendhr` int(100) NOT NULL,
  `lefthr` int(100) NOT NULL,
  `urole` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `fname`, `mname`, `lname`, `suffix`, `email`, `pwd`, `bday`, `cstatus`, `gender`, `gdrive`, `cpnum`, `relig`, `street`, `brgy`, `city`, `dept`, `startdt`, `enddt`, `reqhr`, `shift`, `photo`, `company`, `empstatus`, `emptype`, `rendhr`, `lefthr`, `urole`) VALUES
(17000001, 'Jay', 'R', 'Angeles', 'Q', 'jay@gmail.com', '1234', '2021-01-01', 'Single', 'M', 'jay@gmail.com/gdrive', '9122', 'Catholic', '55', 'Tondo', 'Manila', 'Auxiliary', '2022-01-01', '2022-01-31', 300, '8:00 AM - 5:00 PM', 'file', 'Melham', 'On-going', 'Intern', 0, 0, ''),
(17000008, 'Vael', 'X', 'Crow', 'X', 'vael@gmail.com', '1234', '2021-12-04', 'Single', 'M', 'ggdrive@gmail.com/', '09999999999', 'Cat', 'Zuzuarregui', 'Commonwealth', 'Quezon City', 'Engineering', '2022-01-01', '2022-01-30', 700, '8:00 AM - 5:00 PM', NULL, 'Melham', '', '', 0, 0, ''),
(17000009, 'Aile', 'R', 'Wynd', 'W', 'aile@gmail.com', '1234', '2021-11-04', 'Single', 'F', 'ggdrive@gmail.com/', '09999999990', 'Cat', 'Amorsolo', 'UP', 'Quezon City', 'Arts', '2022-01-07', '2022-02-10', 400, '8:00 AM - 5:00 PM', NULL, 'Anafara', '', '', 0, 0, ''),
(17000010, 'Val', 'K', 'Kreuz', '', 'valk@gmail.com', '1234', '2021-10-06', 'Single', 'M', 'ggdrive@gmail.com/', '09999999999', 'Dog', '94 Pook Dagohoy', 'UP', 'Quezon City', 'Accounting', '2022-01-09', '2022-01-24', 700, '8:00 AM - 5:00 PM', NULL, 'VisVis', '', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `employeetime`
--

CREATE TABLE `employeetime` (
  `emptime_id` int(255) NOT NULL,
  `emp_id` int(255) NOT NULL,
  `efullname` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `time_in` datetime NOT NULL,
  `remark1` varchar(200) NOT NULL,
  `lunch_strt` datetime NOT NULL,
  `remark2` varchar(200) NOT NULL,
  `lunch_end` datetime NOT NULL,
  `remark3` varchar(200) NOT NULL,
  `time_out` datetime NOT NULL,
  `remark4` varchar(200) NOT NULL,
  `totalhr` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeetime`
--

INSERT INTO `employeetime` (`emptime_id`, `emp_id`, `efullname`, `type`, `created_on`, `time_in`, `remark1`, `lunch_strt`, `remark2`, `lunch_end`, `remark3`, `time_out`, `remark4`, `totalhr`) VALUES
(1, 17000008, 'Vael X Crow X', 'Intern', '2022-01-12 07:29:21', '2022-01-12 00:08:00', 'On time', '2022-01-12 16:47:32', 'Lunch on time', '2022-01-12 13:00:00', 'On time', '2022-01-12 19:46:45', 'On Timeee', 8),
(3, 17000008, 'Vael X Crow X', '', '2022-01-15 00:00:00', '2022-01-15 17:18:45', 'Super late', '2022-01-15 16:47:32', 'Lateeee', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0),
(4, 17000009, 'Aile R Wynd W', '', '2022-01-15 00:00:00', '2022-01-15 18:35:53', 'Late for more than an hour', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0),
(12, 17000008, 'Vael X Crow X', '', '2022-01-16 00:00:00', '2022-01-16 09:00:00', 'Late for more than an hour', '2022-01-16 19:51:31', 'Did not Start Lunch on time', '2022-01-16 19:51:35', 'Late for more than an hour', '2022-01-16 20:06:34', 'On Time', 10),
(13, 17000008, 'Vael X Crow X', '', '2022-01-18 00:00:00', '2022-01-18 11:45:37', 'Late for more than an hour', '2022-01-18 12:00:59', 'On Time', '2022-01-18 13:04:50', 'Late', '2022-01-18 17:13:28', 'On Time', 4);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(200) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `suffix` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `pos` varchar(50) NOT NULL,
  `shift` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `fname`, `mname`, `lname`, `suffix`, `email`, `pwd`, `pos`, `shift`) VALUES
(22000001, 'Jes', 'Q', 'Esq', 'W', 'jes@gmail.com', '1234', 'Employee', '8:00 AM - 5:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(200) NOT NULL,
  `taskemp_id` int(255) NOT NULL,
  `efullname` varchar(100) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `taskname` varchar(200) NOT NULL,
  `fformat` varchar(100) NOT NULL,
  `date_assigned` date NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT current_timestamp(),
  `gdrvlink` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `taskemp_id`, `efullname`, `dept`, `taskname`, `fformat`, `date_assigned`, `date_submitted`, `gdrvlink`) VALUES
(1, 0, 'Jay Angeles', 'Auxiliary', 'Day 1 Task', 'PNG', '2022-01-01', '2022-01-09 18:36:12', 'https://drive.google.com/file/d/1VvbtDK81KDnIVCj0_8t7LWhnlEeHMKRc/view?usp=sharing'),
(8, 17000008, 'Vael X Crow X', 'Auxiliary', 'Odl - Day 2 task', 'PPTX', '2022-01-18', '2022-01-15 09:29:00', 'GDrive_LinkGDrive_Linkhttps://www.youtube.com/'),
(9, 17000008, 'Vael X Crow X', 'Auxiliary', 'Day 6 Task', 'VIDEO', '2022-01-16', '2022-01-20 07:39:30', 'https://www.youtube.com/'),
(10, 17000009, 'Aile R Wynd W', 'Arts', 'Day 7 Task', 'DOCUMENT', '2022-01-01', '2022-01-21 03:40:13', 'https://www.youtube.com/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employeetime`
--
ALTER TABLE `employeetime`
  ADD PRIMARY KEY (`emptime_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20000003;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17000011;

--
-- AUTO_INCREMENT for table `employeetime`
--
ALTER TABLE `employeetime`
  MODIFY `emptime_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22000003;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
