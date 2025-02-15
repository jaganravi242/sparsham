-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 08:01 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
  `no_of_donation` int(11) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `description` varchar(50) NOT NULL,
  `blood_donation_status` int(3) NOT NULL DEFAULT 0,
  `donation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_donation`
--

INSERT INTO `blood_donation` (`blood_donation_id`, `email`, `no_of_bottle`, `no_of_donation`, `blood_group`, `description`, `blood_donation_status`, `donation_date`) VALUES
(1, 'aliyas123@gmail.com', 5, 5, 'O+', 'jhghgsdh kjbsjkbns cnksbib', 3, '2021-11-24 18:09:04'),
(2, 'public@mail.com', 20, 6, 'O-ve', 'blood donation', 1, '2021-11-27 12:18:25'),
(3, 'public@mail.com', 31, 0, 'O-ve', 'blood donation', 2, '2021-11-27 12:29:05'),
(4, 'public@mail.com', 13, 0, 'O-ve', 'blood donation', 0, '2021-12-08 16:41:58'),
(5, 'public@mail.com', 4, 0, 'O+', 'Within 24 Hour', 0, '2021-12-08 18:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `blood_donation_list`
--

CREATE TABLE `blood_donation_list` (
  `donation_id` int(11) NOT NULL,
  `blood_donation_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_donation_list`
--

INSERT INTO `blood_donation_list` (`donation_id`, `blood_donation_id`, `email`) VALUES
(50, 2, 'jaganravi242@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `sender_email` varchar(50) NOT NULL,
  `reciever_email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `chat_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `sender_email`, `reciever_email`, `message`, `chat_time`) VALUES
(1, 'public@mail.com', 'jaganravi012@gmail.com', 'hi', '2021-12-07 18:59:52'),
(2, 'public@mail.com', 'jaganravi012@gmail.com', 'hello', '2021-12-07 19:04:05'),
(3, 'jaganravi012@gmail.com', 'public@mail.com', 'jhjhh', '2021-12-07 19:42:38');

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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(30) NOT NULL,
  `event_discription` text NOT NULL,
  `event_date` date NOT NULL,
  `expected_students` int(11) NOT NULL,
  `accepted_students` int(11) NOT NULL DEFAULT 0,
  `event_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_discription`, `event_date`, `expected_students`, `accepted_students`, `event_status`) VALUES
(1, 'wqee', 'we', '2021-12-09', 22, 1, 1),
(2, 'wqee', 'we', '2021-12-09', 22, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_list`
--

CREATE TABLE `event_list` (
  `event_list_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_list`
--

INSERT INTO `event_list` (`event_list_id`, `event_id`, `email`) VALUES
(1, 1, 'jaganravi242@gmail.com'),
(2, 2, 'jaganravi242@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `food_donation`
--

CREATE TABLE `food_donation` (
  `food_donation_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_of_packets` int(11) NOT NULL,
  `no_of_donations` int(11) NOT NULL,
  `donation_name` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `food_donation_status` int(3) NOT NULL DEFAULT 0,
  `donation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_donation`
--

INSERT INTO `food_donation` (`food_donation_id`, `email`, `no_of_packets`, `no_of_donations`, `donation_name`, `description`, `food_donation_status`, `donation_date`) VALUES
(1, 'public@mail.com', 55, 55, 'donation 1', 'food donation', 3, '2021-11-27 12:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `food_donation_list`
--

CREATE TABLE `food_donation_list` (
  `donation_id` int(11) NOT NULL,
  `food_donation_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_donation_list`
--

INSERT INTO `food_donation_list` (`donation_id`, `food_donation_id`, `email`) VALUES
(19, 1, 'jaganravi242@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_donation`
--

CREATE TABLE `inventory_donation` (
  `donation_id` int(11) NOT NULL,
  `donation_name` varchar(30) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_required` int(11) NOT NULL,
  `item_collected` int(11) NOT NULL,
  `discription` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `donation_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory_donation`
--

INSERT INTO `inventory_donation` (`donation_id`, `donation_name`, `item_name`, `item_required`, `item_collected`, `discription`, `email`, `donation_status`) VALUES
(1, 'qwewweq', 'qewqewew', 11, 1, 'aswqadsads', 'public@mail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_donation_list`
--

CREATE TABLE `inventory_donation_list` (
  `id` int(11) NOT NULL,
  `donation_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory_donation_list`
--

INSERT INTO `inventory_donation_list` (`id`, `donation_id`, `email`) VALUES
(1, 1, 'public@mail.com');

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
('jaganravi012@gmail.com', 'secratary', 0),
('jaganravi242@gmail.com', 'student', 1),
('jishnugopalan2000@gmail.com', 'student', 1),
('public@mail.com', 'public', 0);

-- --------------------------------------------------------

--
-- Table structure for table `money_donation`
--

CREATE TABLE `money_donation` (
  `money_donation_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `requested_amount` int(11) NOT NULL,
  `collected_amount` int(11) NOT NULL DEFAULT 0,
  `donation_name` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `money_donation_status` int(3) NOT NULL DEFAULT 0,
  `donation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `money_donation`
--

INSERT INTO `money_donation` (`money_donation_id`, `email`, `requested_amount`, `collected_amount`, `donation_name`, `description`, `money_donation_status`, `donation_date`) VALUES
(1, 'public@mail.com', 1000, 1500, 'donation 1', 'money donation', 3, '2021-11-27 13:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `money_donation_list`
--

CREATE TABLE `money_donation_list` (
  `donation_id` int(11) NOT NULL,
  `money_donation_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `money_donation_list`
--

INSERT INTO `money_donation_list` (`donation_id`, `money_donation_id`, `email`, `amount`) VALUES
(5, 1, 'jaganravi242@gmail.com', 1500);

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
('Jagan Ravi', 'jaganravi012@gmail.com', 8089355672, '', '', '', '', 0, 0, 0, 0, '../images/avathar.jpg'),
('Jagan Ravi', 'jaganravi242@gmail.com', 8089355672, 'Male', '1999-01-12', 'Ottukunnel House', 'VELLATHOOVAL PO', 1, 1, 1, 685563, '../images/avathar.jpg'),
('Jishnu Gopalan', 'jishnugopalan2000@gmail.com', 7994245510, 'Male', '1999-03-11', 'dgffg', 'sdfsdf', 1, 1, 1, 686691, '../images/avathar.jpg'),
('werty', 'public@mail.com', 8089355672, '', '', '', '', 0, 0, 0, 0, '../images/avathar.jpg'),
('secratery', 'secratery123@mail.com', 8089355672, '', '', '', '', 0, 0, 0, 0, '../images/avathar.jpg'),
('secratery', 'secratery@mail.com', 123456789, '', '', '', '', 0, 0, 0, 0, '../images/avathar.jpg');

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
(2, 'jishnugopalan2000@gmail.com', 'uploads/jishnu.jpg'),
(3, 'jaganravi242@gmail.com', 'uploads/Controlflow.docx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_donation`
--
ALTER TABLE `blood_donation`
  ADD PRIMARY KEY (`blood_donation_id`);

--
-- Indexes for table `blood_donation_list`
--
ALTER TABLE `blood_donation_list`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

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
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_list`
--
ALTER TABLE `event_list`
  ADD PRIMARY KEY (`event_list_id`);

--
-- Indexes for table `food_donation`
--
ALTER TABLE `food_donation`
  ADD PRIMARY KEY (`food_donation_id`);

--
-- Indexes for table `food_donation_list`
--
ALTER TABLE `food_donation_list`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `inventory_donation`
--
ALTER TABLE `inventory_donation`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `inventory_donation_list`
--
ALTER TABLE `inventory_donation_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `money_donation`
--
ALTER TABLE `money_donation`
  ADD PRIMARY KEY (`money_donation_id`);

--
-- Indexes for table `money_donation_list`
--
ALTER TABLE `money_donation_list`
  ADD PRIMARY KEY (`donation_id`);

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
  MODIFY `blood_donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blood_donation_list`
--
ALTER TABLE `blood_donation_list`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_list`
--
ALTER TABLE `event_list`
  MODIFY `event_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food_donation`
--
ALTER TABLE `food_donation`
  MODIFY `food_donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food_donation_list`
--
ALTER TABLE `food_donation_list`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `inventory_donation`
--
ALTER TABLE `inventory_donation`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory_donation_list`
--
ALTER TABLE `inventory_donation_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `money_donation`
--
ALTER TABLE `money_donation`
  MODIFY `money_donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `money_donation_list`
--
ALTER TABLE `money_donation_list`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `verification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
