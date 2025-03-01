-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2025 at 03:04 AM
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
(1, 'admin', '$2y$10$mBHNyNHdu.t9sdHMLI2Wyu7l93BeUTfPi4OO8smJ1myvgaDCd.xPC');

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
(16, 'cp khanal', 'test1@gmail.com', 'hi nice to meet you\r\n', '2025-03-01 00:47:45');

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
(15, 'test5', 123, '12', 'COD');

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
(195, 'boss@gmail.com', '', '$2y$10$MYHFgOivFYcmB9kPtN8F6eldTtoFn2Ldy0J9MaQLmUQnhMMzOl48y', '2025-03-01 02:03:27');

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
(15, 'Cant Hurt Me', 40, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `Order_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
