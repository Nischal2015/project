-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 03, 2021 at 08:49 AM
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
  `external_id` int(7) NOT NULL,
  `external_fname` varchar(20) NOT NULL,
  `external_lname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(5) NOT NULL,
  `student_fname` text NOT NULL,
  `student_lname` text NOT NULL,
  `student_roll` varchar(12) NOT NULL,
  `student_gender` text NOT NULL,
  `student_regdate` date NOT NULL,
  `student_year` int(4) NOT NULL,
  `student_dep` varchar(30) NOT NULL,
  `student_thesis` varchar(255) NOT NULL,
  `ext_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_fname`, `student_lname`, `student_roll`, `student_gender`, `student_regdate`, `student_year`, `student_dep`, `student_thesis`, `ext_id`) VALUES
(41, 'Shubham', 'Singh', '077BCT158', 'Male', '2021-08-01', 2077, 'Electronics & Communi­cation', 'Public health status in urban areas', NULL),
(43, 'Nischal', 'Shakya', '075BCT055', 'Male', '2021-08-01', 2075, 'Electronics & Communi­cation', 'being productive', NULL),
(45, 'Ramesh', 'Pandey', '076BCT076', 'Male', '2021-06-19', 2076, 'Mechanical', 'Research on panda', NULL),
(46, 'Milan', 'Shrestha', '075BCT050', 'Male', '2021-07-07', 2075, 'Science & Humanities', 'Dom Manipulation using jQuery', NULL),
(47, 'Nitesh', 'Swarnakar', '076BCT058', 'Male', '2021-05-03', 2076, 'Electronics & Communi­cation', 'Understanding Blender objects', NULL),
(48, 'Roshan', 'Subedi', '078BCT068', 'Male', '2021-08-01', 2078, 'Science & Humanities', 'How teachers are chosen in college', NULL),
(50, 'Rita', 'Shah', '077BCD98', 'Female', '2021-08-10', 2077, 'Architecture', 'Arch', NULL),
(51, 'Nabina', 'Thapa', '076ARC456', 'Female', '2020-06-02', 2076, 'Science & Humanities', 'Welfaring society', NULL),
(52, 'Sita', 'Gautam', '078BCE159', 'Female', '2021-08-31', 2078, 'Civil', 'Building blocks', NULL),
(53, 'Akash', 'Joshi', '075bct489', 'Male', '2021-08-23', 2075, 'Electrical', 'Testing the thesis', NULL),
(54, 'Suresh', 'Magar', '078BCE554', 'Male', '2021-08-03', 2078, 'Electrical', 'Electrical resistance decrease', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(5) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `teacher_assigned`
--

CREATE TABLE `teacher_assigned` (
  `assigned_id` int(5) NOT NULL,
  `assigned_s_id` int(5) DEFAULT NULL,
  `assigned_teacher_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_assigned`
--

INSERT INTO `teacher_assigned` (`assigned_id`, `assigned_s_id`, `assigned_teacher_id`) VALUES
(11, 53, 2),
(12, 53, 4),
(13, 53, 6),
(14, 43, 7),
(15, 43, 9),
(16, 43, 8);

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
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `ext_id` (`ext_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_assigned`
--
ALTER TABLE `teacher_assigned`
  ADD PRIMARY KEY (`assigned_id`),
  ADD KEY `student id foreign` (`assigned_s_id`),
  ADD KEY `teacher id foreign` (`assigned_teacher_id`);

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
  MODIFY `dep_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teacher_assigned`
--
ALTER TABLE `teacher_assigned`
  MODIFY `assigned_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`ext_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `teacher_assigned`
--
ALTER TABLE `teacher_assigned`
  ADD CONSTRAINT `student id foreign` FOREIGN KEY (`assigned_s_id`) REFERENCES `students` (`student_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `teacher id foreign` FOREIGN KEY (`assigned_teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
