-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 12:40 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `aid` int(11) NOT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`aid`, `title`, `body`, `start`, `end`, `image_path`, `date_created`) VALUES
(1, 'TEST ANNOUNCEMENT 1', 'TEST ANNOUNCEMENT 1', '2023-08-23', '2023-08-25', 'uploads/images (1).jfif', '2023-08-23'),
(2, 'TEST ANNOUNCEMENT 2', 'TEST ANNOUNCEMENT 2', '2023-08-23', '2023-08-25', 'uploads/images (1).jfif', '2023-08-23'),
(3, 'TEST ANNOUNCEMENT 3', 'TEST ANNOUNCEMENT 3', '2023-08-23', '2023-08-23', 'uploads/images (1).jfif', '2023-08-23'),
(4, 'TEST ANNOUNCEMENT 4', 'TEST ANNOUNCEMENT 4', '2023-08-23', '2023-08-23', 'uploads/images (1).jfif', '2023-08-23'),
(5, 'TEST ANNOUNCEMENT', 'TEST ANNOUNCEMENT', '2023-08-24', '2023-08-29', 'uploads/368697399_326528553144869_1293469090526344343_n.jpg', '2023-08-24'),
(6, 'TESTING LANG TLGA ', 'TESTING LANG TLGA', '2023-08-24', '2023-08-31', 'uploads/368697399_326528553144869_1293469090526344343_n.jpg', '2023-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `role`) VALUES
(1, 'ADMIN'),
(2, 'TEACHER'),
(3, 'STUDENT');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `eid` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `enrollment_type` varchar(50) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `gen_ave` int(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`eid`, `email`, `fname`, `mname`, `lname`, `gender`, `dob`, `address`, `region`, `province`, `city`, `barangay`, `enrollment_type`, `uid`, `gen_ave`, `level`, `status`, `date_created`) VALUES
(1, 'tricore012@gmail.com', 'Enid', 'Angelo', 'Enid', 'MALE', '2011-10-03', '10 U206 TARRAVILLE SUBDIVISION', 'Region III (Central Luzon)', 'Bulacan', 'Hagonoy', 'Abulalas', 'NULL', '890319', 87, '1', 'APPROVED', '2023-11-05'),
(2, 'enid101213@gmail.com', 'Enid', 'Enid', 'Enid', 'MALE', '2018-01-05', '10 U206 TARRAVILLE SUBDIVISION', 'Region III (Central Luzon)', 'Bulacan', 'Hagonoy', 'Abulalas', 'NULL', '', 90, '1', 'NEW', '2023-11-05'),
(3, 'enidnotenid@gmail.com', 'Enid', 'Enid', 'Enid', 'FEMALE', '2020-02-05', '10 U206 TARRAVILLE SUBDIVISION', 'Region III (Central Luzon)', 'Bulacan', 'Hagonoy', 'Abulalas', 'NULL', '', 0, '0', 'NEW', '2023-11-05'),
(4, 'enidgoosebump@gmail.com', 'Enid', 'Enid', 'Enid', 'MALE', '2020-06-02', '10 U206 TARRAVILLE SUBDIVISION', 'Region III (Central Luzon)', 'Bulacan', 'Hagonoy', 'Abulalas', 'NULL', '', 0, '0', 'NEW', '2023-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_account`
--

CREATE TABLE `forgot_account` (
  `id` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `code` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_generated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forgot_account`
--

INSERT INTO `forgot_account` (`id`, `uid`, `code`, `status`, `date_generated`) VALUES
(1, '870023', 7029, 'RENEWED', '2023-08-28'),
(2, '870023', 8931, 'RENEWED', '2023-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `lostandfound`
--

CREATE TABLE `lostandfound` (
  `fid` int(11) NOT NULL,
  `item` varchar(50) NOT NULL,
  `foundby` varchar(50) NOT NULL,
  `foundin` varchar(50) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `another` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lostandfound`
--

INSERT INTO `lostandfound` (`fid`, `item`, `foundby`, `foundin`, `image_path`, `status`, `another`, `date`) VALUES
(1, 'IPHONE 64 GB', 'TEST', 'TEST', 'uploads/368697399_326528553144869_1293469090526344343_n.jpg', 'FOUND', '', '2023-08-26'),
(2, 'IPHONE 64 GB', 'FULLY PAID', 'TEST', 'uploads/368697399_326528553144869_1293469090526344343_n.jpg', 'FOUND', '', '2023-08-26'),
(3, 'IPHONE 64 GB', 'FULLY PAID', 'TEST', 'uploads/mybill10082023.png', 'LOST', 'another', '2023-08-28'),
(4, 'I GOT LOST', 'LOST', 'LOST', 'uploads/mybill10082023.png', 'LOST', 'LOST IN PARADISE', '2023-08-28'),
(5, 'LOST MYSELF', 'FINDING', 'NEMO', 'uploads/mybill10082023.png', 'LOST', 'TEST', '2023-08-28'),
(6, 'IPHONE 64 GB', 'FULLY PAID', 'TEST', 'uploads/gmap.png', 'FOUND', 'TEST NOTEES ENID', '2023-08-29'),
(7, 'IPHONE 64 GB', 'FINDING', 'TEST', 'uploads/MINI_Service__Image_X7A6786__Aftersales-edited.jpg', 'LOST', 'TEST', '2023-10-23'),
(8, 'I GOT LOST 2', 'FULLY PAID', 'TEST', 'uploads/services.png', 'LOST', 'another', '2023-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `map_direction`
--

CREATE TABLE `map_direction` (
  `id` int(11) NOT NULL,
  `mid` varchar(50) NOT NULL,
  `room` varchar(50) NOT NULL,
  `building` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map_direction`
--

INSERT INTO `map_direction` (`id`, `mid`, `room`, `building`) VALUES
(1, '1', 'ROOM001', 'BUILDING 1'),
(2, '2', 'ROOM002', 'BUILDING 2'),
(3, '3', 'ROOM003', 'BUILDING 3'),
(4, '4', 'ROOM004', 'BUILDING 4'),
(5, '5', 'ROOM005', 'BUILDING 5'),
(6, '6', 'ROOM006', 'BUILDING 6'),
(7, '7', 'ROOM007', 'BUILDING 7'),
(8, '8', 'ROOM008', 'BUILDING 8'),
(9, '9', 'ROOM009', 'BUILDING 9'),
(10, '1', 'ROOM001.1', 'BUILDING 1');

-- --------------------------------------------------------

--
-- Table structure for table `remember_me_tokens`
--

CREATE TABLE `remember_me_tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school_whereabout`
--

CREATE TABLE `school_whereabout` (
  `id` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime NOT NULL,
  `room` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_whereabout`
--

INSERT INTO `school_whereabout` (`id`, `uid`, `time_in`, `time_out`, `room`, `date`) VALUES
(1, '934889', '2023-08-21 12:35:38', '2023-08-21 12:35:58', 'RM001', '2023-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `syid` int(11) NOT NULL,
  `yr1` date NOT NULL,
  `yr2` date NOT NULL,
  `gencode` int(225) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`syid`, `yr1`, `yr2`, `gencode`, `date_created`) VALUES
(1, '2024-01-01', '2025-01-01', 797006, '2023-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `section_legen`
--

CREATE TABLE `section_legen` (
  `sid` int(11) NOT NULL,
  `sycode` int(50) NOT NULL,
  `student_accepted` int(11) NOT NULL,
  `min` int(50) NOT NULL,
  `max` int(50) NOT NULL,
  `level` int(50) NOT NULL,
  `section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_legen`
--

INSERT INTO `section_legen` (`sid`, `sycode`, `student_accepted`, `min`, `max`, `level`, `section`) VALUES
(1, 797006, 30, 90, 99, 1, 'SECTION 1'),
(2, 797006, 30, 80, 89, 1, 'SECTION 2'),
(3, 797006, 30, 75, 79, 1, 'SECTION 3'),
(4, 797006, 30, 90, 99, 2, 'SECTION 1'),
(5, 797006, 30, 80, 89, 2, 'SECTION 2'),
(6, 797006, 30, 75, 79, 2, 'SECTION 3'),
(7, 797006, 30, 90, 99, 3, 'SECTION 1'),
(8, 797006, 30, 80, 89, 3, 'SECTION 2'),
(9, 797006, 30, 75, 79, 3, 'SECTION 3'),
(10, 797006, 30, 90, 99, 4, 'SECTION 1'),
(11, 797006, 30, 80, 89, 4, 'SECTION 2'),
(12, 797006, 30, 75, 79, 4, 'SECTION 3'),
(13, 797006, 30, 90, 99, 5, 'SECTION 1'),
(14, 797006, 30, 80, 89, 5, 'SECTION 2'),
(15, 797006, 30, 75, 79, 5, 'SECTION 3'),
(16, 797006, 30, 90, 99, 6, 'SECTION 1'),
(17, 797006, 30, 80, 89, 6, 'SECTION 2'),
(18, 797006, 30, 75, 79, 6, 'SECTION 3'),
(19, 797006, 30, 90, 99, 7, 'SECTION 1'),
(20, 797006, 30, 80, 89, 7, 'SECTION 2'),
(21, 797006, 30, 75, 79, 7, 'SECTION 3'),
(22, 797006, 30, 90, 99, 8, 'SECTION 1'),
(23, 797006, 30, 80, 89, 8, 'SECTION 2'),
(24, 797006, 30, 75, 79, 8, 'SECTION 3'),
(25, 797006, 30, 64, 74, 1, 'SECTION 4'),
(26, 797006, 30, 60, 63, 1, 'SECTION 5');

-- --------------------------------------------------------

--
-- Table structure for table `subject_matter`
--

CREATE TABLE `subject_matter` (
  `sm` int(11) NOT NULL,
  `grade` int(10) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `subjcode` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_matter`
--

INSERT INTO `subject_matter` (`sm`, `grade`, `subject`, `subjcode`, `time`, `room`) VALUES
(1, 1, 'SCIENCE', 'SC001', '7:00 AM - 8:00 AM', 'RM001'),
(2, 1, 'ENGLISH', 'EN001', '9:00 AM - 10:00 AM', 'RM001'),
(3, 1, 'MATH', 'MT001', '11:00 AM - 12:00 AM', 'RM001'),
(4, 1, 'ARALING PANLIPUNAN', 'AP001', '1:00 PM - 2:00 PM', 'RM001'),
(5, 1, 'FILIPINO', 'FIL001', '2:00 PM - 3:00 PM', 'RM001'),
(6, 1, 'MAPEH', 'MH001', '3:00 PM - 4:00 PM', 'RM001'),
(7, 1, 'GMRC', 'GM001', '4:00 PM - 5:00 PM', 'RM001'),
(8, 2, 'SCIENCE', 'SC002', '7:00 AM - 8:00 AM', 'RM002'),
(9, 2, 'ENGLISH', 'EN002', '9:00 AM - 10:00 AM', 'RM002'),
(10, 2, 'MATH', 'MT002', '11:00 AM - 12:00 AM', 'RM002'),
(11, 2, 'ARALING PANLIPUNAN', 'AP002', '1:00 PM - 2:00 PM', 'RM002'),
(12, 2, 'FILIPINO', 'FIL002', '2:00 PM - 3:00 PM', 'RM002'),
(13, 2, 'MAPEH', 'MH002', '3:00 PM - 4:00 PM', 'RM002'),
(14, 2, 'GMRC', 'GM002', '4:00 PM - 5:00 PM', 'RM002'),
(15, 3, 'SCIENCE', 'SC003', '7:00 AM - 8:00 AM', 'RM003'),
(16, 3, 'ENGLISH', 'EN003', '9:00 AM - 10:00 AM', 'RM003'),
(17, 3, 'MATH', 'MT003', '11:00 AM - 12:00 AM', 'RM003'),
(18, 3, 'ARALING PANLIPUNAN', 'AP003', '1:00 PM - 2:00 PM', 'RM003'),
(19, 3, 'FILIPINO', 'FIL003', '2:00 PM - 3:00 PM', 'RM003'),
(20, 3, 'MAPEH', 'MH003', '3:00 PM - 4:00 PM', 'RM003'),
(21, 3, 'GMRC', 'GM003', '4:00 PM - 5:00 PM', 'RM003'),
(22, 4, 'SCIENCE', 'SC004', '7:00 AM - 8:00 AM', 'RM004'),
(23, 4, 'ENGLISH', 'EN004', '9:00 AM - 10:00 AM', 'RM004'),
(24, 4, 'MATH', 'MT004', '11:00 AM - 12:00 AM', 'RM004'),
(25, 4, 'ARALING PANLIPUNAN', 'AP004', '1:00 PM - 2:00 PM', 'RM004'),
(26, 4, 'FILIPINO', 'FIL004', '2:00 PM - 3:00 PM', 'RM004'),
(27, 4, 'MAPEH', 'MH004', '3:00 PM - 4:00 PM', 'RM004'),
(28, 4, 'GMRC', 'GM004', '4:00 PM - 5:00 PM', 'RM004'),
(29, 5, 'SCIENCE', 'SC005', '7:00 AM - 8:00 AM', 'RM005'),
(30, 5, 'ENGLISH', 'EN005', '9:00 AM - 10:00 AM', 'RM005'),
(31, 5, 'MATH', 'MT005', '11:00 AM - 12:00 AM', 'RM005'),
(32, 5, 'ARALING PANLIPUNAN', 'AP005', '1:00 PM - 2:00 PM', 'RM005'),
(33, 5, 'FILIPINO', 'FIL005', '2:00 PM - 3:00 PM', 'RM005'),
(34, 5, 'MAPEH', 'MH005', '3:00 PM - 4:00 PM', 'RM005'),
(35, 5, 'GMRC', 'GM005', '4:00 PM - 5:00 PM', 'RM005'),
(36, 6, 'SCIENCE', 'SC006', '7:00 AM - 8:00 AM', 'RM006'),
(37, 6, 'ENGLISH', 'EN006', '9:00 AM - 10:00 AM', 'RM006'),
(38, 6, 'MATH', 'MT006', '11:00 AM - 12:00 AM', 'RM006'),
(39, 6, 'ARALING PANLIPUNAN', 'AP006', '1:00 PM - 2:00 PM', 'RM006'),
(40, 6, 'FILIPINO', 'FIL006', '2:00 PM - 3:00 PM', 'RM006'),
(41, 6, 'MAPEH', 'MH006', '3:00 PM - 4:00 PM', 'RM006'),
(42, 6, 'GMRC', 'GM006', '4:00 PM - 5:00 PM', 'RM006'),
(43, 7, 'SCIENCE', 'SC007', '7:00 AM - 8:00 AM', 'RM007'),
(44, 7, 'ENGLISH', 'EN007', '9:00 AM - 10:00 AM', 'RM007'),
(45, 7, 'MATH', 'MT007', '11:00 AM - 12:00 AM', 'RM007'),
(46, 7, 'ARALING PANLIPUNAN', 'AP007', '1:00 PM - 2:00 PM', 'RM007'),
(47, 7, 'FILIPINO', 'FIL007', '2:00 PM - 3:00 PM', 'RM007'),
(48, 7, 'MAPEH', 'MH007', '3:00 PM - 4:00 PM', 'RM007'),
(49, 7, 'GMRC', 'GM007', '4:00 PM - 5:00 PM', 'RM007'),
(50, 8, 'SCIENCE', 'SC008', '7:00 AM - 8:00 AM', 'RM008'),
(51, 8, 'ENGLISH', 'EN008', '9:00 AM - 10:00 AM', 'RM008'),
(52, 8, 'MATH', 'MT008', '11:00 AM - 12:00 AM', 'RM008'),
(53, 8, 'ARALING PANLIPUNAN', 'AP008', '1:00 PM - 2:00 PM', 'RM008'),
(54, 8, 'FILIPINO', 'FIL008', '2:00 PM - 3:00 PM', 'RM008'),
(55, 8, 'MAPEH', 'MH008', '3:00 PM - 4:00 PM', 'RM008'),
(56, 8, 'GMRC', 'GM008', '4:00 PM - 5:00 PM', 'RM008'),
(57, 1, 'HIKASI', 'HI001', '7:00 AM - 8:00 AM', ''),
(58, 6, 'TEST', 'TE006', '1:00 AM - 2:00 AM', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_attendance`
--

CREATE TABLE `user_attendance` (
  `id` int(11) NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime NOT NULL,
  `uid` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_attendance`
--

INSERT INTO `user_attendance` (`id`, `time_in`, `time_out`, `uid`, `date`) VALUES
(1, '2023-08-20 05:45:29', '2023-08-24 02:54:00', '934889', '2023-08-20'),
(2, '2023-08-21 12:16:36', '2023-08-24 02:54:00', '934889', '2023-08-21'),
(3, '2023-08-24 02:48:55', '2023-08-24 02:54:00', '934889', '2023-08-24'),
(4, '2023-08-24 03:31:35', '2023-08-24 03:31:45', '870023', '2023-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `user_grading_history`
--

CREATE TABLE `user_grading_history` (
  `id` int(11) NOT NULL,
  `eid` int(50) DEFAULT NULL,
  `level` int(50) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `q1` int(11) DEFAULT NULL,
  `q2` int(11) DEFAULT NULL,
  `q3` int(11) DEFAULT NULL,
  `q4` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_grading_history`
--

INSERT INTO `user_grading_history` (`id`, `eid`, `level`, `subject`, `q1`, `q2`, `q3`, `q4`) VALUES
(1, 1, 1, 'SC001', 80, 90, 85, 90),
(2, 1, 1, 'EN001', 80, 90, 85, 90),
(3, 1, 1, 'MT001', 80, 90, 85, 90),
(4, 1, 1, 'AP001', 80, 90, 85, 90),
(5, 1, 1, 'FIL001', 80, 90, 85, 90),
(6, 1, 1, 'MH001', 80, 90, 85, 90),
(7, 1, 1, 'GM001', 80, 90, 85, 90),
(8, 1, 1, 'HI001', 80, 90, 85, 90),
(9, 1, 1, 'SC001', 89, 89, 89, 89),
(10, 1, 1, 'EN001', 89, 89, 89, 89),
(11, 1, 1, 'MT001', 89, 89, 89, 89),
(12, 1, 1, 'AP001', 89, 89, 89, 89),
(13, 1, 1, 'FIL001', 89, 89, 89, 89),
(14, 1, 1, 'MH001', 89, 89, 89, 89),
(15, 1, 1, 'GM001', 89, 89, 89, 89),
(16, 1, 1, 'HI001', 70, 70, 70, 89),
(17, 2, 1, 'SC001', 90, 91, 91, 91),
(18, 2, 1, 'EN001', 91, 91, 91, 91),
(19, 2, 1, 'MT001', 91, 91, 91, 91),
(20, 2, 1, 'AP001', 91, 91, 91, 91),
(21, 2, 1, 'FIL001', 91, 91, 91, 91),
(22, 2, 1, 'MH001', 91, 91, 91, 91),
(23, 2, 1, 'GM001', 91, 91, 91, 91),
(24, 2, 1, 'HI001', 91, 91, 91, 91);

-- --------------------------------------------------------

--
-- Table structure for table `user_image`
--

CREATE TABLE `user_image` (
  `iid` int(11) NOT NULL,
  `eid` int(50) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `sid` int(11) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `level` int(10) NOT NULL,
  `section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`sid`, `uid`, `fname`, `mname`, `lname`, `gender`, `birthdate`, `address`, `contact`, `level`, `section`) VALUES
(1, '890319', 'Enid', 'Angelo', 'Enid', '', '2011-10-03', '10', '', 1, 'SECTION 2'),
(2, '833353', 'Gerald', 'Mico', 'Facistol', 'MALE', '2023-11-05', '10 U206 TARRAVILLE SUBDIVISION, Region III (Central Luzon), Bulacan, Hagonoy, Abulalas', '', 1, 'SECTION 1');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `designation` int(10) NOT NULL,
  `code` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `uid`, `email`, `password`, `designation`, `code`, `status`, `date_created`) VALUES
(1, '1012138988', 'revcoreitsolution@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 8988, 'VALID', '2023-11-05'),
(7, '957722', 'tricore012@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 3, 9965, 'INVALID', '2023-11-05'),
(8, '890319', 'tricore012@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 3, 7433, 'INVALID', '2023-11-05'),
(12, '833353', 'tricore012@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 2, 7006, 'VALID', '2023-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `user_request`
--

CREATE TABLE `user_request` (
  `rid` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `request_type` varchar(100) NOT NULL,
  `date_requested` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_request`
--

INSERT INTO `user_request` (`rid`, `uid`, `request_type`, `date_requested`, `status`) VALUES
(1, '934889', 'REPORT OF GRADE', '2023-08-21', 'COMPLETED'),
(2, '934889', 'ENROLLMENT', '2023-08-21', 'COMPLETED'),
(3, '934889', 'GOOD MORAL', '2023-08-21', 'OPEN'),
(4, '934889', 'FORM 137', '2023-08-21', 'OPEN'),
(5, '934889', 'GOOD MORAL', '2023-08-23', 'COMPLETED'),
(6, '934889', 'GOOD MORAL', '2023-08-24', 'IN-PROGRESS'),
(7, '934889', 'FORM 137', '2023-08-24', 'COMPLETED'),
(8, '790608', 'ENROLLMENT', '2023-08-28', 'OPEN'),
(9, '890319', 'FORM 137', '2023-11-06', 'OPEN');

-- --------------------------------------------------------

--
-- Table structure for table `user_security`
--

CREATE TABLE `user_security` (
  `id` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `code` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_security`
--

INSERT INTO `user_security` (`id`, `uid`, `email`, `code`, `status`, `date_created`) VALUES
(1, '1012138988', 'revcoreitsolution@gmail.com', 7747, 'USED', '2023-11-05'),
(2, '1012138988', 'revcoreitsolution@gmail.com', 8529, 'UNUSED', '2023-11-05'),
(3, '1012138988', 'revcoreitsolution@gmail.com', 8261, 'USED', '2023-11-05'),
(4, '1012138988', 'revcoreitsolution@gmail.com', 9885, 'USED', '2023-11-05'),
(5, '957722', 'tricore012@gmail.com', 7803, 'UNUSED', '2023-11-06'),
(6, '957722', 'tricore012@gmail.com', 8732, 'USED', '2023-11-06'),
(7, '890319', 'tricore012@gmail.com', 7041, 'USED', '2023-11-06'),
(8, '1012138988', 'revcoreitsolution@gmail.com', 9313, 'USED', '2023-11-06'),
(9, '833353', 'tricore012@gmail.com', 8534, 'USED', '2023-11-06'),
(10, '890319', 'tricore012@gmail.com', 7945, 'USED', '2023-11-06'),
(11, '1012138988', 'revcoreitsolution@gmail.com', 9377, 'USED', '2023-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `user_student_history`
--

CREATE TABLE `user_student_history` (
  `ush` int(11) NOT NULL,
  `uid` int(150) NOT NULL,
  `level` int(50) NOT NULL,
  `ave` int(100) NOT NULL,
  `date_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_student_history`
--

INSERT INTO `user_student_history` (`ush`, `uid`, `level`, `ave`, `date_update`) VALUES
(1, 740294, 2, 90, '2023-11-05'),
(2, 709238, 2, 86, '2023-11-05'),
(3, 892120, 2, 86, '2023-11-05'),
(4, 863667, 1, 86, '2023-11-05'),
(5, 890319, 1, 87, '2023-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `user_uploaded_files`
--

CREATE TABLE `user_uploaded_files` (
  `id` int(11) NOT NULL,
  `eid` int(50) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_uploaded_files`
--

INSERT INTO `user_uploaded_files` (`id`, `eid`, `file_name`, `file_path`) VALUES
(1, 1, 'SA20230922.pdf', NULL),
(2, 1, 'SA20230922.pdf', NULL),
(3, 1, 'SA20230922.pdf', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `forgot_account`
--
ALTER TABLE `forgot_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lostandfound`
--
ALTER TABLE `lostandfound`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `map_direction`
--
ALTER TABLE `map_direction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remember_me_tokens`
--
ALTER TABLE `remember_me_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `school_whereabout`
--
ALTER TABLE `school_whereabout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`syid`);

--
-- Indexes for table `section_legen`
--
ALTER TABLE `section_legen`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `subject_matter`
--
ALTER TABLE `subject_matter`
  ADD PRIMARY KEY (`sm`);

--
-- Indexes for table `user_attendance`
--
ALTER TABLE `user_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_grading_history`
--
ALTER TABLE `user_grading_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_image`
--
ALTER TABLE `user_image`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_request`
--
ALTER TABLE `user_request`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `user_security`
--
ALTER TABLE `user_security`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_student_history`
--
ALTER TABLE `user_student_history`
  ADD PRIMARY KEY (`ush`);

--
-- Indexes for table `user_uploaded_files`
--
ALTER TABLE `user_uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `forgot_account`
--
ALTER TABLE `forgot_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lostandfound`
--
ALTER TABLE `lostandfound`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `map_direction`
--
ALTER TABLE `map_direction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `remember_me_tokens`
--
ALTER TABLE `remember_me_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_whereabout`
--
ALTER TABLE `school_whereabout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `syid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section_legen`
--
ALTER TABLE `section_legen`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subject_matter`
--
ALTER TABLE `subject_matter`
  MODIFY `sm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user_attendance`
--
ALTER TABLE `user_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_grading_history`
--
ALTER TABLE `user_grading_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_image`
--
ALTER TABLE `user_image`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_request`
--
ALTER TABLE `user_request`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_security`
--
ALTER TABLE `user_security`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_student_history`
--
ALTER TABLE `user_student_history`
  MODIFY `ush` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_uploaded_files`
--
ALTER TABLE `user_uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
