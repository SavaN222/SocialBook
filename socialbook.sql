-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 18, 2020 at 01:35 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `description`, `date_added`) VALUES
(55, 18, 23, 'Great feature', '2020-01-18 13:04:16'),
(54, 18, 22, 'I agree', '2020-01-17 18:09:12'),
(53, 19, 22, 'Yes, developer doing amazing job :D', '2020-01-17 18:08:00'),
(61, 19, 25, 'BTW!, gallery is amazing :)', '2020-01-18 14:34:29'),
(60, 19, 25, 'Mirko, you have no clue ', '2020-01-18 14:34:03'),
(59, 18, 25, 'Mr Cat is better than you!!!', '2020-01-18 14:33:29'),
(58, 20, 23, 'I\'am hungry!', '2020-01-18 13:21:39'),
(57, 18, 20, 'Okay ', '2020-01-18 13:19:41'),
(56, 19, 23, 'Ajax is really amazing', '2020-01-18 13:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `user_id`, `photo`, `description`) VALUES
(4, 20, 'images/gallery/TalkingDogimg1579353948.jpg', 'I\'am coding dog.\r\nThis is test for upload photos to profile gallery, design is very bad but i don\'t worry to much, because my main focus is Back-End logic with PHP. Some random text, dummy text, dummy,.............. :D eee test for hacking alert(\'TEST\')'),
(5, 20, 'images/gallery/TalkingDogcatCoding1579354136.jpg', 'This is my coding friend, MR.Cat. He have best routine for coding, secret is this:\r\n1 line of code is equal to 10 hours of sleep');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comments_id` int(11) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `description`, `image`, `date_added`, `comments_id`, `likes`) VALUES
(25, 20, 'Check out my awesome gallery, AW AW!', NULL, '2020-01-18 14:30:49', NULL, NULL),
(24, 20, 'AW AW AW!!', NULL, '2020-01-18 13:21:20', NULL, NULL),
(23, 19, 'WOW, NOW WE HAVE COMMENTS!\r\nWrite some comment to test this functionality', NULL, '2020-01-17 14:56:25', NULL, NULL),
(22, 18, 'New features on this site is too good, #goodJob', NULL, '2020-01-17 02:43:44', NULL, NULL),
(20, 19, 'I\'am new on this social media.\r\nSend me a friend request :D ', NULL, '2020-01-17 01:15:25', NULL, NULL),
(19, 18, 'SocialBook is amazing website..', NULL, '2020-01-17 01:14:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `cover_pic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `gender`, `email`, `password`, `birth_date`, `profile_pic`, `cover_pic`) VALUES
(19, 'Nevena', 'Nenic', 'female', 'nena@gmail.com', '$2y$10$uetmutwotXgYnfMJcDRB6ePGDdVEjMPT9mCHOccIoBn0rlTTZr.vK', '1999-12-23', 'images/profile/michael-dam-mEZ3PoFGs_k-unsplash1579108028.jpg', NULL),
(20, 'Talking', 'Dog', 'other', 'dog@gmail.com', '$2y$10$AbdcMZ6bYcnjXk72LAoQXeUNC3Tudr3LhcCes5e54HYK8THC2L8h6', '1992-07-17', 'images/profile/img1579350058.jpg', NULL),
(18, 'Mirko', 'Mirkovic', 'male', 'mirko@gmail.com', '$2y$10$7jAuRhtIwn7Ivzo9u9LiYOyTG1IzOAnQb9kPusAD4ua5w/7q.tY62', '1998-09-18', 'images/profile/rohan-g-hdzBDVVsRT4-unsplash1579107981.jpg', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
