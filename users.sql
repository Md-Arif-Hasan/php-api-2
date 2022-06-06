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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(500) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `password`) VALUES
('11345', 'Md.Arif Hasan', '8801793833866', '827ccb0eea8a706c4c34a16891f84e7b'),
('12234', 'Arif Hasan', '8801518957013', '827ccb0eea8a706c4c34a16891f84e7b'),
('12345', 'Mushfiqur Rahman', '8801718142322', '827ccb0eea8a706c4c34a16891f84e7b'),
('14267', 'Lutfar Alif', '88017742217598', '827ccb0eea8a706c4c34a16891f84e7b'),
('14567', 'Mohsin Bin Amin', '8801534115844', '827ccb0eea8a706c4c34a16891f84e7b'),
('21345', 'Mustahid Hasan', '8801855614426', '827ccb0eea8a706c4c34a16891f84e7b'),
('22145', 'Rakib Trofder', '8801939649428', '827ccb0eea8a706c4c34a16891f84e7b'),
('22345', 'Galib', '8801718142322', '827ccb0eea8a706c4c34a16891f84e7b'),
('29654', 'Ahmed Adnan', '8801813865290', '827ccb0eea8a706c4c34a16891f84e7b'),
('29873', 'Hasnain Iqbal', '8801784241318', '827ccb0eea8a706c4c34a16891f84e7b'),
('31245', 'Fahad Hossain', '8801818130998', '827ccb0eea8a706c4c34a16891f84e7b'),
('31893', 'Jafar Mahin', '8801717743519', '827ccb0eea8a706c4c34a16891f84e7b'),
('32315', 'Jitesh Sureka', '8801780935761', '827ccb0eea8a706c4c34a16891f84e7b'),
('33256', 'Khairul Alam', '8801766090554', '827ccb0eea8a706c4c34a16891f84e7b'),
('33456', 'Saad Noor', '8801887431603', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;