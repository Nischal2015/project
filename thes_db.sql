-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2021 at 09:51 AM
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
  `external_post` varchar(5) NOT NULL,
  `external_fname` varchar(20) NOT NULL,
  `external_mname` varchar(20) NOT NULL,
  `external_lname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ext_teacher`
--

INSERT INTO `ext_teacher` (`external_id`, `external_post`, `external_fname`, `external_mname`, `external_lname`) VALUES
(4, 'Mr.', 'Rakesh', 'Kumar', 'Shah'),
(6, 'Dr.', 'Suresh', '', 'Magar');

-- --------------------------------------------------------

--
-- Table structure for table `final_committee`
--

CREATE TABLE `final_committee` (
  `final_com_marksid` int(10) NOT NULL,
  `teacher_assigned_id` int(10) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `final_committee_assigned`
--

CREATE TABLE `final_committee_assigned` (
  `assigned_id` int(10) NOT NULL,
  `assigned_s_id` int(10) NOT NULL,
  `assigned_teacher_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `final_external`
--

CREATE TABLE `final_external` (
  `final_com_marksid` int(10) NOT NULL,
  `teacher_assigned_id` int(10) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `final_external_assigned`
--

CREATE TABLE `final_external_assigned` (
  `assigned_id` int(10) NOT NULL,
  `assigned_s_id` int(10) NOT NULL,
  `assigned_ext_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `final_supervisor`
--

CREATE TABLE `final_supervisor` (
  `final_sup_marksid` int(10) NOT NULL,
  `teacher_assigned_id` int(10) NOT NULL,
  `par1` int(10) NOT NULL,
  `par2` int(10) NOT NULL,
  `par3` int(10) NOT NULL,
  `par4` int(10) NOT NULL,
  `par5` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `final_supervisor_assigned`
--

CREATE TABLE `final_supervisor_assigned` (
  `assigned_id` int(10) NOT NULL,
  `assigned_s_id` int(10) NOT NULL,
  `assigned_teacher_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mid_committee`
--

CREATE TABLE `mid_committee` (
  `mid_com_marksid` int(10) NOT NULL,
  `teacher_assigned_id` int(10) NOT NULL,
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
(5, 46, 2),
(13, 46, 4),
(14, 46, 6),
(18, 46, 7),
(1, 48, 2),
(2, 48, 4),
(10, 52, 3),
(11, 52, 5),
(6, 55, 2),
(9, 55, 8);

-- --------------------------------------------------------

--
-- Table structure for table `mid_external`
--

CREATE TABLE `mid_external` (
  `mid_ext_marksid` int(10) NOT NULL,
  `teacher_assigned_id` int(10) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `mid_external_assigned`
--

CREATE TABLE `mid_external_assigned` (
  `assigned_id` int(10) NOT NULL,
  `assigned_s_id` int(10) NOT NULL,
  `assigned_ext_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mid_supervisor`
--

CREATE TABLE `mid_supervisor` (
  `mid_sup_marksid` int(10) NOT NULL,
  `teacher_assigned_id` int(10) NOT NULL,
  `par1` int(10) NOT NULL,
  `par2` int(10) NOT NULL,
  `par3` int(10) NOT NULL,
  `par4` int(10) NOT NULL,
  `par5` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(7, 46, 7),
(6, 52, 4),
(1, 55, 5);

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
(41, 'Shubham', 'Singh', '077BCT158', 'Male', '2021-08-01', 2077, 'Electronics & Communi­cation', 'Public health status in urban areas'),
(45, 'Ramesh', 'Pandey', '076BCT076', 'Male', '2021-06-19', 2076, 'Mechanical', 'Research on panda'),
(46, 'Milan', 'Shrestha', '075BCT050', 'Male', '2021-07-07', 2075, 'Science & Humanities', 'Dom Manipulation using jQuery'),
(47, 'Nitesh', 'Swarnakar', '076BCT058', 'Male', '2021-05-03', 2076, 'Electronics & Communi­cation', 'Understanding Blender objects'),
(48, 'Roshan', 'Subedi', '078BCT068', 'Male', '2021-08-01', 2078, 'Science & Humanities', 'My Thesis'),
(52, 'Sita', 'Gautam', '078BCE159', 'Female', '2021-08-31', 2078, 'Civil', 'Building blocks'),
(55, 'Nischal', 'Shakya', '075BCT055', 'Male', '2021-05-04', 2075, 'Electronics & Communi­cation', 'Electrical Instruments'),
(58, 'rakesh', 'roshan', '078bct456', 'Male', '2021-08-20', 2078, 'Architecture', 'test title');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(10) NOT NULL,
  `teacher_post` varchar(5) NOT NULL,
  `teacher_fname` varchar(20) NOT NULL,
  `teacher_mname` varchar(15) DEFAULT NULL,
  `teacher_lname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_post`, `teacher_fname`, `teacher_mname`, `teacher_lname`) VALUES
(2, 'Mr.', 'Aman', NULL, 'Shakya'),
(3, 'Dr.', 'Shasidhar', 'Ram', 'Joshi'),
(4, 'Dr.', 'Basanta', NULL, 'Joshi'),
(5, 'Dr.', 'Subarna', NULL, 'Shakya'),
(6, 'Dr.', 'Dibakar', 'Raj', 'Pant'),
(7, 'Mr.', 'Baburam', NULL, 'Dawadi'),
(8, 'Dr.', 'Sanjeeb', 'Prasad', 'Pandey'),
(9, 'Dr.', 'Nanda', 'Bikram', 'Adhikari');

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
  ADD KEY `final_comm_teacher_foreign` (`teacher_assigned_id`);

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
  ADD KEY `final_ext_teacher_foreign` (`teacher_assigned_id`);

--
-- Indexes for table `final_external_assigned`
--
ALTER TABLE `final_external_assigned`
  ADD PRIMARY KEY (`assigned_id`),
  ADD UNIQUE KEY `uq_final_external_assigned` (`assigned_s_id`,`assigned_ext_id`),
  ADD KEY `assigned_ext_id` (`assigned_ext_id`);

--
-- Indexes for table `final_supervisor`
--
ALTER TABLE `final_supervisor`
  ADD PRIMARY KEY (`final_sup_marksid`),
  ADD KEY `final_sup_teacher_foreign` (`teacher_assigned_id`);

--
-- Indexes for table `final_supervisor_assigned`
--
ALTER TABLE `final_supervisor_assigned`
  ADD PRIMARY KEY (`assigned_id`),
  ADD UNIQUE KEY `uq_final_supervisor_assigned` (`assigned_s_id`,`assigned_teacher_id`),
  ADD KEY `assigned_teacher_id` (`assigned_teacher_id`);

--
-- Indexes for table `mid_committee`
--
ALTER TABLE `mid_committee`
  ADD PRIMARY KEY (`mid_com_marksid`),
  ADD KEY `techer_assigned_foreign` (`teacher_assigned_id`);

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
  ADD KEY `mid_ext_teacher_foreign` (`teacher_assigned_id`);

--
-- Indexes for table `mid_external_assigned`
--
ALTER TABLE `mid_external_assigned`
  ADD PRIMARY KEY (`assigned_id`),
  ADD UNIQUE KEY `uq_mid_external_assigned` (`assigned_s_id`,`assigned_ext_id`),
  ADD KEY `assigned_ext_id` (`assigned_ext_id`);

--
-- Indexes for table `mid_supervisor`
--
ALTER TABLE `mid_supervisor`
  ADD PRIMARY KEY (`mid_sup_marksid`),
  ADD KEY `mid_sup_teacher_foreign` (`teacher_assigned_id`);

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
  MODIFY `external_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `final_committee`
--
ALTER TABLE `final_committee`
  MODIFY `final_com_marksid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_committee_assigned`
--
ALTER TABLE `final_committee_assigned`
  MODIFY `assigned_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_external`
--
ALTER TABLE `final_external`
  MODIFY `final_com_marksid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_external_assigned`
--
ALTER TABLE `final_external_assigned`
  MODIFY `assigned_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_supervisor`
--
ALTER TABLE `final_supervisor`
  MODIFY `final_sup_marksid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_supervisor_assigned`
--
ALTER TABLE `final_supervisor_assigned`
  MODIFY `assigned_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mid_committee`
--
ALTER TABLE `mid_committee`
  MODIFY `mid_com_marksid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mid_committee_assigned`
--
ALTER TABLE `mid_committee_assigned`
  MODIFY `assigned_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mid_external`
--
ALTER TABLE `mid_external`
  MODIFY `mid_ext_marksid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mid_external_assigned`
--
ALTER TABLE `mid_external_assigned`
  MODIFY `assigned_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mid_supervisor`
--
ALTER TABLE `mid_supervisor`
  MODIFY `mid_sup_marksid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mid_supervisor_assigned`
--
ALTER TABLE `mid_supervisor_assigned`
  MODIFY `assigned_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
  ADD CONSTRAINT `final_comm_teacher_foreign` FOREIGN KEY (`teacher_assigned_id`) REFERENCES `mid_committee_assigned` (`assigned_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `final_ext_teacher_foreign` FOREIGN KEY (`teacher_assigned_id`) REFERENCES `mid_committee_assigned` (`assigned_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `final_sup_teacher_foreign` FOREIGN KEY (`teacher_assigned_id`) REFERENCES `mid_committee_assigned` (`assigned_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `techer_assigned_foreign` FOREIGN KEY (`teacher_assigned_id`) REFERENCES `mid_committee_assigned` (`assigned_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `mid_ext_teacher_foreign` FOREIGN KEY (`teacher_assigned_id`) REFERENCES `mid_committee_assigned` (`assigned_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `mid_sup_teacher_foreign` FOREIGN KEY (`teacher_assigned_id`) REFERENCES `mid_committee_assigned` (`assigned_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
