-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 08:20 AM
-- Server version: 8.1.0
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii_basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `phone_no` varchar(14) NOT NULL,
  `profile_pic` varchar(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `phone_no`, `profile_pic`, `password`, `created_at`) VALUES
(7, 'Test Name', 'testname@gmail.com', '9608798989', 'testname.jpg', '1234', '2023-10-18 00:13:58'),
(8, 'Remo', 'remo@gmail.com', '9800990909', '1596568261.png', '989898', '2020-08-04 19:11:01'),
(10, 'DSSR', 'dssr@gmail.com', '7800098009', '1596568347.png', '0909', '2020-08-04 19:12:27'),
(16, 'Code Improve', 'code@gmail.com', '9090909090', 'test.png', '12345678', '2020-11-07 10:43:15'),
(17, 'real data', 'real@gmail.com', '9087891191', 'real.jpg', 'Facebook', '2020-11-08 09:52:52'),
(21, 'Pallavi Gope', 'pallavi@gmail.com', '7970668997', 'pallavi.jpg', '1234', '2023-10-18 00:11:18'),
(25, 'Test Name 2', 'testname2@gmail.com', '7876767676', 'testname.jpg', '1234', '2023-10-18 01:01:26'),
(26, 'Test Name 3', 'testname3@gmail.com', '7876237676', 'testname3.jpg', '1234', '2023-10-18 01:01:44'),
(27, 'Test Name', 'testname@gmail.com', '9090909090', '1698466181.jpg', '1234', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `student_id`, `name`, `created_at`) VALUES
(1, 7, 'Math', '2020-07-10 19:23:51'),
(2, 7, 'Science', '2020-07-10 19:23:51'),
(3, 8, 'Science', '2020-07-10 19:23:51'),
(4, 8, 'Hindi', '2020-07-10 19:23:51'),
(5, 8, 'SST', '2020-07-10 19:23:51'),
(6, 8, 'ECO', '2020-07-10 19:23:51'),
(7, 4, 'GK', '2020-07-10 19:23:51'),
(8, 4, 'ENGLISH', '2020-07-10 19:23:51'),
(9, 4, 'COM', '2020-07-10 19:23:51'),
(10, 4, 'Hindi', '2020-07-10 19:23:51'),
(11, 4, 'SST', '2020-07-10 19:23:51'),
(12, 1, 'Science', '2020-07-10 19:23:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
