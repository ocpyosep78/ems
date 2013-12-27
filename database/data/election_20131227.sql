-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2013 at 03:46 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `election`
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
  `acct_status` tinyint(4) DEFAULT '0',
  `reg_status` tinyint(4) DEFAULT '0',
  `time_date_log` datetime DEFAULT NULL,
  `acct_type_id` int(11) NOT NULL,
  PRIMARY KEY (`acct_id`),
  UNIQUE KEY `acct_username_UNIQUE` (`acct_username`),
  KEY `fk_voter_course1_idx` (`course_id`),
  KEY `fk_account_account_type1_idx` (`acct_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acct_id`, `acct_username`, `acct_password`, `acct_lname`, `acct_fname`, `acct_mname`, `email_address`, `course_id`, `acct_status`, `reg_status`, `time_date_log`, `acct_type_id`) VALUES
(1, '1100458', 'donotdo123', 'Vasquez', 'Kenneth', 'Balboa', 'garapudka@yahoo.com', 1, 1, 1, '1991-11-02 10:34:21', 1),
(2, '0020941', 'fpadao', 'padao', 'francis rey', 'francisquete', 'francisreypadao@gmail.com', 2, 1, 1, '2013-12-24 10:34:21', 1),
(3, '1001887', 'ssevilla', 'Sevilla', 'Miguel Angelo', 'Yap', 'miguelsevilla05@gmail.com', 3, 1, 1, '2013-12-24 10:34:21', 1),
(4, '1001881', 'ssevillaa', 'Sevilla', 'Miguel Angelo', 'Yap', 'miguelsevilla05@gmail.com', 4, 1, 1, '2013-12-24 10:34:21', 1),
(5, '1001882', 'ssevillaaa', 'Sevilla', 'Miguel Angelo', 'Yap', 'miguelsevilla05@gmail.com', 5, 1, 1, '2013-12-24 10:34:21', 1),
(6, '1001883', 'ssevillaaaa', 'Sevilla', 'Miguel Angelo', 'Yap', 'miguelsevilla05@gmail.com', 6, 1, 1, '2013-12-24 10:34:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE IF NOT EXISTS `account_type` (
  `acct_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `acct_type_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`acct_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`acct_type_id`, `acct_type_name`) VALUES
(1, 'Voter'),
(2, 'Board of Election Inspector'),
(3, 'Commissioner'),
(4, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_votes`
--

CREATE TABLE IF NOT EXISTS `candidate_votes` (
  `cand_vot_id` int(11) NOT NULL AUTO_INCREMENT,
  `elect_cand_id` int(11) NOT NULL,
  `acct_id` int(11) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`cand_vot_id`),
  KEY `fk_candidate_voter_voter1_idx` (`acct_id`),
  KEY `fk_candidate_voter_position1_idx` (`pos_id`),
  KEY `fk_candidate_votes_election_candidate1_idx` (`elect_cand_id`),
  KEY `fk_candidate_votes_party1_idx` (`party_id`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `prog_id`) VALUES
(1, 'ITE', 1),
(2, 'BSCS', 1),
(3, 'Pharmacy', 2),
(4, 'Chemistry', 2),
(5, 'ND', 3),
(6, 'HRM', 3);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE IF NOT EXISTS `division` (
  `div_id` int(11) NOT NULL AUTO_INCREMENT,
  `div_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`div_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`div_id`, `div_name`) VALUES
(1, 'SSG Executive'),
(2, 'SSG Legislative'),
(3, 'Program');

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE IF NOT EXISTS `election` (
  `elect_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_year` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`elect_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`elect_id`, `school_year`, `status`) VALUES
(1, 'SY 2014-2015', 1),
(2, 'SY 2015-2016', 0),
(3, 'SY 2016-2017', 0);

-- --------------------------------------------------------

--
-- Table structure for table `election_candidate`
--

CREATE TABLE IF NOT EXISTS `election_candidate` (
  `elect_cand_id` int(11) NOT NULL AUTO_INCREMENT,
  `acct_id` int(11) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `party_id` int(11) DEFAULT NULL,
  `elect_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`elect_cand_id`),
  KEY `fk_candidate_voter_idx` (`acct_id`),
  KEY `fk_candidate_position1_idx` (`pos_id`),
  KEY `fk_candidate_party1_idx` (`party_id`),
  KEY `fk_election_candidate_election1_idx` (`elect_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=236 ;

--
-- Dumping data for table `election_candidate`
--

INSERT INTO `election_candidate` (`elect_cand_id`, `acct_id`, `pos_id`, `party_id`, `elect_id`, `status`) VALUES
(234, 3, 1, NULL, 1, 0),
(235, 3, 1, NULL, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `election_voter`
--

CREATE TABLE IF NOT EXISTS `election_voter` (
  `elect_voter_id` int(11) NOT NULL AUTO_INCREMENT,
  `acct_id` int(11) NOT NULL,
  `elect_id` int(11) NOT NULL,
  PRIMARY KEY (`elect_voter_id`),
  KEY `fk_election_voter_account1_idx` (`acct_id`),
  KEY `fk_election_voter_election1_idx` (`elect_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `election_voter`
--

INSERT INTO `election_voter` (`elect_voter_id`, `acct_id`, `elect_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE IF NOT EXISTS `party` (
  `party_id` int(11) NOT NULL AUTO_INCREMENT,
  `party_name` varchar(45) DEFAULT NULL,
  `school_year` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`party_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`party_id`, `party_name`, `school_year`) VALUES
(1, 'TestParty', '2014-2015');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `pos_id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_name` varchar(45) DEFAULT NULL,
  `div_id` int(11) NOT NULL,
  `order_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`pos_id`),
  KEY `fk_position_division1_idx` (`div_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`pos_id`, `pos_name`, `div_id`, `order_no`) VALUES
(1, 'President', 1, 1),
(2, 'External Vice President', 1, 2),
(3, 'Internal Vice President', 1, 3),
(4, 'Secretary', 1, 4),
(5, 'Assistant Secretary', 1, 5),
(6, 'Treasurer', 1, 6),
(7, 'Auditor', 1, 7),
(8, 'Public Information Officers (Main)', 1, 8),
(9, 'Public Information Officers (Annex)', 1, 9),
(10, 'President', 3, 10),
(11, 'External Vice President', 3, 11),
(12, 'Internal Vice President', 3, 12),
(13, 'Secretary', 3, 13),
(14, 'Assistant Secretary', 3, 14),
(15, 'Treasurer', 3, 15),
(16, 'Auditor', 3, 16),
(17, 'Public Information Officers', 3, 17),
(18, 'Program Representative', 2, 18);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `prog_id` int(11) NOT NULL AUTO_INCREMENT,
  `prog_code` varchar(45) DEFAULT NULL,
  `prog_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`prog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`prog_id`, `prog_code`, `prog_name`) VALUES
