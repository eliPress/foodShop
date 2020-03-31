-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2020 at 07:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` char(50) NOT NULL,
  `post` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `uid`, `title`, `post`, `pic`, `created_at`) VALUES
(13, 8, 'PIZZA', '<p>jkjhkjh</p>', '', '2019-10-06 18:41:06'),
(14, 8, 'omlet', '<p>jkjhkjhkjh</p>', '', '2019-10-06 18:41:14'),
(15, 9, 'coco', '<p>hot milk</p>', '', '2019-10-06 20:21:18'),
(16, 10, 'bread', '<p>nice and easy</p>', '', '2019-10-06 20:30:17'),
(17, 8, 'tost', 'with tomatos is the best', '', '2019-10-07 13:35:16'),
(29, 37, 'coco', 'with milk', '', '2019-10-09 16:19:06'),
(31, 38, 'blabla', 'sssss', '', '2020-03-18 19:42:25'),
(32, 38, 'nir', 'nir', 'code.jpg', '2020-03-18 19:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `email` char(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(11) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `avatar`, `updated_at`) VALUES
(8, 'eli', 'eli@walla.com', '123', 6, '', '0000-00-00 00:00:00'),
(9, 'dom', 'dom@walla.com', '456', 6, '', '0000-00-00 00:00:00'),
(10, 'ron', 'ron@google.com', '789', 6, '', '0000-00-00 00:00:00'),
(11, 'noar', 'noar@walla.com', '101112', 6, '', '0000-00-00 00:00:00'),
(13, 'eden', 'eden@gmail.com', '141516', 6, '', '0000-00-00 00:00:00'),
(14, 'roni', 'roni@gmail.com', '171819', 6, '', '0000-00-00 00:00:00'),
(15, 'batel', 'batel@nana.net.il', '147', 6, '', '0000-00-00 00:00:00'),
(17, 'tom', 'tom@walla.com', '$2y$10$Jll3zwfSQwmaZ6fPjuOF8Ol4Au3uyD3MBZd6ehffS1G', 6, '', '2019-09-24 21:09:16'),
(18, 'don', 'don33@gmailcom', '$2y$10$.Sv3kP0tEjlbaOlOuhiZ/upXWX6RvOqJSJzfvBxr0hm', 6, '', '2019-09-24 21:09:39'),
(20, 'omer', 'omerd@walla.com', '$2y$10$JIL0zAgBSSswOnxJkuKJXe51LR2J9zPf.Q4zUylU1Dc', 0, '', '2019-09-29 17:15:01'),
(21, 'dor', 'dor@gmail.net', '$2y$10$MvCsKgSCGfi44kljZsKyc.sinKgFX77WdNRq.0bNPsU', 0, '', '2019-09-29 17:15:38'),
(22, 'rami', 'rami@gmail.com', '$2y$10$kGlDxxOIgbWLR5DwnMCxs.NodTl8e5JqCChVZW57ba6', 0, '', '2019-09-29 17:17:14'),
(23, 'nana', 'nana@walla.com', '$2y$10$IC69Myhtt7Lon1INQR7hpuDCXzogZZK2R.MIE/gKmOF', 0, '', '2019-09-29 17:18:19'),
(24, 'dani', 'dani@mail.ru', '$2y$10$/PYobPjcmfCgcRO6bTXlWeqGPGX8WXlduMo68.YJMxF', 0, '', '2019-09-29 17:20:24'),
(28, 'david', 'david@gmail.com', '$2y$10$llg8mTuT2jfloNPEYsXyj.H0zeO1u40meTJx8GbnOtN', 0, '', '2019-10-01 16:53:36'),
(30, 'lola', 'lola@walla.com', '$2y$10$bkf8wFY5skx15oh9wV5Gw..ecDOcuxEA8nAr7HZHyq6', 0, '', '2019-10-01 16:55:19'),
(31, 'inna', 'inna@walla.com', '$2y$10$3tT9pbxeLovZI8mtn9RAgO82tW42FTb3fjDsciVLI5y', 0, '', '2019-10-01 17:50:48'),
(32, 'hami', 'dami@gmail.com', '$2y$10$ONOwD5Gx6YN4dHrZVKFYLeKA8ru.SPYnAlKWU6NvPvO', 0, '', '2019-10-02 17:45:57'),
(33, 'efi', 'efi@walla.com', '$2y$10$DBX5jpH3u4YLt5GDWNxt0.NGWPUMwPGcoTCb2gwG1RT', 0, '', '2019-10-02 17:46:52'),
(34, 'bor', 'bor@gmail.com', '$2y$10$KpEoZ.fQc1Fw2y4YCRV8/u1Kdxfryl03ZXlin7nqfNh', 0, '', '2019-10-02 17:48:13'),
(35, 'innahacker', 'innahacker@google.com', '$2y$10$o3oO9HE.UPLdVXsg0VVfiOrdU2gWlJR0I9LDjhnVs0d', 0, '', '2019-10-06 20:39:01'),
(37, 'admin', 'admin@gmail.com', '$2y$10$9DegymJ813nca1nmRIyT/eIJBmrB/xyXCFGZL0BCHalFhLgsjBAMq', 0, 'admin.png', '2019-10-09 16:15:37'),
(38, 'test', 'test123@gmail.com', '$2y$10$7bzOAF3BmuW.owWJkh3mWOZx2YyIf5OB1en7NLnAMAOox6g5uYXyi', 6, 'admin.png', '2020-03-02 20:54:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
