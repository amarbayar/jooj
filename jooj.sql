-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2014 at 09:01 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jooj`
--

-- --------------------------------------------------------

--
-- Table structure for table `jo_questions`
--

CREATE TABLE IF NOT EXISTS `jo_questions` (
`qid` int(11) NOT NULL,
  `question` text NOT NULL,
  `added` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jo_questions`
--

INSERT INTO `jo_questions` (`qid`, `question`, `added`) VALUES
(1, 'First Question', '2014-09-20'),
(2, 'Second Question', '2014-09-21'),
(3, 'TEST question', '2014-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `jo_tags`
--

CREATE TABLE IF NOT EXISTS `jo_tags` (
`tid` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jo_tags`
--

INSERT INTO `jo_tags` (`tid`, `tag`) VALUES
(1, 'Phone'),
(2, 'Skype'),
(3, 'Technical'),
(4, 'Onsite'),
(5, 'tag1'),
(6, 'tag2');

-- --------------------------------------------------------

--
-- Table structure for table `jo_tq`
--

CREATE TABLE IF NOT EXISTS `jo_tq` (
`tqid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jo_tq`
--

INSERT INTO `jo_tq` (`tqid`, `tid`, `qid`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 4, 2),
(5, 5, 3),
(6, 6, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jo_questions`
--
ALTER TABLE `jo_questions`
 ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `jo_tags`
--
ALTER TABLE `jo_tags`
 ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `jo_tq`
--
ALTER TABLE `jo_tq`
 ADD PRIMARY KEY (`tqid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jo_questions`
--
ALTER TABLE `jo_questions`
MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jo_tags`
--
ALTER TABLE `jo_tags`
MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jo_tq`
--
ALTER TABLE `jo_tq`
MODIFY `tqid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
