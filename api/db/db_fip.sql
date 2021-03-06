-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 13, 2020 at 03:56 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(120) NOT NULL,
  `place_street` varchar(120) NOT NULL,
  `place_city` varchar(50) NOT NULL,
  `place_zip` varchar(10) NOT NULL,
  `place_phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `place_hours` varchar(120) NOT NULL,
  `place_lat` varchar(20) NOT NULL,
  `place_lng` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `place_street`, `place_city`, `place_zip`, `place_phone`, `place_hours`, `place_lat`, `place_lng`) VALUES
(1, 'Toronto Public Health', '277 Victoria St.', 'Toronto', 'M5B 1W2', '(416) 338-7600', 'Mon-Fri 8:30am-4:30pm', '43.656591', '-79.379389'),
(2, 'Fred Victor Housing', '145 Queen St. E.', 'Toronto', 'M5A 1S1', '(416) 364-8228', 'Mon-Fri 9:30am-5:30pm', ' 43.653637', '-79.372980'),
(3, 'South Riverdale Community Health Centre', '955 Queen St. E.', 'Toronto', 'M4M 3P3', '(416) 461-1925', 'Mon-Fri 10:00am-6:00pm', '43.661130', '-79.339153'),
(4, 'Parkdale Queen West Community Health Centre', '168 Bathurst St.', 'Toronto', 'M5V 2R4', '(416) 703‑8480', 'Mon, Tue, Thurs 10:00am-6:00pm\r\nWed 1:00pm-6:00pm\r\nFri 9:00am-5:00pm', '43.642073', '-79.429520'),
(5, 'Regional HIV/AIDS Connection', '30-186 King St.', 'London', 'N6A 1C7', '(519) 434-1601', 'Mon-Fri 9:00am-5:00pm', '42.982739', ' -81.248218');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID` int(11) NOT NULL,
  `fname` varchar(50) COLLATE utf8_bin NOT NULL,
  `lname` varchar(50) COLLATE utf8_bin NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `pass` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ID`, `fname`, `lname`, `username`, `pass`, `email`, `date`, `ip`) VALUES
(3, 'Walter', 'Carrera', 'walterseba	', 'password', 'w_carrera@fanshawec.ca', '2020-04-13 03:46:37', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
