-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 07:48 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutor_application_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_applied_job`
--

CREATE TABLE `application_applied_job` (
  `id` int(11) NOT NULL,
  `applied_job_ID` varchar(50) NOT NULL,
  `applied_tutor_id` varchar(50) NOT NULL,
  `apply_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_applied_job`
--

INSERT INTO `application_applied_job` (`id`, `applied_job_ID`, `applied_tutor_id`, `apply_time`, `state`) VALUES
(20, '21', '1', '2020-12-18 10:34:13', 0),
(21, '20', '1', '2020-12-18 10:34:19', 0),
(25, '23', '1', '2020-12-19 10:26:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `application_category`
--

CREATE TABLE `application_category` (
  `cat_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_category`
--

INSERT INTO `application_category` (`cat_id`, `category_name`) VALUES
(1, 'Bangla Medium'),
(2, 'English Medium'),
(4, 'Religious Studies'),
(5, 'Admission Test'),
(6, 'Arts'),
(7, 'Language Learning'),
(8, 'Test Preparation'),
(9, 'Professional Skill Development'),
(10, 'Special Skill Development'),
(11, 'Project/Assignment'),
(12, 'Madrasa Medium'),
(13, 'Others'),
(14, 'English Version');

-- --------------------------------------------------------

--
-- Table structure for table `application_contact`
--

CREATE TABLE `application_contact` (
  `id` int(11) NOT NULL,
  `contact_cell` varchar(20) NOT NULL,
  `contact_mail` varchar(25) NOT NULL,
  `contact_facebook` varchar(100) NOT NULL,
  `contact_twitter` varchar(30) NOT NULL,
  `contact_insta` varchar(30) NOT NULL,
  `contact_youtube` varchar(30) NOT NULL,
  `contact_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_contact`
--

INSERT INTO `application_contact` (`id`, `contact_cell`, `contact_mail`, `contact_facebook`, `contact_twitter`, `contact_insta`, `contact_youtube`, `contact_address`) VALUES
(1, '+8801705000000', 'support@example.com', '#', '#', '#', '#', '...');

-- --------------------------------------------------------

--
-- Table structure for table `application_job`
--

CREATE TABLE `application_job` (
  `jobId` int(11) NOT NULL,
  `jobNumber` varchar(100) NOT NULL,
  `district` varchar(30) NOT NULL,
  `area` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `studentGender` varchar(7) NOT NULL,
  `studentName` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'Student',
  `phoneNumber` varchar(30) NOT NULL,
  `StudentInstitute` varchar(100) CHARACTER SET utf8 NOT NULL,
  `subjects` varchar(200) NOT NULL,
  `tutorGender` varchar(7) NOT NULL,
  `daysInAWeek` varchar(3) NOT NULL,
  `salary` varchar(10) CHARACTER SET utf8 NOT NULL,
  `studentNumber` varchar(10) NOT NULL,
  `lookingDate` varchar(20) NOT NULL,
  `tutoringTime` varchar(50) CHARACTER SET utf8 NOT NULL,
  `studentAddress` text CHARACTER SET utf8 NOT NULL,
  `requirments` text CHARACTER SET utf8 NOT NULL,
  `studentemail` varchar(100) NOT NULL,
  `howhearus` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `postTime` varchar(25) CHARACTER SET utf8 NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '0',
  `approval` varchar(2) NOT NULL DEFAULT '0',
  `studentID_IF_LOGGGED` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_job`
--

