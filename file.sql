-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 02:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(255) NOT NULL,
  `name` varchar(10000) NOT NULL,
  `size` varchar(10000) NOT NULL,
  `downloads` int(255) NOT NULL,
  `employeeid` int(255) NOT NULL,
  `ename` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `name`, `size`, `downloads`, `employeeid`, `ename`, `mobile`) VALUES
(1, 'Proposal Form SPL-2.pdf', '65034', 8, 31245, 'Fahad Hossain', '8801818130998'),
(2, 'Proposal Form SPL-2.pdf', '65034', 1, 31893, 'Jafar Mahin', '8801717743519'),
(3, '1120_SE305feedbacksheet.pdf', '646323', 0, 32315, 'Jitesh Sureka', '8801780935761'),
(4, 'Group_6Assignment_4.pdf', '583253', 0, 33256, 'Khairul Alam', '8801766090554'),
(5, 'Group_6Assignment_4.pdf', '583253', 0, 33456, 'Saad Noor', '8801887431603');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;