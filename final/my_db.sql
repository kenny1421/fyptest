-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 08:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `annotators_files`
--

CREATE TABLE `annotators_files` (
  `id` int(100) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `downloads` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `annotators_files`
--

INSERT INTO `annotators_files` (`id`, `name`, `size`, `downloads`) VALUES
(1, 'via_project_2Nov2022_12h3m_json.json', 383, 0);

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `taskdescription` varchar(2000) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `taskcomment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `taskdescription`, `name`, `email`, `taskcomment`) VALUES
(22, 'hello', 'testing', 'test@gmail.com', 'testing'),
(23, 'update test', 'manager', 'manager@gmail.com', 'DONE'),
(25, 'testing2', 'testing2', 'testing2@gmail.com', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  `downloads` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `category`, `size`, `downloads`) VALUES
(1, 'via_project_2Nov2022_12h3m_json.json', '', 383, 1),
(2, 'testing.zip', 'Animal', 160124, 0),
(3, 'testing2.zip', '', 160124, 0),
(4, 'testing2.zip', '', 160124, 0),
(5, 'testing2.zip', '', 160124, 0),
(6, 'testing2.zip', '', 160124, 0),
(7, 'testing2.zip', '', 160124, 1),
(8, 'testing2.zip', '', 160124, 0),
(9, 'testing2.zip', '', 160124, 0),
(10, 'testing2.zip', '', 160124, 0),
(11, 'testing2.zip', '', 160124, 0),
(12, 'testing2.zip', '', 160124, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('user','manager','admin') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Activate'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `name`, `email`, `status`) VALUES
(0, 'user', 'tifanny', '81dc9bdb52d04dc20036dbd8313ed055', 'tiffany', 'tifanny@gmail.com', 'Activate'),
(2, 'manager', 'gloria', '81dc9bdb52d04dc20036dbd8313ed055', 'Gloria Chua', 'gloriachua@gmail.com', 'Activate'),
(107, 'admin', 'ting', '81dc9bdb52d04dc20036dbd8313ed055', 'Ting Yoon Hao', 'tingyoonhao@gmail.com', 'Activate'),
(108, 'user', 'lyken', '81dc9bdb52d04dc20036dbd8313ed055', 'Hiew Ly Ken', 'lyken@gmail.com', 'Activate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annotators_files`
--
ALTER TABLE `annotators_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annotators_files`
--
ALTER TABLE `annotators_files`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
