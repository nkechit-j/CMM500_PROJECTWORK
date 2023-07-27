-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 11:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brainshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ans_id` int(10) NOT NULL,
  `st_id` int(10) NOT NULL,
  `q_id` int(10) NOT NULL,
  `answer` text NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(10) NOT NULL,
  `q_title` varchar(100) NOT NULL,
  `question` text NOT NULL,
  `st_id` int(10) NOT NULL,
  `q_tags` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `q_title`, `question`, `st_id`, `q_tags`, `createdAt`) VALUES
(1, 'Testing Question', 'Is Christian a developer?', 1, '[{&quot;value&quot;:&quot;Intranet Systems Development&quot;}]', '2023-07-26 23:26:10'),
(2, 'Testing two', 'I have this question that has been bordering me for a while and ...', 1, '[{&quot;value&quot;:&quot;Java&quot;},{&quot;value&quot;:&quot;Python&quot;}]', '2023-07-27 21:35:07'),
(3, 'Helo Test', 'y', 1, '', '2023-07-27 21:56:59'),
(4, 'ggoooo', 'hdhdh', 1, '', '2023-07-27 21:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `st_id` int(10) NOT NULL,
  `st_email` varchar(50) NOT NULL,
  `st_username` varchar(50) NOT NULL,
  `st_pass` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`st_id`, `st_email`, `st_username`, `st_pass`, `createdAt`) VALUES
(1, 'nka@gmail.com', 'Nkay', '72d6c5ae070f680e0e4ec4f21ddbf0e9', '2023-07-26 14:59:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ans_id`),
  ADD KEY `st_id` (`st_id`),
  ADD KEY `q_id` (`q_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `st_id` (`st_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ans_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `st_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`st_id`) REFERENCES `users` (`st_id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`q_id`) REFERENCES `question` (`q_id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`st_id`) REFERENCES `users` (`st_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
