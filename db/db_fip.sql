-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2020 at 10:11 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content`
--

DROP TABLE IF EXISTS `tbl_content`;
CREATE TABLE IF NOT EXISTS `tbl_content` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_header` varchar(60) DEFAULT NULL,
  `content_body` varchar(500) DEFAULT NULL,
  `content_image` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

DROP TABLE IF EXISTS `tbl_place`;
CREATE TABLE IF NOT EXISTS `tbl_place` (
  `place_id` int(11) NOT NULL AUTO_INCREMENT,
  `place_name` varchar(180) NOT NULL,
  `place_lat` varchar(20) NOT NULL,
  `place_lng` varchar(20) NOT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `place_lat`, `place_lng`) VALUES
(1, 'Toronto Public Health!', '43.656591', '-79.379389'),
(2, 'Fred Victor Housing', ' 43.653637', '-79.372980'),
(3, 'South Riverdale Community Health Centre', '43.661130', '-79.339153'),
(4, 'Parkdale Queen West Community Health Centre', '43.642073', '-79.429520'),
(5, 'Regional HIV/AIDS Connection', '42.982739', ' -81.248218');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_ip` varchar(50) NOT NULL DEFAULT 'no',
  `user_blocked` tinyint(1) DEFAULT NULL,
  `first_time` tinyint(1) NOT NULL DEFAULT 1,
  `user_tryCount` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_ip`, `user_blocked`, `first_time`, `user_tryCount`) VALUES
(2, 'guilherme', 'gui', 'nLLr', '12351', '2020-02-12 19:36:23', '::1', 0, 0, 0),
(24, 'gui', 'foo', 'z+Gq', 'guilhermebueno6@gmail.com', '2020-03-07 06:51:28', '::1', NULL, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
