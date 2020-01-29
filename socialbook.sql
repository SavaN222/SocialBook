-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 29, 2020 at 01:48 PM
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
  `post_user` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `post_user`, `description`, `date_added`, `status`) VALUES
(81, 36, 41, 40, 'Go RANDY!!!', '2020-01-29 14:37:59', '1'),
(80, 40, 41, 40, '!!!', '2020-01-29 14:37:44', '0'),
(79, 40, 41, 40, 'Okay', '2020-01-29 14:37:40', '0'),
(75, 34, 36, 33, 'Sure, Eric!!!', '2020-01-29 14:20:50', '1');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `status` enum('0','1','2','') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`friend_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `status`) VALUES
(44, 40, 36, '2'),
(45, 40, 33, '2'),
(41, 33, 34, '2');

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
  `status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `user_id`, `photo`, `description`, `status`) VALUES
(22, 33, 'images/gallery/EricCartmancartmanFunny1580305190.jpg', 'Test', '0'),
(23, 40, 'images/gallery/RandyMarshnewCover1580305362.jpg', '', '1'),
(20, 35, 'images/gallery/CoderDogcodeMeme11580302650.png', '', '1'),
(19, 35, 'images/gallery/CoderDogcodingCat1580302637.jpg', 'This is my friend coding cat, he have best programming routine.\r\n1 line of code is equal to 10 hours of sleep', '1'),
(18, 35, 'images/gallery/CoderDogdogCover1580302595.png', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(77, 33, 41),
(76, 36, 41);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `friend_id`, `text`, `date`) VALUES
(32, 40, 36, 'Okay', '2020-01-29 14:41:57'),
(31, 36, 40, 'Please', '2020-01-29 14:41:49'),
(30, 36, 40, 'Change your profile pic...!!!!!!!!!!!', '2020-01-29 14:41:43'),
(28, 40, 36, '???', '2020-01-29 14:41:20'),
(29, 40, 36, '?', '2020-01-29 14:41:24'),
(27, 40, 36, 'Hi???', '2020-01-29 14:41:07'),
(26, 36, 40, 'Hi!', '2020-01-29 14:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `description`, `date_added`) VALUES
(41, 40, '1 like and I\'ll get drunk by myself.', '2020-01-29 14:37:32'),
(37, 35, 'Check out my gallery!', '2020-01-29 13:56:14'),
(36, 33, 'I\'m not fat, I\'m big-boned', '2020-01-29 13:52:28');

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
  `profile_pic` varchar(255) DEFAULT 'images/profile.jpg',
  `cover_pic` varchar(255) DEFAULT 'images/cover.png',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `gender`, `email`, `password`, `birth_date`, `profile_pic`, `cover_pic`, `status`) VALUES
(40, 'Randy', 'Marsh', 'male', 'rmarsh@gmail.com', '$2y$10$ESCO9rPFU.cxU/rW5SDqw.856aTTMwGIs2bTnt7XcdTpuhGfNIUqi', '1982-02-22', 'images/profile/newProfile1580305338.jpg', 'images/cover/coverRendy1580305015.jpg', '1'),
(36, 'Mr.', 'Towelie', 'other', 'towelie@gmail.com', '$2y$10$4J7LozyWJnVlWU8zbEg80OJL18yx6Zim6df.6rOulmq9JjEmNN3IC', '1995-02-24', 'images/profile/towelProfile1580302754.jpg', 'images/cover/coverTowel1580302754.jpg', '0'),
(34, 'Butters', 'Stotch', 'male', 'butters@gmail.com', '$2y$10$VWu6VCbW0osV1Sc66y9hqurmmiuvhZBwITn4C08IsNtqZz9.gCzMm', '1997-08-13', 'images/profile/profileButters1580302404.jpg', 'images/cover/coverButters1580302404.jpg', '0'),
(35, 'Coder', 'Dog', 'other', 'dog@gmail.com', '$2y$10$z0BJB/h9ngooiBhOuymEZuHJysl.kDiHrlwke6M.cnCczgXWz.R5W', '2001-11-11', 'images/profile/img1580302557.jpg', 'images/cover/dogCover1580302557.png', '0'),
(33, 'Eric', 'Cartman', 'male', 'ecartman@gmail.com', '$2y$10$ZDIKiY0pYaSEKjGuKkRwxeOFGEH80JRLU53MUlsjrrI8h8iTKL8ky', '1997-08-13', 'images/profile/profileCartman1580302210.jpg', 'images/cover/coverCartman1580302210.jpg', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
