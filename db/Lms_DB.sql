-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 14, 2022 at 11:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Lms_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_sign`
--

CREATE TABLE `admin_sign` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_sign`
--

INSERT INTO `admin_sign` (`id`, `username`, `email`, `pass`) VALUES
(1, 'Ali Bhai', 'admin@admin.com', 'admin'),
(2, 'new', 'new@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `author` varchar(55) NOT NULL DEFAULT 'Not Defined Any Author',
  `duration` text NOT NULL,
  `o_price` int(11) DEFAULT 250,
  `s_price` int(11) DEFAULT NULL,
  `description` text DEFAULT 'There is no descripton for this course',
  `course_image` text DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `author`, `duration`, `o_price`, `s_price`, `description`, `course_image`, `date`) VALUES
(198, 'Vanilla JS', 'Bhai Jan', '23 days', 2300, 2000, 'PHP course by Umair Ali.', '', '2022-03-27 23:16:01'),
(273, 'python3 course', 'Ali', '34 days', 234, 200, 'new python course', '', '2022-03-30 20:48:08'),
(275, 'new course by me', 'This is mine', '67 days', 99000, 3400, 'New description', '', '2022-03-28 01:39:15'),
(276, 'PHP Advanced Course', 'Umair Ali', '16 days', 325, 235, 'DLKSAJF LA;FDJK', '', '2022-03-28 01:45:19'),
(277, 'Umairali', 'ali', 'klkj', 35, 233435, 'alfdj alfdjka', '', '2022-03-28 02:26:42'),
(281, 'new course by me', 'This is mine', '67 days', 99000, 3400, 'New description', '', '2022-03-28 01:39:15'),
(282, 'PHP Advanced Course', 'Umair Ali', '16 days', 325, 235, 'DLKSAJF LA;FDJK', '', '2022-03-28 01:45:19'),
(283, 'Umairali', 'ali', 'klkj', 35, 233435, 'alfdj alfdjka', '', '2022-03-28 02:26:42'),
(284, 'new course by me', 'This is mine', '67 days', 99000, 3400, 'New description', '', '2022-03-28 01:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `feedback` text DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feedback`, `student_id`) VALUES
(12, 'I have learnt a lot of things form their courses!', 46),
(16, 'This is my feedback!', 59),
(20, 'I have learn Vanilla Js from their courses!', 50);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `description` text DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `c_name` varchar(55) DEFAULT NULL,
  `date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `name`, `link`, `description`, `c_id`, `c_name`, `date`) VALUES
(26, 'Introduction to JavaScript', 'lessons_vid/lec1.mp4', 'This is a lesson 6 of this course', 198, 'Vanilla JS', '2022-04-01'),
(30, 'Learn Variables ', 'lessons_vid/lec2.mp4', 'This a description of lesson 2', 198, 'Vanilla JS', '2022-04-02'),
(32, 'Lesson 2 of PHP', 'lessons_vid/lec4.mp4', 'This a description of lesson 2', 276, 'PHP Advanced Course', '2022-04-02'),
(33, 'Introduction to python3', 'lessons_vid/lec5.mp4', 'This is very important lecture of this course ', 273, 'python course', '2022-04-03'),
(34, 'Data Type', 'lessons_vid/lec3.mp4', 'Data types of this course', 198, 'Vanilla JS', '2022-04-03'),
(35, 'new lecture of vanilla js', 'lessons_vid/lec4.mp4', 'roughroughroughroughroughrough', 198, 'Vanilla JS', '2022-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `orderid` text NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `orderid`, `course_name`, `course_id`, `stu_email`, `price`, `date`) VALUES
(12, 'ORD950129310', 'PHP Advanced Course', 276, 'ok@gmail.com', 235, '2022-04-03'),
(13, 'ORD1156378777', 'Vanilla JS', 198, 'ok@gmail.com', 2000, '2022-04-03'),
(25, 'ORD428775153', 'python3 course', 273, 'ok@gmail.com', 200, '2022-04-03'),
(27, 'ORD1354351856', 'new course by me', 275, 'mine@gmail.com', 3400, '2022-04-03'),
(30, 'ORD203621945', 'python3 course', 273, 'alibhai', 200, '2022-04-04'),
(32, 'ORD2005895459', 'Vanilla JS', 198, 'umair@umair.com', 2000, '2022-04-05'),
(33, 'ORD1164105808', 'python3 course', 273, 'ali', 200, '2022-04-22'),
(34, 'ORD761179784', 'Vanilla JS', 198, 'ali', 2000, '2022-04-22'),
(38, 'ORD2036978925', 'python3 course', 273, 'ali', 200, '2022-08-15'),
(39, 'ORD1082192019', 'PHP Advanced Course', 276, 'ali', 235, '2022-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `sign_form`
--

CREATE TABLE `sign_form` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL DEFAULT 'Not entered',
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `c_pass` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `occupation` varchar(100) DEFAULT 'Enter Your Occupation',
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sign_form`
--

INSERT INTO `sign_form` (`id`, `username`, `email`, `pass`, `c_pass`, `date`, `occupation`, `img`) VALUES
(42, 'admin', 'admin@gmail.com', 'ali', 'ali', '2022-03-18 20:33:45', 'Administrator', 'profile-pics/Rectangle (1).png'),
(44, 'ali', 'ali@admin.com', 'ali', 'ali', '2022-03-22 23:26:20', NULL, NULL),
(46, 'Umair', 'ok@gmail.com', 'ok', 'ok', '2022-03-28 21:49:41', 'Job', 'profile-pics/Group 136.png'),
(50, 'Ali Bhai', 'ali', 'ali', 'ali', '2022-03-29 00:26:32', 'Learning and Learning', 'profile-pics/behalf umair.jpg'),
(51, 'Ali', 'admin', 'new pass', 'new pass', '2022-03-29 00:27:42', 'jobs', 'profile-pics/Group 136.png'),
(54, 'alibhai23', 'alibhai90', 'okdd', 'okdd', '2022-03-29 00:47:18', NULL, NULL),
(55, 'nine', 'nine@gmail.com', 'oking', 'oking', '2022-03-29 02:11:53', NULL, NULL),
(56, 'ten', 'oking', 'ten', 'ten', '2022-03-29 02:14:17', NULL, NULL),
(59, 'Ali Bro', 'alibhai', 'ali', 'ali', '2022-04-04 23:21:49', 'Wela Insaan', 'profile-pics/Group 35.png'),
(60, 'umair ali', 'umair@umair.com', 'ali', 'ali', '2022-04-05 12:40:45', 'nothing', 'profile-pics/pricing-table.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_sign`
--
ALTER TABLE `admin_sign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_form`
--
ALTER TABLE `sign_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_sign`
--
ALTER TABLE `admin_sign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sign_form`
--
ALTER TABLE `sign_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
