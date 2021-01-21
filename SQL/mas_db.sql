-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 04:40 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_id` int(11) NOT NULL,
  `acc_type` varchar(25) NOT NULL,
  `solde` decimal(10,2) NOT NULL,
  `acc_name` varchar(55) NOT NULL,
  `acc_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `acc_type`, `solde`, `acc_name`, `acc_number`) VALUES
(9009, 'MTN', '9900.00', 'MTN111', '054454545'),
(9834, 'MTN', '19400.00', 'MTN@1', '0543631164');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `issueid` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `issue_description` text NOT NULL,
  `client_name` varchar(55) NOT NULL,
  `client_number` varchar(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `timetsamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`issueid`, `empid`, `issue_description`, `client_name`, `client_number`, `comment`, `status`, `timetsamp`) VALUES
(1, 6, 'tgrhngfff', 'Benjamin Anderson', '0249089090', 'test', 'solved', '2020-12-15 15:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `timetsamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(10) NOT NULL,
  `userid` int(11) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`timetsamp`, `id`, `userid`, `details`) VALUES
('2020-12-15 14:27:30', 1, 6, 'staff_test: logout'),
('2020-12-15 14:27:39', 2, 6, 'staff_test: login'),
('2020-12-15 15:27:20', 3, 6, 'staff_test: logout'),
('2020-12-15 15:27:29', 4, 2, 'admin@gmail.com: login'),
('2020-12-15 15:29:38', 5, 2, 'admin@gmail.com: logout'),
('2020-12-15 15:29:51', 6, 6, 'staff_test: login'),
('2020-12-15 15:30:04', 7, 6, 'staff_test: logout'),
('2020-12-16 15:31:00', 8, 2, 'admin@gmail.com: login'),
('2020-12-18 08:58:55', 9, 2, 'admin@gmail.com: login'),
('2020-12-20 05:12:18', 10, 2, 'admin@gmail.com: login'),
('2020-12-20 05:12:19', 11, 2, 'admin@gmail.com: login'),
('2020-12-20 14:00:03', 12, 2, 'admin@gmail.com: logout'),
('2020-12-20 14:00:57', 13, 6, 'staff_test: login'),
('2021-01-07 06:28:20', 14, 2, 'admin@gmail.com: login'),
('2021-01-07 06:48:06', 15, 2, 'admin@gmail.com: logout'),
('2021-01-07 06:49:07', 16, 6, 'staff_test: login'),
('2021-01-21 09:10:21', 17, 6, 'staff_test: login');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` varchar(15) NOT NULL DEFAULT 'purchase',
  `account` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`timestamp`, `type`, `account`, `amount`) VALUES
('2020-12-14 23:23:58', 'purchase', 9834, '400.00'),
('2020-12-14 23:24:55', 'purchase', 9834, '400.00'),
('2020-12-14 23:36:41', 'purchase', 9834, '400.00'),
('2020-12-14 23:39:00', 'purchase', 9834, '400.00'),
('2020-12-14 23:39:06', 'purchase', 9009, '400.00'),
('2020-12-14 23:39:48', 'purchase', 9009, '400.00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('cashout','deposit') NOT NULL,
  `account_id` int(10) NOT NULL,
  `client_numb` varchar(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `timestamp`, `type`, `account_id`, `client_numb`, `amount`) VALUES
(1, '2021-01-21 14:52:01', 'deposit', 9009, '900309090', '450.00'),
(2, '2021-01-21 14:52:29', 'deposit', 9009, '900309090', '450.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(155) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role` enum('admin','staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `role`) VALUES
(2, 'test admin', 'admin@gmail.com', 'admin@gmail.com', '$2y$10$1LESSG/Wdr8uh3/977IqT.A2m0qM/WZE5EEtyJH4qZrQ5gTJGyanW', 'admin'),
(6, 'test staff', 'staff@gmail.com', 'staff_test', '$2y$10$InbSu2tITnIYKbmL9FZwk.n5//kf5n90OyzlfKKfRP4LDtfuNzKye', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`),
  ADD UNIQUE KEY `unq_num` (`acc_number`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`issueid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `unqemail` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9835;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `issueid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
