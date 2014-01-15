-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2014 at 06:45 AM
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
  `acct_status` tinyint(4) DEFAULT '0',
  `reg_status` tinyint(4) DEFAULT '0',
  `time_date_log` datetime DEFAULT NULL,
  `acct_type_id` int(11) NOT NULL,
  PRIMARY KEY (`acct_id`),
  UNIQUE KEY `acct_username_UNIQUE` (`acct_username`),
  KEY `fk_voter_course1_idx` (`course_id`),
  KEY `fk_account_account_type1_idx` (`acct_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `account_admin`
--

INSERT INTO `account_admin` (`acct_admin_id`, `acct_username`, `acct_password`, `acct_fname`, `acct_mname`, `acct_lname`, `account_type_id`) VALUES
(3, 'chin', 'chin', 'Chin Tinn Lourence', 'Son', 'Tan', 3),
(4, 'lance', 'lance', 'Lance', 'Follante', 'Lim', 3);

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
(1, 'voter'),
(2, 'comelec'),
(3, 'admin');

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
  `school_year` varchar(45) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Table structure for table `election`
--

CREATE TABLE IF NOT EXISTS `election` (
  `elect_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_year` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`elect_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`elect_id`, `school_year`, `status`) VALUES
(1, '2014-2015', 0),
(2, '2013-2014', 0),
(3, '2016-2017', 0),
(4, '2017-2018', 0),
(6, '2018-2020', 0),
(7, '2021-2022', 1);

-- --------------------------------------------------------

--
-- Table structure for table `election_candidate`
--

CREATE TABLE IF NOT EXISTS `election_candidate` (
  `elect_cand_id` int(11) NOT NULL AUTO_INCREMENT,
  `acct_id` int(11) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `elect_id` int(11) NOT NULL,
  PRIMARY KEY (`elect_cand_id`),
  KEY `fk_candidate_voter_idx` (`acct_id`),
  KEY `fk_candidate_position1_idx` (`pos_id`),
  KEY `fk_candidate_party1_idx` (`party_id`),
  KEY `fk_election_candidate_election1_idx` (`elect_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `election_voter`
--

CREATE TABLE IF NOT EXISTS `election_voter` (
  `elect_voter_id` int(11) NOT NULL,
  `acct_id` int(11) NOT NULL,
  `elect_id` int(11) NOT NULL,
  PRIMARY KEY (`elect_voter_id`),
  KEY `fk_election_voter_account1_idx` (`acct_id`),
  KEY `fk_election_voter_election1_idx` (`elect_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE IF NOT EXISTS `party` (
  `party_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_year` varchar(45) DEFAULT NULL,
  `party_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`party_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`party_id`, `school_year`, `party_name`) VALUES
(22, '2013-2014', 'UIC'),
(23, '2013-2014', 'AIM'),
(24, '2013-2014', 'LAKAS');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `prog_id` int(11) NOT NULL AUTO_INCREMENT,
  `prog_code` varchar(45) DEFAULT NULL,
  `prog_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`prog_id`)
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
