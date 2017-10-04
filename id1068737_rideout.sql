-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 04, 2017 at 08:28 PM
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
(143, 142);

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
('google', '107041567579407447717', 'Mohammad', 'Arsh', '0786mohdarsh@gmail.com', 'https://lh6.googleusercontent.com/-WHjXf0x64t4/AAAAAAAAAAI/AAAAAAAAACs/O08vtOKq1k4/photo.jpg'),
('google', '106922515745734454290', 'raushan', 'jha', '20raushanaryan@gmail.com', 'https://lh6.googleusercontent.com/-CCsM7Wiq800/AAAAAAAAAAI/AAAAAAAAABg/XOh97mgbPTI/photo.jpg'),
('google', '101090126343641555684', 'HARSH', 'VERMA', '66vermaharsh@gmail.com', 'https://lh5.googleusercontent.com/-LcUWebwBj0g/AAAAAAAAAAI/AAAAAAAAADA/muhLG5Gd-30/photo.jpg'),
('google', '104259148824240844594', 'Amit', 'kumar', 'amitamora@gmail.com', 'https://lh5.googleusercontent.com/-vm_66c6hPcw/AAAAAAAAAAI/AAAAAAAAAq0/lt4f-O8Uhf4/photo.jpg'),
('google', '115434019246655960549', 'Avnish', 'Agr', 'avnishagr@gmail.com', 'https://lh4.googleusercontent.com/-sBwarVY4FpQ/AAAAAAAAAAI/AAAAAAAABfo/1SKRhP_jfUA/photo.jpg'),
('google', '115881888418483421042', 'Bishakha', 'Kumari', 'bishakhapriyam14@gmail.com', 'https://lh6.googleusercontent.com/-3wW5KEyoJBA/AAAAAAAAAAI/AAAAAAAAAFQ/v-WmYFN_88k/photo.jpg'),
('google', '101305152673463314682', 'Harsh', 'verma', 'itamannarocks@gmail.com', 'https://lh5.googleusercontent.com/-JdqviUdeYDg/AAAAAAAAAAI/AAAAAAAAACQ/AhQqCmERxkg/photo.jpg'),
('google', '116834226010522968846', 'Jyoti', 'Pandey', 'jyotipandey631.jp@gmail.com', 'https://lh3.googleusercontent.com/-vfEirH9-BF4/AAAAAAAAAAI/AAAAAAAABYQ/Nipfr83ggGk/photo.jpg'),
('google', '112438690276064233944', 'namita', 'kesarwani', 'kesarwani.namita11@gmail.com', 'https://lh4.googleusercontent.com/-b9hHAr5-u14/AAAAAAAAAAI/AAAAAAAADJA/JWoLVbsAgtA/photo.jpg'),
('google', '105125002484545830720', 'pankaj', 'kumar', 'nitianpk07@gmail.com', 'https://lh3.googleusercontent.com/-L8rf4ChVcWs/AAAAAAAAAAI/AAAAAAAAAC0/YeUR2wUM0rw/photo.jpg'),
('google', '103845691284819729982', 'Pratyush', 'Agarwal', 'pratyushagarwal3@gmail.com', 'https://lh4.googleusercontent.com/-5iUZD3c7UdY/AAAAAAAAAAI/AAAAAAAAArs/Aqodl9avrJk/photo.jpg'),
('google', '115901257980527073821', 'prem', 'tiwari', 'prem.tiwarit20@gmail.com', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg'),
('google', '105403090574881316256', 'rahul', 'kumar', 'rahulnitc3003@gmail.com', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg'),
('google', '115758092993569216158', 'rahul', 'kumar', 'rahulraj30abc@gmail.com', 'https://lh4.googleusercontent.com/-czFo_HF9hMg/AAAAAAAAAAI/AAAAAAAAABo/6Lj2IBDN5hs/photo.jpg'),
('google', '104177842580817757452', 'rahul', 'kumar', 'rjrahulabc30@gmail.com', 'https://lh6.googleusercontent.com/-pi4c3E5bkvI/AAAAAAAAAAI/AAAAAAAATFc/_WU8A9mEKnU/photo.jpg'),
('google', '107627981254500891649', 'Sruthi Anand', 'C', 'sruthi@nitc.ac.in', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg'),
('google', '101737909669462268400', 'Yogendra', 'Maurya', 'steptostep93@gmail.com', 'https://lh5.googleusercontent.com/-rpmDFj4MczE/AAAAAAAAAAI/AAAAAAAABg4/vSZv7v--0_M/photo.jpg'),
('google', '109161214261393943678', 'Sumeet', 'Toppo', 'sumeettoppo95@gmail.com', 'https://lh4.googleusercontent.com/-GTYYjlT_CgQ/AAAAAAAAAAI/AAAAAAAAAJ4/WSgchfRNAhU/photo.jpg'),
('google', '103042049206466356829', 'Vaibhav', 'Pant', 'vaibhavvp71@gmail.com', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg');

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
('Mohammad', 'Arsh', '0786mohdarsh@gmail.com', 'abc123', 'nitc', 467865465768, '9451864000'),
('sweety', 'aryan', '20raushanaryan@gmail.com', 'raushan', 'begusarai', 499118665428, '9061543942'),
('harsh', 'verma', '66vermaharsh@gmail.com', '666666', 'purnea,bihar', 121212324323, '9988776655'),
('avnish', 'agr', 'abc@gmail.com', 'avnish', 'e3 madhokunj katra', 123456789107, '8574778572'),
('Abhishek ', 'Soni', 'abhishek@gmail.com', 'abhishek', 'NIT Calicut', 412569834562, '8714365122'),
('aman', 'jha', 'aman@gmail.com', 'aman123456', 'bhagalpur', 499118665421, '8877665544'),
('amit', 'amora', 'amitamora@gmail.com', 'amitamora', 'Calicut, Kerala', 56970569794, '09468984565'),
('Yogendra', 'Maurya', 'cde@gmail.com', '123456', 'Calicut', 123456789555, '8956896589'),
('lakshit', 'garg', 'garglakshit@yahoo.com', '123456', 'nit calicut ( india )', 998723321221, '9000989889'),
('jyoti', 'pandey', 'jyotipandey631.jp@gmail.com', 'abcdef', 'dfmjidn', 123454567890, '8888888888'),
('Test1', 'Test2', 'rjrahul@gmail.com', '654321', 'Testing', 122222111212, '7887866766'),
('rahul', 'raj', 'rjrahulabc30@gmail.com', '999999', 'nit calicut chattmangalam', 983748975421, '9009780021'),
('sarvesh', 'singh', 'sarveshsingh@gmail.com', '1234567890', 'allahabad', 121321231232, '9889080989'),
('saurabh', 'sharma', 'saurabhamcl@gmail.com', 'sau376@#$', 'chennai', 425178562548, '7845718662'),
('SRUTHI', 'ANAND', 'sruthi@gmail.com', 'RIDEOUT', 'XXX', 473812312222, '9090909090'),
('abhishek', 'toppo', 'sumeettoppo95@gmail.com', '123456', 'nit calicut', 987654098761, '8878876787'),
('test', 'case', 'test1@gmail.com', '1234567890', 'nit jsr', 987654321123, '9061543942'),
('Abhishek', 'Toppo', 'toppo@gmail.com', '123456', 'ranchi', 123456789098, '8089709158'),
('Vaibhav', 'Pant', 'vaibhavvp71@gmail.com', '12344321', 'NITC', 123456789098, '8899217921'),
('vk', 'singh', 'vksingh@gmail.com', '123456', 'nit kkr', 98765432112, '9988776655');

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
  `doj` date NOT NULL,
  `seats_avail` varchar(255) NOT NULL,
  `mobno` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journey`
--

INSERT INTO `journey` (`journey_id`, `email`, `car_no`, `source`, `destination`, `doj`, `seats_avail`, `mobno`) VALUES
(37, 'avnishagr@gmail.com', 'br-00br-1241', 'allahabad', 'bihar', '2019-06-09', '4', 8574778571),
(39, 'avnishagr@gmail.com', 'bj-00bj-1246', 'allahabad', 'kanpur', '2019-06-09', '4', 8574778572),
(40, '0786mohdarsh@gmail.com', 'up-00up-1786', 'Allahabad', 'Delhi', '2018-01-01', '4', 9878654345),
(43, '0786mohdarsh@gmail.com', 'up-70bh-1996', 'Delhi', 'Kerala', '2019-01-01', '4', 9563547554),
(44, 'avnishagr@gmail.com', 'bj-49bj-9900', 'Allahabad', 'allahabad', '2019-10-12', '5', 8575778572),
(45, 'avnishagr@gmail.com', 'bj-49bj-9900', 'Allahabad', 'allahabad', '2018-03-27', '5', 8575778572),
(48, '0786mohdarsh@gmail.com', 'up-22bh-1992', 'Delhi', 'Mumbai', '2019-01-01', '4', 9898989898),
(49, '0786mohdarsh@gmail.com', 'up-22bh-1992', 'Delhi', 'Mumbai', '2019-01-01', '4', 9879879879),
(50, '0786mohdarsh@gmail.com', 'up-70bh-1992', 'Abc', 'Def', '2019-01-01', '4', 9898981234),
(51, '0786mohdarsh@gmail.com', 'up-70bh-8875', 'aavhgdcgsv', 'bbbbhbvjdsbjc', '2019-01-01', '4', 9813456677),
(59, 'avnishagr@gmail.com', 'bj-00bj-0000', 'kasmir', 'chennai', '2019-06-09', '-9', 8574778572),
(62, 'vaibhavvp71@gmail.com', 'AH-00fr-3742', 'Delhi', 'Goa', '2017-11-11', '4', 8089128372),
(78, 'itamannarocks@gmail.com', 'br-00uo-9876', 'delhi', 'kota', '2017-09-09', '4', 8089709158),
(80, 'itamannarocks@gmail.com', 'br-00uo-9876', 'bangalore', 'kota', '2017-09-08', '5', 8089709158),
(81, 'sumeettoppo95@gmail.com', 'jh-09cv-0987', 'ranchi', 'kota', '2017-09-09', '5', 8089709158),
(91, 'rjrahulabc30@gmail.com', 'cc-00xx-1232', 'delhi', 'kolkata', '2019-02-12', '5', 919061543942),
(92, 'rjrahulabc30@gmail.com', 'jh-23sd-1232', 'Kolkata, West Ben', 'Delft, Netherlands', '2018-03-02', '4', 9876567890),
(93, 'rahulnitc3003@gmail.com', 'Jh-32br1234', 'Delhi Cantt, New Delhi, Delhi, India', 'Kolkata, West Bengal, India', '2017-10-02', '5', 7250947009);

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
  `doj` date DEFAULT NULL,
  `journey_id` int(11) NOT NULL,
  `mobno` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ride`
--

INSERT INTO `ride` (`ride_id`, `email`, `source`, `destination`, `seats_book`, `doj`, `journey_id`, `mobno`) VALUES
(77, 'aman@gmail.com', 'allahabad', 'bihar', 2, '2019-06-09', 37, 8844556612),
(79, 'aman@gmail.com', 'allahabad', 'bihar', 2, '2019-06-09', 37, 8844556612),
(84, 'aman@gmail.com', 'allahabad', 'bihar', 4, '2019-06-09', 37, 8844556612),
(85, 'aman@gmail.com', 'allahabad', 'bihar', 4, '2019-06-09', 37, 8844556612),
(98, 'jyotipandey631.jp@gmail.com', 'Delhi', 'Mumbai', 3, '2019-01-01', 48, 9123456789),
(103, 'cde@gmail.com', 'Allahabad', 'Delhi', 4, '2018-01-01', 40, 8759685698),
(131, 'vaibhavvp71@gmail.com', 'Delhi', 'Goa', 2, '2017-11-11', 62, 8089128372),
(142, 'toppo@gmail.com', 'delhi', 'kota', 1, '2017-09-09', 78, 8089709158);

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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture`, `link`, `created`, `modified`) VALUES
(1, 'google', '101305152673463314682', 'Harsh', 'verma', 'itamannarocks@gmail.com', 'female', 'en', 'https://lh5.googleusercontent.com/-JdqviUdeYDg/AAAAAAAAAAI/AAAAAAAAACQ/AhQqCmERxkg/photo.jpg', 'https://plus.google.com/101305152673463314682', '2017-03-12 09:49:18', '2017-03-12 11:39:44'),
(2, 'google', '101090126343641555684', 'HARSH', 'VERMA', '66vermaharsh@gmail.com', '', '', 'https://lh5.googleusercontent.com/-LcUWebwBj0g/AAAAAAAAAAI/AAAAAAAAADA/muhLG5Gd-30/photo.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'google', '104177842580817757452', 'rahul', 'kumar', 'rjrahulabc30@gmail.com', '', '', 'https://lh6.googleusercontent.com/-pi4c3E5bkvI/AAAAAAAAAAI/AAAAAAAATFc/_WU8A9mEKnU/photo.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'google', '105403090574881316256', 'rahul', 'kumar', 'rahulnitc3003@gmail.com', '', '', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'google', '115758092993569216158', 'rahul', 'kumar', 'rahulraj30abc@gmail.com', '', '', 'https://lh4.googleusercontent.com/-czFo_HF9hMg/AAAAAAAAAAI/AAAAAAAAABo/6Lj2IBDN5hs/photo.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `journey`
--
ALTER TABLE `journey`
  MODIFY `journey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `ride`
--
ALTER TABLE `ride`
  MODIFY `ride_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
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
