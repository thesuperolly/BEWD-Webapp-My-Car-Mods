-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 02, 2021 at 08:48 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+10:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_car_mods`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `projectname` varchar(100) NOT NULL,
  `projectdescription` varchar(6000) NOT NULL,
  `projectstatus` varchar(30) DEFAULT NULL,
  `projecttype` varchar(30) DEFAULT NULL,
  `imagelocation` varchar(255) DEFAULT NULL,
  `userid` varchar(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projectname`, `projectdescription`, `projectstatus`, `projecttype`, `imagelocation`, `userid`, `date`) VALUES
(3, 'Coilovers', 'MCA Suspension ProSport Coilovers', 'In Progress', 'Modification', '', NULL, '2021-09-02 07:06:33'),
(6, 'centre diff', 'binding diff needed replacement', 'Completed', 'Maintenance', '', NULL, '2021-08-31 15:57:08'),
(8, 'baller seats', 'i want seats that stick like glue to my butt.', 'Not Started', 'Modification', '', NULL, '2021-09-01 00:22:26'),
(29, 'blah', 'bkah', 'Not Started', 'Maintenance', 'default.jpg', '2', '2021-09-02 08:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'thesuperolly@gmail.com', '$2y$10$bhs5i6FTDzCvtBfaukT1b.M9OwIEJgqRREp6fFOFxaB42yvHg2k/K', '2021-09-01 14:53:47'),
(2, 'Olly', '$2y$10$FtnfAWIZLWSjr0XA93Skl.Gj8pjkX43/8UqRDE1fCnhoW0iH0nVKi', '2021-09-02 11:07:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
