-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2017 at 06:17 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`, `password`) VALUES
('amit', 'amit'),
('amitsingh', 'amit'),
('iamjay', 'iamjay'),
('rajkumar', 'rajkumar');

-- --------------------------------------------------------

--
-- Table structure for table `fvideos`
--

CREATE TABLE `fvideos` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `turl` varchar(250) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `Time` date NOT NULL,
  `view` int(11) NOT NULL,
  `report` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fvideos`
--

INSERT INTO `fvideos` (`id`, `username`, `name`, `url`, `turl`, `subject`, `Time`, `view`, `report`) VALUES
(1, 'n f', 'gb gb', 'bb', 'bfeb', 'be', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(15) NOT NULL,
  `email` text,
  `password` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`) VALUES
('deepaktiwari', 'deepaktiwari@gmail.com', 'deepak'),
('harsh', 'hsrg@hf.com', 'hgfd'),
('iamjay', 'iamperfectjay@gmail.com', 'iamjay'),
('rajsingh', 'rajsingh@gmail.com', 'rajsingh');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `turl` varchar(250) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `Time` date NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `fvideos`
--
ALTER TABLE `fvideos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fvideos`
--
ALTER TABLE `fvideos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
