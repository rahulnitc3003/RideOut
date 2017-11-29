-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2017 at 11:42 AM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id1068737_rideout`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `ride_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `ride_id`) VALUES
(1, 1),
(174, 181),
(177, 182);

-- --------------------------------------------------------

--
-- Table structure for table `carowner`
--

CREATE TABLE `carowner` (
  `oauth_provider` varchar(255) NOT NULL,
  `oauth_uid` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carowner`
--

INSERT INTO `carowner` (`oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `picture`) VALUES
('google', '113896374515202488338', 'Diwakar', 'Prajapati', 'diwakar2k10@gmail.com', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg'),
('humhai', 'hamariid', 'hum', 'tum', 'humtum@gmail.com', 'perfect.jpg'),
('google', '112488956762366918887', 'Lakshit', 'Garg', 'lgarg123@gmail.com', 'https://lh5.googleusercontent.com/-7ubXDCGFL2s/AAAAAAAAAAI/AAAAAAAAH1s/YY7vZ5dXb9s/photo.jpg'),
('google', '103845691284819729982', 'Pratyush', 'Agarwal', 'pratyushagarwal3@gmail.com', 'https://lh4.googleusercontent.com/-5iUZD3c7UdY/AAAAAAAAAAI/AAAAAAAAArs/Aqodl9avrJk/photo.jpg'),
('google', '105403090574881316256', 'rahul', 'kumar', 'rahulnitc3003@gmail.com', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg'),
('google', '104177842580817757452', 'rahul', 'kumar', 'rjrahulabc30@gmail.com', 'https://lh6.googleusercontent.com/-pi4c3E5bkvI/AAAAAAAAAAI/AAAAAAAATFc/_WU8A9mEKnU/photo.jpg'),
('google', '102007952580788003563', 'rutheerles', 'alves', 'rutherles@gmail.com', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg'),
('google', '114765125199914707696', 'shivam', 'agarwal', 'shivam00123456@gmail.com', 'https://lh6.googleusercontent.com/-Upi5T5_Xeco/AAAAAAAAAAI/AAAAAAAACAU/YcSd7w5ltjs/photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `copassenger`
--

CREATE TABLE `copassenger` (
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `uid` bigint(12) NOT NULL,
  `contact_no` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `copassenger`
--

INSERT INTO `copassenger` (`first_name`, `last_name`, `email`, `password`, `address`, `uid`, `contact_no`) VALUES
('1', '1', 'as@gmail.com', '', '', 0, ''),
('rahul', 'raj', 'lgarg1994@gmail.com', '123456', 'nitc', 123456765434, '9876478645'),
('Pratyush', 'Agarwal', 'pratyushagarwal3@gmail.com', '123456', 'MBH NITC', 987654543213, '9876478645'),
('rahul', 'kumar', 'rjrahulabc30@gmail.com', '999999', 'nitc', 123456789091, '9878765098'),
('brendo', 'rutherles', 'rutherles@gmail.com', 'br1996', 'av 2', 345676543790, '8988553793'),
('shivam', 'agarwal', 'shivam00123@gmail.com', '123456', 'ffers', 256352014852, '09455036173');

-- --------------------------------------------------------

--
-- Table structure for table `journey`
--

CREATE TABLE `journey` (
  `journey_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `car_no` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `doj` varchar(10) NOT NULL,
  `seats_avail` varchar(255) NOT NULL,
  `mobno` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journey`
--

INSERT INTO `journey` (`journey_id`, `email`, `car_no`, `source`, `destination`, `doj`, `seats_avail`, `mobno`) VALUES
(1, 'humtum@gmail.com', '1', '', '', '', '', 0),
(113, 'rjrahulabc30@gmail.com', 'UP-09xf-3453', 'Kanpur', 'Lucknow', '10/31/2017', '2', 9998877777),
(114, 'pratyushagarwal3@gmail.com', 'jh-99ed-1234', 'kanpur', 'kolkata', '10/31/2017', '1', 9988776655);

-- --------------------------------------------------------

--
-- Table structure for table `ride`
--

CREATE TABLE `ride` (
  `ride_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `seats_book` int(11) DEFAULT NULL,
  `doj` varchar(10) DEFAULT NULL,
  `journey_id` int(11) NOT NULL,
  `mobno` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ride`
--

INSERT INTO `ride` (`ride_id`, `email`, `source`, `destination`, `seats_book`, `doj`, `journey_id`, `mobno`) VALUES
(1, 'as@gmail.com', NULL, NULL, NULL, NULL, 1, 0),
(181, 'rjrahulabc30@gmail.com', 'Kanpur', 'Lucknow', 1, '10/31/2017', 113, 9998877777),
(182, 'pratyushagarwal3@gmail.com', 'Kanpur', 'Lucknow', 1, '10/31/2017', 113, 9998877777);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `ride_id` (`ride_id`);

--
-- Indexes for table `carowner`
--
ALTER TABLE `carowner`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `copassenger`
--
ALTER TABLE `copassenger`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `journey`
--
ALTER TABLE `journey`
  ADD PRIMARY KEY (`journey_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`ride_id`),
  ADD KEY `email` (`email`),
  ADD KEY `journey_id` (`journey_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT for table `journey`
--
ALTER TABLE `journey`
  MODIFY `journey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `ride`
--
ALTER TABLE `ride`
  MODIFY `ride_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`ride_id`) REFERENCES `ride` (`ride_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `journey`
--
ALTER TABLE `journey`
  ADD CONSTRAINT `journey_ibfk_1` FOREIGN KEY (`email`) REFERENCES `carowner` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journey_ibfk_2` FOREIGN KEY (`email`) REFERENCES `carowner` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ride`
--
ALTER TABLE `ride`
  ADD CONSTRAINT `ride_ibfk_1` FOREIGN KEY (`journey_id`) REFERENCES `journey` (`journey_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ride_ibfk_2` FOREIGN KEY (`email`) REFERENCES `copassenger` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
