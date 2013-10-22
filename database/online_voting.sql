-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2013 at 10:30 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `acct_id` int(11) NOT NULL AUTO_INCREMENT,
  `acct_username` varchar(45) DEFAULT NULL,
  `acct_password` varchar(45) DEFAULT NULL,
  `acct_lname` varchar(45) DEFAULT NULL,
  `acct_fname` varchar(45) DEFAULT NULL,
  `acct_mname` varchar(45) DEFAULT NULL,
  `email_address` varchar(45) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `acct_status` int(11) DEFAULT '0',
  `reg_status` binary(1) DEFAULT '0',
  `time_date_log` datetime DEFAULT NULL,
  `acct_type_id` int(11) NOT NULL,
  PRIMARY KEY (`acct_id`),
  UNIQUE KEY `acct_username_UNIQUE` (`acct_username`),
  KEY `fk_voter_course1_idx` (`course_id`),
  KEY `fk_account_account_type1_idx` (`acct_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acct_id`, `acct_username`, `acct_password`, `acct_lname`, `acct_fname`, `acct_mname`, `email_address`, `course_id`, `acct_status`, `reg_status`, `time_date_log`, `acct_type_id`) VALUES
(1, '1102089', 'test', 'Tan', 'Chin Tinn Lourence', 'Son', 'chintinntan1391@gmail.com', 1, 0, '1', '2013-10-25 08:05:00', 1),
(2, '1102090', 'test', 'Tan', 'Chin Tinn Lourence', 'Son', 'chintinntan1391@gmail.com', 1, 0, '1', '0000-00-00 00:00:00', 1),
(3, '1102091', NULL, 'Padao', 'Francis', 'Francisquete', 'fpadao@gmail.com', 1, 0, '1', '0000-00-00 00:00:00', 1),
(4, '1102092', NULL, 'test', 'test', 'test', 'test@gmail.com', 1, 0, '0', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `account_admin`
--

CREATE TABLE IF NOT EXISTS `account_admin` (
  `acct_admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `acct_username` varchar(45) DEFAULT NULL,
  `acct_password` varchar(45) DEFAULT NULL,
  `acct_fname` varchar(45) DEFAULT NULL,
  `acct_mname` varchar(45) DEFAULT NULL,
  `acct_lname` varchar(45) DEFAULT NULL,
  `account_type_id` int(11) NOT NULL,
  PRIMARY KEY (`acct_admin_id`),
  KEY `fk_account_admin_account_type1_idx` (`account_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `account_admin`
--

INSERT INTO `account_admin` (`acct_admin_id`, `acct_username`, `acct_password`, `acct_fname`, `acct_mname`, `acct_lname`, `account_type_id`) VALUES
(1, 'test', 'test', 'test', 'test', 'test', 2);

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE IF NOT EXISTS `account_type` (
  `acct_type_id` int(11) NOT NULL,
  `acct_type_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`acct_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`acct_type_id`, `acct_type_name`) VALUES
(1, 'Voter'),
(2, 'Comelec Assistant');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `cand_id` int(11) NOT NULL AUTO_INCREMENT,
  `acct_id` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `pos_id` int(11) NOT NULL,
  PRIMARY KEY (`cand_id`),
  KEY `fk_candidate_voter_idx` (`acct_id`),
  KEY `fk_candidate_shool_year1_idx` (`sy_id`),
  KEY `fk_candidate_position1_idx` (`pos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_voter`
--

CREATE TABLE IF NOT EXISTS `candidate_voter` (
  `cand_vot_id` int(11) NOT NULL AUTO_INCREMENT,
  `cand_id` int(11) DEFAULT NULL,
  `acct_id` int(11) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`cand_vot_id`),
  KEY `fk_candidate_voter_candidate1_idx` (`cand_id`),
  KEY `fk_candidate_voter_voter1_idx` (`acct_id`),
  KEY `fk_candidate_voter_position1_idx` (`pos_id`),
  KEY `fk_candidate_voter_shool_year1_idx` (`sy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) DEFAULT NULL,
  `prog_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `fk_course_program1_idx` (`prog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `prog_id`) VALUES
(1, 'Bachelor of Science in Information Technology', 1),
(2, 'Bachelor of Science in Computer Science', 1),
(3, 'Bachelor of Science in Information System', 1);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE IF NOT EXISTS `division` (
  `div_id` int(11) NOT NULL AUTO_INCREMENT,
  `div_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`div_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `pos_id` int(11) NOT NULL,
  `pos_name` varchar(45) DEFAULT NULL,
  `div_id` int(11) NOT NULL,
  `order_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`pos_id`),
  KEY `fk_position_division1_idx` (`div_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `prog_id` int(11) NOT NULL AUTO_INCREMENT,
  `prog_code` varchar(45) DEFAULT NULL,
  `prog_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`prog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`prog_id`, `prog_code`, `prog_name`) VALUES
(1, 'ITE', 'Information Technology Education');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE IF NOT EXISTS `school_year` (
  `sy_id` int(11) NOT NULL AUTO_INCREMENT,
  `sy_desc` varchar(45) DEFAULT NULL,
  `sy_status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`sy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `voting_station`
--

CREATE TABLE IF NOT EXISTS `voting_station` (
  `vot_station_id` int(11) NOT NULL AUTO_INCREMENT,
  `mac_address` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`vot_station_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `fk_account_account_type1` FOREIGN KEY (`acct_type_id`) REFERENCES `account_type` (`acct_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_voter_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `account_admin`
--
ALTER TABLE `account_admin`
  ADD CONSTRAINT `acct_type_id` FOREIGN KEY (`account_type_id`) REFERENCES `account_type` (`acct_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `fk_candidate_position1` FOREIGN KEY (`pos_id`) REFERENCES `position` (`pos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidate_shool_year1` FOREIGN KEY (`sy_id`) REFERENCES `school_year` (`sy_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidate_voter` FOREIGN KEY (`acct_id`) REFERENCES `account` (`acct_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `candidate_voter`
--
ALTER TABLE `candidate_voter`
  ADD CONSTRAINT `fk_candidate_voter_candidate1` FOREIGN KEY (`cand_id`) REFERENCES `candidate` (`cand_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidate_voter_position1` FOREIGN KEY (`pos_id`) REFERENCES `position` (`pos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidate_voter_shool_year1` FOREIGN KEY (`sy_id`) REFERENCES `school_year` (`sy_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidate_voter_voter1` FOREIGN KEY (`acct_id`) REFERENCES `account` (`acct_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_course_program1` FOREIGN KEY (`prog_id`) REFERENCES `program` (`prog_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `fk_position_division1` FOREIGN KEY (`div_id`) REFERENCES `division` (`div_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
