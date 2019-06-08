-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2019 at 07:11 PM
-- Server version: 5.7.11
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp1_maudelaroche_vincentdesrosiers`
--
CREATE DATABASE IF NOT EXISTS `tp1_maudelaroche_vincentdesrosiers` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tp1_maudelaroche_vincentdesrosiers`;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date_parution` date NOT NULL,
  `cote` int(2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `like_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `titre`, `date_parution`, `cote`, `image`, `like_status`) VALUES
(1, 'Searching', '2018-08-31', 9, 'searching.jpg', 0),
(2, 'Mile 22', '2018-08-17', 2, 'mile22.jpg', 0),
(3, 'BLACKKKLANSMAN', '2018-08-10', 8, 'blackkklansman.jpg', 0),
(4, 'Serenity', '2005-09-30', 9, 'serenity.jpg', 0),
(5, 'A Quiet Place', '2018-04-06', 8, 'aquietplace.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `cote` int(2) NOT NULL,
  `nb_saisons` int(2) NOT NULL,
  `style` int(2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `like_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `titre`, `cote`, `nb_saisons`, `style`, `image`, `like_status`) VALUES
(1, 'The Last Kingdom', 8, 3, 1, 'thelastkingdom.jpg', 0),
(2, 'F Is For Family', 7, 3, 2, 'fisforfamily.jpg', 0),
(3, 'The Haunting Of Hill House', 9, 1, 3, 'hillhouse.jpg', 1),
(4, 'Firefly', 10, 1, 4, 'firefly.jpg', 1),
(5, 'Maniac', 8, 1, 5, 'maniac.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
