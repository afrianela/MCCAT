-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 12:11 AM
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
-- Database: `mctest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fname`, `lname`, `email`, `pwd`, `created_at`) VALUES
(200001, 'Crs', 'Mrk', 'admin@gmail.com', 'admin', '2022-01-06 07:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `fname`, `email`, `city`, `dept`) VALUES
(0, 'Cross', 'stud@tmail.com', 'Quezon City', 'Auxiliary'),
(170001, 'Jay', 'jay@gmail.com', 'Manila', 'Auxiliary');

-- --------------------------------------------------------

--
-- Table structure for table `employeetime`
--

CREATE TABLE `employeetime` (
  `emptime_id` int(20) NOT NULL,
  `emp_id` int(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
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
  `totalhr` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `suffix` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `pos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `fname`, `mname`, `lname`, `suffix`, `email`, `pwd`, `pos`) VALUES
(220001, 'Jes', 'Q', 'Esq', 'W', 'jes@gmail.com', '1234', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(50) NOT NULL,
  `emp_id` int(50) NOT NULL,
  `task_name` varchar(100) NOT NULL,
  `task_type` varchar(50) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `gdrvlink` varchar(500) NOT NULL,
  `department` varchar(50) NOT NULL,
  `date_assigned` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
