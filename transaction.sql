-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 02:40 PM
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
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` varchar(40) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `employeeid` varchar(40) NOT NULL,
  `amount` varchar(40) NOT NULL,
  `type` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `date`, `employeeid`, `amount`, `type`) VALUES
('205362', '2022-06-01', '22345', '69900', 'salary'),
('213868', '2022-06-01', '22345', '69900', 'salary'),
('222906', '2022-06-01', '22345', '39900', 'salary'),
('236824', '2022-05-31', '22345', '200', 'salary'),
('242720', '2022-06-01', '22345', '600', 'wages'),
('264637', '2022-06-01', '22345', '69900', 'salary'),
('265460', '2022-06-01', '22345', '69900', 'salary'),
('266151', '2022-05-31', '22345', '200', 'salary'),
('278441', '2022-06-01', '22345', '39900', 'salary');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;