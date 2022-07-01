-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220509.53f11afcaa
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 02:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `hr_accounts`
--

CREATE TABLE `hr_accounts` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `user_img` text NOT NULL,
  `user_role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_accounts`
--

INSERT INTO `hr_accounts` (`id`, `user_email`, `user_pass`, `id_number`, `fname`, `lname`, `user_img`, `user_role`) VALUES
(1, 'admin@admin.com', '698d51a19d8a121ce581499d7b701668', '5488-6589', 'Andreieee', 'Luminouswwww', 'IMG-62935ae27e8622.33526451.png', 'admin'),
(9, 'test@test.com', '698d51a19d8a121ce581499d7b701668', '1111', '', '', '', 'user'),
(11, 'test2@test.com', '698d51a19d8a121ce581499d7b701668', '1111', '', '', '', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_id_numbers`
--

CREATE TABLE `tbl_id_numbers` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_id_numbers`
--

INSERT INTO `tbl_id_numbers` (`id`, `id_number`, `employee_name`) VALUES
(1, '1234-8899', 'smith');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hr_accounts`
--
ALTER TABLE `hr_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_id_numbers`
--
ALTER TABLE `tbl_id_numbers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hr_accounts`
--
ALTER TABLE `hr_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_id_numbers`
--
ALTER TABLE `tbl_id_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



