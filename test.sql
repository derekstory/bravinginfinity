-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2013 at 03:56 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.5

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
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(8) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(55) NOT NULL,
  `post_content` text NOT NULL,
  `post_cat` varchar(255) NOT NULL,
  `post_keywords` varchar(55) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_supporters` int(8) NOT NULL,
  `post_replytotal` int(8) NOT NULL,
  `post_views` int(12) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_content`, `post_cat`, `post_keywords`, `post_author`, `post_supporters`, `post_replytotal`, `post_views`, `post_date`) VALUES
(6, 'Testing title to be inserted here', 'Lorem ipsum dolor sit amet, eam ad virtute propriae eloquentiam, no decore soleat legimus sit. Hinc feugait volutpat sed an, pri nobis iracundia ad. Ad sit cibo paulo, ius no paulo eleifend, modo oblique singulis pro cu. Prodesset omittantur ex pri, vix at iudico reprimique. Verear iisque similique quo at, vel te nisl delenit habemus. Suas purto mea an, vim ad nominavi appareat voluptaria. Possit vocent convenire pri ne. Duis brute assueverit has ex.\r\n\r\nEx pro sint habemus. Has novum iisque urbanitas in, ne melius civibus duo. Populo deleniti ius an, et legere possim aliquam eos. Id ludus saperet posidonium vix, et eos lorem mazim. Est unum democritum ei, id quod affert vituperata sea, vel et odio invenire consequuntur. Vel ut iusto laboramus, no vim antiopam suscipiantur concludaturque, agam aperiri ex duo. Te case propriae qui, vis an placerat nominati, movet labore et nam.\r\n\r\nAudiam postulant cu est, brute illum legendos nam ei. At mei persius repudiare, quis saepe referrentur ad per. Scripta accusam ei usu. Eam et dicit saepe. Ius quod dicit viris eu, cu iudico philosophia cum, usu option epicuri at.', 'Self', 'testing MySQL', 'dwreck08', 0, 0, 0, '2013-03-12 16:34:47');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_level`, `user_date`) VALUES
(3, 'dwreck08', '111111', 'derek.a.story@gmail.com', 0, '2013-03-12 05:00:00'),
(113, 'derekstory2', 'e1c79a582b6629e6b39e9679f4bb964d25db4aa8', 'derek.a.storoy2gmaio.com', 0, '2013-03-13 20:50:04');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`post_author`) REFERENCES `users` (`user_name`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;