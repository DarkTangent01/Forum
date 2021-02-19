-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2021 at 08:27 AM
-- Server version: 8.0.22
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `category_name` varchar(225) NOT NULL,
  `category_description` varchar(225) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'Python', 'Python is an interpreted, high-level and general-purpose programming language. Python\'s design philosophy emphasizes code readability with its notable use of significant whitespace.', '2021-02-14 17:55:43'),
(2, 'BootStrap', 'Bootstrap is a free and open-source CSS framework directed at responsive, mobile-first front-end web development. It contains CSS- and JavaScript-based design.', '2021-02-14 17:57:02'),
(3, 'R', 'R is a programming language and free software environment for statistical computing and graphics supported by the R Foundation for Statistical Computing.', '2021-02-14 17:57:02'),
(4, 'assembly', 'In computer programming, assembly language, often abbreviated asm, is any low-level programming language ', '2021-02-14 21:27:18'),
(5, 'django', 'Django is a Python-based free and open-source web framework that follows the model-template-views architectural pattern.', '2021-02-14 21:28:20'),
(6, 'flask', 'Flask is a micro web framework written in Python. It is classified as a microframework because it does not require particular tools or libraries.', '2021-02-14 21:28:20'),
(9, 'nodeJs', 'best for full stack dev', '2021-02-17 15:22:52'),
(10, 'ReactJs', 'this is best for creating user interfaces.', '2021-02-17 15:29:15'),
(11, 'ReactNative', 'this is test send\r\n\r\n', '2021-02-18 14:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `sno` int NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `mobile_number` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` text NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `zip_code` int NOT NULL,
  `issue` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'Andaman and Nicobar Islands', 101),
(2, 'Andhra Pradesh', 101),
(3, 'Arunachal Pradesh', 101),
(4, 'Assam', 101),
(5, 'Bihar', 101),
(6, 'Chandigarh', 101),
(7, 'Chhattisgarh', 101),
(8, 'Dadra and Nagar Haveli', 101),
(9, 'Daman and Diu', 101),
(10, 'Delhi-NCR', 101),
(11, 'Goa', 101),
(12, 'Gujarat', 101),
(13, 'Haryana', 101),
(14, 'Himachal Pradesh', 101),
(15, 'Jammu and Kashmir', 101),
(16, 'Jharkhand', 101),
(17, 'Karnataka', 101),
(18, 'Kenmore', 101),
(19, 'Kerala', 101),
(20, 'Lakshadweep', 101),
(21, 'Madhya Pradesh', 101),
(22, 'Maharashtra', 101),
(23, 'Manipur', 101),
(24, 'Meghalaya', 101),
(25, 'Mizoram', 101),
(26, 'Nagaland', 101),
(27, 'Narora', 101),
(28, 'Natwar', 101),
(29, 'Odisha', 101),
(30, 'Paschim Medinipur', 101),
(31, 'Pondicherry', 101),
(32, 'Punjab', 101),
(33, 'Rajasthan', 101),
(34, 'Sikkim', 101),
(35, 'Tamil Nadu', 101),
(36, 'Telangana', 101),
(37, 'Tripura', 101),
(39, 'West Bengal', 101),
(41, 'Uttar Pradesh East', 101),
(42, 'Uttar Pradesh West', 101);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int NOT NULL,
  `thread_user_id` int NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
