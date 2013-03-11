-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 68.178.139.70
-- Generation Time: Mar 11, 2013 at 01:48 PM
-- Server version: 5.0.96
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `dwreck08`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(8) NOT NULL,
  `post_title` varchar(55) NOT NULL,
  `post_content` text NOT NULL,
  `post_cat` varchar(255) NOT NULL,
  `post_keywords` varchar(55) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_supporters` int(8) NOT NULL,
  `post_replytotal` int(8) NOT NULL,
  `post_views` int(12) NOT NULL,
  `post_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`post_id`),
  KEY `post_title` (`post_title`),
  KEY `post_cat` (`post_cat`),
  KEY `post_author` (`post_author`),
  KEY `post_date` (`post_date`),
  KEY `post_views` (`post_views`),
  KEY `post_supporters` (`post_supporters`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--


-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(8) NOT NULL auto_increment,
  `profile_author` varchar(255) NOT NULL,
  `profile_posted` varchar(255) NOT NULL,
  `profile_commented` varchar(255) NOT NULL,
  `profile_commentee` varchar(255) NOT NULL,
  `profile_rating` int(8) NOT NULL,
  `profile_replycount` int(8) NOT NULL,
  `profile_date` datetime NOT NULL,
  PRIMARY KEY  (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `profile`
--


-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(8) NOT NULL auto_increment,
  `reply_content` text NOT NULL,
  `reply_contribution` varchar(255) NOT NULL,
  `reply_rating` int(8) NOT NULL,
  `reply_date` datetime NOT NULL,
  PRIMARY KEY  (`reply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `replies`
--


-- --------------------------------------------------------

--
-- Table structure for table `toc`
--

CREATE TABLE `toc` (
  `toc_id` int(8) NOT NULL,
  `toc_views` int(12) NOT NULL,
  `toc_title` varchar(55) NOT NULL,
  `toc_cat` varchar(255) NOT NULL,
  `toc_author` varchar(255) NOT NULL,
  `toc_replies` int(8) NOT NULL,
  `toc_supporters` int(8) NOT NULL,
  `toc_date` datetime NOT NULL,
  PRIMARY KEY  (`toc_id`),
  KEY `toc_views` (`toc_views`),
  KEY `toc_title` (`toc_title`),
  KEY `toc_cat` (`toc_cat`),
  KEY `toc_author` (`toc_author`),
  KEY `toc_supporters` (`toc_supporters`),
  KEY `toc_date` (`toc_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `toc`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_level` int(8) NOT NULL,
  `user_date` datetime NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `toc`
--
ALTER TABLE `toc`
  ADD CONSTRAINT `toc_ibfk_8` FOREIGN KEY (`toc_supporters`) REFERENCES `post` (`post_supporters`) ON DELETE CASCADE,
  ADD CONSTRAINT `toc_ibfk_3` FOREIGN KEY (`toc_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `toc_ibfk_4` FOREIGN KEY (`toc_views`) REFERENCES `post` (`post_views`) ON DELETE CASCADE,
  ADD CONSTRAINT `toc_ibfk_5` FOREIGN KEY (`toc_title`) REFERENCES `post` (`post_title`) ON DELETE CASCADE,
  ADD CONSTRAINT `toc_ibfk_6` FOREIGN KEY (`toc_cat`) REFERENCES `post` (`post_cat`) ON DELETE CASCADE,
  ADD CONSTRAINT `toc_ibfk_7` FOREIGN KEY (`toc_author`) REFERENCES `post` (`post_author`) ON DELETE CASCADE;
