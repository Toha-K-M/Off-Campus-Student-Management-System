-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 07:56 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `off-campus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--

CREATE TABLE `admin_register` (
  `username` varchar(7) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `startingyear` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`username`, `name`, `gender`, `address`, `startingyear`, `email`, `phone`, `usertype`, `password`) VALUES
('CA1234', 'Mr. Kalam', 'Male', 'Gambang, Pahang', '2011', 'kalam@yahoo.com', '+6010113077', 'Admin', 'kalam'),
('CA16112', 'Mr. Rahat Khan', 'Male', 'Bukhet Bintang, Kl', '2011', 'rahat@yahoo.com', '+6010115100', 'Admin', 'rahat'),
('CA17111', 'Mr. Abdullah Ahmed', 'Male', 'Pekan, Pahang', '2010', 'abdullah123@gmail.com', '+6010113678', 'Admin', 'abc'),
('CA17112', 'Md. Ratan Habib', 'Male', 'Tamantas, Pahang', '2010', 'ratan123@yahoo.com', '+6010113677', 'Admin', 'ratan'),
('CA17117', 'Mr, Abdul Alim', 'Male', 'penang,pahang', '2015', 'abdul@gmail.com', '+6010113638', 'Admin', 'bdul'),
('CA17178', 'lubaba Mannan Raat', 'Female', 'penang,pahang', '2018', 'rat@gmail.com', '+6010113699', 'Admin', 'raat'),
('CA17345', 'lubaba Mannan', 'Female', 'Bukhet Bintang, Kl', '2017', 'lubaba@gmail.com', '+6010113123', 'Admin', 'lubaba'),
('CA17555', 'Mrs. Leera Ahmed', 'Female', 'penang,pahang', '2012', 'leera@yahoo.com', '+6010113617', 'Admin', 'leera'),
('CB17113', 'Rima Sen', 'Female', 'Pekan, pahang', '2012', 'rima123@gmail.com', '+6010113676', 'Admin', 'rima'),
('CB17119', 'Kaniz Fatema', 'Female', 'Bukhet Bintang, Kl', '2016', 'kaniz@gmail.com', '+6010113676', 'Admin', '123'),
('CB17120', 'Mr. Kadir Ahmed', 'Male', 'Gambang, Pahang', '2010', 'kadir@yahoo.com', '+6010113612', 'Admin', 'kadir'),
('CB17189', 'Niger', 'Female', 'Pekan, Pahang', '2012', 'niger@gmail.com', '+6010113120', 'Admin', '9090'),
('CD17110', 'rima Fatema', 'Female', 'Gambang, Pahang', '2010', 'rima@yahoo.com', '+6010113612', 'Admin', 'rima'),
('CD18112', 'Mr. Amirul Isalm', 'Male', 'Tanamtas, pahang', '2012', 'amirul@yahoo.com', '+6010113679', 'Admin', 'amirul'),
('CH10998', 'Mrs. Maliha Tahsin', 'Female', 'Gambang, Pahang', '2018', 'maliha109@yahoo.com', '+6010113970', 'Admin', 'maliha'),
('CK17116', 'Md. labib Mahmum', 'Male', 'Tamantas, Pahang', '2014', 'mahmud123@gmail.com', '+6010113616', 'Admin', 'mahmud'),
('CL00917', 'Lubna Akther', 'Female', 'Kuantan,pahang', '2013', 'lubna@yahoo.com', '+6010113690', 'Admin', 'lubna');

-- --------------------------------------------------------

--
-- Table structure for table `advertise`
--

CREATE TABLE `advertise` (
  `photo` varchar(50) NOT NULL,
  `text` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertise`
--

INSERT INTO `advertise` (`photo`, `text`) VALUES
('01oc.jpg', '\r\nHomestay Pekan Pahang (7C0098)\r\nTaman Harmoni, Taman Ungku Tun Aminah, Iskandar Puteri, Johor\r\n\r\nJ'),
('02oc.jpg', '\r\nKuantan-Pahang-House-For-Rent-JACK-WOON-KIM-HOONG\r\nKuantan, Pahang\r\n\r\n2-Sty House for Rent @ Bukit');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `date` date NOT NULL,
  `headline` varchar(200) NOT NULL,
  `details` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`date`, `headline`, `details`) VALUES
('2030-12-17', 'NEST is about', 'This is NEST access for Semester 2 Session 2017/2018.\r\n\r\nFor students, you can use KALAM to get access to your course\'s content (resources and activities) prepared for the course. But the content may subject to changes and updates by the current course instructor. Course instructors may take some ti'),
('2012-04-18', 'Holiday', 'Knowledge & Learning Management System (KALAM) is UMP\'s online private learning management system (LMS) platform.  It\'s introduction is to cater for the new approach to learning that dominates current life styles especially that of younger generation.  The four main features of KALAM are course ...'),
('2010-05-18', 'UMP Holiday', 'is also guided by the Dasar e-Pembelajaran Negara (DePAN) formulated by Ministry of Education, Malaysia. KALAM is connected with UMP\'s Integrated Management System (IMS) Academic in term of course offered, enrolment and user access.  Student and lecturer accessibility to KALAM are concurrent with th'),
('2021-05-18', 'UMP Iftar', 'This event will be held in pekan campus with the orphanage students'),
('2021-05-18', 'UMP Holiday', 'Today is holiday in ump');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `title` varchar(100) NOT NULL,
  `start` varchar(20) NOT NULL,
  `end` varchar(20) NOT NULL,
  `details` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`title`, `start`, `end`, `details`) VALUES
