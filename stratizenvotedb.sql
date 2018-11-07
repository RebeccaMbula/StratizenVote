-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2018 at 09:40 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stratizenvotedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `candidate_name` varchar(255) DEFAULT NULL,
  `short_manifesto` varchar(112) DEFAULT NULL,
  `thumbnailFileName` varchar(255) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `votes` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `candidate_name`, `short_manifesto`, `thumbnailFileName`, `position`, `votes`) VALUES
(1, 'Leonado DeCaprio', 'I believe in a better Strathmore for all and each student', '1.jpg', 'president', 9),
(2, 'Kaligraph Jones', 'Let\'s work together to become the best', '6.jpg', 'president', 3),
(3, 'Churchill Live', 'I will propagate love and spread joy around Strathmore, for it is only in love and joy that we can grow', '3.jpg', 'president', 3),
(4, 'Barack Obama', 'Yes we can... make Strathmore better. Yes we can... work together to build Strathmore. YES WE CAN!', '4.jpg', 'vice president', 1),
(5, 'Brian Omondi', 'Vote for me. Vote for a better Strathmore experience. Vote for change and improvement. Vote for the best.', '5.jpg', 'vice president', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_No` int(11) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `voted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_No`, `password`, `student_name`, `voted`) VALUES
(100000, 'giradifatha', 'Kivuguto Hubert', 1),
(101366, 'giradifatha', 'Hellen Kokach', 0),
(102289, 'giradifatha', 'Rebecca Mbula', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
