-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 07:47 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cchn_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `adminid` int(30) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `status` text NOT NULL,
  `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`adminid`, `fullname`, `phoneno`, `email`, `username`, `password`, `status`, `regdate`) VALUES
(5, 'Bless Eshun', '0242701474', 'eshunbless1@gmail.com', 'admin', '$2y$10$PpSgbCn3qgDOb70lil4xrO7aRveClKyOpudT3Vw1J2ajorHR9.Q0O', 'Inactive', '2021-01-24 01:56:24'),
(6, 'System Admin', '0542821568', 'admin@cchn-voting.com', 'test', '$2y$10$G.0702L5JRvuCeztv5nwDOlvGUN04Q/Rd1Ju.UOySbM2VR9dSOgdu', 'Active', '2021-01-24 08:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidateid` int(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `position` varchar(200) NOT NULL,
  `createdby` text NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidateid`, `name`, `gender`, `phoneno`, `position`, `createdby`, `picture`) VALUES
(1, 'Philip Mensah', 'Male', '0241561272', 'President', 'Rebecca Dadzie', 'upload/face24.jpg'),
(2, 'Prissy Affedzie', 'Female', '0245194555', 'General Secretary', 'Rebecca Dadzie', 'upload/face11.jpg'),
(3, 'Mary Mensah', 'Female', '0242701474', 'General Secretary', 'Rebecca Dadzie', 'upload/img 1.PNG'),
(4, 'Fred Oppong', 'Male', '0551230212', 'President', 'Rebecca Dadzie', 'upload/iimg 2.PNG'),
(5, 'Evans Aryitey', 'Female', '0570746780', 'President', 'Bless Eshun', 'upload/user8-128x128.jpg'),
(6, 'Becca Shaun', 'Female', '0542821568', 'Financial Secretary', 'Bless Eshun', 'upload/face26.jpg'),
(7, 'Joe Affedzie', 'Male', '0277100022', 'Public Relations', 'System Admin', 'upload/face27.jpg'),
(8, 'Bright Doe', 'Male', '0547875324', 'General Organizer', 'System Admin', 'upload/face14.jpg'),
(9, 'John Smith', 'Male', '0262328119', 'Press & Information', 'System Admin', 'upload/face21.jpg'),
(10, 'Isaac Kurt', 'Male', '0540397307', 'General Organizer', 'System Admin', 'upload/face25.jpg'),
(11, 'Alfred Sowah', 'Male', '0123456789', 'Secretary For Education', 'System Admin', 'upload/face4.jpg'),
(12, 'Albert Duncan', 'Male', '0543536657', 'Financial Secretary', 'System Admin', 'upload/face18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `otp` varchar(30) NOT NULL,
  `mobileno` varchar(30) NOT NULL,
  `code_state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `otp`, `mobileno`, `code_state`) VALUES
(1, '6719', '0241565520', 1),
(2, '5726', '0555428455', 0),
(3, '9898', '0555428455', 0),
(4, '5005', '0555428455', 0),
(5, '8640', '0555428455', 0),
(6, '9800', '0555428455', 0),
(7, '4523', '0555428455', 0),
(8, '3252', '0555428455', 0),
(9, '4192', '0241565520', 0),
(10, '2755', '0555428455', 0),
(11, '4492', '0552513405', 0),
(12, '9408', '0555428455', 0),
(13, '4684', '0555428455', 1),
(14, '5463', '0241565520', 0),
(15, '7605', '0241565520', 0),
(16, '8382', '0555428455', 0),
(17, '3883', '0555428455', 1),
(18, '7641', '0241565520', 1),
(19, '5712', '0555428455', 1),
(20, '2637', '0555428455', 1),
(21, '3336', '0241565520', 0),
(22, '5595', '0555428455', 1),
(23, '9033', '0555212020', 0),
(24, '5531', '0555212020', 0),
(25, '4901', '0555212020', 0),
(26, '9041', '0555212020', 1),
(27, '2530', '0555212020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `voterid` int(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `course` varchar(200) NOT NULL,
  `createdby` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`voterid`, `name`, `gender`, `phoneno`, `course`, `createdby`) VALUES
(2, 'Bless Eshun', 'Male', '0241565520', 'General Nursing', 'Rebecca Dadzie'),
(5, 'Peter Donkor', 'Male', '0552513405', 'Health Assistant', 'System Admin'),
(9, 'Mabel Tackie', 'Female', '0555428455', 'Health Assistant', 'Bless Eshun'),
(12, 'Ebenezer Tamatey', 'Male', '0242701474', 'Laboratory Technician', 'Bless Eshun'),
(13, 'Mercy Ahordabge', 'Female', '0570746780', 'General Nursing', 'Bless Eshun'),
(14, 'Joseph Affedzie', 'Male', '0277100022', 'Physician Assistant', 'System Admin'),
(15, ' Real Studios Limited', 'Male', '0555212020', 'Health Assistant', 'Bless Eshun');

-- --------------------------------------------------------

--
-- Table structure for table `vote_cast`
--

CREATE TABLE `vote_cast` (
  `voteid` int(11) NOT NULL,
  `candidate_id` int(30) NOT NULL,
  `voter_id` int(30) NOT NULL,
  `vote_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidateid`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`voterid`);

--
-- Indexes for table `vote_cast`
--
ALTER TABLE `vote_cast`
  ADD PRIMARY KEY (`voteid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `adminid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidateid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `voterid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vote_cast`
--
ALTER TABLE `vote_cast`
  MODIFY `voteid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