(1, 'BSIT/CS', 'IT/CS'),
(2, 'Pharm/Chem', 'Pharm/Chem'),
(3, 'ND/HRM', 'ND/HRM');

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
-- Constraints for table `candidate_votes`
--
ALTER TABLE `candidate_votes`
  ADD CONSTRAINT `fk_candidate_voter_position1` FOREIGN KEY (`pos_id`) REFERENCES `position` (`pos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidate_voter_voter1` FOREIGN KEY (`acct_id`) REFERENCES `account` (`acct_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidate_votes_election_candidate1` FOREIGN KEY (`elect_cand_id`) REFERENCES `election_candidate` (`elect_cand_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidate_votes_party1` FOREIGN KEY (`party_id`) REFERENCES `party` (`party_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_course_program1` FOREIGN KEY (`prog_id`) REFERENCES `program` (`prog_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `election_candidate`
--
ALTER TABLE `election_candidate`
  ADD CONSTRAINT `fk_candidate_party1` FOREIGN KEY (`party_id`) REFERENCES `party` (`party_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidate_position1` FOREIGN KEY (`pos_id`) REFERENCES `position` (`pos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidate_voter` FOREIGN KEY (`acct_id`) REFERENCES `account` (`acct_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_election_candidate_election1` FOREIGN KEY (`elect_id`) REFERENCES `election` (`elect_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `election_voter`
--
ALTER TABLE `election_voter`
  ADD CONSTRAINT `fk_election_voter_account1` FOREIGN KEY (`acct_id`) REFERENCES `account` (`acct_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_election_voter_election1` FOREIGN KEY (`elect_id`) REFERENCES `election` (`elect_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `fk_position_division1` FOREIGN KEY (`div_id`) REFERENCES `division` (`div_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
