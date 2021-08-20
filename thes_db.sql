-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 20, 2021 at 07:14 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17419324_thes_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `sno` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`sno`, `username`, `password`, `date`) VALUES
(1, 'Nischal2015', '$2y$10$o6l9DPECYprzqtuRYoRIuuO8INJQJKtIqbH9DdRBYXoZhziafzq8m', '2021-08-15 02:45:05'),
(2, 'a', '$2y$10$mmHfjBYNz/S7hphpiY0LfuC0IVJYjqjmxb1h9SqWw8V.73lAlSLEG', '2021-08-15 02:45:05'),
(3, 'admin', '$2y$10$2a.Tzp4TfvzZDvJVLM.ECeF9/IU0h5ALjGlz12FhxKI2BqKRThjUa', '2021-08-15 02:45:05'),
(4, 'Genius2021', '$2y$10$FqwVHa.AqJObVgJKP7NXve8MZBayn7WDm5DSqLoOeSWKapHzdpKK2', '2021-08-15 02:45:05'),
(6, 'aero', '$2y$10$5P.F6Q8afegzHO0v9a3lf.ObFFuyuT8ObRPGLx3YwXFvZbAgxGhMu', '2021-08-15 02:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_id` int(3) NOT NULL,
  `dep_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `dep_name`) VALUES
(13, 'Department of Architectural Engineering'),
(16, 'Department of Chemical Engineering'),
(12, 'Department of Civil Engineering'),
(14, 'Department of Electrical Engineering'),
(11, 'Department of Mechanical Engineering'),
(15, 'Electronic and Computer Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `ext_teacher`
--

CREATE TABLE `ext_teacher` (
  `external_id` int(10) NOT NULL,
  `external_fname` varchar(20) NOT NULL,
  `external_mname` varchar(20) NOT NULL,
  `external_lname` varchar(20) NOT NULL,
  `external_post` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ext_teacher`
--

INSERT INTO `ext_teacher` (`external_id`, `external_fname`, `external_mname`, `external_lname`, `external_post`) VALUES
(6, 'Suresh', '', 'Magar', 'Dr.'),
(8, 'Radha', 'Kumari', 'Maharjan', 'Mrs.'),
(10, 'Kamala', 'Shree', 'Rajbhandari', 'Dr.'),
(11, 'Saurav', '', 'Dangi', 'Mr.'),
(14, 'Ram', 'Kishore', 'Shah', 'Dr.');

-- --------------------------------------------------------

--
-- Table structure for table `final_committee`
--

CREATE TABLE `final_committee` (
  `final_com_marksid` int(10) NOT NULL,
  `st_te_assigned_id` int(10) NOT NULL,
  `par1` int(10) NOT NULL,
  `par2` int(10) NOT NULL,
  `par3` int(10) NOT NULL,
  `par4` int(10) NOT NULL,
  `par5` int(10) NOT NULL,
  `par6` int(10) NOT NULL,
  `par7` int(10) NOT NULL,
  `par8` int(10) NOT NULL,
  `par9` int(10) NOT NULL,
  `par10` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_committee`
--

INSERT INTO `final_committee` (`final_com_marksid`, `st_te_assigned_id`, `par1`, `par2`, `par3`, `par4`, `par5`, `par6`, `par7`, `par8`, `par9`, `par10`, `total`) VALUES
(21, 48, 8, 7, 9, 9, 9, 8, 9, 8, 10, 7, 84),
(22, 43, 10, 9, 9, 9, 9, 9, 9, 9, 9, 9, 91),
(23, 44, 8, 9, 7, 8, 9, 10, 10, 7, 8, 7, 83),
(24, 45, 7, 8, 10, 9, 8, 7, 9, 8, 10, 9, 85),
(25, 47, 9, 8, 9, 9, 9, 9, 9, 10, 9, 9, 90),
(26, 56, 9, 8, 10, 9, 8, 7, 6, 9, 8, 9, 83),
(27, 57, 10, 10, 10, 9, 10, 9, 9, 9, 9, 9, 94),
(28, 46, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 100);

-- --------------------------------------------------------

--
-- Table structure for table `final_committee_assigned`
--

CREATE TABLE `final_committee_assigned` (
  `assigned_id` int(10) NOT NULL,
  `assigned_s_id` int(10) NOT NULL,
  `assigned_teacher_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_committee_assigned`
--

INSERT INTO `final_committee_assigned` (`assigned_id`, `assigned_s_id`, `assigned_teacher_id`) VALUES
(55, 73, 6),
(53, 73, 8),
(54, 73, 9),
(43, 76, 2),
(44, 76, 6),
(45, 76, 9),
(46, 77, 2),
(47, 77, 4),
(48, 77, 9),
(56, 79, 2),
(57, 79, 3),
(58, 79, 9);

-- --------------------------------------------------------

--
-- Table structure for table `final_external`
--

CREATE TABLE `final_external` (
  `final_com_marksid` int(10) NOT NULL,
  `st_te_assigned_id` int(10) NOT NULL,
  `par1` int(10) NOT NULL,
  `par2` int(10) NOT NULL,
  `par3` int(10) NOT NULL,
  `par4` int(10) NOT NULL,
  `par5` int(10) NOT NULL,
  `par6` int(10) NOT NULL,
  `par7` int(10) NOT NULL,
  `par8` int(10) NOT NULL,
  `par9` int(10) NOT NULL,
  `par10` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_external`
--

INSERT INTO `final_external` (`final_com_marksid`, `st_te_assigned_id`, `par1`, `par2`, `par3`, `par4`, `par5`, `par6`, `par7`, `par8`, `par9`, `par10`, `total`) VALUES
(13, 18, 9, 8, 10, 10, 9, 8, 8, 9, 8, 10, 89),
(14, 17, 10, 8, 9, 8, 9, 10, 8, 9, 10, 9, 90),
(15, 21, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 100);

-- --------------------------------------------------------

--
-- Table structure for table `final_external_assigned`
--

CREATE TABLE `final_external_assigned` (
  `assigned_id` int(10) NOT NULL,
  `assigned_s_id` int(10) NOT NULL,
  `assigned_ext_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_external_assigned`
--

INSERT INTO `final_external_assigned` (`assigned_id`, `assigned_s_id`, `assigned_ext_id`) VALUES
(20, 73, 8),
(17, 76, 10),
(18, 77, 6),
(21, 79, 11);

-- --------------------------------------------------------

--
-- Table structure for table `final_supervisor`
--

CREATE TABLE `final_supervisor` (
  `final_sup_marksid` int(10) NOT NULL,
  `st_te_assigned_id` int(10) NOT NULL,
  `par1` int(10) NOT NULL,
  `par2` int(10) NOT NULL,
  `par3` int(10) NOT NULL,
  `par4` int(10) NOT NULL,
  `par5` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_supervisor`
--

INSERT INTO `final_supervisor` (`final_sup_marksid`, `st_te_assigned_id`, `par1`, `par2`, `par3`, `par4`, `par5`, `total`) VALUES
(10, 20, 17, 18, 19, 18, 13, 85),
(11, 21, 18, 19, 20, 18, 15, 90),
(13, 24, 15, 15, 15, 15, 15, 75),
(14, 25, 19, 19, 20, 20, 20, 98);

-- --------------------------------------------------------

--
-- Table structure for table `final_supervisor_assigned`
--

CREATE TABLE `final_supervisor_assigned` (
  `assigned_id` int(10) NOT NULL,
  `assigned_s_id` int(10) NOT NULL,
  `assigned_teacher_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_supervisor_assigned`
--

INSERT INTO `final_supervisor_assigned` (`assigned_id`, `assigned_s_id`, `assigned_teacher_id`) VALUES
(24, 73, 4),
(20, 76, 6),
(21, 77, 7),
(25, 79, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mid_committee`
--

CREATE TABLE `mid_committee` (
  `mid_com_marksid` int(10) NOT NULL,
  `st_te_assigned_id` int(10) NOT NULL,
  `par1` int(10) NOT NULL,
  `par2` int(10) NOT NULL,
  `par3` int(10) NOT NULL,
  `par4` int(10) NOT NULL,
  `par5` int(10) NOT NULL,
  `par6` int(10) NOT NULL,
  `par7` int(10) NOT NULL,
  `par8` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mid_committee`
--

INSERT INTO `mid_committee` (`mid_com_marksid`, `st_te_assigned_id`, `par1`, `par2`, `par3`, `par4`, `par5`, `par6`, `par7`, `par8`, `total`) VALUES
(36, 88, 9, 15, 7, 8, 9, 9, 18, 8, 83),
(37, 91, 10, 18, 8, 9, 9, 9, 15, 8, 86),
(38, 92, 9, 18, 9, 9, 9, 9, 16, 9, 88),
(41, 86, 9, 18, 9, 7, 7, 8, 16, 8, 82),
(43, 106, 8, 15, 8, 8, 9, 10, 16, 8, 82),
(44, 95, 9, 18, 10, 9, 8, 8, 20, 9, 91),
(45, 94, 7, 15, 7, 7, 7, 9, 16, 9, 77),
(48, 96, 10, 20, 10, 10, 10, 10, 20, 10, 100),
(49, 89, 10, 18, 9, 9, 9, 8, 18, 6, 87);

-- --------------------------------------------------------

--
-- Table structure for table `mid_committee_assigned`
--

CREATE TABLE `mid_committee_assigned` (
  `assigned_id` int(10) NOT NULL,
  `assigned_s_id` int(10) NOT NULL,
  `assigned_teacher_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mid_committee_assigned`
--

INSERT INTO `mid_committee_assigned` (`assigned_id`, `assigned_s_id`, `assigned_teacher_id`) VALUES
(85, 73, 2),
(86, 73, 3),
(87, 73, 4),
(91, 76, 3),
(92, 76, 4),
(106, 76, 9),
(88, 77, 2),
(89, 77, 7),
(110, 77, 8),
(94, 79, 2),
(95, 79, 3),
(96, 79, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mid_external`
--

CREATE TABLE `mid_external` (
  `mid_ext_marksid` int(10) NOT NULL,
  `st_te_assigned_id` int(10) NOT NULL,
  `par1` int(10) NOT NULL,
  `par2` int(10) NOT NULL,
  `par3` int(10) NOT NULL,
  `par4` int(10) NOT NULL,
  `par5` int(10) NOT NULL,
  `par6` int(10) NOT NULL,
  `par7` int(10) NOT NULL,
  `par8` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mid_external`
--

INSERT INTO `mid_external` (`mid_ext_marksid`, `st_te_assigned_id`, `par1`, `par2`, `par3`, `par4`, `par5`, `par6`, `par7`, `par8`, `total`) VALUES
(18, 28, 9, 19, 8, 8, 9, 9, 19, 8, 89),
(19, 29, 10, 18, 8, 8, 8, 9, 16, 10, 87),
(20, 30, 9, 20, 10, 10, 10, 10, 19, 8, 96);

-- --------------------------------------------------------

--
-- Table structure for table `mid_external_assigned`
--

CREATE TABLE `mid_external_assigned` (
  `assigned_id` int(10) NOT NULL,
  `assigned_s_id` int(10) NOT NULL,
  `assigned_ext_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mid_external_assigned`
--

INSERT INTO `mid_external_assigned` (`assigned_id`, `assigned_s_id`, `assigned_ext_id`) VALUES
(29, 76, 10),
(28, 77, 8),
(30, 79, 10);

-- --------------------------------------------------------

--
-- Table structure for table `mid_supervisor`
--

CREATE TABLE `mid_supervisor` (
  `mid_sup_marksid` int(10) NOT NULL,
  `st_te_assigned_id` int(10) NOT NULL,
  `par1` int(10) NOT NULL,
  `par2` int(10) NOT NULL,
  `par3` int(10) NOT NULL,
  `par4` int(10) NOT NULL,
  `par5` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mid_supervisor`
--

INSERT INTO `mid_supervisor` (`mid_sup_marksid`, `st_te_assigned_id`, `par1`, `par2`, `par3`, `par4`, `par5`, `total`) VALUES
(29, 36, 7, 7, 7, 7, 7, 35),
(31, 37, 18, 19, 20, 20, 20, 97),
(32, 38, 10, 18, 18, 18, 17, 81),
(33, 39, 19, 19, 18, 20, 18, 94);

-- --------------------------------------------------------

--
-- Table structure for table `mid_supervisor_assigned`
--

CREATE TABLE `mid_supervisor_assigned` (
  `assigned_id` int(10) NOT NULL,
  `assigned_s_id` int(10) NOT NULL,
  `assigned_teacher_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mid_supervisor_assigned`
--

INSERT INTO `mid_supervisor_assigned` (`assigned_id`, `assigned_s_id`, `assigned_teacher_id`) VALUES
(36, 73, 6),
(38, 76, 6),
(37, 77, 3),
(39, 79, 5);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(10) NOT NULL,
  `student_fname` text NOT NULL,
  `student_lname` text NOT NULL,
  `student_roll` varchar(12) NOT NULL,
  `student_gender` text NOT NULL,
  `student_regdate` date NOT NULL,
  `student_year` int(4) NOT NULL,
  `student_dep` varchar(70) NOT NULL,
  `student_thesis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_fname`, `student_lname`, `student_roll`, `student_gender`, `student_regdate`, `student_year`, `student_dep`, `student_thesis`) VALUES
(73, 'Roshan', 'Subedi', '075BCT068', 'Male', '2021-08-09', 2075, 'Electronic and Computer Engineering', 'Building AI Robot'),
(76, 'Milan', 'Shrestha', '075BCT050', 'Male', '2021-08-10', 2075, 'Electronic and Computer Engineering', 'Preventing XSS'),
(77, 'Nitesh', 'Swarnakar', '075BCT058', 'Male', '2021-08-09', 2075, 'Electronic and Computer Engineering', 'Becoming youtube star'),
(79, 'Nischal', 'Shakya', '075BCT055', 'Male', '2021-08-11', 2075, 'Electronic and Computer Engineering', 'Preventing SQL Injection');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(10) NOT NULL,
  `teacher_fname` varchar(20) NOT NULL,
  `teacher_mname` varchar(15) DEFAULT NULL,
  `teacher_lname` varchar(20) NOT NULL,
  `teacher_post` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_fname`, `teacher_mname`, `teacher_lname`, `teacher_post`) VALUES
(2, 'Aman', NULL, 'Shakya', 'Dr.'),
(3, 'Shasidhar', 'Ram', 'Joshi', 'Dr.'),
(4, 'Basanta', NULL, 'Joshi', 'Dr.'),
(5, 'Subarna', NULL, 'Shakya', 'Dr.'),
(6, 'Dibakar', 'Raj', 'Pant', 'Dr.'),
(7, 'Baburam', NULL, 'Dawadi', 'Mr.'),
(8, 'Sanjeeb', 'Prasad', 'Pandey', 'Dr.'),
(9, 'Nanda', 'Bikram', 'Adhikari', 'Dr.');

-- --------------------------------------------------------

--
-- Table structure for table `total_marks`
--

CREATE TABLE `total_marks` (
  `tm_id` int(10) NOT NULL,
  `tm_student_id` int(10) NOT NULL,
  `tm_mid_sup` decimal(8,2) NOT NULL,
  `tm_mid_com` decimal(8,2) NOT NULL,
  `tm_mid_ext` decimal(8,2) NOT NULL,
  `tm_final_sup` decimal(8,2) NOT NULL,
  `tm_final_com` decimal(8,2) NOT NULL,
  `tm_final_ext` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total_marks`
--

INSERT INTO `total_marks` (`tm_id`, `tm_student_id`, `tm_mid_sup`, `tm_mid_com`, `tm_mid_ext`, `tm_final_sup`, `tm_final_com`, `tm_final_ext`) VALUES
(4, 73, 7.00, 8.20, 0.00, 15.00, 0.00, 0.00),
(7, 76, 16.20, 8.53, 8.70, 17.00, 17.27, 18.00),
(8, 77, 19.40, 8.50, 8.90, 18.00, 18.27, 17.80),
(10, 79, 18.80, 8.93, 9.60, 19.60, 17.70, 20.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`),
  ADD UNIQUE KEY `dep_name` (`dep_name`);

--
-- Indexes for table `ext_teacher`
--
ALTER TABLE `ext_teacher`
  ADD PRIMARY KEY (`external_id`);

--
-- Indexes for table `final_committee`
--
ALTER TABLE `final_committee`
  ADD PRIMARY KEY (`final_com_marksid`),
  ADD UNIQUE KEY `st_te_assigned_id` (`st_te_assigned_id`),
  ADD UNIQUE KEY `st_te_assigned_id_2` (`st_te_assigned_id`);

--
-- Indexes for table `final_committee_assigned`
--
ALTER TABLE `final_committee_assigned`
  ADD PRIMARY KEY (`assigned_id`),
  ADD UNIQUE KEY `uq_final_committee_assigned` (`assigned_s_id`,`assigned_teacher_id`),
  ADD KEY `assigned_teacher_id` (`assigned_teacher_id`);

--
-- Indexes for table `final_external`
--
ALTER TABLE `final_external`
  ADD PRIMARY KEY (`final_com_marksid`),
  ADD UNIQUE KEY `teacher_assigned_id` (`st_te_assigned_id`),
  ADD UNIQUE KEY `st_te_assigned_id` (`st_te_assigned_id`),
  ADD UNIQUE KEY `st_te_assigned_id_2` (`st_te_assigned_id`);

--
-- Indexes for table `final_external_assigned`
--
ALTER TABLE `final_external_assigned`
  ADD PRIMARY KEY (`assigned_id`),
  ADD UNIQUE KEY `uq_final_external_assigned` (`assigned_s_id`,`assigned_ext_id`),
  ADD UNIQUE KEY `assigned_s_id` (`assigned_s_id`),
  ADD KEY `assigned_ext_id` (`assigned_ext_id`);

--
-- Indexes for table `final_supervisor`
--
ALTER TABLE `final_supervisor`
  ADD PRIMARY KEY (`final_sup_marksid`),
  ADD UNIQUE KEY `teacher_assigned_id` (`st_te_assigned_id`),
  ADD UNIQUE KEY `st_te_assigned_id` (`st_te_assigned_id`),
  ADD UNIQUE KEY `st_te_assigned_id_2` (`st_te_assigned_id`),
  ADD UNIQUE KEY `st_te_assigned_id_3` (`st_te_assigned_id`);

--
-- Indexes for table `final_supervisor_assigned`
--
ALTER TABLE `final_supervisor_assigned`
  ADD PRIMARY KEY (`assigned_id`),
  ADD UNIQUE KEY `uq_final_supervisor_assigned` (`assigned_s_id`,`assigned_teacher_id`),
  ADD UNIQUE KEY `assigned_s_id` (`assigned_s_id`),
  ADD KEY `assigned_teacher_id` (`assigned_teacher_id`);

--
-- Indexes for table `mid_committee`
--
ALTER TABLE `mid_committee`
  ADD PRIMARY KEY (`mid_com_marksid`),
  ADD UNIQUE KEY `st_te_assigned_id` (`st_te_assigned_id`);

--
-- Indexes for table `mid_committee_assigned`
--
ALTER TABLE `mid_committee_assigned`
  ADD PRIMARY KEY (`assigned_id`),
  ADD UNIQUE KEY `uq_mid_committee_assigned` (`assigned_s_id`,`assigned_teacher_id`),
  ADD KEY `assigned_teacher_id` (`assigned_teacher_id`);

--
-- Indexes for table `mid_external`
--
ALTER TABLE `mid_external`
  ADD PRIMARY KEY (`mid_ext_marksid`),
  ADD UNIQUE KEY `st_te_assigned_id` (`st_te_assigned_id`);

--
-- Indexes for table `mid_external_assigned`
--
ALTER TABLE `mid_external_assigned`
  ADD PRIMARY KEY (`assigned_id`),
  ADD UNIQUE KEY `uq_mid_external_assigned` (`assigned_s_id`,`assigned_ext_id`),
  ADD UNIQUE KEY `assigned_s_id` (`assigned_s_id`),
  ADD KEY `assigned_ext_id` (`assigned_ext_id`);

--
-- Indexes for table `mid_supervisor`
--
ALTER TABLE `mid_supervisor`
  ADD PRIMARY KEY (`mid_sup_marksid`),
  ADD UNIQUE KEY `st_te_assigned_id` (`st_te_assigned_id`);

--
-- Indexes for table `mid_supervisor_assigned`
--
ALTER TABLE `mid_supervisor_assigned`
  ADD PRIMARY KEY (`assigned_id`),
  ADD UNIQUE KEY `uq_mid_supervisor_assigned` (`assigned_s_id`,`assigned_teacher_id`),
  ADD UNIQUE KEY `assigned_s_id` (`assigned_s_id`),
  ADD KEY `teacher_id_foreign` (`assigned_teacher_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `total_marks`
--
ALTER TABLE `total_marks`
  ADD PRIMARY KEY (`tm_id`),
  ADD UNIQUE KEY `tm_student_id` (`tm_student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dep_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ext_teacher`
--
ALTER TABLE `ext_teacher`
  MODIFY `external_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `final_committee`
--
ALTER TABLE `final_committee`
  MODIFY `final_com_marksid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `final_committee_assigned`
--
ALTER TABLE `final_committee_assigned`
  MODIFY `assigned_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `final_external`
--
ALTER TABLE `final_external`
  MODIFY `final_com_marksid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `final_external_assigned`
--
ALTER TABLE `final_external_assigned`
  MODIFY `assigned_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `final_supervisor`
--
ALTER TABLE `final_supervisor`
  MODIFY `final_sup_marksid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `final_supervisor_assigned`
--
ALTER TABLE `final_supervisor_assigned`
  MODIFY `assigned_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mid_committee`
--
ALTER TABLE `mid_committee`
  MODIFY `mid_com_marksid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `mid_committee_assigned`
--
ALTER TABLE `mid_committee_assigned`
  MODIFY `assigned_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `mid_external`
--
ALTER TABLE `mid_external`
  MODIFY `mid_ext_marksid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mid_external_assigned`
--
ALTER TABLE `mid_external_assigned`
  MODIFY `assigned_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `mid_supervisor`
--
ALTER TABLE `mid_supervisor`
  MODIFY `mid_sup_marksid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `mid_supervisor_assigned`
--
ALTER TABLE `mid_supervisor_assigned`
  MODIFY `assigned_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `total_marks`
--
ALTER TABLE `total_marks`
  MODIFY `tm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `final_committee`
--
ALTER TABLE `final_committee`
  ADD CONSTRAINT `final_comm_teacher_foreign` FOREIGN KEY (`st_te_assigned_id`) REFERENCES `final_committee_assigned` (`assigned_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `final_committee_assigned`
--
ALTER TABLE `final_committee_assigned`
  ADD CONSTRAINT `final_committee_assigned_ibfk_1` FOREIGN KEY (`assigned_s_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `final_committee_assigned_ibfk_2` FOREIGN KEY (`assigned_teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `final_external`
--
ALTER TABLE `final_external`
  ADD CONSTRAINT `final_ext_teacher_foreign` FOREIGN KEY (`st_te_assigned_id`) REFERENCES `final_external_assigned` (`assigned_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `final_external_assigned`
--
ALTER TABLE `final_external_assigned`
  ADD CONSTRAINT `final_external_assigned_ibfk_1` FOREIGN KEY (`assigned_s_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `final_external_assigned_ibfk_2` FOREIGN KEY (`assigned_ext_id`) REFERENCES `ext_teacher` (`external_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `final_supervisor`
--
ALTER TABLE `final_supervisor`
  ADD CONSTRAINT `final_sup_teacher_foreign` FOREIGN KEY (`st_te_assigned_id`) REFERENCES `final_supervisor_assigned` (`assigned_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `final_supervisor_assigned`
--
ALTER TABLE `final_supervisor_assigned`
  ADD CONSTRAINT `final_supervisor_assigned_ibfk_1` FOREIGN KEY (`assigned_s_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `final_supervisor_assigned_ibfk_2` FOREIGN KEY (`assigned_teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mid_committee`
--
ALTER TABLE `mid_committee`
  ADD CONSTRAINT `techer_assigned_foreign` FOREIGN KEY (`st_te_assigned_id`) REFERENCES `mid_committee_assigned` (`assigned_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mid_committee_assigned`
--
ALTER TABLE `mid_committee_assigned`
  ADD CONSTRAINT `mid_committee_assigned_ibfk_1` FOREIGN KEY (`assigned_s_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mid_committee_assigned_ibfk_2` FOREIGN KEY (`assigned_teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mid_external`
--
ALTER TABLE `mid_external`
  ADD CONSTRAINT `mid_ext_teacher_foreign` FOREIGN KEY (`st_te_assigned_id`) REFERENCES `mid_external_assigned` (`assigned_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mid_external_assigned`
--
ALTER TABLE `mid_external_assigned`
  ADD CONSTRAINT `mid_external_assigned_ibfk_1` FOREIGN KEY (`assigned_s_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mid_external_assigned_ibfk_2` FOREIGN KEY (`assigned_ext_id`) REFERENCES `ext_teacher` (`external_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mid_supervisor`
--
ALTER TABLE `mid_supervisor`
  ADD CONSTRAINT `mid_sup_teacher_foreign` FOREIGN KEY (`st_te_assigned_id`) REFERENCES `mid_supervisor_assigned` (`assigned_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mid_supervisor_assigned`
--
ALTER TABLE `mid_supervisor_assigned`
  ADD CONSTRAINT `student_id_foreign` FOREIGN KEY (`assigned_s_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_id_foreign` FOREIGN KEY (`assigned_teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `total_marks`
--
ALTER TABLE `total_marks`
  ADD CONSTRAINT `total_marks_ibfk_1` FOREIGN KEY (`tm_student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