INSERT INTO `application_job` (`jobId`, `jobNumber`, `district`, `area`, `category`, `course`, `studentGender`, `studentName`, `phoneNumber`, `StudentInstitute`, `subjects`, `tutorGender`, `daysInAWeek`, `salary`, `studentNumber`, `lookingDate`, `tutoringTime`, `studentAddress`, `requirments`, `studentemail`, `howhearus`, `password`, `postTime`, `status`, `approval`, `studentID_IF_LOGGGED`) VALUES
(9, 'M10008', '18', '3', '1', '1', 'M', 'sdwd', '2434', 'bubt', 'Chemistry ,Bangla', 'M', '3', '30000tk', '10', '2020-12-30', '12:30 pm', 'add', 'req', 'em', '2', '03c7c0ace395d80182db07ae2c30f034', '2020-12-13 14:29:54', '0', '1', ''),
(10, 'M10009', '53', '4', '2', '3', 'M', 'limon', '09876543210', 'institute', 'Chemistry ,All Subject', 'M', '6', '20000', '10', '2021-04-27', '15:30', 'address', ' Others requirments (If any )', 'php@php.net', '1', '81dc9bdb52d04dc20036dbd8313ed055', '2020-12-13 18:20:38', '0', '1', ''),
(11, 'M10010', '18', '3', '1', '1', 'M', 'html', '83659681546', 'institute', 'Chemistry ', 'M', '1', '20000', '1', '2021-01-01', '17:07', 'fg', '', 'html@html.com', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-12-14 19:00:08', '0', '1', '3'),
(12, 'F10011', '18', '3', '5', '4', 'F', 'html', '83659681546', 'institute v', 'Chemistry ', 'F', '1', '20000', '5', '2021-01-01', '14:22', 'house:12/3; roadr:23/45, mohammadpur, dhaka-1207', 'asf ioqwry3iufoicklmsacqwk wuo2yo2yrr ioydwtctidpoj2e;2oej iowydwtdiwt7dt wodywofupofeofuepouoyroyro a;ldmwfefer307389698eygfh 38r3y89  389ry3r 993r 3r7ttw w7tdwd ', 'html@html.com', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-12-16 19:39:02', '2', '2', '3'),
(13, 'M10012', '18', '2', '1', '1', 'M', 'sun', '01768204575', 'bbbb', 'Chemistry ', 'M', '2', '20000', '7', '2021-01-01', '03:24', 'asfsetry', 'sfsfetreete4564575', 'mail@live.com', '3', '81dc9bdb52d04dc20036dbd8313ed055', '2020-12-20 19:42:15', '0', '1', ''),
(16, 'F10013', '18', '1', '5', '4', 'F', 't1', '45454545454', 't', 'Physics', 'F', '3', '1234', '1', '2021-01-01', '12:24', 'qw', 'wdd', 't@tcd.com', '1', '81dc9bdb52d04dc20036dbd8313ed055', '2020-11-16 11:23:51', '2', '2', ''),
(17, 'M10016', '53', '4', '1', '1', 'M', 't2', '13243521213', 'ad', 'Bangla', 'M', '2', '2313', '6', '2021-01-01', '02:13', 'ADSd', 'qwqwe', 'trt@gfg.com', '2', '81dc9bdb52d04dc20036dbd8313ed055', '2020-11-29 11:25:20', '0', '1', ''),
(18, 'M10017', '53', '4', '5', '4', 'F', 'ADSF', '21432536476', 'safdw', 'Chemistry ', 'M', '2', '124314', '8', '2021-01-01', '13:26', 'qwdsacfd', 'asdaq', 'sjldgu@agdiu.com', '3', '81dc9bdb52d04dc20036dbd8313ed055', '2020-11-30 11:26:25', '2', '2', ''),
(19, 'M10018', '18', '3', '2', '3', 'M', 'zxcdsvv', '98679867564', 'scxcv', 'All Subject', 'M', '4', '2434', '2', '2021-04-01', '00:00', 'adxsa', 'XSD', 'sjkdhgi@yahoo.com', '2', '81dc9bdb52d04dc20036dbd8313ed055', '2020-11-28 11:27:35', '0', '1', ''),
(21, 'M10020', '18', '2', '2', '3', 'M', 'aSsds', '12457543423', 'xvdsgse', 'Chemistry ', 'M', '2', '324241', '4', '2021-04-01', '10:28', 'sDFzdgxfhcg', 'fch', 'dkuigfduyqrsu@gmail.com', '2', '81dc9bdb52d04dc20036dbd8313ed055', '2020-12-16 11:29:45', '1', '1', ''),
(22, 'M10021', '18', '2', '5', '4', 'M', 'ASD', '34564645423', '2234325ERFDCDFC', 'Physics', 'M', '1', '234235', '6', '2021-04-01', '01:30', 'wcsa', 'sd', 'sacdsju@yahoo.com', '2', '81dc9bdb52d04dc20036dbd8313ed055', '2020-12-16 11:30:54', '2', '2', ''),
(23, 'A10022', '18', '7', '1', '25', 'F', 'abcd', '12333333333', 'monipur', 'Bangla,English,General Maths', 'A', '3', '4000', '1', '2021-04-01', '19:00', '9 High Ridge Ave.  Livermore', '', 'testtr@gmail.com', '3', '01cfcd4f6b8770febfb40cb906715822', '2020-12-20 09:29:21', '0', '1', ''),
(24, 'M10023', '18', '3', '1', '29', 'M', 'Rajib', '01521201462', 'Mohammadpur', 'Mathematics,Physics', 'M', '4', '4000', '1', '2021-04-01', '18:00', 'Mohammadpur bus Stand', '', 'raihanrana.boalia@gmail.com', '2', 'ed2b1f468c5f915f3f1cf75d7068baae', '2020-12-19 06:35:36', '2', '2', ''),
(25, 'A10024', '18', '16', '14', '33', 'A', 'test', '01233233333', 'te', 'ALL', 'A', '3', '2000', '1', '2021-04-01', '06:17', 't7est', 'none', 'xxxxcvvabcd@gmail.com', '3', '827ccb0eea8a706c4c34a16891f84e7b', '2020-12-06 09:20:45', '0', '1', ''),
(26, 'A10025', '18', '7', '2', '12', 'A', 'ra', '01258812685', 'test', 'English', 'M', '2', '12000', '1', '2021-04-01', '07:30', 's', 'sad', 'testeee@gmail.com', '5', 'b59c67bf196a4758191e42f76670ceba', '2020-12-06 09:20:45', '0', '1', ''),
(27, 'M10026', '18', '7', '5', '4', 'M', 'Rayhan', '01571749099', 'test ins', 'All,Physics,Economics,Chemistry ,test,', 'M', '3', '10000', '2', '2021-01-01', '06:00 pm', 'address', 'na', 'who@gmail.com', '1', '81dc9bdb52d04dc20036dbd8313ed055', '29 December, 2020', '0', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `application_payment`
--

CREATE TABLE `application_payment` (
  `payment_id` int(11) NOT NULL,
  `paid_job_id` varchar(100) NOT NULL,
  `payment_tutor_id` varchar(100) NOT NULL,
  `paid_amount` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `txnID` varchar(100) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `application_student`
--

CREATE TABLE `application_student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL DEFAULT 'Student',
  `student_email` varchar(100) NOT NULL,
  `student_phone` varchar(15) NOT NULL,
  `student_password` varchar(500) NOT NULL,
  `student_howUknowUs` varchar(5) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Student_user_type` varchar(7) NOT NULL DEFAULT 'Student',
  `student_image` varchar(100) NOT NULL DEFAULT 'img/student-image/noimage.png',
  `student_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_student`
--

INSERT INTO `application_student` (`student_id`, `student_name`, `student_email`, `student_phone`, `student_password`, `student_howUknowUs`, `createdAt`, `Student_user_type`, `student_image`, `student_address`) VALUES
(2, 'leon', 'leon@gmail.com', '01222222222', '81dc9bdb52d04dc20036dbd8313ed055', '1', '2020-12-05 14:40:33', 'Student', 'img/student-image/noimage.png 	', 'sfff00'),
(3, 'html', 'limon7530.it@gmail.com', '83659681546', '81dc9bdb52d04dc20036dbd8313ed055', '5', '2020-12-10 14:48:58', 'Student', 'img/student-image/noimage.png', ''),
(4, 'sun', 'mail@live.com', '01768204575', '81dc9bdb52d04dc20036dbd8313ed055', '3', '2020-11-13 13:42:16', 'Student', 'img/student-image/noimage.png', ''),
(5, 't1', 't@tcd.com', '45454545454', '81dc9bdb52d04dc20036dbd8313ed055', '1', '2020-12-16 05:23:51', 'Student', 'img/student-image/noimage.png', ''),
(6, 't2', 'trt@gfg.com', '13243521213', '81dc9bdb52d04dc20036dbd8313ed055', '2', '2020-12-16 05:25:20', 'Student', 'img/student-image/noimage.png', ''),
(7, 'ADSF', 'sjldgu@agdiu.com', '21432536476', '81dc9bdb52d04dc20036dbd8313ed055', '3', '2020-12-16 05:26:26', 'Student', 'img/student-image/noimage.png', ''),
(8, 'zxcdsvv', 'sjkdhgi@yahoo.com', '98679867564', '81dc9bdb52d04dc20036dbd8313ed055', '2', '2020-12-16 05:27:35', 'Student', 'img/student-image/noimage.png', ''),
(9, 'zAsfdvb', 'sdljugfytdyiu@gmail.com', '34543464542', '81dc9bdb52d04dc20036dbd8313ed055', '2', '2020-12-16 05:28:38', 'Student', 'img/student-image/noimage.png', ''),
(10, 'aSsds', 'dkuigfduyqrsu@gmail.com', '12457543423', '81dc9bdb52d04dc20036dbd8313ed055', '2', '2021-12-16 05:29:45', 'Student', 'img/student-image/noimage.png', ''),
(11, 'ASD', 'sacdsju@yahoo.com', '34564645423', '81dc9bdb52d04dc20036dbd8313ed055', '2', '2020-12-16 05:30:54', 'Student', 'img/student-image/noimage.png', ''),
(12, 'raihan', 'raihanrana.b@gmail.com', '01744558349', 'daa6b8d04ce72d953d5501adc53ddd82', '2', '2020-12-26 13:09:34', 'Student', 'img/student-image/noimage.png', ''),
(13, 'abcd', 'testtr@gmail.com', '12333333333', '01cfcd4f6b8770febfb40cb906715822', '3', '2020-12-20 13:29:21', 'Student', 'img/student-image/noimage.png', ''),
(14, 'Rajib', 'raihanrana.boalia@gmail.com', '01521201462', 'ed2b1f468c5f915f3f1cf75d7068baae', '2', '2020-12-19 10:35:36', 'Student', 'img/student-image/noimage.png', ''),
(15, 'test', 'xxxxcvvabcd@gmail.com', '01233233333', '827ccb0eea8a706c4c34a16891f84e7b', '3', '2020-12-23 13:20:45', 'Student', 'img/student-image/noimage.png', ''),
(16, 'ra', 'testeee@gmail.com', '01258812685', 'b59c67bf196a4758191e42f76670ceba', '5', '2020-12-24 08:04:11', 'Student', 'img/student-image/noimage.png', ''),
(17, 'Rayhan', 'who@gmail.com', '01571749099', '81dc9bdb52d04dc20036dbd8313ed055', '1', '2020-12-29 06:10:37', 'Student', 'img/student-image/noimage.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `application_student_feedback`
--

CREATE TABLE `application_student_feedback` (
  `id` int(11) NOT NULL,
  `student_ID` varchar(100) NOT NULL,
  `student_feedback` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_student_feedback`
--

INSERT INTO `application_student_feedback` (`id`, `student_ID`, `student_feedback`, `status`) VALUES
(1, '2', 'student feedback', 1),
(2, '2', 'adwqfdqwr', 1),
(3, '2', 'warqetfweacdeqwtgye5hy45yhgwef15d6q41dw gei iu2eipu2y epi2p7 73rqy piry3priy1 p72yep2y 2198y ep9828ye 9882p92ye[982 93 89e212y9e8 298p2y e98218 p98281y1e9821 yp98e21ye p98832yrp9 ;98yr938 p9831ryr 93', 1),
(4, '2', 'f6481ewc17t47t+c47t+f/974t 8734+4 7t+19517t+0/gf97 t+19t57 1+5757y57y7y+5yuygyug yu2yu1g y21g    g y3gr3r', 1);

-- --------------------------------------------------------

--
-- Table structure for table `application_subject`
--

CREATE TABLE `application_subject` (
  `subject_id` int(11) NOT NULL,
  `cat_in_subject` varchar(5) NOT NULL,
  `sub_cat_in_subject` varchar(5) NOT NULL,
  `subject_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_subject`
--

INSERT INTO `application_subject` (`subject_id`, `cat_in_subject`, `sub_cat_in_subject`, `subject_name`) VALUES
(1, '1', '1', 'All'),
(2, '5', '4', 'All'),
(3, '5', '4', 'Physics'),
(4, '5', '4', 'Economics'),
(5, '5', '4', 'Chemistry '),
(6, '1', '1', 'Chemistry '),
(7, '2', '3', 'Chemistry '),
(8, '2', '3', 'All Subject'),
(9, '1', '1', 'Bangla'),
(10, '1', '1', 'English'),
(11, '1', '1', 'Math'),
(12, '5', '4', 'test'),
(13, '2', '5', 'All'),
(14, '2', '3', 'All'),
(15, '2', '2', 'All'),
(16, '2', '6', 'All'),
(17, '2', '16', 'Bengali'),
(18, '2', '16', 'Mathematics'),
(19, '2', '16', 'Chemistry'),
(20, '2', '16', 'Biology'),
(21, '2', '16', 'Economics'),
(22, '2', '16', 'English'),
(23, '2', '16', 'Physics'),
(24, '2', '16', 'Business Studies'),
(25, '2', '16', 'Accounting'),
(26, '2', '16', 'Computer Science'),
(27, '2', '16', 'Religion'),
(28, '2', '16', 'Geography'),
(29, '2', '16', 'History'),
(30, '2', '16', 'Physical Education'),
(31, '2', '16', 'All'),
(32, '2', '17', 'Bengali'),
(33, '2', '17', 'Mathematics'),
(34, '2', '17', 'Chemistry'),
(35, '2', '17', 'Biology'),
(36, '2', '17', 'Economics'),
(37, '2', '17', 'English'),
(38, '2', '17', 'Physics'),
(39, '2', '17', 'Business Studies'),
(40, '2', '17', 'Accounting'),
(41, '2', '17', 'Computer Science'),
(42, '2', '17', 'Religion'),
(43, '2', '17', 'Religion'),
(44, '2', '17', 'Geography'),
(45, '2', '17', 'History'),
(46, '2', '17', 'Physical Education'),
(47, '2', '18', 'Bengali'),
(48, '2', '18', 'Mathematics'),
(49, '2', '18', 'Chemistry'),
(50, '2', '18', 'Biology'),
(51, '2', '18', 'Economics'),
(52, '2', '18', 'English'),
(53, '2', '18', 'Physics'),
(54, '2', '18', 'Business Studies'),
(55, '2', '18', 'Accounting'),
(56, '2', '18', 'Computer Science'),
(57, '2', '18', 'Religion'),
(58, '2', '18', 'Geography'),
(59, '2', '18', 'History'),
(60, '2', '18', 'Physical Education'),
(61, '1', '29', 'Bengali'),
(62, '1', '29', 'Mathematics'),
(63, '1', '29', 'Chemistry'),
(64, '1', '29', 'Biology'),
(65, '1', '29', 'Economics'),
(66, '1', '29', 'English'),
(67, '1', '29', 'Physics'),
(68, '1', '29', 'Business Studies'),
(69, '1', '29', 'Accounting'),
(70, '1', '29', 'Computer Science'),
(71, '1', '29', 'Religion'),
(72, '1', '29', 'Geography'),
(73, '1', '29', 'History'),
(74, '1', '29', 'Physical Education'),
(75, '1', '29', 'Islamic Studies'),
(76, '1', '29', 'Finance & Banking'),
(77, '1', '30', 'Bangla'),
(78, '1', '30', 'English'),
(79, '1', '30', 'General Maths'),
(80, '1', '30', 'Higher Maths'),
(81, '1', '30', 'Physics'),
(82, '1', '30', 'Chemistry'),
(83, '1', '30', 'Biology'),
(84, '1', '30', 'Accounting'),
(85, '1', '30', 'Finance & Banking'),
(86, '1', '30', 'Economics'),
(87, '1', '30', 'Computer Science'),
(88, '1', '30', 'Islamic Studies'),
(89, '1', '30', 'History'),
(90, '1', '30', 'Physical Education'),
(91, '1', '31', 'Bangla'),
(92, '1', '31', 'English'),
(93, '1', '31', 'Mathematics'),
(94, '1', '31', 'Physics'),
(95, '1', '31', 'Chemistry'),
(96, '1', '31', 'Biology'),
(97, '1', '31', 'Economics'),
(98, '1', '31', 'Accounting'),
(99, '1', '31', 'Finance & Banking'),
(100, '1', '31', 'Computer Science'),
(101, '1', '31', 'History'),
(102, '1', '31', 'Geography'),
(103, '1', '32', 'Bangla'),
(104, '1', '32', 'English'),
(105, '1', '32', 'Mathematics'),
(106, '1', '32', 'Physics'),
(107, '1', '32', 'Chemistry'),
(108, '1', '32', 'Biology'),
(109, '1', '32', 'Economics'),
(110, '1', '32', 'Accounting'),
(111, '1', '32', 'Finance & Banking'),
(112, '1', '32', 'Computer Science'),
(113, '1', '32', 'Geography'),
(114, '1', '32', 'History'),
(115, '1', '28', 'Bangla'),
(116, '1', '28', 'English'),
(117, '1', '28', 'General Maths'),
(118, '1', '28', 'General Maths'),
(119, '1', '28', 'Social Science'),
(120, '1', '28', 'ICT'),
(121, '1', '28', 'Home Economics'),
(122, '1', '28', 'All'),
(123, '1', '28', 'Islamic Studies'),
(124, '1', '27', 'Bangla'),
(125, '1', '27', 'English'),
(126, '1', '27', 'General Maths'),
(127, '1', '27', 'Social Science'),
(128, '1', '27', 'ICT'),
(129, '1', '27', 'Home Economics'),
(130, '1', '27', 'Islamic Studies'),
(131, '1', '27', 'All'),
(132, '1', '26', 'Bangla'),
(133, '1', '26', 'English'),
(134, '1', '26', 'General Maths'),
(135, '1', '26', 'Social Science'),
(136, '1', '26', 'ICT'),
(137, '1', '26', 'Home Economics'),
(138, '1', '26', 'Islamic Studies'),
(139, '1', '26', 'All'),
(140, '1', '25', 'Bangla'),
(141, '1', '25', 'English'),
(142, '1', '25', 'General Maths'),
(143, '1', '25', 'General science'),
(144, '1', '25', 'Islamic Studies'),
(145, '1', '25', 'All'),
(146, '1', '24', 'Bangla'),
(147, '1', '24', 'English'),
(148, '1', '24', 'General Maths'),
(149, '1', '24', 'General science'),
(150, '1', '24', 'Islamic Studies'),
(151, '1', '24', 'All'),
(152, '1', '23', 'Bangla'),
(153, '1', '23', 'English'),
(154, '1', '23', 'General Maths'),
(155, '1', '23', 'General science'),
(156, '1', '23', 'Islamic Studies'),
(157, '1', '23', 'All'),
(158, '1', '22', 'Bangla'),
(159, '1', '22', 'English'),
(160, '1', '22', 'General Maths'),
(161, '1', '22', 'General science'),
(162, '1', '22', 'Islamic Studies'),
(163, '1', '22', 'All'),
(164, '1', '21', 'Bangla'),
(165, '1', '21', 'English'),
(166, '1', '21', 'General Maths'),
(167, '1', '21', 'General science'),
(168, '1', '21', 'Islamic Studies'),
(169, '1', '21', 'All'),
(170, '1', '20', 'All'),
(171, '1', '19', 'All'),
(172, '1', '1', 'All'),
(173, '1', '26', 'General science'),
(174, '2', '15', 'English'),
(175, '2', '15', 'Mathematics'),
(176, '2', '15', 'Additional Mathematics'),
(177, '2', '15', 'Physics'),
(178, '2', '15', 'Chemistry'),
(179, '2', '15', 'Biology'),
(180, '2', '15', 'Bangladesh Studies'),
(181, '2', '15', 'Accounting'),
(182, '2', '15', 'Business Studies'),
(183, '2', '15', 'Economics'),
(184, '2', '15', 'Computer Science'),
(185, '2', '14', 'English'),
(186, '2', '14', 'Mathematics'),
(187, '2', '14', 'Additional Mathematics'),
(188, '2', '14', 'Physics'),
(189, '2', '14', 'Chemistry'),
(190, '2', '14', 'Biology'),
(191, '2', '14', 'Bangladesh Studies'),
(192, '2', '14', 'Accounting'),
(193, '2', '14', 'Business Studies'),
(194, '2', '14', 'Economics'),
(195, '2', '14', 'Computer Science'),
(196, '2', '13', 'English'),
(197, '2', '13', 'Mathematics'),
(198, '2', '13', 'Additional Mathematics'),
(199, '2', '13', 'Physics'),
(200, '2', '13', 'Chemistry'),
(201, '2', '13', 'Biology'),
(202, '2', '13', 'Bangladesh Studies'),
(203, '2', '13', 'Accounting'),
(204, '2', '13', 'Business Studies'),
(205, '2', '13', 'Economics'),
(206, '2', '13', 'Computer Science'),
(207, '2', '12', 'English'),
(208, '2', '12', 'Mathematics'),
(209, '2', '12', 'Social Science'),
(210, '2', '12', 'Computer Science'),
(211, '2', '12', 'All'),
(212, '2', '11', 'English'),
(213, '2', '11', 'Mathematics'),
(214, '2', '11', 'Science'),
(215, '2', '11', 'All'),
(216, '2', '10', 'English'),
(217, '2', '10', 'Mathematics'),
(218, '2', '10', 'Science'),
(219, '2', '10', 'All'),
(220, '2', '9', 'English'),
(221, '2', '9', 'Mathematics'),
(222, '2', '9', 'Science'),
(223, '2', '9', 'All'),
(224, '2', '8', 'All'),
(225, '2', '7', 'All'),
(226, '2', '6', 'All'),
(227, '2', '5', 'All'),
(228, '2', '3', 'All'),
(229, '2', '2', 'All'),
(230, '14', '33', 'ALL');

-- --------------------------------------------------------

--
-- Table structure for table `application_sub_category`
--

CREATE TABLE `application_sub_category` (
  `subCat_id` int(11) NOT NULL,
  `subCat_Name` varchar(50) NOT NULL,
  `catID_In_subCat` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_sub_category`
--

INSERT INTO `application_sub_category` (`subCat_id`, `subCat_Name`, `catID_In_subCat`) VALUES
(1, 'Pre-Schooling', '1'),
(2, 'Play', '2'),
(3, 'KG', '2'),
(4, 'Public University Admission Test', '5'),
(5, 'Pre-Schooling', '2'),
(6, 'Nursery', '2'),
(7, 'Standard 1', '2'),
(8, 'Standard 2', '2'),
(9, 'Standard 3', '2'),
(10, 'Standard 4', '2'),
(11, 'Standard 5', '2'),
(12, 'Standard 6', '2'),
(13, 'Standard 7', '2'),
(14, 'Standard 8', '2'),
(15, 'Standard 9', '2'),
(16, 'O Level', '2'),
(17, 'A Level(AS)', '2'),
(18, 'A Level(A2)', '2'),
(19, 'Play', '1'),
(20, 'KG', '1'),
(21, 'Class 1', '1'),
(22, 'Class 2', '1'),
(23, 'Class 3', '1'),
(24, 'Class 4', '1'),
(25, 'Class 5', '1'),
(26, 'Class 6', '1'),
(27, 'Class 7', '1'),
(28, 'Class 8', '1'),
(29, 'Class 9', '1'),
(30, 'Class 10', '1'),
(31, 'HSC-1st Year', '1'),
(32, 'HSC-2nd Year', '1'),
(33, 'Pre-Schooling', '14'),
(34, 'Play', '14'),
(35, 'Nursery', '14'),
(36, 'KG', '14'),
(37, 'Class 1', '14'),
(38, 'Class 2', '14'),
(39, 'Class 3', '14'),
(40, 'Class 4', '14'),
(41, 'Class 5', '14'),
(42, 'Class 6', '14'),
(43, 'Class 7', '14'),
(44, 'Class 8', '14'),
(45, 'Class 9', '14'),
(46, 'Class 10', '14'),
(47, 'HSC-1st Year', '14'),
(48, 'HSC-2nd Year', '14');

-- --------------------------------------------------------

--
-- Table structure for table `application_tutor`
--

CREATE TABLE `application_tutor` (
  `tutor_id` int(11) NOT NULL,
  `tutor_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `tutor_email` varchar(200) CHARACTER SET utf8 NOT NULL,
  `tutor_phone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `tutor_alter_phone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `tutor_Prefer_medium` varchar(100) CHARACTER SET utf8 NOT NULL,
  `tutor_password` varchar(500) CHARACTER SET utf8 NOT NULL,
  `tutor_gender` varchar(10) CHARACTER SET utf8 NOT NULL,
  `tutor_image` varchar(200) CHARACTER SET utf8 NOT NULL DEFAULT 'img/users-image/noimage.png',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_type` varchar(7) CHARACTER SET utf8 NOT NULL DEFAULT 'Tutor',
  `user_access` int(2) NOT NULL DEFAULT '0',
  `fatherName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `motherName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `religion` varchar(15) CHARACTER SET utf8 NOT NULL,
  `ssc` varchar(200) CHARACTER SET utf8 NOT NULL,
  `hsc` varchar(200) CHARACTER SET utf8 NOT NULL,
  `graduation` varchar(200) CHARACTER SET utf8 NOT NULL,
  `masters` varchar(200) CHARACTER SET utf8 NOT NULL,
  `NIDBID` varchar(25) NOT NULL,
  `presentAddress` text CHARACTER SET utf8 NOT NULL,
  `permanentAddress` text CHARACTER SET utf8 NOT NULL,
  `extraActivities` text CHARACTER SET utf8 NOT NULL,
  `whyHire` text CHARACTER SET utf8 NOT NULL,
  `dob` varchar(100) NOT NULL,
  `del_stat` int(11) NOT NULL DEFAULT '0',
  `EHQ` varchar(200) CHARACTER SET utf8 NOT NULL,
  `CIN` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `CIN_SUB` varchar(200) CHARACTER SET utf8 NOT NULL,
  `prefer_district` text NOT NULL,
  `prefer_area` text NOT NULL,
  `prefer_salary` varchar(20) NOT NULL,
  `experience` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_tutor`
--

INSERT INTO `application_tutor` (`tutor_id`, `tutor_name`, `tutor_email`, `tutor_phone`, `tutor_alter_phone`, `tutor_Prefer_medium`, `tutor_password`, `tutor_gender`, `tutor_image`, `time`, `user_type`, `user_access`, `fatherName`, `motherName`, `religion`, `ssc`, `hsc`, `graduation`, `masters`, `NIDBID`, `presentAddress`, `permanentAddress`, `extraActivities`, `whyHire`, `dob`, `del_stat`, `EHQ`, `CIN`, `CIN_SUB`, `prefer_district`, `prefer_area`, `prefer_salary`, `experience`) VALUES
(1, 'limon', 'limon@gmail.com', '01768204575', NULL, 'Bangla Medium', '81dc9bdb52d04dc20036dbd8313ed055', 'male', 'rayhan.jpg', '2020-12-29 06:30:44', 'Tutor', 1, 'test f', 'test m', 'Islam', 'Tinnandina Rashidia .B.L High School,Science,4.44,123934,Rajshahi,2010', 'rmbc,Science,4.00,126912,Rajshahi,2012', 'bubt,cse,3.54,2018', 'a,b,4,20', '14549764646', 'mohammadpur,dhaka', 'sirajganj', '', 'ok oiYDOI;WYRO;WQR  Qieu;ey;owyeo; After you get up and running, you can place Font Awesome icons just about anywhere with the <i> tag: After you get up and running, you can place Font Awesome icons just about anywhere with the <i> tag:', '2019-04-04', 0, '', '', '', '', '', '', 'wel wqiofrqeoru23o soi;hifhoaúfpefuuepfue f fuspfueoíjililihfefe This elgant yet clean and simple looking free resume HTML template comes with 5 color options: blue,brown, green, purple, red and is offered by elemisfreebies.com'),
(12, 'Asif sazal', 'sazal@gmail.com', '01725200000', '', 'Bangla Medium', '81dc9bdb52d04dc20036dbd8313ed055', 'male', '20201229_115656771asifsazal.jpeg', '2020-12-29 05:57:30', 'Tutor', 1, 'aa', 'bb', 'Islam', 'a,Science,5.00,122222,Dhaka,2010', 'b,Science,5.00,120000,Comilla,2012', 'c,cse,4.00,2019', 'iit,it,4.00,2020', '1999999999999000', 'test address', 'test address permanent', 'na', '', '1995-01-31', 0, 'msc', 'iit du', 'it', '', '', '', ''),
(13, 'Rumon Mahmud', 'rumon@gmail.com', '01234567897', '', 'Bangla Medium', '81dc9bdb52d04dc20036dbd8313ed055', '', '20201229_120455695unnamed.jpg', '2020-12-29 06:04:55', 'Tutor', 1, 'asdf', 'aswe', 'Islam', 'm,Science,5.00,121212,Dinajpur,2011', 'sj,Science,5.00,121212,Chittagong,2013', ',,,', ',,,', '1234343434', 'ss', '', '', '', '2020-12-10', 0, 'msc', 'iit du', 'iit', '', '', '', ''),
(14, 'Ashraful Islam', 'ashraful@gmail.com', '32020202020', '01589898989', 'English Medium', '81dc9bdb52d04dc20036dbd8313ed055', '', '20201229_12070186ashraful.jpeg', '2020-12-29 06:22:23', 'Tutor', 1, 'wdwdw', 'wqreqw', 'Islam', 'a,Science,5.00,123654,Dhaka,2009', 'sdjg,Science,5.00,121458,Barisal,2011', ',,,', ',,,', '1235689720', 'wdw', '', '', '', '2020-03-24', 0, 'msc', 'iit du', 'it', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `application_tutor_feedback`
--

CREATE TABLE `application_tutor_feedback` (
  `id` int(11) NOT NULL,
  `tutor_ID` varchar(100) NOT NULL,
  `tutor_feedback` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_tutor_feedback`
--

INSERT INTO `application_tutor_feedback` (`id`, `tutor_ID`, `tutor_feedback`, `status`) VALUES
(1, '1', 'tutor test ', 1),
(2, '1', '33r3', 1),
(4, '1', 'wqoiu;fud2t wrft827p3rtf97p3y f98weyf9802y4h', 1);

-- --------------------------------------------------------

--
-- Table structure for table `area_district`
--

CREATE TABLE `area_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_district`
--

INSERT INTO `area_district` (`district_id`, `district_name`) VALUES
(1, 'Barguna'),
(2, 'Barisal'),
(3, 'Bhola'),
(4, 'Jhalokati'),
(5, 'Patuakhali'),
(6, 'Pirojpur'),
(7, 'Bandarban'),
(8, 'Brahmanbaria'),
(9, 'Chandpur'),
(10, 'Chittagong'),
(11, 'Comilla'),
(12, 'Cox\'s Bazar'),
(13, 'Feni'),
(14, 'Khagrachhari'),
(15, 'Lakshmipur'),
(16, 'Noakhali'),
(17, 'Rangamati '),
(18, 'Dhaka'),
(19, 'Faridpur'),
(20, 'Gazipur'),
(21, 'Gopalganj'),
(22, 'Kishoreganj'),
(23, 'Madaripur'),
(24, 'Manikganj'),
(25, 'Munshiganj'),
(26, 'Narayanganj'),
(27, 'Narsingdi'),
(28, 'Rajbari'),
(29, 'Shariatpur'),
(30, 'Tangail'),
(31, 'Bagerhat'),
(32, 'Chuadanga'),
(33, 'Jessore'),
(34, 'Jhenaidah'),
(35, 'Khulna'),
(36, 'Kushtia'),
(37, 'Magura'),
(38, 'Sylhet'),
(39, 'Meherpur'),
(40, 'Narail'),
(41, 'Satkhira'),
(42, 'Jamalpur'),
(43, 'Mymensingh'),
(44, 'Netrokona'),
(45, 'Sherpur'),
(46, 'Bogra'),
(47, 'Joypurhat'),
(48, 'Naogaon'),
(49, 'Natore'),
(50, 'Chapai Nawabganj'),
(51, 'Pabna'),
(52, 'Rajshahi'),
(53, 'Sirajganj'),
(54, 'Dinajpur'),
(55, 'Gaibandha'),
(56, 'Kurigram'),
(57, 'Lalmonirhat'),
(58, 'Nilphamari'),
(59, 'Panchagarh'),
(60, 'Rangpur'),
(61, 'Thakurgaon'),
(62, 'Habiganj'),
(63, 'Moulvibazar'),
(64, 'Sunamganj');

-- --------------------------------------------------------

--
-- Table structure for table `area_upazilla_area`
--

CREATE TABLE `area_upazilla_area` (
  `area_id` int(11) NOT NULL,
  `district_idOf_area` varchar(5) NOT NULL,
  `area_name` varchar(30) NOT NULL,
  `area_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_upazilla_area`
--

INSERT INTO `area_upazilla_area` (`area_id`, `district_idOf_area`, `area_name`, `area_code`) VALUES
(1, '18', 'Mirpur', 'Cantonment'),
(2, '18', 'Agargaon', '1207'),
(3, '18', 'Mohammadpur', '1207'),
(4, '53', 'Sirajganj Sadar', '6700'),
(5, '10', 'Chittagong Sadar', '4376'),
(6, '18', 'Cantonment-TSO', '2016'),
(7, '18', 'DOHS', '1216'),
(8, '18', 'Adabor', '1207'),
(9, '18', 'Aftabnagar', '1216'),
(10, '18', 'Midford Road', '1100'),
(11, '18', 'Airport', 'Dhaka 1229'),
(12, '18', 'Moghbazar', 'Dhaka 1217'),
(13, '18', 'Armanitola', 'Dhaka 1100'),
(14, '18', 'Mohakhali', 'Dhaka 1212'),
(15, '18', 'Asad Gate', 'Dhaka 1205'),
(16, '18', 'Mohakhali DOHS', 'Dhaka 1206'),
(17, '18', 'Ashkona', 'Dhaka 1230'),
(18, '18', 'Azimpur', 'Dhaka'),
(19, '18', 'Mollartek', 'Dhaka 1230'),
(20, '18', 'Badda', 'Dhaka 1212'),
(21, '18', 'Munipuri Para', 'Dhaka'),
(22, '18', 'Baily Road', 'Dhaka 1217'),
(23, '18', 'Motijheel', 'Dhaka 1000'),
(24, '18', 'Bakshi Bazar', 'Dhaka 1211'),
(25, '18', 'Mouchak', ''),
(26, '18', 'Banani', ''),
(27, '18', 'Mugda', ''),
(28, '18', 'Banani DOHS', ''),
(29, '18', 'Nakhalpara', ''),
(30, '18', 'Banasree', ''),
(31, '18', 'Narinda', ''),
(32, '18', 'Bangabhaban', ''),
(33, '18', 'Natun Bazar', ''),
(34, '18', 'Bangla Motor', ''),
(35, '18', 'Nawabpur', 'Dhaka 1100'),
(36, '18', 'Bangshal', ''),
(37, '18', 'Naya Bazar', ''),
(38, '18', 'Baridhara DOHS', ''),
(39, '18', 'New Estatok Road', ''),
(40, '18', 'Bashabo', ''),
(41, '18', 'New Market', ''),
(42, '18', 'Bashundhara R/A', ''),
(43, '18', 'Niketon', ''),
(44, '18', 'Baunia', ''),
(45, '18', 'Nikunja-1', ''),
(46, '18', 'Nikunja-2', ''),
(47, '18', 'Begun Bari', ''),
(48, '18', 'Bijoy Sarani', ''),
(49, '18', 'Nobabgonj', ''),
(50, '18', 'Bijoy nagar', ''),
(51, '18', 'Norda', ''),
(52, '18', 'Bosila', ''),
(53, '18', 'Pallabi', ''),
(54, '18', 'cantonment', ''),
(55, '18', 'Paltan', ''),
(56, '18', 'Central Road', ''),
(57, '18', 'Panthapath', ''),
(58, '18', 'Chawk Bazar', ''),
(59, '18', 'Paribag', ''),
(60, '18', 'College Gate', ''),
(61, '18', 'Pilkhana', ''),
(62, '18', 'Darussalam', ''),
(63, '18', 'Pink City Model Town', ''),
(64, '18', 'Daskhin Khan', ''),
(65, '18', 'Postogola', ''),
(66, '18', 'Dhaka University Area', ''),
(67, '18', 'Puran Dhaka', ''),
(68, '18', 'Dhanmondi', ''),
(69, '18', 'Purana paltan', ''),
(70, '18', 'Dilkusha', ''),
(71, '18', 'Ramna', ''),
(72, '18', 'Dilu Road', ''),
(73, '18', 'Rampura', ''),
(74, '18', 'Doyagonj', ''),
(75, '18', 'Rayer Bazar', ''),
(76, '18', 'Elephant Road', ''),
(77, '18', 'Rayerbag', ''),
(78, '18', 'English Road', ''),
(79, '18', 'Razarbagh', ''),
(80, '18', 'Farmgate', ''),
(81, '18', 'Rupnagar', ''),
(82, '18', 'Fokirapul', ''),
(83, '18', 'Sabujbag', ''),
(84, '18', 'Gabtoli', ''),
(85, '18', 'Sadarghat', ''),
(86, '18', 'Gandaria', ''),
(87, '18', 'Sankar', ''),
(88, '18', 'Gopibagh', ''),
(89, '18', 'Sayedabad', ''),
(90, '18', 'Goran', ''),
(91, '18', 'Segunbagicha', ''),
(92, '18', 'Green Road', ''),
(93, '18', 'Shahbag', ''),
(94, '18', 'Gullistan', ''),
(95, '18', 'Shahinbag', ''),
(96, '18', 'Gulshan-1', ''),
(97, '18', 'Shahjadpur', ''),
(98, '18', 'Gulshan-2', ''),
(99, '18', 'Shajahanpur', ''),
(100, '18', 'Hatirjheel', ''),
(101, '18', 'Shantibag', ''),
(102, '18', 'Hatirpul', ''),
(103, '18', 'Shantinagar', ''),
(104, '18', 'Hazaribag', ''),
(105, '18', 'Shekhertek', ''),
(106, '18', 'Ibrahimpur', ''),
(107, '18', 'Sher-e-Bangla Nagar', ''),
(108, '18', 'Sher-e-Bangla Nagar', ''),
(109, '18', 'Indira Road', ''),
(110, '18', 'Shewrapara', ''),
(111, '18', 'Jatrabari', ''),
(112, '18', 'Shyamoli', ''),
(113, '18', 'Joynag Road', ''),
(114, '18', 'Shyampur', ''),
(115, '18', 'Jurain', ''),
(116, '18', 'Siddeshwari', ''),
(117, '18', 'Kadamtoli', ''),
(118, '18', 'Sobahanbag', ''),
(119, '18', 'Kafrul', ''),
(120, '18', 'Sonir Akra', ''),
(121, '18', 'Kakrail', ''),
(122, '18', 'Sukrabad', ''),
(123, '18', 'Kalabagan', ''),
(124, '18', 'Sutrapur', ''),
(125, '18', 'Kalachandpur', ''),
(126, '18', 'Swamibagh', ''),
(127, '18', 'Kamalapur', ''),
(128, '18', 'Tejgaon', ''),
(129, '18', 'Kamrangichar', ''),
(130, '18', 'Tejkunipara', ''),
(131, '18', 'Karwan Bazar', ''),
(132, '18', 'Tikatuli', ''),
(133, '18', 'Katabon', ''),
(134, '18', 'Tongi', ''),
(135, '18', 'Kathal Bagan', ''),
(136, '18', 'Turag', ''),
(137, '18', 'Kawla', ''),
(138, '18', 'Uttara Khan', ''),
(139, '18', 'Kazipara', ''),
(140, '18', 'Khilgaon', ''),
(141, '18', 'Uttara', ''),
(142, '18', 'Uttara Sector 1', ''),
(143, '18', 'Uttara Sector 2', ''),
(144, '18', 'Uttara Sector 3', ''),
(145, '18', 'Uttara Sector 4', ''),
(146, '18', 'Uttara Sector 5', ''),
(147, '18', 'Uttara Sector 6', ''),
(148, '18', 'Uttara Sector 7', ''),
(149, '18', 'Uttara Sector 8', ''),
(150, '18', 'Uttara Sector 9', ''),
(151, '18', 'Uttara Sector 10', ''),
(152, '18', 'Uttara Sector 11', ''),
(153, '18', 'Uttara Sector 12', ''),
(154, '18', 'Uttara Sector 13', ''),
(155, '18', 'Uttara Sector 14', ''),
(156, '18', 'Uttara Sector 15', ''),
(157, '18', 'Uttara Sector 16', ''),
(158, '18', 'Uttara Sector 17', ''),
(159, '18', 'Uttara Sector 18', ''),
(160, '18', 'khilkhet', ''),
(161, '18', 'Kotowali', ''),
(162, '18', 'Kuril', ''),
(163, '18', 'lake Circus', ''),
(164, '18', 'Lalbag', ''),
(165, '18', 'Lalmatia', ''),
(166, '18', 'Luxmi Bazar', ''),
(167, '18', 'Mallibagh', ''),
(168, '18', 'Matikata', ''),
(169, '18', 'Matuail', ''),
(170, '18', 'Mirpur 1', ''),
(171, '18', 'Mirpur 2', ''),
(172, '18', 'Mirpur 3', ''),
(173, '18', 'Mirpur 6', ''),
(174, '18', 'Mirpur 7', ''),
(175, '18', 'Mirpur 10', ''),
(176, '18', 'Mirpur 11', ''),
(177, '18', 'Mirpur 12', ''),
(178, '18', 'Mirpur 13', ''),
(179, '18', 'Mirpur 14', ''),
(180, '18', 'Vasantek', ''),
(181, '18', 'Wari', ''),
(182, '18', 'West Rampur', ''),
(183, '18', 'Zigatola', '');

-- --------------------------------------------------------

--
-- Table structure for table `control_admin`
--

CREATE TABLE `control_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cell` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `level` varchar(11) NOT NULL DEFAULT '1',
  `photo` varchar(200) NOT NULL,
  `access` varchar(11) NOT NULL DEFAULT '1',
  `createdBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `control_admin`
--

INSERT INTO `control_admin` (`id`, `name`, `cell`, `email`, `password`, `address`, `created_at`, `level`, `photo`, `access`, `createdBy`) VALUES
(2, 'Abu Rayhan Miah', '01768204575', 'limon.bd.0306@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Mirpur-2', '2019-03-20 15:03:48', '1', 'vendors/images/admins/IMG_20161119_210508.jpg', '1', 'Rayhan(limon@gmail.com)'),
(4, 'Ashraful', '01723777711', 'ashraful@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'na', '2020-12-29 06:36:32', '1', 'vendors/images/admins/ashraful.jpeg', '1', 'Abu Rayhan Miah(limon.bd.0306@gmail.com)'),
(5, 'Rumon', '01235689858', 'rumon@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'wkqjhdiuewh', '2020-12-29 06:44:09', '1', 'vendors/images/admins/unnamed.jpg', '1', 'Ashraful(ashraful@gmail.com)'),
(6, 'Asif Ahmed Sazal', '01258989856', 'asif@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'msadnfjkd', '2020-12-29 06:44:44', '1', 'vendors/images/admins/asifsazal.jpg', '1', 'Ashraful(ashraful@gmail.com)');

-- --------------------------------------------------------

--
-- Table structure for table `how_you_know_us`
--

CREATE TABLE `how_you_know_us` (
  `id` int(11) NOT NULL,
  `answer_options` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `how_you_know_us`
--

INSERT INTO `how_you_know_us` (`id`, `answer_options`) VALUES
(1, 'From friends and family'),
(2, 'From facebook'),
(3, 'From google'),
(4, 'From newspaper'),
(5, 'From others'),
(6, 'Leaflet'),
(7, 'Visiting Card'),
(8, 'Billboard'),
(9, 'E-mail');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_manager`
--

CREATE TABLE `password_reset_manager` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_manager`
--

INSERT INTO `password_reset_manager` (`id`, `email`, `key`, `expDate`) VALUES
(12, 'limon7530.it@gmail.com', '768e78024aa8fdb9b8fe87be86f647454317f780e8', '2020-12-17 12:20:10'),
(13, 'limon7530.it@gmail.com', '768e78024aa8fdb9b8fe87be86f647450579c89c8d', '2020-12-20 12:21:02'),
(14, 'limon.bd.0306@gmail.com', '30d74b14954f2f321d1b70b0b4da018ec812a0e434', '2020-12-29 11:38:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_applied_job`
--
ALTER TABLE `application_applied_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_category`
--
ALTER TABLE `application_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `application_contact`
--
ALTER TABLE `application_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_job`
--
ALTER TABLE `application_job`
  ADD PRIMARY KEY (`jobId`);

--
-- Indexes for table `application_payment`
--
ALTER TABLE `application_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `application_student`
--
ALTER TABLE `application_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `application_student_feedback`
--
ALTER TABLE `application_student_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_subject`
--
ALTER TABLE `application_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `application_sub_category`
--
ALTER TABLE `application_sub_category`
  ADD PRIMARY KEY (`subCat_id`);

--
-- Indexes for table `application_tutor`
--
ALTER TABLE `application_tutor`
  ADD PRIMARY KEY (`tutor_id`);

--
-- Indexes for table `application_tutor_feedback`
--
ALTER TABLE `application_tutor_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_district`
--
ALTER TABLE `area_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `area_upazilla_area`
--
ALTER TABLE `area_upazilla_area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `control_admin`
--
ALTER TABLE `control_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `how_you_know_us`
--
ALTER TABLE `how_you_know_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_manager`
--
ALTER TABLE `password_reset_manager`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_applied_job`
--
ALTER TABLE `application_applied_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `application_category`
--
ALTER TABLE `application_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `application_contact`
--
ALTER TABLE `application_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application_job`
--
ALTER TABLE `application_job`
  MODIFY `jobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `application_payment`
--
ALTER TABLE `application_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application_student`
--
ALTER TABLE `application_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `application_student_feedback`
--
ALTER TABLE `application_student_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `application_subject`
--
ALTER TABLE `application_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `application_sub_category`
--
ALTER TABLE `application_sub_category`
  MODIFY `subCat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `application_tutor`
--
ALTER TABLE `application_tutor`
  MODIFY `tutor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `application_tutor_feedback`
--
ALTER TABLE `application_tutor_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `area_district`
--
ALTER TABLE `area_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `area_upazilla_area`
--
ALTER TABLE `area_upazilla_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `control_admin`
--
ALTER TABLE `control_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `how_you_know_us`
--
ALTER TABLE `how_you_know_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `password_reset_manager`
--
ALTER TABLE `password_reset_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
