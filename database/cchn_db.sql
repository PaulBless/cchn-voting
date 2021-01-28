-- Database Design Script for E-voting system

-- Script Written by: Paul Eshun
-- Role: Software Web Developer

-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database Name: `cchn_db`
-- --------------------------


-- table structure for admin / users
-- ---------------------------------------
CREATE TABLE IF NOT EXISTS `admin_account`(
  `adminid` int(30) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL, -- login_ID
  `password` text NOT NULL,
  `status` text NOT NULL,
  -- `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`adminid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- table structure for candidates
-- ---------------------------------------
CREATE TABLE IF NOT EXISTS `candidates`(
  `candidateid` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `position` varchar(200) NOT NULL,
  -- `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  `createdby` text NOT NULL, 
  `picture` varchar(255) NOT NULL, 
    PRIMARY KEY (`candidateid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- table structure for voters
-- ---------------------------------------
CREATE TABLE IF NOT EXISTS `voters`(
  `voterid` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `course` varchar(200) NOT NULL,
  -- `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  `createdby` text NOT NULL, 
    PRIMARY KEY (`voterid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- table structure for vote_cast
-- ---------------------------------------
CREATE TABLE IF NOT EXISTS `vote_cast`(
  `voteid` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_id` int(30) NOT NULL,
  `voter_id` int(30) NOT NULL,
  `vote_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`voteid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- table structure for codes
-- ---------------------------------------
CREATE TABLE IF NOT EXISTS `codes`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `otp` varchar(30) NOT NULL,
  `mobileno` varchar(30) NOT NULL,
  `code_state` int(11) NOT NULL, 
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
