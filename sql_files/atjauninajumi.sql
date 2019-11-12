-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 05:21 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bauska_projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `atjauninajumi`
--

CREATE TABLE `atjauninajumi` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Comments` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `projectID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `atjauninajumi`
--

INSERT INTO `atjauninajumi` (`ID`, `Date`, `Comments`, `projectID`) VALUES
(1, '2019-11-01', 'Sākums', 2),
(2, '2019-11-11', 'Beigas', 1),
(5, '2019-11-21', 'Test project 1', 1),
(6, '2019-11-16', 'Test project 2', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atjauninajumi`
--
ALTER TABLE `atjauninajumi`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atjauninajumi`
--
ALTER TABLE `atjauninajumi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
