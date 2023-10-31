-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 09:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar_events`
--

CREATE TABLE `calendar_events` (
  `id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `file_requests`
--

CREATE TABLE `file_requests` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `requested_file` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_requests`
--

INSERT INTO `file_requests` (`id`, `student_name`, `student_email`, `requested_file`, `status`) VALUES
(14, 'Kurt Allen Santos', 'kurtalln@gmail.com', 'RevForm', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `headupload`
--

CREATE TABLE `headupload` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `file_content` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `partner_profiles`
--

CREATE TABLE `partner_profiles` (
  `id` int(11) NOT NULL,
  `partner_name` varchar(255) NOT NULL,
  `partner_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partner_profiles`
--

INSERT INTO `partner_profiles` (`id`, `partner_name`, `partner_description`, `created_at`) VALUES
(1, 'Sprawtshaw College', 'College in Canada ', '2023-10-27 04:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `stud_visa`
--

CREATE TABLE `stud_visa` (
  `ID` int(11) NOT NULL,
  `COLLEGE` varchar(255) DEFAULT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `SEX` varchar(10) DEFAULT NULL,
  `AGE` int(11) DEFAULT NULL,
  `BIRTHDAY` date DEFAULT NULL,
  `NATIONALITY` varchar(255) DEFAULT NULL,
  `ADDRESS` varchar(255) DEFAULT NULL,
  `GUARDIAN` varchar(255) DEFAULT NULL,
  `CONTACT_NO_GUARDIAN` varchar(15) DEFAULT NULL,
  `COURSE` varchar(255) DEFAULT NULL,
  `CONTACT_NO_STUDENT` varchar(15) DEFAULT NULL,
  `PASSPORT_NUMBER` varchar(255) DEFAULT NULL,
  `DATE_OF_ISSUE` date DEFAULT NULL,
  `DATE_OF_EXPIRATION` date DEFAULT NULL,
  `VISA_EXPIRATION` date DEFAULT NULL,
  `DATE_OF_ADMISSION` date DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL,
  `STUDENT_NO` varchar(255) DEFAULT NULL,
  `RECORD` varchar(255) DEFAULT NULL,
  `VISA_STATUS_PASSPORT` varchar(50) DEFAULT NULL,
  `VISA_STATUS_PASSPORT_DESCRIPTION` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files`
--

CREATE TABLE `uploaded_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `file_content` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `phone`, `email`, `password`, `type`) VALUES
(10, 'Charlyn', 'Rosales', '9916196596', 'charlynrosales@gmail.ccom', 'Rosales', 'Director'),
(11, 'Dianne Trixie', 'Arceo', '999999999', 'diannetrixieareco@gmail.com', 'qweewr', 'Head'),
(14, 'Laurence', 'Idanio', '987654322', 'laurenceidanio@gmail.com', 'laurence', 'Clerk'),
(21, 'Jonald', 'Acosta', '09994567036', 'jonald.acosta.c@bulsu.edu.ph', 'Acosta', 'Admin'),
(22, 'Gillian', 'Eligio', '987435522', 'gilian@gmail.com', 'Eligio', 'Clerk'),
(23, 'Kurt Allen', 'Santos', '987435522', 'kurtalln@gmail.com', 'Santos', 'Students');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar_events`
--
ALTER TABLE `calendar_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_requests`
--
ALTER TABLE `file_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headupload`
--
ALTER TABLE `headupload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_profiles`
--
ALTER TABLE `partner_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_visa`
--
ALTER TABLE `stud_visa`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar_events`
--
ALTER TABLE `calendar_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `file_requests`
--
ALTER TABLE `file_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `headupload`
--
ALTER TABLE `headupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partner_profiles`
--
ALTER TABLE `partner_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stud_visa`
--
ALTER TABLE `stud_visa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
