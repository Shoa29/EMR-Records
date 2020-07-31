-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2019 at 09:02 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autumnhacks`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `temp3` varchar(30) DEFAULT NULL,
  `temp4` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `category`, `location`, `name`, `temp3`, `temp4`) VALUES
(1, 'bipul', '123456', 'medical', 'phagwara', 'Bipul poudel', ' ', ' '),
(2, 'subham', '123456', 'emergency', 'phagwara', 'Subham Jaguri', ' ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(30) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `content` varchar(30) NOT NULL,
  `temp1` varchar(30) NOT NULL,
  `temp2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `userid`, `content`, `temp1`, `temp2`) VALUES
(3, 'bipul', 'docs/driving.jpg', ' ', ' '),
(4, 'bipul', 'docs/DrivingInsurance.jpg', ' ', ' '),
(5, 'bipul', 'docs/pollutionCertificate.jpg', ' ', ' '),
(6, 'bipul', 'docs/rc.jpg', ' ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `latlong`
--

CREATE TABLE `latlong` (
  `name` varchar(30) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `id` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latlong`
--

INSERT INTO `latlong` (`name`, `latitude`, `longitude`, `id`) VALUES
('phagwara', '31.224020', '75.770798', NULL),
('ludhiana', '30.900965', '75.857277', NULL),
('delhi', '28.610001', '77.230003', NULL),
('delhi', '28.610001', '77.230003', NULL),
('nepal', ' 27.700769', '85.300140', NULL),
('nepal2', ' 27.700786', '85.300982', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `longlat`
--

CREATE TABLE `longlat` (
  `id` int(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `userid` varchar(30) DEFAULT NULL,
  `latitude` varchar(30) DEFAULT NULL,
  `longitude` varchar(30) DEFAULT NULL,
  `temp1` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `longlat`
--

INSERT INTO `longlat` (`id`, `name`, `userid`, `latitude`, `longitude`, `temp1`) VALUES
(1, 'delhi', 'devraj', '28.610001', '77.230003', NULL),
(3, 'ludhiana', 'prathik', '30.900965', '75.857277', NULL),
(4, 'kathmandu', 'biraj', '27.700769', '85.300140', NULL),
(5, 'bhw', 'laxman', '27.700786', '85.300982', NULL),
(6, 'phagwara', 'subham', '31.224020', '75.770798', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(30) NOT NULL,
  `userid` varchar(30) DEFAULT NULL,
  `content` varchar(300) DEFAULT NULL,
  `seen` varchar(30) DEFAULT NULL,
  `temp1` varchar(30) DEFAULT NULL,
  `temp2` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `userid`, `content`, `seen`, `temp1`, `temp2`) VALUES
(53, ' ', ' There is an emergency case at Loction : latitude = 31.1471305 and Longitude = 75.34121789999999  ', 'unseen', ' ', ' '),
(54, ' ', ' There is an emergency case at Loction : latitude = 31.1471305 and Longitude = 75.34121789999999  ', 'unseen', ' ', ' '),
(55, ' ', ' There is an emergency case at Loction : latitude = 31.1471305 and Longitude = 75.34121789999999  ', 'unseen', ' ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `mname` varchar(30) DEFAULT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `dob` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `image` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `verify` varchar(30) DEFAULT NULL,
  `temp4` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `mname`, `fname`, `password`, `dob`, `address`, `gender`, `phone`, `image`, `email`, `verify`, `temp4`) VALUES
(6, 'Bipul poudel', 'bipul', 'mammi', 'Bipul', '123456', '20/02/2000', 'Bh5,lpu', 'female', '09814270489', 'img/pofile.jpg', 'bipul@123456', '<font color=red > Not verified', ' '),
(7, 'Bipul poudel', 'pinnu', 'mammi', 'Bipul', '123456', '20/02/2000', 'Bh5,lpu', 'male', '09814270489', 'bipul', 'bipul@123456', '<font color=red > Not verified', ' '),
(8, 'prince babu', 'pinnu', 'mammi', 'papa', '123456', '20/02/2000', 'Bh5,lpu', 'male', '09814270489', 'img/pofile.jpg', 'bipul@123456', '<font color=red > Not verified', ' ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `longlat`
--
ALTER TABLE `longlat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `longlat`
--
ALTER TABLE `longlat`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
