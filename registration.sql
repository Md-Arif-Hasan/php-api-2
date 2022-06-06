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
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` varchar(500) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `token` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `mobile`, `token`) VALUES
('11345', 'Md.Arif Hasan', '8801793833866', '4032'),
('12234', 'Arif Hasan', '8801518957013', '4785'),
('12345', 'Mushfiqur Rahman', '8801718142322', '7045'),
('14267', 'Lutfar Alif', '88017742217598', '0345'),
('14567', 'Mohsin Bin Amin', '8801534115844', '2345'),
('21345', 'Mustahid Hasan', '8801855614426', '2345'),
('22145', 'Rakib Trofder', '8801939649428', '1123'),
('22345', 'Galib', '8801718142322', '2345'),
('29654', 'Ahmed Adnan', '8801813865290', '1309'),
('29873', 'Hasnain Iqbal', '8801784241318', '1100'),
('31245', 'Fahad Hossain', '8801818130998', '1234'),
('31893', 'Jafar Mahin', '8801717743519', '9876'),
('32315', 'Jitesh Sureka', '8801780935761', '1234'),
('33256', 'Khairul Alam', '8801766090554', '4859'),
('33456', 'Saad Noor', '8801887431603', '2221');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;