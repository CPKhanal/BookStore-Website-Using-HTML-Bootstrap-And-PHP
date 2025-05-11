-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2025 at 04:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$mBHNyNHdu.t9sdHMLI2Wyu7l93BeUTfPi4OO8smJ1myvgaDCd.xPC'),
(3, 'admin@admin.com', '$2y$10$cChJt0vOvypwnVGERxezmuF2T5mceZtNMEF7BUZv3uZCEd/2zH7hG');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `created_at`) VALUES
(9, 'Exciting News: Our Offline Store is Launching Soon!', 'We are thrilled to announce that our offline store will be launching soon! After receiving incredible support from our online community, we’re excited to take the next step and bring our carefully curated collection closer to you in person. The offline store will offer a more personalized shopping experience, and we can\'t wait to welcome you to explore our products in a brand-new setting. Stay tuned for updates on the opening date, location, and special offers that we have in store for you. We’re incredibly grateful for your continued support, and we look forward to seeing you in our new store soon!', '2025-03-03 23:01:43'),
(10, 'New Book Arrivals at Our Online Store!', 'We are excited to share that a fresh batch of books has just arrived at our online store! Whether you\'re a fan of fiction, non-fiction, or something in between, we\'ve got something for everyone. Our new collection features bestsellers, hidden gems, and timeless classics, so be sure to check it out and find your next read. Plus, enjoy a special discount for a limited time when you shop online. Don’t miss out—explore our latest titles today and indulge in the joy of reading!', '2025-03-03 23:02:42'),
(11, 'Join Our Loyalty Program for Exclusive Benefits!', 'We’re excited to introduce our new Loyalty Program to show appreciation for your continued support. As a member, you’ll receive exclusive perks like early access to new releases, special discounts, and members-only events. Signing up is easy and free, and you\'ll start earning points with every purchase! It\'s our way of saying thank you for being part of the [Your Store Name] family. Sign up today and start enjoying the benefits right away!', '2025-03-03 23:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_replies`
--

CREATE TABLE `announcement_replies` (
  `reply_id` int(11) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reply_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement_replies`
--

INSERT INTO `announcement_replies` (`reply_id`, `announcement_id`, `user_id`, `reply_text`, `created_at`) VALUES
(30, 11, 198, 'hi How are you', '2025-03-04 00:03:35'),
(31, 11, NULL, 'good', '2025-03-04 00:06:14'),
(32, 11, 198, 'wow', '2025-03-04 00:06:25'),
(33, 11, 197, 'Whats happening', '2025-03-04 00:14:37'),
(34, 11, NULL, 'hi cp', '2025-03-04 06:20:26'),
(35, 11, 197, 'hi boss', '2025-03-04 06:20:53'),
(36, 11, 200, 'this is test2', '2025-03-04 06:23:46'),
(37, 11, 202, 'ok doing great', '2025-03-04 07:15:03'),
(38, 11, 202, 'ok', '2025-03-04 07:15:42'),
(39, 11, 202, 'reply', '2025-03-04 07:16:54'),
(42, 11, NULL, 'hi', '2025-03-06 19:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `price`, `image`) VALUES
(7, 'Elon Musk By Walter Isaacson', 35.00, 'elon musk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `message`, `date`) VALUES
(14, 'cp', 'cpkhanal0@gmail.com', 'hi', '2025-02-06 01:41:36'),
(15, 'Hi Boss', 'hi@gmail.com', 'This is test 1 check ing the dashboard\r\n', '2025-02-28 23:41:07'),
(16, 'cp khanal', 'test1@gmail.com', 'hi nice to meet you\r\n', '2025-03-01 00:47:45'),
(17, 'Chandra Prakash Khanal', 'cpkhanal0@gmail.com', 'Hi I would like to talk to you!\r\n', '2025-03-03 03:12:28'),
(18, 'CP', 'cpkhanal0@gmail.com', 'This is a test to check if profile is working or not', '2025-03-03 19:52:45'),
(19, 'Ankit', 'ankitpoudel@gmail.com', 'This a a message form ankit', '2025-03-03 20:46:06'),
(20, 'test2', 't2st@gmail.com', 'test2', '2025-03-04 06:25:42'),
(21, 'test2', 'test2@gmail.comm', 'hi', '2025-03-04 06:26:03'),
(22, 'test2', 'test2@gmail.com', 'Hi how are you', '2025-03-04 06:26:31'),
(23, 'test3', 'test3@gmail.com', 'testing 3', '2025-03-04 06:53:23'),
(24, 'test3', 'test3@gmail.com', 'this is test of db conn', '2025-03-04 07:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `Order_Id` int(100) NOT NULL,
  `Full_Name` text NOT NULL,
  `Phone_No` bigint(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Pay_Mode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`Order_Id`, `Full_Name`, `Phone_No`, `Address`, `Pay_Mode`) VALUES
(7, 'cp', 12, 'dd', 'COD'),
(8, 'cp test', 1234, '12bddbbd', 'COD'),
(9, 'this is test1', 7777777777, 'this is test1', 'COD'),
(10, 'birendra', 111111111, 'abc', 'COD'),
(11, 'cp', 12, '33 city center', 'COD'),
(12, 'test2', 12, 'ss', 'COD'),
(13, 'test3', 12345, 'abc', 'COD'),
(14, 'test4', 123, 'test4', 'COD'),
(15, 'test5', 123, '12', 'COD'),
(16, 'cp', 11111111, '33 city', 'COD'),
(17, 'boss', 12, 'dd', 'COD'),
(18, 'cp', 4376602672, '33 city center dr', 'COD'),
(19, 'cp', 4376602672, '33 city center dr', 'COD'),
(20, 'test1', 1111, 'test1', 'COD'),
(21, 'test1', 111222333, '12345', 'COD'),
(22, 'Ankit', 123, '33 city center dr', 'COD'),
(23, 'test2', 123, '123', 'COD'),
(24, 'ok', 11, '11', 'COD'),
(25, 'cp', 222222, '22', 'COD'),
(26, 'test4', 11, 'ss', 'COD'),
(27, 'CP Khanal', 4376602672, '593 Rossellini Drivr', 'COD'),
(28, 'cp', 12, 'as', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `email`, `name`, `password`, `created_at`) VALUES
(196, 'boss@gmail.com', 'CP', '$2y$10$al3NBx2ozB8SWVJYzg808OunWtvu7xic8UVH4E2GaOhpGbGkiPT7O', '2025-03-01 02:39:54'),
(197, 'cpkhanal0@gmail.com', 'CP', '$2y$10$0CMQhDY4z.T5FCBl.zJojORleuHmDDcLMzKNBnzP/E4wiiWkKNey2', '2025-03-03 19:48:37'),
(198, 'test1@gmail.com', 'test1', '$2y$10$eujA4v8jRQiRNsSeBSxnaeiiBQgjvM5cpCTxvtEr8x.wGbAxuQxQu', '2025-03-03 19:54:51'),
(199, 'ankitpoudel@gmail.com', 'Ankit', '$2y$10$a40fhSroPcdYmArldDQibu3v/0Dl3ErGnTynjBhRVo0wigQDrgCC.', '2025-03-03 20:45:07'),
(200, 'test2@gmail.com', 'test2', '$2y$10$bI.Pg5arebg1bi19bvJiOOu5CsA.BEj5GKqYNsClpkz5qFK6/qdeC', '2025-03-04 06:22:43'),
(202, 'test3@gmail.com', 'test3', '$2y$10$xZWUvkvfigU9uqwxkPnhwOMO.kdHMVXovdC9f9ZRDi7XJCyaVqKHy', '2025-03-04 06:58:48'),
(203, 'test4@gmail.com', 'test4', '$2y$10$ceaRpylFBKL9TtRuMfphAu8N2gmaxUYjBKRv27IeDzWo64l6K1/o.', '2025-03-04 07:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `Order_Id` int(100) NOT NULL,
  `Item_Name` varchar(100) NOT NULL,
  `Price` int(100) NOT NULL,
  `Quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`Order_Id`, `Item_Name`, `Price`, `Quantity`) VALUES
(7, 'Can\'t Hurt Me', 40, 1),
(7, 'Harry Potter', 45, 5),
(7, 'The Psychology of Money', 50, 1),
(8, 'Can\'t Hurt Me', 40, 1),
(8, 'How to Win Friends and Influence People', 55, 1),
(8, 'The Subtle Art of Not Giving a Fuck', 60, 1),
(8, 'The Magic', 60, 1),
(9, 'The Mountain is You', 60, 1),
(9, 'The Power of Discipline', 60, 1),
(10, 'The Courage to be Disliked', 40, 1),
(10, 'The Subtle Art of Not Giving a Fuck', 60, 1),
(11, 'Can\'t Hurt Me', 40, 1),
(11, 'Harry Potter', 45, 3),
(11, 'The Psychology of Money', 50, 1),
(11, 'How to Win Friends and Influence People', 55, 1),
(13, 'Harry Potter', 45, 1),
(13, 'Cant Hurt Me', 40, 1),
(13, 'The Psychology of Money', 50, 1),
(14, 'Harry Potter', 45, 1),
(14, 'Cant Hurt Me', 40, 2),
(14, 'The Psychology of Money', 50, 1),
(14, 'How to Win Friends and Influence People', 55, 1),
(15, 'Cant Hurt Me', 40, 1),
(16, 'The Magic', 60, 1),
(16, 'The Psychology of Money', 50, 1),
(17, 'Harry Potter', 45, 1),
(18, 'Chanakya Neeti', 60, 1),
(19, 'Harry Potter', 45, 1),
(19, 'Cant Hurt Me', 40, 1),
(19, 'Deep Work', 50, 1),
(20, 'The Psychology of Money', 50, 1),
(20, 'Harry Potter', 45, 1),
(20, 'How to Win Friends and Influence People', 55, 1),
(21, 'Harry Potter', 45, 1),
(21, 'The Psychology of Money', 50, 1),
(21, 'How to Win Friends and Influence People', 55, 1),
(21, 'The 48 Laws of Power', 60, 1),
(21, 'The Magic', 60, 1),
(22, 'The 48 Laws of Power', 60, 2),
(23, 'Cant Hurt Me', 40, 1),
(23, 'Harry Potter', 45, 1),
(23, 'The Psychology of Money', 50, 1),
(24, 'Cant Hurt Me', 40, 1),
(25, 'The Psychology of Money', 50, 1),
(26, 'Chanakya Neeti', 60, 1),
(27, 'We Who Wrestle With God', 60, 1),
(28, 'Elon Musk By Walter Isaacson', 35, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement_replies`
--
ALTER TABLE `announcement_replies`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `announcement_id` (`announcement_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`Order_Id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `announcement_replies`
--
ALTER TABLE `announcement_replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `Order_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement_replies`
--
ALTER TABLE `announcement_replies`
  ADD CONSTRAINT `announcement_replies_ibfk_1` FOREIGN KEY (`announcement_id`) REFERENCES `announcements` (`id`),
  ADD CONSTRAINT `announcement_replies_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userdetails` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
