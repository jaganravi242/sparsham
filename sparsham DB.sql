-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 08:00 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparsham`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_donation`
--

CREATE TABLE `blood_donation` (
  `blood_donation_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_of_bottle` int(11) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `description` varchar(50) NOT NULL,
  `blood_donation_status` int(3) NOT NULL DEFAULT 0,
  `donation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_donation`
--

INSERT INTO `blood_donation` (`blood_donation_id`, `email`, `no_of_bottle`, `blood_group`, `description`, `blood_donation_status`, `donation_date`) VALUES
(1, 'aliyas123@gmail.com', 5, 'O+', 'jhghgsdh kjbsjkbns cnksbib', 1, '2021-11-24 18:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country`) VALUES
(1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `state_id`, `district`) VALUES
(1, 1, 'Ernakulam');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `usertype`, `status`) VALUES
('admin123@gmail.com', 'admin', 1),
('aliyas123@gmail.com', 'public', 0),
('harsha@gmail.com', 'secratary', 0),
('jishnugopalan2000@gmail.com', 'student', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` varchar(20) NOT NULL,
  `house` varchar(80) NOT NULL,
  `place` varchar(80) NOT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `pincode` int(6) NOT NULL,
  `profile_pic` varchar(100) NOT NULL DEFAULT '../images/avathar.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`name`, `email`, `phone`, `gender`, `date_of_birth`, `house`, `place`, `country`, `state`, `district`, `pincode`, `profile_pic`) VALUES
('Aliys', 'aliyas123@gmail.com', 9778146653, '', '', '', '', 0, 0, 0, 0, '../images/avathar.jpg'),
('Harsha', 'harsha@gmail.com', 7994245510, '', '', '', '', 0, 0, 0, 0, '../images/avathar.jpg'),
('Jishnu Gopalan', 'jishnugopalan2000@gmail.com', 7994245510, 'Male', '1999-03-11', 'dgffg', 'sdfsdf', 1, 1, 1, 686691, '../images/avathar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `country_id`, `state`) VALUES
(1, 1, 'Kerala');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `verification_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_card` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`verification_id`, `email`, `id_card`) VALUES
(2, 'jishnugopalan2000@gmail.com', 'uploads/jishnu.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_donation`
--
ALTER TABLE `blood_donation`
  ADD PRIMARY KEY (`blood_donation_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`verification_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_donation`
--
ALTER TABLE `blood_donation`
  MODIFY `blood_donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `verification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
