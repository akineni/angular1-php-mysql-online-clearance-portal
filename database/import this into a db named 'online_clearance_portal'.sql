-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2020 at 09:23 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_clearance_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `ocp_departments`
--

CREATE TABLE `ocp_departments` (
  `id` int(11) NOT NULL,
  `department` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL DEFAULT '25d55ad283aa400af464c76d713c07ad'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ocp_departments`
--

INSERT INTO `ocp_departments` (`id`, `department`, `password`) VALUES
(1, 'chief security officer', '25d55ad283aa400af464c76d713c07ad'),
(2, 'hostel manager', '25d55ad283aa400af464c76d713c07ad'),
(3, 'university librarian', '25d55ad283aa400af464c76d713c07ad'),
(4, 'head of department', '25d55ad283aa400af464c76d713c07ad'),
(5, 'dean of college', '25d55ad283aa400af464c76d713c07ad'),
(6, 'academic affairs (registry)', '25d55ad283aa400af464c76d713c07ad'),
(7, 'dean of student affairs', '25d55ad283aa400af464c76d713c07ad'),
(8, 'bursary', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `ocp_students`
--

CREATE TABLE `ocp_students` (
  `id` int(11) NOT NULL,
  `matric_no` int(11) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `middlename` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '400',
  `clearance_level` int(11) NOT NULL DEFAULT '1',
  `hash` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ocp_students`
--

INSERT INTO `ocp_students` (`id`, `matric_no`, `firstname`, `middlename`, `lastname`, `email`, `level`, `clearance_level`, `hash`) VALUES
(1, 150502043, 'eniola', 'oluwatobi', 'akinlonu', 'akinlonueniola@gmail.com', 400, 1, ''),
(2, 150502001, 'fortune', 'babatunde james', 'itiola', 'itiola579@gmail.com', 400, 1, ''),
(3, 150502044, 'ebenezer', '', 'edionwe', 'orhuedionwe@gmail.com', 400, 1, ''),
(4, 150502023, 'mark', 'john', 'ukwule', 'markuk@yahoo.com', 400, 1, ''),
(5, 150502013, 'dev', 'ed', 'ed', 'deved@deved.com', 400, 1, ''),
(6, 150502034, 'makinde', 'seyi', 'dunni', 'seyi@gmail.com', 300, 0, ''),
(7, 150502065, 'somade', 'ibukun', 'emmanuel', 'ibukunemmanuel@gmail.com', 200, 0, ''),
(8, 150502030, 'soniran', 'ekundayo', 'dickson', 'dicksones@gmail.com', 400, 1, ''),
(9, 150502020, 'eniola', 'oluwatobi', 'akinlonu', 'akinlonueniola@yahoo.com', 400, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ocp_departments`
--
ALTER TABLE `ocp_departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department` (`department`);

--
-- Indexes for table `ocp_students`
--
ALTER TABLE `ocp_students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `matric_no` (`matric_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ocp_departments`
--
ALTER TABLE `ocp_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ocp_students`
--
ALTER TABLE `ocp_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
