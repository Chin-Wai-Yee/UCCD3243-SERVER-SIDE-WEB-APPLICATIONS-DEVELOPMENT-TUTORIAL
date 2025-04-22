-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2025 at 07:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajax_demo`
--
CREATE DATABASE IF NOT EXISTS `ajax_demo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ajax_demo`;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'What is AJAX?', 'An explanation of AJAX and its use cases.', '2025-04-22 05:45:12'),
(2, 'How does AJAX work?', 'Understanding the working mechanism of AJAX.', '2025-04-22 05:45:12'),
(3, 'Where to use AJAX?', 'Common use cases for AJAX in web applications.', '2025-04-22 05:45:12'),
(4, 'Why use AJAX?', 'Reasons why AJAX is useful in modern web development.', '2025-04-22 05:45:12'),
(5, 'What are the benefits of AJAX?', 'How AJAX improves web application performance.', '2025-04-22 05:45:12'),
(6, 'How to implement AJAX?', 'Step-by-step guide to using AJAX in projects.', '2025-04-22 05:45:12'),
(7, 'Where to place AJAX scripts?', 'Best practices for structuring AJAX code.', '2025-04-22 05:45:12'),
(8, 'Why is AJAX popular?', 'Factors contributing to the widespread use of AJAX.', '2025-04-22 05:45:12'),
(9, 'What is AJAX used for?', 'Practical applications of AJAX in real-world projects.', '2025-04-22 05:45:12'),
(10, 'How to optimize AJAX?', 'Tips and techniques for optimizing AJAX performance.', '2025-04-22 05:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`) VALUES
(1, 'Hello', 'hello@world.com'),
(2, 'New', 'ppl@ppl.com'),
(3, 'another one', 'hello@gmail.com'),
(4, 'lorem', 'lorem@ipsum.com'),
(5, 'new', 'newone@new.com'),
(6, 'adf', 'asdf@asdf.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_seen` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`id`, `user_id`, `last_seen`) VALUES
(1, 1, '2025-04-22 05:38:36'),
(2, 2, '2025-04-22 05:30:36'),
(3, 3, '2025-04-22 05:39:36'),
(4, 4, '2025-04-22 05:33:36'),
(5, 5, '2025-04-22 05:37:36'),
(6, 6, '2025-04-22 05:28:36'),
(7, 7, '2025-04-22 05:36:36'),
(8, 8, '2025-04-22 05:25:36'),
(9, 9, '2025-04-22 05:35:36'),
(10, 10, '2025-04-22 05:31:36');

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
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD CONSTRAINT `user_activity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
