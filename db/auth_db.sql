-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 11:34 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auth_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','editor','reviewer','subscriber') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(1, 'Koroush', 'Sharifinia', 'koroush.s@gmail.com', '$2y$10$HWxXEm7ChgEqamMSrnx9jeVMiVgvxYm1vhntbGyEgbREoXyHXVMa6', 'admin'),
(2, 'Nawid', 'Qasemi', 'nawid.qsm@gmail.com', '$2y$10$VDdXG2PhKogdDoAm0cxxCuNZLQPxXO3I2w383aTht2v0txlz4YRmK', 'editor'),
(3, 'Naser', 'Azimi', 'azm.naser@gmai.com', '$2y$10$F8QrgEhXDBiKuHNbetz/4exLoHcB6k9KAMzGS509aGh031O29w/rK', 'reviewer'),
(4, 'shagofa', 'shams', 'shagofa.shms@gmail.com', '$2y$10$2SNMRs9J0NaGm4kiW5jCq.as0fYDh2WeG/O05SjxMVjUaL2V8dHZ6', 'subscriber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
