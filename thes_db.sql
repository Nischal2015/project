-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 01, 2021 at 11:58 AM
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
(5, 'genius', '$2y$10$k7AL006K51eqCnQyRSbOReNoe/jNDgEkOsI0QVPqYfefepQZ1IlTm', '2021-07-23 18:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(7) NOT NULL,
  `student_fname` text NOT NULL,
  `student_lname` text NOT NULL,
  `student_roll` varchar(12) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_gender` text NOT NULL,
  `student_regdate` date NOT NULL,
  `student_thesis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_fname`, `student_lname`, `student_roll`, `student_email`, `student_gender`, `student_regdate`, `student_thesis`) VALUES
(31, 'milan', 'shrestha', '075bct050', 'hfh@h.com', 'Male', '2021-08-01', 'demo'),
(32, 'jhgjh', 'ijhj', '45', 'fdhfj', 'khg', '2021-08-03', 'hfjhgb'),
(33, 'dfgdfg', 'dfgsdfg', '89489', 'sdfas@gmail.comsd', 'Male', '2021-08-01', 'qkjwdhfkjsa'),
(34, 'dfgdfg', 'dfgsdfg', '89489', 'sdfas@gmail.comsd', 'Male', '2021-08-01', 'qkjwdhfkjsa'),
(35, 'dfgdfg', 'dfgsdfg', '89489', 'sdfas@gmail.comsd', 'Male', '2021-08-01', 'qkjwdhfkjsa'),
(36, 'dfgdfg', 'dfgsdfg', '89489', 'sdfas@gmail.comsd', 'Male', '2021-08-01', 'qkjwdhfkjsa'),
(37, 'dfgdfg', 'dfgsdfg', '89489', 'sdfas@gmail.comsd', 'Male', '2021-08-01', 'qkjwdhfkjsa'),
(38, 'dfgdfg', 'dfgsdfg', '89489', 'sdfas@gmail.comsd', 'Male', '2021-08-01', 'qkjwdhfkjsa');

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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
