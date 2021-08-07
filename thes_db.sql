-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 07, 2021 at 09:49 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thes_db`
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
(1, 'Nischal2015', '$2y$10$o6l9DPECYprzqtuRYoRIuuO8INJQJKtIqbH9DdRBYXoZhziafzq8m', '2021-07-22 10:56:33'),
(2, 'a', '$2y$10$mmHfjBYNz/S7hphpiY0LfuC0IVJYjqjmxb1h9SqWw8V.73lAlSLEG', '2021-07-22 12:33:51'),
(3, 'admin', '$2y$10$2a.Tzp4TfvzZDvJVLM.ECeF9/IU0h5ALjGlz12FhxKI2BqKRThjUa', '2021-07-22 18:35:22'),
(4, 'Genius2021', '$2y$10$FqwVHa.AqJObVgJKP7NXve8MZBayn7WDm5DSqLoOeSWKapHzdpKK2', '2021-07-22 20:25:06'),
(5, 'genius', '$2y$10$k7AL006K51eqCnQyRSbOReNoe/jNDgEkOsI0QVPqYfefepQZ1IlTm', '2021-07-23 18:34:43'),
(6, 'aero', '$2y$10$5P.F6Q8afegzHO0v9a3lf.ObFFuyuT8ObRPGLx3YwXFvZbAgxGhMu', '2021-08-01 17:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_id` int(3) NOT NULL,
  `dep_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `dep_name`) VALUES
(1, 'Electronics & Communi­cation'),
(2, 'Electrical'),
(3, 'Civil'),
(4, 'Mechanical'),
(5, 'Science & Humanities'),
(6, 'Architecture');

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
(7, 'Sabina', '', 'Joshi', 'Mrs.'),
(8, 'Radha', 'Kumari', 'Maharjan', 'Mrs.'),
(9, 'Swaka', 'Man ', 'Pandey', 'Mr.'),
(10, 'Kamala', 'Shree', 'Rajbhandari', 'Dr.');

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
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_committee`
--

