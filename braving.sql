-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2013 at 01:22 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `index`
--

CREATE TABLE IF NOT EXISTS `index` (
  `index_id` int(8) NOT NULL AUTO_INCREMENT,
  `index_title` varchar(255) NOT NULL,
  `index_author` varchar(255) NOT NULL,
  `index_category` varchar(255) NOT NULL,
  `index_replies` int(11) DEFAULT NULL,
  `index_encouragers` int(11) DEFAULT NULL,
  `index_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`index_id`),
  KEY `table_title` (`index_title`),
  KEY `table_author` (`index_author`),
  KEY `table_category` (`index_category`),
  KEY `table_replies` (`index_replies`),
  KEY `table_encouragers` (`index_encouragers`),
  KEY `table_date` (`index_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(8) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(55) NOT NULL,
  `post_content` text NOT NULL,
  `post_cat` varchar(255) NOT NULL,
  `post_reason` varchar(255) NOT NULL,
  `post_keywords` varchar(55) DEFAULT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_supporters` int(8) NOT NULL,
  `post_replytotal` int(8) NOT NULL,
  `post_views` int(12) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`),
  KEY `post_author` (`post_author`),
  KEY `post_title` (`post_title`),
  KEY `post_cat` (`post_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `profile_id` int(8) NOT NULL AUTO_INCREMENT,
  `profile_author` varchar(255) NOT NULL,
  `profile_posted` varchar(255) NOT NULL,
  `profile_commented` varchar(255) NOT NULL,
  `profile_commentee` varchar(255) NOT NULL,
  `profile_rating` int(8) NOT NULL,
  `profile_replycount` int(8) NOT NULL,
  `profile_date` datetime NOT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `reply_id` int(8) NOT NULL AUTO_INCREMENT,
  `reply_content` text NOT NULL,
  `reply_contribution` varchar(255) NOT NULL,
  `reply_rating` int(8) NOT NULL,
  `reply_date` datetime NOT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(8) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_level` int(8) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=128 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `index`
--
ALTER TABLE `index`
  ADD CONSTRAINT `index_ibfk_1` FOREIGN KEY (`index_id`) REFERENCES `post` (`post_id`) ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`post_author`) REFERENCES `users` (`user_name`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