('UMP Iftar PArty', '0000-00-00', '0000-00-00', 'this event will be hld in pekan campus'),
('UMP Iftar PArty', '24/04/18', '24/04/18', 'today there has a iftar party');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `username` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `years` varchar(10) NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`username`, `name`, `date`, `years`, `amount`) VALUES
('CA17111', 'Mr. Abdullah Ahmed', '22/04/18', '02', '100'),
('CD17115', 'Md. Toha Khan Mozlish', '12/04/18', '2', '100'),
('CA17118', 'Lira Haque', '12/04/18', '3', '150'),
('CA17111', 'Mr. Abdullah Ahmed', '10/05/18', '2', '100'),
('CA17111', 'Mr. Abdullah Ahmed', '21/05/18', '2', '100');

-- --------------------------------------------------------

--
-- Table structure for table `financial`
--

CREATE TABLE `financial` (
  `username` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` varchar(30) NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financial`
--

INSERT INTO `financial` (`username`, `name`, `date`, `amount`) VALUES
('CA17111', 'Mr. Abdullah Ahmed', '03, June, 2017', '50'),
('CD17114', 'Niger', '03, May, 2017', '50');

-- --------------------------------------------------------

--
-- Table structure for table `proof`
--

CREATE TABLE `proof` (
  `photo` varchar(100) NOT NULL,
  `text` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proof`
--

INSERT INTO `proof` (`photo`, `text`) VALUES
('BCM3163 - Chapter 1.pdf', 'proof'),
('06.jpg', 'mr. a');

-- --------------------------------------------------------

--
-- Table structure for table `student_register`
--

CREATE TABLE `student_register` (
  `username` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `startingyear` varchar(10) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_register`
--

INSERT INTO `student_register` (`username`, `name`, `gender`, `address`, `email`, `startingyear`, `faculty`, `phone`, `usertype`, `password`) VALUES
('BL16224', 'Mr. Rahim Ahmed', 'Male', '90,Gambang,Pahang', 'rahim@yahoo.com', '2016', '', '+6010113645', 'Student', 'rahim'),
('CB17119', 'Samiul Karim', 'Male', 'Terenganu, Pahang', 'samiul@gmail.com', '2017', 'FSKKP', '+6010113566', 'Student', 'samiul'),
('CB18110', 'Lopa Madhure', 'Female', 'Bukhet Bintang, Kl', 'lopa@gmail.com', '2017', 'FSKKP', '+60101136376', 'Student', 'lopa'),
('CD17115', 'Md. Toha Khan Mozlish', 'Male', 'Gambang,Pahang', 'toha@gmail.com', '2010', 'FSKKP', '+60101131000', 'Student', 'toha'),
('CH17115', 'Rafid Shanto', 'Male', 'Gambang, Pahang', 'rafid@gmail.com', '2016', 'FSKKP', '+60101131767', 'Student', 'rafid'),
('CL17113', 'Karim Ahmed', 'Male', 'penang,pahang', 'karim@gmail.com', '2011', 'FSKKP', '+60101136578', 'Student', 'karim'),
('CM10987', 'Lira Haque', 'Female', 'Gambang, Pahang', 'lira@gmail.com', '2011', '', '+6010113167', 'Student', 'lira'),
('CS1234', 'Mr.  Rahman', 'Male', 'Pekan, Pahang', 'rahman@yahoo.com', '2016', 'FSKKP', '+6010113007', 'Student', 'lol');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `startingyear` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `username`, `name`, `gender`, `address`, `startingyear`, `email`, `phone`, `usertype`, `faculty`, `password`) VALUES
(7, 'CA17113', 'Sahara Haque', 'Female', 'Gambang, Pahang', '2018', 'sahara@yahoo.com', '+6010113009', 'Student', 'FSKKP', 'sahara'),
(8, 'CA17118', 'Niger', 'Female', 'Gambang, Pahang', '2010', 'niger@yahoo.com', '+60101136789', 'Student', 'FSKKP', 'niger'),
(9, 'CH17110', 'Kabir Hossain', 'Male', 'Tamantas, Pahang', '2018', 'kabir@yahoo.com', '+6010113067', 'Student', 'FSKKP', 'kabir'),
(10, 'CK17112', 'Lopa Madhure', 'Female', 'Kuantan,pahang', '2011', 'lopa@yahoo.com', '+6010113129', 'Student', 'FSKKP', 'lopa'),
(11, 'CK17119', 'Lima Hasan', 'Female', '90,Gambang,Pahang', '2010', 'lima@yahoo.com', '+6010113065', 'Student', 'FSKKP', 'lima'),
(12, 'CL15150', 'Lomat Khna', 'Female', 'Bukhet Bintang, Kl', '2014', 'lomat@yahoo.com', '+6010113068', 'Student', 'FSKKP', 'lomat'),
(13, 'CL17112', 'Rishad Rahim', 'Male', 'Tamantas, Pahang', '2011', 'rishad@yahoo.com', '+6010113187', 'Student', 'FSKKP', 'rishad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_register`
--
ALTER TABLE `admin_register`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `unique` (`email`);

--
-- Indexes for table `student_register`
--
ALTER TABLE `student_register`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