INSERT INTO `final_committee` (`final_com_marksid`, `st_te_assigned_id`, `par1`, `par2`, `par3`, `par4`, `par5`, `par6`, `par7`, `par8`, `total`) VALUES
(2, 1, 10, 18, 10, 10, 10, 9, 18, 9, 94),
(5, 11, 10, 10, 10, 10, 10, 10, 10, 10, 80),
(6, 13, 10, 15, 10, 8, 9, 7, 18, 10, 87),
(7, 15, 10, 19, 10, 10, 8, 9, 16, 8, 90),
(9, 19, 10, 18, 10, 10, 10, 10, 18, 10, 96),
(11, 21, 1, 1, 1, 1, 1, 1, 1, 1, 8);

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
(17, 46, 6),
(1, 46, 7),
(2, 46, 8),
(3, 46, 9),
(18, 47, 2),
(19, 47, 3),
(20, 47, 4),
(21, 55, 5),
(14, 62, 2),
(15, 62, 6),
(16, 62, 9),
(11, 64, 4),
(12, 64, 6),
(13, 64, 9);

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
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_external`
--

INSERT INTO `final_external` (`final_com_marksid`, `st_te_assigned_id`, `par1`, `par2`, `par3`, `par4`, `par5`, `par6`, `par7`, `par8`, `total`) VALUES
(1, 5, 10, 10, 10, 10, 10, 10, 10, 10, 80),
(2, 1, 10, 10, 10, 10, 10, 10, 10, 10, 80),
(3, 8, 8, 13, 8, 8, 8, 8, 13, 8, 74),
(4, 9, 2, 2, 2, 2, 2, 2, 2, 2, 16);

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
(1, 46, 7),
(8, 47, 10),
(9, 55, 7),
(6, 62, 7),
(7, 63, 10),
(5, 64, 6);

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
(3, 8, 19, 12, 13, 14, 20, 78),
(4, 7, 19, 19, 18, 17, 20, 93),
(5, 10, 17, 17, 17, 17, 17, 85),
(6, 11, 5, 5, 5, 5, 5, 25);

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
(7, 46, 8),
(10, 47, 6),
(11, 55, 4),
(9, 62, 7),
(8, 64, 8);

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
(2, 26, 10, 10, 10, 10, 10, 10, 10, 10, 80),
(3, 33, 10, 15, 8, 9, 9, 9, 20, 9, 89),
(7, 29, 5, 5, 5, 5, 5, 5, 5, 5, 40),
(9, 34, 10, 15, 10, 10, 10, 10, 19, 10, 94),
(11, 47, 10, 19, 10, 9, 9, 10, 19, 10, 96),
(13, 45, 10, 20, 10, 10, 10, 10, 20, 10, 100),
(14, 48, 8, 15, 7, 7, 6, 10, 16, 10, 79),
(15, 50, 8, 15, 9, 7, 7, 8, 16, 8, 78),
(16, 36, 10, 15, 10, 10, 10, 10, 20, 10, 95);

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
(48, 46, 2),
(49, 46, 3),
(50, 46, 4),
(51, 46, 7),
(52, 46, 9),
(35, 47, 4),
(36, 47, 5),
(59, 47, 9),
(37, 52, 3),
(38, 52, 5),
(39, 52, 8),
(29, 55, 4),
(30, 55, 5),
(26, 55, 7),
(33, 55, 8),
(34, 55, 9),
(45, 62, 4),
(46, 62, 5),
(47, 62, 6),
(40, 63, 2),
(41, 63, 4),
(42, 63, 8),
(44, 63, 9),
(56, 64, 2),
(57, 64, 3),
(58, 64, 4);

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
(5, 9, 1, 1, 1, 1, 1, 1, 1, 1, 8),
(6, 10, 10, 20, 10, 10, 10, 10, 20, 10, 100),
(7, 11, 8, 16, 5, 6, 7, 8, 15, 9, 74),
(8, 14, 10, 15, 8, 7, 6, 7, 20, 10, 83);

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
(11, 46, 7),
(14, 47, 8),
(7, 52, 8),
(9, 55, 8),
(10, 62, 9),
(8, 63, 6),
(13, 64, 9);

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
(16, 13, 1, 1, 1, 1, 1, 5),
(17, 19, 20, 20, 19, 19, 18, 96),
(18, 20, 15, 18, 18, 17, 17, 85),
(19, 15, 12, 12, 12, 12, 12, 60),
(22, 16, 12, 12, 12, 12, 20, 68);

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
(20, 46, 9),
(15, 47, 6),
(16, 52, 9),
(13, 55, 2),
(19, 62, 3),
(17, 63, 5),
(22, 64, 3);

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
  `student_dep` varchar(30) NOT NULL,
  `student_thesis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_fname`, `student_lname`, `student_roll`, `student_gender`, `student_regdate`, `student_year`, `student_dep`, `student_thesis`) VALUES
(45, 'Ramesh', 'Pandey', '076BCT076', 'Male', '2021-06-19', 2076, 'Mechanical', 'Research on panda'),
(46, 'Ram', 'Lakhan', '075BEX450', 'Male', '2021-08-06', 2075, 'Electronics & Communi­cation', 'Making Electric Robot'),
(47, 'Nitesh', 'Swarnakar', '076BCT058', 'Male', '2021-05-03', 2076, 'Electronics & Communi­cation', 'Understanding Blender objects'),
(48, 'Roshan', 'Subedi', '078BCT068', 'Male', '2021-08-01', 2078, 'Science & Humanities', 'My Thesis'),
(52, 'Sita', 'Gautam', '078BCE159', 'Female', '2021-08-31', 2078, 'Civil', 'Building blocks'),
(55, 'Nischal', 'Shakya', '075BCT055', 'Male', '2021-05-04', 2075, 'Electronics & Communi­cation', 'Electrical Instruments'),
(62, 'Ravi', 'Joshi', '076BEX785', 'Male', '2021-08-05', 2076, 'Electronics & Communi­cation', 'Devices on Electronics'),
(63, 'Genius', 'Shakya', '078BCE015', 'Male', '2021-08-05', 2078, 'Civil', 'Making house from lego'),
(64, 'Radha', 'Khadka', '078BCE555', 'Female', '2021-08-06', 2078, 'Civil', 'Modeling a house of legos');

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
  ADD UNIQUE KEY `dep_name` (`dep_name`) USING HASH;

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dep_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ext_teacher`
--
ALTER TABLE `ext_teacher`
  MODIFY `external_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `final_committee`
--
ALTER TABLE `final_committee`
  MODIFY `final_com_marksid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `final_committee_assigned`
--
ALTER TABLE `final_committee_assigned`
  MODIFY `assigned_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `final_external`
--
ALTER TABLE `final_external`
  MODIFY `final_com_marksid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `final_external_assigned`
--
ALTER TABLE `final_external_assigned`
  MODIFY `assigned_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `final_supervisor`
--
ALTER TABLE `final_supervisor`
  MODIFY `final_sup_marksid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `final_supervisor_assigned`
--
ALTER TABLE `final_supervisor_assigned`
  MODIFY `assigned_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mid_committee`
--
ALTER TABLE `mid_committee`
  MODIFY `mid_com_marksid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mid_committee_assigned`
--
ALTER TABLE `mid_committee_assigned`
  MODIFY `assigned_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `mid_external`
--
ALTER TABLE `mid_external`
  MODIFY `mid_ext_marksid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mid_external_assigned`
--
ALTER TABLE `mid_external_assigned`
  MODIFY `assigned_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mid_supervisor`
--
ALTER TABLE `mid_supervisor`
  MODIFY `mid_sup_marksid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `mid_supervisor_assigned`
--
ALTER TABLE `mid_supervisor_assigned`
  MODIFY `assigned_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  ADD CONSTRAINT `final_committee_assigned_ibfk_2` FOREIGN KEY (`assigned_teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `final_external_assigned_ibfk_2` FOREIGN KEY (`assigned_ext_id`) REFERENCES `ext_teacher` (`external_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `final_supervisor_assigned_ibfk_2` FOREIGN KEY (`assigned_teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `mid_committee_assigned_ibfk_2` FOREIGN KEY (`assigned_teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `mid_external_assigned_ibfk_2` FOREIGN KEY (`assigned_ext_id`) REFERENCES `ext_teacher` (`external_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `teacher_id_foreign` FOREIGN KEY (`assigned_teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
