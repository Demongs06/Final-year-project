-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 04:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `veh_up` varchar(255) NOT NULL,
  `tow_charge` varchar(255) NOT NULL,
  `up_cost` varchar(255) NOT NULL,
  `total_cost` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `full_name`, `veh_up`, `tow_charge`, `up_cost`, `total_cost`, `paid`) VALUES
(3, 'nikhil', 'nvjkxn', '0', '1000', '1000', '1'),
(4, 'soham', 'ds c d', '100', '1000', '1100', '1'),
(5, 'sanket', 'dfvdf', '100', '1200', '1300', '1'),
(7, 'pop', 'abcs', '100', '5000', '5100', ''),
(8, 'jayant', 'engine', '100', '10000', '10100', '1'),
(9, 'dtrhtgc', 'jekjnfkjdslk', '100', '100', '200', '1'),
(10, 'abc', 'engone', '0', '1000', '100', '1');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driverid` int(11) NOT NULL,
  `drname` varchar(255) NOT NULL,
  `drjoin` varchar(255) NOT NULL,
  `drmobile` varchar(20) NOT NULL,
  `drlicense` varchar(30) NOT NULL,
  `drlicensevalid` varchar(100) NOT NULL,
  `draddress` varchar(255) NOT NULL,
  `dr_available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driverid`, `drname`, `drjoin`, `drmobile`, `drlicense`, `drlicensevalid`, `draddress`, `dr_available`) VALUES
(1, 'Amit', '08/06/2022', '9998887770', 'MH00 111222333444', '08/02/2040', ' 301, sagar nagar,\r\npanvel\r\n410206.', 0),
(2, 'Harsh', '08/07/2022', '9876543210', 'MH00 999888777666', '07/05/2043', '142, siddhi building,\r\nUran,\r\n400701 ', 0),
(3, 'Gaurav', '08/31/2022', '9012678315', 'MH00 991177335500', '09/04/2055', ' 273,  Chirner,\r\nUran,\r\n400702', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `u_name`, `email`, `mobile`, `review`) VALUES
(1, 'soham', 'sohamgaikwad06@gmail.com', '7738313326', 'very nice service.');

-- --------------------------------------------------------

--
-- Table structure for table `mechanic`
--

CREATE TABLE `mechanic` (
  `mecname` varchar(255) NOT NULL,
  `mecjoin` varchar(255) NOT NULL,
  `mecmobile` varchar(20) NOT NULL,
  `mecexp` varchar(255) NOT NULL,
  `mecaddress` varchar(255) NOT NULL,
  `mec_available` int(11) NOT NULL,
  `mechanicid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mechanic`
--

INSERT INTO `mechanic` (`mecname`, `mecjoin`, `mecmobile`, `mecexp`, `mecaddress`, `mec_available`, `mechanicid`) VALUES
('Raj', '08/22/2022', '7894561230', '7y', ' 329,\r\nchirner,\r\n400702', 0, 1),
('nikesh', '08/18/2022', '8624931705', '5y', ' 329, Siddhi Building\r\nUran,\r\n400701', 0, 2),
('Prem', '08/28/2022', '9632147850', '4y', ' 612, sagar nagar,\r\npanvel,\r\n410206', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `location` varchar(255) NOT NULL,
  `confirmation` int(11) NOT NULL,
  `driverid` int(11) NOT NULL,
  `finished` int(11) NOT NULL,
  `mechanicid` int(11) NOT NULL,
  `paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `full_name`, `email`, `mobile`, `location`, `confirmation`, `driverid`, `finished`, `mechanicid`, `paid`) VALUES
(3, 'nikhil', 'nik123@gmail.com', '1236549870', 'panvel', 1, 1, 1, 1, 1),
(4, 'soham', 'sohamgaikwad06@gmail.com', '7738313326', 'kalambusare', 1, 3, 1, 3, 1),
(5, 'sanket', 'sj36@gmail.com', '3484131815', 'kjsdnkfjd', 1, 1, 1, 1, 1),
(6, 'kay', 'kayec43766@ukgent.com', '4654345', 'hjjhjhbhj', 1, 1, 1, 1, 1),
(7, 'pop', 'xggcgg@09', '468413546', 'jfdfk', 1, 3, 1, 2, 1),
(8, 'jayant', 'jayantkamble488@gmail.com', '1234567890', 'jasai', 1, 2, 1, 2, 1),
(9, 'dtrhtgc', 'vhhchjfcjy@kvmhfv', '68486134', 'jyvjych', 1, 3, 1, 3, 1),
(10, 'abc', 'abcd@gmail.com', '1234567890', 'wsad', 1, 2, 1, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driverid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mechanic`
--
ALTER TABLE `mechanic`
  ADD PRIMARY KEY (`mechanicid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driverid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mechanic`
--
ALTER TABLE `mechanic`
  MODIFY `mechanicid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
